@extends('layouts.app')

@section('title', $route['origin'] . ' to ' . $route['destination'] . ' Shipping Route')

@section('meta_description', 'Shipping logistics from ' . $route['origin'] . ' to ' . $route['destination'] . '. View schedules, transit times and book cargo shipments with Marinexa Shipping.')

@section('content')
    <!-- Hero Section -->
    <section class="relative">
        <div class="h-[300px] md:h-[400px] overflow-hidden">
            <img src="{{ asset($route['banner']) }}" alt="{{ $route['origin'] }} to {{ $route['destination'] }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-primary-blue opacity-60"></div>
        </div>
        <div class="absolute inset-0 flex items-center">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                <div class="text-center text-white">
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ $route['origin'] }} to {{ $route['destination'] }}</h1>
                    <div class="flex items-center justify-center">
                        <span class="flex items-center">
                            <i data-lucide="map-pin" class="w-5 h-5 mr-2"></i>
                            <span>{{ $route['origin_country'] }}</span>
                        </span>
                        <i data-lucide="arrow-right" class="w-5 h-5 mx-4"></i>
                        <span class="flex items-center">
                            <i data-lucide="map-pin" class="w-5 h-5 mr-2"></i>
                            <span>{{ $route['destination_country'] }}</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Route Details -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <!-- Main Content -->
                <div class="md:col-span-2">
                    <!-- Route Description -->
                    <div class="prose prose-lg max-w-none mb-12">
                        <h2>Route Overview</h2>
                        <p>{{ $route['description'] }}</p>
                        {!! $route['details'] !!}
                    </div>
                    
                    <!-- Transit Time & Frequency -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                        <div class="bg-white rounded-card p-6 shadow-sm">
                            <h3 class="text-xl font-bold text-primary-blue mb-6">Transit Times</h3>
                            <ul class="space-y-4">
                                <li class="flex items-start">
                                    <div class="bg-secondary-green bg-opacity-10 p-2 rounded-full mr-3">
                                        <i data-lucide="ship" class="w-5 h-5 text-secondary-green"></i>
                                    </div>
                                    <div>
                                        <p class="font-bold">Ocean FCL</p>
                                        <p>{{ $route['transit_time']['ocean_fcl'] }}</p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <div class="bg-secondary-green bg-opacity-10 p-2 rounded-full mr-3">
                                        <i data-lucide="package" class="w-5 h-5 text-secondary-green"></i>
                                    </div>
                                    <div>
                                        <p class="font-bold">Ocean LCL</p>
                                        <p>{{ $route['transit_time']['ocean_lcl'] }}</p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <div class="bg-secondary-green bg-opacity-10 p-2 rounded-full mr-3">
                                        <i data-lucide="plane" class="w-5 h-5 text-secondary-green"></i>
                                    </div>
                                    <div>
                                        <p class="font-bold">Air Standard</p>
                                        <p>{{ $route['transit_time']['air_standard'] }}</p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <div class="bg-secondary-green bg-opacity-10 p-2 rounded-full mr-3">
                                        <i data-lucide="zap" class="w-5 h-5 text-secondary-green"></i>
                                    </div>
                                    <div>
                                        <p class="font-bold">Air Express</p>
                                        <p>{{ $route['transit_time']['air_express'] }}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="bg-white rounded-card p-6 shadow-sm">
                            <h3 class="text-xl font-bold text-primary-blue mb-6">Departure Frequency</h3>
                            <ul class="space-y-4">
                                <li class="flex items-start">
                                    <div class="bg-secondary-green bg-opacity-10 p-2 rounded-full mr-3">
                                        <i data-lucide="ship" class="w-5 h-5 text-secondary-green"></i>
                                    </div>
                                    <div>
                                        <p class="font-bold">Ocean Freight</p>
                                        <p>{{ $route['frequency']['ocean'] }}</p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <div class="bg-secondary-green bg-opacity-10 p-2 rounded-full mr-3">
                                        <i data-lucide="plane" class="w-5 h-5 text-secondary-green"></i>
                                    </div>
                                    <div>
                                        <p class="font-bold">Air Freight</p>
                                        <p>{{ $route['frequency']['air'] }}</p>
                                    </div>
                                </li>
                            </ul>
                            
                            <div class="mt-6">
                                <h4 class="font-bold mb-2">Key Ports & Airports</h4>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <p class="text-sm text-gray-500">Origin:</p>
                                        <ul class="list-disc pl-5">
                                            @foreach($route['key_ports']['origin'] as $port)
                                                <li>{{ $port }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Destination:</p>
                                        <ul class="list-disc pl-5">
                                            @foreach($route['key_ports']['destination'] as $port)
                                                <li>{{ $port }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Services Available -->
                    <div class="bg-white rounded-card p-6 shadow-sm mb-12">
                        <h3 class="text-xl font-bold text-primary-blue mb-6">Available Services</h3>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach($route['services_available'] as $service)
                            <div class="flex items-center p-3 bg-background-light-grey rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-secondary-green mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                {{ $service }}
                            </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <!-- Popular Commodities -->
                    <div class="bg-white rounded-card p-6 shadow-sm">
                        <h3 class="text-xl font-bold text-primary-blue mb-6">Popular Commodities on This Route</h3>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach($route['popular_commodities'] as $commodity)
                            <div class="flex items-center p-3 bg-background-light-grey rounded-lg">
                                <i data-lucide="package" class="w-5 h-5 text-secondary-green mr-2"></i>
                                {{ $commodity }}
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="md:col-span-1">
                    <!-- Quote Form -->
                    <div class="bg-white rounded-card shadow-lg p-6 mb-8 sticky top-24">
                        <h3 class="text-xl font-bold text-primary-blue mb-4">Request a Quote</h3>
                        <form action="{{ route('quote.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <input type="hidden" name="origin" value="{{ $route['origin'] }}, {{ $route['origin_country'] }}">
                            <input type="hidden" name="destination" value="{{ $route['destination'] }}, {{ $route['destination_country'] }}">
                            
                            <div>
                                <label for="cargo_type" class="block text-sm font-medium text-gray-700">Cargo Type</label>
                                <select name="cargo_type" id="cargo_type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50" required>
                                    <option value="">Select Cargo Type</option>
                                    <option value="general">General Cargo</option>
                                    <option value="hazardous">Hazardous Materials</option>
                                    <option value="perishable">Perishable Goods</option>
                                    <option value="oversized">Oversized Cargo</option>
                                </select>
                            </div>
                            
                            <div>
                                <label for="shipping_mode" class="block text-sm font-medium text-gray-700">Shipping Mode</label>
                                <select name="shipping_mode" id="shipping_mode" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50" required>
                                    <option value="">Select Shipping Mode</option>
                                    <option value="fcl">Ocean Freight (FCL)</option>
                                    <option value="lcl">Ocean Freight (LCL)</option>
                                    <option value="air_standard">Air Freight (Standard)</option>
                                    <option value="air_express">Air Freight (Express)</option>
                                </select>
                            </div>
                            
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Your Name</label>
                                <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50" required>
                            </div>
                            
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50" required>
                            </div>
                            
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                <input type="tel" name="phone" id="phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50" required>
                            </div>
                            
                            <div>
                                <button type="submit" class="w-full btn-primary bg-primary-blue">Get Quote</button>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Need Assistance -->
                    <div class="bg-primary-blue text-white rounded-card p-6">
                        <h3 class="text-xl font-bold mb-4">Need Assistance?</h3>
                        <p class="mb-4">Contact our route specialists for personalized shipping advice.</p>
                        <ul class="space-y-3">
                            <li class="flex items-center">
                                <i data-lucide="phone" class="w-5 h-5 mr-3"></i>
                                <a href="tel:+918888888888" class="hover:text-accent-light-green transition-colors">+91 88888 88888</a>
                            </li>
                            <li class="flex items-center">
                                <i data-lucide="mail" class="w-5 h-5 mr-3"></i>
                                <a href="mailto:routes@marinexa.com" class="hover:text-accent-light-green transition-colors">routes@marinexa.com</a>
                            </li>
                            <li class="flex items-center">
                                <i data-lucide="message-circle" class="w-5 h-5 mr-3"></i>
                                <a href="#" class="hover:text-accent-light-green transition-colors">Live Chat</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Routes -->
    <section class="py-16 bg-background-light-grey">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-primary-blue mb-8">Related Routes</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Route 1 -->
                <div class="bg-white rounded-card overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                    <a href="{{ route('routes.show', 'mumbai-to-singapore') }}" class="block relative h-48">
                        <img src="{{ asset('images/routes/mumbai-singapore.jpg') }}" alt="Mumbai to Singapore" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-primary-blue to-transparent opacity-70"></div>
                        <div class="absolute bottom-0 left-0 p-4 text-white">
                            <h3 class="text-lg font-bold">Mumbai to Singapore</h3>
                            <div class="flex items-center text-sm">
                                <span>View Details</span>
                                <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                            </div>
                        </div>
                    </a>
                </div>
                
                <!-- Route 2 -->
                <div class="bg-white rounded-card overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                    <a href="{{ route('routes.show', 'mumbai-to-london') }}" class="block relative h-48">
                        <img src="{{ asset('images/routes/mumbai-london.jpg') }}" alt="Mumbai to London" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-primary-blue to-transparent opacity-70"></div>
                        <div class="absolute bottom-0 left-0 p-4 text-white">
                            <h3 class="text-lg font-bold">Mumbai to London</h3>
                            <div class="flex items-center text-sm">
                                <span>View Details</span>
                                <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                            </div>
                        </div>
                    </a>
                </div>
                
                <!-- Route 3 -->
                <div class="bg-white rounded-card overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                    <a href="{{ route('routes.index') }}" class="block relative h-48">
                        <img src="{{ asset('images/routes/delhi-newyork.jpg') }}" alt="Delhi to New York" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-primary-blue to-transparent opacity-70"></div>
                        <div class="absolute bottom-0 left-0 p-4 text-white">
                            <h3 class="text-lg font-bold">Delhi to New York</h3>
                            <div class="flex items-center text-sm">
                                <span>View Details</span>
                                <i data-lucide="arrow-right" class="w-4 h-4 ml-2"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            
            <div class="text-center mt-8">
                <a href="{{ route('routes.index') }}" class="btn-secondary">View All Routes</a>
            </div>
        </div>
    </section>
@endsection
