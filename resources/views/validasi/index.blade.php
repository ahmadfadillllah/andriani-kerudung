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
                            <h4 class="mt-0 header-title">Validasi Pembayaran</h4>
                            <hr>
                            <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Order ID</th>
                                        <th>Pembeli</th>
                                        <th>Cara Bayar</th>
                                        <th>Total</th>
                                        <th>Kurir</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($rekapan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a href="{{ route('validasi.detail', $item->order_id) }}">{{ $item->order_id }}</a></td>
                                        <td>{{ $item->users->name }}</td>
                                        <td>{{ $item->cara_bayar }}</td>
                                        <td>@currency($item->total)</td>
                                        <td>{{ $item->namakurir }}</td>

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
