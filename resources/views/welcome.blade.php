@extends('layouts.app')

@section('title', 'Welcome to Hospital Management System')

@section('content')
    <div class="relative isolate">
        <!-- Hero section -->
        <div class="relative px-6 lg:px-8">
            <div class="mx-auto max-w-4xl py-16">
                <div class="text-center">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">
                        Welcome to Hospital Management System
                    </h1>
                    <p class="mt-6 text-lg leading-8 text-gray-600">
                        Providing efficient healthcare management solutions for better patient care
                    </p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        @auth
                            @if(auth()->user()->hasRole('admin'))
                                <a href="{{ route('admin.dashboard') }}" class="rounded-md bg-blue-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                                    Go to Dashboard
                                </a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="rounded-md bg-blue-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                                Login
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>

        <!-- Features section -->
        <div class="mx-auto mt-8 max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    Everything you need to manage healthcare
                </h2>
            </div>
            <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-none">
                <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-3">
                    <!-- Feature 1 -->
                    <div class="flex flex-col">
                        <dt class="font-semibold text-gray-900">
                            Patient Management
                        </dt>
                        <dd class="mt-1 flex flex-auto flex-col text-base leading-7 text-gray-600">
                            <p class="flex-auto">Efficiently manage patient records, appointments, and medical histories.</p>
                        </dd>
                    </div>

                    <!-- Feature 2 -->
                    <div class="flex flex-col">
                        <dt class="font-semibold text-gray-900">
                            Doctor Scheduling
                        </dt>
                        <dd class="mt-1 flex flex-auto flex-col text-base leading-7 text-gray-600">
                            <p class="flex-auto">Organize doctor schedules, appointments, and specializations.</p>
                        </dd>
                    </div>

                    <!-- Feature 3 -->
                    <div class="flex flex-col">
                        <dt class="font-semibold text-gray-900">
                            Administrative Tools
                        </dt>
                        <dd class="mt-1 flex flex-auto flex-col text-base leading-7 text-gray-600">
                            <p class="flex-auto">Complete suite of tools for hospital administration and management.</p>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
@endsection
