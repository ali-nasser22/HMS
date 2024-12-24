<x-patient.layout>
    <x-slot:title>Patient Dashboard</x-slot>
    <x-slot:header>Dashboard Overview</x-slot>

    <div class="space-y-6">
        <!-- Stats Overview -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-500 text-sm">Upcoming Appointments</p>
                        <h3 class="text-2xl font-bold text-gray-800 mt-2">{{ $stats['upcoming_appointments'] }}</h3>
                    </div>
                    <span class="bg-blue-100 text-[#219EBC] text-xs px-2 py-1 rounded-full">Scheduled</span>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-500 text-sm">Total Appointments</p>
                        <h3 class="text-2xl font-bold text-gray-800 mt-2">{{ $stats['total_appointments'] }}</h3>
                    </div>
                    <span class="bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded-full">All Time</span>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-500 text-sm">Completed Appointments</p>
                        <h3 class="text-2xl font-bold text-gray-800 mt-2">{{ $stats['completed_appointments'] }}</h3>
                    </div>
                    <span class="bg-green-100 text-green-600 text-xs px-2 py-1 rounded-full">Completed</span>
                </div>
            </div>
        </div>

        <!-- Upcoming Appointments -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b border-gray-100">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-gray-800">Upcoming Appointments</h2>
                    <a href="{{ route('patient.appointments.create') }}"
                       class="bg-[#219EBC] text-white px-4 py-2 rounded-lg hover:bg-[#219EBC]/90">
                        Book Appointment
                    </a>
                </div>
            </div>
            <div class="p-6">
                <div class="divide-y">
                    @forelse($upcomingAppointments as $appointment)
                        <div class="py-4 flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="bg-[#219EBC] rounded-full w-2 h-2 mr-4"></div>
                                <div>
                                    <h4 class="text-sm font-semibold text-gray-800">
                                        Dr. {{ $appointment->doctor->full_name }}
                                    </h4>
                                    <p class="text-sm text-gray-500">{{ $appointment->reason }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-sm font-semibold text-gray-800">
                                    {{ $appointment->appointment_date->format('M d, Y') }}
                                </p>
                                <p class="text-sm text-gray-500">
                                    {{ $appointment->appointment_time->format('h:i A') }}
                                </p>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500 text-center py-4">No upcoming appointments</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-patient.layout>
