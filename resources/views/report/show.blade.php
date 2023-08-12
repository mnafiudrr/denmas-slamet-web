@extends('layouts.master')

@section('title', 'Detail Laporan')

@section('content')

<div class="row">
  <div class="col-12 col-xl-4">
    @include('report._pregnancy')
  </div>
  <div class="col-12 col-xl-4">
    @include('report._health')
  </div>
  <div class="col-12 col-xl-4">
    @include('report._result')
  </div>
</div>
  
@endsection


@section('scripts')
  
@endsection