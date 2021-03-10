@extends('backend.layouts.master')

@section('title')
    <title>Admin/Dashboard</title>
@endsection
<style>
    td{
        vertical-align: middle !important;
    }
</style>
@section('content')
<div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i> All Post</h1>
      <p>A free and open source Bootstrap 4 admin template</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    </ul>
</div>

<section>
    <table class="table table-striped table-hover text-center">
        <thead>
            <tr>
                <th>Title</th>    
                <th>Type</th>
                <th>Image</th>
                <th>Action</th>    
            </tr>   
        </thead>   
        <tbody>
            @foreach ($blog as $item)
            <tr>
                <td>{{ $item->title }}</td>    
                <td>Dashboard</td>    
                <td><img width="100px" src="{{ asset($item->image) }}" alt=""></td>    
                <td>
                    <a onclick="event.preventDefault();
                        document.getElementById('restore_form{{ $item->id }}').submit()" class="btn btn-primary"><i class="fas fa-undo"></i></a>

                    <a href="" onclick="event.preventDefault();
                                document.getElementById('delete_form{{ $item->id }}').submit()" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                </td>
                <form id="restore_form{{ $item->id }}" method="post" action="{{ route('blog.restore', $item->id) }}">
                    @csrf @method('put')
                </form> 
                <form id="delete_form{{ $item->id }}" method="post" action="{{ route('blog.forceDelete', $item->id) }}">
                    @csrf @method('put')
                </form>   
            </tr>
            @endforeach    
        </tbody> 
    </table>
</section>
@endsection