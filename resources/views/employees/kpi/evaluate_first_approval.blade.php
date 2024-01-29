@extends('layouts.site')
@section('content')
<div id="ring-container" style="display: none;">
    <div id="ring" class="ring" >Loading
      <span></span>
    </div>
</div>
<style>
#ring-container {
    z-index: 1111111;
    position: fixed;
    width:100%;
    height:100%;
    background:#262626;
    opacity: 0.9;
    
}
    .ring
{
  
    position: fixed;
  top:50%;
  left:50%;
  transform:translate(-50%,-50%);
  width:150px;
  height:150px;
  background:transparent;
  border:3px solid #3c3c3c;
  border-radius:50%;
  text-align:center;
  line-height:150px;
  font-family:sans-serif;
  font-size:20px;
  color:#fff000;
  letter-spacing:4px;
  text-transform:uppercase;
  text-shadow:0 0 10px #fff000;
  box-shadow:0 0 20px rgba(0,0,0,.5);
}
.ring:before
{
  content:'';
  position:absolute;
  top:-3px;
  left:-3px;
  width:100%;
  height:100%;
  border:3px solid transparent;
  border-top:3px solid #fff000;
  border-right:3px solid #fff000;
  border-radius:50%;
  animation:animateC 2s linear infinite;
}
.ring span
{
  display:block;
  position:absolute;
  top:calc(50% - 2px);
  left:50%;
  width:50%;
  height:4px;
  background:transparent;
  transform-origin:left;
  animation:animate 2s linear infinite;
}
.ring span:before
{
  content:'';
  position:absolute;
  width:16px;
  height:16px;
  border-radius:50%;
  background:#fff000;
  top:-6px;
  right:-8px;
  box-shadow:0 0 20px #fff000;
}
.fixed-header {
    position: fixed;
    top: 0px;
    width: 100%;
    right: 0px;
    background-color: white;
    z-index: 1000; /* Ensure the table stays above other elements */
    /*max-width: 85vw;*/
    margin: 0px auto;
    padding: 0 155px;
}

