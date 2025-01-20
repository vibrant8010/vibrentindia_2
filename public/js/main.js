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

