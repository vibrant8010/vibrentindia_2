{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
{{-- <h1>Search Results for "{{ $searchTerm }}"</h1>

    @if ($products->isEmpty())
        <p>No products found.</p>
    @else
        <ul>
            @foreach ($products as $product)
                <li>
                    <a href="/product/{{ $product->id }}">
                        {{ $product->name }} - {{ $product->company->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif --}}
{{-- <h1>Search Results for "{{ $searchTerm }}"</h1>

<h2>Products</h2>
@if ($results['products']->isNotEmpty())
    <ul>
        @foreach ($results['products'] as $product)
            <li>{{ $product->name }} - {{ $product->details }}</li>
        @endforeach
    </ul>
@else
    <p>No products found.</p>
@endif

<h2>Categories</h2>
@if ($results['categories']->isNotEmpty())
    <ul>
        @foreach ($results['categories'] as $category)
            <li>{{ $category->name }}</li>
        @endforeach
    </ul>
@else
    <p>No categories found.</p>
@endif

<h2>Companies</h2>
@if ($results['companies']->isNotEmpty())
    <ul>
        @foreach ($results['companies'] as $company)
            <li>{{ $company->name }} - {{ $company->details }}</li>
        @endforeach
    </ul>
@else
    <p>No companies found.</p>
@endif

<h2>Sub-Categories</h2>
@if ($results['subCategories']->isNotEmpty())
    <ul>
        @foreach ($results['subCategories'] as $subCategory)
            <li>{{ $subCategory->name }}</li>
        @endforeach
    </ul>
@else
    <p>No sub-categories found.</p>
@endif

@endsection --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <x-head />
</head>

<body>
    <x-header />
    @if ($results['products'] && $results['products']->isNotEmpty())
    <div class="container">
        <div class="product-slideshow-container">
            <img src="{{ asset('logos/banner.jpg') }}" class="product-details-slides" alt="Slide 1" />
            <img src="{{ asset('logos/banner2.jpg') }}" class="product-details-slides" alt="Slide 2" />
        </div>
        <h1 class="product-detail-heading">Product from:</h1>
        <div class="company-badges">
            {{-- @foreach ($companies->whereIn('id', old('company_ids', $selectedCompanyIds)) as $companyOption)
        <span class="badge">{{ $companyOption->name }}</span>
    @endforeach --}}
            @foreach ($results['companies'] as $companyOption)
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
                    <form id="filterForm" method="GET" action="{{ route('filter.products') }}">
                        <!-- CSRF Token (optional for GET requests) -->
                        @csrf

                        <!-- Company Filters -->
                        <div class="filter-header">
                            <h3>CompanyName</h3>
                            <span class="down-arrow-view"><i class="fa-solid fa-angle-down"></i></span>
                        </div>
                            <div class="filter-content">
                                @foreach ($results['companies'] as $companyFilter)
                                    <div>
                                        <label>
                                           <span class="location-checkbox"> <input type="checkbox" name="company_ids[]" value="{{ $companyFilter->id }}"
                                                {{ request()->has('company_ids') && in_array($companyFilter->id, request('company_ids', [])) ? 'checked' : '' }}
                                                onchange="document.getElementById('filterForm').submit();"></span>
                                          <span class="location-title">{{ $companyFilter->name }}</span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                        <!-- Category Filters -->
                        <div>
                        <div class="filter-header">
                            <h3>Category</h3>
                            <span class="down-arrow-view"><i class="fa-solid fa-angle-down"></i></span>
                        </div>

                            <div class="filter-content">
                                @foreach ($results['categories'] as $categoryFilter)
                                    <div>
                                        <label>
                                            <input type="checkbox" name="category_ids[]"
                                                value="{{ $categoryFilter->id }}"
                                                {{ request()->has('category_ids') && in_array($categoryFilter->id, request('category_ids', [])) ? 'checked' : '' }}
                                                onchange="document.getElementById('filterForm').submit();">
                                            {{ $categoryFilter->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- Subcategory Filters -->
                        <div>
                        <div class="filter-header">
                            <h3>Subcategory</h3>
                            <span class="down-arrow-view"><i class="fa-solid fa-angle-down"></i></span>
                        </div>
                            <div class="filter-content">
                                @foreach ($results['subCategories'] as $subCategoryFilter)
                                    <div>
                                        <label>
                                            <input type="checkbox" name="subcategory_ids[]"
                                                value="{{ $subCategoryFilter->id }}"
                                                {{ request()->has('subcategory_ids') && in_array($subCategoryFilter->id, request('subcategory_ids', [])) ? 'checked' : '' }}
                                                onchange="document.getElementById('filterForm').submit();">
                                            {{ $subCategoryFilter->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </form>




                </div>

            </div>
            <div class="product-view-box">
                <div class="product-list-view">
                    <div class="row g-4 gy-3 prodoct-img-view">
                        @foreach ($results['products'] as $product)
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-3 p-1">
                                <div class="product-card">
                                    <div class="product-main-box">
                                        <div class="inner-box">
                                            <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}"
                                                class="product-image" />
                                        </div>
                                    </div>
                                    <div class="product-bottom-details">
                                        <h3 class="product-detail-name product-detail-maintitle">{{ $product->name }}</h3>
                                        <h3 class="product-detail-name"><span class="lable-txt">Company : </span>{{ $product->company->name }}</h3>
                                        <h3 class="product-detail-name"><span class="lable-txt">Category : </span>
                                            {{ $product->category->name }}</h3>

                                        <h3 class="product-detail-name"><span class="lable-txt">SubCategory : </span> {{ $product->subcategory->name }}</h3>
                                        <p class="product-detail-description">
                                            {{ Str::limit($product->description, 50) }}</p>

                                        <a href="/product/{{ $product->id }}" class="product-link">View Product</a>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
        @else
        {{-- <div class="product-slideshow-container">
            <img src="{{ asset('logos/banner.jpg') }}" class="product-details-slides" alt="Slide 1" />
            <img src="{{ asset('logos/banner2.jpg') }}" class="product-details-slides" alt="Slide 2" />
        </div> --}}
        <div class="container px-2 m-0 py-3">
          <h6 class="not-found-content">No Result found for <span class="not-fond-txt">{{$searchTerm}}</span>. Showing result for <span class="not-fond-txt">{{$searchTerm}}</span> insted.</h6>
        </div>
        <div class="container">
            <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                <div class="card-view inner-card">
                    <a href="http://127.0.0.1:8000/product/92" class="card-link"></a>
                    <div class="image-container">
                        <div class="thumbnail_container">
                            <div class="thumbnail">
                                <img src="http://127.0.0.1:8000/images/1734066639_COOKWAREINDIVISUAl.webp" class="product-image swiper-img" alt="Hammered Sauce Pan" onclick="openPopup(this)">
                            </div>
                        </div>
                    </div>
                    <div class="logo-container" style="">
                                                        <img src="http://127.0.0.1:8000/logos\1733305223_shri_and_sam_logo_280_by_80.png" class="logo-image" alt="Shri and Sam">
                                                </div>

                    <div class="text-wrapper">
                        <h6 class="tranding-product-name">
                            <span class="title">Product:</span>
                            <span class="trnding-pro-name">Hammered Sauce Pan</span>
                        </h6>

                    </div>
                    <div class="card-bottom">
                        <h6 class="tranding-product-name">
                            <span class="title">Company Name:</span>
                            <span class="tranding-pro-name">Shri and Sam</span>
                        </h6>
                        <h6 class="tranding-product-name">
                            <span class="title">Category:</span>
                            <span class="tranding-pro-name">Kitchenware</span>
                        </h6>

                        <h6 class="tranding-material-name">
                            <span class="tranding-material-title">Material:</span>
                            <span class="mt-name tranding-mt-name">Stainless Steel</span>
                        </h6>
                        <h6 class="tranding-product-size">
                            <span class="tranding-size-title">Size:</span>
                            <span class="tranding-sz-name">12cm to 18 cm</span>
                        </h6>
                         <p class="card-description content-txt" id="description-92">

                                <span class="visible-text">
                                    This Hammered Sauce...
                                </span>

                            </p>
                            <a href="javascript:void(0)" class="read-more" onclick="toggleReadMore(92)"></a>

                        <div class="d-flex justify-content-start mx-2 bottom-btn">
                                                                    <a href="http://127.0.0.1:8000/login" class="inqury-btn mt-2">
                                    <span>Sign in to Inquire</span>
                                </a>
                                                            </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                <div class="card-view inner-card">
                    <a href="http://127.0.0.1:8000/product/92" class="card-link"></a>
                    <div class="image-container">
                        <div class="thumbnail_container">
                            <div class="thumbnail">
                                <img src="http://127.0.0.1:8000/images/1734066639_COOKWAREINDIVISUAl.webp" class="product-image swiper-img" alt="Hammered Sauce Pan" onclick="openPopup(this)">
                            </div>
                        </div>
                    </div>
                    <div class="logo-container" style="">
                                                        <img src="http://127.0.0.1:8000/logos\1733305223_shri_and_sam_logo_280_by_80.png" class="logo-image" alt="Shri and Sam">
                                                </div>

                    <div class="text-wrapper">
                        <h6 class="tranding-product-name">
                            <span class="title">Product:</span>
                            <span class="trnding-pro-name">Hammered Sauce Pan</span>
                        </h6>

                    </div>
                    <div class="card-bottom">
                        <h6 class="tranding-product-name">
                            <span class="title">Company Name:</span>
                            <span class="tranding-pro-name">Shri and Sam</span>
                        </h6>
                        <h6 class="tranding-product-name">
                            <span class="title">Category:</span>
                            <span class="tranding-pro-name">Kitchenware</span>
                        </h6>

                        <h6 class="tranding-material-name">
                            <span class="tranding-material-title">Material:</span>
                            <span class="mt-name tranding-mt-name">Stainless Steel</span>
                        </h6>
                        <h6 class="tranding-product-size">
                            <span class="tranding-size-title">Size:</span>
                            <span class="tranding-sz-name">12cm to 18 cm</span>
                        </h6>
                         <p class="card-description content-txt" id="description-92">

                                <span class="visible-text">
                                    This Hammered Sauce...
                                </span>

                            </p>
                            <a href="javascript:void(0)" class="read-more" onclick="toggleReadMore(92)"></a>

                        <div class="d-flex justify-content-start mx-2 bottom-btn">
                                                                    <a href="http://127.0.0.1:8000/login" class="inqury-btn mt-2">
                                    <span>Sign in to Inquire</span>
                                </a>
                                                            </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                <div class="card-view inner-card">
                    <a href="http://127.0.0.1:8000/product/92" class="card-link"></a>
                    <div class="image-container">
                        <div class="thumbnail_container">
                            <div class="thumbnail">
                                <img src="http://127.0.0.1:8000/images/1734066639_COOKWAREINDIVISUAl.webp" class="product-image swiper-img" alt="Hammered Sauce Pan" onclick="openPopup(this)">
                            </div>
                        </div>
                    </div>
                    <div class="logo-container" style="">
                                                        <img src="http://127.0.0.1:8000/logos\1733305223_shri_and_sam_logo_280_by_80.png" class="logo-image" alt="Shri and Sam">
                                                </div>

                    <div class="text-wrapper">
                        <h6 class="tranding-product-name">
                            <span class="title">Product:</span>
                            <span class="trnding-pro-name">Hammered Sauce Pan</span>
                        </h6>

                    </div>
                    <div class="card-bottom">
                        <h6 class="tranding-product-name">
                            <span class="title">Company Name:</span>
                            <span class="tranding-pro-name">Shri and Sam</span>
                        </h6>
                        <h6 class="tranding-product-name">
                            <span class="title">Category:</span>
                            <span class="tranding-pro-name">Kitchenware</span>
                        </h6>

                        <h6 class="tranding-material-name">
                            <span class="tranding-material-title">Material:</span>
                            <span class="mt-name tranding-mt-name">Stainless Steel</span>
                        </h6>
                        <h6 class="tranding-product-size">
                            <span class="tranding-size-title">Size:</span>
                            <span class="tranding-sz-name">12cm to 18 cm</span>
                        </h6>
                         <p class="card-description content-txt" id="description-92">

                                <span class="visible-text">
                                    This Hammered Sauce...
                                </span>

                            </p>
                            <a href="javascript:void(0)" class="read-more" onclick="toggleReadMore(92)"></a>

                        <div class="d-flex justify-content-start mx-2 bottom-btn">
                                                                    <a href="http://127.0.0.1:8000/login" class="inqury-btn mt-2">
                                    <span>Sign in to Inquire</span>
                                </a>
                                                            </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                <div class="card-view inner-card">
                    <a href="http://127.0.0.1:8000/product/92" class="card-link"></a>
                    <div class="image-container">
                        <div class="thumbnail_container">
                            <div class="thumbnail">
                                <img src="http://127.0.0.1:8000/images/1734066639_COOKWAREINDIVISUAl.webp" class="product-image swiper-img" alt="Hammered Sauce Pan" onclick="openPopup(this)">
                            </div>
                        </div>
                    </div>
                    <div class="logo-container" style="">
                                                        <img src="http://127.0.0.1:8000/logos\1733305223_shri_and_sam_logo_280_by_80.png" class="logo-image" alt="Shri and Sam">
                                                </div>

                    <div class="text-wrapper">
                        <h6 class="tranding-product-name">
                            <span class="title">Product:</span>
                            <span class="trnding-pro-name">Hammered Sauce Pan</span>
                        </h6>

                    </div>
                    <div class="card-bottom">
                        <h6 class="tranding-product-name">
                            <span class="title">Company Name:</span>
                            <span class="tranding-pro-name">Shri and Sam</span>
                        </h6>
                        <h6 class="tranding-product-name">
                            <span class="title">Category:</span>
                            <span class="tranding-pro-name">Kitchenware</span>
                        </h6>

                        <h6 class="tranding-material-name">
                            <span class="tranding-material-title">Material:</span>
                            <span class="mt-name tranding-mt-name">Stainless Steel</span>
                        </h6>
                        <h6 class="tranding-product-size">
                            <span class="tranding-size-title">Size:</span>
                            <span class="tranding-sz-name">12cm to 18 cm</span>
                        </h6>
                         <p class="card-description content-txt" id="description-92">

                                <span class="visible-text">
                                    This Hammered Sauce...
                                </span>

                            </p>
                            <a href="javascript:void(0)" class="read-more" onclick="toggleReadMore(92)"></a>

                        <div class="d-flex justify-content-start mx-2 bottom-btn">
                                                                    <a href="http://127.0.0.1:8000/login" class="inqury-btn mt-2">
                                    <span>Sign in to Inquire</span>
                                </a>
                                                            </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                <div class="card-view inner-card">
                    <a href="http://127.0.0.1:8000/product/92" class="card-link"></a>
                    <div class="image-container">
                        <div class="thumbnail_container">
                            <div class="thumbnail">
                                <img src="http://127.0.0.1:8000/images/1734066639_COOKWAREINDIVISUAl.webp" class="product-image swiper-img" alt="Hammered Sauce Pan" onclick="openPopup(this)">
                            </div>
                        </div>
                    </div>
                    <div class="logo-container" style="">
                                                        <img src="http://127.0.0.1:8000/logos\1733305223_shri_and_sam_logo_280_by_80.png" class="logo-image" alt="Shri and Sam">
                                                </div>

                    <div class="text-wrapper">
                        <h6 class="tranding-product-name">
                            <span class="title">Product:</span>
                            <span class="trnding-pro-name">Hammered Sauce Pan</span>
                        </h6>

                    </div>
                    <div class="card-bottom">
                        <h6 class="tranding-product-name">
                            <span class="title">Company Name:</span>
                            <span class="tranding-pro-name">Shri and Sam</span>
                        </h6>
                        <h6 class="tranding-product-name">
                            <span class="title">Category:</span>
                            <span class="tranding-pro-name">Kitchenware</span>
                        </h6>

                        <h6 class="tranding-material-name">
                            <span class="tranding-material-title">Material:</span>
                            <span class="mt-name tranding-mt-name">Stainless Steel</span>
                        </h6>
                        <h6 class="tranding-product-size">
                            <span class="tranding-size-title">Size:</span>
                            <span class="tranding-sz-name">12cm to 18 cm</span>
                        </h6>
                         <p class="card-description content-txt" id="description-92">

                                <span class="visible-text">
                                    This Hammered Sauce...
                                </span>

                            </p>
                            <a href="javascript:void(0)" class="read-more" onclick="toggleReadMore(92)"></a>

                        <div class="d-flex justify-content-start mx-2 bottom-btn">
                                                                    <a href="http://127.0.0.1:8000/login" class="inqury-btn mt-2">
                                    <span>Sign in to Inquire</span>
                                </a>
                                                            </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </div>
    @endif



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
