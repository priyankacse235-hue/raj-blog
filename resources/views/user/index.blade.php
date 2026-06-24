@extends('user.layout')
@section('content') 
@section('title', 'Home')
{{-- <div class="hero-area wow fadeInUp">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 order-lg-last text-center">
              <div class="hero-image">
                <img src="{{url('images/banner.png')}}" class="img-fluid" alt="Raj blogs" />
              </div>
            </div>
          </div>
    </div>
</div>  --}}

 

<section class="bezooka-setion bg-light">
  <div class="bloglist-section mt-4">
      <div class="container">
          <div class="row">
              @isset($blogs)
                  @foreach ($blogs as $key => $item)
                      <div class="col-md-6 col-lg-6">
                          <div class="card blog-box-sty border-0 shadow mb-4">
                              <div class="blog__img">
                                  <a href="{{ make_blog_url($item->id) }}">
                                    <img src="{{ url('storage/'.$item->image) }}" class="w-100" />
                                  </a>
                              </div>
                              <div class="card-body">
                                  <ul class="d-flex flex-wrap list-unstyled cat-name mb-0">
                                      <li class="blog__cat">{{ $item->catgeory }}</li>
                                  </ul>
                                  <h4><a href="{{ make_blog_url($item->id) }}">{!! $item->short_desc !!}</a>
                                  </h4>
                                  <div class="d-flex justify-content-between mt-3">
                                    <div class="blog-writtenby">
                                        By <strong>{{ ucfirst($item->writter) }}</strong>
                                    </div>
                                    <div class="blog-date d-flex">
                                        <div class="mr-3">
                                            <i class="fa fa-eye"></i> {{ $item->view_count ?? 0 }} Views
                                        </div>
                                        <div class="mr-3">
                                            <i class="fa fa-comments"></i> {{ $item->comments_count ?? 0 }} Comments
                                        </div>
                                        <div>
                                            <i class="icon-calendar icons"></i> {{ date('M d, Y', strtotime($item->created_at)) }}
                                        </div>
                                    </div>
                                </div>
                              </div>
                          </div>
                      </div>
                  @endforeach
              @else
                  <div class="col-md-6 col-lg-6">
                      <div class="card blog-box-sty border-0 shadow mb-4">
                          <h4>Blog Not Found</h4>
                      </div>
                  </div>
              @endisset
          </div>
      </div>
  </div>
  {{-- <div class="container">
    <div class="tabs__sections">
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade show active" id="tab1">
          <div class="tabs__content">
            @foreach ($blogs as $item)
              <a href="{{ make_blog_url($item->id) }}">
                <div class="row mt-5">
                  <div class="col-lg-3">
                    <div class="img-cats">
                      <img src="{{ url('storage/'.$item->image) }}" class="rounded w-100" alt="What is Bazooka"/>
                    </div>
                  </div>
                  <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                    <h4>{!! $item->short_desc !!}</h4>
                    <div class="d-flex justify-content-between mt-3">
                        <div class="blog-writtenby"><strong>By</strong> {{ $item->writter }}</div>
                        <div class="blog-date"><i class="icon-calendar icons"></i> {{ date('M d, Y',strtotime($item->created_at)) }}</div>
                    </div>
                  </div>
                </div>              
              </a>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div> --}}
</section>



