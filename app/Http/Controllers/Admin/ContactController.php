<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function edit()
    {
        $contact = ContactUs::query()->first();
        if (!$contact) {
            $contact = new ContactUs([
                'address' => '',
                'email' => '',
                'phone' => '',
                'map_location' => ''
            ]);
        }

        return view('admin.contact.edit', compact('contact'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'address' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'map_location' => 'nullable|string'
        ]);

        $contact = ContactUs::query()->first();
        if (!$contact) {
            $contact = new ContactUs();
        }

        $contact->fill($validated);
        $contact->save();

        return redirect()->route('admin.contact.edit')
            ->with('success', 'Contact information updated successfully.');
    }
}
