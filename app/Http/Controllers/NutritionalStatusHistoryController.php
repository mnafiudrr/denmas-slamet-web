<?php

namespace App\Http\Controllers;

use App\Models\NutritionalStatusHistory;
use Illuminate\Http\Request;

class NutritionalStatusHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $data = NutritionalStatusHistory::with(['createdBy']);

        if ($request->has('month') && $request->query('month')) {
            $dateString = $request->query('month');
            $year = intval(substr($dateString, 0, 4));
            $month = intval(substr($dateString, 6));
            
            $startDate = new \DateTime();
            $startDate->setDate($year, $month, 1);
            $endDate = clone $startDate;
            $endDate->modify('+1 month');

            $data->whereBetween('created_at', [$startDate, $endDate]);
        }

        $data = $data->get();

        return view('nutritional-status-history.index', [
            'data' => $data,
            'request' => $request,
        ]);

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
