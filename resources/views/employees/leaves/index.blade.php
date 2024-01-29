@extends('layouts.site')
@section('content')
    <?php
    $visited = [];
    $new_visited = [];


    ?>
    <style>
        .background-img:before {
            background-color: transparent;
            background-image: linear-gradient(to right, rgba(47, 47, 47, 0.4), rgba(47, 47, 47, 0.85));
        }

    </style>
    <!--hero section start-->
    <section class="hero-section  background-img"
             style="background: url('{{asset("assets/site/img/leave.jpg")}}')no-repeat center center / cover;height: 150px">
        <div class="container containerx ">
            <div class="row align-items-center justify-content-between py-5">
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="hero-content-left text-white">
                        <h1 class="text-white fw-bold">
                            <p class="lead" style="color:white!important">
                                <a class="text-light" style="color:white!important" href="{{route('employee.home')}}">Home
                                    / </a> Manage Leaves Board
                            </p>
                        </h1>

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
    <div class="col-sm-12  p-3 text-left">
        <div class="row">
            <form class="col-12 text-left" action="{{route('employee.leaves.index')}}" method="get">
                <br>
                Stage
                <select name="stage" style="width:220px">
                    <option value="all" @if(isset($_GET['stage']) &&  $_GET['stage'] == 'all') selected @endif>all
                    </option>
                    @foreach($states as $key => $value)
                        @if(!in_array($key,['gmApproval','approved','DepartmentApproval']))
                            <option
                                value="{{$key}}"
                                @if(isset($_GET['stage']) &&  $_GET['stage'] == $key) selected @endif>{{$value}}</option>
                        @endif
                    @endforeach
                </select>
                Status
                <select name="status" style="width:80px">
                    <option value="all" @if(isset($_GET['status']) &&  $_GET['status'] == 'all') selected @endif>all
                    </option>
                    <option value="pending"
                            @if(isset($_GET['status']) &&  $_GET['status'] == 'pending') selected @endif>pending
                    </option>
                    <option value="approved"
                            @if(isset($_GET['status']) &&  $_GET['status'] == 'approved') selected @endif>approved
                    </option>
                    <option value="rejected"
                            @if(isset($_GET['status']) &&  $_GET['status'] == 'rejected') selected @endif>rejected
                    </option>
                    <option value="cancelled"
                            @if(isset($_GET['status']) &&  $_GET['status'] == 'cancelled') selected @endif>cancelled
                    </option>
                </select>
                From
                <input type="date" name="from" @if(isset($_GET['from'])) value="{{$_GET['from']}}" @endif>
                To
                <input type="date" name="to" @if(isset($_GET['to'])) value="{{$_GET['to']}}" @endif>
                Created
                <input type="date" name="created" @if(isset($_GET['created'])) value="{{$_GET['created']}}" @endif>
                <input name="search" type="text" style="width:200px"
                       placeholder="Search with emp Name , Code , Designation"
                       @if(isset($_GET['search'])) value="{{$_GET['search']}}" @endif>
                <button type="submit" class="p-1 ml-1 btn-primary h5" style="">
                    Apply Filter
                </button>
                <a href="{{route('employee.leaves.index')}}" class="p-1 ml-1 btn-danger h5" style="border-radius: 10px">
                    Reset
                </a>
            </form>
        </div>

    </div>

    <!--hero section end-->

    <!--promo section start-->
    <section class="promo-section" style="height:100%;position:relative;">
        <div class="p-3 text-center">
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
                    border: 1px solid #000;
                }

                .form-control {
                    border-color: #000;
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
                    box-shadow: 0 5px 12px 0 #000;
                    background: #000;
                    border: 2px solid #000;
                    border-radius: 30px;
                    margin-top: 5px;
                    color: white !important;
                }

                .search-btn {
                    box-shadow: 0 5px 12px 0 #000;
                    background: white !important;
                    border: 2px solid #000;
                    border-radius: 30px;
                    margin-top: 5px;
                }
            </style>
            <div class="row g-4 justify-content-center equal text-justify" id="countprint">
                <style>
                    .table-bordered td, .table-bordered th {
                        border: 1px solid #000;
                    }
                </style>

            </div>
            <div class="container row">
                <div class="col-2 text-right">
                    <button class="btn btn-primary" onclick="openWindow()">
                        View Policy
                    </button>
                </div>

                <div class="col-sm-8">
                    <button type="button" class="btn btn-primary" id="show_manage_requests">
                        Manage Leaves
                    </button>
                    <button type="button" class="btn outline-btn-primary" id="show_my_requests">
                        My Leaves
                    </button>

                </div>
                <div class="col-sm-2 text-right mb-1">
                    <a href="{{route('employee.leaves.create')}}" type="button" class="btn btn-primary h5"
                       target="_blank" style="width: 200px;">
                        New Leave Application

                    </a>
                </div>

            </div>
            <div class="row mt-2 g-4 justify-content-center equal text-justify" id="printtable">
                <br><br>
                <style>
                    .table-bordered td, .table-bordered th {
                        border: 1px solid #000;
                    }

                    .table {
                        font-size: 14px !important
                    }
                </style>
                <div class="col-12" id="i_am_the_sender">
                    <table class="table table-bordered dt-responsive nowrap text-left"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%; border: 5px solid #000;">
                        <tr style="background-color: #000; font-weight: bold; text-align:center">
                            <td style="color: #fff" class="font-weight-bold">EmpCode</td>
                            <td style="color: #fff" class="font-weight-bold">Name</td>
                            <td style="color: #fff" class="font-weight-bold">Designation</td>
                            {{--
                                                        <td style="color: #fff" class="font-weight-bold">Department</td>
                            --}}
                            <td style="color: #fff" class="font-weight-bold">Leave Type</td>
                            <td style="color: #fff;width: 100px" class="font-weight-bold">From</td>
                            <td style="color: #fff;width: 100px" class="font-weight-bold">To</td>
                            <td style="color: #fff" class="font-weight-bold">Days</td>
                            <td style="color: #fff;width: 100px" class="font-weight-bold">Created</td>
                            <td style="color: #fff" class="font-weight-bold">Stage</td>
                            <td style="color: #fff" class="font-weight-bold">Status</td>

                            <td style="color: #fff;width: 150px" class="font-weight-bold tbcontrol">Control</td>
                        </tr>

                        @foreach($leaves as $leave)
                            <?php

                            $extraInfo = explode('|', $leave['extraInfo']);
                            ?>

                            <tr class="text-center">

                                <td>
                                    {{$leave->employee->empCode}}
                                </td>
                                <td>
                                    {{$leave->employee->empName}}
                                </td>
                                <td>
                                    {{$leave->employee->designation}}

                                </td>
                                {{--  <td>
                                      {{$leave->employee->projectDepartmentName}}

                                  </td>--}}
                                <td>
                                    {{$leave->type->name}}
                                </td>
                                <td>
                                    {{ date('d-m-Y', strtotime($extraInfo[0]))}}
                                </td>
                                <td>
                                    {{ date('d-m-Y', strtotime($extraInfo[1]))}}
                                </td>
                                <td>
                                    {{$extraInfo[2]}}
                                </td>
                                <td>
                                    {{ date('d-m-Y', strtotime($leave->created_at))}}
                                </td>

                                <td>
                                    {{$states[$leave->next_stage()]}}

                                </td>

                                <td>
                                    <span
                                        class="btn @if($leave->getStageStatus($leave->next_stage()) == 'approved') badge-success @elseif($leave->getStageStatus($leave->next_stage()) == 'cancelled' || $leave->getStageStatus($leave->next_stage()) == 'rejected') badge-danger @else badge-warning @endif text-white">
                                            {{$leave->getStageStatus($leave->next_stage())}}
                                        </span>

                                </td>
                                <td class="h4">
                                    <a class="btn btn-primary pt-1 pb-1" style="width: 100px;border-radius: 20px"
                                       href="{{route('employee.leaves.show',['leaf'=>$leave->id])}}">
                                        Track
                                    </a>


                                    <div class="modal fade" id="Delete1{{$leave->id}}" tabindex="-1"
                                         aria-labelledby="exampleModalLabe{{$leave->id}}"
                                         aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="exampleModalLabe{{$leave->id}}">(Welcome
                                                        Note)
                                                        Cancellation Criteria</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form
                                                    action={{route('employee.welcomeNote.changeState',['id'=>$leave->id,'status'=>'canceled',1]) }}
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
                                                        <button class="btn btn-danger" type="submit">submit
                                                        </button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="Cancel1{{$leave->id}}" tabindex="-1"
                                         aria-labelledby="exampleModalLabe{{$leave->id}}"
                                         aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="exampleModalLabe{{$leave->id}}">
                                                        Cancellation Reason</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>


                                                <div class="modal-body" style="text-align: left">
                                                    <h5>

                                                        @if($leave->cancellation_reasons == "")
                                                            {{"no reasons"}}
                                                        @else
                                                            {{$leave->cancellation_reasons}}
                                                        @endif
                                                    </h5>


                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                </td>


                            </tr>
                        @endforeach

                    </table>
                    <p class="form-message"></p>
                </div>
                <div class="col-12" id="i_am_the_receiver">
                    <table class="table table-bordered dt-responsive nowrap text-left"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%; border: 5px solid #000">
                        <tr style="background-color: #000; color: white; font-weight: bold; text-align:center">
                            <td style="color: #fff" class="font-weight-bold">EmpCode</td>
                            <td style="color: #fff" class="font-weight-bold">Name</td>
                            <td style="color: #fff" class="font-weight-bold">Designation</td>
                            {{--
                                                        <td style="color: #fff" class="font-weight-bold">Department</td>
                            --}}
                            <td style="color: #fff" class="font-weight-bold">Leave Type</td>
                            <td style="color: #fff;width: 100px" class="font-weight-bold">From</td>
                            <td style="color: #fff;width: 100px" class="font-weight-bold">To</td>
                            <td style="color: #fff" class="font-weight-bold">Days</td>
                            <td style="color: #fff;width: 100px" class="font-weight-bold">Created</td>

                            <td style="color: #fff" class="font-weight-bold">Stage</td>
                            <td style="color: #fff" class="font-weight-bold">Status</td>

                            <td style="color: #fff;width: 50px" class="font-weight-bold tbcontrol">Control</td>
                        </tr>
                        @foreach($responsible_leaves as $leave)
                            <?php

                            $extraInfo = explode('|', $leave['extraInfo']);
                            ?>
                            <tr class="text-center">
                                <td>
                                    {{$leave->employee->empCode}}
                                </td>
                                <td>
                                    {{$leave->employee->empName}}
                                </td>
                                <td>
                                    {{$leave->employee->designation}}

                                </td>
                                {{-- <td>
                                     {{$leave->employee->projectDepartmentName}}

                                 </td>--}}
                                <td>
                                    {{$leave->type->name}}
                                </td>
                                <td>
                                    {{ date('d-m-Y', strtotime($extraInfo[0]))}}
                                </td>
                                <td>
                                    {{ date('d-m-Y', strtotime($extraInfo[1]))}}
                                </td>
                                <td>
                                    {{$extraInfo[2]}}
                                </td>
                                <td>
                                    {{ date('d-m-Y', strtotime($leave->created_at))}}
                                </td>

                                <td>
                                    {{$states[$leave->next_stage()]}}

                                </td>

                                <td>
                                        <span
                                            class="btn @if($leave->getStageStatus($leave->next_stage()) == 'approved') badge-success @elseif($leave->getStageStatus($leave->next_stage()) == 'cancelled' || $leave->getStageStatus($leave->next_stage()) == 'rejected') badge-danger @else badge-warning @endif text-white">
                                            {{$leave->getStageStatus($leave->next_stage())}}
                                        </span>
                                </td>

                                <td class="tbcontrol">
                                    <a class="btn btn-primary pt-1 pb-1" style="width: 80px;border-radius: 20px"
                                       href="{{route('employee.leaves.show',['leaf'=>$leave->id])}}">
                                        Manage
                                    </a>


                                    <div class="modal fade" id="Delete1{{$leave->id}}" tabindex="-1"
                                         aria-labelledby="exampleModalLabe{{$leave->id}}"
                                         aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="exampleModalLabe{{$leave->id}}">(Welcome
                                                        Note)
                                                        Cancellation Criteria</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form
                                                    action={{route('employee.welcomeNote.changeState',['id'=>$leave->id,'status'=>'canceled',1]) }}
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
                                                        <button class="btn btn-danger" type="submit">submit
                                                        </button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="Cancel1{{$leave->id}}" tabindex="-1"
                                         aria-labelledby="exampleModalLabe{{$leave->id}}"
                                         aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="exampleModalLabe{{$leave->id}}">
                                                        Cancellation Reason</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>


                                                <div class="modal-body" style="text-align: left">
                                                    <h5>

                                                        @if($leave->cancellation_reasons == "")
                                                            {{"no reasons"}}
                                                        @else
                                                            {{$leave->cancellation_reasons}}
                                                        @endif
                                                    </h5>


                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                </td>


                            </tr>
                        @endforeach

                    </table>


                    <p class="form-message"></p>
                </div>
            </div>
        </div>
    </section>

    <!--promo section end-->

    <div id="deleteModel"></div>
