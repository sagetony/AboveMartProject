@include('home.head')
@include('home.header')
  <!-- PAGE TITLE
        ================================================== -->
        <section class="top-position1 py-0">
            <div class="page-title-section bg-img cover-background left-overlay-dark" data-overlay-dark="7" data-background="img/bg/bg-03.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Our Services</h1>
                            <div class="breadcrumb">
                                <ul>
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li><a href="#!">Services</a></li>
                                    <li><a href="#!">Our Services</a></li>
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

        <!-- OUR SERVICES
        ================================================== -->
        <section>
            <div class="container">
                <div class="section-heading wow fadeIn" data-wow-delay="100ms">
                    <span class="subtitle">Our Services</span>
                    <h2>Explore Our <span class="font-weight-400">Best Services</span></h2>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                        <div class="card border-0 card-style1">
                            <div class="card-body">
                                <div class="card-icon">
                                    <img src="img/icons/icon-01.png" class="mb-4" alt="...">
                                    <span class="round-shape"></span>
                                </div>
                                <h4 class="mb-4"><a href="#">Recharge Card Purchase</a></h4>
                                <p class="mb-0">High-speed Internet get right of entry to this is constantly on & fast.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="300ms">
                        <div class="card border-0 card-style1">
                            <div class="card-body">
                                <div class="card-icon">
                                    <img src="img/icons/icon-02.png" class="mb-4" alt="...">
                                    <span class="round-shape"></span>
                                </div>
                                <h4 class="mb-4"><a href="#">Internet Data Purchase</a></h4>
                                <p class="mb-0">High-speed Internet get right of entry to this is constantly on & fast.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="400ms">
                        <div class="card border-0 card-style1">
                            <div class="card-body">
                                <div class="card-icon">
                                    <img src="img/icons/icon-03.png" class="mb-4" alt="...">
                                    <span class="round-shape"></span>
                                </div>
                                <h4 class="mb-4"><a href="#">DSTV/GOTV Subscription</a></h4>
                                <p class="mb-0">High-speed Internet get right of entry to this is constantly on & fast.</p>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="500ms">
                        <div class="card border-0 card-style1">
                            <div class="card-body">
                                <div class="card-icon">
                                    <img src="img/icons/icon-04.png" class="mb-4" alt="...">
                                    <span class="round-shape"></span>
                                </div>
                                <h4 class="mb-4"><a href="satellite-tv.html">Satellite TV</a></h4>
                                <p class="mb-0">High-speed Internet get right of entry to this is constantly on & fast.</p>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="600ms">
                        <div class="card border-0 card-style1">
                            <div class="card-body">
                                <div class="card-icon">
                                    <img src="img/icons/icon-05.png" class="mb-4" alt="...">
                                    <span class="round-shape"></span>
                                </div>
                                <h4 class="mb-4"><a href="mobile-connection.html">Mobile Connection</a></h4>
                                <p class="mb-0">High-speed Internet get right of entry to this is constantly on & fast.</p>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="700ms">
                        <div class="card border-0 card-style1">
                            <div class="card-body">
                                <div class="card-icon">
                                    <img src="img/icons/icon-06.png" class="mb-4" alt="...">
                                    <span class="round-shape"></span>
                                </div>
                                <h4 class="mb-4"><a href="#">Electricity Bills</a></h4>
                                <p class="mb-0">High-speed Internet get right of entry to this is constantly on & fast.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-inline-block px-5 py-6 border border-secondary position-absolute right-5 top-5 border-radius-10 ani-top-bottom"></div>
            <div class="d-inline-block p-2 bg-secondary rounded-circle position-absolute left-5 bottom-25 ani-move"></div>
        </section>
@include('home.footer')