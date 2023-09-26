<?php

namespace App\Http\Controllers;

use App\Events\NewRequest;
use App\Models\Appointment;
use App\Models\BookingRequest;
use App\Models\Hall;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
    // public function index(User $user)
    // {
    //     $requests = BookingRequest::where('id', '=', $user->id);
    //     return view('user.requests', compact('requests'));
    // }
    public function requestStatus(Request $request, BookingRequest $bookingRequest)
    {
        dd($request);
        if ($request->status === 'approved') {
            $start_time = $bookingRequest->start_time;
            $end_time = $bookingRequest->end_time;

            $count = BookingRequest::where('start_time', '<', $end_time)
                ->where('end_time', '>', $start_time)
                ->count();

            if ($count >= Hall::find($bookingRequest->hall_id)->number_of_seats) {
                return redirect()->back()->withErrors(['message' => 'No available seats in the specified time period.']);
            }

            $bookingRequest->update([
                'status' => 'approved',
                'admin_id' => Auth::id(),
            ]);
            Appointment::create([
                'hall_id' => $bookingRequest->hall_id,
                'appointed_id' => $bookingRequest->user_id,
                'appointed_type' => 'App\Models\User',
                'start_time' => $start_time,
                'end_time' => $end_time,
                'comment' => $bookingRequest->comment,
            ]);
        } else {
            $bookingRequest->update([
                'status' => 'denied',
                'reason' => $request->reason,
                'admin_id' => Auth::id(),
            ]);
        }
        return redirect(route('showRequests'));
    }

    public function create(Hall $hall)
    {

        return view('users.makeRequest', compact('hall'));
    }
    public function store(Request $request, $id)
    {
        $request->validate([
            'start_time' => 'required',
            'end_time' => 'required',
            'comment' => 'nullable',
        ]);


        $start_time = $request->start_time;
        $end_time = $request->end_time;


        $conflictingBooking = BookingRequest::where('hall_id', $id)
            ->where('status', 'approved')
            ->where(function ($query) use ($start_time, $end_time) {
                $query->where(function ($q) use ($start_time, $end_time) {
                    $q->where('start_time', '<', $start_time)
                        ->where('end_time', '>', $start_time);
                })->orWhere(function ($q) use ($start_time, $end_time) {
                    $q->where('start_time', '<', $end_time)
                        ->where('end_time', '>', $end_time);
                })->orWhere(function ($q) use ($start_time, $end_time) {
                    $q->where('start_time', '>=', $start_time)
                        ->where('end_time', '<=', $end_time);
                });
            })
            ->first();
        $count = BookingRequest::where('start_time', '<', $end_time)
            ->where('end_time', '>', $start_time)
            ->count();

        if ($count >= Hall::find($id)->number_of_seats) {
            return redirect()->back()->withErrors(['message' => 'Conflict with another reservation in the specified time period.']);
        }

        $bookingRequest = new BookingRequest();
        $bookingRequest->user_id = Auth::id();
        $bookingRequest->hall_id = $id;
        $bookingRequest->start_time = $start_time;
        $bookingRequest->end_time = $end_time;
        $bookingRequest->status = 'submitted';
        $bookingRequest->created_at = now();
        $bookingRequest->updated_at = now();

        $bookingRequest->save();
        event(new NewRequest($bookingRequest));
        return redirect(route('user.showUserRequests', Auth::id()));
    }



    public function showUserRequests(User $user)
    {
        $bookingRequests = BookingRequest::with('hall')->where('user_id', $user->id)->get();
        return view('users.requests', compact('bookingRequests'));
    }
    public function edit(Hall $hall, BookingRequest $bookingRequest)
    {
        // dd($bookingRequest);
        return view('users.editRequest', compact('bookingRequest', 'hall'));
    }
    public function update(Request $request, $hall, $bookingRequest)
    {
        $bookingRequest = BookingRequest::find((intval($bookingRequest)));
        $bookingRequest->update($request->all());
        return redirect(route('user.showUserRequests', Auth::id()));
    }
    public function delete($bookingRequest)
    {
        $bookingRequest = BookingRequest::find((intval($bookingRequest)));
        BookingRequest::destroy($bookingRequest->id);
        return redirect(route('user.showUserRequests', Auth::id()));
    }

    public function rooms()
    {
        $halls = Hall::paginate(3);
        return view('users.rooms', compact('halls'));
    }
}
