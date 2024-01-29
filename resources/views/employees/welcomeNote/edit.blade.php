@extends('layouts.site')
@section('content')
    <style>
        h5 {
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
                                    <a href="{{route('employee.home')}}">Back to home Page </a>

                                </div>

                                <div class="col-md-12 col-lg-12 text-left">
                                    <div class="row container">
                                        <div class="col-md-12" id="">

                                            <h4 class="font-weight-bold mt-5 mb-5">Add Employee <small
                                                    style="font-size: 14px"></small></h4>
                                            <div class="row">
                                                <div class="card mt-4">
                                                    <div class="card-body">
                                                        <form method="post"
                                                              action="{{route('employee.welcomeNote.store')}}"
                                                              enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Employee Type:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <select class="form-control mb-3"
                                                                                    name="employee_type" id="employeeType"
                                                                                    style="height: fit-content">
                                                                                <option value="workers" @if($employee->type == 'workers') selected @endif >Worker</option>
                                                                                <option value="staff" @if($employee->type == 'staff') selected @endif >Employee
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Entity:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <select class="form-control mb-3"
                                                                                    id="entityId"
                                                                                    name="company_id"
                                                                                    style="height: fit-content">
                                                                                <option value="1" @if($employee->company_id == '1') selected @endif >MEDGULF</option>
                                                                                <option value="2" @if($employee->company_id == '2') selected @endif >TRAGS Engineering
                                                                                </option>
                                                                                <option value="3" @if($employee->company_id == '3') selected @endif >TRAGS Trading</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Authorized Managers:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <div class="form-group">
                                                                                <select
                                                                                    class="form-control exampleSelect"
                                                                                    name="welcomeManagersDropdown[]"
                                                                                    id="welcomeManagersDropdown"
                                                                                    multiple="multiple" required>
                                                                                </select>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Status:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="status" placeholder="status" value="{{$employee->status}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Employee Code:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="empCode"
                                                                                   placeholder="Employee Code" value="{{$employee->empCode}}" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Employee Name:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="empName"
                                                                                   placeholder="Employee Name" required  value="{{$employee->empName}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Nationality:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="nationality"
                                                                                   placeholder="Nationality" value="{{$employee->nationality}}">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Image:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="mb-3" type="file" id="imageInput" name="image"
                                                                                   accept="image/*" required>
                                                                        </div>
                                                                        <div class="col-sm-12">
                                                                            <img src="{{asset('assets/images/' . $employee->image)}}" alt="" style="height: 70px;width: 70px">
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Signature:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class=" mb-3" type="file" id="imageInput" name="signature"
                                                                                   accept="image/*">
                                                                        </div>
                                                                        <div class="col-sm-12">
                                                                            <img src="{{asset('assets/images/' . $employee->signature)}}" alt="" style="height: 70px;width: 70px">
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Designation:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="designation"
                                                                                   placeholder="Designation" required value="{{$employee->designation}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Project Department Number:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="projectDepartmentNumber"
                                                                                   placeholder="Project Department Number"
                                                                                   required value="{{$employee->projectDepartmentNumber}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Project Department Name:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="projectDepartmentName"
                                                                                   placeholder="Project Department Name"
                                                                                   required value="{{$employee->projectDepartmentName}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Minimum:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="minimum" placeholder="Minimum" value="{{$employee->minimum}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Maximum:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="maximum" placeholder="Maximum" value="{{$employee->maximum}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Class:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="class" placeholder="Class" value="{{$employee->class}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Job Family:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="jobFamily"
                                                                                   placeholder="Job Family" value="{{$employee->jobFamily}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Job Code:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="jobCode"
                                                                                   placeholder="Job Code" value="{{$employee->jobCode}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Category Payroll:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="categoryPayroll"
                                                                                   placeholder="Category Payroll" value="{{$employee->categoryPayroll}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Employee Acc:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="empAcc"
                                                                                   placeholder="Employee Acc" value="{{$employee->empAcc}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Joining Date:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="date"
                                                                                   name="joiningDate"
                                                                                   placeholder="Joining Date" required value="{{$employee->joiningDate}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Service:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="service" placeholder="Service" value="{{$employee->service}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Birth Date:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="date"
                                                                                   name="birthDate"
                                                                                   placeholder="Birth Date" value="{{$employee->birthDate}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Age:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="age" placeholder="Age"  value="{{$employee->age}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Warning:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <textarea class="form-control mb-3"
                                                                                      type="text" name="warning"
                                                                                      placeholder="warning">{{$employee->warning}}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Pay Type:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="payType"
                                                                                   placeholder="Pay Type" value="{{$employee->payType}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Eligibility:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="eligibility"
                                                                                   placeholder="Eligibility" value="{{$employee->eligibility}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Vac Days:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="vacDays"
                                                                                   placeholder="Vac Days" value="{{$employee->vacDays}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Sector:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="sector" placeholder="Sector" value="{{$employee->sector}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Ticket Amount:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="ticketAmount"
                                                                                   placeholder="Ticket Amount" value="{{$employee->ticketAmount}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Num Tickets:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="numTickets"
                                                                                   placeholder="Num Tickets" value="{{$employee->numTickets}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Family Status:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="familyStatus"
                                                                                   placeholder="Family Status" value="{{$employee->familyStatus}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Sett Date:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="date"
                                                                                   name="settDate"
                                                                                   placeholder="Sett Date"  value="{{$employee->settDate}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Campedsc:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="campedsc"
                                                                                   placeholder="Campedsc" value="{{$employee->campedsc}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Passport No:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="passportNo"
                                                                                   placeholder="Passport No"  value="{{$employee->passportNo}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Passport Validity:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="passportValidity"
                                                                                   placeholder="Passport Validity" value="{{$employee->passportNo}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Visa No:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="visaNo" placeholder="Visa No" value="{{$employee->visaNo}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Visa Expiry:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="visaExpiry"
                                                                                   placeholder="Visa Expiry" value="{{$employee->visaExpiry}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Visa Type:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="visaType"
                                                                                   placeholder="Visa Type" value="{{$employee->visaType}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Sponsor:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="sponsor" placeholder="Sponsor" value="{{$employee->sponsor}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Sex:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="sex" placeholder="Sex" value="{{$employee->sex}}"
                                                                                   required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Employee Status:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="empStatus"
                                                                                   placeholder="Employee Status"  value="{{$employee->empStatus}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Effective Date:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="date"
                                                                                   name="effectiveDate"
                                                                                   placeholder="Effective Date" value="{{$employee->effectiveDate}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Visa Issue Date:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="date"
                                                                                   name="visaIssueDate"
                                                                                   placeholder="Visa Issue Date" value="{{$employee->visaIssueDate}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Email Work:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="emailWork"
                                                                                   placeholder="Email Work" value="{{$employee->emailWork}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Mobile Work:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="mobileWork"
                                                                                   placeholder="Mobile Work" value="{{$employee->mobileWork}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Mobile:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="mobile" placeholder="Mobile" value="{{$employee->mobile}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Finger:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="date"
                                                                                   name="finger" placeholder="Finger" value="{{$employee->finger}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Medical:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="medical" placeholder="Medical" value="{{$employee->medical}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Duty Resumption:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="dutyResumption"
                                                                                   placeholder="Duty Resumption" value="{{$employee->dutyResumption}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>HC Code:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="hcCode" placeholder="HC Code" value="{{$employee->hcCode}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>HC Exp Date:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="hcExpDate"
                                                                                   placeholder="HC Exp Date" value="{{$employee->hcExpDate}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Agency:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="agency" placeholder="Agency" value="{{$employee->agency}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Basic:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="basic" placeholder="Basic" value="{{$employee->basic}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>HRA:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="hra" placeholder="HRA" value="{{$employee->hra}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>TA:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="ta" placeholder="TA" value="{{$employee->ta}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Fixed OT:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="fixedOt"
                                                                                   placeholder="Fixed OT" value="{{$employee->fixedOt}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Other Allowance:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="otherAllowance"
                                                                                   placeholder="Other Allowance" value="{{$employee->otherAllowance}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>TOTAL:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="total" placeholder="TOTAL" value="{{$employee->total}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Arabic Name:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="arabic_name"
                                                                                   placeholder="Arabic Name" value="{{$employee->arabic_name}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Arabic Designation:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="arabic_designation"
                                                                                   placeholder="Arabic Designation" value="{{$employee->arabic_designation}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Arabic Nationality:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="arabic_nationality"
                                                                                   placeholder="Arabic Nationality" value="{{$employee->arabic_nationality}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row">
                                                                        <div class="col-5">
                                                                            <label>Total Salary:</label>
                                                                        </div>
                                                                        <div class="col-11">
                                                                            <input class="form-control mb-3" type="text"
                                                                                   name="total_salary"
                                                                                   placeholder="Total Salary" value="{{$employee->total_salary}}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <button type="submit"
                                                                        class="btn btn-primary px-4 w-25 m-auto mt-3">
                                                                    Save
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page content-->
    </section>
@endsection
@section('script')
    <script>
        var host = window.location.origin;
        $(document).ready(function () {
            // Handle category dropdown change event
            $('#employeeType,#entityId').on('change', function () {
                var employeeType = $('#employeeType').val();
                var entityId = $("#entityId").val();
                // Make Ajax request to get subcategories
                $.ajax({
                    url: host + '/employee/welcomeNote/list/managers/' + employeeType + '/' + entityId,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        // Update subcategory dropdown options
                        var subcategoryDropdown = $('#welcomeManagersDropdown');
                        console.log(subcategoryDropdown);
                        subcategoryDropdown.empty();
                        $.each(data, function (key, value) {
                            subcategoryDropdown.append('<option value="' + value.id + '">' + value.empName + " : " + value.empCode + '</option>');
                        });
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });
            $(function () {
                var employeeType = $('#employeeType').val();
                var entityId = $("#entityId").val();
                // Make Ajax request to get subcategories
                $.ajax({
                    url: host + '/employee/welcomeNote/list/managers/' + employeeType + '/' + entityId,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        // Update subcategory dropdown options
                        var subcategoryDropdown = $('#welcomeManagersDropdown');
                        console.log(subcategoryDropdown);
                        subcategoryDropdown.empty();
                        $.each(data, function (key, value) {
                            subcategoryDropdown.append('<option value="' + value.id + '">' + value.empName + " : " + value.empCode + '</option>');
                        });
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });


        });
    </script>
@endsection
