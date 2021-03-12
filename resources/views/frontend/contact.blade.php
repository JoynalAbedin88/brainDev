@extends('frontend.layouts.master')

@section('title')
    <title>Contatc</title>
@endsection

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <img src="{{ asset($banner->image) }}" alt="">
        <div class="hero-container" data-aos="fade-up">
            <div>
              <h1 style="font-size: 4em;">{{ $banner->headong }}</h1>
            </div>
        </div>
      </section>
    <!-- End Hero -->

    <section id="contact">
        <div class="container">
            <div class="heading">
                <h3>CONTACT US</h3>
                <p>Got a project in mind? We’d love to hear about it. Take five minutes to fill out our
                    project form so that we can get to know you and understand your project.</p>
            </div>
            <div class="row py-4">
                <div class="col-12 col-md-4">
                    <div class="item">
                        <i class="fas fa-phone-square-alt"></i>
                        <h5>Phone</h5>
                        <p>+{{ $contact->phone_1 }} <br> +{{ $contact->phone_2 }}  </p>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="item">
                        <i class="fas fa-home"></i>
                        <h5>ADDRESS</h5>
                        <p>{{ $contact->address }} </p>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="item">
                        <i class="fas fa-envelope"></i>
                        <h5>Phone</h5>
                        <p>{{ $contact->email_1 }}  <br> {{ $contact->email_1 }} </p>  
                    </div> 
                </div>
            </div>
            <div class="heading py-5">
                <p class="text-primary">CONTACT US</p>
                <h3>Get In Touch</h3>
            </div>
            <div class="row">
                <div class="contact-form">
                    <form action="{{ route('contact.message.post') }}" method="POST"> @csrf
                            <div class="row">
                                <div class="col-md-6 col-12 form-group">
                                    <input name="name" onkeypress="onlyLetter(event)" type="text" class="form-control" placeholder="Name">
                                </div>
                                <div class="col-md-6 col-12 form-group">
                                    <input name="email" type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="col-md-6 col-12 form-group">
                                    <input name="phone" onkeypress="onlyNumber(event)" type="text" class="form-control" placeholder="Phone">
                                </div>
                                <div class="col-md-6 col-12 form-group">
                                    <input name="company" onkeypress="onlyLetter(event)" type="text" class="form-control" placeholder="Company">
                                </div>
                                <div class="col-12 form-group">
                                    <textarea name="message" id="" cols="30" rows="5" class="form-control" placeholder="Your Message"></textarea>
                                </div>
                                <div class="form-group col-12 text-center">
                                    <button type="submit" class="btn btn-primary">Post Comment</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section id="sponsor" class="pb-1">
        <div class="sponsor owl-carousel">
        @foreach ($sponsor as $item)
            <div>
                <img width="100%" src="{{ asset($item->image) }}" alt="">
            </div>
        @endforeach
        </div>
      </section>
      <section class="pb-0">
        {!! $contact->map  !!}
      </section>
@endsection

@section('script')
      <script>
          function onlyLetter(evt) {
                var chars = String.fromCharCode(evt.which);
                if (!(/[a-z,A-Z]/.test(chars))) {
                    evt.preventDefault();
                }
            }

            function onlyNumber(evt) {
                var chars = String.fromCharCode(evt.which);
                if (!(/[0-9,+]/.test(chars))) {
                    evt.preventDefault();
                }
            }
      </script>
@endsection