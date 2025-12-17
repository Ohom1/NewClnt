@extends('admin.layouts.app')

@section('title', 'Leads Management')

@section('content')
<div class="container mx-auto px-4 py-4 md:py-8">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <h1 class="text-2xl md:text-3xl font-bold text-primary-blue">Leads</h1>
        <a href="{{ route('admin.leads.create') }}" class="btn-primary bg-secondary-green w-full sm:w-auto text-center">
            <i data-lucide="plus" class="w-4 h-4 mr-2"></i>
            Add New Lead
        </a>
    </div>
    
    <!-- Filters -->
    <div class="bg-white rounded-xl shadow-md p-4 md:p-6 mb-6">
        <form action="{{ route('admin.leads.index') }}" method="GET" class="space-y-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div>
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                    <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Name, Email, Phone..." class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50">
                </div>
                
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select name="status" id="status" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50">
                        <option value="">All Statuses</option>
                        <option value="new" {{ request('status') == 'new' ? 'selected' : '' }}>New</option>
                        <option value="contacted" {{ request('status') == 'contacted' ? 'selected' : '' }}>Contacted</option>
                        <option value="quoted" {{ request('status') == 'quoted' ? 'selected' : '' }}>Quoted</option>
                        <option value="negotiating" {{ request('status') == 'negotiating' ? 'selected' : '' }}>Negotiating</option>
                        <option value="won" {{ request('status') == 'won' ? 'selected' : '' }}>Won</option>
                        <option value="lost" {{ request('status') == 'lost' ? 'selected' : '' }}>Lost</option>
                        <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
                
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
                
                <div class="flex items-end gap-2">
                    <button type="submit" class="btn-primary bg-primary-blue flex-1 sm:flex-none justify-center">
                        <i data-lucide="search" class="w-4 h-4 mr-2"></i>
                        Filter
                    </button>
                    
                    @if(request()->anyFilled(['search', 'status', 'assigned_to']))
                        <a href="{{ route('admin.leads.index') }}" class="btn-secondary flex-1 sm:flex-none justify-center">
                            Clear
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>

    <!-- Sort Controls - Mobile only -->
    <div class="md:hidden bg-white rounded-t-xl shadow-md p-4 mb-1">
        <div class="flex justify-between items-center">
            <span class="text-sm font-medium">Sort by:</span>
            <select id="mobileSortSelect" class="text-sm border-gray-300 rounded-md focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50">
                <option value="created_at-desc" {{ (request('sort') == 'created_at' && request('direction') == 'desc') || (!request('sort') && !request('direction')) ? 'selected' : '' }}>Latest</option>
                <option value="created_at-asc" {{ request('sort') == 'created_at' && request('direction') == 'asc' ? 'selected' : '' }}>Oldest</option>
                <option value="name-asc" {{ request('sort') == 'name' && request('direction') == 'asc' ? 'selected' : '' }}>Name (A-Z)</option>
                <option value="name-desc" {{ request('sort') == 'name' && request('direction') == 'desc' ? 'selected' : '' }}>Name (Z-A)</option>
                <option value="status-asc" {{ request('sort') == 'status' && request('direction') == 'asc' ? 'selected' : '' }}>Status (A-Z)</option>
                <option value="assigned_to-asc" {{ request('sort') == 'assigned_to' && request('direction') == 'asc' ? 'selected' : '' }}>Assigned</option>
            </select>
        </div>
    </div>

    <!-- Mobile Card View -->
    <div class="md:hidden space-y-3">
        @forelse ($leads as $lead)
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
                            <p>{{ $lead->email }}</p>
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
                            <p class="text-xs text-gray-500">Assigned to:</p>
                            @if ($lead->assignedUser)
                                <p>{{ $lead->assignedUser->name }}</p>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                    Unassigned
                                </span>
                            @endif
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Created:</p>
                            <p>{{ $lead->created_at->format('M d, Y') }}</p>
                            <p class="text-xs">{{ $lead->created_at->format('h:i A') }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="border-t border-gray-100 mt-3 pt-3 flex justify-between">
                    <a href="{{ route('admin.leads.show', $lead) }}" class="text-primary-blue flex items-center text-sm">
                        <i data-lucide="eye" class="w-4 h-4 mr-1"></i> View
                    </a>
                    <a href="{{ route('admin.leads.edit', $lead) }}" class="text-secondary-green flex items-center text-sm">
                        <i data-lucide="pencil" class="w-4 h-4 mr-1"></i> Edit
                    </a>
                    <button type="button" class="text-red-500 flex items-center text-sm" onclick="confirmDelete({{ $lead->id }})">
                        <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete
                    </button>
                    <form id="delete-form-{{ $lead->id }}" action="{{ route('admin.leads.destroy', $lead) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        @empty
            <div class="bg-white rounded-xl shadow-md p-6 text-center">
                <i data-lucide="inbox" class="w-12 h-12 mx-auto text-gray-400 mb-3"></i>
                <p class="text-gray-500">No leads found.</p>
            </div>
        @endforelse
    </div>

    <!-- Desktop Table View -->
    <div class="hidden md:block bg-white rounded-xl shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <div class="flex items-center">
                                <span>Name</span>
                                <a href="{{ request()->fullUrlWithQuery(['sort' => 'name', 'direction' => request('direction') == 'asc' && request('sort') == 'name' ? 'desc' : 'asc']) }}" class="ml-2">
                                    <i data-lucide="{{ request('sort') == 'name' ? (request('direction') == 'asc' ? 'arrow-up' : 'arrow-down') : 'arrows-up-down' }}" class="w-4 h-4"></i>
                                </a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Contact Info
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <div class="flex items-center">
                                <span>Route</span>
                                <a href="{{ request()->fullUrlWithQuery(['sort' => 'origin', 'direction' => request('direction') == 'asc' && request('sort') == 'origin' ? 'desc' : 'asc']) }}" class="ml-2">
                                    <i data-lucide="{{ request('sort') == 'origin' ? (request('direction') == 'asc' ? 'arrow-up' : 'arrow-down') : 'arrows-up-down' }}" class="w-4 h-4"></i>
                                </a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <div class="flex items-center">
                                <span>Status</span>
                                <a href="{{ request()->fullUrlWithQuery(['sort' => 'status', 'direction' => request('direction') == 'asc' && request('sort') == 'status' ? 'desc' : 'asc']) }}" class="ml-2">
                                    <i data-lucide="{{ request('sort') == 'status' ? (request('direction') == 'asc' ? 'arrow-up' : 'arrow-down') : 'arrows-up-down' }}" class="w-4 h-4"></i>
                                </a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <div class="flex items-center">
                                <span>Assigned To</span>
                                <a href="{{ request()->fullUrlWithQuery(['sort' => 'assigned_to', 'direction' => request('direction') == 'asc' && request('sort') == 'assigned_to' ? 'desc' : 'asc']) }}" class="ml-2">
                                    <i data-lucide="{{ request('sort') == 'assigned_to' ? (request('direction') == 'asc' ? 'arrow-up' : 'arrow-down') : 'arrows-up-down' }}" class="w-4 h-4"></i>
                                </a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <div class="flex items-center">
                                <span>Created</span>
                                <a href="{{ request()->fullUrlWithQuery(['sort' => 'created_at', 'direction' => request('direction') == 'asc' && request('sort') == 'created_at' ? 'desc' : 'asc']) }}" class="ml-2">
                                    <i data-lucide="{{ request('sort') == 'created_at' || !request('sort') ? (request('direction') == 'asc' ? 'arrow-up' : 'arrow-down') : 'arrows-up-down' }}" class="w-4 h-4"></i>
                                </a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($leads as $lead)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">{{ $lead->name }}</div>
                                        <div class="text-sm text-gray-500">{{ $lead->company ?? 'Individual' }}</div>
                                    </div>
                                </div>
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
                            <td class="px-6 py-4">
                                @if ($lead->assignedUser)
                                    <div class="text-sm text-gray-900">{{ $lead->assignedUser->name }}</div>
                                    <div class="text-sm text-gray-500">{{ $lead->assignedUser->email }}</div>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                        Unassigned
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $lead->created_at->format('M d, Y') }}
                                <div class="text-xs">{{ $lead->created_at->format('h:i A') }}</div>
                            </td>
                            <td class="px-6 py-4 text-right text-sm font-medium">
                                <div class="flex space-x-2 justify-end">
                                    <a href="{{ route('admin.leads.show', $lead) }}" class="text-primary-blue hover:text-primary-blue-dark">
                                        <i data-lucide="eye" class="w-5 h-5"></i>
                                    </a>
                                    <a href="{{ route('admin.leads.edit', $lead) }}" class="text-secondary-green hover:text-secondary-green-dark">
                                        <i data-lucide="pencil" class="w-5 h-5"></i>
                                    </a>
                                    <button type="button" class="text-red-500 hover:text-red-700" onclick="confirmDelete({{ $lead->id }})">
                                        <i data-lucide="trash-2" class="w-5 h-5"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                                <i data-lucide="inbox" class="w-12 h-12 mx-auto text-gray-400 mb-3"></i>
                                <p>No leads found.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $leads->links() }}
        </div>
    </div>
    
    <!-- Mobile Pagination -->
    <div class="md:hidden mt-4">
        {{ $leads->links() }}
    </div>
</div>
@endsection

@push('scripts')
<script>
    function confirmDelete(leadId) {
        if (confirm('Are you sure you want to delete this lead? This action cannot be undone.')) {
            document.getElementById('delete-form-' + leadId).submit();
        }
    }
    
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
        }
    });
</script>
@endpush
