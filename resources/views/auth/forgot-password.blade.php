@extends('layouts.app')

@section('title', 'Forgot Password')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-xl">
        <div class="p-8">
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold text-primary-blue">Forgot Password</h2>
                <p class="mt-2 text-gray-600">Enter your email address and we'll send you a link to reset your password.</p>
            </div>
            
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600 bg-green-50 p-4 rounded-lg">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <input id="email" class="form-input w-full rounded-md border-gray-300 shadow-sm focus:border-primary-blue focus:ring focus:ring-primary-blue focus:ring-opacity-50" 
                           type="email" name="email" value="{{ old('email') }}" required autofocus />
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between mt-8">
                    <a href="{{ route('login') }}" class="text-sm text-primary-blue hover:text-secondary-green">
                        Back to login
                    </a>
                    <button type="submit" class="btn-primary bg-primary-blue">
                        Send Password Reset Link
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
