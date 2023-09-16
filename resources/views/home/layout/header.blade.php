<div class="offcanvas__area offcanvas__radius">
    <div class="offcanvas__wrapper">
        <div class="offcanvas__close">
            <button class="offcanvas__close-btn offcanvas-close-btn">
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11 1L1 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M1 1L11 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
        </div>
        <div class="offcanvas__content">
            <div class="offcanvas__top mb-70 d-flex justify-content-between align-items-center">
                <div class="offcanvas__logo logo">
                    <a href="index.html">
                        <img src="{{ asset('shofy/html.weblearnbd.net/shofy-prv/shofy') }}/assets/img/logo/logo.png" alt="logo">
                    </a>
                </div>
            </div>
            <div class="offcanvas__category pb-40">
                <button class="tp-offcanvas-category-toggle">
                    <i class="fa-solid fa-bars"></i>
                    Kategori
                </button>
                <div class="tp-category-mobile-menu">

                </div>
            </div>
            <div class="tp-main-menu-mobile fix d-lg-none mb-40"></div>

            <div class="offcanvas__contact align-items-center d-none">
                <div class="offcanvas__contact-icon mr-20">
                    {{-- <span>
                        <img src="assets/img/icon/contact.png" alt="">
                    </span> --}}
                </div>
                <div class="offcanvas__contact-content">
                    <h3 class="offcanvas__contact-title">
                        <a href="tel:098-852-987">004524865</a>
                    </h3>
                </div>
            </div>
        </div>

    </div>
</div>
