<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<div class="min-h-screen flex">
    <!-- Sidebar -->
    <div class="w-64 bg-white shadow-lg">
        <div class="flex items-center justify-center h-16 border-b">
            <span class="text-xl font-semibold">HMS Admin</span>
        </div>
        <nav class="mt-6">
            <ul>
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                       class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-100">
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-100">
                        <span>Users Management</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-100">
                        <span>About Us</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-100">
                        <span>Contact Us</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-100">
                        <span>Images</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1">
        <!-- Top Navigation -->
        <div class="bg-white shadow-sm">
            <div class="flex justify-between items-center px-6 h-16">
                <h1 class="text-2xl font-semibold">@yield('header')</h1>
                <div class="flex items-center">
                    <span class="text-gray-700 mr-4">{{ auth()->user()->full_name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:text-gray-900">Logout</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <div class="p-6">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
