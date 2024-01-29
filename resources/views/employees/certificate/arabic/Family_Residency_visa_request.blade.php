@extends('layouts.site')
@section('content')
    <style>
        h5{
            color: black !important;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--our video promo section start-->
    <section class="video-promo pt-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="video-promo-content text-center">
                        @if($authemp->company_id == 1)
                            <img class="img-fluid d-block" src="{{asset("assets/images")}}/{{$authemp->company->image}}" style="height: 120px; margin: auto; border-radius: 5%;">
                        @elseif($authemp->company_id == 2)
                            <img class="img-fluid d-block" src="{{asset("assets/images")}}/{{$authemp->company->image}}" style="height: 80px; margin: auto; border-radius: 5%;">
                        @elseif($authemp->company_id == 3)
                            <img class="img-fluid d-block" src="{{asset("assets/images")}}/{{$authemp->company->image}}" style="height: 80px; margin: auto; border-radius: 5%;">
                        @endif
                        <div class="">
                            <div class="medsm row align-items-left justify-content-between">
                                <div class="col-md-12 col-lg-12 text-left">
                                    @if(auth('employee')->user()->emailWork == "review@medgulfconstruction.com" || auth('employee')->user()->emailWork == "elie.azzi@ensrv.com")
                                    <a href="{{route('employee.certificate.index')}}" style="font-size:28px;color:#3a54a8"><i class="fa fa-angle-double-left"></i> Back</a>
                                    @else
                                        <a href="{{route('employee.certificate.showAll')}}" style="font-size:28px;color:#3a54a8"><i class="fa fa-angle-double-left"></i> Back</a>
                                    @endif

                                    @if ($message = Session::get('error'))
                                        <div class="alert alert-danger alert-block text-left">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endif
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success alert-block text-left">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endif
                                    <h5 class="mt-5 font-weight-bold">Welcome to <img class="img-fluid d-inline" style="width: 80px; margin-top: -7px" src="{{asset("assets/images/hr360.png")}}"> Platform</h5>
                                    <p>Your One-Stop HR Solutions</p>
                                </div>

                                <div class="col-md-12 col-lg-12 text-left">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <h4 class="font-weight-bold mt-5 mb-5">Request Certificate <small style="font-size: 14px"></small></h4>
                                            @if($certificate->state == '21')
                                                <div class="text-center m-5">
                                                    <a id="printButton" href="" class="btn mart-btn" style="width: 200px !important;">Print</a>
                                                </div>
                                            @endif
                                            <h4 class="text-center" style="color: #3a54a8">{{$certificate->type}} Certificate</h4>
                                            <div class="row container">
                                                <div class="col-12" style="border: 5px solid #3a54a8; padding: 20px">
                                                    Date: {{$certificate->date_submit}}
                                                    <br>
                                                    Ref No {{$certificate->ref}} : Employee No. {{$employee->empCode}}/CBQ/2023
                                                    <br><br>
                                                    <div class="text-right" dir="rtl">
                                                        السيد مديرادارة الجوازات وشؤون الوافدين المحترم
                                                        <br>
                                                        السلام عليكم ورحمة الله وبركاته
                                                        <br>
                                                        تحية طيبة وبعد,,,
                                                        <br>
                                                        <br>
                                                        <h5 class="text-center font-weight-bold"> <b style="font-weight: bolder"><u>طلب الموطلب الموافقة على طلب تأشيرة استقدام عائلي</u></b></h5>
                                                        <br>
                                                        تفيد شركة مدجلف للإنشاءات بأن
                                                        @if($employee->sex=="Male")السيد/ @else السيدة/ @endif
                                                        {{$employee->arabic_name}}

                                                        ،
                                                        {{$employee->arabic_nationality}}
                                                        الجنسية و الحامل لجواز
                                                        سفر رقم({{$employee->passportNo}}) و بطاقة شخصية رقم ({{$employee->visaNo}}) , يعمل لدينا و على كفالتنا
                                                        بمهنة
                                                        ({{$employee->arabic_designation}}) ويتاقضى راتبا شهرياً قدره {{$employee->total_salary}} ريال

                                                        <br>
                                                        حيث لا مانع لدينا من استقدام عائلته تحت كفالته الشخصية دون ادنى مسؤولية على الشركة وهي غير
                                                        مسؤولة عن بقائها داخل البلاد.
                                                        <br>
                                                        وتفضلوا بقبول فائق الإحترام والتقدير.
                                                    </div>
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
                                                    عن شركة مدجلف للإنشاءات
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
    <!--our video promo section end-->
@endsection
@section('script')
    <script>
        function enCer(){
            document.getElementById('en_certificate').style.display='block';
            document.getElementById('select_certificate').style.display='none';
        }

        document.getElementById("printButton").addEventListener("click", function() {
            // Replace 'url_of_another_page.html' with the URL of the page you want to print
            var anotherPageUrl = "{{route('employee.certificate.print',['id'=>$certificate->id])}}";

            // Open the another page in a new window/tab
            var newWindow = window.open(anotherPageUrl, '_blank');

            // Wait for the new window/tab to load, then print it
            newWindow.print();

        });
    </script>
@endsection
