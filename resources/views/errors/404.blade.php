<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-[#023047]">
<div class="absolute inset-0 bg-gradient-to-r from-[#023047] to-[#219EBC]/80"></div>

<div class="relative min-h-screen flex items-center justify-center p-4">
    <div class="max-w-xl w-full text-center">
        <!-- Error Code -->
        <h1 class="text-[150px] font-bold text-[#FFB703] leading-none">
            404
        </h1>

        <!-- Error Message -->
        <h2 class="text-2xl md:text-3xl font-bold text-white mb-8">
            Oops! Page not found
        </h2>

        <!-- Error Description -->
        <p class="text-[#8ECAE6] mb-8 text-lg">
            The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.
        </p>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/"
               class="bg-[#FFB703] hover:bg-[#FB8500] text-[#023047] px-8 py-3 rounded-lg font-semibold inline-flex items-center justify-center gap-2 transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span>Back to Home</span>
            </a>

            <button onclick="history.back()"
                    class="bg-transparent border-2 border-[#8ECAE6] text-white hover:bg-[#8ECAE6]/10 px-8 py-3 rounded-lg font-semibold inline-flex items-center justify-center gap-2 transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
                </svg>
                <span>Go Back</span>
            </button>
        </div>
    </div>
</div>
</body>
</html>
