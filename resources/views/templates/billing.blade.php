@extends('layouts.master')

@section('title', 'Template Billing')

@section('content')
  
@include('layouts.templates.billing-card')
@include('layouts.templates.billing-table')
  
@endsection