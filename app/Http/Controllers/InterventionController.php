<?php

namespace App\Http\Controllers;

use App\Models\Intervention;
use Illuminate\Http\Request;

class InterventionController extends Controller
{
    public function index()
    {
        $interventions = Intervention::all();
        return view('intervention.index', ['interventions' => $interventions]);
    }

    public function edit($id)
    {
        $intervention = Intervention::find($id);
        if (!$intervention) {
            return redirect()->route('interventions.index')->with('error', 'Intervensi tidak ditemukan');
        }
        return view('intervention.edit', ['intervention' => $intervention]);
    }

    public function update(Request $request, $id)
    {
        $intervention = Intervention::find($id);
        if (!$intervention)
            return redirect()->route('intervention.index')->with('error', 'Intervensi tidak ditemukan');

        $intervention->update($request->all());
        return redirect()->route('intervention.index')->with('success', 'Intervensi diupdate');
    }

    public function create()
    {
        return view('intervention.create');
    }

    public function store(Request $request)
    {
        $key = strtolower(str_replace(' ', '_', $request->input('title')));

        $existing = Intervention::where('key', $key)->first();
        if ($existing) {
            return redirect()->route('intervention.create')->with('error', 'Intervensi dengan judul tersebut sudah ada');
        }

        $request->merge(['key' => $key]);
        Intervention::create($request->all());
        return redirect()->route('intervention.index')->with('success', 'Intervensi ditambahkan');
    }

    public function destroy($id)
    {
        $intervention = Intervention::find($id);
        if (!$intervention)
            return redirect()->route('intervention.index')->with('error', 'Intervensi tidak ditemukan');

        $intervention->delete();
        return redirect()->route('intervention.index')->with('success', 'Intervensi dihapus');
    }
}
