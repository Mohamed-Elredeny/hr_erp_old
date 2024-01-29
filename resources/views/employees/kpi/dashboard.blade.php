@extends('layouts.site')
@section('content')
    <style>
        .background-img:before {
            background-color: transparent;
            background-image: linear-gradient(to right, rgba(47, 47, 47, 0.85), rgba(47, 47, 47, 0.85));
        }
    </style>
    <!--hero section start-->
    <section class="hero-section  background-img"
             style="background: url('{{asset("assets/site/img/hero-bg-1.jpg")}}')no-repeat center center / cover">
        <div class="container">
            <div class="row align-items-center justify-content-between py-5">
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="hero-content-left text-white">
                        <h1 class="text-white fw-bold">
                            KPI
                        </h1>
                        <p class="lead">
                            <a class="text-light" href="{{route('employee.dashboard')}}">Home / </a> Staff Performance
                            Review
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="hero-animation-img text-right">
                        @if($employee->company_id == 1)
                            <img src="{{asset("assets/images")}}/{{$employee->company->image}}"
                                 style="height: 130px; width: 130px; border-radius: 50%">
                        @elseif($employee->company_id == 2)
                            <img src="{{asset("assets/images")}}/{{$employee->company->image}}"
                                 style="height: 130px; width: 200px; border-radius: 5%">
                        @elseif($employee->company_id == 3)
                            <img src="{{asset("assets/images")}}/{{$employee->company->image}}"
                                 style="height: 100px; width: 230px; border-radius: 5%">
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-img-absolute" dir="rtl">
            <!--            <img src="img/111.png" style="height: 100px; width: 100px;">-->
        </div>
    </section>
    <!--hero section end-->

    <!--promo section start-->
    <section class="promo-section pt-100 ">
        <div class="container text-center" style="max-width: 85vw;">
            <div class="text-left">
                <a href="{{route('employee.dashboard')}}" style="font-size:28px;color:#3a54a8"><i
                        class="fa fa-angle-double-left"></i> Back</a>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
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
                    <div class="section-heading text-center mb-5">
                        <h2 style="color: #3a54a8">Dashboard</h2>
                    </div>
                </div>
            </div>
            <style>
                td {
                    /* width: 14.28%; */
                }

                b {
                    font-weight: 700;
                }

                .table-bordered td, .table-bordered th {
                    border: 1px solid #3a54a8;
                }

                .form-control {
                    border-color: #3a54a8;
                    padding: 0.975rem 0.85rem;
                }

                .btn-danger {
                    box-shadow: 0 5px 12px 0 #dc354563;
                    background: #dc3545;
                    border: 2px solid #dc3545;
                    border-radius: 30px;
                    margin-top: 5px;
                    color: white !important;
                }
            </style>

            <div class="row mb-3" dir="rtl">
                <div class="col-3 text-right">
                    <button type="button" class="btn solid-btn" onclick="printdatasta()">
                        Print
                    </button>
                </div>
            </div>

            <div class="row g-4 justify-content-center equal text-justify" id="countprint">
                <br><br>
                <style>
                    .table-bordered td, .table-bordered th {
                        border: 1px solid #3a54a8;
                    }
                </style>
                <div class="col-12">
                    <table id="" class="table table-bordered dt-responsive nowrap text-left"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <tr style="background-color: #3a54a8; color: white; font-weight: bold; text-align:center">
                            <td style="color: #fff" class="font-weight-bold">Entity</td>
                            <td style="color: #fff" class="font-weight-bold">Submitted</td>
                            <td style="color: #fff" class="font-weight-bold">Pending At First Approval</td>
                            <td style="color: #fff" class="font-weight-bold">Pending At Final Approval</td>
                            <td style="color: #fff" class="font-weight-bold">Evaluated</td>
                            <td style="color: #fff" class="font-weight-bold">Total Employees</td>
                            <td style="color: #fff" class="font-weight-bold">Not Applied</td>
                        </tr>
                        <tr>
                            <td>MEDGULF</td>
                            <td>{{$kpi1all}}</td>
                            <td>{{$kpi1pending}}</td>
                            <td>{{$kpi1pendingfinal}}</td>
                            <td>{{$kpi1approved}} </td>
                            <td>{{$empnum1}} </td>
                            <td>{{$empnum1 - $kpi1all }} </td>
                        </tr>
                        <tr>
                            <td>TRAGS Engineering</td>
                            <td>{{$kpi2all}}</td>
                            <td>{{$kpi2pending}}</td>
                            <td>{{$kpi2pendingfinal}}</td>
                            <td>{{$kpi2approved}}</td>
                            <td>{{$empnum2}} </td>
                            <td>{{$empnum2 - $kpi2all}} </td>
                        </tr>
                        <tr>
                            <td>TRAGS Trading</td>
                            <td>{{$kpi3all}}</td>
                            <td>{{$kpi3pending}}</td>
                            <td>{{$kpi3pendingfinal}}</td>
                            <td>{{$kpi3approved}}</td>
                            <td>{{$empnum3}} </td>
                            <td>{{$empnum3 - $kpi3all}} </td>
                        </tr>
                    </table>
                </div>
            </div>
            @if ($employee->empCode == 5473 || $employee->empCode == 6335 || $employee->empCode == 6398 || $employee->empCode == 101121)
                <form action="{{route('employee.dashboard_approval_search')}}" method="POST" class=""
                      enctype="multipart/form-data">
                    @csrf
                    <div class="col-12 text-center mt-3 mb-3">
                        <div class="row">
                            <div class="col-3 text-center">
                                Project
                                <input list="Project" name="Project">
                                <datalist id="Project">
                                    @foreach ($projectNames as $projectName)
                                        <option value="{{ $projectName->projectDepartmentName }}">
                                    @endforeach
                                </datalist>
                            </div>
                            <div class="col-3 text-center">
                                Entity
                                <input list="Entity" name="Entity">
                                <datalist id="Entity">
                                    @foreach ($companies as $entity)
                                        <option value="{{ $entity->name }}">
                                    @endforeach
                                </datalist>
                            </div>
                            <div class="col-3 text-center">
                                State
                                <input list="State" name="State">
                                <datalist id="State">
                                    <option value="Pending At First Approval">
                                    <option value="Pending At Final Approval">
                                    <option value="Evaluated">
                                </datalist>
                            </div>
                            <div class="col-3 text-center">
                                <button type="submit" class="btn solid-btn">
                                    Search
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            @endif
            <div class="row">
                <div class="col-9 text-center mt-3 mb-3">
                    <h5>
                        <b style="color: #29a229">
                            Count:
                            {{$countApprovals}}
                        </b>
                    </h5>
                </div>
                <div class="col-3 text-right">
                    <button type="button" class="btn solid-btn" onclick="printdata()">
                        Print
                    </button>
                </div>
            </div>


            <div class="row g-4 justify-content-center equal text-justify" id="printtable">
                <br><br>
                <style>
                    .table-bordered td, .table-bordered th {
                        border: 1px solid #3a54a8;
                    }
                </style>
                <div class="col-12">
                    <table id="" class="table table-bordered dt-responsive nowrap text-left"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%; border: 5px solid #3a54a8">
                        <tr style="background-color: #3a54a8; color: white; font-weight: bold; text-align:center">
                            <td style="color: #fff" class="font-weight-bold">Code</td>
                            <td style="color: #fff" class="font-weight-bold">Name</td>
                            <td style="color: #fff" class="font-weight-bold">Email</td>
                            <td style="color: #fff" class="font-weight-bold">Project</td>
                            <td style="color: #fff" class="font-weight-bold">Date</td>
                            <td style="color: #fff" class="font-weight-bold">Current Status</td>
                            @if($employee->id == 5 || $employee->id == 384)
                                <td style="color: #fff" class="font-weight-bold">Entity</td>
                            @endif
                            <td style="color: #fff" class="font-weight-bold tbcontrol">Control</td>
                        </tr>
                        @if(isset($projects))
                            @foreach($projects as $finalApproval)
                                <tr>
                                    <td>{{$finalApproval->kpi->employee->empCode}}</td>
                                    <td>{{$finalApproval->kpi->employee->empName}}</td>
                                    <td>{{$finalApproval->kpi->employee->emailWork}}</td>
                                    <td>{{$finalApproval->kpi->employee->projectDepartmentName}}</td>
                                    <td>{{$finalApproval->kpi->Date}}</td>
                                    <td>
                                        @if($finalApproval->kpi->is_final_approval == 0 && $finalApproval->kpi->is_first_approval ==1 && $finalApproval->kpi->manager_count ==2)
                                            Pending At Final Approval
                                        @elseif($finalApproval->kpi->is_final_approval == 0 && $finalApproval->kpi->is_first_approval ==1 && $finalApproval->kpi->manager_count ==1)
                                            Evaluated
                                        @elseif($finalApproval->kpi->is_final_approval == 0 && $finalApproval->kpi->is_first_approval ==0)
                                            Pending At First Approval
                                        @elseif($finalApproval->kpi->is_final_approval == 1)
                                            Evaluated
                                        @endif

                                    </td>
                                    @if($employee->id == 5 || $employee->id == 384)
                                        <td>{{$finalApproval->kpi->employee->company->name}}</td>
                                    @endif
                                    <td class="tbcontrol">
                                        @if($finalApproval->is_final_approval == 0 && $finalApproval->is_first_approval ==1 && $finalApproval->manager_count ==2)
                                            <a href="{{route('employee.show_first_approval',['id'=>$finalApproval->kpi->id])}}"
                                               class="btn solid-btn pt-1 pb-1">
                                                Show
                                            </a>
                                        @elseif($finalApproval->kpi->is_final_approval == 0 && $finalApproval->kpi->is_first_approval ==1 && $finalApproval->kpi->manager_count ==2)
                                            <a href="{{route('employee.show_first_approval',['id'=>$finalApproval->kpi->id])}}"
                                               class="btn solid-btn pt-1 pb-1">
                                                Show
                                            </a>
                                        @elseif($finalApproval->kpi->is_final_approval == 0 && $finalApproval->kpi->is_first_approval ==1 && $finalApproval->kpi->manager_count ==1)
                                            <a href="{{route('employee.show_first_approval',['id'=>$finalApproval->kpi->id])}}"
                                               class="btn solid-btn pt-1 pb-1">
                                                Show
                                            </a>
                                        @elseif($finalApproval->kpi->is_final_approval == 0 && $finalApproval->kpi->is_first_approval ==0)
                                            <a href="{{route('employee.show_kpi_id',['id'=>$finalApproval->kpi->id])}}"
                                               class="btn solid-btn pt-1 pb-1">
                                                Show
                                            </a>
                                        @elseif($finalApproval->kpi->is_final_approval == 1)
                                            <a href="{{route('employee.show_final_approval',['id'=>$finalApproval->kpi->id])}}"
                                               class="btn solid-btn pt-1 pb-1">
                                                Show
                                            </a>
                                        @endif
                                        <a data-toggle="modal" data-target="#Delete{{$finalApproval->kpi->id}}"
                                           class="btn btn-danger pt-1 pb-1">
                                            Cancel
                                        </a>
                                        <div class="modal fade" id="Delete{{$finalApproval->kpi->id}}" tabindex="-1"
                                             aria-labelledby="exampleModalLabe{{$finalApproval->kpi->id}}"
                                             aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content ">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="exampleModalLabe{{$finalApproval->kpi->id}}">(KPI)
                                                            Cancellation Criteria</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form
                                                        action="{{route('employee.cancel_dashboard_approval',['id'=>$finalApproval->kpi->id])}}"
                                                        method="post">
                                                        @csrf
                                                        <input type="hidden" name="emp_id"
                                                               value="{{$finalApproval->kpi->employee->id}}">
                                                        <input type="hidden" name="kpi_id"
                                                               value="{{$finalApproval->kpi->id}}">
                                                        <div class="modal-body" style="text-align: left">
                                                            <h5>Here are six common reasons to cancel a KPI, and you can
                                                                select one or more as guides for employees to
                                                                improve:</h5>

                                                            <!-- Radio buttons for reasons -->
                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input" type="radio"
                                                                       name="cancelReason" id="reason1"
                                                                       value="Outdated: When the KPI is no longer aligned with the objectives.">
                                                                <label class="form-check-label" for="reason1">
                                                                    <b>Outdated:</b> When the KPI is no longer aligned
                                                                    with the objectives.
                                                                </label>
                                                            </div>

                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input" type="radio"
                                                                       name="cancelReason" id="reason2"
                                                                       value="Unclear Objectives: If the KPI lacks clear and well-defined objectives that can be effectively measured. ">
                                                                <label class="form-check-label" for="reason2">
                                                                    <b> Unclear Objectives:</b> If the KPI lacks clear
                                                                    and well-defined objectives that can be effectively
                                                                    measured.
                                                                </label>
                                                            </div>

                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input" type="radio"
                                                                       name="cancelReason" id="reason3"
                                                                       value="Unrealistic Results: When the expected results set for the KPI are impractical or require adjustments.">
                                                                <label class="form-check-label" for="reason3">
                                                                    <b> Unrealistic Results:</b> When the expected
                                                                    results set for the KPI are impractical or require
                                                                    adjustments.
                                                                </label>
                                                            </div>

                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input" type="radio"
                                                                       name="cancelReason" id="reason4"
                                                                       value="Incorrect Manager Approval: If the KPI was not approved or authorized by the responsible manager.">
                                                                <label class="form-check-label" for="reason4">
                                                                    <b> Incorrect Manager Approval:</b> If the KPI was
                                                                    not approved or authorized by the responsible
                                                                    manager.
                                                                </label>
                                                            </div>

                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input" type="radio"
                                                                       name="cancelReason" id="reason5"
                                                                       value="Need for Adjustments: When significant changes or modifications are required to make the KPI more effective or aligned with goals.">
                                                                <label class="form-check-label" for="reason5">
                                                                    <b>Need for Adjustments:</b> When significant
                                                                    changes or modifications are required to make the
                                                                    KPI more effective or aligned with goals.
                                                                </label>
                                                            </div>

                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input" type="radio"
                                                                       name="cancelReason" id="reason6"
                                                                       value="Weighting Update: If there is a need to change the importance or weighting assigned to the KPI in the overall evaluation.">
                                                                <label class="form-check-label" for="reason6">
                                                                    <b>Weighting Update:</b> If there is a need to
                                                                    change the importance or weighting assigned to the
                                                                    KPI in the overall evaluation.
                                                                </label>
                                                            </div>

                                                            <!-- Text area for Other Reasons -->
                                                            <div class="form-group mt-3">
                                                                <label for="otherReasons"><b>Other Reasons:</b>
                                                                    (Specify)</label>
                                                                <textarea class="form-control" name="specify"
                                                                          id="otherReasons" rows="3"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            {{--                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>--}}
                                                            <button class="btn btn-danger" type="submit">Delete</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            @foreach($finalApprovals as $finalApproval)
                                <tr>
                                    <td>{{$finalApproval->employee->empCode}}</td>
                                    <td>{{$finalApproval->employee->empName}}</td>
                                    <td>{{$finalApproval->employee->emailWork}}</td>
                                    <td>{{$finalApproval->employee->projectDepartmentName}}</td>
                                    <td>{{$finalApproval->Date}}</td>
                                    <td>
                                        @if($finalApproval->is_final_approval == 0 && $finalApproval->is_first_approval ==1 && $finalApproval->manager_count ==2)
                                            Pending At Final Approval
                                        @elseif($finalApproval->is_final_approval == 0 && $finalApproval->is_first_approval ==1 && $finalApproval->manager_count ==1)
                                            Evaluated
                                        @elseif($finalApproval->is_final_approval == 0 && $finalApproval->is_first_approval ==0)
                                            Pending At First Approval
                                        @elseif($finalApproval->is_final_approval == 1)
                                            Evaluated
                                        @endif
                                    </td>
                                    @if($employee->id == 5 || $employee->id == 384)
                                        <td>{{$finalApproval->employee->company->name}}</td>
                                    @endif
                                    <td class="tbcontrol">
                                        @if($finalApproval->is_final_approval == 0 && $finalApproval->is_first_approval ==1 && $finalApproval->manager_count ==2)
                                            <a href="{{route('employee.show_first_approval',['id'=>$finalApproval->id])}}"
                                               class="btn solid-btn pt-1 pb-1">
                                                Show
                                            </a>
                                        @elseif($finalApproval->is_final_approval == 0 && $finalApproval->is_first_approval ==1 && $finalApproval->manager_count ==1)
                                            <a href="{{route('employee.show_first_approval',['id'=>$finalApproval->id])}}"
                                               class="btn solid-btn pt-1 pb-1">
                                                Show
                                            </a>
                                        @elseif($finalApproval->is_final_approval == 0 && $finalApproval->is_first_approval ==0)
                                            <a href="{{route('employee.show_kpi_id',['id'=>$finalApproval->id])}}"
                                               class="btn solid-btn pt-1 pb-1">
                                                Show
                                            </a>
                                        @elseif($finalApproval->is_final_approval == 1)
                                            <a href="{{route('employee.show_final_approval',['id'=>$finalApproval->id])}}"
                                               class="btn solid-btn pt-1 pb-1">
                                                Show
                                            </a>
                                        @endif
                                        <a data-toggle="modal" data-target="#Delete{{$finalApproval->id}}"
                                           class="btn btn-danger pt-1 pb-1">
                                            Cancel
                                        </a>
                                        <div class="modal fade" id="Delete{{$finalApproval->id}}" tabindex="-1"
                                             aria-labelledby="exampleModalLabe{{$finalApproval->id}}"
                                             aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content ">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="exampleModalLabe{{$finalApproval->id}}">(KPI)
                                                            Cancellation Criteria</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form
                                                        action="{{route('employee.cancel_dashboard_approval',['id'=>$finalApproval->id])}}"
                                                        method="post">
                                                        @csrf
                                                        <input type="hidden" name="emp_id"
                                                               value="{{$finalApproval->employee->id}}">
                                                        <input type="hidden" name="kpi_id"
                                                               value="{{$finalApproval->id}}">
                                                        <div class="modal-body" style="text-align: left">
                                                            <h5>Here are six common reasons to cancel a KPI, and you can
                                                                select one or more as guides for employees to
                                                                improve:</h5>

                                                            <!-- Radio buttons for reasons -->
                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input" type="checkbox"
                                                                       name="cancelReason[]" id="reason1"
                                                                       value="Outdated: When the KPI is no longer aligned with the objectives.">
                                                                <label class="form-check-label" for="reason1">
                                                                    <b>Outdated:</b> When the KPI is no longer aligned
                                                                    with the objectives.
                                                                </label>
                                                            </div>

                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input" type="checkbox"
                                                                       name="cancelReason[]" id="reason2"
                                                                       value="Unclear Objectives: If the KPI lacks clear and well-defined objectives that can be effectively measured. ">
                                                                <label class="form-check-label" for="reason2">
                                                                    <b> Unclear Objectives:</b> If the KPI lacks clear
                                                                    and well-defined objectives that can be effectively
                                                                    measured.
                                                                </label>
                                                            </div>

                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input" type="checkbox"
                                                                       name="cancelReason[]" id="reason3"
                                                                       value="Unrealistic Results: When the expected results set for the KPI are impractical or require adjustments.">
                                                                <label class="form-check-label" for="reason3">
                                                                    <b> Unrealistic Results:</b> When the expected
                                                                    results set for the KPI are impractical or require
                                                                    adjustments.
                                                                </label>
                                                            </div>

                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input" type="checkbox"
                                                                       name="cancelReason[]" id="reason4"
                                                                       value="Incorrect Manager Approval: If the KPI was not approved or authorized by the responsible manager.">
                                                                <label class="form-check-label" for="reason4">
                                                                    <b> Incorrect Manager Approval:</b> If the KPI was
                                                                    not approved or authorized by the responsible
                                                                    manager.
                                                                </label>
                                                            </div>

                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input" type="checkbox"
                                                                       name="cancelReason[]" id="reason5"
                                                                       value="Need for Adjustments: When significant changes or modifications are required to make the KPI more effective or aligned with goals.">
                                                                <label class="form-check-label" for="reason5">
                                                                    <b>Need for Adjustments:</b> When significant
                                                                    changes or modifications are required to make the
                                                                    KPI more effective or aligned with goals.
                                                                </label>
                                                            </div>

                                                            <div class="form-check mb-2">
                                                                <input class="form-check-input" type="checkbox"
                                                                       name="cancelReason[]" id="reason6"
                                                                       value="Weighting Update: If there is a need to change the importance or weighting assigned to the KPI in the overall evaluation.">
                                                                <label class="form-check-label" for="reason6">
                                                                    <b>Weighting Update:</b> If there is a need to
                                                                    change the importance or weighting assigned to the
                                                                    KPI in the overall evaluation.
                                                                </label>
                                                            </div>

                                                            <!-- Text area for Other Reasons -->
                                                            <div class="form-group mt-3">
                                                                <label for="otherReasons"><b>Other Reasons:</b>
                                                                    (Specify)</label>
                                                                <textarea class="form-control" name="specify"
                                                                          id="otherReasons" rows="3"
                                                                          required></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            {{--                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>--}}
                                                            <button class="btn btn-danger" type="submit">Cancel KPI
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                    @if(isset($projects))

                    @else
                        {{$finalApprovals->links()}}
                    @endif


                    <p class="form-message"></p>
                </div>
            </div>
        </div>
    </section>

    <!--promo section end-->

    <div id="deleteModel"></div>
