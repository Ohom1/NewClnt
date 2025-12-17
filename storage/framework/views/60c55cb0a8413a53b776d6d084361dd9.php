<footer class="bg-primary-blue text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Company Info -->
            <div>
                <img src="<?php echo e(asset('images/logo-white.png')); ?>" alt="Marinexa Shipping Pvt Ltd" class="h-16 mb-4">
                <p class="text-sm mb-4">International Logistics, Freight Forwarding, and Global Shipping (Air & Sea Cargo) services you can trust.</p>
                <div class="flex space-x-4">
                    <a href="#" class="text-white hover:text-accent-light-green">
                        <i data-lucide="linkedin" class="w-5 h-5"></i>
                    </a>
                    <a href="#" class="text-white hover:text-accent-light-green">
                        <i data-lucide="facebook" class="w-5 h-5"></i>
                    </a>
                    <a href="#" class="text-white hover:text-accent-light-green">
                        <i data-lucide="twitter" class="w-5 h-5"></i>
                    </a>
                    <a href="#" class="text-white hover:text-accent-light-green">
                        <i data-lucide="instagram" class="w-5 h-5"></i>
                    </a>
                </div>
            </div>
            
            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-bold mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="<?php echo e(route('home')); ?>" class="hover:text-accent-light-green transition-colors">Home</a></li>
                    <li><a href="<?php echo e(route('about')); ?>" class="hover:text-accent-light-green transition-colors">About Us</a></li>
                    <li><a href="<?php echo e(route('services.index')); ?>" class="hover:text-accent-light-green transition-colors">Services</a></li>
                    <li><a href="<?php echo e(route('routes.index')); ?>" class="hover:text-accent-light-green transition-colors">Routes</a></li>
                    <li><a href="<?php echo e(route('blog')); ?>" class="hover:text-accent-light-green transition-colors">Blog</a></li>
                    <li><a href="<?php echo e(route('careers')); ?>" class="hover:text-accent-light-green transition-colors">Careers</a></li>
                    <li><a href="<?php echo e(route('contact')); ?>" class="hover:text-accent-light-green transition-colors">Contact</a></li>
                </ul>
            </div>
            
            <!-- Services -->
            <div>
                <h3 class="text-lg font-bold mb-4">Our Services</h3>
                <ul class="space-y-2">
                    <li><a href="<?php echo e(route('services.show', 'ocean-freight')); ?>" class="hover:text-accent-light-green transition-colors">Ocean Freight</a></li>
                    <li><a href="<?php echo e(route('services.show', 'air-freight')); ?>" class="hover:text-accent-light-green transition-colors">Air Freight</a></li>
                    <li><a href="<?php echo e(route('services.show', 'customs-clearance')); ?>" class="hover:text-accent-light-green transition-colors">Customs Clearance</a></li>
                    <li><a href="<?php echo e(route('services.show', 'door-to-door')); ?>" class="hover:text-accent-light-green transition-colors">Door to Door Delivery</a></li>
                    <li><a href="<?php echo e(route('quote.create')); ?>" class="hover:text-accent-light-green transition-colors">Get a Quote</a></li>
                </ul>
            </div>
            
            <!-- Contact Info -->
            <div>
                <h3 class="text-lg font-bold mb-4">Contact Us</h3>
                <ul class="space-y-2">
                    <li class="flex items-start">
                        <i data-lucide="map-pin" class="w-5 h-5 mr-2 flex-shrink-0 mt-1"></i>
                        <span>4TH FLOOR, FLAT NO 218, PKT F SEC-B-2, Narela, New Delhi, 110040, India</span>
                    </li>
                    <li class="flex items-center">
                        <i data-lucide="phone" class="w-5 h-5 mr-2"></i>
                        <a href="tel:+918178480670" class="hover:text-accent-light-green transition-colors">+91 81784 80670</a>
                    </li>
                    <li class="flex items-center">
                        <i data-lucide="mail" class="w-5 h-5 mr-2"></i>
                        <a href="mailto:care@marinexashipping.com" class="hover:text-accent-light-green transition-colors">care@marinexashipping.com</a>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="border-t border-gray-700 mt-8 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-sm">&copy; <?php echo e(date('Y')); ?> Marinexa Shipping Pvt Ltd. All Rights Reserved.</p>
                <div class="flex space-x-4 mt-4 md:mt-0">
                    <a href="#" class="text-sm hover:text-accent-light-green transition-colors">Privacy Policy</a>
                    <a href="#" class="text-sm hover:text-accent-light-green transition-colors">Terms of Service</a>
                    <a href="#" class="text-sm hover:text-accent-light-green transition-colors">Sitemap</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php /**PATH /Users/omdubey/Documents/marinexa-shipping-website-main/resources/views/partials/footer.blade.php ENDPATH**/ ?>