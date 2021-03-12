<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  @yield('title')
  
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/css/icofont.min.css') }}" rel="stylesheet">
  {{-- <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet"> --}}
  <link href="{{ asset('frontend/css/venobox.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/css/aos.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>

  <!-- Template Main CSS File -->
  <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">

</head>

<body>
@php
    $contact = App\Models\ContactInfo::all()->first();
@endphp
  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-phone"></i> +{{ $contact->phone_1 }}
        <i class="icofont-envelope"></i><a href="mailto:contact@example.com">{{ $contact->email_1 }}</a>
      </div>
      <div class="social-links">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
        <a href="#" class="linkedin"><i class="fab fa-google-plus-g"></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container d-flex">

      <div class="logo mr-auto">
        <!-- <h1 class="text-light"><a href="{{ route('front.index') }}">Brain <span class="text-danger">Share</span></a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="{{ route('front.index') }}"><img src="{{ asset('frontend/images/logoM.png') }}" alt="" class="img-fluid"></a>
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="{{ route('front.index') }}">Home</a></li>
          <li><a href="{{ route('front.about') }}">About Us</a></li>
          <li class="drop-down"><a href="#">Services</a>
            <ul>
              @foreach (App\Models\Category::where('what', 2)->orderBy('name', 'asc')->get() as $item)
              <li><a href="{{ route('front.service', ['name' => $item->name, 'id' => encrypt($item->id)]) }}">{{ $item->name }}</a></li>
              @endforeach
            </ul>

            {{-- <li class="drop-down"><a href="#">Drop Down 2</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li> --}}

          </li>
          <li><a href="{{ route('front.project') }}">Project</a></li>
          <li><a href="{{ route('front.blog') }}">Blog</a></li>
          <li><a href="{{ route('front.contact') }}">Contact</a></li>

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header>
  <!-- End Header -->