{{-- <section class="relocation-setion">
  <span id="relocation" class="scrollsection"></span>
  <div class="colorbg-head">
    <div class="container"><h2 class="text-center">Today Blogs</h2></div>
  </div>

  <div class="container">
    <div class="tabs__sections">
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item"><a class="nav-link active" href="#reloc1" role="tab" data-toggle="tab">WHAT is Relocation?</a></li>
        <li class="nav-item"><a class="nav-link" href="#reloc2" role="tab" data-toggle="tab">AFFORDABLE</a></li>
        <li class="nav-item"><a class="nav-link" href="#reloc5" role="tab" data-toggle="tab">SERVICES</a></li>
        <li class="nav-item"><a class="nav-link" href="#faqscommon2" role="tab" data-toggle="tab">FAQS</a></li>
        <li class="nav-item"><a class="nav-link" href="#reloc6" role="tab" data-toggle="tab">COMPARISON</a></li>
        <li class="nav-item"><a class="nav-link" href="#reloc7" role="tab" data-toggle="tab">WHY THIS PRICE?</a></li>
        <li class="nav-item"><a class="nav-link" href="#reloc8" role="tab" data-toggle="tab">USE CASE</a></li>
        <li class="nav-item"><a class="nav-link" href="#reloc9" role="tab" data-toggle="tab">TERMS (T&C)</a></li>
      </ul>
      
      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade show active" id="reloc1">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('client/images/home/content/relocation')}}.jpg" class="rounded img-fluid" alt="What is Relocation"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <h4>Relocation is a Reputation Repair service that moves Bad Content (negative content) or Scandal from Google page 1 to Google page 3 and beyond, so that people do not see it, thus reducing its damage on the client’s brand, business & life.</h4>
                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade show" id="reloc2">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('client/images/home/content/affordable')}}.png" class="rounded img-fluid" alt="Pharma Product Launch"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <h4>We work with a monthly retainer, so there is no lumpsum payment like Bazooka.</h4>
                <h4>We accept payment in a variety of ways - venmo, zelle, ACH, EFT, Wire, Cash</h4>
                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade show" id="reloc5">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('client/images/home/bazooka/services')}}.png" class="rounded w-100" alt="Services"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <h4>Relocation Leverages SEO Best Practices to ensure clients benefit from an ongoing pristine online presence regardless of the presence of scandal, fake news or misinformation about them or their companies on the internet. Services include but not limited to:</h4>

                <div class="lists__style">
                  <ul>
                    <li>Creating original content and publishing across relevant social media to achieve the objective of having a pristine presence on Google and that platform.</li>
                    <li><b>Original Content:</b> Long Form - Blog content - 800- 1500 words - published on wordpress, Medium, Blogspot, Tumblr, Linkedin, etc. Become an amazon best selling author - done with you or done for you.</li>
                    <li>We'll design a custom website/App to wow your customers but also for it to be seen on Google page 1 and in doing so, pushing down the bad content off Google page 1.</li>
                    <li>We'll produce quality videos for your YouTube Shorts, TikTok, IG Stories to help position you as a Thought leader.</li>
                  </ul>
                </div>

                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade show" id="faqscommon2">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('client/images/home/content/faq')}}.png" class="rounded img-fluid" alt="FAQs"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <h4>FAQs</h4>
                    <div class="accordion mt-3" id="confaq">
                      <div class="card">
                          <div class="card-header" id="confaqhead1">
                              <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#confaq1"
                              aria-expanded="false" aria-controls="confaq1">How long will it take for my links to be removed from Google search results?</a>
                          </div>
                
                          <div id="confaq1" class="collapse" aria-labelledby="confaqhead1" data-parent="#faq">
                              <div class="card-body px-0">
                                <p>It varies and is case-by-case. That being said, we're able to get most links removed in 105 business days.</p>
                              </div>
                          </div>
                      </div>
                      <div class="card">
                          <div class="card-header" id="confaqhead2">
                              <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#confaq2"
                              aria-expanded="true" aria-controls="confaq2">What if you can't remove the links? What guarantees do you offer?</a>
                          </div>
                
                          <div id="confaq2" class="collapse" aria-labelledby="confaqhead2" data-parent="#faq">
                              <div class="card-body px-0">
                                <p>If you chose the Bazooka service, then, that comes with a 100% Money Back Guarantee – for all links not removed within our forecasted period. If you gave us 10 links to remove, which we said, we'd get removed in 120 days, and, on the 121st day two links are still not removed, then, you have the option of asking for a refund for those 2 links – which we are happy to do, since we're committed to the highest standards of integrity</p>
                              </div>
                          </div>
                      </div>
                      <div class="card">
                          <div class="card-header" id="confaqhead3">
                              <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#confaq3"
                              aria-expanded="true" aria-controls="confaq3">Tell me how you do it. I will hire you only if you tell me how you do it so I can approve your process.</a>
                          </div>
                          <div id="confaq3" class="collapse" aria-labelledby="confaqhead3" data-parent="#faq">
                              <div class="card-body px-0">
                                <p>Not Possible since we use a proprietary process. We will not share our process with anyone since it's a closely guarded trade secret.</p>
                              </div>
                          </div>
                      </div>
          
          
                      <div class="card">
                        <div class="card-header" id="confaqhead3">
                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#confaq7"
                            aria-expanded="true" aria-controls="confaq7">Who uses Online Reputation Management service?</a>
                        </div>
                        <div id="confaq7" class="collapse" aria-labelledby="confaqhead3" data-parent="#faq">
                            <div class="card-body px-0">
                              <p>Our clients range from CEOs, Politicians, Celebrities, Business Owners as well as Professionals from all over the world, as well as the attorneys (lawyers) who represent them – divorce attorneys, general counsel, criminal defense attorneys, litigation attorneys.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="confaqhead3">
                          <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#confaq8"
                          aria-expanded="true" aria-controls="confaq8">What's your fee structure? Will a celebrity pay a higher price than a professional since they are wealthier and maybe can afford to pay for high ticket items?</a>
                      </div>
                      <div id="confaq8" class="collapse" aria-labelledby="confaqhead3" data-parent="#faq">
                          <div class="card-body px-0">
                            <p>Our fee is guided by Level of Complexity, not by who the client is. The celebrity and Joe Schmoe from next door pay the exact same fee if they have the exact same problem.</p>
                          </div>
                      </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="confaqhead3">
                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#confaq10"
                        aria-expanded="true" aria-controls="confaq10">How much does link deletion from Google cost?</a>
                    </div>
                    <div id="confaq10" class="collapse" aria-labelledby="confaqhead3" data-parent="#faq">
                        <div class="card-body px-0">
                          <p>Cost is determined by level of complexity which is driven by 3 variables:</p>
                          <p>Recency: How recent was the story that needs to be removed from Google? More recent = harder = more effort = higher fee</p>
                          <p>Quantity: how many links need to be deleted? This is math. Price = Fee x number of links</p>
                          <p>Source: Where is the story coming from? FBI.gov? SEC.gov? New York Times? Or Joe Schmo's Blog? Government, News Media websites = harder = more effort = higher fee</p>
                          <p>Cost starts at $3000 per link</p>
                        </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="confaqhead3">
                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#confaq11"
                        aria-expanded="true" aria-controls="confaq11">$3000??!! Too expensive! I found someone who says he can do it for a lot less!</a>
                    </div>
                    <div id="confaq11" class="collapse" aria-labelledby="confaqhead3" data-parent="#faq">
                        <div class="card-body px-0">
                          <p>We hear this all the time. Clients who have fallen prey to offers like that tell us later that they got scammed and wished they had used our service in the very beginning. Our price is non-negotiable. We will never hardsell our service to you or anyone. It is what it is. If you think having a good reputation is a good idea, then, we are here to help you. If not, that's fine. We wish you well.</p>
                        </div>
                    </div>
                  </div>
      
                  <div class="card">
                    <div class="card-header" id="confaqhead3">
                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#confaq12"
                        aria-expanded="true" aria-controls="confaq12">What are your payment terms?</a>
                    </div>
                    <div id="confaq12" class="collapse" aria-labelledby="confaqhead3" data-parent="#faq">
                        <div class="card-body px-0">
                          <p>Work begins only after payment is received and funds verified by holding them for 2 weeks to prevent against wire fraud.</p>
                        </div>
                    </div>
                  </div>
      
                  <div class="card">
                    <div class="card-header" id="confaqhead3">
                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#confaq13"
                        aria-expanded="true" aria-controls="confaq13">My competitor is attacking my business with fake 1 star reviews on Google. Help!</a>
                    </div>
                    <div id="confaq13" class="collapse" aria-labelledby="confaqhead3" data-parent="#faq">
                        <div class="card-body px-0">
                          <p>Not to worry. We can get those removed.</p>
                        </div>
                    </div>
                  </div>
      
                  <div class="card">
                    <div class="card-header" id="confaqhead3">
                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#confaq13"
                        aria-expanded="true" aria-controls="confaq13">Is there any category you will not touch?</a>
                    </div>
                    <div id="confaq13" class="collapse" aria-labelledby="confaqhead3" data-parent="#faq">
                        <div class="card-body px-0">
                            <p>Yes! Only 1. Any category that is linked to endangering the welfare of minors.</p>
                        </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="confaqhead3">
                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#confaq14"
                        aria-expanded="true" aria-controls="confaq14">Thanks for removing the bad press. What else can I do to prevent this from happening in the future?</a>
                    </div>
                    <div id="confaq14" class="collapse" aria-labelledby="confaqhead3" data-parent="#faq">
                        <div class="card-body px-0">
                            <p>We have a service called Forcefield - which floods google page 1 and 2 with favorable content, so that, if there is fake news or bad press in the future, it will land on Google page 3 or 4 and not Google page 1.</p>
                        </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="confaqhead3">
                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#confaq15"
                        aria-expanded="true" aria-controls="confaq15">That's great but I don't want any fake news or bad press to show up on Google page 3 or 4 either.</a>
                    </div>
                    <div id="confaq15" class="collapse" aria-labelledby="confaqhead3" data-parent="#faq">
                        <div class="card-body px-0">
                            <p>No problem. The service will need to run longer till we achieve the objective of flooding google page 1-4 with positive content and then, will need to continue to run to maintain that effect - just like if this were an SEO campaign.</p>
                        </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="confaqhead3">
                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#confaq16"
                        aria-expanded="true" aria-controls="confaq16">I'm an Agency, are you open to White label partnerships?</a>
                    </div>
                    <div id="confaq16" class="collapse" aria-labelledby="confaqhead3" data-parent="#faq">
                        <div class="card-body px-0">
                            <p>Yes.</p>
                        </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="confaqhead3">
                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#confaq17"
                        aria-expanded="true" aria-controls="confaq17">I'm an agency/consultant. Do you offer referral bonus?</a>
                    </div>
                    <div id="confaq17" class="collapse" aria-labelledby="confaqhead3" data-parent="#faq">
                        <div class="card-body px-0">
                            <p>Yes. We offer 10% revenue share on any referrals that convert. You get paid after we get paid. Revenue share is only on services delivered, it does not include advertising budget. So if the client pays us $2000 - where $1000 is the advertising budget for Facebook ads or Google ads, the 10% revenue share would only be on the $1000 management fee.</p>
                        </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="confaqhead3">
                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#confaq18"
                        aria-expanded="true" aria-controls="confaq18">Why should I choose rsquare media over the 1000s of other marketing companies?</a>
                    </div>
                    <div id="confaq18" class="collapse" aria-labelledby="confaqhead3" data-parent="#faq">
                        <div class="card-body px-0">
                          <p>Firstly, there are only a few companies (maybe 5) that offer a deletion service like we do - not 1000s.</p>
                          <p>We make it Risk Free with a Money Back Guarantee.</p>
                          <p>95% of the Reputation Management companies in the market talk about burying bad press, not deleting it from Google.</p>
                          <p>We have a Small Business focus and won the 2017 Minority Business of the Year Award in the company of ConEdison & MTA -- (who won awards for D&I that night) - we a peer-reviewed and industry recognized for being a high integrity and innovative company - which may not be the case for other companies who claim to be offering this service.</p>
                          <p>Clients tell us our prices are very friendly and range between low cost and very affordable</p>
                          <p>We are always reachable by email, and, by text and phone call - depending on the level of service selected</p>
                          <p>We are MWBE Minority Certified with the City of New York</p>
                          <p>We work with Fortune 1000 companies and adhere to the highest standards of quality, innovation, professionalism & integrity</p>
                          <p>We believe in doing good in the world and support non-profits like Bright Now, UCT International (a United Nations NGO), National Minority Business Council, KidsRok, John & Vilma Pamila Robinson Education Fund, Uniondale Chamber of Commerce - to name a few.</p>
                          <p>We're fun to work with and deliver results at the speed of thought</p>
                        </div>
                    </div>
                  </div>
        
                </div>
                
                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
      </div>
        <div role="tabpanel" class="tab-pane fade show" id="reloc6">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('client/images/home/bazooka/comparison')}}.png" class="rounded w-100" alt="comparison"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <div class="table-content">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col" style="background-color: #f15a24; color: #fff;">
                          <div class="th-img"><img src="{{url('client/images/home/features.png')}}"/></div>
                          FEATURES
                        </th>
                        <th scope="col" style="background-color: #ffd3e4;">
                          <div class="th-img"><img src="{{url('client/images/home/bazooka.png')}}"/></div>
                          BAZOOKA
                        </th>
                        <th scope="col" style="background-color: #ffe4d2;">
                          <div class="th-img"><img src="{{url('client/images/home/relocation.png')}}"/></div>
                          RELOCATION
                        </th>
                        <th scope="col" style="background-color: #ceffe4;">
                          <div class="th-img"><img src="{{url('client/images/home/forcefields.png')}}"/></div>
                          FORCEFIELD
                        </th>
                        <th scope="col" style="background-color: #fff3cf;">
                          <div class="th-img"><img src="{{url('client/images/home/halo.png')}}"/></div>
                          HALO
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row" style="font-size: 16px;">Speed</th>
                        <td>Fastest</td>
                        <td>Slower</td>
                        <td>Slower</td>
                        <td>Slower</td>
                      </tr>
                      <tr>
                        <th scope="row" style="font-size: 16px;">Money Back Guarantee</th>
                        <td>Yes</td>
                        <td>No</td>
                        <td>No</td>
                        <td>No</td>
                      </tr>
                      <tr>
                        <th scope="row" style="font-size: 16px;">Payment results?</th>
                        <td>No*</td>
                        <td>No*</td>
                        <td>No*</td>
                        <td>No*</td>
                      </tr>
                      <tr>
                        <th scope="row" style="font-size: 16px;">Payment</th>
                        <td>Lump Sum Upfront</td>
                        <td>Monthly Retainer</td>
                        <td>Monthly Retainer</td>
                        <td>Monthly Retainer</td>
                      </tr>
                      <tr>
                        <th scope="row" style="font-size: 16px;">Cost</th>
                        <td>Low</td>
                        <td>Higher</td>
                        <td>Higher</td>
                        <td>Higher</td>
                      </tr>
                    </tbody>
                  </table>
                  <p class="star-notes">*No Guarantee for how long the delivered outcome will last once retainer is paused. The link is less likely to return to Google page 1 once it has been pushed to Google page 4 or beyond.</p>
                </div>
                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade show" id="reloc7">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('client/images/home/bazooka/why')}}-this-price.jpg" class="rounded w-100" alt="Why this price"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <span class="price-monthly">Monthly Retainers start at $3000/month </span>
                <h4>Why This price?</h4>
                <div class="lists__style">
                  <ul>
                    <li>Price is driven by complexity of the ask. Higher the complexity, greater is the price.</li>
                    <li>Price is also driven by where the client is. For example, if the client is an unknown brand, we must change that reality which will take time. Also, if the client is battling a negative association, then, that association must be dispelled before we can reset the narrative.</li>
                    <li>Price is also driven by market relocs. Since we've been delivering success to clients for over a decade our resources are in very high demand and since we have a limited number of magicians or specialists on staff, it ends up becoming a bidding war similar to what happens on google paid ads where the winning bid gets the coveted spot. Is it for this reason that our quotes expire in 48-72 hours.</li>
                    <li>Clients like working with a proven system and companies that consistently deliver results whilst providing a white glove premium experience to clients. Such clients are happy to pay premium prices for premium services, which is probably why they drive german imports, fly business class, stay at 5 star hotels, dine at Michelin star restaurants and choose to hire rsquare media. If thats not you, no biggie, we have a long wait-list of clients who have already paid us hefty advances and are eagerly awaiting us to begin working with them.</li>
                  </ul>
                </div>
                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade show" id="reloc8">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('client/images/home/bazooka/use')}}-case.png" class="rounded w-100" alt="Use case"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <h4>Use Case:</h4>
                <div class="lists__style">
                  <ul>
                    <li>Clients who fear that erasing the press article would inflame the situation, and may attract further media attention which may create more negative content and publicity. These clients would much rather not ‘poke the bear’ and just not have that content be seen by anyone.</li>
                    <li>Executives in the job market.</li>
                    <li>Professionals being vetted for Csuite or Advisory Board appointments.</li>
                    <li>Politicians during election season.</li>
                    <li>Athletes, to protect their brand deals.</li>
                    <li>Business owners & Brands who want to reposition themselves.</li>
                    <li>Ambitious and motivated go-getters who can't wait to get out of middle management and get to the next level.</li>
                    <li>Talented senior professionals who keep getting passed over for promotion or never make partner.</li>
                    <li>Anyone who’s sick and tired of being sick and tired and who wants more out of life.</li>
                    <li>Brands and organizations planning to introduce a new product or service into the market.</li>
                  </ul>
                </div>
                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade show" id="reloc9">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('client/images/home/bazooka/tc')}}.png" class="rounded w-100" alt="Terms & Conditions"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <h4>TERMS (T&C)</h4>
                <div class="lists__style">
                  <ul>
                    <li>We guarantee Bazooka results (removing bad content from Google or the internet) will last for atleast 3 months.</li>
                    <li>If the same link reappears within that window for the same keyword, we will deliver success again at no additional cost to you.</li>
                    <li>if we are unable to deliver results per our proposal & timeline mentioned therein, the client has the option of requesting a refund.</li>
                    <li>We offer 55% refunds which are processed the same business day they are requested in writing, provided we receive the request before 12pm EST. If the refund request comes later, its processed the next business day.</li>
                    <li>If any link cannot be removed from Google, we can deploy our RELOCATION service. Relocation uses a suppression strategy such that our friendly content replaces the bad content and the bad content moves from Google page 1 to Google page 2 and beyond of the search results.</li>
                    <li>RELOCATION is a monthly retainer and usually takes at least 6 months before any outcomes are realized. Speed of outcomes may vary depending on complexity and the nuances of the Google algorithm at that moment in time.</li>
                    <li>The client’s refund amount is used to fund the Relocation effort, so we can expedite the transition to deliver the fastest result.</li>
                    <li>We offer no guarantees on how long the effect will last once the campaign is paused.</li>
                  </ul>
                  <h4>General Terms & Conditions</h4>
                  <ul>
                    <li>Work begins after payment is received & funds confirmed.</li>
                    <li>Speed of delivery relies on Client’s speed of communication & approval.</li>
                    <li>Client is responsible for sharing relevant logins, and brand related content in Windows friendly electronic format like jpg, pdf, word doc, mp4 etc.</li>
                    <li>No refunds unless explicitly mentioned in proposal.</li>
                    <li>Days are business days not calendar days.</li>
                    <li>Any quote expires in 1 week.</li>
                  </ul>
                </div>
                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> --}}


