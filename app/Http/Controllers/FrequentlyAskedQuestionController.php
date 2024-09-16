<?php

namespace App\Http\Controllers;

use App\Models\FrequentlyAskedQuestion;
use Illuminate\Http\Request;

class FrequentlyAskedQuestionController extends Controller
{
    public function index()
    {
        $faqs = FrequentlyAskedQuestion::orderBy('position', 'asc')->get();
        return view('frequently-asked-questions.index', ['faqs' => $faqs]);
    }

    public function create()
    {
        return view('frequently-asked-questions.create');
    }

    public function store(Request $request)
    {
        FrequentlyAskedQuestion::create($request->all());
        return redirect()->route('frequently-asked-questions.index')->with('success', 'Berhasil disimpan');
    }

    public function edit($id)
    {
        $faq = FrequentlyAskedQuestion::find($id);
        if (!$faq) {
            return redirect()->route('frequently-asked-questions.index')->with('error', 'FAQ tidak ditemukan');
        }
        return view('frequently-asked-questions.edit', ['faq' => $faq]);
    }

    public function update(Request $request, $id)
    {
        $faq = FrequentlyAskedQuestion::find($id);
        if (!$faq)
            return redirect()->route('frequently-asked-questions.index')->with('error', 'FAQ tidak ditemukan');
        
        $faq->update($request->all());
        return redirect()->route('frequently-asked-questions.index')->with('success', 'Berhasil diupdate');
    }

    public function destroy($id)
    {
        $faq = FrequentlyAskedQuestion::find($id);
        if (!$faq)
            return redirect()->route('frequently-asked-questions.index')->with('error', 'FAQ tidak ditemukan');
        
        $faq->delete();
        return redirect()->route('frequently-asked-questions.index')->with('success', 'Berhasil dihapus');
    }
}
