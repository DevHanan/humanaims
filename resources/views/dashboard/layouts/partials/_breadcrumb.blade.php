
<!-- <h3 class="content-header-title float-left mb-0 d-print-none">@yield('title')</h3>
 --><div class="breadcrumb-wrapper col-12 d-print-none">
    <ol class="breadcrumb" style="border: none !important;">
       <li class="breadcrumb-item"><a href="{{route('system.home')}}">{{__('back.Home')}}</a>
       </li>
       <li class="breadcrumb-item"><a href="{!! $level !=''?route('system.'.$level.'.index'):'#' !!}">{{__("back.$level")}}</a>
       </li>
       <li class="breadcrumb-item active">@yield('title')
       </li>
   </ol>
</div>
