@extends('layouts.site')
@section('content')
    <style>
        #ring-container {
            z-index: 1111111;
            position: fixed;
            width: 100%;
            height: 100%;
            background: #262626;
            opacity: 0.9;

        }

        .ring {

            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 150px;
            height: 150px;
            background: transparent;
            border: 3px solid #3c3c3c;
            border-radius: 50%;
            text-align: center;
            line-height: 150px;
            font-family: sans-serif;
            font-size: 20px;
            color: #fff000;
            letter-spacing: 4px;
            text-transform: uppercase;
            text-shadow: 0 0 10px #fff000;
            box-shadow: 0 0 20px rgba(0, 0, 0, .5);
        }

        .ring:before {
            content: '';
            position: absolute;
            top: -3px;
            left: -3px;
            width: 100%;
            height: 100%;
            border: 3px solid transparent;
            border-top: 3px solid #fff000;
            border-right: 3px solid #fff000;
            border-radius: 50%;
            animation: animateC 2s linear infinite;
        }

        .ring span {
            display: block;
            position: absolute;
            top: calc(50% - 2px);
            left: 50%;
            width: 50%;
            height: 4px;
            background: transparent;
            transform-origin: left;
            animation: animate 2s linear infinite;
        }

        .ring span:before {
            content: '';
            position: absolute;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: #fff000;
            top: -6px;
            right: -8px;
            box-shadow: 0 0 20px #fff000;
        }

        @keyframes animateC {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes animate {
            0% {
                transform: rotate(45deg);
            }
            100% {
                transform: rotate(405deg);
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div id="ring-container" style="display: none;">
        <div id="ring" class="ring">Loading
            <span></span>
        </div>
    </div>
    <!--hero section start-->
    <section id="hero" class="hero-section  background-img"
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
    <form action="{{route('employee.submitKpi')}}" method="POST" class="" id="myForm" enctype="multipart/form-data">
    @csrf


    <!--promo section start-->
        <section class="promo-section pt-100 ">
            <div class="text-left">
                <a href="{{route('employee.dashboard')}}" style="font-size:28px;color:#3a54a8"><i
                        class="fa fa-angle-double-left"></i> Back</a>
            </div>
            <div class="container text-center" style="max-width: 85vw;">
                @isset($employee->image)
                    <div class=" text-right">
                        <img src="{{asset("assets/images/employees/$employee->image")}}"
                             style="height: 150px; width: 150px; border-radius: 50%">
                    </div>
                @endisset
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-heading text-center mb-5">
                            <h2 style="color: #3a54a8">STAFF PERFORMANCE REVIEW</h2>
                        </div>
                    </div>
                </div>
                <style>
                    b {
                        font-weight: 700;
                    }

                    hr {
                        border-top: 3px solid;
                    }

                    .table-bordered td, .table-bordered th {
                        border: 1px solid #3a54a8;
                    }

                    .form-control {
                        border-color: #3a54a8;
                        padding: 0.975rem 0.85rem;
                    }
                </style>
                <div class="row g-4 justify-content-center equal text-justify">
                    <table id="" class="table table-bordered dt-responsive nowrap text-left m-3 p-3"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%; border: 5px solid #3a54a8">
                        <tr>
                            <td class="font-weight-bold">Emp #</td>
                            <td>{{$employee->empCode}}</td>
                            <td class="font-weight-bold">Date of Joining</td>
                            <td>{{$employee->joiningDate}}</td>
                            <td class="font-weight-bold">Total years in company</td>
                            <td><?php
                                $date1 = new DateTime();
                                $date2 = new DateTime($employee->joiningDate);
                                $interval = $date1->diff($date2);
                                echo $interval->y . " years, " . $interval->m . " months" ?>
                            </td>
                            <td class="font-weight-bold">Project Number</td>
                            <td>{{$employee->projectDepartmentNumber}}</td>
                        </tr>
                        <tr>
                            <td style="width: 13.5%;" class="font-weight-bold">Employee Name:</td>
                            <td style="width: 13%;">{{$employee->empName}}</td>
                            <td style="width: 14%;" class="font-weight-bold">Position / Title:</td>
                            <td style="width: 14.28%;">{{$employee->designation}}</td>
                            <td class="font-weight-bold">Department/Project:</td>
                            <td>{{$employee->projectDepartmentName}}</td>
                            <td style=" width: 13%;" class="font-weight-bold">Year of evaluation:</td>
                            <td colspan="2">2023</td>
                        </tr>
                        <tr>
                            {{--                            <td style="color: #1e7e34" class="font-weight-bold">Manager Name:</td>--}}
                            {{--                            <td></td>--}}
                            {{--                            <td style="color: #1e7e34" class="font-weight-bold">Department/Project:</td>--}}
                            {{--                            <td>{{$kpi[0]->employee->projectDepartmentName}}</td>--}}
                            {{--                            <td style="color: #1e7e34" class="font-weight-bold">Date of Evaluation:</td>--}}
                            {{--                            <td style="">--}}
                            {{--                                1st Evaluation Date:--}}
                            {{--                                {{$kpi[0]->Evaluation1}}--}}
                            {{--                            </td>--}}
                            {{--                            <td style="">--}}
                            {{--                                2nd Evaluation Date:--}}
                            {{--                                {{$kpi[0]->Evaluation2}}--}}
                            {{--                            </td>--}}
                        </tr>
                    </table>
                    <div class="col-12 mt-3">
                        <table id="" class="table table-bordered dt-responsive nowrap text-left"
                               style="border-collapse: collapse; border-spacing: 0; width: 100%; border: 2px solid #3a54a8">
                            <tr class="m-3 p-3">
                                <td colspan="2" style="border-right: 0px">How many Manager/ Supervisor do you have?</td>
                                <td style="border: 0px">
                                    <input type="radio" class="" onclick="manager_count_select()" name="manager_count"
                                           value="1" id="manager_count1" @if($employee->kpi->manager_count == 1) checked
                                           @endif required>
                                    <label for="manager_count1">One</label>
                                </td>
                                <td style="border: 0px">
                                    <input type="radio" onclick="manager_count_select()" class="" name="manager_count"
                                           value="2" id="manager_count2" @if($employee->kpi->manager_count == 2) checked
                                           @endif  required>
                                    <label for="manager_count2">Two</label>
                                </td>
                            </tr>
                            <tr>
                        </table>

                        <h4 style="color: #3a54a8" class="mt-5">1. For employee's KPI <span
                                style="text-align: justify; font-weight: 800">(Key Objectives)</span></h4>
                        <p style="text-align: justify">
                            List your Key Objectives which are the main priority of your job during the reporting
                            period. Ideally you should have no more than 5 Key Objectives. Your Key Objectives should
                            add up to a weighting of 100. The weighting is a measure of the importance of each objective
                            so the higher the value, the more important the objective. Objectives can be related to
                            Safety, Project Controls, Financial, Strategic, Technical, Quality etc. It is mandatory for
                            each site staff to include a Safety Objective.
                        </p>
                        <!--    <table id="" class="table table-bordered dt-responsive nowrap text-left"-->
                        <!--       style="border-collapse: collapse; border-spacing: 0; width: 100%; border: 2px solid #3a54a8">-->
                        <!--    <tr class="m-3 p-3">-->
                        <!--        <td colspan="2" style="border-right: 0px">-->
                        <!--            <div title="The question is designed to understand if you performing an additional role alongside your primary position or multiple roles within the company. This information helps us gain insight into the various responsibilities you might be handling alongside your primary position. Please select the appropriate response based on whether you are currently performing additional roles in addition to your main role. Your response will provide us with valuable context as we evaluate your performance and set objectives.">-->
                        <!--                Are you performing an additional role alongside your primary position?-->
                        <!--            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>-->
                        <!--            </div>-->
                        <!--            <div class="">-->
                        <!--                <input type="radio" class="" onclick="additional_role_fun()" name="additional_role1" value="Yes" id="additional_role_yes" required>-->
                        <!--                <label for="manager_count1mr-4">Yes</label>-->
                        <!--                <input type="radio" onclick="additional_role_fun()" class="" name="additional_role1" value="No" id="additional_role_no" required>-->
                        <!--                <label for="manager_count2">No</label>-->
                        <!--            </div>-->
                        <!--        </td>-->
                        <!--        <td style="border: 0px; visibility:hidden" id="additional_role_select">-->
                        <!--            Additional role list-->
                        <!--            <br>-->
                        <!--            <input list="additional_role" name="additional_role" id="additional_role_toty" onchange="set_additional_role()">-->
                        <!--            <datalist id="additional_role">-->
                    <!--                @foreach ($projectNames as $projectName)-->
                    <!--                    <option value="{{ $projectName['projectDepartmentName'] }}">-->
                        <!--                @endforeach-->
                        <!--            </datalist>-->
                        <!--        </td>-->
                        <!--        <td style="border: 0px; width:35%; visibility:hidden" id="additional_role_emp_remark">-->
                        <!--            Remarks-->
                        <!--            <br>-->
                        <!--            <textarea class="form-control" name="additional_role_remark" id="additional_role_remark" style="height: 57px;"></textarea>-->
                        <!--        </td>-->
                        <!--    </tr>-->
                        <!--    <tr>-->
                        <!--</table>-->
                        <p>The system permits you to provide an objective description within a maximum of 150 words,
                            with a requirement to set the objectives' weighting at 100%.</p>
                        <table id="" class="table table-bordered dt-responsive nowrap"
                               style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <tbody id="ObjectivesClone">

                            <tr style="background-color: #3a54a8; color: white; font-weight: bold; text-align:center">
                                <th colspan="8">
                                    Key Objectives
                                </th>
                            </tr>
                            <tr class="text-left">
                                <th style="width: 70px"
                                    title="Set a target of at least 3 objectives and avoid exceeding 5 key This careful selection of objectives helps you maintain a focused and achievable direction.">
                                    <b>Obj.
                                        No. <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                    </b>
                                </th>
                                <th title="Key Objectives which have been agreed with your Manager. Your Key Objectives are the main priorities of your role and the specific results and targets expected to be achieved during the reporting period.">
                                    <b>Type of Objective <i class="fa fa-exclamation-circle" aria-hidden="true"></i></b>
                                </th>
                                <th title="Objectives can be related to Safety, Project Controls, Financial, Strategic, Technical, Quality etc.">
                                    <b>Objective <i class="fa fa-exclamation-circle" aria-hidden="true"></i></b>
                                </th>
                                <th title="Specify how success will be measured. For example, 'Complete Project X by [date]' shows successful attainment">
                                    <b>Results Expected (KPI) <i class="fa fa-exclamation-circle"
                                                                 aria-hidden="true"></i></b>
                                </th>
                                {{--                                <th>--}}
                                {{--                                    <b>Target Date</b>--}}
                                {{--                                </th>--}}
                                <th title="Our objectives should total 100 %. A higher value means greater importance.">
                                    <b>Weighting
                                        <br><small>(out of 100)</small>
                                        <i class="fa fa-exclamation-circle" aria-hidden="true"></i> </b>
                                </th>
                                <th title="When reviewing your objectives consider not only the achievement of the objective but how you achieved it (the values you adhered to).Consider both achievement and the values you followed.">
                                    <b>Comments from Employee <i class="fa fa-exclamation-circle"
                                                                 aria-hidden="true"></i></b>
                                </th>
                                <th title="Use this option to remove rows 4 and 5 if changes are needed.">
                                    <b>Delete <i class="fa fa-exclamation-circle" aria-hidden="true"></i></b>
                                </th>
                            </tr>

                            <?php
                            $Objectives_No = json_decode($kpi[0]->Objectives_No);
                            $Objectives_Type = json_decode($kpi[0]->Objectives_Type);
                            $Objectives_Objective = json_decode($kpi[0]->Objectives_Objective);
                            $Objectives_Results = json_decode($kpi[0]->Objectives_Results);
                            //                            $Objectives_Target = json_decode($kpi[0]->Objectives_Target);
                            $Objectives_Weighting = json_decode($kpi[0]->Objectives_Weighting);
                            $Objectives_Comments_Employee = json_decode($kpi[0]->Objectives_Comments_Employee);
                            ?>
                            @for ($x=0; $x < count($Objectives_No); $x++)
                                <tr>


                                    {{--                                    <th>--}}
                                    {{--                                        {{$Objectives_Target[$x]}}--}}
                                    {{--                                    </th>--}}

                                </tr>
                                <tr>
                                    <th>
                                        <input type="text" class="form-control" name="Objectives_No[]"
                                               style="border-color: white; background-color: white" id="Objectives_No"
                                               value="{{ $Objectives_No[$x]}}">
                                    </th>
                                    <th>
                                    <textarea class="form-control" name="Objectives_Type[]" id="Objectives_Type"
                                              required="required">{{$Objectives_Type[$x]}}</textarea>
                                    </th>
                                    <th>
                                    <textarea class="form-control" maxlength="500" name="Objectives_Objective[]"
                                              id="Objectives_Objective" required="required">{{$Objectives_Objective[$x]}}</textarea>
                                    </th>
                                    <th>
                                    <textarea class="form-control" name="Objectives_Results[]" id="Objectives_Results"
                                              required="required">{{$Objectives_Results[$x]}}</textarea>
                                    </th>
                                    <th>
                                    <textarea class="form-control" name="Objectives_Weighting[]"
                                              id="Objectives_Weighting" required="required"
                                              onchange="calculatechange()">{{$Objectives_Weighting[$x]}}</textarea>
                                    </th>
                                    <th>
                                    <textarea class="form-control" name="Objectives_Comments_Employee[]"
                                              id="Objectives_Comments_Employee">{{$Objectives_Comments_Employee[$x]}}</textarea>
                                    </th>
                                    <th data-toggle="modal"
                                        data-target="#Delete1" id="{{ rand(0, 10000) }}" onclick="removeParentModel(this.id)"
                                        class="btn btn-danger">
                                        Remove
                                    </th>
                                </tr>
                            @endfor


                            </tbody>
                        </table>
                        <div onclick="ObjectivesClone()" class="btn mart-btn disabled pt-4 mb-4"
                             style="width: 200px !important; opacity: 1 !important;">Add Row
                        </div>


                        <h6 class="mt-3" style="text-align: justify; font-weight: 800">
                            Employee Self Rating *
                        </h6>
                        <small>(Refer to Guide on 1st page and Insert Relevant Number)</small>

                        <div class="ml-5">
                            <input type="radio" class="" name="Objectives_Summary_Rating" value="A-VERY GOOD"
                                   id="A-VERYGOOD" required="required" onclick="calculateSum()">
                            <label for="A-VERYGOOD">A-VERY GOOD</label>
                            <br>
                            <input type="radio" class="" name="Objectives_Summary_Rating" value="B-GOOD" id="B-GOOD"
                                   required="required" onclick="calculateSum()">
                            <label for="B-GOOD">B-GOOD</label>
                            <br>
                            <input type="radio" class="" name="Objectives_Summary_Rating" value="C-AVERAGE"
                                   id="C-AVERAGE" required="required" onclick="calculateSum()">
                            <label for="C-AVERAGE">C-AVERAGE</label>
                            <br>
                            <input type="radio" class="" name="Objectives_Summary_Rating" value="D-BELOW AVERAGE"
                                   id="D-BELOWAVERAGE" required="required" onclick="calculateSum()">
                            <label for="D-BELOWAVERAGE">D-BELOW AVERAGE</label>
                            <br>
                            <input type="radio" class="" name="Objectives_Summary_Rating" value="E-UNSATISFACTORY"
                                   id="E-UNSATISFACTORY" required="required" onclick="calculateSum()">
                            <label for="E-UNSATISFACTORY">E-UNSATISFACTORY</label>
                        </div>
                        <div class="mt-4">
                            <b>Remark</b>
                            <textarea class="form-control" name="Review_Self_Rating" id="Review_Self_Rating"></textarea>
                        </div>
                        <hr>

                        <div class=" mt-5 row">
                            <div class="col-4" id="First_Approval1" style="visibility: hidden">
                                <b>First approval: </b>
                                <input list="First_Approval" name="First_Approval" id="First_Approval_toty" required
                                       onchange="set_manager()">
                                <datalist id="First_Approval">
                                    @if($employee->company_id != 1)
                                        <option value="Elie Azzi">
                                        <option value="Mohamed Ahmed Kamal Mahrous">
                                        <option value="Antonio Gabriel Paul Barretto">
                                    @endif
                                    @if($employee->company_id != 2)
                                        <option value="Sunny Samuel">
                                    @endif
                                    @foreach ($managers as $manager)
                                        <option value="{{ $manager->empName }}">
                                    @endforeach
                                </datalist>
                            </div>
                            <div class="col-4" id="First_Approval2" style="visibility: hidden">
                                <b>Final approval: </b>
                                <input list="Final_Approval" name="Final_Approval" id="Final_Approval_toty"
                                       onchange="set_manager()">
                                <datalist id="Final_Approval">
                                    @if($employee->company_id != 1)
                                        <option value="Elie Azzi">
                                        <option value="Mohamed Ahmed Kamal Mahrous">
                                        <option value="Antonio Gabriel Paul Barretto">
                                    @endif
                                    @if($employee->company_id != 2)
                                        <option value="Sunny Samuel">
                                    @endif
                                    @foreach ($managers as $manager)
                                        <option value="{{ $manager->empName }}">
                                    @endforeach
                                </datalist>
                            </div>
                            <div class="col-4">
                                <b>Date: </b>
                                <p>
                                    {{date("Y/m/d")}}
                                </p>
                            </div>


                        </div>

                        <div class="modal fade" id="Delete11" tabindex="-1" aria-labelledby="exampleModalLabe1l"
                             aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabe1l">Confirm Send Requirement</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you First approval is <b id="firstapprovel"></b> <span
                                                id="finalapprovel"></span></p>
                                        <div class="modal-footer">
                                            <button type="button" class="btn mart-btn" style="width: 200px !important;"
                                                    data-dismiss="modal">Cancel
                                            </button>
                                            <div onclick="">
                                                <button type="submit" class="btn mart-btn"
                                                        style="width: 200px !important;">Send Requirement
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row m-5">
                            <div class="col-sm-12 mt-3 text-center">
                                <button type="button" class="btn mart-btn" style="width: 200px !important;"
                                        data-toggle="modal" data-target="#Delete11">
                                    Send Requirement
                                </button>
                            </div>
                        </div>


                        <p class="form-message"></p>
                    </div>
                </div>
            </div>
        </section>
    </form>


    <table class="table table-bordered  text-left" style="background-color: #fff; display: none;">

        <tbody>
        <tr id="ObjectivesClone2">
            <th>
                <input type="text" class="form-control" name="Objectives_No[]"
                       style="border-color: white; background-color: white" id="Objectives_No">
            </th>
            <th>
                <textarea class="form-control" name="Objectives_Type[]" id="Objectives_Type"
                          required="required"></textarea>
            </th>
            <th>
                <textarea class="form-control" name="Objectives_Objective[]" id="Objectives_Objective"
                          required="required"></textarea>
            </th>
            <th>
                <textarea class="form-control" name="Objectives_Results[]" id="Objectives_Results"
                          required="required"></textarea>
            </th>
            {{--                <th>--}}
            {{--                    <input type="date" class="form-control" name="Objectives_Target[]" id="Objectives_Target" required="required">--}}
            {{--                </th>--}}
            <th>
                <textarea class="form-control" name="Objectives_Weighting[]" id="Objectives_Weighting"
                          required="required" onchange="calculatechange()"></textarea>
            </th>
            <th>
                <textarea class="form-control" name="Objectives_Comments_Employee[]"
                          id="Objectives_Comments_Employee"></textarea>
            </th>
            <th data-toggle="modal"
                data-target="#Delete1" id="{{ rand(0, 10000) }}" onclick="removeParentModel(this.id)"
                class="btn btn-danger">
                Remove
            </th>
        </tr>

        </tbody>
    </table>

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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function loadingshow() {

            $('#ring-container').show();
        }

        function ObjectivesClone() {
            var count = $('#ObjectivesClone tr').length;
            console.log(count);
            if (count <= {{count($Objectives_No)}} + count) {
                const contentClone = document.getElementById("ObjectivesClone2");

                const tablecontentClone = document.getElementById("ObjectivesClone");
                const clone = contentClone.cloneNode(true);
                tablecontentClone.appendChild(clone);

                const lastChild1 = document.getElementById("ObjectivesClone2").lastElementChild;
                lastChild1.setAttribute('id', Math.floor(Math.random() * 1000000));
                console.log(lastChild1);

                const firstChild1 = document.getElementById("ObjectivesClone").children[count];
                firstChild1.children[0].children[0].setAttribute('value', count - 1);
                const firstChild2 = document.getElementById("ObjectivesClone").children[count - 1];
                firstChild2.children[0].children[0].setAttribute('value', count - 2);
                console.log(firstChild1);


            } else {
                alert("Maxmum Number of Key Objecteves is 5");
            }

        }

        var deletee = document.getElementById("deleteModel");

        function removeParentModel(el) {
            var element = el;
            console.log(element);

            deletee.innerHTML = `<div class="modal fade" id="Delete1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete this?</p>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger" onclick="removeCloneParent('` + element + `')" data-dismiss="modal">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`;
        }


        function removeCloneParent(el) {
            console.log(el);
            var element = document.getElementById(el);
            $(element).parent().remove();

            var count = $('#ObjectivesClone tr').length;
            // const firstChild1 = document.getElementById("ObjectivesClone").children[count];
            // firstChild1.children[0].children[0].setAttribute( 'value', count-1);
            const firstChild2 = document.getElementById("ObjectivesClone").children[count - 1];
            firstChild2.children[0].children[0].setAttribute('value', count - 2);
        }


        function additional_role_fun() {
            var additional_role_el = document.getElementsByName('additional_role1');
            for (var i = 0; i < additional_role_el.length; i++) {

                // If the current radio button is selected
                if (additional_role_el[i].checked) {

                    // Get the value of the selected radio button
                    var selectedValue = additional_role_el[i].value;

                    if (selectedValue == "Yes") {
                        document.getElementById('additional_role_select').style.visibility = 'visible';
                        document.getElementById('additional_role_emp_remark').style.visibility = 'visible';
                        document.getElementById('additional_role_toty').setAttribute('required', 'required');
                        document.getElementById('additional_role_remark').setAttribute('required', 'required');

                    } else {
                        document.getElementById('additional_role_select').style.visibility = 'hidden';
                        document.getElementById('additional_role_emp_remark').style.visibility = 'hidden';
                        document.getElementById('additional_role_toty').removeAttribute('required');
                        document.getElementById('additional_role_remark').removeAttribute('required');
                    }

                    // Do something with the selected value
                    console.log(selectedValue);

                    // Exit the loop
                    break;
                }
            }
        }

        function manager_count_select() {
            var manager_count = document.getElementsByName('manager_count');
            for (var i = 0; i < manager_count.length; i++) {

                // If the current radio button is selected
                if (manager_count[i].checked) {

                    // Get the value of the selected radio button
                    var selectedValue = manager_count[i].value;

                    if (selectedValue == 1) {
                        document.getElementById('First_Approval1').style.visibility = 'visible';
                        document.getElementById('First_Approval2').style.visibility = 'hidden';
                    } else {
                        document.getElementById('First_Approval1').style.visibility = 'visible';
                        document.getElementById('First_Approval2').style.visibility = 'visible';
                        document.getElementById('fatoty').setAttribute('required', 'required');
                    }

                    // Do something with the selected value
                    console.log(selectedValue);

                    // Exit the loop
                    break;
                }
            }
        }

        function set_manager() {
            var validate;

            var manager_count = document.getElementsByName('manager_count');
            for (var i = 0; i < manager_count.length; i++) {
                var names = [];
                var x = 0;
                @for ($y = 0; $y < count($managers); $y++)
                    names[x] = '{{$managers[$y]->empName}}';
                x++
                @endfor

                // If the current radio button is selected
                if (manager_count[i].checked) {


                    const nameToCheck1 = document.getElementById('firstapprovel').textContent;
                    const nameToCheck2 = document.getElementById('finalapprovel').textContent;
                    console.log(nameToCheck1);
                    if (names.includes(nameToCheck1)) {
                        validate = 'true';
                        <?php $valid = 1 ?>
                        //   alert('Name found in the array.');
                    } else {
                        validate = 'false';
                        <?php $valid = 0 ?>
                        //   alert('Name not found in the array.');
                    }
                    // Get the value of the selected radio button
                    var selectedValue = manager_count[i].value;

                    if (selectedValue == 1) {
                        document.getElementById('firstapprovel').textContent = document.getElementById('First_Approval_toty').value;
                        document.getElementById('finalapprovel').innerHTML = " ";
                    } else {
                        document.getElementById('firstapprovel').textContent = document.getElementById('First_Approval_toty').value;
                        document.getElementById('finalapprovel').innerHTML = "and your final approval is <b>" + document.getElementById('Final_Approval_toty').value + "</b>";
                    }
                    console.log(selectedValue);

                    // Exit the loop
                    break;
                }
            }

        }


        document.getElementById('myForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent the form from submitting by default
            var validate;
            var names = [];
            var x = 0;
            @for ($y = 0; $y < count($managers); $y++)
                names[x] = '{{$managers[$y]->empName}}';
            x++
            @endfor
            const nameToCheck1 = document.getElementById('firstapprovel').textContent;
            const nameToCheck2 = document.getElementById('Final_Approval_toty').value;
            console.log(nameToCheck2);
            if (names.includes(nameToCheck1) || nameToCheck1 == 'Elie Azzi' || nameToCheck1 == 'Mohamed Ahmed Kamal Mahrous' || nameToCheck1 == 'Sunny Samuel' || nameToCheck1 == 'Antonio Gabriel Paul Barretto') {
                var manager_count = document.getElementsByName('manager_count');
                for (var i = 0; i < manager_count.length; i++) {

                    // If the current radio button is selected
                    if (manager_count[i].checked) {

                        // Get the value of the selected radio button
                        var selectedValue = manager_count[i].value;
                        if (selectedValue == 1) {
                            validate = 'true';
                        } else {
                            if (names.includes(nameToCheck2) || nameToCheck2 == 'Elie Azzi' || nameToCheck2 == 'Mohamed Ahmed Kamal Mahrous' || nameToCheck2 == 'Sunny Samuel' || nameToCheck2 == 'Antonio Gabriel Paul Barretto') {
                                validate = 'true';
                            } else {
                                validate = 'false';
                            }
                        }
                    }
                }


//   alert('Name found in the array.');
            } else {
                validate = 'false';
//   alert('Name not found in the array.');
            }

            if (validate == 'true') {
                loadingshow();
                console.log('Input is valid. Submitting the form...');
                event.target.submit(); // Submit the form
            } else {
                alert('First Approval or Final approval is not valid. Please correct the input.');
                // Show an error message or perform other actions to handle the invalid input
            }
        });

        function calculateSum() {
            const textareaElements = document.querySelectorAll('textarea[name="Objectives_Weighting[]"]');
            let total = 0;

            textareaElements.forEach(textareaElement => {
                const inputValue = textareaElement.value;
                const values = inputValue.split(',').map(Number);
                total += values.reduce((accumulator, currentValue) => accumulator + currentValue, 0);
            });

            if (total !== 100) {
                alert("Your weighting for objectives should be set at 100%");
                document.getElementById("A-VERYGOOD").checked = false;
                document.getElementById("B-GOOD").checked = false;
                document.getElementById("C-AVERAGE").checked = false;
                document.getElementById("D-BELOWAVERAGE").checked = false;
                document.getElementById("E-UNSATISFACTORY").checked = false;
            } else {
                // document.getElementById("result").textContent = `Total Objectives Weighting: ${total}`;
            }
        }

        function calculatechange() {
            var Objectives_Summary_Rating = document.getElementsByName('Objectives_Summary_Rating');
            for (var i = 0; i < Objectives_Summary_Rating.length; i++) {

                // If the current radio button is selected
                if (Objectives_Summary_Rating[i].checked) {
                    document.getElementById("A-VERYGOOD").checked = false;
                    document.getElementById("B-GOOD").checked = false;
                    document.getElementById("C-AVERAGE").checked = false;
                    document.getElementById("D-BELOWAVERAGE").checked = false;
                    document.getElementById("E-UNSATISFACTORY").checked = false;
                }
            }
        }


    </script>
@endsection
