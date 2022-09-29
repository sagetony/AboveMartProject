
  <body>
    <!-- PAGE LOADING
    ================================================== -->
    <div id="preloader"></div>

    <!-- MAIN WRAPPER
    ================================================== -->
    <div class="main-wrapper">
      <!-- HEADER
        ================================================== -->
      <header class="header-style1 menu_area-light">
        <div class="navbar-default border-bottom border-color-light-white">
         
          <div class="container-fluid px-lg-1-6 px-xl-2-5 px-xxl-2-9">
            <div class="row align-items-center">
              <div class="col-12 col-lg-12">
                <div class="menu_area">
                  <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <div class="navbar-header navbar-header-custom">
                      <!-- start logo -->
                      <a href="index.html" class="navbar-brand logochange"
                        ><img
                          id="logo"
                          src="img/logos/logo-inner.png"
                          alt="logo"
                      /></a>
                      <!-- end logo -->
                    </div>

                    <div class="navbar-toggler"></div>

                    <!-- menu area -->
                    <ul
                      class="navbar-nav ms-auto"
                      id="nav"
                      style="display: none"
                    >
                      <li><a href="{{ route('home') }}">Home</a></li>
                     <li><a href="{{ route('aboutus') }}">About Us</a></li>
                      <li><a href="{{ route('services') }}">Services</a></li>
                      <li><a href="{{ route('packages') }}">Plans</a></li>
                      <li><a href="{{ route('contact') }}">Contact</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>

                        <li><a href="{{ route('login') }}">Login</a></li>

                    </ul>
                    <!-- end menu area -->

                    <!-- start attribute navigation -->
                    <div class="attr-nav align-items-lg-center ms-lg-auto">
                      <ul>
                       
                        <li class="d-none d-xl-inline-block">
                          <a href="{{ route('login') }}" class="butn text-white sm"
                            ><span>Login</span></a
                          >
                        </li>
                      </ul>
                    </div>
                    <!-- end attribute navigation -->
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
