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
<h4> Package Purchase</h4>
<form action="{{ route('userpackage') }}" method="post">
@csrf
<div class="row mb-15px">
<label class="form-label col-form-label col-md-2">Our Packages</label>
<div class="col-md-6">
    <select class="form-select" name="package" required>
        <option value="NONE">Select Package</option>
        @foreach ( $data as $datapackage )

        <option value="{{ $datapackage->packageName }}">{{ $datapackage->packageName }}</option>
        @endforeach

    </select>

</div>
</div>

<div class="row mb-15px">
<div class="col-md-2">
</div>
<div class="col-md-10">
<button type="submit" class="btn btn-primary w-250px">Purchase Package</button>
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