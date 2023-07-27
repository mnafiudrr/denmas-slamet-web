@extends('layouts.master')

@section('title', 'Template Dashboard')

@section('content')
  
  @include('layouts.templates.card-counting')
  @include('layouts.templates.banner-with-image')
  @include('layouts.templates.graph')
  @include('layouts.templates.overview')
  
@endsection