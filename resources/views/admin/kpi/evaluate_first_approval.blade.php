@extends('layouts.dashboard')
@include('admin.includes.sidebar')
@include('admin.includes.header')
@include('admin.includes.switcher')
@section('content')
    <style>
        td{
            /* width: 14.28%; */
        }
        b{
            font-weight: 700;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #3a54a8;
        }
        .form-control {
            border-color: #3a54a8;
            padding: 0.975rem 0.85rem;
        }
        hr {
            border-top: 3px solid;
        }
        .btn-danger {
            box-shadow: 0 5px 12px 0 #dc354563;
            background: #dc3545;
            border: 2px solid #dc3545;
            border-radius: 30px;
            margin-top: 5px;
            color:white !important;
            padding: 10px 25px
        }
    </style>
    <!--promo section start-->
    <div class="page-content-wrapper">
        <!-- start page content-->
        <div class="page-content">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-heading text-center mb-5">
                        <h2>STAFF PERFORMANCE REVIEW</h2>
                    </div>
                </div>
            </div>

            <form action="{{route('admin.kpi.store.evaluate.first')}}" method="POST" class=""  enctype="multipart/form-data">
                @csrf
                @isset($kpi[0]->employee->image)
                    <div class="text-right pb-2">
                        <img src="{{asset('assets/images/employees')}}/{{$kpi[0]->employee->image}}" style="height: 150px; width: 150px; border-radius: 50%">
                    </div>
                @endisset
                <input type="hidden" value="{{$kpi[0]->id}}" name="id">
                <div class="row g-4 justify-content-center equal text-justify">
                    <div class="col-12">
                        <table id="" class="table table-bordered dt-responsive nowrap text-left"
                               style="border-collapse: collapse; border-spacing: 0; width: 100%; border: 5px solid #3a54a8">
                            <tr>
                                <td class="font-weight-bold">Emp #</td>
                                <td>{{$kpi[0]->employee->empCode}}</td>
                                <td class="font-weight-bold">Date of Joining</td>
                                <td>{{$kpi[0]->employee->joiningDate}}</td>
                                <td class="font-weight-bold">Total years in company</td>
                                <td><?php
                                    $date1 = new DateTime();
                                    $date2 = new DateTime($kpi[0]->employee->joiningDate);
                                    $interval = $date1->diff($date2);
                                    echo $interval->y . " years, " . $interval->m." months" ?>
                                </td>
                                <td class="font-weight-bold">Project Number</td>
                                <td>{{$kpi[0]->employee->projectDepartmentNumber}}</td>
                            </tr>
                            <tr>
                                <td style="width: 13.5%;" class="font-weight-bold" >Employee Name:</td>
                                <td style="width: 13%;">{{$kpi[0]->employee->empName}}</td>
                                <td style="width: 14%;" class="font-weight-bold">Position / Title:</td>
                                <td style="width: 14.28%;">{{$kpi[0]->employee->designation}}</td>
                                <td class="font-weight-bold">Department/Project:</td>
                                <td>{{$kpi[0]->employee->projectDepartmentName}}</td>
                                <td style=" width: 13%;" class="font-weight-bold">Year of evaluation:</td>
                                <td colspan="2">2023</td>
                            </tr>
                        </table>
                        <h4 style="color: #3a54a8">1.	For employee's KPI <span style="text-align: justify; color:#3a54a8; font-weight: 800">(Key Objectives)</span></h4>
                        <p style="text-align: justify">
                            List your Key Objectives which are the main priority of your job during the reporting period.  Ideally you should have no more than 5 Key Objectives.  Your Key Objectives should add up to a weighting of 100.  The weighting is a measure of the importance of each objective so the higher the value, the more important the objective.  Objectives can be related to Safety, Project Controls, Financial, Strategic, Technical, Quality etc.  It is mandatory for each site staff to include a Safety Objective.
                        </p>
                        <table id="" class="table table-bordered dt-responsive nowrap"
                               style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <tbody id="ObjectivesClone">

                            <tr style="background-color: #3a54a8; color: white; font-weight: bold; text-align:center">
                                <th colspan="8">
                                    Key Objectives
                                </th>
                            </tr>
                            <tr>
                                <th style="width: 70px">
                                    <b>Obj.
                                        No.
                                    </b>
                                </th>
                                <th>
                                    <b>Type of Objective</b>
                                </th>
                                <th>
                                    <b>Objective</b>
                                </th>
                                <th>
                                    <b>Results Expected (KPI)</b>
                                </th>
    {{--                            <th>--}}
    {{--                                <b>Target Date</b>--}}
    {{--                            </th>--}}
                                <th>
                                    <b>Weighting
                                        <br><small>(out of 100)</small>
                                    </b>
                                </th>
                                <th>
                                    <b>Comments from Employee</b>
                                </th>
                            </tr>

                            <?php
                            $Objectives_No = json_decode($kpi[0]->Objectives_No);
                            $Objectives_Type = json_decode($kpi[0]->Objectives_Type);
                            $Objectives_Objective = json_decode($kpi[0]->Objectives_Objective);
                            $Objectives_Results = json_decode($kpi[0]->Objectives_Results);
    //                        $Objectives_Target = json_decode($kpi[0]->Objectives_Target);
                            $Objectives_Weighting = json_decode($kpi[0]->Objectives_Weighting);
                            $Objectives_Comments_Employee = json_decode($kpi[0]->Objectives_Comments_Employee);
                            ?>
                            @for ($x=0; $x < count($Objectives_No); $x++)
                                <tr>
                                    <td>
                                        {{$Objectives_No[$x]}}
                                    </td>
                                    <td>
                                        {{$Objectives_Type[$x]}}
                                    </td>
                                    <td>
                                        {{$Objectives_Objective[$x]}}
                                    </td>
                                    <td>
                                        {{$Objectives_Results[$x]}}
                                    </td>
    {{--                                <th>--}}
    {{--                                    {{$Objectives_Target[$x]}}--}}
    {{--                                </th>--}}
                                    <td>
                                        {{$Objectives_Weighting[$x]}}
                                    </td>
                                    <td>
                                        {{$Objectives_Comments_Employee[$x]}}
                                    </td>
                                </tr>
                            @endfor
                            </tbody>
                        </table>


                        <h6 class="mt-3" style="text-align: justify; font-weight: 800">
                            Employee Self Rating *
                        </h6>
                        <small>(Refer to Guide on 1st page and Insert Relevant Number)</small>

                        <div class="ml-5">
                                <input type="radio" disabled @if($kpi[0]->Objectives_Summary_Rating == 'A-VERY GOOD') checked @endif class="" name="Objectives_Summary_Rating" value="A-VERY GOOD" id="A-VERYGOOD" required="required">
                                <label for="A-VERYGOOD" @if($kpi[0]->Objectives_Summary_Rating == 'A-VERY GOOD') style="border: solid 2px #000000; font-weight: 800; padding: 4px" @endif>A-VERY GOOD</label>
                                <br>
                                <input type="radio" disabled @if($kpi[0]->Objectives_Summary_Rating == 'B-GOOD') checked @endif class="" name="Objectives_Summary_Rating" value="B-GOOD" id="B-GOOD" required="required">
                                <label for="B-GOOD" @if($kpi[0]->Objectives_Summary_Rating == 'B-GOOD') style=" border: solid 2px #000000; font-weight: 800; padding: 4px" @endif>B-GOOD</label>
                                <br>
                                <input type="radio" disabled @if($kpi[0]->Objectives_Summary_Rating == 'C-AVERAGE') checked @endif class="" name="Objectives_Summary_Rating" value="C-AVERAGE" id="C-AVERAGE" required="required">
                                <label for="C-AVERAGE" @if($kpi[0]->Objectives_Summary_Rating == 'C-AVERAGE') style="border: solid 2px #000000; font-weight: 800; padding: 4px" @endif>C-AVERAGE</label>
                                <br>
                                <input type="radio" disabled @if($kpi[0]->Objectives_Summary_Rating == 'D-BELOW AVERAGE') checked @endif class="" name="Objectives_Summary_Rating" value="D-BELOW AVERAGE" id="D-BELOWAVERAGE" required="required">
                                <label for="D-BELOWAVERAGE" @if($kpi[0]->Objectives_Summary_Rating == 'D-BELOW AVERAGE') style="border: solid 2px #000000; font-weight: 800; padding: 4px" @endif>D-BELOW AVERAGE</label>
                                <br>
                                <input type="radio" disabled @if($kpi[0]->Objectives_Summary_Rating == 'E-UNSATISFACTORY') checked @endif class="" name="Objectives_Summary_Rating" value="E-UNSATISFACTORY" id="E-UNSATISFACTORY" required="required">
                                <label for="E-UNSATISFACTORY" @if($kpi[0]->Objectives_Summary_Rating == 'E-UNSATISFACTORY') style="border: solid 2px #000000; font-weight: 800; padding: 4px" @endif>E-UNSATISFACTORY</label>
                            </div>

                        <hr>
                        <h4 style="color: #3a54a8; margin-top:50px">2.	For Manager / Supervisor to review  <span style="text-align: justify; color:#3a54a8; font-weight: 800">(Review)</span></h4>
                        <p style="text-align: justify">
                            When reviewing your objectives consider not only the achievement of the objective but how you achieved it (the values you adhered to).
                        </p>
                        <table id="" class="table table-bordered dt-responsive nowrap"
                                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <tbody id="ObjectivesClone">

                                <tr style="background-color: #3a54a8; color: white; font-weight: bold; text-align:center">
                                    <th colspan="3">
                                        Review
                                    </th>
                                </tr>
                                <tr class="text-center">
                                    <th style="width: 70px">
                                        <b>Obj.
                                            No.
                                        </b>
                                    </th>
                                    <th style="width: 500px">
                                        <b>Manager’s Rating *
                                            <br><small>(Refer to Guide on 1st page and Insert Relevant Number)</small>
                                        </b>
                                    </th>
                                    <th>
                                        <b>Comments from Manager</b>
                                    </th>
                                </tr>

                                <?php
                                $Objectives_No = json_decode($kpi[0]->Objectives_No);
                                ?>
                                @for ($x=0; $x < count($Objectives_No); $x++)
                                    <tr>
                                        <td>
                                            {{$Objectives_No[$x]}}
                                        </td>
                                        <td>
                                            <input type="radio" class="" name="Review_Manager_Rating{{$x}}" value="A-VERY GOOD" id="A-VERYGOOD" required="required">
                                            <label for="A-VERYGOOD">A-VERY GOOD</label>
                                            <br>
                                            <input type="radio" class="" name="Review_Manager_Rating{{$x}}" value="B-GOOD" id="B-GOOD" required="required">
                                            <label for="B-GOOD">B-GOOD</label>
                                            <br>
                                            <input type="radio" class="" name="Review_Manager_Rating{{$x}}" value="C-AVERAGE" id="C-AVERAGE" required="required">
                                            <label for="C-AVERAGE">C-AVERAGE</label>
                                            <br>
                                            <input type="radio" class="" name="Review_Manager_Rating{{$x}}" value="D-BELOW AVERAGE" id="D-BELOWAVERAGE" required="required">
                                            <label for="D-BELOWAVERAGE">D-BELOW AVERAGE</label>
                                            <br>
                                            <input type="radio" class="" name="Review_Manager_Rating{{$x}}" value="E-UNSATISFACTORY" id="E-UNSATISFACTORY" required="required">
                                            <label for="E-UNSATISFACTORY">E-UNSATISFACTORY</label>
                                        </td>
                                        <td>
                                            <textarea class="form-control" name="Review_Comments_Manager[]" id="Review_Comments_Manager"></textarea>
                                        </td>
                                    </tr>
                                @endfor
                                </tbody>
                            </table>

                        <hr>
                        <h4 style="color: #3a54a8; margin-top:50px">3. Development Plan recommended by Manager/Supervisor  <span style="text-align: justify; color:#3a54a8; font-weight: 800">(Development Plan)</span></h4>
                            <p style="text-align: justify">
                            The Development Plan should take in to account anticipated skills/knowledge required to meet key objectives, longer term career objectives and personal development goals.  These may be a combination of on-the-job training, location based project work or formal training courses.
                        </p>
                        <table id="" class="table table-bordered dt-responsive nowrap"
                               style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <tbody id="DevelopmentClone">

                            <tr style="background-color: #3a54a8; color: white; font-weight: bold; text-align:center">
                                <th colspan="7">
                                    Development Plan
                                </th>
                            </tr>
                            <tr>
                                <th style="width: 150px">
                                    <b>Type of Training Course</b>
                                </th>
                                <th>
                                    <b>Description</b>
                                </th>
                                <th style="width: 150px">
                                    <b>Level</b>
                                </th>
                                <th style="width: 210px">
                                    <b>Target Date</b>
                                </th>
                                <th>
                                    <b>Cost of the Training Course</b>
                                </th>
                                <th>
                                    <b>Delete</b>
                                </th>
                            </tr>
                            <!--<tr>-->
                            <!--    <th>-->
                            <!--        <input type="text" class="form-control" name="Development_Type[]" id="Development_Type" required="required">-->
                            <!--    </th>-->
                            <!--    <th>-->
                            <!--        <textarea class="form-control" style="height: 55px" name="Development_Descripsion[]"></textarea>-->
                            <!--    </th>-->
                            <!--    <th>-->
                            <!--        <input type="text" class="form-control" name="Development_Level[]" id="Development_Level" required="required">-->
                            <!--    </th>-->
                            <!--    <th>-->
                            <!--        <input type="date" class="form-control" name="Development_Target[]" id="Development_Target" required="required">-->
                            <!--    </th>-->
                            <!--    <th>-->
                            <!--        <input type="text" class="form-control" name="Development_Cost[]" id="Development_Cost" required="required">-->
                            <!--    </th>-->
                            <!--    <th data-toggle="modal"-->
                            <!--        data-target="#Delete1" id="{{ rand(0, 10000) }}" onclick="removeParentModel(this.id)" class="btn btn-danger">-->
                            <!--        Remove-->
                            <!--    </th>-->
                            <!--</tr>-->


                            </tbody>
                        </table>

                        <div onclick="DevelopmentClone()" class="btn btn-primary mb-3 text-center">Add Row</div>


                        <h4 style="color: #0059bc" class="mt-5">Summary of Overall First Approval</h4>

                        <b>Overall Performance Rating (Manager to Tick)</b>
                        <div class="ml-5">
                            <input type="radio" class="" name="First_Approval_Summary_Rating" value="A-VERY GOOD" id="A-VERYGOOD" required="required">
                            <label for="A-VERYGOOD">A-VERY GOOD</label>
                            <br>
                            <input type="radio" class="" name="First_Approval_Summary_Rating" value="B-GOOD" id="B-GOOD" required="required">
                            <label for="B-GOOD">B-GOOD</label>
                            <br>
                            <input type="radio" class="" name="First_Approval_Summary_Rating" value="C-AVERAGE" id="C-AVERAGE" required="required">
                            <label for="C-AVERAGE">C-AVERAGE</label>
                            <br>
                            <input type="radio" class="" name="First_Approval_Summary_Rating" value="D-BELOW AVERAGE" id="D-BELOWAVERAGE" required="required">
                            <label for="D-BELOWAVERAGE">D-BELOW AVERAGE</label>
                            <br>
                            <input type="radio" class="" name="First_Approval_Summary_Rating" value="E-UNSATISFACTORY" id="E-UNSATISFACTORY" required="required">
                            <label for="E-UNSATISFACTORY">E-UNSATISFACTORY</label>
                        </div>
                        <div class="mt-4">
                            <b>Remark</b>
                            <textarea class="form-control" name="First_Approval_Remark" id="First_Approval_Remark"></textarea>
                        </div>

                        <div class=" mt-5 row">
                            <div class="col-4">
                                <b>@if($kpi[0]->manager_count == 1) All @else First @endif approval: </b>
                                <p>
                                    <del>{{$kpi[0]->First_Approval}}</del>
                                    <br>
                                    {{$admin->name}}
                                </p>
                            </div>
                            <div class="col-4" @if($kpi[0]->manager_count == 1) style="visibility: hidden" @endif>
                                <b>Final approval: </b>
                                <input list="Final_Approval" value="{{$kpi[0]->Final_Approval}}" name="Final_Approval">
                                <datalist id="Final_Approval">
                                    @foreach ($managers as $manager)
                                        <option value="{{ $manager->empName }}">
                                    @endforeach
                                </datalist>
                                <p>
                            </div>
                            <div class="col-4">
                                <b>Date: </b>
                                <p>
                                    {{$kpi[0]->Date}}
                                </p>
                            </div>
                        </div>


                        <div class="row m-5">
                            <div class="col-sm-12 mt-3 text-center">
                                <button type="submit" class="btn btn-primary">
                                    Send Requirement
                                </button>
                            </div>
                        </div>


                        <p class="form-message"></p>
                    </div>
                </div>
            </form>
        </div>
    </div>


        <table class="table table-bordered  text-left" style="background-color: #fff; display: none;">
            <tbody>
            <tr id="DevelopmentClone2">
                <th>
                    <input type="text" class="form-control" name="Development_Type[]" id="Development_Type" required="required">
                </th>
                <th>
                    <textarea class="form-control" style="height: 55px" name="Development_Descripsion[]"></textarea>
                </th>
                <th>
                    <input type="text" class="form-control" name="Development_Level[]" id="Development_Level" required="required">
                </th>
                <th>
                    <input type="date" class="form-control" name="Development_Target[]" id="Development_Target" required="required">
                </th>
                <th>
                    <input type="text" class="form-control" name="Development_Cost[]" id="Development_Cost" required="required">
                </th>
                <th data-toggle="modal"
                    data-target="#Delete1" id="{{ rand(0, 10000) }}" onclick="removeParentModel(this.id)" class="btn btn-danger" style="background-color: #e03e3e !important;">
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
        <div class="footer-top background-img-2"
             style="background: url('{{asset("assets/site/img/footer-bg.png")}}')no-repeat center top / cover">

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
    function DevelopmentClone() {
        const contentClone = document.getElementById("DevelopmentClone2");
        const lastChild1 = document.getElementById("DevelopmentClone2").lastElementChild;
        const tablecontentClone = document.getElementById("DevelopmentClone");
        console.log(lastChild1);
        const clone = contentClone.cloneNode(true);
        lastChild1.setAttribute( 'id', Math.floor(Math.random() * 1000000));
        tablecontentClone.appendChild(clone);
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
                                <button type="submit" class="btn btn-danger" onclick="removeCloneParent('`+element+`')" data-dismiss="modal">Delete</button>
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
    }
</script>
@endsection
