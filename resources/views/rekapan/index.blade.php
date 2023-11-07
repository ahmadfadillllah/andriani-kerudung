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
                            <h4 class="mt-0 header-title">Rekapan Penjualan Perbulan</h4>
                            <hr>
                            <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Bulan</th>
                                        <th>Tahun</th>
                                        <th>Total Pemasukan</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($rekapan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->month }}</td>
                                        <td>{{ $item->year }}</td>
                                        <td>@currency($item->total)</td>
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
