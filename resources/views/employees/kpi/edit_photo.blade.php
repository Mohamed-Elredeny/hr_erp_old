
@extends('layouts.site')
@section('content')
    <style>
        h5{
            color: black !important;
        }
    </style>
    <!--our video promo section start-->
    <section class="video-promo pt-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="video-promo-content text-center">
                        @if($employee->company_id == 1)
                            <img class="img-fluid d-block" src="{{asset("assets/images")}}/{{$employee->company->image}}" style="height: 120px; margin: auto; border-radius: 5%;">
                        @elseif($employee->company_id == 2)
                            <img class="img-fluid d-block" src="{{asset("assets/images")}}/{{$employee->company->image}}" style="height: 80px; margin: auto; border-radius: 5%;">
                        @elseif($employee->company_id == 3)
                            <img class="img-fluid d-block" src="{{asset("assets/images")}}/{{$employee->company->image}}" style="height: 80px; margin: auto; border-radius: 5%;">
                        @endif
                        <div class="">
                            <div class="medsm row">
                                <div class="col-md-12 col-lg-12 text-left">
                                    <h5 class="mt-5 font-weight-bold">Welcome to <img class="img-fluid d-inline" style="width: 80px; margin-top: -7px" src="{{asset("assets/images/hr360.png")}}"> Platform</h5>
                                    <p>Your One-Stop HR Solutions</p>
                                </div>

                                @if ($message = Session::get('error'))
                                            <div class="alert alert-danger alert-block text-left">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @endif
                                        <h4 class="text-center col-md-12 col-lg-12 text-left">
                                            Edit Image
                                        </h4>
                                        <form class="form-horizontal mt-2 col-md-12 col-lg-12 text-left" method="post" enctype="multipart/form-data"  action="{{route('employee.update.photo')}}" style="border: #4472c4 solid 4px;
    padding: 24px;
    border-radius: 15px; ">
                                            @csrf
                                            <div class="form-group">
                                                <label for="image">Upload Image</label>
                                                <input type="file" class="form-control" name="image" id="image" placeholder="Upload Image" required>
                                            </div>
                                          

                                            <div class="form-group row mt-4">
                                                <div class="col-sm-12 text-center">
                                                    <button class="btn w-md waves-effect waves-light" type="submit" style="background-color: #4472c4; color: white">Save</button>
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
    </section>
    <!--our video promo section end-->
@endsection
