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
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block text-left">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-block text-left">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                <strong>{!! $message !!} </strong>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

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

                                    <h5 class="mt-5 font-weight-bold">Welcome to<img class="img-fluid d-inline"
                                                                                     style="width: 80px; margin-top: -7px"
                                                                                     src="{{asset("assets/images/hr360.png")}}">
                                        Platform</h5>
                                    <p>Your One-Stop HR Solutions</p>
                                    <a href="{{route('employee.home')}}">Back to home Page </a>

                                </div>

                                <div class="col-md-12 col-lg-12 text-center">

                                    <button class="col-sm-4  btn btn-dark mt-2 text-center" type="button"
                                            data-toggle="collapse"
                                            data-target="#collapseExample"
                                            style="font-weight: bolder">

                                        Available Leave
                                    </button>

                                </div>
                                <div class="col-md-12 col-lg-12 text-left">
                                    <div id="kt_app_content_container" class="app-container container-xxl mt-2">


                                        <div class=" collapse " id="collapseExample">
                                            <table style="border: 3px solid #000"
                                                   class=" py-4 table table-bordered col-sm-12 p-3 text-center justify-content-center ">
                                                <tr class="btn-dark">
                                                    <td style="width: 16.6%;"><b>Leave Type </b></td>
                                                    <td style="width: 16.6%;"><b>Total Leaves</b></td>
                                                    <td style="width: 16.6%;"><b>Available Leave </b></td>
                                                    <td style="width: 16.6%;"><b>Remain </b></td>
                                                    <td style="width: 16.6%;"><b>Used Leave </b></td>
                                                    <td style="width: 16.6%;"><b>Pending Leave</b></td>
                                                </tr>
                                                @foreach($leaves_types as $leave)
                                                    <tr>
                                                        <td style="width: 16.6%;">{{$leave->name}}</td>
                                                        <td style="width: 16.6%;">{{$leave->quantity}}</td>
                                                        <td style="width: 16.6%;">{{$leave->getEmpLeaves($result)['statistics'][$leave->id]['available']}}</td>
                                                        <td style="width: 16.6%;">{{$leave->getEmpLeaves($result)['statistics'][$leave->id]['remain']}}</td>
                                                        <td style="width: 16.6%;">{{$leave->getEmpLeaves($result)['statistics'][$leave->id]['approved']}}</td>
                                                        <td style="width: 16.6%;">{{$leave->getEmpLeaves($result)['statistics'][$leave->id]['pending']}}</td>
                                                    </tr>
                                                @endforeach
                                            </table>

                                        </div>
                                        <br>
                                        <form class="form d-flex flex-column flex-lg-row"
                                              style="border:2px solid black"
                                              method="post" action="{{route('employee.leaves.store')}}">
                                            @csrf
                                            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                                                <!--begin::General options-->
                                                <div class="card card-flush py-4">
                                                    <div class="card-body pt-0 ">
                                                        <div class=" fv-row row">

                                                            <div class="col-sm-12 text-center ">
                                                                <h6 class="mt-4  p-2" style="background:#cccfd3">General
                                                                    Information</h6>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <label class="required form-label">Leave
                                                                    Type</label>
                                                                <!--end::Label-->
                                                                <br>
                                                                <!--begin::Input-->
                                                                <select class="form-select"
                                                                        name="leave_type"
                                                                        required style="width:100%; "
                                                                        id="mySelect"
                                                                        onchange="checkAndUpdateDiv()">
                                                                    @foreach($leaves_types as $leave)
                                                                        <option
                                                                            value="{{$leave->id}}">{{$leave->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div id="myDivToShow"
                                                                 class="col-sm-12"
                                                                 style="display: none">
                                                                <div class=" text-left p-3">
                                                                    <div class="row">

                                                                        <div class="col-sm-6 mt-2">
                                                                            <input type="radio"
                                                                                   id="InsideQatar"
                                                                                   name="leaveCountry"
                                                                                   value="1" class="mr-2"
                                                                                   onchange="InsideQatarFun('in')"
                                                                                   checked
                                                                            >
                                                                            <label class="mr-3">Inside Qatar</label>
                                                                            <input type="radio"
                                                                                   name="leaveCountry"
                                                                                   id="OutsideQatar"
                                                                                   value="0"
                                                                                   onchange="InsideQatarFun('out')"
                                                                            >
                                                                            <label for="">Outside Qatar</label>


                                                                        </div>

                                                                        {{--<div class="col-sm-6 mt-2">
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox"
                                                                                       class="custom-control-input"
                                                                                       id="exitPermit" name="exitPermit"
                                                                                       value="1"
                                                                                       @if(isset($extraInfo[0]) && $extraInfo[0] == 1) checked @endif>
                                                                                <label class="custom-control-label h6"
                                                                                       for="exitPermit">Exit
                                                                                    permit </label>
                                                                            </div>

                                                                        </div>--}}

                                                                        <div class="col-sm-12 mt-2" id="PurchaseTicket"
                                                                             style="display: none">

                                                                            <input type="radio"
                                                                                   name="TicketPurchasing"
                                                                                   value="1" class="mr-2">
                                                                            <label class="mr-3">I will Purchase
                                                                                my
                                                                                flight ticket:</label>
                                                                            <input type="radio"
                                                                                   name="TicketPurchasing"
                                                                                   value="0">
                                                                            <label for="">Request company to
                                                                                arrange
                                                                                your flight ticket &#160;
                                                                            </label>

                                                                            <input type="text"
                                                                                   name="TicketPurchasingInput"
                                                                                   placeholder="Your Sector"
                                                                            >


                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            </div>
                                                            <div class="col-sm-12  row form-group text-left">

                                                                <div class="col-sm-6">
                                                                    <label
                                                                        class="required form-label">From</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input type="datetime-local"
                                                                           name="startDate"
                                                                           id="startDate"
                                                                           class="form-control mb-2"
                                                                           onchange="calculateDateDifference();validateDateTime(this)"/>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label
                                                                        class="required form-label">To</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input type="datetime-local" name="endDate"
                                                                           id="endDate"
                                                                           class="form-control mb-2 datetimePicker"
                                                                           onchange="calculateDateDifference();validateDateTime(this)"/>
                                                                </div>


                                                                <div class="col-sm-6">
                                                                    <label class="required form-label">Total
                                                                        Days</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <label class="form-control mb-2"
                                                                           id="diffBetweenDates">0</label>

                                                                    <input type="hidden" name="days" id="days">
                                                                </div>

                                                                <div class="col-sm-6">
                                                                    <label class="required form-label">Phone
                                                                        Number</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input class="form-control mb-2"
                                                                           value="{{$result->mobile}}"
                                                                           name="phoneNumber"/>


                                                                </div>

                                                                <div class="col-sm-12">
                                                                    <label
                                                                        class="required form-label">Reasons</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <textarea class="form-control mb-2"
                                                                              name="reasons"
                                                                              id=""
                                                                              cols="30"
                                                                              rows="5"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Card header-->
                                                    </div>

                                                    <div class=" card-flush py-4">
                                                        <div class="card-body pt-0 ">
                                                            <div class=" fv-row row">
                                                                <div class="col-sm-12 text-center ">
                                                                    <h6 class="mt-4 p-2" style="background:#cccfd3">Hand
                                                                        Over</h6>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <label class="required form-label">Hand
                                                                        Over</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <select
                                                                        class="form-control exampleSelect"
                                                                        name="handOver[]"
                                                                        multiple="multiple" required
                                                                        style="overflow-y: auto">
                                                                        @foreach($employees as $emp)
                                                                            <option
                                                                                value="{{$emp->id}}">{{$emp->empCode . '-' . $emp->empName . '-' . $emp->mobile}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div class="col-sm-12">
                                                                        <label
                                                                            class="required form-label">Comments</label>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input-->
                                                                        <textarea class="form-control mb-2"
                                                                                  name="handOverComments"
                                                                                  id="" cols="30"
                                                                                  rows="2"></textarea>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Card header-->
                                                    </div>
                                                    <div class="card card-flush py-4">
                                                        <div class="card-body pt-0 ">
                                                            <input type="checkbox" class="" onchange="checkCheckbox()"
                                                                   style="width:40px;display:inline-block"
                                                                   id="readInstructionsCheckbox">
                                                            <label for="" class=" mb-3"
                                                                   style="display:inline-block;font-weight:bolder">
                                                                By checking this box, you acknowledge that you have read
                                                                and accepted the provided instructions.
                                                            </label>
                                                            <br>
                                                            <small>
                                                                If you have not viewed the instructions, please take a
                                                                moment to do so before proceeding.
                                                                <button type="button" class=" badge-danger"
                                                                        onclick="openWindow()">
                                                                    View Instructions
                                                                </button>
                                                            </small>

                                                        </div>
                                                    </div>
                                                    <div style="visibility:hidden;" id="managersDev">
                                                        <div class="card card-flush py-4">
                                                            <div class="card-body pt-0 ">
                                                                <div class=" fv-row row">


                                                                    <div class="col-sm-12 text-center ">
                                                                        <h6 class="mt-4 p-2" style="background:#cccfd3">

                                                                            Approval Stages</h6>
                                                                    </div>
                                                                    <div class="col-sm-12 ">
                                                                        {{--<label class="required form-label">Manager
                                                                            Approval</label>
                                                                        <br>
                                                                        <button class=" btn btn-primary pb-2"
                                                                                id="addBtn" type="button"
                                                                                style="width: 170px;"
                                                                                onclick="cloneDiv2('add')">+ Add new
                                                                            Approval
                                                                        </button>
                                                                        <button class=" btn btn-danger pb-2"
                                                                                id="addBtn" type="button"
                                                                                style="width: 170px;"
                                                                                onclick="cloneDiv2('remove')">-
                                                                            Remove
                                                                            Approval
                                                                        </button>--}}
                                                                        <div id="ApproveContainer">

                                                                        </div>
                                                                        <div id="originalDiv1" class="row mt-2">
                                                                            <div class=" col-sm-3 text-center p-3"
                                                                                 id="nameApproval">
                                                                                <h6>Direct Supervisor Approval : </h6>
                                                                            </div>
                                                                            <select
                                                                                class="form-control  col-sm-8 mt-3 exampleSelect"
                                                                                name="Approval1[]"
                                                                                multiple="multiple"
                                                                                style="overflow-y: auto;height: 30px">
                                                                                @foreach($employees as $emp)
                                                                                    <option
                                                                                        value="{{$emp->id}}">{{$emp->empCode . '-' . $emp->empName . '-' . $emp->mobile}}</option>
                                                                                @endforeach
                                                                            </select>

                                                                        </div>
                                                                        <div id="originalDiv2" class="row"
                                                                             style="">
                                                                            <div class=" col-sm-3 text-center p-3"
                                                                                 id="nameApproval">
                                                                                <h6>Manager Approval : </h6>
                                                                            </div>
                                                                            <select
                                                                                class="form-control  col-sm-8 mt-3 exampleSelect"
                                                                                name="Approval2[]"
                                                                                multiple="multiple"
                                                                                style="overflow-y: auto;height: 30px">
                                                                                @foreach($employees as $emp)
                                                                                    <option
                                                                                        value="{{$emp->id}}">{{$emp->empCode . '-' . $emp->empName . '-' . $emp->mobile}}</option>
                                                                                @endforeach
                                                                            </select>

                                                                        </div>
                                                                        <div id="originalDiv3" class="row"
                                                                             style="">
                                                                            <div class=" col-sm-3 text-center p-3"
                                                                                 id="nameApproval">
                                                                                <h6>Head of Department (HOD) Approval : </h6>
                                                                            </div>
                                                                            <select
                                                                                class="form-control  col-sm-8 mt-3 exampleSelect"
                                                                                name="Approval3[]"
                                                                                multiple="multiple"
                                                                                style="overflow-y: auto;height: 30px">
                                                                                @foreach($employees as $emp)
                                                                                    <option
                                                                                        value="{{$emp->id}}">{{$emp->empCode . '-' . $emp->empName . '-' . $emp->mobile}}</option>
                                                                                @endforeach
                                                                            </select>

                                                                        </div>
                                                                        <div id="originalDiv4" class="row"
                                                                             style="">
                                                                            <div class=" col-sm-3 text-center p-3"
                                                                                 id="nameApproval">
                                                                                <h6>Business Unit Head (BUH) Approval : </h6>
                                                                            </div>
                                                                            <select
                                                                                class="form-control  col-sm-8 mt-3 exampleSelect"
                                                                                name="Approval4[]"
                                                                                multiple="multiple"
                                                                                style="overflow-y: auto;height: 30px">
                                                                                @foreach($employees as $emp)
                                                                                    <option
                                                                                        value="{{$emp->id}}">{{$emp->empCode . '-' . $emp->empName . '-' . $emp->mobile}}</option>
                                                                                @endforeach
                                                                            </select>

                                                                        </div>
                                                                        <div id="originalDiv5" class="row"
                                                                             style="">
                                                                            <div class=" col-sm-3 text-center p-3"
                                                                                 id="nameApproval">
                                                                                <h6>General Manager Approval : </h6>
                                                                                <small style="font-size: 13px;color:red;font-weight: bolder">
                                                                                    For positions of Manager and above,
                                                                                    approval must be obtained from the General Manager.
                                                                                </small>
                                                                            </div>
                                                                            <select
                                                                                class="form-control  col-sm-8 mt-3 exampleSelect"
                                                                                name="Approval5[]"
                                                                                multiple="multiple"
                                                                                style="overflow-y: auto;height: 30px">
                                                                                @foreach($employees as $emp)
                                                                                    <option
                                                                                        value="{{$emp->id}}">{{$emp->empCode . '-' . $emp->empName . '-' . $emp->mobile}}</option>
                                                                                @endforeach
                                                                            </select>

                                                                        </div>

                                                                        <div class="col-sm-12">
                                                                            <label
                                                                                class="required form-label">Comments</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <textarea class="form-control mb-2"
                                                                                      name="
"
                                                                                      id="" cols="30"
                                                                                      rows="2"></textarea>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end::Card header-->
                                                        </div>
                                                        @if(in_array($result->designation,$managers_and_head_need_gm))
                                                            <div class="card card-flush py-4">
                                                                <div class="card-body pt-0 ">
                                                                    <div class=" fv-row row">
                                                                        <div class="col-sm-12">

                                                                            <div class="col-sm-12 text-center ">
                                                                                <h6 class="mt-4 p-2"
                                                                                    style="background:#cccfd3">GM
                                                                                    Approval</h6>
                                                                            </div>

                                                                            <label class="required form-label">GM
                                                                                Approval</label>
                                                                            <!--end::Label-->
                                                                            <!--begin::Input-->
                                                                            <select
                                                                                class="form-control exampleSelect"
                                                                                name="gmApproval[]"
                                                                                multiple="multiple"
                                                                                style="overflow-y: auto">
                                                                                @foreach($employees as $emp)
                                                                                    <option
                                                                                        value="{{$emp->id}}">{{$emp->empCode . '-' . $emp->empName . '-' . $emp->mobile}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            <div class="col-sm-12">
                                                                                <label
                                                                                    class="required form-label">Comments</label>
                                                                                <!--end::Label-->
                                                                                <!--begin::Input-->
                                                                                <textarea class="form-control mb-2"
                                                                                          name="gmApprovalComments"
                                                                                          id="" cols="30"
                                                                                          rows="2"></textarea>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--end::Card header-->
                                                            </div>
                                                        @endif
                                                        <br>

                                                        <div class="card-body pt-0 ">
                                                            <div class=" fv-row row">
                                                                <div class="col-sm-12 text-center" >
                                                                    <small style="font-size: 13px;font-weight: bolder">
                                                                        "Your request will be assessed by the Group HR Director for final approval, ensuring alignment with organizational goals and resources”

                                                                    </small>
                                                                    <hr>
                                                                </div>

                                                            </div>
                                                            <!--end::Card header-->
                                                        </div>

                                                        <div class="card-body pt-0 ">
                                                            <div class=" fv-row row">
                                                                <div class="col-sm-12 text-center">
                                                                    <button type="button" class="btn btn-primary"
                                                                            data-toggle="modal"
                                                                            data-target="#exampleModalCenter">
                                                                        Submit
                                                                    </button>
                                                                    <hr>
                                                                </div>

                                                            </div>
                                                            <!--end::Card header-->
                                                        </div>
                                                    </div>

                                                </div>
                                                <!--end::Main column-->
                                            </div>
                                            <!-- Confirm Modal -->
                                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenterTitle">
                                                                Confirmation of Your Request Submission</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure, you want to confirm your request ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">No
                                                            </button>
                                                            <button type="Submit" class="btn btn-primary">Confirm
                                                            </button>
                                                        </div>
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
            </div>
        </div>
        <!-- end page content-->


    </section>
@endsection

@section('script')
    <script>

        function calculateDateDifference() {
            // Get the values of the datetime inputs
            var startDateValue = document.getElementById("startDate").value;
            var endDateValue = document.getElementById("endDate").value;

            // Convert the input values to Date objects
            var startDate = new Date(startDateValue);
            var endDate = new Date(endDateValue);

            // Calculate the difference in milliseconds
            var timeDifference = endDate - startDate;

            // Convert milliseconds to days
            var daysDifference = Math.floor(timeDifference / (1000 * 60 * 60 * 24)) + 1;

            // Display the result in the label
            var resultLabel = document.getElementById("diffBetweenDates");
            console.log(daysDifference);
            //resultLabel.value = "Total days difference: " + daysDifference + " days";
            resultLabel.textContent = daysDifference + " days";
            document.getElementById("days").value = daysDifference;

        }

        var divCount = 1;

        var Approvels = ['First', 'Second', 'Third', 'Fourth', 'Fifth', 'more'];

        // Function to clone the original div with a new id
        function cloneDiv() {
            divCount++;
            var originalDiv = $('#originalDiv');
            var newDiv = originalDiv.clone();
            var newId = 'clonedDiv' + divCount;
            newDiv.attr('name', 'ApproveContainer' + divCount + '[]');
            newDiv.attr('id', newId);
            var divv = newDiv[0].childNodes[1];
            divv.innerHTML = "<h5>" + Approvels[divCount - 1] + " Approval</h5>";
            document.getElementById('numOfApprovals').value = divCount;
            // id="delApproval"

            //var beforeDiv = $('<div class="beforeDiv col-sm-2">'+ Approvels[divCount] +'Approvel ' + divCount + '</div>');
            // var afterDiv = $('<div class="afterDiv col-sm-2">Remove Div ' + divCount + '</div>');
            $('#ApproveContainer').append(newDiv);
            //$('#ApproveContainer').append(beforeDiv).append(newDiv).append(afterDiv);
        }

        function cloneDiv2(action) {
            if (action == "add") {
                var originalDiv1 = document.getElementById('originalDiv' + (divCount + 1));
                originalDiv1.style.visibility = 'visible';
                originalDiv1.style.maxHeight = '80px';
                divCount++;
            } else {
                var originalDiv1 = document.getElementById('originalDiv' + (divCount));
                originalDiv1.style.visibility = 'hidden';
                originalDiv1.style.maxHeight = '0';
                divCount--;
            }
            //alert(divCount);

        }

        checkAndUpdateDiv();

        // Add an event listener to detect changes in the select element
        function checkAndUpdateDiv() {
            // Get references to the select element and the div
            var selectElement = document.getElementById("mySelect");
            var divElement = document.getElementById("myDivToShow");
            var validValues = ['3'];
            // Check if the selected value is in the array
            var selectedValue = selectElement.value;
            var isValidValue = validValues.includes(selectedValue);

            // Show or hide the div based on the result
            if (isValidValue) {
                divElement.classList.add("row");
                divElement.style.display = "block";
            } else {
                divElement.style.display = "none";
            }
        }

        function validateDateTime(inputElement) {
            var selectedDate = new Date(inputElement.value);

            // Check if the selected day is Friday (5) or Saturday (6)
            @if($employee->deductionDaysType == 'site')
            if (selectedDate.getDay() === 5) {
                alert("Please choose a date and time that is not on Friday.");
                // Clear the input value or take any other action to handle the invalid selection
                inputElement.value = '';
            }
            @elseif($employee->deductionDaysType == 'headOffice')
            if (selectedDate.getDay() === 5 || selectedDate.getDay() === 6) {
                alert("Please choose a date and time that is not on Friday or Saturday.");
                // Clear the input value or take any other action to handle the invalid selection
                inputElement.value = '';
            }
            @endif

        }

        function removeApprovalChild(e) {
            document.getElementById('numOfApprovals').value = divCount - 1;
            divCount--;
            e.parentElement.parentElement.remove();

        }

        window.addEventListener("change", checkAndUpdateDiv);

        function InsideQatarFun(e) {
            if (e == "in") {
                document.getElementById('PurchaseTicket').style.display = 'none';
            } else {
                document.getElementById('PurchaseTicket').style.display = 'block';

            }
        }

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
            window.open('{{route("employee.getLeaveInstructions")}}', '_blank', windowFeatures);
        }

        function checkCheckbox() {
            // Get the checkbox element
            var checkbox = document.getElementById("readInstructionsCheckbox");

            // Check if the checkbox is selected
            if (checkbox.checked) {
                document.getElementById("managersDev").style.visibility = 'visible';
            } else {
                document.getElementById("managersDev").style.visibility = 'hidden';
            }
        }
    </script>

@endsection
