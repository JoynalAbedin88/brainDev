@extends('backend.layouts.master')

@section('ttile')
    <title>Create Home</title>
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
            <h2>Header Section 1</h2>
            <form action="{{ $section_1 ? route('home.update', $section_1->id) : route('home.store') }}" method="POST" enctype="multipart/form-data"> @csrf @if ($section_1) @method('put') @endif
                <div class="row">
                    <div class="form-group col-12">
                        <label for="heading">Heading Content</label>
                        <input type="text" id="heading" name="heading" class="form-control" placeholder="section_1 Heading" value="{{ $section_1 ? $section_1->heading : '' }}">
                    </div>
                    <input type="hidden" value="1" name="section">
                    {{-- <input type="hidden"> --}}
                   <div class="row col-12">
                    <div class="form-group col-4 col-md-3 m-auto">
                        @if ($section_1)
                        <img width="100%" src="{{ asset($section_1->img_1) }}" alt="">
                        @endif
                    </div>
                    <div class="form-group col-4 col-md-3 m-auto">
                        @if ($section_1)
                        <img width="100%" src="{{ asset($section_1->img_2) }}" alt="">
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
                        <textarea name="upper_pra" class="form-control" id="upper_pra" cols="30" rows="5" placeholder="First Pragraph">{{ $section_1 ? $section_1->pragraph_1 : '' }}</textarea>
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="lower_pra">Second Pragraph</label>
                        <textarea name="lower_pra" class="form-control" id="lower_pra" cols="30" rows="5" placeholder="Second Pragraph">{{ $section_1 ? $section_1->pragraph_2 : '' }}</textarea>
                    </div>
                    <div class="form-group col-12">
                        <button class="btn btn-primary px-5" type="submit">Save</button>
                    </div>
                </div>
            </form>

            <h2>Header Section 2</h2>
            <form action="{{ $section_2 ? route('home.update', $section_2->id) : route('home.store') }}" method="POST" enctype="multipart/form-data"> @csrf @if ($section_2) @method('put') @endif
                <div class="row">
                    <div class="form-group col-12">
                        <label for="heading">Heading Content</label>
                        <input type="text" id="heading" name="heading" class="form-control" placeholder="section_1 Heading" value="{{ $section_2 ? $section_2->heading : '' }}">
                    </div>
                    <input type="hidden" value="2" name="section">
                    {{-- <input type="hidden"> --}}
                   <div class="row col-12">
                    <div class="form-group col-4 col-md-3 m-auto">
                        @if ($section_2)
                        <img width="100%" src="{{ asset($section_2->img_1) }}" alt="">
                        @endif
                    </div>
                    <div class="form-group col-4 col-md-3 m-auto">
                        @if ($section_2)
                        <img width="100%" src="{{ $section_2 ? asset($section_2->img_2) : '' }}" alt="">
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
                        <textarea name="upper_pra" class="form-control" id="upper_pra" cols="30" rows="5" placeholder="First Pragraph">{{ $section_2 ? $section_2->pragraph_1 : '' }}</textarea>
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="lower_pra">Second Pragraph</label>
                        <textarea name="lower_pra" class="form-control" id="lower_pra" cols="30" rows="5" placeholder="Second Pragraph">{{ $section_2 ? $section_2->pragraph_2 : '' }}</textarea>
                    </div>
                    <div class="form-group col-12">
                        <button class="btn btn-primary px-5" type="submit">Save</button>
                    </div>
                </div>
            </form>

            <h2>Video Section</h2>
            <form action="{{ $section_3 ? route('home.update', $section_3->id) : route('home.store') }}" method="POST" enctype="multipart/form-data"> @csrf @if ($section_3) @method('put') @endif
                <div class="row">
                    <div class="form-group col-12">
                        <label for="heading">Heading Content</label>
                        <input type="text" id="heading" name="heading" class="form-control" placeholder="section_1 Heading" value="{{ $section_3 ? $section_3->heading : '' }}">
                    </div>
                    <input type="hidden" value="3" name="section">
                    {{-- <input type="hidden"> --}}
                   <div class="row col-12">
                    <div class="form-group col-6 col-md-4 m-auto">
                        @if ($section_2)
                        <img width="100%" src="{{ $section_3 ? asset( $section_3->img_1)  : '' }}" alt="">
                        @endif
                    </div>
                   </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="">Chose Second Image</label>
                        <input type="file" class="form-control-file" name="first_img">
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="">Your Video link <a target="_blank" href="{{ $section_3 ? $section_3->video : '' }}">play video</a></label>
                        <input type="text" class="form-control" name="video" placeholder="Video link">
                    </div>
                    <div class="form-group col-12">
                        <label for="upper_pra">First Pragraph</label>
                        <textarea name="upper_pra" class="form-control" id="upper_pra" cols="30" rows="5" placeholder="First Pragraph">{{ $section_3 ? $section_3->pragraph_1 : '' }}</textarea>
                    </div>
                    <div class="form-group col-12">
                        <button class="btn btn-primary px-5" type="submit">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection