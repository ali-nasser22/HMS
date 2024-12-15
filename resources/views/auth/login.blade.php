<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
    <style>
        .form-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 15px;
        }

        .input-field {
            background-color: #f7f7f7;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 12px;
            font-size: 1rem;
            width: 100%;
            transition: border-color 0.3s, background-color 0.3s;
        }

        .input-field:focus {
            border-color: #219EBC;
            background-color: #e9f9fb;
        }

        .error-message {
            color: #e63946;
            font-size: 0.875rem;
            margin-top: 5px;
        }

        .btn-submit {
            background-color: #FFB703;
            color: #023047;
            padding: 12px 0;
            width: 100%;
            border-radius: 8px;
            font-weight: 600;
            text-align: center;
            transition: background-color 0.3s;
        }

        .btn-submit:hover {
            background-color: #FB8500;
        }

        .btn-back {
            color: #8ECAE6;
            font-size: 1rem;
            margin-top: 15px;
            text-decoration: none;
            transition: color 0.3s;
        }

        .btn-back:hover {
            color: #ffffff;
        }

        .header-text {
            font-size: 1.5rem;
            font-weight: 600;
            color: #023047;
            margin-bottom: 15px;
        }

        .form-section {
            padding: 25px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .logo-container {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo-container h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 10px;
        }

        .logo-container p {
            color: #8ECAE6;
            font-size: 1rem;
        }
    </style>
</head>
<body>

<!-- Login Section -->
<section class="min-h-screen flex items-center justify-center bg-[#023047]">
    <div class="absolute inset-0 bg-gradient-to-r from-[#023047] to-[#219EBC]/80"></div>

    <div class="relative w-full max-w-md px-4 py-12">
        <!-- Logo or System Name -->
        <div class="logo-container">
            <h1>HMS</h1>
            <p>Hospital Management System</p>
        </div>

        <!-- Login Form -->
        <div class="form-card form-section">
            <h2 class="header-text text-center">Welcome Back</h2>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                    <input type="email"
                           name="email"
                           id="email"
                           value="{{ old('email') }}"
                           class="input-field"
                           required
                           autofocus>
                    @error('email')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input type="password"
                           name="password"
                           id="password"
                           class="input-field"
                           required>
                    @error('password')
                    <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input type="checkbox"
                               name="remember"
                               id="remember"
                               class="h-4 w-4 text-[#219EBC] focus:ring-[#219EBC] border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-700">Remember me</label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" class="btn-submit">
                        Sign In
                        <svg class="w-5 h-5 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>

        <!-- Back to Home -->
        <div class="text-center mt-6">
            <a href="/" class="btn-back">
                ← Back to Home
            </a>
        </div>
    </div>
</section>
</body>
</html>
