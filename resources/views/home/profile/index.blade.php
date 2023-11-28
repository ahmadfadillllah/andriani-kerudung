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

    <!-- profile area start -->
    <section class="profile__area pt-120 pb-120">
     <div class="container">
        <div class="profile__inner p-relative">
           {{-- <div class="profile__shape">
              <img class="profile__shape-1" src="assets/img/login/laptop.png" alt="" >
              <img class="profile__shape-2" src="assets/img/login/man.png" alt="" >
              <img class="profile__shape-3" src="assets/img/login/shape-1.png" alt="" >
              <img class="profile__shape-4" src="assets/img/login/shape-2.png" alt="" >
              <img class="profile__shape-5" src="assets/img/login/shape-3.png" alt="" >
              <img class="profile__shape-6" src="assets/img/login/shape-4.png" alt="" >
           </div> --}}
           <div class="row">
              <div class="col-xxl-4 col-lg-4">
                 <div class="profile__tab mr-40">
                    <nav>
                       <div class="nav nav-tabs tp-tab-menu flex-column" id="profile-tab" role="tablist">
                          <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><span><i class="fa-regular fa-user-pen"></i></span>Profile</button>
                          <button class="nav-link" id="nav-information-tab" data-bs-toggle="tab" data-bs-target="#nav-information" type="button" role="tab" aria-controls="nav-information" aria-selected="false"><span><i class="fa-regular fa-circle-info"></i></span> Informasi</button>
                          <button class="nav-link" id="nav-address-tab" data-bs-toggle="tab" data-bs-target="#nav-address" type="button" role="tab" aria-controls="nav-address" aria-selected="false"><span><i class="fa-light fa-location-dot"></i></span> Alamat </button>
                          @if (Auth::user()->role == 'pembeli')
                          <button class="nav-link" id="nav-order-tab" data-bs-toggle="tab" data-bs-target="#nav-order" type="button" role="tab" aria-controls="nav-order" aria-selected="false"><span><i class="fa-light fa-clipboard-list-check"></i></span> My Orders </button>
                          @endif
                          <button class="nav-link" id="nav-password-tab" data-bs-toggle="tab" data-bs-target="#nav-password" type="button" role="tab" aria-controls="nav-password" aria-selected="false"><span><i class="fa-regular fa-lock"></i></span> Ganti Password</button>
                          <span id="marker-vertical" class="tp-tab-line d-none d-sm-inline-block"></span>
                       </div>
                    </nav>
                 </div>
              </div>
              <div class="col-xxl-8 col-lg-8">
                 <div class="profile__tab-content">
                    <div class="tab-content" id="profile-tabContent">
                       <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                          <div class="profile__main">
                             <div class="profile__main-top pb-20">
                                <div class="row align-items-center">
                                    @include('home.notif.index')
                                   <div class="col-md-6">
                                      <div class="profile__main-inner d-flex flex-wrap align-items-center">
                                         <div class="profile__main-thumb">
                                            <img src="{{ asset('image/user') }}/{{ Auth::user()->avatar }}" alt="">
                                            <div class="profile__main-thumb-edit">
                                               <input id="profile-thumb-input" class="profile-img-popup" type="file">
                                               <label for="profile-thumb-input"><i class="fa-light fa-camera"></i></label>
                                            </div>
                                         </div>
                                         <div class="profile__main-content">
                                            <h4 class="profile__main-title">Hai, {{ Auth::user()->name }}!</h4>
                                            <p>Kamu mempunyai <span>{{ $order->count() }}</span> orderan</p>
                                         </div>
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                      <div class="profile__main-logout text-sm-end">
                                         <a href="{{ route('logout') }}" class="tp-logout-btn">Logout</a>
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                       <div class="tab-pane fade" id="nav-information" role="tabpanel" aria-labelledby="nav-information-tab">
                          <div class="profile__info">
                             <h3 class="profile__info-title">Personal Details</h3>
                             <div class="profile__info-content">

                                <form action="{{ route('home.profile.personal') }}" method="POST">
                                    @csrf
                                   <div class="row">
                                      <div class="col-xxl-6 col-md-6">
                                         <div class="profile__input-box">
                                            <div class="profile__input">
                                               <input type="text" placeholder="Enter your username" name="name" value="{{ Auth::user()->name }}">
                                               <span>
                                                  <svg width="17" height="19" viewBox="0 0 17 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                     <path d="M9 9C11.2091 9 13 7.20914 13 5C13 2.79086 11.2091 1 9 1C6.79086 1 5 2.79086 5 5C5 7.20914 6.79086 9 9 9Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                     <path d="M15.5 17.6C15.5 14.504 12.3626 12 8.5 12C4.63737 12 1.5 14.504 1.5 17.6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                  </svg>
                                               </span>
                                            </div>
                                         </div>
                                      </div>

                                      <div class="col-xxl-6 col-md-6">
                                         <div class="profile__input-box">
                                            <div class="profile__input">
                                               <input type="email" placeholder="Enter your email" name="email" value="{{ Auth::user()->email }}">
                                               <span>
                                                  <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                     <path d="M13 14.6H5C2.6 14.6 1 13.4 1 10.6V5C1 2.2 2.6 1 5 1H13C15.4 1 17 2.2 17 5V10.6C17 13.4 15.4 14.6 13 14.6Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                     <path d="M13 5.3999L10.496 7.3999C9.672 8.0559 8.32 8.0559 7.496 7.3999L5 5.3999" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                  </svg>
                                               </span>
                                            </div>
                                         </div>
                                      </div>
                                      <div class="col-xxl-6 col-md-6">
                                        <div class="profile__input-box">
                                           <div class="profile__input">
                                              <input type="text" placeholder="Enter your username" name="username" value="{{ Auth::user()->username }}">
                                              <span>
                                                 <svg width="17" height="19" viewBox="0 0 17 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9 9C11.2091 9 13 7.20914 13 5C13 2.79086 11.2091 1 9 1C6.79086 1 5 2.79086 5 5C5 7.20914 6.79086 9 9 9Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M15.5 17.6C15.5 14.504 12.3626 12 8.5 12C4.63737 12 1.5 14.504 1.5 17.6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                 </svg>
                                              </span>
                                           </div>
                                        </div>
                                     </div>
                                     <div class="col-xxl-6 col-md-6">
                                        <div class="profile__input-box">
                                           <div class="profile__input">
                                              <input type="text" placeholder="Enter your email" name="no_hp" value="{{ Auth::user()->no_hp }}">
                                              <span>
                                                 <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M13 14.6H5C2.6 14.6 1 13.4 1 10.6V5C1 2.2 2.6 1 5 1H13C15.4 1 17 2.2 17 5V10.6C17 13.4 15.4 14.6 13 14.6Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M13 5.3999L10.496 7.3999C9.672 8.0559 8.32 8.0559 7.496 7.3999L5 5.3999" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                 </svg>
                                              </span>
                                           </div>
                                        </div>
                                     </div>

                                      <div class="col-xxl-12 col-md-12">
                                         <div class="profile__input-box">
                                            <div class="profile__input">
                                                @if (Auth::user()->tipe != 'vip')
                                                <input placeholder="Akun anda bukan VIP,, silahkan Upgrade untuk mendapatkan potongan harga" readonly>
                                                @else
                                                <input placeholder="Yaay!!! akun anda VIP, Silahkan gunakan promo menarik" readonly>
                                                @endif
                                            </div>
                                         </div>
                                      </div>
                                      <div class="col-xxl-6 col-md-6">
                                         <div class="profile__btn">
                                            <button type="submit" class="tp-btn">Update Profile</button>
                                         </div>
                                      </div>
                                   </div>
                                </form>
                             </div>
                          </div>
                       </div>
                       <div class="tab-pane fade" id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab">
                          <div class="profile__password">

                             <form action="{{ route('home.profile.change_password') }}" method="POST">
                                @csrf
                                <div class="row">
                                   <div class="col-xxl-6">
                                      <div class="tp-profile-input-box">
                                         <div class="tp-contact-input">
                                            <input name="password_lama" id="old_pass" type="password">
                                         </div>
                                         <div class="tp-profile-input-title">
                                            <label for="old_pass">Password Lama</label>
                                         </div>
                                      </div>
                                   </div>
                                   <div class="col-xxl-6 col-md-6">
                                      <div class="tp-profile-input-box">
                                         <div class="tp-profile-input">
                                            <input name="password_baru" id="new_pass" type="password">
                                         </div>
                                         <div class="tp-profile-input-title">
                                            <label for="new_pass">Password Baru</label>
                                         </div>
                                      </div>
                                   </div>
                                   <div class="col-xxl-6 col-md-6">
                                      <div class="profile__btn">
                                         <button type="submit" class="tp-btn">Update</button>
                                      </div>
                                   </div>
                                </div>
                             </form>
                          </div>
                       </div>
                       <div class="tab-pane fade" id="nav-address" role="tabpanel" aria-labelledby="nav-address-tab">
                          <div class="profile__address">
                             <div class="row">
                                <div class="col-xxl-6 col-md-8">

                                 </div>
                                <div class="col-xxl-12">
                                    <div class="profile__btn" style="float: right">
                                        @include('home.profile.modal.alamat')
                                       <button type="button" class="tp-btn" data-bs-toggle="modal" data-bs-target="#tambahAlamat">Tambah Alamat</button>
                                    </div>
                                 </div>
                                @foreach ($alamat as $alm)
                                <div class="col-xxl-6 col-md-6">
                                    <div class="profile__address-item d-sm-flex align-items-start">
                                       <div class="profile__address-icon">
                                          <span>
                                             <svg enable-background="new 0 0 32 32" viewBox="0 0 32 32" ><g><path d="m31.494 23.128-.959-.844v-3.708c0-1.315-1.067-2.382-2.382-2.382-1.144 0-2.126.813-2.34 1.937l-.821-.721c-.954-.835-2.378-.835-3.332 0l-6.5 5.717c-.307.276-.332.748-.057 1.055.262.292.704.331 1.014.091v5.326c.001 1.187.963 2.149 2.15 2.15h10.119c1.187-.001 2.148-.963 2.149-2.15v-5.326c.323.257.793.204 1.05-.119.248-.311.208-.763-.091-1.026zm-4.227-4.552c-.016-.488.366-.897.854-.913s.897.366.913.854c.001.02.001.04 0 .059v2.389l-1.767-1.554zm-2.625 11.671h-2.5v-1.748c.001-.613.497-1.109 1.11-1.11h.285c.613.001 1.109.497 1.11 1.11zm4.393-.648c0 .171-.068.336-.189.457h-.004c-.122.123-.287.191-.46.191h-2.24v-1.748c-.002-1.441-1.169-2.608-2.61-2.61h-.285c-1.441.002-2.608 1.169-2.61 2.61v1.746h-2.373c-.359-.001-.649-.291-.65-.65v-6.63l5.035-4.428c.387-.339.965-.339 1.352 0l5.034 4.426z"/><path d="m21.106 22.318c0 1.226.993 2.219 2.219 2.219s2.219-.994 2.219-2.219v-.001c-.002-1.225-.994-2.217-2.219-2.218-1.226 0-2.219.993-2.219 2.219zm2.938-.001c-.002.396-.323.716-.719.717v.002c-.397 0-.719-.322-.719-.719s.322-.719.719-.719.719.322.719.719z"/><path d="m23.001 10.145c0-.414-.336-.75-.75-.75h-15.462c-.414 0-.75.336-.75.75s.336.75.75.75h15.463c.414-.001.749-.336.749-.75z"/><path d="m6.789 14.216c-.414 0-.75.336-.75.75s.336.75.75.75h10.572c.414 0 .75-.336.75-.75s-.336-.75-.75-.75z"/><path d="m12.075 19.039h-5.286c-.414 0-.75.336-.75.75s.336.75.75.75h5.286c.414 0 .75-.336.75-.75s-.336-.75-.75-.75z"/><path d="m11.556 30.247h-9.03c-.427-.001-.772-.346-.773-.773v-25.653c.001-.27.142-.52.372-.661l2.11-1.283c.268-.164.609-.148.862.039l1.404 1.037c.749.558 1.764.598 2.554.1l1.9-1.183c.26-.163.593-.156.846.018l1.629 1.111c.766.527 1.776.532 2.547.013l1.692-1.133c.255-.171.587-.175.846-.009l1.836 1.171c.783.504 1.796.476 2.55-.072l1.425-1.027c.265-.191.622-.195.891-.01l1.736 1.2c.21.144.335.382.335.637v8.089c0 .414.336.75.75.75s.75-.336.75-.75v-8.093c-.001-.748-.37-1.449-.987-1.872l-1.733-1.194c-.792-.544-1.839-.532-2.619.028l-1.425 1.025c-.256.186-.6.196-.867.025l-1.836-1.17c-.761-.485-1.736-.474-2.486.028l-1.692 1.133c-.262.177-.606.177-.868 0l-1.63-1.119c-.746-.509-1.722-.529-2.488-.05l-1.896 1.181c-.269.169-.614.155-.868-.034l-1.406-1.037c-.742-.55-1.744-.593-2.531-.11l-2.11 1.279c-.677.414-1.09 1.15-1.093 1.943v25.653c.001 1.255 1.018 2.272 2.273 2.273h9.03c.414 0 .75-.336.75-.75s-.336-.75-.75-.75z"/></g></svg>
                                          </span>
                                       </div>
                                       <div class="profile__address-content">
                                          <h3 class="profile__address-title">Detail Alamat {{ $loop->iteration }}</h3>
                                          @if ($alm->utama == true)
                                            <p><span class="badge rounded-pill text-bg-primary">Alamat Utama</span></p>
                                          @endif
                                          <p><span>Provinsi :</span>{{ $alm->namaprovinsi }}</p>
                                          <p><span>Kota/Kabupaten:</span>{{ $alm->namakota }}</p>
                                          <p><span>Alamat Lengkap:</span>{{ $alm->alamat }}</p>
                                          <p><a href="{{ route('home.profile.alamat.hapus', $alm->id) }}" class="btn btn-outline-danger btn-sm">Hapus</a></p>
                                        <p></p>
                                       </div>


                                    </div>
                                 </div>
                                @endforeach

                             </div>
                          </div>
                       </div>
                       <div class="tab-pane fade" id="nav-order" role="tabpanel" aria-labelledby="nav-order-tab">
                          <div class="profile__ticket table-responsive">
                             <table class="table">
                                <thead>
                                   <tr>
                                      <th scope="col">Order Id</th>
                                      <th scope="col">Cara Bayar</th>
                                      <th scope="col">Total</th>
                                      <th scope="col">View</th>
                                   </tr>
                                </thead>
                                <tbody>
                                   @foreach ($order as $ord)
                                   <tr>
                                    <th scope="row"> #{{ $ord->order_id }}</th>
                                    <td data-info="title">{{ $ord->cara_bayar }}</td>
                                    <td data-info="status pending">{{ $ord->total }} </td>
                                    <td><a href="{{ route('home.orders.index', $ord->order_id) }}" class="tp-logout-btn">Track</a></td>
                                 </tr>
                                   @endforeach

                                </tbody>
                             </table>
                          </div>
                       </div>
                       <div class="tab-pane fade" id="nav-notification" role="tabpanel" aria-labelledby="nav-notification-tab">
                          <div class="profile__notification">
                             <div class="profile__notification-top mb-30">
                                <h3 class="profile__notification-title">My activity settings</h3>
                                <p>Stay up to date with notification on activity that involves you including mentions, messages, replies to your bids, new items, sale and administrative updates </p>
                             </div>
                             <div class="profile__notification-wrapper">
                                <div class="profile__notification-item mb-20">
                                   <div class="form-check form-switch d-flex align-items-center">
                                      <input class="form-check-input" type="checkbox" role="switch" id="like" checked>
                                      <label class="form-check-label" for="like">Like & Follows Notifications</label>
                                   </div>
                                </div>
                                <div class="profile__notification-item mb-20">
                                   <div class="form-check form-switch d-flex align-items-center">
                                      <input class="form-check-input" type="checkbox" role="switch" id="post" checked>
                                      <label class="form-check-label" for="post">Post, Comments & Replies Notifications</label>
                                   </div>
                                </div>
                                <div class="profile__notification-item mb-20">
                                   <div class="form-check form-switch d-flex align-items-center">
                                      <input class="form-check-input" type="checkbox" role="switch" id="new" checked>
                                      <label class="form-check-label" for="new">New Product Notifications</label>
                                   </div>
                                </div>
                                <div class="profile__notification-item mb-20">
                                   <div class="form-check form-switch d-flex align-items-center">
                                      <input class="form-check-input" type="checkbox" role="switch" id="sale" checked>
                                      <label class="form-check-label" for="sale">Product on sale Notifications</label>
                                   </div>
                                </div>
                                <div class="profile__notification-item mb-20">
                                   <div class="form-check form-switch d-flex align-items-center">
                                      <input class="form-check-input" type="checkbox" role="switch" id="payment" checked>
                                      <label class="form-check-label" for="payment">Payment Notifications</label>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
 </section>
 <!-- profile area end -->

  </main>
@include('home.layout.footer')
