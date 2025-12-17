<?php
// Get the current route name
$routeName = Request::route() ? Request::route()->getName() : null;
?>


<?php if($routeName == 'services.index'): ?>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        {
            "@type": "Question",
            "name": "What shipping services does Mari Nexa provide?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Mari Nexa Shipping provides a comprehensive range of shipping services including ocean freight (FCL and LCL), air freight, customs clearance, warehousing, and specialized cargo handling for various industries."
            }
        },
        {
            "@type": "Question",
            "name": "How do I track my shipment?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "You can track your shipment by logging into your customer portal on our website using your tracking number, or by contacting our customer service team with your booking reference."
            }
        },
        {
            "@type": "Question",
            "name": "What is the difference between FCL and LCL shipping?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "FCL (Full Container Load) means your goods fill an entire container. LCL (Less than Container Load) means your goods are consolidated with other shipments in a shared container, making it more economical for smaller shipments."
            }
        },
        {
            "@type": "Question",
            "name": "How far in advance should I book my shipment?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "We recommend booking your shipment at least 2-3 weeks in advance for ocean freight and 1-2 weeks for air freight to ensure availability and the best rates. During peak seasons, earlier booking is advisable."
            }
        }
    ]
}
</script>
<?php endif; ?>


<?php if($routeName == 'contact'): ?>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        {
            "@type": "Question",
            "name": "What information do I need to provide for a quote?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "To provide an accurate quote, we need details like origin and destination locations, cargo type and dimensions, weight, desired shipping timeline, and any special handling requirements."
            }
        },
        {
            "@type": "Question",
            "name": "How can I contact Mari Nexa customer service?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "You can reach our customer service team via phone at +91-22-4789-1000, email at info@marinexa.com, or by filling out the contact form on our website. Our office hours are Monday to Friday, 9:00 AM to 6:00 PM IST."
            }
        },
        {
            "@type": "Question",
            "name": "Do you have offices in other countries?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Yes, Mari Nexa Shipping has a global network of offices and partner agents in major shipping hubs worldwide. Please contact our main office to be directed to the nearest representative in your region."
            }
        }
    ]
}
</script>
<?php endif; ?>
<?php /**PATH /Users/omdubey/Documents/marinexa-shipping-website-main/resources/views/partials/faq_jsonld.blade.php ENDPATH**/ ?>