@extends('frontend.layouts.master')

@section('content')
     <!-- ======= Hero Section ======= -->
     <div class="hero owl-carousel">
       @foreach ($banner as $item)
       <section id="hero">
        <img src="{{ asset($item->image) }}" alt="">
        <div class="hero-container" data-aos="fade-up">
            <div>
            <h1>{{ $item->heading }}</h1>
            <h2>{{ $item->short }}</h2>
            <a href="#about" class="btn-get-started scrollto">Get Started <i class="fas fa-arrow-right ml-2"></i></a>
            <a href="#about" class="btn-get-started scrollto scrollto-R">Get Started <i class="fas fa-arrow-right ml-2"></i></a>
            </div>
        </div>
    </section>
       @endforeach
        </div>
        <!-- End Hero -->
  
  
  
      <!-- ======= About Section ======= -->
      <section id="about" class="about">
        <div class="container">
  
          <div class="row">
            <div class="col-xl-6 col-lg-6 img-box justify-content-center align-items-stretch" data-aos="zoom-in">
              <div class="img1">
                <img width="100%" height="100%" src="{{ $section1 ? asset($section1->img_1) : ''}}" alt="">
              </div>
              <div class="img2">
                <img width="100%" height="100%" src="{{ $section1 ? asset($section1->img_2) : '' }}" alt="">
              </div>
              
            </div>
  
            <div class="col-xl-6 col-lg-6 d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
              <div class="box-heading" data-aos="fade-up">
                <h3>{{ $section1->heading }}</h3>
                <p><strong>{{ $section1 ? $section1->pragraph_1 : '' }}</strong></p>
                <div class="bar-content">
                  <div class="ml-4"><small>{{ $section1 ? $section1->pragraph_2 : '' }}</small></div>
                </div>
              </div>
            </div>
          </div>
  
        </div>
      </section>
    <!-- End About Section -->
  
      <!-- ======= Why Us Section ======= -->
      <section id="why-us" class="why-us">
        <div class="container">
  
          <div class="section-title" data-aos="zoom-in">
            <h3 style="color:#033862">Our Services</h3>
            <p>Ut possimus qui ut temporibus culpa velit eveniet modi.</p>
          </div>
  
          <div class="row">
            @foreach ($service as $item)
            <div class="col-lg-4 my-3">
              <div class="box" data-aos="fade-up">
                <div class="box-title">
                   <h4>
                     <img width="100%" src="{{ asset( $item->icon) }}" alt="">
                     {{-- <i class="fas fa-globe-europe"></i> --}}
                     {{  $item->name }}</h4>
                </div>
                <div>
                  <p style="margin-left:45px">{{  $item->pragraph }}</p>
                </div>
              </div>
            </div>
            @endforeach
  
          </div>
  
        </div>
      </section><!-- End Why Us Section -->
  
  
      <!-- ======= Cta Section ======= -->
      <section id="cta" class="cta" style="background: linear-gradient(rgba(2, 2, 2, 0.7), rgba(0, 0, 0, 0.9)), url({{ asset('storage/frontend/images/leptop.jpeg') }}) fixed center center;">
        <div class="container" data-aos="zoom-in">
  
  
          <div class="row counters">
  
            <div class="col-lg-3 col-6 text-center">
              <span class="text-white display-4">
                <span data-toggle="counter-up">20</span><span>+</span>
              </span>
              <p>YEARS OF EXPERIENCE</p>
            </div>
  
            <div class="col-lg-3 col-6 text-center">
              <span class="text-white display-4">
                <span data-toggle="counter-up">400</span><span>+</span>
              </span>
              <p>PROJECTS COMPLETED</p>
            </div>
  
            <div class="col-lg-3 col-6 text-center">
              <span class="text-white display-4">
                <span data-toggle="counter-up">300</span><span>+</span>
              </span>
              <p>EXPERT PROFESSIONALS</p>
            </div>
  
            <div class="col-lg-3 col-6 text-center">
              <span class="text-white display-4">
                <span data-toggle="counter-up">350</span><span>+</span>
              </span>
              <p>HAPPY CUSTOMERS</p>
            </div>
  
          </div>
        </div>
      </section>
      <!-- End Cta Section -->
       <!-- ======= About Section ======= -->
       <section id="about" class="about">
        <div class="container">
  
          <div class="row">
            <div class="col-xl-6 col-lg-6 d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
              <div class="box-heading" data-aos="fade-up">
                <h3>{{ $section2 ? $section2->heading : '' }}</h3>
                <p><strong>{{ $section2 ? $section2->pragraph_1 : '' }}</strong></p>
                <div class="bar-content bar-list">
                  <div class="ml-4">
                    <ul>
                      @foreach (explode('#', $section2->pragraph_2) as $item)
                      <li> <span></span> With The Aspects Of Professiona</li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
            </div>
  
            <div class="col-xl-6 col-lg-6 img-box justify-content-center align-items-stretch" data-aos="zoom-in">
              <div class="img1" style="width: 70%;">
                <img width="100%" height="100%" src="{{ asset($section2->img_1) }}" alt="">
              </div>
              <div class="img2" style="width: 70%;">
                <img width="100%" height="100%" src="{{ asset($section2->img_2) }}" alt="">
              </div>
              
            </div>
          </div>
  
        </div>
      </section>
    <!-- End About Section -->
  
    <section id="about" class="about text-white" style="position: relative;">
      <div class="container">
  
        <div class="row">
          <div class="col-xl-6 col-lg-6 video-box d-flex justify-content-center align-items-stretch" data-aos="zoom-in" style=" background: url({{ $section3 ? asset($section3->img_1) :"" }}) center center no-repeat;">
            <a href="{{ $section3 ? $section3->video : '' }}" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
          </div>
          <div class="col-xl-6 col-lg-6 d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            <div class="box-heading" data-aos="fade-up">
              <h3 class="text-white">{{ $section3 ? $section3->heading : '' }}</h3>
              <p><strong>{{ $section3 ? $section3->pragraph_1 : '' }}</strong></p>
              <div class="">
                <a href="#" class="btn text-white" style="background: #0077D7;">More About Us </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="multi-color">
        <div class="vid-color-1"></div>
        <div class="vid-color-2"></div>
      </div>
    </section>
      <!-- ======= Services Section ======= -->
      <section id="work">
        <div class="container">
  
          <div class="section-title" data-aos="zoom-in">
            <h3>Our Working Process</h3>
          </div>
  
          <div class="row text-center">
            <div class="col-md-4 col-12 stap" data-aos="zoom-in">
              <span>1</span>
            </div>
            <div class="col-md-4 col-12 stap" data-aos="zoom-in">
              <span>2</span>
            </div>
            <div class="col-md-4 col-12 stap line-no" data-aos="zoom-in">
              <span>3</span>
            </div>
            <div class="col-md-4 col-12 mt-5" data-aos="fade-up">
              <h4>Select A Project</h4>
              <p>We havwe the technology and industry 
                expertise to develop solutions that can
                connect people and businesses across 
                variety of mobile devices</p>
            </div>
            <div class="col-md-4 col-12 mt-5" data-aos="fade-up">
              <h4>Project Analysis </h4>
              <p>We havwe the technology and industry 
                expertise to develop solutions that can
                connect people and businesses across 
                variety of mobile devices</p>
            </div>
            <div class="col-md-4 col-12 mt-5" data-aos="fade-up">
              <h4>Deliver Result</h4>
              <p>We havwe the technology and industry 
                expertise to develop solutions that can
                connect people and businesses across 
                variety of mobile devices</p>
            </div>
            
          </div>
  
        </div>
      </section>
      <!-- End Services Section -->
      <section id="sponsor" class="pb-1">
        <div class="sponsor owl-carousel">
          <div>
            <img width="100%" src="{{ asset('storage/frontend/images/0526_Logo_06.png') }}" alt="">
          </div>
          <div>
            <img width="100%" src="{{ asset('storage/frontend/images/Adidas.png') }}" alt="">
          </div>
          <div>
            <img width="100%" src="{{ asset('storage/frontend/images/bigbrands.webp') }}" alt="">
          </div>
          <div>
            <img width="100%" src="{{ asset('storage/frontend/images/images.png') }}" alt="">
          </div>
          <div>
            <img width="100%" src="{{ asset('storage/frontend/images/logo.png') }}" alt="">
          </div>
          <div>
            <img width="100%" src="{{ asset('storage/frontend/images/MAIN.png') }}" alt="">
          </div>
          <div>
            <img width="100%" src="{{ asset('storage/frontend/images/0526_Logo_06.png') }}" alt="">
          </div>
        </div>
      </section>
  
      <section id="latest-news">
        <div class="container">
          <div class="section-title pb-5" data-aos="zoom-in">
            <h3 style="color:#033862">Latest News</h3>
          </div>
          <div class="row">
            @if ($blog->first())
            <div class="col-sm-6 col-12 left-news" data-aos="zoom-in">
              <img src="{{ $blog->first() ? asset($blog->first()->image) : '' }}" alt="">
              <div class="content">
                <span>{{ $blog->first() ? $blog->first()->created_at->format('F d, Y') : '' }}</span>
                <h5 class="my-3"><strong>{{ $blog->first() ? $blog->first()->title : '' }}</strong></h5>
                <p>{!! $blog->first() ? substr($blog->first()->content, 0, 200) : '' !!}</p>
              </div>
            </div>
            @endif
            <div class="col-sm-6 col-12 right-news">
              @foreach ($blog->limit(3)->get() as $item)
              @if ($blog->first()->id !=  $item->id)
              <div class="content mb-3" data-aos="fade-down">
                <div class="img" style="background: url({{ asset($item->image) }});"></div>
                <div class="text">
                  <h6 class="my-3"><strong>{{ $item->title }}</strong></h6> 
                  <small>{!! substr($item->content, 0, 150) !!}</small>
                </div>
              </div>
              @endif
              @endforeach
            </div>
          </div>
        </div>
      </section>
@endsection