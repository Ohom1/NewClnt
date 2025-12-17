@extends('layouts.app')

@section('title', 'Contact Us - Mari Nexa Shipping')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-primary-blue via-primary-blue to-dark-navy text-white overflow-hidden py-20 md:py-24">
        <!-- Background pattern/decoration -->
        <div class="absolute inset-0 opacity-10">
            <div class="mesh-grid w-full h-full"></div>
        </div>
        
        <!-- Background decorative shapes -->
        <div class="absolute inset-0 opacity-20">
            <div class="absolute -top-20 -right-20 w-96 h-96 rounded-full bg-secondary-green/20 blur-3xl animate__animated animate__pulse animate__infinite animate__slower"></div>
            <div class="absolute -bottom-40 -left-40 w-[30rem] h-[30rem] rounded-full bg-accent-light-green/20 blur-3xl animate__animated animate__pulse animate__infinite animate__slow"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto">
                <span class="inline-block px-3 py-1 bg-white/10 backdrop-blur-sm rounded-full text-sm font-medium mb-4 animate__animated animate__fadeInDown">GET IN TOUCH</span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 animate__animated animate__fadeInUp">Contact Us</h1>
                <p class="text-xl opacity-90 mb-8 animate__animated animate__fadeInUp animate__delay-1s">Have questions or need assistance with your shipping needs? Our team is here to help.</p>
            </div>
        </div>
    </section>
    
    <!-- Contact Information Section -->
    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 lg:gap-20">
                <!-- Contact Form Column -->
                <div class="section-animate" data-animation="animate__fadeInLeft">
                    <h2 class="text-3xl font-bold text-primary-blue mb-8">Send Us a Message</h2>
                    
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 animate__animated animate__fadeIn">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name <span class="text-red-500">*</span></label>
                                <input type="text" name="name" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue @error('name') border-red-500 @enderror" value="{{ old('name') }}" required>
                                @error('name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address <span class="text-red-500">*</span></label>
                                <input type="email" name="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue @error('email') border-red-500 @enderror" value="{{ old('email') }}" required>
                                @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                            <input type="tel" name="phone" id="phone" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue @error('phone') border-red-500 @enderror" value="{{ old('phone') }}">
                            @error('phone')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Subject <span class="text-red-500">*</span></label>
                            <input type="text" name="subject" id="subject" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue @error('subject') border-red-500 @enderror" value="{{ old('subject') }}" required>
                            @error('subject')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message <span class="text-red-500">*</span></label>
                            <textarea name="message" id="message" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue @error('message') border-red-500 @enderror" required>{{ old('message') }}</textarea>
                            @error('message')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <button type="submit" class="bg-primary-blue hover:bg-opacity-90 text-white px-6 py-3 rounded-md font-semibold transition-all flex items-center">
                                <i data-lucide="send" class="w-5 h-5 mr-2"></i>
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
                
                <!-- Contact Information Column -->
                <div class="section-animate" data-animation="animate__fadeInRight">
                    <h2 class="text-3xl font-bold text-primary-blue mb-8">Contact Information</h2>
                    
                    <div class="space-y-8">
                        <div class="flex items-start space-x-4">
                            <div class="bg-primary-blue/10 p-3 rounded-full">
                                <i data-lucide="map-pin" class="w-6 h-6 text-primary-blue"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg text-primary-blue mb-2">Headquarters</h3>
                                <p class="text-gray-600">
                                Marinexa Tower<br>
                                4TH FLOOR, FLAT NO 218, PKT F SEC-B-2<br>
                                Narela, New Delhi, 110040, India
                            </p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4">
                            <div class="bg-primary-blue/10 p-3 rounded-full">
                                <i data-lucide="phone" class="w-6 h-6 text-primary-blue"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg text-primary-blue mb-2">Phone Numbers</h3>
                                <p class="text-gray-600">
                                    Customer Support: +91 81784 80670<br>
                                    Shipping Inquiries: +91 81784 80670<br>
                                    International: +91 81784 80670
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4">
                            <div class="bg-primary-blue/10 p-3 rounded-full">
                                <i data-lucide="mail" class="w-6 h-6 text-primary-blue"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg text-primary-blue mb-2">Email Addresses</h3>
                                <p class="text-gray-600">
                                    General Inquiries: care@marinexashipping.com<br>
                                    Customer Support: care@marinexashipping.com<br>
                                    Business Development: care@marinexashipping.com
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4">
                            <div class="bg-primary-blue/10 p-3 rounded-full">
                                <i data-lucide="clock" class="w-6 h-6 text-primary-blue"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg text-primary-blue mb-2">Business Hours</h3>
                                <p class="text-gray-600">
                                    Monday - Friday: 9:00 AM - 6:00 PM IST<br>
                                    Saturday: 10:00 AM - 2:00 PM IST<br>
                                    Sunday: Closed<br>
                                    <span class="text-secondary-green font-medium">24/7 Support Available for Urgent Matters</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Social Media Links -->
                    <div class="mt-12">
                        <h3 class="font-semibold text-lg text-primary-blue mb-4">Connect With Us</h3>
                        <div class="flex space-x-4">
                            <a href="#" class="bg-primary-blue/10 hover:bg-primary-blue hover:text-white text-primary-blue p-3 rounded-full transition-colors">
                                <i data-lucide="linkedin" class="w-5 h-5"></i>
                            </a>
                            <a href="#" class="bg-primary-blue/10 hover:bg-primary-blue hover:text-white text-primary-blue p-3 rounded-full transition-colors">
                                <i data-lucide="twitter" class="w-5 h-5"></i>
                            </a>
                            <a href="#" class="bg-primary-blue/10 hover:bg-primary-blue hover:text-white text-primary-blue p-3 rounded-full transition-colors">
                                <i data-lucide="facebook" class="w-5 h-5"></i>
                            </a>
                            <a href="#" class="bg-primary-blue/10 hover:bg-primary-blue hover:text-white text-primary-blue p-3 rounded-full transition-colors">
                                <i data-lucide="instagram" class="w-5 h-5"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Map Section -->
    <section class="py-16 md:py-24 bg-background-light-grey">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-12 section-animate" data-animation="animate__fadeInUp">
                <span class="inline-block px-3 py-1 bg-primary-blue/10 text-primary-blue rounded-full text-sm font-medium mb-4">OUR LOCATION</span>
                <h2 class="text-3xl md:text-4xl font-bold text-primary-blue mb-4">Find Us</h2>
                <p class="text-lg text-gray-600">Visit our headquarters in Mumbai or our offices worldwide</p>
            </div>
            
            <div class="rounded-xl overflow-hidden shadow-md section-animate" data-animation="animate__fadeInUp">
                <!-- Placeholder for a map (would be replaced with an actual map integration) -->
                <div class="aspect-video bg-gray-200 flex items-center justify-center">
                    <div class="text-center p-8">
                        <i data-lucide="map" class="w-16 h-16 text-gray-400 mb-4 mx-auto"></i>
                        <p class="text-gray-500 font-medium">Interactive Map Would Be Displayed Here</p>
                        <p class="text-gray-500 text-sm">(Google Maps or similar integration)</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Global Offices Section -->
    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 section-animate" data-animation="animate__fadeInUp">
                <span class="inline-block px-3 py-1 bg-primary-blue/10 text-primary-blue rounded-full text-sm font-medium mb-4">WORLDWIDE PRESENCE</span>
                <h2 class="text-3xl md:text-4xl font-bold text-primary-blue mb-4">Our Global Offices</h2>
                <p class="text-lg text-gray-600">Find Mari Nexa Shipping representatives near you</p>
            </div>
            
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Office 1: Mumbai (HQ) -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 transition-all hover:shadow-lg section-animate" data-animation="animate__fadeInUp">
                    <div class="h-32 bg-primary-blue/10 flex items-center justify-center">
                        <span class="font-bold text-primary-blue text-xl">New Delhi, India</span>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg text-primary-blue mb-2">Headquarters</h3>
                        <p class="text-gray-600 text-sm mb-4">
                            Mari Nexa Tower<br>
                            247 Maritime Road, Andheri East<br>
                            Mumbai, Maharashtra 400069
                        </p>
                        <div class="flex justify-between items-center">
                            <span class="text-xs font-medium bg-secondary-green/10 text-secondary-green px-2 py-1 rounded">Main Office</span>
                            <a href="tel:+912247891000" class="text-primary-blue hover:text-secondary-green transition-colors">
                                <i data-lucide="phone" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Office 2: Singapore -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 transition-all hover:shadow-lg section-animate" data-animation="animate__fadeInUp animate__delay-1s">
                    <div class="h-32 bg-primary-blue/10 flex items-center justify-center">
                        <span class="font-bold text-primary-blue text-xl">Singapore</span>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg text-primary-blue mb-2">APAC Regional Office</h3>
                        <p class="text-gray-600 text-sm mb-4">
                            Marina Bay Financial Centre<br>
                            10 Marina Boulevard, #39-01<br>
                            Singapore 018983
                        </p>
                        <div class="flex justify-between items-center">
                            <span class="text-xs font-medium bg-accent-light-green/10 text-accent-light-green px-2 py-1 rounded">Regional HQ</span>
                            <a href="tel:+6562347890" class="text-primary-blue hover:text-secondary-green transition-colors">
                                <i data-lucide="phone" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Office 3: Dubai -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 transition-all hover:shadow-lg section-animate" data-animation="animate__fadeInUp animate__delay-2s">
                    <div class="h-32 bg-primary-blue/10 flex items-center justify-center">
                        <span class="font-bold text-primary-blue text-xl">Dubai, UAE</span>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg text-primary-blue mb-2">Middle East Office</h3>
                        <p class="text-gray-600 text-sm mb-4">
                            Emirates Towers<br>
                            Sheikh Zayed Road, Level 33<br>
                            Dubai, United Arab Emirates
                        </p>
                        <div class="flex justify-between items-center">
                            <span class="text-xs font-medium bg-accent-light-green/10 text-accent-light-green px-2 py-1 rounded">Regional Office</span>
                            <a href="tel:+97143129876" class="text-primary-blue hover:text-secondary-green transition-colors">
                                <i data-lucide="phone" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Office 4: London -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 transition-all hover:shadow-lg section-animate" data-animation="animate__fadeInUp animate__delay-3s">
                    <div class="h-32 bg-primary-blue/10 flex items-center justify-center">
                        <span class="font-bold text-primary-blue text-xl">London, UK</span>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-lg text-primary-blue mb-2">Europe Office</h3>
                        <p class="text-gray-600 text-sm mb-4">
                            Canary Wharf<br>
                            25 Canada Square, Level 12<br>
                            London, E14 5LQ, United Kingdom
                        </p>
                        <div class="flex justify-between items-center">
                            <span class="text-xs font-medium bg-accent-light-green/10 text-accent-light-green px-2 py-1 rounded">Regional Office</span>
                            <a href="tel:+442073456789" class="text-primary-blue hover:text-secondary-green transition-colors">
                                <i data-lucide="phone" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- View All Offices Button -->
            <div class="text-center mt-12">
                <a href="#" class="inline-flex items-center justify-center border-2 border-primary-blue hover:bg-primary-blue hover:text-white text-primary-blue px-6 py-3 rounded-md font-semibold transition-all">
                    <i data-lucide="map" class="w-5 h-5 mr-2"></i>
                    View All 35+ Offices
                </a>
            </div>
        </div>
    </section>
    
    <!-- FAQ Section -->
    <section class="py-16 md:py-24 bg-background-light-grey">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 section-animate" data-animation="animate__fadeInUp">
                <span class="inline-block px-3 py-1 bg-primary-blue/10 text-primary-blue rounded-full text-sm font-medium mb-4">QUESTIONS?</span>
                <h2 class="text-3xl md:text-4xl font-bold text-primary-blue mb-4">Frequently Asked Questions</h2>
                <p class="text-lg text-gray-600">Find answers to common questions about contacting our team</p>
            </div>
            
            <div class="max-w-4xl mx-auto grid gap-6">
                <!-- FAQ Item 1 -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100 section-animate" data-animation="animate__fadeInUp">
                    <button class="faq-button w-full flex items-center justify-between p-6 focus:outline-none" aria-expanded="false">
                        <h3 class="text-lg font-semibold text-primary-blue text-left">How quickly will I receive a response to my inquiry?</h3>
                        <i data-lucide="chevron-down" class="w-5 h-5 text-primary-blue faq-icon transition-transform"></i>
                    </button>
                    <div class="faq-answer px-6 pb-6 hidden">
                        <p class="text-gray-600">We strive to respond to all inquiries within 24 hours during business days. For urgent matters, please call our 24/7 support line for immediate assistance.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 2 -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100 section-animate" data-animation="animate__fadeInUp animate__delay-1s">
                    <button class="faq-button w-full flex items-center justify-between p-6 focus:outline-none" aria-expanded="false">
                        <h3 class="text-lg font-semibold text-primary-blue text-left">How can I get a shipping quote quickly?</h3>
                        <i data-lucide="chevron-down" class="w-5 h-5 text-primary-blue faq-icon transition-transform"></i>
                    </button>
                    <div class="faq-answer px-6 pb-6 hidden">
                        <p class="text-gray-600">The fastest way to get a quote is through our online quote request form. Alternatively, you can call our direct sales line during business hours for an immediate response.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 3 -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100 section-animate" data-animation="animate__fadeInUp animate__delay-2s">
                    <button class="faq-button w-full flex items-center justify-between p-6 focus:outline-none" aria-expanded="false">
                        <h3 class="text-lg font-semibold text-primary-blue text-left">Do you have representatives in my country?</h3>
                        <i data-lucide="chevron-down" class="w-5 h-5 text-primary-blue faq-icon transition-transform"></i>
                    </button>
                    <div class="faq-answer px-6 pb-6 hidden">
                        <p class="text-gray-600">Mari Nexa Shipping has offices or partners in over 120 countries worldwide. Please contact our customer service team to find the nearest representative in your region.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="py-16 md:py-20 bg-gradient-to-br from-primary-blue to-dark-navy text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div class="section-animate" data-animation="animate__fadeInLeft">
                    <h2 class="text-3xl md:text-4xl font-bold mb-6">Need a Shipping Solution?</h2>
                    <p class="text-lg opacity-90 mb-8">Get a detailed quote for your specific logistics requirements and discover how Mari Nexa Shipping can optimize your supply chain.</p>
                    <a href="{{ route('quote.create') }}" class="bg-white text-primary-blue hover:bg-opacity-90 px-8 py-4 rounded-lg text-lg font-semibold inline-flex items-center transition-all">
                        <i data-lucide="clipboard-check" class="w-5 h-5 mr-2"></i> 
                        Request a Free Quote
                    </a>
                </div>
                <div class="section-animate" data-animation="animate__fadeInRight">
                    <div class="bg-white/10 backdrop-blur-sm p-8 rounded-xl border border-white/20">
                        <h3 class="text-xl font-bold mb-4">Quick Contact</h3>
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <i data-lucide="phone" class="w-5 h-5 mr-3 text-secondary-green"></i>
                                <span>+91 81784 80670</span>
                            </div>
                            <div class="flex items-center">
                                <i data-lucide="mail" class="w-5 h-5 mr-3 text-secondary-green"></i>
                                <span>care@marinexashipping.com</span>
                            </div>
                            <div class="flex items-center">
                                <i data-lucide="message-circle" class="w-5 h-5 mr-3 text-secondary-green"></i>
                                <span>Live Chat (Available 24/7)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
