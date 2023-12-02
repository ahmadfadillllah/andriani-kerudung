@include('layout_dashboard.head')
@include('layout_dashboard.topbar')
@include('layout_dashboard.leftbar')

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-md-4">
                                    <div class="mt-3 mt-md-0">
                                        <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#insertUsers"><i class="mdi mdi-plus-circle me-1"></i> Tambah User</button>
                                    </div>
                                </div><!-- end col-->
                                @include('users.modal.insert')
                                <div class="col-md-8">
                                    <form class="d-flex flex-wrap align-items-center justify-content-sm-end" action="{{ route('users.index') }}" method="GET">
                                        <label for="inputPassword2" class="visually-hidden">Search</label>
                                        <div>
                                            <input type="search" class="form-control my-1 my-md-0" id="inputPassword2" name="search" value="{{ old('search') }}" placeholder="Cari user">
                                        </div>
                                    </form>
                                </div>
                            </div> <!-- end row -->
                        </div>
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            @include('notification.notif')
            <!-- end row -->
            <div class="row">
                @foreach ($users as $us)
                <div class="col-xl-4">
                    <div class="card">
                        <div class="text-center card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop"  data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <button href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editUsers{{ $us->id }}">Edit</button>
                                    <!-- item-->
                                    <button href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#destroyUsers{{ $us->id }}">Hapus</button>

                                    <button href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#changePassword{{ $us->id }}">Ganti Password</button>
                                </div>
                            </div>
                            <div>
                                <img src="{{ asset('image/user') }}/{{ $us->avatar }}" class="rounded-circle avatar-xl img-thumbnail mb-2" alt="profile-image">
                                <div class="text-start">
                                    <p class="text-muted font-13"><strong>Nama :</strong> <span class="ms-2">{{ $us->name }}</span></p>

                                    <p class="text-muted font-13"><strong>Email :</strong><span class="ms-2">{{ $us->email }}</span></p>

                                    <p class="text-muted font-13"><strong>Username :</strong> <span class="ms-2">{{ $us->username }}</span></p>

                                    <p class="text-muted font-13"><strong>No. Handphone :</strong> <span class="ms-2">{{ $us->no_hp }}</span></p>

                                    <p class="text-muted font-13"><strong>Role :</strong> <span class="ms-2">{{ $us->role }}</span></p>

                                    <p class="text-muted font-13"><strong>Status :</strong> <span class="ms-2">{{ $us->statusenabled == true ? 'Aktif' : 'Non Aktif' }}</span></p>

                                    <p class="text-muted font-13"><strong>Tipe :</strong> <span class="ms-2">{{ $us->tipe == 'vip' ? 'VIP' : 'Biasa' }}</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('users.modal.edit')
                @include('users.modal.destroy')
                @include('users.modal.change-password')
                @endforeach
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->
@include('layout_dashboard.rightbar')
@include('layout_dashboard.footer')
