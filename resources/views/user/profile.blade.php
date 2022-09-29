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
<form action="{{ route("profileimage") }}" method="post" enctype="multipart/form-data">
@csrf
<span class="btn btn-primary fileinput-button me-1">
        <input type="file" name="file" >
</span>
<button type="submit" class="btn btn-xs btn-yellow" style="background-color:yellow;">Update Profile Image</button>
</form>

</div>
</div>


<ul class="profile-header-tab nav nav-tabs">
<li class="nav-item"><a href="#profile-about" class="nav-link active" data-bs-toggle="tab">ABOUT</a></li>
<li class="nav-item"><a href="#profile-password" class="nav-link" data-bs-toggle="tab">PASSWORD</a></li>

</ul>

</div>
</div>


<div class="profile-content">

<div class="tab-content p-0">




<div class="tab-pane fade show active" id="profile-about">

<div class="table-responsive form-inline">
<table class="table table-profile align-middle">
<thead>
<tr>
<th></th>
<th>
<h4> {{ auth()->user()->username }} <small> {{ auth()->user()->email }}</small></h4>
</th>
</tr>
</thead>
<tbody>
<form action="{{ route('profile') }}" method="post">
@csrf
<tr class="highlight">
<td class="field">First Name</td>
<td ><a href="javascript:;" class="text-decoration-none fw-bold"><input class="form-control" type="text" name ="firstName" value="{{ auth()->user()->firstName }}" placeholder="{{ auth()->user()->firstName }}" style="width:90%;"></a></td>
</tr>
<tr class="highlight">
<td class="field">Last Name</td>
<td ><a href="javascript:;" class="text-decoration-none fw-bold"><input class="form-control" type="text" name ="lastName" value="{{ auth()->user()->lastName }}" placeholder="{{ auth()->user()->lastName }}" style="width:90%;"></a></td>
</tr>
<tr class="highlight">
<td class="field"> Username</td>
<td ><a href="javascript:;" class="text-decoration-none fw-bold"><input class="form-control" type="text" name ="username" value="{{ auth()->user()->username }}" placeholder="{{ auth()->user()->username }}" style="width:90%;" disabled></a></td>
</tr>
<tr class="highlight">
<td class="field">Email Address</td>
<td ><a href="javascript:;" class="text-decoration-none fw-bold"><input class="form-control" type="email" name ="email" value="{{ auth()->user()->email }}" placeholder="{{ auth()->user()->firstName }}" style="width:90%;" disabled></a></td>
</tr>
<tr class="highlight">
<td class="field">Mobile Number</td>
<td ><a href="javascript:;" class="text-decoration-none fw-bold"><input class="form-control" type="text" name ="phoneNumber" value="{{ auth()->user()->phoneNumber }}" placeholder="{{ auth()->user()->phoneNumber }}" style="width:90%;"></a></td>
</tr>
{{-- <tr class="highlight">
<td class="field">Country</td>
<td ><a href="javascript:;" class="text-decoration-none fw-bold"><input class="form-control" type="text" name ="country" value="{{ auth()->user()->country }}" placeholder="{{ auth()->user()->country }}" style="width:90%;"></a></td>
</tr>
<tr> --}}
<tr class="divider">
<td colspan="2"></td>
</tr>
<tr class="highlight">
<td class="field">&nbsp;</td>
<td class="">
<button type="submit" class="btn btn-primary w-150px">Update</button>
</td>
</tr>
</form>
</tbody>
</table>
</div>

</div>
<div class = "tab-pane fade"id="profile-password">

<div class="table-responsive form-inline">
<table class="table table-profile align-middle">
<thead>
<tr>
<th></th>
<th>
<h4>Security</h4>
</th>
</tr>
</thead>
<tbody>
<form action="{{ route("profilepass") }}" method="post">
 @csrf
<tr class="highlight">
<td class="field">Old Password</td>
<td ><a href="javascript:;" class="text-decoration-none fw-bold"><input class="form-control" type="text" name ="current_password" placeholder="**********" style="width:90%;"></a></td>
</tr>
<tr class="highlight">
<td class="field">New Password</td>
<td ><a href="javascript:;" class="text-decoration-none fw-bold"><input class="form-control" type="password" name ="password" placeholder="**********" style="width:90%;"></a></td>
</tr>
<tr class="highlight">
<td class="field"> Confirm Password</td>
<td ><a href="javascript:;" class="text-decoration-none fw-bold"><input class="form-control" type="password" name ="password_confirmation" placeholder="**********" style="width:90%;"></a></td>
</tr>

<tr>
<tr class="divider">
<td colspan="2"></td>
</tr>
<tr class="highlight">
<td class="field">&nbsp;</td>
<td class="">
<button type="submit" class="btn btn-primary w-150px">Update</button>
</td>
</tr>
</form>
</tbody>
</table>
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