{{-- <section class="forcefields-setion">
  <span id="forcefield" class="scrollsection"></span>
  <div class="colorbg-head">
    <div class="container"><h2 class="text-center">Top Blogs</h2></div>
  </div>

  <div class="container">
    <div class="tabs__sections">
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item"><a class="nav-link active" href="#FORCE1" role="tab" data-toggle="tab">WHAT IS FORCEFIELD?</a></li>
        <li class="nav-item"><a class="nav-link" href="#FORCE2" role="tab" data-toggle="tab">AFFORDABLE</a></li>
        <li class="nav-item"><a class="nav-link" href="#FORCE5" role="tab" data-toggle="tab">SERVICES</a></li>
        <li class="nav-item"><a class="nav-link" href="#faqscommon3" role="tab" data-toggle="tab">FAQS</a></li>
        <li class="nav-item"><a class="nav-link" href="#FORCE6" role="tab" data-toggle="tab">COMPARISON</a></li>
        <li class="nav-item"><a class="nav-link" href="#FORCE7" role="tab" data-toggle="tab">WHY THIS PRICE?</a></li>
        <li class="nav-item"><a class="nav-link" href="#FORCE8" role="tab" data-toggle="tab">USE CASE</a></li>
        <li class="nav-item"><a class="nav-link" href="#FORCE9" role="tab" data-toggle="tab">TERMS (T&C)</a></li>
      </ul>
      
      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade show active" id="FORCE1">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('client/images/home/forcefield/whatis')}}-forcefields.jpg" class="rounded w-100" alt="WHAT IS FORCEFIELD?"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <h4>Forcefield is a preemptive Reputation Management service that insulates a desired online presence for clients. The service stops future bad press and future crises from showing up on Google page 1.</h4>
                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade show" id="FORCE2">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('client/images/home/content/affordable')}}.png" class="rounded img-fluid" alt="Pharma Product Launch"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <h4>We work with a monthly retainer, so there is no lumpsum payment like Bazooka.</h4>
                <h4>We accept payment in a variety of ways - venmo, zelle, ACH, EFT, Wire, Cash.</h4>
                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade show" id="FORCE5">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('client/images/home/forcefield/services')}}.png" class="rounded w-100" alt="Service"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <h4>Forcefield Leverages SEO Best Practice and  Thought Leadership Best practices to ensure clients benefit from an ongoing pristine online presence regardless of the presence of scandal, fake news or misinformation about them or their companies on the internet. Service include but not limited tos:</h4>

                <div class="lists__style">
                  <ul>
                    <li>Creating original content and publishing across relevant social media to achieve the objective of having a pristine presence on Google and that platform.</li>
                    <li><b>Original Content:</b> Long Form - Blog content - 800- 1500 words - published on wordpress, Medium, Blogspot, Tumblr, Linkedin, etc. Become an amazon best selling author - done with you or done for you.</li>
                    <li>Speak at the United Nations to globalize your brand.</li>
                    <li>Podcast Production: Done with You or Done for You. We’ll Produce your podcast for you - all you do is show up and talk to the guest. We’ll manage the rest.</li>
                    <li>We’ll design a custom website/App to wow your customers.</li>
                    <li>We’ll help you be seen as a Thought leader/Influencer/Subject Matter Expert on Linkedin, YouTube, Google, etc. by creating thought provoking original content on your behalf and then post to your channels on your behalf as well.</li>
                    <li>We’ll produce quality videos for your YouTube Shorts, TikTok, IG Stories to help position you as a Thought leader.</li>
                    <li>Public Speaking Coaching to help you speak with impact on zoom or in person.</li>
                    <li>Image Consulting to help you show up more powerfully wearing the right ensemble of clothes, with the right haircut, wearing an age and situation appropriate fragrance.</li>
                    <li>Pitch Deck Design & Pitch story telling coaching/consulting.</li>
                  </ul>
                </div>

                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade show" id="faqscommon3">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('client/images/home/content/faq')}}.png" class="rounded img-fluid" alt="FAQs"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <h4>FAQs</h4>
                    <div class="accordion mt-3" id="confaq">
                      <div class="card">
                          <div class="card-header" id="confaqhead1">
                              <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#confaq1"
                              aria-expanded="false" aria-controls="confaq1">How long will it take for my links to be removed from Google search results?</a>
                          </div>
                
                          <div id="confaq1" class="collapse" aria-labelledby="confaqhead1" data-parent="#faq">
                              <div class="card-body px-0">
                                <p>It varies and is case-by-case. That being said, we're able to get most links removed in 105 business days.</p>
                              </div>
                          </div>
                      </div>
                      <div class="card">
                          <div class="card-header" id="confaqhead2">
                              <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#confaq2"
                              aria-expanded="true" aria-controls="confaq2">What if you can't remove the links? What guarantees do you offer?</a>
                          </div>
                
                          <div id="confaq2" class="collapse" aria-labelledby="confaqhead2" data-parent="#faq">
                              <div class="card-body px-0">
                                <p>If you chose the Bazooka service, then, that comes with a 100% Money Back Guarantee – for all links not removed within our forecasted period. If you gave us 10 links to remove, which we said, we'd get removed in 120 days, and, on the 121st day two links are still not removed, then, you have the option of asking for a refund for those 2 links – which we are happy to do, since we're committed to the highest standards of integrity</p>
                              </div>
                          </div>
                      </div>
                      <div class="card">
                          <div class="card-header" id="confaqhead3">
                              <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#confaq3"
                              aria-expanded="true" aria-controls="confaq3">Tell me how you do it. I will hire you only if you tell me how you do it so I can approve your process.</a>
                          </div>
                          <div id="confaq3" class="collapse" aria-labelledby="confaqhead3" data-parent="#faq">
                              <div class="card-body px-0">
                                <p>Not Possible since we use a proprietary process. We will not share our process with anyone since it's a closely guarded trade secret.</p>
                              </div>
                          </div>
                      </div>
          
          
                      <div class="card">
                        <div class="card-header" id="confaqhead3">
                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#confaq7"
                            aria-expanded="true" aria-controls="confaq7">Who uses Online Reputation Management service?</a>
                        </div>
                        <div id="confaq7" class="collapse" aria-labelledby="confaqhead3" data-parent="#faq">
                            <div class="card-body px-0">
                              <p>Our clients range from CEOs, Politicians, Celebrities, Business Owners as well as Professionals from all over the world, as well as the attorneys (lawyers) who represent them – divorce attorneys, general counsel, criminal defense attorneys, litigation attorneys.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="confaqhead3">
                          <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#confaq8"
                          aria-expanded="true" aria-controls="confaq8">What's your fee structure? Will a celebrity pay a higher price than a professional since they are wealthier and maybe can afford to pay for high ticket items?</a>
                      </div>
                      <div id="confaq8" class="collapse" aria-labelledby="confaqhead3" data-parent="#faq">
                          <div class="card-body px-0">
                            <p>Our fee is guided by Level of Complexity, not by who the client is. The celebrity and Joe Schmoe from next door pay the exact same fee if they have the exact same problem.</p>
                          </div>
                      </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="confaqhead3">
                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#confaq10"
                        aria-expanded="true" aria-controls="confaq10">How much does link deletion from Google cost?</a>
                    </div>
                    <div id="confaq10" class="collapse" aria-labelledby="confaqhead3" data-parent="#faq">
                        <div class="card-body px-0">
                          <p>Cost is determined by level of complexity which is driven by 3 variables:</p>
                          <p>Recency: How recent was the story that needs to be removed from Google? More recent = harder = more effort = higher fee</p>
                          <p>Quantity: how many links need to be deleted? This is math. Price = Fee x number of links</p>
                          <p>Source: Where is the story coming from? FBI.gov? SEC.gov? New York Times? Or Joe Schmo's Blog? Government, News Media websites = harder = more effort = higher fee</p>
                          <p>Cost starts at $3000 per link</p>
                        </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="confaqhead3">
                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#confaq11"
                        aria-expanded="true" aria-controls="confaq11">$3000??!! Too expensive! I found someone who says he can do it for a lot less!</a>
                    </div>
                    <div id="confaq11" class="collapse" aria-labelledby="confaqhead3" data-parent="#faq">
                        <div class="card-body px-0">
                          <p>We hear this all the time. Clients who have fallen prey to offers like that tell us later that they got scammed and wished they had used our service in the very beginning. Our price is non-negotiable. We will never hardsell our service to you or anyone. It is what it is. If you think having a good reputation is a good idea, then, we are here to help you. If not, that's fine. We wish you well.</p>
                        </div>
                    </div>
                  </div>
      
                  <div class="card">
                    <div class="card-header" id="confaqhead3">
                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#confaq12"
                        aria-expanded="true" aria-controls="confaq12">What are your payment terms?</a>
                    </div>
                    <div id="confaq12" class="collapse" aria-labelledby="confaqhead3" data-parent="#faq">
                        <div class="card-body px-0">
                          <p>Work begins only after payment is received and funds verified by holding them for 2 weeks to prevent against wire fraud.</p>
                        </div>
                    </div>
                  </div>
      
                  <div class="card">
                    <div class="card-header" id="confaqhead3">
                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#confaq13"
                        aria-expanded="true" aria-controls="confaq13">My competitor is attacking my business with fake 1 star reviews on Google. Help!</a>
                    </div>
                    <div id="confaq13" class="collapse" aria-labelledby="confaqhead3" data-parent="#faq">
                        <div class="card-body px-0">
                          <p>Not to worry. We can get those removed.</p>
                        </div>
                    </div>
                  </div>
      
                  <div class="card">
                    <div class="card-header" id="confaqhead3">
                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#confaq13"
                        aria-expanded="true" aria-controls="confaq13">Is there any category you will not touch?</a>
                    </div>
                    <div id="confaq13" class="collapse" aria-labelledby="confaqhead3" data-parent="#faq">
                        <div class="card-body px-0">
                            <p>Yes! Only 1. Any category that is linked to endangering the welfare of minors.</p>
                        </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="confaqhead3">
                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#confaq14"
                        aria-expanded="true" aria-controls="confaq14">Thanks for removing the bad press. What else can I do to prevent this from happening in the future?</a>
                    </div>
                    <div id="confaq14" class="collapse" aria-labelledby="confaqhead3" data-parent="#faq">
                        <div class="card-body px-0">
                            <p>We have a service called Forcefield - which floods google page 1 and 2 with favorable content, so that, if there is fake news or bad press in the future, it will land on Google page 3 or 4 and not Google page 1.</p>
                        </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="confaqhead3">
                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#confaq15"
                        aria-expanded="true" aria-controls="confaq15">That's great but I don't want any fake news or bad press to show up on Google page 3 or 4 either.</a>
                    </div>
                    <div id="confaq15" class="collapse" aria-labelledby="confaqhead3" data-parent="#faq">
                        <div class="card-body px-0">
                            <p>No problem. The service will need to run longer till we achieve the objective of flooding google page 1-4 with positive content and then, will need to continue to run to maintain that effect - just like if this were an SEO campaign.</p>
                        </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="confaqhead3">
                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#confaq16"
                        aria-expanded="true" aria-controls="confaq16">I'm an Agency, are you open to White label partnerships?</a>
                    </div>
                    <div id="confaq16" class="collapse" aria-labelledby="confaqhead3" data-parent="#faq">
                        <div class="card-body px-0">
                            <p>Yes.</p>
                        </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="confaqhead3">
                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#confaq17"
                        aria-expanded="true" aria-controls="confaq17">I'm an agency/consultant. Do you offer referral bonus?</a>
                    </div>
                    <div id="confaq17" class="collapse" aria-labelledby="confaqhead3" data-parent="#faq">
                        <div class="card-body px-0">
                            <p>Yes. We offer 10% revenue share on any referrals that convert. You get paid after we get paid. Revenue share is only on services delivered, it does not include advertising budget. So if the client pays us $2000 - where $1000 is the advertising budget for Facebook ads or Google ads, the 10% revenue share would only be on the $1000 management fee.</p>
                        </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="confaqhead3">
                        <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#confaq18"
                        aria-expanded="true" aria-controls="confaq18">Why should I choose rsquare media over the 1000s of other marketing companies?</a>
                    </div>
                    <div id="confaq18" class="collapse" aria-labelledby="confaqhead3" data-parent="#faq">
                        <div class="card-body px-0">
                          <p>Firstly, there are only a few companies (maybe 5) that offer a deletion service like we do - not 1000s.</p>
                          <p>We make it Risk Free with a Money Back Guarantee.</p>
                          <p>95% of the Reputation Management companies in the market talk about burying bad press, not deleting it from Google.</p>
                          <p>We have a Small Business focus and won the 2017 Minority Business of the Year Award in the company of ConEdison & MTA -- (who won awards for D&I that night) - we a peer-reviewed and industry recognized for being a high integrity and innovative company - which may not be the case for other companies who claim to be offering this service.</p>
                          <p>Clients tell us our prices are very friendly and range between low cost and very affordable</p>
                          <p>We are always reachable by email, and, by text and phone call - depending on the level of service selected</p>
                          <p>We are MWBE Minority Certified with the City of New York</p>
                          <p>We work with Fortune 1000 companies and adhere to the highest standards of quality, innovation, professionalism & integrity</p>
                          <p>We believe in doing good in the world and support non-profits like Bright Now, UCT International (a United Nations NGO), National Minority Business Council, KidsRok, John & Vilma Pamila Robinson Education Fund, Uniondale Chamber of Commerce - to name a few.</p>
                          <p>We're fun to work with and deliver results at the speed of thought</p>
                        </div>
                    </div>
                  </div>
        
                </div>
                
                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
      </div>
        <div role="tabpanel" class="tab-pane fade show" id="FORCE6">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('client/images/home/bazooka/comparison')}}.png" class="rounded img-fluid" alt="Pharma Product Launch"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <div class="table-content">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col" style="background-color: #f15a24; color: #fff;">
                          <div class="th-img"><img src="{{url('client/images/home/features.png')}}"/></div>
                          FEATURES
                        </th>
                        <th scope="col" style="background-color: #ffd3e4;">
                          <div class="th-img"><img src="{{url('client/images/home/bazooka.png')}}"/></div>
                          BAZOOKA
                        </th>
                        <th scope="col" style="background-color: #ffe4d2;">
                          <div class="th-img"><img src="{{url('client/images/home/relocation.png')}}"/></div>
                          RELOCATION
                        </th>
                        <th scope="col" style="background-color: #ceffe4;">
                          <div class="th-img"><img src="{{url('client/images/home/forcefields.png')}}"/></div>
                          FORCEFIELD
                        </th>
                        <th scope="col" style="background-color: #fff3cf;">
                          <div class="th-img"><img src="{{url('client/images/home/halo.png')}}"/></div>
                          HALO
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row" style="font-size: 16px;">Speed</th>
                        <td>Fastest</td>
                        <td>Slower</td>
                        <td>Slower</td>
                        <td>Slower</td>
                      </tr>
                      <tr>
                        <th scope="row" style="font-size: 16px;">Money Back Guarantee</th>
                        <td>Yes</td>
                        <td>No</td>
                        <td>No</td>
                        <td>No</td>
                      </tr>
                      <tr>
                        <th scope="row" style="font-size: 16px;">Payment results?</th>
                        <td>No*</td>
                        <td>No*</td>
                        <td>No*</td>
                        <td>No*</td>
                      </tr>
                      <tr>
                        <th scope="row" style="font-size: 16px;">Payment</th>
                        <td>Lump Sum Upfront</td>
                        <td>Monthly Retainer</td>
                        <td>Monthly Retainer</td>
                        <td>Monthly Retainer</td>
                      </tr>
                      <tr>
                        <th scope="row" style="font-size: 16px;">Cost</th>
                        <td>Low</td>
                        <td>Higher</td>
                        <td>Higher</td>
                        <td>Higher</td>
                      </tr>
                    </tbody>
                  </table>
                  <p class="star-notes">*No Guarantee for how long the delivered outcome will last once retainer is paused. The link is less likely to return to Google page 1 once it has been pushed to Google page 4 or beyond.</p>
                </div>
                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade show" id="FORCE7">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('front/images/home/bazooka/why')}}-this-price.jpg" class="rounded img-fluid" alt="Pharma Product Launch"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <h4>Why This price?</h4>
                <div class="lists__style">
                  <ul>
                    <li>Price is driven by complexity of the ask. Higher the complexity, greater is the price.</li>
                    <li>Price is also driven by where the client is. For example, if the client is an unknown brand, we must change that reality which will take time. Also, if the client is battling a negative association, then, that association must be dispelled before we can reset the narrative.</li>
                    <li>Price is also driven by market forces. Since we've been delivering success to clients for over a decade our resources are in very high demand and since we have a limited number of magicians or specialists on staff, it ends up becoming a bidding war similar to what happens on google paid ads where the winning bid gets the coveted spot. Is it for this reason that our quotes expire in 48-72 hours.</li>
                    <li>Clients like working with a proven system and companies that consistently deliver results whilst providing a white glove premium experience to clients. Such clients are happy to pay premium prices for premium services, which is probably why they drive german imports, fly business class, stay at 5 star hotels, dine at Michelin star restaurants and choose to hire rsquare media. If thats not you, no biggie, we have a long wait-list of clients who have already paid us hefty advances and are eagerly awaiting us to begin working with them.</li>
                  </ul>
                </div>
                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade show" id="FORCE8">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('front/images/home/bazooka/use')}}-case.png" class="rounded w-100" alt="Use Case"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <h4>Use Case:</h4>
                <div class="lists__style">
                  <ul>
                    <li>Executives in the job market.</li>
                    <li>Professionals being vetted for Csuite or Advisory Board appointments.</li>
                    <li>Politicians during election season.</li>
                    <li>Athletes, to protect their brand deals.</li>
                    <li>Business owners & Brands who want to reposition themselves.</li>
                    <li>Ambitious and motivated go-getters who can't wait to get out of middle management and get to the next level.</li>
                    <li>Talented senior professionals who keep getting passed over for promotion or never make partner.</li>
                    <li>Anyone who's sick and tired of being sick and tired and who wants more out of life.</li>
                    <li>Brands and organizations planning to introduce a new product or service into the market.</li>
                  </ul>
                </div>
                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade show" id="FORCE9">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('front/images/home/bazooka/tc')}}.png" class="rounded w-100" alt="Term & Conditionsiv">
              </div>
            </div>
            <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
              <h4>TERMS (T&C)</h4>
              <div class="lists__style">
                <ul>
                  <li>We guarantee Bazooka results (removing bad content from Google or the internet) will last for atleast 3 months.</li>
                  <li>If the same link reappears within that window for the same keyword, we will deliver success again at no additional cost to you.</li>
                  <li>if we are unable to deliver results per our proposal & timeline mentioned therein, the client has the option of requesting a refund.</li>
                  <li>We offer 55% refunds which are processed the same business day they are requested in writing, provided we receive the request before 12pm EST. If the refund request comes later, its processed the next business day.</li>
                  <li>If any link cannot be removed from Google, we can deploy our RELOCATION service. Relocation uses a suppression strategy such that our friendly content replaces the bad content and the bad content moves from Google page 1 to Google page 2 and beyond of the search results.</li>
                  <li>RELOCATION is a monthly retainer and usually takes at least 6 months before any outcomes are realized. Speed of outcomes may vary depending on complexity and the nuances of the Google algorithm at that moment in time.</li>
                  <li>The client’s refund amount is used to fund the Relocation effort, so we can expedite the transition to deliver the fastest result.</li>
                  <li>We offer no guarantees on how long the effect will last once the campaign is paused.</li>
                </ul>
                <h4>General Terms & Conditions</h4>
                <ul>
                  <li>Work begins after payment is received & funds confirmed.</li>
                  <li>Speed of delivery relies on Client’s speed of communication & approval.</li>
                  <li>Client is responsible for sharing relevant logins, and brand related content in Windows friendly electronic format like jpg, pdf, word doc, mp4 etc.</li>
                  <li>No refunds unless explicitly mentioned in proposal.</li>
                  <li>Days are business days not calendar days.</li>
                  <li>Any quote expires in 1 week.</li>
                </ul>
              </div>
              <div class="d-md-flex mt-4">
                <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                  <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                  <span class="text-dark">Misery Is History</span>
                </div>
                <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> --}}

