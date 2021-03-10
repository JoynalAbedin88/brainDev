@extends('frontend.layouts.master')

@section('title')
    
@endsection

@section('content')
      <!-- ======= Hero Section ======= -->
      <section id="hero">
        <img src="{{ asset($about->banner) }}" alt="">
        <div class="hero-container" data-aos="fade-up">
            <div>
              <h1 style="font-size: 4em;">About Us</h1>
            </div>
        </div>
      </section>
    <!-- End Hero -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">
  
          <div class="row">
            <div class="col-xl-6 col-lg-6 d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
              <div class="box-heading" data-aos="fade-up">
                <h1 style="color:#033862">{{ $about->heading }}</h1>
                <p><strong>{{ $about->upper_pra }}</strong></p>
                <div class="bar-content">
                  <div class="ml-4"><small>{{ $about->lower_pra }}</small></div>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 img-box justify-content-center align-items-stretch" data-aos="zoom-in">
              <div class="img1">
                <img width="100%" height="100%" src="{{ asset($about->upper_img) }}" alt="">
              </div>
              <div class="img2">
                <img width="100%" height="100%" src="{{ asset($about->lower_img) }}" alt="">
              </div>
            </div>
          </div>
  
        </div>
      </section>
    <!-- End About Section -->
  
      <!-- ======= team ======= -->
  
      <section id="team">
          <div class="container">
              <div class="section-title" data-aos="zoom-in">
                  <h3 style="color:#033862">Our Team Leaders</h3>
                </div>
              <div class="row leader" data-aos="fade-up">
                  @foreach ($leader as $item)
                    <div class="col-sm-4 col-12">
                        <div class="img-box">
                            <img  src="{{ asset($item->image) }}" alt="">
                            <div class="text-box">
                                <h6><strong>{{ $item->name }}</strong></h6>
                                <h6>{{ $item->designation }}</h6>
                            </div>
                        </div>
                    </div>
                  @endforeach
              </div>
          </div>
      </section>
  
      <section id="expert">
          <div class="container">
              <div class="section-title" data-aos="zoom-in">
                  <h3 style="color:#033862">Our Experienced Experts</h3>
                </div>
              <div class="row expert">
                  @foreach ($team as $item)
                    <div class="col-sm-6 col-md-3 col-12" data-aos="zoom-in">
                        <div class="img-box">
                            <img  src="{{ asset($item->image) }}" alt="">
                            <div class="text-box">
                                <h6><strong>{{ $item->name }}</strong></h6>
                                <h6 class="m-0">{{ $item->designation }}</h6>
                            </div>
                        </div>
                    </div>
                  @endforeach
  
              </div>
          </div>
      </section>
  
      <!-- ======= Testimonials Section ======= -->
      <section id="testimonials" class="testimonials pt-1">
        <div class="container">
          <div class="section-title" data-aos="zoom-in">
            <h3 style="color:#ddd">Our Happy Clients</h3>
          </div>
          <div class="owl-carousel testimonials-carousel" data-aos="zoom-in">
  
            <div class="testimonial-item">
              <div class="star">
                <span>&#9733;&#9733;&#9733;&#9733;&#9733;</span>
              </div>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <img src="assets/img/logoM.png" class="testimonial-img" alt="">
            </div>
  
            <div class="testimonial-item">
              <div class="star">
                <span>&#9733;&#9733;&#9733;&#9733;&#9733;</span>
              </div>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <img src="assets/img/logoM.png" class="testimonial-img" alt="">
            </div>
  
            <div class="testimonial-item">
              <div class="star">
                <span>&#9733;&#9733;&#9733;&#9733;&#9733;</span>
              </div>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <img src="assets/img/logoM.png" class="testimonial-img" alt="">
            </div>
  
            <div class="testimonial-item">
              <div class="star">
                <span>&#9733;&#9733;&#9733;&#9733;&#9733;</span>
              </div>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <img src="assets/img/logoM.png" class="testimonial-img" alt="">
            </div>
  
            <div class="testimonial-item">
              <div class="star">
                <span>&#9733;&#9733;&#9733;&#9733;&#9733;</span>
              </div>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <img src="assets/img/logoM.png" class="testimonial-img" alt="">
            </div>
  
          </div>
  
        </div>
      </section><!-- End Testimonials Section -->
@endsection