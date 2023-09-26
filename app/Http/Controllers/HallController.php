<?php

namespace App\Http\Controllers;

use App\Http\Requests\HallRequest;
use App\Models\Admin;
use App\Models\BookingRequest;
use App\Models\Hall;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HallController extends Controller
{
    public function index(Request $request)
    {
       $halls =  Hall::paginate(3);
    //    $halls = Hall::where('name', 'like', '%' . $request->input('keyword') . '%')->paginate();

    //    return view('admins.spaces',compact('halls'));
    //     $user = Auth::user();
    //     if($user instanceof Admin){
    //         $user = 'admin';
    //     }
    //     else{
    //         $user = 'user';
    //     }
       return view('users.rooms',compact('halls'));
    }
    public function create()
    {
        return view('halls.add'); // add Hall
    }
    public function store(HallRequest $request)
    {
        // dd('testing');
        $request->validated();
        $request['days_of_works'] = $request->from_day . " to " . $request->to_day;
        Hall::create($request->all());
        $success = session('success');
        return redirect(route('hall.index',$success));
    }
    public function show(){
        return view('admins.spaces');
    }
    public function edit(Hall $hall)
    {
            $days = explode(' ',$hall->days_of_works);
        $from_day = $days[0];
        $to_day = $days[2] ?? "";
        return view('halls.edit',compact('hall','from_day','to_day'));
    }
    public function update(HallRequest $request,Hall $hall)
    {
        $request->validated();
        $hall->update($request->all());
        $success = session('success');
        return redirect(route('hall.index',$success));

    }
    public function destroy(Hall $hall)
    {
        Hall::destroy($hall->id);
        return redirect(route('hall.index'));

    }

    public function showRequests(){
        $bookingRequests = BookingRequest::with('hall','user')->where('status', 'submitted')->get();
        return view('admins.showRequests',compact('bookingRequests'));
    }
    public function search(Request $request)
    {
        $halls = Hall::where('name', 'like', '%' . $request->input('keyword') . '%')->paginate();

        return view('users.rooms', compact('halls'));
    }
}
