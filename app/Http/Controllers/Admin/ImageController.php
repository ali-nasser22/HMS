<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::latest()->paginate(12);
        return view('admin.images.index', compact('images'));
    }

    public function create()
    {
        return view('admin.images.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('gallery', 'public');

            Image::create([
                'title' => $validated['title'],
                'image_path' => $imagePath,
                'category' => $validated['category'],
                'description' => $validated['description']
            ]);
        }

        return redirect()->route('admin.images.index')
            ->with('success', 'Image uploaded successfully.');
    }

    public function edit(Image $image)
    {
        return view('admin.images.edit', compact('image'));
    }

    public function update(Request $request, Image $image)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($image->image_path) {
                Storage::delete('public/' . $image->image_path);
            }

            $validated['image_path'] = $request->file('image')->store('gallery', 'public');
        }

        $image->update($validated);

        return redirect()->route('admin.images.index')
            ->with('success', 'Image updated successfully.');
    }

    public function destroy(Image $image)
    {
        if ($image->image_path) {
            Storage::delete('public/' . $image->image_path);
        }

        $image->delete();

        return redirect()->route('admin.images.index')
            ->with('success', 'Image deleted successfully.');
    }
}
