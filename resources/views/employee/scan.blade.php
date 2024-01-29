<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset("assets/admin/images/logo.png")}}">

    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">

    <link href="{{asset("assets/admin/css/app.css")}}" rel="stylesheet" type="text/css"/>
    <style>
        .form-group {
            margin-bottom: 10px;
        }
    </style>

</head>
<body dir="rtl" style="background-image: url('{{asset("assets/images/events/")}}/{{$member->event->background}}'); background-size: 100% 100%">

<!-- Loader -->
<div id="preloader"><div id="status"><div class="spinner"></div></div></div>

<!-- Begin page -->
<div class="accountbg"></div>

<div class="account-pages mt-3 pt-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card">
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block text-left">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif

                        <div class="pt-2 text-center">
                            <h5 class="text-center">{{$member->event->name}}</h5>
                            <img src="{{asset("assets/images/events/$member->image")}}" style="height: 200px">
                            <div class="row text-start mt-4">
                                <div class="col-3 mt-2">الاسم كامل:</div>
                                <div class="col-9 mt-2">{{$member->name}}</div>

                                <div class="col-3 mt-2">رقم الجوال:</div>
                                <div class="col-9 mt-2">{{$member->phone}}</div>

                                <div class="col-3 mt-2">الجنسية:</div>
                                <div class="col-9 mt-2">{{$member->nationality}}</div>

                                <div class="col-3 mt-2">الجنس:</div>
                                <div class="col-9 mt-2">{{$member->gender}}</div>

                                <div class="col-3 mt-2">المدينة:</div>
                                <div class="col-9 mt-2">{{$member->country}}</div>

                                <div class="col-3 mt-2">الحي:</div>
                                <div class="col-9 mt-2">{{$member->address}}</div>

                                <div class="col-3 mt-2">العمر:</div>
                                <div class="col-9 mt-2">{{$member->age}}</div>

                                <div class="col-3 mt-2">تاريخ الاستلام:</div>
                                <div class="col-9 mt-2">{{$member->date}}</div>

                                <div class="col-3 mt-2">وقت الاستلام:</div>
                                <div class="col-9 mt-2">{{$member->time}}</div>

                                <div class="col-3 mt-2">الحالة:</div>
                                <div class="col-9 mt-2">{{$member->state}}</div>
                            </div>

                            @if(isset(auth('receiver')->user()->id) && $member->state=='قيد الانتظار')
                            <div class="form-group row mt-2">
                                <div class="col-sm-12 text-center">
                                    <a class="btn btn-primary w-md waves-effect waves-light" href="{{route('receiver.deliver.request',['id'=>$member->id])}}">تسليم</a>
                                    <a class="btn btn-danger w-md waves-effect waves-light" href="{{route('receiver.cancel.request',['id'=>$member->id])}}">الغاء</a>
                                </div>
                            </div>
                            @endif
                        </div>


                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<!-- JAVASCRIPT -->
<script src="{{asset("assets/admin/libs/jquery/jquery.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/metismenu/metisMenu.min.js")}}"></script>
<script src="{{asset("assets/admin/js/app.js")}}"></script>

</body>
</html>
