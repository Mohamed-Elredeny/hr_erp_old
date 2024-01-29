@extends('layouts.site')
@section('content')
    <!--our video promo section start-->
    <section class="video-promo ptb-60 background-img"
             style="background: url('img/hero-bg-1.jpg')no-repeat center center / cover">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="video-promo-content mt-4 text-center">
                        <a href="https://www.youtube.com/watch?v=9No-FiEInLA"
                           class="popup-youtube video-play-icon d-inline-block">
                            <img class="img-fluid d-block animation-one" src="{{asset("assets/images/logo.png")}}">
                        </a>
                        <!--hero section start-->
                        <div class="circles">
                            <div class="point animated-point-1"></div>
                            <div class="point animated-point-2"></div>
                            <div class="point animated-point-3"></div>
                            <div class="point animated-point-4"></div>
                            <div class="point animated-point-5"></div>
                            <div class="point animated-point-6"></div>
                            <div class="point animated-point-7"></div>
                            <div class="point animated-point-8"></div>
                            <div class="point animated-point-9"></div>
                        </div>
                        <div class="">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-md-6 col-lg-6">
                                    <div class="hero-content-left ptb-100 text-white">
                                        <h1 class="text-white font-weight-bold">Welcome To MEDGULF</h1>
                                        @if ($message = Session::get('error'))
                                            <div class="alert alert-danger alert-block text-left">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @endif

                                        <a href="{{route('login')}}">
                                            <img class="img-fluid animation-one m-2" style="width: 250px; height: 200px; border-radius: 65px" src="{{asset("assets/site/img/kpi.jpeg")}}"
                                                 alt="animation image">
                                        </a>

                                        <img class="img-fluid  animation-one m-2" style="width: 250px; height: 200px; border-radius: 65px"
                                             src="{{asset("assets/site/img/csr1.jpeg")}}" alt="animation image">
                                        <img class="img-fluid d-none d-lg-block animation-one m-auto" style="width: 400px; height: 220px; border-radius: 35px"
                                             src="{{asset("assets/site/img/leave.jpeg")}}" alt="animation image">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-5">
                                    <div class="hero-animation-img">
                                        <img class="img-fluid d-block animation-one" src="{{asset("assets/site/img/hero-animation-04.svg")}}"
                                             alt="animation image">
                                        <img class="img-fluid d-none d-lg-block animation-two"
                                             src="{{asset("assets/site/img/hero-animation-01.svg")}}" alt="animation image" width="120">
                                        <img class="img-fluid d-none d-lg-block animation-three"
                                             src="{{asset("assets/site/img/hero-animation-02.svg")}}" alt="animation image" width="120">
                                        <img class="img-fluid d-none d-lg-block animation-four" src="{{asset("assets/site/img/hero-animation-03.svg")}}"
                                             alt="animation image" width="230">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--hero section end-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--our video promo section end-->
@endsection
