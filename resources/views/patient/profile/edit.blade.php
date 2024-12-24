<x-patient.layout>
    <x-slot:title>Edit Profile</x-slot>
    <x-slot:header>Edit Profile</x-slot>

    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b border-gray-100">
                <h2 class="text-xl font-semibold text-gray-800">Profile Information</h2>
                <p class="mt-1 text-sm text-gray-500">Update your personal information and medical details.</p>
            </div>

            <form action="{{ route('patient.profile.update') }}" method="POST" class="p-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Personal Information -->
                    <div class="col-span-2">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Personal Information</h3>
                    </div>

                    <!-- Full Name (Read-only) -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" value="{{ $patient->full_name }}"
                               class="px-2 mt-1 block w-full rounded-md border-gray-300 bg-gray-50"
                               disabled>
                    </div>

                    <!-- Email (Read-only) -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" value="{{ $patient->email }}"
                               class="px-2 mt-1 block w-full rounded-md border-gray-300 bg-gray-50"
                               disabled>
                    </div>

                    <!-- Date of Birth -->
                    <div>
                        <label for="date_of_birth" class="block text-sm font-medium text-gray-700">
                            Date of Birth
                        </label>
                        <input type="date" name="date_of_birth" id="date_of_birth"
                               class="border px-2 mt-1 block w-full rounded-md border-gray-300 focus:border-[#219EBC] focus:ring focus:ring-[#219EBC] focus:ring-opacity-50"
                               value="{{ old('date_of_birth', $profile->date_of_birth->format('Y-m-d')) }}" required>
                        @error('date_of_birth')
                        <p class="border px-2 mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Blood Group -->
                    <div>
                        <label for="blood_group" class="block text-sm font-medium text-gray-700">
                            Blood Group
                        </label>
                        <select name="blood_group" id="blood_group"
                                class="border px-2 mt-1 block w-full rounded-md border-gray-300 focus:border-[#219EBC] focus:ring focus:ring-[#219EBC] focus:ring-opacity-50">
                            @foreach(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'] as $group)
                                <option value="{{ $group }}" {{ old('blood_group', $profile->blood_group) == $group ? 'selected' : '' }}>
                                    {{ $group }}
                                </option>
                            @endforeach
                        </select>
                        @error('blood_group')
                        <p class="px-2 mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Address -->
                    <div class="col-span-2">
                        <label for="address" class="block text-sm font-medium text-gray-700">
                            Address
                        </label>
                        <textarea name="address" id="address" rows="3"
                                  class="border px-2 mt-1 block w-full rounded-md border-gray-300 focus:border-[#219EBC] focus:ring focus:ring-[#219EBC] focus:ring-opacity-50"
                                  required>{{ old('address', $profile->address) }}</textarea>
                        @error('address')
                        <p class="px-2 mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Contact -->
                    <div class="col-span-2">
                        <label for="emergency_contact" class="block text-sm font-medium text-gray-700">
                            Contact
                        </label>
                        <input type="text" name="contact" id="contact"
                               class="border px-2 mt-1 block w-full rounded-md border-gray-300 focus:border-[#219EBC] focus:ring focus:ring-[#219EBC] focus:ring-opacity-50"
                               value="{{ old('contact', $profile->contact) }}" required>
                        @error('emergency_contact')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>


                    <!-- Emergency Contact -->
                    <div class="col-span-2">
                        <label for="emergency_contact" class="block text-sm font-medium text-gray-700">
                            Emergency Contact
                        </label>
                        <input type="text" name="emergency_contact" id="emergency_contact"
                               class="border px-2 mt-1 block w-full rounded-md border-gray-300 focus:border-[#219EBC] focus:ring focus:ring-[#219EBC] focus:ring-opacity-50"
                               value="{{ old('emergency_contact', $profile->emergency_contact) }}" required>
                        @error('emergency_contact')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Medical History -->
                    <div class="col-span-2">
                        <label for="medical_history" class="block text-sm font-medium text-gray-700">
                            Medical History
                        </label>
                        <textarea name="medical_history" id="medical_history" rows="4"
                                  class="border px-2 mt-1 block w-full rounded-md border-gray-300 focus:border-[#219EBC] focus:ring focus:ring-[#219EBC] focus:ring-opacity-50"
                                  placeholder="List any pre-existing conditions, allergies, or important medical information">{{ old('medical_history', $profile->medical_history) }}</textarea>
                        @error('medical_history')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="mt-6 flex items-center justify-end">
                    <button type="submit"
                            class="bg-[#219EBC] text-white px-4 py-2 rounded-lg hover:bg-[#219EBC]/90 focus:outline-none focus:ring-2 focus:ring-[#219EBC] focus:ring-offset-2">
                        Update Profile
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-patient.layout>
