@extends('admin.layouts.app')

@section('title', 'User Profile')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <div class="flex items-center justify-between mb-2">
            <a href="{{ route('admin.users.index') }}" class="flex items-center text-primary-blue hover:text-secondary-green">
                <i data-lucide="arrow-left" class="w-5 h-5 mr-2"></i>
                Back to Users
            </a>
            <div class="flex space-x-2">
                <a href="{{ route('admin.users.edit', $user) }}" class="btn-secondary">
                    <i data-lucide="pencil" class="w-4 h-4 mr-2"></i>
                    Edit
                </a>
                @if(auth()->id() !== $user->id)
                <button type="button" class="btn-primary bg-red-500 hover:bg-red-600" onclick="confirmDelete()">
                    <i data-lucide="trash-2" class="w-4 h-4 mr-2"></i>
                    Delete
                </button>
                <form id="delete-form" action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
                @endif
            </div>
        </div>
        <h1 class="text-3xl font-bold text-primary-blue">User Profile: {{ $user->name }}</h1>
    </div>
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Left Column - User Info -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-card shadow-sm p-6 mb-6">
                <div class="flex flex-col items-center text-center mb-6">
                    <img class="h-32 w-32 rounded-full object-cover mb-4" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                    <h2 class="text-xl font-bold text-primary-blue">{{ $user->name }}</h2>
                    <p class="text-gray-500">{{ $user->title ?? 'No title specified' }}</p>
                    <div class="mt-2">
                        <span class="px-3 py-1 text-xs rounded-full 
                            {{ $user->role == 'admin' ? 'bg-purple-100 text-purple-800' : '' }}
                            {{ $user->role == 'sales' ? 'bg-green-100 text-green-800' : '' }}
                            {{ $user->role == 'support' ? 'bg-blue-100 text-blue-800' : '' }}">
                            {{ ucfirst($user->role) }}
                        </span>
                    </div>
                </div>
                
                <div class="border-t border-gray-200 pt-4">
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <i data-lucide="mail" class="w-5 h-5 text-gray-400 mr-3"></i>
                            <span>{{ $user->email }}</span>
                        </div>
                        
                        @if($user->phone)
                        <div class="flex items-center">
                            <i data-lucide="phone" class="w-5 h-5 text-gray-400 mr-3"></i>
                            <span>{{ $user->phone }}</span>
                        </div>
                        @endif
                        
                        <div class="flex items-center">
                            <i data-lucide="calendar" class="w-5 h-5 text-gray-400 mr-3"></i>
                            <span>Joined {{ $user->created_at->format('M d, Y') }}</span>
                        </div>
                        
                        @if($user->last_active_at)
                        <div class="flex items-center">
                            <i data-lucide="clock" class="w-5 h-5 text-gray-400 mr-3"></i>
                            <span>Last active {{ $user->last_active_at->diffForHumans() }}</span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Activity Stats -->
            <div class="bg-white rounded-card shadow-sm p-6">
                <h3 class="text-lg font-bold text-primary-blue mb-4">Activity Overview</h3>
                
                <div class="space-y-4">
                    <div class="flex justify-between">
                        <span class="text-gray-500">Leads Assigned</span>
                        <span class="font-semibold">{{ $user->assignedLeads->count() }}</span>
                    </div>
                    
                    <div class="flex justify-between">
                        <span class="text-gray-500">Won Leads</span>
                        <span class="font-semibold">{{ $user->assignedLeads->where('status', 'won')->count() }}</span>
                    </div>
                    
                    <div class="flex justify-between">
                        <span class="text-gray-500">Lost Leads</span>
                        <span class="font-semibold">{{ $user->assignedLeads->where('status', 'lost')->count() }}</span>
                    </div>
                    
                    <div class="flex justify-between border-t border-gray-200 pt-4">
                        <span class="text-gray-500">Win Rate</span>
                        @php
                            $totalLeads = $user->assignedLeads->count();
                            $wonLeads = $user->assignedLeads->where('status', 'won')->count();
                            $winRate = $totalLeads > 0 ? round(($wonLeads / $totalLeads) * 100, 1) : 0;
                        @endphp
                        <span class="font-semibold">{{ $winRate }}%</span>
                    </div>
                    
                    <div class="flex justify-between">
                        <span class="text-gray-500">Activities Recorded</span>
                        <span class="font-semibold">{{ $user->activities->count() }}</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Right Column - Assigned Leads -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-card shadow-sm p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold text-primary-blue">Assigned Leads</h3>
                    <span class="text-sm text-gray-500">Total: {{ $user->assignedLeads->count() }}</span>
                </div>
                
                @if($user->assignedLeads->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lead</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Route</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($user->assignedLeads as $lead)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $lead->name }}</div>
                                    <div class="text-sm text-gray-500">{{ $lead->email }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $lead->origin }} to {{ $lead->destination }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {!! $lead->status_badge !!}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $lead->created_at->format('M d, Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('admin.leads.show', $lead) }}" class="text-secondary-green hover:text-primary-blue">View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="text-center py-12 text-gray-500">
                    <div class="mb-3">
                        <i data-lucide="inbox" class="w-12 h-12 mx-auto text-gray-300"></i>
                    </div>
                    <p>No leads are currently assigned to this user.</p>
                </div>
                @endif
            </div>
            
            <!-- Recent Activity -->
            <div class="bg-white rounded-card shadow-sm p-6 mt-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold text-primary-blue">Recent Activities</h3>
                </div>
                
                @if($user->activities->count() > 0)
                <div class="space-y-6">
                    @foreach($user->activities()->latest()->take(5)->get() as $activity)
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center w-8 h-8 rounded-full {{ $activity->icon_color }} bg-opacity-20">
                                <i data-lucide="{{ $activity->icon }}" class="w-5 h-5 {{ $activity->icon_color }}"></i>
                            </div>
                        </div>
                        <div class="ml-4 flex-1">
                            <div class="flex items-center justify-between">
                                <p class="text-sm text-gray-500">{!! $activity->formatted_message !!}</p>
                                <span class="text-xs text-gray-400">{{ $activity->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="text-center py-12 text-gray-500">
                    <div class="mb-3">
                        <i data-lucide="activity" class="w-12 h-12 mx-auto text-gray-300"></i>
                    </div>
                    <p>No activities recorded yet.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function confirmDelete() {
        if (confirm('Are you sure you want to delete this user? This action cannot be undone.')) {
            document.getElementById('delete-form').submit();
        }
    }
</script>
@endpush
