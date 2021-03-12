@extends('backend.layouts.master')

@section('title')
    <title>Create Serviec</title>
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
<div class="conatiner">
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
    <div class="row mb-4">
        <a href="#servicetype" data-toggle="modal" class="btn btn-primary mx-2">Create Service Type</a>
        <a href="#service" data-toggle="modal" class="btn btn-primary mx-2">Create Service</a>
        <a href="#chooseModal" data-toggle="modal" class="btn btn-primary mx-2">Why choose us</a>
        <a href="{{ route('service_content.index') }}" class="btn btn-warning mx-2">Page Info</a>
    </div>
    <div class="row mb-5">
        <div class="col-12"><h3>All Service Type</h3></div>
        @foreach ($category as $item)
        <a href="#update{{ $item->id }}" data-toggle="modal" class="btn btn-light mx-2">{{ $item->name }} <i class="fas fa-edit ml-2"></i></a>

        <div class="modal fade" id="update{{ $item->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addNewAboutLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="addNewAboutLabel">About Section Content</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
        
                <form action="{{ route('category.update', $item->id) }}" method="post" enctype="multipart/form-data">
                    @csrf @method('put')
        
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="type">Service Type</label>
                            <input placeholder="Service Type" type="text" id="type" class="form-control" name="name" value="{{ $item->name }}">
                        </div>
                        <div class="form-group">
                            <label for="name">Short Content</label>
                            <textarea name="short" id="" cols="30" rows="3" class="form-control">{{ $item->pragraph }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="check">
                            <input id="check" name="status" {{ $item->status == 2 ? 'checked' : '' }} type="checkbox" class="form-control-checkbox" value="2"> View to Front page
                        </label>
                        </div>
                        <div class="form-group">
                            <img class="bg-primary p-2" src="{{ asset($item->icon) }}" alt="">
                            <label class="ml-2" for="name">Icon</label>
                            <input type="file" class="form-control-file" name="icon">
                        </div>
                        <input type="hidden" value="3322" name="service">
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                    </div>
        
                </form>
            </div>
            </div>
        </div>
        @endforeach
    </div>
    
    @foreach ($category as $item)
    @if ($item->service->count() != Null)
    <div class="row">
        <h3 class="pb-2" style="border-bottom: 2px solid #009688;display:inline-block">{{ $item->name }} Packages :</h3>
    </div>
    @endif
    <div class="row">
    @foreach ($item->service as $item)
        <div class="col-12 col-md-6 my-3">
            <img class="bg-primary p-2" src="{{ asset($item->icon) }}" alt="">
            <h4>{{ $item->name }} - <a href="{{ route('service.edit', $item->id) }}" >Edit <i class="fas fa-edit"></i></a></h4>
            <h4>Price : {{ $item->price }} BDT</h4>
            <p>{{ $item->description }}</p>
        </div>
        @endforeach
    </div>
    @endforeach

    <div class="row">
        <h3 id="choose" style="border-bottom: 2px solid #009688;display:inline-block">Why Choos Us :</h3>
    </div>
    <div class="row">
        @foreach ( $choose as $item)
        <div class="col-12 col-md-4 my-3">
            <img src="{{ asset($item->icon) }}" alt="">
            <h4>{{ $item->title }} - <a href="#chooseup{{ $item->id }}" data-toggle="modal" >Edit <i class="fas fa-edit"></i></a></h4>
            <p>{{ $item->content }}</p>
        </div>

        <div class="modal fade" id="chooseup{{ $item->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addNewAboutLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="addNewAboutLabel">Why choose Section Content Update</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
        
                <form action="{{ route('choose.update', $item->id) }}" method="post" enctype="multipart/form-data">
                    @csrf @method('put')
                    <div class="modal-body row">
                        <div class="form-group col-12 text-center">
                            <img src="{{ asset($item->icon) }}" alt="">
                        </div>
                        <div class="form-group col-12 ">
                            <label for="title">Title</label>
                            <input placeholder="Title" type="text" id="title" value="{{ $item->title }}" class="form-control" name="title">
                        </div>
                        <div class="form-group col-12">
                            <label for="icon">Icon</label>
                            <input type="file" class="form-control-file" name="icon">
                        </div>
                        <div class="form-group col-12">
                            <label for="desc">Description (Please Keep it Short)</label>
                            <textarea name="content" id="desc" cols="30" rows="3" class="form-control" placeholder="description">{{ $item->content }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                    </div>
        
                </form>
            </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


<div class="modal fade" id="servicetype" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addNewAboutLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="addNewAboutLabel">About Section Content</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>

        <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="modal-body">
                <div class="form-group">
                    <label for="type">Service Type</label>
                    <input placeholder="Service Type" type="text" id="type" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="name">Short Content</label>
                    <textarea name="short" id="" cols="30" rows="3" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="check">
                    <input id="check" name="status" type="checkbox" class="form-control-checkbox" value="2"> View to Front page
                </label>
                </div>
                <div class="form-group">
                    <label for="name">icon</label>
                    <input type="file" class="form-control-file" name="icon">
                </div>
                <input type="hidden" value="3322" name="service">
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
            </div>

        </form>
    </div>
    </div>
</div>

<div class="modal fade" id="service" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addNewAboutLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="addNewAboutLabel">About Section Content</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>

        <form action="{{ route('service.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body row">
                <div class="form-group col-12 col-md-6">
                    <label for="Name">Service Name</label>
                    <input placeholder="Service Name" type="text" id="Name" class="form-control" name="name">
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="Price">Price</label>
                    <input placeholder="Price" type="number" id="Price" class="form-control" name="price">
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="Name">Service Type</label>
                    <select name="type" class="form-control" >
                        <option value="" selected disabled>Select Service Type</option>
                        @foreach ($category as $item)
                        <option value="{{ encrypt($item->id) }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="icon">Icon</label>
                    <input type="file" class="form-control-file" name="icon">
                </div>
                <div class="form-group col-12">
                    <label for="special">
                        <input type="checkbox" id="special" value="12" class="form-control-checkbox" name="special">
                        Make Special
                    </label>
                </div>
                <div class="form-group col-12">
                    <label for="desc">Description (Please use # to show step by step)</label>
                    <textarea name="desc" id="desc" cols="30" rows="5" class="form-control" placeholder="description"></textarea>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
            </div>

        </form>
    </div>
    </div>
</div>

@if ($choose->count() > 7)
<div class="modal fade" id="chooseModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addNewAboutLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="addNewAboutLabel">Why choose Section Content</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>

        <form action="{{ route('choose.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body row">
                <div class="form-group col-12">
                    <label for="title">Title</label>
                    <input placeholder="Title" type="text" id="title" class="form-control" name="title">
                </div>
                <div class="form-group col-12">
                    <label for="icon">Icon</label>
                    <input type="file" class="form-control-file" name="icon">
                </div>
                <div class="form-group col-12">
                    <label for="desc">Description (Please Keep it Short)</label>
                    <textarea name="content" id="desc" cols="30" rows="3" class="form-control" placeholder="description"></textarea>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
            </div>

        </form>
    </div>
    </div>
</div>
@endif

@endsection
