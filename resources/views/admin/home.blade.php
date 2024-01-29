@extends('layouts.dashboard')
@include('admin.includes.sidebar')
@include('admin.includes.header')
@section('content')
    <!-- start page content wrapper-->
    <div class="page-content-wrapper">
        <!-- start page content-->
        <div class="page-content">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-4">

                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <p class="mb-1">Total Employees</p>
                                    <h4 class="mb-0 text-primary">{{$employee}}</h4>
                                </div>
                                <div class="ms-auto text-primary fs-2">
                                    <img src="{{asset('assets/admin/images/icons/employee.png')}}" style="height: 60px; width: 60px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <p class="mb-1">Total KPI</p>
                                    <h4 class="mb-0 text-danger">{{$KPI}}</h4>
                                </div>
                                <div class="ms-auto text-danger fs-2">
                                    <img src="{{asset('assets/admin/images/icons/50.webp')}}" style="height: 60px; width: 80px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <p class="mb-1"> Total KPI Pending</p>
                                    <h4 class="mb-0 text-info">{{$kpiPending}}</h4>
                                </div>
                                <div class="ms-auto text-info fs-2">
                                    <img src="{{asset('assets/admin/images/icons/25.png')}}" style="height: 60px; width: 40px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <p class="mb-1">KPI First Approval</p>
                                    <h4 class="mb-0 text-success">{{$kpiFirst}}</h4>
                                </div>
                                <div class="ms-auto text-success fs-2">
                                    <img src="{{asset('assets/admin/images/icons/50.png')}}" style="height: 60px; width: 40px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <p class="mb-1">KPI Final Approval</p>
                                    <h4 class="mb-0 text-primary">{{$kpiFinal}}</h4>
                                </div>
                                <div class="ms-auto text-primary fs-2">
                                    <img src="{{asset('assets/admin/images/icons/100.png')}}" style="height: 60px; width: 40px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
{{--                <div class="col">--}}
{{--                    <div class="card radius-10">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="d-flex align-items-center">--}}
{{--                                <div class="">--}}
{{--                                    <p class="mb-1">KPI All Approval</p>--}}
{{--                                    <h4 class="mb-0 text-danger">{{}}</h4>--}}
{{--                                </div>--}}
{{--                                <div class="ms-auto text-danger fs-2">--}}
{{--                                    <img src="{{asset('assets/admin/images/icons/100.png')}}" style="height: 60px; width: 40px">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <p class="mb-1"> Total A-VERY GOOD</p>
                                    <h4 class="mb-0 text-info">{{$kpiA}}</h4>
                                </div>
                                <div class="ms-auto text-info fs-2">
                                    <img src="{{asset('assets/admin/images/icons/A.jpg')}}" style="height: 60px; width: 80px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <p class="mb-1"> Total B-GOOD</p>
                                    <h4 class="mb-0 text-success">{{$kpiB}}</h4>
                                </div>
                                <div class="ms-auto text-success fs-2">
                                    <img src="{{asset('assets/admin/images/icons/B.jpg')}}" style="height: 60px; width: 75px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <p class="mb-1">Total C-AVERAGE</p>
                                    <h4 class="mb-0 text-primary">{{$kpiC}}</h4>
                                </div>
                                <div class="ms-auto text-primary fs-2">
                                    <img src="{{asset('assets/admin/images/icons/C.jpg')}}" style="height: 60px; width: 65px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <p class="mb-1">Total D-BELOW AVERAGE</p>
                                    <h4 class="mb-0 text-danger">{{$kpiD}}</h4>
                                </div>
                                <div class="ms-auto text-danger fs-2">
                                    <img src="{{asset('assets/admin/images/icons/D.jpg')}}" style="height: 60px; width: 55px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <p class="mb-1"> Total E-UNSATISFACTORY</p>
                                    <h4 class="mb-0 text-info">{{$kpiE}}</h4>
                                </div>
                                <div class="ms-auto text-info fs-2">
                                    <img src="{{asset('assets/admin/images/icons/E.jpg')}}" style="height: 60px; width: 50px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!--end row-->
        </div>
    </div>
@endsection
