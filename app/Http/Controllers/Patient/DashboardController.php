<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $patient = auth()->user();
        $today=Carbon::today();

        $stats =[
            'upcoming_appointments' =>$patient->appointments()
            ->where('appointment_date','>=',$today)
            ->where('status','scheduled')
            ->count(),
            'total_appointments'=>$patient->appointments()->count(),
            'completed_appointments'=>$patient->appointments()
            ->where('status','completed')
            ->count(),
        ];
        $upcomingAppointments = $patient->appointments()
            ->with('doctor')
            ->where('appointment_date','>=',$today)
            ->where('status','scheduled')
            ->orderBy('appointment_date')
            ->orderBy('appointment_time')
            ->take(5)
            ->get();
        return view('patient.dashboard',compact('stats','upcomingAppointments'));
    }
}
