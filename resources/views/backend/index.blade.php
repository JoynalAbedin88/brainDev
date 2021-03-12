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
<section>
  <a href="#sponsor" data-toggle="modal" class="btn btn-primary">Add New Sponsor</a>
  <h2 class="my-2">Our Sponsers</h2>
  <div class="row my-2">
    @foreach ($sponsor as $item)
    <div style="" class="col-2 my-2">
      <img width="100%" src="{{ asset($item->image) }}" alt="">

      <a class="bg-warning btn text-center py-0" style="width: 100%;display: block;" href="{{ route('sponsor.destroy', $item->id) }}" onclick="event.preventDefault();
        document.getElementById('delete{{ $item->id }}').submit()">Delete</a>
        <form action="{{ route('sponsor.destroy', $item->id) }}" id="delete{{ $item->id }}" method="POST"> @csrf @method('delete')</form>
    </div>
    @endforeach
  </div>
</section>

<div class="modal fade" id="sponsor" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addNewAboutLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="addNewAboutLabel">Add New Sponsor Logo</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
      </div>

      <form action="{{ route('sponsor.store') }}" method="post" enctype="multipart/form-data">
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