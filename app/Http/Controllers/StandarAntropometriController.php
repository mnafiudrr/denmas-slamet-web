<?php

namespace App\Http\Controllers;

use App\Models\BodyHeightStandart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StandarAntropometriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $standarAntropometri = BodyHeightStandart::orderBy('id', 'asc')->get();

        return view('standar-antropometri.index', [
            'datas' => $standarAntropometri,
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
    public function update(Request $request)
    {
        try {
            $bodyHeightStandart = BodyHeightStandart::all();
    
            $data = $request->data;

            DB::beginTransaction();
    
            foreach ($bodyHeightStandart as $value) {
                $value->update([
                    'm3sd' => $data[$value->id]['m3sd'],
                    'm2sd' => $data[$value->id]['m2sd'],
                    'm1sd' => $data[$value->id]['m1sd'],
                    'median' => $data[$value->id]['median'],
                    'p1sd' => $data[$value->id]['p1sd'],
                    'p2sd' => $data[$value->id]['p2sd'],
                    'p3sd' => $data[$value->id]['p3sd'],
                ]);
            }

            DB::commit();

            return redirect()->route('standar-antropometri.index')->with('success', 'Berhasil mengubah data standar antropometri');
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->route('standar-antropometri.index')->with('error', 'Gagal mengubah data standar antropometri');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
