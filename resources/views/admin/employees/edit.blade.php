@extends('layouts.dashboard')
@include('admin.includes.sidebar')
@include('admin.includes.header')
@include('admin.includes.switcher')
@section('content')
    <style>
        table.dataTable {
            border-collapse: collapse !important;
        }
    </style>
    <!-- start page content wrapper-->
    <div class="page-content-wrapper">
        <!-- start page content-->
        <div class="page-content">
            <h3>Edit Employee</h3>
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block text-left">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block text-left">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="card mt-4">
                <a href="{{route('admin.employe.removeRegister',['id'=>$employee->id])}}" class="btn btn-danger w-25">Remove
                    Register</a>
                <div class="card-body">
                    <form method="post" action="{{route('admin.employees.update',['employee'=>$employee->id])}}"
                          enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <button type="submit" class="btn btn-primary px-4 w-25 m-auto mt-3">Save</button>
                        </div>
                        <div class="row">
                            <div class="col-12 p-3">
                                <div class="row  ">
                                    <div class="col-sm-12 text-center">
                                        <hr>
                                        <h6>Permissions</h6>
                                        <hr>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <div class="form-group">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                       id="flexSwitchCheckDefault" name="view_all_notes_entities"
                                                       value="1"
                                                       @if($employee->view_all_notes_entities == 1) checked @endif>
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Access All
                                                    Welcome Note Entities</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                       id="flexSwitchCheckDefault" name="EmployeeRelation"
                                                       value="1"
                                                       @if($employee->isHasPermission("EmployeeRelation")) checked @endif>
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Employee
                                                    Relation</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                       id="flexSwitchCheckDefault" name="ClearanceAccommodation"
                                                       value="1"
                                                       @if($employee->isHasPermission("ClearanceAccommodation")) checked @endif>
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Accommodation
                                                    Dep</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                       id="flexSwitchCheckDefault" name="ClearancePlant"
                                                       value="1"
                                                       @if($employee->isHasPermission("ClearancePlant")) checked @endif>
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Plant
                                                    Department</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                       id="flexSwitchCheckDefault" name="ClearanceStores"
                                                       value="1"
                                                       @if($employee->isHasPermission("ClearanceStores")) checked @endif>
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Stores
                                                    Department</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                       id="flexSwitchCheckDefault" name="ClearanceFinance"
                                                       value="1"
                                                       @if($employee->isHasPermission("ClearanceFinance")) checked @endif>
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Finance
                                                    Department</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                       id="flexSwitchCheckDefault" name="ClearanceIT"
                                                       value="1"
                                                       @if($employee->isHasPermission("ClearanceIT")) checked @endif>
                                                <label class="form-check-label" for="flexSwitchCheckDefault">IT
                                                    Department</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                       id="flexSwitchCheckDefault" name="HrApproval"
                                                       value="1"
                                                       @if($employee->isHasPermission("HrApproval")) checked @endif>
                                                <label class="form-check-label" for="flexSwitchCheckDefault">HR
                                                    Department</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                       id="flexSwitchCheckDefault" name="GroupHRDirectorApproval"
                                                       value="1"
                                                       @if($employee->isHasPermission("GroupHRDirectorApproval"))  checked @endif>
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Group HR
                                                    Director Department</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-group">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                       id="flexSwitchCheckDefault" name="GroupHRDirectorApproval"
                                                       value="1"
                                                       @if($employee->isHasPermission("WorkerLeaves"))  checked @endif>
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Add Worker Leaves </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Welcome Note:</label>
                                    </div>
                                    <div class="col-11">
                                        <div class="form-group">
                                            <?php $welcome_notes = explode("|", $employee->welcomeNote);?>
                                            <select class="form-control exampleSelect" name="welcomeNote[]"
                                                    multiple="multiple">

                                                <option value="unauthorized"
                                                        @if(in_array('unauthorized',$welcome_notes)) selected @endif>
                                                    Unauthorized
                                                </option>

                                                <option value="employee"
                                                        @if(in_array('employee',$welcome_notes)) selected @endif>
                                                    Employee
                                                </option>

                                                <option value="staffManager"
                                                        @if(in_array('staffManager',$welcome_notes)) selected @endif>
                                                    Staff Manager
                                                </option>
                                                <option value="workersManager"
                                                        @if(in_array('workersManager',$welcome_notes)) selected @endif>
                                                    Workers Manager
                                                </option>


                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Entity:</label>
                                    </div>
                                    <div class="col-11">
                                        <select class="form-control mb-3" name="company_id">
                                            <option
                                                value="{{ $employee->company->id }}">{{ $employee->company->name }}</option>

                                            <option value="1">MEDGULF</option>
                                            <option value="2">TRAGS Engineering</option>
                                            <option value="3">TRAGS Trading</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Status:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->status}}" type="text"
                                               name="status" placeholder="status">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Employee Code:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->empCode}}" type="text"
                                               name="empCode" placeholder="Employee Code">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Employee Name:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->empName}}" type="text"
                                               name="empName" placeholder="Employee Name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Nationality:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->nationality}}" type="text"
                                               name="nationality" placeholder="Nationality">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Image:</label>
                                    </div>
                                    <div class="col-11">

                                        <input class="form-control mb-3" type="file" id="imageInput" name="image"
                                               accept="image/*">
                                    </div>
                                    <div class="col-sm-12">
                                        <img src="{{asset('assets/images/' . $employee->image)}}" alt=""
                                             style="height: 70px;width: 70px">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Signature:</label>
                                    </div>
                                    <div class="col-11">

                                        <input class="form-control mb-3" type="file" id="imageInput" name="signature"
                                               accept="image/*">
                                    </div>
                                    <div class="col-sm-12">
                                        <img src="{{asset('assets/images/' . $employee->signature)}}" alt=""
                                             style="height: 70px;width: 70px">
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Designation:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->designation}}" type="text"
                                               name="designation" placeholder="Designation">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Project Department Number:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->projectDepartmentNumber}}"
                                               type="text" name="projectDepartmentNumber"
                                               placeholder="Project Department Number">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Project Department Name:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->projectDepartmentName}}"
                                               type="text" name="projectDepartmentName"
                                               placeholder="Project Department Name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Minimum:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->minimum}}" type="text"
                                               name="minimum" placeholder="Minimum">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Maximum:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->maximum}}" type="text"
                                               name="maximum" placeholder="Maximum">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Class:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->class}}" type="text"
                                               name="class" placeholder="Class">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Job Family:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->jobFamily}}" type="text"
                                               name="jobFamily" placeholder="Job Family">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Job Code:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->jobCode}}" type="text"
                                               name="jobCode" placeholder="Job Code">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Category Payroll:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->categoryPayroll}}"
                                               type="text" name="categoryPayroll" placeholder="Category Payroll">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Employee Acc:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->empAcc}}" type="text"
                                               name="empAcc" placeholder="Employee Acc">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Joining Date:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->joiningDate}}" type="date"
                                               name="joiningDate" placeholder="Joining Date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Service:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->service}}" type="text"
                                               name="service" placeholder="Service">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Birth Date:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->birthDate}}" type="date"
                                               name="birthDate" placeholder="Birth Date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Age:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->age}}" type="text"
                                               name="age" placeholder="Age">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Warning:</label>
                                    </div>
                                    <div class="col-11">
                                        <textarea class="form-control mb-3" type="text" name="warning"
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
                                        <input class="form-control mb-3" value="{{$employee->payType}}" type="text"
                                               name="payType" placeholder="Pay Type">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Eligibility:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->eligibility}}" type="text"
                                               name="eligibility" placeholder="Eligibility">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Vac Days:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->vacDays}}" type="text"
                                               name="vacDays" placeholder="Vac Days">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Sector:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->sector}}" type="text"
                                               name="sector" placeholder="Sector">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Ticket Amount:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->ticketAmount}}" type="text"
                                               name="ticketAmount" placeholder="Ticket Amount">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Num Tickets:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->numTickets}}" type="text"
                                               name="numTickets" placeholder="Num Tickets">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Family Status:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->familyStatus}}" type="text"
                                               name="familyStatus" placeholder="Family Status">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Sett Date:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->settDate}}" type="date"
                                               name="settDate" placeholder="Sett Date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Campedsc:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->campedsc}}" type="text"
                                               name="campedsc" placeholder="Campedsc">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Passport No:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->passportNo}}" type="text"
                                               name="passportNo" placeholder="Passport No">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Passport Validity:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->passportValidity}}"
                                               type="text" name="passportValidity" placeholder="Passport Validity">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Visa No:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->visaNo}}" type="text"
                                               name="visaNo" placeholder="Visa No">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Visa Expiry:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->visaExpiry}}" type="text"
                                               name="visaExpiry" placeholder="Visa Expiry">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Visa Type:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->visaType}}" type="text"
                                               name="visaType" placeholder="Visa Type">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Sponsor:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->sponsor}}" type="text"
                                               name="sponsor" placeholder="Sponsor">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Sex:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->sex}}" type="text"
                                               name="sex" placeholder="Sex">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Employee Status:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->empStatus}}" type="text"
                                               name="empStatus" placeholder="Employee Status">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Effective Date:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->effectiveDate}}"
                                               type="date" name="effectiveDate" placeholder="Effective Date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Visa Issue Date:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->visaIssueDate}}"
                                               type="date" name="visaIssueDate" placeholder="Visa Issue Date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Email Work:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->emailWork}}" type="text"
                                               name="emailWork" placeholder="Email Work">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Mobile Work:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->mobileWork}}" type="text"
                                               name="mobileWork" placeholder="Mobile Work">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Mobile:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->mobile}}" type="text"
                                               name="mobile" placeholder="Mobile">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Finger:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->finger}}" type="date"
                                               name="finger" placeholder="Finger">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Medical:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->medical}}" type="text"
                                               name="medical" placeholder="Medical">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Duty Resumption:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->dutyResumption}}"
                                               type="text" name="dutyResumption" placeholder="Duty Resumption">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>HC Code:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->hcCode}}" type="text"
                                               name="hcCode" placeholder="HC Code">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>HC Exp Date:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->hcExpDate}}" type="text"
                                               name="hcExpDate" placeholder="HC Exp Date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Agency:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->agency}}" type="text"
                                               name="agency" placeholder="Agency">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Basic:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->basic}}" type="text"
                                               name="basic" placeholder="Basic">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>HRA:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->hra}}" type="text"
                                               name="hra" placeholder="HRA">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>TA:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->ta}}" type="text" name="ta"
                                               placeholder="TA">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Fixed OT:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->fixedOt}}" type="text"
                                               name="fixedOt" placeholder="Fixed OT">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Other Allowance:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->otherAllowance}}"
                                               type="text" name="otherAllowance" placeholder="Other Allowance">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>TOTAL:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->total}}" type="text"
                                               name="total" placeholder="TOTAL">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Mobile New:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->mobile_new}}" type="text"
                                               name="mobile_new" placeholder="Mobile New">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Arabic Name:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->arabic_name}}" type="text"
                                               name="arabic_name" placeholder="Arabic Name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Arabic Designation:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->arabic_designation}}"
                                               type="text" name="arabic_designation" placeholder="Arabic Designation">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Arabic Nationality:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->arabic_nationality}}"
                                               type="text" name="arabic_nationality" placeholder="Arabic Nationality">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-5">
                                        <label>Total Salary:</label>
                                    </div>
                                    <div class="col-11">
                                        <input class="form-control mb-3" value="{{$employee->total_salary}}" type="text"
                                               name="total_salary" placeholder="Total Salary">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <button type="submit" class="btn btn-primary px-4 w-25 m-auto mt-3">Save</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- end page content-->
    </div>
@endsection
@section('script')

@endsection
