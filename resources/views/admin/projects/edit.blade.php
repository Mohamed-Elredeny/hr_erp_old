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
            <h3>{{__('تعديل بيانات المشروع ')}}</h3>
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
                    <form method="post" action="{{route('admin.projects.update',['project'=>$project->id])}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-2">
                                <label>{{__('اسم المشروع')}}:</label>
                            </div>
                            <div class="col-10">
                                <input class="form-control mb-3" type="text" name="name"
                                       placeholder="{{__('اسم المشروع')}}" value="{{$project->name}}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <label>{{__('رابط المشروع')}}:</label>
                            </div>
                            <div class="col-10">
                                <input class="form-control mb-3" type="text" name="url"
                                       placeholder="{{__('رابط المشروع')}}" value="{{$project->url}}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <label>{{__('تفاصيل المشروع')}}:</label>
                            </div>
                            <div class="col-10">
                                <textarea class="form-control mb-3" id="editor" name="description">value="{{$project->description}}"</textarea>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2">
                                <label>{{__('Logo')}}</label>
                            </div>
                            <div class="col-10">
                                <input type="file" accept="image/*" class="form-control" name="logo"
                                       id="inputGroupFile02" multiple>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <img src="{{asset('assets/images/' . $project->logo )}}" alt=""
                                     style="height:200px;width:200px">
                            </div>

                        </div>

                        <div class="row mt-3">
                            <div class="col-2">
                                <label>{{__('images')}}</label>
                            </div>
                            <div class="col-10">
                                <input type="file" accept="image/*" class="form-control" name="images[]"
                                       id="inputGroupFile02" multiple>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <?php $images = explode('|',$project->images);
                                ?>
                                @foreach($images as $img )
                                    <img src="{{asset('assets/images/' . $img )}}" alt=""
                                         style="height:200px;width:200px;margin: 10px">
                                @endforeach
                            </div>

                        </div>

                        <?php $current_services = explode('|',$project->services);
                        ?>
                        <div class="row mt-3">
                            <div class="col-2">
                                <label>{{__('الحدمات المقدمة')}}</label>
                            </div>
                            <div class="col-10">
                                <div class="form-group">
                                    <select class="form-control exampleSelect" name="services[]" multiple="multiple">
                                        @foreach($services as $service)
                                            <option value="{{$service->id}}" @if(in_array($service->id,$current_services)) selected @endif >{{$service->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                        <?php $current_technologies = explode('|',$project->technologies);
                        ?>
                        <div class="row mt-3">
                            <div class="col-2">
                                <label>{{__('التقنيات المستخدمة')}}</label>
                            </div>
                            <div class="col-10">
                                <div class="form-group">
                                    <select class="form-control exampleSelect" name="technologies[]"
                                            multiple="multiple">
                                        @foreach($technologies as $technology)
                                            <option value="{{$technology->id}}"  @if(in_array($technology->id,$current_technologies)) selected @endif>{{$technology->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>

                        <?php

                        $current_clients = $project->clients->pluck('client_id')->toArray();
                        ?>
                        <div class="row mt-3">
                            <div class="col-2">
                                <label>{{__('العملاء')}}</label>
                            </div>
                            <div class="col-10">
                                <div class="form-group">
                                    <select class="form-control exampleSelect" name="clients[]" multiple="multiple">
                                        @foreach($clients as $client)
                                            <option value="{{$client->id}}"  @if(in_array($client->id,$current_clients)) selected @endif>{{$client->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-2">
                                <label>{{__('حالة المشروع')}}</label>
                            </div>
                            <div class="col-10">
                                <div class="form-group">
                                    <select class="form-control exampleSelect" name="state">
                                        @foreach($states as $state)
                                            <option value="{{$state->id}}" @if($state->id == $project->status) selected @endif>{{$state->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <button type="submit"
                                    class="btn btn-primary px-4 w-25 m-auto mt-3">{{__('page.Save')}}</button>
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
