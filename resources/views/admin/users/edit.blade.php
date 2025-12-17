@extends('admin.layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <div class="flex items-center justify-between mb-2">
            <a href="{{ route('admin.users.index') }}" class="flex items-center text-primary-blue hover:text-secondary-green">
                <i data-lucide="arrow-left" class="w-5 h-5 mr-2"></i>
                Back to Users
            </a>
        </div>
        <h1 class="text-3xl font-bold text-primary-blue">Edit User: {{ $user->name }}</h1>
    </div>
    
    <div class="bg-white rounded-card shadow-sm p-6">
        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Basic Information -->
                <div>
                    <h2 class="text-lg font-bold text-primary-blue mb-4">User Information</h2>
                    
                    <div class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name <span class="text-red-500">*</span></label>
                            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50 @error('name') border-red-500 @enderror" required>
                            @error('name')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address <span class="text-red-500">*</span></label>
                            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50 @error('email') border-red-500 @enderror" required>
                            @error('email')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Role <span class="text-red-500">*</span></label>
                            <select name="role" id="role" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50 @error('role') border-red-500 @enderror" required>
                                <option value="sales" {{ old('role', $user->role) == 'sales' ? 'selected' : '' }}>Sales</option>
                                <option value="support" {{ old('role', $user->role) == 'support' ? 'selected' : '' }}>Support</option>
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Administrator</option>
                            </select>
                            @error('role')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <!-- Additional Information -->
                <div>
                    <h2 class="text-lg font-bold text-primary-blue mb-4">Additional Information</h2>
                    
                    <div class="space-y-4">
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                            <input type="tel" name="phone" id="phone" value="{{ old('phone', $user->phone) }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50 @error('phone') border-red-500 @enderror">
                            @error('phone')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Job Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $user->title) }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50 @error('title') border-red-500 @enderror">
                            @error('title')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-200 mt-6 pt-6">
                <h2 class="text-lg font-bold text-primary-blue mb-4">Update Password</h2>
                <p class="text-sm text-gray-500 mb-4">Leave password fields blank if you don't want to change it.</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                        <input type="password" name="password" id="password" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50 @error('password') border-red-500 @enderror">
                        @error('password')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm New Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50">
                    </div>
                </div>
                
                <div class="mt-4 text-sm text-gray-500">
                    <p>Password must be at least 8 characters and contain a mix of letters, numbers, and special characters.</p>
                </div>
            </div>
            
            <div class="flex justify-end space-x-3 mt-6">
                <a href="{{ route('admin.users.index') }}" class="btn-secondary">Cancel</a>
                <button type="submit" class="btn-primary bg-primary-blue">Update User</button>
            </div>
        </form>
    </div>
</div>
@endsection
