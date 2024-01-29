@extends('layouts.site')
@section('content')
    <style>
        h5{
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
                            <img class="img-fluid d-block" src="{{asset("assets/images")}}/{{$employee->company->image}}" style="height: 120px; margin: auto; border-radius: 5%;">
                        @elseif($employee->company_id == 2)
                            <img class="img-fluid d-block" src="{{asset("assets/images")}}/{{$employee->company->image}}" style="height: 80px; margin: auto; border-radius: 5%;">
                        @elseif($employee->company_id == 3)
                            <img class="img-fluid d-block" src="{{asset("assets/images")}}/{{$employee->company->image}}" style="height: 80px; margin: auto; border-radius: 5%;">
                        @endif
                        <div class="">
                            <div class="medsm row align-items-left justify-content-between">
                                <div class="col-md-12 col-lg-12 text-left">
                                    <a href="{{route('employee.certificate.index')}}" style="font-size:28px;color:#3a54a8"><i class="fa fa-angle-double-left"></i> Back</a>

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
                                    <h5 class="mt-5 font-weight-bold">Welcome to <img class="img-fluid d-inline" style="width: 80px; margin-top: -7px" src="{{asset("assets/images/hr360.png")}}"> Platform</h5>
                                    <p>Your One-Stop HR Solutions</p>
                                </div>

                                <div class="col-md-12 col-lg-12 text-left">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <h4 class="font-weight-bold mt-5 mb-5">Request Certificate <small style="font-size: 14px"></small></h4>

                                            <div class="text-left mb-5">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h3 class="text-center" style="color: #3a54a8">Certificates</h3>
                                                        <table id="" class="table table-bordered dt-responsive nowrap text-center"
                                                               style="border-collapse: collapse; border-spacing: 0; width: 100%; border: 5px solid #3a54a8">
                                                            <tr>
                                                                <td style="" class="font-weight-bold" >Employee Name</td>
                                                                <td style="" class="font-weight-bold" >Type</td>
                                                                <td class="font-weight-bold">Employee Remark</td>
                                                                <td style="" class="font-weight-bold">Date</td>
                                                                <td style="" class="font-weight-bold">State</td>
                                                                <td style="" class="font-weight-bold">Control</td>
                                                            </tr>
                                                            @foreach($certificates as $certificate)
                                                                <tr class="text-left">
{{--                                                                    {{dd($certificate->employee->empName)}}--}}
                                                                    <td style="">{{$certificate->employee->empName}}</td>
                                                                    <td style="">{{$certificate->type}}</td>
                                                                    <td>{{$certificate->remark}}</td>
                                                                    <td>{{$certificate->date_submit}}</td>
                                                                    <td>
                                                                        @if($certificate->state=='0')
                                                                            Pending
                                                                        @elseif($certificate->state=='11')
                                                                            Reviewed and request approval
                                                                        @elseif($certificate->state=='10')
                                                                            Reviewer rejected
                                                                        @elseif($certificate->state=='21')
                                                                            Approved
                                                                        @elseif($certificate->state=='20')
                                                                            Rejected
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <a href="{{route('employee.certificate.show',['id'=>$certificate->id])}}" class="btn solid-btn pt-1 pb-1" @if($certificate->state=='10' || $certificate->state=='20') style="background-color: #dc3545; border: #dc3545; box-shadow: none;" @elseif($certificate->state=='21')  style="background-color: #1e7e34; border: #1e7e34; box-shadow: none;" @else style="box-shadow: none;" @endif>
                                                                            Show
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </table>
                                                    </div>
                                                </div>
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
@section('script')
@endsection
