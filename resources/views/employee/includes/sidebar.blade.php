@section('sidebar')
    <style>
        .menu-title {
            font-size: smaller;
        }
        .sidebar-wrapper .sidebar-header .logo-icon {
            width: 80px;
        }
    </style>
    <!--start sidebar -->
<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{asset('assets/admin/images/logo1.jpeg')}}" class="logo-icon" alt="logo icon">
        </div>
        <div>
{{--            <h4 class="logo-text">Dashkote</h4>--}}
        </div>
        <div class="toggle-icon ms-auto"><ion-icon name="menu-sharp"></ion-icon>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{route('receiver.dashboard')}}">
                <div class="parent-icon">
                    <img src="{{asset('assets/admin/images/icons/home.png')}}" style="width: 30px">
                </div>
                <div class="menu-title">{{__('page.Dashboard')}}</div>
            </a>
        </li>

        <li>
            <a href="{{route('employee.delivered')}}">
                <div class="parent-icon">
                    <img src="{{asset('assets/admin/images/icons/100.png')}}" style="width: 30px">
                </div>
                <div class="menu-title">{{__('page.Delivered')}}</div>
            </a>
        </li>
        <li>
            <a href="{{ LaravelLocalization::getLocalizedURL('ar') }}">
                <div class="parent-icon">
                    <img src="{{asset('assets/admin/images/ar_flag.png')}}" style="width: 30px">
                </div>
                <div class="menu-title">{{__('page.Arabic')}}</div>
            </a>
        </li>

        <li>
            <a href="{{ LaravelLocalization::getLocalizedURL('en') }}">
                <div class="parent-icon">
                    <img src="{{asset('assets/admin/images/us_flag.jpg')}}" style="width: 30px">
                </div>
                <div class="menu-title">{{__('page.English')}}</div>
            </a>
        </li>

        <li>
            <a>
                <div class="parent-icon">
                    <img src="{{asset('assets/admin/images/icons/logout.png')}}" style="width: 30px">
                </div>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button class="dropdown-item p-0" type="submit">
                        <div class="menu-title">{{__('page.Log_Out')}}</div>
                    </button>
                </form>
            </a>
        </li>



    </ul>
    <!--end navigation-->
</aside>
<!--end sidebar -->
@endsection
