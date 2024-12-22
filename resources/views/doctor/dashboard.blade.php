<x-doctor.layout>
    <x-slot:title>Doctor Dashboard</x-slot>
    <x-slot:header>Dashboard Overview</x-slot>

    <div class="space-y-6">
        <!-- Stats Overview -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Today's Appointments -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-500 text-sm">Today's Appointments</p>
                        <h3 class="text-2xl font-bold text-gray-800 mt-2">{{ $stats['today_appointments'] }}</h3>
                    </div>
                    <span class="bg-blue-100 text-[#219EBC] text-xs px-2 py-1 rounded-full">Today</span>
                </div>
            </div>

            <!-- Total Patients -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-500 text-sm">Total Patients</p>
                        <h3 class="text-2xl font-bold text-gray-800 mt-2">{{ $stats['total_patients'] }}</h3>
                    </div>
                    <span class="bg-green-100 text-green-600 text-xs px-2 py-1 rounded-full">All Time</span>
                </div>
            </div>

            <!-- Upcoming Appointments -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-500 text-sm">Upcoming</p>
                        <h3 class="text-2xl font-bold text-gray-800 mt-2">{{ $stats['upcoming_appointments'] }}</h3>
                    </div>
                    <span class="bg-yellow-100 text-yellow-600 text-xs px-2 py-1 rounded-full">This Week</span>
                </div>
            </div>

            <!-- Completed Appointments -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-500 text-sm">Completed</p>
                        <h3 class="text-2xl font-bold text-gray-800 mt-2">{{ $stats['completed_appointments'] }}</h3>
                    </div>
                    <span class="bg-purple-100 text-purple-600 text-xs px-2 py-1 rounded-full">This Month</span>
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
                                Patient
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Last Visit
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
                        @forelse($recentPatients as $patient)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $patient->full_name }}</div>
                                    <div class="text-sm text-gray-500">{{ $patient->email }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($patient->appointments->first())
                                        <div class="text-sm text-gray-900">
                                            {{ $patient->appointments->first()->appointment_date->format('M d, Y') }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ $patient->appointments->first()->appointment_time->format('h:i A') }}
                                        </div>
                                    @else
                                        <div class="text-sm text-gray-500">No visits yet</div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($patient->appointments->first())
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                                {{ $patient->appointments->first()->status === 'completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                                {{ ucfirst($patient->appointments->first()->status) }}
                                            </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('doctor.patients.show', $patient) }}" class="text-[#219EBC] hover:text-[#219EBC]/80">
                                        View Details
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                    No patients found
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
