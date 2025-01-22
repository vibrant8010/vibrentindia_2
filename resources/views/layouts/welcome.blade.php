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
    <x-footer />
    <x-script />

    <script>
        // get user location

        // window.onload = () => {
        //     // Check if Geolocation is supported
        //     if ('geolocation' in navigator) {
        //         navigator.geolocation.getCurrentPosition(successCallback, errorCallback, {
        //             enableHighAccuracy: true,
        //             timeout: 5000,
        //             maximumAge: 0
        //         });
        //     } else {
        //         console.error('Geolocation is not supported by your browser.');
        //     }
        // };

        // function successCallback(position) {
        //     const latitude = position.coords.latitude;
        //     const longitude = position.coords.longitude;
        //     const url = `https://nominatim.openstreetmap.org/reverse?lat=${latitude}&lon=${longitude}&format=json`;

        //     // Fetch data from the API
        //     fetch(url)
        //         .then(response => {
        //             if (!response.ok) {
        //                 throw new Error(`HTTP error! Status: ${response.status}`);
        //             }
        //             return response.json();
        //         })
        //         .then(data => {
        //             console.log("Reverse Geolocation Data:", data);
        //             // You can access properties like:
        //             // data.display_name, data.address, etc.
        //         })
        //         .catch(error => {
        //             console.error("Error fetching geolocation data:", error);
        //         });

        //     console.log(`Latitude: ${latitude}, Longitude: ${longitude}`);

        //     // Prepare data to send
        //     const data = {
        //         latitude: latitude,
        //         longitude: longitude,
        //         timestamp: position.timestamp
        //     };

        //     // Send data to the backend
        //     sendLocationData(data);
        //     // console.log(data);
        // }

        // function errorCallback(error) {
        //     console.error('Error retrieving location:', error);
        //     switch (error.code) {
        //         case error.PERMISSION_DENIED:
        //             alert("User denied the request for Geolocation.");
        //             break;
        //         case error.POSITION_UNAVAILABLE:
        //             alert("Location information is unavailable.");
        //             break;
        //         case error.TIMEOUT:
        //             alert("The request to get user location timed out.");
        //             break;
        //         case error.UNKNOWN_ERROR:
        //             alert("An unknown error occurred.");
        //             break;
        //     }
        // }

        // function sendLocationData(data) {
        //     $.ajax({
        //         url: "{{ route('location_store') }}", // Use the dynamically constructed endpoint
        //         type: 'POST',
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         data: JSON.stringify(data),
        //         contentType: 'application/json',
        //         success: function(response) {
        //             console.log('Success:', response);
        //         },
        //         error: function(xhr, status, error) {
        //             console.error('Error:', error);
        //         }
        //     });
        // }
      
    </script>

</body>

</html>
