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
<<<<<<< HEAD
    <style>
      body {
        background-color:#F2F9F6;
      }
      .container {
        max-width: 1350px;
      }
      .outer-box-search{
        display: flex;.product-slideshow-container
        justify-content: space-between;
      }
      .filter-box{
        width: 25%;
      }
      .product-view-box{
        width: 75%;
      }
      .product-list-view .product-card {
        border: 1px solid #b6b6b6;
        border-radius: 4px;
        overflow: hidden;
        text-align: center;
        background-color: white;
        padding: 10px 5px 23px 5px;
      }

      .product-list-view .product-main-box {
        padding-bottom: 300px;
        overflow: hidden;
        position: relative;
        width: 100%;
      }

      .product-list-view .product-main-box .inner-box {
        margin: 0;
        display: block;
        padding: 0;
        border: none;
        height: 100%;
        width: 100%;
        position: absolute;
        background: 0 0;
      }

      .product-list-view .product-main-box .inner-box img {
        display: block;
        height: auto;
        max-height: 100%;
        max-width: 100%;
        width: auto;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        margin: auto;
        position: absolute;
      }

      .product-list-view .product-main-box .product-details {
        padding: 15px;
      }

      .product-list-view .product-detail-name {
        font-size: 15px;
        font-weight: 500;
        margin: 13px 0 0px 0;
        line-height: 21px;
        text-align: left;
        border-bottom: 1px dotted;
        color: #000;
        padding: 5px 0;
      }

      .product-list-view .product-detail-description {
        font-size: 14px;
        font-weight: 500;
        margin: 10px 0;
        line-height: 21px;
        text-align: left;
        margin-bottom: 25px;
      }

      .product-details .price {
        font-size: 18px;
        color: #007bff;
        font-weight: bold;
        margin-bottom: 10px;
      }

      .product-list-view .product-link {
        padding: 9px 14px;
        color: #008483;
        border-radius: 20px;
        font-size: 17px;
        font-weight: 400;
        border: 1px solid #008483;
        font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
          "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
        transition: 0.7s all ease-in-out;
        cursor: pointer;
        text-decoration: none !important;
        transition: 0.5s all ease-in-out;
      }

      .product-list-view .product-link:hover {
        color: #003a3a;
        border-color: #005656;
      }

      .product-detail-heading {
        text-transform: uppercase;
        font-size:34px ;
        font-weight: 400;
        text-align: center;
        color: #003a3a;
        position: relative;
        margin: 20px 0;
      }

      /*slide show code*/
      .product-slideshow-container {
        margin-top: 50px;
        position: relative;
        max-width: 100%;
        height: 230px; /* Adjust based on your image height */
        overflow: hidden;
        background-color: #f3f3f3;
      }

      .product-details-slides {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
       box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        transition: opacity 3s ease-in-out; /* Smooth transition effect */
      }

      .product-details-slides.active {
        opacity: 1; /* Make the active slide fully visible */
      }

      @keyframes fadeEffect {
        0%,
        100% {
          opacity: 0;
        }
        50% {
          opacity: 1;
        }
      }
      

      @media screen and (max-width: 991px) {
        .product-list-view .main-box {
          padding-bottom: 248px;
        }
        .product-slideshow-container {
          height: 207px;
        }
      }
      @media screen and (max-width: 767px) {
        .product-slideshow-container {
          height: 160px;
        }
      }
      @media screen and (max-width: 575px) {
        .product-slideshow-container {
          height: 110px;
        }
        .prodoct-img-view {
          margin: 0 20px;
        }
      }
      @media screen and (max-width: 430px) {
        .product-slideshow-container {
          height: 98px;
        }
      }

      /*filter section*/
      .filter-container {
      position: sticky;
      top: 0;
      margin: 0 13px;
      border: 1px solid #ddd;
      background: #fff;
      border-radius: 5px;
      overflow: hidden;

    }

    
    .filter-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 15px;
      cursor: pointer;
      border-bottom: 1px solid #ddd;
      background: #f3f3f3;
      transition: background-color 0.3s ease;
    }

    .filter-header:hover {
      background-color: #eaeaea;
    }

    .filter-header h3 {
      margin: 0;
      font-size: 16px;
    }

    .filter-header span {
      display: inline-block;
      transition: transform 0.3s ease; /* Add smooth transition for rotation */
    }

    .filter-header span.rotate {
      transform: rotate(180deg); /* Rotate arrow when expanded */
    }

    .filter-content {
      display: block; /* Default to open */
      padding: 15px;
    }

    .filter-content input[type="text"] {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid #ddd;
      border-radius: 4px;
    }

    .filter-content ul {
      list-style: none;
      margin: 0;
      padding: 0;
    }

    .filter-content ul li {
      margin-bottom: 5px;
      display: flex;
      align-items: center;
    }

    .filter-content ul li label {
      margin-left: 5px;
    }

    .clear-btn {
      color: red;
      font-size: 12px;
      cursor: pointer;
      text-align: right;
      display: block;
    }
    .filter-btn{
      display: none;
    }
    @media screen and (max-width:1199px) {
        .filter-box{
                width: 22%;
        }
        .product-view-box{
                width: 76%;
        }
      }
