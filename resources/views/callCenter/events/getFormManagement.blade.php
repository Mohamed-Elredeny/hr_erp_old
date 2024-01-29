<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
@if(LaravelLocalization::getCurrentLocale() == 'ar')
    <!-- loader-->
        <link href="{{asset('assets/admin/ar/css/pace.min.css')}}" rel="stylesheet"/>
        <script src="{{asset('assets/admin/ar/js/pace.min.js')}}"></script>

        <!--plugins-->
        <link href="{{asset('assets/admin/ar/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet')}}"/>
        <link href="{{asset('assets/admin/ar/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/admin/ar/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/admin/ar/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/admin/ar/plugins/OwlCarousel/css/owl.carousel.min.css')}}" rel="stylesheet" />
    @yield('pluginsStyle')


    <!-- CSS Files -->
        <link href="{{asset('assets/admin/ar/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/ar/css/bootstrap-extended.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/ar/css/style.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/ar/css/icons.css')}}" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>
        @yield('style')
        <style>
            * {
                font-family: 'cairo';
            }
        </style>
    @else
    <!-- loader-->
        <link href="{{asset('assets/admin/en/css/pace.min.css')}}" rel="stylesheet"/>
        <script src="{{asset('assets/admin/en/js/pace.min.js')}}"></script>

        <!--plugins-->
        <link href="{{asset('assets/admin/en/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet')}}"/>
        <link href="{{asset('assets/admin/en/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/admin/en/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet"/>
        <link href="{{asset('assets/admin/en/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/admin/en/plugins/OwlCarousel/css/owl.carousel.min.css')}}" rel="stylesheet" />
        @yield('pluginsStyle')


    <!-- CSS Files -->
        <link href="{{asset('assets/admin/en/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/en/css/bootstrap-extended.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/en/css/style.css')}}" rel="stylesheet">
        <link href="{{asset('assets/admin/en/css/icons.css')}}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
        @yield('style')
        <style>
            .sidebar-wrapper .metismenu a {
                font-size: 20px;
            }
        </style>
    @endif
    <title>DTC Marketing</title>
    <style>
        .form-group {
            margin-bottom: 10px;
        }
    </style>

