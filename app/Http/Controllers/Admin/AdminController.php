<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        // Count leads by status
        $leadStatusCounts = Lead::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->get()
            ->pluck('count', 'status')
            ->toArray();
            
        // Get recent leads
        $recentLeads = Lead::with('assignedUser')
            ->latest()
            ->take(5)
            ->get();
            
        // Count total leads
        $totalLeads = Lead::count();
        
        // Count new leads this month
        $newLeadsThisMonth = Lead::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();
            
        // Count won leads
        $wonLeads = Lead::where('status', 'won')->count();
        
        // Calculate win rate
        $winRate = $totalLeads > 0 ? round(($wonLeads / $totalLeads) * 100, 1) : 0;
        
        // Get leads by source
        $leadsBySource = Lead::select('source', DB::raw('count(*) as count'))
            ->groupBy('source')
            ->get()
            ->pluck('count', 'source')
            ->toArray();

        return view('admin.dashboard', compact(
            'leadStatusCounts', 
            'recentLeads', 
            'totalLeads', 
            'newLeadsThisMonth', 
            'wonLeads',
            'winRate',
            'leadsBySource'
        ));
    }

    /**
     * Display the performance report.
     *
     * @return \Illuminate\Http\Response
     */
    public function performanceReport()
    {
        // Get users with their lead counts
        $users = User::withCount([
                'assignedLeads',
                'assignedLeads as won_leads_count' => function ($query) {
                    $query->where('status', 'won');
                },
                'assignedLeads as lost_leads_count' => function ($query) {
                    $query->where('status', 'lost');
                }
            ])
            ->get()
            ->map(function ($user) {
                $user->win_rate = $user->assigned_leads_count > 0 
                    ? round(($user->won_leads_count / $user->assigned_leads_count) * 100, 1) 
                    : 0;
                return $user;
            });
        
        // Get leads counts by month - using SQLite compatible date functions
        $monthlyLeads = Lead::select(
                DB::raw('strftime("%Y", created_at) as year'),
                DB::raw('strftime("%m", created_at) as month'),
                DB::raw('COUNT(*) as count')
            )
            ->where('created_at', '>=', Carbon::now()->subMonths(6))
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get()
            ->map(function ($item) {
                $date = Carbon::createFromDate($item->year, $item->month, 1);
                return [
                    'month' => $date->format('M Y'),
                    'count' => $item->count,
                ];
            });

        return view('admin.reports.performance', compact('users', 'monthlyLeads'));
    }

    /**
     * Display the leads report.
     *
     * @return \Illuminate\Http\Response
     */
    public function leadsReport(Request $request)
    {
        $query = Lead::with('assignedUser');
        
        // Apply filters
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        if ($request->filled('source')) {
            $query->where('source', $request->source);
        }
        
        if ($request->filled('assigned_to')) {
            $query->where('assigned_to', $request->assigned_to);
        }
        
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }
        
        $leads = $query->latest()->paginate(20);
        
        // Get unique values for filter dropdowns
        $statuses = Lead::distinct('status')->pluck('status');
        $sources = Lead::distinct('source')->pluck('source');
        $users = User::all();
        
        return view('admin.reports.leads', compact('leads', 'statuses', 'sources', 'users'));
    }

    /**
     * Export report data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function exportReport(Request $request)
    {
        // This would be implemented with Laravel Excel or a similar package
        // For now, we'll just redirect back with a message
        return redirect()->back()->with('info', 'Export functionality will be implemented in Phase 4.');
    }
}
