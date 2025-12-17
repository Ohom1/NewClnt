<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the services.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = [
            [
                'slug' => 'ocean-freight',
                'title' => 'Ocean Freight',
                'icon' => 'ship',
                'short_description' => 'Reliable and cost-effective sea freight solutions for FCL and LCL shipments worldwide.',
                'image' => 'images/services/ocean-freight.jpg',
            ],
            [
                'slug' => 'air-freight',
                'title' => 'Air Freight',
                'icon' => 'plane',
                'short_description' => 'Express and standard air freight services to meet your urgent and time-sensitive deliveries.',
                'image' => 'images/services/air-freight.jpg',
            ],
            [
                'slug' => 'customs-clearance',
                'title' => 'Customs Clearance',
                'icon' => 'clipboard-check',
                'short_description' => 'Expert assistance with customs documentation, regulations, and compliance requirements.',
                'image' => 'images/services/customs-clearance.jpg',
            ],
            [
                'slug' => 'door-to-door',
                'title' => 'Door to Door',
                'icon' => 'home',
                'short_description' => 'Complete logistics solutions from pickup at origin to final delivery at destination.',
                'image' => 'images/services/door-to-door.jpg',
            ],
        ];

        return view('services.index', compact('services'));
    }

    /**
     * Display the specified service.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $services = [
            'ocean-freight' => [
                'title' => 'Ocean Freight',
                'icon' => 'ship',
                'banner' => 'images/services/ocean-freight-banner.jpg',
                'description' => 'Our comprehensive ocean freight services connect businesses across the globe with reliable, cost-effective shipping solutions. Whether you need full container load (FCL) or less than container load (LCL) services, our extensive carrier network ensures your cargo arrives safely and on schedule.',
                'features' => [
                    'Full Container Load (FCL) Services',
                    'Less than Container Load (LCL) Consolidation',
                    'Special Equipment for Oversized Cargo',
                    'Temperature-Controlled Shipping',
                    'Hazardous Cargo Handling',
                    'Door-to-Door Services',
                    'Real-time Shipment Tracking',
                ],
                'content' => '<p class="mb-4">At Marinexa Shipping, we offer comprehensive ocean freight solutions tailored to meet your specific business requirements. Our global network of carriers and agents ensures reliable transportation of your cargo across major shipping routes worldwide.</p>
                <p class="mb-4">With decades of experience in sea freight, our team provides expert guidance on the most efficient shipping methods, optimal routing, and cost-effective solutions for your international shipments.</p>
                <h3 class="text-xl font-bold mb-3">FCL (Full Container Load)</h3>
                <p class="mb-4">Our FCL services provide dedicated container space for your exclusive use, ideal for larger shipments. This ensures your goods remain together throughout the journey, minimizing handling and reducing the risk of damage or loss.</p>
                <h3 class="text-xl font-bold mb-3">LCL (Less than Container Load)</h3>
                <p class="mb-4">For smaller shipments, our LCL consolidation services allow you to share container space with other shipments, providing a cost-effective solution without compromising on reliability or transit times.</p>
                <h3 class="text-xl font-bold mb-3">Specialized Ocean Freight</h3>
                <p class="mb-4">We handle specialized cargo requirements including temperature-controlled containers for perishable goods, flat racks for oversized equipment, and open-top containers for tall items. Our expertise extends to hazardous materials, ensuring compliance with international shipping regulations.</p>',
            ],
            'air-freight' => [
                'title' => 'Air Freight',
                'icon' => 'plane',
                'banner' => 'images/services/air-freight-banner.jpg',
                'description' => 'When time is critical, our air freight services provide the speed and reliability your business needs. We offer flexible solutions ranging from next-day delivery to more economical options, all managed by our experienced team with carrier relationships worldwide.',
                'features' => [
                    'Express Air Freight Services',
                    'Consolidation Options',
                    'Charter Services for Urgent or Oversized Cargo',
                    'Door-to-Airport and Door-to-Door Options',
                    'Dangerous Goods Handling',
                    'Temperature-Sensitive Cargo Solutions',
                    'Real-time Tracking and Visibility',
                ],
                'content' => '<p class="mb-4">Marinexa Shipping offers premium air freight services designed to meet tight deadlines and expedite your time-sensitive shipments. Our strong partnerships with major airlines ensure we can provide competitive rates and reliable service on routes worldwide.</p>
                <p class="mb-4">Our air freight specialists work closely with you to understand your specific requirements and develop tailored solutions that balance speed, cost, and reliability.</p>
                <h3 class="text-xl font-bold mb-3">Express Services</h3>
                <p class="mb-4">When urgency is paramount, our express air freight services ensure your cargo reaches its destination in the shortest possible time. We prioritize your shipment and select the fastest available routes.</p>
                <h3 class="text-xl font-bold mb-3">Standard Air Freight</h3>
                <p class="mb-4">Our standard air freight services offer an excellent balance between speed and cost-effectiveness, ideal for shipments that require timely delivery but have some flexibility in scheduling.</p>
                <h3 class="text-xl font-bold mb-3">Specialized Air Cargo</h3>
                <p class="mb-4">We handle specialized air shipments including perishable goods, valuable items, dangerous goods, and oversized cargo. Our team ensures proper documentation, packaging, and handling to meet all international regulations and carrier requirements.</p>',
            ],
            'customs-clearance' => [
                'title' => 'Customs Clearance',
                'icon' => 'clipboard-check',
                'banner' => 'images/services/customs-clearance-banner.jpg',
                'description' => 'Navigate complex customs regulations with confidence using our expert clearance services. Our dedicated team ensures accurate documentation, classification, and compliance with all import/export requirements to prevent delays and penalties.',
                'features' => [
                    'Import and Export Customs Clearance',
                    'Documentation Preparation and Verification',
                    'Tariff Classification',
                    'Duty and Tax Calculation',
                    'Customs Bonds',
                    'Regulatory Compliance Management',
                    'Special Permits and Licenses Assistance',
                ],
                'content' => '<p class="mb-4">Customs clearance can be one of the most challenging aspects of international shipping. At Marinexa Shipping, our dedicated customs specialists simplify this complex process, ensuring smooth clearance and compliance with all regulatory requirements.</p>
                <p class="mb-4">With expertise in customs procedures across major global markets, we help you navigate changing regulations, documentation requirements, and duty calculations.</p>
                <h3 class="text-xl font-bold mb-3">Import Clearance Services</h3>
                <p class="mb-4">Our comprehensive import clearance services include document preparation, tariff classification, duty and tax calculation, and coordination with customs authorities to ensure efficient processing of your inbound shipments.</p>
                <h3 class="text-xl font-bold mb-3">Export Clearance Services</h3>
                <p class="mb-4">We handle all aspects of export documentation and compliance, including export licenses, certificates of origin, commercial invoices, and other required paperwork to facilitate smooth export clearance.</p>
                <h3 class="text-xl font-bold mb-3">Compliance Consulting</h3>
                <p class="mb-4">Our team provides expert advice on customs regulations, trade agreements, restricted goods, and documentation requirements. We help you develop strategies to optimize duty payments and ensure regulatory compliance.</p>',
            ],
            'door-to-door' => [
                'title' => 'Door to Door',
                'icon' => 'home',
                'banner' => 'images/services/door-to-door-banner.jpg',
                'description' => 'Experience seamless logistics with our comprehensive door-to-door service. We manage the entire supply chain from pickup at origin to final delivery, providing a single point of contact and full visibility throughout the journey.',
                'features' => [
                    'Origin Pickup and Packing',
                    'Export Customs Clearance',
                    'International Freight (Air or Ocean)',
                    'Destination Customs Clearance',
                    'Last Mile Delivery',
                    'Single Point of Contact',
                    'End-to-end Shipment Visibility',
                ],
                'content' => '<p class="mb-4">Our door-to-door shipping service provides a complete logistics solution, eliminating the complexity of managing multiple service providers. From pickup at your facility to final delivery at the destination, we handle every aspect of the shipping process.</p>
                <p class="mb-4">This comprehensive service combines transportation, customs clearance, documentation, and delivery into one seamless operation managed by our experienced logistics team.</p>
                <h3 class="text-xl font-bold mb-3">Complete Supply Chain Management</h3>
                <p class="mb-4">We coordinate all elements of your shipment including pickup, packing, documentation, customs clearance, international transportation, and final delivery, providing you with a single point of contact throughout the entire process.</p>
                <h3 class="text-xl font-bold mb-3">Multimodal Solutions</h3>
                <p class="mb-4">Our door-to-door service integrates multiple transportation modes (sea, air, road, and rail) to create the most efficient and cost-effective routing for your shipments, regardless of origin or destination.</p>
                <h3 class="text-xl font-bold mb-3">Real-time Tracking</h3>
                <p class="mb-4">With our advanced tracking systems, you have complete visibility of your cargo at every stage of its journey. Regular updates and proactive communication ensure you\'re always informed about your shipment\'s status.</p>',
            ],
        ];

        if (!array_key_exists($slug, $services)) {
            abort(404);
        }

        $service = $services[$slug];
        $service['slug'] = $slug;
        
        return view('services.show', compact('service'));
    }
}
