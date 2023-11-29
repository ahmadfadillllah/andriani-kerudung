@include('home.layout.head')
@include('home.layout.loading')
@include('home.layout.header')
<div class="body-overlay"></div>
@include('home.layout.mobile')
@include('home.layout.search')

@include('home.layout.header2')
@include('home.layout.header3')

<main>
    <script type="text/javascript" src="https://app.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-YCHtULs46ydSA7tV"></script>
    <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg pt-95 pb-50" data-bg-color="#EFF1F5">
       <div class="container">
          <div class="row">
             <div class="col-xxl-12">
                <div class="breadcrumb__content p-relative z-index-1">
                   <h3 class="breadcrumb__title">Checkout</h3>
                   <div class="breadcrumb__list">
                      <span><a href="#">Order ID</a></span>
                      <span>#{{ $order_id }}</span>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- checkout area start -->
    <section class="tp-checkout-area pb-120" data-bg-color="#EFF1F5">
       <div class="container">
          <div class="row">
             <div class="col-lg-7">
                <div class="tp-checkout-bill-area">
                   <h3 class="tp-checkout-bill-title">Billing Details</h3>

                   <div class="tp-checkout-bill-form">
                      <form action="#">
                         <div class="tp-checkout-bill-inner">
                            <div class="row">
                               <div class="col-md-12">
                                  <div class="tp-checkout-input">
                                     <label>Nama Lengkap<span>*</span></label>
                                     <input type="text" value="{{ Auth::user()->name }}" readonly>
                                  </div>
                               </div>
                               <div class="col-md-12">
                                  <div class="tp-checkout-input">
                                     <label>Provinsi</label>
                                     <input type="text" value="{{ $alamat->namaprovinsi }}" readonly>
                                  </div>
                               </div>
                               <div class="col-md-12">
                                  <div class="tp-checkout-input">
                                     <label>Kota/Kabupaten</label>
                                     <input type="text" value="{{ $alamat->namakota }}" readonly>
                                  </div>
                               </div>
                               <div class="col-md-12">
                                  <div class="tp-checkout-input">
                                     <label>ALamat Lengkap</label>
                                     <input type="text" value="{{ $alamat->alamat }}" readonly>
                                  </div>
                               </div>
                               <div class="col-md-12">
                                  <div class="tp-checkout-input">
                                     <label>Phone <span>*</span></label>
                                     <input type="text" value="{{ Auth::user()->no_hp }}" readonly>
                                  </div>
                               </div>
                               <div class="col-md-12">
                                  <div class="tp-checkout-input">
                                     <label>Catatan</label>
                                     <textarea name="catatan" id="catatan"></textarea>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </form>
                   </div>
                </div>
             </div>
             <div class="col-lg-5">
                <!-- checkout place order -->
                <div class="tp-checkout-place white-bg">
                   <h3 class="tp-checkout-place-title">Your Order</h3>

                   <div class="tp-order-info-list">
                      <ul>

                         <!-- header -->
                         <li class="tp-order-info-list-header">
                            <h4>Product</h4>
                            <h4>Total</h4>
                         </li>

                         <!-- item list -->
                         @foreach ($cart as $ct)
                         <li class="tp-order-info-list-desc">
                            <p>{{ $ct->produk->nama }}<span> x {{ $ct->jumlah }}</span></p>
                            <span>@currency($ct->jumlah * $ct->produk->harga)</span>
                         </li>
                         @endforeach

                         <!-- subtotal -->
                         <li class="tp-order-info-list-subtotal">
                            <span>Diskon</span>
                            <span>@currency(request()->diskon)</span>
                         </li>

                         <li class="tp-order-info-list-subtotal">
                            <span>Subtotal</span>
                            <span>@currency(request()->subtotal)</span>
                         </li>

                         <li class="tp-order-info-list-subtotal">
                            <span>Ongkir</span>
                            <span>@currency(request()->ongkoskirim)</span>
                         </li>

                         <!-- total -->
                         <li class="tp-order-info-list-total">
                            <span>Total</span>
                            <span>@currency(request()->total)</span>
                         </li>

                         <li class="tp-order-info-list-shipping">
                            <span>Cara Bayar</span>
                            <div class="tp-order-info-list-shipping-item d-flex flex-column align-items-end">
                               <span>
                                  <input id="flat_rate" type="radio" name="cara_bayar" value="COD">
                                  <label for="flat_rate">COD</label>
                               </span>
                               <span>
                                  <input id="local_pickup" type="radio" name="cara_bayar" value="Bayar Langsung">
                                  <label for="local_pickup">Bayar Langsung</label>
                               </span>
                            </div>
                         </li>
                      </ul>
                   </div>
                   <div class="tp-checkout-agree">
                      <div class="tp-checkout-option">
                         <input id="read_all" type="checkbox">
                         <label for="read_all">Saya menyetujui S&K yang berlaku</label>
                      </div>
                   </div>
                   <div class="tp-checkout-btn-wrapper">
                      <a href="#" class="tp-checkout-btn w-100" id="pay-button">Proses</a>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- checkout area end -->


 </main>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="idlogin" value="{{ Auth::user()->id }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script type="text/javascript">

    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
        var cara_bayar = $("input[name='cara_bayar']:checked").val();

        var catatan = $("textarea[name='catatan']").val();
        var sk = document.getElementById("read_all").checked;
        if(cara_bayar == undefined){
            Swal.fire(
                    'Upps!',
                    'Harap memilih cara bayar terlebih dahulu',
                    'info'
                    )
        }
        if(sk == false){
            Swal.fire(
                    'Upps!',
                    'Harap centang S&K terlebih dahulu',
                    'info'
                    )
        }
        if(cara_bayar == "COD"){
            let dataId = @json($cart);
                    var status = "checkout";
                    var data = {
                        status: status,
                        idcart :dataId,
                        catatan:catatan,
                        cara_bayar:cara_bayar,
                        order_id: @json($order_id),
                        diskon: @json($request->diskon),
                        ongkoskirim: @json($request->ongkoskirim),
                        namakurir: @json($request->namakurir),
                        total: @json($request->total),
                        subtotal: @json($request->subtotal),
                    };
                    var dataType = "json";
                    var headers = { "X-CSRF-TOKEN": $('input[name="_token"]').val()};
                    $.ajax({
                        type: "POST",
                        url: "{{ route('home.checkout.proses') }}",
                        data: data,
                        headers: headers,
                        success: function(data, status) {
                            console.log(data);

                        // window.location = "{{ route('home.index') }}";
                        },
                        dataType: dataType
                    });
                    setInterval(() => {
                        window.location = "{{ route('home.profile.index') }}";
                    }, 3000);
                    Swal.fire(
                            'Sukses',
                            'Proses berhasil,Silahkan Cek status pesanan anda',
                            'success'
                            )

        }if(cara_bayar == "Bayar Langsung"){
            window.snap.pay('{{ $token }}', {
                onSuccess: function(result){
                /* You may add your own implementation here */
                //   alert("payment success!"); console.log(result);
                    let dataId = @json($cart);
                    var status = "checkout";
                    var data = {
                        status: status,
                        idcart :dataId,
                        catatan:catatan,
                        cara_bayar:cara_bayar,
                        order_id: @json($order_id),
                        diskon: @json($request->diskon),
                        ongkoskirim: @json($request->ongkoskirim),
                        namakurir: @json($request->namakurir),
                        total: @json($request->total),
                        subtotal: @json($request->subtotal),
                        statuspembayaran: "Lunas",
                    };
                    var dataType = "json";
                    var headers = { "X-CSRF-TOKEN": $('input[name="_token"]').val()};
                    $.ajax({
                        type: "POST",
                        url: "{{ route('home.cart.checkout') }}",
                        data: data,
                        headers: headers,
                        success: function(data, status) {
                            setInterval(() => {
                            Swal.fire(
                            'Sukses',
                            'Proses berhasil,Silahkan Cek status pesanan anda',
                            'success'
                            )
                        }, 3000);
                        window.location = "{{ route('home.index') }}";
                        },
                        dataType: dataType
                    });

                },
                onPending: function(result){
                /* You may add your own implementation here */
                //   alert("wating your payment!"); console.log(result);
                Swal.fire(
                        'Upps!',
                        'Pembayaran dipending',
                        'info'
                        )
                },
                onError: function(result){
                /* You may add your own implementation here */
                //   alert("payment failed!"); console.log(result);
                Swal.fire(
                        'Gagal',
                        'Pembayaran gagal',
                        'warning'
                        )
                },
                onClose: function(){
                /* You may add your own implementation here */
                //   alert('you closed the popup without finishing the payment');
                Swal.fire(
                        'Upps!',
                        'Pembayaran ditunda',
                        'warning'
                        )
                }
            })
        }
    });
</script>


@include('home.layout.footer')
