<!DOCTYPE html>
<html lang="en">
<x-head />

<body>
    <x-header />
    <section class="content product-detail-container">
        <div class="product-container container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-7 col-md-8 col-sm-12">
                    <div class="row">
                        <div class="col-lg-5 col-md-6 col-sm-12">
                            <article class="demo-area">
                                <div class="product-img">
                                    <a class="demo-trigger" href="{{ asset($product->image_url) }}">
                                        <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}">
                                    </a>
                                </div>
                            </article>
                        </div>
                        <div class="p-0 col-lg-7 col-md-6 col-sm-12">
                            <div class="detail">
                                <div class="product-details mt-3">
                                    <img src="{{ asset($product->company->logo_url) }}"
                                        style="width: 100px;height:100%;" alt="{{ $product->companyname }}">

                                    <h2 class="product-title">{{ $product->name }}</h2>
                                    <p class="product-subtitle">{{ $product->description }}</p>

                                    <!-- Product Information -->
                                    <div class="product-info">

                                        <div class="info-item">
                                            <div class="info-label">Companyname:</div>
                                            <div class="info-value">{{ $product->company->name }}
                                            </div>
                                        </div>

                                        <div class="info-item">
                                            <div class="info-label">Category:</div>
                                            <div class="info-value">{{ $product->category->name }}
                                            </div>
                                        </div>


                                        <div class="info-item">
                                            <div class="info-label">Subcategory:</div>
                                            <div class="info-value">{{ $product->subcategory->name }}
                                            </div>
                                        </div>


                                        <div class="info-item">
                                            <div class="info-label">Material:</div>
                                            <div class="info-value">{{ $product->material }}</div>
                                        </div>

                                        <div class="info-item">
                                            <div class="info-label">Size:</div>
                                            <div class="info-value">{{ $product->size }}</div>

                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="info-item">
                                    <div class="bottom-btn my-3">
                                        @auth
                                            <a href="{{ route('inquiryform', ['product_id' => $product->id, 'product_name' => $product->name]) }}"
                                                class="cta">
                                                <span>Inquiry</span>
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('login') }}" class="inqury-btn">
                                                <span>Product Inquire</span>
                                                <!-- <i class="fa-solid fa-arrow-right"></i> -->
                                            </a>
                                        @endauth


                                    </div>
                                </div> --}}


                            </div>
                        </div>
                        @php
                            $fullAddress = implode(
                                ', ',
                                array_filter([
                                    $product->company->city ?? '',
                                    $product->company->state ?? '',
                                    $product->company->pincode ?? '',
                                ]),
                            );
                            // print_r($fullAddress);
                        @endphp
                        @php
                            use Carbon\Carbon;
                            $registrationDate = Carbon::parse($product->company->gst_registration_date);
                            $currentYear = Carbon::now();
                            $yearsSinceRegistration = $registrationDate->diffInYears($currentYear);
                            $registrationYear = $registrationDate->year;
                        @endphp
                        <div class="col-lg-12 d-block d-lg-none d-sm-block d-md-none">
                            <div class="company-personal-details sticky-top-new">
                                <div class="product-details mt-3">
                                    <img src="{{ asset($product->company->logo_url) }}"
                                        style="width: 100px;height:100%;margin-bottom: 10px;"
                                        alt="{{ $product->companyname }}">
                                </div>
                                <h6 class="company-product-title detail-text">{{ $product->company->name }}</h6>
                                <h6 class="detail-text company-address">{{ $fullAddress }}</h6>
                                <div class="company-start-date"><span class="title">Since:</span> <span
                                        class="title-ans">
                                        <p class="p-0 m-0">Registration Year: {{ $registrationYear }}</p>
                                        <p class="p-0 m-0">Years Since Registration: {{ $yearsSinceRegistration }} years</p>
                                    </span></div>
                                <div class="company-business-category"><span class="title">Business Category :</span>
                                    <span class="title-ans">{{ $product->company->nature_of_business ?? '' }}</span>
                                </div>
                                <div class="company-product-count"><span class="title">Number of Products :</span> <span
                                        class="title-ans"> {{ $product->company->products->count() ?? '0' }}</span>
                                </div>
                                <div class="mobile-no-content">
                                    <ul class="mobile-no-data">
                                        <li class="company-no">
                                            <div class="action_button_filled">
                                                <span class="telephone-icon">
                                                    <i class="fa-solid fa-phone" style="color: #ffffff;"></i>
                                                </span>
                                                <a href="tel:8511684938" class="no-link">
                                                    8511684938
                                                </a>
                                            </div>
                                        </li>
                                        <li class="whatsup-content">
                                        <div class="action_whatsup_filled">
                                            @if (Auth::check())
                                            <a target="_blank" class="whatsapp-share-button" rel="noopener noreferrer" role="button"
                                                title="Whats App Chat" aria-label="Whats app chat" class="no-link">
                                                <span class="whatus-icon"><i class="fa-brands fa-whatsapp"
                                                        style="color: #2aa81a;"></i></span>
                                                <span class="whatsup-link">WhatsApp</span>
                                            </a>
                                             @else
                                             <a target="_blank" onclick="openModal()" rel="noopener noreferrer" role="button"
                                                title="Whats App Chat" aria-label="Whats app chat" class="no-link">
                                                <span class="whatus-icon"><i class="fa-brands fa-whatsapp"
                                                        style="color: #2aa81a;"></i></span>
                                                <span class="whatsup-link">WhatsApp</span>
                                            </a>
                                              @endif
                                        </div>
                                       </li>
                                    </ul>
                                </div>
                               @if (Auth::check())
                  <div class="btn-area my-4">
                        <a href="javascript:void(0);" 
                           class="inqury-btn d-block text-center"
                           data-id="{{ $product->id }}"
                           data-name="{{ $product->name }}"
                           data-company="{{ $product->company->name ?? '' }}"
                           data-user="{{ Auth::user()->name ?? '' }}"
                           data-email="{{ Auth::user()->email ?? '' }}"
                           data-phone="{{ Auth::user()->mobileno ?? '' }}">
                           Inquiry now
                        </a>
                    </div>
                   @else
                          <a onclick="openModal()" style="border: 1px solid var(--primary-color);
                                                                padding: 4px 10px;
                                                                font-size: 13px;
                                                                border-radius: 20px;
                                                                color: var(--dark-color);
                                                                transition: 0.5s all ease-in-out;
                                                                text-decoration: none;cursor: pointer;" class="inqury-btn2 d-block text-center">
                                                                <span>Sign in to Inquire</span>
                                                            </a> 
                @endif
                            </div>
                        </div>

                        <div class="col-lg-12 col-12 d-lg-block product-desc-section">
                            <!--<ul class="nav nav-tabs" id="productDesc" role="tablist">-->
                            <!--    <li class="nav-item" role="presentation">-->
                            <!--        <button class="nav-link fw-bold py-2 px-0 active" data-tab="about-info"-->
                            <!--            type="button" role="tab">-->
                            <!--            <span class="tab-nav-link-text fw-bold">About Company</span>-->
                            <!--        </button>-->
                            <!--    </li>-->
                            <!--    <li class="nav-item" role="presentation">-->
                            <!--        <button class="nav-link fw-bold py-2 px-0" data-tab="more-product" type="button"-->
                            <!--            role="tab">-->
                            <!--            <span class="tab-nav-link-text fw-bold">More Products</span>-->
                            <!--        </button>-->
                            <!--    </li>-->
                            <!--</ul>-->
                             <ul class="nav nav-tabs" id="productDesc" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link fw-bold py-2 px-0 active" data-tab="about-info" type="button" role="tab">
                                        <span class="tab-nav-link-text fw-bold">About Company</span>
                                </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link fw-bold py-2 px-0" data-tab="more-product" type="button" role="tab">
                                        <span class="tab-nav-link-text fw-bold">More Products</span>
                                </a>
                                </li>
                            </ul>
                        </div>

                        <div class="prdoct-details-showbox">
                            <!-- Company About Info -->
                            <div class="tab-content about-info active" id="about-info">
                                <div class="productdetail-container container p-0">
                                    <div class="company-details">
                                        <div class="row">
                                            <div class="col-lg-12 d-flex justify-content-between">
                                                <p class="description-title">GST Registration Date: <span
                                                        class="description-txt">{{ $product->company->gst_registration_date }}</span>
                                                </p>
                                                <p class="description-title">Legal Status: <span
                                                        class="description-txt">{{ $product->company->legal_status }}</span>
                                                </p>

                                            </div>
                                        </div>
                                        <p class="description-title">Nature of Business: <span
                                                class="description-txt">{{ $product->company->nature_of_business }}</span>
                                        </p>
                                        <h4 class="description-titletxt">Company Description</h4>
                                        <p class="description-txt">{{ $product->company->description }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- More Products Info -->
                            <div class="tab-content more-product" id="more-product">
                                <div class="row">
                                    @php
                                        $categories2 = App\Models\Product::where(
                                            'company_id',
                                            '=',
                                            $product->company->id,
                                        )->get();
                                        // print_r($categories2);
                                    @endphp
                                    @forelse ($categories2 as $reletaedProductes)
                                        <!--<div class="col-xl-4 col-lg-3 col-md-6 col-sm-6 col-12">-->
                                        <!--    <div class="card-view inner-card">-->
                                        <!--        <a href="/product/{{ $reletaedProductes->id }}"-->
                                        <!--            class="card-link"></a>-->
                                        <!--        <div class="image-container">-->
                                        <!--            <div class="thumbnail_container">-->
                                        <!--                <div class="thumbnail">-->
                                        <!--                    <img src="{{ asset($reletaedProductes->image_url) }}"-->
                                        <!--                        alt="{{ $reletaedProductes->name }}"-->
                                        <!--                        class="product-image swiper-img"-->
                                        <!--                        onclick="openPopup(this)">-->
                                        <!--                </div>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--        <div class="logo-container" style="">-->
                                        <!--            <img src="{{ asset($reletaedProductes->company->logo_url) }}"-->
                                        <!--                class="logo-image" alt="{{ $reletaedProductes->name }}">-->
                                        <!--        </div>-->

                                        <!--        <div class="text-wrapper">-->
                                        <!--            <h6 class="tranding-product-name mt-3">-->
                                        <!--                <span class="title">Product:</span>-->
                                        <!--                <span-->
                                        <!--                    class="trnding-pro-name">{{ $reletaedProductes->name }}</span>-->
                                        <!--            </h6>-->

                                        <!--        </div>-->
                                        <!--        <div class="card-bottom">-->
                                        <!--            <h6 class="tranding-product-name">-->
                                        <!--                <span class="title">Company Name:</span>-->
                                        <!--                <span-->
                                        <!--                    class="tranding-pro-name">{{ $reletaedProductes->company->name }}</span>-->
                                        <!--            </h6>-->
                                        <!--            <h6 class="tranding-product-name">-->
                                        <!--                <span class="title">Category:</span>-->
                                        <!--                <span-->
                                        <!--                    class="tranding-pro-name">{{ $reletaedProductes->category->name }}</span>-->
                                        <!--            </h6>-->

                                        <!--            <h6 class="tranding-material-name">-->
                                        <!--                <span class="tranding-material-title">Material:</span>-->
                                        <!--                <span-->
                                        <!--                    class="mt-name tranding-mt-name">{{ $reletaedProductes->material }}</span>-->
                                        <!--            </h6>-->
                                        <!--            <h6 class="tranding-product-size">-->
                                        <!--                <span class="tranding-size-title">Size:</span>-->
                                        <!--                <span-->
                                        <!--                    class="tranding-sz-name">{{ $reletaedProductes->size }}</span>-->
                                        <!--            </h6>-->
                                        <!--            <p class="card-description content-txt" id="description-92">-->

                                        <!--                <span class="visible-text">-->
                                        <!--                    This Hammered Sauce...-->
                                        <!--                </span>-->

                                        <!--            </p>-->
                                        <!--            <a href="javascript:void(0)" class="read-more"-->
                                        <!--                onclick="toggleReadMore(92)"></a>-->

                                        <!--            <div class="d-flex justify-content-start mx-2 bottom-btn">-->
                                                        
                                                       
                                        <!--                 @if (Auth::check())-->
                                        <!--                    <a href="javascript:void(0);" -->
                                        <!--                       class="inqury-btn d-block text-center"-->
                                        <!--                       data-id="{{ $product->id }}"-->
                                        <!--                       data-name="{{ $product->name }}"-->
                                        <!--                       data-company="{{ $product->company->name ?? '' }}"-->
                                        <!--                       data-user="{{ Auth::user()->name ?? '' }}"-->
                                        <!--                       data-email="{{ Auth::user()->email ?? '' }}"-->
                                        <!--                       data-phone="{{ Auth::user()->mobileno ?? '' }}">-->
                                        <!--                       Inquiry now-->
                                        <!--                    </a>-->
                                        <!--                @else-->
                                        <!--                    <a onclick="openModal()" style="border: 1px solid var(--primary-color);-->
                                        <!--                        padding: 4px 10px;-->
                                        <!--                        font-size: 13px;-->
                                        <!--                        border-radius: 20px;-->
                                        <!--                        color: var(--dark-color);-->
                                        <!--                        transition: 0.5s all ease-in-out;-->
                                        <!--                        text-decoration: none;cursor: pointer;" class="inqury-btn2 mt-2">-->
                                        <!--                        <span>Sign in to Inquire</span>-->
                                        <!--                    </a>-->
                                        <!--                @endif-->
                                                    
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                            <!--  <div class="card-view">-->
                                            <!--    <a href="{{ route('product.show', $reletaedProductes->id) }}" class="card-link"></a>-->
                                            <!--    <div class="image-container">-->
                                            <!--        <div class="thumbnail_container">-->
                                            <!--            <div class="thumbnail">-->
                                            <!--                <img src="{{ asset($reletaedProductes->image_url) }}" class="product-image swiper-img" alt="{{ $reletaedProductes->name }}" onclick="openPopup(this)">-->
                                            <!--            </div>-->
                                            <!--        </div>-->
                                            <!--    </div>-->
                                            <!--    <div class="main-logo-container">-->
                                            <!--    <div class="logo-container" style="">-->
                                            <!--        @if ($reletaedProductes->company && $reletaedProductes->company->logo_url)-->
                                            <!--        <img src="{{ asset($reletaedProductes->company->logo_url) }}"  class="logo-image" alt="{{ $reletaedProductes->company->name }}">-->
                                            <!--    @else-->
                                            <!--        <span>No Logo</span>-->
                                            <!--    @endif-->
                                            <!--    </div>-->
                                            <!--    <div class="image_overlay view-arrow-btn hide">-->
                                            <!--        <i class="fas fa-arrow-circle-down"></i>-->
                                            <!--    </div>-->
                                            <!--    </div>-->
                        
                                            <!--    <div class="card-body product-card-body">-->
                                            <!--         <h6 class="tranding-product-name text-product">-->
                                            <!--            {{-- <span class="title">Product:</span> --}}-->
                                            <!--            <span class="trnding-pro-name">{{ $reletaedProductes->name }}</span>-->
                                            <!--        </h6>-->
                                            <!--    <div class="product-description-div">-->
                        
                                            <!--    <div class="text-wrapper">-->
                                            <!--    <p class="card-description content-txt" id="description-{{ $reletaedProductes->id }}">-->
                                            <!--        <span class="visible-text">-->
                                            <!--            {{ Str::limit($reletaedProductes->description, 60) }}-->
                                            <!--        </span>-->
                                            <!--    </p>-->
                                            <!--    </div>-->
                                            <!--    <div class="card-bottom">-->
                        
                                            <!--        <h6 class="tranding-product-name">-->
                                            <!--            <span class="title">Company:</span>-->
                        
                                            <!--            <span class="tranding-pro-name">{{ $reletaedProductes->company->name }}</span>-->
                                            <!--        </h6>-->
                                            <!--        <h6 class="tranding-product-name">-->
                                            <!--            <span class="title">Category:</span>-->
                                            <!--            <span class="tranding-pro-name">{{ $reletaedProductes->category->name }}</span>-->
                                            <!--        </h6>-->
                                            <!--        {{-- <h6 class="tranding-product-name">-->
                                            <!--            <span class="title">Product:</span>-->
                                            <!--            <span class="trnding-pro-name">{{ $reletaedProductes->name }}</span>-->
                                            <!--        </h6> --}}-->
                        
                                            <!--        <h6 class="tranding-material-name">-->
                                            <!--            <span class="tranding-material-title">Material:</span>-->
                                            <!--            <span class="mt-name tranding-mt-name">{{ $reletaedProductes->material }}</span>-->
                                            <!--        </h6>-->
                                            <!--        <h6 class="tranding-product-size">-->
                                            <!--            <span class="tranding-size-title">Size:</span>-->
                                            <!--            <span class="tranding-sz-name">{{ $product->size }}</span>-->
                                            <!--        </h6>-->
                        
                        
                                            <!--    </div>-->
                                            <!--    </div>-->
                                            <!--    <div class="d-flex justify-content-start mx-2 bottom-btn">-->
                                            <!--            @auth-->
                                            <!--                <a href="{{ route('product.show', $product->id) }}"-->
                                            <!--                    class="inqury-btn">-->
                                            <!--                    <span>Inquiry</span>-->
                                            <!--                </a>-->
                                            <!--            @else-->
                                            <!--            {{-- <a href="{{ route('login') }}" class="inqury-btn mt-2"> --}}-->
                                            <!--            <a onclick="openModal()" style="cursor: pointer" class="inqury-btn mt-2">-->
                                            <!--                <span>Sign in to Inquire</span>-->
                                            <!--            </a>-->
                                            <!--        @endauth-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <!--</div>-->
                                        <!--</div>-->
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 product-col">
                                            <div class="card-view mycustom">
                                                <a href="{{ route('product.show', $reletaedProductes->id) }}" class="card-link"></a>
                                                <div class="image-container">
                                                    <div class="thumbnail_container">
                                                        <div class="thumbnail">
                                                            <img src="{{ asset($reletaedProductes->image_url) }}" class="product-image swiper-img"
                                                                alt="{{ $reletaedProductes->name }}" onclick="openPopup(this)">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="main-logo-container">

<<<<<<< HEAD
                                                <div class="text-wrapper">
                                                    <h6 class="tranding-product-name mt-3">
                                                        <span class="title">Product:</span>
                                                        <span
                                                            class="trnding-pro-name">{{ $reletaedProductes->name }}</span>
                                                    </h6>

                                                </div>
                                                <div class="card-bottom">
                                                    <h6 class="tranding-product-name">
                                                        <span class="title">Company Name:</span>
                                                        <span
                                                            class="tranding-pro-name">{{ $reletaedProductes->company->name }}</span>
                                                    </h6>
                                                    <h6 class="tranding-product-name">
                                                        <span class="title">Category:</span>
                                                        <span
                                                            class="tranding-pro-name">{{ $reletaedProductes->category->name }}</span>
                                                    </h6>

                                                    <h6 class="tranding-material-name">
                                                        <span class="tranding-material-title">Material:</span>
                                                        <span
                                                            class="mt-name tranding-mt-name">{{ $reletaedProductes->material }}</span>
                                                    </h6>
                                                    <h6 class="tranding-product-size">
                                                        <span class="tranding-size-title">Size:</span>
                                                        <span
                                                            class="tranding-sz-name">{{ $reletaedProductes->size }}</span>
                                                    </h6>
                                                    <p class="card-description content-txt" id="description-92">
                                                        <span class="visible-text">
                                                            This Hammered Sauce...
                                                        </span>

                                                    </p>
                                                    <a href="javascript:void(0)" class="read-more"
                                                        onclick="toggleReadMore(92)"></a>

                                                    <div class="d-flex justify-content-start mx-2 bottom-btn">
                                                        <a href="http://127.0.0.1:8000/login" class="inqury-btn mt-2">
                                                            <span>Sign in to Inquire</span>
                                                        </a>
=======
                                                    <div class="logo-container">
                                                        @if ($reletaedProductes->company && $reletaedProductes->company->logo_url)
                                                            <img src="{{ asset($reletaedProductes->company->logo_url) }}" class="logo-image"
                                                                alt="{{ $reletaedProductes->company->name }}">
                                                        @else
                                                            <span>No Logo</span>
                                                        @endif
                                                    </div>
                                                    <div class="image_overlay view-arrow-btn hide">
                                                        <i class="fas fa-arrow-circle-down"></i>
>>>>>>> 4913e25a9bea5c0867863dfd8d5bda8a9053b125
                                                    </div>
                                                </div>
                                                <div class="card-body product-card-body">
                                                    <p class="card-description content-txt" id="description-{{ $reletaedProductes->id }}">

                                                        <span class="visible-text">
                                                            {{ Str::limit($reletaedProductes->description,60) }}
                                                        </span>
                                                        <span class="more-text">
                                                            {{ substr($reletaedProductes->description, 40) }}
                                                        </span>
                                                    </p>
                                                    <div class="product-description-div">
                                                        <div class="text-wrapper">
                                                            <h6 class="product-name text-product">
                                                                {{-- <span class="title">Product: </span> --}}
                                                                 <span class="pro-name">{{ $reletaedProductes->name }}</span>
                                                            </h6>
                                                        </div>
                                                        <h6 class="company-name">
                                                            <span class="title">Company: </span>
                                                            <span class="pro-company">{{ $reletaedProductes->company->name ?? 'N/A' }}</span>
                                                        </h6>
                                                        <h6 class="product-name">
                                                            <span class="title">Category: </span>
                                                            <span class="pro-name">{{ $reletaedProductes->category->name ?? 'N/A' }}</span>
                                                        </h6>


                                                        <h6 class="material-name">
                                                            <span class="material-title">Material: </span>
                                                            <span class="mt-name">{{ $reletaedProductes->material }}</span>
                                                        </h6>
                                                        <h6 class="product-size">
                                                            <span class="size-title">Size: </span>
                                                            <span class="sz-name">{{ $reletaedProductes->size }}</span>
                                                        </h6>

                                                        <a href="javascript:void(0)" class="read-more"
                                                            onclick="toggleReadMore({{ $reletaedProductes->id }})"></a>



                                                    </div>
                                                    <!-- CTA button within the card -->
                                                    <div class="d-flex justify-content-start mx-2 bottom-btn">
                                                        @if (Auth::check())
                                                            <a href="javascript:void(0);" 
                                                               class="inqury-btn d-block text-center"
                                                               data-id="{{ $reletaedProductes->id }}"
                                                               data-name="{{ $reletaedProductes->name }}"
                                                               data-company="{{ $reletaedProductes->company->name ?? '' }}"
                                                               data-user="{{ Auth::user()->name ?? '' }}"
                                                               data-email="{{ Auth::user()->email ?? '' }}"
                                                               data-phone="{{ Auth::user()->mobileno ?? '' }}">
                                                               Inquiry now
                                                            </a>
                                                        @else
                                                            <a onclick="openModal()" style="border: 1px solid var(--primary-color);
                                                                padding: 4px 10px;
                                                                font-size: 13px;
                                                                border-radius: 20px;
                                                                color: var(--dark-color);
                                                                transition: 0.5s all ease-in-out;
                                                                text-decoration: none;cursor: pointer;" class="inqury-btn2 mt-2">
                                                                <span>Sign in to Inquire</span>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @empty
                                        <li>No products found.</li>
                                    @endforelse
                                   
                                </div>

                            </div>
                        </div>

                    </div>


                    <!--company details section for bottom -->

                    <!-- <div class="product-container">
                        <h4 class="main-heading my-4" style="display: block;">About the Company</h4>
                    </div>
                    <div class="productdetail-container container">
                        <div class="company-details mx-2">
                            <div class="row">
                                <div class="col-lg-12 d-flex justify-content-between">
                                    <p class="description-title">GST Registration Date: <span class="description-txt">{{ $product->company->gst_registration_date }}</span></p>
                                    <p class="description-title">Legal Status: <span class="description-txt">{{ $product->company->legal_status }}</span></p>

                                </div>
                            </div>
                            <p class="description-title">Nature of Business: <span class="description-txt">{{ $product->company->nature_of_business }}</span></p>
                            <h4 class="description-titletxt">Description</h4>
                            {{-- <p>{{ $product->company->description }}</p> --}}


                        </div>
                    </div> -->
                </div>

                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 d-lg-block d-sm-none d-md-block d-sm-none d-none">
                    <div class="company-personal-details sticky-top-new">
                        <div class="product-details mt-3">
                            <img src="{{ asset($product->company->logo_url) }}"
                                style="width: 100px;height:100%;margin-bottom: 10px;"
                                alt="{{ $product->companyname }}">
                        </div>
                        <h6 class="company-product-title detail-text">{{ $product->company->name ?? '' }}</h6>
                        <h6 class="detail-text company-address">{{ $fullAddress }}</h6>
                        <div class="company-start-date"><span class="title">Since:</span> <span class="title-ans">
                                {{-- {{ $product->company->gst_registration_date }}2011 --}}
                                <p class="p-0 m-0">Registration Year: {{ $registrationYear }}</p>
                                <p class="p-0 m-0">Years Since Registration: {{ $yearsSinceRegistration }} years</p>
                            </span></div>
                        <div class="company-business-category"><span class="title">Business Category :</span> <span
                                class="title-ans">{{ $product->company->nature_of_business ?? '' }}</span></div>
                        <div class="company-product-count"><span class="title">Number of Products :</span> <span
                                class="title-ans"> {{ $product->company->products->count() ?? '0' }}</span></div>
                        <div class="mobile-no-content">
                            <ul class="mobile-no-data">
                                <li class="company-no">
                                    <div class="action_button_filled">
                                        <span class="telephone-icon">
                                            <i class="fa-solid fa-phone" style="color: #ffffff;"></i>
                                        </span>
                                        <a href="tel:8511684938" class="no-link">
                                            8511684938
                                        </a>
                                    </div>
                                </li>
                                <li class="whatsup-content">
                                    <div class="action_whatsup_filled">
                                        @if (Auth::check())
                                        <a target="_blank" class="whatsapp-share-button" rel="noopener noreferrer" role="button"
                                            title="Whats App Chat" aria-label="Whats app chat" class="no-link">
                                            <span class="whatus-icon"><i class="fa-brands fa-whatsapp"
                                                    style="color: #2aa81a;"></i></span>
                                            <span class="whatsup-link">WhatsApp</span>
                                        </a>
                                         @else
                                         <a target="_blank" onclick="openModal()" rel="noopener noreferrer" role="button"
                                            title="Whats App Chat" aria-label="Whats app chat" class="no-link">
                                            <span class="whatus-icon"><i class="fa-brands fa-whatsapp"
                                                    style="color: #2aa81a;"></i></span>
                                            <span class="whatsup-link">WhatsApp</span>
                                        </a>
                                          @endif
                                    </div>
                                </li>
                            </ul>
                        </div>
                       @if (Auth::check())
                    <div class="btn-area my-4">
                        <a href="javascript:void(0);" 
                           class="inqury-btn d-block text-center"
                           data-id="{{ $product->id }}"
                           data-name="{{ $product->name }}"
                           data-company="{{ $product->company->name ?? '' }}"
                           data-user="{{ Auth::user()->name ?? '' }}"
                           data-email="{{ Auth::user()->email ?? '' }}"
                           data-phone="{{ Auth::user()->mobileno ?? '' }}">
                           Inquiry now
                        </a>
                    </div>
               
                     @else
                          <a onclick="openModal()" style="border: 1px solid var(--primary-color);
                                                                padding: 4px 10px;
                                                                font-size: 13px;
                                                                border-radius: 20px;
                                                                color: var(--dark-color);
                                                                transition: 0.5s all ease-in-out;
                                                                text-decoration: none;cursor: pointer;" class="inqury-btn2 d-block text-center">
                                                                <span>Sign in to Inquire</span>
                                                            </a>                                                                         
                @endif

                    </div>
                </div>
            </div>

        </div>

        </div>

        {{-- <div class="whatsapp-main-box">
            <a href="#" id="whatsapp-share-button" class="popmake-470 mx-auto">
                <img class="whatsapp-icon" src="{{ asset('images/icons8-whatsapp-48.png') }}" alt="WhatsApp Icon">
            </a>
        </div> --}}
              <script>
        function encodeText(text) {
            return encodeURIComponent(text);
        }
    
        function getWhatsAppShareURL(productName, productDescription, productURL) {
            const phoneNumber = '918511684938'; // Your business WhatsApp number
            const message = `I'm interested in the product: ${productName}\nDescription: ${productDescription}\nYou can view it here: ${productURL}`;
            const encodedMessage = encodeText(message);
    
            // Detect if the user is on mobile or desktop
            if (/Android|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                return `https://wa.me/${phoneNumber}?text=${encodedMessage}`;
            } else {
                return `https://web.whatsapp.com/send?phone=${phoneNumber}&text=${encodedMessage}`;
            }
        }
    
        document.addEventListener('DOMContentLoaded', function () {
            // Select all buttons with the class 'whatsapp-share-button'
            const whatsappButtons = document.querySelectorAll('.whatsapp-share-button');
            
            // Loop through each button and add the event listener
            whatsappButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    
                    const productName = '{{ $product->name }}';
                    const productDescription = '{{ $product->description }}';
                    const productURL = window.location.href;
                    
                    // Open WhatsApp share URL in a new tab
                    window.open(getWhatsAppShareURL(productName, productDescription, productURL), '_blank');
                });
            });
        });
    </script>
    </section>

