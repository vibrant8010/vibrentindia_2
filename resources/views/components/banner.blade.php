<section class="banner-section">
  <div class="container-fluid p-0">
      {{-- <div class="row">
        <!-- Column 1 -->
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6 p-1">
          <div class="slideshow" id="slideshow1">
            <img
              src="{{ asset('images/wb1.jpg') }}"
              class="active"
            />
            <img
              src="{{ asset('images/wb2.jpg') }}"
            />
            <img
              src="{{ asset('images/wb3.jpg') }}"
            />
          </div>
        </div>

        <!-- Column 2 -->
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6 p-1">
          <div class="slideshow" id="slideshow2">
            <img
              src="{{ asset('images/wb4.jpg') }}"
              class="active"
            />
            <img
              src="{{ asset('images/wb5.jpg') }}"
            />
            <img
              src="{{ asset('images/wb6.jpg') }}"
            />
          </div>
        </div>

        <!-- Column 3 (Duplicate of Column 1) -->
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6 p-1">
          <div class="slideshow" id="slideshow3">
            <img
              src="{{ asset('images/wb6.jpg') }}"
              class="active"
            />
            <img
              src="{{ asset('images/wb1.jpg') }}"
            />
            <img
              src="{{ asset('images/wb2.jpg') }}"
            />
          </div>
        </div>

        <!-- Column 4 (Duplicate of Column 2) -->
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6 p-1">
          <div class="slideshow" id="slideshow4">
            <img
              src="{{ asset('images/wb3.jpg') }}"
              class="active"
            />
            <img
              src="{{ asset('images/wb4.jpg') }}"
            />
            <img
              src="{{ asset('images/wb5.jpg') }}"
            />
          </div>
        </div>
      </div> --}}
      <section class="banner-section">
          <div id="bannersection" class="owl-carousel owl-theme">
            <div class="item">
              <img src="{{ asset('images/Houseware_Banner.png') }}" />
            </div>
            <div class="item"><h4>2</h4></div>
            <div class="item"><h4>3</h4></div>
            <div class="item"><h4>4</h4></div>
            <div class="item"><h4>5</h4></div>
          </div>
      </section>
  </div>
  </section>

  <script>
   $(document).ready(function () {
    $("#bannersection").owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        dots: true,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1 // Show 1 item on mobile
            },
            600: {
                items: 1 // Show 2 items on tablets
            },
            1000: {
                items: 1 // Show 3 items on larger screens
            }
        }
    });
});


  </script>
