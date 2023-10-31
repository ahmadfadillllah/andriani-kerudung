<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">

            <img src="{{ asset('image/user') }}/{{ Auth::user()->avatar }}"
                alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
            <div class="dropdown">
                <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown"
                    aria-expanded="false">{{ Auth::user()->name }}</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                   @if (Auth::user()->tipe == 'vip')
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user me-1"></i>
                        <span>Akun Saya</span>
                    </a>
                   @endif

                    <!-- item-->
                    <a href="{{ route('logout') }}" class="dropdown-item notify-item">
                        <i class="fe-log-out me-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>

            <p class="text-muted left-user-info">{{ Auth::user()->username }}</p>

            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="#" class="text-muted left-user-info">
                        <i class="mdi mdi-cog"></i>
                    </a>
                </li>

                <li class="list-inline-item">
                    <a href="#">
                        <i class="mdi mdi-power"></i>
                    </a>
                </li>
            </ul>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{ route('dashboard.index') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="badge bg-success rounded-pill float-end">1+</span>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li class="menu-title mt-2">Produk</li>

                <li>
                    <a href="{{ route('jenis_produk.index') }}">
                        <i class="mdi mdi-calendar-blank-outline"></i>
                        <span> Jenis Produk </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('produk.index') }}">
                        <i class="mdi mdi-briefcase-outline"></i>
                        <span> Produk </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('bundle.index') }}">
                        <i class="mdi mdi-briefcase-outline"></i>
                        <span> Bundle </span>
                    </a>
                </li>
                <li class="menu-title">Extra</li>
                <li>
                    <a href="#">
                        <i class="mdi mdi-briefcase-variant-outline"></i>
                        <span> Keranjang </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="mdi mdi-chart-donut-variant"></i>
                        <span> Tracking Penjualan </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="mdi mdi-texture"></i>
                        <span> Rekapan Penjualan </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('users.index') }}">
                        <i class="mdi mdi-account-multiple-plus-outline"></i>
                        <span> Users </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="mdi mdi-file-multiple-outline"></i>
                        <span> Validasi Pembayaran </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="mdi mdi-dock-window"></i>
                        <span> Konfirmasi Pesanan </span>
                    </a>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
