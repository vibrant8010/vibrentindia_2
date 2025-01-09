/* Header view */


    document.getElementById('menu-btn').addEventListener('click', function() {
        document.querySelector('.nav-container').classList.add('open');
    });
    document.getElementById('close-btn').addEventListener('click', function() {
        document.querySelector('.nav-container').classList.remove('open');
    });






const menuBtn = document.getElementById('menu-btn');
const navMenu = document.querySelector('.nav-view');
const closeBtn = document.getElementById('close-btn');

// Toggle hamburger menu visibility
menuBtn.addEventListener('click', () => {
    navMenu.classList.add('show');
    menuBtn.style.display = 'none';
    closeBtn.style.display = 'block';
});

// Close the menu when clicking the close button
closeBtn.addEventListener('click', () => {
    navMenu.classList.remove('show');
    closeBtn.style.display = 'none';
    menuBtn.style.display = 'block';
});







// On DOM Content Loaded, handle descriptions and show/hide "read more" link
document.addEventListener("DOMContentLoaded", function () {
    const descriptions = document.querySelectorAll('.card-description');
    descriptions.forEach(function (description) {
        const visibleText = description.querySelector('.visible-text');
        const moreText = description.querySelector('.more-text');
        if (visibleText && moreText && visibleText.textContent.length <= 30) {
            description.parentNode.querySelector('.read-more').style.display = "none";
        }
    });
});

// Swiper Initialization
var swiper = new Swiper(".mySwiper", {
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    loop: true,
    slidesPerView: 1,
    spaceBetween: 10,
    breakpoints: {
        430: { slidesPerView: 2, spaceBetween: 10 },
        768: { slidesPerView: 3, spaceBetween: 5 },
        1024: { slidesPerView: 4, spaceBetween: 15 },
    },
});


// Popup Logic for viewing large product image
const popup = document.getElementById('popup');
const popupImage = document.getElementById('popupImage');
const popupClose = document.getElementById('popupClose');
if (popup && popupImage && popupClose) {
    const swiperImages = document.querySelectorAll('.product-image');
    swiperImages.forEach((img) => {
        img.addEventListener('click', (e) => {
            popupImage.src = e.target.src;
            popup.style.display = 'block';
        });
    });
    popupClose.addEventListener('click', () => {
        popup.style.display = 'none';
    });
    popup.addEventListener('click', (e) => {
        if (e.target === popup) {
            popup.style.display = 'none';
        }
    });
}

  // Show modal automatically after 5 seconds
  window.onload = function () {
    setTimeout(() => {
        const loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
        loginModal.show();
    }, 5000); // 5000ms = 5 seconds
};

// Handle form submission
document.getElementById('loginForm').addEventListener('submit', function (e) {
    e.preventDefault();
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Example: Validate credentials or send to the server
    alert(`Email: ${email}\nPassword: ${password}`);
});

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

    console.log(`Latitude: ${latitude}, Longitude: ${longitude}`);

    // Prepare data to send
    const data = {
        latitude: latitude,
        longitude: longitude,
        timestamp: position.timestamp
    };

    // Send data to the backend
    // sendLocationData(data);
    console.log(data);
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
    fetch('/api/location', { // Adjust the endpoint as needed
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => {
        if (response.ok) {
            return response.json();
        } else {
            throw new Error('Failed to send location data.');
        }
    })
    .then(data => {
        console.log('Success:', data);
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}
