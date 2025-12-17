@php
// Get the current route name - this is just for reference
$routeName = Request::route() ? Request::route()->getName() : null;
@endphp

@if($routeName == 'home')
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "AggregateRating",
    "itemReviewed": {
        "@@type": "Organization",
        "name": "Mari Nexa Shipping Pvt Ltd",
        "url": "{{ url('/') }}"
    },
    "ratingValue": "4.9",
    "bestRating": "5",
    "worstRating": "1",
    "ratingCount": "217",
    "reviewCount": "217"
}
</script>
@endif
