@extends('backend.layouts.master')

@section('title')
    <title>Banner Create</title>
@endsection
@section('content')
<div class="app-title">
    <div>
    <h1> Create banner</h1>
    <p>A free and open source Bootstrap 4 admin template</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    </ul>
</div>
    <section >
        <a href="#banner" data-toggle="modal" class="btn btn-primary">Add New Banner</a>
        <table class="table text-center">
            <thead>
              <tr>
                <th scope="col">Photo</th>
                <th scope="col">Heading</th>
                <th scope="col">Short Paragraph</th>
                <th scope="col">Slider</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($banner as $item)
                <tr>
                    <th>
                        <img width="200" src="{{ asset($item->image) }}" alt="">
                    </th>
                    <td>{{ $item->heading }}</td>
                    <td>{{ $item->short }}</td>
                    @if ($item->status==1)
                    <td><a href="{{ route('banner.show', $item->id) }}" class="btn btn-primary"><i class="fas fa-check"></i></a></td>
                    @else
                    <td><a href="{{ route('banner.show', $item->id) }}" class="btn btn-danger"><i class="fas fa-times"></i></a></td>
                    @endif
                    <td>
                        <a href="#banner{{ $item->id }}" data-toggle="modal" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('banner.destroy', $item->id) }}" onclick="event.preventDefault();
                                        document.getElementById('delete{{ $item->id }}').submit()" class="btn btn-warning"><i class="fas fa-trash-alt"></i></a>
                    </td>
                    <form action="{{ route('banner.destroy', $item->id) }}" id="delete{{ $item->id }}" method="POST"> @csrf @method('delete')</form>
                </tr>

                <div class="modal fade" id="banner{{ $item->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addNewAboutLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="addNewAboutLabel">About Section Content</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                
                        <form action="{{ route('banner.update', $item->id) }}" method="post" enctype="multipart/form-data">
                            @csrf @method('put')
                
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Heading</label>
                                    <input value="{{ $item->heading }}" type="text" name="heading" class="form-control" placeholder="Heading">
                                </div>
                                <div class="form-group">
                                    <label for="">Short Paragraph</label>
                                    <input value="{{ $item->short }}" type="text" name="short" class="form-control" placeholder="Short Paragraph">
                                </div>
                                <input type="hidden" name="slider" value="334" id="">
                                <div class="form-group">
                                    <img  width="100%" src="{{ asset($item->image) }}" alt="">
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
            </tbody>
          </table>
    </section>

    <div class="modal fade" id="banner" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addNewAboutLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="addNewAboutLabel">About Section Content</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
    
            <form action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
                @csrf
    
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Heading</label>
                        <input type="text" name="heading" class="form-control" placeholder="Heading">
                    </div>
                    <div class="form-group">
                        <label for="">Short Paragraph</label>
                        <input type="text" name="short" class="form-control" placeholder="Short Paragraph">
                    </div>
                    <input type="hidden" name="slider" value="334" id="">
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