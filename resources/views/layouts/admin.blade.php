<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>اي تكنولوجي</title>
        <meta name="_token" content="{{csrf_token()}}" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @yield('styleChart')
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/site/img/favicon.ico')}}">
    <!-- Bootstrap Css -->
    <link href="{{asset("assets/admin/css/bootstrap.min.css")}}" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="{{asset("assets/admin/css/icons.min.css")}}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    @yield("style")

    <link href="{{asset("assets/admin/css/app-rtl.css")}}" rel="stylesheet" type="text/css"/>

</head>

<body data-sidebar="dark">

<!-- Loader -->
{{--<div id="preloader">--}}
{{--    <div id="status">--}}
{{--        <div class="spinner"></div>--}}
{{--    </div>--}}
{{--</div>--}}

<!-- Begin page -->
<div id="layout-wrapper">
    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box pt-4">
                    <a href="#" class="logo logo-light">
{{--                        <span class="logo-sm">--}}
{{--                             <img src="{{ asset('assets/site/img/core-img/logo1.png') }}" alt="" height="22">--}}
{{--                        </span>--}}
{{--                        <span class="logo-lg m-2">--}}
{{--                             <img src="{{ asset('assets/site/img/core-img/logo1.png') }}" alt="" height="70">--}}
{{--                        </span>--}}
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                    <i class="mdi mdi-menu"></i>
                </button>

                <div class="d-none d-sm-block m-2">
                    <h2 class="page-title">@yield('pageTitle')</h2>
                </div>
            </div>

            <div class="d-flex">
                <a class=" text-dark" href="#">
                    {{-- <i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> --}}
                    <form action="{{route('logout')}}" method="post">
                        @csrf

                        <input type="submit" value="تسجيل الخروج" class="btn btn-danger">
                    </form>
                </a>

            </div>
        </div>
    </header>

    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">
        <div data-simplebar class="h-100">
            @include('admin.sections')
        </div>
    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->

    @if($errors->any())
        <center><div class="col-sm-12 btn btn-success">{{ implode('', $errors->all()) }}</div></center>
    @endif

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    @yield("content")

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">

                    </div>
                </div>
            </footer>
        </div>

    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- JAVASCRIPT -->

<script src="{{asset("assets/admin/libs/jquery/jquery.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/metismenu/metisMenu.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/simplebar/simplebar.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/node-waves/waves.min.js")}}"></script>
@yield("script")
</body>
</html>
