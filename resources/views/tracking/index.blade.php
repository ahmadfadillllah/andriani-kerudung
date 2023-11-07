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
