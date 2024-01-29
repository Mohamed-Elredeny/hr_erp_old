@section('header')
<!--start top header-->
<header class="top-header">
    <nav class="navbar navbar-expand gap-3 mt-3 mb-3">
        <div class="mobile-menu-button"><ion-icon name="menu-sharp"></ion-icon></div>
        <h4>
            {{auth('receiver')->user()->name}}
        </h4>

        <div class="top-navbar-right ms-auto">
            <div>
                <img src="{{asset('assets/admin/images/logo2.jpeg')}}" class="logo-icon" alt="logo icon">
            </div>
            <ul class="navbar-nav align-items-center">
                <li class="nav-item mobile-search-button">
                    <a class="nav-link" href="javascript:;">
                        <div class="">
                            <ion-icon name="search-sharp"></ion-icon>
                        </div>
                    </a>
                </li>
            </ul>

        </div>
    </nav>
</header>
<!--end top header-->
@endsection
