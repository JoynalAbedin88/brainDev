@extends('frontend.layouts.master')

@section('title')
    <title>Project</title>
@endsection

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <img src="{{ asset('storage/frontend/images/Group 304.png') }}" alt="">
        <div class="hero-container" data-aos="fade-up">
            <div>
              <h1 style="font-size: 4em;">Project</h1>
            </div>
        </div>
      </section>
    <!-- End Hero -->

    <section id="latest-project">
        <div class="container">
            <div class="section-title" data-aos="zoom-in">
                <h3 style="color:#033862">Our Latest Projects</h3>
                <p>There are more latest project done yet.</p>
            </div>
            <div class="row latest-ptoject owl-carousel">
                @foreach ($latest as $item)   
                <div class="project-item">
                    <span>{{ $item->category ? $item->category->name : '' }}</span>
                    <img src="{{ asset($item->image) }}" alt="">
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ======= About Section ======= -->
       <!-- ======= Portfolio Section ======= -->
       <section id="portfolio" class="portfolio pt-2">
        <div class="container">
  
          <div class="section-title" data-aos="zoom-in">
            <h3>Our Projects</h3>
          </div>
  
          <div class="row">
            <div class="col-lg-12 d-flex justify-content-center" data-aos="fade-up">
              <ul id="portfolio-flters">
                <li data-filter="*" class="filter-active">All Works</li>
                @foreach ($category as $item)
                <li data-filter=".filter{{ $item->id }}">{{ $item->name }}</li>
                @endforeach
              </ul>
            </div>
          </div>
  
          <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">

            @foreach ($project as $item)
            <div class="col-lg-4 col-md-6 portfolio-item filter{{ $item->category_id }}">
                <img src="{{ asset($item->image) }}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h5>{{ $item->category ? $item->category->name : '' }}</h5>
                  {{-- <p>Development</p> --}}
                </div>
              </div>
            @endforeach
            
          </div>
  
        </div>
      </section>

    <!-- ======= team ======= -->
    <section id="com-prortfolio" class="pt-2">
        <div class="container">
            <div class="section-title" data-aos="zoom-in">
                <h3 style="color:#033862">The Complete Portfolio</h3>
                <p>Make an engaging magazine yet flexible, fast and lightweight website with the power
                    of Outsourceo exclusive magazine Elementor elements.</p>
            </div>
            <div style="width:70%" class="m-auto">
                <div class="com-prortfolio owl-carousel">
                    @foreach ($complete as $item)
                    <div class="item">
                        <img src="{{ asset($item->image) }}" alt="">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection