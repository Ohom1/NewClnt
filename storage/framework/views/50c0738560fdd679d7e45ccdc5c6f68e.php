<?php
// Get the current route name
$routeName = Request::route() ? Request::route()->getName() : null;
?>

<?php if($routeName == 'quote.create'): ?>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Action",
    "name": "Request Shipping Quote",
    "target": {
        "@type": "EntryPoint",
        "urlTemplate": "<?php echo e(route('quote.create')); ?>",
        "actionPlatform": [
            "http://schema.org/DesktopWebPlatform",
            "http://schema.org/MobileWebPlatform"
        ],
        "inLanguage": "en-US",
        "description": "Request a detailed shipping quote from Mari Nexa Shipping for your logistics needs."
    },
    "object": {
        "@type": "Service",
        "name": "Shipping and Logistics Services",
        "serviceType": "Shipping",
        "provider": {
            "@type": "Organization",
            "name": "Mari Nexa Shipping Pvt Ltd"
        }
    },
    "result": {
        "@type": "Offer",
        "itemOffered": {
            "@type": "Service",
            "name": "Customized Shipping Quote"
        }
    }
}
</script>

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebPage",
    "name": "Get a Free Shipping Quote",
    "speakable": {
        "@type": "SpeakableSpecification",
        "xpath": [
            "/html/head/title",
            "/html/head/meta[@name='description']/@content"
        ]
    },
    "url": "<?php echo e(route('quote.create')); ?>"
}
</script>
<?php endif; ?>
<?php /**PATH /Users/omdubey/Documents/marinexa-shipping-website-main/resources/views/partials/quote_jsonld.blade.php ENDPATH**/ ?>