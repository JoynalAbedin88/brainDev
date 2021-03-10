@extends('backend.layouts.master')

@section('title')
    <title>Design Service page</title>
@endsection

@section('content')
<div class="app-title">
    <div>
    <h1>Edit Service Info</h1>
    <p>A free and open source Bootstrap 4 admin template</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    </ul>
</div>
<section>
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
    <div class="col-12">
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
        <form action="{{ route('service_content.update', $serviceContent->id) }}" method="POST" enctype="multipart/form-data"> @csrf @method('put')
            <div class="row">
                <div class="col-8 text-center m-auto">
                    <img width="100%" src="{{ asset($serviceContent->service_img) }}" alt="">
                </div>
                <div class="form-group col-12 col-md-6">
                    <label >Category</label>
                    <select class="form-control" name="cetregory" id="">
                        <option value="" selected disabled>Select Category</option>
                        @foreach ($category as $item)
                            <option value="{{ encrypt($item->id) }}" {{ $serviceContent->category_id == $item->id ? 'selected' : ''}}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="">Chose First Image</label>
                    <input type="file" class="form-control-file" name="serviceImg">
                </div>
                <div class="form-group col-12 ">
                    <label for="serviceCon">Write About Service</label>
                    <textarea name="serviceCon" class="form-control" id="serviceCon" cols="30" rows="5" placeholder="Write About Service">{{ $serviceContent->serviceCon }}</textarea>
                </div>
                <div class="row col-12 my-3">
                    <div class="col-8 col-md-4 m-auto">
                        <img width="100%" src="{{ asset($serviceContent->discussion_img_1) }}" alt="">
                    </div>
                    <div class="col-8 col-md-4 m-auto">
                        <img width="100%" src="{{ asset($serviceContent->discussion_img_2) }}" alt="">
                    </div>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="">Project Discussion photo</label>
                    <input type="file" class="form-control-file" name="discussion_img_1">
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="">Project Discussion photo</label>
                    <input type="file" class="form-control-file" name="discussion_img_2">
                </div>
                <div class="form-group col-12">
                    <label for="discussion">Project Discussion</label>
                    <textarea name="discussion" class="form-control" id="discussion" cols="30" rows="5" placeholder="Project Discussion">{{ $serviceContent->discussion}}</textarea>
                </div>
                <div class="form-group col-12">
                    <button class="btn btn-primary px-5" type="submit">Save</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection