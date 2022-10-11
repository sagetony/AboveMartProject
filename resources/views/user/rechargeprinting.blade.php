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
<form action="{{ route('rechargeprinting') }}" method="post">
@csrf
<div class="row mb-15px">
<label class="form-label col-form-label col-md-2">Enter Business Name</label>
<div class="col-md-6">
<input class="form-control" type="text" name ="businessName" placeholder="Enter Business Name"  required/>
{{-- <small class="fs-12px text-gray-500-darker">Kindly enter a valid phone number.</small> --}}
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
            <select class="form-select" name="package" id="mtnData" onChange="insertAmount()">
                <option value="100">MTN 100</option>
                <option value="200">MTN 200</option>
                <option value="500">MTN 500</option>
                <option value="1000">MTN 1000</option>
            </select>
        </div>
    </div>
    <div class="row mb-15px" style="display: none;" id="airtel">
        <label class="form-label col-form-label col-md-2">Select Package</label>
        <div class="col-md-6">
            <select class="form-select" name="package" id="airtelData" onChange="insertAAmount()">
                <option value="100">Airtel 100</option>
                <option value="200">Airtel 200</option>
                <option value="500">Airtel 500</option>
                <option value="1000">Airtel 1000</option>
              
            </select>
        </div>
    </div>
    <div class="row mb-15px" style="display: none;" id="glo">
        <label class="form-label col-form-label col-md-2">Select Package</label>
        <div class="col-md-6">
            <select class="form-select" name="package" id="gloData" onChange="insertGAmount()">
                <option value="100">Glo 100</option>
                <option value="200">Glo 200</option>
                <option value="500">Glo 500</option>
                <option value="1000">Glo 1000</option>
            </select>
        </div>
    </div>
    <div class="row mb-15px" style="display: none;" id="9mobile">
        <label class="form-label col-form-label col-md-2">Select Package</label>
        <div class="col-md-6">
            <select class="form-select" name="package" id="9mobileData" onChange="insertMAmount()">
                <option value="100">9mobile 100</option>
                <option value="200">9mobile 200</option>
                <option value="500">9mobile 500</option>
                <option value="1000">9mobile 1000</option>
            </select>
        </div>
    </div>
    <div class="row mb-15px">
        <label class="form-label col-form-label col-md-2">Quantity</label>
        <div class="col-md-6">
        <input class="form-control" type="number" value="1" id="quantity" name ="quantity" required />
        </div>
    </div>
    {{-- <div class="row mb-15px" id="amount" style="display: none;">
    <label class="form-label col-form-label col-md-2">Amount</label>
    <div class="col-md-6">
    <input class="form-control" type="text" id="amountV" name ="amount" value="100" placeholder="Enter Amount" required />
    </div>
    </div> --}}
    <div class="row mb-15px">
    <div class="col-md-2">
    </div>
    <div class="col-md-9">
    <button type="submit" class="btn btn-primary w-250px">Print Recharge Card</button>
    </div>
    </div>
    
    <script type="text/javascript">

        function update (){
            var select = document.getElementById('network');
            var option = select.options[select.selectedIndex];
            // document.getElementById("amount").style.display = "block";
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
            }else{
                document.getElementById("9mobile").style.display = "block";
                document.getElementById("mtn").style.display = "none";
                document.getElementById("airtel").style.display = "none";
                document.getElementById("glo").style.display = "none";
            }
        }


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
            }else if(option.value == 'mtn_15gb_30days'){
                document.getElementById('amountV').value = mtn_15gb_30days;
            }else if(option.value == 'mtn_2gb_30_days'){
                document.getElementById('amountV').value = mtn_2gb_30_days;
            }else if(option.value == 'mtn_3gb_30days'){
                document.getElementById('amountV').value = mtn_3gb_30days;
            }else if(option.value == 'mtn_45gb_30days'){
                document.getElementById('amountV').value = mtn_45gb_30days;
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
            if(option.value == 'glo_90mb'){
                document.getElementById('amountV').value = glo_90mb;
            }else if(option.value == 'glo_340mb'){
                document.getElementById('amountV').value = glo_340mb;
            }else if(option.value == 'glo_1_05gb'){
                document.getElementById('amountV').value = glo_1_05gb;
            }else if(option.value == 'glo_2_3gb'){
                document.getElementById('amountV').value = glo_2_3gb;
            }else if(option.value == 'glo_3_75gb'){
                document.getElementById('amountV').value = glo_3_75gb;
            }else if(option.value == 'glo_5_25_gb'){
                document.getElementById('amountV').value = glo_5_25_gb;
            }else if(option.value == 'glo_7gb'){
                document.getElementById('amountV').value =glo_7gb;
            }else if(option.value == 'glo_9gb'){
                document.getElementById('amountV').value = glo_9gb;
            }else if(option.value == 'glo_12gb'){
                document.getElementById('amountV').value = glo_12gb;
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