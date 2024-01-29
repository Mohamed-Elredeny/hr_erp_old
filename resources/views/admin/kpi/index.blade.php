@extends('layouts.dashboard')
@include('admin.includes.sidebar')
@include('admin.includes.header')
@include('admin.includes.switcher')
@section('content')
    <style>
        table.dataTable {
            border-collapse: collapse !important;
        }
    </style>
    <!-- start page content wrapper-->
    <div class="page-content-wrapper">
        <!-- start page content-->
        <div class="page-content">
            <h3>KPI</h3>
            <div class="card mt-4">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block text-left">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <div class="card-body" id="orders">
                    <form action="{{route('admin.kpi_search')}}" method="POST" class=""  enctype="multipart/form-data">
                    @csrf
                    <div class="col-12 text-center mt-3 mb-3">
                        <div class="row">
                            <div class="col-3 mt-3 text-center">
                                Code
                                <input type="text" name="code">
                            </div>
                            <div class="col-3 mt-3 text-center">
                                Project
                                <input list="Project" name="Project">
                                <datalist id="Project">
                                    @foreach ($projectNames as $projectName)
                                        <option value="{{ $projectName->projectDepartmentName }}">
                                    @endforeach
                                </datalist>
                            </div>
                            <div class="col-3 mt-3 text-center">
                                Entity
                                <input list="Entity" name="Entity">
                                <datalist id="Entity">
                                    @foreach ($companies as $entity)
                                        <option value="{{ $entity->name }}">
                                    @endforeach
                                </datalist>
                            </div>
                            <div class="col-3 mt-3 text-center">
                                State
                                <input list="State" name="State">
                                <datalist id="State">
                                    <option value="Pending At First Approval">
                                    <option value="Pending At Final Approval">
                                    <option value="Evaluated">
                                </datalist>
                            </div>
                            <div class="col-3 mt-3 text-center">
                                Grade
                                <input list="Grade" name="Grade">
                                <datalist id="Grade">
                                    <option value="A-VERY GOOD">
                                    <option value="B-GOOD">
                                    <option value="C-AVERAGE">
                                    <option value="D-BELOW AVERAGE">
                                    <option value="E-UNSATISFACTORY">
                                </datalist>
                            </div>
                            <div class="col-12 mt-3 text-center">
                                <button type="submit" class="btn btn-primary">
                                    Search
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
{{--                    {{dd($kpis)}}--}}
                    <div class="">
                        <table id="" class="table table-bordered align-middle" style="width:100%; table-layout: fixed;">
                            <thead class="table-light">
                                <tr>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Entity</th>
                                    <th>Project</th>
                                    <th>Date of joining</th>
                                    <th>Total years of experience</th>
                                    <th class="font-weight-bold">State</th>
                                    <th>Grade</th>
                                    <th>Feedback</th>
                                    <th>Control</th>
                                </tr>
                            </thead>
                            @if(isset($projects))
                                @foreach($projects as $kpi)
                                <tr>
                                    <td>{{$kpi->kpi->employee->empCode}}</td>
                                    <td>{{$kpi->kpi->employee->empName}}</td>
                                    <td>{{$kpi->kpi->employee->company->name}}</td>
                                    <td>{{$kpi->kpi->employee->projectDepartmentName}}</td>
                                    <td>{{$kpi->kpi->employee->joiningDate}}</td>
                                    <td>
                                        <?php
                                        $date1 = new DateTime();
                                        $date2 = new DateTime($kpi->kpi->employee->joiningDate);
                                        $interval = $date1->diff($date2);
                                        echo $interval->y . " years, " . $interval->m." months" ?>
                                    </td>
                                    <td>
                                        @if($kpi->kpi->is_first_approval == 0)
                                            Pending First Approval
                                        @elseif($kpi->kpi->is_first_approval == 1 && $kpi->kpi->is_final_approval == 0 && $kpi->kpi->manager_count == 2)
                                            Pending Final Approval
                                        @elseif($kpi->kpi->is_first_approval == 1 && $kpi->kpi->manager_count == 1)
                                            Evaluated
                                        @elseif($kpi->kpi->is_final_approval == 1)
                                            Evaluated
                                        @endif
                                    </td>
                                    <td>
                                        @if($kpi->kpi->is_first_approval == 0)
                                            Pending
                                        @elseif($kpi->kpi->is_first_approval == 1 && $kpi->kpi->is_final_approval == 0 && $kpi->kpi->manager_count == 2)
                                            {{$kpi->kpi->First_Approval_Summary_Rating}}
                                        @elseif($kpi->kpi->is_first_approval == 1 && $kpi->kpi->manager_count == 1)
                                            {{$kpi->kpi->First_Approval_Summary_Rating}}
                                        @elseif($kpi->kpi->is_final_approval == 1)
                                            {{$kpi->kpi->Final_Summary_Rating}}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="javascript:;" class="btn btn-primary" title="" data-bs-toggle="modal" data-bs-target="#SendMessage{{$kpi->kpi->employee->id}}" data-bs-original-title="send message" aria-label="send message">
                                            Feedback
                                        </a>
                                        <div class="modal fade" id="SendMessage{{$kpi->kpi->employee->id}}" tabindex="-1" aria-labelledby="SendMessageLabel{{$kpi->kpi->employee->id}}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="SendMessageLabel{{$kpi->kpi->employee->id}}">Feedback</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form class="form-horizontal mt-2" method="post"  action="{{route('admin.kpi.feedback')}}" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                            @csrf
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-sm-12 mb-3" dir="ltr">
                                                                        <h4 class="col-form-label" style="text-align: left;">Feedback</h4>
                                                                        <input type="hidden" value="{{$kpi->kpi->id}}" name="id">
                                                                        <textarea name="feedback" class="form-control" >{{$kpi->kpi->feedback}}</textarea>
                                                                    </div>
                                                                </div>
                        
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary ">Save</button>
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                    </td>
                                    <td>
                                        @if($kpi->kpi->is_first_approval == 0)
                                            <a href="{{route('admin.kpi.evaluate.first',['id'=>$kpi->kpi->id])}}" class="btn btn-primary pt-1 pb-1">
                                                Evaluate
                                            </a>
                                        @elseif($kpi->kpi->is_first_approval == 1 && $kpi->kpi->is_final_approval == 0 && $kpi->kpi->manager_count == 2)
                                            <a href="{{route('admin.kpi.evaluate.final',['id'=>$kpi->id])}}" class="btn btn-primary pt-1 pb-1">
                                                Evaluate
                                            </a>
                                        @elseif($kpi->kpi->is_first_approval == 1 && $kpi->kpi->is_final_approval == 0 && $kpi->kpi->manager_count == 1)
                                            <a href="{{route('admin.kpi.show',['id'=>$kpi->id])}}" class="btn btn-primary pt-1 pb-1">
                                                Show
                                            </a>
                                        @elseif($kpi->kpi->is_final_approval == 1)
                                            <a href="{{route('admin.kpi.show',['id'=>$kpi->id])}}" class="btn btn-primary pt-1 pb-1">
                                                Show
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            @else
                                @foreach($kpis as $kpi)
                                    <tr>
                                        <td>{{$kpi->employee->empCode}}</td>
                                        <td>{{$kpi->employee->empName}}</td>
                                        <td>{{$kpi->employee->company->name}}</td>
                                        <td>{{$kpi->employee->projectDepartmentName}}</td>
                                        <td>{{$kpi->employee->joiningDate}}</td>
                                        <td>
                                            <?php
                                            $date1 = new DateTime();
                                            $date2 = new DateTime($kpi->employee->joiningDate);
                                            $interval = $date1->diff($date2);
                                            echo $interval->y . " years, " . $interval->m." months" ?>
                                        </td>
                                        <td>
                                            @if($kpi->is_first_approval == 0)
                                                Pending First Approval
                                            @elseif($kpi->is_first_approval == 1 && $kpi->is_final_approval == 0 && $kpi->manager_count == 2)
                                                Pending Final Approval
                                            @elseif($kpi->is_first_approval == 1 && $kpi->manager_count == 1)
                                                Evaluated
                                            @elseif($kpi->is_final_approval == 1)
                                                Evaluated
                                            @endif
                                        </td>
                                        <td>
                                            @if($kpi->is_first_approval == 0)
                                                Pending
                                            @elseif($kpi->is_first_approval == 1 && $kpi->is_final_approval == 0 && $kpi->manager_count == 2)
                                                {{$kpi->First_Approval_Summary_Rating}}
                                            @elseif($kpi->is_first_approval == 1 && $kpi->manager_count == 1)
                                                {{$kpi->First_Approval_Summary_Rating}}
                                            @elseif($kpi->is_final_approval == 1)
                                                {{$kpi->Final_Summary_Rating}}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="javascript:;" class="btn btn-primary" title="" data-bs-toggle="modal" data-bs-target="#SendMessage{{$kpi->employee->id}}" data-bs-original-title="send message" aria-label="send message">
                                                Feedback
                                            </a>
                                            <div class="modal fade" id="SendMessage{{$kpi->employee->id}}" tabindex="-1" aria-labelledby="SendMessageLabel{{$kpi->employee->id}}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="SendMessageLabel{{$kpi->employee->id}}">Feedback</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form class="form-horizontal mt-2" method="post"  action="{{route('admin.kpi.feedback')}}" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                @csrf
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-sm-12 mb-3" dir="ltr">
                                                                        <h4 class="col-form-label" style="text-align: left;">Feedback</h4>
                                                                        <input type="hidden" value="{{$kpi->id}}" name="id">
                                                                        <textarea name="feedback" class="form-control" >{{$kpi->feedback}}</textarea>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary ">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            @if($kpi->is_first_approval == 0)
                                                <a href="{{route('admin.kpi.evaluate.first',['id'=>$kpi->id])}}" class="btn btn-primary pt-1 pb-1">
                                                    Evaluate
                                                </a>
                                            @elseif($kpi->is_first_approval == 1 && $kpi->is_final_approval == 0 && $kpi->manager_count == 2)
                                                <a href="{{route('admin.kpi.evaluate.final',['id'=>$kpi->id])}}" class="btn btn-primary pt-1 pb-1">
                                                    Evaluate
                                                </a>
                                            @elseif($kpi->is_first_approval == 1 && $kpi->is_final_approval == 0 && $kpi->manager_count == 1)
                                                <a href="{{route('admin.kpi.show',['id'=>$kpi->id])}}" class="btn btn-primary pt-1 pb-1">
                                                    Show
                                                </a>
                                            @elseif($kpi->is_final_approval == 1)
                                                <a href="{{route('admin.kpi.show',['id'=>$kpi->id])}}" class="btn btn-primary pt-1 pb-1">
                                                    Show
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>

                    </div>
                </div>
                    @if(isset($projects))
{{--                        {{$projects->links()}}--}}
                    @else
                        {{$kpis->links()}}
                    @endif
            </div>

        </div>
        <!-- end page content-->
    </div>
@endsection
@section('script')

@endsection
