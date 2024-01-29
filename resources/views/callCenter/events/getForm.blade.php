<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset("assets/admin/images/logo.png")}}">

@if(LaravelLocalization::getCurrentLocale() == 'ar')

    <!-- Bootstrap Css -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">

    @else
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    @endif
    <link href="{{asset("assets/admin/css/app.css")}}" rel="stylesheet" type="text/css"/>
<style>
    .form-group {
        margin-bottom: 10px;
    }
</style>

</head>
@if(LaravelLocalization::getCurrentLocale() == 'ar')

    <body dir="rtl" style="background-image: url({{asset("assets/images/events/$event->background")}}); background-size: 100% 100%">
    @else
        <body style="background-image: url({{asset("assets/images/events/$event->background")}}); background-size: 100% 100%">

        @endif
<!-- Loader -->
<div id="preloader"><div id="status"><div class="spinner"></div></div></div>

<!-- Begin page -->
<div class="accountbg"></div>

<div class="account-pages mt-3 pt-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <div class="card">
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block text-left">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-block text-left">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                            @if($isHasEvent == 0)
                                <div class="alert alert-danger alert-block text-left">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <strong>{{__('page.sorry')}}</strong>
                                </div>
                            @else

                                <div class="pt-2">
                                    <h4 class="font-size-18 mt-2 text-center">{{__('page.Register_now_to_get_the_prize')}}</h4>
                                    <h5 class="text-center">{{$event->name}}</h5>
                            <form class="form-horizontal mt-2" method="post"  action="{{route('callCenter.get.form.submit')}}">
                                @csrf
                                <input type="hidden" name="member_id" value="{{$member->id}}">
                                <div class="form-group">
                                    <label for="name">{{__('page.Name')}}</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{$member->name}}" placeholder="{{__('page.Name')}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">{{__('page.Phone')}}</label>
                                    <input type="text" class="form-control" name="phone" maxlength="10" minlength="10" value="{{$member->phone}}" id="phone" placeholder="{{__('page.Phone')}}" required>
                                </div>
                                <div class="form-group text-right">
                                    <label for="nationality">{{__('page.Nationality')}}</label>
                                    <input type="text" class="form-control text-right" name="nationality" id="nationality" value="{{$member->nationality}}" placeholder="{{__('page.Nationality')}}">
                                </div>
                                <div class="form-group text-right">
                                    <label for="gender">{{__('page.Gender')}}</label>
                                    <select class="form-control" name="gender" id="gender">
                                        @if($member->gender == 'ذكر')
                                        <option value="ذكر" selected>{{__('page.Male')}}</option>
                                        <option value="أنثى">{{__('page.Female')}}</option>
                                        @elseif($member->gender == 'أنثى')
                                        <option value="ذكر">{{__('page.Male')}}</option>
                                        <option value="أنثى" selected>{{__('page.Female')}}</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group text-right">
                                    <label for="country">{{__('page.City')}}</label>
                                    <input type="text" class="form-control text-right" name="country" value="{{$member->country}}" id="country" placeholder="{{__('page.City')}}">
                                </div>
                                <div class="form-group text-right">
                                    <label for="address">{{__('page.District')}}</label>
                                    <input type="text" class="form-control text-right" name="address" value="{{$member->address}}" id="address" placeholder="{{__('page.District')}}">
                                </div>
                                <div class="form-group text-right">
                                    <label for="age">{{__('page.Age')}}</label>
                                    <input type="number" class="form-control text-right" name="age" value="{{$member->age}}" id="age" placeholder="{{__('page.Age')}}">
                                </div>
                                <div class="form-group text-right">
                                    <label for="date">{{__('page.Delivered_Date')}}</label>
                                    <input type="date" class="form-control text-right" name="date" value="{{$member->date}}" id="date">
                                </div>
                                <div class="form-group text-right">
                                    <label for="time">{{__('page.Delivered_Time')}}</label>
                                    <input type="time" class="form-control text-right" name="time" value="{{$member->time}}" id="time">
                                </div>
                                <div class="form-group text-right">
                                    <label for="time">{{__('page.Note')}}</label>
                                    <textarea type="time" class="form-control text-right" placeholder="{{__('page.Note')}}" name="note">{{$member->note}}</textarea>
                                </div>

                                <input type="hidden" name="event_id" value="{{$event->id}}">


                                <div class="form-group row mt-2">
                                    <div class="col-sm-4 text-center">
                                        <button class="btn btn-success" type="submit">{{__('page.Save')}}</button>
                                    </div>

                                    <div class="col-sm-4 text-center">
                                        <a href="{{route('callCenter.get.form.cancel',['member_id'=>$member->id])}}" class="btn btn-danger">{{__('page.Cancel')}}</a>
                                    </div>

                                    <div class="col-sm-4 text-center">
                                        <a href="{{route('callCenter.get.form.later',['member_id'=>$member->id])}}" class="btn btn-primary">{{__('page.Later')}}</a>
                                    </div>
                                </div>
                            </form>

                        </div>

                        @endif

                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<!-- JAVASCRIPT -->
<script src="{{asset("assets/admin/libs/jquery/jquery.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("assets/admin/libs/metismenu/metisMenu.min.js")}}"></script>
<script src="{{asset("assets/admin/js/app.js")}}"></script>

</body>
</html>
