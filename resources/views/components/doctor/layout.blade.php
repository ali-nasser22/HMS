<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Doctor Dashboard' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{ $styles ?? '' }}
</head>
<body class="min-h-screen bg-gray-100">
<div class="flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-[#023047] min-h-screen fixed">
        <div class="flex items-center justify-center h-16 bg-[#023047] text-white">
            <span class="text-2xl font-bold">HMS Doctor</span>
        </div>
        <nav class="mt-6">
            <ul class="space-y-1">
                <li>
                    <a href="{{ route('doctor.dashboard') }}"
                       class="flex items-center px-6 py-3 text-white hover:bg-[#219EBC] group">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('doctor.appointments') }}"
                       class="flex items-center px-6 py-3 text-white hover:bg-[#219EBC] group">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Appointments
                    </a>
                </li>
                <li>
                    <a href="{{ route('doctor.patients') }}"
                       class="flex items-center px-6 py-3 text-white hover:bg-[#219EBC] group">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        My Patients
                    </a>
                </li>
                <li>
                    <a href="{{ route('doctor.profile') }}"
                       class="flex items-center px-6 py-3 text-white hover:bg-[#219EBC] group">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Profile
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 ml-64">
        <!-- Top Bar -->
        <header class="bg-white shadow h-16 fixed right-0 left-64 top-0 z-10">
            <div class="flex items-center justify-between h-full px-6">
                <h1 class="text-xl font-semibold text-gray-800">{{ $header ?? '' }}</h1>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">Dr. {{ auth()->user()->full_name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:text-gray-900">Logout</button>
                    </form>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="p-6 mt-16">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            {{ $slot }}
        </main>
    </div>
</div>

{{ $scripts ?? '' }}
</body>
</html>
