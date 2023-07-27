@extends('layouts.master')

@section('title', 'Template Dashboard')

@section('navbar-class', 'navbar navbar-main navbar-expand-lg bg-transparent shadow-none position-absolute px-4 w-100 z-index-2')
@section('navbar-id', 'navbar-main')
@section('navbar-scroll', false)

@section('page-header')
  @include('layouts.templates.page-header')
@endsection

@section('content')
  
  @include('layouts.templates.profile-info')
  
@endsection