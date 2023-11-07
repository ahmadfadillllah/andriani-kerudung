@include('layout_dashboard.head')
@include('layout_dashboard.topbar')
@include('layout_dashboard.leftbar')

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">

                <div class="col-xl-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mt-0 mb-4">Keranjang</h4>

                            <div class="widget-chart-1">

                                <div class="widget-detail-1 text-end">
                                    <h2 class="fw-normal pt-2 mb-1"> {{ $keranjang }} </h2>
                                    <p class="text-muted mb-1">Hari ini</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->

                <div class="col-xl-4 col-md-6">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title mt-0 mb-3">Orderan</h4>

                            <div class="widget-box-2">
                                <div class="widget-detail-2 text-end">
                                    <h2 class="fw-normal mb-1"> {{ $order }} </h2>
                                    <p class="text-muted mb-3">Hari ini</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div><!-- end col -->

                <div class="col-xl-4 col-md-6">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title mt-0 mb-4">Pengguna</h4>

                            <div class="widget-chart-1">
                                <div class="widget-chart-box-1 float-start" dir="ltr">
                                    <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#ffbd4a"
                                        data-bgColor="#FFE6BA" value="{{ $pengguna }}" data-skin="tron" data-angleOffset="180"
                                        data-readOnly=true data-thickness=".15" />
                                </div>
                                <div class="widget-detail-1 text-end">
                                    <h2 class="fw-normal pt-2 mb-1"> {{ $pengguna }} </h2>
                                    <p class="text-muted mb-1">Bulan ini</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->

            </div>
            <!-- end row -->


        </div> <!-- container-fluid -->

    </div> <!-- content -->

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <script>
                        document.write(new Date().getFullYear())

                    </script> Copyright &copy; {{ config('app.name') }}
                    {{-- by <a href="https://adhyy.my.id"
                        target="_blank">mr_adhyy</a> --}}
                </div>
                <div class="col-md-6">
                    <div class="text-md-end footer-links d-none d-sm-block">
                        <a href="javascript:void(0);">About Us</a>
                        <a href="javascript:void(0);">Help</a>
                        <a href="javascript:void(0);">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->

</div>

@include('layout_dashboard.rightbar')
@include('layout_dashboard.footer')
