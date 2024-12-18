<x-admin.layout>
    <x-slot:title>Dashboard</x-slot>
    <x-slot:header>Dashboard</x-slot>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Statistics Cards -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div>
                    <p class="text-gray-500">Total Doctors</p>
                    <p class="text-3xl font-bold">{{ $stats['doctors'] }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div>
                    <p class="text-gray-500">Total Patients</p>
                    <p class="text-3xl font-bold">{{ $stats['patients'] }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div>
                    <p class="text-gray-500">Total Users</p>
                    <p class="text-3xl font-bold">{{ $stats['total_users'] }}</p>
                </div>
            </div>
        </div>

        <!-- Recent Activity Section -->
        <div class="bg-white rounded-lg shadow p-6 md:col-span-3">
            <h2 class="text-xl font-semibold mb-4">Recent Activity</h2>
            <div class="text-gray-500">
                No recent activity
            </div>
        </div>
    </div>
</x-admin.layout>
