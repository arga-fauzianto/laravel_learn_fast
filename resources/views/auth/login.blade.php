@extends('auth.auth')
@section('title', 'Login')
@section('content')
<div class="min-h-screen bg-white flex items-center justify-center">
    <!-- Container for all content -->
    <div class="w-full max-w-md px-4">
        <!-- Logo and Main Card -->
        <div class="bg-white shadow-lg rounded-lg p-8 mb-6">
            <!-- Trello Logo -->
            <div class="flex justify-center mb-6">
                <div class="flex items-center">
                    <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="w-10 h-10">
                    <span class="text-blue-600 text-2xl font-bold ml-2 font-poppins">Task Management Daily</span>
                </div>
            </div>
            
            <!-- Log in text -->
            <h1 class="text-center text-gray-700 text-lg font-normal mb-6 font-poppins">Log in to continue</h1>
            
            <!-- Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf
                <!-- Success/Error Messages -->
                @if (session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded">
                        <p class="font-bold">Sukses!</p>
                        <p>{{ session('success') }}</p>
                    </div>
                @endif
               
                @if ($errors->any())
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-3 mb-4 rounded">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                
                <!-- Email Input -->
                <div>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        placeholder="Enter your email"
                        class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
                        required
                    >
                </div>
                
                <!-- Password Input -->
                <div>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        placeholder="Enter your password"
                        class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
                        required
                    >
                </div>
                
                <!-- Role Select -->
                {{-- <div>
                    <select
                        id="role"
                        name="role"
                        class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
                        required
                    >
                        <option value="" disabled selected>Select your role</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                        <option value="manager">Manager</option>
                    </select>
                </div> --}}
                
                <!-- Remember Me -->
                <div class="flex items-center">
                    <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-sm text-gray-700">
                        Remember me
                    </label>
                    <span class="ml-1 text-gray-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </span>
                </div>
                
                <!-- Continue Button -->
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded transition duration-150">
                    Continue
                </button>
            </form>
            
        </div>
        
        <!-- Footer Links -->
        <div class="text-center">
            <div class="flex justify-center space-x-2 text-sm text-blue-500">
                <p class="font-light font-poppins text-black">Already have an account?</p>
                <span class="text-gray-400">•</span>
                <a href="{{ route('register') }}" class="hover:underline">Create an account</a>
            </div>
        </div>
    </div>
    
    <!-- Left Background Illustration -->
    <div class="hidden md:block fixed left-0 bottom-0">
        <img src="{{ asset('images/left.svg') }}" alt="Left Illustration" class="w-64 h-auto">
    </div>
    
    <!-- Right Background Illustration -->
    <div class="hidden md:block fixed right-0 bottom-0">
        <img src="{{ asset('images/right.svg') }}" alt="Right Illustration" class="w-64 h-auto">
    </div>
</div>
@endsection