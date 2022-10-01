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
            <select class="form-select" name="package" id="network" onChange="update()">
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
            <select class="form-select" name="package">
                <option value="mtn_75mb_24hrs">MTN 75MB 24hrs</option>
                <option value="mtn_1gb_24hrs">MTN 1GB 24hrs</option>
                <option value="mtn_200mb_2days">MTN 200MB 2days</option>
                <option value="mtn_2_5gb_2days">MTN 2.5GB 2days</option>
                <option value="mtn_350mb_7days">MTN 350MB 7days</option>
                <option value="mtn_1gb_7days">MTN 1GB 7Days</option>
                <option value="mtn_6gb_7_days">MTN 6GB 7 days</option>
                <option value="mtn_750mb_14days">MTN 750MB 14days</option>
                <option value="mtn_15gb_30days">MTN 1.5GB 30days</option>
                <option value="mtn_2gb_30_days">MTN 2GB 30 Days</option>
                <option value="mtn_3gb_30days">MTN 3GB 30days</option>
                <option value="mtn_45gb_30days">MTN 4.5GB 30days</option>
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
            <select class="form-select" name="package">
                <option value="mtn_custom">AIRTEL</option>
                <option value="airtel_custom">MTN</option>
                <option value="glo_custom">GLO</option>
                <option value="9mobile_custom">9MOBILE</option>
            </select>
        </div>
    </div>
    <div class="row mb-15px" style="display: none;" id="glo">
        <label class="form-label col-form-label col-md-2">Select Package</label>
        <div class="col-md-6">
            <select class="form-select" name="package">
                <option value="glo_90mb">GLO 90MB</option>
                <option value="glo_340mb">GLO 340MB</option>
                <option value="glo_1_05gb">GLO 1.05GB</option>
                <option value="glo_2_3gb">GLO 2.03GB</option>
                <option value="glo_3_75gb">GLO 3.75GB</option>
                <option value="glo_5_25_gb">GLO 5.25GB</option>
                <option value="glo_7gb">GLO 7GB</option>
                <option value="glo_9gb">GLO 9GB</option>
                <option value="glo_12gb">GLO 12GB</option>
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
            <select class="form-select" name="package">
                <option value="mtn_custom">9mobile</option>
                <option value="airtel_custom">AIRTEL</option>
                <option value="glo_custom">GLO</option>
                <option value="9mobile_custom">9MOBILE</option>
            </select>
        </div>
    </div>
    <script type="text/javascript">
        function update() {
            var select = document.getElementById('network');
            var option = select.options[select.selectedIndex];
            if(option.value == 'mtn'){
                document.getElementById("mtn").style.display = "block";
                document.getElementById("aitel").style.display = "block";
                document.getElementById("glo").style.display = "none";
                document.getElementById("9mobile").style.display = "none";
            }else if(option.value == 'airtel'){
                document.getElementById("aitel").style.display = "none";
                document.getElementById("glo").style.display = "none";
                document.getElementById("9mobile").style.display = "none";
                document.getElementById("mtn").style.display = "none";
            }else if(option.value == 'glo'){
                document.getElementById("glo").style.display = "block";
                document.getElementById("9mobile").style.display = "none";
                document.getElementById("mtn").style.display = "none";
                document.getElementById("aitel").style.display = "none";
            }else{
                document.getElementById("9mobile").style.display = "block";
                document.getElementById("mtn").style.display = "none";
                document.getElementById("aitel").style.display = "none";
                document.getElementById("glo").style.display = "none";
            }
        }
    </script>
{{-- <div class="row mb-15px">
<label class="form-label col-form-label col-md-2">Amount</label>
<div class="col-md-6">
<input class="form-control" type="text" name ="amount" placeholder="Enter Amount" required />
</div>
</div> --}}
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