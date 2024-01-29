@extends('layouts.dashboard')
@include('callCenter.includes.sidebar')
@include('callCenter.includes.header')
@include('callCenter.includes.switcher')
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

            <div class="card mt-4">
                <div class="card-body" id="orders">
                    <div class="table-responsive">
                        <table id="" class="table table-bordered align-middle" style="width:100%">
                            <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>{{__('page.Image')}}</th>
                                <th>{{__('page.Background')}}</th>
                                <th>{{__('page.Name')}}</th>
{{--                                <th>{{__('page.Number_of_requests')}}</th>--}}
                                <th>{{__('page.Link')}}</th>
                                <th>{{__('page.Review_Orders')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach($events as $event)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>
                                    @isset($event->event->image)
                                    <img src="{{asset("assets/images/events/")}}/{{$event->event->image}}" style="height: 50px; width: 50px">
                                    @endisset
                                </td>
                                <td>
                                    @isset($event->event->background)
                                    <img src="{{asset("assets/images/events/")}}/{{$event->event->background}}" style="height: 50px; width: 50px">
                                    @endisset
                                </td>
                                <td>{{$event->event->name}}</td>
{{--                                <td>{{count($event->members)}}</td>--}}
                                <td>
                                    <a href="{{route('callCenter.form',['event_id'=>$event->event->id])}}" target="_blank">
                                        {{route('callCenter.form',['event_id'=>$event->event->id])}}
                                    </a>
                                </td>
                                <td>
                                    <?php
                                            $reviews = \App\Models\Member::where('state','قيد المراجعة')->where('event_id',$event->event->id)->count();
                                    ?>
                                    @if($reviews == 0)
                                        {{__('page.No_Orders')}}
                                    @else
                                    <a class="btn btn-primary" href="{{route('callCenter.get.form',['event_id'=>$event->event->id])}}" target="_blank">
                                        {{__('page.Show')}}
                                    </a>
                                    @endif
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