<!-- Request a free Quote -->
{{-- <section class="freequote-strip">
  <div class="container">
        <div class="d-md-flex align-items-center justify-content-center px-md-4">
          <div class="freeq-txt">
            <h3>Want to be Seen as a Thought<br>Leader or Influencer on Linkedin or YouTube?</h3>
            <!-- <p>Success Guaranteed or your money back</p> -->
          </div>
          <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
            <a target="_blank" href="{{ url('registration') }}" class="btn btn-secondary rounded-pill">Become A Blogger</a>
            <span class="text-light">{{ slogan() }}</span>
          </div>
        </div>
  </div>
</section> --}}
<!-- End -->


{{-- <section class="hal0-setion">
  <span id="halo" class="scrollsection"></span>
  <div class="colorbg-head">
    <div class="container"><h2 class="text-center">Facts Blog</h2></div>
  </div>

  <div class="container">
    <div class="tabs__sections">
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item"><a class="nav-link active" href="#halo1" role="tab" data-toggle="tab">WHAT IS HALO?</a></li>
        <li class="nav-item"><a class="nav-link" href="#halo2" role="tab" data-toggle="tab">FAST</a></li>
        <li class="nav-item"><a class="nav-link" href="#halo3" role="tab" data-toggle="tab">SUCCESS GUARANTEE</a></li>
        <li class="nav-item"><a class="nav-link" href="#halo4" role="tab" data-toggle="tab">AFFORDABLE</a></li>
        <li class="nav-item"><a class="nav-link" href="#halo5" role="tab" data-toggle="tab">SERVICES</a></li>
        <li class="nav-item"><a class="nav-link" href="#halo6" role="tab" data-toggle="tab">COMPARISON</a></li>
        <li class="nav-item"><a class="nav-link" href="#halo7" role="tab" data-toggle="tab">WHY THIS PRICE?</a></li>
        <li class="nav-item"><a class="nav-link" href="#halo8" role="tab" data-toggle="tab">USE CASE</a></li>
        <li class="nav-item"><a class="nav-link" href="#halo9" role="tab" data-toggle="tab">TERMS (T&C)</a></li>
      </ul>
      
      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade show active" id="halo1">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('front/images/home/halo/what')}}-halo.jpg" class="rounded img-fluid" alt="Pharma Product Launch"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <h4>Halo is rsquare media’s premier Online Reputation Management service that leverages Thought Leadership best practices  to position clients as Influencers or Thought Leaders online - thus creating a Halo effect around the client’s personal brand.</h4>
                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="halo2">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('front/images/home/bazooka/fast')}}.png" class="rounded w-100" alt="Fast"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <h4>Success Outcomes are delivered in 90-120 business days.</h4>
                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade show" id="halo3">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('front/images/home/bazooka/success')}}-guarantee.jpg" class="rounded w-100" alt="Success Gaurantee"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <h4>Success Guaranteed or your money back. 
                  All deliveries have tangible & specific outcomes which we guarantee will be realized in an approximate timeframe.</h4>
                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade show" id="halo4">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('front/images/home/content/affordable')}}.png" class="rounded img-fluid" alt="Pharma Product Launch"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <h4>We work with a monthly retainer, so there is no lumpsum payment like Bazooka.
                  We accept payment in a variety of ways - venmo, zelle, ACH, EFT, Wire, Cash.</h4>
                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade show" id="halo5">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('front/images/home/bazooka/services')}}.png" class="rounded w-100" alt="Services"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <h4>Thought Leadership Services:</h4>
                <div class="lists__style">
                  <ul>
                    <li>Become an amazon best selling author - done with you or done for you.</li>
                    <li>Speak at the United Nations to globalize your brand.</li>
                    <li>Podcast Production: Done with You or Done for You. We’ll Produce your podcast for you - all you do is show up and talk to the guest. We’ll manage the rest.</li>
                    <li>We’ll design a custom website/App to wow your customers.</li>
                    <li>We’ll help you be seen as a Thought leader/Influencer/Subject Matter Expert on Linkedin, YouTube, Google, etc. by creating thought provoking original content on your behalf and then post to your channels on your behalf as well.</li>
                    <li>We’ll produce quality videos for your YouTube Shorts, TikTok, IG Stories to help position you as a Thought leader.</li>
                    <li>Public Speaking Coaching to help you speak with impact on zoom or in person.</li>
                    <li>Image Consulting to help you show up more powerfully wearing the right ensemble of clothes, with the right haircut, wearing an age and situation appropriate fragrance.</li>
                    <li>Pitch Deck Design & Pitch story telling coaching/consulting.</li>
                  </ul>
                </div>
                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade show" id="halo6">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('front/images/home/bazooka/comparison')}}.png" class="rounded w-100" alt="Comparison"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <div class="table-content">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col" style="background-color: #f15a24; color: #fff;">
                          <div class="th-img"><img src="{{url('front/images/home/features.png')}}"/></div>
                          FEATURES
                        </th>
                        <th scope="col" style="background-color: #ffd3e4;">
                          <div class="th-img"><img src="{{url('front/images/home/bazooka.png')}}"/></div>
                          BAZOOKA
                        </th>
                        <th scope="col" style="background-color: #ffe4d2;">
                          <div class="th-img"><img src="{{url('front/images/home/relocation.png')}}"/></div>
                          RELOCATION
                        </th>
                        <th scope="col" style="background-color: #ceffe4;">
                          <div class="th-img"><img src="{{url('front/images/home/forcefields.png')}}"/></div>
                          FORCEFIELD
                        </th>
                        <th scope="col" style="background-color: #fff3cf;">
                          <div class="th-img"><img src="{{url('front/images/home/halo.png')}}"/></div>
                          HALO
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row" style="font-size: 16px;">Speed</th>
                        <td>Fastest</td>
                        <td>Slower</td>
                        <td>Slower</td>
                        <td>Slower</td>
                      </tr>
                      <tr>
                        <th scope="row" style="font-size: 16px;">Money Back Guarantee</th>
                        <td>Yes</td>
                        <td>No</td>
                        <td>No</td>
                        <td>No</td>
                      </tr>
                      <tr>
                        <th scope="row" style="font-size: 16px;">Payment results?</th>
                        <td>No*</td>
                        <td>No*</td>
                        <td>No*</td>
                        <td>No*</td>
                      </tr>
                      <tr>
                        <th scope="row" style="font-size: 16px;">Payment</th>
                        <td>Lump Sum Upfront</td>
                        <td>Monthly Retainer</td>
                        <td>Monthly Retainer</td>
                        <td>Monthly Retainer</td>
                      </tr>
                      <tr>
                        <th scope="row" style="font-size: 16px;">Cost</th>
                        <td>Low</td>
                        <td>Higher</td>
                        <td>Higher</td>
                        <td>Higher</td>
                      </tr>
                    </tbody>
                  </table>
                  <p class="star-notes">*No Guarantee for how long the delivered outcome will last once retainer is paused. The link is less likely to return to Google page 1 once it has been pushed to Google page 4 or beyond.</p>
                </div>
                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade show" id="halo7">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('front/images/home/bazooka/why-this')}}-price.jpg" class="rounded w-100" alt="Why This Price"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <h4>Why This price?</h4>

                <div class="lists__style">
                  <ul>
                    <li>Price is driven by complexity of the ask. Higher the complexity, greater is the price.</li>
                    <li>Price is also driven by where the client is. For example, if the client is an unknown brand, we must change that reality which will take time. Also, if the client is battling a negative association, then, that association must be dispelled before we can reset the narrative.</li>
                    <li>Price is also driven by market forces. Since we've been delivering success to clients for over a decade our resources are in very high demand and since we have a limited number of magicians or specialists on staff, it ends up becoming a bidding war similar to what happens on google paid ads where the winning bid gets the coveted spot. Is it for this reason that our quotes expire in 48-72 hours.</li>
                    <li>Clients like working with a proven system and companies that consistently deliver results whilst providing a white glove premium experience to clients. Such clients are happy to pay premium prices for premium services, which is probably why they drive german imports, fly business class, stay at 5 star hotels, dine at Michelin star restaurants and choose to hire rsquare media. If thats not you, no biggie, we have a long wait-list of clients who have already paid us hefty advances and are eagerly awaiting us to begin working with them.</li>
                  </ul>
                </div>

                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade show" id="halo8">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('front/images/home/bazooka/use-case')}}.png" class="rounded w-100" alt="Use Case"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <h4>Use Case:</h4>
                <div class="lists__style">
                  <ul>
                    <li>Executives in the job market.</li>
                    <li>Professionals being vetted for Csuite or Advisory Board appointments.</li>
                    <li>Politicians during election season.</li>
                    <li>Athletes, to protect their brand deals.</li>
                    <li>Business owners & Brands who want to reposition themselves.</li>
                    <li>Ambitious and motivated go-getters who can't wait to get out of middle management and get to the next level.</li>
                    <li>Talented senior professionals who keep getting passed over for promotion or never make partner.</li>
                    <li>Anyone who's sick and tired of being sick and tired and who wants more out of life.</li>
                    <li>Brands and organizations planning to introduce a new product or service into the market.</li>
                  </ul>
                </div>
                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade show" id="halo9">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('front/images/home/bazooka/tc.png')}}" class="rounded w-100" alt="Terms & Conditions"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <h4>TERMS (T&C)</h4>
                <div class="lists__style">
                  <ul>
                    <li>We guarantee Bazooka results (removing bad content from Google or the internet) will last for atleast 3 months.</li>
                    <li>If the same link reappears within that window for the same keyword, we will deliver success again at no additional cost to you.</li>
                    <li>if we are unable to deliver results per our proposal & timeline mentioned therein, the client has the option of requesting a refund.</li>
                    <li>We offer 55% refunds which are processed the same business day they are requested in writing, provided we receive the request before 12pm EST. If the refund request comes later, its processed the next business day.</li>
                    <li>If any link cannot be removed from Google, we can deploy our RELOCATION service. Relocation uses a suppression strategy such that our friendly content replaces the bad content and the bad content moves from Google page 1 to Google page 2 and beyond of the search results.</li>
                    <li>RELOCATION is a monthly retainer and usually takes at least 6 months before any outcomes are realized. Speed of outcomes may vary depending on complexity and the nuances of the Google algorithm at that moment in time.</li>
                    <li>The client’s refund amount is used to fund the Relocation effort, so we can expedite the transition to deliver the fastest result.</li>
                    <li>We offer no guarantees on how long the effect will last once the campaign is paused.</li>
                  </ul>
                  <h4>General Terms & Conditions</h4>
                  <ul>
                    <li>Work begins after payment is received & funds confirmed.</li>
                    <li>Speed of delivery relies on Client’s speed of communication & approval.</li>
                    <li>Client is responsible for sharing relevant logins, and brand related content in Windows friendly electronic format like jpg, pdf, word doc, mp4 etc.</li>
                    <li>No refunds unless explicitly mentioned in proposal.</li>
                    <li>Days are business days not calendar days.</li>
                    <li>Any quote expires in 1 week.</li>
                  </ul>
                </div>
                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</section> --}}

