<!doctype html>
<!-- BEGIN: Head-->

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  
        dir="{!! app()->getLocale() == 'ar'?'rtl':'ltr' !!}"  class="scroller">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="userId" content="{{ auth()->check() ? auth()->id() : '' }}">

    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
    <title>{{env('APP_NAME')}} | @yield('title')</title>
   <!--  <link rel="apple-touch-icon" href="{{asset('assets/dashboard/resources')}}/app-assets/images/ico/apple-icon-120.png"> -->

    @include('website.layouts.partials._styles')
    @yield('header')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
@yield('contentPage')   
<div id="displayComponent">
<example-component></example-component>
</div>
@include('website.layouts.partials._footer')

@include('website.layouts.partials._scripts')
@include('sweetalert::alert')
@yield('js-validation')
@yield('footer')
</div>
  
</body>

<!-- END: Body-->

</html>
