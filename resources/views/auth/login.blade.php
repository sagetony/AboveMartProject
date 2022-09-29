<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from seantheme.com/color-admin/admin/html/login_v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Jun 2022 07:55:46 GMT -->
<head>
<meta charset="utf-8" />
<title>Login to your Account | AboveMarts </title>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
<meta name="description" content="Create a free Account on AboveMarts Platform" />
<meta content="AboveMarts" name="author" />

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
<link href="assets/css/vendor.min.css" rel="stylesheet" />
<link href="assets/css/default/app.min.css" rel="stylesheet" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class='pace-top'>

<div id="loader" class="app-loader">
<span class="spinner"></span>
</div>


<div id="app" class="app">

<div class="login login-v2 fw-bold">

<div class="login-cover">
<div class="login-cover-img" style="background-image: url(assets/img/login-bg/login-bg-17.jpg)" data-id="login-cover-image"></div>
<div class="login-cover-bg"></div>
</div>


<div class="login-container">

<div class="login-header">
<div class="brand">
<div class="d-flex align-items-center">
<span class="logo"></span> <b>Above</b> VTU
</div>
<small>Get Started With AboveMarts Platform</small>
</div>
<div class="icon">
<i class="fa fa-lock"></i>
</div>
</div>


<div class="login-content">
<form action="{{ route('login') }}" method="POST">
	@csrf
<div class="form-floating mb-20px">
<input type="text" class="form-control fs-13px h-45px border-0" placeholder="User Name" name="username" required />
<label for="username" class="d-flex align-items-center text-gray-600 fs-13px">Username</label>
</div>

<div class="form-floating mb-20px">
<input type="password" class="form-control fs-13px h-45px border-0" placeholder="Password" name="password" required />
<label for="password" class="d-flex align-items-center text-gray-600 fs-13px">Password</label>
</div>

<div class="form-check mb-20px">
<input class="form-check-input border-0" type="checkbox" value="1" id="rememberMe" />
<label class="form-check-label fs-13px text-gray-500" for="rememberMe">
Remember Me
</label>
</div>
<div class="mb-20px">
<button type="submit" class="btn btn-success d-block w-100 h-45px btn-lg">Sign me in</button>
</div>
<div class="text-gray-500">
Already a member yet? Click <a href="{{ route('register') }}" class="text-white">here</a> to register.
</div>
</form>
</div>

</div>

</div>


<div class="login-bg-list clearfix">
<div class="login-bg-list-item active"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="assets/img/login-bg/login-bg-17.jpg" style="background-image: url(assets/img/login-bg/login-bg-17.jpg)"></a></div>
<div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="assets/img/login-bg/login-bg-16.jpg" style="background-image: url(assets/img/login-bg/login-bg-16.jpg)"></a></div>
<div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="assets/img/login-bg/login-bg-15.jpg" style="background-image: url(assets/img/login-bg/login-bg-15.jpg)"></a></div>
<div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="assets/img/login-bg/login-bg-14.jpg" style="background-image: url(assets/img/login-bg/login-bg-14.jpg)"></a></div>
<div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="assets/img/login-bg/login-bg-13.jpg" style="background-image: url(assets/img/login-bg/login-bg-13.jpg)"></a></div>
<div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="assets/img/login-bg/login-bg-12.jpg" style="background-image: url(assets/img/login-bg/login-bg-12.jpg)"></a></div>
</div>



<script src="assets/js/vendor.min.js" type="a7059b533cf10b1ac9aabf4f-text/javascript"></script>
<script src="assets/js/app.min.js" type="a7059b533cf10b1ac9aabf4f-text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@include('sweetalert::alert')

<script src="assets/js/demo/login-v2.demo.js" type="a7059b533cf10b1ac9aabf4f-text/javascript"></script>

<script type="a7059b533cf10b1ac9aabf4f-text/javascript">
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','../../../../www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-53034621-1', 'auto');
		ga('send', 'pageview');

	</script>
<script src="cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="a7059b533cf10b1ac9aabf4f-|49" defer=""></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"71e2e3faad9541bc","version":"2022.6.0","r":1,"token":"4db8c6ef997743fda032d4f73cfeff63","si":100}' crossorigin="anonymous"></script>
</body>

<!-- Mirrored from seantheme.com/color-admin/admin/html/login_v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Jun 2022 07:55:52 GMT -->
</html>