<!-- SEO Section -->

<!-- Request a free Quote -->
{{-- <section class="freequote-strip">
  <div class="container">
        <div class="d-md-flex align-items-center justify-content-center px-md-4">
          <div class="freeq-txt">
            <h3>Write Your Story: Inspire, Create, Captivate!</h3>
          </div>
          <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
            <a class="btn btn-secondary rounded-pill" href="{{ url('registration') }}">Get Started</a>
          </div>
        </div>
  </div>
</section> --}}
<!-- End -->

{{-- <section class="price-setion">
  <span id="webDesign" class="scrollsection"></span>
  <div class="colorbg-head">
    <div class="container"><h2 class="text-center">Best Reads</h2></div>
  </div>

  <div class="container">
    <div class="tabs__sections">
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item"><a class="nav-link active" href="#prices1" role="tab" data-toggle="tab">Bazooka</a></li>
        <li class="nav-item"><a class="nav-link" href="#prices2" role="tab" data-toggle="tab">ForceField</a></li>
        <li class="nav-item"><a class="nav-link" href="#prices3" role="tab" data-toggle="tab">Relocation</a></li>
        <li class="nav-item"><a class="nav-link" href="#prices4" role="tab" data-toggle="tab">Halo</a></li>
        <li class="nav-item"><a class="nav-link" href="#prices5" role="tab" data-toggle="tab">SEO & Social Media</a></li>
        <li class="nav-item"><a class="nav-link" href="#prices6" role="tab" data-toggle="tab">Video Production</a></li>
        <li class="nav-item"><a class="nav-link" href="#prices7" role="tab" data-toggle="tab">Website Design</a></li>
        <li class="nav-item"><a class="nav-link" href="#prices8" role="tab" data-toggle="tab">Software & Apps</a></li>
        <!-- <li class="nav-item"><a class="nav-link" href="#prices9" role="tab" data-toggle="tab"></a></li> -->
      </ul>
      
      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade show active" id="prices1">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('front/images/home/content/bazooka.png')}}" class="rounded w-100" alt="Bazooka"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <h4>Bazooka Erases Anything Bad from Google, Social & The Internet</h4>
                <h5>Indicative Pricing for Removal of..</h5>
                <div class="lists__style">
                  <ul>
                    <li>Bad Reviews from Google my business, Yelp, amazon, etc.: $2000 per review.</li>
                    <li>Press Stories: Starts at $4500.</li>
                    <li>Court Records: Starts at $4500.</li>
                    <li>Images from Google Image tab: starts at $3000 per image.</li>
                    <li>Mugshots: Starts at $3000 per link & photo.</li>
                    <li>Story from Government website like FBI.gov, SEC.gov, etc. - starts at $20,000 per item.</li>
                  </ul>
                  <h5 class="mt-3">Terms:</h5>
                  <ul>
                    <li>Payment in full upfront.</li>
                    <li>Success Guarantee with 55% refund if outcome is not realized in forecasted timeframe.</li>
                  </ul>
                </div>
                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade show" id="prices2">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('front/images/home/forcefield/whatis-forcefields')}}.jpg" class="rounded w-100" alt="Force Field"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <h4>Forcefield prevents Future Crisis on Google.</h4>
                <h5>Consulting Approach Delivery includes:</h5>
                <div class="lists__style">
                  <ul>
                    <li>Brand Strategy.</li>
                    <li>Visibility & SEO Strategy.</li>
                    <li>Messaging Strategy & storytelling treatment.</li>
                  </ul>
                  <p>Work Delivery is driven by scope of work and which is operated under a monthly retainer which pricing starting at $3500/month </p>

                  <h5>Terms:</h5>
                  <ul>
                    <li>Payment in full upfront.</li>
                    <li>No guarantee on how long content will remain seen on Google page 1 once the campaign is paused.</li>
                  </ul>

                </div>
                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade show" id="prices3">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('front/images/home/content/relocation.jpg')}}" class="rounded w-100" alt="Relocation"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <h4>Relocation moves Bad, Offensive content from Google page 1 to Google page 2 and beyond.</h4>
                <h5>Consulting Approach Delivery includes:</h5>
                <div class="lists__style">
                  <ul>
                    <li>Brand Strategy.</li>
                    <li>Visibility & SEO Strategy.</li>
                    <li>Messaging Strategy & storytelling treatment.</li>
                  </ul>

                  <p>Work Delivery is driven by scope of work and which is operated under a monthly retainer which pricing starting at $3500/month.</p>
                  <h5 class="mt-3">Terms:</h5>
                  <ul>
                    <li>Payment in full upfront.</li>
                    <li>No guarantee on how long content will remain seen on Google page 1 once the campaign is paused.</li>
                  </ul>
                </div>

                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade show" id="prices4">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('front/images/home/halo/what-halo')}}.jpg" class="rounded w-100" alt="PHalo"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <h4>Halo helps clients enhance their personal brand to Thought leader status across targeted channels like Linkedin, Medium, YouTube, Google, etc.</h4>

                <h5>Indicative Pricing:</h5>
                <div class="lists__style">
                  <ul>
                    <li>Speak at the United Nations - starting at $20,000</li>
                    <li>Done for you podcast Production:
                      <ol>
                        <li>Strategy & Setup: $5000</li>
                        <li>Production without motion graphics: $1000 per episode.</li>
                        <li>Production with Motion Graphics & editing: $1500 per episode.</li>
                        <li>Vertical Video for TikTok, YouTube Shorts, IG Stories - $2500 for 10 videos.</li>
                      </ol>
                    </li>
                    <li>Amazon Best Selling Author:
                      <ol>
                        <li>Done for You: Starting at $30,000</li>
                        <li>Done with you: Starting at $15,000</li>
                      </ol>
                    </li>
                    <li>Press Release:
                      <ol>
                        <li>Basic - $2000 to 200+ news outlets online.</li>
                        <li>Premium - starting at $1000 per outlet like Techcrunch, Fortune, Forbes, Yahoo, etc.</li>
                      </ol>
                    </li>
                  </ul>
                </div>

                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade show" id="prices5">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('front/images/home/pricing/social-media')}}.png" class="rounded w-100" alt="SEO & Social Media"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <h4>SEO is a service which helps content to be seen on page 1 of search results on Google, YouTube, Facebook, Linkedin, etc. Price is driven by complexity.</h4>
                <h5>Complexity is driven by:</h5>
                <div class="lists__style">
                  <ul>
                    <li>Number of keywords.</li>
                    <li>Keyword competition level.</li>
                    <li>Speak at the United Nations to globalize your brand.</li>
                    <li>Product category competition level.</li>
                    <li>Amount of content to produced for website & social media.</li>
                    <li>Types of content to produced - Photo, Blog, Video, long form content, short form content, production polish level, etc.</li>
                  </ul>
                  <h5 class="mt-3">Monthly Retainers start at $3000/month</h5>
                </div>

                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade show" id="prices6">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('front/images/home/pricing/video-production')}}.png" class="rounded w-100" alt="Video Production"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <h4>The Video Production Process:</h4>
                <p>No matter what type of video you make, these are the common elements to most videos we work to produce. It is important to note that video production is a linear process with various steps – see below:</p>

                <p><b>Step1.</b> Client Brief – to get a sense of what your Objective is and a clear understanding of what your key message is.</p>
                <p><b>Step2.</b> Scriptwriting.</p>
                <p><b>Step3.</b> Voice over Recording (if needed).</p>
                <p><b>Step4.</b> Animation or Motion Graphics (if needed).</p>
                <p><b>Step5.</b> Final Production with mixing and editing</p>

                <p>Take a look at some of our work. Request a Quote</p>
                <p>Scroll down to read our FAQs which address common client queries. If you have a question that isn’t addressed, please email us and we’d be happy to assist you.</p>

                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade show" id="prices7">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('front/images/home/content/web-design')}}.jpg" class="rounded w-100" alt="Website Design"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <h4>Website Design:</h4>
                <div class="lists__style">
                  <ul>
                    <li>Done for You 5 page website on Wordpress or Wix: $7000.</li>
                    <li>Done for you Ecommerce website on shopify: Starts at $10,000.</li>
                    <li>Custom website from scratch on Angular/React Framework: Starts at $50,000.</li>
                  </ul>
                </div>
                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade show" id="prices8">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('front/images/home/pricing/software-app')}}.png" class="rounded w-100" alt="Software & App"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <h4>Software & App:</h4>
                <div class="lists__style">
                  <ul>
                    <li>MVP on Wordpress/Wix/Shopify: Starting at $10,000.</li>
                    <li>Mobile App - Starting at $35,000.</li>
                    <li>SaaS Product - Starting at $100,000.</li>
                  </ul>
                </div>
                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> --}}

