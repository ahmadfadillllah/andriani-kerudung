<div id="tp-bottom-menu-sticky" class="tp-mobile-menu d-lg-none">
    <div class="container">
        <div class="row row-cols-4">
            <div class="col">
                <div class="tp-mobile-item text-center">
                    <a href="{{ route('home.index') }}" class="tp-mobile-item-btn">
                        <i class="flaticon-store"></i>
                        <span>Home</span>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="tp-mobile-item text-center">
                    <button class="tp-mobile-item-btn tp-search-open-btn">
                        <i class="flaticon-search-1"></i>
                        <span>Cari</span>
                    </button>
                </div>
            </div>
            {{-- <div class="col">
                <div class="tp-mobile-item text-center">
                    <a href="wishlist.html" class="tp-mobile-item-btn">
                        <i class="flaticon-love"></i>
                        <span>Wishlist</span>
                    </a>
                </div>
            </div> --}}
            <div class="col">
                <div class="tp-mobile-item text-center">
                    <a href="{{ route('home.profile.index') }}" class="tp-mobile-item-btn">
                        <i class="flaticon-user"></i>
                        <span>Akun</span>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="tp-mobile-item text-center">
                    <button class="tp-mobile-item-btn tp-offcanvas-open-btn">
                        <i class="flaticon-menu-1"></i>
                        <span>Menu</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
