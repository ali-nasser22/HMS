<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = User::whereHas('appointments', function($query) {
            $query->where('doctor_id', auth()->id());
        })
            ->with(['patientProfile', 'appointments' => function($query) {
                $query->where('doctor_id', auth()->id())
                    ->latest();
            }])
            ->paginate(10);

        return view('doctor.patients.index', compact('patients'));
    }

    public function show(User $patient)
    {
        if (!$patient->appointments()->where('doctor_id', auth()->id())->exists()) {
            abort(403);
        }

        $appointments = $patient->appointments()
            ->where('doctor_id', auth()->id())
            ->latest()
            ->get();

        return view('doctor.patients.show', compact('patient', 'appointments'));
    }
}
