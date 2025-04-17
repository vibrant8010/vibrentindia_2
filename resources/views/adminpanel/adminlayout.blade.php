<!-- resources/views/layouts/base.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    @yield('title')
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="{{ asset('business/assets/img/kaiadmin/favicon.ico') }}" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{ asset('business/assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["assets/css/fonts.min.css"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('business/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('business/assets/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('business/assets/css/kaiadmin.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('business/assets/css/fonts.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('business/assets/css/demo.css') }}" />
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" data-background-color="dark">
            <div class="sidebar-logo">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="dark">
                    <a href="/admin/dashboard" class="logo">
                        <img src="{{ asset('images/mobile-logo.png') }}" alt="navbar brand" class="navbar-brand"
                            height="25" />
                    </a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="gg-menu-right"></i>
                        </button>
                        <button class="btn btn-toggle sidenav-toggler">
                            <i class="gg-menu-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more">
                        <i class="gg-more-vertical-alt"></i>
                    </button>
                </div>
                <!-- End Logo Header -->
            </div>
            <!-- Side Bar -->
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-secondary">
                        <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <a  href="{{ route('dashboard') }}" class="collapsed"
                                aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                                {{-- <span class="caret"></span> --}}
                            </a>
                        </li>

                        <li class="nav-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.users.index') }}"> <i class="fas fa-user"></i><p>Users</p></a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                            <a href="{{ route('categories.index') }}">
                                <i class="fas fa-list"></i><p> Categories
                            </p></a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.products.index') }}"><i class="fas fa-list"></i><p> Products</p></a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('admin.inquiry.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.inquiry.index') }}"><i class="fas fa-info"></i><p>Inquiry</p></a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.blogs.index') }}"><i class="fab fa-blogger-b"></i><p> Blogs</p></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="index.html" class="logo">
                            <img src="assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand"
                                height="20" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                    <div class="container-fluid">
                        <nav
                            class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                            {{-- <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-search pe-1">
                                        <i class="fa fa-search search-icon"></i>
                                    </button>
                                </div>
                                <input type="text" placeholder="Search ..." class="form-control" />
                            </div> --}}
                        </nav>

                        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                            {{-- <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#"
                                    role="button" aria-expanded="false" aria-haspopup="true">
                                    <i class="fa fa-search"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-search animated fadeIn">
                                    <form class="navbar-left navbar-form nav-search">
                                        <div class="input-group">
                                            <input type="text" placeholder="Search ..." class="form-control" />
                                        </div>
                                    </form>
                                </ul>
                            </li>
                            <li class="nav-item topbar-icon dropdown hidden-caret">
                                <a class="nav-link dropdown-toggle" href="#" id="messageDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="fa fa-envelope"></i>
                                </a>
                                <ul class="dropdown-menu messages-notif-box animated fadeIn"
                                    aria-labelledby="messageDropdown">
                                    <li>
                                        <div class="dropdown-title d-flex justify-content-between align-items-center">
                                            Messages
                                            <a href="#" class="small">Mark all as read</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="message-notif-scroll scrollbar-outer">
                                            <div class="notif-center">
                                                <a href="#">
                                                    <div class="notif-img">
                                                        <img src="assets/img/jm_denis.jpg" alt="Img Profile" />
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="subject">Jimmy Denis</span>
                                                        <span class="block"> How are you ? </span>
                                                        <span class="time">5 minutes ago</span>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="notif-img">
                                                        <img src="assets/img/chadengle.jpg" alt="Img Profile" />
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="subject">Chad</span>
                                                        <span class="block"> Ok, Thanks ! </span>
                                                        <span class="time">12 minutes ago</span>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="notif-img">
                                                        <img src="assets/img/mlane.jpg" alt="Img Profile" />
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="subject">Jhon Doe</span>
                                                        <span class="block">
                                                            Ready for the meeting today...
                                                        </span>
                                                        <span class="time">12 minutes ago</span>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="notif-img">
                                                        <img src="assets/img/talha.jpg" alt="Img Profile" />
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="subject">Talha</span>
                                                        <span class="block"> Hi, Apa Kabar ? </span>
                                                        <span class="time">17 minutes ago</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="see-all" href="javascript:void(0);">See all messages<i
                                                class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </li> --}}
                            {{-- <li class="nav-item topbar-icon dropdown hidden-caret">
                                <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bell"></i>
                                    <span class="notification">4</span>
                                </a>
                                <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                                    <li>
                                        <div class="dropdown-title">
                                            You have 4 new notification
                                        </div>
                                    </li>
                                    <li>
                                        <div class="notif-scroll scrollbar-outer">
                                            <div class="notif-center">
                                                <a href="#">
                                                    <div class="notif-icon notif-primary">
                                                        <i class="fa fa-user-plus"></i>
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="block"> New user registered </span>
                                                        <span class="time">5 minutes ago</span>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="notif-icon notif-success">
                                                        <i class="fa fa-comment"></i>
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="block">
                                                            Rahmad commented on Admin
                                                        </span>
                                                        <span class="time">12 minutes ago</span>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="notif-img">
                                                        <img src="assets/img/profile2.jpg" alt="Img Profile" />
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="block">
                                                            Reza send messages to you
                                                        </span>
                                                        <span class="time">12 minutes ago</span>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="notif-icon notif-danger">
                                                        <i class="fa fa-heart"></i>
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="block"> Farrah liked Admin </span>
                                                        <span class="time">17 minutes ago</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="see-all" href="javascript:void(0);">See all notifications<i
                                                class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>

                            </li> --}}
                            <li class="nav-item topbar-icon dropdown hidden-caret">
                                <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bell"></i>
                                    <span class="notification" id="notificationBadge">0</span>
                                </a>
                                <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                                    <li>
                                        <div class="dropdown-title">
                                            You have <span id="notificationCount">0</span> new notifications
                                        </div>
                                    </li>
                                    <li>
                                        <div class="notif-scroll scrollbar-outer">
                                            <div class="notif-center" id="notificationList">
                                                <div class="empty-notifications text-center py-3">
                                                    No new notifications
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        {{-- <a class="see-all" href="{{ route('notifications.index') }}">
                                            See all notifications
                                            <i class="fa fa-angle-right"></i>
                                        </a> --}}
                                    </li>
                                </ul>
                            </li>
                            {{-- <li class="nav-item topbar-icon dropdown hidden-caret">
                                <a class="nav-link" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                                    <i class="fas fa-layer-group"></i>
                                </a>
                                <div class="dropdown-menu quick-actions animated fadeIn">
                                    <div class="quick-actions-header">
                                        <span class="title mb-1">Quick Actions</span>
                                        <span class="subtitle op-7">Shortcuts</span>
                                    </div>
                                    <div class="quick-actions-scroll scrollbar-outer">
                                        <div class="quick-actions-items">
                                            <div class="row m-0">
                                                <a class="col-6 col-md-4 p-0" href="#">
                                                    <div class="quick-actions-item">
                                                        <div class="avatar-item bg-danger rounded-circle">
                                                            <i class="far fa-calendar-alt"></i>
                                                        </div>
                                                        <span class="text">Calendar</span>
                                                    </div>
                                                </a>
                                                <a class="col-6 col-md-4 p-0" href="#">
                                                    <div class="quick-actions-item">
                                                        <div class="avatar-item bg-warning rounded-circle">
                                                            <i class="fas fa-map"></i>
                                                        </div>
                                                        <span class="text">Maps</span>
                                                    </div>
                                                </a>
                                                <a class="col-6 col-md-4 p-0" href="#">
                                                    <div class="quick-actions-item">
                                                        <div class="avatar-item bg-info rounded-circle">
                                                            <i class="fas fa-file-excel"></i>
                                                        </div>
                                                        <span class="text">Reports</span>
                                                    </div>
                                                </a>
                                                <a class="col-6 col-md-4 p-0" href="#">
                                                    <div class="quick-actions-item">
                                                        <div class="avatar-item bg-success rounded-circle">
                                                            <i class="fas fa-envelope"></i>
                                                        </div>
                                                        <span class="text">Emails</span>
                                                    </div>
                                                </a>
                                                <a class="col-6 col-md-4 p-0" href="#">
                                                    <div class="quick-actions-item">
                                                        <div class="avatar-item bg-primary rounded-circle">
                                                            <i class="fas fa-file-invoice-dollar"></i>
                                                        </div>
                                                        <span class="text">Invoice</span>
                                                    </div>
                                                </a>
                                                <a class="col-6 col-md-4 p-0" href="#">
                                                    <div class="quick-actions-item">
                                                        <div class="avatar-item bg-secondary rounded-circle">
                                                            <i class="fas fa-credit-card"></i>
                                                        </div>
                                                        <span class="text">Payments</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li> --}}

                            <li class="nav-item topbar-user dropdown hidden-caret">
                                <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#"
                                    aria-expanded="false">
                                    <div class="avatar-sm">
                                        <img src="{{ asset('business/assets/img/profile.jpg') }}" alt="..."
                                            class="avatar-img rounded-circle" />
                                    </div>
                                    <span class="profile-username">
                                        <span class="op-7">Hi,</span>

                                        <span class="fw-bold">{{ Auth::user()->name }}</span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-user animated fadeIn">
                                    <div class="dropdown-user-scroll scrollbar-outer">
                                        <li>
                                            <div class="user-box">
                                                <div class="avatar-lg">
                                                    <img src="assets/img/profile.jpg" alt="image profile"
                                                        class="avatar-img rounded" />
                                                </div>
                                                <div class="u-text">
                                                    <h4>Hizrian</h4>
                                                    <p class="text-muted">hello@example.com</p>
                                                    <a href="profile.html"
                                                        class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">My Profile</a>
                                            <a class="dropdown-item" href="#">My Balance</a>
                                            <a class="dropdown-item" href="#">Inbox</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Account Setting</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                                        </li>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
            <div class="container">
                <div class="loader" id="pageLoader"></div>
                <div id="contentWrapper" style="display: none;">
                    @yield('content')
                </div>
            </div>

            <footer class="footer">
                <div class="container-fluid d-flex justify-content-between">
                    {{-- <nav class="pull-left">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="http://www.themekita.com">
                                    ThemeKita
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"> Help </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"> Licenses </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright">
                        2024, made with <i class="fa fa-heart heart text-danger"></i> by
                        <a href="http://www.themekita.com">ThemeKita</a>
                    </div>
                    <div>
                        Distributed by
                        <a target="_blank" href="https://themewagon.com/">ThemeWagon</a>.
                    </div> --}}
                </div>
            </footer>
        </div>
    </div>
</body>
 <!-- Include jQuery -->

<!--   Core JS Files   -->

<script src="{{ asset('business/assets/js/core/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('business/assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('business/assets/js/core/bootstrap.min.js') }}"></script>

<!-- jQuery Scrollbar -->
<script src="{{ asset('business/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

<!-- Chart JS -->
<script src="{{ asset('business/assets/js/plugin/chart.js/chart.min.js') }}"></script>

<!-- jQuery Sparkline -->
<script src="{{ asset('business/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

<!-- Chart Circle -->
<script src="{{ asset('business/assets/js/plugin/chart-circle/circles.min.js') }}"></script>

<!-- Datatables -->
<script src="{{ asset('business/assets/js/plugin/datatables/datatables.min.js') }}"></script>

<!-- Bootstrap Notify -->
<script src="{{ asset('business/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

<!-- jQuery Vector Maps -->
<script src="{{ asset('business/assets/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
<script src="{{ asset('business/assets/js/plugin/jsvectormap/world.js') }}"></script>

<!-- Sweet Alert -->
<script src="{{ asset('business/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

<!-- Kaiadmin JS -->
<script src="{{ asset('business/assets/js/kaiadmin.min.js') }}"></script>

<!-- Kaiadmin DEMO methods, don't include it in your project! -->
<script src="{{ asset('business/assets/js/setting-demo.js') }}"></script>
<script src="{{ asset('business/assets/js/demo.js') }}"></script>
 <!-- Include jQuery -->
 {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 <!-- Include DataTables JS -->
 <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script> --}}

 <script>
    $(document).ready(function() {
        $('#usersTable').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            lengthMenu: [10, 25, 50, 100],
            language: {
                search: "Search:",
                lengthMenu: "Show _MENU_ entries",
                info: "Showing _START_ to _END_ of _TOTAL_ entries",
                paginate: {
                    first: "First",
                    last: "Last",
                    next: "Next",
                    previous: "Previous",
                },
            },
        });

    });
