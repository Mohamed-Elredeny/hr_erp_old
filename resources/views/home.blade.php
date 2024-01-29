@extends('layouts.site')
@section('content')
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
                                        <h3 class="font-weight-bold">Sign in</h3>
                                        <p>Click on your company's logo to log in</p>
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
                                        <form class="form-horizontal" method="post"  action="{{route('auth.login')}}" >
                                            @csrf
                                            <div class="container">

                                                <div class="grid-wrapper row">
                                                    <label for="radio-card-1" class="radio-card col-lg-4" onclick="logvisable3()">
                                                        <input type="radio" name="company_id" value="3" id="radio-card-1" />
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

                                                    <label for="radio-card-3" class="radio-card col-lg-4" onclick="logvisable1()">
                                                        <input type="radio" name="company_id" value="1" id="radio-card-3" />
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
                                                    <label for="radio-card-2" class="radio-card col-lg-4" onclick="logvisable2()">
                                                        <input type="radio" name="company_id" value="2" id="radio-card-2" />
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
                                            <div style="width: 400px; margin: auto; display: none" id="logform" >
                                                <h5 class="mt-5 text-center">Log into HR Platform</h5>
                                                <div class="form-group">
                                                    <input type="mail" class="form-control" name="email" id="email" placeholder="Work Email" required>
                                                </div>

                                                <div class="form-group">
                                                    <input type="password" class="form-control" name="password" id="userpassword" placeholder="Password" required>
                                                </div>

                                                <div class="form-group row mt-4">
                                                    <div class="col-sm-12 text-center">
                                                        <button class="btn w-100 waves-effect waves-light" type="submit" style="background-color: #3a54a8; color: white">Login</button>
                                                    </div>
                                                </div>
                                                <div id="join">

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
                                                New to <img class="img-fluid d-inline" style="width: 70px" src="{{asset("assets/images/hr360.png")}}"> Platform? <a class="" href="{{route('register',['entity'=>$entity])}}"> Join Now</a>
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
                                                New to <img class="img-fluid d-inline" style="width: 70px" src="{{asset("assets/images/hr360.png")}}"> Platform? <a class="" href="{{route('register',['entity'=>$entity])}}"> Join Now</a>
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
                                                New to <img class="img-fluid d-inline" style="width: 70px" src="{{asset("assets/images/hr360.png")}}"> Platform? <a class="" href="{{route('register',['entity'=>$entity])}}"> Join Now</a>
                                            </p>
                                            <p class="text-left">
                                                <a class="" href="{{route('forget.password.get')}}">Forgot Password</a>
                                            </p>`;
        }
    </script>
@endsection
