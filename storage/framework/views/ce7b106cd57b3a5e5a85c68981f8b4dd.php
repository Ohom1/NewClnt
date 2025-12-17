<?php
// Get the current route name
$routeName = Request::route() ? Request::route()->getName() : null;
?>

<?php if($routeName == 'home'): ?>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "name": "Mari Nexa Shipping Pvt Ltd",
        "image": "<?php echo e(url('/logo.png')); ?>",
        "url": "<?php echo e(url('/')); ?>",
        "telephone": "+91-81784-80670",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "4TH FLOOR, FLAT NO 218, PKT F SEC-B-2, Narela",
            "addressLocality": "New Delhi",
            "postalCode": "110040",
            "addressCountry": "IN"
        },
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": "19.113646",
            "longitude": "72.869301"
        },
        "openingHoursSpecification": [
            {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
                "opens": "09:00",
                "closes": "18:00"
            },
            {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": ["Saturday"],
                "opens": "10:00",
                "closes": "14:00"
            }
        ],
        "sameAs": [
            "https://www.linkedin.com/company/marinexa-shipping",
            "https://www.facebook.com/marinexashipping",
            "https://twitter.com/marinexashipping",
            "https://www.instagram.com/marinexashipping"
        ],
        "priceRange": "$$$"
    }
    </script>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [
            {
                "@type": "ListItem",
                "position": 1,
                "name": "Home",
                "item": "<?php echo e(url('/')); ?>"
            }
        ]
    }
    </script>
<?php elseif($routeName == 'about'): ?>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "AboutPage",
        "name": "About Mari Nexa Shipping",
        "description": "Learn about Mari Nexa Shipping's history, mission, vision, and values. Discover our commitment to excellence in global shipping and logistics.",
        "mainEntity": {
            "@type": "Organization",
            "name": "Mari Nexa Shipping Pvt Ltd",
            "foundingDate": "2010",
            "foundingLocation": "Mumbai, India",
            "numberOfEmployees": "500+",
            "employee": [
                {
                    "@type": "Person",
                    "name": "Rajiv Sharma",
                    "jobTitle": "Chief Executive Officer"
                },
                {
                    "@type": "Person",
                    "name": "Priya Patel",
                    "jobTitle": "Chief Operations Officer"
                },
                {
                    "@type": "Person",
                    "name": "David Chen",
                    "jobTitle": "Chief Technology Officer"
                }
            ]
        }
    }
    </script>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [
            {
                "@type": "ListItem",
                "position": 1,
                "name": "Home",
                "item": "<?php echo e(url('/')); ?>"
            },
            {
                "@type": "ListItem",
                "position": 2,
                "name": "About Us",
                "item": "<?php echo e(url('/about')); ?>"
            }
        ]
    }
    </script>
<?php elseif($routeName == 'services.index'): ?>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "ItemList",
        "itemListElement": [
            {
                "@type": "Service",
                "position": 1,
                "name": "Ocean Freight",
                "description": "Reliable and cost-effective sea freight solutions for FCL and LCL shipments worldwide.",
                "url": "<?php echo e(route('services.show', 'ocean-freight')); ?>"
            },
            {
                "@type": "Service",
                "position": 2,
                "name": "Air Freight",
                "description": "Express and standard air freight services to meet your urgent and time-sensitive deliveries.",
                "url": "<?php echo e(route('services.show', 'air-freight')); ?>"
            },
            {
                "@type": "Service",
                "position": 3,
                "name": "Customs Clearance",
                "description": "Expert customs brokerage services ensuring smooth clearance and compliance with regulations.",
                "url": "<?php echo e(route('services.show', 'customs-clearance')); ?>"
            }
        ]
    }
    </script>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [
            {
                "@type": "ListItem",
                "position": 1,
                "name": "Home",
                "item": "<?php echo e(url('/')); ?>"
            },
            {
                "@type": "ListItem",
                "position": 2,
                "name": "Services",
                "item": "<?php echo e(url('/services')); ?>"
            }
        ]
    }
    </script>
<?php elseif($routeName == 'contact'): ?>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "ContactPage",
        "name": "Contact Mari Nexa Shipping",
        "description": "Get in touch with Mari Nexa Shipping. Contact information for our global offices and customer service.",
        "mainEntity": {
            "@type": "Organization",
            "name": "Mari Nexa Shipping Pvt Ltd",
            "address": {
            "@type": "PostalAddress",
            "streetAddress": "4TH FLOOR, FLAT NO 218, PKT F SEC-B-2, Narela",
            "addressLocality": "New Delhi",
            "postalCode": "110040",
            "addressCountry": "IN"
        },
            "telephone": "+91-81784-80670",
            "email": "care@marinexashipping.com"
        }
    }
    </script>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [
            {
                "@type": "ListItem",
                "position": 1,
                "name": "Home",
                "item": "<?php echo e(url('/')); ?>"
            },
            {
                "@type": "ListItem",
                "position": 2,
                "name": "Contact Us",
                "item": "<?php echo e(url('/contact')); ?>"
            }
        ]
    }
    </script>
<?php elseif($routeName == 'quote.create'): ?>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebPage",
        "name": "Get a Free Shipping Quote",
        "description": "Request a quote for Mari Nexa Shipping's logistics and freight forwarding services.",
        "mainEntity": {
            "@type": "Organization",
            "name": "Mari Nexa Shipping Pvt Ltd"
        }
    }
    </script>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [
            {
                "@type": "ListItem",
                "position": 1,
                "name": "Home",
                "item": "<?php echo e(url('/')); ?>"
            },
            {
                "@type": "ListItem",
                "position": 2,
                "name": "Get a Quote",
                "item": "<?php echo e(url('/get-a-quote')); ?>"
            }
        ]
    }
    </script>
<?php elseif($routeName == 'blog'): ?>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Blog",
        "name": "Mari Nexa Shipping Blog",
        "description": "Insights, news, and updates about global shipping, logistics, and international trade from Mari Nexa Shipping experts.",
        "publisher": {
            "@type": "Organization",
            "name": "Mari Nexa Shipping Pvt Ltd"
        }
    }
    </script>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [
            {
                "@type": "ListItem",
                "position": 1,
                "name": "Home",
                "item": "<?php echo e(url('/')); ?>"
            },
            {
                "@type": "ListItem",
                "position": 2,
                "name": "Blog",
                "item": "<?php echo e(url('/blog')); ?>"
            }
        ]
    }
    </script>
<?php endif; ?>
<?php /**PATH /Users/omdubey/Documents/marinexa-shipping-website-main/resources/views/partials/jsonld.blade.php ENDPATH**/ ?>