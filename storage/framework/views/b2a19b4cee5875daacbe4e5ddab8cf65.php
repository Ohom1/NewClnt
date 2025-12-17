<header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center justify-between h-20">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="<?php echo e(route('home')); ?>" class="flex items-center">
                    <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Marinexa Shipping Pvt Ltd" class="h-16">
                </a>
            </div>
            
            <!-- Desktop Navigation -->
            <div class="hidden md:block">
                <div class="ml-10 flex items-center space-x-8">
                    <a href="<?php echo e(route('home')); ?>" class="text-primary-blue hover:text-secondary-green border-b-2 border-transparent hover:border-secondary-green py-2 transition-all <?php echo e(request()->routeIs('home') ? 'border-secondary-green' : ''); ?>">Home</a>
                    
                    <div class="relative group">
                        <button class="text-primary-blue hover:text-secondary-green border-b-2 border-transparent hover:border-secondary-green py-2 transition-all flex items-center">
                            Services
                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-10 hidden group-hover:block">
                            <a href="<?php echo e(route('services.show', 'ocean-freight')); ?>" class="block px-4 py-2 text-sm text-primary-blue hover:bg-background-light-grey">Ocean Freight</a>
                            <a href="<?php echo e(route('services.show', 'air-freight')); ?>" class="block px-4 py-2 text-sm text-primary-blue hover:bg-background-light-grey">Air Freight</a>
                            <a href="<?php echo e(route('services.show', 'customs-clearance')); ?>" class="block px-4 py-2 text-sm text-primary-blue hover:bg-background-light-grey">Customs Clearance</a>
                            <a href="<?php echo e(route('services.show', 'door-to-door')); ?>" class="block px-4 py-2 text-sm text-primary-blue hover:bg-background-light-grey">Door to Door</a>
                        </div>
                    </div>
                    
                    <a href="<?php echo e(route('routes.index')); ?>" class="text-primary-blue hover:text-secondary-green border-b-2 border-transparent hover:border-secondary-green py-2 transition-all <?php echo e(request()->routeIs('routes.*') ? 'border-secondary-green' : ''); ?>">Routes</a>
                    
                    <a href="<?php echo e(route('about')); ?>" class="text-primary-blue hover:text-secondary-green border-b-2 border-transparent hover:border-secondary-green py-2 transition-all <?php echo e(request()->routeIs('about') ? 'border-secondary-green' : ''); ?>">About</a>
                    
                    <a href="<?php echo e(route('contact')); ?>" class="text-primary-blue hover:text-secondary-green border-b-2 border-transparent hover:border-secondary-green py-2 transition-all <?php echo e(request()->routeIs('contact') ? 'border-secondary-green' : ''); ?>">Contact</a>
                    
                    <a href="<?php echo e(route('careers')); ?>" class="text-primary-blue hover:text-secondary-green border-b-2 border-transparent hover:border-secondary-green py-2 transition-all <?php echo e(request()->routeIs('careers') ? 'border-secondary-green' : ''); ?>">Careers</a>
                    
                    <a href="<?php echo e(route('blog')); ?>" class="text-primary-blue hover:text-secondary-green border-b-2 border-transparent hover:border-secondary-green py-2 transition-all <?php echo e(request()->routeIs('blog.*') ? 'border-secondary-green' : ''); ?>">Blog</a>
                </div>
            </div>
            
            <!-- CTA Button -->
            <div class="hidden md:block">
                <a href="<?php echo e(route('quote.create')); ?>" class="btn-primary">Get a Quote</a>
            </div>
            
            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button type="button" class="mobile-menu-button p-2 rounded-md text-primary-blue hover:text-secondary-green focus:outline-none">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </nav>
    </div>
    
    <!-- Mobile menu -->
    <div class="mobile-menu hidden md:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="<?php echo e(route('home')); ?>" class="block px-3 py-2 rounded-md text-base font-medium text-primary-blue hover:bg-background-light-grey">Home</a>
            
            <div class="service-dropdown">
                <button class="w-full text-left block px-3 py-2 rounded-md text-base font-medium text-primary-blue hover:bg-background-light-grey" style="display: flex; justify-content: space-between; align-items: center;">
                    <span>Services</span>
                    <svg xmlns="http://www.w3.org/2000/svg" style="height: 1rem; width: 1rem;" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div class="service-dropdown-content" style="padding-left: 1rem; display: none;">
                    <a href="<?php echo e(route('services.show', 'ocean-freight')); ?>" class="block px-3 py-2 rounded-md text-base font-medium text-primary-blue hover:bg-background-light-grey">Ocean Freight</a>
                    <a href="<?php echo e(route('services.show', 'air-freight')); ?>" class="block px-3 py-2 rounded-md text-base font-medium text-primary-blue hover:bg-background-light-grey">Air Freight</a>
                    <a href="<?php echo e(route('services.show', 'customs-clearance')); ?>" class="block px-3 py-2 rounded-md text-base font-medium text-primary-blue hover:bg-background-light-grey">Customs Clearance</a>
                    <a href="<?php echo e(route('services.show', 'door-to-door')); ?>" class="block px-3 py-2 rounded-md text-base font-medium text-primary-blue hover:bg-background-light-grey">Door to Door</a>
                </div>
            </div>
            
            <a href="<?php echo e(route('routes.index')); ?>" class="block px-3 py-2 rounded-md text-base font-medium text-primary-blue hover:bg-background-light-grey">Routes</a>
            
            <a href="<?php echo e(route('about')); ?>" class="block px-3 py-2 rounded-md text-base font-medium text-primary-blue hover:bg-background-light-grey">About</a>
            
            <a href="<?php echo e(route('contact')); ?>" class="block px-3 py-2 rounded-md text-base font-medium text-primary-blue hover:bg-background-light-grey">Contact</a>
            
            <a href="<?php echo e(route('careers')); ?>" class="block px-3 py-2 rounded-md text-base font-medium text-primary-blue hover:bg-background-light-grey">Careers</a>
            
            <a href="<?php echo e(route('blog')); ?>" class="block px-3 py-2 rounded-md text-base font-medium text-primary-blue hover:bg-background-light-grey">Blog</a>
            
            <div class="mt-4">
                <a href="<?php echo e(route('quote.create')); ?>" class="w-full block text-center btn-primary">Get a Quote</a>
            </div>
        </div>
    </div>
</header>

<?php $__env->startPush('scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile menu toggle
        const btn = document.querySelector('.mobile-menu-button');
        const menu = document.querySelector('.mobile-menu');
        
        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
        
        // Service dropdown toggle
        const serviceDropdownBtn = document.querySelector('.service-dropdown button');
        const serviceDropdownContent = document.querySelector('.service-dropdown-content');
        
        if (serviceDropdownBtn && serviceDropdownContent) {
            serviceDropdownBtn.addEventListener('click', () => {
                if (serviceDropdownContent.style.display === 'none') {
                    serviceDropdownContent.style.display = 'block';
                } else {
                    serviceDropdownContent.style.display = 'none';
                }
            });
        }
    });
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH /Users/omdubey/Documents/marinexa-shipping-website-main/resources/views/partials/header.blade.php ENDPATH**/ ?>