<?php

namespace App\Http\Controllers\Api\V1;

use App\Events\NewRequest;
use App\Http\Controllers\Controller;
use App\Models\BookingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$id)
    {
        $request->validate([
            'start_time' => 'required',
            'end_time' => 'required',
            'comment' => 'nullable',
        ]);

        // $bookingRequest = new BookingRequest();
        // $bookingRequest->user_id = Auth::id();
        // $bookingRequest->hall_id = $id;
        // $bookingRequest->start_time = $request->start_time;
        // $bookingRequest->end_time = $request->end_time;
        // $bookingRequest->status = 'submitted';
        // $bookingRequest->comment = $request->comment;
        // $bookingRequest->created_at = now();
        // $bookingRequest->updated_at = now();

        // $bookingRequest->save();
        // BookingRequest::create($request->all());
        // event(new NewRequest($bookingRequest));
        
        $bo = BookingRequest::create($request->all());
        // event(new NewRequest($bo));
        return $bo;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$hall,$bookingRequest)
    {
        $bookingRequest = BookingRequest::find((intval($bookingRequest)));
        // dd($bookingRequest);
        $bookingRequest->update($request->all());

        return Response::json([
            'code' => 100,
            'msg' => 'Booking Request Updated Successfully',
            $bookingRequest,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
