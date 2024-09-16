<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Intervention;
use Illuminate\Http\Request;

class InterventionController extends Controller
{
    public function index()
    {
        $interventions = Intervention::select('key', 'title', 'content')->get();
        return $interventions;
    }


    public function show($key)
    {
        $intervention = Intervention::select('key', 'title', 'content')->where('key', $key)->first();
        if (!$intervention) {
            abort(404);
        }
        return $intervention;
    }
}
