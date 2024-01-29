@extends('layouts.site')
@section('content')
    <style>
        h5 {
            color: black !important;
        }
    </style>
    <?php
    use Carbon\Carbon;
    $carbonDate = Carbon::parse($welcome_note->created_at);
    ?>

    <!--our video promo section start-->
    <section class="video-promo pt-4">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-8">
                    <div class="video-promo-content text-center">
                        @if($employee->company_id == 1)
                            <img class="img-fluid d-block"
                                 src="{{asset("assets/images")}}/{{$employee->company->image}}"
                                 style="height: 120px; margin: auto; border-radius: 5%;">
                        @elseif($employee->company_id == 2)
                            <img class="img-fluid d-block"
                                 src="{{asset("assets/images")}}/{{$employee->company->image}}"
                                 style="height: 80px; margin: auto; border-radius: 5%;">
                        @elseif($employee->company_id == 3)
                            <img class="img-fluid d-block"
                                 src="{{asset("assets/images")}}/{{$employee->company->image}}"
                                 style="height: 80px; margin: auto; border-radius: 5%;">
                        @endif
                        <div class="">
                            <div class="medsm row align-items-left justify-content-between p-3">
                                <div class="col-md-12 col-lg-12 text-left">
                                    @if ($message = Session::get('error'))
                                        <div class="alert alert-danger alert-block text-left">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endif
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success alert-block text-left">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @endif

                                    <a href="{{route('employee.home')}}">Back to home Page </a>
                                    <button class="btn btn-primary" onclick="printDiv('myPrintableDiv')">Download as
                                        pdf
                                    </button>

                                </div>

                                <form
                                    action="{{route('employee.welcomeNote.changeState',['id'=>$welcome_note->id,'status'=>'accepted',0])}}"
                                    method="post" class="col-md-12 col-lg-12 text-left p-0"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row container" id="myPrintableDiv" style="font-size: 17px">
                                        <div class="col-md-12" id="">
                                            <img class="img-fluid d-block"
                                                 src="{{asset("assets/images")}}/{{$welcome_note->newemployee->company->banner_image}}"
                                                 style="height: 120px; margin: auto; width:100%">

                                        </div>
                                        <div class="col-sm-12 text-right">


                                            REF#EA-{{ mb_substr($employee->company->name, 0, 3) }}-{{ $welcome_note->id }} REV01


                                        </div>
                                        <div class="col-sm-12 text-center mt-1">
                                            <strong class="h3">Welcome Note</strong>
                                        </div>
                                        <div class="col-sm-12 text-left mt-2">
                                            <table class="table table-bordered h6">
                                                <tr>
                                                    <td style="width:20%">
                                                        Date:
                                                    </td>
                                                    <td style="width:90%">

                                                        {{$carbonDate->day . "/" . $carbonDate->month . '/' . $carbonDate->year}}

                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        To:
                                                    </td>
                                                    <td>
                                                        All {{$employee->company->name}} Employees
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        From:
                                                    </td>
                                                    <td>
                                                        Human Resources Department
                                                    </td>

                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-sm-12 text-left">
                                            <strong class="h5">Subject : <u class="h5 fw-bolder">Welcome
                                                    Note</u></strong>
                                        </div>
                                        <p class="col-sm-12 text-left mt-2 ">
                                            We are pleased to
                                            welcome {{ $welcome_note->newemployee->sex  == 'male' || 'Male' || 'MALE' ? "Mr" : "Mrs" }}
                                            . <strong class="h5">{{$welcome_note->newemployee->empName}}</strong> who
                                            joined our
                                            organization in the capacity of {{$welcome_note->newemployee->designation}}
                                            effective
                                            {{$carbonDate->day . ' ' . $carbonDate->format('F') . ' ' . $carbonDate->year}}
                                            to support our team
                                            in {{$welcome_note->newemployee->projectDepartmentName . "-". $welcome_note->newemployee->projectDepartmentNumber }}
                                        </p>
                                        <p class="col-sm-12 text-left mt-2">
                                            Please join me in extending our new joiner a warm welcome
                                            to {{$employee->company->name . ' family'}}
                                            provide him our full support and wish him all the success in his career
                                            with {{$employee->company->name}}.
                                        </p>
                                        <p class="col-sm-12 text-left mt-2">
                                        <div class="col-sm-8">
                                            <strong
                                                class="h5"> {{ $welcome_note->newemployee->sex  == 'male' || 'Male' || 'MALE' ? "Mr" : "Mrs" }}
                                                . <strong
                                                    class="h5">{{$welcome_note->newemployee->empName}}</strong>
                                            </strong> can be reached on the
                                            below
                                            <br><br>
                                            <strong class="h5"> Phone Number
                                                : </strong> {{$welcome_note->newemployee->mobile ?? 'ask your employee to set them'}}
                                            <br>
                                            <strong class="h5"> Email id
                                                : </strong> {{$welcome_note->newemployee->emailWork ?? 'ask your employee to set them'}}
                                            <br><br>
                                            <strong class="h5 mt-4"> Regards</strong><br>
                                            @if($manager == 1)
                                                @if($welcome_note->status != 'accepted')
                                                    <label for="">Send Your Signature</label>
                                                    <input type="file" id="imageInput" name="signature"
                                                           accept="image/*">
                                                    <br>
                                                @endif
                                            @endif
                                        </div>
                                        <div class="col-sm-4">
                                            <img src="{{asset("assets/images")}}/{{$welcome_note->newemployee->image}}"
                                                 alt="" style="width: 500px;height: 300px">
                                        </div>

                                        </p>


                                        <div class="col-sm-12 text-left">
                                            <div id="imageContainer" style="width: 100px;height: 100px">
                                                @if($welcome_note->signature)
                                                    <img src="{{asset("assets/images")}}/{{$welcome_note->signature}}"
                                                         alt="">

                                                @else
                                                    <img src="{{asset('assets/images/' . $employee->signature)}}"
                                                         alt="">
                                                @endif
                                            </div>
                                            <strong> Elie Azzi</strong><br>
                                            <strong class="h5"> Group HR Director</strong>
                                        </div>


                                    </div>

                                    @if($manager == 1)
                                        @if($welcome_note->status != 'accepted')
                                            <div class="row container">
                                                <div class="col-sm-12 text-center">
                                                    <button
                                                        class="btn btn-primary"
                                                        id="approveInput">
                                                        Approve
                                                    </button>
                                                    <br><br>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page content-->
    </section>
