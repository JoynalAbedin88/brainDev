@extends('backend.layouts.master')

@section('title')
    <title>Add Post</title>
@endsection

@section('content')
<div class="app-title">
    <div>
        <h1>Create Category</h1>
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
            <div class="col-12 col-md-8 m-auto">
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
                <div class="text-left my-3">
                    <a href="#category" data-toggle="modal" class="btn btn-primary">Add New Category</a>
                </div>
                <table class="table table-dark text-center">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Posts</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->blog->count() }}</td>
                            <td>
                                <a href="#update{{ $item->id }}" data-toggle="modal" class="btn btn-primary">Update</a>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
               </table>
            </div>
       </div>
       <!-- Modal -->
        <div class="modal fade" id="category" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addNewAboutLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="addNewAboutLabel">About Section Content</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>

                <form action="{{ route('category.store') }}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" id="name" class="form-control" name="name" placeholder="name">
                            <input type="hidden" name="slug" id="slug">
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Category</button>
                    </div>

                </form>
            </div>
            </div>
        </div>

        @foreach ($category as $item)
        <div class="modal fade" id="update{{ $item->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addNewAboutLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="addNewAboutLabel">About Section Content</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>

                <form action="{{ route('category.update', $item->id) }}" method="post">
                    @csrf
                    @method('put')

                    <div class="modal-body">
                        <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" id="name{{ $item->id }}" class="form-control" name="name" placeholder="name" value="{{ $item->name }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Category</button>
                    </div>

                </form>
            </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection

@section('script')
    <script>
        $('#name').keyup(function() {
			  $('#slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g,"-"));
        });
    </script>
@endsection