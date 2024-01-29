@extends('layouts.site')
@section('content')
<style>
    strong, b {
    font-weight: 900;
    font-family: 'Montserrat', sans-serif;
}
</style>
<div class="modal" id="confirm1" tabindex="-1" aria-labelledby="exampleModalLabelConfirm1" aria-hidden="true" style="display: block; box-shadow: inset 0 3px 6px rgba(0,0,0,0.16), 0 4px 6px rgba(0,0,0,0.45);">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content ">
            <div class="modal-header" style="display: block !important;">
                <h5 class="modal-title" id="exampleModalLabelConfirm1" style="color:#3a54a8">Rules of System Access</h5>
            </div>
            <form method="" action="document.getElementById('confirm1').style.display='none';" onsubmit="document.getElementById('confirm1').style.display='none'; document.getElementById('logform').style.display='block'; return false">
                @csrf   
                <div class="modal-body">
                    <p>
                        We are focused on maintaining the highest security standards to ensure that only authorized employees have access to our platform. To achieve this, we have established mandatory identity checks that must be completed during the login process:
                    </p>
                    <!--<u><h5>Verification Steps:</h5></u>-->
                    <!--<p>-->
                    <!--    <b style="color:red">Photo Verification:</b> Please ensure that the photo you upload is clear and visible. This step is crucial for confirming your identity.-->
                    <!--</p>-->
                    <p>
                        <b style="">Email Verification:</b> After you begin the login process, a verification email will be sent to your registered company email
address. To continue, you must confirm your email by clicking the link provided in the email.
                    </p>
                    <p>
                        <b style="">Employee Number:</b> It's crucial to enter your employee number accurately. This mandatory step is used to store your details in
our system.
                    </p>
                    <p>
                        <b style="">Credential Details:</b> Your username and password should never be shared with anyone. Doing so violates our HR policy and
