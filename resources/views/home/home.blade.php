@include('home.head')
@include('home.header')

      <!-- BANNER
        ================================================== -->
      <section class="p-0 full-screen banner1 top-position1">
        <div class="slider-fade owl-carousel owl-theme w-100 min-vh-100">
          <div
            class="item bg-img cover-background"
            data-overlay-dark="7"
            data-background="img/banner/banner-01.jpg"
          >
            <div class="container d-flex flex-column">
              <div class="row align-items-center min-vh-100">
                <div class="col-md-10 col-lg-8">
                  <h1 class="mb-2-2 title">
                    Explore The
                    <span class="font-weight-400">World With AboveMarts</span>
                  </h1>
                  <p
                    class="display-28 w-sm-95 w-md-90 mb-2-2 opacity8 d-none d-sm-block"
                  >
                  Enjoy easy access to telecom and internet services with AboveMarts. A reliable, superfast and trusted digital service provider.

                  </p>
                  <a href="{{ route('aboutus') }}" class="butn me-2 my-1 my-sm-0">
                    <span>Read More</span>
                  </a>
                  <a href="{{ route('contact') }}" class="butn secondary my-1 my-sm-0"
                    >Contact Us</a
                  >
                </div>
              </div>
            </div>
          </div>
          <div
            class="item bg-img cover-background"
            data-overlay-dark="7"
            data-background="img/banner/banner-02.jpg"
          >
            <div class="container d-flex flex-column">
              <div
                class="row justify-content-center justify-content-sm-start align-items-center min-vh-100"
              >
                <div class="col-md-10 col-lg-8">
                  <h1 class="mb-2-2 title">
                    Life Made Easy
                    <span class="font-weight-400">With Abovemarts</span>
                  </h1>
                  <p
                    class="display-28 w-sm-95 w-md-90 mb-2-2 opacity8 d-none d-sm-block"
                  >
                  Enjoy easy access to telecom and internet services with AboveMarts. A reliable, superfast and trusted digital service provider.
                  </p>
                 <a href="{{ route('aboutus') }}" class="butn me-2 my-1 my-sm-0">
                    <span>Read More</span>
                  </a>
                  <a href="{{ route('contact') }}" class="butn secondary my-1 my-sm-0"
                    >Contact Us</a
                  >
                </div>
              </div>
            </div>
          </div>
          {{-- <div
            class="item bg-img cover-background"
            data-overlay-dark="7"
            data-background="img/banner/banner-03.jpg"
          >
            <div class="container d-flex flex-column">
              <div
                class="row justify-content-center justify-content-sm-start align-items-center min-vh-100"
              >
                <div class="col-md-10 col-lg-8">
                  <h1 class="mb-2-2 title">
                    All Entertainment
                    <span class="font-weight-400">One Solutions</span>
                  </h1>
                  <p
                    class="display-28 w-sm-95 w-md-90 mb-2-2 opacity8 d-none d-sm-block"
                  >
                    We offer the excessive speed, secure, and dependable net
                    connection that helps you to do what you like online.
                  </p>
                 <a href="{{ route('aboutus') }}" class="butn me-2 my-1 my-sm-0">
                    <span>Read More</span>
                  </a>
                  <a href="{{ route('contact') }}" class="butn secondary my-1 my-sm-0"
                    >Contact Us</a
                  >
                </div>
              </div>
            </div>
          </div> --}}
        </div>
        <span class="banner-shape1 ani-top-bottom d-none d-md-block"></span>
        <span class="banner-shape2 d-none d-md-block"></span>
        <div
          class="d-none d-sm-inline-block px-1-9 py-1-6 border position-absolute left bottom-5 border-radius-5 z-index-3"
        ></div>
        <div
          class="d-none d-sm-inline-block px-1-9 py-1-6 bg-secondary position-absolute left-5 bottom-10 border-radius-5 z-index-2"
        ></div>
        <div
          class="d-inline-block p-2 bg-secondary rounded-circle position-absolute right-20 bottom-25 ani-move z-index-2"
        ></div>
        <div
          class="d-inline-block p-2 bg-white rounded-circle position-absolute left-15 top-20 ani-move z-index-2"
        ></div>
      </section>

      <!-- OUR SERVICES
        ================================================== -->
      <section class="p-0 overflow-visible">
        <div class="container">
          <div class="service-style1 pt-6 pt-lg-0">
            <div class="row g-0 align-items-center">
              <div
                class="col-lg-4 mb-5 mb-lg-0 wow fadeIn"
                data-wow-delay="100ms"
              >
                <div class="px-5">
                  <div class="section-heading text-start mb-0">
                    <span class="subtitle">Our Services</span>
                    <h2 class="mb-0 w-100">
                      Explore Our
                      <span class="font-weight-400">Best Services</span>
                    </h2>
                  </div>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="row g-0">
                  <div class="col-md-6 wow fadeIn" data-wow-delay="200ms">
                    <div class="card border-0 card-style1 active h-100">
                      <div class="card-body">
                        <div class="card-icon">
                          <img
                            src="img/icons/icon-01.png"
                            class="mb-4"
                            alt="..."
                          />
                          <span class="round-shape"></span>
                        </div>
                        <h4 class="mb-4">
                          <a href="#">Recharge Card Purchase</a>
                        </h4>
                        {{-- <p class="mb-0">
                          High-speed Internet get right of entry to this is
                          constantly on & fast.
                        </p> --}}
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 wow fadeIn" data-wow-delay="400ms">
                    <div class="card border-0 card-style1 h-100">
                      <div class="card-body">
                        <div class="card-icon">
                          <img
                            src="img/icons/icon-02.png"
                            class="mb-4"
                            alt="..."
                          />
                          <span class="round-shape"></span>
                        </div>
                        <h4 class="mb-4">
                          <a href="#">Internet Data Purchase</a>
                        </h4>
                      
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 wow fadeIn" data-wow-delay="200ms">
                    <div class="card border-0 card-style1 h-100">
                      <div class="card-body">
                        <div class="card-icon">
                          <img
                            src="img/icons/icon-03.png"
                            class="mb-4"
                            alt="..."
                          />
                          <span class="round-shape"></span>
                        </div>
                        <h4 class="mb-4">
                          <a href="#">DSTV/GOTV Subscription</a>
                        </h4>
                        
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 wow fadeIn" data-wow-delay="400ms">
                    <div class="card border-0 card-style1 h-100">
                      <div class="card-body">
                        <div class="card-icon">
                          <img
                            src="img/icons/icon-06.png"
                            class="mb-4"
                            alt="..."
                          />
                          <span class="round-shape"></span>
                        </div>
                        <h4 class="mb-4">
                          <a href="#">Electricity Bills</a>
                        </h4>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div
          class="d-inline-block p-2 border-secondary border border-width-2 position-absolute left-5 bottom-25 ani-left-right"
        ></div>
        <div
          class="d-inline-block p-2 bg-primary rounded-circle position-absolute left-10 top-25 ani-move"
        ></div>
      </section>

      <!-- ABOUTUS
        ================================================== -->
        <section
        class="bg-light pt-16 pt-md-18 pt-lg-22 about-style1 overflow-visible"
      >
        <div class="container">
          <div class="row align-items-xl-center">
            <div
              class="col-lg-6 mb-1-9 mb-sm-2-2 mb-lg-0 wow fadeIn"
              data-wow-delay="200ms"
            >
              <div class="position-relative">
                <div
                  class="text-center text-sm-end text-md-center text-lg-end pe-xxl-1-9 overflow-hidden position-relative"
                >
                  <img src="img/content/about-01.jpg" alt="..." />
                  <span class="about-shape1"></span>
                  <span class="about-shape2"></span>
                </div>
                <img
                  src="img/content/about-02.jpg"
                  class="border-radius-10 position-absolute top-15 d-none d-sm-block"
                  alt="..."
                />
                <div
                  class="bg-white text-center border-radius-10 p-1-9 d-inline-block position-absolute bottom-10 left-10"
                >
                  <h4 class="h1"><span class="countup">4</span>+</h4>
                  <span>Years of experience</span>
                </div>
              </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="400ms">
              <div class="ps-xl-6">
                <h2 class="h1 mb-4 font-weight-700">
                  Discover A Wider
                  <span class="font-weight-400">World Of Telecom</span>
                </h2>
                <p class="lead text-primary">
                  Above market is an online telecom market which is authentic and reliable. 
                  We provide a range of services that are impeccable and necessary for daily activities.</p>
                  <p>
                    Abovemart provides a revolutionary approach to network services and solutions to network/ cable related issues. 
                  </p>
                  <p >
                    Our mission is to become the number one telecom service
                     provider in Nigeria and Africa at large. Our services span from various categories including; printing of recharge card, cheap data bundles, bulk SMS, sell and 
                    shop online, airtime E- top up, POS money transfer, electricity payment, cable Tv subscription and much more... 
                  </p>
                  <p class="">
                    Our services are designed to ensure total convenience and customer satisfaction. Abovemart is dedicated towards transforming the lives of our community, customers and families by ensuring their day to day payment for product and services is stress free and convenient. We offer affordable price value
                     for our products/services and also devoted costumer care service. Join us and enjoy our unlimited services and benefits.
                  </p>
                <p class="mb-4">
                  Thank you and we hope you enjoy your experience with us.
                </p>
                <div class="about-list mb-3 active">
                  <div class="d-flex align-items-center">
                    <i class="ti-check text-primary display-26"></i>
                    <div class="ms-3">
                      <h4 class="h6 mb-0">Reliable</h4>
                    </div>
                  </div>
                </div>
                <div class="about-list mb-3">
                  <div class="d-flex align-items-center">
                    <i class="ti-check text-primary display-26"></i>
                    <div class="ms-3">
                      <h4 class="h6 mb-0">
                        Superfast
                      </h4>
                    </div>
                  </div>
                </div>
                <div class="about-list">
                  <div class="d-flex align-items-center">
                    <i class="ti-check text-primary display-26"></i>
                    <div class="ms-3">
                      <h4 class="h6 mb-0">Tested and trusted</h4>
                    </div>
                  </div>
                </div>
                <div class="mt-1-9">
                  <div class="d-flex align-items-center">
                    <div
                      class="bg-img px-7 text-center py-3 cover-background border-radius-10 border-primary border border-width-3"
                      data-background="img/content/about-03.jpg"
                    >
                      <div class="z-index-1 position-relative">
                        <a
                          class="popup-social-video"
                          href="https://www.youtube.com/watch?v=yd1JhZzoS6A"
                          ><i class="fas fa-play display-20 text-primary"></i
                        ></a>
                      </div>
                    </div>
                    <div class="ms-2 ms-md-5">
                      <h4 class="mb-0 h5">Steve Everest</h4>
                      <span class="small">Senior Executive</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <img
          src="img/content/line-01.png"
          class="position-absolute top-n15 right-5 ani-top-bottom"
          alt="..."
        />
      </section>

      <!-- COUNTER
        ================================================== -->
     @include('home.counter')

      <!-- WHY CHOOSE US
        ================================================== -->
     @include('home.whyus')
      <!-- OFFER
        ================================================== -->
      <section class="py-0">
        <div class="container-fluid px-lg-0">
          <div class="row g-0 overlap-column">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="200ms">
              <div
                class="bg-dark py-6 py-lg-8 py-xl-10 py-xxl-13 px-1-9 px-xxl-9 border-radius-10 position-relative"
              >
                <div class="w-lg-80 mx-auto">
                  <h2 class="h1 font-weight-700 text-white mb-4">
                    We Deliver The
                    <span class="font-weight-400">Best Services</span>
                  </h2>
                  <p class="mb-1-9 text-white opacity8">
                    AboveMarts is an online telecom market which is authentic and reliable. 
                    We provide a range of services that are impeccable and necessary for daily activities. To be a need in each
                    workplace and domestic settings.
                  </p>
                  <p class="mb-1-9 text-white opacity8">
                    Abovemart provides a revolutionary approach to network services and solutions to network/ cable related issues. 
                  </p>
                  <div class="d-flex align-items-center mb-1-9">
                    <div class="flex-shrink-0">
                      <img src="img/icons/icon-01.png" alt="..." />
                    </div>
                    <div class="flex-grow-1 ms-4">
                      <h5 class="text-white">Enjoy Our Affiliate Program</h5>
                      <span class="text-white"
                        >Every Great Product or Service always comes with Great Business Opportunity.</span
                      >
                    </div>
                  </div>
                  <a href="{{ route('aboutus') }}" class="butn small">Get Started</a>
                </div>
              </div>
            </div>
            <div
              class="col-lg-6 bg-img cover-background border-radius-10 wow fadeIn"
              data-wow-delay="400ms"
              data-overlay-dark="0"
              data-background="img/content/01.jpg"
            >
              <span class="offer-shape1"></span>
              <span class="offer-shape2"></span>
            </div>
          </div>
        </div>
      </section>

      <!-- PRICING PLANS
        ================================================== -->
     @include('home.plans')
