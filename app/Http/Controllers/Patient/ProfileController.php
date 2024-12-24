<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\PatientProfile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        $patient = auth()->user();

        // Create profile if it doesn't exist
        if (!$patient->patientProfile) {
            $patient->patientProfile()->create([
                'date_of_birth' => now(),
                'blood_group' => 'Not Set',
                'address' => 'Not Set',
                'emergency_contact' => 'Not Set',
                'contact' => 'Not Set',
                'medical_history' => null,
            ]);

            $patient->refresh();
        }

        return view('patient.profile.edit', [
            'patient' => $patient,
            'profile' => $patient->patientProfile
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'date_of_birth' => 'required|date',
            'blood_group' => 'required|string',
            'address' => 'required|string',
            'emergency_contact' => 'required|string',
            'contact'=>'required|string',
            'medical_history' => 'nullable|string',
        ]);

        $patient = auth()->user();
        $patient->patientProfile()->update($validated);

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
