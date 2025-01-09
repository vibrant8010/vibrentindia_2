<!DOCTYPE html>
<html lang="en">
<x-head />

<body>
<x-header/>
    <section class="content product-detail-container">
        <div class="product-container container">
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
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <div class="detail">
                        <div class="product-details mt-3">
                                      <img src="{{ asset($product->company->logo_url) }}" style="width: 100px;height:100%;"
                                    alt="{{ $product->companyname }}">

                                <h2 class="product-title">{{ $product->name }}</h2>
                            <p class="product-subtitle">{{ $product->description }}</p>

                            <!-- Product Information -->
                            <div class="product-info">
                                <table border="1" style="width:100%;">

                                    <tr class="info-item">
                                        <td>
                                            <div class="info-label">Companyname:</div>
                                        </td>
                                        <td>
                                            <div class="info-value">{{ $product->company->name }}
                                        </td>
                                    </tr>

                                    <tr class="info-item">
                                        <td>
                                            <div class="info-label">Category:</div>
                                        </td>
                                        <td>
                                            <div class="info-value">{{ $product->category->name }}
                                        </td>
                                    </tr>


                                    <tr class="info-item">
                                        <td>
                                            <div class="info-label">Subcategory:</div>
                                        </td>
                                        <td>
                                            <div class="info-value">{{ $product->subcategory->name }}
                                        </td>
                                    </tr>


                                    <tr class="info-item">
                                        <td>
                                            <div class="info-label">Material:</div>
                                        </td>
                                        <td>
                                            <div class="info-value">{{ $product->material }}</div>
                                        </td>
                                    </tr>

                                    <tr class="info-item">
                                        <td>
                                            <div class="info-label">Size:</div>
                                        </td>
                                        <td>
                                            <div class="info-value">{{ $product->size }}</div>
                                        </td>
                                    </tr>
                                </table>
                                    <div class="info-item">
                                            <div class="bottom-btn mt-5">
                                                @auth
                                                    <a href="{{ route('inquiryform', ['product_id' => $product->id, 'product_name' => $product->name]) }}"
                                                        class="cta">
                                                        <span>Inquiry</span>
                                                        <i class="fa-solid fa-arrow-right"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('login') }}" class="cta">
                                                        <span>Sign in to Inquire</span>
                                                        <i class="fa-solid fa-arrow-right"></i>
                                                    </a>
                                                @endauth


                                            </div>
                                        </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-container">
            <h4 class="main-heading my-4" style="display: block;">About the Company</h4>
        </div>
        <div class="productdetail-container container">
            <div class="company-details mx-2">
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-between">
                        <p class="description-title">GST Registration Date: <span
                                class="description-txt">{{ $product->company->gst_registration_date }}</span></p>
                        <p class="description-title">Legal Status: <span
                                class="description-txt">{{ $product->company->legal_status }}</span></p>

                    </div>
                </div>
                <p class="description-title">Nature of Business: <span
                        class="description-txt">{{ $product->company->nature_of_business }}</span></p>
                <h4 class="description-titletxt">Description</h4>
                <p>{{ $product->company->description }}</p>


            </div>
        </div>
        <div class="whatsapp-main-box">
    <a href="#" id="whatsapp-share-button" class="popmake-470 mx-auto">
        <img class="whatsapp-icon" src="{{ asset('images/icons8-whatsapp-48.png') }}" alt="WhatsApp Icon">
    </a>
</div>
<script>
    // Function to encode text for URL
    function encodeText(text) {
        return encodeURIComponent(text);
    }

    // Function to construct the WhatsApp share URL
    function getWhatsAppShareURL(productName, productDescription, productPrice, productURL) {
        const phoneNumber = '918511684938'; // Replace with your business's WhatsApp number
        const message = `I'm interested in the product: ${productName}\nDescription: ${productDescription}\nPrice: ${productPrice}\nYou can view it here: ${productURL}`;
        const encodedMessage = encodeText(message);
        return `https://wa.me/${phoneNumber}?text=${encodedMessage}`;
    }

    // Event listener for the Share on WhatsApp button
    document.getElementById('whatsapp-share-button').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default link behavior

        // Replace these variables with dynamic data from your product page
        const productName = '{{ $product->name }}';
        const productDescription = '{{ $product->description }}';
        const productPrice = '{{ $product->price }}';
        const productURL = window.location.href; // Current page URL

        const whatsappURL = getWhatsAppShareURL(productName, productDescription, productPrice, productURL);
        window.open(whatsappURL, '_blank');
    });
</script>
    </section>
    <x-footer />
    <x-script />
</body>

</html>