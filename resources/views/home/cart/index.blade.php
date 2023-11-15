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
                                                    src="{{ asset('image/produk/') }}/{{ $item->produk->gambar1 }}"
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
                    <div class="tp-cart-coupon-input-box">
                        <label>Alamat Utama</label>
                        @if ($alamat != null)
                        <div class="tp-cart-coupon-input d-flex align-items-center">
                            <p>Provinsi : {{ $alamat->namaprovinsi }}, Kota/Kab : {{ $alamat->namakota }}, Alamat Lengkap : {{ $alamat->alamat }}</p>
                         </div>
                        @else
                        <div class="tp-cart-coupon-input d-flex align-items-center">
                            <p style="color: red">Alamat utama tidak ditemukan, tidak bisa memilih kurir</p>
                         </div>
                        @endif
                     </div>
                     <div class="tp-cart-coupon-input-box">
                        <label for="kurir">Pilih Kurir</label>

                        <select name="kurir" id="kurir" onchange="test(this);">
                            <option>Pilih kurir terlebih dahulu</option>
                            @if ($alamat != null)
                                @foreach ($kurir as $kr)
                                    <optgroup label="{{ $kr->description }}">
                                        @foreach ($kr->cost as $cost)
                                            <option value="{{ $cost->value }}">@currency($cost->value), Estimasi {{ $cost->etd }} hari</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            @endif
                        </select>
                     </div>


                    <div class="container-fluid">
                        <div class="row">
                            <div class="card-group">
                                @if($bundle != null)
                                @foreach ($bundle as $bu)
                                <div class="col-md-6">
                                    <div class="card p-3 mb-2">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex flex-row align-items-center">
                                                <div class="icon"> <i class="bx bxl-mailchimp"></i> </div>
                                                <div class="ms-2 c-details">
                                                    <h6 class="mb-0">{{ $bu->nama }}</h6></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-5">
                                            <img src="{{ asset('image/produk/') }}/{{ $bu->gambar1 }}" style="width: 100px">
                                            <div class="mt-5">
                                                <div class="mt-3"> <span class="text1"><del>@currency($bu->hargaasli)</del> / @currency($bu->harga)</div>
                                            </div>
                                        </div>
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
                            <span class="tp-cart-checkout-top-price" id="subtotal">@currency($subtotal)</span>
                        </div>
                        <div class="tp-cart-checkout-top d-flex align-items-center justify-content-between">
                            <span class="tp-cart-checkout-top-title">Diskon</span>
                            <span class="tp-cart-checkout-top-price" id="diskonn">@currency($diskon)</span>
                        </div>
                        <div class="tp-cart-checkout-top d-flex align-items-center justify-content-between">
                            <span class="tp-cart-checkout-top-title">Ongkir</span>
                            <span class="tp-cart-checkout-top-price" id="ongkoskirim"></span>
                        </div>
                        <div class="tp-cart-checkout-total d-flex align-items-center justify-content-between">
                            <span>Total</span>
                            <span id="totalseluruh">@currency($subtotal - $diskon)</span>
                        </div>
                        <div class="tp-cart-checkout-proceed" id="button-checkout">
                            <button class="tp-cart-checkout-btn w-100" id="checkout-button">Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cart area end -->

</main>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="idlogin" value="{{ Auth::user()->id }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    var namakurir = "";
    function test(selectBox) {
        var op = selectBox.options[selectBox.selectedIndex];
        var optgroup = op.parentNode;
        namakurir = optgroup.label;
        }
    var checkoutButton = document.getElementById('checkout-button');
    checkoutButton.addEventListener('click', function () {
        var x = document.getElementById("button-checkout");
        var kurir = $('#kurir').val();

        var subtotal = document.getElementById("subtotal").innerHTML;
        subtotal = parseFloat(subtotal.replace(",",""));

        var diskon = document.getElementById("diskonn").innerHTML;
        diskon = parseFloat(diskon.replace(",",""));

        var ongkoskirim = document.getElementById("ongkoskirim").innerHTML;
        ongkoskirim = parseFloat(ongkoskirim.replace(",",""));

        var total = document.getElementById("totalseluruh").innerHTML;
        total = parseFloat(total.replace(",",""));

        if(kurir == "Pilih kurir terlebih dahulu"){
            Swal.fire(
                    'Upps!',
                    'Harap memilih kurir terlebih dahulu',
                    'info'
                    )
        }else{
            location.replace("{{ route('home.checkout.index') }}?diskon="+diskon
            +"&kurir=" + kurir
            +"&ongkoskirim=" + ongkoskirim
            +"&total=" + total
            +"&subtotal=" + subtotal
            +"&namakurir=" + namakurir
            );
        }
    });
</script>

<script>
    $('#kurir').on('change', function(){
    const selectedPackage = $('#kurir').val();
    $('#selected').text(selectedPackage);
    var ongkoskirim = document.getElementById("ongkoskirim");
    var tkeseluruhan = document.getElementById("totalseluruh");

    var total = document.getElementById("totalseluruh").innerHTML;
    var total = parseFloat(total.replace(",",""));
    var totalseluruh = parseFloat(total) + parseFloat(selectedPackage);

    ongkoskirim.innerHTML = new Intl.NumberFormat().format(selectedPackage);
    tkeseluruhan.innerHTML = new Intl.NumberFormat().format(totalseluruh);
});
</script>
@include('home.layout.footer')
