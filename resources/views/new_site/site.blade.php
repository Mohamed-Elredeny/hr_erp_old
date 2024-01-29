<!doctype html>
<html lang="rtl" class="mt-frontend">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('site_assets/front/scss/animate.min.css')}}">
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.vscode-file://vscode-app/c:/Users/M%20Elredeny/AppData/Local/Programs/Microsoft%20VS%20Code/resources/app/out/vs/code/electron-sandbox/workbench/workbench.htmlcom/font-awesome/4.7.0/css/font-awesome.min.css"
          type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="{{ asset('site_assets/front/scss/main.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('site_assets/front/slick/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('site_assets/front/slick/slick.css')}}">
    <link rel="shortcut icon" href=" {{asset('site_assets/front/img/logo.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('site_assets/front/img/profileLogo.png')}}" type="image/x-icon">
    <title>{{ "dashboard->title" }} </title>

    <script src="{{ asset('site_assets//front/js/gtag.js')}}" defer async></script>
    <!-- End Google Tag Manager -->
    <style>

        .mt-frontend .wahtsapp-btn {
            display: none !important
        }

        .nav-link {
            color: white !important;
            background: rgb(0, 95, 225) !important
        }

        .nav-link:hover {
            background: white !important;
            color: rgb(0, 95, 225) !important
        }

        .btn-primary {
            background: white !important;
            color: rgb(0, 95, 225) !important
        }
        .link{
            color: rgb(0, 95, 225) !important
        }

    </style>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-NVGK1RYV8F"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', 'G-NVGK1RYV8F');
    </script>
    <!-- Meta Pixel Code -->
    <script>
        !function (f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function () {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '563547101531786');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=563547101531786&ev=PageView&noscript=1"/></noscript>
    <!-- End Meta Pixel Code -->
    <style>
        .mt-frontend .wahtsapp-btn {
            display: none !important
        }
    </style>
</head>

<body class="rtl">
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block text-center">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{ $message }}</strong>
    </div>
@endif
@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block text-center">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{ $message }}</strong>
    </div>
@endif

<!-- End Google Tag Manager (noscript) -->
@include('new_site.sections.header')
@yield('content')
@yield('welcome_page')
@yield('services')
@yield('servicesList')
@yield('consultations')
@yield('project_ideas')
@yield('footer')




<!-- end all depertments area -->

@include('new_site.sections.footer')


<div class="floating-links">
    <a href="https://wa.me/+971501121371?text=السلام عليكم" target="_blank">
        <span class="icon-text-mt">واتساب</span>
        <img src="https://www.my-technology.com/assets/front/img/whatapp-icon.svg" alt=""></a>

    <a href="tel:971037806677">
        <span class="icon-text-mt"> اتصل الان</span>
        <img src="https://www.my-technology.com/assets/front/img/phone-icon.svg" alt=""></a>
</div>

<script src="{{ asset('site_assets/front/js/jquery.min.js')}} "></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" defer async></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" defer async></script>
<script src="{{ asset('site_assets/front/js/particles.js') }}" defer async></script>
<script src="{{asset('site_assets/front/slick/slick.min.js')}}" defer async></script>

<script src=" {{ asset('site_assets//front/js/mytech.js')}} " defer async></script>

<script src=" {{ asset('site_assets/front/js/jquery.validate.js') }} "></script>


<script src="{{ asset('site_assets/front/js/app.blade.js') }} " defer async>

</script>


<!-- footer area start -->
<!-- end footer area -->
<script type="text/javascript">
</script>
</body>
</html>
