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
<body dir="rtl">

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
                        @if($member->state == 'تم الاستلام' && $x == 1)

                        <div class="pt-2 text-center">
                            <div class="alert alert-success alert-block text-left">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <strong>تم استلام الجائزة بنجاح</strong>
                            </div>
                            <h5 class="text-center">{{$member->name}}</h5>
                            <img src="{{asset("assets/images/events/$member->image")}}" style="height: 200px">
                        </div>
                            @elseif($member->state == 'تم الاستلام' && $x == 0)
                                <div class="pt-2 text-center">
                                    <div class="alert alert-danger alert-block text-left">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        <strong>نأسف تم استلام الجائزه من قبل</strong>
                                    </div>
                                    <h5 class="text-center">{{$member->name}}</h5>
                                    <img src="{{asset("assets/images/events/$member->image")}}" style="height: 200px">
                                </div>
                            @elseif($member->state == 'قيد الانتظار')
                                <div class="pt-2">
                                    <div class="alert alert-warning alert-block text-left">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        <strong>جاري المراجعه الجائزة</strong>
                                    </div>
                                    <h5 class="text-center">
                                        مرحبا
                                        {{$member->name}}
                                        نأسف جاري مراجعة الجائزه الان
                                    </h5>
                                </div>
                            @endif
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
