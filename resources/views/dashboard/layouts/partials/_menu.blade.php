<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{route('system.home')}}">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">{{$setting->{'site_name_' . App::getLocale()} }}</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" style="overflow-y:scroll;">
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

  <li class=" nav-item ">
                <a href="#"><i class="feather icon-zap"></i><span class="menu-title" data-i18n="Starter kit">{{__('back.Main Setup')}}</span></a>
                <ul class="menu-content">

 
@canany(['list_regions', 'add_regions','edit_regions','delete_regions'])
  <li class="@if(Request::is('system/regions/*') || Request::is('system/regions')) active open  @endif">
                        <a href="{{route('system.regions.index')}}">
                            <i class="fa fa-bars"></i><span class="menu-item" data-i18n="Fixed navbar">{{__('back.regions')}}</span>
                        </a>
  </li>
@endcanany
@canany(['list_categories', 'add_categories','edit_categories','delete_categories'])
  <li class="@if(Request::is('system/categories/*') || Request::is('system/categories')) active open  @endif">
                        <a href="{{route('system.categories.index')}}">
                            <i class="fa fa-bars"></i><span class="menu-item" data-i18n="Fixed navbar">{{__('back.categories')}}</span>
                        </a>
  </li>
@endcanany
@canany(['list_components', 'add_components','edit_components','delete_components'])

<li class="@if(Request::is('system/components/*') || Request::is('system/components')) active open  @endif">
                        <a href="{{route('system.components.index')}}">
                            <i class="feather icon-droplet"></i><span class="menu-item" data-i18n="Fixed navbar">{{__('back.components')}}</span>
                        </a>
                    </li>
                    @endcanany
@canany(['list_lines', 'add_lines','edit_lines','delete_lines'])

                    <li class="@if(Request::is('system/lines/*') || Request::is('system/lines')) active open  @endif">
                        <a href="{{route('system.lines.index')}}">
                            <i class="feather icon-hard-drive"></i><span class="menu-item" data-i18n="Fixed navbar">{{__('back.lines')}}</span>
                        </a>
                    </li>
                                        @endcanany
</ul>
</li>

@canany(['list_pages', 'add_pages','edit_pages','delete_pages'])

           <li class=" nav-item @if(Request::is('system/pages/*') || Request::is('system/pages')) active open  @endif">
               <a href="{{route('system.pages.index')}}">
                   <i class="feather icon-file"></i><span class="menu-item" data-i18n="Fixed navbar">{{__('back.pages')}}</span>
               </a>
           </li>
           @endcanany

@canany(['list_customers', 'add_customers','edit_customers','delete_customers'])
<li class=" nav-item @if(Request::is('system/customers/*') || Request::is('system/customers')) active open  @endif">
               <a href="{{route('system.customers.index')}}">
                   <i class="feather icon-file"></i><span class="menu-item" data-i18n="Fixed navbar">{{__('back.Customers')}}</span>
               </a>
           </li>
            @endcanany
@canany(['list_products', 'add_products','edit_products','delete_products'])

           <li class=" nav-item @if(Request::is('system/products/*') || Request::is('system/products')) active open  @endif">
               <a href="{{route('system.products.index')}}">
                   <i class="feather icon-file"></i><span class="menu-item" data-i18n="Fixed navbar">{{__('back.products')}}</span>
               </a>
           </li>
           @endcanany

<li class=" nav-item @if(Request::is('system/bills/*') || Request::is('system/bills')) active open  @endif">
               <a href="{{route('system.bills.index')}}">
                   <i class="feather icon-file"></i><span class="menu-item" data-i18n="Fixed navbar">{{__('back.bills')}}</span>
               </a>
           </li>
@if(auth()->user()->type == 'distrib')
<li class=" nav-item @if(Request::is('system/list-sales/*') || Request::is('system/list-sales')) active open  @endif">
               <a href="{{route('system.sales.index')}}">
                   <i class="feather icon-file"></i><span class="menu-item" data-i18n="Fixed navbar">{{__('back.sales')}}</span>
               </a>
           </li>
@endif


<li class=" nav-item ">
                <a href="#"><i class="feather icon-zap"></i><span class="menu-title" data-i18n="Starter kit">{{__('back.Accounts')}}</span></a>
                <ul class="menu-content">

