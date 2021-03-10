@extends('backend.layouts.master')

@section('title')
    <title>{{ $about ?'Update':'Create' }}-About</title>
@endsection

@section('content')
    <div class="app-title">
        <div>
        <h1> {{ $about ?'Update':'Create' }} About</h1>
        <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        </ul>
    </div>
    <section>
        <div class="container">
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
                <form action="{{ $about ? route('about.update', $about->id) : route('about.store') }}" method="POST" enctype="multipart/form-data"> @csrf @if ($about) @method('put') @endif
                    <div class="row">
                        <div class="form-group col-12">
                            @if ($about)
                            <img width="100%" src="{{ asset($about->banner) }}" alt="">
                            @endif
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="">Chose Banner</label>
                            <input type="file" class="form-control-file" name="banner">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="heading">Heading Content</label>
                            <input type="text" id="heading" name="heading" class="form-control" placeholder="About Heading" value="{{ $about ? $about->heading : '' }}">
                        </div>
                       <div class="row col-12">
                        <div class="form-group col-4 col-md-3 m-auto">
                            @if ($about)
                            <img width="100%" src="{{ asset($about->upper_img) }}" alt="">
                            @endif
                        </div>
                        <div class="form-group col-4 col-md-3 m-auto">
                            @if ($about)
                            <img width="100%" src="{{ asset($about->lower_img) }}" alt="">
                            @endif
                        </div>
                       </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="">Chose First Image</label>
                            <input type="file" class="form-control-file" name="first_img">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="">Chose Second Image</label>
                            <input type="file" class="form-control-file" name="second_img">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="upper_pra">First Pragraph</label>
                            <textarea name="upper_pra" class="form-control" id="upper_pra" cols="30" rows="5" placeholder="First Pragraph">{{ $about ? $about->upper_pra : '' }}</textarea>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="lower_pra">Second Pragraph</label>
                            <textarea name="lower_pra" class="form-control" id="lower_pra" cols="30" rows="5" placeholder="Second Pragraph">{{ $about ? $about->lower_pra : '' }}</textarea>
                        </div>
                        <div class="form-group col-12">
                            <button class="btn btn-primary px-5" type="submit">Save</button>
                            <a href="{{ route('blog.index') }}" class="btn btn-warning px-4" target="_blank">Page Preview</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection