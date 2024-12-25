<x-doctor.layout>
    <x-slot:title>Appointments</x-slot>
    <x-slot:header>Appointments</x-slot>

    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b border-gray-100">
            <h2 class="text-xl font-semibold text-gray-800">Appointments List</h2>
        </div>

        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Patient
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Date & Time
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($appointments as $appointment)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $appointment->patient->full_name }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ $appointment->appointment_date->format('M d, Y') }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ $appointment->appointment_time->format('h:i A') }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                        {{ $appointment->status === 'completed' ? 'bg-green-100 text-green-800' :
                                           ($appointment->status === 'cancelled' ? 'bg-red-100 text-red-800' :
                                            'bg-yellow-100 text-yellow-800') }}">
                                        {{ ucfirst($appointment->status) }}
                                    </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                @if($appointment->status === 'scheduled')
                                    <form action="{{ route('doctor.appointments.update', $appointment) }}"
                                          method="POST"
                                          class="inline-block">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                                class="text-green-600 hover:text-green-900 mr-4">
                                            Complete
                                        </button>
                                    </form>
                                @endif
                                <a href="{{ route('doctor.appointments.show', $appointment) }}"
                                   class="text-[#219EBC] hover:text-[#219EBC]/80">
                                    View Details
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                No appointments found
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $appointments->links() }}
            </div>
        </div>
    </div>
</x-doctor.layout>
