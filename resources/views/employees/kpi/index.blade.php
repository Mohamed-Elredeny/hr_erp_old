@extends('layouts.site')
@section('content')
    <style>
        h5 {
            color: black !important;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--our video promo section start-->
    <section class="video-promo pt-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="video-promo-content text-center">
                        @if($employee->company_id == 1)
                            <img class="img-fluid d-block"
                                 src="{{asset("assets/images")}}/{{$employee->company->image}}"
                                 style="height: 120px; margin: auto; border-radius: 5%;">
                        @elseif($employee->company_id == 2)
                            <img class="img-fluid d-block"
                                 src="{{asset("assets/images")}}/{{$employee->company->image}}"
                                 style="height: 80px; margin: auto; border-radius: 5%;">
                        @elseif($employee->company_id == 3)
                            <img class="img-fluid d-block"
                                 src="{{asset("assets/images")}}/{{$employee->company->image}}"
                                 style="height: 80px; margin: auto; border-radius: 5%;">
                        @endif
                        <div class="">
                            <div class="medsm row align-items-left justify-content-between">
                                <a href="{{route('employee.home')}}" style="font-size:28px;color:#3a54a8"><i
                                        class="fa fa-angle-double-left"></i> Back</a>
                                <div class="col-md-12 col-lg-12 text-left">
                                    @if ($message = Session::get('error'))
                                        <div class="alert alert-danger alert-block text-left">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endif
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success alert-block text-left">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endif
                                    <h5 class="mt-5 font-weight-bold">Welcome to <img class="img-fluid d-inline"
                                                                                      style="width: 80px; margin-top: -7px"
                                                                                      src="{{asset("assets/images/hr360.png")}}">
                                        Platform</h5>
                                    <p>Your One-Stop HR Solutions</p>
                                </div>

                                <div class="col-md-12 col-lg-12 text-left">
                                    <div class="row">
                                        <div class="col-md-6">

                                            <h4 class="font-weight-bold mt-5 mb-5">KPI <small
                                                    style="font-size: 14px"><sub>Your road to goal’s
                                                        achievement</sub></small></h4>
                                            <h6>
                                                Dear {{$employee->empName}},
                                            </h6>
                                            <p>
                                                Please complete your KPI Digi Form to evaluate your performance.
                                            </p>
                                            <div class="text-left text-white">
                                                <div class="row">
                                                    @if ($employee->empCode == 5473 || $employee->empCode == 6335 || $employee->empCode == 6398 || $employee->empCode == 101121)
                                                        <div class="col-md-4">
                                                            <a href="{{route('employee.kpi.dashboard')}}"
                                                               class="btn mart-btn d-block p-4 mt-3 font-weight-bold">Dashboard</a>
                                                        </div>
                                                    @endif
                                                    <div class="col-md-4">
                                                        <a href="{{route('employee.kpi.policy')}}"
                                                           class="btn mart-btn d-block p-4 mt-3 font-weight-bold">KPI
                                                            Guidelines</a>
                                                    </div>

                                                    @if($kpi==0)
                                                        <div class="col-md-4">
                                                            <a href="{{route('employee.kpi')}}"
                                                               class="btn mart-btn d-block p-4 mt-3 font-weight-bold">KPI
                                                                Form</a>
                                                        </div>
                                                    @else
                                                        @if($kip_updateable > 0)
                                                                <div class="col-md-4">
                                                                    <a href="{{route('employee.editKpi',['id'=>$employee->kpi->id])}}"
                                                                       class="btn mart-btn d-block p-4 mt-3 font-weight-bold">Update
                                                                        Your KPI</a>
                                                                </div>
                                                        @endif
                                                        <div class="col-md-4">
                                                            <a href="{{route('employee.show_kpi')}}"
                                                               class="btn mart-btn d-block p-4 mt-3 font-weight-bold">Show
                                                                Your KPI</a>
                                                        </div>
                                                    @endif
                                                    @if($firstApprovalAll>0)
                                                        <div class="col-md-4">
                                                            <a href="{{route('employee.first_approval')}}"
                                                               class="btn mart-btn d-block p-4 mt-3 font-weight-bold">KPI
                                                                First Approval <span style="font-weight: bold">( {{$firstApproval}} )</span></a>
                                                        </div>
                                                    @endif
                                                    @if($finalApprovalAll>0)
                                                        <div class="col-md-4">
                                                            <a href="{{route('employee.final_approval')}}"
                                                               class="btn mart-btn d-block p-4 mt-3 font-weight-bold">KPI
                                                                Final Approval <span style="font-weight: bold">( {{$finalApproval}} )</span></a>
                                                        </div>
                                                    @endif
                                                    @if($cancelationReasons>0)
                                                        <div class="col-md-4">
                                                            <a href="{{route('employee.kpi.show_cancelation_reasons')}}"
                                                               class="btn mart-btn d-block p-4 mt-3 font-weight-bold">Cancelation
                                                                Reasons</a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <img class="img-fluid d-block" src="{{asset("assets/images/goal.jpg")}}"
                                                 style="height: 300px; margin: auto; border-radius: 5%;">
                                        </div>
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
