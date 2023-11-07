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

    <!-- contact area start -->
    <section class="tp-contact-area pb-100">
       <div class="container">
          <div class="tp-contact-inner">
             <div class="row">
                <div class="col-xl-9 col-lg-8">
                   <div class="tp-contact-wrapper">
                      <h3 class="tp-contact-title">Kirim Pesan</h3>

                      <div class="tp-contact-form">
                         <form action="{{ route('home.contact.post') }}" method="POST">
                            @csrf
                            <div class="tp-contact-input-wrapper">
                               <div class="tp-contact-input-box">
                                  <div class="tp-contact-input">
                                     <input name="nama" id="name" type="text" required>@if (Auth::user()) {{ Auth::user()->name }} @endif
                                  </div>
                                  <div class="tp-contact-input-title">
                                     <label for="name">Nama</label>
                                  </div>
                               </div>
                               <div class="tp-contact-input-box">
                                  <div class="tp-contact-input">
                                     <input name="email" id="email" type="email" required>@if (Auth::user()) {{ Auth::user()->email }} @endif
                                  </div>
                                  <div class="tp-contact-input-title">
                                     <label for="email">Email</label>
                                  </div>
                               </div>
                               <div class="tp-contact-input-box">
                                  <div class="tp-contact-input">
                                     <input name="subject" id="subject" type="text" required>
                                  </div>
                                  <div class="tp-contact-input-title">
                                     <label for="subject">Subject</label>
                                  </div>
                               </div>
                               <div class="tp-contact-input-box">
                                  <div class="tp-contact-input">
                                    <textarea id="message" name="message" required></textarea>
                                  </div>
                                  <div class="tp-contact-input-title">
                                     <label for="message">Isi Pesan</label>
                                  </div>
                               </div>
                            </div>
                            {{-- <div class="tp-contact-suggetions mb-20">
                               <div class="tp-contact-remeber">
                                  <input id="remeber" type="checkbox">
                                  <label for="remeber">Save my name, email, and website in this browser for the next time I comment.</label>
                               </div>
                            </div> --}}
                            <div class="tp-contact-btn">
                               <button type="submit">Send Message</button>
                            </div>
                         </form>
                         {{-- <p class="ajax-response"></p> --}}
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- contact area end -->

    <!-- map area start -->
    <section class="tp-map-area pb-120">
       <div class="container">
          <div class="row">
             <div class="col-xl-12">
                <div class="tp-map-wrapper">
                   <div class="tp-map-hotspot">
                      <span class="tp-hotspot tp-pulse-border">
                         <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="6" cy="6" r="6" fill="#821F40"/>
                         </svg>
                      </span>
                   </div>
                   <div class="tp-map-iframe">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5619.86150261135!2d119.41212350936297!3d-5.129110524301747!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbf033eb284a179%3A0xf6c7ffccdf246856!2sToko%20Andriani%20Kerudung!5e0!3m2!1sen!2sid!4v1699317352497!5m2!1sen!2sid"></iframe>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- map area end -->

 </main>
@include('home.layout.footer')
