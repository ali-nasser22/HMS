<x-doctor.layout>
    <x-slot:title>Doctor Dashboard</x-slot>
    <x-slot:header>Dashboard Overview</x-slot>

    <div class="space-y-6">
        <!-- Stats Overview -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-500 text-sm">Today's Appointments</p>
                        <h3 class="text-2xl font-bold text-gray-800 mt-2">{{ $stats['today_appointments'] }}</h3>
                    </div>
                    <span class="bg-blue-100 text-[#219EBC] text-xs px-2 py-1 rounded-full">Today</span>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-500 text-sm">Total Patients</p>
                        <h3 class="text-2xl font-bold text-gray-800 mt-2">{{ $stats['total_patients'] }}</h3>
                    </div>
                    <span class="bg-green-100 text-green-600 text-xs px-2 py-1 rounded-full">All Time</span>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-500 text-sm">Upcoming</p>
                        <h3 class="text-2xl font-bold text-gray-800 mt-2">{{ $stats['upcoming_appointments'] }}</h3>
                    </div>
                    <span class="bg-yellow-100 text-yellow-600 text-xs px-2 py-1 rounded-full">Scheduled</span>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-500 text-sm">Completed</p>
                        <h3 class="text-2xl font-bold text-gray-800 mt-2">{{ $stats['completed_appointments'] }}</h3>
                    </div>
                    <span class="bg-purple-100 text-purple-600 text-xs px-2 py-1 rounded-full">Total</span>
                </div>
            </div>
        </div>

        <!-- Today's Schedule -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b border-gray-100">
                <h2 class="text-lg font-semibold text-gray-800">Today's Appointments</h2>
            </div>
            <div class="p-6">
                <div class="divide-y">
                    @forelse($todayAppointments as $appointment)
                        <div class="py-4 flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="bg-[#219EBC] rounded-full w-2 h-2 mr-4"></div>
                                <div>
                                    <h4 class="text-sm font-semibold text-gray-800">{{ $appointment->patient->full_name }}</h4>
                                    <p class="text-sm text-gray-500">{{ $appointment->reason }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-sm font-semibold text-gray-800">{{ $appointment->appointment_time->format('h:i A') }}</p>
                                <span class="text-xs px-2 py-1 rounded-full
                                    {{ $appointment->status === 'completed' ? 'bg-green-100 text-green-800' :
                                       ($appointment->status === 'cancelled' ? 'bg-red-100 text-red-800' :
                                        'bg-yellow-100 text-yellow-800') }}">
                                    {{ ucfirst($appointment->status) }}
                                </span>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500 text-center py-4">No appointments scheduled for today</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Recent Patients -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b border-gray-100">
                <h2 class="text-lg font-semibold text-gray-800">Recent Patients</h2>
            </div>
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Patient Name
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($recentPatients as $patient)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $patient->full_name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">{{ $patient->email }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('doctor.patients.show', $patient->id) }}"
                                       class="text-[#219EBC] hover:text-[#219EBC]/80">
                                        View Details
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                                    No recent patients
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-doctor.layout>
