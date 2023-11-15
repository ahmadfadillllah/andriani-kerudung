<div class="cartmini__area tp-all-font-roboto">
    <div class="cartmini__wrapper d-flex justify-content-between flex-column">
        <div class="cartmini__top-wrapper">
            <div class="cartmini__top p-relative">
                <div class="cartmini__top-title">
                    <h4>Keranjang</h4>
                </div>
                <div class="cartmini__close">
                    <button type="button" class="cartmini__close-btn cartmini-close-btn"><i
                            class="fal fa-times"></i></button>
                </div>
            </div>
            {{-- <div class="cartmini__shipping">
                <p> Free Shipping for all orders over <span>$50</span></p>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                        data-width="70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div> --}}
            @php
                $total = 0;
            @endphp
           <div class="cartmini__widget">
            @foreach ($cart as $c)
                <div class="cartmini__widget-item">
                    <div class="cartmini__thumb">
                        <a href="javascript:void(0);">
                            <img src="{{ asset('image/produk/') }}/{{ $c->produk->gambar1 }}" alt="">
                        </a>
                    </div>
                    <div class="cartmini__content">
                        <h5 class="cartmini__title"><a href="javascript:void(0);">{{ $c->produk->nama }}</a></h5>
                        <div class="cartmini__price-wrapper">
                            <span class="cartmini__price">@currency($c->produk->harga)</span>
                            <span class="cartmini__quantity">x{{ $c->jumlah }}</span>
                        </div>
                    </div>
                    <a href="#" class="cartmini__del"><i class="fa-regular fa-xmark"></i></a>
                </div>
                @php
                    $total += $c->produk->harga *  $c->jumlah;
                @endphp
            @endforeach
        </div>
            <!-- for wp -->
            <!-- if no item in cart -->
        </div>
        <div class="cartmini__checkout">
            <div class="cartmini__checkout-title mb-30">
                <h4>Total:</h4>
                <span>@currency($total)</span>
            </div>
            <div class="cartmini__checkout-title mb-30">
                <a href="{{ route('home.cart.index') }}" class="tp-btn mb-10 w-100" style="text-align: center"> Lihat keranjang</a>
                {{-- <a href="checkout.html" class="tp-btn tp-btn-border w-100"> Bayar langsung</a> --}}
            </div>
        </div>
    </div>
</div>
