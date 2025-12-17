@php
// Get the current route name
$routeName = Request::route() ? Request::route()->getName() : null;
// Get service data if available
$service = isset($service) ? $service : null;
@endphp

@if($routeName == 'services.show' && $service)
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "Service",
    "serviceType": "{{ $service['title'] }}",
    "name": "{{ $service['title'] }} - Mari Nexa Shipping",
    "description": "{{ $service['description'] }}",
    "provider": {
        "@@type": "Organization",
        "name": "Mari Nexa Shipping Pvt Ltd",
        "url": "{{ url('/') }}"
    },
    "url": "{{ route('services.show', $service['slug'] ?? Request::segment(2)) }}",
    "areaServed": {
        "@@type": "Country",
        "name": "Global"
    },
    "hasOfferCatalog": {
        "@@type": "OfferCatalog",
        "name": "{{ $service['title'] }} Options",
        "itemListElement": [
            @foreach($service['features'] as $key => $feature)
            {
                "@@type": "Offer",
                "itemOffered": {
                    "@@type": "Service",
                    "name": "{{ $feature }}",
                    "description": "{{ $feature }}"
                }
            }@if(!$loop->last),@endif
            @endforeach
        ]
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
            "name": "Services",
            "item": "{{ route('services.index') }}"
        },
        {
            "@@type": "ListItem",
            "position": 3,
            "name": "{{ $service['title'] }}",
            "item": "{{ route('services.show', $service['slug'] ?? Request::segment(2)) }}"
        }
    ]
}
</script>
@endif
