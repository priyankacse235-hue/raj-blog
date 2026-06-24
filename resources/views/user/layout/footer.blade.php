<!-- Request a free Quote -->
{{-- <section class="freequote-strip">
    <div class="container">
          <div class="d-md-flex align-items-center justify-content-center px-md-4">
            <div class="freeq-txt">
              <h3>Transform Your Thoughts into Words</h3> 
            </div>
            <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
              <a target="_blank" href="{{ url('registration') }}" class="btn btn-secondary rounded-pill">Become a blogger</a>
              <span class="text-light">{{ slogan() }}</span>
            </div>
          </div>
    </div>
</section> --}}
<!-- Request a free Quote -->
{{-- <section class="freequote-strip">
    <div class="container">
          <div class="d-md-flex align-items-center justify-content-center px-md-4">
            <div class="freeq-txt">
              <h3>Where Passion Meets Expression</h3>
              <!-- <p>Success Guaranteed or your money back</p> -->
            </div>
            <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
              <a target="_blank" href="{{ url('registration') }}" class="btn btn-secondary rounded-pill">Beomme a Blogger</a>
              <span class="text-light">{{ slogan() }}</span>
            </div>
          </div>
    </div>
  </section> --}}
  <!-- End -->
{{-- <section class="freequote-strip">
    <div class="container">
          <div class="d-md-flex align-items-center justify-content-center px-md-4">
            <div class="freeq-txt">
              <h3>Get our own Blog management website with our domain name</h3>
              <!-- <p>Success Guaranteed or your money back</p> -->
            </div>
            <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
              <a target="_blank" href="{{ url('contact') }}" class="btn btn-secondary rounded-pill">Blog Managment</a>
              <span class="text-light">Request a Free Qoute</span>
            </div>
          </div>
    </div> --}}
</section>
<footer class="wow fadeInUp">
    <style>
        #bright_now {
        text-align: left;
        font-family: 'Montserrat', sans-serif;
        font-weight: 400;
        line-height: 26px;
        margin-top: 0;
        margin-bottom: 1rem;
        color: #F15A24;
        font-size: 14px;
        }
    </style>
    <div class="container">
        <h2 class="premium-head d-none d-lg-block">Services's</h2>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-4">
                <div class="footer-col mb-3 left-col pr-md-3">
                <a href="#">About </a>
                <p class="mb-3">Change is the only constant, and those who embrace it with open arms often find themselves on a path of self-discovery and personal evolution. Learn how cultivating adaptability can be a powerful tool for navigating life's twists and turns.</p> 
                <a href="{{ url('login') }}" style="position: static;" class="btn btn-login px-5">Login</a>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4">
                <h2 class="premium-head d-block d-lg-none">Premium Services</h2>
                <div class="row"> 
                <div class="col-12 col-md-12">
                    <div class="footer-col mb-3 position-relative">
                    <h4>Manifestation coaching Services</h4>
                        <ul class="list-unstyled">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="{{url('about')}}">About</a></li>
                            <li><a href="{{url('contact')}}">Contact</a></li>
                            <li><a href="{{url('blog')}}">Blog</a></li>
                            <li><a href="{{url('privacy-policy')}}">Privacy Policy</a></li>
                            <li><a href="{{url('terms-and-conditions')}}">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>
                </div>
            </div> 
            <div class="col-12 col-md-12 col-lg-4">
                <div class="footer-col mb-3">
                <h4>Corporate Office</h4>
                <p>Gulabi Nager Bhel Sangam Bhopal</p> 

                <h4>Contact</h4>
                <div class="d-flex align-items-center mb-1 con-txt">
                    <i class="fa fa-envelope text-light mr-2"></i> 
                    <a href="mailto:rkcreation@gmail.com">rkcreation7987@gmail.com </a>
                </div>
                {{-- <div class="d-flex align-items-center mb-3 con-txt">
                    <i class="fa fa-phone text-light mr-2"></i> <a href="tel:7987169837">7987169837</a>
                </div>
                
                <div class="d-flex align-items-center mb-1 con-txt">
                    <i class="fa fa-envelope text-light mr-2"></i>
                    <a href="mailto:team@rsquaremedia.com">rkcreation7987@gmail.com</a>
                </div> --}}
                <div class="d-flex align-items-center mb-3 con-txt">
                    <i class="fa fa-whatsapp text-light mr-2"></i> <a
                    href="https://api.whatsapp.com/send?phone=+917987169837&text=Hello%20RK%20Creation"
                    target="_blank">+91 7987169837</a>
                </div>

                <h4>Connect With Us</h4>
                <div class="soccial-icons">
                    <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a href="#" class="fa fa-facebook"></a></li>
                    <li class="list-inline-item"><a href="#" class="fa fa-instagram"></a></li>
                    <li class="list-inline-item"><a href="#" class="fa fa-twitter"></a></li>
                    <li class="list-inline-item"><a href="#" class="fa fa-linkedin"></a></li>
                    <li class="list-inline-item"><a href="#" class="fa fa-youtube"></a></li>
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </div> 

    <div class="footer-bottom text-center">
       {{ ($site_data !== null) ? $site_data->footer_text : '' }}
    </div>
</footer>