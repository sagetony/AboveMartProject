@include('home.head')
@include('home.header')
   <!-- PAGE TITLE
        ================================================== -->
        <section class="top-position1 py-0">
            <div class="page-title-section bg-img cover-background left-overlay-dark" data-overlay-dark="7" data-background="img/bg/bg-03.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Our Packages</h1>
                            <div class="breadcrumb">
                                <ul>
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li><a href="#!">Pages</a></li>
                                    <li><a href="#!">Our Packages</a></li>
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

@include('home.plans')

        <!-- APPOINTMENT
        ================================================== -->
        <section class="bg-img cover-background pb-lg-0 overflow-visible min-height-500 mb-0 mb-lg-6" data-overlay-dark="7" data-background="img/bg/bg-06.jpg">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-2-5 mb-lg-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-wrapper p-1-9 p-md-2-9">
                                    
                                    <form class="contact quform" action="" method="post" enctype="multipart/form-data" onclick="">
                                        <div class="quform-elements">
                                            <div class="row">
                                                <h2 class="h3">Drop Message For Any Query</h2>
                                                <p>We are committed to providing excellent service for our customers.</p>
                                                <!-- Begin Text input element -->
                                                <div class="col-md-6">
                                                    <div class="quform-element form-group">
                                                        <label for="name">Your Name <span class="quform-required">*</span></label>
                                                        <div class="quform-input">
                                                            <input class="form-control" id="name" type="text" name="name" placeholder="Your name here">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Text input element -->

                                                <!-- Begin Text input element -->
                                                <div class="col-md-6">
                                                    <div class="quform-element form-group">
                                                        <label for="email">Your Email <span class="quform-required">*</span></label>
                                                        <div class="quform-input">
                                                            <input class="form-control" id="email" type="text" name="email" placeholder="Your email here">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Text input element -->

                                                <!-- Begin Text input element -->
                                                <div class="col-md-6">
                                                    <div class="quform-element form-group quform-select-replaced">
                                                        <label for="subject">Your Subject <span class="quform-required">*</span></label>
                                                        <div class="quform-input">
                                                            <input class="form-control" id="subject" type="text" name="subject" placeholder="Your subject here">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Text input element -->

                                                <!-- Begin Text input element -->
                                                <div class="col-md-6">
                                                    <div class="quform-element form-group">
                                                        <label for="phone">Contact Number</label>
                                                        <div class="quform-input">
                                                            <input class="form-control" id="phone" type="text" name="phone" placeholder="Your phone here">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Text input element -->

                                                <!-- Begin Textarea element -->
                                                <div class="col-md-12">
                                                    <div class="quform-element form-group">
                                                        <label for="message">Message <span class="quform-required">*</span></label>
                                                        <div class="quform-input">
                                                            <textarea class="form-control" id="message" name="message" rows="3" placeholder="Tell us a few words"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Textarea element -->

                                                <!-- Begin Captcha element -->
                                                <div class="col-md-12">
                                                    <div class="quform-element">
                                                        <div class="form-group">
                                                            <div class="quform-input">
                                                                <input class="form-control" id="type_the_word" type="text" name="type_the_word" placeholder="Type the below word">
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <!-- End Captcha element -->

                                                <!-- Begin Submit button -->
                                                <div class="col-md-12">
                                                    <div class="quform-submit-inner">
                                                        <button class="butn" type="submit">Send Message</button>
                                                    </div>
                                                    <div class="quform-loading-wrap text-start"><span class="quform-loading"></span></div>
                                                </div>
                                                <!-- End Submit button -->

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ps-lg-2-5 ps-xl-7">
                            <h2 class="h1 text-white mb-4 font-weight-700">We Deliver The <span class="font-weight-400">Best Services</span></h2>
                            <p class="text-white opacity9 mb-1-9 w-90">:  Abovemart explores, transforms the way telecom services are rendered. We offer a range of services that suit your needs.</p>
                            <ul class="address-list">
                                <li>
                                    <span class="d-inline-block align-middle"><i class="fas fa-map-marker-alt text-primary align-middle"></i></span>
                                    <span class="d-inline-block align-middle ps-2 text-white">                        E-Business Hub Building Material Jos, Plateau, Nigeria.</span>
                                </li>
                                <li>
                                    <span class="d-inline-block align-middle"><i class="far fa-envelope text-primary align-middle"></i></span>
                                    <span class="d-inline-block align-middle ps-2 text-white">info@aboveMarts.com
</span>
                                </li>
                                <li>
                                    <span class="d-inline-block align-middle"><i class="fas fa-phone text-primary align-middle"></i></span>
                                    <span class="d-inline-block align-middle ps-2 text-white">(+234) 904 538 9977</span>
                                </li>
                                <li>
                                    <span class="d-inline-block align-middle"><i class="ti-calendar text-primary align-middle"></i></span>
                                    <span class="d-inline-block align-middle ps-2 text-white">Mon - Fri:<span class="ps-2">9:00am - 5:00pm</span></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- INCLUDED IN PACKAGE
        ================================================== -->
        {{-- <section class="pb-0">
            <div class="container">
                <div class="section-heading wow fadeIn" data-wow-delay="100ms">
                    <span class="subtitle">Our Services</span>
                    <h2 class="w-100">Find Perfect <span class="font-weight-400">Network Solutions</span></h2>
                </div>
                <div class="row mt-n1-9">
                    <div class="col-sm-6 col-lg-3 mt-1-9">
                        <div class="card-style7 card border-0 h-100">
                            <div class="card-body p-1-9 p-xl-5">
                                <div class="card-icon">
                                    <i class="ti-medall display-10 d-block mb-4"></i>
                                    <span class="round-shape"></span>
                                </div>
                                <h3 class="mb-0 h5">Award Winning Services</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mt-1-9">
                        <div class="card-style7 card border-0 h-100">
                            <div class="card-body p-1-9 p-xl-5">
                                <div class="card-icon">
                                    <i class="ti-cloud-down display-10 d-block mb-4"></i>
                                    <span class="round-shape"></span>
                                </div>
                                <h3 class="mb-0 h5">Networking Packages</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mt-1-9">
                        <div class="card-style7 card border-0 h-100">
                            <div class="card-body p-1-9 p-xl-5">
                                <div class="card-icon">
                                    <i class="ti-calendar display-10 d-block mb-4"></i>
                                    <span class="round-shape"></span>
                                </div>
                                <h3 class="mb-0 h5">Incredible Bonus Packages</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mt-1-9">
                        <div class="card-style7 card border-0 h-100">
                            <div class="card-body p-1-9 p-xl-5">
                                <div class="card-icon">
                                    <i class="ti-user display-10 d-block mb-4"></i>
                                    <span class="round-shape"></span>
                                </div>
                                <h3 class="mb-0 h5">24/7 Professional Support</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
@include('home.questions')
@include('home.footer')