<!DOCTYPE html>
<html lang="en">

<head>
    <x-head />
    <style>
        /* Existing loader styles - completely unchanged */
        .loader_circle_1s {
            animation: rotateClockwise 1s linear infinite;
            transform-origin: center;
            transform-box: fill-box;
        }
        /* ... (keep all existing loader styles exactly as they were) ... */

        /* NEW FILTER STYLES ONLY - won't affect cards */
        .filter-container {
            position: sticky;
            top: 100px;
            height: fit-content;
            margin-right: 20px;
            width: 280px;
            z-index: 10;
        }

        .filter-box {
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .filter-header {
            cursor: pointer;
            padding: 12px 15px;
            background-color: #f8f9fa;
            border-radius: 5px;
            margin-bottom: 10px;
            display: flex;
            width: 240px;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s ease;
        }

        .filter-header:hover {
            background-color: #e9ecef;
        }

        .filter-header h5 {
            margin: 0;
            font-size: 16px;
            font-weight: 600;
        }

        .filter-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
            padding: 0 15px;
        }

        .filter-content.active {
            max-height: 500px;
            min-width: 243px;
            padding: 10px 15px;
            transition: max-height 0.5s ease-in;
        }

        .filter-content > div {
            margin: 8px 0;
        }

        .down-arrow-view i {
            transition: transform 0.3s ease;
        }

        .down-arrow-view.rotate i {
            transform: rotate(180deg);
        }

        /* Layout adjustments that won't affect cards */
        .outer-box-search {
            display: flex;
            flex-wrap: wrap;
            position: relative;
        }

        .product-view-box {
            flex: 1;
            min-width: 0;
        }

        @media (max-width: 992px) {
            .filter-container {
                position: static;
                width: 100%;
                margin-right: 0;
                margin-bottom: 20px;
            }

            .outer-box-search {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <x-header />

    @if ($results['message'] != null)
        <div class="container px-2 m-0 py-2">
            <h6 class="not-found-content">{{ $results['message'] }}</h6>
        </div>
    @endif

    @if ($results['products'] && $results['products']->isNotEmpty())
      <section class="filter-search-page">
        <div class="container">
            <div class="company-badges">
                @foreach ($results['companies'] as $companyOption)
                    <span class="badge">{{ $companyOption->name }}</span>
                @endforeach
            </div>


                <button class="filter-btn d-none" style="background-color:transparent;border:0;">
                    <i class="fa-solid fa-filter"></i>
                </button>
                <div class="outer-box-search" style="margin-bottom: 110px;">
                    <div class="d-lg-none d-md-none d-sm-block d-block">
                        <div class="d-flex aligin-items-center justify-content-center mobil-rightpart">
                            <div class="search-section search-page-mb">
                                <div class="search-location-box">
                                    <div class="inputgroup_location">
                                        <div class="input_location_box">
                                            <div class="location-img">
                                                <img src="{{ asset('images/mapicon.png') }}" alt="location img">
                                            </div>
                                            <form method="GET" action="{{ route('search') }}">
                                                <input type="text" autocomplete="off" class="input_location"
                                                    aria-label="City Auto-suggest" placeholder="Enter City" name="location"
                                                    id="city-auto-sug"
                                                    @if (session()->has('city')) value="{{ session('city') }}" @endif>

                                                <div id="suggestions-box2" class="suggestions-box input_location_box">
                                                    <ul id="suggestions2"></ul>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="search-container">
                                    <div class="search-input-box">

                                        <div id="search-form" class="search-box-section">
                                            <div class="search-btn-box">
                                                <button type="submit" class="search-btn">
                                                    <img src="{{ asset('images/searchicon.png') }}" alt="location img">
                                                </button>
                                            </div>
                                            <input type="text" name="query" id="search-bar" oninput="fetchSuggestions()"
                                                autocomplete="off" placeholder="Search here ...">
                                            <div id="suggestions-box" class="suggestions-box">
                                                <ul id="suggestions-list" class="pt-2"></ul>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="d-block d-lg-none d-md-none d-sm-block d-xl-none">
                                @if (Auth::check())
                                    @auth
                                        <div class="dropdown logout-dropdown">
                                            <button class="dropdown-btn">
                                                <span><i class="fa-regular fa-user" style="color: #000000;"></i></span>
                                                {{-- {{ Auth::user()->name }} --}}
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    {{ Auth::user()->name }}
                                                </li>
                                                <li>
                                                    <a href="{{ route('logout') }}" class="logout-btn"
                                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        Logout
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                        style="display: none;">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>

                                    @endauth
                                @else

                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="filter-box">
                        <form id="filterForm" method="GET" action="{{ route('filter.products') }}">
                            @csrf
                            <!-- Company Filters -->
                            <div class="filter-header">
                                <h5 class="m-0">Company Name</h5>
                                <span class="down-arrow-view"><i class="fa-solid fa-angle-down"></i></span>
                            </div>
                            <div class="filter-content">
                                @foreach ($results['companies'] as $companyFilter)
                                    <div>
                                        <label>
                                            <span class="location-checkbox">
                                                <input type="checkbox" name="company_ids[]"
                                                    value="{{ $companyFilter->id }}"
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
                                            <span class="location-checkbox">
                                                <input type="checkbox" name="subcategory_ids[]"
                                                    value="{{ $subCategoryFilter->id }}"
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

                <!-- Product View Box - This remains EXACTLY as it was -->
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
                                <!-- EXACTLY YOUR ORIGINAL PRODUCT CARD MARKUP -->
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 p-1">
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
                                                            <span class="trnding-pro-name">{{ $product->name }}</span>
                                                        </h6>
                                                    </div>
                                                    <div class="card-bottom">
                                                        <h6 class="tranding-product-name">
                                                            <span class="title">Company:</span>
                                                            <span class="tranding-pro-name">{{ $product->company->name }}</span>
                                                        </h6>
                                                        <h6 class="tranding-product-name">
                                                            <span class="title">Category:</span>
                                                            <span class="tranding-pro-name">{{ $product->category->name }}</span>
                                                        </h6>
                                                        <h6 class="tranding-product-name">
                                                            <span class="title">Product:</span>
                                                            <span class="trnding-pro-name">{{ $product->name }}</span>
                                                        </h6>
                                                        <h6 class="tranding-material-name">
                                                            <span class="tranding-material-title">Material:</span>
                                                            <span class="mt-name tranding-mt-name">{{ $product->material }}</span>
                                                        </h6>
                                                        <h6 class="tranding-product-size">
                                                            <span class="tranding-size-title">Size:</span>
                                                            <span class="tranding-sz-name">{{ $product->size }}</span>
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
                                                            <span class="pro-name">{{ $product->name }}</span>
                                                        </h6>
                                                    </div>
                                                    <h6 class="company-name">
                                                        <span class="title">Company: </span>
                                                        <span class="pro-company">{{ $product->company->name ?? 'N/A' }}</span>
                                                    </h6>
                                                    <h6 class="product-name">
                                                        <span class="title">Category: </span>
                                                        <span class="pro-name">{{ $product->category->name ?? 'N/A' }}</span>
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
                                                <div class="d-flex justify-content-start mx-2 bottom-btn">
                                                    @auth
                                                        <a href="{{ route('inquiryform', ['product_id' => $product->id, 'product_name' => $product->name]) }}"
                                                            class="inqury-btn">
                                                            <span>Inquiry</span>
                                                        </a>
                                                    @else
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
    @endif

    <x-footer class="mt-4" />
    <x-script />

    <script>
        // Initialize filter sections as collapsible and closed by default
        document.addEventListener("DOMContentLoaded", function() {
            // Collapsible filter sections
            const filterHeaders = document.querySelectorAll('.filter-header');

            filterHeaders.forEach(header => {
                const content = header.nextElementSibling;
                const arrow = header.querySelector('.down-arrow-view');

                // Initialize all sections as collapsed by default
                content.classList.remove('active');

                header.addEventListener('click', () => {
                    content.classList.toggle('active');
                    arrow.classList.toggle('rotate');
                });
            });

            // Product filtering functionality - remains exactly the same
            function truncateString(str, length) {
                if (!str) return 'No description available';
                return str.length > length ? str.substring(0, length) + '...' : str;
            }

            function updateProductList() {
                $('#loader').show();
                $('#product-list').hide();
                $('#product-list-2').hide();

                let formData = $('#filterForm').serialize();

                $.ajax({
                    url: '{{ route('filter.products') }}',
                    method: 'GET',
                    data: formData,
                    success: function(response) {
                        $('#loader').hide();
                        $('#product-list').show();
                        let productListHtml = '';
                        response.products.forEach(function(product) {
                            productListHtml += `
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-3 p-1">
                                <div class="item product-col">
                                    <div class="card-view">
                                        <a href="/product/${product.id}" class="card-link"></a>
                                        <div class="image-container">
                                            <div class="thumbnail_container">
                                                <div class="thumbnail">
                                                    <img src="${product.image_url}"
                                                        class="product-image swiper-img"
                                                        alt="${product.name}" onclick="openPopup(this)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="main-logo-container">
                                            <div class="logo-container" style="">
                                                ${product.company && product.company.logo_url ?
                                                    `<img src="${product.company.logo_url}" class="logo-image" alt="${product.company.name}">` :
                                                    '<span>No Logo</span>'}
                                            </div>
                                        </div>
                                        <div class="card-body product-card-body">
                                            <p class="card-description content-txt">
                                                <span class="visible-text">
                                                    ${truncateString(product.description, 50)}
                                                </span>
                                            </p>
                                            <div class="product-description-div">
                                                <button class="close-description-btn">&times;</button>
                                                <div class="text-wrapper">
                                                    <h6 class="tranding-product-name text-product">
                                                        <span class="trnding-pro-name">${product.name}</span>
                                                    </h6>
                                                </div>
                                                <div class="card-bottom">
                                                    <h6 class="tranding-product-name">
                                                        <span class="title">Company:</span>
                                                        <span class="tranding-pro-name">${product.company.name}</span>
                                                    </h6>
                                                    <h6 class="tranding-product-name">
                                                        <span class="title">Category:</span>
                                                        <span class="tranding-pro-name">${product.category.name}</span>
                                                    </h6>
                                                    <h6 class="tranding-product-name">
                                                        <span class="title">Product:</span>
                                                        <span class="trnding-pro-name">${product.name}</span>
                                                    </h6>
                                                    <h6 class="tranding-material-name">
                                                        <span class="tranding-material-title">Material:</span>
                                                        <span class="mt-name tranding-mt-name">${product.material}</span>
                                                    </h6>
                                                    <h6 class="tranding-product-size">
                                                        <span class="tranding-size-title">Size:</span>
                                                        <span class="tranding-sz-name">${product.size}</span>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between w-100 align-items-center">
                                                <div class="d-flex justify-content-start bottom-btn">
                                                    ${product.auth ?
                                                        `<a href="/inquiryform?product_id=${product.id}&product_name=${product.name}" class="inqury-btn mt-2">
                                                            <span>Inquiry</span>
                                                        </a>` :
                                                        `<a href="/login" class="inqury-btn mt-2">
                                                            <span>Sign in to Inquire</span>
                                                        </a>`}
                                                </div>
                                                <a class="image_overlay view-arrow-btn detail-btn">
                                                    View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
                        });
                        $('#product-list').html(productListHtml);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error loading products: ", error);
                        $('#loader').hide();
                        $('#product-list').show();
                    }
                });
            }

            $('.filter-checkbox').on('change', function() {
                updateProductList();
            });

            // Menu toggle functionality - remains exactly the same
            const menuBtn = document.getElementById('menu-btn');
            const navMenu = document.querySelector('.nav-view');
            const closeBtn = document.getElementById('close-btn');

            if (menuBtn && navMenu && closeBtn) {
                menuBtn.addEventListener('click', () => {
                    navMenu.classList.add('show');
                    menuBtn.style.display = 'none';
                    closeBtn.style.display = 'block';
                });

                closeBtn.addEventListener('click', () => {
                    navMenu.classList.remove('show');
                    closeBtn.style.display = 'none';
                    menuBtn.style.display = 'block';
                });
            }
        });
    </script>
</body>
</html>
