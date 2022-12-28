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
    
    <script type="text/javascript">

        function update (){
            var select = document.getElementById('network');
            var option = select.options[select.selectedIndex];
            document.getElementById("amount").style.display = "block";
            if(option.value == 'mtn'){
                document.getElementById("mtn").style.display = "block";
                document.getElementById("airtel").style.display = "none";
                document.getElementById("glo").style.display = "none";
                document.getElementById("9mobile").style.display = "none";
            }else if(option.value == 'airtel'){
                document.getElementById("airtel").style.display = "block";
                document.getElementById("glo").style.display = "none";
                document.getElementById("9mobile").style.display = "none";
                document.getElementById("mtn").style.display = "none";
            }else if(option.value == 'glo'){
                document.getElementById("glo").style.display = "block";
                document.getElementById("9mobile").style.display = "none";
                document.getElementById("mtn").style.display = "none";
                document.getElementById("airtel").style.display = "none";
            }else if(option.value == '9mobile'){
                document.getElementById("9mobile").style.display = "block";
                document.getElementById("mtn").style.display = "none";
                document.getElementById("airtel").style.display = "none";
                document.getElementById("glo").style.display = "none";
            }
        }

        let mtn_75mb_24hrs = 100;
        let mtn_1gb_24hrs = 300;
        let mtn_200mb_2days = 200;
        let mtn_2_5gb_2days = 500;
        let mtn_350mb_7days = 300
        let mtn_1gb_7days = 500;
        let mtn_6gb_7_days =  1500;
        let mtn_750mb_14days = 500;
        let mtn_1_5gb_30days = 1000;
        let mtn_2gb_30_days = 1200;
        let mtn_3gb_30days = 1500;
        let mtn_4_5gb_30days = 2000;
        let mtn_6gb_30days = 2500;
        let mtn_8gb_30days = 3000;
        let mtn_10gb_30days = 3500;
        let mtn_15gb_30_days = 5000;
        let mtn_20gb_30_days = 6000;
        let mtn_40gb = 10000;
        let mtn_75gb_30days = 15000;
        let mtn_110gb_30days = 20000;
        let mtn_75gb_60days = 20000;
        let mtn_120gb_60days = 30000;
        let mtn_150gb_90_days = 50000;
        let mtn_250gb_90days = 75000;
        let mtn_400gb_365days = 120000;
        let mtn_1000gb_365days = 250000;
        let mtn_2000gb_365days = 450000;
        let glo_100mb_1_day = 100;
        let glo_350mb_2_days = 200;
        let glo_1_35gb_14days = 500;
        let glo_2_5gb = 1000;
        let glo_3_75gb = 1500;
        let glo_5_8_gb = 2000;
        let glo_7_7_gb = 2500;
        let glo_10gb = 3000;
        let glo_13_5_gb = 4000;
        let glo_1825gb = 5000;
        let glo_259gb =  8000;
        let glo_50gb = 10000;
        let glo_93gb = 15000;
        let glo_119gb = 18000;
        let glo_138gb = 20000;
        let airtel_75mb10_extra_24hrs = 100;
        let airtel_1gb__1day = 300;
        let airtel_2gb__2days = 500;
        let airtel_200mb_3days = 200;
        let airtel_350mb__10_extra_7days = 300;
        let airtel_6gb_7days = 1500;
        let airtel_750mb = 500;
        let airtel_1_5gb = 1000;
        let airtel_2gb_30days = 1200;
        let airtel_3gb__30days =  1500;
        let airtel_4_5gb_30days = 2000;
        let airtel_6gb__30days = 2500;
        let airtel_8gb_30days = 3000;
        let airtel_11gb_30days = 4000;
        let airtel_15gb = 5000;
        let airtel_40gb_30days = 10000;
        let airtel_75gb_30days = 15000;
        let airtel_110gb_30days = 20000;
        let mobile_100mb_24hrs = 100;
        let mobile_650mb_24hrs =  200;
        let mobile_7gb_7_days = 1500;
        let mobile_500mb_30days =  500;
        let mobile_1_5gb_30_days = 1000;
        let mobile_2gb_30days = 1200;
        let mobile_4_5gb_30_days =  2000;
        let mobile_11gb_30days = 4000;
        let mobile_15gb_30days =  5000;
        let mobile_40_gb_30_days= 10000; 
        let mobile_75_gb_30_days= 15000;
        let mobile_30gb_90_days = 27500;
        let mobile_100gb_100_days = 84992;
        let mobile_60gb_180_days = 55000;
        let mobile_120gb_365_days = 110000;


        function insertAmount(){
            var select = document.getElementById('mtnData');
            var option = select.options[select.selectedIndex];

            if(option.value == 'mtn_75mb_24hrs'){
                document.getElementById('amountV').value = mtn_75mb_24hrs;
            }else if(option.value == 'mtn_1gb_24hrs'){
                document.getElementById('amountV').value = mtn_1gb_24hrs;
            }else if(option.value == 'mtn_200mb_2days'){
                document.getElementById('amountV').value = mtn_200mb_2days;
            }else if(option.value == 'mtn_2_5gb_2days'){
                document.getElementById('amountV').value = mtn_2_5gb_2days;
            }else if(option.value == 'mtn_350mb_7days'){
                document.getElementById('amountV').value = mtn_350mb_7days;
            }else if(option.value == 'mtn_1gb_7days'){
                document.getElementById('amountV').value = mtn_1gb_7days;
            }else if(option.value == 'mtn_6gb_7_days'){
                document.getElementById('amountV').value = mtn_6gb_7_days;
            }else if(option.value == 'mtn_750mb_14days'){
                document.getElementById('amountV').value = mtn_750mb_14days;
            }else if(option.value == 'mtn_1_5gb_30days'){
                document.getElementById('amountV').value = mtn_1_5gb_30days;
            }else if(option.value == 'mtn_2gb_30_days'){
                document.getElementById('amountV').value = mtn_2gb_30_days;
            }else if(option.value == 'mtn_3gb_30days'){
                document.getElementById('amountV').value = mtn_3gb_30days;
            }else if(option.value == 'mtn_4_5gb_30days'){
                document.getElementById('amountV').value = mtn_4_5gb_30days;
            }else if(option.value == 'mtn_6gb_30days'){
                document.getElementById('amountV').value = mtn_6gb_30days;
            }else if(option.value == 'mtn_8gb_30days'){
                document.getElementById('amountV').value = mtn_8gb_30days;
            }else if(option.value == 'mtn_10gb_30days'){
                document.getElementById('amountV').value = mtn_10gb_30days;
            }else if(option.value == 'mtn_15gb_30_days'){
                document.getElementById('amountV').value = mtn_15gb_30_days;
            }else if(option.value == 'mtn_20gb_30_days'){
                document.getElementById('amountV').value = mtn_20gb_30_days;
            }else if(option.value == 'mtn_40gb'){
                document.getElementById('amountV').value = mtn_40gb;
            }else if(option.value == 'mtn_75gb_30days'){
                document.getElementById('amountV').value = mtn_75gb_30days;
            }else if(option.value == 'mtn_110gb_30days'){
                document.getElementById('amountV').value = mtn_110gb_30days;
            }else if(option.value == 'mtn_75gb_60days'){
                document.getElementById('amountV').value = mtn_75gb_60days;
            }else if(option.value == 'mtn_120gb_60days'){
                document.getElementById('amountV').value = mtn_120gb_60days;
            }else if(option.value == 'mtn_150gb_90_days'){
                document.getElementById('amountV').value = mtn_150gb_90_days;
            }else if(option.value == 'mtn_250gb_90days'){
                document.getElementById('amountV').value = mtn_250gb_90days;
            }else if(option.value == 'mtn_400gb_365days'){
                document.getElementById('amountV').value = mtn_400gb_365days;
            }else if(option.value == 'mtn_1000gb_365days'){
                document.getElementById('amountV').value = mtn_1000gb_365days;
            }else if(option.value == 'mtn_2000gb_365days'){
                document.getElementById('amountV').value = mtn_2000gb_365days;
            }else {
                document.getElementById('amountV').value = 100;
            }
            
        }

        function insertAAmount(){
            var select = document.getElementById('airtelData');
            var option = select.options[select.selectedIndex];
            if(option.value == 'airtel_75mb10_extra_24hrs'){
                document.getElementById('amountV').value = airtel_75mb10_extra_24hrs;
            }else if(option.value == 'airtel_1gb__1day'){
                document.getElementById('amountV').value = airtel_1gb__1day;
            }else if(option.value == 'airtel_2gb__2days'){
                document.getElementById('amountV').value =airtel_2gb__2days;
            }else if(option.value == 'airtel_350mb__10_extra_7days'){
                document.getElementById('amountV').value = airtel_350mb__10_extra_7days;
            }else if(option.value == 'airtel_6gb_7days'){
                document.getElementById('amountV').value = airtel_6gb_7days;
            }else if(option.value == 'airtel_750mb'){
                document.getElementById('amountV').value = airtel_750mb;
            }else if(option.value == 'airtel_1_5gb'){
                document.getElementById('amountV').value = airtel_1_5gb;
            }else if(option.value == 'airtel_2gb_30days'){
                document.getElementById('amountV').value = airtel_2gb_30days;
            }else if(option.value == 'airtel_3gb__30days'){
                document.getElementById('amountV').value = airtel_3gb__30days;
            }else if(option.value == 'airtel_4_5gb_30days'){
                document.getElementById('amountV').value = airtel_4_5gb_30days;
            }else if(option.value == 'airtel_6gb__30days'){
                document.getElementById('amountV').value = airtel_6gb__30days;
            }else if(option.value == 'airtel_8gb_30days'){
                document.getElementById('amountV').value = airtel_8gb_30days;
            }else if(option.value == 'airtel_11gb_30days'){
                document.getElementById('amountV').value = airtel_11gb_30days;
            }else if(option.value == 'airtel_15gb'){
                document.getElementById('amountV').value = airtel_15gb;
            }else if(option.value == 'airtel_40gb_30days'){
                document.getElementById('amountV').value = airtel_40gb_30days;
            }else if(option.value == 'airtel_75gb_30days'){
                document.getElementById('amountV').value = airtel_75gb_30days;
            }else if(option.value == 'airtel_110gb_30days'){
                document.getElementById('amountV').value = airtel_110gb_30days;
            }else {
                document.getElementById('amountV').value = 100;

            }
        }

        function insertGAmount(){
            var select = document.getElementById('gloData');
            var option = select.options[select.selectedIndex];
            if(option.value == 'glo_100mb_1_day'){
                document.getElementById('amountV').value = glo_100mb_1_day;
            }else if(option.value == 'glo_350mb_2_days'){
                document.getElementById('amountV').value = glo_350mb_2_days;
            }else if(option.value == 'glo_1_35gb_14days'){
                document.getElementById('amountV').value = glo_1_35gb_14days;
            }else if(option.value == 'glo_2_5gb'){
                document.getElementById('amountV').value = glo_2_5gb;
            }else if(option.value == 'glo_3_75gb'){
                document.getElementById('amountV').value = glo_3_75gb;
            }else if(option.value == 'glo_5_8_gb'){
                document.getElementById('amountV').value = glo_5_8_gb;
            }else if(option.value == 'glo_7_7_gb'){
                document.getElementById('amountV').value =glo_7_7_gb;
            }else if(option.value == 'glo_10gb'){
                document.getElementById('amountV').value = glo_10gb;
            }else if(option.value == 'glo_13_5_gb'){
                document.getElementById('amountV').value = glo_13_5_gb;
            }else if(option.value == 'glo_1825gb'){
                document.getElementById('amountV').value =glo_1825gb;
            }else if(option.value == 'glo_259gb'){
                document.getElementById('amountV').value = glo_259gb;
            }else if(option.value == 'glo_50gb'){
                document.getElementById('amountV').value = glo_50gb;
            }else if(option.value == 'glo_93gb'){
                document.getElementById('amountV').value = glo_93gb;
            }else if(option.value == 'glo_119gb'){
                document.getElementById('amountV').value = glo_119gb;
            }else if(option.value == 'glo_138gb'){
                document.getElementById('amountV').value = glo_138gb;
            }else {
                document.getElementById('amountV').value = 100;
            }
        }
        function insertMAmount(){
            var select = document.getElementById('9mobileData');
            var option = select.options[select.selectedIndex];
            if(option.value == '9mobile_100mb_24hrs'){
                document.getElementById('amountV').value = mobile_100mb_24hrs;
            }else if(option.value == '9mobile_650mb_24hrs'){
                document.getElementById('amountV').value = mobile_650mb_24hrs;
            }else if(option.value == '9mobile_7gb_7_days'){
                document.getElementById('amountV').value = mobile_7gb_7_days;
            }else if(option.value == '9mobile_500mb_30days'){
                document.getElementById('amountV').value = mobile_500mb_30days;
            }else if(option.value == '9mobile_1_5gb_30_days'){
                document.getElementById('amountV').value = mobile_1_5gb_30_days;
            }else if(option.value == '9mobile_2gb_30days'){
                document.getElementById('amountV').value = mobile_2gb_30days;
            }else if(option.value == '9mobile_4_5gb_30_days'){
                document.getElementById('amountV').value = mobile_4_5gb_30_days;
            }else if(option.value == '9mobile_11gb_30days'){
                document.getElementById('amountV').value = mobile_11gb_30days;
            }else if(option.value == '9mobile_15gb_30days'){
                document.getElementById('amountV').value = mobile_15gb_30days;
            }else if(option.value == '9mobile_40_gb_30_days'){
                document.getElementById('amountV').value =  mobile_40_gb_30_days;
            }else if(option.value == '9mobile_75_gb_30_days'){
                document.getElementById('amountV').value = mobile_75_gb_30_days;
            }else if(option.value == '9mobile_30gb_90_days'){
                document.getElementById('amountV').value =  mobile_30gb_90_days;
            }else if(option.value == '9mobile_100gb_100_days'){
                document.getElementById('amountV').value = mobile_100gb_100_days;
            }else if(option.value == '9mobile_60gb_180_days'){
                document.getElementById('amountV').value =  mobile_60gb_180_days;
            }else if(option.value == '9mobile_120gb_365_days'){
                document.getElementById('amountV').value = mobile_120gb_365_days;
            }else{
                document.getElementById('amountV').value = 100;
            }
        }
    </script>


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