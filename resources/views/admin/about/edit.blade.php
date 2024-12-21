<x-admin.layout>
    <x-slot:title>Edit About Us</x-slot>
    <x-slot:header>Edit About Us</x-slot>

    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-sm">
            <!-- Header -->
            <div class="p-6 border-b border-gray-100">
                <h2 class="text-lg font-semibold text-gray-900">About Us Information</h2>
                <p class="mt-1 text-sm text-gray-500">Update your organization's about us information and image.</p>
            </div>

            <!-- Form -->
            <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">
                            Title
                        </label>
                        <input type="text" name="title" id="title"
                               class="px-1 border w-full rounded-lg border-gray-300 focus:border-[#219EBC] focus:ring focus:ring-[#219EBC] focus:ring-opacity-50"
                               value="{{ old('title', $about->title) }}" required>
                        @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Content -->
                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700 mb-1">
                            Content
                        </label>
                        <textarea name="content" id="content" rows="8"
                                  class="px-1 border w-full rounded-lg border-gray-300 focus:border-[#219EBC] focus:ring focus:ring-[#219EBC] focus:ring-opacity-50"
                                  required>{{ old('content', $about->content) }}</textarea>
                        @error('content')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image Upload -->
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-1">
                            Featured Image
                        </label>

                        <!-- Current Image Preview -->
                        @if($about->image_path)
                            <div class="mt-2 mb-4">
                                <div class="relative w-40 h-40 rounded-lg overflow-hidden">
                                    <img src="{{ Storage::url($about->image_path) }}"
                                         alt="Current About Us Image"
                                         class="w-full h-full object-cover">
                                </div>
                            </div>
                        @endif

                        <!-- Image Upload Input -->
                        <div class="mt-2">
                            <input type="file" name="image" id="image"
                                   class="block w-full text-sm text-gray-500
                                          file:mr-4 file:py-2 file:px-4
                                          file:rounded-full file:border-0
                                          file:text-sm file:font-semibold
                                          file:bg-[#219EBC] file:text-white
                                          hover:file:bg-[#219EBC]/90
                                          cursor-pointer">
                            <p class="mt-1 text-sm text-gray-500">PNG, JPG, GIF up to 2MB</p>
                        </div>
                        @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Form Actions -->
                    <div class="flex items-center justify-end gap-4 pt-4 border-t border-gray-100">
                        <button type="submit"
                                class="px-6 py-2 bg-[#219EBC] text-white rounded-lg hover:bg-[#219EBC]/90 focus:outline-none focus:ring-2 focus:ring-[#219EBC] focus:ring-offset-2 transition-colors">
                            Save Changes
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-admin.layout>
