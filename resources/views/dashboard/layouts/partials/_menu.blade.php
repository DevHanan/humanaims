<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{route('system.home')}}">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">Humans</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" style="overflow:scroll;">
            <li class=" nav-item @if(Request::is('system/home')) active open  @endif">
                <a href="{{route('system.home')}}">
                    <i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">{{__('back.Home')}}</span>
                </a>
            </li>

            @can('update_settings')
            <li class=" nav-item @if(Request::is('system/settings/*') || Request::is('system/settings')) active open  @endif">
               <a href="{{url('system/setting')}}">
                   <i class="feather icon-settings"></i><span class="menu-item" data-i18n="Fixed navbar">{{__('back.Settings')}}</span>
               </a>
           </li>
           @endcan
 @can('waiting_users')
           <li class=" nav-item @if(Request::is('system/temp/*') || Request::is('system/temp')) active open  @endif">
               <a href="{{url('system/temp')}}">
                   <i class="feather icon-users"></i><span class="menu-item" data-i18n="Fixed navbar">{{__('back.Waiting Users')}}</span>
               </a>
           </li>
           @endcan
 
@canany(['list_specializations', 'add_specializations','edit_specializations','delete_specializations'])
  <li class="@if(Request::is('system/specializations/*') || Request::is('system/specializations')) active open  @endif">
                        <a href="{{route('system.specializations.index')}}">
                            <i class="fa fa-bars"></i><span class="menu-item" data-i18n="Fixed navbar">{{__('back.specializations')}}</span>
                        </a>
  </li>
@endcanany
@canany(['list_categories', 'add_categories','edit_categories','delete_categories'])

<li class="@if(Request::is('system/categories/*') || Request::is('system/categories')) active open  @endif">
                        <a href="{{route('system.categories.index')}}">
                            <i class="feather icon-droplet"></i><span class="menu-item" data-i18n="Fixed navbar">{{__('back.categories')}}</span>
                        </a>
                    </li>
                    @endcanany
@canany(['list_countries', 'add_countries','edit_countries','delete_countries'])

                    <li class="@if(Request::is('system/countries/*') || Request::is('system/countries')) active open  @endif">
                        <a href="{{route('system.countries.index')}}">
                            <i class="feather icon-hard-drive"></i><span class="menu-item" data-i18n="Fixed navbar">{{__('back.Countries')}}</span>
                        </a>
                    </li>
                                        @endcanany

@canany(['list_pages', 'add_pages','edit_pages','delete_pages'])

           <li class=" nav-item @if(Request::is('system/pages/*') || Request::is('system/pages')) active open  @endif">
               <a href="{{route('system.pages.index')}}">
                   <i class="feather icon-file"></i><span class="menu-item" data-i18n="Fixed navbar">{{__('back.pages')}}</span>
               </a>
           </li>
           @endcanany


@canany(['list_doctors', 'show_doctor'])

            <li class=" nav-item @if(Request::is('system/doctors/*') || Request::is('system/doctors')) active open  @endif">
               <a href="{{route('system.doctors.index')}}">
                   <i class="feather icon-user-check"></i><span class="menu-item" data-i18n="Fixed navbar">{{__('back.Doctors')}}</span>
               </a>
           </li>
                      @endcanany

@canany(['list_members', 'show_member'])

 <li class=" nav-item @if(Request::is('system/patients/*') || Request::is('system/patients')) active open  @endif">
               <a href="{{route('system.patients.index')}}">
                   <i class="feather icon-zap"></i><span class="menu-item" data-i18n="Fixed navbar">{{__('back.Patients')}}</span>
               </a>
           </li>
                      @endcanany
@canany(['list_subjects', 'show_subject'])

            <li class=" nav-item @if(Request::is('system/subjects/*') || Request::is('system/subjects')) active open  @endif">
               <a href="{{route('system.subjects.index')}}">
                   <i class="feather icon-zap"></i><span class="menu-item" data-i18n="Fixed navbar">{{__('back.subjects')}}</span>
               </a>
           </li>
                      @endcanany

@canany(['list_roles', 'add_roles' ,'edit_roles','delete_roles'])
           <li class=" nav-item @if(Request::is('system/roles/*') || Request::is('system/roles')) active open  @endif">
               <a href="{{route('system.roles.index')}}">
                   <i class="feather icon-box"></i><span class="menu-item" data-i18n="Fixed navbar">{{__('back.Roles')}}</span>
               </a>
           </li>
           @endcanany
           @canany(['list_users', 'add_users' ,'edit_users','delete_users'])

             <li class=" nav-item @if(Request::is('system/users/*') || Request::is('system/users')) active open  @endif">
               <a href="{{route('system.users.index')}}">
                   <i class="feather icon-users"></i><span class="menu-item" data-i18n="Fixed navbar">{{__('back.users')}}</span>
               </a>
           </li>
           @endcanany
                      @canany(['list_activity_log', 'show_log' ,'delete_log'])

            <li class=" nav-item @if(Request::is('system/log')) active open  @endif">
                <a href="{{url('system/logs')}}">
                    <i class="feather icon-activity"></i><span class="menu-title" data-i18n="Dashboard">{{__('back.ActivityLogs')}}</span>
                </a>
            </li>
                       @endcanany

                      @canany(['list_visits', 'show_visit' ,'delete_visit'])

             <li class=" nav-item @if(Request::is('system/visits')) active open  @endif">
                <a href="{{url('system/visits')}}">
                    <i class="feather icon-activity"></i><span class="menu-title" data-i18n="Dashboard">{{__('back.SiteVisits')}}</span>
                </a>
            </li>
                       @endcanany

@can('Website Translation')       

 <li class=" nav-item ">
                <a href="#"><i class="feather icon-zap"></i><span class="menu-title" data-i18n="Starter kit">{{__('back.transaltions')}}</span></a>
                <ul class="menu-content">

                    <li class="@if(Request::is('system/translations/front')) active open  @endif">
                        <a href="{{url('system/translations/front')}}">
                            <i></i><span class="menu-item" data-i18n="Fixed navbar">
                              {{__('back.front_translation')}}
                            </span>
                        </a>
                    </li>
                    @endcan
@can('control panel Translation')       
 <li class="@if(Request::is('system/translations/back')) active open  @endif">
                        <a href="{{url('system/translations/back')}}">
                            <i></i><span class="menu-item" data-i18n="Fixed navbar">
                              {{__('back.back_translation')}}
                            </span>
                        </a>
                    </li>

                </ul>
            </li>
            @endcan

        </ul>
    </div>
</div>
<!-- END: Main Menu-->
