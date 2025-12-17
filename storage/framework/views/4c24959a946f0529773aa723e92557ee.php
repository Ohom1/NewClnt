<?php
// Get the current route name
$routeName = Request::route() ? Request::route()->getName() : null;
// Get career data if available
$career = isset($career) ? $career : null;
?>


<?php if($routeName == 'careers'): ?>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "Mari Nexa Shipping Pvt Ltd",
    "url": "<?php echo e(url('/')); ?>",
    "logo": "<?php echo e(url('/logo.png')); ?>",
    "sameAs": [
        "https://www.linkedin.com/company/marinexa-shipping",
        "https://www.facebook.com/marinexashipping",
        "https://twitter.com/marinexashipping",
        "https://www.instagram.com/marinexashipping"
    ],
    "employee": {
        "@type": "Person",
        "jobTitle": "Careers at Mari Nexa Shipping"
    },
    "description": "Explore career opportunities with Mari Nexa Shipping. Join our global team of logistics professionals and be part of a dynamic organization shaping the future of international shipping."
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
            "name": "Careers",
            "item": "<?php echo e(route('careers')); ?>"
        }
    ]
}
</script>
<?php endif; ?>


<?php if($routeName == 'careers.show' && $career): ?>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "JobPosting",
    "title": "<?php echo e($career->title); ?>",
    "description": "<?php echo e($career->description); ?>",
    "datePosted": "<?php echo e($career->created_at->toIso8601String()); ?>",
    "validThrough": "<?php echo e($career->valid_until ? $career->valid_until->toIso8601String() : ''); ?>",
    "employmentType": "<?php echo e($career->employment_type); ?>",
    "hiringOrganization": {
        "@type": "Organization",
        "name": "Mari Nexa Shipping Pvt Ltd",
        "sameAs": "<?php echo e(url('/')); ?>",
        "logo": "<?php echo e(url('/logo.png')); ?>"
    },
    "jobLocation": {
        "@type": "Place",
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "<?php echo e($career->location_city); ?>",
            "addressRegion": "<?php echo e($career->location_state); ?>",
            "addressCountry": "<?php echo e($career->location_country); ?>"
        }
    },
    "baseSalary": {
        "@type": "MonetaryAmount",
        "currency": "INR",
        "value": {
            "@type": "QuantitativeValue",
            "minValue": "<?php echo e($career->salary_min); ?>",
            "maxValue": "<?php echo e($career->salary_max); ?>",
            "unitText": "YEAR"
        }
    },
    "skills": "<?php echo e($career->skills); ?>",
    "educationRequirements": "<?php echo e($career->education); ?>",
    "experienceRequirements": "<?php echo e($career->experience); ?>",
    "industry": "Logistics and Shipping"
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
            "name": "Careers",
            "item": "<?php echo e(route('careers')); ?>"
        },
        {
            "@type": "ListItem",
            "position": 3,
            "name": "<?php echo e($career->title); ?>",
            "item": "<?php echo e(route('careers.show', $career->slug)); ?>"
        }
    ]
}
</script>
<?php endif; ?>
<?php /**PATH /Users/omdubey/Documents/marinexa-shipping-website-main/resources/views/partials/career_jsonld.blade.php ENDPATH**/ ?>