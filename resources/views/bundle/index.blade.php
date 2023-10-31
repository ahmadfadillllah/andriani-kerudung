@include('layout_dashboard.head')
@include('layout_dashboard.topbar')
@include('layout_dashboard.leftbar')

<div class="content-page">
    <div class="content">
        @include('bundle.modal.insert')
        <button type="button" class="btn btn-info waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#insertProduk" style="float: right">
            <span class="btn-label"><i class="mdi mdi-alert-circle-outline" ></i></span>Tambah
        </button>
        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                @foreach ($produk as $item)
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">{{ $item->nama }}</h4>
                                <p class="sub-header">Stok: {{ $item->stok }}</p>
                                <p class="sub-header"><del>Harga Asli: @currency($item->hargaasli)</del></p>
                                <p class="sub-header">Harga Diskon: @currency($item->harga)</p>

                                <div id="carouselExampleFade{{$item->id}}" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                    @if ($item->gambar1 != null or $item->gambar2 != null or $item->gambar3 != null or $item->gambar4 != null)
                                        <div class="carousel-inner">
                                            @if ($item->gambar1 != null)
                                                <div class="carousel-item active">
                                                    <img class="d-block img-fluid" src="{{ $item->gambar1 }}">
                                                </div>
                                            @endif
                                            @if ($item->gambar2 != null)
                                                <div class="carousel-item">
                                                    <img class="d-block img-fluid" src="{{ $item->gambar2 }}">
                                                </div>
                                            @endif
                                            @if ($item->gambar3 != null)
                                                <div class="carousel-item">
                                                    <img class="d-block img-fluid" src="{{ $item->gambar3 }}">
                                                </div>
                                            @endif
                                            @if ($item->gambar4 != null)
                                                <div class="carousel-item">
                                                    <img class="d-block img-fluid" src="{{ $item->gambar4 }}">
                                                </div>
                                            @endif

                                        </div>
                                    @endif
                                    <a class="carousel-control-prev" href="#carouselExampleFade{{$item->id}}" role="button" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleFade{{$item->id}}" role="button" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->

@include('layout_dashboard.rightbar')
@include('layout_dashboard.footer')
