<style>
    #suggestions-box {
    /* border: 1px solid #ccc;
    max-height: 200px;
    overflow-y: auto;
    background-color: #fff;
    position: absolute;
    width: 100%;
    z-index: 10; */
    list-style-type: none;
    z-index: 99999;
    overflow-y: scroll;
    padding: 0;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
    position: absolute;
    top: 47px;
    left: 0;
    width: 100%;
    background-color: white;
    display: none;
    height: 300px;
}

#suggestions-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

#suggestions-list li {
    padding: 10px;
    cursor: pointer;
}

#suggestions-list li:hover {
    background-color: #f0f0f0;
}
#suggestions-box2 {
    list-style-type: none;
    z-index: 99999;
    overflow-y: scroll;
    padding: 0;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
    position: absolute;
    top: 47px;
    left: 0;
    width: 100%;
    background-color: white;
    display: none;
    height: 300px;
}

#suggestions2 {
    list-style: none;
    padding: 0;
    margin: 0;
}

#suggestions2 li {
    padding: 10px;
    cursor: pointer;
}

#suggestions2 li:hover {
    background-color: #f0f0f0;
}
</style>
<header id="header-model"
tabindex="-1"
aria-labelledby="headerModelLabel"
aria-hidden="true" class="header-scroll">
{{-- /*searchpopu area*/ --}}
<div class="modal">
    {{-- <span class="close-button"><</span> --}}
    {{-- <div class="modal-content">

        <h1>Hello, I am a modal!</h1>
    </div> --}}
