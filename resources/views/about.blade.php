@extends('layouts.app')

@section('title', 'About Us - Mari Nexa Shipping')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-primary-blue via-primary-blue to-dark-navy text-white overflow-hidden py-20 md:py-28">
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
                <span class="inline-block px-3 py-1 bg-white/10 backdrop-blur-sm rounded-full text-sm font-medium mb-4 animate__animated animate__fadeInDown">OUR STORY</span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 animate__animated animate__fadeInUp">About Mari Nexa Shipping</h1>
                <p class="text-xl opacity-90 mb-8 animate__animated animate__fadeInUp animate__delay-1s">Delivering global logistics excellence since 2010 with integrity, innovation, and reliability</p>
            </div>
        </div>
    </section>
    
    <!-- Company Overview Section -->
    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="section-animate" data-animation="animate__fadeInLeft">
                    <span class="inline-block px-3 py-1 bg-primary-blue/10 text-primary-blue rounded-full text-sm font-medium mb-4">OUR COMPANY</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-primary-blue mb-6">A Leading Global Logistics Partner</h2>
                    <p class="text-gray-600 mb-4">Mari Nexa Shipping was founded in 2010 with a vision to revolutionize the global logistics industry. What began as a small operation with just five employees has grown into an international shipping powerhouse with operations in over 120 countries.</p>
                    <p class="text-gray-600 mb-6">Our commitment to reliability, transparency, and customer satisfaction has allowed us to build lasting partnerships with businesses of all sizes, from startups to multinational corporations.</p>
                    
                    <div class="grid grid-cols-2 gap-4 mb-8">
                        <div class="flex items-start space-x-3">
                            <div class="bg-secondary-green/20 p-2 rounded-full">
                                <i data-lucide="check-circle" class="w-5 h-5 text-secondary-green"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-primary-blue">Global Reach</h4>
                                <p class="text-sm text-gray-600">Operations in 120+ countries worldwide</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="bg-secondary-green/20 p-2 rounded-full">
                                <i data-lucide="check-circle" class="w-5 h-5 text-secondary-green"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-primary-blue">Expert Team</h4>
                                <p class="text-sm text-gray-600">500+ logistics professionals</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="bg-secondary-green/20 p-2 rounded-full">
                                <i data-lucide="check-circle" class="w-5 h-5 text-secondary-green"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-primary-blue">Track Record</h4>
                                <p class="text-sm text-gray-600">15+ years of industry experience</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="bg-secondary-green/20 p-2 rounded-full">
                                <i data-lucide="check-circle" class="w-5 h-5 text-secondary-green"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-primary-blue">Customer Trust</h4>
                                <p class="text-sm text-gray-600">2,000+ satisfied clients</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="relative rounded-xl overflow-hidden section-animate" data-animation="animate__fadeInRight">
                    <!-- Image placeholder with gradient overlay (would be replaced with actual image) -->
                    <div class="aspect-video bg-gradient-to-br from-primary-blue to-dark-navy rounded-xl overflow-hidden relative">
                        <div class="absolute inset-0 flex items-center justify-center text-white">
                            <i data-lucide="image" class="w-24 h-24 opacity-20"></i>
                        </div>
                        <!-- Decorative elements -->
                        <div class="absolute bottom-0 left-0 w-full h-1/3 bg-gradient-to-t from-black/50 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <p class="font-medium">Our global headquarters in Mumbai</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision and Mission Section -->
    <section class="py-16 md:py-24 bg-background-light-grey">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 section-animate" data-animation="animate__fadeInUp">
                <span class="inline-block px-3 py-1 bg-primary-blue/10 text-primary-blue rounded-full text-sm font-medium mb-4">OUR PURPOSE</span>
                <h2 class="text-3xl md:text-4xl font-bold text-primary-blue mb-4">Vision & Mission</h2>
                <p class="text-lg text-gray-600">Guiding principles that drive every aspect of our business</p>
            </div>
            
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Vision -->
                <div class="bg-white rounded-xl shadow-md p-8 border border-gray-100 section-animate" data-animation="animate__fadeInLeft">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-primary-blue/10 mb-6">
                        <i data-lucide="eye" class="w-8 h-8 text-primary-blue"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-primary-blue mb-4">Our Vision</h3>
                    <p class="text-gray-600 mb-4">To be the most trusted global logistics partner, connecting businesses across continents with innovative and sustainable shipping solutions.</p>
                    <p class="text-gray-600">We envision a world where international trade flows seamlessly, empowering businesses of all sizes to access global markets with confidence and ease.</p>
                </div>
                
                <!-- Mission -->
                <div class="bg-white rounded-xl shadow-md p-8 border border-gray-100 section-animate" data-animation="animate__fadeInRight">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-primary-blue/10 mb-6">
                        <i data-lucide="target" class="w-8 h-8 text-primary-blue"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-primary-blue mb-4">Our Mission</h3>
                    <p class="text-gray-600 mb-4">To deliver reliable, efficient, and sustainable logistics solutions that help our clients succeed in the global marketplace.</p>
                    <p class="text-gray-600">We accomplish this through continuous innovation, exceptional customer service, and a commitment to environmental responsibility in all our operations.</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Core Values Section -->
    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 section-animate" data-animation="animate__fadeInUp">
                <span class="inline-block px-3 py-1 bg-primary-blue/10 text-primary-blue rounded-full text-sm font-medium mb-4">OUR PRINCIPLES</span>
                <h2 class="text-3xl md:text-4xl font-bold text-primary-blue mb-4">Core Values</h2>
                <p class="text-lg text-gray-600">The fundamental beliefs that guide our decisions and actions</p>
            </div>
            
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Value 1: Integrity -->
                <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 hover:border-secondary-green transition-colors section-animate" data-animation="animate__fadeInUp">
                    <div class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-primary-blue/10 mb-6">
                        <i data-lucide="shield" class="w-7 h-7 text-primary-blue"></i>
                    </div>
                    <h3 class="text-xl font-bold text-primary-blue mb-3">Integrity</h3>
                    <p class="text-gray-600">We conduct our business with the highest ethical standards, ensuring transparency and honesty in all our interactions.</p>
                </div>
                
                <!-- Value 2: Excellence -->
                <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 hover:border-secondary-green transition-colors section-animate" data-animation="animate__fadeInUp animate__delay-1s">
                    <div class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-primary-blue/10 mb-6">
                        <i data-lucide="award" class="w-7 h-7 text-primary-blue"></i>
                    </div>
                    <h3 class="text-xl font-bold text-primary-blue mb-3">Excellence</h3>
                    <p class="text-gray-600">We strive for excellence in every aspect of our operations, consistently exceeding expectations and raising industry standards.</p>
                </div>
                
                <!-- Value 3: Innovation -->
                <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 hover:border-secondary-green transition-colors section-animate" data-animation="animate__fadeInUp animate__delay-2s">
                    <div class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-primary-blue/10 mb-6">
                        <i data-lucide="lightbulb" class="w-7 h-7 text-primary-blue"></i>
                    </div>
                    <h3 class="text-xl font-bold text-primary-blue mb-3">Innovation</h3>
                    <p class="text-gray-600">We embrace change and continuously seek new ways to improve our services, leveraging technology to solve complex logistics challenges.</p>
                </div>
                
                <!-- Value 4: Sustainability -->
                <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 hover:border-secondary-green transition-colors section-animate" data-animation="animate__fadeInUp animate__delay-3s">
                    <div class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-primary-blue/10 mb-6">
                        <i data-lucide="leaf" class="w-7 h-7 text-primary-blue"></i>
                    </div>
                    <h3 class="text-xl font-bold text-primary-blue mb-3">Sustainability</h3>
                    <p class="text-gray-600">We are committed to environmentally responsible practices, reducing our carbon footprint and promoting sustainable shipping methods.</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Leadership Team Section -->
    <section class="py-16 md:py-24 bg-gradient-to-br from-primary-blue via-primary-blue to-dark-navy text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 section-animate" data-animation="animate__fadeInUp">
                <span class="inline-block px-3 py-1 bg-white/10 backdrop-blur-sm rounded-full text-sm font-medium mb-4">OUR TEAM</span>
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Leadership Team</h2>
                <p class="text-lg opacity-90">Meet the experienced professionals who lead our global operations</p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Team Member 1 -->
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/10 text-center section-animate" data-animation="animate__fadeInUp">
                    <div class="w-24 h-24 bg-white/20 rounded-full mx-auto mb-6 overflow-hidden">
                        <!-- Would be replaced with actual image -->
                        <div class="w-full h-full flex items-center justify-center">
                            <i data-lucide="user" class="w-12 h-12 text-white/70"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Rajiv Sharma</h3>
                    <p class="text-sm opacity-80 mb-4">Chief Executive Officer</p>
                    <p class="text-sm opacity-70">With over 25 years of experience in global logistics, Rajiv has led Mari Nexa Shipping's growth since its founding, establishing key partnerships worldwide.</p>
                </div>
                
                <!-- Team Member 2 -->
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/10 text-center section-animate" data-animation="animate__fadeInUp animate__delay-1s">
                    <div class="w-24 h-24 bg-white/20 rounded-full mx-auto mb-6 overflow-hidden">
                        <!-- Would be replaced with actual image -->
                        <div class="w-full h-full flex items-center justify-center">
                            <i data-lucide="user" class="w-12 h-12 text-white/70"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Priya Patel</h3>
                    <p class="text-sm opacity-80 mb-4">Chief Operations Officer</p>
                    <p class="text-sm opacity-70">Priya oversees our global operations, ensuring seamless service delivery across continents with her extensive background in supply chain management.</p>
                </div>
                
                <!-- Team Member 3 -->
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/10 text-center section-animate" data-animation="animate__fadeInUp animate__delay-2s">
                    <div class="w-24 h-24 bg-white/20 rounded-full mx-auto mb-6 overflow-hidden">
                        <!-- Would be replaced with actual image -->
                        <div class="w-full h-full flex items-center justify-center">
                            <i data-lucide="user" class="w-12 h-12 text-white/70"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold mb-2">David Chen</h3>
                    <p class="text-sm opacity-80 mb-4">Chief Technology Officer</p>
                    <p class="text-sm opacity-70">David leads our digital transformation initiatives, implementing cutting-edge logistics technology to enhance tracking, efficiency, and customer experience.</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Milestones Section -->
    <section class="py-16 md:py-24 bg-background-light-grey">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 section-animate" data-animation="animate__fadeInUp">
                <span class="inline-block px-3 py-1 bg-primary-blue/10 text-primary-blue rounded-full text-sm font-medium mb-4">OUR JOURNEY</span>
                <h2 class="text-3xl md:text-4xl font-bold text-primary-blue mb-4">Company Milestones</h2>
                <p class="text-lg text-gray-600">Key moments that shaped our growth and success over the years</p>
            </div>
            
            <div class="relative">
                <!-- Timeline connector -->
                <div class="hidden md:block absolute left-1/2 top-0 bottom-0 w-1 bg-primary-blue/20 transform -translate-x-1/2"></div>
                
                <div class="space-y-12">
                    <!-- Milestone 2010 -->
                    <div class="md:grid md:grid-cols-2 gap-8 items-center">
                        <div class="text-right section-animate" data-animation="animate__fadeInLeft">
                            <span class="inline-block px-3 py-1 bg-primary-blue/10 text-primary-blue rounded-full text-sm font-medium mb-2">2010</span>
                            <h3 class="text-xl font-bold text-primary-blue mb-3">Company Founded</h3>
                            <p class="text-gray-600">Mari Nexa Shipping was established in Mumbai with a small team of 5 people, focusing on regional shipping services.</p>
                        </div>
                        <div class="hidden md:block relative">
                            <div class="absolute left-0 top-1/2 w-4 h-4 bg-secondary-green rounded-full transform -translate-x-1/2 -translate-y-1/2 shadow-lg border-2 border-white"></div>
                        </div>
                    </div>
                    
                    <!-- Milestone 2013 -->
                    <div class="md:grid md:grid-cols-2 gap-8 items-center">
                        <div class="hidden md:block relative">
                            <div class="absolute right-0 top-1/2 w-4 h-4 bg-secondary-green rounded-full transform translate-x-1/2 -translate-y-1/2 shadow-lg border-2 border-white"></div>
                        </div>
                        <div class="section-animate" data-animation="animate__fadeInRight">
                            <span class="inline-block px-3 py-1 bg-primary-blue/10 text-primary-blue rounded-full text-sm font-medium mb-2">2013</span>
                            <h3 class="text-xl font-bold text-primary-blue mb-3">International Expansion</h3>
                            <p class="text-gray-600">Expanded operations to Southeast Asia and the Middle East, opening offices in Singapore and Dubai.</p>
                        </div>
                    </div>
                    
                    <!-- Milestone 2016 -->
                    <div class="md:grid md:grid-cols-2 gap-8 items-center">
                        <div class="text-right section-animate" data-animation="animate__fadeInLeft">
                            <span class="inline-block px-3 py-1 bg-primary-blue/10 text-primary-blue rounded-full text-sm font-medium mb-2">2016</span>
                            <h3 class="text-xl font-bold text-primary-blue mb-3">Digital Transformation</h3>
                            <p class="text-gray-600">Launched our proprietary tracking platform, enabling real-time shipment visibility for customers across all service lines.</p>
                        </div>
                        <div class="hidden md:block relative">
                            <div class="absolute left-0 top-1/2 w-4 h-4 bg-secondary-green rounded-full transform -translate-x-1/2 -translate-y-1/2 shadow-lg border-2 border-white"></div>
                        </div>
                    </div>
                    
                    <!-- Milestone 2019 -->
                    <div class="md:grid md:grid-cols-2 gap-8 items-center">
                        <div class="hidden md:block relative">
                            <div class="absolute right-0 top-1/2 w-4 h-4 bg-secondary-green rounded-full transform translate-x-1/2 -translate-y-1/2 shadow-lg border-2 border-white"></div>
                        </div>
                        <div class="section-animate" data-animation="animate__fadeInRight">
                            <span class="inline-block px-3 py-1 bg-primary-blue/10 text-primary-blue rounded-full text-sm font-medium mb-2">2019</span>
                            <h3 class="text-xl font-bold text-primary-blue mb-3">Global Network</h3>
                            <p class="text-gray-600">Reached 100 countries milestone with the establishment of key partnerships in North America and Europe.</p>
                        </div>
                    </div>
                    
                    <!-- Milestone 2022 -->
                    <div class="md:grid md:grid-cols-2 gap-8 items-center">
                        <div class="text-right section-animate" data-animation="animate__fadeInLeft">
                            <span class="inline-block px-3 py-1 bg-primary-blue/10 text-primary-blue rounded-full text-sm font-medium mb-2">2022</span>
                            <h3 class="text-xl font-bold text-primary-blue mb-3">Sustainability Initiative</h3>
                            <p class="text-gray-600">Launched our Green Shipping program, committed to reducing carbon emissions by 30% across our operations by 2030.</p>
                        </div>
                        <div class="hidden md:block relative">
                            <div class="absolute left-0 top-1/2 w-4 h-4 bg-secondary-green rounded-full transform -translate-x-1/2 -translate-y-1/2 shadow-lg border-2 border-white"></div>
                        </div>
                    </div>
                    
                    <!-- Milestone 2025 -->
                    <div class="md:grid md:grid-cols-2 gap-8 items-center">
                        <div class="hidden md:block relative">
                            <div class="absolute right-0 top-1/2 w-4 h-4 bg-secondary-green rounded-full transform translate-x-1/2 -translate-y-1/2 shadow-lg border-2 border-white"></div>
                        </div>
                        <div class="section-animate" data-animation="animate__fadeInRight">
                            <span class="inline-block px-3 py-1 bg-primary-blue/10 text-primary-blue rounded-full text-sm font-medium mb-2">2025</span>
                            <h3 class="text-xl font-bold text-primary-blue mb-3">Today & Beyond</h3>
                            <p class="text-gray-600">Currently serving 120+ countries with over 500 employees and continuing to innovate in global logistics solutions.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="py-16 md:py-20 bg-gradient-to-br from-primary-blue to-dark-navy text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto section-animate" data-animation="animate__fadeInUp">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Experience Excellence in Global Shipping?</h2>
                <p class="text-lg opacity-90 mb-8">Partner with Mari Nexa Shipping for reliable, efficient, and sustainable logistics solutions tailored to your business needs.</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('quote.create') }}" class="bg-secondary-green hover:bg-opacity-90 text-white px-8 py-4 rounded-lg text-lg font-semibold flex items-center justify-center transition-all">
                        <i data-lucide="clipboard-check" class="w-5 h-5 mr-2"></i> 
                        Get A Free Quote
                    </a>
                    <a href="{{ route('contact') }}" class="bg-white/10 backdrop-blur-sm border border-white/20 hover:bg-white/20 px-8 py-4 rounded-lg text-lg font-semibold flex items-center justify-center transition-all">
                        <i data-lucide="phone" class="w-5 h-5 mr-2"></i> 
                        Contact Our Team
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
