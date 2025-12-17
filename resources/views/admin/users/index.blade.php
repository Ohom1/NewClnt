@extends('admin.layouts.app')

@section('title', 'User Management')

@section('content')
<div class="container mx-auto px-4 py-4 md:py-8">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <h1 class="text-2xl md:text-3xl font-bold text-primary-blue">USERS</h1>
        <a href="{{ route('admin.users.create') }}" class="btn-primary bg-secondary-green w-full sm:w-auto text-center">
            <i data-lucide="user-plus" class="w-4 h-4 mr-2"></i>
            Add New User
        </a>
    </div>
    
    <!-- Sort Controls - Mobile only -->
    <div class="md:hidden bg-white rounded-t-xl shadow-md p-4 mb-1">
        <div class="flex justify-between items-center">
            <span class="text-sm font-medium">Sort by:</span>
            <select id="mobileSortSelect" class="text-sm border-gray-300 rounded-md focus:border-secondary-green focus:ring focus:ring-secondary-green focus:ring-opacity-50">
                <option value="name-asc">Name (A-Z)</option>
                <option value="name-desc">Name (Z-A)</option>
                <option value="created_at-desc">Newest First</option>
                <option value="created_at-asc">Oldest First</option>
                <option value="role-asc">Role</option>
            </select>
        </div>
    </div>

    <!-- Mobile Card View -->
    <div class="md:hidden space-y-3">
        @forelse ($users as $user)
            <div class="bg-white rounded-xl shadow-md p-4 border-l-4 {{ 
                $user->role == 'admin' ? 'border-purple-400' : 
                ($user->role == 'sales' ? 'border-green-400' : 
                'border-blue-400')
            }}">
                <div class="flex justify-between items-start mb-3">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-12 w-12 mr-3">
                            <img class="h-12 w-12 rounded-full object-cover border-2 border-gray-200" 
                                src="{{ $user->profile_photo_url }}" 
                                alt="{{ $user->name }}">
                        </div>
                        <div>
                            <h3 class="font-medium text-gray-900">{{ $user->name }}</h3>
                            <p class="text-xs text-gray-500">{{ $user->title ?? 'No title' }}</p>
                        </div>
                    </div>
                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                        {{ $user->role == 'admin' ? 'bg-purple-100 text-purple-800' : '' }}
                        {{ $user->role == 'sales' ? 'bg-green-100 text-green-800' : '' }}
                        {{ $user->role == 'support' ? 'bg-blue-100 text-blue-800' : '' }}">
                        {{ ucfirst($user->role) }}
                    </span>
                </div>
                
                <div class="space-y-2 text-sm">
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <p class="text-xs text-gray-500">Contact:</p>
                            <p class="truncate">{{ $user->email }}</p>
                            <p>{{ $user->phone ?? 'No phone' }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Stats:</p>
                            <p>{{ $user->assigned_leads_count }} leads assigned</p>
                            <p class="text-xs">Joined {{ $user->created_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="border-t border-gray-100 mt-3 pt-3 flex justify-between">
                    <a href="{{ route('admin.users.show', $user) }}" class="text-primary-blue flex items-center text-sm">
                        <i data-lucide="eye" class="w-4 h-4 mr-1"></i> View
                    </a>
                    <a href="{{ route('admin.users.edit', $user) }}" class="text-secondary-green flex items-center text-sm">
                        <i data-lucide="pencil" class="w-4 h-4 mr-1"></i> Edit
                    </a>
                    @if(auth()->id() != $user->id)
                        <button type="button" class="text-red-500 flex items-center text-sm" onclick="confirmDelete({{ $user->id }})">
                            <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete
                        </button>
                        <form id="delete-form-{{ $user->id }}" action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    @else
                        <span class="text-gray-400 flex items-center text-sm">
                            <i data-lucide="user" class="w-4 h-4 mr-1"></i> Current
                        </span>
                    @endif
                </div>
            </div>
        @empty
            <div class="bg-white rounded-xl shadow-md p-6 text-center">
                <i data-lucide="users" class="w-12 h-12 mx-auto text-gray-400 mb-3"></i>
                <p class="text-gray-500">No users found.</p>
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
                            User
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Contact
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Role
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Leads Assigned
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Joined
                        </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($users as $user)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full object-cover border border-gray-200" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                        <div class="text-sm text-gray-500">{{ $user->title ?? 'No title' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $user->email }}</div>
                                <div class="text-sm text-gray-500">{{ $user->phone ?? 'No phone' }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $user->role == 'admin' ? 'bg-purple-100 text-purple-800' : '' }}
                                    {{ $user->role == 'sales' ? 'bg-green-100 text-green-800' : '' }}
                                    {{ $user->role == 'support' ? 'bg-blue-100 text-blue-800' : '' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $user->assigned_leads_count }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $user->created_at->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4 text-right text-sm font-medium">
                                <div class="flex space-x-2 justify-end">
                                    <a href="{{ route('admin.users.show', $user) }}" class="text-primary-blue hover:text-primary-blue-dark">
                                        <i data-lucide="eye" class="w-5 h-5"></i>
                                    </a>
                                    <a href="{{ route('admin.users.edit', $user) }}" class="text-secondary-green hover:text-secondary-green-dark">
                                        <i data-lucide="pencil" class="w-5 h-5"></i>
                                    </a>
                                    @if(auth()->id() != $user->id)
                                        <button type="button" class="text-red-500 hover:text-red-700" onclick="confirmDelete({{ $user->id }})">
                                            <i data-lucide="trash-2" class="w-5 h-5"></i>
                                        </button>
                                        <form id="delete-form-{{ $user->id }}" action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                                <i data-lucide="users" class="w-12 h-12 mx-auto text-gray-400 mb-3"></i>
                                <p>No users found.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if(isset($users) && method_exists($users, 'links'))
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $users->links() }}
        </div>
        @endif
    </div>
    
    <!-- Mobile Pagination -->
    @if(isset($users) && method_exists($users, 'links'))
    <div class="md:hidden mt-4">
        {{ $users->links() }}
    </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
    function confirmDelete(userId) {
        if (confirm('Are you sure you want to delete this user? This action cannot be undone and will reassign all their leads.')) {
            document.getElementById('delete-form-' + userId).submit();
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
