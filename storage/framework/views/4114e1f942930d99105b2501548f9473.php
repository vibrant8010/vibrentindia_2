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
    <?php if (isset($component)) { $__componentOriginalff9615640ecc9fe720b9f7641382872b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalff9615640ecc9fe720b9f7641382872b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.banner','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('banner'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalff9615640ecc9fe720b9f7641382872b)): ?>
<?php $attributes = $__attributesOriginalff9615640ecc9fe720b9f7641382872b; ?>
<?php unset($__attributesOriginalff9615640ecc9fe720b9f7641382872b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalff9615640ecc9fe720b9f7641382872b)): ?>
<?php $component = $__componentOriginalff9615640ecc9fe720b9f7641382872b; ?>
<?php unset($__componentOriginalff9615640ecc9fe720b9f7641382872b); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginalbfa4611a15dfb545ad8363056ed1d1fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbfa4611a15dfb545ad8363056ed1d1fd = $attributes; } ?>
<?php $component = App\View\Components\Topcategoryy::resolve(['topCategoryProducts' => $topCategoryProducts] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('topcategoryy'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Topcategoryy::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbfa4611a15dfb545ad8363056ed1d1fd)): ?>
<?php $attributes = $__attributesOriginalbfa4611a15dfb545ad8363056ed1d1fd; ?>
<?php unset($__attributesOriginalbfa4611a15dfb545ad8363056ed1d1fd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbfa4611a15dfb545ad8363056ed1d1fd)): ?>
<?php $component = $__componentOriginalbfa4611a15dfb545ad8363056ed1d1fd; ?>
<?php unset($__componentOriginalbfa4611a15dfb545ad8363056ed1d1fd); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginalb553a261a52ddd50fc05dc9a1514842a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb553a261a52ddd50fc05dc9a1514842a = $attributes; } ?>
<?php $component = App\View\Components\TrandingProduct::resolve(['trendingProducts' => $trendingCategoryProducts] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tranding-product'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\TrandingProduct::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb553a261a52ddd50fc05dc9a1514842a)): ?>
<?php $attributes = $__attributesOriginalb553a261a52ddd50fc05dc9a1514842a; ?>
<?php unset($__attributesOriginalb553a261a52ddd50fc05dc9a1514842a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb553a261a52ddd50fc05dc9a1514842a)): ?>
<?php $component = $__componentOriginalb553a261a52ddd50fc05dc9a1514842a; ?>
<?php unset($__componentOriginalb553a261a52ddd50fc05dc9a1514842a); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal701a237a581684ca3b71badc38a36043 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal701a237a581684ca3b71badc38a36043 = $attributes; } ?>
<?php $component = App\View\Components\NewArrival::resolve(['newArrivalCategoryProducts' => $newArrivalCategoryProducts] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('new-arrival'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\NewArrival::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal701a237a581684ca3b71badc38a36043)): ?>
<?php $attributes = $__attributesOriginal701a237a581684ca3b71badc38a36043; ?>
<?php unset($__attributesOriginal701a237a581684ca3b71badc38a36043); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal701a237a581684ca3b71badc38a36043)): ?>
<?php $component = $__componentOriginal701a237a581684ca3b71badc38a36043; ?>
<?php unset($__componentOriginal701a237a581684ca3b71badc38a36043); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginale9eb396033ba9a7efbd9b3bf1b1191a8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale9eb396033ba9a7efbd9b3bf1b1191a8 = $attributes; } ?>
<?php $component = App\View\Components\Blogs::resolve(['blogs' => $blogs] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('blogs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Blogs::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale9eb396033ba9a7efbd9b3bf1b1191a8)): ?>
<?php $attributes = $__attributesOriginale9eb396033ba9a7efbd9b3bf1b1191a8; ?>
<?php unset($__attributesOriginale9eb396033ba9a7efbd9b3bf1b1191a8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale9eb396033ba9a7efbd9b3bf1b1191a8)): ?>
<?php $component = $__componentOriginale9eb396033ba9a7efbd9b3bf1b1191a8; ?>
<?php unset($__componentOriginale9eb396033ba9a7efbd9b3bf1b1191a8); ?>
<?php endif; ?>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PM6MZDDX" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->


    <button class="btn btn-sm rounded-circle translate-middle" onclick="scrollToTop()" id="back-to-up">
        <i class="fa fa-arrow-up" style="color: aliceblue" aria-hidden="true"></i>
    </button>
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

    <script>
        // get user location

        window.onload = () => {
            // Check if Geolocation is supported
            if ('geolocation' in navigator) {
                navigator.geolocation.getCurrentPosition(successCallback, errorCallback, {
                    enableHighAccuracy: true,
                    timeout: 5000,
                    maximumAge: 0
                });
            } else {
                console.error('Geolocation is not supported by your browser.');
            }
        };

        function successCallback(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;
            const url = `https://nominatim.openstreetmap.org/reverse?lat=${latitude}&lon=${longitude}&format=json`;

            // Fetch data from the API
            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log("Reverse Geolocation Data:", data);
                    // You can access properties like:
                    // data.display_name, data.address, etc.
                })
                .catch(error => {
                    console.error("Error fetching geolocation data:", error);
                });

            console.log(`Latitude: ${latitude}, Longitude: ${longitude}`);

            // Prepare data to send
            const data = {
                latitude: latitude,
                longitude: longitude,
                timestamp: position.timestamp
            };

            // Send data to the backend
            sendLocationData(data);
            // console.log(data);
        }

        function errorCallback(error) {
            console.error('Error retrieving location:', error);
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    alert("User denied the request for Geolocation.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert("Location information is unavailable.");
                    break;
                case error.TIMEOUT:
                    alert("The request to get user location timed out.");
                    break;
                case error.UNKNOWN_ERROR:
                    alert("An unknown error occurred.");
                    break;
            }
        }

        function sendLocationData(data) {
            $.ajax({
                url: "<?php echo e(route('location_store')); ?>", // Use the dynamically constructed endpoint
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: JSON.stringify(data),
                contentType: 'application/json',
                success: function(response) {
                    console.log('Success:', response);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }
    </script>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\vibrant_trade\resources\views/layouts/welcome.blade.php ENDPATH**/ ?>