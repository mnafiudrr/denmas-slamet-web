<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $reports = Report::with(['profile', 'health', 'pregnancy', 'createdBy', 'result'])
        ->orderBy('created_at', 'desc');

        if ($request->has('week') && $request->query('week')) {
            $dateString = $request->query('week');
            $year = intval(substr($dateString, 0, 4));
            $week = intval(substr($dateString, 6));
            
            $startDate = new \DateTime();
            $startDate->setISODate($year, $week);
            $endDate = clone $startDate;
            $endDate->modify('+7 days');

            $reports->whereBetween('created_at', [$startDate, $endDate]);
        }

        $reports = $reports->get();

        return view('report.index', compact('reports', 'request'));
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
    public function show(string $encryptedId)
    {
        try {
            $id = decrypt($encryptedId);
            $report = Report::with(['profile', 'health', 'pregnancy', 'createdBy', 'result'])->findOrFail($id);
            return view('report.show', compact('report'));
        } catch (\Throwable $th) {
            return redirect()->route('report.index')->with('error', 'Data tidak ditemukan.');
        }
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
