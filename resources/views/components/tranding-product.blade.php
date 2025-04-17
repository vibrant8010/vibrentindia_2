    <section class="section-margin" id="TrendingProducts">
        <div class="container">
            <div class="heading-section">
                <div class="main-heading">Trending Products</div>
                <a href="{{ route('alltrendingcategory') }}" class="btn-view primary-btn d-lg-block d-xl-block d-sm-none d-none d-md-block">View More</a>
            </div>

            {{-- desktop view --}}
            <div class="row g-1 desktop-grid">
                @foreach ($trendingProducts as $product)
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 product-col">
                        <div class="card-view">
                            <a href="{{ route('product.show', $product->id) }}" class="card-link"></a>
                            <div class="image-container">
                                <div class="thumbnail_container">
                                    <div class="thumbnail">
                                        <img src="{{ asset($product->image_url) }}" class="product-image swiper-img"
                                            alt="{{ $product->name }}" onclick="openPopup(this)">
                                    </div>
                                </div>
                            </div>
                            <div class="main-logo-container">
                                <div class="logo-container">
                                    @if ($product->company && $product->company->logo_url)
                                        <img src="{{ asset($product->company->logo_url) }}" class="logo-image"
                                            alt="{{ $product->company->name }}">
                                    @else
                                        <span>No Logo</span>
                                    @endif

                                </div>
                                <div class="image_overlay view-arrow-btn hide">
                                    <i class="fas fa-arrow-circle-down"></i>
                                </div>
                            </div>

                            <div class="card-body product-card-body">
                                <h6 class="tranding-product-name text-product">
                                    {{-- <span class="title">Product:</span> --}}
                                    <span class="trnding-pro-name">{{ $product->name }}</span>
                                </h6>


                            <div class="product-description-div">

                                <div class="text-wrapper">
                                    <p class="card-description content-txt" id="description-{{ $product->id }}">
                                        <span class="visible-text">
                                            {{ Str::limit($product->description, 30) }}
                                        </span>

                                    </p>
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
                            <div class="d-flex justify-content-start mx-2 bottom-btn">
                                @auth
                                    <a href="{{ route('product.show', $product->id) }}"
                                        class="inqury-btn">
                                        <span>Inquiry</span>
                                    </a>
                                @else
                                    {{-- <a href="{{ route('login') }}" class="inqury-btn mt-2 me-0"> --}}
                                    <a onclick="openModal()" style="cursor: pointer" class="inqury-btn mt-2 me-0">
                                        <span>Sign in to Inquire</span>
                                    </a>
                                @endauth
                            </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- mobile view --}}
               <div class="d-block d-sm-block d-md-block d-xl-none d-lg-none">
            <div id="trandingproductcaresoule" class="owl-carousel owl-theme">
                @foreach ($trendingProducts as $product)
                <div class="item product-col">
                    <div class="card-view">
                        <a href="{{ route('product.show', $product->id) }}" class="card-link"></a>
                        <div class="image-container">
                            <div class="thumbnail_container">
                                <div class="thumbnail">
                                    <img src="{{ asset($product->image_url) }}" class="product-image swiper-img"
                                        alt="{{ $product->name }}" onclick="openPopup(this)">
                                </div>
                            </div>
                        </div>
                        <div class="main-logo-container">
                            <div class="logo-container">
                                @if ($product->company && $product->company->logo_url)
                                    <img src="{{ asset($product->company->logo_url) }}" class="logo-image"
                                        alt="{{ $product->company->name }}">
                                @else
                                    <span>No Logo</span>
                                @endif

                            </div>
                            <div class="image_overlay view-arrow-btn hide">
                                <i class="fas fa-arrow-circle-down"></i>
                            </div>
                        </div>

                        <div class="card-body product-card-body">
                            <p class="card-description content-txt" id="description-{{ $product->id }}">

                                <span class="visible-text">
                                    {{ Str::limit($product->description, 60) }}
                                </span>

                            </p>
                        <div class="product-description-div">

                            <div class="text-wrapper">
                                <h6 class="tranding-product-name text-product">
                                    {{-- <span class="title">Product:</span> --}}
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
                        <div class="d-flex justify-content-start mx-2 bottom-btn">
                            @auth
                                <a href="{{ route('inquiryform', ['product_id' => $product->id, 'product_name' => $product->name]) }}"
                                    class="inqury-btn mt-2 me-0">
                                    <span>Inquiry</span>
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="inqury-btn mt-2 me-0">
                                    <span>Sign in to Inquire</span>
                                </a>
                            @endauth
                        </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            <div class="d-flex justify-content-center">
                <a href="{{ route('alltrendingcategory') }}" class="btn-view mobile-btn primary-btn d-lg-none d-xl-none d-sm-block d-block d-md-none text-center">View More</a>
            </div>
            </div>
        </div>
    </section>