<!-- Request a free Quote -->
{{-- <section class="freequote-strip">
  <div class="container">
        <div class="d-md-flex align-items-center justify-content-center px-md-4">
          <div class="freeq-txt">
            <h3>Search Your Blog On Google.</h3> 
          </div>
          <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
            <a target="_blank" href="{{ url('registration') }}" class="btn btn-secondary rounded-pill">Become A Blogger</a>
          </div>
        </div>
  </div>
</section> --}}
<!-- End -->

{{-- <section class="SEO-setion">
  <span id="seo" class="scrollsection"></span>
  <div class="colorbg-head">
    <div class="container">
      <h2 class="text-center">Advertisement </h2>
    </div>
  </div>

  <div class="container">
    <div class="tabs__sections">
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item"><a class="nav-link active" href="#SEO2" role="tab" data-toggle="tab">WHAT IS SEO?</a></li>
        <li class="nav-item"><a class="nav-link" href="#SEO3" role="tab" data-toggle="tab">AFFORDABLE</a></li>
        <li class="nav-item"><a class="nav-link" href="#SEO4" role="tab" data-toggle="tab">SUCCESS GUARANTEE</a></li>
        <li class="nav-item"><a class="nav-link" href="#SEO5" role="tab" data-toggle="tab">SERVICES</a></li>
        <li class="nav-item"><a class="nav-link" href="#SEO6" role="tab" data-toggle="tab">COMPARISON</a></li>
        <li class="nav-item"><a class="nav-link" href="#SEO7" role="tab" data-toggle="tab">WHY THIS PRICE?</a></li>
        <!-- <li class="nav-item"><a class="nav-link" href="#SEO8" role="tab" data-toggle="tab">USE CASE</a></li> -->
        <li class="nav-item"><a class="nav-link" href="#SEO9" role="tab" data-toggle="tab">TERMS (T&C)</a></li>
      </ul>
      
      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade show active" id="SEO2">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('front/images/home/pricing/social-media')}}.png" alt="SEO"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <h4>SEO is Search Engine Optimization. It is all the activities that deliver the final result of having content appear on page 1 of search results for target keywords across platforms like Google, Facebook, YouTube, Linkedin, etc.</h4>
                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade show" id="SEO3">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('front/images/home/content/affordable.png')}}" class="rounded img-fluid" alt="Pharma Product Launch"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <h4>We work with a monthly retainer, so there is no lumpsum payment like Bazooka.
                  We accept payment in a variety of ways - venmo, zelle, ACH, EFT, Wire, Cash.</h4>
                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade show" id="SEO4">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('front/images/home/bazooka/success-guarantee')}}.jpg" class="rounded w-100" alt="SUCCESS GUARANTEE"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <h4>Success Guaranteed or your money back. All deliveries have tangible & specific outcomes which we guarantee will be realized in an approximate timeframe.</h4>
                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade show" id="SEO5">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('front/images/home/bazooka/services.png')}}" class="rounded w-100" alt="Services"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <h4>All services have 1 goal - to appear on Google page 1 for target keywords.  Services include but not limited to:</h4>
                <div class="lists__style">
                  <ul>
                    <li><b>Keyword Research, Analysis & Keyword Strategy:</b> Before starting any project we must have a keyword strategy that align with the business objectives. The keyword strategy identities those keywords that customers use to find the services the client provides. The keyword strategy also identifies keyword opportunities ie keywords which the competition has overlooked, as well as keywords which we can rank #1 on Google for. This should be done every 6 months since customer search trends change and we must keep pace with these trends to stay relevant to the customers we want to be visible to on Google.</li>
                    <li><b>On-page Optimization:</b> Optimizing the website and the content on the website in the frontend and backend with the keyword strategy so that the website appears on page 1 of search results for target keywords.</li>
                    <li><b>Off-page optimization:</b> All the activities not connected to the website like social media marketing which are aimed at creating content which will appear on Google page 1. 
                    <h6 class="mt-3">This includes:</h6>
                    <ul>
                      <li>Creating YouTube Shorts, Reels, Stories (vertical video) for YouTube, TikTok, Instagram.</li>
                      <li>Creating Landscape video (16:9 aspect ratio) for Facebook, YouTube, Linkedin.</li>
                      <li>Creating Image content with associated captions for Instagram, Linkedin and Facebook.</li>
                      <li>Creating tweets for Twitter/X and Threads.</li>
                      <li>Creating Long form content ie blog articles of 1500 characters each published on Blogspot, Medium, Tumblr & wordpress.</li>
                      <li>Designing social media channels like Twitter/X, Facebook, YouTube, Instagram, TikTok, Linkedin, etc.</li>
                    </ul>
                    </li>
                  </ul>
                </div>
                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade show" id="SEO6">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('front/images/home/bazooka/comparison.png')}}" class="rounded w-100" alt="Comparison"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <div class="table-content">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col" style="background-color: #f15a24; color: #fff;">
                          SEO Particulars
                        </th>
                        <th scope="col" style="background-color: #ffd3e4;">
                          Google SEO
                        </th>
                        <th scope="col" style="background-color: #ffe4d2;">
                          YouTube SEO
                        </th>
                        <th scope="col" style="background-color: #ceffe4;">
                          Facebook SEO
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row" style="font-size: 16px;">SEO Focus: To Appear in Search Results on</th>
                        <td>Google</td>
                        <td>YouTube</td>
                        <td>Facebook</td>
                      </tr>
                      <tr>
                        <th scope="row" style="font-size: 16px;">Keyword Research, Keyword Strategy</th>
                        <td>Yes</td>
                        <td>Yes</td>
                        <td>Yes</td>
                      </tr>
                      <tr>
                        <th scope="row" style="font-size: 16px;">Search Results include</th>
                        <td>Content Anywhere on the Internet</td>
                        <td>Content only on YouTube</td>
                        <td>Content only on Facebook</td>
                      </tr>
                      <tr>
                        <th scope="row" style="font-size: 16px;">Tabbed Search Result</th>
                        <td>Yes</td>
                        <td>No</td>
                        <td>Yes</td>
                      </tr>
                      <tr>
                        <th scope="row" style="font-size: 16px;">Tabbed Search Result</th>
                        <td>All, Images, Videos, News</td>
                        <td>No</td>
                        <td>All, Posts, People, Photos, Videos, Pages, Groups</td>
                      </tr>
                    </tbody>
                  </table>
                  <p class="star-notes">*No Guarantee for how long the delivered outcome will last once retainer is paused. The link is less likely to return to Google page 1 once it has been pushed to Google page 4 or beyond.</p>
                </div>
                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade show" id="SEO7">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('front/images/home/bazooka/why-this')}}-price.jpg" class="rounded w-100" alt="Why This Price"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <span class="price-monthly">Monthly Retainers start at $3000/month</span>
                <h4>Why This price?</h4>
                <div class="lists__style">
                  <ul>
                    <li>Price is driven by complexity of the ask. Higher the complexity, greater is the price.</li>
                    <li>Price is also driven by where the client is. For example, if the client is an unknown brand, we must change that reality which will take time. Also, if the client is battling a negative association, then, that association must be dispelled before we can reset the narrative.</li>
                    <li>Price is also driven by market relocs. Since we've been delivering success to clients for over a decade our resources are in very high demand and since we have a limited number of magicians or specialists on staff, it ends up becoming a bidding war similar to what happens on google paid ads where the winning bid gets the coveted spot. Is it for this reason that our quotes expire in 48-72 hours.</li>
                    <li>Clients like working with a proven system and companies that consistently deliver results whilst providing a white glove premium experience to clients. Such clients are happy to pay premium prices for premium services, which is probably why they drive german imports, fly business class, stay at 5 star hotels, dine at Michelin star restaurants and choose to hire rsquare media. If thats not you, no biggie, we have a long wait-list of clients who have already paid us hefty advances and are eagerly awaiting us to begin working with them.</li>
                  </ul>
                </div>

                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade show" id="SEO9">
          <div class="tabs__content">
            <div class="row">
              <div class="col-lg-3">
                <div class="img-cats"><img src="{{url('front/images/home/bazooka/tc.png')}}" class="rounded w-100" alt="Terms"/></div>
              </div>
              <div class="col-lg-9 ps-lg-5 align-self-center pt-4 pt-lg-0 mobile-center-text">
                <h4>TERMS (T&C)</h4>
                <div class="lists__style">
                  <ul>
                    <li>We guarantee Bazooka results (removing bad content from Google or the internet) will last for atleast 3 months.</li>
                    <li>If the same link reappears within that window for the same keyword, we will deliver success again at no additional cost to you.</li>
                    <li>if we are unable to deliver results per our proposal & timeline mentioned therein, the client has the option of requesting a refund.</li>
                    <li>We offer 55% refunds which are processed the same business day they are requested in writing, provided we receive the request before 12pm EST. If the refund request comes later, its processed the next business day.</li>
                    <li>If any link cannot be removed from Google, we can deploy our RELOCATION service. Relocation uses a suppression strategy such that our friendly content replaces the bad content and the bad content moves from Google page 1 to Google page 2 and beyond of the search results.</li>
                    <li>RELOCATION is a monthly retainer and usually takes at least 6 months before any outcomes are realized. Speed of outcomes may vary depending on complexity and the nuances of the Google algorithm at that moment in time.</li>
                    <li>The client’s refund amount is used to fund the Relocation effort, so we can expedite the transition to deliver the fastest result.</li>
                    <li>We offer no guarantees on how long the effect will last once the campaign is paused.</li>
                  </ul>
                  <h4>General Terms & Conditions</h4>
                  <ul>
                    <li>Work begins after payment is received & funds confirmed.</li>
                    <li>Speed of delivery relies on Client’s speed of communication & approval.</li>
                    <li>Client is responsible for sharing relevant logins, and brand related content in Windows friendly electronic format like jpg, pdf, word doc, mp4 etc.</li>
                    <li>No refunds unless explicitly mentioned in proposal.</li>
                    <li>Days are business days not calendar days.</li>
                    <li>Any quote expires in 1 week.</li>
                  </ul>
                </div>
                <div class="d-md-flex mt-4">
                  <div class="freequote-btn ms-md-5 mt-4 mt-md-0">
                    <a href="https://calendly.com/rsquaremedia/" target="_blank" class="btn btn-primary rounded-pill">Request a Free Quote</a>
                    <span class="text-dark">Misery Is History</span>
                  </div>
                  <div class="req__demo ml-auto"><a target="_blank" href="https://calendly.com/rsquaremedia/" class="btn btn-secondary rounded-pill ms-auto px-4">Talk to an Expert</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>  --}}
@endsection