</script>
 <!-- JavaScript to Handle Loader -->
     <!-- AJAX Navigation Script -->
     {{-- <script>
      $(document).ready(function() {
    // Initialize loader
    $('#pageLoader').hide();

    // Show content immediately on full page load
    $('#contentWrapper').show();

    // Handle navigation clicks
    $(document).on('click', 'a[href^="/"], a[href^="' + window.location.origin + '"]', function(e) {
        // Skip if it's a dropdown toggle, external link, or has a special class
        if ($(this).attr('data-bs-toggle') ||
            $(this).hasClass('no-ajax') ||
            (this.href.startsWith('http') && !this.href.includes(window.location.host))) {
            return;
        }

        e.preventDefault();
        loadContent(this.href);

        // Update browser history
        history.pushState(null, null, this.href);

        // Update active menu item if it's in the sidebar
        if ($(this).closest('.sidebar').length) {
            $('.sidebar .nav-item').removeClass('active');
            $(this).closest('.nav-item').addClass('active');
        }
    });

    // Handle back/forward navigation
    $(window).on('popstate', function() {
        loadContent(window.location.href);
    });

    // Function to load content via AJAX
    function loadContent(url) {
        $('#pageLoader').show();
        $('#contentWrapper').hide();

        $.ajax({
            url: url,
            type: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'text/html'
            },
            success: function(response) {
                try {
                    // Try to parse as JSON (if controller returns JSON)
                    const data = JSON.parse(response);
                    $('#contentWrapper').html(data.content);
                    document.title = data.title || document.title;
                } catch (e) {
                    // If not JSON, treat as HTML
                    const $response = $('<div>').html(response);
                    const newContent = $response.find('#contentWrapper').html();
                    const newTitle = $response.filter('title').text() ||
                                   $response.find('title').text() ||
                                   document.title;

                    $('#contentWrapper').html(newContent);
                    document.title = newTitle;
                }

                $('#pageLoader').hide();
                $('#contentWrapper').show();
                initializeScripts();
            },
            error: function(xhr) {
                console.error('Error loading content:', xhr);
                // Fallback to full page load if AJAX fails
                window.location.href = url;
            }
        });
    }

    // Function to reinitialize scripts for new content
    function initializeScripts() {
        // Reinitialize DataTables
        if ($.fn.DataTable) {
            $('.dataTable').each(function() {
                if ($.fn.DataTable.isDataTable(this)) {
                    $(this).DataTable().destroy();
                }

                $(this).DataTable({
                    paging: true,
                    searching: true,
                    ordering: true,
                    lengthMenu: [10, 25, 50, 100],
                    language: {
                        search: "Search:",
                        lengthMenu: "Show _MENU_ entries",
                        info: "Showing _START_ to _END_ of _TOTAL_ entries",
                        paginate: {
                            first: "First",
                            last: "Last",
                            next: "Next",
                            previous: "Previous",
                        },
                    },
                });
            });
        }

        // Initialize any custom scripts in the loaded content
        if (typeof initializePageScripts === 'function') {
            initializePageScripts();
        }
    }
});
    </script> --}}


    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const userId = {{ Auth::user()->id ?? 'null' }};
            if (!userId) return;

            // Initialize notification count
            updateNotificationCount();

            // Listen for new notifications
            Echo.private(`user.${userId}`)
                .listen('.ProductClicked', (data) => {
                    addNewNotification(data.notification);
                    updateNotificationCount();
                    playNotificationSound();
                });

            // Update counter when dropdown is opened
            document.getElementById('notifDropdown').addEventListener('shown.bs.dropdown', function() {
                document.getElementById('notificationBadge').textContent = '0';
                document.getElementById('notificationCount').textContent = '0';
            });

            function addNewNotification(notification) {
                const notificationList = document.getElementById('notificationList');
                const emptyNote = notificationList.querySelector('.empty-notifications');

                if (emptyNote) emptyNote.remove();

                const notificationTypes = {
                    'product-view': 'notif-primary'
                };

                const notificationHtml = `
                    <a href="${notification.url}">
                        <div class="notif-icon ${notificationTypes[notification.type] || 'notif-primary'}">
                            <i class="fa ${notification.icon}"></i>
                        </div>
                        <div class="notif-content">
                            <span class="block">${notification.title}: ${notification.message}</span>
                            <span class="time">${notification.time}</span>
                        </div>
                    </a>
                `;

                notificationList.insertAdjacentHTML('afterbegin', notificationHtml);
            }

            function updateNotificationCount() {
                fetch('/notifications/count')
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                    }
                    )
                    .then(data => {
                        document.getElementById('notificationBadge').textContent = data.count;
                        document.getElementById('notificationCount').textContent = data.count;
                    });
            }

            function playNotificationSound() {
                new Audio('/path/to/notification.mp3').play().catch(e => console.log(e));
            }
        });
    </script> --}}
    {{-- <script>
            document.addEventListener('DOMContentLoaded', function() {
            const userId = {{ Auth::id() ?? 'null' }};
            if (!userId) return;

            // Load notifications immediately
            fetchNotifications();

            // Check for new notifications every 5 seconds
            const notificationInterval = setInterval(fetchNotifications, 5000);

            // Mark as read when dropdown opens
            document.getElementById('notifDropdown')?.addEventListener('shown.bs.dropdown', function() {
                markNotificationsAsRead();
                document.getElementById('notificationBadge').textContent = '0';
                document.getElementById('notificationCount').textContent = '0';
            });

            async function fetchNotifications() {
                try {
                    const response = await fetch('/notifications/latest', {
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });

                    if (!response.ok) throw new Error('Network response was not ok');

                    const contentType = response.headers.get('content-type');
                    if (!contentType || !contentType.includes('application/json')) {
                        throw new Error('Response was not JSON');
                    }

                    const { notifications, count } = await response.json();
                    updateNotificationList(notifications);
                    updateNotificationCount(count);
                } catch (error) {
                    console.error('Error fetching notifications:', error);
                }
            }

            function updateNotificationList(notifications) {
                const notificationList = document.getElementById('notificationList');

                if (notifications.length === 0) {
                    notificationList.innerHTML = `
                        <div class="empty-notifications text-center py-3">
                            No new notifications
                        </div>
                    `;
                    return;
                }

                notificationList.innerHTML = notifications.map(notification => `
                    <a href="${notification.url}" class="${notification.read_at ? '' : 'unread'}">
                        <div class="notif-icon notif-${notification.type}">
                            <i class="fa ${notification.icon}"></i>
                        </div>
                        <div class="notif-content">
                            <span class="block">${notification.title}: ${notification.message}</span>
                            <span class="time">${notification.time}</span>
                        </div>
                    </a>
                `).join('');
            }

            function updateNotificationCount(count) {
                const badge = document.getElementById('notificationBadge');
                const counter = document.getElementById('notificationCount');

                if (count > 0) {
                    badge.textContent = count;
                    counter.textContent = count;
                    badge.style.display = 'block';
                    // playNotificationSound();
                } else {
                    badge.style.display = 'none';
                }
            }

            async function markNotificationsAsRead() {
                try {
                    await fetch('/notifications/mark-read', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        credentials: 'same-origin'
                    });
                } catch (error) {
                    console.error('Error marking notifications as read:', error);
                }
            }

        });
    </script> --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
                document.getElementById("pageLoader").style.display = "none";
                document.getElementById("contentWrapper").style.display = "block";
        });
        </script>
