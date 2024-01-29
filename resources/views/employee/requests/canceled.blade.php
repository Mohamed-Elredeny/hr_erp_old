@extends('layouts.dashboard')
@include('receiver.includes.sidebar')
@include('receiver.includes.header')
@include('receiver.includes.switcher')
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
            <h3>طلبات ملغاه</h3>
            <div class="card mt-4">
                <div class="card-body" id="orders">
                    <div class="table-responsive">
                        <table id="" class="table table-bordered align-middle" style="width:100%">
                            <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>المشروع</th>
                                <th>الاسم</th>
                                <th>الجوال</th>
                                <th>الجنسية</th>
                                <th>الجنس</th>
                                <th>المدينة</th>
                                <th>الحي</th>
                                <th>العمر</th>
                                <th>اليوم</th>
                                <th>الساعة</th>
                                <th>واتساب</th>
                            </tr>
                            </thead>
                            <tbody>
                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

                            <?php $i = 0; ?>
                            @foreach($pendings as $pending)
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
                                <td class="text-center">
                                    <a href="https://wa.me/966{{$pending->phone}}?text=" target="_blank">
                                        <i class="fa fa-whatsapp" aria-hidden="true" style="font-size: 28px; color: green"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    {{$pendings->links()}}
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
