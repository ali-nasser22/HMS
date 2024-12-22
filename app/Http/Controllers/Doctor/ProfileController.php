<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\DoctorProfile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        $doctor = auth()->user();

        // Create doctor profile if it doesn't exist
        if (!$doctor->doctorProfile) {
            $doctor->doctorProfile()->create([
                'specialization' => 'Not Set',
                'qualification' => 'Not Set',
                'experience_years' => 0,
                'license_number' => 'Not Set',
                'contact_number' => 'Not Set'
            ]);

            $doctor->refresh(); // Refresh to get the new profile
        }

        return view('doctor.profile.edit', [
            'doctor' => $doctor,
            'profile' => $doctor->doctorProfile
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'specialization' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'experience_years' => 'required|integer|min:0',
            'license_number' => 'required|string|max:255',
            'contact_number' => 'required|string|max:255',
        ]);

        $doctor = auth()->user();
        $doctor->doctorProfile()->update($validated);

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
