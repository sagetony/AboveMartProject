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
<h4> Data Purchase</small></h4>
<form action="{{ route('datapurchase') }}" method="post">
@csrf
<div class="row mb-15px">
<label class="form-label col-form-label col-md-2">Phone Number</label>
<div class="col-md-6">
<input class="form-control" type="number" name ="phoneNumber" placeholder="Enter Phone Number"  required/>
<small class="fs-12px text-gray-500-darker">Kindly enter a valid phone number.</small>
</div>
</div>
    <div class="row mb-15px">
        <label class="form-label col-form-label col-md-2">Select Network</label>
        <div class="col-md-6">
            <select class="form-select" name="network" id="network" onChange="update()">
                <option value="">Select Package</option>
                <option value="mtn">MTN</option>
                <option value="airtel">AIRTEL</option>
                <option value="glo">GLO</option>
                <option value="9mobile">9MOBILE</option>
            </select>
            <small class="fs-12px text-gray-500-darker">Kindly select a valid network.</small>
        </div>
    </div>

    <div class="row mb-15px" style="display: none;" id="mtn">
        <label class="form-label col-form-label col-md-2">Select Package</label>
        <div class="col-md-6">
            <select class="form-select" name="packageMTN" id="mtnData" onChange="insertAmount()">
                <option value="mtn_75mb_24hrs">MTN 75MB 24hrs</option>
                <option value="mtn_1gb_24hrs">MTN 1GB 24hrs</option>
                <option value="mtn_200mb_2days">MTN 200MB 2days</option>
                <option value="mtn_2_5gb_2days">MTN 2.5GB 2days</option>
                <option value="mtn_350mb_7days">MTN 350MB 7days</option>
                <option value="mtn_1gb_7days">MTN 1GB 7Days</option>
                <option value="mtn_6gb_7_days">MTN 6GB 7 days</option>
                <option value="mtn_750mb_14days">MTN 750MB 14days</option>
                <option value="mtn_1_5gb_30days">MTN 1.5GB 30days</option>
                <option value="mtn_2gb_30_days">MTN 2GB 30 Days</option>
                <option value="mtn_3gb_30days">MTN 3GB 30days</option>
                <option value="mtn_4_5gb_30days">MTN 4.5GB 30days</option>
                <option value="mtn_6gb_30days">MTN 6GB 30days</option>
                <option value="mtn_8gb_30days">MTN 8GB 30days</option>
                <option value="mtn_10gb_30days">MTN 10GB 30days</option>
                <option value="mtn_15gb_30_days">MTN 15GB 30 Days</option>
                <option value="mtn_20gb_30_days">MTN 20GB 30 Days</option>
                <option value="mtn_40gb">MTN 40GB 30 Days</option>
                <option value="mtn_75gb_30days">MTN 75GB 30days</option>
                <option value="mtn_110gb_30days">MTN 110GB 30days </option>
                <option value="mtn_75gb_60days">MTN 75GB 60days</option>
                <option value="mtn_120gb_60days">MTN 120GB 60Days</option>
                <option value="mtn_150gb_90_days">MTN 150GB 90 Days</option>
                <option value="mtn_250gb_90days">MTN 250GB 90days</option>
                <option value="mtn_400gb_365days">MTN 400GB 365days</option>
                <option value="mtn_1000gb_365days">MTN 1000GB 365days</option>
                <option value="mtn_2000gb_365days">MTN 2000GB 365days</option>
            </select>
        </div>
    </div>
    <div class="row mb-15px" style="display: none;" id="airtel">
        <label class="form-label col-form-label col-md-2">Select Package</label>
        <div class="col-md-6">
            <select class="form-select" name="packageAirtel" id="airtelData" onChange="insertAAmount()">
                <option value="airtel_75mb10_extra_24hrs"> Airtel 75MB+10% Extra 24hrs </option>
                <option value="airtel_1gb__1day">Airtel 1GB 1day</option>
                <option value="airtel_2gb__2days"> Airtel 2GB 2Days</option>
                <option value="airtel_200mb_3days">Airtel 200MB 3Days </option>
                <option value="airtel_350mb__10_extra_7days">Airtel 350MB + 10% Extra 7days</option>
                <option value="airtel_6gb_7days">Airtel 6GB 7Days </option>
                <option value="airtel_750mb">Airtel 750MB </option>
                <option value="airtel_1_5gb">Airtel 1.5GB</option>
                <option value="airtel_2gb_30days">Airtel 2GB 30days </option>
                <option value="airtel_3gb__30days"> Airtel 3GB 30days </option>
                <option value="airtel_4_5gb_30days">Airtel 4.5GB 30days</option>
                <option value="airtel_6gb__30days">Airtel 6GB 30days </option>
                <option value="airtel_8gb_30days">Airtel 8GB 30days </option>
                <option value="airtel_11gb_30days">Airtel 11GB 30days </option>
                <option value="airtel_15gb">Airtel 15GB  30days </option>
                <option value="airtel_40gb_30days">Airtel 40GB 30days</option>
                <option value="airtel_75gb_30days">Airtel 75GB 30days</option>
                <option value="airtel_110gb_30days">Airtel 110GB 30days</option>
            </select>
        </div>
    </div>
    <div class="row mb-15px" style="display: none;" id="glo">
        <label class="form-label col-form-label col-md-2">Select Package</label>
        <div class="col-md-6">
            <select class="form-select" name="packageGLO" id="gloData" onChange="insertGAmount()">
                <option value="glo_100mb_1_day">GLO 100MB 1 Day</option>
                <option value="glo_350mb_2_days">GLO 350MB 2 DAYS</option>
                <option value="glo_1_35gb_14days">GLO 1.35GB 14Days</option>
                <option value="glo_2_5gb">GLO 2.5GB</option>
                <option value="glo_3_75gb">GLO 3.75GB</option>
                <option value="glo_5_8_gb">GLO 5.8 GB</option>
                <option value="glo_7_7_gb">GLO 7.7 GB</option>
                <option value="glo_10gb">GLO 10GB</option>
                <option value="glo_13_5_gb">GLO 13.5 GB</option>
                <option value="glo_1825gb">GLO 18.25GB</option>
                <option value="glo_259gb">GLO 29.05GB</option>
                <option value="glo_50gb">GLO 50GB</option>
                <option value="glo_93gb">GLO 93GB</option>
                <option value="glo_119gb">GLO 119GB</option>
                <option value="glo_138gb">GLO 138GB</option>

            </select>
        </div>
    </div>
    <div class="row mb-15px" style="display: none;" id="9mobile">
        <label class="form-label col-form-label col-md-2">Select Package</label>
        <div class="col-md-6">
            <select class="form-select" name="package9Mobile" id="9mobileData" onChange="insertMAmount()">
                <option value="9mobile_100mb_24hrs">9Mobile 100MB 24hrs </option>
                <option value="9mobile_650mb_24hrs">9Mobile 650MB 24hrs </option>
                <option value="9mobile_7gb_7_days">9Mobile 7GB 7 Days </option>
                <option value="9mobile_500mb_30days">9Mobile 500MB 30Days </option>
                <option value="9mobile_1_5gb_30_days">9Mobile 1.5GB 30 Days</option>
                <option value="9mobile_2gb_30days">9Mobile 2gb 30days  </option>
                <option value="9mobile_4_5gb_30_days">9Mobile 4.5GB 30 Days </option>
                <option value="9mobile_11gb_30days">9Mobile 11GB 30days  </option>
                <option value="9mobile_15gb_30days">9Mobile 15GB 30Days </option>
                <option value="9mobile_40_gb_30_days">9Mobile 40GB 30Days  </option>
                <option value="9mobile_75_gb_30_days">9Mobile 75 GB 30 Days  </option>
                <option value="9mobile_30gb_90_days">9Mobile 30GB 90 Days  </option>
                <option value="9mobile_100gb_100_days">9Mobile 100GB 100 Days  </option>
                <option value="9mobile_60gb_180_days">9Mobile 60GB 180 Days </option>
                <option value="9mobile_120gb_365_days">9Mobile 120GB 365 Days </option>
            </select>
        </div>
    </div>
    <div class="row mb-15px">
        <label class="form-label col-form-label col-md-2">Select Method Payment</label>
        <div class="col-md-6">
            <select class="form-select" name="package" id="payment" onChange="updatepaymentMethod()">
                <option value="wallet">Main Wallet</option>
                <option value="epin">E-Pin</option>
                <option value="promo">Promo Wallet</option>
            </select>
        </div>
    </div>
    <div id="walletpayment" style="display:none;">
    </div>
    <div id="promopayment"  style="display:none;">
        <div class="mb-3">
        <label class="col-sm-6 col-form-label">Promo Amount($)</label>
            <div class="col-sm-6">
                <input type="text" name="promoamount" class="form-control" id="promoamount" placeholder="0" value="0" >
            </div>
        </div> 
        <p style ="color:red; font-size:14px;">Note: Maximum 50% can be use from promo wallet !</p>
    </div>
    <div id="epinpayment"  style="display:none;">
        <div class="mb-3">
            <label class="col-sm-6 col-form-label">E-Pin</label>
        <div class="col-sm-6">
            <input type="text" name="epin" class="form-control" id="epin" >
        </div>
        </div>
    </div>
    
    <div class="row mb-15px" id="amount" style="display: none;">
    <label class="form-label col-form-label col-md-2">Amount</label>
    <div class="col-md-6">
    <input class="form-control" type="text" id="amountV" name ="amount" value="100" placeholder="Enter Amount" required />
    </div>
    </div>
    <div class="row mb-15px">
    <div class="col-md-2">
    </div>
    <div class="col-md-9">
    <button type="submit" class="btn btn-primary w-250px">Buy Data</button>
    </div>
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