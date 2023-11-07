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
                            <h4 class="mt-0 header-title">Konfirmasi Pesanan</h4>
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
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($rekapan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->order_id }}</td>
                                        <td>{{ $item->users->name }}</td>
                                        <td>{{ $item->cara_bayar }}</td>
                                        <td>@currency($item->total)</td>
                                        <td>{{ $item->namakurir }}</td>
                                        <td>{{ $item->statuspengiriman }}</td>

                                        <td>
                                            <a href="{{ route('konfirmasi.diterima', $item->order_id) }}" class="btn btn-success waves-effect waves-light">Pesanan Diterima
                                            </a>
                                        </td>
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
