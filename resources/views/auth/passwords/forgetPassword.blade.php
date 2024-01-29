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
                                        <h3 class="font-weight-bold">Forgot Password</h3>
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
                                        <form class="form-horizontal" method="post"  action="{{ route('forget.password.post') }}" >
                                        @csrf


                                        <!-- /.container -->
                                            <div style="width: 400px; margin: auto">
                                                <h5 class="mt-5 text-center"></h5>
                                                <div class="form-group row">
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="emailWork" value="{{ old('email') }}" required autocomplete="email" placeholder="Work Email" autofocus>
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group row mt-4">
                                                    <div class="col-sm-12 text-center">
                                                        <button class="btn w-100 waves-effect waves-light" type="submit" style="background-color: #3a54a8; color: white">Send</button>
                                                    </div>
                                                </div>

                                                <p class="text-left">
                                                    New to <img class="img-fluid d-inline" style="width: 70px" src="{{asset("assets/images/hr360.png")}}"> Platform? <a class="" href="{{route('register',['entity'=>0])}}"> Join now</a>
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
