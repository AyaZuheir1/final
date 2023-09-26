<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        // dd('dddd');
        $events = [];

        $appointments = Appointment::with(['appointed', 'hall'])->where('hall_id',$id)->get();

        foreach ($appointments as $appointment) {
            $events[] = [
                'title' => $appointment->appointed->name . ' (' . $appointment->hall->name . ')',
                'start' => $appointment->start_time,
                'end' => $appointment->end_time,
            ];
        }

        return view('users.appointment', compact('events','id'));
    }
    // public function request($id){
    //     return view('users.request',compact('id')); // add request
    // }
}
