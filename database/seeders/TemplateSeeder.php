<?php

namespace Database\Seeders;

use App\Models\EmailTemplate;
use App\Models\WhatsappTemplate;
use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Email templates
        $emailTemplates = [
            [
                'name' => 'Lead Welcome',
                'slug' => 'lead-welcome',
                'subject' => 'Welcome to Marinexa Shipping - Your Quote Request Received',
                'body' => "Dear {{name}},\n\nThank you for choosing Marinexa Shipping for your logistics needs.\n\nWe have received your quote request for shipping from {{origin}} to {{destination}}.\n\nOur team is reviewing your request and will get back to you within 24 hours with a competitive quote.\n\nYour reference number is: #{{id}}\n\nFeel free to contact us if you have any questions.\n\nBest regards,\nMarinexa Shipping Team\n+91-8800XXXXXX\ninfo@marinexa.com",
                'active' => true,
                'brevo_template_id' => null,
            ],
            [
                'name' => 'Quote Ready',
                'slug' => 'quote-ready',
                'subject' => 'Your Marinexa Shipping Quote is Ready',
                'body' => "Dear {{name}},\n\nGood news! Your shipping quote from {{origin}} to {{destination}} is ready.\n\nPlease find below the details of your quote:\n\nOrigin: {{origin}}\nDestination: {{destination}}\nCargo Type: {{cargo_type}}\nShipping Mode: {{shipping_mode}}\n\nTotal Quote Amount: [QUOTE_AMOUNT]\n\nTo proceed with your shipment, please reply to this email or call us at +91-8800XXXXXX.\n\nThis quote is valid for 7 days from the date of this email.\n\nBest regards,\nMarinexa Shipping Team\ninfo@marinexa.com",
                'active' => true,
                'brevo_template_id' => null,
            ],
            [
                'name' => 'Follow Up',
                'slug' => 'follow-up',
                'subject' => 'Following Up on Your Shipping Quote',
                'body' => "Dear {{name}},\n\nWe hope this email finds you well.\n\nWe're following up on the shipping quote we sent you for transportation from {{origin}} to {{destination}}.\n\nWe're wondering if you have any questions or if there's any additional information we can provide to help you make your decision.\n\nOur team is ready to assist you with any clarification you might need.\n\nBest regards,\nMarinexa Shipping Team\n+91-8800XXXXXX\ninfo@marinexa.com",
                'active' => true,
                'brevo_template_id' => null,
            ],
            [
                'name' => 'Booking Confirmation',
                'slug' => 'booking-confirmation',
                'subject' => 'Booking Confirmation - Marinexa Shipping',
                'body' => "Dear {{name}},\n\nThank you for choosing Marinexa Shipping. This email confirms your booking with us.\n\nBooking Details:\n- Origin: {{origin}}\n- Destination: {{destination}}\n- Cargo Type: {{cargo_type}}\n- Shipping Mode: {{shipping_mode}}\n\nOur operations team will contact you shortly with detailed pickup instructions.\n\nYour shipment tracking number is: [TRACKING_NUMBER]\n\nYou can track your shipment on our website using this number.\n\nBest regards,\nMarinexa Shipping Team\n+91-8800XXXXXX\ninfo@marinexa.com",
                'active' => true,
                'brevo_template_id' => null,
            ],
        ];

        foreach ($emailTemplates as $template) {
            EmailTemplate::updateOrCreate(
                ['slug' => $template['slug']],
                $template
            );
        }

        // WhatsApp templates
        $whatsappTemplates = [
            [
                'name' => 'Lead Welcome',
                'slug' => 'lead-welcome',
                'content' => "Hello {{name}},\n\nThank you for contacting Marinexa Shipping. We've received your request for shipping from {{origin}} to {{destination}}.\n\nOur team will prepare a quote for you shortly.\n\nFor any urgent queries, please call us at +91-8800XXXXXX.",
                'active' => true,
            ],
            [
                'name' => 'Quote Ready',
                'slug' => 'quote-ready',
                'content' => "Hello {{name}},\n\nYour shipping quote for {{origin}} to {{destination}} is now ready! Please check your email for the detailed quote.\n\nFor any questions, feel free to reply to this message or call us at +91-8800XXXXXX.\n\nRegards,\nMarinexa Shipping",
                'active' => true,
            ],
            [
                'name' => 'Shipment Status',
                'slug' => 'shipment-status',
                'content' => "Hello {{name}},\n\nYour shipment from {{origin}} to {{destination}} has been [STATUS].\n\nTracking Number: [TRACKING_NUMBER]\n\nFor more details, please visit our website or contact us at +91-8800XXXXXX.\n\nRegards,\nMarinexa Shipping",
                'active' => true,
            ],
            [
                'name' => 'Payment Reminder',
                'slug' => 'payment-reminder',
                'content' => "Hello {{name}},\n\nThis is a gentle reminder that payment for your shipment from {{origin}} to {{destination}} is due.\n\nAmount: [AMOUNT]\nDue Date: [DUE_DATE]\n\nPlease make the payment to proceed with your shipment.\n\nRegards,\nMarinexa Shipping",
                'active' => true,
            ],
        ];

        foreach ($whatsappTemplates as $template) {
            WhatsappTemplate::updateOrCreate(
                ['slug' => $template['slug']],
                $template
            );
        }
    }
}