may result in disciplinary action from HR.
                    </p>
                    <!--<p>-->
                    <!--    If you do not accurately complete any of the steps listed above, you will be unable to access the platform.-->
                    <!--</p>-->
                    <p>
                       <input type="checkbox" required> I confirm that I have read and understood the rules for system access. 
                    </p>
                    <!--<p>-->
                    <!--    We prioritize providing a seamless user experience for our authorized employees. <input type="checkbox" required>-->
                    <!--</p>-->
                
                    <div class="modal-footer">
                        <div>
                            <button type="submit" class="btn mart-btn" style="width: 200px !important;">Proceed</button>
                        </div>
    
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    <!--our video promo section start-->
    <section class="ptb-60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class=" mt-4 text-left">

                        <div class="">
                            <div class="medsm row align-items-left justify-content-between">
                                <div class="col-md-4 col-lg-4 text-left">
                                    <img class="img-fluid d-block" style="width: 290px" src="{{asset("assets/images/ensrv.jpg")}}">
                                    <h5 class="mt-5 font-weight-bold">Welcome to <img class="img-fluid d-inline" style="width: 80px; margin-top: -7px" src="{{asset("assets/images/hr360.png")}}"> Platform</h5>
                                    <p>Your One-Stop HR Solutions</p>
                                </div>
                                <div class="col-md-8 col-lg-8">
                                    <div class="hero-content-left ptb-100" style="border: #cccccc solid 2px; padding: 24px; border-radius: 5px;">
                                        <h3 class="font-weight-bold">Sign Up</h3>
                                        <p>Click on your company's logo to Sign Up</p>
                                        @if ($message = Session::get('error'))
                                            <div class="alert alert-danger alert-block text-left">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @endif
                                        <form class="form-horizontal" method="post"  action="{{route('register.submit')}}" enctype="multipart/form-data">
                                            @csrf

                                            <div class="container">

                                                <div class="grid-wrapper row">
                                                    <label for="radio-card-1" class="radio-card col-md-4" onclick="logvisable3()">
                                                        <input type="radio" @if($entity==3) checked @endif name="company_id" value="3" id="radio-card-1" />
                                                        <div class="card-content-wrapper">
                                                            <span class="check-icon"></span>
                                                            <div class="card-content">
                                                                <img
                                                                        src="{{asset("assets/images/trags2.png")}}"
                                                                        alt=""
                                                                />

                                                            </div>
                                                        </div>
                                                    </label>
                                                    <!-- /.radio-card -->

                                                    <label for="radio-card-3" class="radio-card col-md-4" onclick="logvisable1()">
                                                        <input type="radio" @if($entity==1) checked @endif name="company_id" value="1" id="radio-card-3" />
                                                        <div class="card-content-wrapper ">
                                                            <span class="check-icon"></span>
                                                            <div class="card-content text-center">
                                                                <img
                                                                        src="{{asset("assets/images/logo.png")}}"
                                                                        alt=""
                                                                />
                                                            </div>
                                                        </div>
                                                    </label>
                                                    <label for="radio-card-2" class="radio-card col-md-4" onclick="logvisable2()">
                                                        <input type="radio" @if($entity==2) checked @endif name="company_id" value="2" id="radio-card-2" />
                                                        <div class="card-content-wrapper">
                                                            <span class="check-icon"></span>
                                                            <div class="card-content">
                                                                <img
                                                                        src="{{asset("assets/images/trags3.png")}}"
                                                                        alt=""
                                                                />
                                                            </div>
                                                        </div>
                                                    </label>
                                                    <!-- /.radio-card -->
                                                </div>
                                                <!-- /.grid-wrapper -->
                                            </div>
                                            <!-- /.container -->
                                            <div style="width: 400px; margin: auto; display:none" id="logform">
                                                <h5 class="mt-5 text-center">Sign Up to HR Platform</h5>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="empCode" id="empCode" placeholder="Employee Number" required>
                                                </div>

                                                <div class="form-group">
                                                    <input type="email" class="form-control" name="emailWork" id="email" placeholder="Work Email" required>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="mobile_new" id="mobile_new" placeholder="Mobile No." required>
                                                </div>

                                                <div class="form-group">
                                                    <input type="password" class="form-control" name="password" id="Password" placeholder="Password" required>
                                                </div>

                                                <div class="form-group">
                                                    <input type="password" class="form-control" name="confirm_Password" id="Confirm_Password" placeholder="Confirm Password" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="image">Upload Image</label>
                                                    <input type="file" class="form-control" accept="image/*" name="image" id="image" placeholder="Upload Image" required>
                                                </div>

                                                <div class="form-group row mt-4">
                                                    <div class="col-sm-12 text-center">
                                                        <button class="btn w-100 waves-effect waves-light" type="submit" style="background-color: #3a54a8; color: white">Sign Up</button>
                                                    </div>
                                                </div>
                                                <div id="join">
                                                    <p class="text-left">
                                                        You have <img class="img-fluid d-inline" style="width: 70px" src="{{asset("assets/images/hr360.png")}}"> Platform Account? <a class="" href="{{route('login',['entity'=>$entity])}}"> Log In now</a>
                                                    </p>
                                                    <p class="text-left">
                                                        <a class="" href="{{route('forget.password.get')}}">Forgot Password</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </form>
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
        function logvisable1(){
            document.getElementById('logform').style.display='block';
            <?php
            $entity =1;
            ?>
            document.getElementById('join').innerHTML=`<p class="text-left">
                                                    You have <img class="img-fluid d-inline" style="width: 70px" src="{{asset("assets/images/hr360.png")}}"> Platform Account? <a class="" href="{{route('login',['entity'=>$entity])}}"> Log In now</a>
                                                </p>
                                                <p class="text-left">
                                                    <a class="" href="{{route('forget.password.get')}}">Forgot Password</a>
                                                </p>`;
        }
        function logvisable2(){
            document.getElementById('logform').style.display='block';
            <?php
            $entity =2;
            ?>
            document.getElementById('join').innerHTML=`<p class="text-left">
                                                    You have <img class="img-fluid d-inline" style="width: 70px" src="{{asset("assets/images/hr360.png")}}"> Platform Account? <a class="" href="{{route('login',['entity'=>$entity])}}"> Log In now</a>
                                                </p>
                                                <p class="text-left">
                                                    <a class="" href="{{route('forget.password.get')}}">Forgot Password</a>
                                                </p>`;
        }
        function logvisable3(){
            document.getElementById('logform').style.display='block';
            <?php
            $entity =3;
            ?>
            document.getElementById('join').innerHTML=`<p class="text-left">
                                                    You have <img class="img-fluid d-inline" style="width: 70px" src="{{asset("assets/images/hr360.png")}}"> Platform Account? <a class="" href="{{route('login',['entity'=>$entity])}}"> Log In now</a>
                                                </p>
                                                <p class="text-left">
                                                    <a class="" href="{{route('forget.password.get')}}">Forgot Password</a>
                                                </p>`;
        }
    </script>
@endsection