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
                                    @if(auth('employee')->user()->emailWork == "review@medgulfconstruction.com" || auth('employee')->user()->emailWork == "elie.azzi@ensrv.com")
                                        <a href="{{route('employee.certificate.index')}}" style="font-size:28px;color:#3a54a8"><i class="fa fa-angle-double-left"></i> Back</a>
                                    @else
                                        <a href="{{route('employee.certificate.showAll')}}" style="font-size:28px;color:#3a54a8"><i class="fa fa-angle-double-left"></i> Back</a>
                                    @endif
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


                                <div class="col-md-12 col-lg-12 text-left">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <h4 class="font-weight-bold mt-5 mb-5">Request Certificate <small style="font-size: 14px"></small></h4>
                                            
                                            @if($certificate->state == '21')
                                                <div class="text-center m-5">
                                                    <a id="printButton" href="" class="btn mart-btn" style="width: 200px !important;">Print</a>
                                                </div>
                                            @endif
                                            <h4 class="text-center" style="color: #3a54a8">{{$certificate->type}} Certificate</h4>
                                            <div class="row container">
                                                <div class="col-12" style="border: 5px solid #3a54a8; padding: 20px">
                                                    Date: {{$certificate->date_submit}}
                                                    <br>
                                                    Ref No {{$certificate->ref}} : Employee No. {{$employee->empCode}}/CBQ/2023
                                                    <br><br>

                                                    <b style="font-weight: bolder">
                                                        The Embassy of {{$certificate->embassy}}
                                                        <br>
{{--                                                        <form action="{{route('employee.embassy.store')}}" method="POST" class=""  id="myForm"  enctype="multipart/form-data">--}}
{{--                                                            @csrf--}}
{{--                                                            --}}
{{--                                                            <input type="text" name="embassy" required> <button type="submit" class="btn solid-btn pt-1 pb-1 ml-2">--}}
{{--                                                                Save--}}
{{--                                                            </button>--}}
{{--                                                            <br>--}}
{{--                                                        </form>--}}
                                                        Doha – Qatar
                                                    </b>
                                                    <br><br>
                                                    <b style="font-weight: bolder">
                                                        Subject: {{$certificate->type}}
                                                    </b>
                                                    <br><br>
                                                    This is to certify that <b style="font-weight: bolder"> @if($employee->sex=="Male")Mr @else Ms @endif. {{$employee->empName}}</b>, {{$employee->nationality}} National, holding Passport
                                                    Number: {{$employee->passportNo}} and QID Number: {{$employee->visaNo}} has been working with us since
                                                    {{$employee->joiningDate}} in the capacity of {{$employee->designation}}.
                                                    <br><br>
                                                    His present monthly gross salary is<b style="font-weight: bolder"> QAR. @isset($certificate->salary){{$certificate->salary}} / {{$employee->salaryText}}@else {{$employee->total_salary}} / {{$employee->salaryText}} @endisset</b>.
                                                    <br><br>
                                                    {{$employee->company->name}} Construction Company doesn’t have any objection for
                                                    <b style="font-weight: bolder"> @if($employee->sex=="Male")Mr @else Ms @endif. {{$employee->empName}}</b> to visit your country.
                                                    <br><br>
                                                    This Certificate is being issued upon employee’s request without any liabilities against
                                                    MEDGULF Construction Company W.L.L.
                                                    <br><br>
                                                    Regards,
                                                    <br>
                                                    @if($certificate->state=='21')
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
                                                    <b style="font-weight: bolder">Group HR Director</b>
                                                    <br>

                                                    <div style="text-align: right">
                                                        EMP# {{$employee->empCode}}
                                                    </div>
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
    <script>
        function enCer(){
            document.getElementById('en_certificate').style.display='block';
            document.getElementById('select_certificate').style.display='none';
        }

        document.getElementById("printButton").addEventListener("click", function() {
            // Replace 'url_of_another_page.html' with the URL of the page you want to print
            var anotherPageUrl = "{{route('employee.certificate.print',['id'=>$certificate->id])}}";

            // Open the another page in a new window/tab
            var newWindow = window.open(anotherPageUrl, '_blank');

            // Wait for the new window/tab to load, then print it
            newWindow.print();

        });
    </script>
@endsection
