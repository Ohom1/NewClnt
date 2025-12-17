<?php
// Get the current route name
$routeName = Request::route() ? Request::route()->getName() : null;
// Get service data if available
$service = isset($service) ? $service : null;
?>

<?php if($routeName == 'services.show' && $service): ?>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Service",
    "serviceType": "<?php echo e($service['title']); ?>",
    "name": "<?php echo e($service['title']); ?> - Mari Nexa Shipping",
    "description": "<?php echo e($service['description']); ?>",
    "provider": {
        "@type": "Organization",
        "name": "Mari Nexa Shipping Pvt Ltd",
        "url": "<?php echo e(url('/')); ?>"
    },
    "url": "<?php echo e(route('services.show', $service['slug'] ?? Request::segment(2))); ?>",
    "areaServed": {
        "@type": "Country",
        "name": "Global"
    },
    "hasOfferCatalog": {
        "@type": "OfferCatalog",
        "name": "<?php echo e($service['title']); ?> Options",
        "itemListElement": [
            <?php $__currentLoopData = $service['features']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            {
                "@type": "Offer",
                "itemOffered": {
                    "@type": "Service",
                    "name": "<?php echo e($feature); ?>",
                    "description": "<?php echo e($feature); ?>"
                }
            }<?php if(!$loop->last): ?>,<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            "name": "Services",
            "item": "<?php echo e(route('services.index')); ?>"
        },
        {
            "@type": "ListItem",
            "position": 3,
            "name": "<?php echo e($service['title']); ?>",
            "item": "<?php echo e(route('services.show', $service['slug'] ?? Request::segment(2))); ?>"
        }
    ]
}
</script>
<?php endif; ?>
<?php /**PATH /Users/omdubey/Documents/marinexa-shipping-website-main/resources/views/partials/service_jsonld.blade.php ENDPATH**/ ?>