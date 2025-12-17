@extends('layouts.app')

@section('title', 'Shipping & Logistics Services')

@section('meta_description', 'Explore our comprehensive range of shipping and logistics services including ocean freight, air freight, customs clearance, and door-to-door delivery solutions.')

@section('content')
    <!-- Hero Section -->
    <section class="bg-primary-blue text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Our Services</h1>
                <p class="text-xl max-w-3xl mx-auto">Comprehensive logistics solutions tailored to your specific shipping needs</p>
            </div>
        </div>
    </section>

    <!-- Services Overview -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-16">
                @foreach($services as $service)
                <div class="flex flex-col h-full">
                    <a href="{{ route('services.show', $service['slug']) }}" class="group">
                        <div class="rounded-card overflow-hidden mb-6 relative">
                            <img src="{{ asset($service['image']) }}" alt="{{ $service['title'] }}" class="w-full h-64 object-cover transform group-hover:scale-105 transition-transform duration-300">
                            <div class="absolute inset-0 bg-primary-blue opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                        </div>
                    </a>
                    <div class="flex items-center mb-4 text-secondary-green">
                        <i data-lucide="{{ $service['icon'] }}" class="w-8 h-8 mr-3"></i>
                        <h2 class="text-2xl font-bold text-primary-blue">{{ $service['title'] }}</h2>
                    </div>
                    <p class="text-gray-600 mb-6 flex-grow">{{ $service['short_description'] }}</p>
                    <a href="{{ route('services.show', $service['slug']) }}" class="btn-secondary inline-flex items-center">
                        Learn More
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Additional Services Section -->
    <section class="py-16 bg-background-light-grey">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-primary-blue">Additional Logistics Services</h2>
                <p class="mt-4 text-lg text-gray-600">Beyond our core services, we provide specialized solutions for complex logistics needs</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Warehousing -->
                <div class="bg-white p-6 rounded-card shadow-sm">
                    <div class="flex items-center mb-4">
                        <div class="bg-secondary-green bg-opacity-10 p-3 rounded-full mr-4">
                            <i data-lucide="package" class="w-6 h-6 text-secondary-green"></i>
                        </div>
                        <h3 class="text-xl font-bold text-primary-blue">Warehousing</h3>
                    </div>
                    <p class="text-gray-600">Secure storage facilities and inventory management solutions at key locations worldwide.</p>
                </div>
                
                <!-- Cargo Insurance -->
                <div class="bg-white p-6 rounded-card shadow-sm">
                    <div class="flex items-center mb-4">
                        <div class="bg-secondary-green bg-opacity-10 p-3 rounded-full mr-4">
                            <i data-lucide="shield" class="w-6 h-6 text-secondary-green"></i>
                        </div>
                        <h3 class="text-xl font-bold text-primary-blue">Cargo Insurance</h3>
                    </div>
                    <p class="text-gray-600">Comprehensive coverage options to protect your shipments against loss, damage, or theft during transit.</p>
                </div>
                
                <!-- Supply Chain Consulting -->
                <div class="bg-white p-6 rounded-card shadow-sm">
                    <div class="flex items-center mb-4">
                        <div class="bg-secondary-green bg-opacity-10 p-3 rounded-full mr-4">
                            <i data-lucide="bar-chart" class="w-6 h-6 text-secondary-green"></i>
                        </div>
                        <h3 class="text-xl font-bold text-primary-blue">Supply Chain Consulting</h3>
                    </div>
                    <p class="text-gray-600">Expert analysis and optimization strategies to improve efficiency and reduce costs in your logistics operations.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-primary-blue text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                <div class="mb-6 md:mb-0">
                    <h2 class="text-3xl font-bold">Need a Customized Shipping Solution?</h2>
                    <p class="mt-2 text-lg">Our logistics experts will tailor our services to your specific requirements.</p>
                </div>
                <div>
                    <a href="{{ route('quote.create') }}" class="btn-primary bg-secondary-green hover:bg-opacity-90">Request a Quote</a>
                </div>
            </div>
        </div>
    </section>
@endsection
