<x-patient.layout>
    <x-slot:title>Book Appointment</x-slot>
    <x-slot:header>Book New Appointment</x-slot>

    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b border-gray-100">
                <h2 class="text-xl font-semibold text-gray-800">Book an Appointment</h2>
                <p class="mt-1 text-sm text-gray-500">Fill in the details to book your appointment</p>
            </div>

            <form action="{{ route('patient.appointments.store') }}" method="POST" class="p-6">
                @csrf

                <div class="space-y-6">
                    <!-- Doctor Selection -->
                    <div>
                        <label for="doctor_id" class="block text-sm font-medium text-gray-700">Select Doctor</label>
                        <select name="doctor_id" id="doctor_id" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#219EBC] focus:ring focus:ring-[#219EBC] focus:ring-opacity-50">
                            <option value="">Choose a doctor</option>
                            @foreach($doctors as $doctor)
                                <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                                    Dr. {{ $doctor->full_name }} - {{ $doctor->doctorProfile->specialization }}
                                </option>
                            @endforeach
                        </select>
                        @error('doctor_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Date -->
                    <div>
                        <label for="appointment_date" class="block text-sm font-medium text-gray-700">
                            Preferred Date
                        </label>
                        <input type="date" name="appointment_date" id="appointment_date"
                               min="{{ date('Y-m-d') }}"
                               value="{{ old('appointment_date') }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#219EBC] focus:ring focus:ring-[#219EBC] focus:ring-opacity-50"
                               required>
                        @error('appointment_date')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Time -->
                    <div>
                        <label for="appointment_time" class="block text-sm font-medium text-gray-700">
                            Preferred Time
                        </label>
                        <select name="appointment_time" id="appointment_time" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#219EBC] focus:ring focus:ring-[#219EBC] focus:ring-opacity-50">
                            <option value="">Select time</option>
                            @foreach(['09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00',
                                    '14:00', '14:30', '15:00', '15:30', '16:00', '16:30'] as $time)
                                <option value="{{ $time }}" {{ old('appointment_time') == $time ? 'selected' : '' }}>
                                    {{ date('h:i A', strtotime($time)) }}
                                </option>
                            @endforeach
                        </select>
                        @error('appointment_time')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Reason -->
                    <div>
                        <label for="reason" class="block text-sm font-medium text-gray-700">
                            Reason for Visit
                        </label>
                        <input type="text" name="reason" id="reason"
                               value="{{ old('reason') }}"
                               class="px-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#219EBC] focus:ring focus:ring-[#219EBC] focus:ring-opacity-50"
                               required>
                        @error('reason')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end space-x-4">
                        <a href="{{ route('patient.appointments') }}"
                           class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200">
                            Cancel
                        </a>
                        <button type="submit"
                                class="bg-[#219EBC] text-white px-4 py-2 rounded-lg hover:bg-[#219EBC]/90">
                            Book Appointment
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-patient.layout>
