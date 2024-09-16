<?php

namespace App\Http\Controllers;

use App\Models\TigaJ;
use Illuminate\Http\Request;

class PrinsipTigajController extends Controller
{
    public function index()
    {
        $tigaj = TigaJ::first();
        return view('prinsip-tigaj.index', ['tigaj' => $tigaj]);
    }

    public function edit()
    {
        $tigaj = TigaJ::first();
        return view('prinsip-tigaj.edit', ['tigaj' => $tigaj]);
    }

    public function update(Request $request)
    {
        $tigaJ = TigaJ::first();
        $tigaJ->content = $request->content;
        $tigaJ->save();
        return redirect()->route('prinsip-3j.index')->with('success', 'Prinsip 3J diupdate');
    }
}
