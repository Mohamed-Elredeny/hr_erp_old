@section('sidebar')

    <!--start sidebar -->
    <aside class="sidebar-wrapper" data-simplebar="true">
        <div class="sidebar-header">
            <div>
                <img src="{{asset('assets/images/logo.png')}}" class="logo-icon" alt="logo icon">
            </div>
            <div>
                <h5 class="m-2" style="color: #003679">HR DigiLink</h5>
            </div>
            <div class="toggle-icon ms-auto">
                <ion-icon name="menu-sharp"></ion-icon>
            </div>
        </div>
        <!--navigation-->
        <ul class="metismenu" id="menu">
            <li>
                <a href="{{route('admin.dashboard')}}">
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>
            <li>
                <a href="{{route('admin.employees.index')}}">
                    <div class="menu-title">Employees</div>
                </a>
            </li>
            <li>
                <a href="{{route('admin.kpi.all')}}">
                    <div class="menu-title">All KPI</div>
                </a>
            </li>
            <li>
                <a href="{{route('admin.kpi.pending.first')}}">
                    <div class="menu-title">Pending First Approval</div>
                </a>
            </li>
            <li>
                <a href="{{route('admin.kpi.pending.final')}}">
                    <div class="menu-title">Pending Final Approval</div>
                </a>
            </li>
            <li>
                <a href="{{route('admin.kpi.approved')}}">
                    <div class="menu-title">Kpi Approved</div>
                </a>
            </li>
            <li>
                <a href="{{route('admin.leavesTypes.index')}}">
                    <div class="menu-title">Leave Types</div>
                </a>
            </li>
            <li>
                <a href="{{route('admin.userDesignations.index')}}">
                    <div class="menu-title">Job Description</div>
                </a>
            </li>
          {{--  <li>
                <a href="{{route('admin.welcome.index')}}">
                    <div class="menu-title">Welcome Note Employees</div>
                </a>
            </li>--}}
            <li>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button class="dropdown-item menu-title m-2" type="submit">
                        <div class="menu-title">Log Out</div>
                    </button>
                </form>
            </li>

        </ul>
        <!--end navigation-->
    </aside>
    <!--end sidebar -->
@endsection