@endsection

@section('footer')
    <!--footer section start-->
    <footer class="footer-section">
        <!--footer top start-->
        <div class="footer-top background-img-2">

            <!--footer bottom copyright start-->
            <div class="footer-bottom border-gray-light py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="copyright-wrap small-text">
                                <p class="mb-0 text-white">© Mohamed Mahrous, All rights reserved</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--footer bottom copyright end-->
        </div>
        <!--footer top end-->
    </footer>
    <!--footer section end-->
@endsection
@section('script')
    <script>
        function printdata() {
            var appBanners = document.getElementsByClassName('tbcontrol');

            for (var i = 0; i < appBanners.length; i++) {
                appBanners[i].style.display = 'none';
            }
            var mywindow = window.open('', 'PRINT', 'height=400,width=600');
            mywindow.document.write('<html><head><title>HR Platform Ensrv </title></head><body>');
            mywindow.document.write('<br><br><h3 style="text-align:center">KPI Report</h3>');
            mywindow.document.write(document.getElementById('printtable').innerHTML);
            mywindow.document.write('</body></html>');
            mywindow.document.close();
            mywindow.focus();
            mywindow.print();
            mywindow.close();

            for (var i = 0; i < appBanners.length; i++) {
                appBanners[i].style.display = 'block';
            }
            return true;

        }

        function printdatasta() {
            var appBanners = document.getElementsByClassName('tbcontrol');

            for (var i = 0; i < appBanners.length; i++) {
                appBanners[i].style.display = 'none';
            }
            var mywindow = window.open('', 'PRINT', 'height=400,width=600');
            mywindow.document.write('<html><head><title>HR Platform Ensrv </title></head><body>');
            mywindow.document.write('<br><br><h3 style="text-align:center">KPI Report</h3>');
            mywindow.document.write(document.getElementById('countprint').innerHTML);
            mywindow.document.write('</body></html>');
            mywindow.document.close();
            mywindow.focus();
            mywindow.print();
            mywindow.close();

            for (var i = 0; i < appBanners.length; i++) {
                appBanners[i].style.display = 'block';
            }
            return true;

        }
    </script>
@endsection
