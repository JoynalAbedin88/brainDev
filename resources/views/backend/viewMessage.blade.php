@extends('backend.layouts.master')

@section('title')
    <title>Messages</title>
@endsection

@section('content')
<div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i> Messages View</h1>
      <p>A free and open source Bootstrap 4 admin template</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    </ul>
</div>
<section>
    <h2>Messages</h2>

    <div class="row my-4">
        <div class="col-12 col-md-10 m-auto">
            <h2>{{ $contact->name }}</h2>
            <h5>{{ $contact->email }}</h5>
            <h5>{{ $contact->phone }}, {{ $contact->company }}</h5>
            <p class="mt-3">{{ $contact->message }}</p>
            <a class="btn btn-warning px-4" href="{{ route('contact.message') }}">Back</a>
        </div>
    </div>
</section>
@endsection