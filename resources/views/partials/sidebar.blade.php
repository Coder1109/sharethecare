<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{ url('home') }}">
{{--                    <div class="brand-logo">--}}
{{--                        <img class="img-fluid" src="{{ asset('images/vuexy-logo.png') }}">--}}
{{--                    </div>--}}
                    <h2 class="brand-text pl-3 mb-0">Dashboard</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            @if(!auth()->user()->hasRole('member'))
                <li class=" nav-item"><a href="#"><i class="fa fa-user-plus"></i><span class="menu-title">Member Portal</span></a>
                    <ul class="menu-content">
                        <li class="nav-item @if(request()->routeIs('portalManual')) active @endif">
                            <a href="{{route('portalManual')}}">
                                <i class="feather icon-list"></i>
                                <span class="menu-title">Manual Entry</span>
                            </a>
                        </li>
                        <li class="nav-item @if(request()->routeIs('portalPatients')) active @endif">
                            <a href="{{ route('portalPatients') }}">
                                <i class="fa fa-users"></i>
                                <span class="menu-title" data-i18n="User">All Patients</span>
                            </a>
                        </li>
                        <li class="nav-item @if(request()->routeIs('portalTopReferrer')) active @endif">
                            <a href="{{ route('portalTopReferrer') }}">
                                <i class="feather icon-user-check"></i>
                                <span class="menu-title" data-i18n="User">Top Referrers</span>
                            </a>
                        </li>
                        <li class="nav-item @if(request()->routeIs('generateReviewQR')) active @endif">
                            <a href="{{ route('generateReviewQR') }}">
                                <i class="fa fa-external-link-square"></i>
                                <span class="menu-title" data-i18n="User">Generate Review QR Code</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            @if(auth()->user()->hasRole('superadmin'))
                <li class=" nav-item"><a href="#"><i class="fa fa-user-md"></i><span class="menu-title">Admin</span></a>
                    <ul class="menu-content">
                        <li class="nav-item @if(request()->routeIs('adminUsers.index')) active @endif">
                            <a href="{{ route('adminUsers.index') }}">
                                <i class="feather icon-users"></i>
                                <span class="menu-title" data-i18n="User">Team Management</span>
                            </a>
                        </li>
                        <li class="nav-item @if(request()->routeIs('adminProfile')) active @endif">
                            <a href="{{ route('adminProfile') }}">
                                <i class="feather icon-user"></i>
                                <span class="menu-title" data-i18n="User">Profile & Settings</span>
                            </a>
                        </li>
                        <li class="nav-item @if(request()->routeIs('adminOffice')) active @endif">
                            <a href="{{ route('adminOffice') }}">
                                <i class="fa fa-bed"></i>
                                <span class="menu-title" data-i18n="User">Office ID</span>
                            </a>
                        </li>
                        <li class="nav-item"><a href="#"><i class="fa fa-area-chart"></i><span class="menu-title">Analytics</span></a>
                            <ul class="menu-content">
                                <li class="nav-item @if(request()->routeIs('adminAnalyticsReferrer')) active @endif">
                                    <a href="{{ route('adminAnalyticsReferrer') }}">
                                        <i class="feather icon-circle"></i>
                                        <span class="menu-title ">Referrer Analytics</span>
                                    </a>
                                </li>
                                <li class="nav-item @if(request()->routeIs('adminAnalyticsTeam')) active @endif">
                                    <a href="{{ route('adminAnalyticsTeam') }}">
                                        <i class="feather icon-circle"></i>
                                        <span class="menu-title ">Team Analytics</span>
                                    </a>
                                </li>
                                <li class="nav-item @if(request()->routeIs('adminAnalyticsReview')) active @endif">
                                    <a href="{{ route('adminAnalyticsReview') }}">
                                        <i class="feather icon-circle"></i>
                                        <span class="menu-title ">Review Requests</span>
                                    </a>
                                </li>
                                <li class="nav-item @if(request()->routeIs('adminAnalyticsOffice')) active @endif">
                                    <a href="{{ route('adminAnalyticsOffice') }}">
                                        <i class="feather icon-circle"></i>
                                        <span class="menu-title ">Office Analytics</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            @endif

            @if(auth()->user()->level() > 3)
                <li class=" nav-item"><a href="#"><i class="fa fa-ambulance"></i><span class="menu-title">Business Referrers</span></a>
                    <ul class="menu-content">
                        <li class="nav-item @if(request()->routeIs('referrerQR')) active @endif">
                            <a href="{{route('referrerQR')}}">
                                <i class="fa fa-qrcode"></i>
                                <span class="menu-title">QR Generate</span>
                            </a>
                        </li>
                        <li class="nav-item @if(request()->routeIs('referrerRetrieve')) active @endif">
                            <a href="{{route('referrerRetrieve')}}">
                                <i class="feather icon-user"></i>
                                <span class="menu-title">QR Retrieve</span>
                            </a>
                        </li>
                        <li class="nav-item @if(request()->routeIs('referrerOffice')) active @endif">
                            <a href="{{route('referrerOffice')}}">
                                <i class="fa fa-bed"></i>
                                <span class="menu-title" data-i18n="User">Office ID</span>
                            </a>
                        </li>
                        <li class="nav-item @if(request()->routeIs('referrerTeam')) active @endif">
                            <a href="{{route('referrerTeam')}}">
                                <i class="fa fa-users"></i>
                                <span class="menu-title" data-i18n="User">Team Management</span>
                            </a>
                        </li>
                        <li class="nav-item @if(request()->routeIs('referrerReview')) active @endif">
                            <a href="{{route('referrerReview')}}">
                                <i class="fa fa-bed"></i>
                                <span class="menu-title" data-i18n="User">Review Requests</span>
                            </a>
                        </li>

                    </ul>
                </li>
            @endif
            <li class=" nav-item"><a href="#"><i class="fa fa-user-secret"></i><span class="menu-title">Business Admin</span></a>
                <ul class="menu-content">
                    <li class="nav-item @if(request()->routeIs('bsAdminSubscribers')) active @endif">
                        <a href="{{ route('bsAdminSubscribers') }}">
                            <i class="feather icon-monitor"></i>
                            <span class="menu-title" data-i18n="User">Subscribers</span>
                        </a>
                    </li>
                    <li class="nav-item"><a href="#"><i class="fa fa-area-chart"></i><span class="menu-title">Analytics</span></a>
                        <ul class="menu-content">
                            <li class="nav-item @if(request()->routeIs('bsAdminAnalyticsTopReferrer')) active @endif">
                                <a href="{{ route('bsAdminAnalyticsTopReferrer') }}">
                                    <i class="feather icon-circle"></i>
                                    <span class="menu-title" data-i18n="User">Top Referrrers</span>
                                </a>
                            </li>
                            <li class="nav-item @if(request()->routeIs('bsAdminAnalyticsTopSubscribers')) active @endif">
                                <a href="{{ route('bsAdminAnalyticsTopSubscribers') }}">
                                    <i class="feather icon-circle"></i>
                                    <span class="menu-title">Top Subscribers</span>
                                </a>
                            </li>
                            <li class="nav-item @if(request()->routeIs('bsAdminAnalyticsReview')) active @endif">
                                <a href="{{ route('bsAdminAnalyticsReview') }}">
                                    <i class="feather icon-circle"></i>
                                    <span class="menu-title">Review Analytics</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="nav-item mt-5">
                <span class="menu-title">&nbsp;</span>
            </li>
            <li class="nav-item d-flex justify-content-center algin-item-center mt-5">
                <img class="img-fluid" src="{{ asset('images/icons/icon-128x128.png') }}" alt="logo"/>
            </li>
        </ul>
    </div>

    <div class="menubar-footer bg-transparent">
        <ul class="navigation navigation-main bg-transparent">
            <li class="nav-item qr-footer"><a class="align-items-center text-primary text-bold-700" href="#"><i class="fa fa-qrcode fa-2x font-30" style="font-size: 35px"></i><span class="menu-title font-30 mt-25">Scan QR</span></a></li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
