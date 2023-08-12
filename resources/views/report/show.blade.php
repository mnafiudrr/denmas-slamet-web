@extends('layouts.master')

@section('title', 'Detail Kesehatan / ' . $report->profile->fullname . ' / ' . date('d-m-Y H:i:s', strtotime($report->created_at)))

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