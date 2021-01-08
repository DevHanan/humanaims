<!-- BEGIN: Header-->
<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                    </ul>
                </div>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon
                        @if(App::isLocale('ar')) flag-icon-sa @else flag-icon-us @endif"></i><span class="selected-language">@if(App::isLocale('ar')) عربى @else English @endif</span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                            <a class="dropdown-item" href="{{route('system.lang-en')}}" data-language="en">
                                <i class="flag-icon flag-icon-us"></i> English
                            </a>
                            <a class="dropdown-item" href="{{route('system.lang-ar')}}" data-language="ar">
                                <i class="flag-icon flag-icon-sa"></i> عربى
                            </a>

                        </div>
                    </li>
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">{{auth()->user()->username}}</span>{{--<span class="user-status">Available</span>--}}</div><span><img class="round" src="{{asset('assets/dashboard/resources')}}/app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="40" width="40"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                          
                            <a class="dropdown-item" href="{{route('system.home.edit')}}">
                                <i class="feather icon-user"></i> {{__('back.Profile')}}
                            </a>
                            <a class="dropdown-item" href="{{route('system.switch-user-theme')}}">
                                <i class="feather icon-eye-off"></i> {{__('back.Switch theme')}}
                            </a>
                            <div class="dropdown-divider"></div>

                            <form method="post" action="{{route('system.customLogout')}}">
                                {{ csrf_field() }}
                            <button type=submit class="dropdown-item" style="width: 100%"><i
                                    class="feather icon-power"></i>
                                {!! __('back.Logout') !!}
                            </button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- END: Header-->
