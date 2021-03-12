<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="container"> 
      <div class="row">
        <div class="col-md-3 footer-logo">
          <!-- <h1>Brain Share</h1> -->
          <a href="{{ route('front.index') }}">
            <img src="{{ asset('frontend/images/logoM.png') }}" alt="">
          </a>
          <p>Fundamental Outsourcing Pricing Models to Consider</p>
          <span>
            <i class="icofont-twitter"></i>
          </span>
          <span>
            <i class="icofont-facebook"></i>
          </span>
          <span>
            <i class="icofont-instagram"></i>
          </span>
          <span>
            <i class="fab fa-linkedin-in"></i>
          </span>
          <span>
            <i class="fab fa-google-plus-g"></i>
          </span>
        </div>
        <div class="col-md-3 pt-5">
          <div>
            <h4>Our Services</h4>
            <ul class="pl-3">
              @foreach (App\Models\Category::where('what', 2)->orderBy('name', 'asc')->limit(6)->get() as $item)
              <li><a href="{{ route('front.service', ['name' => $item->name, 'id' => encrypt($item->id)]) }}">{{ $item->name }}</a></li>
              @endforeach
            </ul>
          </div>
        </div>
        <div class="col-md-3 pt-5">
          <h4>Information</h4>
          <ul class="pl-3">
            <li><a href="">Working Process</a></li>
            <li><a href="">Team</a></li>
            <li><a href="">Clients</a></li>
            <li><a href="">Contact Us</a></li>
            <li><a href="{{ route('front.about') }}">About Us</a></li>
          </ul>
        </div>
        <div class="col-md-3 pt-5">
          <h4>Quick Links</h4>
          <ul class="pl-3">
            <li><a href="{{ route('login') }}">Log In</a></li>
            <li><a href="">HTML.org</a></li>
            <li><a href="">econtractor.xyz</a></li>
            <li><a href="">globalwings.com.bd</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="py-3 mt-5" style="background:#033862">
      <h6 class="text-center m-0 text-white">&copy; Brain Share Ltd. 2021. All rights reserved</h6>
    </div>
  </footer>
  <!-- End Footer -->

  <a href="#" class="back-to-top"><i class="fas fa-long-arrow-alt-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
  <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.easing.min.js') }}"></script>
  {{-- <script src="assets/vendor/php-email-form/validate.js"></script> --}}
  <script src="{{ asset('frontend/js/jquery.sticky.js') }}"></script>
  <script src="{{ asset('frontend/js/venobox.min.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('frontend/js/counterup.min.js') }}"></script>
  <script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('frontend/js/aos.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('frontend/js/main.js') }}"></script>
  @yield('script')
</body>

</html>