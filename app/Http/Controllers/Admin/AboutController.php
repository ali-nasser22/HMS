<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function edit()
    {
        // Get the first record or create a new instance with default values
        $about = AboutUs::query()->first();
        if (!$about) {
            $about = new AboutUs([
                'title' => 'About Us',
                'content' => 'Welcome to our hospital management system.',
                'image_path' => null
            ]);
        }

        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Find first record or create new one
        $about = AboutUs::query()->first();
        if (!$about) {
            $about = new AboutUs();
        }

        $about->title = $validated['title'];
        $about->content = $validated['content'];

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($about->image_path) {
                Storage::delete('public/' . $about->image_path);
            }

            $imagePath = $request->file('image')->store('about', 'public');
            $about->image_path = $imagePath;
        }

        $about->save();

        return redirect()->route('admin.about.edit')
            ->with('success', 'About Us information updated successfully.');
    }
}
