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
<form action="{{ route('userpackage') }}" method="post">
@csrf

<section style="margin-top:-5%;">
    <div class="container z-index-2 position-relative">
        <div class="section-heading mb-8 wow fadeIn" data-wow-delay="100ms">
            {{-- <span class="subtitle">AboveMarts Partnership Plans And Benefits</span> --}}
            <h2 class="w-100">Deposit Transaction<span class="font-weight-400"> Records</span></h2>
        </div>
        
<div class="alert alert-secondary alert-dismissible rounded-0 mb-0 fade show">
   
    Transaction Activity
    </div>
    
    <div class="panel-body">
    <table id="data-table-responsive" class="table table-striped table-bordered align-middle">
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
    <div class="d-sm-inline-block d-none p-2 bg-primary rounded-circle position-absolute right-5 bottom-25 ani-left-right"></div>
    <div class="d-sm-inline-block d-none p-2 border-secondary border border-width-2 position-absolute right-10 top-25 ani-move"></div>
    <div class="d-inline-block px-5 py-6 border position-absolute left-5 top-5 border-radius-10 ani-move"></div>
</section>

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