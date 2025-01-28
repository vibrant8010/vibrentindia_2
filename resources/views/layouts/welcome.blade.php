<!DOCTYPE html>
<html lang="en">
<x-head />

<body>
    <x-header />
    <x-banner />
    <x-topcategoryy :topCategoryProducts="$topCategoryProducts" />
    <x-tranding-product :trendingProducts="$trendingCategoryProducts" />
    <x-new-arrival :newArrivalCategoryProducts="$newArrivalCategoryProducts" />

    <x-blogs :blogs='$blogs' />

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PM6MZDDX" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->


    <button class="btn btn-sm rounded-circle translate-middle" onclick="scrollToTop()" id="back-to-up">
        <i class="fa fa-arrow-up" style="color: aliceblue" aria-hidden="true"></i>
    </button>

    @stack('scripts')
    <x-footer />
    <x-script />


</body>

</html>
