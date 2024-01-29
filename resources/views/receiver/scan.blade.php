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
            <div class="col-md-9">
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
                            <img src="{{asset("assets/images/events/$member->image")}}" style="height: 300px">
                            <div class="row text-start mt-4">
                                @isset($member->name)
                                <div class="col-5 mt-2">الاسم :</div>
                                <div class="col-7 mt-2">{{$member->name}}</div>
@endisset
@isset($member->phone)
                                <div class="col-5 mt-2">رقم الجوال:</div>
                                <div class="col-7 mt-2">{{$member->phone}}</div>
@endisset
@isset($member->nationality)
                                <div class="col-5 mt-2">الجنسية:</div>
                                <div class="col-7 mt-2">{{$member->nationality}}</div>
@endisset
@isset($member->gender)
                                <div class="col-5 mt-2">الجنس:</div>
                                <div class="col-7 mt-2">{{$member->gender}}</div>
@endisset
@isset($member->country)

                                <div class="col-5 mt-2">المدينة:</div>
                                <div class="col-7 mt-2">{{$member->country}}</div>
@endisset
@isset($member->address)

                                <div class="col-5 mt-2">الحي:</div>
                                <div class="col-7 mt-2">{{$member->address}}</div>
@endisset
@isset($member->age)

                                <div class="col-5 mt-2">العمر:</div>
                                <div class="col-7 mt-2">{{$member->age}}</div>
@endisset
                                    @isset($member->national_id)

                                        <div class="col-5 mt-2">الهوية الوطنية:</div>
                                        <div class="col-7 mt-2">{{$member->national_id}}</div>
                                    @endisset
                                    @isset($member->data_source)

                                        <div class="col-5 mt-2">مصدر البيانات:</div>
                                        <div class="col-7 mt-2">{{$member->data_source}}</div>
                                    @endisset
                                    @isset($member->birthday)

                                        <div class="col-5 mt-2">تاريخ الميلاد:</div>
                                        <div class="col-7 mt-2">{{$member->birthday}}</div>
                                    @endisset
                                    @isset($member->marital_status)

                                        <div class="col-5 mt-2">الحالة الاجتماعيه:</div>
                                        <div class="col-7 mt-2">{{$member->marital_status}}</div>
                                    @endisset
                                    @isset($member->center_area_id)

                                        <div class="col-5 mt-2">منطقة المركز:</div>
                                        <div class="col-7 mt-2">{{$member->centerArea->area}}</div>
                                    @endisset
                                    @isset($member->center_name_id)

                                        <div class="col-5 mt-2">اسم المركز:</div>
                                        <div class="col-7 mt-2">{{$member->centerName->name}}</div>
                                    @endisset
                                    @isset($member->diseases)

                                        <div class="col-5 mt-2">الامراض او الاعاقات:</div>
                                        <div class="col-7 mt-2">{{$member->diseases}}</div>
                                    @endisset

                                    @isset($member->ConnectionStatus)

                                                                    <div class="col-5 mt-2">حالة الإتصال :</div>
                                                                    <div class="col-7 mt-2">{{$member->ConnectionStatus}}</div>
                                    @endisset
                                    @isset($member->NationalIdentity)

                                        <div class="col-5 mt-2">الهوية الوطنية:</div>
                                        <div class="col-7 mt-2">{{$member->NationalIdentity}}</div>
                                    @endisset
                                    @isset($member->Residence)

                                        <div class="col-5 mt-2">مقر السكن:</div>
                                        <div class="col-7 mt-2">{{$member->Residence}}</div>
                                    @endisset
                                    @isset($member->DateofBirth)

                                        <div class="col-5 mt-2">تاريخ الميلاد:</div>
                                        <div class="col-7 mt-2">{{$member->DateofBirth}}</div>
                                    @endisset
                                    @isset($member->Maritalstatus)

                                        <div class="col-5 mt-2">الحالة الاجتماعية:</div>
                                        <div class="col-7 mt-2">{{$member->Maritalstatus}}</div>
                                    @endisset
                                    @isset($member->City)

                                        <div class="col-5 mt-2">المدينة:</div>
                                        <div class="col-7 mt-2">{{$member->City}}</div>
                                    @endisset
                                    @isset($member->answer)

                                        <div class="col-5 mt-2">هل تمت الاستجابة:</div>
                                        <div class="col-7 mt-2">{{$member->answer}}</div>
                                    @endisset
                                    @isset($member->healthProblem)

                                        <div class="col-5 mt-2">هل تعاني من أي مشاكلة صحية:</div>
                                        <div class="col-7 mt-2">{{$member->healthProblem}}</div>
                                    @endisset
                                    @isset($member->chronic)

                                        <div class="col-5 mt-2">هل تعاني من أي مرض مزمن؟</div>
                                        <div class="col-7 mt-2">{{$member->chronic}}</div>
                                    @endisset
                                    @isset($member->disability)

                                        <div class="col-5 mt-2">هل تعاني من أي إعاقة؟</div>
                                        <div class="col-7 mt-2">{{$member->disability}}</div>
                                    @endisset
                                    @isset($member->Hospital)

                                        <div class="col-5 mt-2">هل سبق ان راجعت في أي مستشفى أو مركز صحي ؟</div>
                                        <div class="col-7 mt-2">{{$member->Hospital}}</div>
                                    @endisset
                                    @isset($member->help)

                                        <div class="col-5 mt-2">هل تحتاج الى مساعدة طبية او رعاية منزلية ؟</div>
                                        <div class="col-7 mt-2">{{$member->help}}</div>
                                    @endisset
                                    @isset($member->centerArea)
                                        <div class="col-5 mt-2">الحي:</div>
                                        <div class="col-7 mt-2">{{$member->centerAreaname->name}}</div>
                                    @endisset
                                    @isset($member->centerName)

                                        <div class="col-5 mt-2">المركز:</div>
                                        <div class="col-7 mt-2">{{$member->centerNamename->name}}</div>
                                    @endisset
                                    @isset($member->day)

                                        <div class="col-5 mt-2">اليوم:</div>
                                        <div class="col-7 mt-2">{{$member->day}}</div>
                                    @endisset
                                    @isset($member->date)

                                        <div class="col-5 mt-2">تاريخ:</div>
                                        <div class="col-7 mt-2">{{$member->date}}</div>
                                    @endisset
@isset($member->time)

                                <div class="col-5 mt-2">وقت:</div>
                                <div class="col-7 mt-2">{{$member->time}}</div>
@endisset

                                <div class="col-5 mt-2">الحالة:</div>
                                <div class="col-7 mt-2">{{$member->state}}</div>
{{--                                @if(isset(auth('receiver')->user()->id) && $member->state=='قيد الانتظار')--}}
<div class="col-5 mt-2">الملاحظة:</div>
                                <div class="col-7 mt-2">{{$member->note}}</div>
{{--                                 @endif--}}
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
