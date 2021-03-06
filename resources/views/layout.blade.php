<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>نظام إدارة الجودة</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="Themesbrand" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset("assets/images/favicon.ico") }}">

    <!-- C3 Chart css -->
    <link href="{{ asset("assets/libs/c3/c3.min.css") }}" rel="stylesheet" type="text/css"/>

    <!-- Bootstrap Css -->
    <link href="{{ asset("assets/css/bootstrap.min.css") }}" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="{{ asset("assets/css/icons.min.css") }}" rel="stylesheet" type="text/css"/>
    @yield("styles")
    <!-- App Css-->
    <link href="{{ asset("assets/css/app-rtl.min.css") }}" id="app-style" rel="stylesheet" type="text/css"/>
</head>

<body data-sidebar="dark">
<!-- Loader -->
<div id="preloader">
    <div id="status">
        <div class="spinner"></div>
    </div>
</div>

<!-- Begin page -->
<div id="layout-wrapper">
    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="{{ route("types.index") }}" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="assets/images/logo.png" alt="" height="22">
                        </span>

                        <span class="logo-lg">
                            <img src="assets/images/logo-dark.png" alt="" height="17">
                        </span>
                    </a>

                    <a href="{{ route("documents.index") }}" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="assets/images/logo-light.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="assets/images/logo-light.png" alt="" height="36">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect"
                        id="vertical-menu-btn">
                    <i class="mdi mdi-menu"></i>
                </button>

            </div>

            <div class="d-flex">
                <div class="dropdown d-none d-lg-inline-block mr-2">
                    <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                        <i class="mdi mdi-fullscreen"></i>
                    </button>
                </div>


{{--                <div class="dropdown d-none d-md-block mr-2">--}}
{{--                    <a style="padding-top: 25px" class="btn header-item waves-effect" href="{{ route("logout") }}" >--}}
{{--                        <span>--}}
{{--                            تسجيل الخروج--}}
{{--                        </span>--}}
{{--                    </a>--}}
{{--                </div>--}}
            </div>
        </div>
    </header>

    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

        <div data-simplebar class="h-100">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="mdi mdi-email-outline"></i>
                            <span>الملفات</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route("documents.index") }}">الصفحة الرئيسية</a></li>
                            <li><a href="{{ route("documents.create") }}">إضافة ملف جديد</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="mdi mdi-email-outline"></i>
                            <span>المعايير</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route("categories.index") }}">الصفحة الرئيسية</a></li>
                            <li><a href="{{ route("categories.create") }}">إضافة معيار جديد</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="mdi mdi-email-outline"></i>
                            <span>الأقسام</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route("departments.index") }}">الصفحة الرئيسية</a></li>
                            <li><a href="{{ route("departments.create") }}">إضافة قسم جديد</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="mdi mdi-email-outline"></i>
                            <span>الفئات</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route("types.index") }}">الصفحة الرئيسية</a></li>
                            <li><a href="{{ route("types.create") }}">إضافة فئة جديدة</a></li>
                        </ul>
                    </li>


                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
    <!-- Left Sidebar End -->

    <!-- ======================== -->
    <!-- Start right Content here -->
    <!-- ======================== -->
    <div class="main-content">

        @yield("content")

    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<div class="right-bar">
    <div data-simplebar class="h-100">
        <div class="rightbar-title px-3 py-4">
            <a href="javascript:void(0);" class="right-bar-toggle float-right">
                <i class="mdi mdi-close noti-icon"></i>
            </a>
            <h5 class="m-0">Settings</h5>
        </div>


    </div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="{{ asset("assets/libs/jquery/jquery.min.js") }}"></script>
<script src="{{ asset("assets/libs/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
<script src="{{ asset("assets/libs/metismenu/metisMenu.min.js") }}"></script>
<script src="{{ asset("assets/libs/simplebar/simplebar.min.js") }}"></script>
<script src="{{ asset("assets/libs/node-waves/waves.min.js") }}"></script>

<script src="{{ asset("assets/libs/datatables.net/js/jquery.dataTables.min.js") }}"></script>
<script src="{{ asset("assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js") }}"></script>

<!-- Peity chart-->
<script src="{{ asset("assets/libs/peity/jquery.peity.min.js") }}"></script>

<!--C3 Chart-->
<script src="{{ asset("assets/libs/d3/d3.min.js") }}"></script>
<script src="{{ asset("assets/libs/c3/c3.min.js") }}"></script>

<script src="{{ asset("assets/libs/jquery-knob/jquery.knob.min.js") }}"></script>

@yield("scripts")
<script src="{{ asset("assets/js/app.js") }}"></script>

</body>
</html>

