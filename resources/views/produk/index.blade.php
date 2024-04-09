@include('layout_dashboard.head')
@include('layout_dashboard.topbar')
@include('layout_dashboard.leftbar')

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-4">
                    @include('produk.modal.insert')
                    <button type="button" class="btn btn-purple rounded-pill w-md waves-effect waves-light mb-3" data-bs-toggle="modal" data-bs-target="#insertProduk"><i class="mdi mdi-plus"></i> Tambah Produk</button>
                </div>
                <div class="col-sm-8"></div>
                @foreach ($produk as $item)
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">{{ $item->nama }}</h4>
                                <p>Stok: {{ $item->stok }}</p>
                                <p>Warna: {{ $item->warna }}</p>
                                <p>Berat: {{ $item->berat }}</p>
                                <p>Harga: @currency($item->harga)</p>

                                <div id="carouselExampleFade{{$item->id}}" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                    @if ($item->gambar1 != null or $item->gambar2 != null or $item->gambar3 != null or $item->gambar4 != null)
                                        <div class="carousel-inner">
                                            @if ($item->gambar1 != null)
                                                <div class="carousel-item active">
                                                    <img class="d-block img-fluid" src="{{ asset('image/produk/') }}/{{ $item->gambar1 }}">
                                                </div>
                                            @endif
                                            @if ($item->gambar2 != null)
                                                <div class="carousel-item">
                                                    <img class="d-block img-fluid" src="{{ asset('image/produk/') }}/{{ $item->gambar2 }}">
                                                </div>
                                            @endif
                                            @if ($item->gambar3 != null)
                                                <div class="carousel-item">
                                                    <img class="d-block img-fluid" src="{{ asset('image/produk/') }}/{{ $item->gambar3 }}">
                                                </div>
                                            @endif
                                            @if ($item->gambar4 != null)
                                                <div class="carousel-item">
                                                    <img class="d-block img-fluid" src="{{ asset('image/produk/') }}/{{ $item->gambar4 }}">
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
                                @if (Auth::user()->id == $item->users_id or Auth::user()->role == 'owner')
                                <hr>
                                <div class="button-list">
                                    <button type="button" class="btn btn-warning waves-effect waves-light btn-xs" data-bs-toggle="modal" data-bs-target="#detailProduk{{$item->id}}">Detail</button>
                                    <button type="button" class="btn btn-secondary waves-effect waves-light btn-xs" data-bs-toggle="modal" data-bs-target="#editProduk{{$item->id}}">Edit Gambar</button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light btn-xs" data-bs-toggle="modal" data-bs-target="#hapusProduk{{$item->id}}">Hapus</button>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @include('produk.modal.edit')
                    @include('produk.modal.detail')
                    @include('produk.modal.destroy')
                @endforeach
                <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->

    <!-- Footer Start -->


@include('layout_dashboard.rightbar')
@include('layout_dashboard.footer')
