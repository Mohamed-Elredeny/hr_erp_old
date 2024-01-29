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
                                                    <b style="font-weight: bolder">The Manager</b>
                                                    <br>
                                                    Commercial Bank of Qatar
                                                    <br>
                                                    State of Doha – Qatar
                                                    <br><br>
                                                    Dear Sir,
                                                    <br><br>
                                                    This is to certify that <b style="font-weight: bolder"> @if($employee->Gender=="Male")Mr @else Ms @endif. {{$employee->EmpName}} QID/ Visa No. {{$employee->Visa}} and holder of {{$employee->Nationality}} passport Number {{$employee->Passport}} </b> working in the capacity of {{$employee->Designation}} is a confirmed employee of {{$employee->company->name}} Construction Company. He joined the company on {{$employee->JoiningDate}} and still employed till date.
                                                    <br><br>
                                                    His Gross Salary per month is Qar. @isset($certificate->salary){{$certificate->salary}} / {{$employee->salaryText}}@else {{$employee->TotalSalary}} / {{$employee->salaryText}} @endisset.
                                                    <br>
                                                    To assist the above mentioned employee to obtain {{$certificate->type}} from your bank, we confirm that this monthly salary will continue to be paid to his bank account, account number {{$employee->EmplAcco}} effective next month.
                                                    <br><br>
                                                    If the above mentioned employee resigns or his employment is terminated by Medgulf, we will inform you accordingly and pay all amounts of End of services benefits due to him, if any, to his aforementioned bank account.
                                                    <br><br>
                                                    We confirm that both monthly salary and end of service dues, if any, will not be transferred to another bank before obtaining a written clearance Letter from your bank or by directive through Qatar courts.
                                                    <br><br>
                                                    The bank and above named employee fully understands that Medgulf Construction Company does not, in any way, hold itself responsible for any debits incurred by him and that the granting of credit or loan is the sole discretion of your Bank.
                                                    <br><br>
                                                    Yours truly,
                                                    <br>
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
                                                    <b style="font-weight: bolder">Group HR Director</b>
                                                    <br>
                                                    <div class="text-right">
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
