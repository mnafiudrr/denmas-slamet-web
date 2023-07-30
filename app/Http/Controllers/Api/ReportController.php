<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Health;
use App\Models\Pregnancy;
use App\Models\Report;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Report::query()->with(['profile', 'health', 'pregnancy', 'result'])->orderBy('created_at', 'desc');

        if (auth()->user()->is_admin) {
            if ($request->has('profile_id'))
                $query->where('profile_id', $request->profile_id);
        } else {
            $query->where('profile_id', auth()->user()->profile->id);
        }

        $reports = $query->get()->map(function ($report) {
            $report->name = $report->profile->fullname;
            return [
                'id' => $report->id,
                'name' => $report->name,
                'created_at' => $report->created_at,
            ];
        });

        return response()->json([
            'status' => 'success',
            'data' => $reports,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'profile_id' => 'required|exists:profiles,id',
            'hamil' => 'required|boolean',
            'usia_kehamilan' => 'numeric',
            'muntah' => 'boolean',
            'janin_pasif' => 'boolean',
            'pendarahan' => 'boolean',
            'bengkak' => 'boolean',
            'sembelit' => 'boolean',
            'nyeri_bak' => 'boolean',
            'tinggi_badan' => 'required|numeric',
            'berat_badan' => 'required|numeric',
            'tekanan_darah_sistol' => 'required|numeric',
            'tekanan_darah_diastol' => 'required|numeric',
            'kadar_gula' => 'required|numeric',
            'kadar_hb' => 'required|numeric',
            'kadar_kolesterol' => 'required|numeric',
            'kadar_asam_urat' => 'required|numeric',
        ]);

        DB::beginTransaction();
        try {
            if (auth()->user()->is_admin) {
                $profile_id = $request->profile_id;
            } else {
                $profile_id = auth()->user()->profile->id;
            }

            $pregnancy = Pregnancy::create([
                'profile_id' => $profile_id,
                'hamil' => $request->hamil,
                'usia_kehamilan' => $request->usia_kehamilan,
                'muntah' => $request->muntah,
                'janin_pasif' => $request->janin_pasif,
                'pendarahan' => $request->pendarahan,
                'bengkak' => $request->bengkak,
                'sembelit' => $request->sembelit,
                'nyeri_bak' => $request->nyeri_bak,
                'created_by' => auth()->user()->id,
            ]);

            $health = Health::create([
                'profile_id' => $profile_id,
                'tinggi_badan' => $request->tinggi_badan,
                'berat_badan' => $request->berat_badan,
                'tekanan_darah_sistol' => $request->tekanan_darah_sistol,
                'tekanan_darah_diastol' => $request->tekanan_darah_diastol,
                'kadar_gula' => $request->kadar_gula,
                'kadar_hb' => $request->kadar_hb,
                'kadar_kolesterol' => $request->kadar_kolesterol,
                'kadar_asam_urat' => $request->kadar_asam_urat,
                'created_by' => auth()->user()->id,
            ]);

            $report = Report::create([
                'profile_id' => $profile_id,
                'health_id' => $health->id,
                'pregnancy_id' => $pregnancy->id,
                'created_by' => auth()->user()->id,
            ]);

            $result = Result::create([
                'report_id' => $report->id,
            ]);

            DB::commit();


            $report = $report->makeHidden([
                'profile_id',
                'health_id',
                'pregnancy_id',
                'created_by',
            ]);

            $report->profile->makeHidden([
                'user_id',
                'created_at',
                'updated_at',
                'created_by',
            ]);

            $report->health->makeHidden([
                'id',
                'profile_id',
                'created_by',
                'created_at',
                'updated_at',
            ]);

            $report->pregnancy->makeHidden([
                'id',
                'profile_id',
                'created_by',
                'created_at',
                'updated_at',
            ]);

            $report->result->makeHidden([
                'id',
                'report_id',
                'created_at',
                'updated_at',
            ]);

            return response()->json([
                'message' => 'Berhasil menambahkan laporan',
                'data' => $report,
            ], 201);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'message' => 'Gagal menambahkan laporan',
                'data' => $th->getMessage(),
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $query = Report::with(['profile', 'health', 'pregnancy', 'result'])->where('id', $id);
        if (!auth()->user()->is_admin)
            $query->where('profile_id', auth()->user()->profile->id);

        $report = $query->first();
        if (!$report)
            return response()->json([
                'message' => 'Data tidak ditemukan',
            ], 404);

        $report = $report->makeHidden([
            'profile_id',
            'health_id',
            'pregnancy_id',
            'created_by',
        ]);

        $report->profile->makeHidden([
            'user_id',
            'created_at',
            'updated_at',
            'created_by',
        ]);

        $report->health->makeHidden([
            'id',
            'profile_id',
            'created_by',
            'created_at',
            'updated_at',
        ]);

        $report->pregnancy->makeHidden([
            'id',
            'profile_id',
            'created_by',
            'created_at',
            'updated_at',
        ]);

        $report->result->makeHidden([
            'id',
            'report_id',
            'created_at',
            'updated_at',
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $report,
        ]);
    }
}
