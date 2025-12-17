<?php

namespace App\Services;

use App\Models\EmailTemplate;
use App\Models\Lead;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BrevoEmailService
{
    /**
     * The Brevo API key.
     *
     * @var string
     */
    protected $apiKey;

    /**
     * The Brevo API base URL.
     *
     * @var string
     */
    protected $apiBaseUrl = 'https://api.brevo.com/v3';

    /**
     * Create a new BrevoEmailService instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->apiKey = config('services.brevo.key');
    }

    /**
     * Send a transactional email using a template.
     *
     * @param  \App\Models\Lead  $lead
     * @param  \App\Models\EmailTemplate  $template
     * @param  array  $params  Additional parameters to replace in the template
     * @param  int  $userId  The ID of the user sending the email
     * @return array|false
     */
    public function sendTemplateEmail(Lead $lead, EmailTemplate $template, array $params = [], int $userId = null)
    {
        $templateParams = array_merge([
            'name' => $lead->name,
            'email' => $lead->email,
            'phone' => $lead->phone,
            'company' => $lead->company,
            'origin' => $lead->origin,
            'destination' => $lead->destination,
            'cargo_type' => ucfirst($lead->cargo_type),
            'shipping_mode' => ucfirst(str_replace('_', ' ', $lead->shipping_mode ?: '')),
        ], $params);

        $parsedTemplate = $template->parseTemplate($templateParams);
        
        $response = $this->sendTransactionalEmail(
            $lead->email,
            $lead->name,
            $parsedTemplate['subject'],
            $parsedTemplate['body'],
            $template->brevo_template_id ?? null
        );

        if ($response && isset($response['messageId'])) {
            // Record this email in the lead activities
            if ($userId) {
                $lead->recordEmail(
                    $parsedTemplate['subject'],
                    $parsedTemplate['body'],
                    $response['messageId'],
                    $userId
                );
            }

            return $response;
        }

        return false;
    }

    /**
     * Send a custom transactional email.
     *
     * @param  string  $email
     * @param  string  $name
     * @param  string  $subject
     * @param  string  $htmlContent
     * @param  string|null  $templateId
     * @return array|false
     */
    public function sendTransactionalEmail($email, $name, $subject, $htmlContent, $templateId = null)
    {
        $payload = [
            'to' => [
                [
                    'email' => $email,
                    'name' => $name
                ]
            ],
            'sender' => [
                'email' => config('mail.from.address'),
                'name' => config('mail.from.name')
            ],
            'subject' => $subject,
            'htmlContent' => $htmlContent,
        ];

        if ($templateId) {
            $payload['templateId'] = $templateId;
        }

        try {
            $response = Http::withHeaders([
                'api-key' => $this->apiKey,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])->post("{$this->apiBaseUrl}/smtp/email", $payload);

            if ($response->successful()) {
                return $response->json();
            } else {
                Log::error('Brevo API Error: ' . $response->body());
                return false;
            }
        } catch (\Exception $e) {
            Log::error('Brevo API Exception: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Create a contact in Brevo.
     *
     * @param  \App\Models\Lead  $lead
     * @return array|false
     */
    public function createContact(Lead $lead)
    {
        $payload = [
            'email' => $lead->email,
            'attributes' => [
                'FIRSTNAME' => explode(' ', $lead->name)[0] ?? '',
                'LASTNAME' => explode(' ', $lead->name)[1] ?? '',
                'PHONE' => $lead->phone,
                'COMPANY' => $lead->company ?? '',
                'ORIGIN' => $lead->origin,
                'DESTINATION' => $lead->destination,
                'CARGO_TYPE' => $lead->cargo_type,
                'STATUS' => $lead->status,
                'SOURCE' => $lead->source,
            ],
        ];

        try {
            $response = Http::withHeaders([
                'api-key' => $this->apiKey,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])->post("{$this->apiBaseUrl}/contacts", $payload);

            if ($response->successful()) {
                return $response->json();
            } else {
                Log::error('Brevo API Error: ' . $response->body());
                return false;
            }
        } catch (\Exception $e) {
            Log::error('Brevo API Exception: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Update a contact in Brevo.
     *
     * @param  \App\Models\Lead  $lead
     * @return array|false
     */
    public function updateContact(Lead $lead)
    {
        $payload = [
            'attributes' => [
                'FIRSTNAME' => explode(' ', $lead->name)[0] ?? '',
                'LASTNAME' => explode(' ', $lead->name)[1] ?? '',
                'PHONE' => $lead->phone,
                'COMPANY' => $lead->company ?? '',
                'ORIGIN' => $lead->origin,
                'DESTINATION' => $lead->destination,
                'CARGO_TYPE' => $lead->cargo_type,
                'STATUS' => $lead->status,
                'SOURCE' => $lead->source,
            ],
        ];

        try {
            $response = Http::withHeaders([
                'api-key' => $this->apiKey,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])->put("{$this->apiBaseUrl}/contacts/{$lead->email}", $payload);

            if ($response->successful()) {
                return $response->json();
            } else {
                Log::error('Brevo API Error: ' . $response->body());
                return false;
            }
        } catch (\Exception $e) {
            Log::error('Brevo API Exception: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Process webhook events from Brevo.
     *
     * @param  array  $data
     * @return void
     */
    public function processWebhook(array $data)
    {
        $event = $data['event'] ?? null;
        $messageId = $data['message-id'] ?? null;

        if (!$messageId) {
            Log::warning('Brevo webhook received without message ID', $data);
            return;
        }

        // Find the activity by message ID
        $activity = \App\Models\LeadActivity::where('email_message_id', $messageId)->first();

        if (!$activity) {
            Log::warning('Brevo webhook received for unknown message ID: ' . $messageId);
            return;
        }

        switch ($event) {
            case 'delivered':
                $activity->update(['email_status' => 'delivered']);
                break;
            case 'open':
                $activity->update(['email_status' => 'opened']);
                break;
            case 'click':
                $activity->update(['email_status' => 'clicked']);
                break;
            case 'bounce':
                $activity->update(['email_status' => 'bounced']);
                break;
            case 'complaint':
                $activity->update(['email_status' => 'complained']);
                break;
            case 'unsubscribe':
                $activity->update(['email_status' => 'unsubscribed']);
                break;
            default:
                $activity->update(['email_status' => $event]);
                break;
        }
    }
}
