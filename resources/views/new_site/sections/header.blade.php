<header class="header-us">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12 px-0">
                <div class="top-main-all-nav d-flex align-items-center">
                    <div class="logo text-center">
                        <a href="#">
                            <img src="{{ asset('assets/images/' . $settings->where('key','site_logo')->first()->value ?? 'Let your admin add value')}}"
                                 class="img-fluid d-none d-md-inline" style="height: 30px">
                            {{--                            <img src="images/logo4.png"--}}
                            {{--                                 class="img-fluid d-none d-md-inline" style="width: 350px">--}}
                            {{--                            <img src="images/logo3.png"--}}
                            {{--                                 class="img-fluid d-inline-block d-md-none">--}}
                            <h2>
                                نجد القمم للحلول التقنية
                            </h2>
                        </a>
                    </div>
                    <div class="main-nav-and sub-nav ml-auto">
                        <nav class="navbar navbar-expand-lg ">
                            <div class="nav-bar-adjustment">
                                <button class="navbar-toggler" type="button" id="menu-toggle-us">
                                    <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
                                </button>

                                <!-- Navbar links -->
                                <div class="" id="collapsibleNavbar">
                                    <div class="close-menu-bar" id="close-menu"><span>x</span></div>
                                    <ul class="navbar-nav ml-auto for-rtl-padding-ul">
                                        <!-- Logo -->
                                        <img src="https://www.my-technology.com/assets/front/img/logo2x.png"
                                             class="img-fluid d-inline-block d-lg-none">


                                        <li class="nav-item">
                                            <a class="nav-link text-uppercase  active "
                                               href="{{route('home')}}">
                                                الصفحة الرئيسية</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-uppercase  "
                                               href="{{route('about-us')}}">معلومات عنا</a>
                                        </li>
                                        <li class="nav-item show-hover-us-clas">
                                            <a class="nav-link text-uppercase services-drop ">خدماتنا
                                            </a>
                                            <!-- Our Services Section -->

                                            <section class="our-services">
                                                <div class="container">
                                                    <div class="row services-row">
                                                        @foreach($services as $service)
                                                            <div class="col-sm-6 cols">
                                                                <div class="service-card d-flex">
                                                                    <div class="icon-block">
                                                                        <a href="{{route('service',['id'=>$service->id])}}">
                                                                            <img style="height:100%;width:100%"
                                                                                src="{{asset('assets/images/' . $service->logo )}}"
                                                                                alt="no image">
                                                                        </a>
                                                                    </div>
                                                                    <div class="desc-block">
                                                                        <a href="https://www.my-technology.com/ar/services/1">
                                                                            <div class="title">
                                                                                {{$service->name}}
                                                                            </div>

                                                                            <div class="p-desc text-justify-us-cstm">
                                                                                {{$service->description}}
                                                                            </div>
                                                                        </a>
                                                                        <a href="{{route('service',['id'=>$service->id])}}"
                                                                           class="btn-text">لمعرفة المزيد<i
                                                                                class="fas fa-arrow-right"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </section>

                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link text-uppercase  "
                                               href="https://www.my-technology.com/ar/contact-us">اتصل بنا
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link text-uppercase" href="{{$settings->where('key','facebook')->first()->value ?? 'Let your admin add value'}}" target="_blank">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-uppercase" href="{{$settings->where('key','twitter')->first()->value ?? 'Let your admin add value'}}" target="_blank">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-uppercase" href="{{$settings->where('key','youtube')->first()->value ?? 'Let your admin add value'}}" target="_blank">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-uppercase" href="{{$settings->where('key','instagram')->first()->value ?? 'Let your admin add value'}}" target="_blank">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>

                                    </ul>

                                </div>

                            </div>


                        </nav>


                    </div>

                </div>
            </div>
        </div>

    </div>


</header>
