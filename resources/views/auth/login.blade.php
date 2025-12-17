@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-background-light-grey">
    <div class="w-full max-w-md p-8 bg-white shadow-lg rounded-card">
        <div class="text-center mb-8">
            <img src="{{ asset('images/logo.png') }}" alt="Marinexa Shipping" class="h-12 mx-auto mb-6">
            <h1 class="text-2xl font-bold text-primary-blue">Login to Admin Panel</h1>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6">
                <p class="font-bold">Please check the following errors:</p>
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus 
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input id="password" type="password" name="password" required 
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50">
            </div>

            <div class="flex items-center">
                <input id="remember" type="checkbox" name="remember" 
                    class="rounded border-gray-300 text-secondary-green shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50">
                <label for="remember" class="ml-2 block text-sm text-gray-700">Remember me</label>
            </div>

            <div>
                <button type="submit" class="w-full btn-primary bg-primary-blue py-3">
                    Login
                </button>
            </div>

            <div class="text-center">
                <a href="{{ route('password.request') }}" class="text-sm text-secondary-green hover:text-primary-blue">
                    Forgot your password?
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
