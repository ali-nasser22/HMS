<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Hospital Management System' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{ $styles ?? '' }}
</head>
<body>
<!-- Header/Navigation -->
<header class="bg-[#023047] text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex-shrink-0">
                <a href="/" class="font-bold text-xl">HMS</a>
            </div>

            <nav class="flex space-x-4">
                @auth
                    <span class="text-gray-300">{{ auth()->user()->full_name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-300 hover:text-white">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-300 hover:text-white">Login</a>
                @endauth
            </nav>
        </div>
    </div>
</header>

<!-- Main Content -->
<main>
    {{ $slot }}
</main>

<!-- Footer -->
<footer class="bg-[#023047] text-white mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="text-center">
            <p>&copy; {{ date('Y') }} Hospital Management System. All rights reserved.</p>
        </div>
    </div>
</footer>

{{ $scripts ?? '' }}
</body>
</html>
