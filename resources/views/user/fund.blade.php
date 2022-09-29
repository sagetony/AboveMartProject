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
<h4> Deposit</small></h4>
<form action="{{ route('pay') }}" method="post">
@csrf
<div class="row mb-15px">
<label class="form-label col-form-label col-md-1">Email address</label>
<div class="col-md-6">
<input class="form-control" type="email" name ="email" placeholder="Enter Email Address" />
<small class="fs-12px text-gray-500-darker">We'll never share your email with anyone else.</small>
</div>
</div>
<div class="row mb-15px">
<label class="form-label col-form-label col-md-1">Amount</label>
<div class="col-md-6">
<input class="form-control" type="text" name ="amount" placeholder="Enter Amount" />
</div>
</div>
<div class="row mb-15px">
<div class="col-md-1">
</div>
<div class="col-md-9">
<button type="submit" class="btn btn-primary w-150px">Fund Wallet</button>
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