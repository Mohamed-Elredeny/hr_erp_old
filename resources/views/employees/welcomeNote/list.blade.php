@extends('layouts.site')
@section('content')
    <?php
    $visited = [];
    $new_visited = [];
    ?>
    <style>
        .background-img:before {
            background-color: transparent;
            background-image: linear-gradient(to right, rgba(47, 47, 47, 0.85), rgba(47, 47, 47, 0.85));
        }

    </style>
    <!--hero section start-->
    <section class="hero-section  background-img"
             style="background: url('{{asset("assets/site/img/hero-bg-1.jpg")}}')no-repeat center center / cover">
        <div class="container containerx ">
            <div class="row align-items-center justify-content-between py-5">
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="hero-content-left text-white">
                        <h1 class="text-white fw-bold">
                            Welcome Note
                        </h1>
                        <p class="lead">
                            <a class="text-light" href="{{route('employee.home')}}">Home / </a> Welcome Note Board
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
            <div class="row justify-content-right">
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

                    <div class="text-right mb-5">
                        <a href="{{route('employee.welcomeNote.create')}}" type="button" class="btn solid-btn"
                           target="_blank">
                            <h5 class="pt-2">
                                Add New Employee
                            </h5>

                        </a>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">

                <div class="col-12">


                    <div class="section-heading text-center mb-5">
                        <h2 style="color: #3a54a8">Welcome Note Board</h2>
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

                .btn-edit {
                    box-shadow: 0 5px 12px 0 #3a54a8;
                    background: #3a54a8;
                    border: 2px solid #3a54a8;
                    border-radius: 30px;
                    margin-top: 5px;
                    color: white !important;
                }

                .search-btn {
                    box-shadow: 0 5px 12px 0 #3a54a8;
                    background: white !important;
                    border: 2px solid #3a54a8;
                    border-radius: 30px;
                    margin-top: 5px;
                }
            </style>

            <div class="row mb-3" dir="rtl">
                <div class="col-3 text-right">
                    <button type="button" class="btn solid-btn" onclick="printdatasta()">
                        View Policy
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
                            <td style="color: #fff" class="font-weight-bold">Pending Approval</td>
                            <td style="color: #fff" class="font-weight-bold">Evaluated</td>
                            <td style="color: #fff" class="font-weight-bold">Canceled</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>{{$statistics['all0']}}</td>
                            <td>{{$statistics['pendingApproved0']}}</td>
                            <td>{{$statistics['evaluted0']}}</td>
                            <td>{{$statistics['canceled0']}}</td>
                        </tr>
                        @foreach($companies as $company)
                            <tr>
                                <td>{{$company->name}}</td>
                                <td>{{$statistics['all' . $company->id]}}</td>
                                <td>{{$statistics['pendingApproved' . $company->id]}}</td>
                                <td>{{$statistics['evaluted' . $company->id]}}</td>
                                <td>{{$statistics['canceled' . $company->id]}}</td>
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>
            @if($employee->welcomeNote != 'employee' && $employee->welcomeNote != null && $employee->welcomeNote != '')
                <div class="row">
                    <div class="col-sm-12">
                        <button type="button" class="btn solid-btn" id="show_manage_requests">
                            Manage Requests
                        </button>
                        <button type="button" class="btn outline-solid-btn" id="show_my_requests">
                            My Requests
                        </button>

                    </div>
                    <div class="col-12 text-right">
                        <button type="button" class="btn solid-btn" onclick="printdata()">
                            Print
                        </button>

                    </div>


                </div>
            @endif


            <div class="row mt-2 g-4 justify-content-center equal text-justify" id="printtable">
                <br><br>
                <style>
                    .table-bordered td, .table-bordered th {
                        border: 1px solid #3a54a8;
                    }
                </style>
                <div class="col-12" id="i_am_the_sender">
                    <table class="table table-bordered dt-responsive nowrap text-left"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%; border: 5px solid #3a54a8">
                        <tr style="background-color: #3a54a8; color: white; font-weight: bold; text-align:center">
                            <td style="color: #fff" class="font-weight-bold">Type</td>
                            <td style="color: #fff" class="font-weight-bold">Code</td>
                            <td style="color: #fff" class="font-weight-bold">Name</td>
                            <td style="color: #fff" class="font-weight-bold">Entity</td>
                            <td style="color: #fff" class="font-weight-bold">Date</td>
                            <td style="color: #fff" class="font-weight-bold">Status</td>
                            <td style="color: #fff" class="font-weight-bold">Receivers</td>
                            <td style="color: #fff;width: 150px" class="font-weight-bold tbcontrol">Control</td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="8">
                                <input class="col-sm-9 btn search-btn filterInput" type="text"
                                       placeholder="Search for your employees">
                            </td>
                        </tr>
                        @foreach($requests as $welcome_request)
                            @if(!in_array( $welcome_request->request_id,$visited))
                                @if($welcome_request->employeeSender->id == auth()->user()->id)
                                    <?php
                                    $actual_results = \App\Models\WelcomeNoteRequest::where('request_id', $welcome_request->request_id)->get();
                                    ?>
                                    <tr class="text-center justify-content-center filter_row">
                                        <td>
                                            @if($welcome_request->type == 'workers')
                                                {{'Worker'}}
                                            @elseif($welcome_request->type == 'staff')
                                                {{'Employee'}}
                                            @endif
                                        </td>
                                        <td>
                                            {{$welcome_request->newemployee->empCode ?? 'not exist'}}
                                        </td>
                                        <td>
                                            {{$welcome_request->newemployee->empName}}
                                        </td>
                                        <td>
                                            {{$welcome_request->newemployee->company->name}}
                                        </td>

                                        <td>
                                            {{$welcome_request->created_at}}
                                        </td>

                                        <td>
                                            <?php
                                            $all_states = $actual_results->pluck('status')->toArray();
                                            $pending_status = 0;
                                            $accepted_status = 0;
                                            $canceled_status = 0;
                                            $refused_status = 0;
                                            $current_status = 'pending';
                                            ?>
                                            @foreach($all_states as $state)
                                                @if($state == 'pending')
                                                    <?php $pending_status++; ?>
                                                @elseif($state == 'accepted')
                                                    <?php $accepted_status++; ?>
                                                @elseif($state == 'canceled')
                                                    <?php $canceled_status++; ?>
                                                @elseif($state == 'refused')
                                                    <?php $refused_status++; ?>
                                                @endif
                                            @endforeach

                                            @if($pending_status == count($all_states))
                                                <?php $current_status = 'pending';?>
                                            @elseif($accepted_status == count($all_states))
                                                <?php $current_status = 'accepted';?>

                                            @elseif($canceled_status == count($all_states))
                                                <?php $current_status = 'canceled';?>

                                            @elseif($refused_status == count($all_states))
                                                <?php $current_status = 'refused';?>
                                            @else
                                                <?php $current_status = 'waiting all approves';?>
                                            @endif
                                            {{$current_status}}
                                        </td>

                                        <td>
                                            <?php $couni = 1; ?>
                                            @foreach($actual_results as $acres)
                                                {{$couni . ': '.  $acres->employeeReceiver->empName . ' - ' . $acres->employeeReceiver->empCode . ' - ' .  $acres->status}}
                                                <br>
                                                <?php $couni++; ?>
                                            @endforeach

                                        </td>
                                        <td class="tbcontrol">


                                            @if($current_status == 'accepted')
                                                <form action="{{route('employee.welcomeNote.index')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$welcome_request->id}}">
                                                    <input type="hidden" name="manager" value="0">
                                                    <button class="btn btn-success pt-1 pb-1"
                                                            style="background: #0c7b25;width: 100px;border-radius: 20px">
                                                        View Note
                                                    </button>
                                                </form>

                                            @else
                                                <a data-toggle="modal" data-target="#Cancel1{{$welcome_request->id}}"
                                                   class="btn btn-warning pt-1 pb-1"
                                                   style="width: 100px;border-radius: 20px">
                                                    Reasons
                                                </a>
                                                <a data-toggle="modal" data-target="#Delete1{{$welcome_request->id}}"
                                                   class="btn btn-danger pt-1 pb-1" style="width: 100px">
                                                    Cancel
                                                </a>
                                                <a target="_blank"
                                                   href="{{route('employee.welcomeNote.edit',['id'=>$welcome_request->newemployee->id])}}"
                                                   class="btn btn-edit pt-1 pb-1" style="width: 100px">
                                                    update
                                                </a>

                                            @endif


                                            <div class="modal fade" id="Delete1{{$welcome_request->id}}" tabindex="-1"
                                                 aria-labelledby="exampleModalLabe{{$welcome_request->id}}"
                                                 aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content ">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="exampleModalLabe{{$welcome_request->id}}">(Welcome
                                                                Note)
                                                                Cancellation Criteria</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form
                                                            action={{route('employee.welcomeNote.changeState',['id'=>$welcome_request->id,'status'=>'canceled',1]) }}
                                                                method="post">
                                                            @csrf

                                                            <div class="modal-body" style="text-align: left">
                                                                <h5>Here are 3 reasons to cancel a welcome note, and you
                                                                    can select one or more as guides for the recruitment
                                                                    department to update :
                                                                </h5>

                                                                <!-- Radio buttons for reasons -->
                                                                <div class="form-check mb-2">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="cancelReason" id="reason1"
                                                                           value="Update Allocation: When the KPI is no longer aligned with the objectives.">
                                                                    <label class="form-check-label" for="reason1">
                                                                        <b>Update Allocation:</b> To reallocate the
                                                                        employee to a different department or project.
                                                                    </label>
                                                                </div>

                                                                <div class="form-check mb-2">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="cancelReason" id="reason2"
                                                                           value="Request for More Details: If the welcome note was issued without obtaining proper authorizaion ">
                                                                    <label class="form-check-label" for="reason2">
                                                                        <b>Request for More Details:</b> If the welcome
                                                                        note was issued without obtaining proper
                                                                        authorizaion
                                                                    </label>
                                                                </div>

                                                                <div class="form-check mb-2">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="cancelReason" id="reason3"
                                                                           value="Adjustments Needed: When significant changes in the welcome note are required to reflect the current role, department, or company policies.">
                                                                    <label class="form-check-label" for="reason3">
                                                                        <b>Adjustments Needed:</b> When significant
                                                                        changes in the welcome note are required to
                                                                        reflect the current role, department, or company
                                                                        policies.

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
                                                                <button class="btn btn-danger" type="submit">submit
                                                                </button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="Cancel1{{$welcome_request->id}}" tabindex="-1"
                                                 aria-labelledby="exampleModalLabe{{$welcome_request->id}}"
                                                 aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content ">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="exampleModalLabe{{$welcome_request->id}}">
                                                                Cancellation Reason</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>


                                                        <div class="modal-body" style="text-align: left">
                                                            <h5>

                                                                @if($welcome_request->cancellation_reasons == "")
                                                                    {{"no reasons"}}
                                                                @else
                                                                    {{$welcome_request->cancellation_reasons}}
                                                                @endif
                                                            </h5>


                                                        </div>


                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                @endif
                                <?php $visited[] = $welcome_request->request_id; ?>
                            @endif
                        @endforeach

                    </table>
                    @if(isset($projects))

                    @else
                        {{-- {{$finalApprovals->links()}}--}}
                    @endif


                    <p class="form-message"></p>
                </div>
                <div class="col-12" id="i_am_the_receiver">
                    <table class="table table-bordered dt-responsive nowrap text-left"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%; border: 5px solid #3a54a8">
                        <tr style="background-color: #3a54a8; color: white; font-weight: bold; text-align:center">
                            <td style="color: #fff" class="font-weight-bold">Type</td>
                            <td style="color: #fff" class="font-weight-bold">Code</td>
                            <td style="color: #fff" class="font-weight-bold">Name</td>
                            <td style="color: #fff" class="font-weight-bold">Entity</td>
                            <td style="color: #fff" class="font-weight-bold">Date</td>
                            <td style="color: #fff" class="font-weight-bold">Status</td>
                            <td style="color: #fff" class="font-weight-bold">Other Receivers</td>
                            <td style="color: #fff" class="font-weight-bold">Sender</td>
                            <td style="color: #fff;width: 150px" class="font-weight-bold tbcontrol">Control</td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="9">
                                <input class="col-sm-9 btn search-btn filterInput" type="text"
                                       placeholder="Search for your employees">
                            </td>
                        </tr>
                        @foreach($requests as $welcome_request)
                            @if(!in_array( $welcome_request->request_id,$new_visited))
                                @if($welcome_request->employeeReceiver->id == auth()->user()->id)
                                    <?php
                                    $actual_results = \App\Models\WelcomeNoteRequest::where('request_id', $welcome_request->request_id)->get();
                                    ?>
                                    <tr class="text-center justify-content-center filter_row">
                                        <td>
                                            @if($welcome_request->type == 'workers')
                                                {{'Worker'}}
                                            @elseif($welcome_request->type == 'staff')
                                                {{'Employee'}}
                                            @endif
                                        </td>
                                        <td>
                                            {{$welcome_request->newemployee->empCode ?? 'not exist'}}
                                        </td>
                                        <td>
                                            {{$welcome_request->newemployee->empName}}
                                        </td>
                                        <td>
                                            {{$welcome_request->newemployee->company->name}}
                                        </td>

                                        <td>
                                            {{$welcome_request->created_at}}
                                        </td>

                                        <td>
                                            <?php
                                            $all_states = $actual_results->pluck('status')->toArray();
                                            $pending_status = 0;
                                            $accepted_status = 0;
                                            $canceled_status = 0;
                                            $refused_status = 0;
                                            $current_status = 'pending';
                                            ?>
                                            @foreach($all_states as $state)
                                                @if($state == 'pending')
                                                    <?php $pending_status++; ?>
                                                @elseif($state == 'accepted')
                                                    <?php $accepted_status++; ?>
                                                @elseif($state == 'canceled')
                                                    <?php $canceled_status++; ?>
                                                @elseif($state == 'refused')
                                                    <?php $refused_status++; ?>
                                                @endif
                                            @endforeach

                                            @if($pending_status == count($all_states))
                                                <?php $current_status = 'pending';?>
                                            @elseif($accepted_status == count($all_states))
                                                <?php $current_status = 'accepted';?>

                                            @elseif($canceled_status == count($all_states))
                                                <?php $current_status = 'canceled';?>

                                            @elseif($refused_status == count($all_states))
                                                <?php $current_status = 'refused';?>
                                            @else
                                                <?php $current_status = 'waiting all approves';?>
                                            @endif
                                            {{$current_status}}
                                        </td>

                                        <td>
                                            <?php $couni = 1; ?>
                                            @foreach($actual_results as $acres)
                                                @if($acres->employeeReceiver->id != auth()->user()->id)
                                                    {{$couni . ': '.  $acres->employeeReceiver->empName . ' - ' . $acres->employeeReceiver->empCode . ' - ' .  $acres->status}}
                                                    <br>
                                                @else
                                                    {{ $couni .  ': '. " You " .  $acres->status}}
                                                    <br>
                                                @endif
                                                <?php $couni++; ?>

                                            @endforeach

                                        </td>
                                        <td>
                                            {{ $acres->employeeSender->empName . ' - ' . $acres->employeeSender->empCode}}
                                        </td>
                                        <td class="tbcontrol">

                                            @if($current_status == 'accepted')

                                                <a data-toggle="modal" data-target="#Delete{{$welcome_request->id}}"
                                                   class="btn btn-danger pt-1 pb-1">
                                                    Refused
                                                </a>
                                            @else
                                                <a data-toggle="modal" data-target="#Cancel{{$welcome_request->id}}"
                                                   class="btn btn-warning pt-1 pb-1"
                                                   style="width: 100px;border-radius: 20px">
                                                    Reasons
                                                </a>
                                                {{--                                                <a href="{{route('employee.welcomeNote.changeState',['id'=>$welcome_request->id,'status'=>'accepted',0])}}"--}}
                                                {{--                                                   class="btn btn-edit pt-1 pb-1" style="width: 100px;">--}}
                                                {{--                                                    Approve--}}
                                                {{--                                                </a>--}}

                                            @endif

                                                <form action="{{route('employee.welcomeNote.index')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$welcome_request->id}}">
                                                    <input type="hidden" name="manager" value="1">
                                                    <button class="btn btn-success pt-1 pb-1"
                                                            style="background: #0c7b25;width: 120px;border-radius: 20px">
                                                        Manage Note
                                                    </button>
                                                </form>


                                            <div class="modal fade" id="Delete{{$welcome_request->id}}" tabindex="-1"
                                                 aria-labelledby="exampleModalLabe{{$welcome_request->id}}"
                                                 aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content ">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="exampleModalLabe{{$welcome_request->id}}">(Welcome
                                                                Note)
                                                                Cancellation Criteria</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form
                                                            action={{route('employee.welcomeNote.changeState',['id'=>$welcome_request->id,'status'=>'refused',0]) }}
                                                                method="post">
                                                            @csrf

                                                            <div class="modal-body" style="text-align: left">
                                                                <h5>Here are 3 reasons to cancel a welcome note, and you
                                                                    can select one or more as guides for the recruitment
                                                                    department to update :
                                                                </h5>

                                                                <!-- Radio buttons for reasons -->
                                                                <div class="form-check mb-2">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="cancelReason" id="reason1"
                                                                           value="Update Allocation: When the KPI is no longer aligned with the objectives.">
                                                                    <label class="form-check-label" for="reason1">
                                                                        <b>Update Allocation:</b> To reallocate the
                                                                        employee to a different department or project.
                                                                    </label>
                                                                </div>

                                                                <div class="form-check mb-2">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="cancelReason" id="reason2"
                                                                           value="Request for More Details: If the welcome note was issued without obtaining proper authorizaion ">
                                                                    <label class="form-check-label" for="reason2">
                                                                        <b>Request for More Details:</b> If the welcome
                                                                        note was issued without obtaining proper
                                                                        authorizaion
                                                                    </label>
                                                                </div>

                                                                <div class="form-check mb-2">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="cancelReason" id="reason3"
                                                                           value="Adjustments Needed: When significant changes in the welcome note are required to reflect the current role, department, or company policies.">
                                                                    <label class="form-check-label" for="reason3">
                                                                        <b>Adjustments Needed:</b> When significant
                                                                        changes in the welcome note are required to
                                                                        reflect the current role, department, or company
                                                                        policies.

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
                                                                <button class="btn btn-danger" type="submit">Submit
                                                                </button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="Cancel{{$welcome_request->id}}" tabindex="-1"
                                                 aria-labelledby="exampleModalLabe{{$welcome_request->id}}"
                                                 aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="exampleModalLabe{{$welcome_request->id}}">
                                                                Cancellation Reason</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>


                                                        <div class="modal-body" style="text-align: left">
                                                            <h5>
                                                                @if($welcome_request->cancellation_reasons == "")
                                                                    {{"no reasons"}}
                                                                @else
                                                                    {{$welcome_request->cancellation_reasons}}
                                                                @endif
                                                            </h5>

                                                        </div>
                                                    </div>


                                                </div>
                                            </div>


                                        </td>
                                    </tr>
                                @endif
                                <?php $new_visited[] = $welcome_request->request_id; ?>
                            @endif
                        @endforeach

                    </table>
                    @if(isset($projects))

                    @else
                        {{-- {{$finalApprovals->links()}}--}}
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

        $(document).ready(function () {
            @if($employee->welcomeNote != 'employee' && $employee->welcomeNote != null && $employee->welcomeNote != '')

            $('#i_am_the_sender').css('display', 'none');
            $('#i_am_the_receiver').css('display', 'block');
            @else

            $('#i_am_the_sender').css('display', 'block');
            $('#i_am_the_receiver').css('display', 'none');
            @endif
            $('#show_my_requests').on('click', function () {
                $('#i_am_the_sender').css('display', 'block');
                $('#i_am_the_receiver').css('display', 'none');


                $('#show_manage_requests').removeClass('solid-btn');
                $('#show_my_requests').addClass('solid-btn');
            });

            $('#show_manage_requests').on('click', function () {
                $('#i_am_the_sender').css('display', 'none');
                $('#i_am_the_receiver').css('display', 'block');

                $('#show_my_requests').removeClass('solid-btn');
                $('#show_manage_requests').addClass('solid-btn');

            });
        })

        function printDiv(divId) {
            // Get the div element by ID
            var printableDiv = document.getElementById(divId);
            // Check if the div exists
            if (printableDiv) {
                // Use html2pdf library to convert the div to PDF

                html2pdf(printableDiv, {
                    margin: 0,
                    filename: 'myPrintableDiv.pdf',
                    image: {type: 'jpeg', quality: 0.98},
                    html2canvas: {scale: 2},
                    jsPDF: {unit: 'mm', format: 'a4', orientation: 'portrait'}
                });

            } else {
                console.error('Div with ID ' + divId + ' not found.');
            }

        }
    </script>
@endsection
