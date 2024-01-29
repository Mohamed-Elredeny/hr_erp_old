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
            <h3>{{__('page.Review_Orders')}}</h3>
            <a href="{{route('admin.export.review')}}" type="button" class="btn btn-primary px-4">
                {{__('page.Download_Excel')}}
            </a>
            <div class="card mt-4">
                <div class="card-body" id="orders">
                    <form method="post" action="{{route('admin.delete')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="table-responsive">
                            <a href="{{route('admin.delete.state',['state'=>'قيد المراجعة'])}}" type="button" class="btn btn-primary px-4">
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

                                        <a href="{{route('admin.request.review.confirm',['id'=>$pending->id])}}" class="btn btn-primary">
                                            {{__('page.Confirm')}}
                                        </a>

                                        <a href="{{route('admin.request.review.canceled',['id'=>$pending->id])}}" class="btn btn-primary">
                                            {{__('page.Cancel')}}
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
