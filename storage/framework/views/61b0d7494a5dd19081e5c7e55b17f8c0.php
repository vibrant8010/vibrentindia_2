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
        <div class="product-container container">
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
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <div class="detail">
                        <div class="product-details mt-3">
                                      <img src="<?php echo e(asset($product->company->logo_url)); ?>" style="width: 100px;height:100%;"
                                    alt="<?php echo e($product->companyname); ?>">

                                <h2 class="product-title"><?php echo e($product->name); ?></h2>
                            <p class="product-subtitle"><?php echo e($product->description); ?></p>

                            <!-- Product Information -->
                            <div class="product-info">
                                <table border="1" style="width:100%;">

                                    <tr class="info-item">
                                        <td>
                                            <div class="info-label">Companyname:</div>
                                        </td>
                                        <td>
                                            <div class="info-value"><?php echo e($product->company->name); ?>

                                        </td>
                                    </tr>

                                    <tr class="info-item">
                                        <td>
                                            <div class="info-label">Category:</div>
                                        </td>
                                        <td>
                                            <div class="info-value"><?php echo e($product->category->name); ?>

                                        </td>
                                    </tr>


                                    <tr class="info-item">
                                        <td>
                                            <div class="info-label">Subcategory:</div>
                                        </td>
                                        <td>
                                            <div class="info-value"><?php echo e($product->subcategory->name); ?>

                                        </td>
                                    </tr>


                                    <tr class="info-item">
                                        <td>
                                            <div class="info-label">Material:</div>
                                        </td>
                                        <td>
                                            <div class="info-value"><?php echo e($product->material); ?></div>
                                        </td>
                                    </tr>

                                    <tr class="info-item">
                                        <td>
                                            <div class="info-label">Size:</div>
                                        </td>
                                        <td>
                                            <div class="info-value"><?php echo e($product->size); ?></div>
                                        </td>
                                    </tr>
                                </table>
                                    <div class="info-item">
                                            <div class="bottom-btn mt-5">
                                                <?php if(auth()->guard()->check()): ?>
                                                    <a href="<?php echo e(route('inquiryform', ['product_id' => $product->id, 'product_name' => $product->name])); ?>"
                                                        class="cta">
                                                        <span>Inquiry</span>
                                                        <i class="fa-solid fa-arrow-right"></i>
                                                    </a>
                                                <?php else: ?>
                                                    <a href="<?php echo e(route('login')); ?>" class="cta">
                                                        <span>Sign in to Inquire</span>
                                                        <i class="fa-solid fa-arrow-right"></i>
                                                    </a>
                                                <?php endif; ?>


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
                                class="description-txt"><?php echo e($product->company->gst_registration_date); ?></span></p>
                        <p class="description-title">Legal Status: <span
                                class="description-txt"><?php echo e($product->company->legal_status); ?></span></p>

                    </div>
                </div>
                <p class="description-title">Nature of Business: <span
                        class="description-txt"><?php echo e($product->company->nature_of_business); ?></span></p>
                <h4 class="description-titletxt">Description</h4>
                <p><?php echo e($product->company->description); ?></p>


            </div>
        </div>
        <div class="whatsapp-main-box">
    <a href="#" id="whatsapp-share-button" class="popmake-470 mx-auto">
        <img class="whatsapp-icon" src="<?php echo e(asset('images/icons8-whatsapp-48.png')); ?>" alt="WhatsApp Icon">
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
<?php $component->withAttributes([]); ?>
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

</html><?php /**PATH C:\xampp\htdocs\tread\resources\views/productdetails.blade.php ENDPATH**/ ?>