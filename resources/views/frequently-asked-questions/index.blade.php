@extends('layouts.master')

@section('title', 'Pertanyaan yang sering ditanyakan')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-md-10">
                            <h6>Pertanyaan yang sering ditanyakan</h6>
                        </div>
                        <div class="col-md-2 text-end">
                            <a href="{{ route('frequently-asked-questions.create') }}" class="btn bg-gradient-primary">Tambah</a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="accordion" id="accordionList">
                                @foreach ($faqs as $faq)
                                <div class="accordion-item mb-3">
                                    <h5 class="accordion-header" id="heading{{ $loop->iteration }}">
                                    <button class="accordion-button border-bottom font-weight-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $loop->iteration }}" aria-expanded="false" aria-controls="collapse{{ $loop->iteration }}">
                                        {{ $faq->question }}
                                        <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                        <i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                    </button>
                                    </h5>
                                    <div id="collapse{{ $loop->iteration }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $loop->iteration }}" data-bs-parent="#accordionList" style="">
                                    <div class="accordion-body text-sm opacity-8">
                                        <div class="card accordion-body">
                                            <div class="card-body">
                                                {{ $faq->answer }}
                                            </div>
                                            <div class="position-absolute end-5">
                                                <a href="{{ route('frequently-asked-questions.edit', ['id' => $faq]) }}">
                                                    <i class="fa fa-edit text-md pt-1 me-3 text-primary" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <div class="position-absolute end-0">
                                                <form action="{{ route('frequently-asked-questions.destroy', ['id' => $faq]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <i class="fa fa-trash text-md pt-1 me-3 text-danger remove-button" aria-hidden="true"></i>
                                                    <button type="submit" class="btn bg-gradient-primary" style="display:none"></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-md-10">
                            <h6>Daftar Pertanyaan</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <h6 class="mb-0">Urutan</h6>
                    <form
                        action="{{ route('frequently-asked-questions.reorder') }}"
                        method="POST"
                    >
                        @csrf
                        @method('PUT')
                        <ul class="list-group" id="sortable">
                            @foreach ($faqs as $faq)
                            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="text-sm">{{ $faq->question }}</h6>
                                    <input type="hidden" name="faqs[]" value="{{ $faq->id }}">
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <button type="submit" class="btn bg-gradient-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>
  $(document).ready(function() {
    $('.remove-button').click(function() {
        if (!confirm('Apakah kamu yakin?')) {
            return false;
        } else {
            $(this).closest('form').submit();
        }
    });

    $( function() {
        $( "#sortable" ).sortable();
    } );
  });
</script>
@endsection
