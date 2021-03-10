@extends('backend.layouts.master')

@section('title')
    <title>Admin/Dashboard</title>
@endsection

@section('content')
<div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
      <p>A free and open source Bootstrap 4 admin template</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    </ul>
</div>
@endsection