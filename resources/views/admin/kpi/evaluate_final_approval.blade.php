@extends('layouts.site')
@section('content')
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
                            <a class="text-light" href="{{route('employee.dashboard')}}">Home / </a> Staff Performance Review
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="hero-animation-img text-right" >
                        <img src="{{asset("assets/images/logo.png")}}" style="height: 130px; width: 130px; border-radius: 50%">
                        <!--                        <img src="img/111.png" alt="wave shape" class="img-fluid">-->
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
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-heading text-center mb-5">
                        <h2 style="color: #6730e3">STAFF PERFORMANCE REVIEW</h2>
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
                border: 1px solid #6a34e4;
            }
            .form-control {
                border-color: #6a34e4;
                padding: 0.975rem 0.85rem;
            }
            hr {
                border-top: 3px solid rgb(103 48 227);
            }
            </style>
            <form action="{{route('admin.kpi.store.evaluate.final')}}" method="POST" class=""  enctype="multipart/form-data">
                @csrf
                @isset($kpi[0]->employee->image)
                    <div class="text-right">
                        <img src="{{asset('assets/images/employees')}}/{{$kpi[0]->employee->image}}" style="height: 150px; width: 150px; border-radius: 50%">
                    </div>
                @endisset
                <input type="hidden" value="{{$kpi[0]->id}}" name="id">
            <div class="row g-4 justify-content-center equal text-justify">
                <div class="col-12">
                    <table id="" class="table table-bordered dt-responsive nowrap text-left"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%; border: 5px solid #6730e3">
                        <tr>
                            <td style="color: #1e7e34" class="font-weight-bold">Emp #</td>
                            <td>{{$kpi[0]->employee->empCode}}</td>
                        </tr>
                        <tr>
                            <td style="color: #1e7e34; width: 13.5%;" class="font-weight-bold" >Employee Name:</td>
                            <td style="width: 13%;">{{$kpi[0]->employee->empName}}</td>
                            <td style="color: #1e7e34; width: 14%;" class="font-weight-bold">Position Title:</td>
                            <td style="width: 14.28%;">{{$kpi[0]->employee->designation}}</td>
                            <td style="color: #1e7e34" class="font-weight-bold">Department/Project:</td>
                            <td>{{$kpi[0]->employee->projectDepartmentName}}</td>
                            <td style="color: #1e7e34; width: 13%;" class="font-weight-bold">Period:</td>
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
                    <hr>
                        <h4 style="color: #6730e3">1.	For employee's KPI <span style="text-align: justify; color:#1e7e34; font-weight: 800">(Key Objectives)</span></h4>
                    <p style="text-align: justify">
                        List your Key Objectives which are the main priority of your job during the reporting period.  Ideally you should have no more than 5 Key Objectives.  Your Key Objectives should add up to a weighting of 100.  The weighting is a measure of the importance of each objective so the higher the value, the more important the objective.  Objectives can be related to Safety, Project Controls, Financial, Strategic, Technical, Quality etc.  It is mandatory for each site staff to include a Safety Objective.
                    </p>
                    <table id="" class="table table-bordered dt-responsive nowrap"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <tbody id="ObjectivesClone">

                        <tr style="background-image: linear-gradient(to right, rgba(32, 40, 119, 0.95), rgba(55, 46, 149, 0.95), rgba(83, 49, 177, 0.90), rgba(114, 48, 205, 0.85), rgba(150, 41, 230, 0.95)); color: white; font-weight: bold; text-align:center">
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


                    <h6 class="mt-3" style="text-align: justify; color:#1e7e34; font-weight: 800">
                        Employee Self Rating *
                    </h6>
                    <small>(Refer to Guide on 1st page and Insert Relevant Number)</small>

                    <div class="ml-5">
                            <input type="radio" disabled @if($kpi[0]->Objectives_Summary_Rating == 'A-VERY GOOD') checked @endif class="" name="Objectives_Summary_Rating" value="A-VERY GOOD" id="A-VERYGOOD" required="required">
                            <label for="A-VERYGOOD" @if($kpi[0]->Objectives_Summary_Rating == 'A-VERY GOOD') style="color:#1e7e34; border: solid 2px #1e7e34; font-weight: 800; padding: 4px" @endif>A-VERY GOOD</label>
                            <br>
                            <input type="radio" disabled @if($kpi[0]->Objectives_Summary_Rating == 'B-GOOD') checked @endif class="" name="Objectives_Summary_Rating" value="B-GOOD" id="B-GOOD" required="required">
                            <label for="B-GOOD" @if($kpi[0]->Objectives_Summary_Rating == 'B-GOOD') style="color:#1e7e34; border: solid 2px #1e7e34; font-weight: 800; padding: 4px" @endif>B-GOOD</label>
                            <br>
                            <input type="radio" disabled @if($kpi[0]->Objectives_Summary_Rating == 'C-AVERAGE') checked @endif class="" name="Objectives_Summary_Rating" value="C-AVERAGE" id="C-AVERAGE" required="required">
                            <label for="C-AVERAGE" @if($kpi[0]->Objectives_Summary_Rating == 'C-AVERAGE') style="color:#1e7e34; border: solid 2px #1e7e34; font-weight: 800; padding: 4px" @endif>C-AVERAGE</label>
                            <br>
                            <input type="radio" disabled @if($kpi[0]->Objectives_Summary_Rating == 'D-BELOW AVERAGE') checked @endif class="" name="Objectives_Summary_Rating" value="D-BELOW AVERAGE" id="D-BELOWAVERAGE" required="required">
                            <label for="D-BELOWAVERAGE" @if($kpi[0]->Objectives_Summary_Rating == 'D-BELOW AVERAGE') style="color:#1e7e34; border: solid 2px #1e7e34; font-weight: 800; padding: 4px" @endif>D-BELOW AVERAGE</label>
                            <br>
                            <input type="radio" disabled @if($kpi[0]->Objectives_Summary_Rating == 'E-UNSATISFACTORY') checked @endif class="" name="Objectives_Summary_Rating" value="E-UNSATISFACTORY" id="E-UNSATISFACTORY" required="required">
                            <label for="E-UNSATISFACTORY" @if($kpi[0]->Objectives_Summary_Rating == 'E-UNSATISFACTORY') style="color:#1e7e34; border: solid 2px #1e7e34; font-weight: 800; padding: 4px" @endif>E-UNSATISFACTORY</label>
                        </div>

                    <hr>
                        <h4 style="color: #6730e3; margin-top:50px">2.	For Manager / Supervisor to review  <span style="text-align: justify; color:#1e7e34; font-weight: 800">(Review)</span></h4>
                        <p style="text-align: justify">
                        When reviewing your objectives consider not only the achievement of the objective but how you achieved it (the values you adhered to).
                    </p>
                    <table id="" class="table table-bordered dt-responsive nowrap"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <tbody id="ObjectivesClone">

                        <tr style="background-image: linear-gradient(to right, rgba(32, 40, 119, 0.95), rgba(55, 46, 149, 0.95), rgba(83, 49, 177, 0.90), rgba(114, 48, 205, 0.85), rgba(150, 41, 230, 0.95)); color: white; font-weight: bold; text-align:center">
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
                                        <label for="A-VERYGOOD" @if($Review_Manager_Rating[$x] == 'A-VERY GOOD') style="color:#1e7e34; border: solid 2px #1e7e34; font-weight: 800; padding: 4px" @endif>A-VERY GOOD</label>
                                        <br>
                                        <input type="radio" class="" name="Review_Manager_Rating{{$x}}" @if($Review_Manager_Rating[$x] == "B-GOOD") checked @endif disabled value="B-GOOD" id="B-GOOD" required="required">
                                        <label for="B-GOOD" @if($Review_Manager_Rating[$x] == 'B-GOOD') style="color:#1e7e34; border: solid 2px #1e7e34; font-weight: 800; padding: 4px" @endif>B-GOOD</label>
                                        <br>
                                        <input type="radio" class="" name="Review_Manager_Rating{{$x}}" @if($Review_Manager_Rating[$x] == "C-AVERAGE") checked @endif disabled value="C-AVERAGE" id="C-AVERAGE" required="required">
                                        <label for="C-AVERAGE" @if($Review_Manager_Rating[$x] == 'C-AVERAGE') style="color:#1e7e34; border: solid 2px #1e7e34; font-weight: 800; padding: 4px" @endif>C-AVERAGE</label>
                                        <br>
                                        <input type="radio" class="" name="Review_Manager_Rating{{$x}}" @if($Review_Manager_Rating[$x] == "D-BELOW AVERAGE") checked @endif disabled value="D-BELOW AVERAGE" id="D-BELOWAVERAGE" required="required">
                                        <label for="D-BELOWAVERAGE" @if($Review_Manager_Rating[$x] == 'D-BELOW AVERAGE') style="color:#1e7e34; border: solid 2px #1e7e34; font-weight: 800; padding: 4px" @endif>D-BELOW AVERAGE</label>
                                        <br>
                                        <input type="radio" class="" name="Review_Manager_Rating{{$x}}" @if($Review_Manager_Rating[$x] == "E-UNSATISFACTORY") checked @endif disabled value="E-UNSATISFACTORY" id="E-UNSATISFACTORY" required="required">
                                        <label for="E-UNSATISFACTORY" @if($Review_Manager_Rating[$x] == 'E-UNSATISFACTORY') style="color:#1e7e34; border: solid 2px #1e7e34; font-weight: 800; padding: 4px" @endif>E-UNSATISFACTORY</label>
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
                        <h4 style="color: #6730e3; margin-top:50px">3.	For Manager / Supervisor to review  <span style="text-align: justify; color:#1e7e34; font-weight: 800">(Development Plan)</span></h4>
                        <p style="text-align: justify">
                        The Development Plan should take in to account anticipated skills/knowledge required to meet key objectives, longer term career objectives and personal development goals.  These may be a combination of on-the-job training, location based project work or formal training courses.
                    </p>
                    <table id="" class="table table-bordered dt-responsive nowrap"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <tbody id="DevelopmentClone">

                        <tr style="background-image: linear-gradient(to right, rgba(32, 40, 119, 0.95), rgba(55, 46, 149, 0.95), rgba(83, 49, 177, 0.90), rgba(114, 48, 205, 0.85), rgba(150, 41, 230, 0.95)); color: white; font-weight: bold; text-align:center">
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
                         @isset($Development_Type[$x])
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


                    <h4 style="color: #1e7e34" class="mt-5">Summary of Overall First Approval</h4>

                    <b>Overall Performance Rating (Manager to Tick)</b>
                    <div class="ml-5">
                            <input type="radio" class="" name="First_Approval_Summary_Rating" @if($kpi[0]->First_Approval_Summary_Rating == "A-VERY GOOD") checked @endif disabled value="A-VERY GOOD" id="A-VERYGOOD" required="required">
                            <label for="A-VERYGOOD" @if($kpi[0]->First_Approval_Summary_Rating == 'A-VERY GOOD') style="color:#1e7e34; border: solid 2px #1e7e34; font-weight: 800; padding: 4px" @endif>A-VERY GOOD</label>
                            <br>
                            <input type="radio" class="" name="First_Approval_Summary_Rating" @if($kpi[0]->First_Approval_Summary_Rating == "B-GOOD") checked @endif disabled value="B-GOOD" id="B-GOOD" required="required">
                            <label for="B-GOOD" @if($kpi[0]->First_Approval_Summary_Rating == 'B-GOOD') style="color:#1e7e34; border: solid 2px #1e7e34; font-weight: 800; padding: 4px" @endif>B-GOOD</label>
                            <br>
                            <input type="radio" class="" name="First_Approval_Summary_Rating" @if($kpi[0]->First_Approval_Summary_Rating == "C-AVERAGE") checked @endif disabled value="C-AVERAGE" id="C-AVERAGE" required="required">
                            <label for="C-AVERAGE" @if($kpi[0]->First_Approval_Summary_Rating == 'C-AVERAGE') style="color:#1e7e34; border: solid 2px #1e7e34; font-weight: 800; padding: 4px" @endif>C-AVERAGE</label>
                            <br>
                            <input type="radio" class="" name="First_Approval_Summary_Rating" @if($kpi[0]->First_Approval_Summary_Rating == "D-BELOW AVERAGE") checked @endif disabled value="D-BELOW AVERAGE" id="D-BELOWAVERAGE" required="required">
                            <label for="D-BELOWAVERAGE" @if($kpi[0]->First_Approval_Summary_Rating == 'D-BELOW AVERAGE') style="color:#1e7e34; border: solid 2px #1e7e34; font-weight: 800; padding: 4px" @endif>D-BELOW AVERAGE</label>
                            <br>
                            <input type="radio" class="" name="First_Approval_Summary_Rating" @if($kpi[0]->First_Approval_Summary_Rating == "E-UNSATISFACTORY") checked @endif disabled value="E-UNSATISFACTORY" id="E-UNSATISFACTORY" required="required">
                            <label for="E-UNSATISFACTORY" @if($kpi[0]->First_Approval_Summary_Rating == 'E-UNSATISFACTORY') style="color:#1e7e34; border: solid 2px #1e7e34; font-weight: 800; padding: 4px" @endif>E-UNSATISFACTORY</label>
                        </div>
                    <div class="mt-4">
                        <b>Remark</b>
                        <p>{{$kpi[0]->First_Approval_Remark}}</p>
                    </div>


                    <hr>
                        <h4 style="color: #6730e3; margin-top:50px">3.	For Manager / Supervisor to review  <span style="text-align: justify; color:#1e7e34; font-weight: 800">(Summary of Overall Performance)</span></h4>