@endsection

@section('footer')
    <!--footer section start-->
    <footer class="footer-section">
        <!--footer top start-->
        <div class="footer-top background-img-2">

            <!--footer bottom copyright start-->
            <div class="footer-bottom border-gray-light py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="copyright-wrap small-text">
                                <p class="mb-0 text-white">© Mohamed Mahrous, All rights reserved</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--footer bottom copyright end-->
        </div>
        <!--footer top end-->
    </footer>
    <!--footer section end-->
    <script>
        document.getElementById('imageInput').addEventListener('change', handleImageUpload);

        function handleImageUpload() {
            var input = document.getElementById('imageInput');
            var container = document.getElementById('imageContainer');

            // Ensure that a file is selected
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    // Create an image element and set its source to the uploaded image
                    var img = document.createElement('img');
                    img.src = e.target.result;

                    // Clear previous content in the container and append the new image
                    container.innerHTML = '';
                    container.appendChild(img);
                };

                // Read the image file as a data URL
                reader.readAsDataURL(input.files[0]);
            }
        }

        function printDiv(divId) {
            // Get the div element by ID
            var printableDiv = document.getElementById(divId);
            // Check if the div exists
            if (printableDiv) {
                // Use html2pdf library to convert the div to PDF
                // document.getElementById('imageInput').style.display = 'none';
                // document.getElementById('approveInput').style.display = 'none';
                html2pdf(printableDiv, {
                    margin: 0,
                    filename: 'myPrintableDiv.pdf',
                    image: {type: 'jpeg', quality: 0.98},
                    html2canvas: {scale: 2},
                    jsPDF: {unit: 'mm', format: 'a4', orientation: 'portrait'}
                });

            } else {
                console.error('Div with ID ' + divId + ' not found.');
            }
            // document.getElementById('imageInput').style.display = 'block';
            // document.getElementById('approveInput').style.display = 'block';
        }


    </script>
@endsection

