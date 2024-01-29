@extends('layouts.dashboard')
@include('employee.includes.sidebar')
@include('employee.includes.header')
@include('employee.includes.switcher')
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
            <h3>{{__('page.Number_of_orders_delivered')}}</h3>
            <a href="{{route('employee.export')}}" type="button" class="btn btn-primary px-4">
                {{__('page.Download_Excel')}}
            </a>
            <div class="card mt-4">
                <div class="card-body" id="orders">
                    <div class="table-responsive">
                        <table id="" class="table table-bordered align-middle" style="width:100%">
                            <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>{{__('page.Project')}}</th>
                                <th>{{__('page.Name')}}</th>
                                <th>{{__('page.Phone')}}</th>
                                <th>{{__('page.Nationality')}}</th>
                                <th>{{__('page.Gender')}}</th>
                                <th>{{__('page.City')}}</th>
                                <th>{{__('page.District')}}</th>
                                <th>{{__('page.Age')}}</th>
                                <th>{{__('page.Day')}}</th>
                                <th>{{__('page.Hour')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

                            <?php $i = 0; ?>
                            @foreach($members as $pending)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$pending->event->name}}</td>
                                    <td>{{$pending->name}}</td>
                                    <td>{{$pending->phone}}</td>
                                    <td>{{$pending->nationality}}</td>
                                    <td>{{$pending->gender}}</td>
                                    <td>{{$pending->country}}</td>
                                    <td>{{$pending->address}}</td>
                                    <td>{{$pending->age}}</td>
                                    <td>{{$pending->date}}</td>
                                    <td>{{$pending->time}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    {{$members->links()}}
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
