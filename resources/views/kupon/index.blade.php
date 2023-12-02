@include('layout_dashboard.head')
@include('layout_dashboard.topbar')
@include('layout_dashboard.leftbar')

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-4">
                    @include('kupon.modal.insert')
                    <button type="button" class="btn btn-purple rounded-pill w-md waves-effect waves-light mb-3" data-bs-toggle="modal" data-bs-target="#insertKupon"><i class="mdi mdi-plus"></i> Tambah Kupon</button>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Daftar Kupon</h4>
                            <hr>
                            <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Diskon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($kupon as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->kode }}</td>
                                        <td>{{ $item->diskon }}</td>
                                        <td>
                                            <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#destroyKupon{{ $item->id }}">
                                                <span class="btn-label"><i class="mdi mdi-close-circle-outline"></i></span>Hapus
                                            </button>
                                           <button type="button" class="btn btn-warning waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#editKupon{{ $item->id }}">
                                            <span class="btn-label"><i class="mdi mdi-alert"></i></span>Edit
                                        </button>
                                        </td>
                                    </tr>
                                    @include('kupon.modal.edit')
                                    @include('kupon.modal.destroy')
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