</div>
  <span class="close-button"><</span>
{{-- /*searchpopu area*/ --}}
    <section class="header-top">
        <button class="menu-btn d-lg-none d-sm-block d-md-none d-block" id="menu-btn" style="display: block;">
            <i class="fa-solid fa-bars"></i>
        </button>
        <!-- Left Part: Logo -->
        <div class="left-part">
            <div class="header-logo-container">
                <a href="{{ route('user.home') }}">
                    <img src="{{ asset('images/vibrantupdatelogo.png') }}" alt="company logo">
                </a>
            </div>
        </div>

        <!-- Center Part: Search and Dropdown (Desktop) -->
        <div class="search-section">
            {{-- <div class="search-location-box">
                <div class="inputgroup_location">
                  <div class="input_location_box">
                    <input type="text" autocomplete="off"
                      class="input_location"
                      aria-label="City Auto-suggest"
                      placeholder="Enter Location"
                      id="city-auto-sug" value="Palanpur">
                    <ul class="dropdown-list" role="listbox">
                      <li class="dropdown-item" role="option">Ahmedabad</li>
                      <li class="dropdown-item" role="option">Mumbai</li>
                      <li class="dropdown-item" role="option">Palanpur</li>
                      <li class="dropdown-item" role="option">Surat</li>
                      <li class="dropdown-item" role="option">Rajkot</li>
                    </ul>
                  </div>
                </div>
              </div> --}}
              <div class="search-location-box">
                <div class="inputgroup_location">
                  <div class="input_location_box">
                    <form method="GET" action="{{ route('search') }}">
                    <input type="text" autocomplete="off"
                      class="input_location"
                      aria-label="City Auto-suggest"
                      placeholder="Enter City"
                      name="location"
                      id="city-auto-sug">
                    {{-- <ul class="dropdown-list" role="listbox" id="suggestions">

                      <!-- Suggestions for Indian cities will be dynamically populated -->
                    </ul> --}}
                    <div id="suggestions-box2" class="suggestions-box">
                        <ul id="suggestions2"></ul>
                    </div>
                  </div>
                </div>
              </div>



            <div class="search-container">
                {{-- <div class="select-box">
                    <div class="dropdown" id="desktop-dropdown">
                        <div class="dropdown-button" id="dropdownButton">
                            Products
                        </div>
                        <div class="dropdown-menu" id="dropdownMenu">
                             <div class="dropdown-item" onclick="selectDropdown('All')">All</div>

                            <div class="dropdown-item" onclick="selectDropdown('Products')">Products</div>
                            <div class="dropdown-item" onclick="selectDropdown('Companies')">Companies</div>
                        </div>
                    </div>
                </div> --}}

                <div class="search-input-box">
                    {{-- <form id="search-form" class="search-box-section" method="GET" action="{{ route('search') }}" onsubmit="performSearch(event)"> --}}
                        {{-- <form id="search-form" class="search-box-section" method="GET" action="{{ route('search') }}"> --}}
                            <div id="search-form" class="search-box-section">
                        {{-- <input type="text" name="query" id="search-bar" oninput="fetchSuggestions()" autocomplete="off" placeholder="Search here ..."> --}}
                        <input type="text" name="query" id="search-bar" oninput="fetchSuggestions()" autocomplete="off" placeholder="Search here ...">
                        <div id="suggestions-box" class="suggestions-box">
                            <ul id="suggestions-list" class="pt-2"></ul>
                        </div>
                        <div class="search-btn-box">
                            <button type="submit" class="search-btn">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </div>
                    </form>

                    {{-- <div id="suggestions" class="suggestions-box"></div>
                    <div id="suggestions" class="suggestions-box"></div> --}}
                </div>

            </div>

        </div>
        <button class="trigger"><i class="fa-solid fa-magnifying-glass" style="color: #000000;"></i></button>
        <!-- Right Part: Authentication & Contact (Desktop) -->
        <div class="d-lg-block d-md-block d-none">
            <div class="right-part">
                @if (Auth::check())
                    <a href="{{ route('logout') }}" class="primary-btn"
                     id="loginButton"
                     style="display: none"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn-links">
                        <span class="lg-img">
                            <img src="{{ asset('images/personicon.png') }}" alt="">
                        </span>
                        Sign in
                    </a>
                    <a href="{{ route('login') }}" class="btn-links">
                        <span class="lg-img">
                            <img src="{{ asset('images/registration.png') }}" alt="" style="height: 30px;width:30px;">
                        </span>
                         Join Free
                    </a>
                    {{-- <a href="{{ route('login') }}" class="btn-links">
                        <span class="lg-img">
                            <img src="{{ asset('images/INQUIRY.png') }}" alt="">
                        </span>
                        Inquiry
                    </a>
                    <a href="https://wa.me/+918511684938" class="contact-cheap">
                        +91 8511 6849 38
                    </a> --}}
                @endif
            </div>
        </div>
    </section>

    <!-- Header Bottom: Mobile Menu and Navigation -->
    <div class="header-bottom">
        {{-- <button class="menu-btn d-lg-none d-sm-block d-md-none" id="menu-btn">
            <i class="fa-solid fa-bars"></i>
        </button> --}}

        <nav class="nav-container">
            <span class="close-btn" id="close-btn">&times;</span>
            <ul class="menu d-lg-block d-xl-block d-md-block d-sm-none d-none">
                <li class="dropdown menu-item">
                    <a href="#"><span class="category-img mx-1 "><i class="fa-solid fa-list"></i></span>All
                        Category</a>
                    <ul class="submenu">
                        @php
                        $categories = App\Models\Category::all()->pluck('name');
                    @endphp

                    @foreach ($categories as $category)
                        <li class="category-menu-item">
                            <a href="#" class="category-menu-link">{{ $category }}</a>
                        </li>
                    @endforeach


                        {{-- <li class="category-menu-item"><a href="#" class="category-menu-link">Option 2</a></li>
                        <li class="category-menu-item"><a href="#" class="category-menu-link">Option 3</a></li>
                        <li class="category-menu-item"><a href="#" class="category-menu-link">Option 4</a></li>
                        <li class="category-menu-item"><a href="#" class="category-menu-link">Option 5</a></li> --}}
                    </ul>
                </li>
            </ul>
            <ul class="nav-view">
                <li class="nav-item mobile-logo py-4 px-1 d-lg-none d-sm-block d-md-none">
                    <div class="header-logo-container d-md-block d-sm-block d-lg-none">
                        <a href="{{ route('user.home') }}">
                            <img src="{{ asset('images/mobile-logo.png') }}" alt="company logo"
                                style="height: 100%; width: 187px;">
                        </a>
                    </div>
                </li>
                <li class="nav-item"><a href="{{ route('innertopcategory') }}" class="nav-link">Top Category</a></li>
                <li class="nav-item"><a href="{{ route('newarrival') }}" class="nav-link">New Arrival</a></li>
                <li class="nav-item"><a href="{{ route('alltrendingcategory') }}" class="nav-link">Trending
                        Products</a></li>
                <li class="nav-item"><a href="#Blogs" class="nav-link">Blogs</a></li>
                <li class="s-box d-lg-none d-md-none d-sm-block">
                    <div class="right-part mt-5">
                        <a href="{{ route('login') }}" class="btn-links">
                            <span class="lg-img">
                                <img src="{{ asset('images/personmobile.png') }}" alt="">
                            </span>
                            Sign in
                        </a>
                        <a href="{{ route('login') }}" class="btn-links">
                            <span class="lg-img">
                                <img src="{{ asset('images/INQUIRYMOBILE.png') }}" alt="">
                            </span>
                            Inquiry
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>

    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="loginForm">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input  type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if (session('alert'))
        <div class="alert alert-warning">
        {{ session('alert') }}
    </div>
        {{-- <script>
            document.addEventListener('DOMContentLoaded', function() {

                var loginModal = new bootstrap.Modal(document.getElementById('loginModal'), {
                    backdrop: 'static', // Prevent closing by clicking outside
                    keyboard: false // Prevent closing by pressing Esc
                });
                loginModal.show();

            });
        </script> --}}
    @endif
