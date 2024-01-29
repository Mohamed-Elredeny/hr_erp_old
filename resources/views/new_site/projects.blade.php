@extends('new_site.site')

@section('content')

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
                                    <a href="#" class="btn btn-primary ">
                                        visit project
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section class="project-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s"
                     style="visibility: visible; animation-duration: 1s; animation-delay: 0s; animation-name: fadeInUp;">
                    <div class="project-banner">
                        <img
                            src="https://www.my-technology.com/images/timthumb.php?src=https://www.my-technology.com/uploads/pages/1-1659939119.png&w=1140&h=602&zc=1&q=95"
                            class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="project-detail">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="project-content">
                    </div>
                    <div class="project-heading text-center" style="direction:rtl">
                        How it works
                        <p style="box-sizing: border-box; margin: 1.5rem 0px 0px; font-size: 18px; color: #03002f; line-height: 2.4rem; border: 0px solid; font-family: FKGrotesk, Helvetica, Arial, sans-serif;">
                            {{$project->description}}
                        </p>

                    </div>
                </div>


                <div class="row clas-for-left-usess">
                </div>
            </div>
        </div>
    </section>
    <section class="project-detail">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0s"
                     style="visibility: visible; animation-duration: 1s; animation-delay: 0s; animation-name: fadeInUp;">
                    <div class="project-content">
                        <div class="detail-stats">
                            <div class="inner-box">
                                <p class="heading-top-ha">Client</p>
                                <p class="text-name">Hamad</p>
                            </div>
                            <div class="inner-box">
                                <p class="heading-top-ha">Date</p>
                                <p class="text-name"> May 27, 2022</p>
                            </div>
                            <div class="inner-box">
                                <p class="heading-top-ha">Services</p>
                                <p class="text-name">Online Malls</p>
                            </div>
                            <div class="inner-box">
                                <p class="heading-top-ha">Website</p>
                                <a href="https://onlinemallkw.com/en" target="_blank">
                                    <p class="text-name">https://onlinemallkw.com/en</p>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Our Latest Work Section -->
    <section class="our-work spacing us-new-sec-80">
        <div class="container">
            <div class="sec-title text-center">
                <h2 class="sec-headline">
                    Related Projects
                </h2>
            </div>
            <div class="row">
                <div class="col-md-12 px-0">
                    <div class="work-slider" dir="ltr">
                        <a href="https://www.my-technology.com/en/project-detail/11">
                            <div class="work-card">
                                <div class="card-img">
                                    <img src="https://www.my-technology.com/uploads/pages/My-Wealth-Keys-1626346028.jpg"
                                         alt="work-img" class="img-fluid work-img" loading="lazy">
                                </div>
                                <div class="card-desc text-center">
                                    <div class="title">
                                        My Wealth Keys
                                    </div>
                                    <div class="p-desc">
                                        My Wealth keys is a research, advisory &amp; business management company.
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="https://www.my-technology.com/en/project-detail/2">
                            <div class="work-card">
                                <div class="card-img">
                                    <img src="https://www.my-technology.com/uploads/pages/01-1626343454.png"
                                         alt="work-img" class="img-fluid work-img" loading="lazy">
                                </div>
                                <div class="card-desc text-center">
                                    <div class="title">
                                        LAYLLAM
                                    </div>
                                    <div class="p-desc">
                                        Layllam is the most trusted and safest online shopping website
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="https://www.my-technology.com/en/project-detail/3">
                            <div class="work-card">
                                <div class="card-img">
                                    <img src="https://www.my-technology.com/uploads/pages/Toyzee-1626338172.jpg"
                                         alt="work-img" class="img-fluid work-img" loading="lazy">
                                </div>
                                <div class="card-desc text-center">
                                    <div class="title">
                                        Toyzee
                                    </div>
                                    <div class="p-desc">
                                        Toyzee is the best place to buy toys &amp; gifts for your kids.
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="https://www.my-technology.com/en/project-detail/7">
                            <div class="work-card">
                                <div class="card-img">
                                    <img src="https://www.my-technology.com/uploads/pages/ltl-Rolls-1626344286.jpg"
                                         alt="work-img" class="img-fluid work-img" loading="lazy">
                                </div>
                                <div class="card-desc text-center">
                                    <div class="title">
                                        ltl. Rolls
                                    </div>
                                    <div class="p-desc">
                                        ltl. Rolls Is a movement. Simple in its offerings, intricate in its quality,
                                        significant in its presence.
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="https://www.my-technology.com/en/project-detail/10">
                            <div class="work-card">
                                <div class="card-img">
                                    <img src="https://www.my-technology.com/uploads/pages/UNICEPTS-1626345661.jpg"
                                         alt="work-img" class="img-fluid work-img" loading="lazy">
                                </div>
                                <div class="card-desc text-center">
                                    <div class="title">
                                        UNICEPTS
                                    </div>
                                    <div class="p-desc">
                                        UNICEPTS&#039;s goal is to advise hospitality &amp; F&amp;B companies on how to
                                        optimize investments.
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="https://www.my-technology.com/en/project-detail/24">
                            <div class="work-card">
                                <div class="card-img">
                                    <img src="https://www.my-technology.com/uploads/pages/Logo-1659937597.png"
                                         alt="work-img" class="img-fluid work-img" loading="lazy">
                                </div>
                                <div class="card-desc text-center">
                                    <div class="title">
                                        Dukkan
                                    </div>
                                    <div class="p-desc">
                                        Online Grocer
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="https://www.my-technology.com/en/project-detail/25">
                            <div class="work-card">
                                <div class="card-img">
                                    <img src="https://www.my-technology.com/uploads/pages/Logo-1659938401.png"
                                         alt="work-img" class="img-fluid work-img" loading="lazy">
                                </div>
                                <div class="card-desc text-center">
                                    <div class="title">
                                        IYacht
                                    </div>
                                    <div class="p-desc">
                                        Yacht owners can list their yachts for charter
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
