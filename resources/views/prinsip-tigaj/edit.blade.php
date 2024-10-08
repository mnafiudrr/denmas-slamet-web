@extends('layouts.master')

@section('title', 'Ubah Konten Prinsip 3J')

@section('head')
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.0/ckeditor5.css" />
@endsection

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
                            <h6>Ubah Konten Prinsip 3J</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="form-group">
                        <label for="deskripsi">Konten</label>
                        <textarea class="form-control form-control-alternative" id="content" name="content" placeholder="Content">{{ $tigaj->content }}</textarea>
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

@push('script')
<script type="importmap">
    {
        "imports": {
            "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/42.0.0/ckeditor5.js",
            "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/42.0.0/"
        }
    }
</script>
<script type="module">
    import {
            ClassicEditor,
            Essentials,
            Bold,
            Italic,
            Font,
            Paragraph,
            List,
            ListProperties,
            Alignment
        } from 'ckeditor5';

    ClassicEditor
        .create( document.querySelector( '#content' ), {
            plugins: [
                Essentials, Bold, Italic, Font, Paragraph, List, ListProperties, Alignment
            ],
            toolbar: {
                items: [
                    'undo', 'redo',
                    '|',
                    'fontfamily', 'fontsize', 'fontColor', 'fontBackgroundColor',
                    '|',
                    'bold', 'italic',
                    '|',
                    'bulletedList', 'numberedList',
                    '|',
                    'alignment',
                ]
            },
        } )
        .then( /* ... */ )
        .catch( /* ... */ );
</script>
@endpush