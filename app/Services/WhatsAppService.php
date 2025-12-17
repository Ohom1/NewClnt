<?php

namespace App\Services;

use App\Models\Lead;
use App\Models\WhatsappTemplate;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    /**
     * The WhatsApp API endpoint.
     *
     * @var string
     */
    protected $apiUrl;

    /**
     * The WhatsApp API token.
     *
     * @var string
     */
    protected $apiToken;

    /**
     * The WhatsApp sender number.
     *
     * @var string
     */
    protected $senderNumber;

    /**
     * Create a new WhatsAppService instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->apiUrl = config('services.whatsapp.url');
        $this->apiToken = config('services.whatsapp.token');
        $this->senderNumber = config('services.whatsapp.sender_number');
    }

    /**
     * Send a WhatsApp message to a lead using a template.
     *
     * @param  \App\Models\Lead  $lead
     * @param  \App\Models\WhatsappTemplate  $template
     * @param  array  $params  Additional parameters to replace in the template
     * @param  int  $userId  The ID of the user sending the message
     * @return string|false  The message ID on success, false on failure
     */
    public function sendTemplateMessage(Lead $lead, WhatsappTemplate $template, array $params = [], int $userId = null)
    {
        $templateParams = array_merge([
            'name' => $lead->name,
            'phone' => $lead->phone,
            'origin' => $lead->origin,
            'destination' => $lead->destination,
        ], $params);

        $content = $template->parseTemplate($templateParams);
        
        $result = $this->sendMessage($lead->phone, $content);
        
        if ($result) {
            // Record this WhatsApp message in the lead activities
            if ($userId) {
                $lead->recordWhatsApp(
                    $content,
                    $result,
                    $userId
                );
            }
            
            return $result;
        }
        
        return false;
    }

    /**
     * Send a WhatsApp message.
     *
     * @param  string  $phone
     * @param  string  $message
     * @return string|false  The message ID on success, false on failure
     */
    public function sendMessage($phone, $message)
    {
        // Format phone number to E.164 format
        $phone = $this->formatPhoneNumber($phone);
        
        if (!$phone) {
            Log::error('Invalid phone number format');
            return false;
        }

        try {
            // This is a placeholder implementation. In a real application, 
            // you would integrate with an actual WhatsApp API service
            // For demonstration purposes, we're just logging the message
            Log::info("WhatsApp message to {$phone}: {$message}");
            
            // In a real implementation, this would make an API call and return the message ID
            $messageId = 'wamid_' . uniqid();
            
            return $messageId;
            
            /* 
            // Example of a real API implementation:
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiToken,
                'Content-Type' => 'application/json',
            ])->post($this->apiUrl, [
                'messaging_product' => 'whatsapp',
                'recipient_type' => 'individual',
                'to' => $phone,
                'type' => 'text',
                'text' => [
                    'body' => $message
                ]
            ]);
            
            if ($response->successful()) {
                $data = $response->json();
                return $data['messages'][0]['id'] ?? false;
            }
            
            Log::error('WhatsApp API Error: ' . $response->body());
            return false;
            */
        } catch (\Exception $e) {
            Log::error('WhatsApp Service Exception: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Format phone number to E.164 format.
     *
     * @param  string  $phone
     * @return string|false
     */
    protected function formatPhoneNumber($phone)
    {
        // Remove all non-numeric characters
        $phone = preg_replace('/[^0-9]/', '', $phone);
        
        // Make sure it starts with a plus
        if (substr($phone, 0, 1) !== '+') {
            // Add a default country code if not present (assuming India +91)
            if (strlen($phone) === 10) {
                $phone = '+91' . $phone;
            } else {
                $phone = '+' . $phone;
            }
        }
        
        // Validate E.164 format (roughly)
        if (preg_match('/^\+[1-9]\d{1,14}$/', $phone)) {
            return $phone;
        }
        
        return false;
    }

    /**
     * Process webhook events from WhatsApp API.
     *
     * @param  array  $data
     * @return void
     */
    public function processWebhook(array $data)
    {
        $entry = $data['entry'][0] ?? null;
        if (!$entry) {
            Log::warning('WhatsApp webhook received without entry data', $data);
            return;
        }

        $changes = $entry['changes'][0] ?? null;
        if (!$changes) {
            Log::warning('WhatsApp webhook received without changes data', $data);
            return;
        }

        $value = $changes['value'] ?? null;
        $messaging = $value['messages'][0] ?? null;

        if (!$messaging) {
            // This might be a status update
            $statuses = $value['statuses'][0] ?? null;
            if ($statuses) {
                $this->processStatusUpdate($statuses);
            }
            return;
        }

        $messageId = $messaging['id'] ?? null;
        $from = $messaging['from'] ?? null;
        $text = $messaging['text']['body'] ?? null;

        if (!$messageId || !$from || !$text) {
            Log::warning('WhatsApp webhook received with incomplete message data', $data);
            return;
        }

        // Find a lead with this phone number
        $lead = Lead::where('phone', 'like', '%' . substr($from, -10))->first();
        
        if (!$lead) {
            Log::info("WhatsApp message received from unknown number: {$from}");
            // Here you might want to create a new lead or send an automated response
            return;
        }

        // Record the incoming message
        $lead->activities()->create([
            'user_id' => null, // System message
            'type' => 'whatsapp',
            'content' => $text,
            'whatsapp_message_id' => $messageId,
            'whatsapp_status' => 'received',
        ]);

        // Here you might want to implement automated responses or notifications to staff
    }

    /**
     * Process WhatsApp status update.
     *
     * @param  array  $status
     * @return void
     */
    protected function processStatusUpdate(array $status)
    {
        $messageId = $status['id'] ?? null;
        $status = $status['status'] ?? null;

        if (!$messageId || !$status) {
            Log::warning('WhatsApp status update received with incomplete data');
            return;
        }

        // Find the activity by WhatsApp message ID
        $activity = \App\Models\LeadActivity::where('whatsapp_message_id', $messageId)->first();

        if (!$activity) {
            Log::warning('WhatsApp status update received for unknown message ID: ' . $messageId);
            return;
        }

        $activity->update(['whatsapp_status' => $status]);
    }
}
