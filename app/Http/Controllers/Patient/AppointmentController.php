<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = auth()->user()->appointments()
            ->with('doctor')
            ->orderBy('appointment_date','desc')
            ->orderBy('appointment_time','desc')
            ->paginate(10);
        return view('patient.appointments.index',compact('appointments'));
    }

    public function create()
    {
        $doctors = User::whereHas('roles',function($queru){
            $queru->where('name','doctor');
        })->with('doctor')->get();
        return view('patient.appointments.create',compact('doctors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'doctor_id'=>'required|exists:users,id',
            'appointment_date'=>'required|date|after_or_equal:today',
            'appointment_time'=>'required',
            'reason'=>'nullable|string|max:255',
        ]);

        $existingAppointment = Appointment::where('doctor_id',$validated['doctor_id'])
            ->where('appointment_date',$validated['appointment_date'])
            ->where('appointment_time',$validated['appointment_time'])
            ->exists();
        if($existingAppointment){
            return back()->with('error','This time slot is already booked.Please Choose another time');
        }
        $appointment = new Appointment();
        $appointment->doctor_id = $validated['doctor_id'];
        $appointment->patient_id = auth()->id();
        $appointment->appointment_date = $validated['appointment_date'];
        $appointment->appointment_time = $validated['appointment_time'];
        $appointment->reason = $validated['reason'];
        $appointment->status = 'scheduled';
        $appointment->save();

        return redirect()->route('patient.appointments')->with('success','Appointment created successfully');
    }

    public function show(Appointment $appointment)
    {
        if($appointment->patient_id !== auth()->id()){
            abort(403);
        }
        return view('patient.appointments.show',compact('appointment'));
    }

    public function cancel(Appointment $appointment)
    {
        if($appointment->patient_id !== auth()->id()){
            abort(403);
        }
        if($appointment->status !== 'scheduled'){
            return back()->with('error','Cannot cancel an appointment that is not scheduled');
        }
        $appointment->status = 'canclled';
        $appointment->save();
        return redirect()->route('patient.appointments')->with('success','Appointment cancelled successfully');
    }
}
