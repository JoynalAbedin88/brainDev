@extends('backend.layouts.master')

@section('title')
    <title>Add Post</title>
@endsection

@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/19.0.0/classic/ckeditor.js"></script>
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
            <div class="col-12 col-md-10 m-auto">
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
                    <a href="#memberAdd" data-toggle="modal" class="btn btn-primary">Add New Category</a>
                </div>
                <table class="table table-striped table-hover text-center">
                    <thead>
                        <tr>
                            <th colspan="4"><h5>Our Team Leaders</h5></th>
                        </tr>
                        <tr>
                            <th>S\L</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Designation</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($leader as $k => $item)
                        <tr>
                            <td>{{ $k+1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td><img width="50" src="{{ asset($item->image) }}" alt=""></td>
                            <td>{{ $item->designation }}</td>
                            <td>
                                <a href="#update{{$item->id}}" data-toggle="modal" class="btn btn-primary">Update</a>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
               </table>

               <table class="table table-striped table-hover text-center">
                <thead>
                    <tr>
                        <th colspan="4"><h5>Our Experienced Experts</h5></th>
                    </tr>
                    <tr>
                        <th>S\L</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Designation</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($team as $k => $item)
                    <tr>
                        <td>{{ $k+1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td><img width="50" src="{{ asset($item->image) }}" alt=""></td>
                            <td>{{ $item->designation }}</td>
                            <td>
                                <a href="#update{{$item->id}}" data-toggle="modal" class="btn btn-primary">Update</a>
                            </td>
                    </tr>
                    @endforeach
                    
                </tbody>
           </table>
            </div>
       </div>
       <!-- Modal -->
        <div class="modal fade" id="memberAdd" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addNewAboutLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="addNewAboutLabel">About Section Content</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>

                <form action="{{ route('team.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Member Image</label>
                            <input type="file" id="image" class="form-control-file" name="image">
                        </div>
                        <div class="form-group">
                            <label for="name">Member Name</label>
                            <input type="text" id="name" class="form-control" name="name" placeholder="name">
                        </div>
                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input type="text" id="designation" class="form-control" name="designation" placeholder="Designation">
                        </div>
                        <div class="form-group text-left">
                            <label for="leader">
                            <input type="checkbox" id="leader" class="form-control-checkbox" name="leader" value="2">
                            Make Team Leader
                        </label>
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

        @foreach ($all as $item)
        <div class="modal fade" id="update{{$item->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addNewAboutLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="addNewAboutLabel">About Section Content</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>

                <form action="{{ route('team.update', $item->id) }}" method="post" enctype="multipart/form-data">
                    @csrf @method('put')

                    <div class="modal-body">
                        <div class="form-group text-center">
                            <img width="150" src="{{ asset($item->image) }}" alt="">
                        </div>
                        <div class="form-group">
                            <label for="name">Member Image</label>
                            <input type="file" id="image" class="form-control-file" name="image">
                        </div>
                        <div class="form-group">
                            <label for="name">Member Name</label>
                            <input type="text" id="name" class="form-control" name="name" placeholder="name" value="{{ $item->name }}">
                        </div>
                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input type="text" id="designation" class="form-control" name="designation" placeholder="Designation" value="{{ $item->designation }}">
                        </div>
                        <div class="form-group text-left">
                            <label for="leader">
                            <input type="checkbox" id="leader" {{  $item->status == 2 ? 'checked' : '' }} class="form-control-checkbox" name="leader" value="2">
                            Make Team Leader
                        </label>
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
</section>
<script>
        .create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection

@section('script')
    <script>
        $('#name').keyup(function() {
			  $('#slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g,"-"));
        });
    </script>
@endsection