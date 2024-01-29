@extends('layouts.site')
@section('content')
    <style>
        h5{
            color: black !important;
        }
        #logoutt{
            display: none;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--our video promo section start-->
    @if($employee->company_id == 1)
        <img class="img-fluid d-block" src="{{asset("assets/images/heaser.png")}}" style="height: 120px;width: 100%; margin: auto;">
    @elseif($employee->company_id == 2)
        <img class="img-fluid d-block" src="{{asset("assets/images/tragsEngHeader.jpg")}}" style="height: 120px;width: 100%; margin: auto;">
    @elseif($employee->company_id == 3)
        <img class="img-fluid d-block" src="{{asset("assets/images/tragsHeader.png")}}" style="height: 120px;width: 100%; margin: auto;">
    @endif
    <section class="video-promo pt-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="video-promo-content text-center">

                        <div class="">
                            <div class=" row align-items-left justify-content-between">

                                <div class="col-md-12 col-lg-12 text-left">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="row container">
                                                <div class="col-12" style=" padding: 20px">
                                                    <div class="text-right">
                                                        Date: {{$certificate->date_submit}}
                                                        <br>
                                                        Ref No {{$certificate->ref}} : Employee No. {{$employee->empCode}}/CBQ/2023
                                                    </div>
                                                    <br><br>
                                                    <div class="text-right" dir="rtl">
                                                        من يهمه الامر
                                                        <br>
                                                        السلام عليكم ورحمة الله وبركاته
                                                        <br>
                                                        تحية طيبة وبعد,,,
                                                        <br>
                                                        <br>
                                                        <h5 class="text-center font-weight-bold"> <b style="font-weight: bolder"><u>افادة عمل</u></b></h5>
                                                        <br>
                                                        تفيد شركة مدجلف للانشاءات بأن
                                                        @if($employee->sex=="Male")السيد/ @else السيدة/ @endif
                                                        {{$employee->arabic_name}}

                                                        ،
                                                        {{$employee->arabic_nationality}}
                                                        الجنسية و الحامل لجواز
                                                        سفر رقم({{$employee->passportNo}}) و بطاقة شخصية رقم ({{$employee->visaNo}}) , يعمل لدينا و على كفالتنا
                                                        بمهنة &quot; {{$employee->arabic_designation}} &quot; منذ تاريخ {{$employee->joiningDate}} يزال على رأس
                                                        عمله.
                                                        <br>
                                                        أعطيت له هذه الأفادة بطلب من المعني دون أدنى مسؤولية على شركة مدجلف للانشاءات.
                                                        <br>
                                                        وتفضلوا بقبول فائق الإحترام والتقدير.
                                                    </div>
                                                    <br>
                                                    @if($certificate->state=='21')
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <img class="img-fluid d-block" src="{{asset("assets/images/Picture1.png")}}" style="height: 120px; border-radius: 5%;">
                                                            </div>
                                                            <div class="col-6">
                                                                <img class="img-fluid d-block" src="{{asset("assets/images/Picture2.png")}}" style="height: 150px; margin: auto; border-radius: 5%;">
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <br>
                                                    شركة مدجلف للإنشاءات
                                                    <br>
                                                    ايلي القزي
                                                    <br>
                                                    <b style="font-weight: bolder">
                                                        مدير الموارد البشرية
                                                    </b>
                                                    <div class="text-right" dir="rtl" style="font-size: x-small;">
                                                        مراجع {{$certificate->review_name}}
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--hero section end-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if($employee->company_id == 1)
        <img class="img-fluid d-block" src="{{asset("assets/images/footer.jpg")}}" style="height: 120px;width: 100%; margin: auto; position: fixed;bottom: 0px">
    @elseif($employee->company_id == 2)
        <img class="img-fluid d-block" src="{{asset("assets/images/tragsEngFooter.jpg")}}" style="height: 120px;width: 100%; margin: auto; position: fixed;bottom: 0px">
    @elseif($employee->company_id == 3)
        <img class="img-fluid d-block" src="{{asset("assets/images/tragsfooter.jpg")}}" style="height: 120px;width: 100%; margin: auto; position: fixed;bottom: 0px">
    @endif

    <!--our video promo section end-->
@endsection
@section('script')
    <script>
        window.onafterprint = function() {
            window.close();
        };
    </script>
@endsection
