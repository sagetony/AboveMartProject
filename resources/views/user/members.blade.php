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
            <h2 class="w-100">My Team <span class="font-weight-400">Members</span></h2>
        </div>
        <div class="row mb-15px mt-4 mb-4">
            <div class="col-md-1">
            </div>
            <label class="form-label col-form-label col-md-2">Affliate Link</label>
            <div class="col-md-7">
                <input type="text" class="form-control"  placeholder="{{ Route('register',['ref' => auth()->user()->mySponsorId]) }}" value="{{ Route('register',['ref' => auth()->user()->mySponsorId]) }}" disabled>    
            </div>
        </div>

        <div class="row">

            <div class="col-xl-12">
            
            <div class="panel panel-inverse" data-sortable-id="table-basic-1">
            
            
            
            <div class="panel-body">
            
            <div class="table-responsive">
            <table class="table mb-0">
            <thead>
            <tr>
            <th>Uplines</th>
            <th>Downlines</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            @if(auth()->user()->uplineOne != 'Admin')
            <td>{{ auth()->user()->uplineOne }}</td>
            @else
            <td></td>
            @endif
            @if(auth()->user()->downlineOne != 'Admin')
            <td>{{ auth()->user()->downlineOne }}</td>
            @else
            <td></td>
            @endif
            
            </tr>
            <tr>
                @if(auth()->user()->uplineTwo != 'Admin')
                <td>{{ auth()->user()->uplineTwo }}</td>
                @else
                <td></td>
                @endif
                @if(auth()->user()->downlineTwo != 'Admin')
                <td>{{ auth()->user()->downlineTwo }}</td>
                @else
                <td></td>
                @endif
            </tr>
            <tr>
                @if(auth()->user()->uplineThree != 'Admin')
                <td>{{ auth()->user()->uplineThree }}</td>
                @else
                <td></td>
                @endif
                @if(auth()->user()->downlineThree != 'Admin')
                <td>{{ auth()->user()->downlineThree }}</td>
                @else
                <td></td>
                @endif
            </tr>
            <tr>
                @if(auth()->user()->uplineFour != 'Admin')
                <td>{{ auth()->user()->uplineFour }}</td>
                @else
                <td></td>
                @endif
                @if(auth()->user()->downlineFour != 'Admin')
                <td>{{ auth()->user()->downlineFour }}</td>
                @else
                <td></td>
                @endif
            </tr>
            <tr>
                @if(auth()->user()->uplineFive != 'Admin')
                <td>{{ auth()->user()->uplineFive }}</td>
                @else
                <td></td>
                @endif
                @if(auth()->user()->downlineFive != 'Admin')
                <td>{{ auth()->user()->downlineFive }}</td>
                @else
                <td></td>
                @endif
            </tr>
            <tr>
                @if(auth()->user()->uplineSix != 'Admin')
                <td>{{ auth()->user()->uplineSix }}</td>
                @else
                <td></td>
                @endif
                @if(auth()->user()->downlineSix != 'Admin')
                <td>{{ auth()->user()->downlineSix }}</td>
                @else
                <td></td>
                @endif
            </tr>
            <tr>
                @if(auth()->user()->uplineSeven != 'Admin')
                <td>{{ auth()->user()->uplineSeven }}</td>
                @else
                <td></td>
                @endif
                @if(auth()->user()->uplineSeven != 'Admin')
                <td>{{ auth()->user()->downlineSeven }}</td>
                @else
                <td></td>
                @endif
            </tr>
            </tbody>
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