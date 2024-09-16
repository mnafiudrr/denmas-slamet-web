@extends('layouts.master')

@section('title', 'Prinsip 3J')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Prinsip 3J</h6>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('prinsip-3j.edit') }}" class="btn bg-gradient-primary">Edit</a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    @if (!$tigaj)
                        {{-- show text not found, please create new --}}
                        <div class="row">
                            <div class="col-md-10">
                                Data Prinsip 3J belum dibuat.
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-10">
                            {!! $tigaj->content !!}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
