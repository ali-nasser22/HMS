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
        $doctorProfile = $doctor->doctorProfile;
        $today = Carbon::today();

        // Get statistics
        $stats = [
            'today_appointments' => 0,    // Will implement when Appointments table is ready
            'total_patients' => 0,        // Will implement when Appointments table is ready
            'upcoming_appointments' => 0,  // Will implement when Appointments table is ready
            'completed_appointments' => 0  // Will implement when Appointments table is ready
        ];

        // Get today's appointments - placeholder empty collection until Appointments table is ready
        $todayAppointments = collect([]);

        // Get recent patients - placeholder empty collection until Patient/Appointments relations are ready
        $recentPatients = collect([]);

        return view('doctor.dashboard', compact(
            'stats',
            'todayAppointments',
            'recentPatients',
            'doctor',
            'doctorProfile'
        ));
    }
}