<script>
    $(document).ready(function () {
        // $('#multi-filter-products').DataTable({
        //     paging: true,
        //     searching: true,
        //     ordering: true,
        //     lengthMenu: [10, 25, 50, 100],
        //     language: {
        //         search: "Search:",
        //         lengthMenu: "Show _MENU_ entries",
        //         info: "Showing _START_ to _END_ of _TOTAL_ entries",
        //         paginate: {
        //             first: "First",
        //             last: "Last",
        //             next: "Next",
        //             previous: "Previous",
        //         },
        //     },
        // });
         $('#multi-filter-products').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("admin.products.index") }}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'image', name: 'image', orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'subcategory', name: 'subcategory.name' },
                { data: 'category_type', name: 'category_type' },
                { data: 'company_name', name: 'company.name' },
                { data: 'material', name: 'material' },
                { data: 'size', name: 'size' },
                { data: 'created_at', name: 'created_at' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false },
            ],
            language: {
                search: "Search:",
                lengthMenu: "Show _MENU_ entries",
                info: "Showing _START_ to _END_ of _TOTAL_ entries",
                paginate: {
                    first: "First",
                    last: "Last",
                    next: "Next",
                    previous: "Previous",
                },
            },
        });
        $('#multi-filter-inquiry').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            lengthMenu: [10, 25, 50, 100],
            language: {
                search: "Search:",
                lengthMenu: "Show _MENU_ entries",
                info: "Showing _START_ to _END_ of _TOTAL_ entries",
                paginate: {
                    first: "First",
                    last: "Last",
                    next: "Next",
                    previous: "Previous",
                },
            },
        });
    });
    $('#multi-filter-category').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                lengthMenu: [10, 25, 50, 100],
                language: {
                    search: "Search:",
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    paginate: {
                        first: "First",
                        last: "Last",
                        next: "Next",
                        previous: "Previous",
                    },
                },
            });
</script>
<script>
    $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#177dff",
        fillColor: "rgba(23, 125, 255, 0.14)",
    });

    $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#f3545d",
        fillColor: "rgba(243, 84, 93, .14)",
    });

    $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#ffa534",
        fillColor: "rgba(255, 165, 52, .14)",
    });
    $('#multi-filter-select').DataTable({
        paging: true,
        searching: true,
        ordering: true,
        lengthMenu: [5, 10, 25, 50],
        pageLength: 10,
    });
</script>

</body>

</html>
