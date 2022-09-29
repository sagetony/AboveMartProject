@include('home.head')
@include('home.header')
 <!-- PAGE TITLE
        ================================================== -->
        <section class="top-position1 py-0">
            <div class="page-title-section bg-img cover-background left-overlay-dark" data-overlay-dark="7" data-background="img/bg/bg-03.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Contact Us</h1>
                            <div class="breadcrumb">
                                <ul>
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li><a href="#!">Contact Us</a></li>
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

        <!-- CONTACT FORM
        ================================================== -->
        <section>
            <div class="container">
                <div class="section-heading">
                    <span class="subtitle">Send Us Message</span>
                    <h2>Stay Conected <span class="font-weight-400">With Us</span></h2>
                </div>
                <div class="row">
                    <div class="col-lg-10 col-xl-8 mx-auto">
                        <div class="p-1-9 p-md-5 border border-color-extra-light-gray border-radius-10">
                            <form class="contact quform" action="" method="post" enctype="multipart/form-data" onclick="">
                                <div class="quform-elements">
                                    <div class="row">
                                        <h2 class="mb-4 h3">Drop Message For Any Query</h2>
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
            <img src="img/content/line-01.png" class="position-absolute top-15 right-5 ani-top-bottom d-none d-sm-inline-block" alt="...">
            <div class="d-inline-block p-2 border-secondary border border-width-2 position-absolute left-5 bottom-25 ani-left-right"></div>
            <div class="d-inline-block p-2 bg-secondary rounded-circle position-absolute left-10 top-25 ani-move"></div>
        </section>

        <!-- CONTACT INFO
        ================================================== -->
        <section class="p-0 bg-light">
            <div class="row p-0">
                <div class="col-lg-6 col-xxl-4 p-0">
                    <div class="p-1-6 p-sm-6 p-lg-8">
                        <div class="section-heading">
                            <span class="subtitle">Contacts</span>
                            <h2>Get In <span class="font-weight-400">Touch</span></h2>
                        </div>
                        <div class="card border-color-extra-light-gray border-radius-10 mb-4">
                            <div class="card-body p-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-map-marker-alt contact-icon-box mb-0"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-4">
                                        <h3 class="h4">Location</h3>
                                        <p class="mb-0 w-sm-80 display-md-28">E-Business Hub Building Material Jos, Plateau, Nigeria.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card border-color-extra-light-gray border-radius-10 mb-4">
                            <div class="card-body p-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-phone-alt contact-icon-box mb-0"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-4">
                                        <h3 class="h4">Phone</h3>
                                        <p class="mb-1 display-md-28">(+234) 906 2055 555</p>
                                        <p class="mb-0 display-md-28">(+234) 810 2983 659</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card border-color-extra-light-gray border-radius-10">
                            <div class="card-body p-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <i class="far fa-envelope contact-icon-box mb-0"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-4">
                                        <h3 class="h4">Email</h3>
                                        <p class="mb-1 display-md-28">info@AboveMarts.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-8 p-0">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31448.86672695353!2d8.871681585785923!3d9.841267320047267!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x105374e46e852057%3A0xa0885f205e0dcbe9!2sBuilding%20Materials%20Market!5e0!3m2!1sen!2str!4v1658133019117!5m2!1sen!2str" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </section>
@include('home.footer')