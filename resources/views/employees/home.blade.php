@extends('layouts.site')
@section('content')
    <style>
        h5 {
            color: black !important;
        }
    </style>
    <?php
    if ($employee->welcomeNote != null) {
        $welcomeNote = explode('|', $employee->welcomeNote);
        if (in_array('unauthorized', $welcomeNote)) {
            $x = 4;
        } else {
            $x = 3;
        }
    } else {
        $welcomeNote = [];
        $x = 4;
    }

    ?>
    <!--our video promo section start-->
    <section class="video-promo pt-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
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
                            <div class="medsm row align-items-left justify-content-between">
                                <div class="col-md-12 col-lg-12 text-left">
                                    <h5 class="mt-5 font-weight-bold">Welcome to <img class="img-fluid d-inline"
                                                                                      style="width: 80px; margin-top: -7px"
                                                                                      src="{{asset("assets/images/hr360.png")}}">
                                        Platform</h5>
                                    <p>Your One-Stop HR Solutions</p>
                                </div>

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
                                    <h5 class="mt-5 font-weight-bold">What would you like to do?</h5>
                                    <div class="row">
                                        <div class="col-md-{{$x}} mt-3">
                                            <div style="width: 85%">
                                                <img class="img-fluid d-block p-2"
                                                     src="{{asset("assets/images/kpi.jpg")}}"
                                                     style="height: 250px;width:100%; border-radius: 10%;">
                                                <a href="{{route('employee.dashboard')}}"
                                                   class="btn mart-btn d-block p-4 mt-3 font-weight-bold"
                                                   style=";width:90%;">Your KPI</a>
                                            </div>
                                        </div>
                                        <div class="col-md-{{$x}} mt-3">
                                            <div style="width: 85%">
                                                <img class="img-fluid d-block p-2"
                                                     src="{{asset("assets/images/cert.jpg")}}"
                                                     style="height: 250px;width:100%; border-radius: 10%;">
                                                <a class="btn mart-btn d-block p-3 mt-3 font-weight-bold"
                                                   data-toggle="modal" data-target="#passwordModal" style="width:90%;">Certificate
                                                    Request <br> <small style="font-size: 11px">Coming Soon</small></a>
                                            </div>
                                        </div>
                                        <!-- Password Modal -->
                                        <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Enter
                                                            Password</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="loginForm">
                                                            <div class="form-group">
                                                                <label for="passwordd">Password:</label>
                                                                <input type="passwordd" class="form-control"
                                                                       id="passwordd" name="passwordd" required>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                        <button type="button" class="btn btn-primary"
                                                                onclick="checkPassword()">Submit
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if ($employee->welcomeNote != null)

                                            @if (!in_array('unauthorized', $welcomeNote))
                                                <div class="col-md-{{$x}} mt-3">
                                                    <div style="width: 85%">
                                                        <img class="img-fluid d-block p-2"
                                                             src="{{asset("assets/site/img/welcome.png")}}"
                                                             style="height: 250px;width:100%; border-radius: 10%;">
                                                        <a href="{{route('employee.welcomeNote.list')}}"
                                                           class="btn mart-btn d-block p-4 mt-3 font-weight-bold"
                                                           style="width:90%;">Welcome Note</a>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif

                                        <div class="col-md-{{$x}} mt-3">
                                            <div style="width: 85%">
                                                <img class="img-fluid d-block p-2"
                                                     src="{{asset("assets/images/leav.png")}}"
                                                     style="height: 250px;width:100%; border-radius: 10%;">
                                                <a href="{{route('employee.leaves.index')}}" class="btn mart-btn d-block p-3 mt-3 font-weight-bold">Leave
                                                    Management</a>
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
        function checkPassword() {
            var passwordInput = document.getElementById("passwordd");
            var password = passwordInput.value;

            // Check if the password is equal to "12334"
            if (password === "123344") {
                // Redirect to another page (replace 'anotherpage.html' with your desired page)
                window.location.href = '{{route('employee.certificate.index')}}';
            } else {
                alert("Incorrect password. Please try again.");
            }
        }
    </script>
@endsection
