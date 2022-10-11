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
<h4> Electricity Purchase</small></h4>
<form action="{{ route('lightpurchase') }}" method="post">
@csrf

    <div class="row mb-15px">
        <label class="form-label col-form-label col-md-2">Select Electricity Service</label>
        <div class="col-md-6">
            <select class="form-select" name="package" id="package">
                <option value="none">Select Package</option>
                <option value="jedc_prepaid_custom">JEDC PREPAID</option>
                <option value="jedc_postpaid_custom">JEDC POSTPAID</option>
                <option value="phed_prepaid_custom">PHED PREPAID</option>
                <option value="phed_postpaid_custom">PHED POSTPAID</option>
                <option value="ibedc_prepaid_custom">IBEDC PREPAID</option>
                <option value="ibedc_postpaid_custom">IBEDC POSTPAID</option>
                <option value="ikedc_prepaid_custom">IKEDC PREPAID</option>
                <option value="ikedc_postpaid_custom">IKEDC POSTPAID</option>
                <option value="ekedc_prepaid_custom">EKEDC PREPAID</option>
                <option value="ekedc_postpaid_custom">EKEDC POSTPAID</option>
                <option value="aedc_prepaid_custom">AEDC PREPAID</option>
                <option value="aedc_postpaid_custom">AEDC POSTPAID</option>
                <option value="kedco_prepaid_custom">KEDCO PREPAID</option>
                <option value="kedco_postpaid_custom">KEDCO POSTPAID</option>
                <option value="kedc_postpaid_custom">KEDC PREPAID</option>
                <option value="kedc_prepaid_custom">KEDC POSTPAID</option>
                <option value="yedc_prepaid_custom">YEDC PREPAID</option>
                <option value="yedc_postpaid_custom">YEDC POSTPAID</option>
                <option value="bedc_prepaid_custom">BEDC PREPAID</option>
                <option value="bedc_postpaid_custom">BEDC POSTPAID</option>
                <option value="eedc_prepaid_custom">EEDC PREPAID</option>
                <option value="eedc_postpaid_custom">EEDC POSTPAID</option>
            </select>
            <small class="fs-12px text-gray-500-darker">Kindly select a electricity service.</small>
        </div>
    </div>

    <div class="row mb-15px" id="amount">
        <label class="form-label col-form-label col-md-2">Meter Number</label>
        <div class="col-md-6">
        <input class="form-control" type="number" id="meter" name ="meterNumber" placeholder="Enter Meter Number" required />
        </div>
    </div>
    <div class="row mb-15px" id="amount">
    <label class="form-label col-form-label col-md-2">Amount</label>
    <div class="col-md-6">
    <input class="form-control" type="number" id="amountV" name ="amount" placeholder="Enter Amount" required />
    </div>
    </div>
    <div class="row mb-15px">
    <div class="col-md-2">
    </div>
    <div class="col-md-9">
    <button type="submit" class="btn btn-primary w-250px">Buy</button>
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