@extends('layouts.dashboard')
@include('admin.includes.sidebar')
@include('admin.includes.header')
@include('admin.includes.switcher')
@section('content')
    <style>
        table.dataTable {
            border-collapse: collapse !important;
        }
         table {
             width: 100%;
         }
        td {
            width: 25%;
        }
    </style>
    <!-- start page content wrapper-->
    <div class="page-content-wrapper">
        <!-- start page content-->
        <div class="page-content">
            <h3>Employee Details</h3>
            @isset($employee->image)
            <div class="text-end">
                <img src="{{asset("assets/images/employees/$employee->image")}}" style="height: 150px; width: 150px; border-radius: 50%">
            </div>
            @endisset
            <div class="card mt-4">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block text-left">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <div class="card-body" id="orders">
                    <div class="table-responsive">
                        <table id="" class="table table-bordered align-middle table-striped" style="width:100%">
                            <tr>
                                <th>Entity:</th>
                                <td>{{ $employee->company->name }}</td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td>{{ $employee->status }}</td>
                                <th>Designation:</th>
                                <td>{{ $employee->designation }}</td>
                            </tr>
                            <tr>
                                <th>Employee Code:</th>
                                <td>{{ $employee->empCode }}</td>
                                <th>Project Department Number:</th>
                                <td>{{ $employee->projectDepartmentNumber }}</td>
                            </tr>
                            <tr>
                                <th>Employee Name:</th>
                                <td>{{ $employee->empName }}</td>
                                <th>Project Department Name:</th>
                                <td>{{ $employee->projectDepartmentName }}</td>
                            </tr>
                            <tr>
                                <th>Nationality:</th>
                                <td>{{ $employee->nationality }}</td>
                                <th>Minimum:</th>
                                <td>{{ $employee->minimum }}</td>
                            </tr>
                            <tr>
                                <th>Job Family:</th>
                                <td>{{ $employee->jobFamily }}</td>
                                <th>Maximum:</th>
                                <td>{{ $employee->maximum }}</td>
                            </tr>
                            <tr>
                                <th>Job Code:</th>
                                <td>{{ $employee->jobCode }}</td>
                                <th>Class:</th>
                                <td>{{ $employee->class }}</td>
                            </tr>
                            <tr>
                                <th>Category Payroll:</th>
                                <td>{{ $employee->categoryPayroll }}</td>
                                <th>Employee Account:</th>
                                <td>{{ $employee->empAcc }}</td>
                            </tr>
                            <tr>
                                <th>Joining Date:</th>
                                <td>{{ $employee->joiningDate }}</td>
                                <th>Service:</th>
                                <td>{{ $employee->service }}</td>
                            </tr>
                            <tr>
                                <th>Birth Date:</th>
                                <td>{{ $employee->birthDate }}</td>
                                <th>Warning:</th>
                                <td>{{ $employee->warning }}</td>
                            </tr>
                            <tr>
                                <th>Age:</th>
                                <td>{{ $employee->age }}</td>
                                <th>Pay Type:</th>
                                <td>{{ $employee->payType }}</td>
                            </tr>
                            <tr>
                                <th>Eligibility:</th>
                                <td>{{ $employee->eligibility }}</td>
                                <th>Vacation Days:</th>
                                <td>{{ $employee->vacDays }}</td>
                            </tr>
                            <tr>
                                <th>Sector:</th>
                                <td>{{ $employee->sector }}</td>
                                <th>Ticket Amount:</th>
                                <td>{{ $employee->ticketAmount }}</td>
                            </tr>
                            <tr>
                                <th>Number of Tickets:</th>
                                <td>{{ $employee->numTickets }}</td>
                                <th>Family Status:</th>
                                <td>{{ $employee->familyStatus }}</td>
                            </tr>
                            <tr>
                                <th>Settlement Date:</th>
                                <td>{{ $employee->settDate }}</td>
                                <th>Campedsc:</th>
                                <td>{{ $employee->campedsc }}</td>
                            </tr>
                            <tr>
                                <th>Passport No.</th>
                                <td>{{ $employee->passportNo}}</td>
                                <th>Visa No.</th>
                                <td>{{ $employee->visaNo}}</td>
                            </tr>
                            <tr>
                                <th>Passport Validity</th>
                                <td>{{ $employee->passportValidity}}</td>
                                <th>Visa Expiry</th>
                                <td>{{ $employee->visaExpiry}}</td>
                            </tr>
                            <tr>
                                <th>Visa Type</th>
                                <td>{{ $employee->visaType}}</td>
                                <th>Sponsor</th>
                                <td>{{ $employee->sponsor}}</td>
                            </tr>
                            <tr>
                                <th>Sex</th>
                                <td>{{ $employee->sex}}</td>
                                <th>Employment Status</th>
                                <td>{{ $employee->empStatus}}</td>
                            </tr>
                            <tr>
                                <th>Effective Date</th>
                                <td>{{ $employee->effectiveDate}}</td>
                                <th>Visa Issue Date</th>
                                <td>{{ $employee->visaIssueDate}}</td>
                            </tr>
                            <tr>
                                <th>Email (Work)</th>
                                <td>{{ $employee->emailWork}}</td>
                                <th>Mobile (Work)</th>
                                <td>{{ $employee->mobileWork}}</td>
                            </tr>
                            <tr>
                                <th>Mobile (Personal)</th>
                                <td>{{ $employee->mobile}}</td>
                                <th>Finger</th>
                                <td>{{ $employee->finger}}</td>
                            </tr>
                            <tr>
                                <th>Medical</th>
                                <td>{{ $employee->medical}}</td>
                                <th>Duty Resumption</th>
                                <td>{{ $employee->dutyResumption}}</td>
                            </tr>
                            <tr>
                                <th>HC Code</th>
                                <td>{{ $employee->hcCode}}</td>
                                <th>HC Expiry Date</th>
                                <td>{{ $employee->hcExpDate}}</td>
                            </tr>
                            <tr>
                                <th>Agency</th>
                                <td>{{ $employee->agency}}</td>
                                <th>Basic</th>
                                <td>{{ $employee->basic}}</td>
                            </tr>
                            <tr>
                                <th>HRA</th>
                                <td>{{ $employee->hra}}</td>
                                <th>TA</th>
                                <td>{{ $employee->ta}}</td>
                            </tr>
                            <tr>
                                <th>Fixed OT</th>
                                <td>{{ $employee->fixedOt}}</td>
                                <th>Other Allowance</th>
                                <td>{{ $employee->otherAllowance}}</td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <td>{{ $employee->total}}</td>
                                <th>Total Salary</th>
                                <td>{{ $employee->total_salary}}</td>
                            </tr>
                            <tr>
                                <th>Mobile New</th>
                                <td>{{ $employee->mobile_new}}</td>
                                <th>Arabic Name</th>
                                <td>{{ $employee->arabic_name}}</td>
                            </tr>
                            <tr>
                                <th>Arabic Designation</th>
                                <td>{{ $employee->arabic_designation}}</td>
                                <th>Arabic Nationality</th>
                                <td>{{$employee->arabic_nationality}}</td>
                            </tr>

                        </table>
                    </div>
                </div>

            </div>

        </div>
        <!-- end page content-->
    </div>
@endsection
@section('script')

@endsection
