@extends('layouts.site')
@section('content')
    <style>
        b {
            font-weight: bolder
        }
    </style>
    <?php
    $Clearance = 0;
    $HrApproval = 0;
    $GroupHRDirectorApproval = 0;

    $extraInfo = explode('|', $leave->extraInfo ?? []);
    ?>
    <div id="" class="p-5">
        <a href="{{route('employee.leaves.index')}}">Back To HomePage</a>

        <div class="form d-flex flex-column flex-lg-row"
             data-kt-redirect="apps/ecommerce/catalog/categories.html">
            <div class="col-sm-12 text-center p-4  row text-center">
                <div class="col-sm-12 ">
                    <button onclick="printAndExpand()" class="btn btn-primary ">
                        print
                    </button>
                </div>
                <div class="col-sm-12 row">
                    <h2 class="col-sm-12 page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0 text-center">
                        {{$leave->employee->empName}} Leave Application
                    </h2>
                    <div class="col-sm-3" style="display:inline">
                        <img src="{{asset('assets/images/employees/' . $leave->employee->image)}}"
                             style="width: 100px;height: 100px">
                    </div>
                    <div class="col-sm-6" style="display:inline">
                        <br>

                        <b>Your Request pending with {{'Stage'}} </b>
                        <br>
                        <a class="badge badge-primary" data-toggle="collapse"
                           href="collapseExample<?php echo \App\Models\LeaveStage::where('leave_id', $leave->id)->where('stage_name', $leave->next_stage())->first()->id;?>"
                           data-target="#collapseExample<?php echo \App\Models\LeaveStage::where('leave_id', $leave->id)->where('stage_name', $leave->next_stage())->first()->id;?>"
                           aria-expanded="false"
                           aria-controls="collapseExample<?php echo \App\Models\LeaveStage::where('leave_id', $leave->id)->where('stage_name', $leave->next_stage())->first()->id;?>">
                            {{$states[$leave->next_stage()]}}
                        </a>
                        with
                        <button class="badge badge-warning">
                            {{implode(' , ',$leave->next_stage_pending_employees())}}
                        </button>
                    </div>


                </div>


            </div>
        </div>
        <div class="row">
            {{-- <div class="col-sm-4  card-flush py-4 mt-2">
                 <div class="card-body pt-0 ">
                     <div class=" fv-row row">
                         <div class="col-sm-12">
                             <label class="required form-label">Leave Type</label>
                             <!--end::Label-->
                             <!--begin::Input-->
                             <select
                                 class="form-control exampleSelect p-3"
                                 name="category_name" required style="overflow-y: auto" disabled>
                                 @foreach($leaves_types as $new_leave)
                                     <option value="{{$leave->id}}">{{$leave->type->name}}</option>
                                 @endforeach
                             </select>

                         </div>

                         <div class="col-sm-6">
                             <label class="required form-label">From</label>
                             <!--end::Label-->
                             <!--begin::Input-->
                             <input type="datetime-local" name="category_name" id="startDate"
                                    class="form-control mb-2" onchange="calculateDateDifference()"
                                    value="{{$extraInfo[0]}}" disabled
                             />
                         </div>
                         <div class="col-sm-6">
                             <label class="required form-label">To</label>
                             <!--end::Label-->
                             <!--begin::Input-->
                             <input type="datetime-local" name="category_name" id="endDate"
                                    class="form-control mb-2" onchange="calculateDateDifference()"
                                    value="{{$extraInfo[1]}}" disabled
                             />
                         </div>
                         <div class="col-sm-6">
                             <label class="required form-label">Total Days</label>
                             <!--end::Label-->
                             <!--begin::Input-->
                             <label class="form-control mb-2" id="diffBetweenDates">{{$extraInfo[2]}}</label>


                         </div>

                         <div class="col-sm-6">
                             <label class="required form-label">Phone Number</label>
                             <!--end::Label-->
                             <!--begin::Input-->
                             <input class="form-control mb-2" value="{{$extraInfo[3]}}" disabled/>


                         </div>

                         <div class="col-sm-12">
                             <label class="required form-label">Reasons</label>
                             <!--end::Label-->
                             <!--begin::Input-->
                             <textarea class="form-control mb-2" name="" id="" cols="30"
                                       rows="5" disabled>{{$extraInfo[4]}}</textarea>
                         </div>
                     </div>
                 </div>
                 <!--end::Card header-->
             </div>--}}
            <div class="col-sm-12  card-flush py-4 ">
                <table style="width:100%;font-size: 13px;border:1px solid black !important;"
                       class="p-4 table table-bordered col-sm-12 p-3 text-left justify-content-left">
                    <tr>
                        <td style="width: 11.111%;"><b>Emp No: </b> {{$leave->employee->empCode}} </td>
                        <td style="width: 11.111%;"><b>Name: </b> {{$leave->employee->empName}} </td>
                        <td style="width: 11.111%;"><b>Designation No: </b>{{$leave->employee->designation}}</td>
                        <td style="width: 11.111%;"><b>Department: </b>{{$leave->employee->projectDepartmentName}}</td>
                    </tr>
                    <tr>
                        <td style="width: 11.111%;"><b>Project Number: </b>{{$leave->employee->projectDepartmentNumber}}
                        </td>
                        <td style="width: 11.111%;"><b>Joining Date: </b>{{$leave->employee->joiningDate}}</td>
                        <td style="width: 11.111%;"><b>Visa
                                Expiry: </b>{{Carbon\Carbon::parse($leave->employee->visaExpiry)->format('d-m-Y')}}</td>
                        <td style="width: 11.111%;"><b>Leave Type: </b> {{$leave->type->name}} </td>
                    </tr>
                    <tr>

                        <td style="width: 11.111%;"><b class="">Travel
                                Date:</b>{{Carbon\Carbon::parse($extraInfo[0] ?? '')->format('d-m-Y')}} </td>
                        <td style="width: 11.111%;"><b class="">Arrival
                                Date:</b>{{Carbon\Carbon::parse($extraInfo[1] ?? '')->format('d-m-Y')}} </td>
                        <td style="width: 11.111%;"><b>Submission
                                Date:</b>{{Carbon\Carbon::parse($leave->leave)->format('d-m-Y')}}</td>
                        <td style="width: 11.111%;"><b>Last Resumption Date
                                :</b> {{Carbon\Carbon::parse($leave->updated_at)->format('d-m-Y')}}</td>
                    </tr>
                    <tr>
                        <td style="width: 11.111%;"><b>Total Days:</b> {{$extraInfo[2] ?? ''}}</td>
                        <td style="width: 11.111%;"><b>Leave Type
                                :</b>{{$leave->type->name}}</td>

                        <td style="width: 11.111%;"><b>Phone Number
                                :</b>{{$extraInfo[3]}}</td>
                        <td style="width: 11.111%;"><b>Reasons
                                :</b>{{$extraInfo[4]}}</td>
                    </tr>

                </table>
            </div>

        </div>
        <div class="card card-flush py-4 mt-2 p-3" style="border: 1px solid #000">
            <div class="card-body pt-0 ">
                <div class=" fv-row row">
                    <div class="col-sm-12 text-center btn  mt-2" type="button">
                        <div class="row">
                            <div class="col-sm-12 h3" style="font-weight: bolder;">
                                Approval Stages
                            </div>
                            <hr>

                        </div>

                    </div>
                    {{--button--}}
                    @foreach($leave->hasStages as $stage)
                        @if(!in_array($leave->leave_type_id,[5,14]))
                            @if(in_array($stage->stage_name,['ClearanceAccommodation','ClearancePlant','ClearanceStores','ClearanceFinance','ClearanceIT']) && $Clearance <= 0)
                                <?php $Clearance++; ?>
                                <div class="col-sm-12 text-center btn btn-danger mt-2" type="button"
                                     data-toggle="collapse"
                                     data-target="#collapseExample<?php echo $states[$stage->stage_name] . $Clearance;?>"
                                     aria-expanded="false"
                                     aria-controls="collapseExample<?php echo $states[$stage->stage_name] . $Clearance;?>">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            {{'Clearance Leave'}}
                                        </div>

                                    </div>

                                </div>
                            @endif
                        @endif
                        @if(in_array($stage->stage_name,['ManagerApproval1','ManagerApproval2','ManagerApproval3','ManagerApproval4','ManagerApproval5']) && $HrApproval <= 0)
                            <?php $HrApproval++; ?>
                            <div class="col-sm-12 text-center btn btn-danger mt-2" type="button" data-toggle="collapse"
                                 data-target="#collapseExample<?php echo $states[$stage->stage_name] . $HrApproval;?>"
                                 aria-expanded="false"
                                 aria-controls="collapseExample<?php echo $states[$stage->stage_name] . $HrApproval;?>">
                                <div class="row">
                                    <div class="col-sm-12">
                                        {{$states['DepartmentApproval'] }}
                                    </div>

                                </div>

                            </div>
                        @endif
                        @if(in_array($stage->stage_name,['HrApproval']) && $GroupHRDirectorApproval <= 0)
                            <?php $GroupHRDirectorApproval++; ?>
                            <div class="col-sm-12 text-center btn btn-danger mt-2" type="button" data-toggle="collapse"
                                 data-target="#collapseExample<?php echo $states[$stage->stage_name] . $GroupHRDirectorApproval;?>"
                                 aria-expanded="false"
                                 aria-controls="collapseExample<?php echo $states[$stage->stage_name] . $GroupHRDirectorApproval;?>">
                                <div class="row">
                                    <div class="col-sm-12">
                                        {{$states[$stage->stage_name] }}
                                    </div>

                                </div>

                            </div>
                        @endif
                        <button
                            class="col-sm-12 text-center btn @if($leave->next_stage() == $stage->stage_name) btn-success @else btn-light @endif mt-2"
                            type="button" data-toggle="collapse"
                            @if($stage->avilableStage($stage->stage_name) == 1)
                            data-target="#collapseExample{{$stage->id}}"
                            aria-expanded="false" aria-controls="collapseExample{{$stage->id}}"
                            @endif
                            style="font-weight: bolder;border: 1px solid black">
                            <div class="row">
                                <div class="col-sm-9">
                                    {{$states[$stage->stage_name]}}
                                </div>
                                <div class="col-sm-3">
                                    @if($stage->avilableStage($stage->stage_name))
                                        @if($stage->status != 'On Hold')
                                            {{ucfirst(strtolower($stage->status))}}
                                            {{Carbon\Carbon::parse($stage->created_at)->format('d-m-Y')}}
                                        @else
                                            {{$stage->status}}
                                            {{Carbon\Carbon::parse($stage->created_at)->format('d-m-Y')}}
                                        @endif
                                    @else
                                        {{'Not Ready yet !'}}
                                    @endif
                                </div>
                            </div>
                        </button>
                        <?php $extraInfo = explode('|', $stage->extraInfo ?? []); ?>

                        {{--Hand Over Stage content--}}
                        <div class="collapse col-sm-12" id="collapseExample{{$stage->id}}">
                            <form class="row col-sm-12  p-4" action="{{route('employee.leaveStages.store')}}"
                                  method="post" enctype="multipart/form-data">
                                @csrf
                                @if(in_array($stage->stage_name,['handOver']))
                                    <div class="col-sm-5 text-left">
                                        <div>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input"
                                                       id="RequiredAllocation" name="RequiredAllocation" value="1"
                                                       @if(isset($extraInfo[0]) && $extraInfo[0] == 1) checked @endif>
                                                <label class="custom-control-label h6" for="RequiredAllocation">Required
                                                    back to same Allocation</label>
                                            </div>

                                        </div>
                                        <div>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input"
                                                       id="ReplacementRequirement" name="ReplacementRequirement"
                                                       value="1"
                                                       @if(isset($extraInfo[1]) && $extraInfo[1] == 1) checked @endif>
                                                <label class="custom-control-label h6" for="ReplacementRequirement">Replacement
                                                    Requirement</label>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input"
                                                       id="HandoverPrepared" name="HandoverPrepared" value="1"
                                                       @if(isset($extraInfo[2]) && $extraInfo[2] == 1) checked @endif>
                                                <label class="custom-control-label h6" for="HandoverPrepared">Work
                                                    Handover Prepared</label>
                                            </div>
                                        </div>
                                    </div>
                                @elseif(in_array($stage->stage_name,['ManagerApproval1','ManagerApproval2','ManagerApproval3','ManagerApproval4','ManagerApproval5']))
                                    <div class="col-sm-5 text-left">
                                        <div>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="leaveProceed"
                                                       name="leaveProceed" value="1"
                                                       @if(isset($extraInfo[4]) && $extraInfo[4] == 1) checked @endif>
                                                <label class="custom-control-label h6" for="leaveProceed">Proceed for
                                                    leave</label>
                                            </div>
                                        </div>
                                    </div>
                                @elseif(in_array($stage->stage_name,['gmApproval']))
                                    <div class="col-sm-5 text-left">
                                        <div>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="leaveProceedGm"
                                                       name="leaveProceedGm" value="1"
                                                       @if(isset($extraInfo[5]) && $extraInfo[5] == 1) checked @endif>
                                                <label class="custom-control-label h6" for="leaveProceedGm">Proceed for
                                                    leave</label>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="BusinessProceed"
                                                       name="BusinessProceed" value="1"
                                                       @if(isset($extraInfo[6]) && $extraInfo[6] == 1) checked @endif>
                                                <label class="custom-control-label h6" for="BusinessProceed">Proceed for
                                                    Business</label>
                                            </div>
                                        </div>

                                    </div>
                                @elseif(in_array($stage->stage_name,['EmployeeRelation']))
                                    <div class="col-sm-5 text-left">
                                        <div>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="exitPermit"
                                                       name="exitPermit" value="1"
                                                       @if(isset($extraInfo[33]) && $extraInfo[33] == 1) checked @endif>
                                                <label class="custom-control-label h6" for="exitPermit">Exit
                                                    permit</label>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="TicketEntitled"
                                                       name="TicketEntitled" value="1"
                                                       @if(isset($extraInfo[28]) && $extraInfo[28] == 1) checked @endif>
                                                <label class="custom-control-label h6" for="TicketEntitled">Ticket
                                                    Entitled:</label>
                                            </div>
                                        </div>

                                        <div>
                                            <label class="required form-label h6">Last Resumption Date:
                                            </label>
                                            <input type="datetime-local" name="resumptionDate"
                                                   class="form-control mb-2" value="{{$extraInfo[7] ?? ''}}"/>
                                        </div>
                                        <div>
                                            <label class="required form-label h6">Fight Ticket Sector:
                                            </label>
                                            <input type="text" name="FightSector" class="form-control mb-2"
                                                   value="{{$extraInfo[8] ?? ''}}"/>
                                        </div>
                                        <div>
                                            <label class="required form-label h6">Leave Entitlement:
                                            </label>
                                            <input type="text" name="LeaveEntitlement" class="form-control mb-2"
                                                   value="{{$extraInfo[9] ?? ''}}"/>
                                        </div>
                                        <div>
                                            <label class="required form-label h6">Mobile:
                                            </label>
                                            <input type="text" name="EmpRelationMobilePhone" class="form-control mb-2"
                                                   value="{{$extraInfo[27] ?? $extraInfo[3] ?? ''}}"/>
                                        </div>

                                    </div>
                                @elseif(in_array($stage->stage_name,['BookFlightTicket']))
                                    <div class="col-sm-5 text-left">
                                        <div>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="exitPermit"
                                                       disabled
                                                       name="exitPermit" value="1"
                                                       @if(isset($extraInfo[33]) && $extraInfo[33] == 1) checked @endif>
                                                <label class="custom-control-label h6" for="exitPermit">Exit
                                                    permit</label>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="TicketEntitled"
                                                       disabled
                                                       name="TicketEntitled" value="1"
                                                       @if(isset($extraInfo[28]) && $extraInfo[28] == 1) checked @endif>
                                                <label class="custom-control-label h6" for="TicketEntitled">Ticket
                                                    Entitled:</label>
                                            </div>
                                        </div>

                                        <div>
                                            <label class="required form-label h6">Last Resumption Date: disabled
                                            </label>
                                            <input type="datetime-local" name="resumptionDate" disabled
                                                   class="form-control mb-2" value="{{$extraInfo[7] ?? ''}}"/>
                                        </div>
                                        <div>
                                            <label class="required form-label h6">Fight Ticket Sector:
                                            </label>
                                            <input type="text" name="FightSector" class="form-control mb-2" disabled
                                                   value="{{$extraInfo[8] ?? ''}}"/>
                                        </div>
                                        <div>
                                            <label class="required form-label h6">Leave Entitlement:
                                            </label>
                                            <input type="text" name="LeaveEntitlement" class="form-control mb-2"
                                                   disabled
                                                   value="{{$extraInfo[9] ?? ''}}"/>
                                        </div>
                                        <div>
                                            <label class="required form-label h6">Mobile:
                                            </label>
                                            <input type="text" name="EmpRelationMobilePhone" class="form-control mb-2"
                                                   disabled
                                                   value="{{$extraInfo[27] ?? $extraInfo[3] ?? ''}}"/>
                                        </div>
                                        <div>
                                            <label class="required form-label h6">Flight Ticket:
                                            </label>
                                            <input type="file" class="form-control col-sm-7" name="FlightTicket">
                                            <img class="col-sm-12"
                                                 src="@if(isset($extraInfo[10])){{asset('assets/images/' . $extraInfo[10])}}@endif"
                                                 alt=""
                                                 style="width:150px;height:150px">
                                        </div>
                                    </div>
                                @elseif(in_array($stage->stage_name,['ClearanceAccommodation']))
                                    <div class="col-sm-5 text-left">
                                        <div>
                                            <label class="required form-label h6">1. Accommodation/Room keys returned:
                                            </label>
                                            &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;

                                            Yes: <input type="radio" name="AccommodationKeys" value="1"
                                                        @if(isset($extraInfo[11] ) && $extraInfo[11] == 1) checked @endif>
                                            &#160;&#160;
                                            No: <input type="radio" name="AccommodationKeys" value="0"
                                                       @if(isset($extraInfo[11] ) && $extraInfo[11] == 0) checked @endif>
                                            &#160;&#160;
                                            N/A: <input type="radio" name="AccommodationKeys" value="2"
                                                        @if(isset($extraInfo[11] ) && $extraInfo[11] == 0) checked @endif>
                                        </div>
                                        <div>
                                            <label class="required form-label h6">2. Apartment/Room found in good condition
                                            </label>
                                            &#160;
                                            Yes: <input type="radio" name="ApartmentCondition" value="1"
                                                        @if(isset($extraInfo[12] ) && $extraInfo[12] == 1) checked @endif>
                                            &#160;&#160;
                                            No: <input type="radio" name="ApartmentCondition" value="0"
                                                       @if(isset($extraInfo[12] ) && $extraInfo[12] == 0) checked @endif>
                                            &#160;&#160;
                                            N/A: <input type="radio" name="ApartmentCondition" value="2"
                                                        @if(isset($extraInfo[12] ) && $extraInfo[12] == 0) checked @endif>
                                        </div>
                                    </div>
                                @elseif(in_array($stage->stage_name,['ClearancePlant']))
                                    <div class="col-sm-5 text-left">
                                        <div>
                                            <label class="required form-label h6">1.Company Vehicle returned:
                                            </label>
                                            &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
                                            &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;

                                            Yes: <input type="radio" name="VehicleReturned" value="1"
                                                        @if(isset($extraInfo[13] ) && $extraInfo[13] == 1) checked @endif>
                                            &#160;&#160;
                                            No: <input type="radio" name="VehicleReturned" value="0"
                                                       @if(isset($extraInfo[13] ) && $extraInfo[13] == 0) checked @endif>
                                            &#160;&#160;
                                            N/A: <input type="radio" name="VehicleReturned" value="2"
                                                        @if(isset($extraInfo[13] ) && $extraInfo[13] == 0) checked @endif>
                                        </div>
                                        <div>
                                            <label class="required form-label h6">2.Equipment hand Over:
                                            </label>
                                            &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
                                            &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
                                            &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
                                            Yes: <input type="radio" name="EquipmentHandOver" value="1"
                                                        @if(isset($extraInfo[14] ) && $extraInfo[14] == 1) checked @endif>
                                            &#160;&#160;
                                            No: <input type="radio" name="EquipmentHandOver" value="0"
                                                       @if(isset($extraInfo[14] ) && $extraInfo[14] == 0) checked @endif>
                                            &#160;&#160;
                                            N/A: <input type="radio" name="EquipmentHandOver" value="2"
                                                        @if(isset($extraInfo[14] ) && $extraInfo[14] == 0) checked @endif>
                                        </div>
                                        <div>
                                            <label class="required form-label h6">3.Fuel Card returned
                                                condition
                                            </label>
                                            &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
                                            &#160;&#160;&#160;&#160;&#160;&#160;
                                            Yes: <input type="radio" name="FuelReturned" value="1"
                                                        @if(isset($extraInfo[14] ) && $extraInfo[15] == 1) checked @endif>
                                            &#160;&#160;
                                            No: <input type="radio" name="FuelReturned" value="0"
                                                       @if(isset($extraInfo[14] ) && $extraInfo[15] == 0) checked @endif>
                                            &#160;&#160;
                                            N/A: <input type="radio" name="FuelReturned" value="2"
                                                        @if(isset($extraInfo[14] ) && $extraInfo[15] == 0) checked @endif>
                                        </div>
                                        <div>
                                            <label class="required form-label h6">4.Good shape equipment/Vehicle
                                            </label>
                                            &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
                                            &#160;
                                            Yes: <input type="radio" name="shapeEquipment" value="1"
                                                        @if(isset($extraInfo[14] ) && $extraInfo[16] == 1) checked @endif>
                                            &#160;&#160;
                                            No: <input type="radio" name="shapeEquipment" value="0"
                                                       @if(isset($extraInfo[14] ) && $extraInfo[16] == 0) checked @endif>
                                            &#160;&#160;
                                            N/A: <input type="radio" name="shapeEquipment" value="2"
                                                        @if(isset($extraInfo[14] ) && $extraInfo[16] == 0) checked @endif>
                                        </div>
                                    </div>
                                @elseif(in_array($stage->stage_name,['ClearanceStores']))
                                    <div class="col-sm-5 text-left">
                                        <div>
                                            <label class="required form-label h6">1.PPE Items returned:
                                            </label>
                                            &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
                                            &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
                                            &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
                                            Yes: <input type="radio" name="PPEItem" value="1"
                                                        @if(isset($extraInfo[17] ) && $extraInfo[17] == 1) checked @endif>
                                            &#160;&#160;
                                            No: <input type="radio" name="PPEItem" value="0"
                                                       @if(isset($extraInfo[17] ) && $extraInfo[17] == 0) checked @endif>
                                            &#160;&#160;
                                            N/A: <input type="radio" name="PPEItem" value="2"
                                                        @if(isset($extraInfo[17] ) && $extraInfo[17] == 0) checked @endif>
                                        </div>
                                        <div>
                                            <label class="required form-label h6">2. Other Store Inventory Cleared :
                                            </label>
                                            &#160;&#160;&#160;&#160;&#160;&#160;
                                            Yes: <input type="radio" name="storeInventoryCleared" value="1"
                                                        @if(isset($extraInfo[18] ) && $extraInfo[18] == 1) checked @endif>
                                            &#160;&#160;
                                            No: <input type="radio" name="storeInventoryCleared" value="0"
                                                       @if(isset($extraInfo[18] ) && $extraInfo[18] == 0) checked @endif>
                                            &#160;&#160;
                                            N/A: <input type="radio" name="storeInventoryCleared" value="2"
                                                        @if(isset($extraInfo[18] ) && $extraInfo[18] == 0) checked @endif>
                                        </div>

                                    </div>
                                @elseif(in_array($stage->stage_name,['ClearanceFinance']))
                                    <div class="col-sm-5 text-left">
                                        <div>
                                            <label class="required form-label h6">1.Outstanding deductions settled
                                            </label>
                                            &#160;&#160;&#160;&#160;&#160;&#160;

                                            Yes: <input type="radio" name="OutstandingDeductions" value="1"
                                                        @if(isset($extraInfo[19] ) && $extraInfo[19] == 1) checked @endif>
                                            &#160;&#160;
                                            No: <input type="radio" name="OutstandingDeductions" value="0"
                                                       @if(isset($extraInfo[19] ) && $extraInfo[19] == 0) checked @endif>
                                            &#160;&#160;
                                            N/A: <input type="radio" name="OutstandingDeductions" value="2"
                                                        @if(isset($extraInfo[19] ) && $extraInfo[19] == 0) checked @endif>
                                        </div>
                                    </div>
                                @elseif(in_array($stage->stage_name,['ClearanceIT']))
                                    <div class="col-sm-5 text-left">
                                        <div>
                                            <label class="required form-label h6">Lap-Top returned
                                            </label>
                                            &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;

                                            Yes: <input type="radio" name="LapTopReturned" value="1"
                                                        @if(isset($extraInfo[20] ) && $extraInfo[20] == 1) checked @endif>
                                            &#160;&#160;
                                            No: <input type="radio" name="LapTopReturned" value="0"
                                                       @if(isset($extraInfo[20] ) && $extraInfo[20] == 0) checked @endif>
                                            &#160;&#160;
                                            N/A: <input type="radio" name="LapTopReturned" value="2"
                                                        @if(isset($extraInfo[20] ) && $extraInfo[20] == 0) checked @endif>
                                        </div>
                                        <div>
                                            <label class="required form-label h6">Desktop Hand over
                                            </label>
                                            &#160;&#160;&#160;&#160;&#160;&#160;

                                            Yes: <input type="radio" name="DesktopHandOver" value="1"
                                                        @if(isset($extraInfo[21] ) && $extraInfo[21] == 1) checked @endif>
                                            &#160;&#160;
                                            No: <input type="radio" name="DesktopHandOver" value="0"
                                                       @if(isset($extraInfo[21] ) && $extraInfo[21] == 0) checked @endif>
                                            &#160;&#160;
                                            N/A: <input type="radio" name="DesktopHandOver" value="2"
                                                        @if(isset($extraInfo[21] ) && $extraInfo[21] == 0) checked @endif>
                                        </div>
                                        <div>
                                            <label class="required form-label h6">Mobile and Sim card
                                            </label>
                                            &#160;&#160;&#160;&#160;

                                            Yes: <input type="radio" name="Mobile&SmCard" value="1"
                                                        @if(isset($extraInfo[22] ) && $extraInfo[22] == 1) checked @endif>
                                            &#160;&#160;
                                            No: <input type="radio" name="Mobile&SmCard" value="0"
                                                       @if(isset($extraInfo[22] ) && $extraInfo[22] == 0) checked @endif>
                                            &#160;&#160;
                                            N/A: <input type="radio" name="Mobile&SmCard" value="2"
                                                        @if(isset($extraInfo[22] ) && $extraInfo[22] == 0) checked @endif>
                                        </div>
                                        <div>
                                            <label class="required form-label h6">Others (Printer, Scanner, Camera, USB,
                                                External HD)
                                            </label>
                                            <br>
                                            Yes: <input type="radio" name="OthersDevices" value="1"
                                                        @if(isset($extraInfo[24] ) && $extraInfo[24] == 1) checked @endif>
                                            &#160;&#160;
                                            No: <input type="radio" name="OthersDevices" value="0"
                                                       @if(isset($extraInfo[24] ) && $extraInfo[24] == 0) checked @endif>
                                            &#160;&#160;
                                            N/A: <input type="radio" name="OthersDevices" value="2"
                                                        @if(isset($extraInfo[24] ) && $extraInfo[24] == 0) checked @endif>
                                            <input type="text" placeholder="write the device here .. "
                                                   class="form-control" name="OthersText"
                                                   value="{{$extraInfo[23] ?? '' }}">

                                        </div>

                                    </div>
                                @elseif(in_array($stage->stage_name,['HrApproval']))
                                    <div class="col-sm-5 text-left">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="HrProceed"
                                                   name="HrProceed" value="1"
                                                   @if(isset($extraInfo[25]) && $extraInfo[25] == 1) checked @endif>
                                            <label class="custom-control-label h6" for="HrProceed">Proceed for
                                                leave:</label>
                                        </div>

                                    </div>
                                @elseif(in_array($stage->stage_name,['GroupHRDirectorApproval']))
                                    <div class="col-sm-5 text-left">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="DirectorHrProceed"
                                                   name="DirectorHrProceed" value="1"
                                                   @if(isset($extraInfo[26]) && $extraInfo[26] == 1) checked @endif>
                                            <label class="custom-control-label h6" for="DirectorHrProceed">Proceed for
                                                leave:</label>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-sm-5 text-left">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            @if(isset($stage->employee))
                                                <label class="h6">Employee Name</label>
                                                :{{$stage->employee->empName}}
                                                <br>
                                                <label class="h6">Employee Code</label>
                                                : {{$stage->employee->empCode}}
                                                <br>
                                                <label class="h6">Employee Mobile</label>
                                                : {{$stage->employee->mobile }}
                                                <br>
                                                <label class="h6">Last Submission</label>: {{$extraInfo[3] ?? ''}}
                                            @else
                                                <label
                                                    class="h6">{{'Department : ' . $states[$stage->stage_name]}}</label>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-2 text-left">
                                    @if($stage->avilableStage($stage->stage_name))
                                        @if((isset($stage->employee) && $stage->employee->id == $employee->id) || $employee->isHasPermission($stage->stage_name))
                                            <button class="btn btn-primary col-sm-8 " style="display: block;"
                                                    name="status" type="button" value="approved" data-toggle="modal"
                                                    data-target="#approved{{$stage->id}}">
                                                Approve
                                            </button>
                                            <button class="btn btn-warning col-sm-8 mt-1" style="display: block;"
                                                    name="status" type="button" value="On Hold" data-toggle="modal"
                                                    data-target="#onHold{{$stage->id}}">
                                                Hold
                                            </button>
                                            <button class="btn btn-danger col-sm-8 mt-1" style="display: block;"
                                                    name="status" type="button" value="rejected" data-toggle="modal"
                                                    data-target="#rejected{{$stage->id}}">
                                                Reject
                                            </button>
                                        @else
                                            <label class="btn btn-warning col-sm-12 mt-1" style="display: block;">
                                                {{ucfirst(strtolower($stage->status))}}
                                            </label>

                                        @endif
                                    @else
                                        <label class="btn btn-danger col-sm-12 mt-1" style="display: block;">
                                            {{'Not Ready yet !'}}
                                        </label>
                                    @endif
                                    <input type="hidden" name="stageId" value="{{$stage->id}}">
                                </div>

                                <div class="col-sm-8">
                                    <label class="required form-label">Comments</label>
                                    <textarea class="form-control mb-2" name="stageComments" id="" cols="30"
                                              rows="5">{{$stage->comments}}</textarea>
                                </div>
                                <div class="col-sm-4 text-center row mt-3">
                                    @if((isset($stage->employee) && $stage->employee->id == $employee->id) || $employee->isHasPermission($stage->stage_name))
                                        <label for="" class="col-sm-5">Upload Your Signature</label>
                                        <input type="file" class="form-control col-sm-7" name="signature">
                                    @endif
                                    <img class="col-sm-12" src="{{asset('assets/images/' . $stage->attachments ) }}"
                                         alt=""
                                         style="width:150px;height:150px">
                                </div>


                                <!-- Hold Modal -->
                                <div style="display:none" class="modal fade" id="onHold{{$stage->id}}" tabindex="-1"
                                     role="dialog"
                                     aria-labelledby="onHold{{$stage->id}}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Hold Leave
                                                    Reasons</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" style="font-size:15px">

                                                <b>Here are 6 common reasons for leave cancellation, which can
                                                    serve as
                                                    guidelines for employees:</b>
                                                <hr>
                                                <div>
                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" type="radio"
                                                               name="onHoldReasons" id="reason1"
                                                               value="Urgent Business Needs" checked
                                                               @if(isset($extraInfo[29]) && $extraInfo[29] == "Urgent Business Needs") checked @endif>
                                                        <label class="form-check-label" for="reason1">
                                                            <b>Urgent Business Needs : </b> When unexpected
                                                            work requirements or deadlines necessitate the
                                                            employee&#39;s presence at work.
                                                        </label>
                                                    </div>

                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" type="radio"
                                                               name="onHoldReasons" id="reason3"
                                                               value="Handover Not Completed"
                                                               @if(isset($extraInfo[29]) && $extraInfo[29] == "Handover Not Completed") checked @endif>
                                                        <label class="form-check-label" for="reason2">
                                                            <b>Handover Not Completed: </b> When the employee
                                                            has not
                                                            properly handed over their
                                                            responsibilities and tasks to a colleague before
                                                            taking
                                                            leave.
                                                        </label>
                                                    </div>

                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" type="radio"
                                                               name="onHoldReasons" id="reason3"
                                                               value="Priority"
                                                               @if(isset($extraInfo[29]) && $extraInfo[29] == "Priority") checked @endif>
                                                        <label class="form-check-label" for="reason2">
                                                            <b>Priority: </b> If multiple leave requests
                                                            overlap,
                                                            managers may prioritize based on departmental
                                                            needs..
                                                        </label>
                                                    </div>

                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" type="radio"
                                                               name="onHoldReasons" id="reason3"
                                                               value="Project Changes"
                                                               @if(isset($extraInfo[29]) && $extraInfo[29] == "Project Changes") checked @endif>
                                                        <label class="form-check-label" for="reason2">
                                                            <b>Project Changes: </b>When abrupt changes in
                                                            project
                                                            timelines or scope impact planned leave.
                                                        </label>
                                                    </div>

                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" type="radio"
                                                               name="onHoldReasons" id="reason3"
                                                               value="Clearance Not Completed"
                                                               @if(isset($extraInfo[29]) && $extraInfo[29] == "Clearance Not Completed") checked @endif>
                                                        <label class="form-check-label" for="reason2">
                                                            <b>Clearance Not Completed: </b>When required
                                                            clearance
                                                            processes or tasks associated with the leave
                                                            have not been finished by the employee.
                                                        </label>
                                                    </div>


                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" type="radio"
                                                               name="onHoldReasons" id="reason4"
                                                               value="Policy Violations"
                                                               @if(isset($extraInfo[29]) && $extraInfo[29] == "Policy Violations") checked @endif>
                                                        <label class="form-check-label" for="reason2">
                                                            <b>Policy Violations: </b> When the leave request
                                                            doesn&#39;t
                                                            align with company leave policies, such as
                                                            insufficient notice or exceeding allowed balances.
                                                        </label>
                                                    </div>


                                                    <input type="radio" name="onHoldReasons"
                                                           value="otherReasonsHold"
                                                           id="otherReasonsHold"
                                                           @if(isset($extraInfo[29]) && $extraInfo[29] == "otherReasonsHold") checked
                                                           @endif
                                                           onchange="handleRadioChange('hold')">
                                                    <label for="policyViolations"><b>Other Reasons</b> (Specify)</label><br>
                                                    <textarea name="otherReasonsHoldText" class="col-sm-12"
                                                              id="otherReasonsHoldText">@if(isset($extraInfo[30])){{$extraInfo[30]}}@endif</textarea>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">
                                                    No
                                                </button>
                                                <button type="submit" class="btn btn-warning" name="status"
                                                        value="On Hold">On Hold
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Approve Modal -->
                                <div style="display:none" class="modal fade" id="approved{{$stage->id}}" tabindex="-1"
                                     role="dialog"
                                     aria-labelledby="approved{{$stage->id}}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Approve
                                                    Leave
                                                    Confirmation</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure, you want to approve your leave ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">
                                                    No
                                                </button>
                                                <button type="submit" class="btn btn-primary" name="status"
                                                        value="approved">Approve
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Reject Modal -->
                                <div style="display:none" class="modal fade" id="rejected{{$stage->id}}" tabindex="-1"
                                     role="dialog"
                                     aria-labelledby="rejected{{$stage->id}}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Reject
                                                    Leave
                                                    Reasons</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" style="font-size:15px">

                                                <b>Here are 8 common reasons for leave cancellation, which can
                                                    serve as
                                                    guidelines for employees:</b>
                                                <hr>
                                                <div>
                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" type="radio"
                                                               name="onRejectReasons" id="rejectReason1" checked value
                                                               @if(isset($extraInfo[31]) && $extraInfo[31] == "Urgent Business Needs") checked
                                                               @endif
                                                               value="Urgent Business Needs">
                                                        <label class="form-check-label" for="reason1">
                                                            <b>Urgent Business Needs : </b> When unexpected
                                                            work requirements or deadlines necessitate the
                                                            employee&#39;s presence at work.
                                                        </label>
                                                    </div>

                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" type="radio"
                                                               name="onRejectReasons" id="rejectReason2"
                                                               @if(isset($extraInfo[31]) && $extraInfo[31] == "Incorrect Manager Approval") checked
                                                               @endif
                                                               value="Incorrect Manager Approval">
                                                        <label class="form-check-label" for="reason2">
                                                            <b>Incorrect Manager Approval : </b> If the Leave
                                                            was not
                                                            approved or authorized by the responsible
                                                            manager.
                                                        </label>
                                                    </div>

                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" type="radio"
                                                               name="onRejectReasons" id="rejectReason3"
                                                               @if(isset($extraInfo[31]) && $extraInfo[31] == "Handover Not Completed") checked
                                                               @endif
                                                               value="Handover Not Completed">
                                                        <label class="form-check-label" for="reason2">
                                                            <b>Handover Not Completed: </b> When the employee
                                                            has not
                                                            properly handed over their
                                                            responsibilities and tasks to a colleague before
                                                            taking
                                                            leave.
                                                        </label>
                                                    </div>

                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" type="radio"
                                                               name="onRejectReasons" id="rejectReason4"
                                                               @if(isset($extraInfo[31]) && $extraInfo[31] == "Incomplete Clearance") checked
                                                               @endif
                                                               value="Incomplete Clearance">
                                                        <label class="form-check-label" for="reason2">
                                                            <b>Incomplete Clearance: </b> If the required
                                                            clearance with
                                                            the leave is not completed or missed by the
                                                            employee.
                                                        </label>
                                                    </div>

                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" type="radio"
                                                               name="onRejectReasons" id="rejectReason5"
                                                               @if(isset($extraInfo[31]) && $extraInfo[31] == "Employee Agreement") checked
                                                               @endif
                                                               value="Employee Agreement">
                                                        <label class="form-check-label" for="reason2">
                                                            <b>Employee Agreement: </b> If the employee
                                                            voluntarily
                                                            agrees to cancel or modify their approved
                                                            leave.
                                                        </label>
                                                    </div>

                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" type="radio"
                                                               name="onRejectReasons" id="rejectReason6"
                                                               @if(isset($extraInfo[31]) && $extraInfo[31] == "Staffing Shortages") checked
                                                               @endif
                                                               value="Staffing Shortages">
                                                        <label class="form-check-label" for="reason2">
                                                            <b>Staffing Shortages: </b> If granting leave would
                                                            result
                                                            in insufficient staff levels, disrupting
                                                            operations.
                                                        </label>
                                                    </div>

                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" type="radio"
                                                               name="onRejectReasons" id="rejectReason7"
                                                               @if(isset($extraInfo[31]) && $extraInfo[31] == "Policy Violations") checked
                                                               @endif
                                                               value="Policy Violations">
                                                        <label class="form-check-label" for="reason2">
                                                            <b>Policy Violations: </b> When the leave request
                                                            doesn&#39;t
                                                            align with company leave policies, such as
                                                            insufficient notice or exceeding allowed balances.
                                                        </label>
                                                    </div>

                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" type="radio"
                                                               name="onRejectReasons" id="rejectReason8"
                                                               @if(isset($extraInfo[31]) && $extraInfo[31] == "Legal/Regulatory Requirements") checked
                                                               @endif
                                                               value="Legal/Regulatory Requirements">
                                                        <label class="form-check-label" for="reason2">
                                                            <b>Legal/Regulatory Requirements: </b> When legal or
                                                            regulatory mandates demand the employee&#39;s
                                                            availability.
                                                        </label>
                                                    </div>

                                                    <input type="radio" name="onRejectReasons"
                                                           value="otherReasonsReject"
                                                           @if(isset($extraInfo[31]) && $extraInfo[31] == "otherReasonsReject") checked
                                                           @endif
                                                           id="otherReasonsReject"
                                                           onchange="handleRadioChange('reject')">
                                                    <label for="policyViolations"><b>Other Reasons</b> (Specify)</label><br>
                                                    <textarea name="otherReasonsRejectText" class="col-sm-12"
                                                              id="otherReasonsRejectText">@if(isset($extraInfo[32])){{$extraInfo[32]}}@endif</textarea>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">
                                                    No
                                                </button>
                                                <button type="submit" class="btn btn-danger" name="status"
                                                        value="rejected">Reject
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>

                        </div>
                        {{--Hand Over Stage content--}}
                    @endforeach


                </div>
            </div>
            <!--end::Card header-->
        </div>
        <br><br>
    </div>
