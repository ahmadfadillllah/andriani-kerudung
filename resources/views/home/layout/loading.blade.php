<div id="loading">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <!-- loading content here -->
            <div class="tp-preloader-content">
                <div class="tp-preloader-logo">
                    <div class="tp-preloader-circle">
                        <svg width="190" height="190" viewBox="0 0 380 380" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle stroke="#D9D9D9" cx="190" cy="190" r="180" stroke-width="6"
                                stroke-linecap="round"></circle>
                            <circle stroke="red" cx="190" cy="190" r="180" stroke-width="6" stroke-linecap="round">
                            </circle>
                        </svg>
                    </div>
                    <img src="{{ asset('shofy/html.weblearnbd.net/shofy-prv/shofy') }}/assets/img/logo/preloader/preloader-icon.svg"
                        alt="">
                </div>
                <h3 class="tp-preloader-title">{{ config('app.name') }}</h3>
                <p class="tp-preloader-subtitle">Loading</p>
            </div>
        </div>
    </div>
</div>

<div class="back-to-top-wrapper">
    <button id="back_to_top" type="button" class="back-to-top-btn">
        <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round" />
        </svg>
    </button>
</div>
