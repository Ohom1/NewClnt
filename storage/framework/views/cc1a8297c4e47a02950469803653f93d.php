<?php
// Get the current route name - this is just for reference
$routeName = Request::route() ? Request::route()->getName() : null;
?>

<?php if($routeName == 'home'): ?>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "AggregateRating",
    "itemReviewed": {
        "@type": "Organization",
        "name": "Mari Nexa Shipping Pvt Ltd",
        "url": "<?php echo e(url('/')); ?>"
    },
    "ratingValue": "4.9",
    "bestRating": "5",
    "worstRating": "1",
    "ratingCount": "217",
    "reviewCount": "217"
}
</script>
<?php endif; ?>
<?php /**PATH /Users/omdubey/Documents/marinexa-shipping-website-main/resources/views/partials/home_rating_jsonld.blade.php ENDPATH**/ ?>