<b style="color: #1e7e34" class="">Overall Performance Rating (Manager to Tick)</b>
                    <div class="row">
                        <div class="col-8">
                            <div class="ml-5">
                                <input type="radio" class="" name="Final_Summary_Rating" value="A-VERY GOOD" id="A-VERYGOOD" required="required">
                                <label for="A-VERYGOOD">A-VERY GOOD</label>
                                <br>
                                <input type="radio" class="" name="Final_Summary_Rating" value="B-GOOD" id="B-GOOD" required="required">
                                <label for="B-GOOD">B-GOOD</label>
                                <br>
                                <input type="radio" class="" name="Final_Summary_Rating" value="C-AVERAGE" id="C-AVERAGE" required="required">
                                <label for="C-AVERAGE">C-AVERAGE</label>
                                <br>
                                <input type="radio" class="" name="Final_Summary_Rating" value="D-BELOW AVERAGE" id="D-BELOWAVERAGE" required="required">
                                <label for="D-BELOWAVERAGE">D-BELOW AVERAGE</label>
                                <br>
                                <input type="radio" class="" name="Final_Summary_Rating" value="E-UNSATISFACTORY" id="E-UNSATISFACTORY" required="required">
                                <label for="E-UNSATISFACTORY">E-UNSATISFACTORY</label>
                            </div>

                        </div>
                        <div class="col-4">
                            <p>
                                <b style="color: #1e7e34" class="">Employee Self Rating *</b>
                                {{$kpi[0]->Objectives_Summary_Rating}}
                            </p>
                            <p>
                                <b style="color: #1e7e34" class="">Manager’s Rating *</b>
                                {{$kpi[0]->First_Approval_Summary_Rating}}
                            </p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <b>Remark</b>
                        <textarea class="form-control" name="Final_Approval_Remark" id="Final_Approval_Remark"></textarea>
                    </div>
<hr>

                        <div class=" mt-5 row">
                            <div class="col-4">
                                <b style="color: #6730e3">First approval: </b>
                                <p>
                                    @isset($kpi[0]->Admin_First_Approval)
                                        <del>{{$kpi[0]->First_Approval}}</del>
                                        <br>
                                        {{$admin->name}}
                                    @else
                                        {{$kpi[0]->First_Approval}}
                                    @endif
                                </p>
                            </div>
                            <div class="col-4">
                                <b style="color: #6730e3">Final approval: </b>
                                <p>
                                    <del>{{$kpi[0]->Final_Approval}}</del>
                                    <br>
                                    {{$admin->name}}
                                </p>
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
                                <button type="submit" class="btn solid-btn">
                                    Send Requirement
                                </button>
                            </div>
                        </div>


                    <p class="form-message"></p>
                </div>
            </div>
            </form>
        </div>
    </section>


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
