@extends('admin.layouts.app')

@section('title', 'Edit Lead')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <div class="flex items-center justify-between mb-2">
            <a href="{{ route('admin.leads.show', $lead) }}" class="flex items-center text-primary-blue hover:text-secondary-green">
                <i data-lucide="arrow-left" class="w-5 h-5 mr-2"></i>
                Back to Lead Details
            </a>
        </div>
        <h1 class="text-3xl font-bold text-primary-blue">Edit Lead: {{ $lead->name }}</h1>
    </div>
    
    <div class="bg-white rounded-card shadow-sm p-6">
        <form action="{{ route('admin.leads.update', $lead) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <div>
                    <h2 class="text-lg font-bold text-primary-blue mb-4">Contact Information</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name <span class="text-red-500">*</span></label>
                            <input type="text" name="name" id="name" value="{{ old('name', $lead->name) }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50 @error('name') border-red-500 @enderror" required>
                            @error('name')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email <span class="text-red-500">*</span></label>
                            <input type="email" name="email" id="email" value="{{ old('email', $lead->email) }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50 @error('email') border-red-500 @enderror" required>
                            @error('email')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone <span class="text-red-500">*</span></label>
                            <input type="tel" name="phone" id="phone" value="{{ old('phone', $lead->phone) }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50 @error('phone') border-red-500 @enderror" required>
                            @error('phone')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="md:col-span-2">
                            <label for="company" class="block text-sm font-medium text-gray-700 mb-1">Company Name</label>
                            <input type="text" name="company" id="company" value="{{ old('company', $lead->company) }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50 @error('company') border-red-500 @enderror">
                            @error('company')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div>
                    <h2 class="text-lg font-bold text-primary-blue mb-4">Lead Details</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status <span class="text-red-500">*</span></label>
                            <select name="status" id="status" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50 @error('status') border-red-500 @enderror" required>
                                <option value="new" {{ old('status', $lead->status) == 'new' ? 'selected' : '' }}>New</option>
                                <option value="contacted" {{ old('status', $lead->status) == 'contacted' ? 'selected' : '' }}>Contacted</option>
                                <option value="quoted" {{ old('status', $lead->status) == 'quoted' ? 'selected' : '' }}>Quoted</option>
                                <option value="negotiating" {{ old('status', $lead->status) == 'negotiating' ? 'selected' : '' }}>Negotiating</option>
                                <option value="won" {{ old('status', $lead->status) == 'won' ? 'selected' : '' }}>Won</option>
                                <option value="lost" {{ old('status', $lead->status) == 'lost' ? 'selected' : '' }}>Lost</option>
                                <option value="cancelled" {{ old('status', $lead->status) == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="assigned_to" class="block text-sm font-medium text-gray-700 mb-1">Assign To</label>
                            <select name="assigned_to" id="assigned_to" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50 @error('assigned_to') border-red-500 @enderror">
                                <option value="">Unassigned</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ old('assigned_to', $lead->assigned_to) == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }} ({{ ucfirst($user->role) }})
                                    </option>
                                @endforeach
                            </select>
                            @error('assigned_to')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="source" class="block text-sm font-medium text-gray-700 mb-1">Source <span class="text-red-500">*</span></label>
                            <select name="source" id="source" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50 @error('source') border-red-500 @enderror" required>
                                <option value="website" {{ old('source', $lead->source) == 'website' ? 'selected' : '' }}>Website</option>
                                <option value="referral" {{ old('source', $lead->source) == 'referral' ? 'selected' : '' }}>Referral</option>
                                <option value="email" {{ old('source', $lead->source) == 'email' ? 'selected' : '' }}>Email Campaign</option>
                                <option value="phone" {{ old('source', $lead->source) == 'phone' ? 'selected' : '' }}>Phone Inquiry</option>
                                <option value="social" {{ old('source', $lead->source) == 'social' ? 'selected' : '' }}>Social Media</option>
                                <option value="partner" {{ old('source', $lead->source) == 'partner' ? 'selected' : '' }}>Partner</option>
                                <option value="other" {{ old('source', $lead->source) == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('source')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <label for="quoted_amount" class="block text-sm font-medium text-gray-700 mb-1">Quoted Amount</label>
                                <input type="number" name="quoted_amount" id="quoted_amount" value="{{ old('quoted_amount', $lead->quoted_amount) }}" step="0.01" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50 @error('quoted_amount') border-red-500 @enderror">
                                @error('quoted_amount')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="currency" class="block text-sm font-medium text-gray-700 mb-1">Currency</label>
                                <select name="currency" id="currency" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50 @error('currency') border-red-500 @enderror">
                                    <option value="USD" {{ old('currency', $lead->currency) == 'USD' ? 'selected' : '' }}>USD</option>
                                    <option value="EUR" {{ old('currency', $lead->currency) == 'EUR' ? 'selected' : '' }}>EUR</option>
                                    <option value="GBP" {{ old('currency', $lead->currency) == 'GBP' ? 'selected' : '' }}>GBP</option>
                                    <option value="INR" {{ old('currency', $lead->currency) == 'INR' ? 'selected' : '' }}>INR</option>
                                    <option value="AED" {{ old('currency', $lead->currency) == 'AED' ? 'selected' : '' }}>AED</option>
                                    <option value="SGD" {{ old('currency', $lead->currency) == 'SGD' ? 'selected' : '' }}>SGD</option>
                                </select>
                                @error('currency')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-200 pt-6 mb-6">
                <h2 class="text-lg font-bold text-primary-blue mb-4">Shipping Details</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="origin" class="block text-sm font-medium text-gray-700 mb-1">Origin <span class="text-red-500">*</span></label>
                        <input type="text" name="origin" id="origin" value="{{ old('origin', $lead->origin) }}" placeholder="City, Country" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50 @error('origin') border-red-500 @enderror" required>
                        @error('origin')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="destination" class="block text-sm font-medium text-gray-700 mb-1">Destination <span class="text-red-500">*</span></label>
                        <input type="text" name="destination" id="destination" value="{{ old('destination', $lead->destination) }}" placeholder="City, Country" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50 @error('destination') border-red-500 @enderror" required>
                        @error('destination')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="cargo_type" class="block text-sm font-medium text-gray-700 mb-1">Cargo Type <span class="text-red-500">*</span></label>
                        <select name="cargo_type" id="cargo_type" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50 @error('cargo_type') border-red-500 @enderror" required>
                            <option value="general" {{ old('cargo_type', $lead->cargo_type) == 'general' ? 'selected' : '' }}>General Cargo</option>
                            <option value="hazardous" {{ old('cargo_type', $lead->cargo_type) == 'hazardous' ? 'selected' : '' }}>Hazardous Materials</option>
                            <option value="perishable" {{ old('cargo_type', $lead->cargo_type) == 'perishable' ? 'selected' : '' }}>Perishable Goods</option>
                            <option value="oversized" {{ old('cargo_type', $lead->cargo_type) == 'oversized' ? 'selected' : '' }}>Oversized Cargo</option>
                        </select>
                        @error('cargo_type')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="shipping_mode" class="block text-sm font-medium text-gray-700 mb-1">Shipping Mode</label>
                        <select name="shipping_mode" id="shipping_mode" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50 @error('shipping_mode') border-red-500 @enderror">
                            <option value="">Select Shipping Mode</option>
                            <option value="ocean_fcl" {{ old('shipping_mode', $lead->shipping_mode) == 'ocean_fcl' ? 'selected' : '' }}>Ocean Freight (FCL)</option>
                            <option value="ocean_lcl" {{ old('shipping_mode', $lead->shipping_mode) == 'ocean_lcl' ? 'selected' : '' }}>Ocean Freight (LCL)</option>
                            <option value="air_standard" {{ old('shipping_mode', $lead->shipping_mode) == 'air_standard' ? 'selected' : '' }}>Air Freight (Standard)</option>
                            <option value="air_express" {{ old('shipping_mode', $lead->shipping_mode) == 'air_express' ? 'selected' : '' }}>Air Freight (Express)</option>
                            <option value="multimodal" {{ old('shipping_mode', $lead->shipping_mode) == 'multimodal' ? 'selected' : '' }}>Multimodal</option>
                        </select>
                        @error('shipping_mode')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="container_size" class="block text-sm font-medium text-gray-700 mb-1">Container Size</label>
                        <select name="container_size" id="container_size" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50 @error('container_size') border-red-500 @enderror">
                            <option value="">Select Container Size</option>
                            <option value="20ft" {{ old('container_size', $lead->container_size) == '20ft' ? 'selected' : '' }}>20ft Container</option>
                            <option value="40ft" {{ old('container_size', $lead->container_size) == '40ft' ? 'selected' : '' }}>40ft Container</option>
                            <option value="40ft_hc" {{ old('container_size', $lead->container_size) == '40ft_hc' ? 'selected' : '' }}>40ft High Cube</option>
                            <option value="lcl" {{ old('container_size', $lead->container_size) == 'lcl' ? 'selected' : '' }}>LCL (Shared Container)</option>
                            <option value="not_applicable" {{ old('container_size', $lead->container_size) == 'not_applicable' ? 'selected' : '' }}>Not Applicable</option>
                        </select>
                        @error('container_size')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="weight" class="block text-sm font-medium text-gray-700 mb-1">Weight</label>
                        <input type="text" name="weight" id="weight" value="{{ old('weight', $lead->weight) }}" placeholder="e.g. 500 kg" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50 @error('weight') border-red-500 @enderror">
                        @error('weight')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="dimensions" class="block text-sm font-medium text-gray-700 mb-1">Dimensions</label>
                        <input type="text" name="dimensions" id="dimensions" value="{{ old('dimensions', $lead->dimensions) }}" placeholder="e.g. 2x3x4 meters" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50 @error('dimensions') border-red-500 @enderror">
                        @error('dimensions')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="shipping_date" class="block text-sm font-medium text-gray-700 mb-1">Estimated Shipping Date</label>
                        <input type="date" name="shipping_date" id="shipping_date" value="{{ old('shipping_date', optional($lead->shipping_date)->format('Y-m-d')) }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50 @error('shipping_date') border-red-500 @enderror">
                        @error('shipping_date')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-200 pt-6">
                <div class="mb-4">
                    <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Additional Information</label>
                    <textarea name="message" id="message" rows="4" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50 @error('message') border-red-500 @enderror">{{ old('message', $lead->message) }}</textarea>
                    @error('message')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="flex justify-end space-x-3">
                    <a href="{{ route('admin.leads.show', $lead) }}" class="btn-secondary">Cancel</a>
                    <button type="submit" class="btn-primary bg-primary-blue">Update Lead</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
