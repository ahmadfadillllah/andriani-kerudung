<!-- Topbar Start -->
<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-end mb-0">

        <li class="d-none d-lg-block">
            <form class="app-search" action="{{ route('produk.index') }}" method="GET">
                @csrf
                <div class="app-search-box">
                    <div class="input-group">
                        <input type="text" class="form-control" name="produk" placeholder="Cari produk..." id="top-search">
                        <button class="btn input-group-text" type="submit">
                            <i class="fe-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </li>

        <li class="dropdown d-inline-block d-lg-none">
            <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-bs-toggle="dropdown"
                href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="fe-search noti-icon"></i>
            </a>
            <div class="dropdown-menu dropdown-lg dropdown-menu-end p-0">
                <form class="p-3">
                    <input type="text" class="form-control" placeholder="Search ..."
                        aria-label="Recipient's username">
                </form>
            </div>
        </li>

        <li class="dropdown notification-list topbar-dropdown">
            <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#"
                role="button" aria-haspopup="false" aria-expanded="false">
                <i class="fe-bell noti-icon"></i>
                <span class="badge bg-danger rounded-circle noti-icon-badge">1</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-lg">

                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h5 class="m-0">
                        <span class="float-end">
                            <a href="#" class="text-dark">
                                <small>Clear All</small>
                            </a>
                        </span>Notification
                    </h5>
                </div>

                <div class="noti-scroll" data-simplebar>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item active">
                        <div class="notify-icon">
                            <img src="{{ asset('adminto/coderthemes.com/adminto/layouts') }}/assets/images/users/user-1.jpg" class="img-fluid rounded-circle" alt="" />
                        </div>
                        <p class="notify-details">Administrator</p>
                        <p class="text-muted mb-0 user-msg">
                            <small>Selamat Datang</small>
                        </p>
                    </a>
                </div>

                <!-- All-->
                <a href="javascript:void(0);"
                    class="dropdown-item text-center text-primary notify-item notify-all">
                    View all
                    <i class="fe-arrow-right"></i>
                </a>

            </div>
        </li>

        <li class="dropdown notification-list topbar-dropdown">
            <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown"
                href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <img src="{{ asset('image/user') }}/{{ Auth::user()->avatar }}"
                    alt="user-image" class="rounded-circle">
                <span class="pro-user-name ms-1">
                    {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome {{ Auth::user()->username }} !</h6>
                </div>

                <!-- item-->
                @if (Auth::user()->tipe == 'vip')
                <a href="contacts-profile.html" class="dropdown-item notify-item">
                    <i class="fe-user"></i>
                    <span>Akun Saya</span>
                </a>
                @endif

                <div class="dropdown-divider"></div>

                <!-- item-->
                <a href="{{ route('logout') }}" class="dropdown-item notify-item">
                    <i class="fe-log-out"></i>
                    <span>Logout</span>
                </a>

            </div>
        </li>

        <li class="dropdown notification-list">
            <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                <i class="fe-settings noti-icon"></i>
            </a>
        </li>

    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="javascript:void(0);" class="logo logo-light text-center">
            <span class="logo-sm">
                <img src="{{ asset('shofy/html.weblearnbd.net/shofy-prv/shofy') }}/assets/img/logo/logo.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('shofy/html.weblearnbd.net/shofy-prv/shofy') }}/assets/img/logo/logo.png" alt="" height="50">
            </span>
        </a>
        <a href="javascript:void(0);" class="logo logo-dark text-center">
            <span class="logo-sm">
                <img src="{{ asset('shofy/html.weblearnbd.net/shofy-prv/shofy') }}/assets/img/logo/logo.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('shofy/html.weblearnbd.net/shofy-prv/shofy') }}/assets/img/logo/logo.png" alt="" height="50">
            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
        <li>
            <button class="button-menu-mobile disable-btn waves-effect">
                <i class="fe-menu"></i>
            </button>
        </li>

        <li>
            <h4 class="page-title-main">Dashboard</h4>
        </li>
        

    </ul>

    <div class="clearfix"></div>

</div>
<!-- end Topbar -->
