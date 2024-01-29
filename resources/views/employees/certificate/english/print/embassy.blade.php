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
                                                        Ref No {{$certificate->ref}} : Employee No. {{$employee->EmpCode}}/CBQ/2023
                                                    </div>
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
                                                    <b style="font-weight: bolder"> @if($employee->Gender=="Male")Mr @else Ms @endif. {{$employee->EmpName}}</b> to visit your country.
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
                                                        EMP# {{$employee->EmpCode}}
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