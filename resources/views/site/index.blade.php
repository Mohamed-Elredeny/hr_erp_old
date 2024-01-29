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
<body dir="rtl" style="background-image: url({{asset("assets/images/events/$event->image")}})">

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

                        <div class="pt-2">
                            <h4 class="font-size-18 mt-2 text-center">سجل الان للحصول علي الجائزة</h4>
                            <h5 class="text-center">{{$event->name}}</h5>
                            <form class="form-horizontal mt-2" method="post"  action="{{route('form.submit')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="name">الاسم كامل</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="قم بإدخال الاسم" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">رقم الجوال</label>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="قم بإدخال رقم الجوال" required>
                                </div>
                                <div class="form-group text-right">
                                    <label for="nationality">الجنسية</label>
                                    <input type="text" class="form-control text-right" name="nationality" id="nationality" placeholder="الجنسية">
                                </div>
                                <div class="form-group text-right">
                                    <label for="gender">الجنس</label>
                                    <select class="form-control" name="gender" id="gender">
                                        <option value="ذكر">ذكر</option>
                                        <option value="أنثى">أنثى</option>
                                    </select>
                                </div>
                                <div class="form-group text-right">
                                    <label for="country">المدينة</label>
                                    <input type="text" class="form-control text-right" name="country" id="country" placeholder="قم بإدخال المدينة">
                                </div>
                                <div class="form-group text-right">
                                    <label for="address">الحي</label>
                                    <input type="text" class="form-control text-right" name="address" id="address" placeholder="قم بإدخال الحي">
                                </div>
                                <div class="form-group text-right">
                                    <label for="age">العمر</label>
                                    <input type="number" class="form-control text-right" name="age" id="age" placeholder="قم بإدخال العمر">
                                </div>
                                <div class="form-group text-right">
                                    <label for="date">تاريخ الاستلام</label>
                                    <input type="date" class="form-control text-right" name="date" id="date">
                                </div>
                                <div class="form-group text-right">
                                    <label for="time">وقت الاستلام</label>
                                    <input type="time" class="form-control text-right" name="time" id="time">
                                </div>

                                <input type="hidden" name="event_id" value="{{$event->id}}">


                                <div class="form-group row mt-2">
                                    <div class="col-sm-12 text-center">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">سجل</button>
                                    </div>
                                </div>
                            </form>

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
