




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
    <div class="container">
        <div class="product-slideshow-container">
            <img src="<?php echo e(asset('logos/banner.jpg')); ?>" class="product-details-slides" alt="Slide 1" />
            <img src="<?php echo e(asset('logos/banner2.jpg')); ?>" class="product-details-slides" alt="Slide 2" />

        </div>
        <?php if($results['products'] && $results['products']->isNotEmpty()): ?>


            <h1 class="product-detail-heading">Product from:</h1>
            <div class="company-badges">
                
                <?php $__currentLoopData = $results['companies']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $companyOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="badge"><?php echo e($companyOption->name); ?></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>


            <button class="filter-btn" style="background-color:transparent;border:0;">
                <i class="fa-solid fa-filter"></i>
            </button>
            <div class="outer-box-search">

                <!--filter section-->
                <!--filter section-->
                <div class="filter-box">
                    <div class="filter-container">
                        <!-- OEM Filter -->
                        <span class="filter-close">&times;</span>
                        <form id="filterForm" method="GET" action="<?php echo e(route('filter.products')); ?>">
                            <!-- CSRF Token (optional for GET requests) -->
                            <?php echo csrf_field(); ?>

                            <!-- Company Filters -->
                            <div class="filter-header">
                                <h3>CompanyName</h3>
                                <div class="filter-content">
                                    <?php $__currentLoopData = $results['companies']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $companyFilter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div>
                                            <label>
                                                <input type="checkbox" name="company_ids[]"
                                                    value="<?php echo e($companyFilter->id); ?>"
                                                    <?php echo e(request()->has('company_ids') && in_array($companyFilter->id, request('company_ids', [])) ? 'checked' : ''); ?>

                                                    onchange="document.getElementById('filterForm').submit();">
                                                <?php echo e($companyFilter->name); ?>

                                            </label>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

                            <!-- Category Filters -->
                            <div class="filter-header">
                                <h3>Category</h3>
                                <div class="filter-content">
                                    <?php $__currentLoopData = $results['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryFilter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div>
                                            <label>
                                                <input type="checkbox" name="category_ids[]"
                                                    value="<?php echo e($categoryFilter->id); ?>"
                                                    <?php echo e(request()->has('category_ids') && in_array($categoryFilter->id, request('category_ids', [])) ? 'checked' : ''); ?>

                                                    onchange="document.getElementById('filterForm').submit();">
                                                <?php echo e($categoryFilter->name); ?>

                                            </label>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

                            <!-- Subcategory Filters -->
                            <div class="filter-header">
                                <h3>Subcategory</h3>
                                <div class="filter-content">
                                    <?php $__currentLoopData = $results['subCategories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategoryFilter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div>
                                            <label>
                                                <input type="checkbox" name="subcategory_ids[]"
                                                    value="<?php echo e($subCategoryFilter->id); ?>"
                                                    <?php echo e(request()->has('subcategory_ids') && in_array($subCategoryFilter->id, request('subcategory_ids', [])) ? 'checked' : ''); ?>

                                                    onchange="document.getElementById('filterForm').submit();">
                                                <?php echo e($subCategoryFilter->name); ?>

                                            </label>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="product-view-box">
                    <div class="product-list-view">
                        <div class="row g-4 gy-3 prodoct-img-view">
                            <?php $__currentLoopData = $results['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
                                    <div class="product-card">
                                        <div class="product-main-box">
                                            <div class="inner-box">
                                                <img src="<?php echo e(asset($product->image_url)); ?>" alt="<?php echo e($product->name); ?>"
                                                    class="product-image" />
                                            </div>
                                        </div>
                                        <div class="product-bottom-details">
                                            <h3 class="product-detail-name"><?php echo e($product->name); ?></h3>
                                            <h3 class="product-detail-name"><?php echo e($product->category->name); ?></h3>
                                            <h3 class="product-detail-name"><?php echo e($product->company->name); ?></h3>
                                            <h3 class="product-detail-name"><?php echo e($product->subcategory->name); ?></h3>
                                            <p class="product-detail-description">
                                                <?php echo e(Str::limit($product->description, 50)); ?></p>

                                            <a href="/product/<?php echo e($product->id); ?>" class="product-link">View
                                                Product</a>

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>

            </div>
        <?php endif; ?>
    </div>

    


    <script>
        // Get the button and filter box elements
        let filterbox = document.querySelector('.filter-box');
        let filterbtn = document.querySelector('.filter-btn');

        // Add an event listener for the filter button click
        filterbtn.addEventListener('click', () => {
            filterbox.classList.toggle('active-box');
        });

        // Add a close button dynamically to the filter box
        const closeButton = document.createElement('span');
        closeButton.classList.add('filter-close');
        closeButton.innerHTML = '&times;'; // Cross icon
        filterbox.appendChild(closeButton);

        // Add an event listener to the close button
        closeButton.addEventListener('click', () => {
            filterbox.classList.remove('active-box');
        });

        let currentSlide = 0;
        const slides = document.querySelectorAll(".product-details-slides");

        // Function to show the current slide
        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.remove("active"); // Remove active class from all slides
                if (i === index) {
                    slide.classList.add("active"); // Add active class to the current slide
                }
            });
        }

        // Function to change the slide
        function changeSlide(step) {
            currentSlide = (currentSlide + step + slides.length) % slides.length;
            showSlide(currentSlide);
        }

        // Initialize slideshow
        showSlide(currentSlide);

        // Automatic slide change every 5 seconds
        setInterval(() => {
            changeSlide(1);
        }, 5000);

        // Toggle filter content with arrow animation
        const filterHeaders = document.querySelectorAll('.filter-header');

        filterHeaders.forEach(header => {
            header.addEventListener('click', () => {
                const content = header.nextElementSibling;
                const isActive = content.style.display === 'block';

                // Toggle content visibility
                content.style.display = isActive ? 'none' : 'block';

                // Rotate arrow
                const arrow = header.querySelector('span');
                if (isActive) {
                    arrow.classList.remove('rotate');
                } else {
                    arrow.classList.add('rotate');
                }
            });
        });

        // Clear location checkboxes
        function clearLocation() {
            const checkboxes = document.querySelectorAll('#location-list input[type="checkbox"]');
            checkboxes.forEach(checkbox => checkbox.checked = false);
        }

        // Filter location list
        const locationSearch = document.getElementById('location-search');
        locationSearch.addEventListener('input', () => {
            const filter = locationSearch.value.toLowerCase();
            const locations = document.querySelectorAll('#location-list li');
            locations.forEach(location => {
                const text = location.textContent.toLowerCase();
                location.style.display = text.includes(filter) ? 'flex' : 'none';
            });
        });
    </script>


</body>

</html>
<?php /**PATH C:\xampp\htdocs\vibrant_trade\resources\views/searchresult.blade.php ENDPATH**/ ?>