</header>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
{{-- search-suggestions --}}
<script>
 $(document).ready(function () {
    $('#search-bar').on('keyup', function () {
        const query = $(this).val();

        if (query.length !== 0) {
            $.ajax({
                url: '/search-suggestions',
                method: 'GET',
                data: { query: query },
                success: function (response) {
                    let suggestionsHTML = '';

                    if (response.products.length > 0) {
                        suggestionsHTML += '<strong class="globalnav-searchresults-header">Products:</strong>';
                        response.products.forEach(product => {
                            suggestionsHTML += `<li>${product.name}</li>`;
                        });
                    }

                    if (response.categories.length > 0) {
                        suggestionsHTML += '<strong class="globalnav-searchresults-header">Categories:</strong>';
                        response.categories.forEach(category => {
                            suggestionsHTML += `<li>${category.name}</li>`;
                        });
                    }
                    if (response.subcategories.length > 0) {
                        suggestionsHTML += '<strong class="globalnav-searchresults-header">Subcategories:</strong>';
                        response.subcategories.forEach(subcategory => {
                            suggestionsHTML += `<li>${subcategory.name}</li>`;
                        });
                    }

                    if (response.companies.length > 0) {
                        suggestionsHTML += '<strong class="globalnav-searchresults-header">Companies:</strong>';
                        response.companies.forEach(company => {
                            suggestionsHTML += `<li>${company.name}</li>`;
                        });
                    }

                    $('#suggestions-list').html(suggestionsHTML);
                    $('#suggestions-box').show();
                },
                error: function () {
                    $('#suggestions-box').hide();
                },
            });
        } else {
            $('#suggestions-box').hide();
        }
    });

    $(document).on('click', '#suggestions-list li:not(.globalnav-searchresults-header)', function () {
        const selectedValue = $(this).text();
        $('#search-bar').val(selectedValue);
        $('#suggestions-box').hide();
    });
});

</script>
<script>
    // Fetching categories from Blade (passed as JSON)
    const categories = @json(App\Models\Category::all()->pluck('name'));

    let placeholderIndex = 0;
    let charIndex = 0;
    let isDeleting = false;
    const typingSpeed = 100;
    const deletingSpeed = 50;
    const delayBetweenWords = 1500;

    function animatePlaceholder() {
        const currentPlaceholder = categories[placeholderIndex];
        const searchInput = document.getElementById("search-bar");
        const baseText = "Search for ";

        if (!isDeleting && charIndex < currentPlaceholder.length) {
            // Typing animation
            searchInput.placeholder = baseText + currentPlaceholder.substring(0, charIndex + 1);
            charIndex++;
            setTimeout(animatePlaceholder, typingSpeed);
        } else if (isDeleting && charIndex > 0) {
            // Deleting animation
            searchInput.placeholder = baseText + currentPlaceholder.substring(0, charIndex - 1);
            charIndex--;
            setTimeout(animatePlaceholder, deletingSpeed);
        } else if (!isDeleting && charIndex === currentPlaceholder.length) {
            // Pause before deleting
            isDeleting = true;
            setTimeout(animatePlaceholder, delayBetweenWords);
        } else if (isDeleting && charIndex === 0) {
            // Move to the next placeholder
            isDeleting = false;
            placeholderIndex = (placeholderIndex + 1) % categories.length;
            setTimeout(animatePlaceholder, typingSpeed);
        }
    }

    // Start the animation
    animatePlaceholder();
</script>

