@extends('backend.layouts.master')

@section('title')
    <title>Work Process</title>
@endsection

@section('content')
<div class="app-title">
    <div>
        <h1>Work Process</h1>
        <p>A free and open source Bootstrap 4 admin template</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    </ul>
</div>

<section>
    <h2 class="my-4">Work Process 
        @if ($process->count() < 3)
        <a href="#addProcess" data-toggle="modal" class="btn btn-primary">Add Work Process</a>
        @endif
    </h2>
    <div class="row">
    @foreach ($process as $item)
        <div class="col-10 col-md-4">
            <h3>{{ $item->heading }} <a href="#addProcess{{ $item->id }}" data-toggle="modal">Edit <i class="ml-2 fas fa-edit"></i></a></h3>
            <p>{{ $item->content }}</p>
        </div>
        
        <div class="modal fade" id="addProcess{{ $item->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addNewAboutLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="addNewAboutLabel">About Section Content</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
        
                <form action="{{ route('work-process.update', $item->id ) }}" method="post" enctype="multipart/form-data">
                    @csrf @method('put')
        
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Heading</label>
                            <input type="text" value="{{ $item->heading }}" name="heading" class="form-control" placeholder="Heading">
                        </div>
                        <div class="form-group">
                            <label for="content">Work Process</label>
                            <textarea name="content" id="content" placeholder="Work Process" class="form-control" cols="30" rows="5">{{ $item->content }}</textarea>
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
</section>
@if ($process->count() < 3)
<div class="modal fade" id="addProcess" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addNewAboutLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="addNewAboutLabel">About Section Content</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>

        <form action="{{ route('work-process.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="modal-body">
                <div class="form-group">
                    <label for="">Heading</label>
                    <input type="text" name="heading" class="form-control" placeholder="Heading">
                </div>
                <div class="form-group">
                    <label for="content">Work Process</label>
                    <textarea name="content" id="content" placeholder="Work Process" class="form-control" cols="30" rows="5"></textarea>
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