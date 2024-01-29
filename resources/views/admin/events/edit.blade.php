@extends('layouts.dashboard')
@include('admin.includes.sidebar')
@include('admin.includes.header')
@include('admin.includes.switcher')
@section('pluginsStyle')
    <link href="{{asset('assets/admin/en/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/admin/en/plugins/select2/css/select2-bootstrap4.css')}}" rel="stylesheet" />
@endsection
@section('style')
    <style>
        .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice {
            float: right !important;
        }
    </style>
@endsection
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
            <h3>{{__('page.Update_Project')}}</h3>
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block text-left">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block text-left">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="card mt-4">
                <div class="card-body">
                    <form method="post" action="{{route('admin.events.update',['event'=>$event->id])}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-2">
                                <label>{{__('page.Name')}}:</label>
                            </div>
                            <div class="col-10">
                                <input class="form-control mb-3" type="text" value="{{$event->name}}" name="name" placeholder="{{__('page.Name')}}"
                                       aria-label="Name In English" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <label>{{__('page.Image')}}:</label>
                            </div>
                            <div class="col-10">
                                <input type="file" accept="image/*" class="form-control" name="image" id="inputGroupFile02">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2">
                                <label>{{__('page.Right_logo')}}:</label>
                            </div>
                            <div class="col-10">
                                <input type="file" accept="image/*" class="form-control" name="logo_right" id="inputGroupFile02">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2">
                                <label>{{__('page.Left_logo')}}:</label>
                            </div>
                            <div class="col-10">
                                <input type="file" accept="image/*" class="form-control" name="logo_left" id="inputGroupFile02">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2">
                                <label>{{__('page.Background')}}:</label>
                            </div>
                            <div class="col-10">
                                <input type="file" accept="image/*" class="form-control" name="background" id="inputGroupFile02">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-2">
                                <label>{{__('page.Call_Center')}}:</label>
                            </div>
                            <div class="col-10">
                                <select class="multiple-select" name="callcenter_ids[]" data-placeholder="Choose anything" multiple="multiple" required>
                                    @foreach($call_centers as $call_center)
                                        <?php $x = 0; ?>
                                        @foreach($event_call_centers as $event_call_center)
                                            @if($event_call_center->callcenter->id == $call_center->id)
                                                <?php $x = 1; ?>
                                                <option value="{{$event_call_center->callcenter->id}}" selected>{{$event_call_center->callcenter->name}}</option>
                                            @break
                                                @endif
                                        @endforeach
                                        @if($x == 0)
                                            <option value="{{$call_center->id}}">{{$call_center->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-2">
                                <label>{{__('page.Customers')}}:</label>
                            </div>
                            <div class="col-10">
                                <select class="multiple-select" name="employee_ids[]" data-placeholder="Choose anything" multiple="multiple" required>
                                    @foreach($employees as $employee)
                                        <?php $x = 0; ?>
                                        @foreach($event_employees as $event_employee)
                                            @if($event_employee->employee->id == $employee->id)
                                                <?php $x = 1; ?>
                                                <option value="{{$event_employee->employee->id}}" selected>{{$event_employee->employee->name}}</option>
                                                @break
                                            @endif
                                        @endforeach
                                        @if($x == 0)
                                            <option value="{{$employee->id}}">{{$employee->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <button type="submit" class="btn btn-primary px-4 w-25 m-auto mt-3">{{__('page.Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- end page content-->
    </div>
@endsection
@section('pluginsScript')
    <script src="{{asset('assets/admin/en/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/admin/en/js/form-select2.js')}}"></script>
@endsection
