<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CareerController extends Controller
{
    /**
     * Display the careers listing page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // In a real application, you would fetch job listings from a database
        // Here we're using static data for demonstration
        $openings = [
            [
                'id' => 1,
                'title' => 'Logistics Coordinator',
                'location' => 'Mumbai, India',
                'type' => 'Full Time',
                'department' => 'Operations',
                'description' => 'Coordinate and track shipment activities, maintain documentation, and ensure timely delivery.',
                'slug' => 'logistics-coordinator',
                'featured' => true,
            ],
            [
                'id' => 2,
                'title' => 'Supply Chain Manager',
                'location' => 'Singapore',
                'type' => 'Full Time',
                'department' => 'Supply Chain',
                'description' => 'Oversee supply chain operations, develop strategies for optimization, and manage vendor relationships.',
                'slug' => 'supply-chain-manager',
                'featured' => true,
            ],
            [
                'id' => 3,
                'title' => 'Customer Service Representative',
                'location' => 'Remote',
                'type' => 'Full Time',
                'department' => 'Customer Support',
                'description' => 'Handle customer inquiries, resolve issues, and provide information about shipping services.',
                'slug' => 'customer-service-representative',
                'featured' => false,
            ],
            [
                'id' => 4,
                'title' => 'Warehouse Supervisor',
                'location' => 'Dubai, UAE',
                'type' => 'Full Time',
                'department' => 'Operations',
                'description' => 'Oversee daily warehouse operations, manage inventory, and ensure compliance with safety regulations.',
                'slug' => 'warehouse-supervisor',
                'featured' => false,
            ],
            [
                'id' => 5,
                'title' => 'International Sales Manager',
                'location' => 'London, UK',
                'type' => 'Full Time',
                'department' => 'Sales',
                'description' => 'Develop and implement sales strategies, build client relationships, and achieve sales targets.',
                'slug' => 'international-sales-manager',
                'featured' => true,
            ],
            [
                'id' => 6,
                'title' => 'Data Analyst',
                'location' => 'Remote',
                'type' => 'Part Time',
                'department' => 'IT & Analytics',
                'description' => 'Analyze shipping data, create reports, and provide insights to improve operational efficiency.',
                'slug' => 'data-analyst',
                'featured' => false,
            ],
        ];
        
        $featuredOpenings = array_filter($openings, function($job) {
            return $job['featured'] === true;
        });
        
        // Group jobs by department
        $departmentGroups = [];
        foreach ($openings as $job) {
            $departmentGroups[$job['department']][] = $job;
        }
        
        return view('careers.index', [
            'openings' => $openings,
            'featuredOpenings' => $featuredOpenings,
            'departmentGroups' => $departmentGroups
        ]);
    }

    /**
     * Display a specific job opening details
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        // In a real application, you would fetch this from a database
        // Here we're using static data for demonstration
        $openings = [
            'logistics-coordinator' => [
                'id' => 1,
                'title' => 'Logistics Coordinator',
                'location' => 'Mumbai, India',
                'type' => 'Full Time',
                'department' => 'Operations',
                'salary' => '$35,000 - $45,000 per year',
                'experience' => '2-3 years',
                'education' => 'Bachelor\'s degree in Logistics, Supply Chain or related field',
                'posted_date' => '2025-09-28',
                'description' => 'We are seeking a detail-oriented Logistics Coordinator to join our Mumbai office. The ideal candidate will coordinate and track shipment activities, maintain accurate documentation, and ensure timely delivery of goods.',
                'responsibilities' => [
                    'Coordinate shipment activities and track cargo movement',
                    'Prepare shipping documentation and ensure compliance with regulations',
                    'Liaise with carriers, agents, and clients to resolve issues',
                    'Monitor delivery schedules and notify clients of any delays',
                    'Maintain accurate shipping records and reports',
                    'Process customs documentation and ensure compliance with international shipping laws'
                ],
                'requirements' => [
                    '2-3 years of experience in logistics, shipping, or supply chain',
                    'Bachelor\'s degree in Logistics, Supply Chain, or related field',
                    'Knowledge of international shipping practices and regulations',
                    'Proficient in MS Office and logistics management software',
                    'Strong communication and problem-solving skills',
                    'Ability to work under pressure and meet tight deadlines'
                ],
                'benefits' => [
                    'Competitive salary package',
                    'Health insurance coverage',
                    'Performance-based bonuses',
                    'Professional development opportunities',
                    'Collaborative work environment',
                    'Flexible working arrangements'
                ],
                'slug' => 'logistics-coordinator',
            ],
            'supply-chain-manager' => [
                'id' => 2,
                'title' => 'Supply Chain Manager',
                'location' => 'Singapore',
                'type' => 'Full Time',
                'department' => 'Supply Chain',
                'salary' => '$65,000 - $85,000 per year',
                'experience' => '5+ years',
                'education' => 'Bachelor\'s or Master\'s degree in Supply Chain Management, Business Administration, or related field',
                'posted_date' => '2025-10-05',
                'description' => 'We are seeking an experienced Supply Chain Manager to oversee our supply chain operations in the APAC region. The ideal candidate will develop strategies for optimization, manage vendor relationships, and ensure efficient operations.',
                'responsibilities' => [
                    'Develop and implement supply chain strategies and procedures',
                    'Manage relationships with suppliers and vendors',
                    'Monitor and analyze supply chain operations and metrics',
                    'Identify opportunities for process improvements and cost savings',
                    'Lead and mentor a team of supply chain professionals',
                    'Collaborate with other departments to align supply chain with business objectives'
                ],
                'requirements' => [
                    '5+ years of experience in supply chain management',
                    'Bachelor\'s or Master\'s degree in Supply Chain Management, Business Administration, or related field',
                    'Strong knowledge of supply chain best practices and technologies',
                    'Experience with ERP systems and supply chain software',
                    'Excellent leadership, communication, and negotiation skills',
                    'APICS or similar supply chain certification preferred'
                ],
                'benefits' => [
                    'Competitive salary package',
                    'Comprehensive health and dental insurance',
                    'Performance bonuses and profit sharing',
                    'Relocation assistance',
                    'Professional development and training',
                    'Flexible working arrangements'
                ],
                'slug' => 'supply-chain-manager',
            ],
            'customer-service-representative' => [
                'id' => 3,
                'title' => 'Customer Service Representative',
                'location' => 'Remote',
                'type' => 'Full Time',
                'department' => 'Customer Support',
                'salary' => '$28,000 - $38,000 per year',
                'experience' => '1-2 years',
                'education' => 'High school diploma or equivalent; Bachelor\'s degree preferred',
                'posted_date' => '2025-10-02',
                'description' => 'We are looking for a customer-focused Customer Service Representative to handle inquiries, resolve issues, and provide information about our shipping services.',
                'responsibilities' => [
                    'Handle customer inquiries via phone, email, and chat',
                    'Provide accurate information about shipping services and rates',
                    'Track shipments and provide updates to customers',
                    'Process orders and ensure accurate data entry',
                    'Address and resolve customer complaints and issues',
                    'Maintain customer records and follow up on pending matters'
                ],
                'requirements' => [
                    '1-2 years of experience in customer service or related role',
                    'High school diploma; Bachelor\'s degree preferred',
                    'Excellent communication and interpersonal skills',
                    'Ability to remain calm and professional in stressful situations',
                    'Basic computer skills and familiarity with CRM systems',
                    'Available to work in shifts'
                ],
                'benefits' => [
                    'Competitive salary',
                    'Health insurance',
                    'Paid time off',
                    'Remote work option',
                    'Professional development opportunities',
                    'Employee discount programs'
                ],
                'slug' => 'customer-service-representative',
            ],
            'warehouse-supervisor' => [
                'id' => 4,
                'title' => 'Warehouse Supervisor',
                'location' => 'Dubai, UAE',
                'type' => 'Full Time',
                'department' => 'Operations',
                'salary' => '$40,000 - $55,000 per year',
                'experience' => '3-5 years',
                'education' => 'Bachelor\'s degree in Logistics, Supply Chain, or related field',
                'posted_date' => '2025-09-25',
                'description' => 'We are seeking an experienced Warehouse Supervisor to oversee daily warehouse operations, manage inventory, and ensure compliance with safety regulations at our Dubai facility.',
                'responsibilities' => [
                    'Supervise and coordinate warehouse activities and staff',
                    'Maintain inventory control and accuracy',
                    'Ensure proper handling, storage, and shipping of goods',
                    'Implement and enforce safety procedures',
                    'Monitor and report on warehouse performance metrics',
                    'Train and develop warehouse staff'
                ],
                'requirements' => [
                    '3-5 years of experience in warehouse management',
                    'Bachelor\'s degree in Logistics, Supply Chain, or related field',
                    'Knowledge of warehouse management systems and procedures',
                    'Proficient in inventory management software',
                    'Strong leadership and team management skills',
                    'Valid forklift certification a plus'
                ],
                'benefits' => [
                    'Competitive salary package',
                    'Health and life insurance',
                    'Annual bonuses based on performance',
                    'Housing allowance',
                    'Transportation allowance',
                    'Paid annual leave and airfare ticket'
                ],
                'slug' => 'warehouse-supervisor',
            ],
            'international-sales-manager' => [
                'id' => 5,
                'title' => 'International Sales Manager',
                'location' => 'London, UK',
                'type' => 'Full Time',
                'department' => 'Sales',
                'salary' => '£50,000 - £70,000 per year',
                'experience' => '5+ years',
                'education' => 'Bachelor\'s degree in Business, Marketing, or related field',
                'posted_date' => '2025-10-08',
                'description' => 'We are looking for an ambitious International Sales Manager to develop and implement sales strategies, build client relationships, and achieve sales targets for our European operations.',
                'responsibilities' => [
                    'Develop and execute sales strategies to meet or exceed targets',
                    'Build and maintain relationships with key clients',
                    'Identify new business opportunities and expand market share',
                    'Prepare sales forecasts and reports',
                    'Lead and motivate the sales team',
                    'Collaborate with marketing to develop effective campaigns'
                ],
                'requirements' => [
                    '5+ years of experience in international sales, preferably in logistics or shipping',
                    'Bachelor\'s degree in Business, Marketing, or related field',
                    'Proven track record of meeting or exceeding sales targets',
                    'Excellent negotiation and presentation skills',
                    'Knowledge of CRM systems and sales methodologies',
                    'Willingness to travel internationally (30% of time)'
                ],
                'benefits' => [
                    'Competitive base salary plus commission structure',
                    'Company car or car allowance',
                    'Private health insurance',
                    'Pension scheme',
                    'Performance bonuses',
                    'Professional development and training'
                ],
                'slug' => 'international-sales-manager',
            ],
            'data-analyst' => [
                'id' => 6,
                'title' => 'Data Analyst',
                'location' => 'Remote',
                'type' => 'Part Time',
                'department' => 'IT & Analytics',
                'salary' => '$30 - $40 per hour',
                'experience' => '2-4 years',
                'education' => 'Bachelor\'s degree in Statistics, Mathematics, Computer Science, or related field',
                'posted_date' => '2025-10-01',
                'description' => 'We are seeking a detail-oriented Data Analyst to analyze shipping data, create reports, and provide insights to improve operational efficiency. This is a part-time, remote position with flexible hours.',
                'responsibilities' => [
                    'Collect and analyze shipping and logistics data',
                    'Develop and maintain dashboards and reports',
                    'Identify trends and patterns to improve operational efficiency',
                    'Collaborate with various departments to understand data needs',
                    'Present findings and recommendations to management',
                    'Maintain data quality and integrity'
                ],
                'requirements' => [
                    '2-4 years of experience in data analysis',
                    'Bachelor\'s degree in Statistics, Mathematics, Computer Science, or related field',
                    'Proficiency in data analysis tools (Excel, SQL, Python, or R)',
                    'Experience with visualization tools (Power BI, Tableau)',
                    'Strong analytical and problem-solving skills',
                    'Ability to work independently and manage time effectively'
                ],
                'benefits' => [
                    'Competitive hourly rate',
                    'Flexible working hours',
                    'Remote work arrangement',
                    'Professional development opportunities',
                    'Performance bonuses',
                    'Potential for full-time employment'
                ],
                'slug' => 'data-analyst',
            ],
        ];
        
        if (!array_key_exists($slug, $openings)) {
            abort(404);
        }
        
        $job = $openings[$slug];
        
        // Get related jobs (same department, excluding current job)
        $relatedJobs = [];
        foreach ($openings as $key => $opening) {
            if ($key !== $slug && $opening['department'] === $job['department']) {
                $relatedJobs[] = $opening;
            }
        }
        
        // Limit to 3 related jobs
        $relatedJobs = array_slice($relatedJobs, 0, 3);
        
        return view('careers.show', [
            'job' => $job,
            'relatedJobs' => $relatedJobs
        ]);
    }

    /**
     * Handle job application submission
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function apply(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'job_id' => 'required|integer',
            'job_title' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'cover_letter' => 'nullable|string',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);
        
        // In a real application, you would:
        // 1. Store the uploaded resume file
        // 2. Save the application to a database
        // 3. Send notifications to HR personnel
        // 4. Send a confirmation email to the applicant
        
        // For demo purposes, we'll just handle the file upload (but not actually save it)
        if ($request->hasFile('resume')) {
            $file = $request->file('resume');
            $fileName = Str::slug($request->name) . '-' . time() . '.' . $file->getClientOriginalExtension();
            
            // In a real application, you'd store the file
            // $path = $file->storeAs('resumes', $fileName, 'public');
        }
        
        // Redirect with success message
        return redirect()->back()->with('success', 'Thank you for your application! We will review your qualifications and contact you if there is a match.');
    }
}
