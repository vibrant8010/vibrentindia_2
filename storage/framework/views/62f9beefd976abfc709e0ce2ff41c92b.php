
<section class="section-margin" id="NewArrival">
    <div class="container">
        <div class="heading-section">
            <div class="main-heading">
                New Arrival Products
            </div>
          <a href="<?php echo e(route('newarrival')); ?>"  class="btn-view primary-btn">View More</a>

        </div>

        <div class="row g-1">
            <?php $__currentLoopData = $newArrivalCategoryProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 product-col">
                    <div class="card-view">
                        <a href="<?php echo e(route('product.show', $product->id)); ?>" class="card-link"></a>
                        <div class="image-container">
                            <div class="thumbnail_container">
                                <div class="thumbnail">
                                    <img src="<?php echo e(asset($product->image_url)); ?>" class="product-image swiper-img" alt="<?php echo e($product->name); ?>" onclick="openPopup(this)">
                                </div>
                            </div>
                        </div>
                        <div class="main-logo-container">
                        <div class="logo-container" style="">
                            <?php if($product->company && $product->company->logo_url): ?>
                            <img src="<?php echo e(asset($product->company->logo_url)); ?>"  class="logo-image" alt="<?php echo e($product->company->name); ?>">
                        <?php else: ?>
                            <span>No Logo</span>
                        <?php endif; ?>
                        </div>
                        <div class="image_overlay view-arrow-btn hide">
                            <i class="fas fa-arrow-circle-down"></i>
                        </div>
                        </div>

                        <div class="card-body product-card-body">

                        <p class="card-description content-txt" id="description-<?php echo e($product->id); ?>">
                            <span class="visible-text">
                                <?php echo e(Str::limit($product->description, 20)); ?>

                            </span>
                        </p>
                        <div class="product-description-div">

                        <div class="text-wrapper">
                             <h6 class="tranding-product-name">
                                <span class="title">Product:</span>
                                <span class="trnding-pro-name"><?php echo e($product->name); ?></span>
                            </h6>

                        </div>
                        <div class="card-bottom">

                            <h6 class="tranding-product-name">
                                <span class="title">Company Name:</span>
                                <span class="tranding-pro-name"><?php echo e($product->company->name); ?></span>
                            </h6>
                            <h6 class="tranding-product-name">
                                <span class="title">Category:</span>
                                <span class="tranding-pro-name"><?php echo e($product->category->name); ?></span>
                            </h6>
                            <h6 class="tranding-product-name">
                                <span class="title">Product:</span>
                                <span class="trnding-pro-name"><?php echo e($product->name); ?></span>
                            </h6>

                            <h6 class="tranding-material-name">
                                <span class="tranding-material-title">Material:</span>
                                <span class="mt-name tranding-mt-name"><?php echo e($product->material); ?></span>
                            </h6>
                            <h6 class="tranding-product-size">
                                <span class="tranding-size-title">Size:</span>
                                <span class="tranding-sz-name"><?php echo e($product->size); ?></span>
                            </h6>


                        </div>
                        </div>
                        <div class="d-flex justify-content-start mx-2 bottom-btn">
                            <?php if(auth()->guard()->check()): ?>
                                <a href="<?php echo e(route('inquiryform', ['product_id' => $product->id, 'product_name' => $product->name])); ?>" class="inqury-btn mt-2">
                                    <span>Inquiry</span>
                                </a>
                            <?php else: ?>
                                <a href="<?php echo e(route('login')); ?>" class="inqury-btn mt-2">
                                    <span>Sign in to Inquire</span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\vibrant_trade\resources\views/components/new-arrival.blade.php ENDPATH**/ ?>