<?php

namespace App\Http\Controllers;

use App\Models\ResultConfig;
use Illuminate\Http\Request;

class ResultConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $resultConfigs = ResultConfig::orderBy('type')->get();
        return view('result-config.index', compact('resultConfigs'));
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
        $configs = $request->input('configs');
        $resultConfigs = ResultConfig::all();
        foreach ($resultConfigs as $resultConfig) {
            $resultConfig->description = $configs[$resultConfig->type][$resultConfig->name];
            $resultConfig->save();
        }
        return redirect()->route('result-config.index')->with('success', 'Status informasi berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
