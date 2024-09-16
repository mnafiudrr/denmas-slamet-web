<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FrequentlyAskedQuestion;
use Illuminate\Http\Request;

class FrequentlyAskedQuestionController extends Controller
{
    public function index()
    {
        $faqs = FrequentlyAskedQuestion::select('question', 'answer')->orderBy('position', 'asc')->get();
        return $faqs;
    }
}
