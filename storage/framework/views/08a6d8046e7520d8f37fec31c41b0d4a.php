<?php
// Get the current route name - this is just for reference
$routeName = Request::route() ? Request::route()->getName() : null;
?>

<?php if($routeName == 'home'): ?>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Review",
    "itemReviewed": {
        "@type": "Organization",
        "name": "Mari Nexa Shipping Pvt Ltd",
        "url": "<?php echo e(url('/')); ?>"
    },
    "reviewRating": {
        "@type": "Rating",
        "ratingValue": "5",
        "bestRating": "5"
    },
    "author": {
        "@type": "Person",
        "name": "Rahul Mehta"
    },
    "datePublished": "2024-10-01",
    "reviewBody": "Excellent shipping services. Always on time and professional."
}
</script>
<?php endif; ?>
<?php /**PATH /Users/omdubey/Documents/marinexa-shipping-website-main/resources/views/partials/home_reviews_jsonld.blade.php ENDPATH**/ ?>