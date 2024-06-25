<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themewagon.github.io/quixlab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Jun 2024 15:42:31 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Pignose Calender -->
    <link href="/assets/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="/assets/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="/assets/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="/assets/css/style.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3"
                    stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.html">
                    <b class="logo-abbr"><img src="/assets/images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="/assets/images/logo-compact.png" alt=""></span>
                    <span class="brand-title">
                        <img src="/assets/images/logo-text.png" alt="">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown d-none d-md-flex">
                            <p>{{ $user->email }}</p>
                        </li>
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="/assets/images/user/1.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="icon-user"></i>
                                                <span>Profile</span></a>
                                        </li>
                                        <li><a href="{{ route('logout') }}"><i class="icon-key"></i>
                                                <span>Logout</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('dashboard') }}">Home</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Apps</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-envelope menu-icon"></i> <span class="nav-text">Email</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="email-inbox.html">Inbox</a></li>
                            <li><a href="email-read.html">Read</a></li>
                            <li><a href="email-compose.html">Compose</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa-solid fa-truck"></i><span class="nav-text">Orders Detail</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="form-basic.html">Basic Form</a></li>
                            <li><a href="form-validation.html">Form Validation</a></li>
                            <li><a href="form-step.html">Step Form</a></li>
                            <li><a href="form-editor.html">Editor</a></li>
                            <li><a href="form-picker.html">Picker</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-users"></i><span class="nav-text">Account</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('showAccount') }}">accounts</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-newspaper"></i> <span class="nav-text">Blogs</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="chart-flot.html">Flot</a></li>
                            <li><a href="chart-morris.html">Morris</a></li>
                            <li><a href="chart-chartjs.html">Chartjs</a></li>
                            <li><a href="chart-chartist.html">Chartist</a></li>
                            <li><a href="chart-sparkline.html">Sparkline</a></li>
                            <li><a href="chart-peity.html">Peity</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-layers menu-icon"></i><span class="nav-text">Categories</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('ShowCategories') }}">Categories</a></li>
                            <li><a href="{{ route('ShowFormAddCategory') }}">Add catgories</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-shopping-cart"></i><span class="nav-text">Products</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('ShowProducts') }}" aria-expanded="false">Products </a></li>
                            <li><a href="{{ route('ShowFormAddProduct') }}" aria-expanded="false">Add product</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('admin.coupon') }}" class="">
                            Coupon
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            @yield('content')
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a>
                    2018</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{ url('') }}/assets/plugins/common/common.min.js"></script>
    <script src="{{ url('') }}/assets/js/custom.min.js"></script>
    <script src="{{ url('') }}/assets/js/settings.js"></script>
    <script src="{{ url('') }}/assets/js/gleek.js"></script>
    <script src="{{ url('') }}/assets/js/styleSwitcher.js"></script>
    <!-- Chartjs {{ url('') }}/assets/-->
    <script src="{{ url('') }}/assets/plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle p{{ url('') }}/assets/rogress -->
    <script src="{{ url('') }}/assets/plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap {{ url('') }}/assets/-->
    <script src="{{ url('') }}/assets/plugins/d3v3/index.js"></script>
    <script src="{{ url('') }}/assets/plugins/topojson/topojson.min.js"></script>
    <script src="{{ url('') }}/assets/plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs{{ url('') }}/assets/ -->
    <script src="{{ url('') }}/assets/plugins/raphael/raphael.min.js"></script>
    <script src="{{ url('') }}/assets/plugins/morris/morris.min.js"></script>
    <!-- Pignose {{ url('') }}/assets/Calender -->
    <script src="{{ url('') }}/assets/plugins/moment/moment.min.js"></script>
    <script src="{{ url('') }}/assets/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- Chartist{{ url('') }}/assets/JS -->
    <script src="{{ url('') }}/assets/plugins/chartist/js/chartist.min.js"></script>
    <script src="{{ url('') }}/assets/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>
    <script src="{{ url('') }}/assets/js/dashboard/dashboard-1.js"></script>

</body>

<!-- Mirrored from themewagon.github.io/quixlab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Jun 2024 15:43:06 GMT -->

</html>
