<!DOCTYPE html>
<html lang="en">
<?php if (isset($component)) { $__componentOriginal781d22988f835a9692410092c1d21cd6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal781d22988f835a9692410092c1d21cd6 = $attributes; } ?>
<?php $component = App\View\Components\Head::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('head'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Head::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal781d22988f835a9692410092c1d21cd6)): ?>
<?php $attributes = $__attributesOriginal781d22988f835a9692410092c1d21cd6; ?>
<?php unset($__attributesOriginal781d22988f835a9692410092c1d21cd6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal781d22988f835a9692410092c1d21cd6)): ?>
<?php $component = $__componentOriginal781d22988f835a9692410092c1d21cd6; ?>
<?php unset($__componentOriginal781d22988f835a9692410092c1d21cd6); ?>
<?php endif; ?>

<body>
    <?php if (isset($component)) { $__componentOriginal2a2e454b2e62574a80c8110e5f128b60 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2a2e454b2e62574a80c8110e5f128b60 = $attributes; } ?>
<?php $component = App\View\Components\Header::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Header::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2a2e454b2e62574a80c8110e5f128b60)): ?>
<?php $attributes = $__attributesOriginal2a2e454b2e62574a80c8110e5f128b60; ?>
<?php unset($__attributesOriginal2a2e454b2e62574a80c8110e5f128b60); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2a2e454b2e62574a80c8110e5f128b60)): ?>
<?php $component = $__componentOriginal2a2e454b2e62574a80c8110e5f128b60; ?>
<?php unset($__componentOriginal2a2e454b2e62574a80c8110e5f128b60); ?>
<?php endif; ?>
    <section class="content product-detail-container">
        <div class="product-container container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-7 col-md-8 col-sm-12">
                    <div class="row">
                        <div class="col-lg-5 col-md-6 col-sm-12">
                            <article class="demo-area">
                                <div class="product-img">
                                    <a class="demo-trigger" href="<?php echo e(asset($product->image_url)); ?>">
                                        <img src="<?php echo e(asset($product->image_url)); ?>" alt="<?php echo e($product->name); ?>">
                                    </a>
                                </div>
                            </article>
                        </div>
                        <div class="p-0 col-lg-7 col-md-6 col-sm-12">
                            <div class="detail">
                                <div class="product-details mt-3">
                                    <img src="<?php echo e(asset($product->company->logo_url)); ?>"
                                        style="width: 100px;height:100%;" alt="<?php echo e($product->companyname); ?>">

                                    <h2 class="product-title"><?php echo e($product->name); ?></h2>
                                    <p class="product-subtitle"><?php echo e($product->description); ?></p>

                                    <!-- Product Information -->
                                    <div class="product-info">

                                        <div class="info-item">
                                            <div class="info-label">Companyname:</div>
                                            <div class="info-value"><?php echo e($product->company->name); ?>

                                            </div>
                                        </div>

                                        <div class="info-item">
                                            <div class="info-label">Category:</div>
                                            <div class="info-value"><?php echo e($product->category->name); ?>

                                            </div>
                                        </div>


                                        <div class="info-item">
                                            <div class="info-label">Subcategory:</div>
                                            <div class="info-value"><?php echo e($product->subcategory->name); ?>

                                            </div>
                                        </div>


                                        <div class="info-item">
                                            <div class="info-label">Material:</div>
                                            <div class="info-value"><?php echo e($product->material); ?></div>
                                        </div>

                                        <div class="info-item">
                                            <div class="info-label">Size:</div>
                                            <div class="info-value"><?php echo e($product->size); ?></div>

                                        </div>
                                    </div>
                                </div>
                                <div class="info-item">
                                    <div class="bottom-btn my-3">
                                        <?php if(auth()->guard()->check()): ?>
                                            <a href="<?php echo e(route('inquiryform', ['product_id' => $product->id, 'product_name' => $product->name])); ?>"
                                                class="cta">
                                                <span>Inquiry</span>
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </a>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('login')); ?>" class="inqury-btn">
                                                <span>Product Inquire</span>
                                                <!-- <i class="fa-solid fa-arrow-right"></i> -->
                                            </a>
                                        <?php endif; ?>


                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-lg-12 d-block d-lg-none d-sm-block">
                            <div class="company-personal-details sticky-top-new">
                                <div class="product-details mt-3">
                                    <img src="<?php echo e(asset($product->company->logo_url)); ?>"
                                        style="width: 100px;height:100%;margin-bottom: 10px;"
                                        alt="<?php echo e($product->companyname); ?>">
                                </div>
                                <h6 class="company-product-title detail-text"><?php echo e($product->name); ?></h6>
                                <h6 class="detail-text company-address">Jalandhar, Punjab, India</h6>
                                <div class="company-start-date"><span class="title">since:</span> <span
                                        class="title-ans">2011</span></div>
                                <div class="company-business-category"><span class="title">Business Category :</span>
                                    <span class="title-ans">Trading Company</span>
                                </div>
                                <div class="company-product-count"><span class="title">Number of Product :</span> <span
                                        class="title-ans">300</span></div>
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
                                                        <a target="_blank" rel="noopener noreferrer" role="button"
                                                            title="Whats App Chat" aria-label="Whats app chat"
                                                            class="no-link">
                                                            <span class="whatus-icon"><i class="fa-brands fa-whatsapp" style="color: #2aa81a;"></i></span>
                                                            <span class="whatsup-link">WhatsApp</span>
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                <div class="btn-area my-4">
                                    <a href="#" class="inqury-btn d-block text-center">Inqury now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-12 d-lg-block product-desc-section">
                            <ul class="nav nav-tabs" id="productDesc" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link fw-bold py-2 px-0 active" data-tab="about-info"
                                        type="button" role="tab">
                                        <span class="tab-nav-link-text fw-bold">About Company</span>
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link fw-bold py-2 px-0" data-tab="more-product" type="button"
                                        role="tab">
                                        <span class="tab-nav-link-text fw-bold">More Products</span>
                                    </button>
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
                                                        class="description-txt"><?php echo e($product->company->gst_registration_date); ?></span>
                                                </p>
                                                <p class="description-title">Legal Status: <span
                                                        class="description-txt"><?php echo e($product->company->legal_status); ?></span>
                                                </p>

                                            </div>
                                        </div>
                                        <p class="description-title">Nature of Business: <span
                                                class="description-txt"><?php echo e($product->company->nature_of_business); ?></span>
                                        </p>
                                        <h4 class="description-titletxt">Company Description</h4>
                                        <p class="description-txt"><?php echo e($product->company->description); ?></p>


                                    </div>
                                </div>
                            </div>
                            <!-- More Products Info -->
                            <div class="tab-content more-product" id="more-product">
                                More Products Content Here
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
                                    <p class="description-title">GST Registration Date: <span class="description-txt"><?php echo e($product->company->gst_registration_date); ?></span></p>
                                    <p class="description-title">Legal Status: <span class="description-txt"><?php echo e($product->company->legal_status); ?></span></p>

                                </div>
                            </div>
                            <p class="description-title">Nature of Business: <span class="description-txt"><?php echo e($product->company->nature_of_business); ?></span></p>
                            <h4 class="description-titletxt">Description</h4>
                            <p><?php echo e($product->company->description); ?></p>


                        </div>
                    </div> -->
                </div>

                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 d-lg-block d-sm-none d-md-block d-sm-none d-none">
                    <div class="company-personal-details sticky-top-new">
                        <div class="product-details mt-3">
                            <img src="<?php echo e(asset($product->company->logo_url)); ?>"
                                style="width: 100px;height:100%;margin-bottom: 10px;"
                                alt="<?php echo e($product->companyname); ?>">
                        </div>
                        <h6 class="company-product-title detail-text"><?php echo e($product->name); ?></h6>
                        <h6 class="detail-text company-address">Jalandhar, Punjab, India</h6>
                        <div class="company-start-date"><span class="title">since:</span> <span
                                class="title-ans">2011</span></div>
                        <div class="company-business-category"><span class="title">Business Category :</span> <span
                                class="title-ans">Trading Company</span></div>
                        <div class="company-product-count"><span class="title">Number of Product :</span> <span
                                class="title-ans">400</span></div>
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
                                        <a target="_blank" rel="noopener noreferrer" role="button"
                                            title="Whats App Chat" aria-label="Whats app chat"
                                            class="no-link">
                                            <span class="whatus-icon"><i class="fa-brands fa-whatsapp" style="color: #2aa81a;"></i></span>
                                            <span class="whatsup-link">WhatsApp</span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="btn-area my-4">
                            <a href="#" class="inqury-btn d-block text-center">Inqury now</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        </div>

        
        <script>
            // Function to encode text for URL
            function encodeText(text) {
                return encodeURIComponent(text);
            }

            // Function to construct the WhatsApp share URL
            function getWhatsAppShareURL(productName, productDescription, productPrice, productURL) {
                const phoneNumber = '918511684938'; // Replace with your business's WhatsApp number
                const message =
                    `I'm interested in the product: ${productName}\nDescription: ${productDescription}\nPrice: ${productPrice}\nYou can view it here: ${productURL}`;
                const encodedMessage = encodeText(message);
                return `https://wa.me/${phoneNumber}?text=${encodedMessage}`;
            }

            // Event listener for the Share on WhatsApp button
            document.getElementById('whatsapp-share-button').addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default link behavior

                // Replace these variables with dynamic data from your product page
                const productName = '<?php echo e($product->name); ?>';
                const productDescription = '<?php echo e($product->description); ?>';
                const productPrice = '<?php echo e($product->price); ?>';
                const productURL = window.location.href; // Current page URL

                const whatsappURL = getWhatsAppShareURL(productName, productDescription, productPrice, productURL);
                window.open(whatsappURL, '_blank');
            });
        </script>
    </section>
    <?php if (isset($component)) { $__componentOriginal99051027c5120c83a2f9a5ae7c4c3cfa = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal99051027c5120c83a2f9a5ae7c4c3cfa = $attributes; } ?>
