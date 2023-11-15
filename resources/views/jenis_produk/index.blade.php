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
                            @include('jenis_produk.modal.insert')
                            <button type="button" class="btn btn-info waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#bs-example-modal-lg" style="float: right">
                                <span class="btn-label"><i class="mdi mdi-alert-circle-outline" ></i></span>Tambah
                            </button>
                            <h4 class="mt-0 header-title">Jenis Produk</h4>
                            <hr>
                            <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($jenis_produk as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>
                                            <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#destroyJenisProduk{{ $item->id }}">
                                                <span class="btn-label"><i class="mdi mdi-close-circle-outline"></i></span>Hapus
                                            </button>

                                           @if (Auth::user()->role =='karyawan')
                                           <button type="button" class="btn btn-warning waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#editJenisProduk{{ $item->id }}">
                                            <span class="btn-label"><i class="mdi mdi-alert"></i></span>Edit
                                        </button>
                                           @endif
                                        </td>
                                    </tr>
                                    @include('jenis_produk.modal.edit')
                                    @include('jenis_produk.modal.destroy')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div> <!-- end row -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->

@include('layout_dashboard.rightbar')
@include('layout_dashboard.footer')