@canany(['list_sales', 'add_sales' ,'edit_sales','delete_sales'])
<li class=" nav-item @if(Request::is('system/sales/*') || Request::is('system/sales')) active open  @endif">
               <a href="{{route('system.sales.index')}}">
                   <i class="feather icon-users"></i><span class="menu-item" data-i18n="Fixed navbar">{{__('back.sales')}}</span>
               </a>
           </li>
@endcan
@canany(['list_distributers', 'add_distributers' ,'edit_distributers','delete_distributers'])
<li class=" nav-item @if(Request::is('system/distributers/*') || Request::is('system/distributers')) active open  @endif">
               <a href="{{route('system.distributers.index')}}">
                   <i class="feather icon-users"></i><span class="menu-item" data-i18n="Fixed navbar">{{__('back.distributers')}}</span>
               </a>
           </li>
@endcan

</ul>
</li>






           <!-- <li class=" nav-item @if(Request::is('system/points/*') || Request::is('system/points')) active open  @endif">
               <a href="{{route('system.points.index')}}">
                   <i class="feather icon-box"></i><span class="menu-item" data-i18n="Fixed navbar">{{__('back.points')}}</span>
               </a>
           </li> -->
         
  <li class=" nav-item ">
                <a href="#"><i class="feather icon-zap"></i><span class="menu-title" data-i18n="Starter kit">{{__('back.User Mangement')}}</span></a>
                <ul class="menu-content">
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
</ul>
</li>

<li class=" nav-item ">
                <a href="#"><i class="feather icon-zap"></i><span class="menu-title" data-i18n="Starter kit">{{__('back.Contacts Section')}}</span></a>
                <ul class="menu-content">

@canany(['list_contact_msg_types', 'add_contact_msg_types' ,'add_contact_msg_types','delete_contact_msg_types'])
           <li class=" nav-item @if(Request::is('system/contacttypes/*') || Request::is('system/contacttypes')) active open  @endif">
               <a href="{{route('system.contacttypes.index')}}">
                   <i class="feather icon-box"></i><span class="menu-item" data-i18n="Fixed navbar">{{__('back.contact_msg_types')}}</span>
               </a>
           </li>
           @endcanany

@canany(['list_contacts', 'replay_contacts' ,'show_contacts'])
           <li class=" nav-item @if(Request::is('system/contacts/*') || Request::is('system/contacts')) active open  @endif">
               <a href="{{route('system.contacts.index')}}">
                   <i class="feather icon-box"></i><span class="menu-item" data-i18n="Fixed navbar">{{__('back.contacts')}}</span>
               </a>
           </li>
           @endcanany
</ul>
</li>

  <li class=" nav-item ">
                <a href="#"><i class="feather icon-zap"></i><span class="menu-title" data-i18n="Starter kit">{{__('back.Mobile Setups')}}</span></a>
                <ul class="menu-content">

		
@canany(['list_sliders', 'add_sliders','edit_sliders','delete_sliders'])

           <li class=" nav-item @if(Request::is('system/sliders/*') || Request::is('system/sliders')) active open  @endif">
               <a href="{{route('system.sliders.index')}}">
                   <i class="feather icon-file"></i><span class="menu-item" data-i18n="Fixed navbar">{{__('back.sliders')}}</span>
               </a>
           </li>
           @endcanany

</ul>
</li>


<li class=" nav-item ">
                <a href="#"><i class="feather icon-zap"></i><span class="menu-title" data-i18n="Starter kit">{{__('back.System Logs ')}}</span></a>
                <ul class="menu-content">
                      @canany(['list_activity_log', 'show_log' ,'delete_log'])

            <li class=" nav-item @if(Request::is('system/log')) active open  @endif">
                <a href="{{url('system/logs')}}">
                    <i class="feather icon-activity"></i><span class="menu-title" data-i18n="Dashboard">{{__('back.Activity Logs')}}</span>
                </a>
            </li>
                       @endcanany

                      @canany(['list_visits', 'show_visit' ,'delete_visit'])

             <li class=" nav-item @if(Request::is('system/visits')) active open  @endif">
                <a href="{{url('system/visits')}}">
                    <i class="feather icon-activity"></i><span class="menu-title" data-i18n="Dashboard">{{__('back.Site Visits')}}</span>
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
</li>

        </ul>
    </div>
</div>
<!-- END: Main Menu-->
