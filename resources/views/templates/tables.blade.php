@extends('layouts.master')

@section('title', 'Template Tables')

@section('content')
  
  @include('layouts.templates.table-authors')
  @include('layouts.templates.table-projects')
  
@endsection