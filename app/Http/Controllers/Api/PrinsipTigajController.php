<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TigaJ;
use Illuminate\Http\Request;

class PrinsipTigajController extends Controller
{
    public function index()
    {
        $tigaJs = TigaJ::select('content')->first();
        return $tigaJs;
    }
}
