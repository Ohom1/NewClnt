@extends('admin.layouts.app')

@section('title', 'Leads Report')

@section('content')
<div class="container mx-auto px-4 py-4 md:py-8">
    <div class="mb-6 md:mb-8">
        <h1 class="text-2xl md:text-3xl font-bold text-primary-blue">LEADS REPORT</h1>
        <p class="text-gray-500 text-sm md:text-base">View and export detailed lead reports</p>
    </div>
    
    <!-- Filters -->
    <div class="bg-white rounded-xl shadow-md p-4 md:p-6 mb-6 md:mb-8">
        <form action="{{ route('admin.reports.leads') }}" method="GET" class="space-y-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
                <!-- Status Filter -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select name="status" id="status" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50">
                        <option value="">All Statuses</option>
                        @foreach($statuses as $status)
                            <option value="{{ $status }}" {{ request('status') == $status ? 'selected' : '' }}>
                                {{ ucfirst($status) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Source Filter -->
                <div>
                    <label for="source" class="block text-sm font-medium text-gray-700 mb-1">Source</label>
                    <select name="source" id="source" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50">
                        <option value="">All Sources</option>
                        @foreach($sources as $source)
                            <option value="{{ $source }}" {{ request('source') == $source ? 'selected' : '' }}>
                                {{ ucfirst($source) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Assigned To Filter -->
                <div>
                    <label for="assigned_to" class="block text-sm font-medium text-gray-700 mb-1">Assigned To</label>
                    <select name="assigned_to" id="assigned_to" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50">
                        <option value="">All Users</option>
                        <option value="unassigned" {{ request('assigned_to') == 'unassigned' ? 'selected' : '' }}>Unassigned</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ request('assigned_to') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Date Range -->
                <div>
                    <label for="date_from" class="block text-sm font-medium text-gray-700 mb-1">From Date</label>
                    <input type="date" name="date_from" id="date_from" value="{{ request('date_from') }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50">
                </div>
                
                <div>
                    <label for="date_to" class="block text-sm font-medium text-gray-700 mb-1">To Date</label>
                    <input type="date" name="date_to" id="date_to" value="{{ request('date_to') }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50">
                </div>
            </div>
            
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 sm:gap-0">
                <div>
                    @if(request()->anyFilled(['status', 'source', 'assigned_to', 'date_from', 'date_to']))
                        <a href="{{ route('admin.reports.leads') }}" class="text-primary-blue hover:text-secondary-green inline-flex items-center text-sm">
                            <i data-lucide="x" class="w-4 h-4 mr-1"></i> Clear filters
                        </a>
                    @endif
                </div>
                <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                    <button type="submit" class="btn-primary bg-primary-blue w-full sm:w-auto justify-center">
                        <i data-lucide="filter" class="w-4 h-4 mr-2"></i>
                        Apply Filters
                    </button>
                    
                    <a href="{{ route('admin.reports.export', request()->all()) }}" class="btn-secondary w-full sm:w-auto justify-center">
                        <i data-lucide="download" class="w-4 h-4 mr-2"></i>
                        Export CSV
                    </a>
                </div>
            </div>
        </form>
    </div>
    
    <!-- Summary Stats -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 md:gap-4 mb-6 md:mb-8">
        <!-- Total Leads -->
        <div class="bg-white rounded-xl shadow-md border border-gray-100 p-4 md:p-6 hover:shadow-lg transition-shadow">
            <div class="flex flex-col md:flex-row md:items-center">
                <div class="p-2 md:p-3 rounded-full bg-blue-100 text-primary-blue mb-3 md:mb-0 md:mr-4 w-12 h-12 flex items-center justify-center">
                    <i data-lucide="users" class="h-6 w-6"></i>
                </div>
                <div>
                    <p class="text-xs md:text-sm text-gray-500 font-medium mb-1">Total Leads</p>
                    <p class="text-xl md:text-2xl font-bold text-primary-blue">{{ $leads->total() }}</p>
                </div>
            </div>
        </div>
        
        <!-- Won Leads -->
        <div class="bg-white rounded-xl shadow-md border border-gray-100 p-4 md:p-6 hover:shadow-lg transition-shadow">
            <div class="flex flex-col md:flex-row md:items-center">
                <div class="p-2 md:p-3 rounded-full bg-green-100 text-secondary-green mb-3 md:mb-0 md:mr-4 w-12 h-12 flex items-center justify-center">
                    <i data-lucide="check-circle" class="h-6 w-6"></i>
                </div>
                <div>
                    <p class="text-xs md:text-sm text-gray-500 font-medium mb-1">Won Leads</p>
                    <p class="text-xl md:text-2xl font-bold text-primary-blue">{{ $leads->where('status', 'won')->count() }}</p>
                </div>
            </div>
        </div>
        
        <!-- Ongoing Leads -->
        <div class="bg-white rounded-xl shadow-md border border-gray-100 p-4 md:p-6 hover:shadow-lg transition-shadow">
            <div class="flex flex-col md:flex-row md:items-center">
                <div class="p-2 md:p-3 rounded-full bg-yellow-100 text-yellow-600 mb-3 md:mb-0 md:mr-4 w-12 h-12 flex items-center justify-center">
                    <i data-lucide="clock" class="h-6 w-6"></i>
                </div>
                <div>
                    <p class="text-xs md:text-sm text-gray-500 font-medium mb-1">In Progress</p>
                    <p class="text-xl md:text-2xl font-bold text-primary-blue">{{ $leads->whereIn('status', ['new', 'contacted', 'quoted', 'negotiating'])->count() }}</p>
                </div>
            </div>
        </div>
        
        <!-- Lost/Cancelled Leads -->
        <div class="bg-white rounded-xl shadow-md border border-gray-100 p-4 md:p-6 hover:shadow-lg transition-shadow">
            <div class="flex flex-col md:flex-row md:items-center">
                <div class="p-2 md:p-3 rounded-full bg-red-100 text-red-600 mb-3 md:mb-0 md:mr-4 w-12 h-12 flex items-center justify-center">
                    <i data-lucide="x-circle" class="h-6 w-6"></i>
                </div>
                <div>
                    <p class="text-xs md:text-sm text-gray-500 font-medium mb-1">Lost/Cancelled</p>
                    <p class="text-xl md:text-2xl font-bold text-primary-blue">{{ $leads->whereIn('status', ['lost', 'cancelled'])->count() }}</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Sort Controls - Mobile only -->
    <div class="md:hidden bg-white rounded-t-xl shadow-md p-4 mb-1">
        <div class="flex justify-between items-center">
            <span class="text-sm font-medium">Sort by:</span>
            <select id="mobileSortSelect" class="text-sm border-gray-300 rounded-md focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50">
                <option value="created_at-desc">Latest</option>
                <option value="created_at-asc">Oldest</option>
                <option value="name-asc">Name (A-Z)</option>
                <option value="status-asc">By Status</option>
                <option value="source-asc">By Source</option>
            </select>
        </div>
    </div>

    <!-- Mobile Card View -->
    <div class="md:hidden space-y-3">
        @forelse($leads as $lead)
            <div class="bg-white rounded-xl shadow-md p-4 border-l-4 {{ 
                $lead->status == 'new' ? 'border-blue-400' : 
                ($lead->status == 'contacted' ? 'border-purple-400' : 
                ($lead->status == 'quoted' ? 'border-amber-400' : 
                ($lead->status == 'negotiating' ? 'border-cyan-400' : 
                ($lead->status == 'won' ? 'border-green-400' : 
                ($lead->status == 'lost' ? 'border-red-400' : 'border-gray-400'))))) 
            }}">
                <div class="flex justify-between items-start mb-3">
                    <div>
                        <h3 class="font-medium text-gray-900">{{ $lead->name }}</h3>
                        <p class="text-xs text-gray-500">{{ $lead->company ?? 'Individual' }}</p>
                    </div>
                    <div>
                        {!! $lead->status_badge !!}
                    </div>
                </div>
                
                <div class="space-y-2 text-sm">
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <p class="text-xs text-gray-500">Contact:</p>
                            <p class="truncate">{{ $lead->email }}</p>
                            <p>{{ $lead->phone }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Route:</p>
                            <p>{{ $lead->origin }} to {{ $lead->destination }}</p>
                            <p class="text-xs">{{ ucfirst($lead->cargo_type) }}</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-2 mt-2">
                        <div>
                            <p class="text-xs text-gray-500">Source:</p>
                            <p>{{ ucfirst($lead->source) }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Created:</p>
                            <p>{{ $lead->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                    
                    <div class="mt-2">
                        <p class="text-xs text-gray-500">Assigned to:</p>
                        @if($lead->assignedUser)
                            <p>{{ $lead->assignedUser->name }}</p>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                Unassigned
                            </span>
                        @endif
                    </div>
                </div>
                
                <div class="border-t border-gray-100 mt-3 pt-3 flex justify-end">
                    <a href="{{ route('admin.leads.show', $lead) }}" class="text-primary-blue flex items-center text-sm">
                        <i data-lucide="eye" class="w-4 h-4 mr-1"></i> View Details
                    </a>
                </div>
            </div>
        @empty
            <div class="bg-white rounded-xl shadow-md p-6 text-center">
                <i data-lucide="inbox" class="w-12 h-12 mx-auto text-gray-400 mb-3"></i>
                <p class="text-gray-500">No leads found matching your search criteria.</p>
            </div>
        @endforelse
    </div>

    <!-- Desktop Table View -->
    <div class="hidden md:block bg-white rounded-xl shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lead</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Route</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Source</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Assigned To</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($leads as $lead)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">{{ $lead->name }}</div>
                            <div class="text-sm text-gray-500">{{ $lead->company ?? 'Individual' }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">{{ $lead->email }}</div>
                            <div class="text-sm text-gray-500">{{ $lead->phone }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">{{ $lead->origin }} to {{ $lead->destination }}</div>
                            <div class="text-sm text-gray-500">{{ ucfirst($lead->cargo_type) }}</div>
                        </td>
                        <td class="px-6 py-4">
                            {!! $lead->status_badge !!}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{ ucfirst($lead->source) }}
                        </td>
                        <td class="px-6 py-4">
                            @if($lead->assignedUser)
                                <div class="text-sm text-gray-900">{{ $lead->assignedUser->name }}</div>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                    Unassigned
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{ $lead->created_at->format('M d, Y') }}
                        </td>
                        <td class="px-6 py-4 text-right text-sm font-medium">
                            <a href="{{ route('admin.leads.show', $lead) }}" class="text-primary-blue hover:text-secondary-green">
                                <i data-lucide="eye" class="w-5 h-5"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-6 py-8 text-center">
                            <i data-lucide="inbox" class="w-12 h-12 mx-auto text-gray-400 mb-3"></i>
                            <p class="text-gray-500">No leads found matching your search criteria.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $leads->withQueryString()->links() }}
        </div>
    </div>
    
    <!-- Mobile Pagination -->
    <div class="md:hidden mt-4">
        {{ $leads->withQueryString()->links() }}
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Handle mobile sort dropdown
    document.addEventListener('DOMContentLoaded', function() {
        const mobileSortSelect = document.getElementById('mobileSortSelect');
        if (mobileSortSelect) {
            mobileSortSelect.addEventListener('change', function() {
                const value = this.value;
                const [sort, direction] = value.split('-');
                
                // Get current URL and parameters
                const url = new URL(window.location.href);
                
                // Set or update sort and direction parameters
                url.searchParams.set('sort', sort);
                url.searchParams.set('direction', direction);
                
                // Navigate to the new URL
                window.location.href = url.toString();
            });
            
            // Set current selection based on URL parameters
            const urlParams = new URLSearchParams(window.location.search);
            const sort = urlParams.get('sort');
            const direction = urlParams.get('direction');
            
            if (sort && direction) {
                const value = `${sort}-${direction}`;
                const option = mobileSortSelect.querySelector(`option[value="${value}"]`);
                if (option) {
                    option.selected = true;
                }
            }
        }
    });
</script>
@endpush
