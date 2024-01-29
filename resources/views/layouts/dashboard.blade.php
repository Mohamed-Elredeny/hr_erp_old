<!doctype html>

<html lang="en" class="semi-dark">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- loader-->
    <link href="{{asset('assets/admin/en/css/pace.min.css')}}" rel="stylesheet"/>
    <script src="{{asset('assets/admin/en/js/pace.min.js')}}"></script>

    <!--plugins-->
    <link href="{{asset('assets/admin/en/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet')}}"/>
    <link href="{{asset('assets/admin/en/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/admin/en/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/admin/en/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/admin/en/plugins/OwlCarousel/css/owl.carousel.min.css')}}" rel="stylesheet"/>
@yield('pluginsStyle')


<!-- CSS Files -->
    <link href="{{asset('assets/admin/en/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/en/css/bootstrap-extended.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/en/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/en/css/icons.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">

    @yield('style')
    <style>
        .sidebar-wrapper .metismenu a {
            /*font-size: 20px;*/
        }
    </style>

    <title>hrplatformensrv</title>

</head>
<body>
<!--start wrapper-->
<div class="wrapper">
@yield('sidebar')

@yield('header')

@yield('content')





<!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top">
        <ion-icon name="arrow-up-outline"></ion-icon>
    </a>
    <!--End Back To Top Button-->

{{--@yield('switcher')--}}


<!--start overlay-->
    <div class="overlay nav-toggle-icon"></div>
    <!--end overlay-->
</div>

<!-- JS Files-->
<script src="{{asset('assets/admin/en/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/admin/en/plugins/simplebar/js/simplebar.min.js')}}"></script>
<script src="{{asset('assets/admin/en/plugins/metismenu/js/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/admin/en/js/bootstrap.bundle.min.js')}}"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<!--plugins-->
<script src="{{asset('assets/admin/en/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
@yield('pluginsScript')

<script src="{{asset('assets/admin/en/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/admin/en/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/admin/en/js/table-datatable.js')}}"></script>
<script src="{{asset('assets/admin/en/plugins/OwlCarousel/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/admin/en/plugins/OwlCarousel/js/owl.carousel2.thumbs.min.js')}}"></script>
<script src="{{asset('assets/admin/en/js/product-details.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
@yield('script')

<!-- Main JS-->
<script src="{{asset('assets/admin/en/js/main.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.exampleSelect').select2();
    });
</script>

<script>
    $(document).ready(function () {
        $('#editor').summernote({
            height: 300, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: true // set focus to editable area after initializing summernote
        });
    });
</script>

</body>
</html>
