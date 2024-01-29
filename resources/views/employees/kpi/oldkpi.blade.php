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
                        <h3>STAFF PERFORMANCE REVIEW</h3>
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
            </style>
            <div class="row g-4 justify-content-center equal text-justify">
                <div class="col-12">
                    <table id="" class="table table-bordered dt-responsive nowrap text-left"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <tr>
                            <td style="color: #1e7e34" class="font-weight-bold">Emp #</td>
                            <td>{{$employee->Employee_Number}}</td>
                        </tr>
                        <tr>
                            <td style="color: #1e7e34; width: 14.28%;" class="font-weight-bold" >Employee Name:</td>
                            <td style="width: 14.28%;">{{$employee->Employee_Name}}</td>
                            <td style="color: #1e7e34; width: 14.28%;" class="font-weight-bold">Position Title:</td>
                            <td style="width: 14.28%;">{{$employee->Job_Family}}</td>
                            <td style="color: #1e7e34; width: 14.28%;" class="font-weight-bold">Period:</td>
                            <td style="width: 14.28%;">From: {{$employee->Joining_Date}}</td>
                            <td style="width: 14.28%;">To:</td>
                        </tr>
                        <tr>
                            <td style="color: #1e7e34" class="font-weight-bold">Manager Name:</td>
                            <td>{{$employee->Employee_Name}}</td>
                            <td style="color: #1e7e34" class="font-weight-bold">Department/Project:</td>
                            <td>{{$employee->Category}}/{{$employee->Project_Name}}</td>
                            <td style="color: #1e7e34" class="font-weight-bold">Date of Evaluation:</td>
                            <td>1st Evaluation Date (Site):</td>
                            <td>2nd evaluation date (Share with HR):</td>
                        </tr>
                    </table>
                    <div>
                        <h4 style="color: #6730e3" class="font-weight-bold">1.	Key Objectives </h4>
                        <p>Please list your Key Objectives which have been agreed with your Manager.  Your Key Objectives are the main priorities of your role and the specific results and targets expected to be achieved during the reporting period.  These Objectives should be based on the SMART principles listed below.  By specifying your Key Objectives in this way, you will be able to think through and detail the results necessary to achieve them. </p>
                        <h5 style="color: #1e7e34" class="font-weight-bold">SMART Principles</h5>

                        <div class="row">
                            <div class="col-3">
                                <span style="color: #1e7e34" class="font-weight-bold">S</span>pecific
                            </div>
                            <div class="col-9">
                                Well Defined Objectives.
                            </div>
                            <div class="col-3">
                                <span style="color: #1e7e34" class="font-weight-bold">M</span>easurable
                            </div>
                            <div class="col-9">
                                Define how you will measure what you have achieved.
                            </div>
                            <div class="col-3">
                                <span style="color: #1e7e34" class="font-weight-bold">A</span>chievable
                            </div>
                            <div class="col-9">
                                Make sure you have the means and time needed to achieve the objective.
                            </div>
                            <div class="col-3">
                                <span style="color: #1e7e34" class="font-weight-bold">R</span>elevant
                            </div>
                            <div class="col-9">
                                Make sure the objective is relevant to the job you do.
                            </div>
                            <div class="col-3">
                                <span style="color: #1e7e34" class="font-weight-bold">T</span>ime-related
                            </div>
                            <div class="col-9">
                                Allocate a timeframe when the objective will be completed. This may span more than one quarter but should not be longer than one year.
                            </div>
                        </div>
                        <div class="mt-2 ml-5">
                            <h6 class="font-weight-bold" style="color: #6730e3">Objectives should cover our Company Values including:</h6>

                            <p class="mb-0">
                                <b>Safety</b> - Incident & Injury Free Environment
                            </p>
                            <p class="mb-0">
                                <b>Quality</b> - We do the right job from the first time
                            </p>
                            <p class="mb-0">
                                <b>Team Work</b> – Supporting Each Other
                            </p>
                            <p class="mb-0">
                                <b>People</b> – We inspire our People to be the Best
                            </p>
                            <p class="mb-0">
                                <b>Financial</b> - Outstanding Financial Performance
                            </p>
                            <p>
                                <b>Relationships</b> – Committed to Build and Maintain Long Term Relationships with our Clients
                            </p>
                        </div>
                    </div>
                    <div>
                        <h4 style="color: #6730e3" class="font-weight-bold">2.	Review </h4>
                        <p>
                            At the completion of the reporting period, you and your Manager are in a position to evaluate how you actually performed against your agreed Key Objectives, the expected results and target dates.  Please rate your performance according to the Rating Guide below.  Once you have completed your rating, please forward this form to your Manager for him to complete.  Your Manager will then organize a time with you to meet and discuss your Review.
                        </p>
                        <table id="" class="table table-bordered dt-responsive nowrap text-left"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                              <tr>
                                <th></th>
                                <th style="color: #1e7e34" class="font-weight-bold">Description</th>
                                <th style="color: #1e7e34" class="font-weight-bold">Guide</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td style="color: #1e7e34" class="font-weight-bold">A</td>
                                <td>Very Good (91-99)</td>
                                <td><b> Excellent performance.</b> Achievements are considered exemplary.</td>
                              </tr>
                              <tr>
                                <td style="color: #1e7e34" class="font-weight-bold">B</td>
                                <td>Good (71-90) </td>
                                <td><b>Performance exceeds expectations.</b> Frequently achieves superior results.</td>
                              </tr>
                              <tr>
                                <td style="color: #1e7e34" class="font-weight-bold">C</td>
                                <td>Average (51-70)</td>
                                <td> <b>Performance meets job requirements</b> and barely provides expected results.</td>
                              </tr>
                              <tr>
                                <td style="color: #1e7e34" class="font-weight-bold">D</td>
                                <td>Below Average (21-50) </td>
                                <td><b>Performance do not meet job requirements</b> and improvements must be made in some areas.</td>
                              </tr>
                              <tr>
                                <td style="color: #1e7e34" class="font-weight-bold">E</td>
                                <td>Unsatisfactory (0-20)</td>
                                <td> <b>Performance is not up to the company standard</b> and corrective action needs to be taken immediately.</td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                    <form action="{{route('employee.submitKpi')}}" method="POST" class=""  enctype="multipart/form-data">
                        @csrf

                        <h3 style="color: #6730e3">1.	Key Objectives</h3>
                        <p style="text-align: justify">
                            List your Key Objectives which are the main priority of your job during the reporting period.  Ideally you should have no more than 5 Key Objectives.  Your Key Objectives should add up to a weighting of 100.  The weighting is a measure of the importance of each objective so the higher the value, the more important the objective.  Objectives can be related to Safety, Project Controls, Financial, Strategic, Technical, Quality etc.  It is mandatory for each site staff to include a Safety Objective.
                        </p>
                        <table id="" class="table table-bordered dt-responsive nowrap"
                               style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <tbody id="ObjectivesClone">

                            <tr style="background-image: linear-gradient(to right, rgba(32, 40, 119, 0.95), rgba(55, 46, 149, 0.95), rgba(83, 49, 177, 0.90), rgba(114, 48, 205, 0.85), rgba(150, 41, 230, 0.95)); color: white; font-weight: bold; text-align:center">
                                <th colspan="7">
                                    Key Objectives
                                </th>
                            </tr>
                            <tr>
                                <th style="width: 50px">
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
                                <th>
                                    <b>Target Date</b>
                                </th>
                                <th>
                                    <b>Weighting
                                        <br><small>(out of 100)</small>
                                        </b>
                                </th>
                                <th>
                                    <b>Delete</b>
                                </th>
                            </tr>
                            @if(isset($kpi[0]))
                                <?php
                                $Objectives_No = json_decode($kpi[0]->Objectives_No);
                                $Objectives_Type = json_decode($kpi[0]->Objectives_Type);
                                $Objectives_Objective = json_decode($kpi[0]->Objectives_Objective);
                                $Objectives_Results = json_decode($kpi[0]->Objectives_Results);
                                $Objectives_Target = json_decode($kpi[0]->Objectives_Target);
                                $Objectives_Weighting = json_decode($kpi[0]->Objectives_Weighting);
                                ?>
                                @for ($x=0; $x < count($Objectives_No); $x++)
                                <tr>
                                    <th>
                                        <input type="text" class="form-control" value="{{$Objectives_No[$x]}}" name="Objectives_No[]" id="Objectives_No" required="required">
                                    </th>
                                    <th>
                                        <input type="text" class="form-control" value="{{$Objectives_Type[$x]}}" name="Objectives_Type[]" id="Objectives_Type" required="required">
                                    </th>
                                    <th>
                                        <input type="text" class="form-control" value="{{$Objectives_Objective[$x]}}" name="Objectives_Objective[]" id="Objectives_Objective" required="required">
                                    </th>
                                    <th>
                                        <input type="text" class="form-control" value="{{$Objectives_Results[$x]}}" name="Objectives_Results[]" id="Objectives_Results" required="required">
                                    </th>
                                    <th>
                                        <select class="form-select w-100" name="Objectives_Target[]">
                                            <option value="{{$Objectives_Target[$x]}}">{{$Objectives_Target[$x]}}</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                            <option value="E">E</option>
                                        </select>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control" value="{{$Objectives_Weighting[$x]}}" name="Objectives_Weighting[]" id="Objectives_Weighting" required="required">
                                    </th>
                                    <th data-toggle="modal"
                                        data-target="#Delete1" id="{{ rand(0, 10000) }}" onclick="removeParentModel(this.id)" class="btn btn-danger">
                                        Remove
                                    </th>
                                </tr>
                                @endfor
                            @else
                                <tr>
                                    <th>
                                        <input type="text" class="form-control" name="Objectives_No[]" id="Objectives_No" required="required">
                                    </th>
                                    <th>
                                        <input type="text" class="form-control" name="Objectives_Type[]" id="Objectives_Type" required="required">
                                    </th>
                                    <th>
                                        <input type="text" class="form-control" name="Objectives_Objective[]" id="Objectives_Objective" required="required">
                                    </th>
                                    <th>
                                        <input type="text" class="form-control" name="Objectives_Results[]" id="Objectives_Results" required="required">
                                    </th>
                                    <th>
                                        <select class="form-select w-100" name="Objectives_Target[]">
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                            <option value="E">E</option>
                                        </select>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control" name="Objectives_Weighting[]" id="Objectives_Weighting" required="required">
                                    </th>
                                    <th data-toggle="modal"
                                        data-target="#Delete1" id="{{ rand(0, 10000) }}" onclick="removeParentModel(this.id)" class="btn btn-danger">
                                        Remove
                                    </th>
                                </tr>
                            @endif

                            </tbody>
                        </table>
                        <div onclick="ObjectivesClone()" class="btn solid-btn disabled mb-3">Add Row</div>



                        <h3 style="color: #6730e3"  class="mt-5">2.   Review</h3>
                        <p style="text-align: justify">
                            When reviewing your objectives consider not only the achievement of the objective but how you achieved it (the values you adhered to).                        </p>
                        <table id="" class="table table-bordered dt-responsive nowrap"
                               style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <tbody id="ReviewClone">

                            <tr style="background-image: linear-gradient(to right, rgba(32, 40, 119, 0.95), rgba(55, 46, 149, 0.95), rgba(83, 49, 177, 0.90), rgba(114, 48, 205, 0.85), rgba(150, 41, 230, 0.95)); color: white; font-weight: bold; text-align:center">
                                <th colspan="7">
                                    Review
                                </th>
                            </tr>

                            <tr>
                                <th style="width: 50px">
                                    <b>Obj.
                                        No.
                                        </b>
                                </th>
                                <th style="width: 210px">
                                    <b>Employee Self Rating *
                                        <br>
                                        <small style="font-size: 11px">(Refer to Guide on 1st page and Insert Relevant Number)</small>
                                    </b>
                                </th>
                                <th style="width: 210px">
                                    <b>Manager’s Rating *
                                        <br>
                                        <small style="font-size: 11px">(Refer to Guide on 1st page and Insert Relevant Number)</small>
                                    </b>
                                </th>
                                <th>
                                    <b>Comments from Employee</b>
                                </th>
                                <th>
                                    <b>Comments from Manager</b>
                                </th>
                                <th>
                                    <b>Delete</b>
                                </th>
                            </tr>
                            @if(isset($kpi[0]))
                                <?php
                                $Review_No = json_decode($kpi[0]->Review_No);
                                $Review_Self_Rating = json_decode($kpi[0]->Review_Self_Rating);
                                $Review_Manager_Rating = json_decode($kpi[0]->Review_Manager_Rating);
                                $Review_Comments_Employee = json_decode($kpi[0]->Review_Comments_Employee);
                                $Review_Comments_Manager = json_decode($kpi[0]->Review_Comments_Manager);
                                ?>
                                @for ($x=0; $x < count($Review_No); $x++)
                                    <tr>
                                        <th>
                                            <input type="text" class="form-control" value="{{$Review_No[$x]}}" name="Review_No[]" id="Review_No" required="required">
                                        </th>
                                        <th>
                                            <select class="form-select w-100" name="Review_Self_Rating[]">
                                                <option value="{{$Review_Self_Rating[$x]}}">{{$Review_Self_Rating[$x]}}</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>
                                                <option value="E">E</option>
                                            </select>
                                        </th>
                                        <th>
                                            <select class="form-select w-100" name="Review_Manager_Rating[]">
                                                <option value="{{$Review_Manager_Rating[$x]}}">{{$Review_Manager_Rating[$x]}}</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>
                                                <option value="E">E</option>
                                            </select>
                                        </th>
                                        <th>
                                            <textarea class="form-control"  style="height: 55px" name="Review_Comments_Employee[]">{{$Review_Comments_Employee[$x]}}</textarea>
                                        </th>
                                        <th>
                                            <textarea class="form-control" style="height: 55px" name="Review_Comments_Manager[]">{{$Review_Comments_Manager[$x]}}</textarea>
                                        </th>
                                        <th data-toggle="modal"
                                            data-target="#Delete1" id="{{ rand(0, 10000) }}" onclick="removeParentModel(this.id)" class="btn btn-danger">
                                            Remove
                                        </th>
                                    </tr>
                                @endfor
                            @else
                                <tr>
                                    <th>
                                        <input type="text" class="form-control" name="Review_No[]" id="Review_No" required="required">
                                    </th>
                                    <th>
                                        <select class="form-select w-100" name="Review_Self_Rating[]">
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                            <option value="E">E</option>
                                        </select>
                                    </th>
                                    <th>
                                        <select class="form-select w-100" name="Review_Manager_Rating[]">
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                            <option value="E">E</option>
                                        </select>
                                    </th>
                                    <th>
                                        <textarea class="form-control" style="height: 55px" name="Review_Comments_Employee[]"></textarea>
                                    </th>
                                    <th>
                                        <textarea class="form-control" style="height: 55px" name="Review_Comments_Manager[]"></textarea>
                                    </th>
                                    <th data-toggle="modal"
                                        data-target="#Delete1" id="{{ rand(0, 10000) }}" onclick="removeParentModel(this.id)" class="btn btn-danger">
                                        Remove
                                    </th>
                                </tr>
                            @endif


                            </tbody>
                        </table>
                        <div onclick="ReviewClone()" class="btn solid-btn disabled mb-3">Add Row</div>



                        <h3 style="color: #6730e3"  class="mt-5">3.   Development Plan</h3>
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
                                <th>
                                    <b>Delete</b>
                                </th>
                            </tr>
                            @if(isset($kpi[0]))
                                <?php
                                $Development_Type = json_decode($kpi[0]->Development_Type);
                                $Development_Descripsion = json_decode($kpi[0]->Development_Descripsion);
                                $Development_Level = json_decode($kpi[0]->Development_Level);
                                $Development_Target = json_decode($kpi[0]->Development_Target);
                                $Development_Cost = json_decode($kpi[0]->Development_Cost);
                                ?>
                                @for ($x=0; $x < count($Development_Type); $x++)
                                    <tr>
                                        <th>
                                            <input type="text" class="form-control" value="{{$Development_Type[$x]}}" name="Development_Type[]" id="Development_Type" required="required">
                                        </th>
                                        <th>
                                            <textarea class="form-control" style="height: 55px" name="Development_Descripsion[]">{{$Development_Descripsion[$x]}}</textarea>
                                        </th>
                                        <th>
                                            <input type="text" class="form-control" value="{{$Development_Level[$x]}}" name="Development_Level[]" id="Development_Level" required="required">
                                        </th>
                                        <th>
                                            <select class="form-select w-100" name="Development_Target[]">
                                                <option value="{{$Development_Target[$x]}}">{{$Development_Target[$x]}}</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>
                                                <option value="E">E</option>
                                            </select>
                                        </th>
                                        <th>
                                            <input type="text" class="form-control" value="{{$Development_Cost[$x]}}" name="Development_Cost[]" id="Development_Cost" required="required">
                                        </th>
                                        <th data-toggle="modal"
                                            data-target="#Delete1" id="{{ rand(0, 10000) }}" onclick="removeParentModel(this.id)" class="btn btn-danger">
                                            Remove
                                        </th>
                                    </tr>
                                @endfor
                            @else
                                <tr>
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
                                        <select class="form-select w-100" name="Development_Target[]">
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                            <option value="E">E</option>
                                        </select>
                                    </th>
                                    <th>
                                        <input type="text" class="form-control" name="Development_Cost[]" id="Development_Cost" required="required">
                                    </th>
                                    <th data-toggle="modal"
                                        data-target="#Delete1" id="{{ rand(0, 10000) }}" onclick="removeParentModel(this.id)" class="btn btn-danger">
                                        Remove
                                    </th>
                                </tr>
                            @endif


                            </tbody>
                        </table>

                        <div onclick="DevelopmentClone()" class="btn solid-btn disabled mb-3 text-center">Add Row</div>


                        <h3 style="color: #6730e3" class="mt-5">4.   Summary of Overall Performance</h3>
                        <p style="text-align: justify; color:#1e7e34">
                            To be completed during the Performance Review Meeting
                        </p>

                        <b>Overall Performance Rating (Manager to Tick)</b>
                        <div class="ml-5">
                            <input type="radio" class="" name="Summary_Rating" @if(isset($kpi[0])) @if($kpi[0]->Summary_Rating == 'A-VERY GOOD') checked @endif @endif value="A-VERY GOOD" id="A-VERYGOOD" required="required">
                            <label for="A-VERYGOOD">A-VERY GOOD</label>
                            <br>
                            <input type="radio" class="" name="Summary_Rating" @if(isset($kpi[0])) @if($kpi[0]->Summary_Rating == 'B-GOOD') checked @endif @endif  value="B-GOOD" id="B-GOOD" required="required">
                            <label for="B-GOOD">B-GOOD</label>
                            <br>
                            <input type="radio" class="" name="Summary_Rating" @if(isset($kpi[0])) @if($kpi[0]->Summary_Rating == 'C-AVERAGE') checked @endif @endif  value="C-AVERAGE" id="C-AVERAGE" required="required">
                            <label for="C-AVERAGE">C-AVERAGE</label>
                            <br>
                            <input type="radio" class="" name="Summary_Rating" @if(isset($kpi[0])) @if($kpi[0]->Summary_Rating == 'D-BELOW AVERAGE') checked @endif @endif  value="D-BELOW AVERAGE" id="D-BELOWAVERAGE" required="required">
                            <label for="D-BELOWAVERAGE">D-BELOW AVERAGE</label>
                            <br>
                            <input type="radio" class="" name="Summary_Rating" @if(isset($kpi[0])) @if($kpi[0]->Summary_Rating == 'E-UNSATISFACTORY') checked @endif @endif  value="E-UNSATISFACTORY" id="E-UNSATISFACTORY" required="required">
                            <label for="E-UNSATISFACTORY">E-UNSATISFACTORY</label>
                        </div>

                        <div class=" mt-5">
                            <b>Manager’s name: </b>
                            <select class="form-select" name="Manager_id">
                                @foreach ($managers as $manager)
                                    <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                @endforeach
                            </select>
                            <br>
                            <b>Employees name: </b>{{ $employee->Employee_Name }}
                            <br>
                            <b>Signature: </b>
                            <input type="file" class="d-inline-block"  name="Emp_Signature" id="Emp_Signature">
                        </div>


                        <div class="row m-5">
                            <div class="col-sm-12 mt-3 text-center">
                                <button type="submit" class="btn solid-btn">
                                    Send Requirement
                                </button>
                            </div>
                        </div>
                    </form>

                    <p class="form-message"></p>
                </div>
            </div>
        </div>
    </section>

    <table class="table table-bordered  text-left" style="background-color: #fff; display: none;">

        <tbody>
            <tr id="ObjectivesClone2">
                <th>
                    <input type="text" class="form-control" name="Objectives_No[]" id="Objectives_No" required="required">
                </th>
                <th>
                    <input type="text" class="form-control" name="Objectives_Type[]" id="Objectives_Type" required="required">
                </th>
                <th>
                    <input type="text" class="form-control" name="Objectives_Objective[]" id="Objectives_Objective" required="required">
                </th>
                <th>
                    <input type="text" class="form-control" name="Objectives_Results[]" id="Objectives_Results" required="required">
                </th>
                <th>
                    <select class="form-select w-100" name="Objectives_Target[]">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                    </select>
                </th>
                <th>
                    <input type="text" class="form-control" name="Objectives_Weighting[]" id="Objectives_Weighting" required="required">
                </th>
                <th data-toggle="modal"
                    data-target="#Delete1" id="{{ rand(0, 10000) }}" onclick="removeParentModel(this.id)" class="btn btn-danger">
                    Remove
                </th>
            </tr>

        </tbody>
    </table>

    <table class="table table-bordered  text-left" style="background-color: #fff; display: none;">

        <tbody>
            <tr id="ObjectivesClone2">
                <th>
                    <input type="text" class="form-control" name="Objectives_No[]" id="Objectives_No" required="required">
                </th>
                <th>
                    <input type="text" class="form-control" name="Objectives_Type[]" id="Objectives_Type" required="required">
                </th>
                <th>
                    <input type="text" class="form-control" name="Objectives_Objective[]" id="Objectives_Objective" required="required">
                </th>
                <th>
                    <input type="text" class="form-control" name="Objectives_Results[]" id="Objectives_Results" required="required">
                </th>
                <th>
                    <select class="form-select w-100" name="Objectives_Target[]">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                    </select>
                </th>
                <th>
                    <input type="text" class="form-control" name="Objectives_Weighting[]" id="Objectives_Weighting" required="required">
                </th>
                <th data-toggle="modal"
                    data-target="#Delete1" id="{{ rand(0, 10000) }}" onclick="removeParentModel(this.id)" class="btn btn-danger">
                    Remove
                </th>
            </tr>

        </tbody>
    </table>

    <table class="table table-bordered  text-left" style="background-color: #fff; display: none;">

        <tbody>
            <tr id="ReviewClone2">
                <th>
                    <input type="text" class="form-control" name="Review_No[]" id="Review_No" required="required">
                </th>
                <th>
                    <select class="form-select w-100" name="Review_Self_Rating[]">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                    </select>
                </th>
                <th>
                    <select class="form-select w-100" name="Review_Manager_Rating[]">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                    </select>
                </th>
                <th>
                    <textarea class="form-control" style="height: 55px" name="Review_Comments_Employee[]"></textarea>
                </th>
                <th>
                    <textarea class="form-control" style="height: 55px" name="Review_Comments_Manager[]"></textarea>
                </th>
                <th data-toggle="modal"
                    data-target="#Delete1" id="{{ rand(0, 10000) }}" onclick="removeParentModel(this.id)" class="btn btn-danger">
                    Remove
                </th>
            </tr>
        </tbody>
    </table>

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
                    <select class="form-select w-100" class="Development_Target[]">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                    </select>
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
function ObjectivesClone() {
    const contentClone = document.getElementById("ObjectivesClone2");
    const lastChild1 = document.getElementById("ObjectivesClone2").lastElementChild;
    const tablecontentClone = document.getElementById("ObjectivesClone");
    console.log(lastChild1);
    const clone = contentClone.cloneNode(true);
    lastChild1.setAttribute( 'id', Math.floor(Math.random() * 1000000));
    tablecontentClone.appendChild(clone);
}

function ReviewClone() {
    const contentClone = document.getElementById("ReviewClone2");
    const lastChild1 = document.getElementById("ReviewClone2").lastElementChild;
    const tablecontentClone = document.getElementById("ReviewClone");
    console.log(lastChild1);
    const clone = contentClone.cloneNode(true);
    lastChild1.setAttribute( 'id', Math.floor(Math.random() * 1000000));
    tablecontentClone.appendChild(clone);
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
</script>
@endsection
