<?php
// Get the current route name
$routeName = Request::route() ? Request::route()->getName() : null;
// Get route data if available
$shippingRoute = isset($shippingRoute) ? $shippingRoute : null;
?>

<?php if($routeName == 'routes.show' && $shippingRoute): ?>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Service",
    "serviceType": "Shipping Route",
    "name": "<?php echo e($shippingRoute->origin); ?> to <?php echo e($shippingRoute->destination); ?> Shipping Route",
    "description": "<?php echo e($shippingRoute->description); ?>",
    "provider": {
        "@type": "Organization",
        "name": "Mari Nexa Shipping Pvt Ltd",
        "url": "<?php echo e(url('/')); ?>"
    },
    "serviceOutput": {
        "@type": "Intangible",
        "name": "Cargo Transport"
    },
    "areaServed": [
        {
            "@type": "City", 
            "name": "<?php echo e($shippingRoute->origin); ?>"
        },
        {
            "@type": "City",
            "name": "<?php echo e($shippingRoute->destination); ?>"
        }
    ],
    "termsOfService": "<?php echo e(url('/terms')); ?>",
    "hoursAvailable": {
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
        "opens": "09:00",
        "closes": "18:00"
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
            "name": "Routes",
            "item": "<?php echo e(route('routes.index')); ?>"
        },
        {
            "@type": "ListItem",
            "position": 3,
            "name": "<?php echo e($shippingRoute->origin); ?> to <?php echo e($shippingRoute->destination); ?>",
            "item": "<?php echo e(route('routes.show', $shippingRoute->slug)); ?>"
        }
    ]
}
</script>
<?php endif; ?>
<?php /**PATH /Users/omdubey/Documents/marinexa-shipping-website-main/resources/views/partials/route_jsonld.blade.php ENDPATH**/ ?>