@include('user.head')
@include('user.header')
@include('user.sidebar')
<div class="app-sidebar-bg"></div>
<div class="app-sidebar-mobile-backdrop"><a href="#" data-dismiss="app-sidebar-mobile" class="stretched-link"></a></div>


<div id="content" class="app-content">

<ol class="breadcrumb float-xl-end">
<li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
</ol>


<h1 class="page-header">Dashboard </h1>


<div class="row">

<div class="col-xl-4 col-md-6">
<div class="widget widget-stats bg-teal">
<div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
<div class="stats-content">
<div class="stats-title">MY BALANCE</div>
<div class="stats-number">{{ $capital + $bonus - $expenses}}</div>
<div class="stats-progress progress">
<div class="progress-bar" style="width: 70.1%;"></div>
</div>
</div>
</div>
</div>



<div class="col-xl-4 col-md-6">
<div class="widget widget-stats bg-indigo">
<div class="stats-icon stats-icon-lg"><i class="fa fa-archive fa-fw"></i></div>
<div class="stats-content">
<div class="stats-title">Bonus</div>
<div class="stats-number">#{{ $bonusamount - $withdrawbonus }}</div>
<div class="stats-progress progress">
<div class="progress-bar" style="width: 76.3%;"></div>
</div>
</div>
</div>
</div>


<div class="col-xl-4 col-md-6">
<div class="widget widget-stats bg-gray-900">
<div class="stats-icon stats-icon-lg"><i class="fa fa-comment-alt fa-fw"></i></div>
<div class="stats-content">
<div class="stats-title">WITHDRAW</div>
<div class="stats-number">#{{ $withdrawamount }}</div>
<div class="stats-progress progress">
<div class="progress-bar" style="width: 54.9%;"></div>
</div>
</div>
</div>
</div>
<div class="col-xl-4 col-md-6">
<div class="widget widget-stats bg-blue">
<div class="stats-icon stats-icon-lg"><i class="fa fa-dollar-sign fa-fw"></i></div>
<div class="stats-content">
<div class="stats-title">POINT</div>
<div class="stats-number">{{ auth()->user()->point }}</div>
<div class="stats-progress progress">
<div class="progress-bar" style="width: 40.5%;"></div>
</div>
</div>
</div>
</div>

</div>
<div class="row mb-15px">
    <label class="form-label col-form-label col-md-2">Affliate Link</label>
    <div class="col-md-10">
        <input type="text" class="form-control"  placeholder="{{ Route('register',['ref' => auth()->user()->mySponsorId]) }}" value="{{ Route('register',['ref' => auth()->user()->mySponsorId]) }}" disabled>    
    </div>
</div>
<div class="row">


<div class="col-xl-6 col-lg-6">

<div class="panel panel-inverse" data-sortable-id="index-3">
<div class="panel-heading">
<h4 class="panel-title">Today's Schedule</h4>
</div>
<div id="schedule-calendar" class="simple-calendar"></div>
<hr class="m-0 bg-gray-500" />
</div>

</div>

</div>

<div class="alert alert-secondary alert-dismissible rounded-0 mb-0 fade show">
<button type="button" class="btn-close" data-bs-dismiss="alert">
</button>
Transaction Activity
</div>

<div class="panel-body">

</table> <table id="data-table-responsive" class="table table-striped table-bordered align-middle">
    <thead>
    <tr>
    <th class="text-nowrap">Transaction ID</th>
    <th class="text-nowrap">Amount</th>
    <th class="text-nowrap">Payment Type</th>
    <th class="text-nowrap">Status</th>
    <th class="text-nowrap">Date</th>

    </tr>
    </thead>
    @foreach ( $data as $dat )

    <tbody>
    <tr class="odd gradeX">
    <td>{{ $dat->transactionId }}</td>
    <td>{{ $dat->amount }}</td>
    <td>{{ $dat->paymentType }}</td>
    <td>{{ $dat->status }}</td>
    <td>{{ $dat->created_at }}</td>
    </tr>
    </tr>
    </tbody>
    @endforeach
    </table>
</div>

</div>

</div>

<script src="assets/js/vendor.min.js" type="23df6835d8d0c3403c3bd6d9-text/javascript"></script>
<script src="assets/js/app.min.js" type="23df6835d8d0c3403c3bd6d9-text/javascript"></script>


<script src="assets/plugins/d3/d3.min.js" type="23df6835d8d0c3403c3bd6d9-text/javascript"></script>
<script src="assets/plugins/nvd3/build/nv.d3.min.js" type="23df6835d8d0c3403c3bd6d9-text/javascript"></script>
<script src="assets/plugins/jvectormap-next/jquery-jvectormap.min.js" type="23df6835d8d0c3403c3bd6d9-text/javascript"></script>
<script src="assets/plugins/jvectormap-next/jquery-jvectormap-world-mill.js" type="23df6835d8d0c3403c3bd6d9-text/javascript"></script>
<script src="assets/plugins/simple-calendar/dist/jquery.simple-calendar.min.js" type="23df6835d8d0c3403c3bd6d9-text/javascript"></script>
<script src="assets/plugins/gritter/js/jquery.gritter.js" type="23df6835d8d0c3403c3bd6d9-text/javascript"></script>
<script src="assets/js/demo/dashboard-v2.js" type="23df6835d8d0c3403c3bd6d9-text/javascript"></script>

<script type="23df6835d8d0c3403c3bd6d9-text/javascript">
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-53034621-1', 'auto');
		ga('send', 'pageview');

	</script>
<script src="cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="23df6835d8d0c3403c3bd6d9-|49" defer=""></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"71e2e2eb0db741a2","version":"2022.6.0","r":1,"token":"4db8c6ef997743fda032d4f73cfeff63","si":100}' crossorigin="anonymous"></script>
</body>

<!-- Mirrored from seantheme.com/color-admin/admin/html/index_v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Jun 2022 07:46:58 GMT -->
</html>
<script type="23df6835d8d0c3403c3bd6d9-text/javascript">

</script>