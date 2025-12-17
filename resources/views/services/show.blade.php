@extends('layouts.app')

@section('title', $service['title'])

@section('meta_description', $service['description'])

@section('content')
    <!-- Hero Section -->
    <section class="relative">
        <div class="h-[300px] md:h-[400px] overflow-hidden">
            <img src="{{ asset($service['banner']) }}" alt="{{ $service['title'] }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-primary-blue opacity-60"></div>
        </div>
        <div class="absolute inset-0 flex items-center">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                <div class="text-center text-white">
                    <div class="mb-4 flex justify-center">
                        <i data-lucide="{{ $service['icon'] }}" class="w-16 h-16"></i>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ $service['title'] }}</h1>
                    <p class="text-xl max-w-3xl mx-auto">{{ $service['description'] }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Details -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <!-- Main Content -->
                <div class="md:col-span-2">
                    <div class="prose prose-lg max-w-none">
                        {!! $service['content'] !!}
                    </div>

                    <!-- Features Section -->
                    <div class="mt-12">
                        <h3 class="text-2xl font-bold text-primary-blue mb-6">Key Features</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @foreach($service['features'] as $feature)
                            <div class="flex items-start p-4 bg-background-light-grey rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-secondary-green flex-shrink-0 mt-1 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span>{{ $feature }}</span>
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
                            <input type="hidden" name="service" value="{{ $service['title'] }}">
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
                                <label for="origin" class="block text-sm font-medium text-gray-700">Origin</label>
                                <input type="text" name="origin" id="origin" placeholder="City, Country" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50" required>
                            </div>
                            <div>
                                <label for="destination" class="block text-sm font-medium text-gray-700">Destination</label>
                                <input type="text" name="destination" id="destination" placeholder="City, Country" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50" required>
                            </div>
                            <div>
                                <button type="submit" class="w-full btn-primary bg-primary-blue">Get Quote</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Services -->
    <section class="py-16 bg-background-light-grey">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-primary-blue mb-8">Other Services You Might Need</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- These would be dynamically generated in a real application -->
                <div class="bg-white p-6 rounded-card shadow-sm">
                    <div class="flex items-center mb-4">
                        <div class="bg-secondary-green bg-opacity-10 p-3 rounded-full mr-4">
                            <i data-lucide="clipboard-check" class="w-6 h-6 text-secondary-green"></i>
                        </div>
                        <h3 class="text-xl font-bold text-primary-blue">Customs Clearance</h3>
                    </div>
                    <p class="text-gray-600 mb-4">Expert assistance with customs documentation, regulations, and compliance requirements.</p>
                    <a href="{{ route('services.show', 'customs-clearance') }}" class="text-secondary-green hover:text-primary-blue font-semibold flex items-center">
                        Learn More
                        <i data-lucide="arrow-right" class="w-4 h-4 ml-1"></i>
                    </a>
                </div>
                
                <div class="bg-white p-6 rounded-card shadow-sm">
                    <div class="flex items-center mb-4">
                        <div class="bg-secondary-green bg-opacity-10 p-3 rounded-full mr-4">
                            <i data-lucide="package" class="w-6 h-6 text-secondary-green"></i>
                        </div>
                        <h3 class="text-xl font-bold text-primary-blue">Warehousing</h3>
                    </div>
                    <p class="text-gray-600 mb-4">Secure storage facilities and inventory management solutions at key locations worldwide.</p>
                    <a href="{{ route('services.index') }}" class="text-secondary-green hover:text-primary-blue font-semibold flex items-center">
                        Learn More
                        <i data-lucide="arrow-right" class="w-4 h-4 ml-1"></i>
                    </a>
                </div>
                
                <div class="bg-white p-6 rounded-card shadow-sm">
                    <div class="flex items-center mb-4">
                        <div class="bg-secondary-green bg-opacity-10 p-3 rounded-full mr-4">
                            <i data-lucide="shield" class="w-6 h-6 text-secondary-green"></i>
                        </div>
                        <h3 class="text-xl font-bold text-primary-blue">Cargo Insurance</h3>
                    </div>
                    <p class="text-gray-600 mb-4">Comprehensive coverage options to protect your shipments against loss, damage, or theft during transit.</p>
                    <a href="{{ route('services.index') }}" class="text-secondary-green hover:text-primary-blue font-semibold flex items-center">
                        Learn More
                        <i data-lucide="arrow-right" class="w-4 h-4 ml-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-primary-blue text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                <div class="mb-6 md:mb-0">
                    <h2 class="text-3xl font-bold">Ready to Ship with Us?</h2>
                    <p class="mt-2 text-lg">Get in touch with our team to discuss your specific {{ strtolower($service['title']) }} requirements.</p>
                </div>
                <div class="flex space-x-4">
                    <a href="{{ route('quote.create') }}" class="btn-primary bg-secondary-green hover:bg-opacity-90">Request a Quote</a>
                    <a href="{{ route('contact') }}" class="btn-secondary border-white text-white hover:bg-white hover:text-primary-blue">Contact Us</a>
                </div>
            </div>
        </div>
    </section>
@endsection
