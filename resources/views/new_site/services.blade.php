@extends('new_site.site')

@section('content')
    <br>
    <br>

    <section class="web-design">
        <div class="container">
            <div class="content-box-main  wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-img">
                            <img style="height:100%;width:100%"
                                 src="{{asset('assets/images/' . $service->cover )}}"
                                 alt="web-design" class="img-fluid service-lg-img">
                        </div>
                        <div class="desc text-center">
                            <div class="desc text-center">
                                <p class="p-desc">
                                    {{$service->description}}
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gry pt-70 pb-80">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s"
                     style="visibility: visible; animation-duration: 1s; animation-delay: 0s; animation-name: fadeInUp;">
                    <div class="project-content">
                        <div class="project-heading ctm-head-marg-us">
                            كيف نقوم بذلك؟
                        </div>
                        <div class="we-do-it-box mx-auto" dir="ltr">
                            @foreach($service->steps as $step)
                                <div class="card-do-it d-flex align-items-center">
                                    <div class="do-it-img">
                                        <img src="{{asset('assets/images/' . $step->logo )}}" class="img-fluid">
                                    </div>
                                    <div class="do-it-detail w-100 d-flex align-items-center">
                                        <div class="inner-box-des">
                                            <div class="title-it">{{$step->name }}</div>
                                            <div class="des">
                                                <div class="des">{{$step->description}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <section class="project-detail cstm-80-mag-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s"
                     style="visibility: visible; animation-duration: 1s; animation-delay: 0s; animation-name: fadeInUp;">
                    <div class="project-content">
                        <div class="project-heading ctm-head-marg-us">
                            الحلول المطورة
                        </div>
                        <div class="project-description">
                            {{$step->new_solutions ?? '' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="our-work spacing">
        <div class="container wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
            <div class="sec-title text-center">
                <h2 class="sec-headline">
                    اخر المشاريع
                </h2>
            </div>
            <div class="row">
                <div class="col-md-12 px-0">
                    <div class="work-slider" dir="ltr">
                        @foreach($service->projects() as $project)

                            <div>
                                <div class="work-card">
                                    <a class="card-img" href="{{route('project',['id'=>$project->id])}}">
                                        <img
                                            src="{{asset('assets/images/' . $step->logo )}}"
                                            alt="work-img" class="img-fluid work-img" loading="lazy">
                                    </a>
                                    <div class="card-desc text-center">
                                        <div class="title">
                                            {{$project->name}}
                                        </div>

                                        <div class="p-desc">
                                            {{$project->description}}

                                        </div>
                                        <a class="p-desc" href="{{$project->url}}">
                                            Visit Project
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

















