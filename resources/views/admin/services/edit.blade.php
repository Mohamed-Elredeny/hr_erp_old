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
            <h3>{{__('تعديل تفاصيل خدمة [ ')  . $service->name . ' ] '}}</h3>
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
                    <form method="post" action="{{route('admin.services.update',['service'=> $service->id])}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="col-2">
                                <label>{{__('اسم الخدمة')}}:</label>
                            </div>
                            <div class="col-10">
                                <input class="form-control mb-3" type="text" value="{{$service->name}}" name="name" placeholder="{{__('اسم الخدمة')}}"required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <label>{{__('تفاصيل الخدمة')}}:</label>
                            </div>
                            <div class="col-10">
                                <textarea class="form-control mb-3" name="description" >{{$service->description}}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <label>{{__('الحلول المبتكرة')}}:</label>
                            </div>
                            <div class="col-10">
                                <textarea class="form-control mb-3" name="new_solutions" >{{$service->new_solutions}}</textarea>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2">
                                <label>{{__('Logo')}}</label>
                            </div>
                            <div class="col-10">
                                <img src="{{asset('assets/images/' . $service->logo )}}" alt="" style="height: 90px;width:90px">
                                <br><br>
                                <input type="file" accept="image/*" class="form-control" name="logo" id="inputGroupFile02" >
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-2">
                                <label>{{__('Cover')}}</label>
                            </div>
                            <div class="col-10">
                                <img src="{{asset('assets/images/' . $service->cover )}}" alt="" style="height: 90px;width:90px">
                                <br><br>
                                <input type="file" accept="image/*" class="form-control" name="cover" id="inputGroupFile02" >
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
@section('script')

@endsection