@keyframes animateC
{
  0%
  {
    transform:rotate(0deg);
  }
  100%
  {
    transform:rotate(360deg);
  }
}
@keyframes animate
{
  0%
  {
    transform:rotate(45deg);
  }
  100%
  {
    transform:rotate(405deg);
  }
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
                            <a class="text-light" href="{{route('employee.dashboard')}}">Home / </a> 
                            <a class="text-light" href="{{route('employee.first_approval')}}">KPI First Approval </a> 
                            
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="hero-animation-img text-right" >
                        @if($employee->company_id == 1)
                        <img src="{{asset("assets/images")}}/{{$employee->company->image}}" style="height: 130px; width: 130px; border-radius: 50%">
                        @elseif($employee->company_id == 2)
                        <img src="{{asset("assets/images")}}/{{$employee->company->image}}" style="height: 130px; width: 200px; border-radius: 5%">
                        @elseif($employee->company_id == 3)
                        <img src="{{asset("assets/images")}}/{{$employee->company->image}}" style="height: 100px; width: 230px; border-radius: 5%">
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
        <div class="text-left">
            <a href="{{route('employee.first_approval')}}" style="font-size:28px;color:#3a54a8"><i class="fa fa-angle-double-left"></i> Back</a>
        </div>
        <div class="container text-center" style="max-width: 85vw;">

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
                
            <form action="{{route('employee.submitKpiFirstApproval')}}" method="POST" class="" id="myForm"  enctype="multipart/form-data">
                @csrf

                <div >
                    <div id="table-container">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="section-heading text-center mb-5">
                                    <h2 style="color: #3a54a8">STAFF PERFORMANCE REVIEW</h2>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" value="{{$kpi[0]->id}}" name="id">
                        @isset($employee->image)
                            <div class=" text-right mb-4">
                                <img src="{{asset("assets/images/employees")}}/{{$kpi[0]->employee->image}}" style="height: 150px; width: 150px; border-radius: 50%">
                            </div>
                        @endisset
                        <table id="table-info" class="table table-bordered dt-responsive nowrap text-left"
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
                    </div>
                </div>

            <div class="row g-4 justify-content-center equal text-justify">
                <div class="col-12 mt-4">
                        <h4 style="color: #3a54a8">1.	For employee's KPI <span style="text-align: justify; color:#3a54a8; font-weight: 800">(Key Objectives)</span></h4>
                    <p style="text-align: justify">
                        List your Key Objectives which are the main priority of your job during the reporting period.  Ideally you should have no more than 5 Key Objectives.  Your Key Objectives should add up to a weighting of 100.  The weighting is a measure of the importance of each objective so the higher the value, the more important the objective.  Objectives can be related to Safety, Project Controls, Financial, Strategic, Technical, Quality etc.  It is mandatory for each site staff to include a Safety Objective.
                    </p>
                    
                    <p>The system permits you to provide an objective description within a maximum of 150 words, with a requirement to set the objectives' weighting at 100%.</p>
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
                                <th id="obj{{$x}}">
                                    {{$Objectives_No[$x]}}
                                </th>
                                <th>
                                    {{$Objectives_Type[$x]}}
                                </th>
                                <th>
                                    {{$Objectives_Objective[$x]}}
                                </th>
                                <th>
                                    {{$Objectives_Results[$x]}}
                                </th>
{{--                                <th>--}}
{{--                                    {{$Objectives_Target[$x]}}--}}
{{--                                </th>--}}
                                <th>
                                    {{$Objectives_Weighting[$x]}}
                                </th>
                                <th>
                                    {{$Objectives_Comments_Employee[$x]}}
                                </th>
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
                            <label for="A-VERYGOOD" @if($kpi[0]->Objectives_Summary_Rating == 'A-VERY GOOD') style="color:#3a54a8; border: solid 2px #3a54a8; font-weight: 800; padding: 4px" @endif>A-VERY GOOD</label>
                            <br>
                            <input type="radio" disabled @if($kpi[0]->Objectives_Summary_Rating == 'B-GOOD') checked @endif class="" name="Objectives_Summary_Rating" value="B-GOOD" id="B-GOOD" required="required">
                            <label for="B-GOOD" @if($kpi[0]->Objectives_Summary_Rating == 'B-GOOD') style="color:#3a54a8; border: solid 2px #3a54a8; font-weight: 800; padding: 4px" @endif>B-GOOD</label>
                            <br>
                            <input type="radio" disabled @if($kpi[0]->Objectives_Summary_Rating == 'C-AVERAGE') checked @endif class="" name="Objectives_Summary_Rating" value="C-AVERAGE" id="C-AVERAGE" required="required">
                            <label for="C-AVERAGE" @if($kpi[0]->Objectives_Summary_Rating == 'C-AVERAGE') style="color:#3a54a8; border: solid 2px #3a54a8; font-weight: 800; padding: 4px" @endif>C-AVERAGE</label>
                            <br>
                            <input type="radio" disabled @if($kpi[0]->Objectives_Summary_Rating == 'D-BELOW AVERAGE') checked @endif class="" name="Objectives_Summary_Rating" value="D-BELOW AVERAGE" id="D-BELOWAVERAGE" required="required">
                            <label for="D-BELOWAVERAGE" @if($kpi[0]->Objectives_Summary_Rating == 'D-BELOW AVERAGE') style="color:#3a54a8; border: solid 2px #3a54a8; font-weight: 800; padding: 4px" @endif>D-BELOW AVERAGE</label>
                            <br>
                            <input type="radio" disabled @if($kpi[0]->Objectives_Summary_Rating == 'E-UNSATISFACTORY') checked @endif class="" name="Objectives_Summary_Rating" value="E-UNSATISFACTORY" id="E-UNSATISFACTORY" required="required">
                            <label for="E-UNSATISFACTORY" @if($kpi[0]->Objectives_Summary_Rating == 'E-UNSATISFACTORY') style="color:#3a54a8; border: solid 2px #3a54a8; font-weight: 800; padding: 4px" @endif>E-UNSATISFACTORY</label>
                        </div>
                        <div>
                            <b>Remark</b>
                        <p>{{$kpi[0]->Review_Self_Rating}}</p>
                        </div>


<hr>
                        <h4 style="color: #3a54a8; margin-top:50px">2. For Manager/Supervisor review  <span style="text-align: justify; color:#3a54a8; font-weight: 800">(Review)</span></h4>
                        <table id="" class="table table-bordered dt-responsive nowrap text-left"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%; border: 2px solid #3a54a8">
                        <tr class="m-3 p-3">
                            <td colspan="" style="border-right: 0px">
                                <div title="The purpose of this inquiry is to determine if the employee is currently working as per his designation or in a lower position than his actual designation due to project requirements / lack of work. If you respond 'Yes,' it signifies that there has been no change in the employee's role. If your response is 'No,' please provide further clarification regarding any changes in responsibilities. This information is crucial for evaluating the employee's performance and establishing objectives.">
                                    Please confirm if <b> {{$kpi[0]->employee->empName}} </b> is working in the capacity of <b>{{$kpi[0]->employee->designation}} </b> in your department / site?
                                <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                </div>
                                <div class="">
                                    <input type="radio" class="" onclick="additional_role_fun()" name="additional_role1" value="Yes" id="additional_role_yes" required>
                                    <label for="manager_count1mr-4">Yes</label>
                                    <input type="radio" onclick="additional_role_fun()" class="" name="additional_role1" value="No" id="additional_role_no" required>
                                    <label for="manager_count2">No</label>
                                </div>
                            </td>
                            
                            <td style="border: 0px; width:35%; visibility:hidden" id="additional_role_emp_remark">
                                Please clarify
                                <br>
                                <textarea class="form-control" name="manager_additional_role_remark" style="height: 57px;"></textarea>
                            </td>
                        </tr>
                    </table>
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
                                <th style="width: 90px">
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
                                    <th>
                                        {{$Objectives_No[$x]}}
                                        <a title="show" href="#obj{{$x}}"><i class="fa fa-search" style="font-size:23px;color:red"></i></a>
                                        
                                    </th>
                                    <th>
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
                                    </th>
                                    <th>
                                        <textarea class="form-control" name="Review_Comments_Manager[]" id="Review_Comments_Manager"></textarea>
                                    </th>
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

                    <div onclick="DevelopmentClone()" class="btn solid-btn disabled mb-3 text-center" style="opacity: 1 !important;">Add Row</div>


                    <h4 class="mt-5">Summary of Overall First Approval</h4>

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
                        <textarea class="form-control" name="First_Approval_Remark" id="First_Approval_Remark" required></textarea>
                    </div>
                    <hr>
                    
                

                        <div class=" mt-5 row">
                            <div class="col-4">
                                <b>@if($kpi[0]->manager_count == 1) All @else First @endif approval: </b>
                                <p>
                                {{$kpi[0]->First_Approval}}
                                </p>
                                <b>Evaluated date</b>
                                <p>{{$kpi[0]->First_Date}}</p>
                            </div>
                            <div class="col-4" @if($kpi[0]->manager_count == 1) style="visibility: hidden" @endif>
                                <b>Final approval: </b>
                                <input list="Final_Approval" value="{{$kpi[0]->Final_Approval}}" name="Final_Approval">
                                <datalist id="Final_Approval">
                                    @if($employee->company_id != 1)
                                        <option value="Elie Azzi">
                                        <option value="Mohamed Ahmed Kamal Mahrous">
                                    @endif
                                    @foreach ($managers as $manager)
                                        <option value="{{ $manager->empName }}">
                                    @endforeach
                                </datalist>
                                <p>
                            </div>
                            <div class="col-4">
                                <b>Submission date</b>
                                <p>{{$kpi[0]->Date}}</p>
                            </div>
                        </div>


                        <div class="row m-5">
                            <div class="col-sm-12 mt-3 text-center">
                                <div  onclick="loadingshow()">
                                    <button type="submit" class="btn solid-btn" >Send Requirement</button>
                                </div>
                                <a data-toggle="modal" data-target="#remove" class="btn btn-danger text-right">
                                    Cancel Requirement
                                </a>
                            </div>
                        </div>


                    <p class="form-message"></p>
                </div>
            </div>
            </form>
        </div>
    </section>
<div class="modal fade" id="remove" tabindex="-1" aria-labelledby="exampleModalLabelremove" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelremove">(KPI) Cancellation Criteria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('employee.cancel_first_approval',['id'=>$kpi[0]->id])}}" method="post">
                @csrf
                <input type="hidden" name="emp_id" value="{{$kpi[0]->employee->id}}">
                <input type="hidden" name="kpi_id" value="{{$kpi[0]->id}}">
                <div class="modal-body" style="text-align: left">
                    <h5>Here are six common reasons to cancel a KPI, and you can select one or more as guides for employees to improve:</h5>

                    <!-- Radio buttons for reasons -->
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="cancelReason[]" id="reason1" value="Outdated: When the KPI is no longer aligned with the objectives.">
                        <label class="form-check-label" for="reason1">
                            <b>Outdated:</b> When the KPI is no longer aligned with the objectives.
                        </label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="cancelReason[]" id="reason2" value="Unclear Objectives: If the KPI lacks clear and well-defined objectives that can be effectively measured. ">
                        <label class="form-check-label" for="reason2">
                            <b> Unclear Objectives:</b> If the KPI lacks clear and well-defined objectives that can be effectively measured.
                        </label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="cancelReason[]" id="reason3" value="Unrealistic Results: When the expected results set for the KPI are impractical or require adjustments.">
                        <label class="form-check-label" for="reason3">
                            <b> Unrealistic Results:</b> When the expected results set for the KPI are impractical or require adjustments.
                        </label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="cancelReason[]" id="reason4" value="Incorrect Manager Approval: If the KPI was not approved or authorized by the responsible manager.">
                        <label class="form-check-label" for="reason4">
                            <b> Incorrect Manager Approval:</b> If the KPI was not approved or authorized by the responsible manager.
                        </label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="cancelReason[]" id="reason5" value="Need for Adjustments: When significant changes or modifications are required to make the KPI more effective or aligned with goals.">
                        <label class="form-check-label" for="reason5">
                            <b>Need for Adjustments:</b> When significant changes or modifications are required to make the KPI more  effective or aligned with goals.
                        </label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="cancelReason[]" id="reason6" value="Weighting Update: If there is a need to change the importance or weighting assigned to the KPI in the overall evaluation.">
                        <label class="form-check-label" for="reason6">
                            <b>Weighting Update:</b> If there is a need to change the importance or weighting assigned to the  KPI in the overall evaluation.
                        </label>
                    </div>

                    <!-- Text area for Other Reasons -->
                    <div class="form-group mt-3">
                        <label for="otherReasons"><b>Other Reasons:</b> (Specify)</label>
                        <textarea class="form-control" name="specify" id="otherReasons" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    {{--                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>--}}
                    <button class="btn btn-danger" type="submit">Cancel KPI</button>
                </div>
            </form>
        </div>
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
                data-target="#Delete1" id="{{ rand(0, 10000) }}" onclick="removeParentModel(this.id)" class="btn btn-danger">
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
function loadingshow(){
    if ( document.getElementById("myForm").checkValidity() === true) {
                $('#ring-container').show();
            }
    
    
}
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
    
    function additional_role_fun(){
    var additional_role_el = document.getElementsByName('additional_role1');
            for (var i = 0; i < additional_role_el.length; i++) {

                // If the current radio button is selected
                if (additional_role_el[i].checked) {

                    // Get the value of the selected radio button
                    var selectedValue = additional_role_el[i].value;

                    if(selectedValue == "Yes"){
                        document.getElementById('additional_role_emp_remark').style.visibility = 'hidden';
                        document.getElementById('manager_additional_role_remark').removeAttribute('required');
                    }else {
                        document.getElementById('additional_role_emp_remark').style.visibility = 'visible';
                        document.getElementById('manager_additional_role_remark').setAttribute( 'required', 'required');
                    }

                    // Do something with the selected value
                    console.log(selectedValue);

                    // Exit the loop
                    break;
                }
            }
}
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        var tableOffset = $("#table-info").offset().top;

        $(window).scroll(function() {
            if ($(window).scrollTop() >= tableOffset) {
                $("#table-info").addClass("fixed-header");
            } else {
                $("#table-info").removeClass("fixed-header");
            }
        });
    });
</script>
@endsection
