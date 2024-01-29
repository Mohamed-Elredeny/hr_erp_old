@extends('layouts.dashboard')
@include('admin.includes.sidebar')
@include('admin.includes.header')
@include('admin.includes.switcher')
@section('content')

    <style>
        table.dataTable {
            border-collapse: collapse !important;
        }
        
    .editor {
      width: 100%;
      height: 300px;
    }
    </style>
    <!-- start page content wrapper-->
    <div class="page-content-wrapper">
        <!-- start page content-->
        <div class="page-content">
            <h3>{{__('اضافة عميل جديد')}}</h3>
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
                    <form method="post" action="{{route('admin.services.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-2">
                                <label>{{__('اسم العميل')}}:</label>
                            </div>
                            <div class="col-10">
                                <input class="form-control mb-3" type="text" name="name" placeholder="{{__('اسم الموظف')}}"required>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-2">
                                <label>{{__('رقم الهاتف')}}:</label>
                            </div>
                            <div class="col-10">
                                <input class="form-control mb-3" type="text" name="phone" placeholder="{{__('رقم الهاتف')}}"required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-2">
                                <label>{{__('رابط الموقع')}}:</label>
                            </div>
                            <div class="col-10">
                                <input class="form-control mb-3" type="text" name="url" placeholder="{{__('رابط الموقع')}}"required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <label>{{__('تفاصيل')}}:</label>
                            </div>
                            <div class="col-10">
                                <textarea class="form-control mb-3" id="editor" name="description" ></textarea>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2">
                                <label>{{__('logo')}}</label>
                            </div>
                            <div class="col-10">
                                <input type="file" accept="image/*" class="form-control" name="logo" id="inputGroupFile02" required multiple>
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
