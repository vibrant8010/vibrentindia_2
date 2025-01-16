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



/*sub category section*/
  // Automatically set --i for each list item in the submenu for staggered animation
  document.addEventListener("DOMContentLoaded", function () {
    const submenuItems = document.querySelectorAll('.submenu .category-menu-item');
    submenuItems.forEach((item, index) => {
      item.style.setProperty('--i', index + 1); // Set custom property for staggered delay
    });
  });





// On DOM Content Loaded, handle descriptions and show/hide "read more" link
document.addEventListener("DOMContentLoaded", function () {
    const descriptions = document.querySelectorAll('.card-description');
    descriptions.forEach(function (description) {
        const visibleText = description.querySelector('.visible-text');
        const moreText = description.querySelector('.more-text');
        if (visibleText && moreText && visibleText.textContent.length <= 100) {
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




/*seach for location */

document.addEventListener("DOMContentLoaded", () => {
    const input = document.querySelector("#city-auto-sug");
    const dropdown = document.querySelector(".dropdown-list");
    const items = document.querySelectorAll(".dropdown-item");

    // Clear text and update placeholder on click
    input.addEventListener("click", () => {
      if (input.value === "Palanpur") {
        input.value = ""; // Clear the existing value
        input.placeholder = "Enter Location"; // Show placeholder
      }
      dropdown.classList.add("open"); // Show dropdown
    });

    // Filter dropdown items based on input
    input.addEventListener("input", () => {
      const filter = input.value.toLowerCase();
      items.forEach(item => {
        item.style.display = item.textContent.toLowerCase().includes(filter) ? "block" : "none";
      });
    });

    // Navigate through dropdown items using keyboard
    input.addEventListener("keydown", (e) => {
      const visibleItems = Array.from(items).filter(item => item.style.display !== "none");
      let currentIndex = visibleItems.indexOf(document.activeElement);

      if (e.key === "ArrowDown" || e.key === "ArrowUp") {
        e.preventDefault();
        currentIndex = (currentIndex + (e.key === "ArrowDown" ? 1 : -1) + visibleItems.length) % visibleItems.length;
        visibleItems[currentIndex]?.focus();
      } else if (e.key === "Enter" && visibleItems[currentIndex]) {
        e.preventDefault();
        input.value = visibleItems[currentIndex].textContent;
        dropdown.classList.remove("open");
      }
    });

    // Handle click on dropdown items
    items.forEach(item => {
      item.addEventListener("click", () => {
        input.value = item.textContent;
        dropdown.classList.remove("open");
      });
    });

    // Close dropdown when clicking outside
    document.addEventListener("click", (e) => {
      if (!e.target.closest(".search-location-box")){ dropdown.classList.remove("open");
      }
    });
  });


  document.addEventListener('DOMContentLoaded', () => {
    const tabs = document.querySelectorAll('.nav-item .nav-link');
    const contents = document.querySelectorAll('.tab-content');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            // Remove active class from all tabs and hide all content
            tabs.forEach(tab => tab.classList.remove('active'));
            contents.forEach(content => (content.style.display = 'none'));

            // Add active class to the clicked tab
            tab.classList.add('active');

            // Show the corresponding content
            const targetId = tab.getAttribute('data-tab');
            document.getElementById(targetId).style.display = 'block';
        });
    });
});


/*card visibilty code */
$(".card-view").hover(function() {
    $(this).find(".view-arrow-btn").removeClass("hide");
}, function() {
    $(this).find(".view-arrow-btn").addClass("hide");
});

$("body").on("click", ".view-arrow-btn", function() {
    var currentCard = $(this).closest(".product-col");  // Get the clicked card's column (product-col)

    // Toggle arrow icon between up and down
    var currentToggleClass = $(this).find("i");
    $(currentToggleClass).toggleClass("fa-arrow-circle-down fa-arrow-circle-up");

    // Toggle the visibility of the bottom card
    // if ($(currentToggleClass).hasClass("fa-arrow-circle-up")) {
    //     currentCard.find(".bottom-card").fadeIn();
    // } else {
    //     currentCard.find(".bottom-card").fadeOut();
    // }

    // Slide up or down the product description for the clicked card only
    currentCard.find(".product-description-div").stop().slideToggle();
});
