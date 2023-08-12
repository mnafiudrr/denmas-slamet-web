@extends('layouts.master')

@section('title', 'Result Config')

@section('content')
<form action="" method="POST">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Result Config</h6>
                        </div>
                        <div class="col-md-6 text-end">
                            <button type="submit" class="btn bg-gradient-primary">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    @foreach ($resultConfigs as $config)
                        <div class="form-group">
                            <label class="form-control-label">{{ $config->type }} - {{ $config->name }}</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="configs[{{ $config->type }}][{{ $config->name }}]"
                                    value="{{ $config->description }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
