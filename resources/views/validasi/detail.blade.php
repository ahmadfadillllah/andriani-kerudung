@include('layout_dashboard.head')
@include('layout_dashboard.topbar')
@include('layout_dashboard.leftbar')

<div class="content-page">
    <div class="content">

      <!-- Start Content-->
      <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <div class="panel-body">
                            <div class="clearfix">
                                <div class="float-start">
                                    <h3>{{ config('app.name') }}</h3>
                                </div>
                                <div class="float-end">
                                    <h4>Invoice # <br>
                                        <strong>{{ $detail[0]->order_id }}</strong>
                                    </h4>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="float-start mt-3">
                                        <address>
                                            <strong>{{ $detail[0]->namakurir }}</strong><br>
                                            {{ $detail[0]->namaprovinsi }}, {{ $detail[0]->namakota }}<br>
                                             {{ $detail[0]->alamat }}
                                        </address>
                                    </div>
                                    <div class="float-end mt-3">
                                        <p><strong>Order Date: </strong> {{ $detail[0]->created_at }},</p>
                                        <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">{{ $detail[0]->statuspengiriman }}</span></p>
                                    </div>
                                </div><!-- end col -->
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table mt-4">
                                            <thead>
                                            <tr><th>#</th>
                                                <th>Item</th>
                                                <th>Jumlah</th>
                                                <th>Harga</th>
                                            </tr></thead>
                                            <tbody>
                                            @foreach ($detail as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->jumlah }}</td>
                                                <td>@currency($item->harga)</td>
                                            </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-6">
                                    <div class="clearfix mt-4">
                                        <h5 class="small text-dark fw-normal">PAYMENT TERMS AND POLICIES</h5>

                                        <small>
                                            All accounts are to be paid within 7 days from receipt of
                                            invoice. To be paid by cheque or credit card or direct payment
                                            online. If account is not paid within 7 days the credits details
                                            supplied as confirmation of work undertaken will be charged the
                                            agreed quoted fee noted above.
                                        </small>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-6 offset-xl-3">
                                    <p class="text-end"><b>Sub-total:</b> @currency($detail[0]->subtotal)</p>
                                    <p class="text-end">Diskon: @currency($detail[0]->diskon)</p>
                                    <p class="text-end">Ongkir: @currency($detail[0]->ongkoskirim)</p>
                                    <hr>
                                    <h3 class="text-end">@currency($detail[0]->totalkeseluruhan)</h3>
                                </div>
                            </div>
                            <hr>
                            <div class="d-print-none">
                                <div class="float-end">
                                    <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i class="fa fa-print"></i></a>
                                    <a href="{{ route('validasi.index') }}" class="btn btn-primary waves-effect waves-light">Kembali</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->

    </div> <!-- content -->

@include('layout_dashboard.rightbar')
@include('layout_dashboard.footer')