</head>
@if(LaravelLocalization::getCurrentLocale() == 'ar')

    <body dir="rtl" style="background-image: url({{asset("assets/images/events/$event->background")}}); background-size: 100% 100%">
    @else
        <body style="background-image: url({{asset("assets/images/events/$event->background")}}); background-size: 100% 100%">

        @endif
        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div class="accountbg"></div>

        <div class="account-pages mt-3 pt-3">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-9">
                        <div class="card">
                            <div class="card-body">
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-block text-left">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif
                                @if ($message = Session::get('error'))
                                    <div class="alert alert-danger alert-block text-left">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif
                                @if($isHasEvent == 0)
                                    <div class="alert alert-danger alert-block text-left">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        <strong>{{__('page.sorry')}}</strong>
                                    </div>
                                @else

                                    <div class="pt-2">
                                        <h4 class="font-size-18 mt-2 text-center">{{__('page.Register_now_to_get_the_prize')}}</h4>
                                        <h5 class="text-center">{{$event->name}}</h5>
                                        <form class="form-horizontal mt-2" method="post"  action="{{route('callCenter.get.form.submit')}}">
                                            @csrf
                                            <input type="hidden" name="member_id" value="{{$member->id}}">
                                            <div class="row">
                                            <div class="col-6">
                                                <div class="form-group text-right">
                                                    <label for="Connection_Status">{{__('page.Connection_Status')}}</label>
                                                    <select class="form-control" name="Connection_Status" id="Connection_Status">
                                                        <option value="تم الرد">{{__('page.Answered')}}</option>
                                                        <option value="لم يرد">{{__('page.didnanswer')}}</option>
                                                        <option value="غير صحيح">{{__('page.Incorrect')}}</option>
                                                        <option value="مشغول">{{__('page.Busy')}}</option>
                                                        <option value="مفصول">{{__('page.Disconnected')}}</option>
                                                        <option value="متوفي">{{__('page.Dead')}}</option>
                                                    </select>
                                                </div>
                                            </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="name">{{__('page.Name')}}</label>
                                                        <input type="text" class="form-control" name="name" value="{{$member->name}}" id="name" placeholder="{{__('page.Name')}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="phone">{{__('page.Phone')}}</label>
                                                        <input type="text" class="form-control" name="phone" value="{{$member->phone}}" maxlength="10" minlength="10" id="phone" placeholder="{{__('page.Phone')}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="National_Identity">{{__('page.National_Identity')}}</label>
                                                        <input type="text" class="form-control" name="National_Identity" value="{{$member->NationalIdentity}}" id="National_Identity" placeholder="{{__('page.National_Identity')}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="Residence">{{__('page.Residence')}}</label>
                                                        <input type="text" class="form-control" name="Residence" id="Residence" value="{{$member->Residence}}" placeholder="{{__('page.Residence')}}" required>
                                                    </div>
                                                </div>
                                            <div class="col-6">
                                                <div class="form-group text-right">
                                                    <label for="nationality">{{__('page.Nationality')}}</label>
                                                    <input type="text" class="form-control text-right" name="nationality" id="nationality" placeholder="{{__('page.Nationality')}}">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group text-right">
                                                    <label for="gender">{{__('page.Gender')}}</label>
                                                    <select class="form-control" name="gender" id="gender">
                                                        <option value="ذكر">{{__('page.Male')}}</option>
                                                        <option value="أنثى">{{__('page.Female')}}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group text-right">
                                                    <label for="Date_of_Birth">{{__('page.Date_of_Birth')}}</label>
                                                    <input type="text" class="form-control text-right" name="Date_of_Birth" id="Date_of_Birth" placeholder="{{__('page.Date_of_Birth')}}">
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group text-right">
                                                    <label for="age">{{__('page.Age')}}</label>
                                                    <input type="text" class="form-control text-right" name="age" id="age" placeholder="{{__('page.Age')}}">
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group text-right">
                                                    <label for="Marital_status">{{__('page.Marital_status')}}</label>
                                                    <select class="form-control" name="Maritalstatus" id="Marital_status">
                                                        <option value="متزوج">{{__('page.Married')}}</option>
                                                        <option value="مطلق">{{__('page.Divorced')}}</option>
                                                        <option value="ارمل">{{__('page.Widower')}}</option>
                                                        <option value="اعزب">{{__('page.Single')}}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group text-right">
                                                    <label for="City">{{__('page.City')}}</label>
                                                    <select class="form-control" name="City" id="city_select" onchange="cityChange()">
                                                        <option value="الرياض">{{__('page.Riyadh')}}</option>
                                                        <option value="خارج الرياض">{{__('page.Outside_Riyadh')}}</option>
                                                    </select>
                                                    <div id="cityOther">

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group text-right">
                                                    <label for="answer_select">هل تمت الاستجابة</label>
                                                    <select class="form-control" name="answer_select" id="answer_select" onchange="answerChange()">
                                                        <option value="نعم">نعم</option>
                                                        <option value="لا">لا</option>
                                                    </select>
                                                    <div id="answerOther">

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group text-right">
                                                    <label for="problem_select">هل تعاني من أي مشاكلة صحية</label>
                                                    <select class="form-control" name="problem_select" id="problem_select" onchange="problemChange()">
                                                        <option value="لا">لا</option>
                                                        <option value="نعم">نعم</option>
                                                    </select>
                                                    <div id="problemOtherDiv" style="display: none">
                                                        <select class="form-control" name="healthProblem" id="problemOther_select" onchange="problemSelectOther()">
                                                            @foreach($healthProblems as $healthProblem)
                                                                <option value="{{$healthProblem->name}}">{{$healthProblem->name}}</option>
                                                            @endforeach
                                                            <option value="اخري">{{__('page.Other')}}</option>
                                                        </select>
                                                        <div id="problemOther">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group text-right">
                                                    <label for="problem_select">هل تعاني من أي مرض مزمن</label>
                                                    <select class="form-control" name="chronic_select" id="chronic_select" onchange="chronicChange()">
                                                        <option value="لا">لا</option>
                                                        <option value="نعم">نعم</option>
                                                    </select>
                                                    <div id="chronicOtherDiv" style="display: none">
                                                        <select class="form-control" name="chronic" id="chronicOther_select" onchange="chronicSelectOther()">
                                                            @foreach($chronicDiseases as $chronicDisease)
                                                                <option value="{{$chronicDisease->name}}">{{$chronicDisease->name}}</option>
                                                            @endforeach
                                                            <option value="اخري">{{__('page.Other')}}</option>
                                                        </select>
                                                        <div id="chronicOther">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group text-right">
                                                    <label for="problem_select">هل تعاني من أي إعاقة</label>
                                                    <select class="form-control" name="disability_select" id="disability_select" onchange="disabilityChange()">
                                                        <option value="لا">لا</option>
                                                        <option value="نعم">نعم</option>
                                                    </select>
                                                    <div id="disabilityOtherDiv" style="display: none">
                                                        <select class="form-control" name="disabilityOther_select" id="disabilityOther_select" onchange="disabilitySelectOther()">
                                                            @foreach($Disabilities as $Disability)
                                                                <option value="{{$Disability->name}}">{{$Disability->name}}</option>
                                                            @endforeach
                                                            <option value="اخري">{{__('page.Other')}}</option>
                                                        </select>
                                                        <div id="disabilityOther">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group text-right">
                                                    <label for="problem_select">هل سبق ان راجعت في أي مستشفى أو مركز صحي ؟</label>
                                                    <select class="form-control" name="checkedHospital_select" id="checkedHospital_select" onchange="checkedHospitalChange()">
                                                        <option value="لا">لا</option>
                                                        <option value="نعم">نعم</option>
                                                    </select>
                                                    <div id="checkedHospitalOtherDiv" style="display: none">
                                                        <select class="form-control" name="checkedHospitalOther_select" id="checkedHospitalOther_select" onchange="checkedHospitalSelectOther()">
                                                            <option value="مستشفي">مستشفي</option>
                                                            <option value="مركز صحي">مركز صحي</option>
                                                            <option value="اخري">{{__('page.Other')}}</option>
                                                        </select>
                                                         <div id="HospitalOther" style="display: none">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <select class="form-control" name="HospitalArea_select" id="HospitalArea_select" onchange="getHospitalNames()">
                                                                @foreach($HospitalsAreas as $HospitalsArea)
                                                                    <option value="{{$HospitalsArea->id}}">{{$HospitalsArea->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-6" id="">
                                                            <select class="form-control" name="HospitalNames_select" id="HospitalNames_select" onchange="HealthHospitalNamesReals()">
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="centerOther" style="display: none">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <select class="form-control" name="CenterArea_select" id="CenterArea_select" onchange="getHealthCenterslNames()">
                                                                @foreach($HealthCentersAreas as $HealthCentersArea)
                                                                    <option value="{{$HealthCentersArea->id}}">{{$HealthCentersArea->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-6" id="">
                                                            <select class="form-control" name="centerNames_select" id="centerNames_select" onchange="HealthCenterslNamesReals()">
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                        <div id="checkedHospitalOther">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group text-right">
                                                    <label for="help_select">هل تحتاج الى مساعدة طبية او رعاية منزلية ؟</label>
                                                    <select class="form-control" name="help_select" id="help_select" onchange="helpChange()">
                                                        <option value="لا">لا</option>
                                                        <option value="نعم">نعم</option>
                                                    </select>
                                                    <div id="helpOther">

                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="row">
                                                <h3>حجز ميعاد</h3>
                                            <div class="col-6">
                                                <div class="form-group text-right">
                                                    <label for="problem_select">الحي</label>
                                                    <select class="form-control" name="centerArea" id="getcenterNames" onchange="getcenterNamesSelect()">
                                                        @foreach($centerArias as $centerAria)
                                                            <option value="{{$centerAria->id}}">{{$centerAria->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group text-right">
                                                    <label for="centerNames">المركز</label>
                                                    <select class="form-control" name="centerName" id="centerNames">

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group text-right">
                                                    <label for="day">اليوم</label>
                                                    <input type="text" class="form-control text-right" name="day" id="day">
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group text-right">
                                                    <label for="date">التاريخ</label>
                                                    <input type="date" class="form-control text-right" name="date" id="date">
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group text-right">
                                                    <label for="time">الوقت</label>
                                                    <input type="time" class="form-control text-right" name="time" id="time">
                                                </div>
                                            </div>

                                    </div>


                                        <div>

                                            <div class="form-group text-right">
                                                <label for="note">{{__('page.Note')}}</label>
                                                <textarea type="time" class="form-control text-right" placeholder="{{__('page.Note')}}" name="note"></textarea>
                                            </div>
                                        </div>
                                        <div id="HospitalArea_select_real_input">
                                    
                                </div>
                                <div id="center_area_real_input">
                                    
                                </div>
                                 <div id="center_name_real">
                                    
                                </div>
                                 <div id="Hospital_name_real">
                                    
                                </div>


                                        <input type="hidden" name="event_id" value="{{$event->id}}">


                                            <div class="form-group row mt-2">
                                                <div class="col-sm-4 text-center">
                                                    <button class="btn btn-success" type="submit">{{__('page.Save')}}</button>
                                                </div>

                                                <div class="col-sm-4 text-center">
                                                    <a href="{{route('callCenter.get.form.cancel',['member_id'=>$member->id])}}" class="btn btn-danger">{{__('page.Cancel')}}</a>
                                                </div>

                                                <div class="col-sm-4 text-center">
                                                    <a href="{{route('callCenter.get.form.later',['member_id'=>$member->id])}}" class="btn btn-primary">{{__('page.Later')}}</a>
                                                </div>
                                            </div>
                                        </form>

                                    </div>

                                @endif

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        @if(LaravelLocalization::getCurrentLocale() == 'ar')
            <!-- JS Files-->
            <script src="{{asset('assets/admin/ar/js/jquery.min.js')}}"></script>
            <script src="{{asset('assets/admin/ar/plugins/simplebar/js/simplebar.min.js')}}"></script>
            <script src="{{asset('assets/admin/ar/plugins/metismenu/js/metisMenu.min.js')}}"></script>
            <script src="{{asset('assets/admin/ar/js/bootstrap.bundle.min.js')}}"></script>
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <!--plugins-->
            <script src="{{asset('assets/admin/ar/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
            @yield('pluginsScript')

            <script src="{{asset('assets/admin/ar/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset('assets/admin/ar/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
            <script src="{{asset('assets/admin/ar/js/table-datatable.js')}}"></script>
            <script src="{{asset('assets/admin/ar/plugins/OwlCarousel/js/owl.carousel.min.js')}}"></script>
            <script src="{{asset('assets/admin/ar/plugins/OwlCarousel/js/owl.carousel2.thumbs.min.js')}}"></script>
            <script src="{{asset('assets/admin/ar/js/product-details.js')}}"></script>


            @yield('script')

            <!-- Main JS-->
            <script src="{{asset('assets/admin/ar/js/main.js')}}"></script>

        @else
            <!-- JS Files-->
            <script src="{{asset('assets/admin/en/js/jquery.min.js')}}"></script>
            <script src="{{asset('assets/admin/en/plugins/simplebar/js/simplebar.min.js')}}"></script>
            <script src="{{asset('assets/admin/en/plugins/metismenu/js/metisMenu.min.js')}}"></script>
            <script src="{{asset('assets/admin/en/js/bootstrap.bundle.min.js')}}"></script>
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <!--plugins-->
            <script src="{{asset('assets/admin/en/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
            @yield('pluginsScript')

            <script src="{{asset('assets/admin/en/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset('assets/admin/en/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
            <script src="{{asset('assets/admin/en/js/table-datatable.js')}}"></script>
            <script src="{{asset('assets/admin/en/plugins/OwlCarousel/js/owl.carousel.min.js')}}"></script>
            <script src="{{asset('assets/admin/en/plugins/OwlCarousel/js/owl.carousel2.thumbs.min.js')}}"></script>
            <script src="{{asset('assets/admin/en/js/product-details.js')}}"></script>


            @yield('script')

            <!-- Main JS-->
            <script src="{{asset('assets/admin/en/js/main.js')}}"></script>
        @endif
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <script>
            function cityChange() {
                var city = document.getElementById('city_select').value;
                if(city == 'خارج الرياض'){
                    document.getElementById('cityOther').innerHTML ='<input type="text" class="form-control text-right mt-1" name="cityOther" id="" placeholder="{{__('page.Other')}}">';
                } else {
                    document.getElementById('cityOther').innerHTML =' ';
                }
            }

            function answerChange() {
                var city = document.getElementById('answer_select').value;
                if(city == 'لا'){
                    document.getElementById('answerOther').innerHTML ='<input type="text" class="form-control text-right mt-1" name="answerOther" id="" placeholder="السبب">';
                } else {
                    document.getElementById('answerOther').innerHTML =' ';
                }
            }

            function problemChange() {
                var city = document.getElementById('problem_select').value;
                if(city == 'نعم'){
                    document.getElementById('problemOtherDiv').style.display='block';
                } else {
                    document.getElementById('problemOtherDiv').style.display='none';
                }
            }

            function problemSelectOther() {
                var city = document.getElementById('problemOther_select').value;
                if(city == 'اخري'){
                    document.getElementById('problemOther').innerHTML ='<input type="text" class="form-control text-right mt-1" name="problemOther" id="" placeholder="{{__('page.Other')}}">';
                } else {
                    document.getElementById('problemOther').innerHTML =' ';
                }
            }

            function disabilityChange() {
                var city = document.getElementById('disability_select').value;
                if(city == 'نعم'){
                    document.getElementById('disabilityOtherDiv').style.display='block';
                } else {
                    document.getElementById('disabilityOtherDiv').style.display='none';
                }
            }

            function disabilitySelectOther() {
                var city = document.getElementById('disabilityOther_select').value;
                if(city == 'اخري'){
                    document.getElementById('disabilityOther').innerHTML ='<input type="text" class="form-control text-right mt-1" name="disabilityOther" id="" placeholder="{{__('page.Other')}}">';
                } else {
                    document.getElementById('disabilityOther').innerHTML =' ';
                }
            }

            function chronicChange() {
                var city = document.getElementById('chronic_select').value;
                if(city == 'نعم'){
                    document.getElementById('chronicOtherDiv').style.display='block';
                } else {
                    document.getElementById('chronicOtherDiv').style.display='none';
                }
            }

            function chronicSelectOther() {
                var city = document.getElementById('chronicOther_select').value;
                if(city == 'اخري'){
                    document.getElementById('chronicOther').innerHTML ='<input type="text" class="form-control text-right mt-1" name="chronicOther" id="" placeholder="{{__('page.Other')}}">';
                } else {
                    document.getElementById('chronicOther').innerHTML =' ';
                }
            }

            function checkedHospitalChange() {
                var city = document.getElementById('checkedHospital_select').value;
                if(city == 'نعم'){
                    document.getElementById('checkedHospitalOtherDiv').style.display='block';
                } else {
                    document.getElementById('checkedHospitalOtherDiv').style.display='none';
                }
            }

            function checkedHospitalSelectOther() {
                var city = document.getElementById('checkedHospitalOther_select').value;
                if(city == 'مستشفي'){
                    document.getElementById('centerOther').style.display='none';
                    document.getElementById('HospitalOther').style.display='block';
                    document.getElementById('checkedHospitalOther').innerHTML ="";
                }
                else if(city == 'مركز صحي'){
                    document.getElementById('HospitalOther').style.display='none';
                    document.getElementById('checkedHospitalOther').innerHTML ="";
                    document.getElementById('centerOther').style.display='block';
                }
                else if(city == 'اخري'){
                    document.getElementById('HospitalOther').style.display='none';
                    document.getElementById('centerOther').style.display='none';
                    document.getElementById('checkedHospitalOther').innerHTML ='<input type="text" class="form-control text-right mt-1" name="checkedHospitalOther" id="" placeholder="{{__('page.Other')}}">';
                }
            }

            function getHospitalNames(){
                var Hospital_area_id = document.getElementById('HospitalArea_select').value;
            var Hospital_area_text = document.getElementById('HospitalArea_select').options[document.getElementById('HospitalArea_select').selectedIndex].text;
            document.getElementById('HospitalArea_select_real_input').innerHTML = '<input type="hidden" value="'+Hospital_area_text+'" name="HospitalArea_select_real">';
            $.ajax({
                    url: 'https://management.wtg-pbm.com/admin/getHospitalName',
                    method: "get",
                    data: {id:Hospital_area_id},
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        var HospitalNames = document.getElementById('HospitalNames_select');
                        HospitalNames.innerHTML = ' ';
                        data.forEach(sub_category => HospitalNames.innerHTML += "<option value=" + sub_category.name + ">" + sub_category.name + "</option>");

                    }
                });
            }
            
            function HealthHospitalNamesReals(){
            var Hospital_name_real = document.getElementById('centerNames_select').options[document.getElementById('centerNames_select').selectedIndex].text;
            document.getElementById('Hospital_name_real').innerHTML = '<input type="hidden" value="'+Hospital_name_real+'" name="Hospital_name_real">';
        }

            function getHealthCenterslNames(){
                 var center_area_id = document.getElementById('CenterArea_select').value;
            var center_area_text = document.getElementById('CenterArea_select').options[document.getElementById('CenterArea_select').selectedIndex].text;
            document.getElementById('center_area_real_input').innerHTML = '<input type="hidden" value="'+center_area_text+'" name="center_area_real">';
            $.ajax({
                    url: 'https://management.wtg-pbm.com/admin/getHealthCenterslNames',
                    method: "get",
                    data: {id:center_area_id},
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        var centerNames = document.getElementById('centerNames_select');
                        centerNames.innerHTML = ' ';
                        data.forEach(sub_category => centerNames.innerHTML += "<option value=" + sub_category.name + ">" + sub_category.name + "</option>");

                    }
                });
            }
            
            function HealthCenterslNamesReals(){
            var center_name_real = document.getElementById('centerNames_select').options[document.getElementById('centerNames_select').selectedIndex].text;
            document.getElementById('center_name_real').innerHTML = '<input type="hidden" value="'+center_name_real+'" name="center_name_real">';
        }

            function helpChange() {
                var city = document.getElementById('help_select').value;
                if(city == 'نعم'){
                    document.getElementById('helpOther').innerHTML ='<input type="text" class="form-control text-right mt-1" name="helpOther" id="" placeholder="المساعده/السبب">';
                } else {
                    document.getElementById('helpOther').innerHTML =' ';
                }
            }

            function getcenterNamesSelect(){
                var center_area_id = document.getElementById('getcenterNames').value;
                $.ajax({
                    url: 'https://management.wtg-pbm.com/admin/getcenterNamesSelect',
                    method: "get",
                    data: {id:center_area_id},
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        var centerNames = document.getElementById('centerNames');
                        centerNames.innerHTML = ' ';
                        data.forEach(sub_category => centerNames.innerHTML += "<option value=" + sub_category.id + ">" + sub_category.name + "</option>");

                    }
                });
            }

        </script>

        @if(LaravelLocalization::getCurrentLocale() == 'ar')

        </body>
            @else
    </body>

@endif
</html>
