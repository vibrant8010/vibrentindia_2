<!DOCTYPE html>
<html lang="en">

    <x-head />

  <style>



  </style>

  <body>
    <x-header />

     <div class="container inner-product-container">
      <div class="row mt-3">
        <div class="product-img">
          <a href="" class="thum-link"></a>
          @if($products->count() > 0)
          <div class="row g-1">
          @foreach($products as $product)

          <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
            <div class="card-view inner-card">
                <a href="{{ route('product.show', $product->id) }}" class="card-link"></a>
                <div class="image-container">
                    <div class="thumbnail_container">
                        <div class="thumbnail">
                            <img src="{{ asset($product->image_url) }}" class="product-image swiper-img" alt="{{ $product->name }}" onclick="openPopup(this)">
                        </div>
                    </div>
                </div>
                <div class="logo-container" style="">
                    @if ($product->company && $product->company->logo_url)
                    <img src="{{ asset($product->company->logo_url) }}"  class="logo-image" alt="{{ $product->company->name }}">
                @else
                    <span>No Logo</span>
                @endif
                </div>

                <div class="text-wrapper">
                    <h6 class="tranding-product-name text-product m-0">
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
                     <p class="card-description content-txt" id="description-{{ $product->id }}">

                            <span class="visible-text">
                                {{ Str::limit($product->description, 40) }}
                            </span>

                        </p>
                        <a href="javascript:void(0)" class="read-more" onclick="toggleReadMore({{ $product->id }})"></a>

                    <div class="d-flex justify-content-start mx-2 bottom-btn">
                        @auth
                            <a href="{{ route('inquiryform', ['product_id' => $product->id, 'product_name' => $product->name]) }}" class="inqury-btn mt-2">
                                <span>Inquiry</span>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="inqury-btn mt-2">
                                <span>Sign in to Inquire</span>
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
          @endforeach
          </div>
          @else
              <p>No products found in this category.</p>
          @endif
          {{-- <div class="product-thumbnail">
            <img src="./1. Adhesive.webp" alt="Product 1" />
            <p>Product 1</p>
          </div> --}}

        </div>
      </div>
    </div>

    <x-footer class="mb-0" />
    <x-script />
  </body>
</html>