<script>
    // Default category is 'Products'
    let selectedCategory = "All";

    // Update the dropdown button text
    function updateDropdownButtonText(buttonId, text) {
        document.getElementById(buttonId).textContent = text;
    }

    // Function to handle dropdown selection (desktop and mobile)
    function selectDropdown(category) {
        selectedCategory = category;
        updateDropdownButtonText('dropdownButton', category);
        document.getElementById('dropdownMenu').classList.remove('show');
        clearSuggestions(); // Clear previous suggestions
    }

    function selectDropdownMobile(category) {
        selectedCategory = category;
        updateDropdownButtonText('dropdownButtonMobile', category);
        document.getElementById('dropdownMenuMobile').classList.remove('show');
        clearSuggestions(); // Clear previous suggestions
    }

    // Toggle dropdown visibility (desktop and mobile)
    function toggleDropdown(menuId) {
        document.getElementById(menuId).classList.toggle('show');
    }

    // Clear suggestions box
    function clearSuggestions() {
        const desktopSuggestions = document.getElementById("suggestions");
        const mobileSuggestions = document.getElementById("suggestions-mobile");

        desktopSuggestions.innerHTML = "";
        desktopSuggestions.style.display = "none";

        mobileSuggestions.innerHTML = "";
        mobileSuggestions.style.display = "none";
    }

    // Display search suggestions
    function displaySuggestions(suggestions, isMobile = false) {
        const suggestionsBox = document.getElementById(isMobile ? "suggestions-mobile" : "suggestions");

        // Clear the suggestions box content before appending new suggestions
        suggestionsBox.style.display = "block";
        suggestionsBox.innerHTML = ""; // Only clear the contents, not the event listeners

        let hasResults = false;

        // Create a container for the suggestions
        const content = document.createElement('div');

        // Display companies first if available
        if (suggestions.companies && suggestions.companies.length > 0) {
            hasResults = true;
            const companiesHeader = document.createElement('div');
            companiesHeader.className = 'suggestion-header';
            companiesHeader.textContent = 'Companies';
            content.appendChild(companiesHeader);

            suggestions.companies.forEach((company) => {
                const suggestion = document.createElement('div');
                suggestion.className = "suggestion-item";
                suggestion.textContent = company.name;
                suggestion.onclick = () => {
                    window.location.href = `/company/${company.id}/products`;
                };
                content.appendChild(suggestion);
            });
        }

        // Display products second if available
        if (suggestions.products && suggestions.products.length > 0) {
            hasResults = true;
            const productsHeader = document.createElement('div');
            productsHeader.className = 'suggestion-header';
            productsHeader.textContent = 'Products';
            content.appendChild(productsHeader);

            suggestions.products.forEach((product) => {
                const suggestion = document.createElement('div');
                suggestion.className = "suggestion-item";
                suggestion.textContent = product.name;
                suggestion.onclick = () => {
                    window.location.href = `/product/${product.id}`;
                };
                content.appendChild(suggestion);
            });
        }

        // No results found
        if (!hasResults) {
            const noResults = document.createElement('div');
            noResults.className = 'suggestion-item';
            noResults.textContent = 'No results found';
            content.appendChild(noResults);
        }

        // Append the content to the suggestions box
        suggestionsBox.appendChild(content);
    }


    // Fetch search suggestions from server
    function fetchSuggestions(query, isMobile = false) {
        if (query.length > 2) {
            const endpoint = `/search-suggestions?query=${query}&category=${selectedCategory}`;

            fetch(endpoint)
                .then(response => response.json())
                .then(data => {
                    if (selectedCategory === "All") {
                        displaySuggestions({
                            products: data.products || [],
                            companies: data.companies || []
                        }, isMobile);
                    } else if (selectedCategory === "Products") {
                        displaySuggestions({
                            products: data.suggestions || []
                        }, isMobile);
                    } else if (selectedCategory === "Companies") {
                        displaySuggestions({
                            companies: data.suggestions || []
                        }, isMobile);
                    }
                })
                .catch(error => console.error("Error fetching suggestions:", error));
        } else {
            clearSuggestions();
        }
    }

    // Perform search on form submission
    function performSearch(event, isMobile = false) {
        event.preventDefault();
        const query = document.getElementById(isMobile ? "search-bar-mobile" : "search-bar").value.trim();
        if (query !== "") {
            window.location.href = `/search-results?query=${query}&category=${selectedCategory}`;
        }
    }

    // Event listeners for desktop and mobile dropdowns
    document.getElementById('dropdownButton').addEventListener('click', () => toggleDropdown('dropdownMenu'));
    document.getElementById('dropdownButtonMobile').addEventListener('click', () => toggleDropdown(
        'dropdownMenuMobile'));

    // Event listeners for search input
    document.getElementById('search-bar').addEventListener('input', (e) => fetchSuggestions(e.target.value));
    document.getElementById('search-bar-mobile').addEventListener('input', (e) => fetchSuggestions(e.target.value,
        true));

    // Event listeners for form submission
    document.getElementById('search-form').addEventListener('submit', (e) => performSearch(e));
    document.getElementById('search-form-mobile').addEventListener('submit', (e) => performSearch(e, true));

    // Initialize the default category
    selectDropdown("All");

    window.onload = function () {
        setTimeout(function () {
          var loginModal = new bootstrap.Modal(document.getElementById('header-model'));
          loginModal.show();
        }, 3000); // 3000 milliseconds = 3 seconds
      };

      // Switch to detailed form
      document.getElementById("showDetailsForm").addEventListener("click", function () {
        document.getElementById("basicForm").style.display = "none";
        document.getElementById("detailedForm").style.display = "block";
      });

      // Switch back to basic form
      document.getElementById("showBasicForm").addEventListener("click", function () {
        document.getElementById("basicForm").style.display = "block";
        document.getElementById("detailedForm").style.display = "none";
      });

</script>
