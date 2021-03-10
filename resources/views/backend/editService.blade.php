@extends('backend.layouts.master')

@section('title')
    <title>Edit Service</title>
@endsection

@section('content')
<div class="app-title">
    <div>
    <h1>Create Services</h1>
    <p>A free and open source Bootstrap 4 admin template</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    </ul>
</div>
<section>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-10 m-auto">
                <form action="{{ route('service.update', $service->id) }}" method="post" enctype="multipart/form-data">
                    @csrf  @method('put')
                    <div class="row">
                        <div class="col-12 text-center mb-3">
                            <img class="bg-primary p-2" src="{{ asset($service->icon) }}" alt="">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="Name">Service Name</label>
                            <input placeholder="Service Name" type="text" id="Name" class="form-control" name="name" value="{{ $service->name }}">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="Price">Price</label>
                            <input placeholder="Price" type="number" id="Price" class="form-control" name="price" value="{{ $service->price }}">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="Name">Service Type</label>
                            <select name="type" class="form-control" >
                                <option value="" selected disabled>Select Service Type</option>
                                @foreach ($category as $item)
                                <option value="{{ encrypt($item->id) }}" {{ $service->category_id == $item->id ? 'selected' :'' }}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="icon">Icon</label>
                            <input type="file" class="form-control-file" name="icon">
                        </div>
                        <div class="form-group col-12">
                            <label for="special">
                                <input type="checkbox" {{ $service->special == 1 ? 'checked' : '' }} id="special" value="12" class="form-control-checkbox" name="special">
                                Make Special
                            </label>
                        </div>
                        <div class="form-group col-12">
                            <label for="desc">Description (Please use # to show step by step)</label>
                            <textarea name="desc" id="desc" cols="30" rows="5" class="form-control" placeholder="description">{{ $service->description }}</textarea>
                        </div>
                    </div>
                    <div class="">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('service.create') }}" class="btn btn-warning">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection