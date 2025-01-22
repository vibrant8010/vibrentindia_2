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
        <div class="row g-4 gy-3 prodoct-img-view">
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
const filterHeaders = document.querySelectorAll('.filter-header');

filterHeaders.forEach(header => {
  header.addEventListener('click', () => {
    const content = header.nextElementSibling;
    const isActive = content.style.display === 'block';

    // Toggle content visibility
    content.style.display = isActive ? 'none' : 'block';

    // Rotate arrow
    const arrow = header.querySelector('span');
    if (isActive) {
      arrow.classList.remove('rotate');
    } else {
      arrow.classList.add('rotate');
    }
  });
});

// Clear location checkboxes
function clearLocation() {
  const checkboxes = document.querySelectorAll('#location-list input[type="checkbox"]');
  checkboxes.forEach(checkbox => checkbox.checked = false);
}

// Filter location list
const locationSearch = document.getElementById('location-search');
locationSearch.addEventListener('input', () => {
  const filter = locationSearch.value.toLowerCase();
  const locations = document.querySelectorAll('#location-list li');
  locations.forEach(location => {
    const text = location.textContent.toLowerCase();
    location.style.display = text.includes(filter) ? 'flex' : 'none';
  });
});

      </script>


  </body>
</html>
