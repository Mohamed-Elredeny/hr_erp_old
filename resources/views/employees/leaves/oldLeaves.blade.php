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
                                <strong>{{ $message }}</strong>
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

                                    <h5 class="mt-5 font-weight-bold">Welcome to <img class="img-fluid d-inline"
                                                                                      style="width: 80px; margin-top: -7px"
                                                                                      src="{{asset("assets/images/hr360.png")}}">
                                        Platform</h5>
                                    <p>Your One-Stop HR Solutions</p>
                                    <a href="{{route('employee.home')}}">Back to home Page </a>

                                </div>

                                <div class="col-md-12 col-lg-12 text-left">
                                    <div class="row col-sm-12">
                                        <a href="">{{$result->calcJoiningYears($result)['this_year']['year']}}
                                            &#160;</a>
                                        @for($i=0;$i<$result->calcJoiningYears($result)['years_num'];$i++)
                                            <a href="">{{$result->calcJoiningYears($result,($i + 1))['this_year']['year'] - ($i + 1)}}
                                                &#160;</a>
                                        @endfor
                                    </div>
                                    <button class="col-sm-12 text-center btn btn-light mt-2 " type="button"
                                            data-toggle="collapse"
                                            data-target="#collapseExample"
                                            style="font-weight: bolder">

                                        Available Leaves
                                    </button>

                                    <div id="kt_app_content_container" class="app-container container-xxl ">


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
                                                        <td style="width: 16.6%;">{{$leave->quantity - $leave->empLeaves($result->id,'approved') - $leave->empLeaves($result->id,'!approved')}}</td>
                                                        <td style="width: 16.6%;">@if($leave->empLeavesRemain($result->id) == 0)  @if($leave->quantity - $leave->empLeaves($result->id,'approved') - $leave->empLeaves($result->id,'!approved') <= 0)
                                                                Not Available @else
                                                                Available @endif @else {{ " you spent " . $leave->empLeavesRemain($result->id) . " days & you need " . ( $leave->available_after - $leave->empLeavesRemain($result->id)  ) ." days more" }} @endif </td>
                                                        <td style="width: 16.6%;">{{$leave->empLeaves($result->id,'approved')}}</td>
                                                        <td style="width: 16.6%;">{{$leave->empLeaves($result->id,'!approved')}}</td>
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
                                                                <h6 class="mt-4 btn-dark p-2">General
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
                                                                            <label
                                                                                class="required form-label h6 mr-1">Local
                                                                                Country :</label>
                                                                            <input type="radio"
                                                                                   name="leaveCountry"
                                                                                   value="1">
                                                                            <label class="mr-3">Local
                                                                                Leave </label>
                                                                            <input type="radio"
                                                                                   name="leaveCountry"
                                                                                   value="0">

                                                                            <label for="">Out of Country</label>:

                                                                        </div>
                                                                        <div class="col-sm-6 mt-2">

                                                                            <label
                                                                                class="required form-label h6 mr-1">Exit
                                                                                permit :</label>
                                                                            <input
                                                                                type="radio" name="exitPermit"
                                                                                value="1">
                                                                            <label class="mr-3">Yes:</label>

                                                                            <input type="radio"
                                                                                   name="exitPermit"
                                                                                   value="0">
                                                                            <label for="">No</label>


                                                                        </div>
                                                                        <div class="col-sm-12 mt-2">
                                                                            <label
                                                                                class="required form-label h6 mr-1">Ticket
                                                                                Purchasing :</label>

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
                                                                                your flight ticket
                                                                                Sector </label>

                                                                            <input type="text"
                                                                                   name="TicketPurchasingInput">


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
                                                                           onchange="calculateDateDifference()"/>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label
                                                                        class="required form-label">To</label>
                                                                    <!--end::Label-->
                                                                    <!--begin::Input-->
                                                                    <input type="datetime-local" name="endDate"
                                                                           id="endDate"
                                                                           class="form-control mb-2"
                                                                           onchange="calculateDateDifference()"/>
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
                                                                    <h6 class="mt-4 btn-dark p-2">Hand Over</h6>
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
                                                            <div class=" fv-row row">


                                                                <div class="col-sm-12 text-center ">
                                                                    <h6 class="mt-4 btn-dark p-2">Manager
                                                                        Approval</h6>
                                                                </div>
                                                                <div class="col-sm-12 ">
                                                                    <label class="required form-label">Manager
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
                                                                    </button>
                                                                    <div id="ApproveContainer">

                                                                    </div>
                                                                    <div id="originalDiv1" class="row mt-2">
                                                                        <div class=" col-sm-2 text-center p-3"
                                                                             id="nameApproval">
                                                                            <h5>First Approval</h5>
                                                                        </div>
                                                                        <select
                                                                            class="form-control  col-sm-8 mt-3 exampleSelect"
                                                                            name="Approval1[]"
                                                                            multiple="multiple"
                                                                            style="overflow-y: auto;height: 30px"
                                                                            required>
                                                                            @foreach($employees as $emp)
                                                                                <option
                                                                                    value="{{$emp->id}}">{{$emp->empCode . '-' . $emp->empName . '-' . $emp->mobile}}</option>
                                                                            @endforeach
                                                                        </select>

                                                                    </div>
                                                                    <div id="originalDiv2" class="row"
                                                                         style="visibility:hidden;max-height: 0px">
                                                                        <div class=" col-sm-2 text-center p-3"
                                                                             id="nameApproval">
                                                                            <h5>Second Approval</h5>
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
                                                                         style="visibility:hidden;max-height: 0px">
                                                                        <div class=" col-sm-2 text-center p-3"
                                                                             id="nameApproval">
                                                                            <h5>Third Approval</h5>
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
                                                                         style="visibility:hidden;max-height: 0px">
                                                                        <div class=" col-sm-2 text-center p-3"
                                                                             id="nameApproval">
                                                                            <h5>Fourth Approval</h5>
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
                                                                         style="visibility:hidden;max-height: 0px">
                                                                        <div class=" col-sm-2 text-center p-3"
                                                                             id="nameApproval">
                                                                            <h5>Fifth Approval</h5>
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
                                                                            <h6 class="mt-4 btn-dark p-2">GM
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
                                                            <div class="col-sm-12 text-center">
                                                                <button type="submit" class="btn btn-primary">
                                                                    Submit
                                                                </button>
                                                                <hr>
                                                            </div>

                                                        </div>
                                                        <!--end::Card header-->
                                                    </div>
                                                </div>
                                                <!--end::Main column-->
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
            var daysDifference = Math.floor(timeDifference / (1000 * 60 * 60 * 24));

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

        function removeApprovalChild(e) {
            document.getElementById('numOfApprovals').value = divCount - 1;
            divCount--;
            e.parentElement.parentElement.remove();

        }

        /*  window.addEventListener("change", checkAndUpdateDiv);
          window.addEventListener("load", checkAndUpdateDiv);*/

    </script>

@endsection
