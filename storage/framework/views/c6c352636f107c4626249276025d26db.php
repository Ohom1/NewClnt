<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Marinexa Shipping Pvt Ltd')); ?> - <?php echo $__env->yieldContent('title'); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description', 'International Logistics, Freight Forwarding, and Global Shipping (Air & Sea Cargo) services by Marinexa Shipping Pvt Ltd.'); ?>">
    
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-WX0G35LS6G"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);} 
      gtag('js', new Date());

      gtag('config', 'G-WX0G35LS6G');
    </script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Lato:wght@300;400&display=swap" rel="stylesheet">
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    <!-- Tailwind CSS from CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-blue': '#013A63',
                        'secondary-green': '#3CB043',
                        'accent-light-green': '#9FE870',
                        'dark-navy': '#001E2E',
                        'background-light-grey': '#F8FAFC',
                    },
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif'],
                        'lato': ['Lato', 'sans-serif'],
                    },
                    borderRadius: {
                        'card': '16px',
                    },
                    animation: {
                        'spin-slow': 'spin 20s linear infinite',
                        'float-slow': 'float 6s ease-in-out infinite',
                        'ping-slow': 'ping 3s cubic-bezier(0, 0, 0.2, 1) infinite',
                    },
                    keyframes: {
                        float: {
                          '0%, 100%': { transform: 'translateY(0)' },
                          '50%': { transform: 'translateY(-10px)' },
                        },
                    },
                }
            }
        }
    </script>
    
    <!-- Particles.js for background effect -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    
    <!-- Base Styles -->
    <style>
        /* Base styles */
        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            background-color: #F8FAFC;
            color: #001E2E;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        p {
            font-family: 'Lato', sans-serif;
        }
        
        main {
            flex-grow: 1;
        }
        
        /* Utility classes */
        .bg-primary-blue { background-color: #013A63; }
        .bg-secondary-green { background-color: #3CB043; }
        .bg-accent-light-green { background-color: #9FE870; }
        .bg-dark-navy { background-color: #001E2E; }
        .bg-background-light-grey { background-color: #F8FAFC; }
        
        .text-primary-blue { color: #013A63; }
        .text-secondary-green { color: #3CB043; }
        .text-white { color: white; }
        .text-dark-navy { color: #001E2E; }
        
        .rounded-card { border-radius: 16px; }
        .rounded { border-radius: 0.25rem; }
        
        .shadow-md { box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06); }
        
        /* Component classes */
        .btn-primary {
            background-color: #013A63;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            font-weight: 500;
            transition: all 0.2s;
        }
        .btn-primary:hover { opacity: 0.9; }
        
        .btn-secondary {
            border: 2px solid #3CB043;
            color: #3CB043;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            font-weight: 500;
            transition: all 0.2s;
        }
        .btn-secondary:hover {
            background-color: #3CB043;
            color: white;
        }
        
        .card {
            background-color: white;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06);
            padding: 1.5rem;
        }
        
        /* Mesh grid background */
        .mesh-grid {
            background-image: linear-gradient(rgba(255, 255, 255, 0.05) 1px, transparent 1px),
                            linear-gradient(90deg, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
            background-size: 20px 20px;
        }
        
        /* Animation delays */
        .animation-delay-700 {
            animation-delay: 0.7s;
        }
        
        .animation-delay-1000 {
            animation-delay: 1s;
        }
    </style>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('favicon.ico')); ?>">
    
    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Mari Nexa Shipping Pvt Ltd",
        "alternateName": "Marinexa Shipping",
        "url": "<?php echo e(url('/')); ?>",
        "logo": "<?php echo e(url('/logo.png')); ?>",
        "sameAs": [
            "https://www.linkedin.com/company/marinexa-shipping",
            "https://www.facebook.com/marinexashipping",
            "https://twitter.com/marinexashipping",
            "https://www.instagram.com/marinexashipping"
        ],
        "contactPoint": [
            {
                "@type": "ContactPoint",
                "telephone": "+91-22-4789-1000",
                "contactType": "customer service",
                "areaServed": "Global",
                "availableLanguage": ["English", "Hindi"]
            }
        ],
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "247 Maritime Road, Andheri East",
            "addressLocality": "Mumbai",
            "addressRegion": "Maharashtra",
            "postalCode": "400069",
            "addressCountry": "IN"
        },
        "email": "info@marinexa.com",
        "description": "Mari Nexa Shipping Pvt Ltd is a global logistics and shipping company offering international freight forwarding, ocean freight, air freight, and customs clearance services worldwide."
    }
    </script>
    
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "url": "<?php echo e(url('/')); ?>",
        "name": "Mari Nexa Shipping Pvt Ltd",
        "description": "International Logistics, Freight Forwarding, and Global Shipping (Air & Sea Cargo) services by Marinexa Shipping Pvt Ltd.",
        "potentialAction": {
            "@type": "SearchAction",
            "target": "<?php echo e(url('/search?q={search_term_string}')); ?>",
            "query-input": "required name=search_term_string"
        }
    }
    </script>
    
    <?php echo $__env->make('partials.all_jsonld', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</head>
<body class="font-poppins antialiased min-h-screen bg-background-light-grey text-dark-navy flex flex-col">
    <!-- Header -->
    <?php echo $__env->make('partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
    <!-- Main Content -->
    <main class="flex-grow">
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    
    <!-- Footer -->
    <?php echo $__env->make('partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
    <!-- Scripts -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <script>
        // Initialize Lucide icons
        lucide.createIcons();
    </script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH /Users/omdubey/Documents/marinexa-shipping-website-main/resources/views/layouts/app.blade.php ENDPATH**/ ?>