<x-layouts.app>
    <x-slot:title>Welcome to Hospital Management System</x-slot>

    <x-slot:styles>
        <style>
            .stat-number {
                opacity: 0;
                transform: translateY(20px);
                transition: all 0.6s ease-out;
            }
            .stat-number.visible {
                opacity: 1;
                transform: translateY(0);
            }
            .card-hover {
                transition: all 0.3s ease;
            }
            .card-hover:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            }
        </style>
    </x-slot>

    <!-- Hero Section with Video/Image Background -->
    <section class="relative min-h-[600px] flex items-center bg-[#023047]">
        <div class="absolute inset-0 bg-gradient-to-r from-[#023047] to-[#219EBC]/80"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div class="text-center lg:text-left">
                    <span class="inline-block bg-[#219EBC]/20 text-[#8ECAE6] px-4 py-2 rounded-full text-sm font-medium mb-4">
                        Healthcare Management Simplified
                    </span>
                    <h1 class="text-4xl lg:text-6xl font-bold text-white mb-6">
                        Next Generation Healthcare Management
                    </h1>
                    <p class="text-lg text-[#8ECAE6] mb-8 max-w-xl">
                        Experience seamless healthcare administration with our comprehensive management system.
                        Designed for modern medical facilities.
                    </p>
                    <div class="flex flex-wrap gap-4 justify-center lg:justify-start">
                        @auth
                            @if(auth()->user()->hasRole('admin'))
                                <a href="{{ route('admin.dashboard') }}"
                                   class="bg-[#FFB703] hover:bg-[#FB8500] text-[#023047] px-8 py-4 rounded-lg font-semibold inline-flex items-center gap-2 transition-all">
                                    <span>Go to Dashboard</span>
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </a>
                            @endif
                        @else
                            <a href="{{ route('login') }}"
                               class="bg-[#FFB703] hover:bg-[#FB8500] text-[#023047] px-8 py-4 rounded-lg font-semibold inline-flex items-center gap-2 transition-all">
                                <span>Get Started</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </a>
                        @endauth
                        <a href="#features" class="text-white hover:text-[#FFB703] px-8 py-4 rounded-lg font-semibold inline-flex items-center gap-2 transition-colors">
                            Learn More
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </a>
                    </div>
                </div>
                <!-- Right Content - Features Preview -->
                <div class="hidden lg:block">
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 shadow-xl">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-[#219EBC]/10 p-4 rounded-lg">
                                <h3 class="text-[#FFB703] font-semibold mb-2">Quick Access</h3>
                                <p class="text-white text-sm">Instant access to patient records and appointments</p>
                            </div>
                            <div class="bg-[#219EBC]/10 p-4 rounded-lg">
                                <h3 class="text-[#FFB703] font-semibold mb-2">Real-time Updates</h3>
                                <p class="text-white text-sm">Live tracking of patient status and appointments</p>
                            </div>
                            <div class="bg-[#219EBC]/10 p-4 rounded-lg">
                                <h3 class="text-[#FFB703] font-semibold mb-2">Smart Analytics</h3>
                                <p class="text-white text-sm">Comprehensive reports and insights</p>
                            </div>
                            <div class="bg-[#219EBC]/10 p-4 rounded-lg">
                                <h3 class="text-[#FFB703] font-semibold mb-2">Secure Data</h3>
                                <p class="text-white text-sm">Enhanced security measures for patient data</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl lg:text-4xl font-bold text-[#023047] mb-4">
                    Powerful Features for Modern Healthcare
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Our comprehensive suite of tools helps streamline your healthcare facility's operations
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature Cards -->
                <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                    <div class="w-12 h-12 bg-[#219EBC] rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-[#023047] mb-2">Patient Management</h3>
                    <p class="text-gray-600">Complete patient history, medical records, and appointment tracking in one place.</p>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                    <div class="w-12 h-12 bg-[#FFB703] rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-[#023047] mb-2">Smart Scheduling</h3>
                    <p class="text-gray-600">Intelligent appointment scheduling system with automated reminders.</p>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 card-hover border border-gray-100">
                    <div class="w-12 h-12 bg-[#FB8500] rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-[#023047] mb-2">Advanced Analytics</h3>
                    <p class="text-gray-600">Comprehensive reporting and analytics for informed decision making.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="bg-[#219EBC] py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl lg:text-4xl font-bold text-white mb-8">
                Ready to Transform Your Healthcare Management?
            </h2>
            <a href="{{ route('login') }}"
               class="bg-[#FFB703] hover:bg-[#FB8500] text-[#023047] px-8 py-4 rounded-lg font-semibold inline-flex items-center gap-2 transition-all">
                Get Started Today
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </a>
        </div>
    </section>
</x-layouts.app>