@endsection
@section('script')

    <script>
        function handleRadioChange(e) {
            if (e == "hold") {
                // Get the value of the selected radio button
                var radioValue = document.querySelector('input[name="onHoldReasons"]:checked').value;

                // Get the specific input element
                var specificInput = document.getElementById('otherReasonsHoldText');

                // Check if the radio button with value "xyz" is selected
                if (radioValue === 'otherReasonsHold') {
                    // Make the specific input required
                    specificInput.required = true;
                } else {
                    // Remove the requirement for the specific input
                    specificInput.required = false;
                }
            } else {
                // Get the value of the selected radio button
                var radioValue1 = document.querySelector('input[name="onRejectReasons"]:checked').value;

                // Get the specific input element
                var specificInput1 = document.getElementById('otherReasonsRejectText');

                // Check if the radio button with value "xyz" is selected
                if (radioValue1 === 'otherReasonsReject') {
                    // Make the specific input required
                    specificInput1.required = true;
                } else {
                    // Remove the requirement for the specific input
                    specificInput1.required = false;
                }

            }
        }

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

        // Get references to the select element and the div
        var selectElement = document.getElementById("mySelect");
        var divElement = document.getElementById("myDivToShow");
        // Array of values myDivToShow will appear in
        var validValues = ['1', '2'];

        // Add an event listener to detect changes in the select element
        function checkAndUpdateDiv() {
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

        selectElement.addEventListener("change", checkAndUpdateDiv);
        window.addEventListener("load", checkAndUpdateDiv);

        function printAndExpand() {
            // Expand all collapse elements
            $('.collapse').collapse('show');

            // Trigger print
            window.print();
        }
    </script>
@endsection
