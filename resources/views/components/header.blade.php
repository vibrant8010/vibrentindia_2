<header aria-hidden="true" class="header-scroll" id="header">
    {{-- /*all category dropdown*/ --}}
    <div class="modal">
        <div class="modal-content">
            <h6 class="category-title">All Category</h6>
            <ul class="menu modal-category">
                <ul class="modal-category">
                    @php
                        $categories = App\Models\Category::all()->pluck('name');
                    @endphp

                    @foreach ($categories as $category)
                        <li class="category-menu-item modal-nav-item">
                            <span class="arrow-tend"><i class="fa-solid fa-arrow-trend-up"
                                    style="color: #ffffff;"></i></span>
                            <a href="{{ route('category', $category) }}"
                                class="category-menu-link">{{ $category }}</a>
                        </li>
                    @endforeach
                </ul>
                {{-- </li> --}}
            </ul>
        </div>
    </div>
    <span class="close-button"><i style='font-size:24px' class='fas'>&#xf104;</i></span>

    {{-- /*searchpopu area*/ --}}
    <section class="header-top">
        <button class="menu-btn d-lg-none d-sm-block d-md-none d-block" id="menu-btn" style="display: block;">
            <i class="fa-solid fa-bars"></i>
        </button>
        <!-- Left Part: Logo -->
        <div class="left-part">
            <div class="header-logo-container">
                <a href="{{ route('user.home') }}">
        <img src="{{ asset('images/vibrentlogo.png') }}" alt="company logo"
                                style="height: 27px; width: 150px;">
                </a>
            </div>
        </div>

        <!-- Center Part:  and Dropdown (Desktop) -->
        <div class="d-flex aligin-items-center justify-content-center mobil-rightpart">
            <div class="search-section">
                <div class="search-location-box">
                    <div class="inputgroup_location">
                        <div class="input_location_box">
                            <div class="location-img">
                                <img src="{{ asset('images/mapicon.png') }}" alt="location img">
                            </div>
                            <form method="GET" action="{{ route('search') }}">
                                <input type="text" autocomplete="off" class="input_location"
                                    aria-label="City Auto-suggest" placeholder="Enter City" name="location"
                                    id="city-auto-sug"
                                    @if (session()->has('city')) value="{{ session('city') }}" @endif>

                                <div id="suggestions-box2" class="suggestions-box input_location_box">
                                    <ul id="suggestions2"></ul>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="search-container">
                    <div class="search-input-box">

                        <div id="search-form" class="search-box-section">
                            <div class="search-btn-box">
                                <button type="submit" class="search-btn">
                                    <img src="{{ asset('images/searchicon.png') }}" alt="location img">
                                </button>
                            </div>
                            <input type="text" name="query" id="search-bar" oninput="fetchSuggestions()"
                                autocomplete="off" placeholder="Search here ...">
                            <div id="suggestions-box" class="suggestions-box">
                                <ul id="suggestions-list" class="pt-2"></ul>
                            </div>

                        </div>
                        </form>
                    </div>

                </div>

            </div>


            <button class="trigger icon-mobile-view">
                <span class="lg-img">
                    <img src="{{ asset('images/mobilesearch.png') }}" alt="usericon" height="30px" width="30px">
                </span>
            </button>

            <div class="d-block d-lg-none d-md-none d-sm-block d-xl-none">
                @if (Auth::check())
                    @auth
                        <div class="dropdown logout-dropdown">
                            <button class="dropdown-btn">
                                <span><i class="fa-regular fa-user" style="color: #000000;"></i></span>
                                {{-- {{ Auth::user()->name }} --}}
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    {{ Auth::user()->name }}
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}" class="logout-btn"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>

                    @endauth
                @else
                    <a style="cursor: pointer" onclick="openModal()" class="btn-links icon-mobile-view">
                        <span class="lg-img">
                                <img src="{{ asset('images/mobileuser.png') }}" alt="usericon" height="30px" width="30px">
                            </span>
                        <span class="d-xl-block d-lg-block d-sm-none d-none d-md-block"> Sign in </span>
                    </a>
                @endif
            </div>
        </div>
        <!-- Right Part: Authentication & Contact (Desktop) -->
        <div class="d-lg-block d-md-block d-none">
            {{-- d-lg-block d-md-block d-none --}}
            <div class="right-part">
                @if (Auth::check())
                    @auth
                        <div class="dropdown logout-dropdown">
                            <button class="dropdown-btn">
                                <span><i class="fa-solid fa-circle-user fa-2x"
                                        style="color: #005353; margin-right: 5px;"></i></span>
                                {{ Auth::user()->name }}
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}" class="logout-btn"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>

                    @endauth
                @else
                    <a style="cursor: pointer" onclick="openModal()" class="btn-links">
                        <span class="lg-img">
                            <img src="{{ asset('images/usericon.png') }}" alt="usericon" height="30px"
                                width="30px">
                        </span>
                        Sign in
                    </a>
                    {{-- href="{{ route('business.register') }}" --}}
                    {{-- id="openPopup" --}}
                    <a style="cursor: pointer" id="openPopup" onclick="openModal3()" class="btn-links join-btn">
                      Free Join
                    </a>

                @endif
            </div>
        </div>
    </section>
    <!--header top part done -->

    <!-- Header Bottom: Mobile Menu and Navigation -->
    <div class="header-bottom">
        <!--header bottom navigation part-->
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
                                <a href="{{ route('category', $category) }}"
                                    class="category-menu-link">{{ $category }}</a>
                            </li>
                        @endforeach

                    </ul>
                </li>
            </ul>
            <ul class="nav-view">
                <li class="nav-item mobile-logo py-4 px-1 d-lg-none d-sm-block d-md-none">
                    <div class="header-logo-container d-md-block d-sm-block d-lg-none">
                        <a href="{{ route('user.home') }}">
                            <img src="{{ asset('images/vibrentlogo.png') }}" alt="company logo"
                                style="height: 32px; width: 169px;">
                        </a>
                    </div>
                    {{-- <span class="close-btn" id="close-btn" style="display: block;">×</span> --}}
                </li>
                <li class="nav-item"><a href="{{ route('innertopcategory') }}" class="nav-link">Top
                        Category</a></li>
                <li class="nav-item"><a href="{{ route('newarrival') }}" class="nav-link">New Arrival</a>
                </li>
                <li class="nav-item"><a href="{{ route('alltrendingcategory') }}" class="nav-link">Trending
                        Products</a></li>
                <li class="nav-item"><a href="{{ route('blogsection', 7) }}" class="nav-link">Blogs</a></li>

            </ul>
        </nav>
        <!--header bottom navigation part-->

        <!--mobile view in show sticky not-->
        <div class="nav-item nav-item d-sm-block d-block d-lg-none d-md-none m-0 sticky-note">
            {{-- href="{{ route('business.register') }}" --}}
            <a style="cursor: pointer" onclick="openModal3()" class="btn-links py-3">
                Join Free
            </a>
        </div>
        <!--mobile view in show sticky not-->
    </div>

    <!--login Custom Modal -->
    <div class="custom-modal-overlay" id="customModal" style="display: none;">
        <div class="custom-modal">
            <div class="custom-modal-header">

                <button class="custom-modal-close" id="closeModal">&times;</button>
                <div class="custom-modal-logo">
                    {{-- <img src="{{ asset('images/desktoplogo.png') }}" alt="Company Logo"
                            style="height: 37px;width: 212px;" /> --}}
                            VIBRANT INDIA TRADE
                    <a href="#"></a>
                </div>
                <div class="custom-modal-welcome">
                    Great to have you back !
                </div>
            </div>
            <div class="custom-modal-body">
                <!-- Basic Form -->
                <div id="basicCustomForm">
                    <div class="custom-input-group">
                        {{-- <span class="custom-label">Email</span> --}}
                        {{-- <label for="email" class="custom-label">Email</label> --}}
                        <input type="email" class="custom-input" id="otp_email" placeholder="Enter your email"
                            required />
                    </div>
                    <button type="button" class="form-btn" id="sandotp">
                        <span id="sandotpText">Get OTP</span>
                        <span id="sandotpLoader" class="spinner" style="display: none;"></span>
                    </button>
                    {{-- <p class="custom-link-text">
                        Don't have an account? --}}
                        <button type="button" class="custom-link" id="showSignUpForm">
                            <p class="custom-link-text">
                                Don't have an account? <span class="text-black">Register Now</span>
                        </button>
                    {{-- </p> --}}
                    <div class="custom-modal-footer">
                    </div>
                </div>
                {{-- otp --}}
                <form action="{{ route('user.otp.verify') }}" method="post">
                    @csrf
                    <div id="otpCustomForm" style="display: none;">
                        <div class="custom-input-group">
                             <input type="text" name="otp" class="custom-input" id="otp"
                                placeholder="Enter the OTP" required />
                        </div>
                        <div class="custom-modal-footer">
                            <button type="submit" class="form-btn" id="verifyOtpBtn">Verify OTP</button>
                        </div>
                    </div>
                </form>
                <!-- Detailed Form -->
                <div id="detailedCustomForm" style="display: none;">
                    <div class="box-container">
                        <div class="custom-input-group">
                            {{-- <label for="name" class="custom-label">Name</label> --}}
                            <input type="text" class="custom-input" id="name2"
                                placeholder="Enter your name" />
                        </div>
                        <div class="custom-input-group">
                            {{-- <label for="emailSignUp" class="custom-label">Email</label> --}}
                            <input type="email" class="custom-input" id="email2"
                                placeholder="Enter your email" />
                        </div>
                    </div>
                    <div class="custom-input-group">
                        {{-- <label for="phone" class="custom-label">Phone Number</label> --}}
                        <input type="tel" class="custom-input" id="phone2"
                            placeholder="Enter your phone number" />
                    </div>
                    <div class="d-flex justify-content-end">
                        {{-- <a href="#" class="custom-forgot">Forgot Password?</a> --}}
                        <span style="font-size: 14px;">Do you have an account?</span>
                        <button type="button" class="" id="showLoginForm">
                            Login
                        </button>
                    </div>
                    <div class="custom-modal-footer">
                        <button type="button" class="form-btn" id="signUpBtn2">
                            <span id="signUpBtnText">Sign Up</span>
                            <span id="signUpBtnLoader" class="spinner" style="display: none;"></span>
                        </button>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!--login Custom Modal done -->

    <!--inqury form view-->
    <div class="custom-modal-overlay my-box-view" id="inquiryModal" style="display: none;">
        <div class="custom-modal open-modal">
            <div class="custom-modal-header">

                <div class="custom-modal-welcome" style="border-left:0;">
                    <span class="welcom-txt">Inquiry Form</span>
                </div>

                <button class="custom-modal-close my-box-close" id="closeInquiryModal">×</button>
                <button type="button" class="back-btn" id="showSignUpForm">
                    dddd
                 </button>
            </div>
            <div class="custom-modal-body my-box-body">
                <form action="/inquiry" method="POST" enctype="multipart/form-data">
                    <div class="box-container">
                        <input type="hidden" name="_token" value="vABjpHAzcdmGKGoM636IqAc9ecix2oOgCaurdUl0"
                            autocomplete="off">
                        <div class="custom-input-group">
                            <label class="custom-label">Product Code</label>
                            <input class="custom-input" placeholder="enter product code" type="text"
                                name="product_id" value="" readonly="">
                        </div>
                        <div class="custom-input-group">
                            <label class="custom-label">Product Name</label>
                            <input class="custom-input" type="text" name="product_name" value=""
                                readonly="">
                        </div>
                    </div>
                    <div class="box-container">
                        <div class="custom-input-group">
                            <label class="custom-label">Your Company Name</label>
                            <input class="custom-input" type="text" name="companyname"
                                placeholder="Your Company Name">
                        </div>
                        <div class="custom-input-group">
                            <label class="custom-label">Email</label>
                            <input class="custom-input" type="email" name="email" placeholder="Enter Email"
                                required="" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
                                title="Please enter a valid email address (e.g., user@example.com)">
                        </div>
                    </div>
                    <div class="box-container">
                        <div class="custom-input-group">
                            <label class="custom-label">Phone Number</label>
                            <input class="custom-input" type="tel" name="phone"
                                placeholder="Enter Phone Number">
                        </div>
                        <div class="custom-input-group">
                            <label class="custom-label">Quantity</label>
                            <input class="custom-input" type="text" name="quantity" placeholder="Quantity"
                                min="1" required="">
                        </div>
                    </div>
                    <div class="custom-input-group" style="width: 100%;">
                        <label class="custom-label">Message</label>
                        <textarea name="message" class="custom-input" rows="3" placeholder="Enter your message here..."></textarea>
                    </div>

                </form>

            </div>
            <div class="custom-modal-footer">
                <button type="submit" class="custom-btn">Submit Inquiry</button>
            </div>

        </div>
    </div>
    <!--inqury form view done-->

    @if (session('alert'))
        <div class="alert alert-warning">
            {{ session('alert') }}
        </div>
    @endif
</header>



{{-- script part start --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

{{-- search-suggestions --}}
<script>
    $(document).ready(function() {
        const $searchBar = $('#search-bar');
        const $suggestionsBox = $('#suggestions-box');
        const $suggestionsList = $('#suggestions-list');
        let searchTimeout = null;
        let currentRequest = null;
        let highlightedIndex = -1;

        // Retrieve the user's location from the input field
        const userCity = document.getElementById('city-auto-sug').value || '';

        // Handle input and perform search
        $searchBar.on('input', function() {
            clearTimeout(searchTimeout);
            const query = $(this).val().trim();

            if (!query) {
                $suggestionsBox.hide();
                return;
            }

            // Show loading state
            $suggestionsList.html('<li class="loading">Loading suggestions...</li>');
            $suggestionsBox.show();

            // Debounce the AJAX request
            searchTimeout = setTimeout(() => performSearch(query), 300);
        });

        // Perform search based on the query
        function performSearch(query) {
            if (currentRequest) currentRequest.abort();

            currentRequest = $.ajax({
                url: '/search-suggestions', // Replace with actual search endpoint
                method: 'GET',
                data: {
                    query: query
                },
                dataType: 'json',
                success: response => handleSearchSuccess(response, query),
                error: handleError,
            });
            x
        }

        // Handle the search results
        function handleSearchSuccess(response, query) {
            $suggestionsList.empty();
            if ($searchBar.val().trim() !== query) return;

            const sections = [{
                    title: 'Products',
                    items: response.products
                },
                {
                    title: 'Categories',
                    items: response.categories
                },
                {
                    title: 'Subcategories',
                    items: response.subcategories
                },
                {
                    title: 'Companies',
                    items: response.companies
                },
            ];

            let hasResults = false;

            sections.forEach(({
                title,
                items
            }) => {
                if (!items.length) return;
                hasResults = true;

                const $section = createSearchSection(title, items, query);
                $suggestionsList.append($section);
            });

            if (!hasResults) {
                $suggestionsList.html('<li class="no-results">No results found.</li>');
            }

            $suggestionsBox.show();
        }

        // Create section of suggestions
        function createSearchSection(title, items, query) {
            return $('<div>', {
                    class: 'suggestion-section'
                })
                .append($('<strong>', {
                    class: 'globalnav-searchresults-header',
                    text: title + ':'
                }))
                .append(
                    $('<ul>').append(
                        items.map((item, index) => {
                            const highlightedText = highlightMatch(item.name, query);
                            return $('<li>')
                                .html(highlightedText)
                                .attr('data-index', index)
                                .on('click', function() {
                                    const locationQuery = userCity ?
                                        `&location=${encodeURIComponent(userCity)}` : '';
                                    window.location.href =
                                        `/search?query=${encodeURIComponent(item.name)}${locationQuery}`;
                                });
                        })
                    )
                );
        }

        // Highlight matching text in suggestions
        function highlightMatch(text, query) {
            const regex = new RegExp(`(${query})`, 'gi');
            return text.replace(regex, '<span class="highlight">$1</span>');
        }

        // Handle errors in the search request
        function handleError(xhr, status, error) {
            if (status !== 'abort') {
                console.error('Error:', error);
                $suggestionsList.html(
                    '<li class="no-results">Failed to load suggestions. Please try again.</li>');
                $suggestionsBox.show();
            }
        }

        // Handle keydown for arrow key navigation and Enter key selection
        $searchBar.on('keydown', function(e) {
            const $visibleItems = $suggestionsList.find('li:not(.loading, .no-results)');
            const visibleItemsCount = $visibleItems.length;

            if (!$visibleItems.length || !$suggestionsBox.is(':visible')) return;

            switch (e.key) {
                case 'ArrowDown':
                    e.preventDefault();
                    if (highlightedIndex < visibleItemsCount - 1) {
                        highlightedIndex++;
                    } else {
                        highlightedIndex = 0;
                    }
                    break;
                case 'ArrowUp':
                    e.preventDefault();
                    if (highlightedIndex > 0) {
                        highlightedIndex--;
                    } else {
                        highlightedIndex = visibleItemsCount - 1;
                    }
                    break;
                case 'Enter':
                    e.preventDefault();
                    if (highlightedIndex >= 0 && highlightedIndex < visibleItemsCount) {
                        const selectedItem = $visibleItems.eq(highlightedIndex);
                        const locationQuery = userCity ? `&location=${encodeURIComponent(userCity)}` :
                            '';
                        window.location.href =
                            `/search?query=${encodeURIComponent(selectedItem.text())}${locationQuery}`;
                    }
                    break;
                case 'Escape':
                    e.preventDefault();
                    $suggestionsBox.hide();
                    break;
                default:
                    return;
            }

            $visibleItems.removeClass('highlighted');
            if (highlightedIndex >= 0) {
                const $highlightedItem = $visibleItems.eq(highlightedIndex);
                $highlightedItem.addClass('highlighted');
                scrollToItem($highlightedItem);
            }
        });

        // Scroll to the highlighted item
        function scrollToItem($item) {
            const container = $suggestionsBox[0];
            const itemOffsetTop = $item[0].offsetTop;
            const itemHeight = $item.outerHeight();
            const containerHeight = $suggestionsBox.height();

            if (itemOffsetTop < container.scrollTop) {
                container.scrollTop = itemOffsetTop;
            } else if (itemOffsetTop + itemHeight > container.scrollTop + containerHeight) {
                container.scrollTop = itemOffsetTop + itemHeight - containerHeight;
            }
        }

        // Handle mouse hover and click for suggestions
        $(document).on('mouseenter', '#suggestions-list li', function() {
            const index = $(this).data('index');
            highlightedIndex = index;
            $(this).addClass('highlighted').siblings().removeClass('highlighted');
        });

        // Handle form submission directly (for the "Enter" key if not navigating)
        $searchBar.on('keypress', function(e) {
            if (e.key === 'Enter' && highlightedIndex === -1) {
                const query = $(this).val().trim();
                if (query) {
                    e.preventDefault();
                    const locationQuery = userCity ? `&location=${encodeURIComponent(userCity)}` : '';
                    window.location.href = `/search?query=${encodeURIComponent(query)}${locationQuery}`;
                }
            }
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
</script>

@if (!session()->has('city'))
    @push('scripts')
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

                fetch(url)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! Status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        const address = data.address || {};
                        const state = address.state || '';
                        const city = address.city || address.state_district || address.town || address.village || '';
                        const postalCode = address.postcode || '';
                        if (state && city && postalCode) {
                            // document.getElementById('city-auto-sug').value = `${city}, ${state}, ${postalCode}`;
                            document.getElementById('city-auto-sug').value = address.city || address.state_district ||
                                address.town || address.village || '';
                            sendLocationData({
                                state,
                                city,
                                postalCode
                            });
                        }
                    })
                    .catch(error => {
                        console.error("Error fetching geolocation data:", error);
                    });
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
                // console.log(data);
                $.ajax({
                    url: "/location",
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
    @endpush
@endif
{{-- @if (!session()->has('user_id')) --}}
{{-- @push('scripts') --}}
<script>
    //  const openModal = document.getElementById("loginButton");
    const modal2 = document.getElementById("customModal");
    const closeModal = document.getElementById("closeModal");
    const showSignUpForm = document.getElementById("showSignUpForm");
    const showLoginForm = document.getElementById("showLoginForm");
    const basicForm = document.getElementById("basicCustomForm");
    const detailedForm = document.getElementById("detailedCustomForm");
    const otpForm = document.getElementById("otpCustomForm");
    const verifyOtpBtn = document.getElementById("verifyOtpBtn");
    const loginBtn = document.getElementById("signUpBtn2");
    const sandotp = document.getElementById("sandotp");
    // Open modal
    function openModal() {
        modal2.style.display = "flex";
    }

    function showOtpForm() {
        detailedForm.style.display = "none";
        basicForm.style.display = "none";
        otpForm.style.display = "block";
    }


    sandotp.addEventListener("click", () => {
        const email2 = document.getElementById("otp_email").value;
        const sandotpText = document.getElementById("sandotpText");
        const sandotpLoader = document.getElementById("sandotpLoader");

        // Show loader while processing
        sandotpText.style.display = "none";
        sandotpLoader.style.display = "inline-block";

        $.ajax({
            url: "{{ route('login.process') }}",
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: JSON.stringify({
                email: email2
            }),
            contentType: 'application/json',
            success: function(response) {
                sandotpText.style.display = "inline-block";
                sandotpLoader.style.display = "none";

                if (response.success) {
                    showOtpForm();
                    alert(response.message);
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                sandotpText.style.display = "inline-block";
                sandotpLoader.style.display = "none";

                if (xhr.responseJSON && xhr.responseJSON.message) {
                    alert(xhr.responseJSON.message);
                } else {
                    alert("An unexpected error occurred. Please try again.");
                }

                console.error('Error:', error);
            }
        });

    });

    loginBtn.addEventListener("click", () => {
        const email2 = document.getElementById("email2").value.trim();
        const phone2 = document.getElementById("phone2").value.trim();
        const name2 = document.getElementById("name2").value.trim();
        const signUpBtnText = document.getElementById("signUpBtnText");
        const signUpBtnLoader = document.getElementById("signUpBtnLoader");

        // Basic validation
        if (!name2 || !email2 || !phone2) {
            alert("Please fill all fields.");
            return;
        }

        // Show loader while processing
        signUpBtnText.style.display = "none";
        signUpBtnLoader.style.display = "inline-block";

        $.ajax({
            url: "{{ route('register.save') }}",
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: JSON.stringify({
                email: email2,
                mobileno: phone2,
                name: name2,
            }),
            contentType: 'application/json',
            success: function(response) {
                // Hide loader when request is successful
                signUpBtnText.style.display = "inline-block";
                signUpBtnLoader.style.display = "none";

                if (response.success) {
                    showOtpForm();
                    alert(response.message);
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr) {
                // Hide loader if there's an error
                signUpBtnText.style.display = "inline-block";
                signUpBtnLoader.style.display = "none";

                let errorMessage = "An unexpected error occurred. Please try again.";
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                alert(errorMessage);
                console.error('Error:', xhr);
            }
        });
    });

    // Close modal
    closeModal.addEventListener("click", () => {
        modal2.style.display = "none";
    });

    // Toggle forms
    showSignUpForm.addEventListener("click", () => {
        basicForm.style.display = "none";
        detailedForm.style.display = "block";
    });

    showLoginForm.addEventListener("click", () => {
        detailedForm.style.display = "none";
        basicForm.style.display = "block";
    });
</script>

{{-- @endpush --}}
{{-- @endif --}}
