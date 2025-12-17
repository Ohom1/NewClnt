<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\User;
use App\Models\EmailTemplate;
use App\Models\WhatsappTemplate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LeadController extends Controller
{
    /**
     * Display a listing of the leads.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Lead::with('assignedUser');
        
        // Apply search term
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                  ->orWhere('email', 'like', "%{$searchTerm}%")
                  ->orWhere('phone', 'like', "%{$searchTerm}%")
                  ->orWhere('company', 'like', "%{$searchTerm}%")
                  ->orWhere('origin', 'like', "%{$searchTerm}%")
                  ->orWhere('destination', 'like', "%{$searchTerm}%");
            });
        }
        
        // Apply filters
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        if ($request->filled('assigned_to')) {
            $query->where('assigned_to', $request->assigned_to);
        }
        
        // Sort
        $sortField = $request->input('sort', 'created_at');
        $sortDirection = $request->input('direction', 'desc');
        $query->orderBy($sortField, $sortDirection);
        
        $leads = $query->paginate(20);
        $users = User::all();
        
        return view('admin.leads.index', compact('leads', 'users'));
    }

    /**
     * Show the form for creating a new lead.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.leads.create', compact('users'));
    }

    /**
     * Store a newly created lead.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'company' => 'nullable|string|max:255',
            'origin' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'cargo_type' => 'required|string|max:255',
            'shipping_mode' => 'nullable|string|max:255',
            'container_size' => 'nullable|string|max:50',
            'weight' => 'nullable|string|max:50',
            'dimensions' => 'nullable|string|max:255',
            'shipping_date' => 'nullable|date',
            'message' => 'nullable|string',
            'status' => 'required|string|in:new,contacted,quoted,negotiating,won,lost,cancelled',
            'source' => 'required|string|max:255',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        $lead = Lead::create($validatedData);

        // If assigned, record the assignment
        if ($request->filled('assigned_to')) {
            $lead->recordAssignment(null, $request->assigned_to, auth()->id());
        }

        return redirect()
            ->route('admin.leads.show', $lead)
            ->with('success', 'Lead created successfully.');
    }

    /**
     * Display the specified lead.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function show(Lead $lead)
    {
        $lead->load('assignedUser', 'activities.user');
        $users = User::all();
        $emailTemplates = EmailTemplate::active()->get();
        $whatsappTemplates = WhatsappTemplate::active()->get();
        
        return view('admin.leads.show', compact('lead', 'users', 'emailTemplates', 'whatsappTemplates'));
    }

    /**
     * Show the form for editing the specified lead.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function edit(Lead $lead)
    {
        $users = User::all();
        return view('admin.leads.edit', compact('lead', 'users'));
    }

    /**
     * Update the specified lead.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lead $lead)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'company' => 'nullable|string|max:255',
            'origin' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'cargo_type' => 'required|string|max:255',
            'shipping_mode' => 'nullable|string|max:255',
            'container_size' => 'nullable|string|max:50',
            'weight' => 'nullable|string|max:50',
            'dimensions' => 'nullable|string|max:255',
            'shipping_date' => 'nullable|date',
            'message' => 'nullable|string',
            'status' => 'required|string|in:new,contacted,quoted,negotiating,won,lost,cancelled',
            'source' => 'required|string|max:255',
            'assigned_to' => 'nullable|exists:users,id',
            'quoted_amount' => 'nullable|numeric',
            'currency' => 'nullable|string|size:3',
        ]);

        // Check if status has changed
        $oldStatus = $lead->status;
        $newStatus = $request->status;
        
        // Check if assignment has changed
        $oldAssignedTo = $lead->assigned_to;
        $newAssignedTo = $request->assigned_to;

        $lead->update($validatedData);

        // Record status change if needed
        if ($oldStatus !== $newStatus) {
            $lead->recordStatusChange($oldStatus, $newStatus, auth()->id());
        }

        // Record assignment change if needed
        if ($oldAssignedTo !== $newAssignedTo && $request->filled('assigned_to')) {
            $lead->recordAssignment($oldAssignedTo, $newAssignedTo, auth()->id());
        }

        return redirect()
            ->route('admin.leads.show', $lead)
            ->with('success', 'Lead updated successfully.');
    }

    /**
     * Remove the specified lead.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lead $lead)
    {
        $lead->delete();

        return redirect()
            ->route('admin.leads.index')
            ->with('success', 'Lead deleted successfully.');
    }

    /**
     * Assign a lead to a user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function assign(Request $request, Lead $lead)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $oldAssignedTo = $lead->assigned_to;
        $newAssignedTo = $request->user_id;

        $lead->update([
            'assigned_to' => $newAssignedTo,
        ]);

        $lead->recordAssignment($oldAssignedTo, $newAssignedTo, auth()->id());

        return redirect()
            ->route('admin.leads.show', $lead)
            ->with('success', 'Lead assigned successfully.');
    }

    /**
     * Update lead status.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request, Lead $lead)
    {
        $request->validate([
            'status' => 'required|in:new,contacted,quoted,negotiating,won,lost,cancelled',
        ]);

        $oldStatus = $lead->status;
        $newStatus = $request->status;

        $lead->update([
            'status' => $newStatus,
        ]);

        $lead->recordStatusChange($oldStatus, $newStatus, auth()->id());

        return redirect()
            ->route('admin.leads.show', $lead)
            ->with('success', 'Lead status updated successfully.');
    }

    /**
     * Add a note to a lead.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function addNote(Request $request, Lead $lead)
    {
        $request->validate([
            'note_content' => 'required|string',
        ]);

        $lead->addNote($request->note_content, auth()->id());

        return redirect()
            ->route('admin.leads.show', $lead)
            ->with('success', 'Note added successfully.');
    }

    /**
     * Display lead timeline.
     *
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function timeline(Lead $lead)
    {
        $lead->load('activities.user');
        
        return view('admin.leads.timeline', compact('lead'));
    }

    /**
     * Send an email to the lead.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function sendEmail(Request $request, Lead $lead)
    {
        $request->validate([
            'email_subject' => 'required|string|max:255',
            'email_content' => 'required|string',
        ]);

        // In a real application, this would use a mail service like Brevo
        // For now, we'll just record the activity

        $lead->recordEmail(
            $request->email_subject,
            $request->email_content,
            'msg_' . Str::random(24),
            auth()->id()
        );

        return redirect()
            ->route('admin.leads.show', $lead)
            ->with('success', 'Email sent successfully.');
    }

    /**
     * Send a WhatsApp message to the lead.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function sendWhatsApp(Request $request, Lead $lead)
    {
        $request->validate([
            'whatsapp_content' => 'required|string',
        ]);

        // In a real application, this would use a WhatsApp gateway
        // For now, we'll just record the activity

        $lead->recordWhatsApp(
            $request->whatsapp_content,
            'whatsapp_' . Str::random(24),
            auth()->id()
        );

        return redirect()
            ->route('admin.leads.show', $lead)
            ->with('success', 'WhatsApp message sent successfully.');
    }

    /**
     * Store a lead from the API.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function apiStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'company' => 'nullable|string|max:255',
            'origin' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'cargo_type' => 'required|string|max:255',
            'shipping_mode' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $lead = Lead::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->company,
            'origin' => $request->origin,
            'destination' => $request->destination,
            'cargo_type' => $request->cargo_type,
            'shipping_mode' => $request->shipping_mode,
            'message' => $request->message,
            'status' => 'new',
            'source' => 'api',
            'utm_source' => $request->utm_source,
            'utm_medium' => $request->utm_medium,
            'utm_campaign' => $request->utm_campaign,
        ]);

        // In a real application, this would trigger notifications

        return response()->json([
            'success' => true,
            'message' => 'Lead created successfully',
            'lead_id' => $lead->id
        ]);
    }

    /**
     * Handle Brevo webhook events.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function handleBrevoWebhook(Request $request)
    {
        // This would be implemented in Phase 3
        
        return response()->json([
            'success' => true,
            'message' => 'Webhook received'
        ]);
    }
}
