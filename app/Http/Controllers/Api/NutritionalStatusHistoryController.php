<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BodyHeightStandart;
use App\Models\NutritionalStatusHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NutritionalStatusHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $nutritionalStatusHistories = NutritionalStatusHistory::query();

        if (!auth()->user()->is_admin) {
            $nutritionalStatusHistories->where('created_by', auth()->user()->id);
        }

        $nutritionalStatusHistories = $nutritionalStatusHistories->get();

        $nutritionalStatusHistories->map(function ($nutritionalStatusHistory) {
            return [
                "id" => $nutritionalStatusHistory->id,
                "birth_date" => $nutritionalStatusHistory->birth_date,
                "age" => $nutritionalStatusHistory->age,
                "height" => $nutritionalStatusHistory->height,
                "status" => $nutritionalStatusHistory->status,
                "created_at" => $nutritionalStatusHistory->created_at,
                "created_by" => $nutritionalStatusHistory->createdBy->name,
            ];
        });

        return response()->json([
            'status' => 'success',
            'data' => $nutritionalStatusHistories,
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
            'birth_date' => 'required|string',
            'gender' => 'required|string',
            'height' => 'required|numeric',
        ]);

        DB::beginTransaction();
        try {
            $ageInMonth = $this->calculateAgeInMonth($request->birth_date);
            $height = $request->height;
            
            $bodyHeightStandard = BodyHeightStandart::query()->where('age', $ageInMonth)->where('gender', $request->gender)->first();

            if (!$bodyHeightStandard) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Data tidak ditemukan',
                ], 404);
            }

            if ($height < $bodyHeightStandard->m3sd) {
                $status = 'Sangat Pendek';
            } elseif ($height < $bodyHeightStandard->m2sd) {
                $status = 'Pendek';
            } elseif ($height < $bodyHeightStandard->p3sd) {
                $status = 'Normal';
            } else {
                $status = 'Tinggi';
            }

            $nutritionalStatusHistory = NutritionalStatusHistory::create([
                "birth_date" => $request->birth_date,
                "age" => $ageInMonth,
                "gender" => $request->gender,
                "height" => $height,
                "status" => $status,
                "created_by" => auth()->user()->id,
            ]);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'data' => $nutritionalStatusHistory,
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

    private function calculateAgeInMonth(string $birthDate)
    {
        $birthDate = date_create($birthDate);
        $currentDate = date_create(date('Y-m-d'));
        $diff = date_diff($birthDate, $currentDate);
        $ageInMonth = $diff->format('%m');
        return $ageInMonth;
    }
}
