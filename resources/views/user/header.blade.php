<body>

<div id="loader" class="app-loader">
<span class="spinner"></span>
</div>


<div id="app" class="app app-header-fixed app-sidebar-fixed">

<div id="header" class="app-header">

<div class="navbar-header">
<a href="{{ route('dashboard') }}" class="navbar-brand"><span class="navbar-logo"></span> <b>Above</b> Marts</a>
<button type="button" class="navbar-mobile-toggler" data-toggle="app-sidebar-mobile">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
</div>


<div class="navbar-nav">
<div class="navbar-item navbar-form">
{{-- <form action="#" method="POST" name="search">
<div class="form-group">
<input type="text" class="form-control" placeholder="Enter keyword" />
<button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
</div>
</form> --}}
</div>

<div class="navbar-item navbar-user dropdown">
<a href="#" class="navbar-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
<img src="{{ auth()->user()->photo }}" alt="" />
<span>
<span class="d-none d-md-inline">{{ auth()->user()->username }}</span>
<b class="caret"></b>
</span>
</a>
<div class="dropdown-menu dropdown-menu-end me-1">
<a href="{{ route('profile') }}" class="dropdown-item">Edit Profile</a>
<div class="dropdown-divider"></div>
<a href="{{ route('logout') }}" class="dropdown-item">Log Out</a>
</div>
</div>
</div>

</div>
