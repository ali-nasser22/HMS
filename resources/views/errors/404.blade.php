@extends('layouts.app')

@section('title', '404 Not Found')

@section('content')
    <div class="flex items-center justify-center min-h-[60vh]">
        <div class="text-center">
            <h1 class="text-6xl font-bold text-gray-800 mb-4">404</h1>
            <p class="text-xl text-gray-600 mb-8">Page not found</p>
            <a href="{{ route('home') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Go Home
            </a>
        </div>
    </div>
@endsection
