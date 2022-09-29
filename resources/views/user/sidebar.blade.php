
<div id="sidebar" class="app-sidebar">

<div class="app-sidebar-content" data-scrollbar="true" data-height="100%">

<div class="menu">
<div class="menu-profile">
<a href="javascript:;" class="menu-profile-link" data-toggle="app-sidebar-profile" data-target="#appSidebarProfileMenu">
<div class="menu-profile-cover with-shadow"></div>
<div class="menu-profile-image">
<img src="{{ auth()->user()->photo }}" alt="" />
</div>
<div class="menu-profile-info">
<div class="d-flex align-items-center">
<div class="flex-grow-1">
 {{ auth()->user()->lastName}} {{ auth()->user()->firstName }}
</div>
</div>
<small>{{ auth()->user()->rank }}</small>
</div>
</a>
</div>

<div class="menu-item has-sub active">
<a href="{{ route('dashboard') }}" class="menu-link">
<div class="menu-icon">
<i class="fa fa-sitemap"></i>
</div>
<div class="menu-text">Dashboard</div>
</a>
</div>
<div class="menu-item has-sub">
<a href="javascript:;" class="menu-link">
<div class="menu-icon">
<i class="fa fa-hdd"></i>
</div>
<div class="menu-text">My Account</div>
<div class="menu-caret"></div>
</a>
<div class="menu-submenu">
<div class="menu-item">
<a href="{{ route('profile') }}" class="menu-link">
<div class="menu-text">Edit Profile</div>
</a>
</div>
<div class="menu-item">
<a href="{{ route('userpackage') }}" class="menu-link">
<div class="menu-text">My Package</div>
</a>
</div>
</div>
</div>

<div class="menu-item has-sub">
<a href="javascript:;" class="menu-link">
<div class="menu-icon">
<i class="fa fa-gem"></i>
</div>
<div class="menu-text">Payment</div>
<div class="menu-caret"></div>
</a>
<div class="menu-submenu">
<div class="menu-item">
<a href="{{ route('fund') }}" class="menu-link">
<div class="menu-text">Fund Wallet <i class="fa fa-wallet text-theme"></i></div>
</a>
</div>
<div class="menu-item">
<a href="{{ route('withdraw') }}" class="menu-link">
<div class="menu-text">Withdraw <i class="fa fa-wallet text-theme"></i></div>
</a>
</div>
<div class="menu-item">
    <a href="{{ route('transfer') }}" class="menu-link">
    <div class="menu-text">Transfer <i class="fa fa-wallet text-theme"></i></div>
    </a>
</div>
</div>
</div>
<div class="menu-item has-sub">
<a href="javascript:;" class="menu-link">
<div class="menu-icon">
<i class="fa fa-list-ol"></i>
</div>
<div class="menu-text">Tele Communication <span class="menu-label">NEW</span></div>
<div class="menu-caret"></div>
</a>
<div class="menu-submenu">

<div class="menu-item">
<a href="" class="menu-link">
<div class="menu-text">Recharge Card Purchase <i class="fa fa-paper-plane text-theme"></i></div>
</a>
</div>
<div class="menu-item">
<a href="form_editable.html" class="menu-link">
<div class="menu-text">Recharge Card Printing</div>
</a>
</div>
<div class="menu-item">
<a href="" class="menu-link">
<div class="menu-text">DSTV/GOTV Subscription</div>
</a>
</div>

<div class="menu-item">
<a href="" class="menu-link">
<div class="menu-text">Electricity Payment</div>
</a>
</div>


</div>
</div>
<div class="menu-item has-sub">
<a href="javascript:;" class="menu-link">
<div class="menu-icon">
<i class="fa fa-table"></i>
</div>
<div class="menu-text">Affilate Program</div>
<div class="menu-caret"></div>
</a>
<div class="menu-submenu">
<div class="menu-item">
<a href="{{ route('sponsorpackage') }}" class="menu-link">
<div class="menu-text">Sponsor Package</div>
</a>
</div>
<div class="menu-item has-sub">
<a href="{{ route('member') }}" class="menu-link">
<div class="menu-text">My Team Members</div>
</a>
</div>
</div>
</div>

<div class="menu-item has-sub">
<a href="javascript:;" class="menu-link">
<div class="menu-icon">
<i class="fa fa-wallet"></i>
</div>
<div class="menu-text">Transaction History</div>
<div class="menu-caret"></div>
</a>
<div class="menu-submenu">
<div class="menu-item">
<a href="{{ route('deposithistory') }}" class="menu-link">
<div class="menu-text">Deposit History </div>
</a>
</div>
<div class="menu-item">
<a href="{{ route('withdrawhistory') }}" class="menu-link">
<div class="menu-text">Withdraw History</i></div>
</a>
</div>
<div class="menu-item">
<a href="{{ route('bonushistory') }}" class="menu-link">
<div class="menu-text">Bonus History</div>
</a>
</div>
</div>
</div>
<div class="menu-item has-sub">
<a href="javascript:;" class="menu-link">
<div class="menu-icon">
<i class="fa fa-envelope"></i>
</div>
<div class="menu-text">Support</div>
</a>

</div>

<div class="menu-item has-sub">
<a href="{{ route('logout') }}" class="menu-link">
<div class="menu-icon">
<i class="fa fa-key"></i>
</div>
<div class="menu-text">Logout</div>
</a>

</div>
</div>
</div>

</div>