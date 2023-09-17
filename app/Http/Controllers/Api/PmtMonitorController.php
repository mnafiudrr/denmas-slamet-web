<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PmtMonitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PmtMonitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pmtMonitors = PmtMonitor::with('createdBy')->orderBy('created_at', 'desc')->get();

        $pmtMonitors->map(function ($pmtMonitor) {
            $pmtMonitor->created_by = $pmtMonitor->createdBy->name;
            return $pmtMonitor;
        });

        return response()->json([
            'status' => 'success',
            'data' => $pmtMonitors,
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
        $validation = $request->validate([
            'nama_anak' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'usia' => 'required|numeric',
            'nama_ibu' => 'required|string',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
            'tanggal_home_visit' => 'required|date',
            'pemberian_pmt' => 'required|boolean',
            'berat_badan_terakhir' => 'required|numeric',
        ]);

        DB::beginTransaction();

        try {
            $pmtMonitor = PmtMonitor::create([
                'nama_anak' => $request->nama_anak,
                'jenis_kelamin' => $request->jenis_kelamin,
                'usia' => $request->usia,
                'nama_ibu' => $request->nama_ibu,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'tanggal_home_visit' => $request->tanggal_home_visit,
                'pemberian_pmt' => $request->pemberian_pmt,
                'berat_badan_terakhir' => $request->berat_badan_terakhir,
                'created_by' => auth()->user()->id,
            ]);

            DB::commit();

            $pmtMonitor->created_by = auth()->user()->name;

            return response()->json([
                'status' => 'success',
                'data' => $pmtMonitor,
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage(),
            ]);
        }
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