@endsection

@section('footer')
    <footer class="bg-info text-center text-lg-start" style="position:relative;bottom:0">
        <!--footer top start-->
        <div class="footer-top background-img-2" style="background-color:white;color:#000">
            <!--footer bottom copyright start-->
            <div class="footer-bottom border-gray-light py-3">
                <div class="container">
                    <div class="copyright-wrap small-text">
                        <p class="mb-0">© Mohamed Mahrous, All rights reserved</p>
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
        function openWindow() {
            // Specify the desired width and height for the new window
            var windowWidth = 800;
            var windowHeight = 600;

            // Calculate the center position based on screen dimensions
            var screenWidth = window.screen.width;
            var screenHeight = window.screen.height;

            var left = (screenWidth - windowWidth) / 2;
            var top = (screenHeight - windowHeight) / 2;

            // Construct the window features as a string
            var windowFeatures = 'width=' + windowWidth + ',height=' + windowHeight +
                ',left=' + left + ',top=' + top;

            // Open the new window with the specified features
            window.open('{{route("employee.getLeavePolicy")}}', '_blank', windowFeatures);
        }

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


                $('#show_manage_requests').removeClass('btn-primary');
                $('#show_my_requests').addClass('btn-primary');
            });

            $('#show_manage_requests').on('click', function () {
                $('#i_am_the_sender').css('display', 'none');
                $('#i_am_the_receiver').css('display', 'block');

                $('#show_my_requests').removeClass('btn-primary');
                $('#show_manage_requests').addClass('btn-primary');

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

