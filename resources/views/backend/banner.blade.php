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
                <th scope="col">Slider</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($banner as $item)
                <tr>
                    <th>
                        <img width="200" src="{{ asset($item->image) }}" alt="">
                    </th>
                    @if ($item->status==1)
                    <td><a href="{{ route('banner.update', $item->id) }}" class="btn btn-primary"><i class="fas fa-check"></i></a></td>
                    @else
                    <td><a href="{{ route('banner.update', $item->id) }}" class="btn btn-danger"><i class="fas fa-times"></i></a></td>
                    @endif
                </tr>
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