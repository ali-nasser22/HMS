<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(){
        $appointments = Appointment::where('doctor_id',auth()->id())
            ->with('patient')
            ->orderBy('appointment_date','desc')
            ->orderBy('appointment_time','desc')
            ->paginate(10);
        return view('doctor.appointments.index',compact('appointments'));
    }
    public function show(Appointment $appointment){
        $patient = $appointment->patient();
        if($appointment->doctor_id !== auth()->id()){
            abort(403);
        }
        return view('doctor.appointments.show',compact('appointment','patient'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        if($appointment->doctor_id !== auth()->id()){
            abort(403);
        }
        if($appointment->status === 'cancelled'){
            return redirect()->back()->with('error','Cannot update cancelled appointment');
        }
        $appointment->status ='completed';
        $appointment->save();
        return back()->with('success','Appointment marked as completed');
}
}
