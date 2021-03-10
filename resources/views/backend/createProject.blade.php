@extends('backend.layouts.master')

@section('title')
    <title>Create Project</title>
@endsection

@section('content')
<div class="app-title">
    <div>
    <h1> Create Project</h1>
    <p>A free and open source Bootstrap 4 admin template</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    </ul>
</div>
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
<section>
    <a href="#createProject" data-toggle="modal" class="btn btn-primary px-5">Create Project</a>
    <a href="#c_completeProject" data-toggle="modal" class="btn btn-primary px-5">Add Complete Project</a>
    <div class="row">
        <h2 class="p-3 m-0">Our Projects</h2>
    </div>
    <div class="row py-4">
        @foreach ($project as $item)
        <div class="col-ms-6 col-12 col-md-3">
            <img width="100%" src="{{ asset($item->image) }}" alt="">
            <h5 class="bg-light text-center p-2">{{ $item->category->name }} <a href="#createProject{{ $item->id }}" data-toggle="modal">Edit</a></h5>
        </div>

        <div class="modal fade" id="createProject{{ $item->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addNewAboutLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="addNewAboutLabel">About Section Content</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
        
                <form action="{{ route('project.update', $item->id) }}" method="post" enctype="multipart/form-data">
                    @csrf @method('put')
                    <div class="modal-body">
                        <div class="form-group text-center">
                            <img width="50%" src="{{ asset($item->image) }}" alt="">
                        </div>
                        <div class="form-group">
                            <label for="type">Project Type</label>
                            <select name="Project_type" class="form-control">
                                <option value="" selected disabled>Select Project Type</option>
                                @foreach ($category as $cat)
                                    <option value="{{ encrypt($cat->id) }}" {{ $item->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Project Photo</label>
                            <input type="file" class="form-control-file" name="image">
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
        @endforeach
    </div>

    <div class="row">
        <h2 class="p-3 m-0">Our Complete Projects</h2>
    </div>
    <div class="row">
        @foreach ($completeProject as $item)
        <div class="col-6 col-md-3 text-right">
            <img width="100%" src="{{ asset($item->image) }}" alt="">
            <a href="" onclick="event.preventDefault();
                        document.getElementById('delete{{ $item->id }}').submit()" class="btn btn-danger">Delete</a>
        </div>
        <form id="delete{{ $item->id }}" action="{{ route('project.destroy', $item->id) }}" method="POST"> @csrf @method('delete') </form>
        @endforeach
    </div>
</section>

<div class="modal fade" id="createProject" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addNewAboutLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="addNewAboutLabel">About Section Content</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>

        <form action="{{ route('project.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="modal-body">
                <div class="form-group">
                    <label for="type">Project Type</label>
                    <select name="Project_type" class="form-control">
                        <option value="" selected disabled>Select Project Type</option>
                        @foreach ($category as $item)
                            <option value="{{ encrypt($item->id) }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="project" value="dfhh fhfh flkfj">
                <div class="form-group">
                    <label for="">Project Photo</label>
                    <input type="file" class="form-control-file" name="image">
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

<div class="modal fade" id="c_completeProject" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addNewAboutLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="addNewAboutLabel">About Section Content</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>

        <form action="{{ route('project.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="modal-body">
                <div class="form-group">
                    <label for="">Project Photo</label>
                    <input type="file" class="form-control-file" name="image">
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
@endsection