@extends('frontend.layouts.master')

@section('title')
    <title>Service</title>
@endsection

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <img src="{{ asset('storage/frontend/images/Rectangle2.png') }}" alt="">
        <div class="hero-container" data-aos="fade-up">
            <div>
              <h1 style="font-size: 4em;">Services Details</h1>
            </div>
        </div>
      </section>
    <!-- End Hero -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">
  
          <div class="row">
            <div class="col-xl-6 col-lg-6 d-flex flex-column align-items-stretch py-5 px-lg-5">
              <div class="box-heading" data-aos="fade-up">
                <h1 style="color:#033862">{{ $category->name }}</h1>
                <p>{{ $category->serviceInfo ? $category->serviceInfo->serviceCon :'' }}</p>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 img-box justify-content-center align-items-stretch" data-aos="zoom-in">
              <div class="img1 pb-0" style="width: 100%;">
                <img width="100%" height="100%" src="{{ $category->serviceInfo ? asset($category->serviceInfo->service_img) :'' }}" alt="">
              </div>
            </div>
          </div>
  
        </div>
      </section>
    <!-- End About Section -->
  
     <!-- ======= About Section ======= -->
     <section id="about" class="about">
      <div class="container">
  
        <div class="row">
          <div class="col-xl-6 col-lg-6 img-box justify-content-center align-items-stretch" data-aos="zoom-in">
              <div class="img1">
                <img width="100%" height="100%" src="{{ $category->serviceInfo ? asset($category->serviceInfo->discussion_img_1) :'' }}" alt="">
              </div>
              <div class="img2">
                <img width="100%" height="100%" src="{{ $category->serviceInfo ? asset($category->serviceInfo->discussion_img_2) :'' }}" alt="">
              </div>
          </div>
          <div class="col-xl-6 col-lg-6 d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            <div class="box-heading" data-aos="fade-up">
              <h1 style="color:#033862">Project Discussion</h1>
              <p>{{ $category->serviceInfo ? $category->serviceInfo->discussion :'' }}</p>
              <a href="#" class="btn text-white" style="background: #0077D7;">Read More</a>
            </div>
          </div>
        </div>
  
      </div>
    </section>
  <!-- End About Section -->
  
      <!-- ======= team ======= -->
  
      <section id="pricing">
          <div class="container">
              <div class="section-title" data-aos="zoom-in">
                  <h3 style="color:#033862">{{ $name }} Packages</h3>
                  <p>Price Plans</p>
                </div>
              <div class="row pricing">
                  @foreach ($category->service as $item)
                    <div class="col-12 col-md-6 col-lg-3 py-4" data-aos="fade-right">
                        @if ( $item->special == 1)
                        <div class="special"></div>
                        @endif
                        <span>
                            <img width="45px" src="{{ asset($item->icon) }}" alt="">
                        </span>
                        <h5>{{ $item->name }}</h5>
                        <h1 class="price">{{ $item->price }}</h1>
                        @foreach (explode('#' ,$item->description) as $content)
                        <p>{{ $content }}</p>
                        @endforeach
                    </div>
                  @endforeach
              </div>
              
          </div>
      </section>
  
      <section id="choose" class="pt-2">
          <div class="container">
              <div class="section-title" data-aos="zoom-in">
                  <h3 style="color:#033862">Why Choose Us</h3>
              </div>
              <div class="row">
                @foreach ($choose as $item)
                  <div class="col-12 col-md-6 col-lg-4 my-3">
                    <div class="img">
                      <img width="100%" src="{{ asset($item->icon) }}" alt="">
                    </div>
                  <div class="content">
                    <h5>{{ $item->title }}</h5>
                    <p>
                        <small>{{ $item->content }}</small>
                    </p>
                  </div>
                </div>
                @endforeach
              </div>
          </div>
      </section>
  
  
      <section id="question" class="pt-2">
        <div class="container">
          <div class="section-title" data-aos="zoom-in">
            <h3 style="color:#033862">Frequently Asked Questions</h3>
          </div>
          
            
              <div class="item">
                <h3 class="m-0">
                  <button class="btn btn-link" data-toggle="collapse" data-target="#qtn1">
                    <label for="check1" class="m-0">
                    Can I track my order?
                      <input id="check1" type="checkbox">
                      <span class="checked"></span>
                    </label>
                  </button>
                </h3>
                <div id="qtn1" class="collapse" aria-labelledby="headingOne">
                  <p class="px-3">Yes, your can! After placing your order you will receive an order confirmation via 
                    email. Each order starts production 24 hours after your order is placed. Within 72
                    hours of you placing your order, you will receive an expected delivery data. When 
                    the order ships, you will receive another email with the tracking number and a link.</p>
                </div>
              </div>
              <div class="item">
                <h3 class="m-0">
                  <button class="btn btn-link" data-toggle="collapse" data-target="#qtn2">
                    <label for="check2" class="m-0">
                      How long will my order be delivered?
                        <input id="check2" type="checkbox">
                        <span class="checked"></span>
                      </label>
                  </button>
                </h3>
                <div id="qtn2" class="collapse" aria-labelledby="headingOne">
                  <p class="px-3">Yes, your canrder, you will receive an expected delivery data. When 
                    the order ships, you will receive another email with the tracking number and a link.</p>
                </div>
              </div>
              <div class="item">
                <h3 class="m-0">
                  <button class="btn btn-link" data-toggle="collapse" data-target="#qtn3">
                    <label for="check3" class="m-0">
                      Can I return an item?
                        <input id="check3" type="checkbox">
                        <span class="checked"></span>
                    </label>
                  </button>
                </h3>
                <div id="qtn3" class="collapse" aria-labelledby="headingOne">
                  <p class="px-3">Yes, your can! After placing your order you will receive an order confirmation via 
                    email. Each order starts production 24 hours after your order is placed. Within 72
                    hours of you placing your or, you will receive an expected delivery data. When 
                    the order ships, you will receive another email with the tracking number and a link.</p>
                </div>
              </div>
              <div class="item">
                <h3 class="m-0">
                  <button class="btn btn-link" data-toggle="collapse" data-target="#qtn4">
                    <label for="check4" class="m-0">
                      How can I change someting in my order?
                        <input id="check4" type="checkbox">
                        <span class="checked"></span>
                    </label>
                  </button>
                </h3>
                <div id="qtn4" class="collapse" aria-labelledby="headingOne">
                  <p class="px-3">Yes, your can! After placing your order you will receive an order confirmation via 
                    email. Each order starts prodafter your order is placed. Within 72
                    hours of you placing your order, you wir email with the tracking number and a link.</p>
                </div>
              </div>
              <div class="item">
                <h3 class="m-0">
                  <button class="btn btn-link" data-toggle="collapse" data-target="#qtn5">
                    <label for="check5" class="m-0">
                      What is a unique/ non - unique purchase?
                        <input id="check5" type="checkbox">
                        <span class="checked"></span>
                    </label>
                  </button>
                </h3>
                <div id="qtn5" class="collapse" aria-labelledby="headingOne">
                  <p class="px-3">Yes, your can! After placing your order you will receive an order confirmation via 
                    email. Each order starts production 24 hours af</p>
                </div>
              </div>
              <div class="item">
                <h3 class="m-0">
                  <button class="btn btn-link" data-toggle="collapse" data-target="#qtn6">
                    <label for="check6" class="m-0">
                      How can I pay for my order?
                        <input id="check6" type="checkbox">
                        <span class="checked"></span>
                    </label>
                  </button>
                </h3>
                <div id="qtn6" class="collapse" aria-labelledby="headingOne">
                  <p class="px-3">Yes, your can! After placing your order you will receive an order confirmation via 
                    email. Each order starts production 24 hours after your oacking number and a link.</p>
                </div>
              </div>
            
        </div>
      </section>
      <section class="pt-2">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-12">
              <h2 style="color: #0077D7;font-weight: 700;">Let’s Stay in Touch!</h2>
            </div>
            <div class="col-md-6 col-12">
              <form action="#">
                <div class="row subscribe">
                  <div class="col-8">
                    <input type="email" placeholder="Enter Your Email ..." class="form-control">
                  </div>
                  <div class="col-4">
                    <button class="btn" type="submit">SUBSCRIBE</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
@endsection