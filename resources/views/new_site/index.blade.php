@extends('new_site.site')
@section('welcome_page')

    <section>
        <div id="particles-js"
             style="background: radial-gradient(circle, rgba(0, 95, 225, 1) 0%, rgba(0, 95, 225, 1) 41%, rgba(0, 15, 168, 1) 87%)  !important;  background-size: 100% 100% !important;">
            <section class="panel">
                <div class="my-breadcrumb">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="inner-content-box-data">
                                    <h5 class="tittle-one">
                                        {{$settings->where('type','description')->first()->value ?? 'Let your admin add value'}}
                                    </h5>
                                    <div class="learn-more-btn">
                                        <a href="#" class="btn btn-primary ">لمعرفة
                                            المزيد</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>

@endsection
@section('services')

    <section class="about-slider-sec-us mt-5">

        <div class="container">

            <div class="row">

                <div class="col-md-12 px-0">

                    <!-- what we have -->


                    <div class="main-content-all-depeart">

                        <div class="what-we-do-slider" dir="ltr">
                            <?php $start = 1; ?>
                            @for($i = 0;$i< count($services);$i++)
                                <?php $service = $services[$i];
                                ?>
                                <div class="inner-depeart wow fadeInUp" data-wow-duration="{{$start . "s"}}"
                                     data-wow-delay="0s">
                                    <a href="{{route('service',['id'=>$service->id])}}">

                                        <div class="inner-depeart-content">

                                            <div class="img-clas-deperat">

                                                <img src="{{asset('assets/images/' . $service->logo )}}"
                                                     alt="coding"
                                                     class="img-fluid">

                                            </div>

                                            <h2> {{$service->name}}</h2>

                                            <p>
                                                {{$service->description}}
                                            </p>


                                        </div>

                                    </a>
                                </div>
                                <?php
                                $start += 0.2;
                                ?>
                            @endfor
                        </div>

                        <!-- end what we have -->

                    </div>

                </div>

            </div>
        </div>
    </section>

    {{--
        <section class="all-dep-des main-content-all-depeart text-center">

            @foreach($services as $service)
                <div class="inner-depeart  fadeInUp col-sm-3" data-wow-duration="1s" data-wow-delay="0s" style="display: inline-block !important">
                    <a href="{{route('service',['id'=>$service->id])}}">

                        <div class="inner-depeart-content">

                            <div class="img-clas-deperat">

                                <img src="{{ asset('site_assets/front/img/gray-bgs.jpg') }}" alt="coding"
                                     class="img-fluid">

                            </div>

                            <h2> {{$service->name}}</h2>

                            <p>
                                {{$service->description}}
                            </p>


                        </div>

                    </a>

                </div>

            @endforeach


        </section>
    --}}

@endsection

@section('servicesList')

    <!-- all deperments-area start -->
    <section>
        @foreach($services as $service)
            <div class="odd-class-main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 left-box-us wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0s">
                            <div class="hading-main-us-tech">
                                <div class="inner-head-tect  text-center">
                                    <h2>{{$service->name}} </h2>
                                </div>
                            </div>
                            <div class="content-web-dev-main">
                                <p class="">
                                    {{$service->description}}
                                </p>
                                <div class="discover-btn">
                                    <a href="{{route('service',['id'=>$service->id])}}" class="discover-anchor">اكتشف
                                        أكثر</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 right-box-us">
                            <div class="content-web-main-image wow fadeInRight" data-wow-duration="3s"
                                 data-wow-delay="0s">
                                <!-- <img class="img-fluid image-set-us" src="https://www.my-technology.com/images/timthumb.php?src=https://www.my-technology.com/uploads/pages/web-vect-1625565953.png&w=466&h=437&zc=1&q=95" alt="image"> -->
                                <img class="img-fluid image-set-us"
                                     src="{{asset('assets/images/' . $service->cover )}}" alt="image"
                                     loading="lazy">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </section>
@endsection
