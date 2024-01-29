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
            <h3>{{__('page.Orders_Canceled')}}</h3>
            <a href="{{route('admin.export.canceled')}}" type="button" class="btn btn-primary px-4">
                {{__('page.Download_Excel')}}
            </a>
            <div class="card mt-4">
                <div class="card-body" id="orders">
                    <form method="post" action="{{route('admin.delete')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="table-responsive">
                            <a href="{{route('admin.delete.state',['state'=>'ملغاه'])}}" type="button" class="btn btn-primary px-4">
                                {{__('page.Delete_All')}}
                            </a>

                            <button type="submit" class="btn btn-primary px-4 m-3">
                                {{__('page.Delete_checked')}}
                            </button>
                        <table id="" class="table table-bordered align-middle" style="width:100%">
                            <thead class="table-light">
                            <tr>
                                <th></th>
                                <th>#</th>
                                <th>{{__('page.Call_Center')}}</th>
                                <th>{{__('page.Project')}}</th>
                                <th>{{__('page.Name')}}</th>
                                <th>{{__('page.Phone')}}</th>
                                <th>{{__('page.Nationality')}}</th>
                                <th>{{__('page.Gender')}}</th>
                                <th>{{__('page.City')}}</th>
                                <th>{{__('page.Age')}}</th>
                                <th>{{__('page.Day')}}</th>
                                <th>{{__('page.Hour')}}</th>
                                <th>{{__('page.Whatsapp')}}</th>
                                <th>{{__('page.Control')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

                            <?php $i = 0; ?>
                            @foreach($pendings as $pending)
                            <tr>
                                <td>
                                    <input type="checkbox" name="delete[]" value="{{$pending->id}}">
                                </td>
                                <td>{{$i++}}</td>
                                <td>
                                    @if($pending->call_center_id == '0')
                                        {{__('page.Admin')}}
                                    @else
                                        {{$pending->callCenter->name}}
                                    @endif
                                </td>
                                <td>{{$pending->event->name}}</td>
                                <td>{{$pending->name}}</td>
                                <td>{{$pending->phone}}</td>
                                <td>{{$pending->nationality}}</td>
                                <td>{{$pending->gender}}</td>
                                <td>{{$pending->City}}</td>
                                <td>{{$pending->age}}</td>
                                <td>{{$pending->date}}</td>
                                <td>{{$pending->time}}</td>
                                <td class="text-center">
                                    <a href="https://wa.me/966{{$pending->phone}}?text=" target="_blank">
                                        <i class="fa fa-whatsapp" aria-hidden="true" style="font-size: 28px; color: green"></i>
                                    </a>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-3 fs-6">
                                        <a href="javascript:;" class="btn btn-primary" title="" data-bs-original-title="Delete" aria-label="Delete"  data-bs-toggle="modal" data-bs-target="#show{{$pending->id}}">
                                            {{__('page.Show')}}
                                        </a>
                                        <div class="modal fade" id="show{{$pending->id}}" tabindex="-1" aria-labelledby="show{{$pending->id}}Label" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="show{{$pending->id}}Label">{{__('page.Upload_Project_Image')}}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <img src="{{asset("assets/admin/images/icons/management.png")}}" style="height: 100px; width: 450px">
                                                            </div>
                                                        </div>
                                                        {{--                                                        <h3 class="m-3">{{$pending->name}}</h3>--}}

                                                        <table class="table table-bordered mt-3">
                                                            <tr>
                                                                <td>الاسم</td>
                                                                <td>{{$pending->name}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>الحي</td>
                                                                <td>
                                                                    @isset($pending->centerAreaname->name){{$pending->centerAreaname->name}}@endisset
                                                                    </td>
                                                            </tr>
                                                            <tr>
                                                                <td>المركز</td>
                                                                <td>
                                                                    @isset($pending->centerAreaname->center->name){{$pending->centerAreaname->center->name}}@endisset
                                                                    
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>اليوم</td>
                                                                <td>{{$pending->day}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>التاريخ</td>
                                                                <td>{{$pending->date}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>الوقت</td>
                                                                <td>{{$pending->time}}</td>
                                                            </tr>
                                                        </table>
                                                        <br>

                                                        {!! QrCode::size(100)->generate(route('request.event.store',['id'=>$pending->id])) !!}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('page.Close')}}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <a href="{{route('admin.request.download',['id'=>$pending->id])}}" onclick="window.open(this.href,'targetWindow',
                                        `toolbar=no,
                                        location=no,
                                        status=no,
                                        menubar=no,
                                        scrollbars=yes,
                                        resizable=yes,
                                        width=700px,
                                        height=350px`);
                                        return false;" class="btn btn-primary">
                                            {{__('page.Download')}}
                                        </a>

                                    </div>

                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    {{$pendings->links()}}
                    </form>
                </div>

            </div>

        </div>
        <!-- end page content-->
    </div>
@endsection
@section('script')
<script>

</script>
@endsection
