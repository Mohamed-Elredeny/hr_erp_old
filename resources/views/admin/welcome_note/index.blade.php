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
            <h3>Welcome Note Employees</h3>
            <div class="text-end">
                    <a href="{{route('admin.welcome.create')}}" class="btn btn-primary">Add Welcome Note Employee</a>
                <div class="card mt-4">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block text-left">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                   
                    <div class="card-body" id="orders">
                        <div class="table-responsive">
                            <table id="" class="table table-bordered align-middle" style="width:100%">
                                <thead class="table-light">
                                <tr>
                                    <th>Code</th>
                                    <th>Entity</th>
                                    <th>Name</th>
                                    <th>Nationality</th>
                                    <th>Designation</th>
                                    <th>project/Department Name</th>
                                    <th>Controls</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0; ?>
                                @foreach($employees as $employee)
                                    <tr>
                                        <td>{{$employee->employee->empCode}}</td>
                                        <td>{{ $employee->employee->company->name }}</td>
                                        <td>{{$employee->employee->empName}}</td>
                                        <td>{{$employee->employee->nationality}}</td>
                                        <td>{{$employee->employee->designation}}</td>
                                        <td>{{$employee->employee->projectDepartmentName}}</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-3 fs-6">
                                                <a href="{{route('admin.employees.show',['employee'=>$employee->employee->id])}}" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views">
                                                    <ion-icon name="eye-sharp" role="img" class="md hydrated" aria-label="eye sharp"></ion-icon>
                                                </a>


                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </table>
                        </div>
                    </div>

                </div>

            </div>
            <!-- end page content-->
        </div>
    @endsection
    @section('script')

    @endsection
