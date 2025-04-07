<!DOCTYPE html>
<html lang="en">

<head>
    <x-head />
    <style>
        .loader_circle_1s {
            animation: rotateClockwise 1s linear infinite;
            transform-origin: center;
            transform-box: fill-box;
        }

        .loader_circle_12s {
            animation: rotateClockwise 12s linear infinite;
            transform-origin: center;
            transform-box: fill-box;
        }

        .loader_circle_144s {
            animation: rotateClockwise 144s linear infinite;
            transform-origin: center;
            transform-box: fill-box;
        }

        .loader_circle_1 {
            animation: rotateClockwise 1.5s linear infinite;
            transform-origin: center;
            transform-box: fill-box;
        }

        .loader_circle_2 {
            animation: rotateClockwise 2.5s linear infinite;
            transform-origin: center;
            transform-box: fill-box;
        }

        .loader_circle_3 {
            animation: rotateClockwise 3.5s linear infinite;
            transform-origin: center;
            transform-box: fill-box;
        }

        .loader_circle_4 {
            animation: rotateClockwise 4.5s linear infinite;
            transform-origin: center;
            transform-box: fill-box;
        }

        .loader_circle_5 {
            animation: rotateClockwise 5.5s linear infinite;
            transform-origin: center;
            transform-box: fill-box;
        }

        .loader_circle_6 {
            animation: rotateClockwise 6.5s linear infinite;
            transform-origin: center;
            transform-box: fill-box;
        }

        @keyframes rotateClockwise {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .loader_circle_1_counter {
            animation: rotateCounterClockwise 1.5s linear infinite;
            transform-origin: center;
            transform-box: fill-box;
        }

        .loader_circle_2_counter {
            animation: rotateCounterClockwise 2.5s linear infinite;
            transform-origin: center;
            transform-box: fill-box;
        }

        .loader_circle_3_counter {
            animation: rotateCounterClockwise 3.5s linear infinite;
            transform-origin: center;
            transform-box: fill-box;
        }

        .loader_circle_4_counter {
            animation: rotateCounterClockwise 4.5s linear infinite;
            transform-origin: center;
            transform-box: fill-box;
        }

        .loader_circle_5_counter {
            animation: rotateCounterClockwise 5.5s linear infinite;
            transform-origin: center;
            transform-box: fill-box;
        }

        .loader_circle_6_counter {
            animation: rotateCounterClockwise 6.5s linear infinite;
            transform-origin: center;
            transform-box: fill-box;
        }

        @keyframes rotateCounterClockwise {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(-360deg);
            }
        }


        .loader_circle_1_counter {
            animation: rotateCounterClockwise 1.5s linear infinite;
            transform-origin: center;
            transform-box: fill-box;
        }

        */ #loader img {
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <x-header />
    @if ($results['message'] != null)
        <div class="container px-2 m-0 py-2">
            {{-- <h6 class="not-found-content">No products or companies are available for the selected location.</h6> --}}
            <h6 class="not-found-content">{{ $results['message'] }}</h6>
        </div>
    @endif
    @if ($results['products'] && $results['products']->isNotEmpty())
      <section class="filter-search-page">
        <div class="container">
            <div class="filter-container">
                {{-- <div class="product-slideshow-container">
                <img src="{{ asset('logos/banner.jpg') }}" class="product-details-slides" alt="Slide 1" />
            </div> --}}
                {{-- <div id="search-carousel" class="owl-carousel search-filter-container mt-5">
                <div class="item">
                    <div class="img-container">
                      <img src="{{ asset('logos/banner.jpg') }}" class="" alt="Slide 1" />
                    </div>
                </div>
                <div class="item">
                    <div class="img-container">
                    <img src="{{ asset('logos/banner2.jpg') }}" class="" alt="Slide 2" />
                    </div>
                </div>
            </div> --}}
                {{-- <h1 class="product-detail-heading">Product from: </h1> --}}
                <div class="company-badges">
                    @foreach ($results['companies'] as $companyOption)
                        <span class="badge">{{ $companyOption->name }}</span>
                    @endforeach
                </div>


                <button class="filter-btn" style="background-color:transparent;border:0;">
                    <i class="fa-solid fa-filter"></i>
                </button>
                <div class="outer-box-search" style="margin-bottom: 110px;">
                    <div class="filter-box">

                        <div class="filter-container">
                            <!-- OEM Filter -->

                            <form id="filterForm" method="GET" action="{{ route('filter.products') }}">
                                <!-- CSRF Token (optional for GET requests) -->
                                @csrf

                                <!-- Company Filters -->
                                <div class="filter-header">
                                    <h5 class="m-0">Company Name</h5>
                                    <span class="down-arrow-view"><i class="fa-solid fa-angle-down" style="color: #000000;"></i></span>
                                </div>
                                <div class="filter-content">
                                    @foreach ($results['companies'] as $companyFilter)
                                        <div>
                                            <label>
                                                <span class="location-checkbox">
                                                    <input type="checkbox" name="company_ids[]"
                                                        value="{{ $companyFilter->id }}" {{-- {{ request()->has('company_ids') || in_array($companyFilter->id, request('company_ids', [])) ? 'checked' : '' }} --}}
                                                        {{ $companyFilter->id ? 'checked' : '' }}
                                                        class="filter-checkbox">
                                                </span>
                                                <span class="location-title">{{ $companyFilter->name }}</span>
                                            </label>
                                        </div>
                                    @endforeach
                                    </div>
                                <!-- Subcategory Filters -->
                                <div class="filter-header">
                                    <h5 class="m-0">Subcategory</h5>
                                    <span class="down-arrow-view"><i class="fa-solid fa-angle-down"></i></span>
                                </div>
                                <div class="filter-content">
                                    @foreach ($results['subCategories'] as $subCategoryFilter)
                                        <div>
                                            <label>
                                                {{-- <input type="checkbox" name="subcategory_ids[]"
                                                value="{{ $subCategoryFilter->id }}" class="filter-checkbox">
                                            {{ $subCategoryFilter->name }} --}}
                                                <span class="location-checkbox">
                                                    <input type="checkbox" name="subcategory_ids[]"
                                                        value="{{ $subCategoryFilter->id }}" {{-- {{ request()->has('company_ids') || in_array($subCategoryFilter->id, request('company_ids', [])) ? 'checked' : '' }} --}}
                                                        {{ $subCategoryFilter->id ? 'checked' : '' }}
                                                        class="filter-checkbox">
                                                </span>
                                                <span class="location-title">{{ $subCategoryFilter->name }}</span>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </form>
                        </div>


                    </div>
                    <div class="product-view-box">
                        <div class="product-list-view">
                            <div id="loader" style="display: none; text-align: center; margin: 20px;">
                                <svg class="mx-auto d-block" width="60" height="60" viewBox="0 0 60 60"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g class="loader_circle_1" id="loader_151">
                                        <circle id="Ellipse 858" cx="30" cy="30" r="30"
                                            fill="transparent" />
                                        <path id="Union" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M5 35C5 21.1929 16.1929 10 30 10C32.7614 10 35 7.76142 35 5C35 2.23858 32.7614 0 30 0C13.4315 0 0 13.4315 0 30C0 46.5685 13.4315 60 30 60C16.1929 60 5 48.8071 5 35Z"
                                            fill="#0043AA" />
                                    </g>
                                </svg>
                            </div>
                            <div class="row g-4 gy-3 prodoct-img-view" id="product-list">
                                <!-- Products will be dynamically loaded here -->
                            </div>
                            <div class="row g-4 gy-3 product-img-view" id="product-list-2">
                                @foreach ($results['products'] as $product)
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-3 p-1">
                                        <div class="item product-col">
                                            <div class="card-view">
                                                <a href="{{ route('product.show', $product->id) }}"
                                                    class="card-link"></a>
                                                <div class="image-container">
                                                    <div class="thumbnail_container">
                                                        <div class="thumbnail">
                                                            <img src="{{ asset($product->image_url) }}"
                                                                class="product-image swiper-img"
                                                                alt="{{ $product->name }}" onclick="openPopup(this)">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="main-logo-container">
                                                    <div class="logo-container" style="">
                                                        @if ($product->company && $product->company->logo_url)
                                                            <img src="{{ asset($product->company->logo_url) }}"
                                                                class="logo-image" alt="{{ $product->company->name }}">
                                                        @else
                                                            <span>No Logo</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="card-body product-card-body">
                                                    <p class="card-description content-txt"
                                                        id="description-{{ $product->id }}">
                                                        <span class="visible-text">
                                                            {{ Str::limit($product->description, 50) }}
                                                        </span>
                                                    </p>
                                                    <div class="product-description-div">
                                                        <button class="close-description-btn">&times;</button>

                                                        <div class="text-wrapper">
                                                            <h6 class="tranding-product-name text-product">
                                                                {{-- <span class="title">Product:</span> --}}
                                                                <span
                                                                    class="trnding-pro-name">{{ $product->name }}</span>
                                                            </h6>

                                                        </div>
                                                        <div class="card-bottom">
                                                            <h6 class="tranding-product-name">
                                                                <span class="title">Company:</span>
                                                                <span
                                                                    class="tranding-pro-name">{{ $product->company->name }}</span>
                                                            </h6>
                                                            <h6 class="tranding-product-name">
                                                                <span class="title">Category:</span>
                                                                <span
                                                                    class="tranding-pro-name">{{ $product->category->name }}</span>
                                                            </h6>
                                                            <h6 class="tranding-product-name">
                                                                <span class="title">Product:</span>
                                                                <span
                                                                    class="trnding-pro-name">{{ $product->name }}</span>
                                                            </h6>
                                                            <h6 class="tranding-material-name">
                                                                <span class="tranding-material-title">Material:</span>
                                                                <span
                                                                    class="mt-name tranding-mt-name">{{ $product->material }}</span>
                                                            </h6>
                                                            <h6 class="tranding-product-size">
                                                                <span class="tranding-size-title">Size:</span>
                                                                <span
                                                                    class="tranding-sz-name">{{ $product->size }}</span>
                                                            </h6>


                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between w-100 align-items-center">
                                                        <div class="d-flex justify-content-start bottom-btn">
                                                        @auth
                                                            <a href="{{ route('inquiryform', ['product_id' => $product->id, 'product_name' => $product->name]) }}"
                                                                class="inqury-btn mt-2">
                                                                <span>Inquiry</span>
                                                            </a>
                                                        @else
                                                            <a href="{{ route('login') }}" class="inqury-btn mt-2">
                                                                <span>Sign in to Inquire</span>
                                                            </a>
                                                        @endauth
                                                    </div>
                                                    <a class="image_overlay view-arrow-btn detail-btn">
                                                        View Detils</a>

                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
        <script>
            function truncateString(str, length) {
                if (!str) return 'No description available'; // Fallback if description is null or undefined
                return str.length > length ? str.substring(0, length) + '...' : str;
            }
            // Function to update product list based on filters
            function updateProductList() {
                $('#loader').show();
                $('#product-list').hide();
                $('#product-list-2').hide();

                // Get form data
                let formData = $('#filterForm').serialize();

                // Perform Ajax request
                $.ajax({
                    url: '{{ route('filter.products') }}',
                    method: 'GET',
                    data: formData,
                    success: function(response) {
                        $('#loader').hide();
                        $('#product-list').show();
                        // Update the product list with new products
                        let productListHtml = '';
                        response.products.forEach(function(product) {
                            productListHtml += `
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-3 p-1">
                                <div class="product-card">
                                    <div class="product-main-box">
                                        <div class="inner-box">
                                            <img src="${product.image_url}" alt="${product.name}" class="product-image" />
                                        </div>
                                    </div>
                                    <div class="product-bottom-details">
                                        <h3 class="product-detail-name product-detail-maintitle">${product.name}</h3>
                                        <h3 class="product-detail-name"><span class="lable-txt">Company:</span> ${product.company.name}</h3>
                                        <h3 class="product-detail-name"><span class="lable-txt">Category:</span> ${product.category.name}</h3>
                                        <h3 class="product-detail-name"><span class="lable-txt">SubCategory:</span> ${product.subcategory.name}</h3>
                                        <p class="product-detail-description">${truncateString(product.description, 50)}</p>
                                        <a href="/product/${product.id}" class="product-link">View Product</a>
                                    </div>
                                </div>
                            </div>
                        `;
                        });
                        $('#product-list').html(productListHtml);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error loading products: ", error);

                        // Hide the loader
                        $('#loader').hide();
                        $('#product-list').show();
                    }
                });
            }

            // Trigger filter update on checkbox change
            $('.filter-checkbox').on('change', function() {
                updateProductList();
            });
        </script>
    @else
        {{-- <div class="product-slideshow-container">
            <img src="{{ asset('logos/banner.jpg') }}" class="product-details-slides" alt="Slide 1" />
            <img src="{{ asset('logos/banner2.jpg') }}" class="product-details-slides" alt="Slide 2" />
        </div> --}}
        <div class="container px-2 m-0 py-1">
            <h6 class="not-found-content">No Result found for <span class="not-fond-txt">{{ $searchTerm }}</span>.
                Showing result for <span class="not-fond-txt">{{ $searchTerm }}</span> insted.</h6>
        </div>
        <div class="container my-5">

            @php
                $allProducts = \App\Models\Product::with(['company', 'category', 'subcategory'])->get();
            @endphp

            <div class="outer-box-search" style="max-width: 1350px;">
                <div class="product-view-box search-notfound-box">
                    <div class="product-list-view">
                        <div class="container">
                            <div class="row g-4 gy-3 prodoct-img-view" id="product-list-2">
                                @foreach ($allProducts as $product)
                                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 product-col">
                                        <div class="card-view">
                                            <a href="{{ route('product.show', $product->id) }}"
                                                class="card-link"></a>
                                            <div class="image-container">
                                                <div class="thumbnail_container">
                                                    <div class="thumbnail">
                                                        <img src="{{ asset($product->image_url) }}"
                                                            class="product-image swiper-img"
                                                            alt="{{ $product->name }}" onclick="openPopup(this)">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="main-logo-container">

                                                <div class="logo-container">
                                                    @if ($product->company && $product->company->logo_url)
                                                        <img src="{{ asset($product->company->logo_url) }}"
                                                            class="logo-image" alt="{{ $product->company->name }}">
                                                    @else
                                                        <span>No Logo</span>
                                                    @endif
                                                </div>
                                                <div class="image_overlay view-arrow-btn hide">
                                                    <i class="fas fa-arrow-circle-down"></i>
                                                </div>
                                            </div>
                                            <div class="card-body product-card-body">
                                                <p class="card-description content-txt"
                                                    id="description-{{ $product->id }}">

                                                    <span class="visible-text">
                                                        {{ Str::limit($product->description, 70) }}
                                                    </span>
                                                    <span class="more-text">
                                                        {{ substr($product->description, 70) }}
                                                    </span>
                                                </p>
                                                <div class="product-description-div">
                                                    <div class="text-wrapper">
                                                        <h6 class="product-name text-product">
                                                            {{-- <span class="title">Product: </span> --}}
                                                            <span class="pro-name">{{ $product->name }}</span>
                                                        </h6>
                                                    </div>
                                                    <h6 class="company-name">
                                                        <span class="title">Company: </span>
                                                        <span
                                                            class="pro-company">{{ $product->company->name ?? 'N/A' }}</span>
                                                    </h6>
                                                    <h6 class="product-name">
                                                        <span class="title">Category: </span>
                                                        <span
                                                            class="pro-name">{{ $product->category->name ?? 'N/A' }}</span>
                                                    </h6>


                                                    <h6 class="material-name">
                                                        <span class="material-title">Material: </span>
                                                        <span class="mt-name">{{ $product->material }}</span>
                                                    </h6>
                                                    <h6 class="product-size">
                                                        <span class="size-title">Size: </span>
                                                        <span class="sz-name">{{ $product->size }}</span>
                                                    </h6>

                                                    <a href="javascript:void(0)" class="read-more"
                                                        onclick="toggleReadMore({{ $product->id }})"></a>



                                                </div>
                                                <!-- CTA button within the card -->
                                                <div class="d-flex justify-content-start mx-2 bottom-btn">
                                                    @auth
                                                        <a href="{{ route('inquiryform', ['product_id' => $product->id, 'product_name' => $product->name]) }}"
                                                            class="inqury-btn">
                                                            <span>Inquiry</span>
                                                        </a>
                                                    @else
                                                        {{-- <a href="{{ route('login') }}" class="inqury-btn"> --}}
                                                        <a onclick="openModal()" style="cursor: pointer"
                                                            class="inqury-btn">
                                                            <span>Sign in to Inquire</span>
                                                        </a>
                                                    @endauth
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        </div>
    @endif

    <x-footer class="mt-4" />



    <x-script />

    <script>
        const menuBtn = document.getElementById('menu-btn');
        const navMenu = document.querySelector('.nav-view');
        const closeBtn = document.getElementById('close-btn');

        // Toggle hamburger menu visibility
        menuBtn.addEventListener('click', () => {
            navMenu.classList.add('show');
            menuBtn.style.display = 'none';
            closeBtn.style.display = 'block';
        });

        // Close the menu when clicking the close button
        closeBtn.addEventListener('click', () => {
            navMenu.classList.remove('show');
            closeBtn.style.display = 'none';
            menuBtn.style.display = 'block';
        });


        document.addEventListener("DOMContentLoaded", function() {
            /*** ================== FILTER BOX FUNCTIONALITY ================== ***/
            const filterBox = document.querySelector('.filter-box');
            const filterBtn = document.querySelector('.filter-btn');

            if (filterBox && filterBtn) {
                // Initialize filter box as closed
                filterBox.style.display = 'none';

                // Create and append close button dynamically
                const filterCloseButton = document.createElement('span');
                filterCloseButton.classList.add('filter-close');
                filterCloseButton.innerHTML = '&times;';
                filterBox.appendChild(filterCloseButton);

                // Toggle filter box visibility on button click
                filterBtn.addEventListener('click', () => {
                    // First check if there are any filter options available
                    const hasFilters = document.querySelectorAll('.filter-content > div').length > 0;

                    if (hasFilters) {
                        // Toggle the filter box
                        if (filterBox.style.display === 'none') {
                            filterBox.style.display = 'block';
                        } else {
                            filterBox.style.display = 'none';
                        }
                    } else {
                        // Optional: Show message if no filters available
                        console.log('No filters available to show');
                        filterBox.style.display = 'none';
                    }
                });

                // Close filter box when close button is clicked
                filterCloseButton.addEventListener('click', () => {
                    filterBox.style.display = 'none';
                });

                /*** ================== FILTER SECTION TOGGLE FUNCTIONALITY ================== ***/
                const filterHeaders = document.querySelectorAll('.filter-header');

                filterHeaders.forEach(header => {
                    const content = header.nextElementSibling;

                    // Initialize all filter sections as closed
                    content.style.display = 'none';

                    header.addEventListener('click', () => {
                        const isActive = content.style.display === 'block';

                        // Toggle content visibility
                        content.style.display = isActive ? 'none' : 'block';

                        // Rotate arrow animation
                        const arrow = header.querySelector('span');
                        arrow.classList.toggle('rotate', !isActive);
                    });
                });
            }
        });
    </script>


</body>

</html>
