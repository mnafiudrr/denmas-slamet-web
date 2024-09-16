@extends('layouts.master')

@section('title', 'Pertanyaan yang sering ditanyakan')

@section('content')
    <div class="row">
        <div class="col-md-6">
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
                                            <div class="position-absolute end-0">
                                                <a href="{{ route('frequently-asked-questions.edit', ['id' => $faq]) }}">
                                                    <i class="fa fa-edit text-md pt-1 me-3 text-primary" aria-hidden="true"></i>
                                                </a>
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
    </div>
@endsection
