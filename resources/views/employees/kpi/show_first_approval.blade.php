@extends('layouts.site')
@section('content')
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
        <div class="container text-center" style="max-width: 85vw;">
            <div class="text-left">
                <a href="{{route('employee.dashboard')}}" style="font-size:28px;color:#3a54a8"><i class="fa fa-angle-double-left"></i> Back</a>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-heading text-center mb-5">
                        <h2 style="color: #3a54a8">STAFF PERFORMANCE REVIEW</h2>
                    </div>
                </div>
            </div>
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
                border-top: 3px solid #3a54a8;
            }
            </style>
           

                <input type="hidden" value="{{$kpi[0]->id}}" name="id">
                @isset($kpi[0]->employee->image)
                    <div class=" text-right mb-4">
                        <img src="{{asset("assets/images/employees")}}/{{$kpi[0]->employee->image}}" style="height: 150px; width: 150px; border-radius: 50%">
                    </div>
                @endisset

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
                            <td style="width: 13%;" class="font-weight-bold">Position / Title:</td>
                            <td style="width: 13.28%;">{{$kpi[0]->employee->designation}}</td>
                            <td class="font-weight-bold">Department/Project:</td>
                            <td>{{$kpi[0]->employee->projectDepartmentName}}</td>
                            <td style="width: 11%;" class="font-weight-bold">Year of evaluation:</td>
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
                <div class="row g-4 mt-5 justify-content-center equal text-justify">
                    <div class="col-12">
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
{{--                                <th>--}}
{{--                                    <b>Target Date</b>--}}
{{--                                </th>--}}
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
//                            $Objectives_Target = json_decode($kpi[0]->Objectives_Target);
                            $Objectives_Weighting = json_decode($kpi[0]->Objectives_Weighting);
                            $Objectives_Comments_Employee = json_decode($kpi[0]->Objectives_Comments_Employee);
                            ?>
                            @for ($x=0; $x < count($Objectives_No); $x++)
                                <tr>
                                    <th>
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
{{--                                    <th>--}}
{{--                                        {{$Objectives_Target[$x]}}--}}
{{--                                    </th>--}}
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
                        <h4 style="color: #3a54a8; margin-top:50px">2. For Manager/Supervisor review <span style="text-align: justify; color:#3a54a8; font-weight: 800">(Review)</span></h4>
                        <table id="" class="table table-bordered dt-responsive nowrap text-left"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%; border: 2px solid #3a54a8">
                        
                        <tr>
                            <td>
                                <div title="The purpose of this inquiry is to determine if the employee is currently working as per his designation or in a lower position than his actual designation due to project requirements / lack of work. If you respond 'Yes,' it signifies that there has been no change in the employee's role. If your response is 'No,' please provide further clarification regarding any changes in responsibilities. This information is crucial for evaluating the employee's performance and establishing objectives.">
                                    Please confirm if <b> {{$kpi[0]->employee->empName}} </b> is working in the capacity of <b> {{$kpi[0]->employee->designation}} </b> in your department / site?
                                <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                </div>
                                <br>
                                    <input type="radio" class="" onclick="additional_role_fun()" disabled @if($kpi[0]->manager_additional_role=="Yes") checked @endif name="manager_additional_role" value="Yes" id="manager_additional_role_Approve" required>
                                    <label for="manager_additional_role_Approve">Yes</label>
                                    <input type="radio" onclick="additional_role_fun()" class="" disabled @if($kpi[0]->manager_additional_role == "No") checked @endif name="manager_additional_role" value="No" id="manager_additional_role_Reject" required>
                                    <label for="manager_additional_role_Reject">No</label>
                            </td>
                             @if($kpi[0]->manager_additional_role == "No")
                            <td colspan="2" style="width:35%;"  id="amanager_additional_role_remark">
                                Please clarify
                                <br>
                                {{$kpi[0]->manager_additional_role_remark}}
                            </td>
                            @endif
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
                            $Review_Manager_Rating = json_decode($kpi[0]->Review_Manager_Rating);
                            $Review_Comments_Manager = json_decode($kpi[0]->Review_Comments_Manager);
                            ?>
                            @for ($x=0; $x < count($Objectives_No); $x++)
                                <tr>
                                    <th>
                                        {{$Objectives_No[$x]}}
                                    </th>
                                    <th>
                                        <input type="radio" class="" name="Review_Manager_Rating{{$x}}" @if($Review_Manager_Rating[$x] == "A-VERY GOOD") checked @endif disabled value="A-VERY GOOD" id="A-VERYGOOD" required="required">
                                        <label for="A-VERYGOOD" @if($Review_Manager_Rating[$x] == 'A-VERY GOOD') style="color:#3a54a8; border: solid 2px #3a54a8; font-weight: 800; padding: 4px" @endif>A-VERY GOOD</label>
                                        <br>
                                        <input type="radio" class="" name="Review_Manager_Rating{{$x}}" @if($Review_Manager_Rating[$x] == "B-GOOD") checked @endif disabled value="B-GOOD" id="B-GOOD" required="required">
                                        <label for="B-GOOD" @if($Review_Manager_Rating[$x] == 'B-GOOD') style="color:#3a54a8; border: solid 2px #3a54a8; font-weight: 800; padding: 4px" @endif>B-GOOD</label>
                                        <br>
                                        <input type="radio" class="" name="Review_Manager_Rating{{$x}}" @if($Review_Manager_Rating[$x] == "C-AVERAGE") checked @endif disabled value="C-AVERAGE" id="C-AVERAGE" required="required">
                                        <label for="C-AVERAGE" @if($Review_Manager_Rating[$x] == 'C-AVERAGE') style="color:#3a54a8; border: solid 2px #3a54a8; font-weight: 800; padding: 4px" @endif>C-AVERAGE</label>
                                        <br>
                                        <input type="radio" class="" name="Review_Manager_Rating{{$x}}" @if($Review_Manager_Rating[$x] == "D-BELOW AVERAGE") checked @endif disabled value="D-BELOW AVERAGE" id="D-BELOWAVERAGE" required="required">
                                        <label for="D-BELOWAVERAGE" @if($Review_Manager_Rating[$x] == 'D-BELOW AVERAGE') style="color:#3a54a8; border: solid 2px #3a54a8; font-weight: 800; padding: 4px" @endif>D-BELOW AVERAGE</label>
                                        <br>
                                        <input type="radio" class="" name="Review_Manager_Rating{{$x}}" @if($Review_Manager_Rating[$x] == "E-UNSATISFACTORY") checked @endif disabled value="E-UNSATISFACTORY" id="E-UNSATISFACTORY" required="required">
                                        <label for="E-UNSATISFACTORY" @if($Review_Manager_Rating[$x] == 'E-UNSATISFACTORY') style="color:#3a54a8; border: solid 2px #3a54a8; font-weight: 800; padding: 4px" @endif>E-UNSATISFACTORY</label>
                                    </th>
                                    <th>
                                        @isset($Review_Comments_Manager[$x])
                                        {{$Review_Comments_Manager[$x]}}
                                        @endisset
                                    </th>
                                </tr>
                            @endfor
                            </tbody>
                        </table>

                        <hr>
                        <h4 style="color: #3a54a8; margin-top:50px">3. Development Plan recommended by Manager/Supervisor <span style="text-align: justify; color:#3a54a8; font-weight: 800">(Development Plan)</span></h4>
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
                            </tr>
                            
                            <?php
                            $Development_Type = json_decode($kpi[0]->Development_Type);
                            $Development_Descripsion = json_decode($kpi[0]->Development_Descripsion);
                            $Development_Level = json_decode($kpi[0]->Development_Level);
                            $Development_Target = json_decode($kpi[0]->Development_Target);
                            $Development_Cost = json_decode($kpi[0]->Development_Cost);
                            ?>
                            @isset($Development_Type)
                            @for ($x=0; $x < count($Development_Type); $x++)
                            <tr>
                                <th>
                                    {{$Development_Type[$x]}}
                                </th>
                                <th>
                                    {{$Development_Descripsion[$x]}}
                                </th>
                                <th>
                                    {{$Development_Level[$x]}}
                                </th>
                                <th>
                                    {{$Development_Target[$x]}}
                                </th>
                                <th>
                                    {{$Development_Cost[$x]}}
                                </th>
                            </tr>
                            @endfor
                            @endisset

                            </tbody>
                        </table>


                        <h4 style="color: #3a54a8" class="mt-5">Summary of Overall First Approval</h4>

                        <b>Overall Performance Rating (Manager to Tick)</b>
                       <div class="ml-5">
                            <input type="radio" class="" name="First_Approval_Summary_Rating" @if($kpi[0]->First_Approval_Summary_Rating == "A-VERY GOOD") checked @endif disabled value="A-VERY GOOD" id="A-VERYGOOD" required="required">
                            <label for="A-VERYGOOD" @if($kpi[0]->First_Approval_Summary_Rating == 'A-VERY GOOD') style="color:#3a54a8; border: solid 2px #3a54a8; font-weight: 800; padding: 4px" @endif>A-VERY GOOD</label>
                            <br>
                            <input type="radio" class="" name="First_Approval_Summary_Rating" @if($kpi[0]->First_Approval_Summary_Rating == "B-GOOD") checked @endif disabled value="B-GOOD" id="B-GOOD" required="required">
                            <label for="B-GOOD" @if($kpi[0]->First_Approval_Summary_Rating == 'B-GOOD') style="color:#3a54a8; border: solid 2px #3a54a8; font-weight: 800; padding: 4px" @endif>B-GOOD</label>
                            <br>
                            <input type="radio" class="" name="First_Approval_Summary_Rating" @if($kpi[0]->First_Approval_Summary_Rating == "C-AVERAGE") checked @endif disabled value="C-AVERAGE" id="C-AVERAGE" required="required">
                            <label for="C-AVERAGE" @if($kpi[0]->First_Approval_Summary_Rating == 'C-AVERAGE') style="color:#3a54a8; border: solid 2px #3a54a8; font-weight: 800; padding: 4px" @endif>C-AVERAGE</label>
                            <br>
                            <input type="radio" class="" name="First_Approval_Summary_Rating" @if($kpi[0]->First_Approval_Summary_Rating == "D-BELOW AVERAGE") checked @endif disabled value="D-BELOW AVERAGE" id="D-BELOWAVERAGE" required="required">
                            <label for="D-BELOWAVERAGE" @if($kpi[0]->First_Approval_Summary_Rating == 'D-BELOW AVERAGE') style="color:#3a54a8; border: solid 2px #3a54a8; font-weight: 800; padding: 4px" @endif>D-BELOW AVERAGE</label>
                            <br>
                            <input type="radio" class="" name="First_Approval_Summary_Rating" @if($kpi[0]->First_Approval_Summary_Rating == "E-UNSATISFACTORY") checked @endif disabled value="E-UNSATISFACTORY" id="E-UNSATISFACTORY" required="required">
                            <label for="E-UNSATISFACTORY" @if($kpi[0]->First_Approval_Summary_Rating == 'E-UNSATISFACTORY') style="color:#3a54a8; border: solid 2px #3a54a8; font-weight: 800; padding: 4px" @endif>E-UNSATISFACTORY</label>
                        </div>
                        <div class="mt-4">
                            <b>Remark</b>
                            <p>{{$kpi[0]->First_Approval_Remark}}</p>
                        </div>
                        
                        <hr>

                        <div class=" mt-5 row">
                            <div class="col-4">
                                <b style="">@if($kpi[0]->manager_count == 1) All @else First @endif approval: </b>
                                <p>
                                {{$kpi[0]->First_Approval}}
                                </p>
                                <b>Evaluated date</b>
                                <p>{{$kpi[0]->First_Date}}</p>
                            </div>
                            <div class="col-4"  @if($kpi[0]->manager_count == 1) style="visibility: hidden" @endif>
                                <b style="">Final approval: </b>
                                <p>
                                {{$kpi[0]->Final_Approval}}
                                </p>
                                <b>Evaluated date</b>
                                <p>{{$kpi[0]->Final_Date}}</p>
                            </div>
                            <div class="col-4">
                                <b>Submission date</b>
                                <p>{{$kpi[0]->Date}}</p>
                            </div>


                        </div>


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
