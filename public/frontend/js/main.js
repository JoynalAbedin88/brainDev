
!(function($) {
    "use strict";
  
    // Smooth scroll for the navigation menu and links with .scrollto classes
    var scrolltoOffset = $('#header').outerHeight() - 1;
    $(document).on('click', '.nav-menu a, .mobile-nav a, .scrollto', function(e) {
      if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
        var target = $(this.hash);
        if (target.length) {
          e.preventDefault();
  
          var scrollto = target.offset().top - scrolltoOffset;
  
          if ($(this).attr("href") == '#header') {
            scrollto = 0;
          }
  
          $('html, body').animate({
            scrollTop: scrollto
          }, 1500, 'easeInOutExpo');
  
          if ($(this).parents('.nav-menu, .mobile-nav').length) {
            $('.nav-menu .active, .mobile-nav .active').removeClass('active');
            $(this).closest('li').addClass('active');
          }
  
          if ($('body').hasClass('mobile-nav-active')) {
            $('body').removeClass('mobile-nav-active');
            $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
            $('.mobile-nav-overly').fadeOut();
          }
          return false;
        }
      }
    });
  
    // Activate smooth scroll on page load with hash links in the url
    $(document).ready(function() {
      if (window.location.hash) {
        var initial_nav = window.location.hash;
        if ($(initial_nav).length) {
          var scrollto = $(initial_nav).offset().top - scrolltoOffset;
          $('html, body').animate({
            scrollTop: scrollto
          }, 1500, 'easeInOutExpo');
        }
      }
    });
  
    // Mobile Navigation
    if ($('.nav-menu').length) {
      var $mobile_nav = $('.nav-menu').clone().prop({
        class: 'mobile-nav d-lg-none'
      });
      $('body').append($mobile_nav);
      $('body').prepend('<button type="button" class="mobile-nav-toggle d-lg-none"><i class="icofont-navigation-menu"></i></button>');
      $('body').append('<div class="mobile-nav-overly"></div>');
  
      $(document).on('click', '.mobile-nav-toggle', function(e) {
        $('body').toggleClass('mobile-nav-active');
        $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
        $('.mobile-nav-overly').toggle();
      });
  
      $(document).on('click', '.mobile-nav .drop-down > a', function(e) {
        e.preventDefault();
        $(this).next().slideToggle(300);
        $(this).parent().toggleClass('active');
      });
  
      $(document).click(function(e) {
        var container = $(".mobile-nav, .mobile-nav-toggle");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
          if ($('body').hasClass('mobile-nav-active')) {
            $('body').removeClass('mobile-nav-active');
            $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
            $('.mobile-nav-overly').fadeOut();
          }
        }
      });
    } else if ($(".mobile-nav, .mobile-nav-toggle").length) {
      $(".mobile-nav, .mobile-nav-toggle").hide();
    }
  
    // Navigation active state on scroll
    var nav_sections = $('section');
    var main_nav = $('.nav-menu, .mobile-nav');
  
    $(window).on('scroll', function() {
      var cur_pos = $(this).scrollTop() + 200;
  
      nav_sections.each(function() {
        var top = $(this).offset().top,
          bottom = top + $(this).outerHeight();
  
        if (cur_pos >= top && cur_pos <= bottom) {
          if (cur_pos <= bottom) {
            main_nav.find('li').removeClass('active');
          }
          main_nav.find('a[href="#' + $(this).attr('id') + '"]').parent('li').addClass('active');
        }
        if (cur_pos < 300) {
          $(".nav-menu ul:first li:first").addClass('active');
        }
      });
    });
  
    // Stick the header at top on scroll
    $("#header").sticky({
      topSpacing: 0,
      zIndex: '50'
    });
  
    // Back to top button
    $(window).scroll(function() {
      if ($(this).scrollTop() > 100) {
        $('.back-to-top').fadeIn('slow');
      } else {
        $('.back-to-top').fadeOut('slow');
      }
    });
  
    $('.back-to-top').click(function() {
      $('html, body').animate({
        scrollTop: 0
      }, 1500, 'easeInOutExpo', function() {
        $(".nav-menu ul:first li:first").addClass('active');
      });
  
      return false;
    });
  
    // Initiate the venobox plugin
    $(window).on('load', function() {
      $('.venobox').venobox();
    });
  
    // jQuery counterUp
    $('[data-toggle="counter-up"]').counterUp({
      delay: 10,
      time: 1000
    });
  
    // Porfolio isotope and filter
    $(window).on('load', function() {
      var portfolioIsotope = $('.portfolio-container').isotope({
        itemSelector: '.portfolio-item',
        layoutMode: 'fitRows'
      });
  
      $('#portfolio-flters li').on('click', function() {
        $("#portfolio-flters li").removeClass('filter-active');
        $(this).addClass('filter-active');
  
        portfolioIsotope.isotope({
          filter: $(this).data('filter')
        });
        aos_init();
      });
  
      // Initiate venobox (lightbox feature used in portofilo)
      $(document).ready(function() {
        $('.venobox').venobox();
      });
    });
  
    // Testimonials carousel (uses the Owl Carousel library)
    $(".testimonials-carousel").owlCarousel({
      autoplay: true,
      dots: true,
      loop: true,
      items: 1
    });
  
    // Portfolio details carousel
    $(".portfolio-details-carousel").owlCarousel({
      autoplay: true,
      dots: true,
      loop: true,
      items: 1
    });
  
    // Init AOS
    function aos_init() {
      AOS.init({
        duration: 800,
        easing: "ease-in-out-back",
        once: true
      });
    }
    $(window).on('load', function() {
      aos_init();
    });
  
  })(jQuery);
  
  
  // Home slider 
  var owl = $('.hero');
  owl.owlCarousel({
      items:1,
      loop:true,
      margin:10,
      autoplay:true,
      autoplayTimeout:5000,
      autoplayHoverPause:true,
      nav:true,
      navText: ["<i class='fas fa-chevron-left'></i>","<i class='fas fa-chevron-right'></i>"],
  });
  
  var owl = $('.sponsor');
  owl.owlCarousel({
      items:5,
      loop:true,
      margin:10,
      autoplay:true,
      autoplayTimeout:3000,
      autoplayHoverPause:true,
      nav:false,
      // navText: ["<i class='fas fa-chevron-left'></i>","<i class='fas fa-chevron-right'></i>"],
  });
  // $('.sponsor').owlCarousel({
  //   loop:true,
  //   margin:20,
  //   responsiveClass:true,
  //   autoplay:true,
  //   autoplayTimeout:1000,
  //   autoplayHoverPause:true,
  //   // nav:false,
  //   // navText: ["<i class='fas fa-chevron-left'></i>","<i class='fas fa-chevron-right'></i>"],
  //   responsive:{
  //       0:{
  //           items:1,
  //           nav:true
  //       },
  //       600:{
  //           items:3,
  //           nav:false
  //       },
  //       1000:{
  //           items:5,
  //           nav:true,
  //           loop:false
  //       }
  //   }
  // })
  
  $('.latest-ptoject').owlCarousel({
      loop:true,
      margin:20,
      responsiveClass:true,
      autoplay:true,
      autoplayTimeout:3000,
      autoplayHoverPause:true,
      nav:true,
      navText:["<i class='fas fa-caret-square-left'></i>","<i class='fas fa-caret-square-right'></i>"],
      responsive:{
          0:{
              items:1,
              nav:true
          },
          800:{
              items:2,
              nav:false
          },
          1000:{
              items:3,
              nav:true,
              loop:false
          }
      }
    })
    var owl = $('.com-prortfolio');
    owl.owlCarousel({
        items:3,
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        autoHeight:true,
        nav:false,
        // navText: ["<i class='fas fa-chevron-left'></i>","<i class='fas fa-chevron-right'></i>"],
    });
    var owl = $('.recent-post-slide');
    owl.owlCarousel({
        items:2,
        loop:true,
        margin:10,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        autoHeight:true,
    });
  
    // Calendar Script
  
    let today = new Date();
  let currentMonth = today.getMonth();
  let currentYear = today.getFullYear();
  
  let months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
  
  let monthAndYear = document.getElementById("monthAndYear");
  showCalendar(currentMonth, currentYear);
  
  
  function next() {
      currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
      currentMonth = (currentMonth + 1) % 12;
      showCalendar(currentMonth, currentYear);
  }
  
  function previous() {
      currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
      currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
      showCalendar(currentMonth, currentYear);
  }
  
  
  function showCalendar(month, year) {
  
      let firstDay = (new Date(year, month)).getDay();
      let daysInMonth = 32 - new Date(year, month, 32).getDate();
  
      let tbl = document.getElementById("calendar-body"); // body of the calendar
  
      // clearing all previous cells
      tbl.innerHTML = "";
  
      // filing data about month and in the page via DOM.
      monthAndYear.innerHTML = months[month] + " " + year;
  
      // creating all cells
      let date = 1;
      for (let i = 0; i < 6; i++) {
          // creates a table row
          let row = document.createElement("tr");
  
          //creating individual cells, filing them up with data.
          for (let j = 0; j < 7; j++) {
              if (i === 0 && j < firstDay) {
                  let cell = document.createElement("td");
                  let cellText = document.createTextNode("");
                  cell.appendChild(cellText);
                  row.appendChild(cell);
              }
              else if (date > daysInMonth) {
                  break;
              }
  
              else {
                  let cell = document.createElement("td");
                  let cellText = document.createTextNode(date);
                  if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
                      cell.classList.add("bg-info");
                  } // color today's date
                  cell.appendChild(cellText);
                  row.appendChild(cell);
                  date++;
              }
  
  
          }
  
          tbl.appendChild(row); // appending each row into calendar body.
      }
  
  }