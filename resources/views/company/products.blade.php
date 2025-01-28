<!DOCTYPE html>
<html lang="en">
  <head>
  <x-head/>
  </head>
  <body>
      <x-header/>
    <div class="container">
      <div class="product-slideshow-container">
        <img
          src="{{ asset('logos/banner.jpg') }}"
          class="product-details-slides"
          alt="Slide 1"
        />
        <img
          src="{{ asset('logos/banner2.jpg') }}"
          class="product-details-slides"
          alt="Slide 2"
        />

      </div>
<h1 class="product-detail-heading">Product from:</h1>
<div class="company-badges">
    @foreach ($companies->whereIn('id', old('company_ids', $selectedCompanyIds)) as $companyOption)
        <span class="badge">{{ $companyOption->name }}</span>
    @endforeach
</div>


      <button class="filter-btn" style="background-color:transparent;border:0;">
        <i class="fa-solid fa-filter"></i>
      </button>
      <div class="outer-box-search">

        <!--filter section-->
         <!--filter section-->
        <div class="filter-box">
            <div class="filter-container">
                <!-- OEM Filter -->
                <span class="filter-close">&times;</span>
                <div class="filter-header">
                  <h3>CompanyName</h3>
                  <span>&#x25BC;</span>
                </div>
                <div class="filter-content">
                  <form method="GET" action="{{ route('company.products', $company->id) }}">
        @foreach($companies as $companyFilter)
            <div>
                <div class="company-fliter">
                    <span><input
                        type="checkbox"
                        name="company_ids[]"
                        value="{{ $companyFilter->id }}"
                        {{ in_array($companyFilter->id, $selectedCompanyIds) ? 'checked' : '' }}
                        onchange="this.form.submit()"></span>
                    <span class="company-filter-name">{{ $companyFilter->name }}</span>
                    </div>
            </div>
        @endforeach
        <!-- Submit button for the form -->
        <button type="submit" style="display: none;"></button>
    </form>
                </div>

                <!-- Brands Filter -->
                <div class="filter-header">
                  <h3>Category</h3>
                  <span>&#x25BC;</span>
                </div>
                <div class="filter-content">

                </div>



              </div>

        </div>
       <div class="product-view-box">
    <div class="product-list-view">
        <div class="row g-1 gy-1 prodoct-img-view">
            @foreach ($products as $product)
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
                <div class="product-card">
                    <div class="product-main-box">
                        <div class="inner-box">
                            <img src="{{asset($product->image_url)}}" alt="{{ $product->name }}" class="product-image" />
                        </div>
                    </div>
                    <div class="product-bottom-details">
                        <h3 class="product-detail-name">{{ $product->name }}</h3>
                        <h3 class="product-detail-name">{{$product->company->name}}</h3>
                     =<h3 class="product-detail-name">{{$product->category->name}}</h3>
                        <h3 class="product-detail-name">{{$product->subcategory->name}}</h3>
                        <p class="product-detail-description">{{ Str::limit($product->description, 50) }}</p>

                        <a href="/product/{{ $product->id }}" class="product-link">View Product</a>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

        </div>
      </div>



    <script>
// Get the button and filter box elements
let filterbox = document.querySelector('.filter-box');
let filterbtn = document.querySelector('.filter-btn');

// Add an event listener for the filter button click
filterbtn.addEventListener('click', () => {
  filterbox.classList.toggle('active-box');
});

// Add a close button dynamically to the filter box
const closeButton = document.createElement('span');
closeButton.classList.add('filter-close');
closeButton.innerHTML = '&times;'; // Cross icon
filterbox.appendChild(closeButton);

// Add an event listener to the close button
closeButton.addEventListener('click', () => {
  filterbox.classList.remove('active-box');
});

let currentSlide = 0;
const slides = document.querySelectorAll(".product-details-slides");

// Function to show the current slide
function showSlide(index) {
  slides.forEach((slide, i) => {
    slide.classList.remove("active"); // Remove active class from all slides
    if (i === index) {
      slide.classList.add("active"); // Add active class to the current slide
    }
  });
}

// Function to change the slide
function changeSlide(step) {
  currentSlide = (currentSlide + step + slides.length) % slides.length;
  showSlide(currentSlide);
}

// Initialize slideshow
showSlide(currentSlide);

// Automatic slide change every 5 seconds
setInterval(() => {
  changeSlide(1);
}, 5000);

// Toggle filter content with arrow animation
// Toggle filter content with arrow animation and close others
// Select all filter headers
const filterHeaders = document.querySelectorAll(".filter-header");

// Ensure the first dropdown (CompanyName) is open at runtime
document.addEventListener("DOMContentLoaded", function () {
  filterHeaders.forEach((header, index) => {
    const content = header.nextElementSibling;
    if (index === 0) {
      content.style.display = "block"; // Open first dropdown
      header.classList.add("active"); // Mark as active
    } else {
      content.style.display = "none"; // Close others
    }
  });
});

// Click event listener for toggling dropdowns
filterHeaders.forEach((header) => {
  header.addEventListener("click", function () {
    const content = this.nextElementSibling;
    const isActive = this.classList.contains("active");

    // Close all dropdowns except the clicked one
    filterHeaders.forEach((otherHeader) => {
      const otherContent = otherHeader.nextElementSibling;
      if (otherHeader !== header) {
        otherContent.style.display = "none";
        otherHeader.classList.remove("active");
        otherHeader.querySelector("span").classList.remove("rotate");
      }
    });

    // Toggle the clicked dropdown
    if (isActive) {
      content.style.display = "none";
      this.classList.remove("active");
      this.querySelector("span").classList.remove("rotate");
    } else {
      content.style.display = "block";
      this.classList.add("active");
      this.querySelector("span").classList.add("rotate");
    }
  });
});
      </script>


  </body>
</html>
