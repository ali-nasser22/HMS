<x-admin.layout>
    <x-slot:title>Edit Contact Information</x-slot>
    <x-slot:header>Edit Contact Information</x-slot>

    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-sm">
            <!-- Header -->
            <div class="p-6 border-b border-gray-100">
                <h2 class="text-lg font-semibold text-gray-900">Contact Information</h2>
                <p class="mt-1 text-sm text-gray-500">Update your organization's contact details and location.</p>
            </div>

            <!-- Form -->
            <form action="{{ route('admin.contact.update') }}" method="POST" class="p-6">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <!-- Address -->
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-1">
                            Address
                        </label>
                        <textarea name="address" id="address" rows="3"
                                  class="px-1 border w-full rounded-lg border-gray-300 focus:border-[#219EBC] focus:ring focus:ring-[#219EBC] focus:ring-opacity-50"
                                  required>{{ old('address', $contact->address) }}</textarea>
                        @error('address')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                            Email Address
                        </label>
                        <input type="email" name="email" id="email"
                               class="px-1 border w-full rounded-lg border-gray-300 focus:border-[#219EBC] focus:ring focus:ring-[#219EBC] focus:ring-opacity-50"
                               value="{{ old('email', $contact->email) }}"
                               required>
                        @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Phone -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">
                            Phone Number
                        </label>
                        <input type="text" name="phone" id="phone"
                               class="px-1 border w-full rounded-lg border-gray-300 focus:border-[#219EBC] focus:ring focus:ring-[#219EBC] focus:ring-opacity-50"
                               value="{{ old('phone', $contact->phone) }}"
                               required>
                        @error('phone')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Map Location -->
                    <div>
                        <label for="map_location" class="block text-sm font-medium text-gray-700 mb-1">
                            Map Location (Embed URL)
                        </label>
                        <textarea name="map_location" id="map_location" rows="3"
                                  class="px-1 border w-full rounded-lg border-gray-300 focus:border-[#219EBC] focus:ring focus:ring-[#219EBC] focus:ring-opacity-50"
                                  placeholder="Paste your Google Maps embed URL here">{{ old('map_location', $contact->map_location) }}</textarea>
                        <p class="mt-1 text-sm text-gray-500">Enter the Google Maps embed URL to display your location on the contact page.</p>
                        @error('map_location')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Preview -->
                    @if($contact->map_location)
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Map Preview</label>
                            <div class="aspect-video rounded-lg overflow-hidden">
                                {!! $contact->map_location !!}
                            </div>
                        </div>
                    @endif

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
