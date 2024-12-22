<x-doctor.layout>
    <x-slot:title>Edit Profile</x-slot>
    <x-slot:header>Edit Profile</x-slot>

    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow">
            @if(!$profile)
                <div class="p-6 text-red-500">
                    Profile is null - Debug information
                </div>
            @endif

            <div class="p-6 border-b border-gray-100">
                <h2 class="text-xl font-semibold text-gray-800">Profile Information</h2>
                <p class="mt-1 text-sm text-gray-500">Update your profile information and credentials.</p>
            </div>

            <form action="{{ route('doctor.profile.update') }}" method="POST" class="p-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="specialization" class="block text-sm font-medium text-gray-700">
                            Specialization
                        </label>
                        <input type="text" name="specialization" id="specialization"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#219EBC] focus:ring focus:ring-[#219EBC] focus:ring-opacity-50"
                               value="{{ old('specialization', optional($profile)->specialization) }}" required>
                        @error('specialization')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Rest of your form fields with the same pattern using optional() helper -->
                    <div>
                        <label for="qualification" class="block text-sm font-medium text-gray-700">
                            Qualification
                        </label>
                        <input type="text" name="qualification" id="qualification"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#219EBC] focus:ring focus:ring-[#219EBC] focus:ring-opacity-50"
                               value="{{ old('qualification', optional($profile)->qualification) }}" required>
                        @error('qualification')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="experience_years" class="block text-sm font-medium text-gray-700">
                            Years of Experience
                        </label>
                        <input type="number" name="experience_years" id="experience_years"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#219EBC] focus:ring focus:ring-[#219EBC] focus:ring-opacity-50"
                               value="{{ old('experience_years', optional($profile)->experience_years) }}" required>
                        @error('experience_years')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="license_number" class="block text-sm font-medium text-gray-700">
                            License Number
                        </label>
                        <input type="text" name="license_number" id="license_number"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#219EBC] focus:ring focus:ring-[#219EBC] focus:ring-opacity-50"
                               value="{{ old('license_number', optional($profile)->license_number) }}" required>
                        @error('license_number')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="contact_number" class="block text-sm font-medium text-gray-700">
                            Contact Number
                        </label>
                        <input type="text" name="contact_number" id="contact_number"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#219EBC] focus:ring focus:ring-[#219EBC] focus:ring-opacity-50"
                               value="{{ old('contact_number', optional($profile)->contact_number) }}" required>
                        @error('contact_number')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end">
                    <button type="submit"
                            class="bg-[#219EBC] text-white px-4 py-2 rounded-md hover:bg-[#219EBC]/90 focus:outline-none focus:ring-2 focus:ring-[#219EBC] focus:ring-offset-2">
                        Update Profile
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-doctor.layout>
