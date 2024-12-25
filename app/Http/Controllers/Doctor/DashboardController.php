<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Appointment;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $doctor = auth()->user();
        $today = Carbon::today();

        // Get statistics
        $stats = [
            'today_appointments' => $doctor->doctorAppointments()
            ->where('appointment_date', $today)
            ->count(),
            'total_patients' => $doctor->doctorAppointments()
            ->distinct('patient_id')
            ->count('patient_id'),
            'upcoming_appointments' => $doctor->doctorAppointments()
            ->whereDate('appointment_date','>=', $today)
            ->where('status','scheduled')
            ->count(),
            'completed_appointments' => $doctor->doctorAppointments()
            ->where('status','completed')
            ->count()
        ];


        $todayAppointments = $doctor->doctorAppointments()
        ->with('patient')
        ->whereDate('appointment_date',$today)
        ->orderBy('appointment_date')
        ->get();

        // Get recent patients - placeholder empty collection until Patient/Appointments relations are ready
        $recentPatients = $doctor->doctorAppointments()
        ->with('patient')
        ->select('patient_id')
        ->distinct()
        ->latest()
        ->take(5)
        ->get()
        ->pluck('patient');

        return view('doctor.dashboard', compact(
            'stats',
            'todayAppointments',
            'recentPatients',
            'doctor',
        ));
    }
}
