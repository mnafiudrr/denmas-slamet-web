@extends('layouts.master')

@section('title', 'Tambah Pertanyaan')

@section('content')
<form action="" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Tambah Tanya Jawab</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="form-group">
                        <label for="question">Pertanyaan</label>
                        <input type="text" name="question" class="form-control" placeholder="Pertanyaan">
                    </div>
                    <div class="form-group">
                        <label for="answer">Jawaban</label>
                        <textarea class="form-control form-control-alternative" rows="5" id="answer" name="answer" placeholder="Jawaban"></textarea>
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
