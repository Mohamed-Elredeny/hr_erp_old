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
                                    @if(auth('employee')->user()->emailWork == "review@medgulfconstruction.com")
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
                                <form action="{{route('employee.certificate.review.confirm')}}" method="POST" class=""  id="myForm"  enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$certificate->id}}" required>
                                    <div class="col-md-12 col-lg-12 text-left">
                                        <div class="row">
                                            <div class="col-md-12">

                                                <h4 class="font-weight-bold mt-5 mb-5">Request Certificate <small style="font-size: 14px"></small></h4>
                                                <h4 class="text-center" style="color: #3a54a8">{{$certificate->type}} Certificate</h4>
                                                <div class="row container">
                                                    <div class="col-12 mb-3" style="border: 5px solid #3a54a8; padding: 20px">
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
                                                            <h5 class="text-center font-weight-bold"> <b style="font-weight: bolder"><u>طلب المطلب الموافقة على طلب تأشيرة استقدام عائلي</u></b></h5>
                                                            <br>
                                                            تفيد شركة مدجلف للإنشاءات بأن
                                                            @if($employee->sex=="Male")السيد/ @else السيدة/ @endif
                                                            {{$employee->arabic_name}}

                                                            ،
                                                            {{$employee->arabic_nationality}}
                                                            الجنسية و الحامل لجواز
                                                            سفر رقم({{$employee->passportNo}}) و بطاقة شخصية رقم ({{$employee->visaNo}}) , يعمل لدينا و على كفالتنا
                                                            بمهنة
                                                            ({{$employee->arabic_designation}}) ويتاقضى راتبا شهرياً قدره
                                                            <input type="number" id="numberInput" onchange="convertToWords()" value="{{$employee->total_salary}}">
                                                            / <span id="result"></span>
                                                            ريال

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
                                                    </div>

                                                </div>
                                                <div class="text-center mb-5">
                                                    <a href="#" data-toggle="modal" data-target="#confirm1" class="btn solid-btn p-4 mt-3 font-weight-bold m-2" style="width: 300px !important;">Confirm Certificate</a>
                                                    <a href="#" data-toggle="modal" data-target="#reject1" class="btn mart-btn p-4 mt-3 font-weight-bold m-2" style="width: 300px !important;">Reject Certificate</a>
                                                </div>

                                                <div class="modal fade" id="confirm1" tabindex="-1" aria-labelledby="exampleModalLabelConfirm1" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                        <div class="modal-content ">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabelConfirm1">Confirm Certificate</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are you sure you have reviewed this certificate for confirmation?</p>
                                                                <div>
                                                                    Your Name: <input type="text" name="review_name" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    Remark: <textarea class="form-control" name="review_remark"></textarea>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <div>
                                                                        <button type="submit" class="btn mart-btn" style="width: 200px !important;">Confirm Certificate</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </form>
                                <div class="modal fade" id="reject1" tabindex="-1" aria-labelledby="exampleModalLabelReject1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content ">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabelReject1">Reject Certificate</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('employee.certificate.review.reject')}}" method="POST" class=""  id="myForm"  enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$certificate->id}}" required>
                                                <div class="modal-body">
                                                    <p>Are you sure you will reject this certificate?</p>
                                                    <div>
                                                        Your Name: <input type="text" name="review_name" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        Remark: <textarea class="form-control" name="review_remark" required></textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div>
                                                            <button type="submit" class="btn mart-btn" style="width: 200px !important; background-color: #dc3545; color: white !important;">Reject certificate</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
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

        function convertToWords() {
            var inputValue = document.getElementById('numberInput').value;

            if (isNaN(inputValue)) {
                document.getElementById('result').innerHTML = 'Please enter a valid number';
                return;
            }

            var words = convertNumberToWords(inputValue);

            document.getElementById('result').innerHTML = words;
        }

        function convertNumberToWords(number) {
            var units = ['', 'واحد', 'اثنان', 'ثلاثة', 'أربعة', 'خمسة', 'ستة', 'سبعة', 'ثمانية', 'تسعة'];
            var teens = ['عشرة', 'أحد عشر', 'اثنا عشر', 'ثلاثة عشر', 'أربعة عشر', 'خمسة عشر', 'ستة عشر', 'سبعة عشر', 'ثمانية عشر', 'تسعة عشر'];
            var tens = ['', 'عشرون', 'ثلاثون', 'أربعون', 'خمسون', 'ستون', 'سبعون', 'ثمانون', 'تسعون'];

            var words = '';

            if (number === 1000) {
                words = 'ألف';
            } else if (number < 10) {
                words = units[number];
            } else if (number < 20) {
                words = teens[number - 10];
            } else if (number < 100) {
                var unit = number % 10;
                var ten = Math.floor(number / 10);
                words = units[unit] + ' و' + tens[ten - 1];
            } else if (number < 1000) {
                var unit = number % 10;
                var ten = Math.floor((number % 100) / 10);
                var hundred = Math.floor(number / 100);
                words = units[unit] + ' و' + tens[ten - 1];

                if (unit === 0) {
                    words = units[hundred] + ' مائة و' + tens[ten - 1];
                } else {
                    words = units[hundred] + ' مائة و' + words;
                }
            } else {
                // Handle numbers from 1000 to 9999 (or extend as needed)
                words = 'ألف و' + convertNumberToWords(number % 1000);
            }

            return words;
        }

        const numberInput = document.getElementById('numberInput');
        const textOutput = document.getElementById('textOutput');

        numberInput.addEventListener('input', function() {
            const inputValue = parseInt(numberInput.value);

            if (!isNaN(inputValue)) {
                const text = numberToWords(inputValue);
                textOutput.textContent = text;
            } else {
                textOutput.textContent = '';
            }
        });
        convertToWords()

    </script>
@endsection
