@extends('layouts.site')
@section('content')
    <style>
        h5{
            color: black !important;
        }
        #logoutt{
            display: none;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--our video promo section start-->
    <img class="img-fluid d-block" src="{{asset("assets/images/heaser.png")}}" style="height: 120px;width: 100%; margin: auto;">

    <section class="video-promo pt-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="video-promo-content text-center">

                        <div class="">
                            <div class=" row align-items-left justify-content-between">

                                <div class="col-md-12 col-lg-12 text-left">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="row container">
                                                <div class="col-12" style=" padding: 20px">
                                                    <div class="text-right">
                                                        Date: {{$certificate->date_submit}}
                                                        <br>
                                                        Ref No {{$certificate->ref}} : Employee No. {{$employee->empCode}}/CBQ/2023
                                                    </div>
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
                                                    <b style="font-weight: bolder">Group HR Director
                                                    </b>
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
    <img class="img-fluid d-block" src="{{asset("assets/images/footer.jpg")}}" style="height: 120px;width: 100%; margin: auto; position: fixed;bottom: 0px">
    <!--our video promo section end-->
@endsection
@section('script')
    <script>
        window.onafterprint = function() {
            window.close();
        };
    </script>
@endsection