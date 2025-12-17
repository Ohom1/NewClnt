@extends('admin.layouts.app')

@section('title', 'Lead Details')

@section('content')
<div class="py-4 md:py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Back button and page title -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
            <div>
                <a href="{{ route('admin.leads.index') }}" class="inline-flex items-center text-sm text-primary-blue hover:text-secondary-green mb-2">
                    <i data-lucide="chevron-left" class="h-4 w-4 mr-1"></i> Back to Leads
                </a>
                <h1 class="text-xl md:text-2xl font-bold text-primary-blue">{{ $lead->name }}</h1>
                <p class="text-sm text-gray-500">{{ $lead->company ? $lead->company : 'Individual' }}</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                <a href="{{ route('admin.leads.edit', $lead) }}" class="btn-secondary w-full sm:w-auto justify-center">
                    <i data-lucide="pencil" class="w-4 h-4 mr-2"></i>
                    Edit Lead
                </a>
                <button onclick="confirmDelete()" class="btn-danger w-full sm:w-auto justify-center">
                    <i data-lucide="trash-2" class="w-4 h-4 mr-2"></i>
                    Delete Lead
                </button>
                <form id="delete-form" action="{{ route('admin.leads.destroy', $lead) }}" method="POST" class="hidden">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
        
        <div class="bg-white overflow-hidden shadow-md rounded-xl">
            <!-- Lead Status Bar -->
            <div class="bg-gray-50 p-4 border-b border-gray-200 flex flex-col md:flex-row gap-4 md:items-center md:justify-between">
                <div class="flex items-center">
                    <span class="text-sm font-medium text-gray-500 mr-2">Status:</span>
                    <span class="ml-2">{!! $lead->status_badge !!}</span>
                </div>
                
                <div class="flex flex-col sm:flex-row gap-3">
                    <form action="{{ route('admin.leads.status', $lead) }}" method="POST" class="flex flex-col sm:flex-row sm:items-center gap-2">
                        @csrf
                        <select name="status" class="form-select text-sm rounded-md border-gray-300 focus:border-primary-blue focus:ring focus:ring-primary-blue/20">
                            <option value="new" {{ $lead->status == 'new' ? 'selected' : '' }}>New</option>
                            <option value="contacted" {{ $lead->status == 'contacted' ? 'selected' : '' }}>Contacted</option>
                            <option value="quoted" {{ $lead->status == 'quoted' ? 'selected' : '' }}>Quoted</option>
                            <option value="negotiating" {{ $lead->status == 'negotiating' ? 'selected' : '' }}>Negotiating</option>
                            <option value="won" {{ $lead->status == 'won' ? 'selected' : '' }}>Won</option>
                            <option value="lost" {{ $lead->status == 'lost' ? 'selected' : '' }}>Lost</option>
                            <option value="cancelled" {{ $lead->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                        <button type="submit" class="btn-primary text-sm justify-center py-2">Update Status</button>
                    </form>
                    
                    <form action="{{ route('admin.leads.assign', $lead) }}" method="POST" class="flex flex-col sm:flex-row sm:items-center gap-2">
                        @csrf
                        <select name="user_id" class="form-select text-sm rounded-md border-gray-300 focus:border-secondary-green focus:ring focus:ring-secondary-green/20">
                            <option value="">Unassigned</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $lead->assigned_to == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn-secondary text-sm justify-center py-2">Assign</button>
                    </form>
                </div>
            </div>
            
            <!-- Lead Information -->
            <div class="p-4 md:p-6 border-b border-gray-200">
                <h2 class="text-lg font-medium text-primary-blue mb-4 flex items-center">
                    <i data-lucide="info" class="h-5 w-5 mr-2 text-primary-blue/70"></i> Lead Information
                </h2>
                
                <!-- Grid of lead details -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-4">
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Name</h3>
                        <p>{{ $lead->name }}</p>
                    </div>
                    
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Email</h3>
                        <p>{{ $lead->email }}</p>
                    </div>
                    
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Phone</h3>
                        <p>{{ $lead->phone }}</p>
                    </div>
                    
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Company</h3>
                        <p>{{ $lead->company ?: 'N/A' }}</p>
                    </div>
                    
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Origin</h3>
                        <p>{{ $lead->origin }}</p>
                    </div>
                    
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Destination</h3>
                        <p>{{ $lead->destination }}</p>
                    </div>
                    
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Cargo Type</h3>
                        <p>{{ ucfirst($lead->cargo_type) }}</p>
                    </div>
                    
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Shipping Mode</h3>
                        <p>{{ $lead->shipping_mode ? ucfirst(str_replace('_', ' ', $lead->shipping_mode)) : 'N/A' }}</p>
                    </div>
                    
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Container Size</h3>
                        <p>{{ $lead->container_size ?: 'N/A' }}</p>
                    </div>
                    
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Weight</h3>
                        <p>{{ $lead->weight ?: 'N/A' }}</p>
                    </div>
                    
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Dimensions</h3>
                        <p>{{ $lead->dimensions ?: 'N/A' }}</p>
                    </div>
                    
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Shipping Date</h3>
                        <p>{{ $lead->shipping_date ? $lead->shipping_date->format('M d, Y') : 'N/A' }}</p>
                    </div>
                    
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Source</h3>
                        <p>{{ ucfirst(str_replace('_', ' ', $lead->source)) }}</p>
                    </div>
                    
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Created</h3>
                        <p>{{ $lead->created_at->format('M d, Y H:i') }}</p>
                    </div>
                    
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Assigned To</h3>
                        <p>{{ $lead->assignedUser ? $lead->assignedUser->name : 'Unassigned' }}</p>
                    </div>
                    
                    @if($lead->quoted_amount)
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Quoted Amount</h3>
                        <p>{{ $lead->currency }} {{ number_format($lead->quoted_amount, 2) }}</p>
                    </div>
                    @endif
                </div>
                
                @if($lead->message)
                <div class="mt-6 border-t pt-4">
                    <h3 class="text-sm font-medium text-gray-500 mb-2">Additional Message</h3>
                    <p class="text-gray-700">{{ $lead->message }}</p>
                </div>
                @endif
            </div>
            
            <!-- Lead Activity Timeline -->
            <div class="p-4 md:p-6 border-b border-gray-200">
                <h2 class="text-lg font-medium text-primary-blue mb-4 flex items-center">
                    <i data-lucide="history" class="h-5 w-5 mr-2 text-primary-blue/70"></i> Activity Timeline
                </h2>
                
                @if($lead->activities->count() > 0)
                    <div class="flow-root">
                        <ul role="list" class="-mb-8">
                            @foreach($lead->activities as $activity)
                                <li>
                                    <div class="relative pb-8">
                                        @if(!$loop->last)
                                            <span class="absolute top-5 left-5 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                        @endif
                                        <div class="relative flex items-start space-x-3">
                                            <!-- Activity icon -->
                                            <div class="relative">
                                                @if($activity->type === 'note')
                                                    <span class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center ring-4 ring-white shadow-sm">
                                                        <i data-lucide="message-square" class="h-5 w-5 text-primary-blue"></i>
                                                    </span>
                                                @elseif($activity->type === 'email')
                                                    <span class="h-10 w-10 rounded-full bg-green-100 flex items-center justify-center ring-4 ring-white shadow-sm">
                                                        <i data-lucide="mail" class="h-5 w-5 text-secondary-green"></i>
                                                    </span>
                                                @elseif($activity->type === 'whatsapp')
                                                    <span class="h-10 w-10 rounded-full bg-green-100 flex items-center justify-center ring-4 ring-white shadow-sm">
                                                        <i data-lucide="message-circle" class="h-5 w-5 text-secondary-green"></i>
                                                    </span>
                                                @elseif($activity->type === 'status_change')
                                                    <span class="h-10 w-10 rounded-full bg-amber-100 flex items-center justify-center ring-4 ring-white shadow-sm">
                                                        <i data-lucide="refresh-cw" class="h-5 w-5 text-amber-600"></i>
                                                    </span>
                                                @elseif($activity->type === 'assignment')
                                                    <span class="h-10 w-10 rounded-full bg-purple-100 flex items-center justify-center ring-4 ring-white shadow-sm">
                                                        <i data-lucide="user-plus" class="h-5 w-5 text-purple-600"></i>
                                                    </span>
                                                @elseif($activity->type === 'file')
                                                    <span class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center ring-4 ring-white shadow-sm">
                                                        <i data-lucide="paperclip" class="h-5 w-5 text-indigo-600"></i>
                                                    </span>
                                                @endif
                                            </div>
                                            
                                            <!-- Activity content -->
                                            <div class="flex-1 min-w-0 bg-gray-50 p-3 rounded-lg border border-gray-100">
                                                <div class="flex justify-between items-center mb-1">
                                                    <div class="text-sm">
                                                        <span class="font-medium text-gray-900">{{ $activity->user->name }}</span>
                                                    </div>
                                                    <span class="text-xs text-gray-400">
                                                        {{ $activity->created_at->diffForHumans() }}
                                                    </span>
                                                </div>
                                                <p class="text-sm text-gray-600">
                                                    @if($activity->type === 'note')
                                                        Added a note: <span class="text-gray-900 font-medium">{{ $activity->content }}</span>
                                                    @elseif($activity->type === 'email')
                                                        Sent an email: <span class="text-gray-900 font-medium">{{ $activity->email_subject }}</span>
                                                    @elseif($activity->type === 'whatsapp')
                                                        Sent a WhatsApp message
                                                    @elseif($activity->type === 'status_change')
                                                        Changed status from <span class="text-gray-900 font-medium">{{ ucfirst($activity->old_status) }}</span> to <span class="text-gray-900 font-medium">{{ ucfirst($activity->new_status) }}</span>
                                                    @elseif($activity->type === 'assignment')
                                                        @php
                                                            $data = json_decode($activity->content, true);
                                                            $oldUser = $users->firstWhere('id', $data['old_user_id'] ?? 0);
                                                            $newUser = $users->firstWhere('id', $data['new_user_id'] ?? 0);
                                                        @endphp
                                                        Assigned lead from <span class="text-gray-900 font-medium">{{ $oldUser ? $oldUser->name : 'Unassigned' }}</span> to <span class="text-gray-900 font-medium">{{ $newUser ? $newUser->name : 'Unassigned' }}</span>
                                                    @elseif($activity->type === 'file')
                                                        Attached a file: <span class="text-gray-900 font-medium">{{ $activity->file_name }}</span>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    <div class="text-center p-8 bg-gray-50 rounded-lg border border-gray-100">
                        <i data-lucide="clock" class="h-12 w-12 mx-auto text-gray-400 mb-3"></i>
                        <p class="text-gray-500">No activity recorded yet</p>
                    </div>
                @endif
            </div>
            
            <!-- Actions Tabs -->
            <div class="p-4 md:p-6">
                <h2 class="text-lg font-medium text-primary-blue mb-4 flex items-center">
                    <i data-lucide="activity" class="h-5 w-5 mr-2 text-primary-blue/70"></i> Lead Actions
                </h2>
                
                <!-- Mobile Tab Selector -->
                <div class="md:hidden mb-4">
                    <label for="mobileActionTabs" class="block text-sm font-medium text-gray-700 mb-1">Select Action</label>
                    <select id="mobileActionTabs" class="form-select w-full rounded-md border-gray-300 focus:border-primary-blue">
                        <option value="note">Add Note</option>
                        <option value="email">Send Email</option>
                        <option value="whatsapp">Send WhatsApp</option>
                        <option value="quotation">Create Quotation</option>
                    </select>
                </div>
                
                <!-- Desktop Tabs -->
                <div class="hidden md:block border-b border-gray-200">
                    <nav class="-mb-px flex flex-wrap gap-2" aria-label="Tabs">
                        <a href="#" onclick="showTab('note')" id="note-tab" class="tab-link active border-primary-blue text-primary-blue py-3 px-4 border-b-2 font-medium text-sm flex items-center">
                            <i data-lucide="message-square" class="h-4 w-4 mr-2"></i> Add Note
                        </a>
                        <a href="#" onclick="showTab('email')" id="email-tab" class="tab-link border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 py-3 px-4 border-b-2 font-medium text-sm flex items-center">
                            <i data-lucide="mail" class="h-4 w-4 mr-2"></i> Send Email
                        </a>
                        <a href="#" onclick="showTab('whatsapp')" id="whatsapp-tab" class="tab-link border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 py-3 px-4 border-b-2 font-medium text-sm flex items-center">
                            <i data-lucide="message-circle" class="h-4 w-4 mr-2"></i> Send WhatsApp
                        </a>
                        <a href="#" onclick="showTab('quotation')" id="quotation-tab" class="tab-link border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 py-3 px-4 border-b-2 font-medium text-sm flex items-center">
                            <i data-lucide="file-text" class="h-4 w-4 mr-2"></i> Create Quotation
                        </a>
                    </nav>
                </div>
                
                <!-- Note Form -->
                <div id="note-tab-content" class="tab-content py-6">
                    <form action="{{ route('admin.leads.note', $lead) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="note_content" class="block text-sm font-medium text-gray-700 mb-1">Note</label>
                            <textarea name="content" id="note_content" rows="3" class="form-textarea w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green/20" placeholder="Write a note about this lead..."></textarea>
                        </div>
                        <div>
                            <button type="submit" class="btn-primary">
                                <i data-lucide="save" class="w-4 h-4 mr-2"></i> Save Note
                            </button>
                        </div>
                    </form>
                </div>
                
                <!-- Email Form -->
                <div id="email-tab-content" class="tab-content py-6 hidden">
                    <form action="{{ route('admin.leads.email', $lead) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="email_template" class="block text-sm font-medium text-gray-700 mb-1">Select Template</label>
                            <select id="email_template" class="form-select w-full rounded-md border-gray-300 shadow-sm focus:border-primary-blue focus:ring focus:ring-primary-blue/20">
                                <option value="">-- Select a template --</option>
                                @foreach($emailTemplates as $template)
                                    <option value="{{ $template->id }}">{{ $template->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-4">
                            <label for="email_subject" class="block text-sm font-medium text-gray-700 mb-1">Subject</label>
                            <input type="text" id="email_subject" name="subject" class="form-input w-full rounded-md border-gray-300 shadow-sm focus:border-primary-blue focus:ring focus:ring-primary-blue/20" placeholder="Email subject...">
                        </div>
                        
                        <div class="mb-4">
                            <label for="email_content" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                            <textarea id="email_content" name="content" rows="6" class="form-textarea w-full rounded-md border-gray-300 shadow-sm focus:border-primary-blue focus:ring focus:ring-primary-blue/20" placeholder="Email content..."></textarea>
                        </div>
                        
                        <div>
                            <button type="submit" class="btn-primary">
                                <i data-lucide="send" class="w-4 h-4 mr-2"></i> Send Email
                            </button>
                        </div>
                    </form>
                </div>
                
                <!-- WhatsApp Form -->
                <div id="whatsapp-tab-content" class="tab-content py-6 hidden">
                    <form action="{{ route('admin.leads.whatsapp', $lead) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="whatsapp_template" class="block text-sm font-medium text-gray-700 mb-1">Select Template</label>
                            <select id="whatsapp_template" class="form-select w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green/20">
                                <option value="">-- Select a template --</option>
                                @foreach($whatsappTemplates as $template)
                                    <option value="{{ $template->id }}">{{ $template->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-4">
                            <label for="whatsapp_content" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                            <textarea id="whatsapp_content" name="content" rows="4" class="form-textarea w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green/20" placeholder="WhatsApp message..."></textarea>
                        </div>
                        
                        <div>
                            <button type="submit" class="btn-primary">
                                <i data-lucide="message-circle" class="w-4 h-4 mr-2"></i> Send WhatsApp
                            </button>
                        </div>
                    </form>
                </div>
                
                <!-- Quotation Form -->
                <div id="quotation-tab-content" class="tab-content py-6 hidden">
                    <div class="bg-gray-50 rounded-lg border border-gray-200 p-4 mb-4">
                        <p class="text-gray-700">Create or update a quotation for this lead. You'll be taken to the edit page where you can add pricing details.</p>
                    </div>
                    <form action="{{ route('admin.leads.edit', $lead) }}" method="GET">
                        <button type="submit" class="btn-primary">
                            <i data-lucide="file-plus" class="w-4 h-4 mr-2"></i> Go to Edit Screen
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Tab functionality
        window.showTab = function(tabId) {
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(function(tab) {
                tab.classList.add('hidden');
            });
            
            // Show the selected tab content
            document.getElementById(tabId + '-tab-content').classList.remove('hidden');
            
            // Update tab links
            document.querySelectorAll('.tab-link').forEach(function(link) {
                link.classList.remove('active', 'border-primary-blue', 'text-primary-blue');
                link.classList.add('border-transparent', 'text-gray-500');
            });
            
            // Highlight the active tab
            if (document.getElementById(tabId + '-tab')) {
                document.getElementById(tabId + '-tab').classList.add('active', 'border-primary-blue', 'text-primary-blue');
                document.getElementById(tabId + '-tab').classList.remove('border-transparent', 'text-gray-500');
            }
            
            // Update mobile selector
            const mobileSelector = document.getElementById('mobileActionTabs');
            if (mobileSelector) {
                mobileSelector.value = tabId;
            }
        }
        
        // Initialize mobile tab selector
        const mobileSelector = document.getElementById('mobileActionTabs');
        if (mobileSelector) {
            mobileSelector.addEventListener('change', function() {
                showTab(this.value);
            });
        }
        
        // Email template selector
        const emailTemplateSelect = document.getElementById('email_template');
        const emailSubjectInput = document.getElementById('email_subject');
        const emailContentInput = document.getElementById('email_content');
        
        const emailTemplates = @json($emailTemplates);
        
        if (emailTemplateSelect) {
            emailTemplateSelect.addEventListener('change', function() {
                const templateId = this.value;
                if (!templateId) return;
                
                const template = emailTemplates.find(t => t.id == templateId);
                if (template) {
                    // Replace placeholders in template with lead data
                    let subject = template.subject;
                    let body = template.body;
                    
                    const leadData = {
                        name: @json($lead->name),
                        email: @json($lead->email),
                        phone: @json($lead->phone),
                        company: @json($lead->company),
                        origin: @json($lead->origin),
                        destination: @json($lead->destination)
                    };
                    
                    for (const [key, value] of Object.entries(leadData)) {
                        subject = subject.replace(new RegExp('{{' + key + '}}', 'g'), value || '');
                        body = body.replace(new RegExp('{{' + key + '}}', 'g'), value || '');
                    }
                    
                    emailSubjectInput.value = subject;
                    emailContentInput.value = body;
                }
            });
        }
        
        // WhatsApp template selector
        const whatsappTemplateSelect = document.getElementById('whatsapp_template');
        const whatsappContentInput = document.getElementById('whatsapp_content');
        
        const whatsappTemplates = @json($whatsappTemplates);
        
        if (whatsappTemplateSelect) {
            whatsappTemplateSelect.addEventListener('change', function() {
                const templateId = this.value;
                if (!templateId) return;
                
                const template = whatsappTemplates.find(t => t.id == templateId);
                if (template) {
                    // Replace placeholders in template with lead data
                    let content = template.content;
                    
                    const leadData = {
                        name: @json($lead->name),
                        phone: @json($lead->phone),
                        origin: @json($lead->origin),
                        destination: @json($lead->destination)
                    };
                    
                    for (const [key, value] of Object.entries(leadData)) {
                        content = content.replace(new RegExp('{{' + key + '}}', 'g'), value || '');
                    }
                    
                    whatsappContentInput.value = content;
                }
            });
        }
    });
    
    function confirmDelete() {
        if (confirm('Are you sure you want to delete this lead? This action cannot be undone.')) {
            document.getElementById('delete-form').submit();
        }
    }
</script>
@endpush