@include('home.team')
@include('home.testimonies')
      <!-- STREAMING
        ================================================== -->
      {{-- <section
        class="bg-img cover-background"
        data-overlay-dark="8"
        data-background="img/bg/bg-02.jpg"
      >
        <div class="container-fluid px-7">
          <div
            class="section-heading white z-index-2 wow fadeIn"
            data-wow-delay="100ms"
          >
            <span class="subtitle white">Now Streaming</span>
            <h2 class="text-white">
              Popular Shows <span class="font-weight-400">Now Streaming</span>
            </h2>
          </div>
          <div class="stream-carousel02 owl-carousel owl-theme stream-style">
            <div class="stream-wrapper">
              <div class="stream-img overflow-hidden rounded mb-4">
                <img
                  src="img/content/stream-17.jpg"
                  alt="..."
                  class="rounded"
                />
              </div>
              <div class="content">
                <h4 class="mb-0 h5">
                  <a href="#!" class="text-white">Music Channels</a>
                </h4>
              </div>
            </div>
            <div class="stream-wrapper">
              <div class="stream-img overflow-hidden rounded mb-4">
                <img
                  src="img/content/stream-18.jpg"
                  alt="..."
                  class="rounded"
                />
              </div>
              <div class="content">
                <h4 class="mb-0 h5">
                  <a href="#!" class="text-white">Fashion News Reports</a>
                </h4>
              </div>
            </div>
            <div class="stream-wrapper">
              <div class="stream-img overflow-hidden rounded mb-4">
                <img
                  src="img/content/stream-19.jpg"
                  alt="..."
                  class="rounded"
                />
              </div>
              <div class="content">
                <h4 class="mb-0 h5">
                  <a href="#!" class="text-white">Discovery Channel</a>
                </h4>
              </div>
            </div>
            <div class="stream-wrapper">
              <div class="stream-img overflow-hidden rounded mb-4">
                <img
                  src="img/content/stream-20.jpg"
                  alt="..."
                  class="rounded"
                />
              </div>
              <div class="content">
                <h4 class="mb-0 h5">
                  <a href="#!" class="text-white">Sports & action</a>
                </h4>
              </div>
            </div>
            <div class="stream-wrapper">
              <div class="stream-img overflow-hidden rounded mb-4">
                <img
                  src="img/content/stream-21.jpg"
                  alt="..."
                  class="rounded"
                />
              </div>
              <div class="content">
                <h4 class="mb-0 h5">
                  <a href="#!" class="text-white">Cartoon Channel</a>
                </h4>
              </div>
            </div>
            <div class="stream-wrapper">
              <div class="stream-img overflow-hidden rounded mb-4">
                <img
                  src="img/content/stream-22.jpg"
                  alt="..."
                  class="rounded"
                />
              </div>
              <div class="content">
                <h4 class="mb-0 h5">
                  <a href="#!" class="text-white">Family Weekend</a>
                </h4>
              </div>
            </div>
          </div>
        </div>
        <span class="streaming-shape2"></span>
      </section> --}}

      <!-- BLOG
        ================================================== -->
      {{-- <section>
        <div class="container">
          <div class="section-heading wow fadeIn" data-wow-delay="100ms">
            <span class="subtitle">Our Blog</span>
            <h2>
              Check Our <span class="font-weight-400">Recent Articles</span>
            </h2>
          </div>
          <div class="row mt-n1-9">
            <div
              class="col-md-6 col-lg-4 mt-1-9 wow fadeInUp"
              data-wow-delay="200ms"
            >
              <article class="card card-style2">
                <img
                  src="img/blog/blog-01.jpg"
                  class="border-radius-10"
                  alt="..."
                />
                <div class="card-body">
                  <div class="blog-info ms-3">
                    <div class="d-flex align-items-center">
                      <div class="flex-shrink-0">
                        <img
                          class="rounded-circle"
                          src="img/avatar/avatar-07.jpg"
                          alt="..."
                        />
                      </div>
                      <div class="flex-grow-1 ms-3">
                        <h5 class="mb-1 h6 text-capitalize">
                          <a href="#!">Nuguse Tesfay</a>
                        </h5>
                        <span class="display-30">Mar 15, 2022</span>
                      </div>
                    </div>
                  </div>
                  <h4 class="mb-3">
                    <a href="blog-details.html"
                      >We newly added some comedy channels this week.</a
                    >
                  </h4>
                  <p class="mb-3">
                    AboveMarts internet changed into described as being quicker
                    than a conventional dial-up net connection.
                  </p>
                  <a class="link-btn text-secondary" href="blog-details.html"
                    ><span class="link-text">Read More</span></a
                  >
                </div>
              </article>
            </div>
            <div
              class="col-md-6 col-lg-4 mt-1-9 wow fadeInUp"
              data-wow-delay="400ms"
            >
              <article class="card card-style2">
                <img
                  src="img/blog/blog-02.jpg"
                  class="border-radius-10"
                  alt="..."
                />
                <div class="card-body">
                  <div class="blog-info ms-3">
                    <div class="d-flex align-items-center">
                      <div class="flex-shrink-0">
                        <img
                          class="rounded-circle"
                          src="img/avatar/avatar-08.jpg"
                          alt="..."
                        />
                      </div>
                      <div class="flex-grow-1 ms-3">
                        <h5 class="mb-1 h6 text-capitalize">
                          <a href="#!">Lea Schuster</a>
                        </h5>
                        <span class="display-30">Mar 12, 2022</span>
                      </div>
                    </div>
                  </div>
                  <h4 class="mb-3">
                    <a href="blog-details.html"
                      >Advanced security to protect stay safe online device.</a
                    >
                  </h4>
                  <p class="mb-3">
                    AboveMarts internet changed into described as being quicker
                    than a conventional dial-up net connection.
                  </p>
                  <a class="link-btn text-secondary" href="blog-details.html"
                    ><span class="link-text">Read More</span></a
                  >
                </div>
              </article>
            </div>
            <div
              class="col-md-6 col-lg-4 mt-1-9 wow fadeInUp"
              data-wow-delay="600ms"
            >
              <article class="card card-style2">
                <img
                  src="img/blog/blog-03.jpg"
                  class="border-radius-10"
                  alt="..."
                />
                <div class="card-body">
                  <div class="blog-info ms-3">
                    <div class="d-flex align-items-center">
                      <div class="flex-shrink-0">
                        <img
                          class="rounded-circle"
                          src="img/avatar/avatar-09.jpg"
                          alt="..."
                        />
                      </div>
                      <div class="flex-grow-1 ms-3">
                        <h5 class="mb-1 h6 text-capitalize">
                          <a href="#!">Marcel Boehm</a>
                        </h5>
                        <span class="display-30">Mar 09, 2022</span>
                      </div>
                    </div>
                  </div>
                  <h4 class="mb-3">
                    <a href="blog-details.html"
                      >Internet speed for day today online trading.</a
                    >
                  </h4>
                  <p class="mb-3">
                    AboveMarts internet changed into described as being quicker
                    than a conventional dial-up net connection.
                  </p>
                  <a class="link-btn text-secondary" href="blog-details.html"
                    ><span class="link-text">Read More</span></a
                  >
                </div>
              </article>
            </div>
          </div>
        </div>
      </section> --}}
@include('home.footer')