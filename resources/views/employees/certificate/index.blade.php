@extends('layouts.site')
@section('content')
    <style>
        h5{
            color: black !important;
        }
    </style>
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
                                            <div class="row">
                                                <div class="col-9">
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
                                                <div class="col-3">
                                                    @isset($employee->image)
                                                        <div class=" text-center">
                                                            <img src="{{asset("assets/images/employees/$employee->image")}}" style="height: 150px; width: 150px; border-radius: 50%">
                                                        </div>
                                                    @endisset
                                                </div>
                                            </div>

                                            <div class="text-left text-white" id="select_certificate">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <a href="#" onclick="enCer()" class="btn mart-btn d-block p-4 mt-3 font-weight-bold">English Certificate</a>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <a href="#" onclick="arCer()" class="btn mart-btn d-block p-4 mt-3 font-weight-bold">Arabic Certificate</a>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <a href="{{route('employee.certificate.showAll')}}" class="btn mart-btn d-block p-4 mt-3 font-weight-bold">Show Certificates</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-left ml-5 pl-5 mb-5" id="en_certificate" style="display: none">
                                                <form action="{{route('employee.certificate.store')}}" method="POST" class=""  id="myForm"  enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <h3 class="text-center" style="color: #3a54a8">English Certificate</h3>
                                                            <h5>Select Certificate Type:</h5>
                                                            <input type="radio" id="personal_loan" value="Personal Loan" name="certificate_type" class="radio-card" required>
                                                            <label for="personal_loan">Personal Loan</label>
                                                            <br>
                                                            <input type="radio" id="credit_card" value="Credit Card" name="certificate_type" class="radio-card" required>
                                                            <label for="credit_card">Credit Card</label>
                                                            <br>
                                                            <input type="radio" id="vehicle_loan" value="Vehicle Loan" name="certificate_type" class="radio-card" required>
                                                            <label for="vehicle_loan">Vehicle Loan</label>
                                                            <br>
                                                            <input type="radio" id="embassy" value="Employment Certificate to Embassy" name="certificate_type" class="radio-card" required>
                                                            <label for="embassy">Employment Certificate to Embassy</label>
                                                            <br>
                                                            <input type="radio" id="without_salary" value="Certificate Without salary -TO WHOMSOEVER IT MAY CONCERN" name="certificate_type" class="radio-card" required>
                                                            <label for="without_salary">Certificate Without salary -TO WHOMSOEVER IT MAY CONCERN</label>
                                                            <br>
                                                            <input type="radio" id="salary" value="Salary Certificate-TO WHOMSOEVER IT MAY CONCERN" name="certificate_type" class="radio-card" required>
                                                            <label for="salary">Salary Certificate-TO WHOMSOEVER IT MAY CONCERN</label>
                                                            <br>
                                                            <br>
                                                            <div id="embassyNameField" style="display: none;">
                                                                <h5>Embassy Name </h5>
                                                                <small style="color: red; font-size: 16px"> * Please note that the name of the embassy you provide will be reflected on your certificate and ensure that you enter this information accurately and carefully.</small>
                                                                <select name="embassy_name" id="embassy_name" class="form-control mb-3" style="height: auto;" required>
                                                                    @foreach($embassyes as $embassy)
                                                                        <option value="{{$embassy->name}}">{{$embassy->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <h5 class="mt-3">Remark</h5>
                                                            <textarea class="form-control" name="remark" id="self_remark" required></textarea>
                                                            <div class="col-md-3 m-auto">
                                                                <button type="submit" class="btn mart-btn d-block p-4 mt-3 font-weight-bold">Submit</button>
                                                            </div>
                                                        </div>
                                                </div>
                                                </form>
                                            </div>

                                            <div class="text-left ml-5 pl-5 mb-5" id="ar_certificate" style="display: none">
                                                <form action="{{route('employee.certificate.store')}}" method="POST" class=""  id="myForm"  enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <h3 class="text-center" style="color: #3a54a8">Arabic Certificate</h3>
                                                            <h5>Select Certificate Type:</h5>
                                                            <input type="radio" id="Gate_Pass_lost" value="Gate Pass lost" name="certificate_type" class="radio-card" required>
                                                            <label for="Gate_Pass_lost">Gate Pass lost</label>
                                                            <br>
                                                            <input type="radio" id="Gate_Pass_Cancellation" value="Gate Pass Cancellation" name="certificate_type" class="radio-card" required>
                                                            <label for="Gate_Pass_Cancellation">Gate Pass Cancellation</label>
                                                            <br>
                                                            <input type="radio" id="Experience_Certificate" value="Experience Certificate" name="certificate_type" class="radio-card" required>
                                                            <label for="Experience_Certificate">Experience Certificate</label>
                                                            <br>
                                                            <input type="radio" id="Family_Visit_visa_request" value="Family Visit visa request" name="certificate_type" class="radio-card" required>
                                                            <label for="Family_Visit_visa_request">Family Visit visa request</label>
                                                            <br>
                                                            <input type="radio" id="Family_Residency_visa_request" value="Family Residency visa request" name="certificate_type" class="radio-card" required>
                                                            <label for="Family_Residency_visa_request">Family Residency visa request</label>
                                                            <br>
                                                            <input type="radio" id="QID_Lost" value="QID Lost" name="certificate_type" class="radio-card" required>
                                                            <label for="QID_Lost">QID Lost</label>
                                                            <br>
                                                            <br>
                                                            <h5 class="mt-3">Remark</h5>
                                                            <textarea class="form-control" name="remark" id="self_remark" required></textarea>
                                                            <div class="col-md-3 m-auto">
                                                                <button type="submit" class="btn mart-btn d-block p-4 mt-3 font-weight-bold">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
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
        function arCer(){
            document.getElementById('ar_certificate').style.display='block';
            document.getElementById('select_certificate').style.display='none';
        }
        const certificateTypeRadios = document.querySelectorAll('input[name="certificate_type"]');
        const embassyNameField = document.getElementById("embassyNameField");
        const embassyName = document.getElementById("embassy_name");

        // Function to check the selected radio button and toggle the embassy name field
        function toggleEmbassyNameField() {
            if (document.querySelector('input[name="certificate_type"]:checked').value === "Employment Certificate to Embassy") {
                embassyNameField.style.display = "block";
                embassyName.setAttribute("required", "required");
            } else {
                embassyNameField.style.display = "none";
                embassyName.removeAttribute("required");
            }
        }


        // Add change event listeners to all certificate_type radios
        certificateTypeRadios.forEach(function (radio) {
            radio.addEventListener("change", toggleEmbassyNameField);
        });
    </script>
@endsection
