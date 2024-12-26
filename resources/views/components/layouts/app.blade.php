<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Hospital Management System' }}</title>
    <!-- Add these lines for favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    {{ $styles ?? '' }}
</head>
<body class="flex flex-col min-h-screen">
<!-- Header/Navigation -->
<header class="bg-[#023047] text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center">
                <a href="/" class="font-bold text-xl">HMS</a>
                <nav class="ml-10">
                    <div class="space-x-8">
                        <a href="#about" class="text-white hover:text-[#FFB703] transition-colors">About Us</a>
                        <a href="#contact" class="text-white hover:text-[#FFB703] transition-colors">Contact</a>
                        <a href="#gallery" class="text-white hover:text-[#FFB703] transition-colors">Gallery</a>
                    </div>
                </nav>
            </div>

            <div class="flex items-center space-x-4">
                @auth
                    <span class="text-white">{{ auth()->user()->full_name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-white hover:text-[#FFB703] transition-colors">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-white hover:text-[#FFB703] transition-colors">
                        Login
                    </a>
                @endauth
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="flex-grow">
    {{ $slot }}
</main>

<!-- Footer -->
<footer class="bg-[#023047] text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="text-center">
            <p>&copy; {{ date('Y') }} Hospital Management System. All rights reserved.</p>
        </div>
    </div>
</footer>

{{ $scripts ?? '' }}
</body>
</html>
