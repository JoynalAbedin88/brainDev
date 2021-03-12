@extends('backend.layouts.master')

@section('title')
    <title>Contact Info</title>
@endsection

@section('content')
<div class="app-title">
    <div>
    <h1> Contact Information</h1>
    <p>A free and open source Bootstrap 4 admin template</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    </ul>
</div>
<section>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ $contact ? route('contact.update', $contact->id) : route('contact.store') }}" method="POST"> @csrf
        @if ($contact)
            @method('put')
        @endif
        <div class="row">
            <div class="col-12 col-sm-6 form-group">
                <label for="phone_1">First Phone Number</label>
                <input type="number" value="{{ $contact ? $contact->phone_1 : '' }}" id="phone_1" class="form-control" name="phone_1" placeholder="First Phone Number">    
            </div>       
            <div class="col-12 col-sm-6 form-group">
                <label for="phone_1">Second Phone Number</label>
                <input type="number" value="{{ $contact ? $contact->phone_2 : '' }}" id="phone_1" class="form-control" name="phone_2" placeholder="Second Phone Number">
            </div>       
            <div class="col-12 col-sm-6 form-group">
                <label for="email_1">First Email</label>
                <input type="email" value="{{ $contact ? $contact->email_1 : '' }}" id="email_1" class="form-control" name="email_1" placeholder="First Email"> 
            </div>       
            <div class="col-12 col-sm-6 form-group">
                <label for="email_2">First Email</label>
                <input type="email" value="{{ $contact ? $contact->email_2 : '' }}" id="email_2" class="form-control" name="email_2" placeholder="Second Email">    
            </div>      
            <div class="col-12 col-sm-6 form-group">
                <label for="address">Address</label>
                <input type="text" value="{{ $contact ? $contact->address : '' }}" id="address" class="form-control" name="address"  placeholder="Address">    
            </div> 
            <div class="col-12 col-sm-6 form-group">
                <label for="map">Google Map link</label>
                <input type="text" id="map" name="map" class="form-control" placeholder="Google Map link">    
            </div>
            <div class="col-8 m-auto">
                {{ $contact ? $contact->map :'' }}
            </div>
            <div class="col-12">
                <button class="btn btn-primary px-4" type="submit">Save</button>
            </div>
        </div>
    </form>
</section>
@endsection