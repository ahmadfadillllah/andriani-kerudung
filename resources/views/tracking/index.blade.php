@include('layout_dashboard.head')
@include('layout_dashboard.topbar')
@include('layout_dashboard.leftbar')

<div class="content-page">
    <div class="content">

       <!-- Start Content-->
       <div class="container-fluid">

        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title mt-0 mb-3">Line Chart</h4>

                        <div class="chartjs-chart">
                            <canvas id="lineChart" height="300"></canvas>
                        </div>

                    </div>
                </div>

            </div><!-- end col-->

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">Bar Chart</h4>

                        <div class="chartjs-chart">
                            <canvas id="bar" height="300"></canvas>
                        </div>
                    </div>
                </div>

            </div><!-- end col-->

        </div>
        <!-- end row -->


        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">Pie Chart</h4>

                        <div class="chartjs-chart">
                            <canvas id="pie" height="300"></canvas>
                        </div>

                    </div>
                </div>

            </div><!-- end col-->

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">Donut Chart</h4>

                        <div class="chartjs-chart">
                            <canvas id="doughnut" height="300"></canvas>
                        </div>
                    </div>
                </div>

            </div><!-- end col-->

        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @include('tracking.modal.download')
                        <button type="button" class="btn btn-info waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#bs-example-modal-lg" style="float: right">
                            <span class="btn-label"><i class="mdi mdi-alert-circle-outline" ></i></span>Download
                        </button>
                        <h4 class="mt-0 header-title">Tracking Hasil Penjualan</h4>
                        <hr>
                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Stok</th>
                                    <th>Jumlah Terjual</th>
                                    <th>Stok Sisa</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($tracking as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->stok }}</td>
                                    <td>{{ $item->total_terjual }}</td>
                                    <td>{{ $item->sisa }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div> <!-- container-fluid -->

    </div> <!-- content -->

</div>

<script>
    var sudahcheckout = {!! json_encode($sudahcheckout) !!};
    var belumcheckout = {!! json_encode($belumcheckout) !!};
    var sudahco = {!! json_encode($sudahco) !!};
    var belumco = {!! json_encode($belumco) !!};
</script>

@include('layout_dashboard.rightbar')
@include('layout_dashboard.footer')
