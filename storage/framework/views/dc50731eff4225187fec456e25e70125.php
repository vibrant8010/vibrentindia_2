<!DOCTYPE html>
<html lang="en">
<head>
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
</head>
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
    <section class="top-category section-margin" id="TopCategory">
        <div class="container">
            <div class="heading-section">
                <div class="main-heading">Trending Categories</div>
                
            </div>
            <div class="row g-1">
                <?php $__currentLoopData = $trendingCategoryProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="card-view">
                            <a href="<?php echo e(route('product.show', $product->id)); ?>" class="card-link"></a>
                            <div class="image-container">
                                <div class="thumbnail_container">
                                    <div class="thumbnail">
                                        <img src="<?php echo e(asset($product->image_url)); ?>" class="product-image swiper-img" alt="<?php echo e($product->name); ?>" onclick="openPopup(this)">
                                    </div>
                                </div>
                            </div>
                            <div class="logo-container" >
                                <?php if($product->company && $product->company->logo_url): ?>
                                <img src="<?php echo e(asset($product->company->logo_url)); ?>"  class="logo-image" alt="<?php echo e($product->company->name); ?>">
                            <?php else: ?>
                                <span>No Logo</span>
                            <?php endif; ?>
                            </div>
    
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
                                 <p class="card-description content-txt" id="description-<?php echo e($product->id); ?>">
                                        
                                        <span class="visible-text">
                                            <?php echo e(Str::limit($product->description, 20)); ?>

                                        </span>
                                     
                                    </p>
                                <div class="d-flex justify-content-start mx-2 bottom-btn">
                                    <?php if(auth()->guard()->check()): ?>
                                        <a href="<?php echo e(route('inquiryform', ['product_id' => $product->id, 'product_name' => $product->name])); ?>" class="cta">
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
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
</html>
<?php /**PATH C:\xampp\htdocs\vibrant_trade\resources\views/alltrendingcategory.blade.php ENDPATH**/ ?>