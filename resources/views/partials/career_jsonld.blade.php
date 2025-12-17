@php
// Get the current route name
$routeName = Request::route() ? Request::route()->getName() : null;
// Get career data if available
$career = isset($career) ? $career : null;
@endphp

{{-- General careers page schema --}}
@if($routeName == 'careers')
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "Organization",
    "name": "Mari Nexa Shipping Pvt Ltd",
    "url": "{{ url('/') }}",
    "logo": "{{ url('/logo.png') }}",
    "sameAs": [
        "https://www.linkedin.com/company/marinexa-shipping",
        "https://www.facebook.com/marinexashipping",
        "https://twitter.com/marinexashipping",
        "https://www.instagram.com/marinexashipping"
    ],
    "employee": {
        "@@type": "Person",
        "jobTitle": "Careers at Mari Nexa Shipping"
    },
    "description": "Explore career opportunities with Mari Nexa Shipping. Join our global team of logistics professionals and be part of a dynamic organization shaping the future of international shipping."
}
</script>

<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "BreadcrumbList",
    "itemListElement": [
        {
            "@@type": "ListItem",
            "position": 1,
            "name": "Home",
            "item": "{{ url('/') }}"
        },
        {
            "@@type": "ListItem",
            "position": 2,
            "name": "Careers",
            "item": "{{ route('careers') }}"
        }
    ]
}
</script>
@endif

{{-- Individual job posting schema --}}
@if($routeName == 'careers.show' && $career)
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "JobPosting",
    "title": "{{ $career->title }}",
    "description": "{{ $career->description }}",
    "datePosted": "{{ $career->created_at->toIso8601String() }}",
    "validThrough": "{{ $career->valid_until ? $career->valid_until->toIso8601String() : '' }}",
    "employmentType": "{{ $career->employment_type }}",
    "hiringOrganization": {
        "@@type": "Organization",
        "name": "Mari Nexa Shipping Pvt Ltd",
        "sameAs": "{{ url('/') }}",
        "logo": "{{ url('/logo.png') }}"
    },
    "jobLocation": {
        "@@type": "Place",
        "address": {
            "@@type": "PostalAddress",
            "addressLocality": "{{ $career->location_city }}",
            "addressRegion": "{{ $career->location_state }}",
            "addressCountry": "{{ $career->location_country }}"
        }
    },
    "baseSalary": {
        "@@type": "MonetaryAmount",
        "currency": "INR",
        "value": {
            "@@type": "QuantitativeValue",
            "minValue": "{{ $career->salary_min }}",
            "maxValue": "{{ $career->salary_max }}",
            "unitText": "YEAR"
        }
    },
    "skills": "{{ $career->skills }}",
    "educationRequirements": "{{ $career->education }}",
    "experienceRequirements": "{{ $career->experience }}",
    "industry": "Logistics and Shipping"
}
</script>

<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "BreadcrumbList",
    "itemListElement": [
        {
            "@@type": "ListItem",
            "position": 1,
            "name": "Home",
            "item": "{{ url('/') }}"
        },
        {
            "@@type": "ListItem",
            "position": 2,
            "name": "Careers",
            "item": "{{ route('careers') }}"
        },
        {
            "@@type": "ListItem",
            "position": 3,
            "name": "{{ $career->title }}",
            "item": "{{ route('careers.show', $career->slug) }}"
        }
    ]
}
</script>
@endif
