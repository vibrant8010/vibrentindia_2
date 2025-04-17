<section class="blog-section section-margin mt-4" id="BlogCarousel">
    <div class="container">
        <div class="heading-section mb-4">
            <div class="main-heading">
                Blog Section
            </div>
        </div>

<<<<<<< HEAD
        <div id="blogsection" class="owl-carousel owl-theme">
=======
        <div id="blogsections" class="owl-carousel owl-theme">
>>>>>>> 4913e25a9bea5c0867863dfd8d5bda8a9053b125
            @if (!$blogs->isEmpty())
                @foreach ($blogs as $blog)
                    <div class="item">
                        @if($blog->image_url)
                            <div class="main-container bg_fix">
                                <div class="inner-container">
                                    <img src="{{ asset($blog->image_url) }}" alt="blog img">
                                </div>
<<<<<<< HEAD
                                <div class="blog-da te-container">
=======
                                <div class="blog-date-container">
>>>>>>> 4913e25a9bea5c0867863dfd8d5bda8a9053b125
                                    <p class="blog-date">{{ $blog->created_at->format('d - F - Y') }}</p>
                                   </div>
                            </div>
                        @else
                            <span>No Image</span>
                        @endif
                        <div class="card-body">
                            <div class="blog-info">

                                 <div class="blog-container-title">
                                    <h3 class="blog-title">{{ $blog->heading }}</h3>
                                </div>
                                <div class="w-100 d-flex justify-content-center">
                                 <div class="title-bottom-border" style=" height: 1px;
    width: 190px;
    background-color: var(--ternery-color);
    left: 38%;"></div>
                                </div>
                                {{-- Truncated Content --}}
                                <div class="description-area">
                                <p class="truncatedContent">
                                    <span id="content-{{ $blog->id }}">{!! Str::limit($blog->detail_subcontent, 120, '...') !!}</span>
                                </p>
                                {{-- Full Content (Hidden by default) --}}
                                <div id="fullContent-{{ $blog->id }}" class="fullContent" style="display: none;">
                                    {!! $blog->detail_subcontent !!}
                                </div>
                                <a href="{{ route('blogsection', $blog->id) }}" class="read-more">View Full Blog</a>
                            </div>
                        </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
<script>
<<<<<<< HEAD
=======
  
>>>>>>> 4913e25a9bea5c0867863dfd8d5bda8a9053b125
    document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.readMore').forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            let blogId = this.getAttribute('data-id');
            let fullContent = document.getElementById(`fullContent-${blogId}`);
            let truncatedContent = document.getElementById(`content-${blogId}`);

            if (fullContent.style.display === 'none') {
                fullContent.style.display = 'block';
                truncatedContent.style.display = 'none';
                this.textContent = 'Read Less';
            } else {
                fullContent.style.display = 'none';
                truncatedContent.style.display = 'block';
                this.textContent = 'Read More';
            }
        });
    });
<<<<<<< HEAD
=======
})

/*blog section caresoule */
$(document).ready(function () {
$('#blogsections').owlCarousel({
            loop: true,            // Infinite loop
            margin: 10,            // Space between items
            nav: false,            // Hide navigation arrows
            dots: true,            // Show dots
            autoplay: true,        // Enable autoplay
            autoplayTimeout: 6000, // Auto slide every 3 seconds
            autoplaySpeed: 1200,   // Smooth autoplay transition
            smartSpeed: 1200,      // Smooth manual transition
            autoplayHoverPause: true, // Pause on hover
            slideTransition: 'ease-in-out', // Smooth slide effect
            items: 1,    
  responsive:{
      0:{
          items:1
      },
      600:{
          items:2
      },
      991:{
          items:2
      }
  }
});
>>>>>>> 4913e25a9bea5c0867863dfd8d5bda8a9053b125
});

</script>
