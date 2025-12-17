@extends('layouts.app')

@section('title', 'Shipping Routes & Lanes')

@section('meta_description', 'Explore our global shipping routes and trade lanes connecting major ports and airports worldwide with reliable schedules and competitive transit times.')

@section('content')
    <!-- Hero Section -->
    <section class="bg-primary-blue text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Global Shipping Routes</h1>
                <p class="text-xl max-w-3xl mx-auto">Connecting businesses worldwide with reliable freight services across major trade lanes</p>
            </div>
        </div>
    </section>

    <!-- Search Section -->
    <section class="py-8 bg-background-light-grey">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-card shadow-sm p-6">
                <h2 class="text-2xl font-bold text-primary-blue mb-4">Find Your Shipping Route</h2>
                <form action="{{ route('routes.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label for="origin" class="block text-sm font-medium text-gray-700 mb-1">Origin</label>
                        <input type="text" name="origin" id="origin" placeholder="City or Country" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50">
                    </div>
                    <div>
                        <label for="destination" class="block text-sm font-medium text-gray-700 mb-1">Destination</label>
                        <input type="text" name="destination" id="destination" placeholder="City or Country" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50">
                    </div>
                    <div>
                        <label for="mode" class="block text-sm font-medium text-gray-700 mb-1">Shipping Mode</label>
                        <select name="mode" id="mode" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50">
                            <option value="">All Modes</option>
                            <option value="ocean">Ocean Freight</option>
                            <option value="air">Air Freight</option>
                        </select>
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="w-full btn-primary bg-primary-blue">Search Routes</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Popular Routes -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-primary-blue mb-8">Popular Shipping Routes</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($routes as $route)
                <div class="bg-white rounded-card overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                    <a href="{{ route('routes.show', $route['slug']) }}" class="block">
                        <div class="relative h-48">
                            <img src="{{ asset($route['image']) }}" alt="{{ $route['origin'] }} to {{ $route['destination'] }}" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-primary-blue to-transparent opacity-70"></div>
                            <div class="absolute bottom-0 left-0 p-6 text-white">
                                <div class="flex items-center mb-2">
                                    <span class="font-bold">{{ $route['origin'] }}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="font-bold">{{ $route['destination'] }}</span>
                                </div>
                                <h3 class="text-xl font-bold">{{ $route['origin'] }} to {{ $route['destination'] }}</h3>
                            </div>
                        </div>
                    </a>
                    <div class="p-6">
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <p class="text-sm text-gray-500">Transit Time</p>
                                <p class="font-semibold">{{ $route['transit_time'] }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Frequency</p>
                                <p class="font-semibold">{{ $route['frequency'] }}</p>
                            </div>
                        </div>
                        <div class="mb-4">
                            <p class="text-sm text-gray-500">Available Services</p>
                            <p class="font-semibold">{{ $route['shipping_mode'] }}</p>
                        </div>
                        <a href="{{ route('routes.show', $route['slug']) }}" class="btn-secondary w-full text-center">View Details</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- World Map Section -->
    <section class="py-16 bg-background-light-grey">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-primary-blue">Our Global Network</h2>
                <p class="mt-4 text-lg text-gray-600">We connect businesses across major trade lanes with reliable shipping services</p>
            </div>
            
            <div class="bg-white rounded-card p-8 shadow-sm">
                <!-- Placeholder for a world map with shipping routes -->
                <div class="bg-gray-100 h-96 rounded-lg flex items-center justify-center">
                    <div class="text-center">
                        <i data-lucide="globe" class="w-16 h-16 mx-auto mb-4 text-secondary-green"></i>
                        <h3 class="text-xl font-bold text-primary-blue">Global Shipping Network</h3>
                        <p class="text-gray-600 mt-2">With connections to major ports and airports worldwide</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Regional Routes -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-primary-blue mb-12 text-center">Regional Trade Lanes</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Asia Routes -->
                <div class="bg-white p-6 rounded-card shadow-sm">
                    <div class="flex items-center mb-4">
                        <div class="bg-secondary-green bg-opacity-10 p-3 rounded-full mr-4">
                            <i data-lucide="map-pin" class="w-6 h-6 text-secondary-green"></i>
                        </div>
                        <h3 class="text-xl font-bold text-primary-blue">Asia</h3>
                    </div>
                    <ul class="space-y-2 text-gray-600">
                        <li>• Mumbai to Singapore</li>
                        <li>• Mumbai to Hong Kong</li>
                        <li>• Delhi to Bangkok</li>
                        <li>• Chennai to Kuala Lumpur</li>
                    </ul>
                </div>
                
                <!-- Middle East Routes -->
                <div class="bg-white p-6 rounded-card shadow-sm">
                    <div class="flex items-center mb-4">
                        <div class="bg-secondary-green bg-opacity-10 p-3 rounded-full mr-4">
                            <i data-lucide="map-pin" class="w-6 h-6 text-secondary-green"></i>
                        </div>
                        <h3 class="text-xl font-bold text-primary-blue">Middle East</h3>
                    </div>
                    <ul class="space-y-2 text-gray-600">
                        <li>• Mumbai to Dubai</li>
                        <li>• Mumbai to Doha</li>
                        <li>• Delhi to Riyadh</li>
                        <li>• Chennai to Muscat</li>
                    </ul>
                </div>
                
                <!-- Europe Routes -->
                <div class="bg-white p-6 rounded-card shadow-sm">
                    <div class="flex items-center mb-4">
                        <div class="bg-secondary-green bg-opacity-10 p-3 rounded-full mr-4">
                            <i data-lucide="map-pin" class="w-6 h-6 text-secondary-green"></i>
                        </div>
                        <h3 class="text-xl font-bold text-primary-blue">Europe</h3>
                    </div>
                    <ul class="space-y-2 text-gray-600">
                        <li>• Mumbai to London</li>
                        <li>• Mumbai to Hamburg</li>
                        <li>• Delhi to Rotterdam</li>
                        <li>• Chennai to Marseille</li>
                    </ul>
                </div>
                
                <!-- Americas Routes -->
                <div class="bg-white p-6 rounded-card shadow-sm">
                    <div class="flex items-center mb-4">
                        <div class="bg-secondary-green bg-opacity-10 p-3 rounded-full mr-4">
                            <i data-lucide="map-pin" class="w-6 h-6 text-secondary-green"></i>
                        </div>
                        <h3 class="text-xl font-bold text-primary-blue">Americas</h3>
                    </div>
                    <ul class="space-y-2 text-gray-600">
                        <li>• Mumbai to New York</li>
                        <li>• Delhi to Los Angeles</li>
                        <li>• Mumbai to Toronto</li>
                        <li>• Chennai to Sao Paulo</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-primary-blue text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                <div class="mb-6 md:mb-0">
                    <h2 class="text-3xl font-bold">Need a Specific Route?</h2>
                    <p class="mt-2 text-lg">Contact us for custom shipping solutions for any origin and destination.</p>
                </div>
                <div class="flex space-x-4">
                    <a href="{{ route('quote.create') }}" class="btn-primary bg-secondary-green hover:bg-opacity-90">Request a Quote</a>
                    <a href="{{ route('contact') }}" class="btn-secondary border-white text-white hover:bg-white hover:text-primary-blue">Contact Us</a>
                </div>
            </div>
        </div>
    </section>
@endsection