<script>
    // Function to open modal and populate values
    function openInquiryModal(productId, productName, companyName, userName, userEmail, userPhone) {
        document.getElementById("modalProductId").value = productId;
        document.getElementById("modalProductName").value = productName;
        document.getElementById("modalCompanyName").value = companyName;
        document.getElementById("modalUserEmail").value = userEmail;
        document.getElementById("modalUserPhone").value = userPhone;
        document.getElementById("modalUserName").value = userName;

        // Display modal
        document.getElementById("inquiryModal").style.display = "flex";
    }

    // Attach event to close button
    document.getElementById("closeInquiryModal").addEventListener("click", function () {
        document.getElementById("inquiryModal").style.display = "none";
    });

    // Attach click listeners to all buttons with .inqury-btn class
    document.querySelectorAll('.inqury-btn').forEach(button => {
        button.addEventListener('click', function () {
            openInquiryModal(
                this.dataset.id,
                this.dataset.name,
                this.dataset.company,
                this.dataset.user,
                this.dataset.email,
                this.dataset.phone
            );
        });
    });
</script>

    <script>
        // function openInquiryModal() {
        //     document.getElementById("inquiryModal").style.display = "flex";
        // }

        // document.getElementById("closeInquiryModal").addEventListener("click", function() {
        //     document.getElementById("inquiryModal").style.display = "none";
        // });
        
document.addEventListener('DOMContentLoaded', () => {
    const tabs = document.querySelectorAll('.product-desc-section .nav-link'); // Select all tabs
    const contents = document.querySelectorAll('.tab-content'); // Select all tab content sections

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            // Remove the 'active' class from all tabs
            tabs.forEach(tab => tab.classList.remove('active'));

            // Hide all content sections
            contents.forEach(content => (content.style.display = 'none'));

            // Add the 'active' class to the clicked tab
            tab.classList.add('active');

            // Get the target content's ID from the 'data-tab' attribute
            const targetId = tab.getAttribute('data-tab');

            // Display the corresponding content
            const targetContent = document.getElementById(targetId);
            if (targetContent) {
                targetContent.style.display = 'block'; // Ensure only the targeted content is shown
            }
        });
    });

    // Initialize by showing only the first tab's content and marking the first tab as active
    if (tabs.length > 0 && contents.length > 0) {
        tabs.forEach(tab => tab.classList.remove('active'));
        contents.forEach(content => (content.style.display = 'none'));

        tabs[0].classList.add('active'); // Mark the first tab as active
        contents[0].style.display = 'block'; // Show the first tab's content
    }
    });

    </script>
    <x-footer class="mb-0" />
    <x-script />
</body>

</html>
