@extends('admin.layouts.app')

@section('title', 'Performance Report')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-primary-blue">Performance Report</h1>
        <p class="text-gray-500">Analyze team performance and lead conversion metrics</p>
    </div>
    
    <!-- Charts -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Monthly Leads -->
        <div class="bg-white rounded-card shadow-sm p-6">
            <h2 class="text-xl font-bold text-primary-blue mb-4">Monthly Lead Acquisition</h2>
            <div class="h-80" id="monthlyLeadsChart"></div>
        </div>
        
        <!-- User Performance -->
        <div class="bg-white rounded-card shadow-sm p-6">
            <h2 class="text-xl font-bold text-primary-blue mb-4">User Win Rates</h2>
            <div class="h-80" id="userPerformanceChart"></div>
        </div>
    </div>
    
    <!-- Team Performance Table -->
    <div class="bg-white rounded-card shadow-sm p-6 mb-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-primary-blue">Team Performance</h2>
            <div>
                <a href="#" onclick="exportTableToCSV('team-performance.csv')" class="btn-secondary flex items-center">
                    <i data-lucide="download" class="w-4 h-4 mr-2"></i>
                    Export CSV
                </a>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table id="teamPerformanceTable" class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Team Member</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Assigned</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Won Leads</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lost Leads</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Win Rate</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($users as $user)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full object-cover" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                    <div class="text-sm text-gray-500">{{ $user->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                {{ $user->role == 'admin' ? 'bg-purple-100 text-purple-800' : '' }}
                                {{ $user->role == 'sales' ? 'bg-green-100 text-green-800' : '' }}
                                {{ $user->role == 'support' ? 'bg-blue-100 text-blue-800' : '' }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $user->assigned_leads_count }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $user->won_leads_count }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $user->lost_leads_count }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-24 bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-secondary-green h-2.5 rounded-full" style="width: {{ $user->win_rate }}%"></div>
                                </div>
                                <span class="ml-3 text-sm text-gray-500">{{ $user->win_rate }}%</span>
                            </div>
                        </td>
                    </tr>
                    @endforeach
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
        // Monthly Leads Chart
        const monthlyCtx = document.getElementById('monthlyLeadsChart').getContext('2d');
        const monthlyData = @json($monthlyLeads);
        
        new Chart(monthlyCtx, {
            type: 'bar',
            data: {
                labels: monthlyData.map(item => item.month),
                datasets: [{
                    label: 'New Leads',
                    data: monthlyData.map(item => item.count),
                    backgroundColor: '#3CB043',
                    borderColor: '#3CB043',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
        
        // User Performance Chart
        const userCtx = document.getElementById('userPerformanceChart').getContext('2d');
        const userData = @json($users->map(function($user) {
            return [
                'name' => $user->name,
                'win_rate' => $user->win_rate,
                'assigned_count' => $user->assigned_leads_count
            ];
        })->toArray());
        
        new Chart(userCtx, {
            type: 'horizontalBar',
            data: {
                labels: userData.map(user => user.name),
                datasets: [{
                    label: 'Win Rate (%)',
                    data: userData.map(user => user.win_rate),
                    backgroundColor: '#013A63',
                    borderColor: '#013A63',
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        beginAtZero: true,
                        max: 100,
                        title: {
                            display: true,
                            text: 'Win Rate (%)'
                        }
                    }
                }
            }
        });
    });
    
    // CSV Export Function
    function exportTableToCSV(filename) {
        const table = document.getElementById('teamPerformanceTable');
        let csv = [];
        const rows = table.querySelectorAll('tr');
        
        for (let i = 0; i < rows.length; i++) {
            const row = [], cols = rows[i].querySelectorAll('td, th');
            
            for (let j = 0; j < cols.length; j++) {
                // Get text content and clean it
                let data = cols[j].textContent.trim().replace(/(\r\n|\n|\r)/gm, ' ').replace(/\s+/g, ' ');
                // Remove percentage sign from win rate
                if (j === 5 && i > 0) {
                    data = data.replace('%', '');
                }
                // Quote fields with commas
                if (data.includes(',')) {
                    data = `"${data}"`;
                }
                row.push(data);
            }
            csv.push(row.join(','));
        }
        
        // Download CSV file
        downloadCSV(csv.join('\n'), filename);
    }
    
    function downloadCSV(csv, filename) {
        const csvFile = new Blob([csv], {type: 'text/csv'});
        const downloadLink = document.createElement('a');
        
        // Create a link to download
        downloadLink.download = filename;
        downloadLink.href = window.URL.createObjectURL(csvFile);
        downloadLink.style.display = 'none';
        
        // Add link to DOM, click it, then remove it
        document.body.appendChild(downloadLink);
        downloadLink.click();
        document.body.removeChild(downloadLink);
    }
</script>
@endpush