@media screen and (max-width:995px) {
  .product-list-view .main-box {
    padding-bottom: 180px;
  }
}
      @media screen and (max-width:767px) {
        .filter-box {
        width: 36%;
    }
      }  
    @media screen and (max-width:575px) {
      .filter-btn{
      display: block;
    }
   
      .filter-box{
      left: -1000px;
      position: fixed;
      }
      .filter-box.active-box{
    z-index: 1020;
    background: linear-gradient(45deg, #fff, #fff);
    box-shadow: -3px 0 10px rgba(0, 0, 0, .2);
    transition: all 1s;
    left: 0;
    top: 0;
    bottom: 0;
    padding: 10px;
    width: 60%;
      }
      .product-view-box {
        width: 94%;
    }
    }
    @media screen and (max-width:575px) {
      .product-view-box {
        width: 100%;
    }
    
    }
    
    .company-badges .badge {
     background-color:var(--ternery-color);
     color: #f0f0f0;
    border-radius: 4px;
    padding: 5px 10px;
    margin-right: 5px;
    display: inline-block;
    font-weight:500;
    margin:15px 10px;
    font-size: 14px;
}

    </style>
    
  </head>

=======
  </head>
>>>>>>> 28ac5b1b02d5f2483215668b1bcbec33160dda44
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
        <img
          src="<?php echo e(asset('logos/banner.jpg')); ?>"
          class="product-details-slides"
          alt="Slide 1"
        />
        <img
          src="<?php echo e(asset('logos/banner2.jpg')); ?>"
          class="product-details-slides"
          alt="Slide 2"
        />
<<<<<<< HEAD
      
=======

>>>>>>> 28ac5b1b02d5f2483215668b1bcbec33160dda44
      </div>
<h1 class="product-detail-heading">Product from:</h1>
<div class="company-badges">
    <?php $__currentLoopData = $companies->whereIn('id', old('company_ids', $selectedCompanyIds)); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $companyOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <span class="badge"><?php echo e($companyOption->name); ?></span>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<<<<<<< HEAD
       
=======

>>>>>>> 28ac5b1b02d5f2483215668b1bcbec33160dda44
      <button class="filter-btn" style="background-color:transparent;border:0;">
        <i class="fa-solid fa-filter"></i>
      </button>
      <div class="outer-box-search">
<<<<<<< HEAD
         
=======

>>>>>>> 28ac5b1b02d5f2483215668b1bcbec33160dda44
        <!--filter section-->
         <!--filter section-->
        <div class="filter-box">
            <div class="filter-container">
                <!-- OEM Filter -->
                <div class="filter-header">
                  <h3>CompanyName</h3>
                  <span>&#x25BC;</span>
                </div>
                <div class="filter-content">
                  <form method="GET" action="<?php echo e(route('company.products', $company->id)); ?>">
        <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $companyFilter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div>
<<<<<<< HEAD
                <label>
                    <input 
                        type="checkbox" 
                        name="company_ids[]" 
                        value="<?php echo e($companyFilter->id); ?>" 
                        <?php echo e(in_array($companyFilter->id, $selectedCompanyIds) ? 'checked' : ''); ?>

                        onchange="this.form.submit()"> 
                    <?php echo e($companyFilter->name); ?>

                </label>
=======
                <div class="company-fliter">
                    <span><input
                        type="checkbox"
                        name="company_ids[]"
                        value="<?php echo e($companyFilter->id); ?>"
                        <?php echo e(in_array($companyFilter->id, $selectedCompanyIds) ? 'checked' : ''); ?>

                        onchange="this.form.submit()"></span>
                    <span class="company-filter-name"><?php echo e($companyFilter->name); ?></span>
                    </div>
>>>>>>> 28ac5b1b02d5f2483215668b1bcbec33160dda44
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <!-- Submit button for the form -->
        <button type="submit" style="display: none;"></button>
    </form>
                </div>
<<<<<<< HEAD
                   
=======

>>>>>>> 28ac5b1b02d5f2483215668b1bcbec33160dda44
                <!-- Brands Filter -->
                <div class="filter-header">
                  <h3>Category</h3>
                  <span>&#x25BC;</span>
                </div>
                <div class="filter-content">
<<<<<<< HEAD
                  <!--<ul>-->
                  <!--  <li><input type="checkbox" id="brand1"><label for="brand1">Top Category</label></li>-->
                  <!--  <li><input type="checkbox" id="brand2"><label for="brand2">Tranding Products</label></li>-->
                  <!--  <li><input type="checkbox" id="brand2"><label for="brand2">New Arrival</label></li>-->

                  <!--</ul>-->
                </div>
              
                
              
              </div>
              
=======

                </div>



              </div>

>>>>>>> 28ac5b1b02d5f2483215668b1bcbec33160dda44
        </div>
       <div class="product-view-box">
    <div class="product-list-view">
        <div class="row g-4 gy-3 prodoct-img-view">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-3">
                <div class="product-card">
                    <div class="product-main-box">
                        <div class="inner-box">
                            <img src="<?php echo e(asset($product->image_url)); ?>" alt="<?php echo e($product->name); ?>" class="product-image" />
                        </div>
                    </div>
<<<<<<< HEAD
                    <div class="product-details">
=======
                    <div class="product-bottom-details">
>>>>>>> 28ac5b1b02d5f2483215668b1bcbec33160dda44
                        <h3 class="product-detail-name"><?php echo e($product->name); ?></h3>
                        <h3 class="product-detail-name"><?php echo e($product->category->name); ?></h3>
                        <h3 class="product-detail-name"><?php echo e($product->company->name); ?></h3>
                        <h3 class="product-detail-name"><?php echo e($product->subcategory->name); ?></h3>
                        <p class="product-detail-description"><?php echo e(Str::limit($product->description, 50)); ?></p>
<<<<<<< HEAD
                         
                        <a href="/product/<?php echo e($product->id); ?>" class="product-link">View Product</a>
                        
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
=======

                        <a href="/product/<?php echo e($product->id); ?>" class="product-link">View Product</a>

                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
>>>>>>> 28ac5b1b02d5f2483215668b1bcbec33160dda44
        </div>
    </div>
</div>

        </div>
      </div>



    <script>
<<<<<<< HEAD
      
// Get the button element by its ID
let filterbox = document.querySelector('.filter-box');
let filterbtn= document.querySelector('.filter-btn');

// Add an event listener for the 'click' event
=======
// Get the button and filter box elements
let filterbox = document.querySelector('.filter-box');
let filterbtn = document.querySelector('.filter-btn');

// Add an event listener for the filter button click
>>>>>>> 28ac5b1b02d5f2483215668b1bcbec33160dda44
filterbtn.addEventListener('click', () => {
  filterbox.classList.toggle('active-box');
});

<<<<<<< HEAD

      let currentSlide = 0;
      const slides = document.querySelectorAll(".product-details-slides");

      function showSlide(index) {
        slides.forEach((slide, i) => {
          slide.classList.remove("active"); // Remove active class from all slides
          if (i === index) {
            slide.classList.add("active"); // Add active class to the current slide
          }
        });
      }

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

=======
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
>>>>>>> 28ac5b1b02d5f2483215668b1bcbec33160dda44

      </script>


  </body>
</html>
<?php /**PATH C:\xampp\htdocs\vibrant_trade\resources\views/company/products.blade.php ENDPATH**/ ?>