<?php $component = App\View\Components\Footer::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Footer::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-0']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal99051027c5120c83a2f9a5ae7c4c3cfa)): ?>
<?php $attributes = $__attributesOriginal99051027c5120c83a2f9a5ae7c4c3cfa; ?>
<?php unset($__attributesOriginal99051027c5120c83a2f9a5ae7c4c3cfa); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal99051027c5120c83a2f9a5ae7c4c3cfa)): ?>
<?php $component = $__componentOriginal99051027c5120c83a2f9a5ae7c4c3cfa; ?>
<?php unset($__componentOriginal99051027c5120c83a2f9a5ae7c4c3cfa); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal6e887ddf8c507eaf55b7de0448dc4ab5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6e887ddf8c507eaf55b7de0448dc4ab5 = $attributes; } ?>
<?php $component = App\View\Components\Script::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('script'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Script::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6e887ddf8c507eaf55b7de0448dc4ab5)): ?>
<?php $attributes = $__attributesOriginal6e887ddf8c507eaf55b7de0448dc4ab5; ?>
<?php unset($__attributesOriginal6e887ddf8c507eaf55b7de0448dc4ab5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6e887ddf8c507eaf55b7de0448dc4ab5)): ?>
<?php $component = $__componentOriginal6e887ddf8c507eaf55b7de0448dc4ab5; ?>
<?php unset($__componentOriginal6e887ddf8c507eaf55b7de0448dc4ab5); ?>
<?php endif; ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\vibrant_trade\resources\views/productdetails.blade.php ENDPATH**/ ?>