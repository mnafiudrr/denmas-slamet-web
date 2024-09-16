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
            return redirect()->route('interventions.index');
        }
        return view('intervention.edit', ['intervention' => $intervention]);
    }

    public function update(Request $request, $id)
    {
        $intervention = Intervention::find($id);
        if (!$intervention)
            return redirect()->route('intervention.index');
        
        $intervention->update($request->all());
        return redirect()->route('intervention.index');
    }
}
