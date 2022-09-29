@include('user.head')
@include('user.header')
@include('user.sidebar')
<div class="app-sidebar-bg"></div>
<div class="app-sidebar-mobile-backdrop"><a href="#" data-dismiss="app-sidebar-mobile" class="stretched-link"></a></div>


<div id="content" class="app-content p-0">

<div class="profile">
<div class="profile-header">

<div class="profile-header-cover"></div>


<div class="profile-header-content">

<div class="profile-header-img">
<img src="{{ auth()->user()->photo }}" alt="" />
</div>


<div class="profile-header-info ">
<h4 class="mt-0 mb-1"> {{ auth()->user()->firstName }} {{ auth()->user()->lastName }}</h4>
<p class="mb-2">{{ auth()->user()->rank }}</p>

</div>
</div>


</div>
</div>


<div class="profile-content">

<div class="tab-content p-0">

<div class="tab-pane fade show active" id="profile-about">
<h4> Sponsor package</h4>
<form action="{{ route('userpackage') }}" method="post">
@csrf

<section style="margin-top:-5%;">
    <div class="container z-index-2 position-relative">
        <div class="section-heading mb-8 wow fadeIn" data-wow-delay="100ms">
            <span class="subtitle">AboveMarts Partnership Plans And Benefits</span>
            <h2 class="w-100">Explore Our <span class="font-weight-400">Partnership Plans</span></h2>
            <p class="mt-4">Every Great Product or Service always comes with Great Business Opportunity.</p>
        </div>
        <div class="row mb-15px mt-4 mb-4">
            <div class="col-md-1">
            </div>
            <label class="form-label col-form-label col-md-2">Affliate Link</label>
            <div class="col-md-7">
                <input type="text" class="form-control"  placeholder="{{ Route('register',['ref' => auth()->user()->mySponsorId]) }}" value="{{ Route('register',['ref' => auth()->user()->mySponsorId]) }}" disabled>    
            </div>
        </div>

        <div class="row mt-n6 g-xxl-5">
            <div class="col-md-6 col-xl-3 mt-6 wow fadeInUp" data-wow-delay="200ms">
                <div class="card card-style6 border-0 position-relative">
                    <div class="card-header text-center bg-white p-1-9 p-sm-2-3 pt-5">
                        
                        <h4>Bronze</h4>
                        <h3 class="fw-bold" style="font-size:30px;">#6000<span class="display-29"></span></h3>
                        <!-- <span class="w-80 d-block mx-auto">For 12 mos when bundled, + taxes & equip fee</span> -->
                    </div>
                    <div class="card-body p-1-9 p-sm-2-9">
                        <ul class="list-style1 mb-0">
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Mentee Bonus</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Mentor Bonus</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Royal Bonus</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Golden Bonus</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Free Token Grant</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Sales Profit Share</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Passive Income</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Sell Items Online</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Recharge Card Printing</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Founders Pool Shares</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Education Hub, Mentorship & Support</li>
                        </ul>
                        <a href="{{ route('userpackage') }}" class="butn mt-1-9" style="font-size: 12px;">Choose Plan</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 mt-6 wow fadeInUp" data-wow-delay="200ms">
                <div class="card card-style6 border-0 position-relative">
                    <div class="card-header text-center bg-white p-1-9 p-sm-2-3 pt-5">
                        
                        <h4>Silver</h4>
                        <h3 class="fw-bold" style="font-size:30px;">#25000<span class="display-29"></span></h3>
                        <!-- <span class="w-80 d-block mx-auto">For 12 mos when bundled, + taxes & equip fee</span> -->
                    </div>
                    <div class="card-body p-1-9 p-sm-2-9">
                        <ul class="list-style1 mb-0">
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Mentee Bonus</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Mentor Bonus</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Royal Bonus</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Golden Bonus</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Free Token Grant</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Sales Profit Share</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Passive Income</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Sell Items Online</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Recharge Card Printing</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Founders Pool Shares</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Education Hub, Mentorship & Support</li>
                        </ul>
                        <a href="{{ route('userpackage') }}" class="butn mt-1-9"  style="font-size: 12px;">Choose Plan</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 mt-6 wow fadeInUp" data-wow-delay="200ms">
                <div class="card card-style6 border-0 position-relative">
                    <div class="card-header text-center bg-white p-1-9 p-sm-2-3 pt-5">
                        
                        <h4>Gold</h4>
                        <h3 class="fw-bold" style="font-size:30px;">#50000<span class="display-29"></span></h3>
                        <!-- <span class="w-80 d-block mx-auto">For 12 mos when bundled, + taxes & equip fee</span> -->
                    </div>
                    <div class="card-body p-1-9 p-sm-2-9">
                        <ul class="list-style1 mb-0">
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Mentee Bonus</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Mentor Bonus</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Royal Bonus</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Golden Bonus</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Free Token Grant</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Sales Profit Share</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Passive Income</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Sell Items Online</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Recharge Card Printing</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Founders Pool Shares</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Education Hub, Mentorship & Support</li>
                        </ul>
                        <a href="{{ route('userpackage') }}" class="butn mt-1-9"  style="font-size: 12px;">Choose Plan</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 mt-6 wow fadeInUp" data-wow-delay="200ms">
                <div class="card card-style6 border-0 position-relative">
                    <div class="card-header text-center bg-white p-1-9 p-sm-2-3 pt-5">
                        
                        <h4>Platinum</h4>
                        <h3 class="fw-bold" style="font-size:30px;">#100000<span class="display-29"></span></h3>
                        <!-- <span class="w-80 d-block mx-auto">For 12 mos when bundled, + taxes & equip fee</span> -->
                    </div>
                    <div class="card-body p-1-9 p-sm-2-9">
                        <ul class="list-style1 mb-0">
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Mentee Bonus</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Mentor Bonus</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Royal Bonus</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Golden Bonus</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Free Token Grant</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Sales Profit Share</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Passive Income</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Sell Items Online</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Recharge Card Printing</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Founders Pool Shares</li>
                            <li><i class="ti-check display-27 align-middle text-secondary me-3 font-weight-600"></i>Education Hub, Mentorship & Support</li>
                        </ul>
                        <a href="{{ route('userpackage') }}" class="butn mt-1-9"  style="font-size: 12px;">Choose Plan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-sm-inline-block d-none p-2 bg-primary rounded-circle position-absolute right-5 bottom-25 ani-left-right"></div>
    <div class="d-sm-inline-block d-none p-2 border-secondary border border-width-2 position-absolute right-10 top-25 ani-move"></div>
    <div class="d-inline-block px-5 py-6 border position-absolute left-5 top-5 border-radius-10 ani-move"></div>
</section>

</div>
</form>
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

@include('user.footer')