<div class="header-outer">
    <div class="header">
        <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fas fa-bars" aria-hidden="true"></i></a>
        <a id="toggle_btn" class="float-left" href="javascript:void(0);">
            <i class="fa-solid fa-bars"></i>
        </a>
        <ul class="nav float-left">
            <li>
                <div class="top-nav-search">
                    <a href="javascript:void(0);" class="responsive-search">
                        <i class="fa fa-search"></i>
                    </a>
                </div>
            </li>
            <li>
                <a href="#" class="mobile-logo d-md-block d-lg-none d-block"><img
                        src="{{ asset('assets/admin/img/logo1.png') }}" alt="" width="30"
                        height="30"></a>
            </li>
        </ul>
        <ul class="nav user-menu float-right">

            <li class="nav-item dropdown has-arrow">
                <a href="#" class=" nav-link user-link" data-toggle="dropdown">
                    <span class="user-img"><img class="rounded-circle" src="{{ asset('assets/admin/img/user-06.jpg') }}"
                            width="30" alt="Admin">
                        <span class="status online"></span></span>
                    <span>
                        @if (Auth::check())
                            {{ Auth::user()->name }}
                        @endif
                    </span>
                </a>
                <div class="dropdown-menu">
                    {{-- <a class="dropdown-item" href="#">My Profile</a>
    <a class="dropdown-item" href="#">Edit Profile</a>
    <a class="dropdown-item" href="inbox.html">Settings</a> --}}
                    <a class="dropdown-item" href="#">Logout</a>
                </div>
            </li>
        </ul>
        <div class="dropdown mobile-user-menu float-right">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                    class="fas fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                {{-- <a class="dropdown-item" href="#">My Profile</a>
    <a class="dropdown-item" href="#">Edit Profile</a>
    <a class="dropdown-item" href="inbox.html">Settings</a> --}}
                <a class="dropdown-item" href="#">Logout</a>
            </div>
        </div>
    </div>
</div>
