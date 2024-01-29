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
            <h3>{{__('page.Projects')}}</h3>
            <div class="text-end">
                <a href="{{route('admin.events.create')}}" class="btn btn-primary">{{__('page.Add_Project')}}</a>
            </div>
            <div class="card mt-4">
                <div class="card-body" id="orders">
                    <div class="table-responsive">
                        <table id="" class="table table-bordered align-middle" style="width:100%">
                            <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>{{__('page.Image')}}</th>
                                <th>{{__('page.Right_logo')}}</th>
                                <th>{{__('page.Left_logo')}}</th>
                                <th>{{__('page.Background')}}</th>
                                <th>{{__('page.Name')}}</th>
                                <th>{{__('page.Call_Center')}}</th>
                                <th>{{__('page.Customers')}}</th>
                                <th>{{__('page.Link')}}</th>
                                <th>{{__('page.Add_Excel')}}</th>
                                <th>{{__('page.Control')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach($events as $event)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>
                                    <img src="{{asset("assets/images/events/$event->image")}}" style="height: 50px; width: 50px">
                                </td>
                                <td>
                                    <img src="{{asset("assets/images/events/$event->logo_right")}}" style="height: 50px; width: 50px">
                                </td>
                                <td>
                                    <img src="{{asset("assets/images/events/$event->logo_left")}}" style="height: 50px; width: 50px">
                                </td>
                                <td>
                                    <img src="{{asset("assets/images/events/$event->background")}}" style="height: 50px; width: 50px">
                                </td>
                                <td>{{$event->name}}</td>
                                <td>
                                    @foreach($event->callcenterEvents as $callcenterEvent)
                                    {{$callcenterEvent->callcenter->name}} -
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($event->employeeEvents as $employeeEvent)
                                        {{$employeeEvent->employee->name}} -
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{route('admin.form',['event_id'=>$event->id])}}">
                                        {{route('admin.form',['event_id'=>$event->id])}}
                                    </a>
                                </td>
                                <td>
                                    <form method="post" action="{{route('admin.import')}}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="file">
                                        <input type="hidden" name="event_id" value="{{$event->id}}">
                                        <button class="btn btn-primary" type="submit">{{__('page.Upload')}}</button>
                                    </form>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-3 fs-6">
                                        <a href="{{route('admin.events.edit',['event'=>$event->id])}}" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                           title="" data-bs-original-title="Edit info" aria-label="Edit">
                                            <ion-icon name="pencil-sharp"></ion-icon>
                                        </a>

                                        <a href="javascript:;" class="text-danger" title="" data-bs-original-title="Delete" aria-label="Delete"  data-bs-toggle="modal" data-bs-target="#DeletePersonalSkill{{$event->id}}">
                                            <ion-icon name="trash-sharp" role="img" class="md hydrated" aria-label="trash sharp"></ion-icon>
                                        </a>

                                        <div class="modal fade" id="DeletePersonalSkill{{$event->id}}" tabindex="-1" aria-labelledby="DeletePersonalSkill{{$event->id}}Label" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="DeletePersonalSkill{{$event->id}}Label">تأكيد الحذف</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        هل انت متأكد من الحذف؟
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">غلق</button>
                                                        <form method="post" action="{{route('admin.events.destroy',['event'=>$event->id])}}">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger">حذف</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
