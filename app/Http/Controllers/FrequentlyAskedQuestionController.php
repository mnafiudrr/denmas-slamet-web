<?php

namespace App\Http\Controllers;

use App\Models\FrequentlyAskedQuestion;
use Illuminate\Http\Request;

class FrequentlyAskedQuestionController extends Controller
{
    public function index()
    {
        $faqs = FrequentlyAskedQuestion::all();
        return view('frequently-asked-questions.index', ['faqs' => $faqs]);
    }

    public function create()
    {
        return view('frequently-asked-questions.create');
    }

    public function store(Request $request)
    {
        FrequentlyAskedQuestion::create($request->all());
        return redirect()->route('frequently-asked-questions.index');
    }

    public function edit($id)
    {
        $faq = FrequentlyAskedQuestion::find($id);
        if (!$faq) {
            return redirect()->route('frequently-asked-questions.index');
        }
        return view('frequently-asked-questions.edit', ['faq' => $faq]);
    }

    public function update(Request $request, $id)
    {
        $faq = FrequentlyAskedQuestion::find($id);
        if (!$faq)
            return redirect()->route('frequently-asked-questions.index');
        
        $faq->update($request->all());
        return redirect()->route('frequently-asked-questions.index');
    }
}
