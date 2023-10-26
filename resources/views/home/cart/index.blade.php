@include('home.layout.head')
@include('home.layout.loading')
@include('home.layout.header')
<div class="body-overlay"></div>
@include('home.layout.mobile')
@include('home.layout.search')
@if (Auth::user())
@include('home.layout.cart')
@endif
@include('home.layout.header2')
@include('home.layout.header3')

<main>
    <script type="text/javascript" src="https://app.midtrans.com/snap/snap.js" data-client-key={{ config('clientKey') }}></script>

    <!-- breadcrumb area start -->
    <section class="breadcrumb__area include-bg pt-95 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title">Keranjang</h3>
                        <div class="breadcrumb__list">
                            <span><a href="{{ route('home.index') }}">Home</a></span>
                            <span>Keranjang</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- cart area start -->
    <section class="tp-cart-area pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <form action="{{ route('home.cart.update_cart') }}" method="post">
                        @csrf
                        <div class="tp-cart-list mb-25 mr-30">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2" class="tp-cart-header-product">Produk</th>
                                        <th class="tp-cart-header-price">Harga</th>
                                        <th class="tp-cart-header-quantity">Jumlah</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $subtotal = 0;
                                    @endphp
                                    @foreach ($cart as $item)
                                    <tr>
                                        <!-- img -->
                                        <td class="tp-cart-img"><a href="javascript:void(0);"> <img
                                                    src="{{ asset('image/produk') }}/{{ $item->produk->gambar1 }}"
                                                    alt="" style="border-radius:10px"></a></td>
                                        <!-- title -->
                                        <td class="tp-cart-title"><a
                                                href="javascript:void(0);"> @if ($item->produk->bundle != null) <b>Paket Bundle |</b> @endif {{ $item->produk->nama }}</a></td>
                                        <!-- price -->
                                        <td class="tp-cart-price"><span>@currency($item->produk->harga)</span></td>
                                        <!-- quantity -->
                                        <input class="tp-cart-input" type="text" value="{{ $item->id }}"
                                                    name="id[]" hidden readonly>
                                        <td class="tp-cart-quantity">
                                            <div class="tp-product-quantity mt-10 mb-10">
                                                <span class="tp-cart-minus">
                                                    <svg width="10" height="2" viewBox="0 0 10 2" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 1H9" stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                                <input class="tp-cart-input" type="text" value="{{ $item->jumlah }}"
                                                    name="jumlah[]">
                                                <span class="tp-cart-plus">
                                                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M5 1V9" stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M1 5H9" stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </td>
                                        <!-- action -->
                                        <td class="tp-cart-action">
                                            <a href="{{ route('home.cart.delete', $item->id) }}"
                                                class="tp-cart-action-btn">
                                                <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M9.53033 1.53033C9.82322 1.23744 9.82322 0.762563 9.53033 0.46967C9.23744 0.176777 8.76256 0.176777 8.46967 0.46967L5 3.93934L1.53033 0.46967C1.23744 0.176777 0.762563 0.176777 0.46967 0.46967C0.176777 0.762563 0.176777 1.23744 0.46967 1.53033L3.93934 5L0.46967 8.46967C0.176777 8.76256 0.176777 9.23744 0.46967 9.53033C0.762563 9.82322 1.23744 9.82322 1.53033 9.53033L5 6.06066L8.46967 9.53033C8.76256 9.82322 9.23744 9.82322 9.53033 9.53033C9.82322 9.23744 9.82322 8.76256 9.53033 8.46967L6.06066 5L9.53033 1.53033Z"
                                                        fill="currentColor" />
                                                </svg>
                                                <span>Hapus</span>
                                            </a>
                                        </td>
                                    </tr>
                                    @php
                                        $subtotal += $item->produk->harga * $item->jumlah;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tp-cart-bottom">
                            <div class="row align-items-end">
                                <div class="col-xl-6 col-md-8">
                                    <div class="tp-cart-coupon">

                             </div>
                                </div>
                                <div class="col-xl-6 col-md-4">
                                    <div class="tp-cart-update text-md-end">
                                        <button type="submit" class="tp-cart-update-btn">Update Keranjang</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form action="{{ route('home.cart.index') }}" method="GET">
                       <div class="tp-cart-coupon-input-box">
                          <label>Coupon Code:</label>
                          <div class="tp-cart-coupon-input d-flex align-items-center">
                             <input type="text" placeholder="Enter Coupon Code"
                             @if ($coupon != null)
                                value="{{ $coupon->kode }}"
                             @endif name="kode">
                             <button type="submit">Apply</button>
                          </div>
                       </div>
                    </form>
                    <br>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="card-group">
                                @if($bundle != null)
                                @foreach ($bundle as $bu)
                                <div class="card w-50">
                                    <div class="card-body">
                                    <h5 class="card-title">Paket Bundling</h5>
                                    <p class="card-text" style="text-align: justify">
                                        <img src="{{ asset('image/produk') }}/{{ $bu->gambar1 }}"  alt="" width="80px" style="float: left;border-radius: 10px;margin:0 8px 4px 0;">{{ $bu->nama }}</p>
                                    <p class="card-text"><del>@currency($bu->hargaasli)</del> / @currency($bu->harga)</p>
                                    <a href="{{ route('home.cart.add_bundle', $bu->id) }}" class="btn btn-primary">Pesan</a>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @if ($coupon != null)
                    @php
                        $diskon = $coupon->diskon * $subtotal;
                    @endphp
                @else
                    @php
                        $diskon = 0 * $subtotal;
                    @endphp
                @endif
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="tp-cart-checkout-wrapper">
                        <div class="tp-cart-checkout-top d-flex align-items-center justify-content-between">
                            <span class="tp-cart-checkout-top-title">Subtotal</span>
                            <span class="tp-cart-checkout-top-price">@currency($subtotal)</span>
                        </div>
                        <div class="tp-cart-checkout-top d-flex align-items-center justify-content-between">
                            <span class="tp-cart-checkout-top-title">Diskon</span>
                            <span class="tp-cart-checkout-top-price">@currency($diskon)</span>
                        </div>
                        {{-- <div class="tp-cart-checkout-shipping">
                            <h4 class="tp-cart-checkout-shipping-title">Shipping</h4>

                            <div class="tp-cart-checkout-shipping-option-wrapper">
                                <div class="tp-cart-checkout-shipping-option">
                                    <input id="flat_rate" type="radio" name="shipping">
                                    <label for="flat_rate">Flat rate: <span>$20.00</span></label>
                                </div>
                                <div class="tp-cart-checkout-shipping-option">
                                    <input id="local_pickup" type="radio" name="shipping">
                                    <label for="local_pickup">Local pickup: <span> $25.00</span></label>
                                </div>
                                <div class="tp-cart-checkout-shipping-option">
                                    <input id="free_shipping" type="radio" name="shipping">
                                    <label for="free_shipping">Free shipping</label>
                                </div>
                            </div>
                        </div> --}}
                        <div class="tp-cart-checkout-total d-flex align-items-center justify-content-between">
                            <span>Total</span>
                            <span>@currency($subtotal - $diskon)</span>
                        </div>
                        <div class="tp-cart-checkout-proceed">
                            <button id="pay-button" class="tp-cart-checkout-btn w-100">Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cart area end -->

</main>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">

    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      // Trigger snap popup. @TODO: Replace TRANSACTIO  N_TOKEN_HERE with your transaction token
      window.snap.pay('{{ $token }}', {
        onSuccess: function(result){
          /* You may add your own implementation here */
        //   alert("payment success!"); console.log(result);
            let dataId = @json($cart);
            console.log(dataId);
            var status = "Sudah Dipesan"
            var data = { status: status,idcart :dataId };
            console.log(data);
            var dataType = "json";
            var headers = { "X-CSRF-TOKEN": $('input[name="_token"]').val()};
            $.ajax({
                type: "POST",
                url: "{{ route('home.cart.checkout') }}",
                data: data,
                headers: headers,
                success: function(data, status) {
                    var data = data;
                    Swal.fire(
                    'Sukses',
                    'Pembayaran berhasil,Silahkan Cek status Pesanan Anda anda',
                    'success'
                    )
                console.log(data);
                window.location = "/customer/homepage";
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
    });
</script>
@include('home.layout.footer')
