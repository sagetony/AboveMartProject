@include('home.head')
@include('home.header')
<!-- PAGE TITLE
        ================================================== -->
        <section class="top-position1 py-0">
            <div class="page-title-section bg-img cover-background left-overlay-dark" data-overlay-dark="7" data-background="img/bg/bg-03.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>About Us</h1>
                            <div class="breadcrumb">
                                <ul>
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li><a href="#!">Pages</a></li>
                                    <li><a href="#!">About Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <span class="page-title-shape1 d-none d-sm-block"></span>
            <span class="page-title-shape2 d-none d-sm-block"></span>
            <div class="d-inline-block p-2 border-secondary border border-width-2 position-absolute left-5 bottom-10 bottom-sm-25 ani-left-right z-index-1"></div>
            <div class="d-inline-block p-2 bg-secondary rounded-circle position-absolute right-40 top-25 ani-move z-index-1"></div>
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
                  <img src="img/content/about-05.jpg" alt="..." />
                  <span class="about-shape1"></span>
                  <span class="about-shape2"></span>
                </div>
                <img
                  src="img/content/about-04.jpg"
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

        <!-- EXTRA
        ================================================== -->
       

@include('home.team')
@include('home.whyus')
@include('home.counter')
@include('home.testimonies')
@include('home.footer')