<?php

namespace App\Http\Controllers;

use App\Models\Pregnancy;
use App\Models\Report;
use App\Models\Result;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $userCount = User::count();
        $weeklyReportCount = Report::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();
        $userAdminCount = User::where('is_admin', true)->count();

        // report count every month to chart
        $startDate = Carbon::now()->subMonths(12)->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        $monthlyCounts = Report::selectRaw('COUNT(*) as count, EXTRACT(MONTH FROM created_at) as month')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupByRaw('EXTRACT(MONTH FROM created_at)')
            ->orderByRaw('EXTRACT(MONTH FROM created_at)')
            ->get();

        $monthlyImt = Result::select(
            DB::raw('COUNT(*) as count'),
            'status_imt',
            DB::raw("EXTRACT(MONTH FROM created_at) as month")
        )
        ->groupBy('status_imt', 'month')
        ->orderBy('month', 'asc')
        ->orderBy('status_imt', 'asc')
        ->get();

        $transformedData = [];

        foreach ($monthlyImt as $entry) {
            $statusIMT = $entry['status_imt'];
            $month = $entry['month'];
            $count = $entry['count'];

            if (!isset($transformedData[$statusIMT])) {
                $transformedData[$statusIMT] = [
                    'status_imt' => $statusIMT,
                    'count' => [],
                ];
            }

            $transformedData[$statusIMT]['count'][$month] = $count;
        }

        $monthlyImt = array_values($transformedData);

        $latestPregnancies = Pregnancy::query()
            ->select('profile_id', 'hamil', DB::raw('MAX(created_at) as latest_created_at'))
            ->groupBy('profile_id', 'hamil')
            ->orderBy('latest_created_at', 'asc')
            ->get();
        
        $result = [];

        foreach ($latestPregnancies as $pregnancy) {
            $result[$pregnancy->profile_id] =  $pregnancy->hamil;
        }
        
        $lastPregnantProfilesCount = count(array_filter($result, function($value) {
            return $value === true;
        }));

        return view('dashboard.index', compact('userCount', 'weeklyReportCount', 'userAdminCount', 'monthlyCounts', 'monthlyImt', 'lastPregnantProfilesCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
