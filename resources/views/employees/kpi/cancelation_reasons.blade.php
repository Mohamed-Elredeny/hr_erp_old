@extends('layouts.site')
@section('content')
<style>
    .lead, .lead a{
        color:#19307a !important;
        font-size:2rem;
        font-weight:600;
    }
    .lead a:hover{
        color:white !important;
    }
</style>
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
                        <p class="lead">
                            <a class="" href="{{route('employee.dashboard')}}">Home / </a> 
                            <a class="" href="#">Staff Performance Review </a>
                        </p>
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
        <div class="container text-center">
            <div class="text-left">
                <a href="{{route('employee.dashboard')}}" style="font-size:28px;color:#3a54a8"><i class="fa fa-angle-double-left"></i> Back</a>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block text-left">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block text-left">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <div class="section-heading text-center mb-5">
                        <h2 style="color: #3a54a8">Cancelation Reasons</h2>
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
                .table-bordered td, .table-bordered th {
                    border: 1px solid #3a54a8;
                }
                .form-control {
                    border-color: #3a54a8;
                    padding: 0.975rem 0.85rem;
                }
                .btn-danger {
                    box-shadow: 0 5px 12px 0 #dc354563;
                    background: #dc3545;
                    border: 2px solid #dc3545;
                    border-radius: 30px;
                    margin-top: 5px;
                    color:white !important;
                }
                .btn-success {
                    /*box-shadow: 0 5px 12px 0 #dc354563;*/
                    border: 2px solid ;
                    border-radius: 30px;
                    margin-top: 5px;
                    color:white !important;
                }
            </style>

            <div class="row g-4 justify-content-center equal text-justify">
                <div class="col-12">
                    <table id="" class="table table-bordered dt-responsive nowrap text-left"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%; border: 5px solid #3a54a8">
                        <tr style="background-color: #3a54a8; color: white; font-weight: bold; text-align:center">
                            <td style="color: #fff" class="font-weight-bold">Name</td>
                            <td style="color: #fff" class="font-weight-bold">Reason</td>
                            <td style="color: #fff" class="font-weight-bold">Other Reasons: (Specify)</td>
                            <td style="color: #fff" class="font-weight-bold">Date</td>
                            <td style="color: #fff" class="font-weight-bold">Type</td>
                        </tr>
                            @foreach($cancelationReasons as $cancelationReason)
                                <tr>
                                    <td>{{$cancelationReason->employee->empName}}</td>
                                    <td>{{$cancelationReason->reason}}</td>
                                    <td>{{$cancelationReason->specify}}</td>
                                    <td>{{$cancelationReason->date}}</td>
                                    <td>{{$cancelationReason->type}}</td>
                                </tr>
                            @endforeach
                    </table>


                    <p class="form-message"></p>
                </div>
            </div>
        </div>
    </section>

    <!--promo section end-->


    <div id="deleteModel"></div>
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
@section('script')

@endsection
