<?php $__env->startSection('title', 'Request a Shipping Quote'); ?>

<?php $__env->startSection('meta_description', 'Request a free, no-obligation shipping quote for your freight forwarding and logistics needs. Get competitive rates for ocean and air freight services.'); ?>

<?php $__env->startSection('content'); ?>
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
                <span class="inline-block px-3 py-1 bg-white/10 backdrop-blur-sm rounded-full text-sm font-medium mb-4 animate__animated animate__fadeInDown">GET YOUR FREE QUOTE</span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 animate__animated animate__fadeInUp">Request a Shipping Quote</h1>
                <p class="text-xl opacity-90 mb-8 animate__animated animate__fadeInUp animate__delay-1s">Let us provide you with a competitive and transparent quote for your global shipping needs</p>
                
                <div class="flex flex-wrap justify-center gap-4 animate__animated animate__fadeInUp animate__delay-2s">
                    <div class="flex items-center bg-white/10 backdrop-blur-sm px-4 py-2 rounded-full">
                        <i data-lucide="check-circle" class="w-5 h-5 text-secondary-green mr-2"></i>
                        <span class="text-sm">No obligation</span>
                    </div>
                    <div class="flex items-center bg-white/10 backdrop-blur-sm px-4 py-2 rounded-full">
                        <i data-lucide="check-circle" class="w-5 h-5 text-secondary-green mr-2"></i>
                        <span class="text-sm">Response within 24 hours</span>
                    </div>
                    <div class="flex items-center bg-white/10 backdrop-blur-sm px-4 py-2 rounded-full">
                        <i data-lucide="check-circle" class="w-5 h-5 text-secondary-green mr-2"></i>
                        <span class="text-sm">Competitive rates</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quote Form -->
    <section class="py-16 md:py-24 relative overflow-hidden">
        <!-- Background decoration -->
        <div class="absolute inset-0 opacity-5 z-0">
            <div class="absolute top-40 right-20 w-72 h-72 bg-secondary-green rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 left-20 w-80 h-80 bg-primary-blue rounded-full blur-3xl"></div>
        </div>
        
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <?php if(session('success')): ?>
                <div class="bg-green-50 border border-secondary-green/20 p-6 mb-8 rounded-xl shadow-lg animate__animated animate__fadeIn">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-secondary-green/20 p-2 rounded-full">
                            <i data-lucide="check-circle" class="h-6 w-6 text-secondary-green"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-secondary-green">Quote Request Submitted</h3>
                            <p class="text-gray-700"><?php echo e(session('success')); ?></p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="bg-white rounded-xl shadow-xl border border-gray-100 overflow-hidden section-animate" data-animation="animate__fadeInUp">
                <div class="bg-gradient-to-r from-primary-blue to-dark-navy text-white p-8 relative overflow-hidden">
                    <div class="absolute inset-0 opacity-10">
                        <div class="mesh-grid w-full h-full"></div>
                    </div>
                    <div class="relative z-10">
                        <h2 class="text-3xl font-bold mb-2">Request Your Free Quote</h2>
                        <p class="text-white/80 max-w-2xl">Complete the form below and our logistics experts will prepare a detailed, competitive shipping quote tailored to your specific needs.</p>
                    </div>
                </div>

                <form action="<?php echo e(route('quote.store')); ?>" method="POST" class="p-8 lg:p-10">
                    <?php echo csrf_field(); ?>
                    
                    <!-- Progress Steps -->
                    <div class="mb-10 hidden md:block">
                        <div class="flex justify-between">
                            <div class="w-1/3 text-center">
                                <div class="w-8 h-8 bg-primary-blue text-white rounded-full flex items-center justify-center mx-auto mb-2 border-2 border-white shadow-md">
                                    <i data-lucide="map" class="w-4 h-4"></i>
                                </div>
                                <span class="text-sm font-medium text-primary-blue">Shipment Details</span>
                            </div>
                            <div class="w-1/3 text-center">
                                <div class="w-8 h-8 bg-primary-blue/40 text-white rounded-full flex items-center justify-center mx-auto mb-2">
                                    <i data-lucide="package" class="w-4 h-4"></i>
                                </div>
                                <span class="text-sm font-medium text-gray-500">Cargo Details</span>
                            </div>
                            <div class="w-1/3 text-center">
                                <div class="w-8 h-8 bg-primary-blue/40 text-white rounded-full flex items-center justify-center mx-auto mb-2">
                                    <i data-lucide="user" class="w-4 h-4"></i>
                                </div>
                                <span class="text-sm font-medium text-gray-500">Contact Details</span>
                            </div>
                        </div>
                        <div class="relative flex h-1 mt-4 mb-8">
                            <div class="w-full bg-gray-200 rounded-full overflow-hidden">
                                <div class="h-full bg-secondary-green w-1/3 rounded-full transition-all duration-500"></div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Shipment Details -->
                    <div class="mb-12">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 bg-primary-blue/10 rounded-full flex items-center justify-center mr-4">
                                <i data-lucide="map" class="w-5 h-5 text-primary-blue"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-primary-blue">Shipment Details</h3>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">
                            <div>
                                <label for="origin" class="block text-sm font-medium text-gray-700 mb-1">Origin Location <span class="text-red-500">*</span></label>
                                <input type="text" name="origin" id="origin" value="<?php echo e(old('origin')); ?>" placeholder="City, Country" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50 <?php $__errorArgs = ['origin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                <?php $__errorArgs = ['origin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="mt-1 text-sm text-red-500"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            
                            <div>
                                <label for="destination" class="block text-sm font-medium text-gray-700 mb-1">Destination Location <span class="text-red-500">*</span></label>
                                <input type="text" name="destination" id="destination" value="<?php echo e(old('destination')); ?>" placeholder="City, Country" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50 <?php $__errorArgs = ['destination'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                <?php $__errorArgs = ['destination'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="mt-1 text-sm text-red-500"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            
                            <div>
                                <label for="shipping_date" class="block text-sm font-medium text-gray-700 mb-1">Estimated Shipping Date</label>
                                <input type="date" name="shipping_date" id="shipping_date" value="<?php echo e(old('shipping_date')); ?>" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50 <?php $__errorArgs = ['shipping_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <?php $__errorArgs = ['shipping_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="mt-1 text-sm text-red-500"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            
                            <div>
                                <label for="cargo_type" class="block text-sm font-medium text-gray-700 mb-1">Cargo Type <span class="text-red-500">*</span></label>
                                <select name="cargo_type" id="cargo_type" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50 <?php $__errorArgs = ['cargo_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                    <option value="" disabled <?php echo e(old('cargo_type') ? '' : 'selected'); ?>>Select Cargo Type</option>
                                    <option value="general" <?php echo e(old('cargo_type') == 'general' ? 'selected' : ''); ?>>General Cargo</option>
                                    <option value="hazardous" <?php echo e(old('cargo_type') == 'hazardous' ? 'selected' : ''); ?>>Hazardous Materials</option>
                                    <option value="perishable" <?php echo e(old('cargo_type') == 'perishable' ? 'selected' : ''); ?>>Perishable Goods</option>
                                    <option value="oversized" <?php echo e(old('cargo_type') == 'oversized' ? 'selected' : ''); ?>>Oversized Cargo</option>
                                </select>
                                <?php $__errorArgs = ['cargo_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="mt-1 text-sm text-red-500"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Cargo Details -->
                    <div class="mb-12">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 bg-primary-blue/10 rounded-full flex items-center justify-center mr-4">
                                <i data-lucide="package" class="w-5 h-5 text-primary-blue"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-primary-blue">Cargo Details</h3>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">
                            <div>
                                <label for="shipping_mode" class="block text-sm font-medium text-gray-700 mb-1">Preferred Shipping Mode</label>
                                <select name="shipping_mode" id="shipping_mode" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50">
                                    <option value="" selected>Select Shipping Mode</option>
                                    <option value="ocean_fcl" <?php echo e(old('shipping_mode') == 'ocean_fcl' ? 'selected' : ''); ?>>Ocean Freight (Full Container)</option>
                                    <option value="ocean_lcl" <?php echo e(old('shipping_mode') == 'ocean_lcl' ? 'selected' : ''); ?>>Ocean Freight (Less than Container)</option>
                                    <option value="air_standard" <?php echo e(old('shipping_mode') == 'air_standard' ? 'selected' : ''); ?>>Air Freight (Standard)</option>
                                    <option value="air_express" <?php echo e(old('shipping_mode') == 'air_express' ? 'selected' : ''); ?>>Air Freight (Express)</option>
                                    <option value="not_sure" <?php echo e(old('shipping_mode') == 'not_sure' ? 'selected' : ''); ?>>Not Sure (Need Advice)</option>
                                </select>
                            </div>
                            
                            <div>
                                <label for="container_size" class="block text-sm font-medium text-gray-700 mb-1">Container Size (if applicable)</label>
                                <select name="container_size" id="container_size" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50">
                                    <option value="" selected>Select Container Size</option>
                                    <option value="20ft" <?php echo e(old('container_size') == '20ft' ? 'selected' : ''); ?>>20ft Container</option>
                                    <option value="40ft" <?php echo e(old('container_size') == '40ft' ? 'selected' : ''); ?>>40ft Container</option>
                                    <option value="40ft_hc" <?php echo e(old('container_size') == '40ft_hc' ? 'selected' : ''); ?>>40ft High Cube</option>
                                    <option value="lcl" <?php echo e(old('container_size') == 'lcl' ? 'selected' : ''); ?>>LCL (Shared Container)</option>
                                    <option value="not_applicable" <?php echo e(old('container_size') == 'not_applicable' ? 'selected' : ''); ?>>Not Applicable</option>
                                </select>
                            </div>
                            
                            <div>
                                <label for="weight" class="block text-sm font-medium text-gray-700 mb-1">Total Weight</label>
                                <input type="text" name="weight" id="weight" value="<?php echo e(old('weight')); ?>" placeholder="e.g. 500 kg" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50">
                            </div>
                            
                            <div>
                                <label for="dimensions" class="block text-sm font-medium text-gray-700 mb-1">Dimensions</label>
                                <input type="text" name="dimensions" id="dimensions" value="<?php echo e(old('dimensions')); ?>" placeholder="e.g. 2x3x4 meters" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50">
                            </div>
                        </div>
                        
                        <div class="mt-6">
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Additional Information</label>
                            <textarea name="message" id="message" rows="3" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50" placeholder="Please provide any additional details about your shipment requirements"><?php echo e(old('message')); ?></textarea>
                        </div>
                    </div>
                    
                    <!-- Contact Information -->
                    <div class="mb-12">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 bg-primary-blue/10 rounded-full flex items-center justify-center mr-4">
                                <i data-lucide="user" class="w-5 h-5 text-primary-blue"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-primary-blue">Contact Information</h3>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name <span class="text-red-500">*</span></label>
                                <input type="text" name="name" id="name" value="<?php echo e(old('name')); ?>" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50 <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="mt-1 text-sm text-red-500"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            
                            <div>
                                <label for="company" class="block text-sm font-medium text-gray-700 mb-1">Company Name</label>
                                <input type="text" name="company" id="company" value="<?php echo e(old('company')); ?>" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50">
                            </div>
                            
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address <span class="text-red-500">*</span></label>
                                <input type="email" name="email" id="email" value="<?php echo e(old('email')); ?>" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="mt-1 text-sm text-red-500"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number <span class="text-red-500">*</span></label>
                                <input type="tel" name="phone" id="phone" value="<?php echo e(old('phone')); ?>" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50 <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="mt-1 text-sm text-red-500"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Privacy Policy -->
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-100 mb-8">
                        <div class="flex items-start">
                            <div class="flex items-center h-5 mt-1">
                                <input id="privacy_policy" name="privacy_policy" type="checkbox" class="h-5 w-5 text-secondary-green focus:ring-secondary-green border-gray-300 rounded shadow-sm <?php $__errorArgs = ['privacy_policy'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                            </div>
                            <div class="ml-3">
                                <label for="privacy_policy" class="font-semibold text-gray-700 text-base">I agree to the privacy policy <span class="text-red-500">*</span></label>
                                <p class="text-gray-500 mt-1">By submitting this form, you agree that we may process your information in accordance with our <a href="#" class="text-primary-blue hover:underline">privacy policy</a>. Your data will be used solely for the purpose of providing you with a quote and will not be shared with third parties.</p>
                                <?php $__errorArgs = ['privacy_policy'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="mt-1 text-sm text-red-500"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" class="inline-flex items-center justify-center bg-secondary-green hover:bg-opacity-90 text-white px-8 py-4 rounded-lg text-lg font-semibold transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                            <i data-lucide="send" class="w-5 h-5 mr-2"></i>
                            Submit Quote Request
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    
    <!-- Why Choose Us -->
    <section class="py-16 md:py-24 bg-background-light-grey relative overflow-hidden">
        <!-- Background decoration -->
        <div class="absolute inset-0 opacity-30">
            <div class="absolute top-20 right-20 w-64 h-64 bg-secondary-green/20 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 left-20 w-64 h-64 bg-primary-blue/20 rounded-full blur-3xl"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16 section-animate" data-animation="animate__fadeInUp">
                <span class="inline-block px-3 py-1 bg-primary-blue/10 text-primary-blue rounded-full text-sm font-medium mb-4">WHY CHOOSE US</span>
                <h2 class="text-3xl md:text-4xl font-bold text-primary-blue mb-4">The Mari Nexa Advantage</h2>
                <p class="text-lg text-gray-600">We deliver exceptional value through reliability, expertise, and customer-focused logistics solutions</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-10">
                <div class="bg-white rounded-xl shadow-md border border-gray-100 p-8 hover:shadow-lg transition-all section-animate" data-animation="animate__fadeInUp">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-secondary-green/10 mb-6">
                        <i data-lucide="badge-check" class="w-8 h-8 text-secondary-green"></i>
                    </div>
                    <h3 class="text-xl font-bold text-primary-blue mb-4">Competitive Rates</h3>
                    <p class="text-gray-600">We leverage our extensive carrier relationships and volume discounts to provide you with the most competitive shipping rates available in the market.</p>
                </div>
                
                <div class="bg-white rounded-xl shadow-md border border-gray-100 p-8 hover:shadow-lg transition-all section-animate" data-animation="animate__fadeInUp animate__delay-1s">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-secondary-green/10 mb-6">
                        <i data-lucide="shield" class="w-8 h-8 text-secondary-green"></i>
                    </div>
                    <h3 class="text-xl font-bold text-primary-blue mb-4">End-to-End Service</h3>
                    <p class="text-gray-600">From pickup to delivery, customs clearance to documentation, we handle all aspects of your shipment with care, precision and expertise.</p>
                </div>
                
                <div class="bg-white rounded-xl shadow-md border border-gray-100 p-8 hover:shadow-lg transition-all section-animate" data-animation="animate__fadeInUp animate__delay-2s">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-secondary-green/10 mb-6">
                        <i data-lucide="headphones" class="w-8 h-8 text-secondary-green"></i>
                    </div>
                    <h3 class="text-xl font-bold text-primary-blue mb-4">24/7 Dedicated Support</h3>
                    <p class="text-gray-600">Our logistics experts are available around the clock to answer questions, provide updates, and ensure your cargo moves smoothly through the supply chain.</p>
                </div>
            </div>
            
            <div class="mt-16 text-center section-animate" data-animation="animate__fadeInUp animate__delay-3s">
                <a href="<?php echo e(route('about')); ?>" class="inline-flex items-center justify-center border-2 border-primary-blue hover:bg-primary-blue hover:text-white text-primary-blue px-6 py-3 rounded-md font-semibold transition-all">
                    <i data-lucide="info" class="w-5 h-5 mr-2"></i>
                    Learn More About Us
                </a>
            </div>
        </div>
    </section>
    
    <!-- FAQ Section -->
    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 section-animate" data-animation="animate__fadeInUp">
                <span class="inline-block px-3 py-1 bg-primary-blue/10 text-primary-blue rounded-full text-sm font-medium mb-4">COMMON QUESTIONS</span>
                <h2 class="text-3xl md:text-4xl font-bold text-primary-blue mb-4">Frequently Asked Questions</h2>
                <p class="text-lg text-gray-600">Everything you need to know about our quote and shipping process</p>
            </div>
            
            <div class="max-w-3xl mx-auto space-y-4 section-animate" data-animation="animate__fadeInUp animate__delay-1s">
                <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden transition-all hover:shadow-lg">
                    <button class="flex justify-between items-center w-full px-6 py-5 text-left" onclick="toggleFaq(this)">
                        <span class="text-lg font-semibold text-primary-blue">How quickly will I receive my quote?</span>
                        <div class="bg-secondary-green/10 p-2 rounded-full">
                            <i data-lucide="chevron-down" class="h-5 w-5 text-secondary-green transform transition-transform duration-300 faq-icon"></i>
                        </div>
                    </button>
                    <div class="px-6 pb-6 hidden faq-answer">
                        <p class="text-gray-600">For standard shipping routes, we typically respond with quotes within <strong>24 business hours</strong>. For complex shipments or specialized cargo, it may take up to 48 hours to provide a detailed quote.</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden transition-all hover:shadow-lg">
                    <button class="flex justify-between items-center w-full px-6 py-5 text-left" onclick="toggleFaq(this)">
                        <span class="text-lg font-semibold text-primary-blue">What information do I need for an accurate quote?</span>
                        <div class="bg-secondary-green/10 p-2 rounded-full">
                            <i data-lucide="chevron-down" class="h-5 w-5 text-secondary-green transform transition-transform duration-300 faq-icon"></i>
                        </div>
                    </button>
                    <div class="px-6 pb-6 hidden faq-answer">
                        <p class="text-gray-600 mb-3">To provide the most accurate quote, we need:</p>
                        <ul class="list-disc pl-5 space-y-1 text-gray-600">
                            <li>Origin and destination locations</li>
                            <li>Cargo type and nature of goods</li>
                            <li>Approximate weight and dimensions</li>
                            <li>Preferred shipping mode (air, ocean, etc.)</li>
                            <li>Any special handling requirements</li>
                        </ul>
                        <p class="text-gray-600 mt-3">The more details you provide, the more precise your quote will be.</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden transition-all hover:shadow-lg">
                    <button class="flex justify-between items-center w-full px-6 py-5 text-left" onclick="toggleFaq(this)">
                        <span class="text-lg font-semibold text-primary-blue">Are there any hidden fees in your quotes?</span>
                        <div class="bg-secondary-green/10 p-2 rounded-full">
                            <i data-lucide="chevron-down" class="h-5 w-5 text-secondary-green transform transition-transform duration-300 faq-icon"></i>
                        </div>
                    </button>
                    <div class="px-6 pb-6 hidden faq-answer">
                        <p class="text-gray-600">Our quotes are transparent and comprehensive, including all standard charges. We clearly itemize costs such as freight charges, customs clearance fees, documentation, insurance, and any applicable surcharges. If there are potential variable costs (like customs duties or inspection fees), we'll highlight these in advance.</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden transition-all hover:shadow-lg">
                    <button class="flex justify-between items-center w-full px-6 py-5 text-left" onclick="toggleFaq(this)">
                        <span class="text-lg font-semibold text-primary-blue">How long is my quote valid?</span>
                        <div class="bg-secondary-green/10 p-2 rounded-full">
                            <i data-lucide="chevron-down" class="h-5 w-5 text-secondary-green transform transition-transform duration-300 faq-icon"></i>
                        </div>
                    </button>
                    <div class="px-6 pb-6 hidden faq-answer">
                        <p class="text-gray-600">Standard quotes are typically valid for <strong>7-14 days</strong>, depending on the shipping route and current market conditions. Due to fluctuating fuel prices and capacity constraints, rates may change. The validity period will be clearly indicated on your quote.</p>
                    </div>
                </div>
            </div>
            
            <!-- More questions link -->
            <div class="text-center mt-10 section-animate" data-animation="animate__fadeInUp animate__delay-2s">
                <a href="<?php echo e(route('contact')); ?>" class="inline-flex items-center text-primary-blue hover:text-secondary-green transition-colors">
                    <span>Have more questions?</span>
                    <i data-lucide="arrow-right" class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- JavaScript for FAQ toggles and animations -->
    <?php $__env->startPush('scripts'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize the form sections animations
            const animateElements = document.querySelectorAll('.section-animate');
            animateElements.forEach(element => {
                const animation = element.getAttribute('data-animation');
                if (animation) {
                    element.classList.add('animate__animated');
                    animation.split(' ').forEach(className => {
                        element.classList.add(className);
                    });
                }
            });
            
            // Initialize Lucide icons
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }
        });
        
        // FAQ toggle functionality
        function toggleFaq(button) {
            const content = button.nextElementSibling;
            const icon = button.querySelector('.faq-icon');
            
            // Toggle content visibility
            if(content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                icon.style.transform = 'rotate(180deg)';
            } else {
                content.classList.add('hidden');
                icon.style.transform = 'rotate(0)';
            }
        }
    </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/omdubey/Documents/marinexa-shipping-website-main/resources/views/quotes/create.blade.php ENDPATH**/ ?>