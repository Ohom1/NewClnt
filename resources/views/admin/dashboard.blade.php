@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mx-auto px-4 py-6 md:py-8">
    <!-- Welcome Banner -->
    <div class="bg-gradient-to-br from-primary-blue to-dark-navy rounded-xl shadow-lg mb-6 md:mb-8 overflow-hidden relative">
        <div class="absolute inset-0 overflow-hidden">
            <svg class="absolute right-0 top-0 h-full opacity-20" viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="smallGrid" width="20" height="20" patternUnits="userSpaceOnUse">
                        <path d="M 20 0 L 0 0 0 20" fill="none" stroke="white" stroke-width="0.5" opacity="0.2"/>
                    </pattern>
                </defs>
                <rect width="500" height="500" fill="url(#smallGrid)" />
            </svg>
        </div>
        
        <div class="relative p-6 md:p-8 z-10">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div class="max-w-lg">
                    <h1 class="text-2xl md:text-3xl font-bold text-white mb-2">Welcome back, {{ auth()->user()->name }}</h1>
                    <p class="text-white/80 text-sm md:text-base">{{ now()->format('l, F j, Y') }}</p>
                    <div class="mt-3 text-xs md:text-sm text-white/70">
                        @if(isset($totalLeads) && $totalLeads > 0)
                        <p>You have {{ $newLeadsThisMonth ?? 0 }} new lead{{ $newLeadsThisMonth == 1 ? '' : 's' }} this month with {{ $winRate ?? 0 }}% win rate.</p>
                        @else
                        <p>Get started by creating your first lead.</p>
                        @endif
                    </div>
                </div>
                <div class="flex gap-3 self-end md:self-auto">
                    <a href="{{ route('admin.leads.create') }}" class="btn-primary bg-secondary-green hover:bg-secondary-green/90 inline-flex items-center justify-center">
                        <i data-lucide="plus" class="w-4 h-4 mr-2"></i>
                        New Lead
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Quick Action Cards -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <!-- Add Lead -->
        <a href="{{ route('admin.leads.create') }}" class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 p-4 border border-gray-100 flex items-center gap-3 group">
            <div class="p-2 rounded-full bg-secondary-green/10 text-secondary-green">
                <i data-lucide="user-plus" class="w-5 h-5"></i>
            </div>
            <span class="font-medium text-gray-700 group-hover:text-secondary-green transition-colors">Add Lead</span>
        </a>
        
        <!-- Manage Users -->
        <a href="{{ route('admin.users.index') }}" class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 p-4 border border-gray-100 flex items-center gap-3 group">
            <div class="p-2 rounded-full bg-primary-blue/10 text-primary-blue">
                <i data-lucide="users" class="w-5 h-5"></i>
            </div>
            <span class="font-medium text-gray-700 group-hover:text-primary-blue transition-colors">Manage Users</span>
        </a>
        
        <!-- View Reports -->
        <a href="{{ route('admin.reports.leads') }}" class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 p-4 border border-gray-100 flex items-center gap-3 group">
            <div class="p-2 rounded-full bg-amber-500/10 text-amber-500">
                <i data-lucide="bar-chart-2" class="w-5 h-5"></i>
            </div>
            <span class="font-medium text-gray-700 group-hover:text-amber-500 transition-colors">Reports</span>
        </a>
        
        <!-- View Website -->
        <a href="/" target="_blank" class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 p-4 border border-gray-100 flex items-center gap-3 group">
            <div class="p-2 rounded-full bg-purple-500/10 text-purple-500">
                <i data-lucide="globe" class="w-5 h-5"></i>
            </div>
            <span class="font-medium text-gray-700 group-hover:text-purple-500 transition-colors">View Site</span>
        </a>
    </div>
    
    <h2 class="text-xl font-bold text-primary-blue mb-4">Performance Metrics</h2>
    
    <!-- Quick Stats -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-8 md:mb-10">
        <!-- Total Leads -->
        <div class="bg-gradient-to-br from-primary-blue/90 to-primary-blue rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 p-4 md:p-6 relative overflow-hidden group">
            <div class="absolute right-0 top-0 w-24 h-24 -mt-8 -mr-8 rounded-full bg-white/10 z-0"></div>
            <div class="absolute right-0 bottom-0 w-16 h-16 -mb-6 -mr-6 rounded-full bg-white/5 z-0"></div>
            
            <div class="flex flex-col md:flex-row md:items-center relative z-10">
                <div class="p-2 md:p-3 rounded-full bg-white/20 text-white mb-3 md:mb-0 md:mr-4 w-12 h-12 flex items-center justify-center backdrop-blur-sm">
                    <i data-lucide="users" class="h-6 w-6"></i>
                </div>
                <div class="md:flex-1">
                    <p class="text-xs md:text-sm text-white/80 font-medium mb-1">Total Leads</p>
                    <p class="text-2xl md:text-3xl font-bold text-white flex items-center">
                        @if(isset($totalLeads) && $totalLeads > 0)
                            {{ $totalLeads }}
                            <span class="ml-2 text-xs font-normal bg-white/20 py-0.5 px-2 rounded-full">All Time</span>
                        @else
                            <span class="text-white/60">No Data</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>
        
        <!-- New Leads This Month -->
        <div class="bg-gradient-to-br from-secondary-green/90 to-secondary-green rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 p-4 md:p-6 relative overflow-hidden group">
            <div class="absolute right-0 top-0 w-24 h-24 -mt-8 -mr-8 rounded-full bg-white/10 z-0"></div>
            <div class="absolute right-0 bottom-0 w-16 h-16 -mb-6 -mr-6 rounded-full bg-white/5 z-0"></div>
            
            <div class="flex flex-col md:flex-row md:items-center relative z-10">
                <div class="p-2 md:p-3 rounded-full bg-white/20 text-white mb-3 md:mb-0 md:mr-4 w-12 h-12 flex items-center justify-center backdrop-blur-sm">
                    <i data-lucide="user-plus" class="h-6 w-6"></i>
                </div>
                <div class="md:flex-1">
                    <p class="text-xs md:text-sm text-white/80 font-medium mb-1">New Leads This Month</p>
                    <p class="text-2xl md:text-3xl font-bold text-white">
                        @if(isset($newLeadsThisMonth) && $newLeadsThisMonth > 0)
                            {{ $newLeadsThisMonth }}
                        @else
                            <span class="text-white/60">No Data</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Won Leads -->
        <div class="bg-gradient-to-br from-accent-light-green/90 to-accent-light-green rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 p-4 md:p-6 relative overflow-hidden group">
            <div class="absolute right-0 top-0 w-24 h-24 -mt-8 -mr-8 rounded-full bg-white/10 z-0"></div>
            <div class="absolute right-0 bottom-0 w-16 h-16 -mb-6 -mr-6 rounded-full bg-white/5 z-0"></div>
            
            <div class="flex flex-col md:flex-row md:items-center relative z-10">
                <div class="p-2 md:p-3 rounded-full bg-white/20 text-white mb-3 md:mb-0 md:mr-4 w-12 h-12 flex items-center justify-center backdrop-blur-sm">
                    <i data-lucide="check-circle" class="h-6 w-6"></i>
                </div>
                <div class="md:flex-1">
                    <p class="text-xs md:text-sm text-white/80 font-medium mb-1">Won Leads</p>
                    <p class="text-2xl md:text-3xl font-bold text-white">
                        @if(isset($wonLeads) && $wonLeads > 0)
                            {{ $wonLeads }}
                        @else
                            <span class="text-white/60">No Data</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Win Rate -->
        <div class="bg-gradient-to-br from-dark-navy/90 to-dark-navy rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 p-4 md:p-6 relative overflow-hidden group">
            <div class="absolute right-0 top-0 w-24 h-24 -mt-8 -mr-8 rounded-full bg-white/10 z-0"></div>
            <div class="absolute right-0 bottom-0 w-16 h-16 -mb-6 -mr-6 rounded-full bg-white/5 z-0"></div>
            
            <div class="flex flex-col md:flex-row md:items-center relative z-10">
                <div class="p-2 md:p-3 rounded-full bg-white/20 text-white mb-3 md:mb-0 md:mr-4 w-12 h-12 flex items-center justify-center backdrop-blur-sm">
                    <i data-lucide="percent" class="h-6 w-6"></i>
                </div>
                <div class="md:flex-1">
                    <p class="text-xs md:text-sm text-white/80 font-medium mb-1">Win Rate</p>
                    <p class="text-2xl md:text-3xl font-bold text-white flex items-baseline">
                        @if(isset($winRate) && $winRate > 0)
                            {{ $winRate }}% 
                            <span class="ml-1 text-xs font-normal bg-white/20 py-0.5 px-2 rounded-full">↑</span>
                        @elseif(isset($winRate) && $winRate == 0)
                            {{ $winRate }}%
                        @else
                            <span class="text-white/60">No Data</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Charts -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-8 mb-8 md:mb-10">
        <!-- Lead Status Distribution -->
        <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 p-5 md:p-6 border border-gray-100">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-6 gap-3">
                <div class="flex items-center">
                    <div class="bg-primary-blue/10 rounded-full p-2 mr-3">
                        <i data-lucide="pie-chart" class="h-5 w-5 text-primary-blue"></i>
                    </div>
                    <div>
                        <h2 class="text-lg md:text-xl font-bold text-primary-blue">LEAD STATUS</h2>
                        <p class="text-xs text-gray-500">Distribution by current status</p>
                    </div>
                </div>
                <div class="flex space-x-2 ml-auto">
                    <div class="text-xs px-2 py-1 bg-gray-100 rounded-md flex items-center gap-1">
                        <span class="h-2 w-2 inline-block rounded-full bg-secondary-green"></span>
                        <span>Won: {{ $leadStatusCounts['won'] ?? 0 }}</span>
                    </div>
                    <div class="text-xs px-2 py-1 bg-gray-100 rounded-md flex items-center gap-1">
                        <span class="h-2 w-2 inline-block rounded-full bg-primary-blue"></span>
                        <span>New: {{ $leadStatusCounts['new'] ?? 0 }}</span>
                    </div>
                </div>
            </div>
            @if(isset($leadStatusCounts) && count($leadStatusCounts) > 0)
                <div class="h-64 md:h-80" id="leadStatusChart"></div>
            @else
                <div class="h-64 md:h-80 flex items-center justify-center flex-col">
                    <i data-lucide="pie-chart-off" class="w-12 h-12 text-primary-blue/30 mb-2"></i>
                    <p class="text-primary-blue/60 font-medium">No Data Available</p>
                    <p class="text-xs text-primary-blue/50 mt-1">Lead status information will appear here</p>
                </div>
            @endif
        </div>
        
        <!-- Leads by Source -->
        <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 p-5 md:p-6 border border-gray-100">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-6 gap-3">
                <div class="flex items-center">
                    <div class="bg-secondary-green/10 rounded-full p-2 mr-3">
                        <i data-lucide="bar-chart-3" class="h-5 w-5 text-secondary-green"></i>
                    </div>
                    <div>
                        <h2 class="text-lg md:text-xl font-bold text-primary-blue">LEAD SOURCES</h2>
                        <p class="text-xs text-gray-500">Where your leads are coming from</p>
                    </div>
                </div>
                
                <select id="timeRangeFilter" class="form-select text-sm rounded-md border-gray-300 py-1 focus:border-primary-blue focus:ring focus:ring-primary-blue/20">
                    <option value="all-time">All Time</option>
                    <option value="this-month">This Month</option>
                    <option value="last-month">Last Month</option>
                </select>
            </div>
            @if(isset($leadsBySource) && count($leadsBySource) > 0)
                <div class="h-64 md:h-80" id="leadSourceChart"></div>
            @else
                <div class="h-64 md:h-80 flex items-center justify-center flex-col">
                    <i data-lucide="bar-chart-off" class="w-12 h-12 text-secondary-green/30 mb-2"></i>
                    <p class="text-secondary-green/60 font-medium">No Data Available</p>
                    <p class="text-xs text-secondary-green/50 mt-1">Lead source information will appear here</p>
                </div>
            @endif
        </div>
    </div>
    
    <!-- Recent Leads -->   
    <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 p-5 md:p-6 border border-gray-100 mb-6 md:mb-8">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-2">
            <div class="flex items-center">
                <div class="bg-primary-blue/10 rounded-full p-2 mr-3">
                    <i data-lucide="clipboard-list" class="h-5 w-5 text-primary-blue"></i>
                </div>
                <div>
                    <h2 class="text-lg md:text-xl font-bold text-primary-blue">RECENT LEADS</h2>
                    <p class="text-xs text-gray-500">Latest activity in your pipeline</p>
                </div>
            </div>
            <div class="flex items-center gap-3 ml-auto">
                <div class="flex items-center gap-1">
                    <select id="leadFilterSelect" class="form-select text-xs rounded-md border-gray-300 py-1 focus:border-primary-blue focus:ring focus:ring-primary-blue/20">
                        <option value="all">All Statuses</option>
                        <option value="new">New</option>
                        <option value="contacted">Contacted</option>
                        <option value="quoted">Quoted</option>
                        <option value="won">Won</option>
                    </select>
                </div>
                <a href="{{ route('admin.leads.index') }}" class="btn-secondary py-1.5 px-3 text-sm inline-flex items-center">
                    <span>View All</span>
                    <i data-lucide="arrow-right" class="h-4 w-4 ml-1"></i>
                </a>
            </div>
        </div>
        
        <!-- Mobile card view (visible on small screens) -->
        <div class="md:hidden space-y-4">
            @forelse($recentLeads as $lead)
                <div class="border border-gray-100 rounded-lg p-4 hover:shadow-md transition-all duration-300">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <div class="font-medium text-gray-900">{{ $lead->name }}</div>
                            <div class="text-xs text-gray-500">{{ $lead->email }}</div>
                        </div>
                        <div>
                            {!! $lead->status_badge !!}
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-2 text-xs mb-3">
                        <div>
                            <span class="text-gray-500">Route:</span>
                            <span class="font-medium">{{ $lead->origin }} to {{ $lead->destination }}</span>
                        </div>
                        <div>
                            <span class="text-gray-500">Created:</span>
                            <span class="font-medium">{{ $lead->created_at->format('d M, Y') }}</span>
                        </div>
                        <div>
                            <span class="text-gray-500">Cargo:</span>
                            <span class="font-medium">{{ ucfirst($lead->cargo_type) }}</span>
                        </div>
                        <div>
                            <span class="text-gray-500">Assigned:</span>
                            <span class="font-medium">{{ $lead->assignedUser ? $lead->assignedUser->name : 'Unassigned' }}</span>
                        </div>
                    </div>
                    
                    <div class="flex justify-between items-center border-t border-gray-100 pt-3 mt-3">
                        <span class="text-xs text-gray-500">{{ $lead->created_at->diffForHumans() }}</span>
                        <a href="{{ route('admin.leads.show', $lead) }}" class="text-primary-blue hover:text-secondary-green text-sm font-medium flex items-center">
                            <span>View Details</span>
                            <i data-lucide="chevron-right" class="h-4 w-4 ml-1"></i>
                        </a>
                    </div>
                </div>
            @empty
                <div class="text-center py-10 bg-background-light-grey rounded-lg border border-gray-100">
                    <i data-lucide="inbox" class="h-12 w-12 mx-auto text-primary-blue/30 mb-3"></i>
                    <p class="text-primary-blue/70 font-medium">No Data Available</p>
                    <p class="text-xs text-primary-blue/50 mt-1">Lead information will appear here once added</p>
                    <a href="{{ route('admin.leads.create') }}" class="mt-4 inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-secondary-green rounded-md hover:bg-secondary-green/90 transition-colors">
                        <i data-lucide="plus" class="w-4 h-4 mr-2"></i>
                        Add Your First Lead
                    </a>
                </div>
            @endforelse
        </div>
        
        <!-- Desktop table view (hidden on small screens) -->
        <div class="hidden md:block overflow-hidden border border-gray-100 rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th scope="col" class="px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Route</th>
                        <th scope="col" class="px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Assigned To</th>
                        <th scope="col" class="px-5 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
                        <th scope="col" class="px-5 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($recentLeads as $lead)
                    <tr class="hover:bg-gray-50 transition-all duration-200">
                        <td class="px-5 py-4">
                            <div>
                                <div class="text-sm font-medium text-gray-900">{{ $lead->name }}</div>
                                <div class="text-xs text-gray-500">{{ $lead->email }}</div>
                            </div>
                        </td>
                        <td class="px-5 py-4">
                            <div class="text-sm text-gray-900">{{ $lead->origin }} to {{ $lead->destination }}</div>
                            <div class="text-xs text-gray-500">{{ ucfirst($lead->cargo_type) }}</div>
                        </td>
                        <td class="px-5 py-4">
                            {!! $lead->status_badge !!}
                        </td>
                        <td class="px-5 py-4">
                            @if($lead->assignedUser)
                                <div class="text-sm font-medium text-gray-900 flex items-center gap-2">
                                    <span class="w-6 h-6 rounded-full bg-gray-200 flex items-center justify-center text-xs">{{ substr($lead->assignedUser->name, 0, 1) }}</span>
                                    <span>{{ $lead->assignedUser->name }}</span>
                                </div>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-medium rounded-full bg-gray-100 text-gray-800">
                                    Unassigned
                                </span>
                            @endif
                        </td>
                        <td class="px-5 py-4">
                            <div class="text-sm text-gray-900">{{ $lead->created_at->format('d M, Y') }}</div>
                            <div class="text-xs text-gray-500">{{ $lead->created_at->format('h:i A') }}</div>
                        </td>
                        <td class="px-5 py-4 text-right">
                            <a href="{{ route('admin.leads.show', $lead) }}" class="text-primary-blue hover:text-secondary-green inline-flex items-center">
                                <i data-lucide="eye" class="h-5 w-5"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-5 py-10 text-center">
                            <i data-lucide="inbox" class="h-12 w-12 mx-auto text-primary-blue/30 mb-3"></i>
                            <p class="text-primary-blue/70 font-medium">No Data Available</p>
                            <p class="text-xs text-primary-blue/50 mt-1">Lead information will appear here once added</p>
                            <a href="{{ route('admin.leads.create') }}" class="mt-4 inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-secondary-green rounded-md hover:bg-secondary-green/90 transition-colors">
                                <i data-lucide="plus" class="w-4 h-4 mr-2"></i>
                                Add Your First Lead
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Common chart options for better mobile support and visuals
        const commonOptions = {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: window.innerWidth < 768 ? 'bottom' : 'right',
                    labels: {
                        boxWidth: 12,
                        padding: 15,
                        usePointStyle: true,
                        pointStyle: 'circle',
                        font: {
                            size: 11,
                            family: "'Poppins', sans-serif",
                            weight: '500'
                        }
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(0,0,0,0.85)',
                    titleColor: '#ffffff',
                    bodyColor: '#ffffff',
                    padding: 12,
                    titleFont: {
                        size: 14,
                        family: "'Poppins', sans-serif",
                        weight: '600'
                    },
                    bodyFont: {
                        size: 13,
                        family: "'Poppins', sans-serif"
                    },
                    cornerRadius: 8,
                    boxPadding: 4,
                    displayColors: true,
                    borderColor: 'rgba(255,255,255,0.1)',
                    borderWidth: 1,
                    callbacks: {
                        label: function(context) {
                            const label = context.label || '';
                            const value = context.raw || 0;
                            const total = context.chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                            const percentage = Math.round((value / total) * 100);
                            return `${label}: ${value} (${percentage}%)`;
                        }
                    }
                }
            },
            cutout: '68%',
            animation: {
                animateScale: true,
                animateRotate: true,
                duration: 1500,
                easing: 'easeOutQuart'
            }
        };

        // Lead Status Distribution Chart
        const statusChartElement = document.getElementById('leadStatusChart');
        if (statusChartElement) {
            const statusCtx = statusChartElement.getContext('2d');
            
            // Format status labels to be title case
            const rawStatusLabels = {!! json_encode(array_keys($leadStatusCounts ?? [])) !!};
            
            if (rawStatusLabels && rawStatusLabels.length > 0) {
                const formattedStatusLabels = rawStatusLabels.map(label => 
                    label.charAt(0).toUpperCase() + label.slice(1)
                );
                
                const statusData = {
                    labels: formattedStatusLabels,
                    datasets: [{
                        data: {!! json_encode(array_values($leadStatusCounts ?? [])) !!},
                        backgroundColor: [
                            '#013A63', // new - primary-blue
                            '#6366F1', // contacted - indigo-500
                            '#F59E0B', // quoted - amber-500
                            '#10B981', // negotiating - emerald-500
                            '#3CB043', // won - secondary-green
                            '#EF4444', // lost - red-500
                            '#6B7280'  // cancelled - gray-500
                        ],
                        borderWidth: 2,
                        borderColor: '#ffffff',
                        hoverOffset: 15,
                        hoverBorderWidth: 0,
                        weight: 1
                    }]
                };
                
                const statusChart = new Chart(statusCtx, {
                    type: 'doughnut',
                    data: statusData,
                    options: {
                        ...commonOptions,
                        plugins: {
                            ...commonOptions.plugins,
                            doughnutlabel: {
                                labels: [{
                                    text: 'Total',
                                    font: {
                                        size: 20,
                                        weight: 'bold'
                                    }
                                }, {
                                    text: statusData.datasets[0].data.reduce((a, b) => a + b, 0),
                                    font: {
                                        size: 26,
                                        weight: 'bold'
                                    }
                                }]
                            }
                        }
                    }
                });
            }
        }
        
        // Lead Source Chart
        const sourceChartElement = document.getElementById('leadSourceChart');
        if (sourceChartElement) {
            const sourceCtx = sourceChartElement.getContext('2d');
            
            // Format source labels to be title case and replace underscores with spaces
            const rawSourceLabels = {!! json_encode(array_keys($leadsBySource ?? [])) !!};
            
            if (rawSourceLabels && rawSourceLabels.length > 0) {
                const formattedSourceLabels = rawSourceLabels.map(label => 
                    label.split('_').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ')
                );
                
                const sourceData = {
                    labels: formattedSourceLabels,
                    datasets: [{
                        data: {!! json_encode(array_values($leadsBySource ?? [])) !!},
                        backgroundColor: [
                            '#3CB043', // secondary-green
                            '#013A63', // primary-blue
                            '#9FE870', // accent-light-green
                            '#001E2E', // dark-navy
                            '#60A5FA', // blue-400
                            '#A78BFA', // violet-400
                            '#34D399', // emerald-400
                            '#F472B6'  // pink-400
                        ],
                        borderWidth: 2,
                        borderColor: '#ffffff',
                        hoverOffset: 15,
                        hoverBorderWidth: 0
                    }]
                };
                
                const sourceChart = new Chart(sourceCtx, {
                    type: 'pie',
                    data: sourceData,
                    options: commonOptions
                });
            }
        }
        
        // Adjust legend position on window resize
        window.addEventListener('resize', function() {
            Chart.instances.forEach(chart => {
                chart.options.plugins.legend.position = window.innerWidth < 768 ? 'bottom' : 'right';
                chart.update();
            });
        });
        
        // Handle filter selections
        document.getElementById('leadFilterSelect')?.addEventListener('change', function() {
            // In a real implementation, this would filter the leads table
            // For now we'll just show a feedback message
            const status = this.value;
            console.log(`Filtering by status: ${status}`);
            
            // You would typically make an AJAX request here to fetch filtered data
        });
        
        document.getElementById('timeRangeFilter')?.addEventListener('change', function() {
            // In a real implementation, this would reload the chart data
            // For now we'll just show a feedback message
            const timeRange = this.value;
            console.log(`Changing time range to: ${timeRange}`);
            
            // This would typically update the chart data via AJAX
        });
    });
</script>
@endpush
