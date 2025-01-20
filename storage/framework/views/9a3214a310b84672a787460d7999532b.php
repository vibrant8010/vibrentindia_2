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
     <style>
        /* Styling for the toggle password icon */
.toggle-password {


    cursor: pointer;
    color: #6c757d;
}

.toggle-password:hover {
    color: #2f6b34;
}
</style>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PM6MZDDX');</script>
<!-- End Google Tag Manager -->
</head>
</head>
<body>
    <div class="form-outer">
        <section class="form-container">

    <div class="container mt-5">
        <div class="main-box">

        <div class="row justify-content-center">

            <div class="col-md-6">
             <div class="register-box1 mx-3">
                    <div class="register-header">Login</div>

                <!-- Show any error messages -->
                <?php if(session('error') && strpos(session('error'), 'OTP') !== false): ?>
                    <div class="alert alert-warning">
                        <?php echo e(session('error')); ?>

                        <a href="<?php echo e(route('viewotp')); ?>" class="btn btn-primary">Go to OTP Verification</a>
                    </div>
                <?php endif; ?>

                <!-- Login Form -->
                <form action="<?php echo e(route('login.process')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="input-field mt-3">
                        
                        <input type="email" name="email" id="email" class="form-control input-type-box" placeholder="Enter Your Email" required>
                        <i class="fa-solid fa-envelope input-field-icon"></i>

                    </div>
                    <div class="input-field mt-3">


                        <input type="password" name="password" id="password" class="form-control input-type-box" placeholder="Enter Your Password" required>

                        <span id="toggle-password" class="toggle-password">
                                                    <i class="fa-solid fa-eye input-field-icon"></i> <!-- Default eye icon -->
                                                </span>
                                        <?php if(session('error')): ?>
                      <span class="text-danger"><?php echo e(session('error')); ?></span>
                            <?php endif; ?>

                    </div>
                    <div class="input-field mt-3">

                    
                    <button type="submit" class="mt-3 m-0 ms-auto secondary-btn w-75 mx-auto">Login</button>
                    </div>
                </form>

                <!-- Forgot Password and Change Password Links -->
                <div class="d-flex justify-content-between mt-3">
                    <a href="<?php echo e(route('password.request')); ?>" class="btn btn-link">Forgot Password?</a>
                    <br>
                    
                </div>
                </div>

            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 p-0" style="overflow: hidden;">
                <div class="register-box2">
                  <div class="register-site-image">
                           <h2>Hello, Welcome!</h2>
                           <p class="ac-txt">Don't have an account?</p>
                           <a class="login-link" href="<?php echo e(route('register')); ?>"> Sign Up </a>
                          </div>

                </div>
              </div>

        </div>
        </div>
    </div>
        </section>
    </div>
       <script>
        document.addEventListener("DOMContentLoaded", function () {
            const togglePassword = document.getElementById("toggle-password");
            const passwordField = document.getElementById("password");

            togglePassword.addEventListener("click", function () {
                // Toggle password visibility
                const type = passwordField.type === "password" ? "text" : "password";
                passwordField.type = type;

                // Toggle eye icon
                const icon = togglePassword.querySelector("i");
                if (type === "text") {
                    icon.classList.remove("fa-eye");
                    icon.classList.add("fa-eye-slash"); // Eye closed (blinking) icon
                } else {
                    icon.classList.remove("fa-eye-slash");
                    icon.classList.add("fa-eye"); // Eye open icon
                }
            });
        });
    </script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\vibrant_trade\resources\views/Auth/login.blade.php ENDPATH**/ ?>