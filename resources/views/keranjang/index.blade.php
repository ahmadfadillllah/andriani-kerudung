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
                            <h4 class="mt-0 header-title">Keranjang</h4>
                            <hr>
                            <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pembeli</th>
                                        <th>Nama Produk</th>
                                        <th>Jumlah Beli</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($keranjang as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->users->name }}</td>
                                        <td>{{ $item->produk->nama }}</td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>
                                            @if ($item->statuscheckout == null)
                                            belum checkout
                                            @else
                                            {{ $item->statuscheckout }}
                                            @endif
                                        </td>
                                        {{-- <td>
                                            <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#destroyJenisProduk{{ $item->id }}">
                                                <span class="btn-label"><i class="mdi mdi-close-circle-outline"></i></span>Hapus
                                            </button>

                                            <button type="button" class="btn btn-warning waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#editJenisProduk{{ $item->id }}">
                                                <span class="btn-label"><i class="mdi mdi-alert"></i></span>Edit
                                            </button>
                                        </td> --}}
                                    </tr>
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
