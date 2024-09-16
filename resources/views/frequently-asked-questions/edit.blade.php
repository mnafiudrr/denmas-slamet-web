@extends('layouts.master')

@section('title', 'Ubah Pertanyaan dan Jawaban')

@section('content')
<form action="" method="POST">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Tambah Pertanyaan dan Jawaban</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="form-group">
                        <label for="position">Urutan Ke</label>
                        <input type="number" name="position" class="form-control" placeholder="1" value="{{ $faq->position }}">
                    </div>
                    <div class="form-group">
                        <label for="question">Pertanyaan</label>
                        <input type="text" name="question" class="form-control" placeholder="Pertanyaan" value="{{ $faq->question }}">
                    </div>
                    <div class="form-group">
                        <label for="answer">Jawaban</label>
                        <textarea class="form-control form-control-alternative" rows="5" id="answer" name="answer" placeholder="Jawaban">{{ $faq->answer }}</textarea>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn bg-gradient-primary">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection