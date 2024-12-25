<x-patient.layout>
    <x-slot:title>Appointment Details</x-slot>
    <x-slot:header>Appointment Details</x-slot>

    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b border-gray-100">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-gray-800">Appointment Information</h2>
                    <span class="px-2 py-1 text-sm font-semibold rounded-full
                        {{ $appointment->status === 'completed' ? 'bg-green-100 text-green-800' :
                           ($appointment->status === 'cancelled' ? 'bg-red-100 text-red-800' :
                            'bg-yellow-100 text-yellow-800') }}">
                        {{ ucfirst($appointment->status) }}
                    </span>
                </div>
            </div>

            <div class="p-6">
                <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
                    <!-- Doctor Information -->
                    <div class="col-span-2">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Doctor Information</h3>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Doctor Name</dt>
                        <dd class="mt-1 text-sm text-gray-900">Dr. {{ $appointment->doctor->full_name }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Specialization</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $appointment->doctor->doctorProfile->specialization ?? 'General' }}</dd>
                    </div>

                    <!-- Appointment Details -->
                    <div class="col-span-2 mt-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Appointment Details</h3>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Date</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $appointment->appointment_date->format('M d, Y') }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Time</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $appointment->appointment_time->format('h:i A') }}</dd>
                    </div>
                    <div class="col-span-2">
                        <dt class="text-sm font-medium text-gray-500">Reason for Visit</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $appointment->reason }}</dd>
                    </div>

                    @if($appointment->notes)
                        <div class="col-span-2">
                            <dt class="text-sm font-medium text-gray-500">Doctor's Notes</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $appointment->notes }}</dd>
                        </div>
                    @endif
                </dl>

                <!-- Actions -->
                <div class="mt-8 flex justify-between items-center border-t pt-6">
                    <a href="{{ route('patient.appointments') }}"
                       class="text-[#219EBC] hover:text-[#219EBC]/80">
                        &larr; Back to Appointments
                    </a>

                    @if($appointment->status === 'scheduled' && $appointment->appointment_date->gt(\Carbon\Carbon::today()))
                        <form action="{{ route('patient.appointments.cancel', $appointment) }}"
                              method="POST"
                              onsubmit="return confirm('Are you sure you want to cancel this appointment?');"
                              class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">
                                Cancel Appointment
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-patient.layout>
