@extends('layouts.dashboard')
@include('receiver.includes.sidebar')
@include('receiver.includes.header')
@include('receiver.includes.switcher')
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
                                    <p class="mb-1">{{__('page.Total_Requests')}}</p>
                                    <h4 class="mb-0 text-danger">{{$requests}}</h4>
                                </div>
                                <div class="ms-auto text-danger fs-2">
                                    <img src="{{asset('assets/admin/images/icons/50.webp')}}" style="width: 40px">
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
                                    <p class="mb-1">{{__('page.Number_of_orders_delivered')}}</p>
                                    <h4 class="mb-0 text-success">{{$delivered}}</h4>
                                </div>
                                <div class="ms-auto text-success fs-2">
                                    <img src="{{asset('assets/admin/images/icons/100.png')}}" style="width: 40px">
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
                                    <p class="mb-1">{{__('page.Number_of_orders_cancel')}}</p>
                                    <h4 class="mb-0 text-success">{{$canceled}}</h4>
                                </div>
                                <div class="ms-auto text-success fs-2">
                                    <img src="{{asset('assets/admin/images/icons/cancel.jpg')}}" style="width: 40px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!--end row-->

        </div>
        <!-- end page content-->
    </div>
@endsection
