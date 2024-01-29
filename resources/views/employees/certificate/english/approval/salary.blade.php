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
                                    <div class="container">
                                        <table id="" class="table table-bordered dt-responsive nowrap text-left"
                                                           style="border-collapse: collapse; border-spacing: 0; width: 100%; border: 5px solid #3a54a8">
                                                        <tr>
                                                            <td class="font-weight-bold">Emp #</td>
                                                            <td>{{$employee->empCode}}</td>
                                                            <td class="font-weight-bold">Date of Joining</td>
                                                            <td>{{$employee->joiningDate}}</td>
                                                            <td class="font-weight-bold">Total years in company</td>
                                                            <td><?php
                                                            $date1 = new DateTime();
                                                            $date2 = new DateTime($employee->joiningDate);
                                                            $interval = $date1->diff($date2);
                                                            echo $interval->y . " years, " . $interval->m." months" ?>
                                                            </td>
                                                            <td class="font-weight-bold">Project Number</td>
                                                    <td>{{$employee->projectDepartmentNumber}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width: 13.5%;" class="font-weight-bold" >Employee Name:</td>
                                                            <td style="width: 13%;">{{$employee->empName}}</td>
                                                            <td style="width: 13%;" class="font-weight-bold">Position / Title:</td>
                                                            <td style="width: 13.28%;">{{$employee->designation}}</td>
                                                            <td class="font-weight-bold">Department/Project:</td>
                                                            <td>{{$employee->projectDepartmentName}}</td>
                                                            <td style="width: 11%;" class="font-weight-bold">Year of evaluation:</td>
                                                            <td colspan="2">2023</td>
                                                        </tr>
                                                       
                                                    </table>
                                    </div>
                                </div>
                                <form action="{{route('employee.certificate.approval.confirm')}}" method="POST" class=""  id="myForm"  enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$certificate->id}}" required>
                                    <div class="col-md-12 col-lg-12 text-left">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="font-weight-bold mt-5 mb-5">Request Certificate <small style="font-size: 14px"></small></h4>
                                            <h4 class="text-center" style="color: #3a54a8">{{$certificate->type}} Certificate</h4>
                                            <div class="row container">
                                                <div class="col-12" style="border: 5px solid #3a54a8; padding: 20px">
                                                    Date: {{$certificate->date_submit}}
                                                    <br>
                                                    Ref No {{$certificate->ref}} : Employee No. {{$employee->empCode}}/CBQ/2023
                                                    <br><br>
                                                    <h5 style="font-weight: bold; text-align: center; width: 100%">TO WHOMSOEVER IT MAY CONCERN</h5>
                                                    <br>
                                                    Commercial Bank of Qatar
                                                    <br>
                                                    State of Doha – Qatar
                                                    <br><br>
                                                    Dear Sir,
                                                    <br><br>
                                                    This is to certify that @if($employee->sex=="Male")Mr. @else Ms. @endif <b style="font-weight: bolder"> {{$employee->empName}}, holder of {{$employee->nationality}} Passport #{{$employee->passportNo}} & QID {{$employee->visaNo}} </b> is a confirmed employee of Medgulf Construction Company W.L.L. He has been working with us since  {{$employee->joiningDate}} till date.  He is working in the capacity of {{$employee->designation}}
                                                    <br><br>
                                                    @if($certificate->type == "Salary Certificate-TO WHOMSOEVER IT MAY CONCERN")
                                                        His present monthly Gross salary is Qrs. @isset($employee->total_salary){{$employee->total_salary}} / {{$employee->salaryText}}@else ----- @endisset per month
                                                        <br><br>
                                                    @endif
                                                    This Certificate is issued upon employee request without any liability against Medgulf Construction Company W.L.L.
                                                    <br><br>
                                                    <b style="font-weight: bolder">For MEDGULF CONSTRUCTION COMPANY</b>
                                                    <br>
                                                    @if(auth('employee')->user()->emailWork == "elie.azzi@ensrv.com")
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <img class="img-fluid d-block" src="{{asset("assets/images/Picture1.png")}}" style="height: 120px; border-radius: 5%;">
                                                            </div>
                                                            <div class="col-6">
                                                                <img class="img-fluid d-block" src="{{asset("assets/images/Picture2.png")}}" style="height: 150px; margin: auto; border-radius: 5%;">
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <br>
                                                    Elie Azzi
                                                    <br>
                                                    <b style="font-weight: bolder">Group HR Director
                                                    </b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    @if($certificate->state==11)
                                    <div class="text-center mb-5">
                                        <a href="#" data-toggle="modal" data-target="#confirm1" class="btn solid-btn p-4 mt-3 font-weight-bold m-2" style="width: 300px !important;">Confirm Certificate</a>
                                        <a href="#" data-toggle="modal" data-target="#reject1" class="btn mart-btn p-4 mt-3 font-weight-bold m-2" style="width: 300px !important;">Reject Certificate</a>
                                    </div>
                                    @endif

                                    <div class="modal fade" id="confirm1" tabindex="-1" aria-labelledby="exampleModalLabelConfirm1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabelConfirm1">Approval Certificate</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure that you will approve and issue this certificate?</p>
                                                    <div class="mb-3">
                                                        Remark: <textarea class="form-control" name="approval_remark"></textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div>
                                                            <button type="submit" class="btn mart-btn" style="width: 200px !important;">Confirm Certificate</button>
                                                        </div>
                                                        <button type="button" class="btn mart-btn " style="width: 200px !important; background-color: #dc3545; color: white !important;" data-dismiss="modal">Cancel Certificate</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                                <div class="modal fade" id="reject1" tabindex="-1" aria-labelledby="exampleModalLabelReject1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content ">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabelReject1">Reject Certificate</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('employee.certificate.approval.reject')}}" method="POST" class=""  id="myForm"  enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$certificate->id}}" required>
                                                <div class="modal-body">
                                                    <p>Are you sure you will reject this certificate?</p>
                                                    <div class="mb-3">
                                                        Remark: <textarea class="form-control" name="approval_remark" required></textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div>
                                                            <button type="submit" class="btn mart-btn" style="width: 200px !important;">Reject certificate</button>
                                                        </div>
                                                        <button type="button" class="btn mart-btn " style="width: 200px !important; background-color: #dc3545; color: white !important;" data-dismiss="modal">Cancel Certificate</button>
                                                    </div>
                                                </div>
                                            </form>
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
    <script>
        function enCer(){
            document.getElementById('en_certificate').style.display='block';
            document.getElementById('select_certificate').style.display='none';
        }
    </script>
@endsection
