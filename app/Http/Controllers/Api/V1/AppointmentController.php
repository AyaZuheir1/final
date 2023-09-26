<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function __invoke($id)
    {;
        $events = [];

        $appointments = Appointment::with(['appointed', 'hall'])->where('hall_id',$id)->get();

        foreach ($appointments as $appointment) {
            $events[] = [
                'title' => $appointment->appointed->name . ' (' . $appointment->hall->name . ')',
                'start' => $appointment->start_time,
                'end' => $appointment->end_time,
            ];
        }

        return $events;

        
    }
}
