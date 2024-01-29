@extends('layouts.site')
@section('content')
    <!--hero section start-->
    <section class="hero-section  background-img"
             style="background: url('{{asset("assets/site/img/hero-bg-1.jpg")}}')no-repeat center center / cover">
        <div class="container">
            <div class="row align-items-center justify-content-between py-5">
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="hero-content-left text-white">
                        <h1 class="text-white fw-bold">
                            KPI
                        </h1>
                        <h4 class="lead" style="font-size: x-large">
                            <a class="text-light" href="{{route('employee.dashboard')}}">Home / </a> Staff Performance Review
                        </h4>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="hero-animation-img text-right" >
                        @if($employee->company_id == 1)
                        <img src="{{asset("assets/images")}}/{{$employee->company->image}}" style="height: 130px; width: 130px; border-radius: 50%">
                        @elseif($employee->company_id == 2)
                        <img src="{{asset("assets/images")}}/{{$employee->company->image}}" style="height: 130px; width: 200px; border-radius: 5%">
                        @elseif($employee->company_id == 3)
                        <img src="{{asset("assets/images")}}/{{$employee->company->image}}" style="height: 100px; width: 230px; border-radius: 5%">
                        @endif
                        <!--                        <img src="img/111.png" alt="wave shape" class="img-fluid">-->
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-img-absolute" dir="rtl">
            <!--            <img src="img/111.png" style="height: 100px; width: 100px;">-->
        </div>
    </section>
    <!--hero section end-->

    <!--promo section start-->
    <section class="promo-section pt-100 ">
        <div class="container text-center" style="max-width: 85vw;">
            <div class="text-left">
                <a href="{{route('employee.dashboard')}}" style="font-size:28px;color:#3a54a8"><i class="fa fa-angle-double-left"></i> Back</a>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-heading text-center mb-5">
                        <h2 style="color: #3a54a8">STAFF PERFORMANCE REVIEW</h2>
                    </div>
                </div>
            </div>
            <style>
            td{
            /* width: 14.28%; */
            }
            b{
                font-weight: 700;
            }
            .table-bordered td, .table-bordered th, .table thead th {
                border: 1px solid #3a54a8;
            }
            .form-control {
                border-color: #3a54a8;
                padding: 0.975rem 0.85rem;
            }
            </style>

            <div class="row g-4 justify-content-center equal text-justify">
                <div class="col-12">
                    <table id="" class="table table-bordered dt-responsive nowrap text-left"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%; border: 5px solid #3a54a8">
                        <tr>
                            <td class="font-weight-bold">Emp #</td>
                            <td>{{$employee->empCode}}</td>
                            <td class="font-weight-bold">Date of joining</td>
                            <td>{{$employee->joiningDate}}</td>
                            <td class="font-weight-bold">Total years of experience</td>
                            <td><?php
                            $date1 = new DateTime();
                            $date2 = new DateTime($employee->joiningDate);
                            $interval = $date1->diff($date2);
                            echo $interval->y . " years, " . $interval->m." months" ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 13.5%;" class="font-weight-bold" >Employee Name:</td>
                            <td style="width: 13%;">{{$employee->empName}}</td>
                            <td style="width: 14%;" class="font-weight-bold">Position Title:</td>
                            <td style="width: 14.28%;">{{$employee->designation}}</td>
                            <td style="" class="font-weight-bold">Department/Project:</td>
                            <td>{{$employee->projectDepartmentName}}</td>
                            <td style="width: 13%;" class="font-weight-bold">Period:</td>
                            <td colspan="2">2023</td>
                        </tr>
                    </table>
                    <div class="mt-3" style="border-radius: 10%; background-size: 100% 100%">
                        <div class="p-5" style="">
                            <div>
                            <h4 style="color: #3a54a8" class="font-weight-bold">1.	Key Objectives </h4>
                            <p>Please list your Key Objectives which have been agreed with your Manager.  Your Key Objectives are the main priorities of your role and the specific results and targets expected to be achieved during the reporting period.  These Objectives should be based on the SMART principles listed below.  By specifying your Key Objectives in this way, you will be able to think through and detail the results necessary to achieve them. </p>
                            <h6 style="" class="font-weight-bold">SMART Principles</h6>

                            <div class="row">
                                <div class="col-3">
                                    <span style="" class="font-weight-bold">S</span>pecific
                                </div>
                                <div class="col-9">
                                    Well Defined Objectives.
                                </div>
                                <div class="col-3">
                                    <span style="" class="font-weight-bold">M</span>easurable
                                </div>
                                <div class="col-9">
                                    Define how you will measure what you have achieved.
                                </div>
                                <div class="col-3">
                                    <span style="" class="font-weight-bold">A</span>chievable
                                </div>
                                <div class="col-9">
                                    Make sure you have the means and time needed to achieve the objective.
                                </div>
                                <div class="col-3">
                                    <span style="" class="font-weight-bold">R</span>elevant
                                </div>
                                <div class="col-9">
                                    Make sure the objective is relevant to the job you do.
                                </div>
                                <div class="col-3">
                                    <span style="" class="font-weight-bold">T</span>ime-related
                                </div>
                                <div class="col-9">
                                    Allocate a timeframe when the objective will be completed. This may span more than one quarter but should not be longer than one year.
                                </div>
                            </div>
                            <div class="mt-2 ml-5">
                            <h6 class="font-weight-bold" style="">Objectives should cover our Company Values including:</h6>

                            <p class="mb-0">
                                <b>Safety</b> - Incident & Injury Free Environment
                            </p>
                            <p class="mb-0">
                                <b>Quality</b> - We do the right job from the first time
                            </p>
                            <p class="mb-0">
                                <b>Team Work</b> – Supporting Each Other
                            </p>
                            <p class="mb-0">
                                <b>People</b> – We inspire our People to be the Best
                            </p>
                            <p class="mb-0">
                                <b>Financial</b> - Outstanding Financial Performance
                            </p>
                            <p>
                                <b>Relationships</b> – Committed to Build and Maintain Long Term Relationships with our Clients
                            </p>
                        </div>
                    </div>
                    <div>
                        <h4 style="color: #3a54a8" class="font-weight-bold mt-5">2.	Review </h4>
                        <p>
                            At the completion of the reporting period, you and your Manager are in a position to evaluate how you actually performed against your agreed Key Objectives, the expected results and target dates.  Please rate your performance according to the Rating Guide below.  Once you have completed your rating, please forward this form to your Manager for him to complete.  Your Manager will then organize a time with you to meet and discuss your Review.
                        </p>
                        <table id="" class="table table-bordered dt-responsive nowrap text-left"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                              <tr style="background-color: #3a54a8; color: white">
                                <th></th>
                                <th style="" class="font-weight-bold">Description</th>
                                <th style="" class="font-weight-bold">Guide</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class="font-weight-bold">A</td>
                                <td>Very Good (91-99)</td>
                                <td><b> Excellent performance.</b> Achievements are considered exemplary.</td>
                              </tr>
                              <tr>
                                <td class="font-weight-bold">B</td>
                                <td>Good (71-90) </td>
                                <td><b>Performance exceeds expectations.</b> Frequently achieves superior results.</td>
                              </tr>
                              <tr>
                                <td class="font-weight-bold">C</td>
                                <td>Average (51-70)</td>
                                <td> <b>Performance meets job requirements</b> and barely provides expected results.</td>
                              </tr>
                              <tr>
                                <td class="font-weight-bold">D</td>
                                <td>Below Average (21-50) </td>
                                <td><b>Performance do not meet job requirements</b> and improvements must be made in some areas.</td>
                              </tr>
                              <tr>
                                <td class="font-weight-bold">E</td>
                                <td>Unsatisfactory (0-20)</td>
                                <td> <b>Performance is not up to the company standard</b> and corrective action needs to be taken immediately.</td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                    </div>
                    </div>

                    <div class="text-center mb-5">
                        @if($kpi==0)
                            <a href="{{route('employee.kpi')}}" class="btn mart-btn pt-4 text-center" style="width: 250px !important;">
                                Send KPI
                            </a>
                        @else
                            <a href="{{route('employee.show_kpi')}}" class="btn mart-btn pt-4 text-center" style="width: 250px !important;">
                                Show Your KPI
                            </a>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </section>


@endsection

@section('footer')
    <!--footer section start-->
    <footer class="footer-section">
        <!--footer top start-->
        <div class="footer-top background-img-2">

            <!--footer bottom copyright start-->
            <div class="footer-bottom border-gray-light py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="copyright-wrap small-text">
                                <p class="mb-0 text-white">© Mohamed Mahrous, All rights reserved</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--footer bottom copyright end-->
        </div>
        <!--footer top end-->
    </footer>
    <!--footer section end-->
@endsection

