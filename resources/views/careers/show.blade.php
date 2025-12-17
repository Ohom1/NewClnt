@extends('layouts.app')

@section('title', $job['title'] . ' - Careers - Mari Nexa Shipping')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-primary-blue via-primary-blue to-dark-navy text-white overflow-hidden py-16 md:py-20">
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
            <div>
                <a href="{{ route('careers') }}" class="inline-flex items-center text-white/80 hover:text-white mb-6 transition-colors">
                    <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
                    <span>Back to All Jobs</span>
                </a>
                
                <div class="mb-4">
                    <span class="inline-block px-3 py-1 bg-white/10 backdrop-blur-sm rounded-full text-sm font-medium animate__animated animate__fadeInDown">
                        {{ $job['department'] }}
                    </span>
                </div>
                
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6 animate__animated animate__fadeInUp">{{ $job['title'] }}</h1>
                
                <div class="flex flex-wrap gap-6 mb-8">
                    <div class="flex items-center">
                        <div class="bg-white/10 p-2 rounded-full mr-3">
                            <i data-lucide="map-pin" class="w-5 h-5"></i>
                        </div>
                        <span>{{ $job['location'] }}</span>
                    </div>
                    
                    <div class="flex items-center">
                        <div class="bg-white/10 p-2 rounded-full mr-3">
                            <i data-lucide="briefcase" class="w-5 h-5"></i>
                        </div>
                        <span>{{ $job['type'] }}</span>
                    </div>
                    
                    <div class="flex items-center">
                        <div class="bg-white/10 p-2 rounded-full mr-3">
                            <i data-lucide="dollar-sign" class="w-5 h-5"></i>
                        </div>
                        <span>{{ $job['salary'] }}</span>
                    </div>
                    
                    <div class="flex items-center">
                        <div class="bg-white/10 p-2 rounded-full mr-3">
                            <i data-lucide="calendar" class="w-5 h-5"></i>
                        </div>
                        <span>Posted: {{ \Carbon\Carbon::parse($job['posted_date'])->format('M d, Y') }}</span>
                    </div>
                </div>
                
                <div class="flex flex-wrap gap-4">
                    <a href="#apply-now" class="inline-flex items-center justify-center bg-secondary-green hover:bg-opacity-90 text-white px-6 py-3 rounded-md font-semibold transition-all animate__animated animate__fadeInUp">
                        <i data-lucide="send" class="w-5 h-5 mr-2"></i>
                        Apply Now
                    </a>
                    
                    <button class="inline-flex items-center justify-center bg-white/10 backdrop-blur-sm border border-white/20 hover:bg-white/20 px-6 py-3 rounded-md font-semibold transition-all animate__animated animate__fadeInUp animate__delay-1s" onclick="shareJob()">
                        <i data-lucide="share-2" class="w-5 h-5 mr-2"></i>
                        Share Job
                    </button>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Job Details Section -->
    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-12">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <div class="prose max-w-none">
                        <h2 class="text-2xl font-bold text-primary-blue mb-6">Job Description</h2>
                        <p class="text-gray-600 mb-8">{{ $job['description'] }}</p>
                        
                        <h3 class="text-xl font-bold text-primary-blue mb-4">Key Responsibilities</h3>
                        <ul class="space-y-2 mb-8">
                            @foreach($job['responsibilities'] as $responsibility)
                            <li class="flex items-start">
                                <div class="mt-1 mr-3 text-secondary-green">
                                    <i data-lucide="check-circle" class="w-5 h-5"></i>
                                </div>
                                <span class="text-gray-600">{{ $responsibility }}</span>
                            </li>
                            @endforeach
                        </ul>
                        
                        <h3 class="text-xl font-bold text-primary-blue mb-4">Requirements & Qualifications</h3>
                        <ul class="space-y-2 mb-8">
                            @foreach($job['requirements'] as $requirement)
                            <li class="flex items-start">
                                <div class="mt-1 mr-3 text-secondary-green">
                                    <i data-lucide="check-circle" class="w-5 h-5"></i>
                                </div>
                                <span class="text-gray-600">{{ $requirement }}</span>
                            </li>
                            @endforeach
                        </ul>
                        
                        <h3 class="text-xl font-bold text-primary-blue mb-4">Benefits & Perks</h3>
                        <ul class="space-y-2 mb-8">
                            @foreach($job['benefits'] as $benefit)
                            <li class="flex items-start">
                                <div class="mt-1 mr-3 text-secondary-green">
                                    <i data-lucide="check-circle" class="w-5 h-5"></i>
                                </div>
                                <span class="text-gray-600">{{ $benefit }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <!-- Application Form -->
                    <div id="apply-now" class="mt-12 pt-12 border-t border-gray-200">
                        <h2 class="text-2xl font-bold text-primary-blue mb-6">Apply for This Position</h2>
                        
                        @if(session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 animate__animated animate__fadeIn">
                                {{ session('success') }}
                            </div>
                        @endif
                        
                        <form action="{{ route('careers.apply') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                            @csrf
                            <input type="hidden" name="job_id" value="{{ $job['id'] }}">
                            <input type="hidden" name="job_title" value="{{ $job['title'] }}">
                            
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
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number <span class="text-red-500">*</span></label>
                                <input type="tel" name="phone" id="phone" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue @error('phone') border-red-500 @enderror" value="{{ old('phone') }}" required>
                                @error('phone')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="resume" class="block text-sm font-medium text-gray-700 mb-1">Resume/CV <span class="text-red-500">*</span></label>
                                <div class="flex items-center space-x-4">
                                    <label class="flex-1 flex items-center justify-center px-4 py-2 border-2 border-dashed border-gray-300 rounded-md cursor-pointer hover:border-primary-blue transition-colors">
                                        <i data-lucide="upload" class="w-5 h-5 mr-2 text-gray-500"></i>
                                        <span class="text-gray-500">Upload PDF, DOC or DOCX (Max 2MB)</span>
                                        <input type="file" name="resume" id="resume" class="hidden" accept=".pdf,.doc,.docx" required>
                                    </label>
                                    <span id="file-selected" class="hidden text-sm text-primary-blue"></span>
                                </div>
                                @error('resume')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="cover_letter" class="block text-sm font-medium text-gray-700 mb-1">Cover Letter (Optional)</label>
                                <textarea name="cover_letter" id="cover_letter" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary-blue @error('cover_letter') border-red-500 @enderror">{{ old('cover_letter') }}</textarea>
                                @error('cover_letter')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="flex items-center">
                                <input type="checkbox" name="privacy_policy" id="privacy_policy" class="w-4 h-4 text-primary-blue focus:ring-primary-blue border-gray-300 rounded" required>
                                <label for="privacy_policy" class="ml-2 text-sm text-gray-600">
                                    I agree to the <a href="#" class="text-primary-blue hover:underline">Privacy Policy</a> and consent to the processing of my personal data.
                                </label>
                            </div>
                            
                            <div>
                                <button type="submit" class="inline-flex items-center justify-center bg-primary-blue hover:bg-opacity-90 text-white px-6 py-3 rounded-md font-semibold transition-all">
                                    <i data-lucide="send" class="w-5 h-5 mr-2"></i>
                                    Submit Application
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Sidebar -->
                <div>
                    <!-- Job Overview -->
                    <div class="bg-background-light-grey rounded-xl p-6 mb-8">
                        <h3 class="text-xl font-bold text-primary-blue mb-6">Job Overview</h3>
                        
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="bg-white rounded-full p-2 mr-4">
                                    <i data-lucide="map-pin" class="w-5 h-5 text-primary-blue"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Location</p>
                                    <p class="font-medium text-gray-800">{{ $job['location'] }}</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="bg-white rounded-full p-2 mr-4">
                                    <i data-lucide="briefcase" class="w-5 h-5 text-primary-blue"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Job Type</p>
                                    <p class="font-medium text-gray-800">{{ $job['type'] }}</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="bg-white rounded-full p-2 mr-4">
                                    <i data-lucide="layers" class="w-5 h-5 text-primary-blue"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Department</p>
                                    <p class="font-medium text-gray-800">{{ $job['department'] }}</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="bg-white rounded-full p-2 mr-4">
                                    <i data-lucide="dollar-sign" class="w-5 h-5 text-primary-blue"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Salary Range</p>
                                    <p class="font-medium text-gray-800">{{ $job['salary'] }}</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="bg-white rounded-full p-2 mr-4">
                                    <i data-lucide="award" class="w-5 h-5 text-primary-blue"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Experience</p>
                                    <p class="font-medium text-gray-800">{{ $job['experience'] }}</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="bg-white rounded-full p-2 mr-4">
                                    <i data-lucide="book-open" class="w-5 h-5 text-primary-blue"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Education</p>
                                    <p class="font-medium text-gray-800">{{ $job['education'] }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-8">
                            <a href="#apply-now" class="inline-flex items-center justify-center w-full bg-secondary-green hover:bg-opacity-90 text-white px-6 py-3 rounded-md font-semibold transition-all">
                                <i data-lucide="send" class="w-5 h-5 mr-2"></i>
                                Apply Now
                            </a>
                        </div>
                    </div>
                    
                    <!-- Share Job -->
                    <div class="bg-background-light-grey rounded-xl p-6 mb-8">
                        <h3 class="text-xl font-bold text-primary-blue mb-4">Share This Job</h3>
                        <p class="text-gray-600 text-sm mb-4">Know someone perfect for this role? Share it with them!</p>
                        
                        <div class="flex space-x-3">
                            <button onclick="shareOnLinkedIn()" class="bg-white hover:bg-primary-blue hover:text-white text-primary-blue p-3 rounded-full transition-colors">
                                <i data-lucide="linkedin" class="w-5 h-5"></i>
                            </button>
                            <button onclick="shareOnTwitter()" class="bg-white hover:bg-primary-blue hover:text-white text-primary-blue p-3 rounded-full transition-colors">
                                <i data-lucide="twitter" class="w-5 h-5"></i>
                            </button>
                            <button onclick="shareOnFacebook()" class="bg-white hover:bg-primary-blue hover:text-white text-primary-blue p-3 rounded-full transition-colors">
                                <i data-lucide="facebook" class="w-5 h-5"></i>
                            </button>
                            <button onclick="shareViaEmail()" class="bg-white hover:bg-primary-blue hover:text-white text-primary-blue p-3 rounded-full transition-colors">
                                <i data-lucide="mail" class="w-5 h-5"></i>
                            </button>
                        </div>
                    </div>
                    
                    @if(count($relatedJobs) > 0)
                    <!-- Related Jobs -->
                    <div class="bg-background-light-grey rounded-xl p-6">
                        <h3 class="text-xl font-bold text-primary-blue mb-6">Similar Jobs</h3>
                        
                        <div class="space-y-4">
                            @foreach($relatedJobs as $relatedJob)
                            <a href="{{ route('careers.show', $relatedJob['slug']) }}" class="block bg-white rounded-lg p-4 hover:shadow-md transition-shadow">
                                <h4 class="font-bold text-primary-blue mb-2">{{ $relatedJob['title'] }}</h4>
                                <div class="flex flex-wrap gap-2 text-sm text-gray-600 mb-2">
                                    <span class="inline-flex items-center">
                                        <i data-lucide="map-pin" class="w-3 h-3 mr-1"></i>
                                        {{ $relatedJob['location'] }}
                                    </span>
                                    <span class="inline-flex items-center">
                                        <i data-lucide="briefcase" class="w-3 h-3 mr-1"></i>
                                        {{ $relatedJob['type'] }}
                                    </span>
                                </div>
                                <div class="text-sm text-secondary-green font-medium">View Details →</div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Resume file input
        const fileInput = document.getElementById('resume');
        const fileSelected = document.getElementById('file-selected');
        
        fileInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                fileSelected.textContent = this.files[0].name;
                fileSelected.classList.remove('hidden');
            } else {
                fileSelected.classList.add('hidden');
            }
        });
    });
    
    // Share job functions
    function shareJob() {
        if (navigator.share) {
            navigator.share({
                title: '{{ $job['title'] }} - Mari Nexa Shipping',
                text: 'Check out this job opportunity at Mari Nexa Shipping: {{ $job['title'] }}',
                url: window.location.href
            })
            .catch(error => console.log('Error sharing:', error));
        } else {
            alert('Web Share API not supported on this browser. Please use the social sharing buttons below.');
        }
    }
    
    function shareOnLinkedIn() {
        const url = encodeURIComponent(window.location.href);
        const title = encodeURIComponent('{{ $job['title'] }} - Mari Nexa Shipping');
        window.open(`https://www.linkedin.com/sharing/share-offsite/?url=${url}`);
    }
    
    function shareOnTwitter() {
        const url = encodeURIComponent(window.location.href);
        const text = encodeURIComponent('Check out this job opportunity at Mari Nexa Shipping: {{ $job['title'] }}');
        window.open(`https://twitter.com/intent/tweet?url=${url}&text=${text}`);
    }
    
    function shareOnFacebook() {
        const url = encodeURIComponent(window.location.href);
        window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`);
    }
    
    function shareViaEmail() {
        const subject = encodeURIComponent('Job Opportunity: {{ $job['title'] }} at Mari Nexa Shipping');
        const body = encodeURIComponent('I thought you might be interested in this job opportunity:\n\n{{ $job['title'] }} at Mari Nexa Shipping\n\n' + window.location.href);
        window.location.href = `mailto:?subject=${subject}&body=${body}`;
    }
</script>
@endpush
