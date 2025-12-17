<?php
// Get the current route name
$routeName = Request::route() ? Request::route()->getName() : null;
?>


<?php if($routeName == 'services.show' && isset($service) && $service['slug'] == 'customs-clearance'): ?>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "HowTo",
    "name": "How to Clear Your Shipment Through Customs",
    "description": "A step-by-step guide to clearing your shipment through customs with Mari Nexa Shipping's customs brokerage services.",
    "totalTime": "PT2H",
    "estimatedCost": {
        "@type": "MonetaryAmount",
        "currency": "INR",
        "value": "Varies by shipment"
    },
    "tool": [
        {
            "@type": "HowToTool",
            "name": "Commercial Invoice"
        },
        {
            "@type": "HowToTool",
            "name": "Bill of Lading or Air Waybill"
        },
        {
            "@type": "HowToTool",
            "name": "Packing List"
        },
        {
            "@type": "HowToTool",
            "name": "Import License (if required)"
        }
    ],
    "supply": [
        {
            "@type": "HowToSupply",
            "name": "Proper Documentation"
        }
    ],
    "step": [
        {
            "@type": "HowToStep",
            "name": "Prepare Documentation",
            "text": "Gather all required documents including commercial invoice, bill of lading, packing list, and certificates of origin.",
            "image": "<?php echo e(url('/images/customs-docs.jpg')); ?>",
            "url": "<?php echo e(route('services.show', 'customs-clearance')); ?>#step1"
        },
        {
            "@type": "HowToStep",
            "name": "Submit Documentation",
            "text": "Submit all required documents to Mari Nexa Shipping's customs broker for review and processing.",
            "image": "<?php echo e(url('/images/customs-submit.jpg')); ?>",
            "url": "<?php echo e(route('services.show', 'customs-clearance')); ?>#step2"
        },
        {
            "@type": "HowToStep",
            "name": "Duty and Tax Assessment",
            "text": "Our customs experts will determine applicable duties and taxes for your shipment based on HS codes and value.",
            "image": "<?php echo e(url('/images/customs-assessment.jpg')); ?>",
            "url": "<?php echo e(route('services.show', 'customs-clearance')); ?>#step3"
        },
        {
            "@type": "HowToStep",
            "name": "Customs Inspection",
            "text": "If required, your shipment may undergo physical inspection by customs authorities. Our team will coordinate this process.",
            "image": "<?php echo e(url('/images/customs-inspection.jpg')); ?>",
            "url": "<?php echo e(route('services.show', 'customs-clearance')); ?>#step4"
        },
        {
            "@type": "HowToStep",
            "name": "Payment and Release",
            "text": "Pay all duties, taxes, and fees to obtain customs release for your shipment.",
            "image": "<?php echo e(url('/images/customs-release.jpg')); ?>",
            "url": "<?php echo e(route('services.show', 'customs-clearance')); ?>#step5"
        },
        {
            "@type": "HowToStep",
            "name": "Delivery",
            "text": "Once cleared, your shipment will be delivered to the final destination.",
            "image": "<?php echo e(url('/images/customs-delivery.jpg')); ?>",
            "url": "<?php echo e(route('services.show', 'customs-clearance')); ?>#step6"
        }
    ]
}
</script>
<?php endif; ?>


<?php if($routeName == 'services.show' && isset($service) && $service['slug'] == 'air-freight'): ?>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "HowTo",
    "name": "How to Ship Cargo via Air Freight",
    "description": "A comprehensive guide to shipping your cargo by air with Mari Nexa Shipping's air freight services.",
    "totalTime": "PT48H",
    "step": [
        {
            "@type": "HowToStep",
            "name": "Request a Quote",
            "text": "Contact Mari Nexa Shipping to request an air freight quote based on your shipment details.",
            "url": "<?php echo e(route('services.show', 'air-freight')); ?>#quote"
        },
        {
            "@type": "HowToStep",
            "name": "Book Your Shipment",
            "text": "Confirm your booking by providing all required shipment details and documentation.",
            "url": "<?php echo e(route('services.show', 'air-freight')); ?>#book"
        },
        {
            "@type": "HowToStep",
            "name": "Prepare Your Cargo",
            "text": "Package your goods according to air freight requirements and prepare them for collection.",
            "url": "<?php echo e(route('services.show', 'air-freight')); ?>#prepare"
        },
        {
            "@type": "HowToStep",
            "name": "Collection and Export",
            "text": "Our team will collect your cargo and handle export procedures and documentation.",
            "url": "<?php echo e(route('services.show', 'air-freight')); ?>#export"
        },
        {
            "@type": "HowToStep",
            "name": "Air Transport",
            "text": "Your cargo will be transported by air to the destination airport.",
            "url": "<?php echo e(route('services.show', 'air-freight')); ?>#transport"
        },
        {
            "@type": "HowToStep",
            "name": "Import and Delivery",
            "text": "We'll handle import customs clearance and arrange final delivery to your specified location.",
            "url": "<?php echo e(route('services.show', 'air-freight')); ?>#import"
        }
    ]
}
</script>
<?php endif; ?>
<?php /**PATH /Users/omdubey/Documents/marinexa-shipping-website-main/resources/views/partials/howto_jsonld.blade.php ENDPATH**/ ?>