<x-doctor.layout>
    <x-slot:title>Patient Details</x-slot>
    <x-slot:header>Patient Details</x-slot>
    <div class="space-y-6">
        <!-- Patient Information -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b border-gray-100">
                <h2 class="text-xl font-semibold text-gray-800">Patient Information</h2>
            </div>
            <div class="p-6">
                <dl class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Full Name</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $appointment->patient->first_name }} {{$appointment->patient->last_name}}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Email</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $appointment->patient->email }}</dd>
                    </div>

                    <div>
                        <dt class="text-sm font-medium text-gray-500">Reason</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $appointment->reason }}</dd>
                    </div>

                    @if($appointment->patient->patientProfile)
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Date of Birth</dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $appointment->patient->patientProfile->date_of_birth->format('M d, Y') }}
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Blood Group</dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $appointment->patient->patientProfile->blood_group }}
                            </dd>
                        </div>
                        <div class="md:col-span-2">
                            <dt class="text-sm font-medium text-gray-500">Medical History</dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $appointment->patient->patientProfile->medical_history ?? 'No medical history recorded' }}
                            </dd>
                        </div>
                    @endif
                </dl>
            </div>
        </div>
    </div>
</x-doctor.layout>
