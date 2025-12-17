<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    /**
     * Display a listing of the shipping routes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $routes = [
            [
                'slug' => 'mumbai-to-dubai',
                'origin' => 'Mumbai',
                'origin_country' => 'India',
                'destination' => 'Dubai',
                'destination_country' => 'UAE',
                'image' => 'images/routes/mumbai-dubai.jpg',
                'transit_time' => '4-5 days',
                'frequency' => 'Daily',
                'shipping_mode' => 'Ocean & Air',
            ],
            [
                'slug' => 'mumbai-to-singapore',
                'origin' => 'Mumbai',
                'origin_country' => 'India',
                'destination' => 'Singapore',
                'destination_country' => 'Singapore',
                'image' => 'images/routes/mumbai-singapore.jpg',
                'transit_time' => '7-9 days',
                'frequency' => 'Twice Weekly',
                'shipping_mode' => 'Ocean & Air',
            ],
            [
                'slug' => 'mumbai-to-london',
                'origin' => 'Mumbai',
                'origin_country' => 'India',
                'destination' => 'London',
                'destination_country' => 'UK',
                'image' => 'images/routes/mumbai-london.jpg',
                'transit_time' => '18-22 days (Ocean) / 1-2 days (Air)',
                'frequency' => 'Weekly',
                'shipping_mode' => 'Ocean & Air',
            ],
            [
                'slug' => 'delhi-to-new-york',
                'origin' => 'Delhi',
                'origin_country' => 'India',
                'destination' => 'New York',
                'destination_country' => 'USA',
                'image' => 'images/routes/delhi-newyork.jpg',
                'transit_time' => '28-32 days (Ocean) / 2-3 days (Air)',
                'frequency' => 'Weekly',
                'shipping_mode' => 'Ocean & Air',
            ],
            [
                'slug' => 'chennai-to-sydney',
                'origin' => 'Chennai',
                'origin_country' => 'India',
                'destination' => 'Sydney',
                'destination_country' => 'Australia',
                'image' => 'images/routes/chennai-sydney.jpg',
                'transit_time' => '14-16 days (Ocean) / 1-2 days (Air)',
                'frequency' => 'Weekly',
                'shipping_mode' => 'Ocean & Air',
            ],
            [
                'slug' => 'mumbai-to-hamburg',
                'origin' => 'Mumbai',
                'origin_country' => 'India',
                'destination' => 'Hamburg',
                'destination_country' => 'Germany',
                'image' => 'images/routes/mumbai-hamburg.jpg',
                'transit_time' => '20-24 days (Ocean) / 1-2 days (Air)',
                'frequency' => 'Weekly',
                'shipping_mode' => 'Ocean & Air',
            ],
        ];

        return view('routes.index', compact('routes'));
    }

    /**
     * Display the specified shipping route.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $routes = [
            'mumbai-to-dubai' => [
                'origin' => 'Mumbai',
                'origin_country' => 'India',
                'destination' => 'Dubai',
                'destination_country' => 'UAE',
                'banner' => 'images/routes/mumbai-dubai-banner.jpg',
                'transit_time' => [
                    'ocean_fcl' => '4-5 days',
                    'ocean_lcl' => '5-7 days',
                    'air_standard' => '1-2 days',
                    'air_express' => 'Next day',
                ],
                'frequency' => [
                    'ocean' => 'Daily departures',
                    'air' => 'Multiple flights daily',
                ],
                'key_ports' => [
                    'origin' => ['Nhava Sheva (JNPT)', 'Mumbai Port'],
                    'destination' => ['Jebel Ali Port', 'Dubai World Central'],
                ],
                'services_available' => ['FCL', 'LCL', 'Air Freight', 'Express Air', 'Customs Clearance', 'Door-to-Door'],
                'description' => 'The Mumbai to Dubai route is one of our most frequent and well-established shipping lanes, offering multiple daily departures by both sea and air. This strategic corridor connects India\'s financial center with the UAE\'s commercial hub, facilitating robust trade between the two regions.',
                'details' => '<p class="mb-4">The Mumbai-Dubai shipping route is one of the busiest and most important trade corridors in the Middle East-South Asia region. With Marinexa Shipping, you can benefit from our extensive experience and strong carrier relationships on this key route.</p>
                <p class="mb-4">We offer daily ocean freight services with competitive transit times and multiple air freight options to meet various urgency and budget requirements.</p>
                <h3 class="text-xl font-bold mb-3">Ocean Freight Options</h3>
                <p class="mb-4">Our FCL services offer direct connections from Nhava Sheva/JNPT to Jebel Ali with transit times of just 4-5 days, making this one of the fastest ocean services available between India and the UAE. For smaller shipments, our LCL consolidation services provide flexible and cost-effective solutions.</p>
                <h3 class="text-xl font-bold mb-3">Air Freight Services</h3>
                <p class="mb-4">With multiple daily flights connecting Mumbai and Dubai, we offer a range of air freight options from next-day express services to standard air freight. Our strong airline partnerships ensure competitive rates and reliable capacity even during peak seasons.</p>
                <h3 class="text-xl font-bold mb-3">Customs Expertise</h3>
                <p class="mb-4">Our team has extensive experience with India-UAE trade regulations, documentation requirements, and customs procedures. We ensure smooth clearance at both origin and destination, preventing delays and compliance issues.</p>',
                'popular_commodities' => ['Textiles & Garments', 'Jewelry & Precious Stones', 'Machinery & Parts', 'Electronics', 'Pharmaceuticals', 'Food Products'],
            ],
            'mumbai-to-singapore' => [
                'origin' => 'Mumbai',
                'origin_country' => 'India',
                'destination' => 'Singapore',
                'destination_country' => 'Singapore',
                'banner' => 'images/routes/mumbai-singapore-banner.jpg',
                'transit_time' => [
                    'ocean_fcl' => '7-9 days',
                    'ocean_lcl' => '9-12 days',
                    'air_standard' => '1-2 days',
                    'air_express' => '1 day',
                ],
                'frequency' => [
                    'ocean' => 'Twice weekly departures',
                    'air' => 'Multiple flights daily',
                ],
                'key_ports' => [
                    'origin' => ['Nhava Sheva (JNPT)', 'Mumbai Port'],
                    'destination' => ['Port of Singapore', 'Changi Airport'],
                ],
                'services_available' => ['FCL', 'LCL', 'Air Freight', 'Express Air', 'Customs Clearance', 'Door-to-Door'],
                'description' => 'Our Mumbai to Singapore route offers reliable connections between these major Asian financial hubs. With frequent departures and dedicated capacity allocations, we ensure your cargo moves smoothly between India and Singapore regardless of seasonal demand fluctuations.',
                'details' => '<p class="mb-4">The Mumbai-Singapore shipping corridor is a vital trade route connecting India with Southeast Asia. Marinexa Shipping provides comprehensive logistics services on this important route, leveraging our strong carrier relationships and regional expertise.</p>
                <p class="mb-4">We offer regular ocean freight sailings and daily air connections, providing you with flexible options for your shipping needs between these major commercial centers.</p>
                <h3 class="text-xl font-bold mb-3">Ocean Freight Schedule</h3>
                <p class="mb-4">Our FCL service operates twice weekly from Mumbai/JNPT to Singapore with transit times of approximately 7-9 days, providing regular and reliable connections. Our LCL service offers a cost-effective alternative for smaller shipments with minimal consolidation delays.</p>
                <h3 class="text-xl font-bold mb-3">Air Freight Connections</h3>
                <p class="mb-4">With multiple daily flights between Mumbai and Singapore, we offer flexible air freight solutions ranging from next-day delivery to standard services. Our strong relationships with major airlines ensure capacity availability and competitive rates.</p>
                <h3 class="text-xl font-bold mb-3">Value-Added Services</h3>
                <p class="mb-4">We provide comprehensive services including customs clearance at both origin and destination, warehousing, distribution, and last-mile delivery in Singapore, creating an end-to-end logistics solution tailored to your specific requirements.</p>',
                'popular_commodities' => ['Electronics & Components', 'Pharmaceuticals', 'Engineering Goods', 'Textiles', 'Chemicals', 'Auto Parts'],
            ],
            'mumbai-to-london' => [
                'origin' => 'Mumbai',
                'origin_country' => 'India',
                'destination' => 'London',
                'destination_country' => 'UK',
                'banner' => 'images/routes/mumbai-london-banner.jpg',
                'transit_time' => [
                    'ocean_fcl' => '18-22 days',
                    'ocean_lcl' => '21-25 days',
                    'air_standard' => '1-2 days',
                    'air_express' => '1 day',
                ],
                'frequency' => [
                    'ocean' => 'Weekly departures',
                    'air' => 'Daily flights',
                ],
                'key_ports' => [
                    'origin' => ['Nhava Sheva (JNPT)', 'Mumbai Port'],
                    'destination' => ['Felixstowe', 'London Gateway', 'Heathrow Airport'],
                ],
                'services_available' => ['FCL', 'LCL', 'Air Freight', 'Express Air', 'Customs Clearance', 'Door-to-Door'],
                'description' => 'The Mumbai-London route connects two major global financial centers with comprehensive shipping solutions. Our weekly ocean services and daily air freight options provide flexible solutions for your India-UK trade needs, supported by our customs expertise in both countries.',
                'details' => '<p class="mb-4">The Mumbai to London shipping lane is a key route connecting India with the United Kingdom. Marinexa Shipping offers reliable and efficient logistics services on this important trade corridor, with options for both ocean and air transportation.</p>
                <p class="mb-4">Our services are designed to accommodate various cargo types and urgency levels, from bulk shipments to time-critical deliveries between these major commercial centers.</p>
                <h3 class="text-xl font-bold mb-3">Ocean Freight Services</h3>
                <p class="mb-4">We provide weekly ocean freight sailings from Mumbai to the UK with connections to major ports including Felixstowe and London Gateway. Transit times typically range from 18-22 days for FCL shipments, with comprehensive tracking and visibility throughout the journey.</p>
                <h3 class="text-xl font-bold mb-3">Air Cargo Options</h3>
                <p class="mb-4">Our air freight services include daily flights connecting Mumbai with London Heathrow, offering standard and express options to meet your time-sensitive shipping requirements. Our team coordinates all aspects of air cargo handling, documentation, and customs clearance.</p>
                <h3 class="text-xl font-bold mb-3">Post-Brexit Expertise</h3>
                <p class="mb-4">With the changing regulatory environment following Brexit, our customs specialists provide valuable guidance on documentation requirements, duty calculations, and compliance with UK import regulations to ensure smooth clearance of your shipments.</p>',
                'popular_commodities' => ['Textiles & Garments', 'Pharmaceuticals', 'Engineering Products', 'Leather Goods', 'Handicrafts', 'Chemicals'],
            ],
        ];

        if (!array_key_exists($slug, $routes)) {
            abort(404);
        }

        $route = $routes[$slug];
        
        return view('routes.show', compact('route'));
    }
}
