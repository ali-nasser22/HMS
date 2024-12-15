<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<nav class="bg-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between h-16">
            <div class="flex">
                <a href="/" class="flex items-center">
                    <span class="text-xl font-semibold">HMS</span>
                </a>
            </div>
            <div class="flex items-center">
                @auth
                    <span class="text-gray-700 mr-4">{{ auth()->user()->full_name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:text-gray-900">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900">Login</a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<main class="max-w-7xl mx-auto py-6 px-4">
    @yield('content')
</main>
</body>
</html>
