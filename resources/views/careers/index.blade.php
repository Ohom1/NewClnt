@extends('layouts.app')

@section('title', 'Careers - Mari Nexa Shipping')

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
                <span class="inline-block px-3 py-1 bg-white/10 backdrop-blur-sm rounded-full text-sm font-medium mb-4 animate__animated animate__fadeInDown">JOIN OUR TEAM</span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 animate__animated animate__fadeInUp">Careers at Mari Nexa</h1>
                <p class="text-xl opacity-90 mb-8 animate__animated animate__fadeInUp animate__delay-1s">Join our global team of logistics professionals and help shape the future of international shipping</p>
            </div>
        </div>
    </section>
    
    <!-- Why Join Us Section -->
    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 section-animate" data-animation="animate__fadeInUp">
                <span class="inline-block px-3 py-1 bg-primary-blue/10 text-primary-blue rounded-full text-sm font-medium mb-4">WHY MARI NEXA</span>
                <h2 class="text-3xl md:text-4xl font-bold text-primary-blue mb-4">Why Join Our Team</h2>
                <p class="text-lg text-gray-600">Discover the benefits of building your career with a global leader in shipping and logistics</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Benefit 1: Global Opportunities -->
                <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 section-animate" data-animation="animate__fadeInUp">
                    <div class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-primary-blue/10 mb-6">
                        <i data-lucide="globe" class="w-7 h-7 text-primary-blue"></i>
                    </div>
                    <h3 class="text-xl font-bold text-primary-blue mb-3">Global Opportunities</h3>
                    <p class="text-gray-600">Work with teams across 120+ countries and gain international exposure in a truly global company.</p>
                </div>
                
                <!-- Benefit 2: Career Growth -->
                <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 section-animate" data-animation="animate__fadeInUp animate__delay-1s">
                    <div class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-primary-blue/10 mb-6">
                        <i data-lucide="trending-up" class="w-7 h-7 text-primary-blue"></i>
                    </div>
                    <h3 class="text-xl font-bold text-primary-blue mb-3">Career Growth</h3>
                    <p class="text-gray-600">Benefit from clear career paths, mentorship programs, and ongoing professional development opportunities.</p>
                </div>
                
                <!-- Benefit 3: Innovative Culture -->
                <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 section-animate" data-animation="animate__fadeInUp animate__delay-2s">
                    <div class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-primary-blue/10 mb-6">
                        <i data-lucide="lightbulb" class="w-7 h-7 text-primary-blue"></i>
                    </div>
                    <h3 class="text-xl font-bold text-primary-blue mb-3">Innovative Culture</h3>
                    <p class="text-gray-600">Be part of a forward-thinking team that embraces technology and new approaches to global logistics.</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Featured Job Openings -->
    <section class="py-16 md:py-24 bg-background-light-grey">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 section-animate" data-animation="animate__fadeInUp">
                <span class="inline-block px-3 py-1 bg-primary-blue/10 text-primary-blue rounded-full text-sm font-medium mb-4">OPEN POSITIONS</span>
                <h2 class="text-3xl md:text-4xl font-bold text-primary-blue mb-4">Featured Job Openings</h2>
                <p class="text-lg text-gray-600">Explore our current opportunities and find your perfect role</p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredOpenings as $job)
                <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:border-secondary-green transition-colors section-animate" data-animation="animate__fadeInUp">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <h3 class="text-xl font-bold text-primary-blue">{{ $job['title'] }}</h3>
                            <span class="px-3 py-1 bg-primary-blue/10 text-primary-blue text-xs font-medium rounded-full">{{ $job['type'] }}</span>
                        </div>
                        
                        <div class="space-y-3 mb-6">
                            <div class="flex items-center text-gray-600">
                                <i data-lucide="map-pin" class="w-4 h-4 mr-2 text-secondary-green"></i>
                                <span>{{ $job['location'] }}</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <i data-lucide="briefcase" class="w-4 h-4 mr-2 text-secondary-green"></i>
                                <span>{{ $job['department'] }}</span>
                            </div>
                        </div>
                        
                        <p class="text-gray-600 mb-6">{{ $job['description'] }}</p>
                        
                        <a href="{{ route('careers.show', $job['slug']) }}" class="inline-flex items-center justify-center bg-primary-blue hover:bg-opacity-90 text-white px-4 py-2 rounded-md transition-all">
                            <span>View Details</span>
                            <i data-lucide="chevron-right" class="w-4 h-4 ml-1"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- View All Jobs Button -->
            <div class="text-center mt-12">
                <a href="#all-jobs" class="inline-flex items-center justify-center border-2 border-primary-blue hover:bg-primary-blue hover:text-white text-primary-blue px-6 py-3 rounded-md font-semibold transition-all">
                    <i data-lucide="list" class="w-5 h-5 mr-2"></i>
                    View All Open Positions
                </a>
            </div>
        </div>
    </section>
    
    <!-- All Job Openings Section -->
    <section id="all-jobs" class="py-16 md:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 section-animate" data-animation="animate__fadeInUp">
                <span class="inline-block px-3 py-1 bg-primary-blue/10 text-primary-blue rounded-full text-sm font-medium mb-4">CAREERS</span>
                <h2 class="text-3xl md:text-4xl font-bold text-primary-blue mb-4">All Open Positions</h2>
                <p class="text-lg text-gray-600">Browse all available opportunities at Mari Nexa Shipping</p>
            </div>
            
            <!-- Department Tabs -->
            <div class="mb-12 section-animate" data-animation="animate__fadeInUp">
                <div class="flex flex-wrap justify-center gap-4 mb-8">
                    <button class="px-4 py-2 bg-primary-blue text-white rounded-md font-medium department-tab active" data-department="all">All Departments</button>
                    @foreach($departmentGroups as $department => $jobs)
                    <button class="px-4 py-2 bg-white text-primary-blue hover:bg-primary-blue/10 rounded-md font-medium department-tab" data-department="{{ $department }}">{{ $department }}</button>
                    @endforeach
                </div>
                
                <!-- Job Listings -->
                <div class="space-y-4">
                    @foreach($openings as $job)
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 transition-all hover:shadow-md job-listing" data-department="{{ $job['department'] }}">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                            <div class="mb-4 md:mb-0">
                                <h3 class="text-xl font-bold text-primary-blue mb-2">{{ $job['title'] }}</h3>
                                <div class="flex flex-wrap items-center gap-4">
                                    <div class="flex items-center text-gray-600">
                                        <i data-lucide="map-pin" class="w-4 h-4 mr-1 text-secondary-green"></i>
                                        <span>{{ $job['location'] }}</span>
                                    </div>
                                    <div class="flex items-center text-gray-600">
                                        <i data-lucide="briefcase" class="w-4 h-4 mr-1 text-secondary-green"></i>
                                        <span>{{ $job['department'] }}</span>
                                    </div>
                                    <div class="flex items-center text-gray-600">
                                        <i data-lucide="clock" class="w-4 h-4 mr-1 text-secondary-green"></i>
                                        <span>{{ $job['type'] }}</span>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('careers.show', $job['slug']) }}" class="inline-flex items-center justify-center bg-white border border-primary-blue hover:bg-primary-blue hover:text-white text-primary-blue px-4 py-2 rounded-md transition-all">
                                <span>View Details</span>
                                <i data-lucide="chevron-right" class="w-4 h-4 ml-1"></i>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    
    <!-- Employee Testimonials -->
    <section class="py-16 md:py-24 bg-primary-blue text-white relative overflow-hidden">
        <!-- Background decoration -->
        <div class="absolute inset-0 opacity-10">
            <div class="mesh-grid w-full h-full"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16 section-animate" data-animation="animate__fadeInUp">
                <span class="inline-block px-3 py-1 bg-white/10 rounded-full text-sm font-medium mb-4">TEAM STORIES</span>
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Life at Mari Nexa</h2>
                <p class="text-lg opacity-90">Hear from our team members about their experiences working with us</p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/10 section-animate" data-animation="animate__fadeInUp">
                    <div class="flex items-center space-x-4 mb-6">
                        <div class="w-14 h-14 bg-white/20 rounded-full overflow-hidden">
                            <!-- Would be replaced with actual image -->
                            <div class="w-full h-full flex items-center justify-center">
                                <i data-lucide="user" class="w-7 h-7 text-white/70"></i>
                            </div>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold">Ananya Patel</h4>
                            <p class="text-sm opacity-80">Supply Chain Manager</p>
                        </div>
                    </div>
                    <p class="opacity-90">
                        "Working at Mari Nexa has given me incredible opportunities to grow professionally. In just three years, I've been promoted twice and had the chance to work on projects across Asia and Europe."
                    </p>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/10 section-animate" data-animation="animate__fadeInUp animate__delay-1s">
                    <div class="flex items-center space-x-4 mb-6">
                        <div class="w-14 h-14 bg-white/20 rounded-full overflow-hidden">
                            <!-- Would be replaced with actual image -->
                            <div class="w-full h-full flex items-center justify-center">
                                <i data-lucide="user" class="w-7 h-7 text-white/70"></i>
                            </div>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold">Michael Chen</h4>
                            <p class="text-sm opacity-80">IT Solutions Architect</p>
                        </div>
                    </div>
                    <p class="opacity-90">
                        "The culture of innovation here is unlike anywhere I've worked before. We're constantly encouraged to find better ways to serve our clients and optimize our systems."
                    </p>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/10 section-animate" data-animation="animate__fadeInUp animate__delay-2s">
                    <div class="flex items-center space-x-4 mb-6">
                        <div class="w-14 h-14 bg-white/20 rounded-full overflow-hidden">
                            <!-- Would be replaced with actual image -->
                            <div class="w-full h-full flex items-center justify-center">
                                <i data-lucide="user" class="w-7 h-7 text-white/70"></i>
                            </div>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold">Sarah Johnson</h4>
                            <p class="text-sm opacity-80">Global Operations Director</p>
                        </div>
                    </div>
                    <p class="opacity-90">
                        "What I value most about Mari Nexa is the commitment to work-life balance and employee wellbeing. I've been able to advance my career while still having time for my family."
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Application Process -->
    <section class="py-16 md:py-24 bg-background-light-grey">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 section-animate" data-animation="animate__fadeInUp">
                <span class="inline-block px-3 py-1 bg-primary-blue/10 text-primary-blue rounded-full text-sm font-medium mb-4">HOW TO APPLY</span>
                <h2 class="text-3xl md:text-4xl font-bold text-primary-blue mb-4">Our Application Process</h2>
                <p class="text-lg text-gray-600">Learn about our hiring journey from application to onboarding</p>
            </div>
            
            <div class="relative">
                <!-- Process timeline connector -->
                <div class="hidden md:block absolute top-24 left-0 w-full h-1 bg-gray-200 z-0"></div>
                
                <div class="grid md:grid-cols-4 gap-8">
                    <!-- Step 1: Apply Online -->
                    <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 text-center relative z-10 section-animate" data-animation="animate__fadeInUp">
                        <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-primary-blue text-white font-bold text-lg mx-auto -mt-10 mb-6">1</div>
                        <div class="mb-4">
                            <i data-lucide="file-text" class="w-10 h-10 mx-auto text-secondary-green"></i>
                        </div>
                        <h3 class="text-lg font-bold text-primary-blue mb-3">Apply Online</h3>
                        <p class="text-gray-600 text-sm">Submit your application and resume through our careers portal for the position that matches your skills.</p>
                    </div>
                    
                    <!-- Step 2: Initial Screening -->
                    <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 text-center relative z-10 section-animate" data-animation="animate__fadeInUp animate__delay-1s">
                        <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-primary-blue text-white font-bold text-lg mx-auto -mt-10 mb-6">2</div>
                        <div class="mb-4">
                            <i data-lucide="phone" class="w-10 h-10 mx-auto text-secondary-green"></i>
                        </div>
                        <h3 class="text-lg font-bold text-primary-blue mb-3">Initial Screening</h3>
                        <p class="text-gray-600 text-sm">Our HR team will review your application and conduct a phone screening to assess your qualifications.</p>
                    </div>
                    
                    <!-- Step 3: Interviews -->
                    <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 text-center relative z-10 section-animate" data-animation="animate__fadeInUp animate__delay-2s">
                        <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-primary-blue text-white font-bold text-lg mx-auto -mt-10 mb-6">3</div>
                        <div class="mb-4">
                            <i data-lucide="users" class="w-10 h-10 mx-auto text-secondary-green"></i>
                        </div>
                        <h3 class="text-lg font-bold text-primary-blue mb-3">Interviews</h3>
                        <p class="text-gray-600 text-sm">Selected candidates will be invited for interviews with the hiring manager and team members.</p>
                    </div>
                    
                    <!-- Step 4: Offer & Onboarding -->
                    <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100 text-center relative z-10 section-animate" data-animation="animate__fadeInUp animate__delay-3s">
                        <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-primary-blue text-white font-bold text-lg mx-auto -mt-10 mb-6">4</div>
                        <div class="mb-4">
                            <i data-lucide="check-circle" class="w-10 h-10 mx-auto text-secondary-green"></i>
                        </div>
                        <h3 class="text-lg font-bold text-primary-blue mb-3">Offer & Onboarding</h3>
                        <p class="text-gray-600 text-sm">Successful candidates will receive an offer and begin our comprehensive onboarding program.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="py-16 md:py-20 bg-gradient-to-br from-primary-blue to-dark-navy text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto section-animate" data-animation="animate__fadeInUp">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Join Our Team?</h2>
                <p class="text-lg opacity-90 mb-8">Explore our current openings and take the first step toward an exciting career in global logistics.</p>
                <a href="#all-jobs" class="bg-white text-primary-blue hover:bg-opacity-90 px-8 py-4 rounded-lg text-lg font-semibold inline-flex items-center transition-all">
                    <i data-lucide="search" class="w-5 h-5 mr-2"></i> 
                    Find Your Perfect Role
                </a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Department filtering functionality
        const departmentTabs = document.querySelectorAll('.department-tab');
        const jobListings = document.querySelectorAll('.job-listing');
        
        departmentTabs.forEach(tab => {
            tab.addEventListener('click', function() {
                // Update active tab styling
                departmentTabs.forEach(t => t.classList.remove('active', 'bg-primary-blue', 'text-white'));
                departmentTabs.forEach(t => t.classList.add('bg-white', 'text-primary-blue', 'hover:bg-primary-blue/10'));
                
                tab.classList.remove('bg-white', 'text-primary-blue', 'hover:bg-primary-blue/10');
                tab.classList.add('active', 'bg-primary-blue', 'text-white');
                
                const selectedDepartment = tab.getAttribute('data-department');
                
                // Show/hide job listings based on department
                jobListings.forEach(job => {
                    if (selectedDepartment === 'all' || job.getAttribute('data-department') === selectedDepartment) {
                        job.style.display = 'block';
                    } else {
                        job.style.display = 'none';
                    }
                });
            });
        });
    });
</script>
@endpush
