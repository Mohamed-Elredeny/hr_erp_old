@section('header')
<!--start top header-->
<header class="top-header">
    <nav class="navbar navbar-expand gap-3 mt-3 mb-3">
        <div class="mobile-menu-button"><ion-icon name="menu-sharp"></ion-icon></div>
        <form class="searchbar" method="post" action="{{route('admin.employee.search')}}">
            @csrf
            <div class="position-absolute top-50 translate-middle-y search-icon ms-3"><ion-icon name="search-sharp"></ion-icon></div>
            <input class="form-control" name="code" type="text" placeholder="Search....">
            <div class="position-absolute top-50 translate-middle-y search-close-icon"><ion-icon name="close-sharp"></ion-icon></div>
        </form>
        <div class="top-navbar-right ms-auto">

            <ul class="navbar-nav align-items-center">
                <li class="nav-item mobile-search-button">
                    <a class="nav-link" href="javascript:;">
                        <div class="">
                            <ion-icon name="search-sharp"></ion-icon>
                        </div>
                    </a>
                </li>

                <li class="nav-item dropdown dropdown-user-setting">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                        <div class="user-setting">
                            <img src="{{asset('assets/admin/images/avatars/06.png')}}" class="user-img" alt="">
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="#">
                                <div class="d-flex flex-row align-items-center gap-2">
                                    <img src="{{asset('assets/admin/images/avatars/06.png')}}" alt="" class="rounded-circle" width="54" height="54">
                                    <div class="">
                                        <h6 class="mb-0 dropdown-user-name">Mohamed Mahrous</h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <div class="d-flex align-items-center">
                                    <div class=""><ion-icon name="settings-outline"></ion-icon></div>
                                    <div class="ms-3"><span>Change Password</span></div>
                                </div>
                            </a>
                        </li>

                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="authentication-signup-with-header-footer.html">
                                <div class="d-flex align-items-center">
                                    <div class=""><ion-icon name="log-out-outline"></ion-icon></div>
                                    <div class="ms-3"><span>Log Out</span></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>

        </div>
    </nav>
</header>
<!--end top header-->
@endsection
