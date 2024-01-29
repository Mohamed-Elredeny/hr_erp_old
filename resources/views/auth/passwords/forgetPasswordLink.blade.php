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
                                    <h5 class="mt-5 font-weight-bold">Welcome to <img class="img-fluid d-inline" style="width: 80px" src="{{asset("assets/images/hr360.png")}}"> Platform</h5>
                                    <p>Your One-Stop HR Solutions</p>
                                </div>
                                <div class="col-md-8 col-lg-8">
                                    <div class="hero-content-left ptb-100" style="border: #cccccc solid 2px; padding: 24px; border-radius: 5px;">
                                        <h3 class="font-weight-bold">Reset Password</h3>
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
                                        <form class="form-horizontal" method="post"  action="{{ route('reset.password.post') }}" >
                                            @csrf

                                            <!-- /.container -->
                                            <div style="width: 400px; margin: auto">
                                                <h5 class="mt-5 text-center">Reset Password into HR Platform</h5>
                                                <input type="hidden" name="token" value="{{ $token }}">

                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <input type="text" id="email_address" class="form-control" placeholder="Work Email" name="emailWork" required autofocus>
                                                        @if ($errors->has('email'))
                                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <input type="password" id="password" class="form-control" placeholder="Password" name="password" required autofocus>
                                                        @if ($errors->has('password'))
                                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <input type="password" id="password-confirm" class="form-control" placeholder="Confirm Password" name="password_confirmation" required autofocus>
                                                        @if ($errors->has('password_confirmation'))
                                                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row mt-4">
                                                    <div class="col-sm-12 text-center">
                                                        <button class="btn w-100 waves-effect waves-light" type="submit" style="background-color: #3a54a8; color: white">Reset Password</button>
                                                    </div>
                                                </div>

                                                <p class="text-left">
                                                    New to <img class="img-fluid d-inline" style="width: 70px" src="{{asset("assets/images/hr360.png")}}"> Platform? <a class="" href="{{route('register',['entity'=>0])}}"> Join now</a>
                                                </p>
                                                <p class="text-left">
                                                    <a class="" href="{{route('forget.password.get')}}">Forget Password</a>
                                                </p>

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
