<x-admin.layout>
    <x-slot:title>Add New Image</x-slot>
    <x-slot:header>Add New Image</x-slot>

    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-lg shadow-sm">
            <!-- Header -->
            <div class="p-6 border-b border-gray-100">
                <h2 class="text-lg font-semibold text-gray-900">Add New Image</h2>
                <p class="mt-1 text-sm text-gray-500">Add a new image to your gallery.</p>
            </div>

            <!-- Form -->
            <form action="{{ route('admin.images.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf

                <div class="space-y-6">
                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">
                            Title
                        </label>
                        <input type="text" name="title" id="title"
                               class="px-1 border w-full rounded-lg border-gray-300 focus:border-[#219EBC] focus:ring focus:ring-[#219EBC] focus:ring-opacity-50"
                               value="{{ old('title') }}"
                               required>
                        @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-1">
                            Category
                        </label>
                        <select name="category" id="category"
                                class="px-1 border w-full rounded-lg border-gray-300 focus:border-[#219EBC] focus:ring focus:ring-[#219EBC] focus:ring-opacity-50"
                                required>
                            <option value="">Select a category</option>
                            <option value="facilities" {{ old('category') == 'facilities' ? 'selected' : '' }}>Facilities</option>
                            <option value="staff" {{ old('category') == 'staff' ? 'selected' : '' }}>Staff</option>
                            <option value="events" {{ old('category') == 'events' ? 'selected' : '' }}>Events</option>
                            <option value="other" {{ old('category') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('category')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
                            Description
                        </label>
                        <textarea name="description" id="description" rows="3"
                                  class="px-1 border w-full rounded-lg border-gray-300 focus:border-[#219EBC] focus:ring focus:ring-[#219EBC] focus:ring-opacity-50">{{ old('description') }}</textarea>
                        @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image Upload -->
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-1">
                            Image
                        </label>
                        <input type="file" name="image" id="image"
                               class="px-1 border block w-full text-sm text-gray-500
                                      file:mr-4 file:py-2 file:px-4
                                      file:rounded-lg file:border-0
                                      file:text-sm file:font-semibold
                                      file:bg-[#219EBC] file:text-white
                                      hover:file:bg-[#219EBC]/90
                                      cursor-pointer"
                               required>
                        <p class="mt-1 text-sm text-gray-500">PNG, JPG, GIF up to 2MB</p>
                        @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Form Actions -->
                    <div class="flex items-center justify-end gap-4 pt-4 border-t border-gray-100">
                        <a href="{{ route('admin.images.index') }}"
                           class="px-4 py-2 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                            Cancel
                        </a>
                        <button type="submit"
                                class="px-6 py-2 bg-[#219EBC] text-white rounded-lg hover:bg-[#219EBC]/90 focus:outline-none focus:ring-2 focus:ring-[#219EBC] focus:ring-offset-2 transition-colors">
                            Upload Image
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-admin.layout>
