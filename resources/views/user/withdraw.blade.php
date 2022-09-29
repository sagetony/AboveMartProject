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
<h4> Withdraw Funds</h4>
<form action="{{ route('withdraw') }}" method="post">
@csrf
<div class="row mb-15px">
<label class="form-label col-form-label col-md-2">From</label>
<div class="col-md-6">
    <select class="form-select" name="withdraw_type" required>
        <option value="Wallet">My Wallet</option>
        <option value="Bonus">Commission</option>
    </select>
</div>
</div>
<div class="row mb-15px">
    <label class="form-label col-form-label col-md-2">Payment Method</label>
    <div class="col-md-6">
        <input type="text" value="Bank Transfer" name="bankType" class="form-control" disabled>
    </div>
</div>

<div class="row mb-15px">
    <label class="form-label col-form-label col-md-2">Amount (Naira)</label>
    <div class="col-md-6">
        <input type="text" name="amount" class="form-control" id="amount" >
    </div>
</div>
<div class="row mb-15px">
    <label class="form-label col-form-label col-md-2">Bank Name</label>
    <div class="col-md-6">
        <input type="text" name="bankName" class="form-control" id="bankName" >
    </div>
</div>
<div class="row mb-15px">
    <label class="form-label col-form-label col-md-2">Bank Address</label>
    <div class="col-md-6">
        <input type="text" name="bankAddress" class="form-control" id="bankAddress" >
    </div>
</div>
<div class="row mb-15px">
    <label class="form-label col-form-label col-md-2">Account Name</label>
    <div class="col-md-6">
        <input type="text" name="accountName" class="form-control" id="accountName" >
    </div>
</div>
<div class="row mb-15px">
    <label class="form-label col-form-label col-md-2">Account Number</label>
    <div class="col-md-6">
        <input type="text" name="accountNumber" class="form-control" id="accountNumber" >
    </div>
</div>
<div class="row mb-15px">
<div class="col-md-2">
</div>
<div class="col-md-9">
<button type="submit" class="btn btn-primary w-150px">Withdraw Now</button>
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