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
            <h3>Employees</h3>
            <div class="text-end">
                <a href="{{route('admin.employees.create')}}" class="btn btn-primary">Add Employee</a>
                <a href="javascript:;" class="btn btn-primary" title="" data-bs-toggle="modal" data-bs-target="#SendMessage" data-bs-original-title="send message" aria-label="send message">
                    Add From Excel
                </a>
                <div class="modal fade" id="SendMessage" tabindex="-1" aria-labelledby="SendMessageLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="SendMessageLabel">Add Employees</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form class="form-horizontal mt-2" method="post"  action="{{route('admin.employee.import')}}" enctype="multipart/form-data">
                                <div class="modal-body">
                                    @csrf
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12 mb-3" dir="ltr">
                                                <h4 class="col-form-label" style="text-align: left;">Upload File</h4>
                                                <input type="file" name="file" class="form-control" placeholder="Title"/>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary ">ADD</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <a href="javascript:;" class="btn btn-primary" title="" data-bs-toggle="modal" data-bs-target="#SendMessageEdit" data-bs-original-title="send message" aria-label="send message">
                    Edit From Excel
                </a>
                <div class="modal fade" id="SendMessageEdit" tabindex="-1" aria-labelledby="SendMessageEditLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="SendMessageEditLabel">Edit Employees</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form class="form-horizontal mt-2" method="post"  action="{{route('admin.employee.edit.excel')}}" enctype="multipart/form-data">
                                <div class="modal-body">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 mb-3" dir="ltr">
                                            <h4 class="col-form-label" style="text-align: left;">Column Name</h4>
                                            <select class="form-control mb-3" name="column_name">
                                                <option value="company_id">Entity</option>
                                                <option value="status">Status</option>
                                                <option value="empName">English Name</option>
                                                <option value="arabic_name">Arabic Name</option>
                                                <option value="nationality">English Nationality</option>
                                                <option value="arabic_nationality">Arabic Nationality</option>
                                                <option value="designation">English Designation</option>
                                                <option value="arabic_designation">Arabic Designation</option>
                                                <option value="total_salary">Total Salary</option>
                                                <option value="projectDepartmentNumber">Project Department Number</option>
                                                <option value="projectDepartmentName">Project Department Name</option>
                                                <option value="emailWork">Email Work</option>
                                                <option value="mobileWork">Mobile Work</option>
                                                <option value="minimum">Minimum</option>
                                                <option value="maximum">Maximum</option>
                                                <option value="class">Class</option>
                                                <option value="jobFamily">Job Family</option>
                                                <option value="jobCode">Job Code</option>
                                                <option value="categoryPayroll">Category Payroll</option>
                                                <option value="empAcc">Employee Acc</option>
                                                <option value="joiningDate">Joining Date</option>
                                                <option value="service">Service</option>
                                                <option value="birthDate">Birth Date</option>
                                                <option value="age">Age</option>
                                                <option value="warning">Warning</option>
                                                <option value="payType">Pay Type</option>
                                                <option value="eligibility">Eligibility</option>
                                                <option value="vacDays">Vac Days</option>
                                                <option value="sector">Sector</option>
                                                <option value="ticketAmount">Ticket Amount</option>
                                                <option value="numTickets">Num Tickets</option>
                                                <option value="familyStatus">Family Status</option>
                                                <option value="settDate">Sett Date</option>
                                                <option value="campedsc">Campedsc</option>
                                                <option value="passportNo">Passport No</option>
                                                <option value="passportValidity">Passport Validity</option>
                                                <option value="visaNo">Visa No</option>
                                                <option value="visaExpiry">Visa Expiry</option>
                                                <option value="visaType">Visa Type</option>
                                                <option value="sponsor">Sponsor</option>
                                                <option value="sex">Sex</option>
                                                <option value="empStatus">Employee Status</option>
                                                <option value="effectiveDate">Effective Date</option>
                                                <option value="visaIssueDate">Visa Issue Date</option>
                                                <option value="mobile">Mobile</option>
                                                <option value="finger">Finger</option>
                                                <option value="medical">Medical</option>
                                                <option value="dutyResumption">Duty Resumption</option>
                                                <option value="hcCode">HC Code</option>
                                                <option value="hcExpDate">HC Exp Date</option>
                                                <option value="agency">Agency</option>
                                                <option value="basic">Basic</option>
                                                <option value="hra">HRA</option>
                                                <option value="ta">TA</option>
                                                <option value="fixedOt">Fixed OT</option>
                                                <option value="otherAllowance">Other Allowance</option>
                                                <option value="total">Total</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 mb-3" dir="ltr">
                                            <h4 class="col-form-label" style="text-align: left;">Upload File</h4>
                                            <input type="file" name="editFile" class="form-control" placeholder="Title"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary ">Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="card mt-4">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block text-left">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                   
                    <div class="card-body" id="orders">
                        <div class="table-responsive">
                            <table id="" class="table table-bordered align-middle" style="width:100%">
                                <thead class="table-light">
                                <tr>
                                    <th>Code</th>
                                    <th>Entity</th>
                                    <th>Name</th>
                                    <th>Nationality</th>
                                    <th>Designation</th>
                                    <th>project/Department Name</th>
                                    <th>Controls</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0; ?>
                                @foreach($employees as $employee)
                                    <tr>
                                        <td>{{$employee->empCode}}</td>
                                        <td>{{ $employee->company->name }}</td>
                                        <td>{{$employee->empName}}</td>
                                        <td>{{$employee->nationality}}</td>
                                        <td>{{$employee->designation}}</td>
                                        <td>{{$employee->projectDepartmentName}}</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-3 fs-6">
                                                <a href="{{route('admin.employees.show',['employee'=>$employee->id])}}" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views">
                                                    <ion-icon name="eye-sharp" role="img" class="md hydrated" aria-label="eye sharp"></ion-icon>
                                                </a>

                                                <a href="{{route('admin.employees.edit',['employee'=>$employee->id])}}"
                                                   class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                   title="" data-bs-original-title="Edit info" aria-label="Edit">
                                                    <ion-icon name="pencil-sharp"></ion-icon>
                                                </a>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </table>
                        </div>
                        {{$employees->links()}}
                    </div>

                </div>

            </div>
            <!-- end page content-->
        </div>
    @endsection
    @section('script')

    @endsection
