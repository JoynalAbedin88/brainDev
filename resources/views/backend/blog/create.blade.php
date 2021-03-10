@extends('backend.layouts.master')

@section('title')
    <title>Add Post</title>
@endsection

@section('content')

<div class="app-title">
    <div>
        <h1>Create Blog Post</h1>
        <p>A free and open source Bootstrap 4 admin template</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    </ul>
</div>
<section>
    <div class="container">
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
        <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data"> @csrf
            <div class="row p-4">
                <div class="form-group col-12 col-md-6">
                    <label for="title">Post Title</label>
                    <input type="text" name="title" value="{{ old('title') }}" id="title" class="form-control" placeholder="Title">
                    <input type="hidden" name="slug" value="{{ old('slug') }}" id="slug">
                </div>

                <div class="form-group col-12 col-md-6">
                    <label for="">Post Type</label>
                    <select class="form-control" name="type" >
                        <option value="" disabled selected>Select Post Type</option>
                        @foreach ($category as $item)
                        <option value="{{ encrypt($item->id) }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12 col-md-6 form-group">
                    <label for="">Image</label>
                    <input type="file" class="form-control-file" name="file">
                </div>

                <div class="col-12 col-md-6 form-group">
                    <label for="video">Only Youtube video link</label>
                    <input type="text" id="video" class="form-control" name="video"  placeholder="Video link" value="{{ old('video') }}">
                </div>

                <div class="col-12 form-group">
                    <label for="content">Post Content</label>
                    <textarea name="content" id="content" class="form-control">{!! old('content') !!}</textarea>
                </div>

                <div class="col-12 form-group">
                    <button type="submit" class='btn btn-primary px-4'>Post Submit</button>
                </div>
            </div>
        </form>
    </div>
</section>


@endsection

@section('script')
<script src="https://cdn.ckeditor.com/ckeditor5/19.0.0/classic/ckeditor.js"></script>
<script>
        $('#title').keyup(function() {
			  $('#slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g,"-"));
        });
</script>
<script>
    ClassicEditor
        .create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection