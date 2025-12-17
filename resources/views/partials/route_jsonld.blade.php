@php
// Get the current route name
$routeName = Request::route() ? Request::route()->getName() : null;
// Get route data if available
$shippingRoute = isset($shippingRoute) ? $shippingRoute : null;
@endphp

@if($routeName == 'routes.show' && $shippingRoute)
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "Service",
    "serviceType": "Shipping Route",
    "name": "{{ $shippingRoute->origin }} to {{ $shippingRoute->destination }} Shipping Route",
    "description": "{{ $shippingRoute->description }}",
    "provider": {
        "@@type": "Organization",
        "name": "Mari Nexa Shipping Pvt Ltd",
        "url": "{{ url('/') }}"
    },
    "serviceOutput": {
        "@@type": "Intangible",
        "name": "Cargo Transport"
    },
    "areaServed": [
        {
            "@@type": "City", 
            "name": "{{ $shippingRoute->origin }}"
        },
        {
            "@@type": "City",
            "name": "{{ $shippingRoute->destination }}"
        }
    ],
    "termsOfService": "{{ url('/terms') }}",
    "hoursAvailable": {
        "@@type": "OpeningHoursSpecification",
        "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
        "opens": "09:00",
        "closes": "18:00"
    }
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
            "name": "Routes",
            "item": "{{ route('routes.index') }}"
        },
        {
            "@@type": "ListItem",
            "position": 3,
            "name": "{{ $shippingRoute->origin }} to {{ $shippingRoute->destination }}",
            "item": "{{ route('routes.show', $shippingRoute->slug) }}"
        }
    ]
}
</script>
@endif
