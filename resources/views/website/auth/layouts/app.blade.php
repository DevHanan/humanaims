<!doctype html>


<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  
        dir="{!! app()->getLocale() == 'ar'?'rtl':'ltr' !!}" >
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{env('APP_NAME')}} | @yield('title')</title>
    
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/dashboard/resources')}}/app-assets/images/ico/favicon.ico">

  <link rel="shortcut icon" href="{{asset('assets/website/images/logo/logo-without-text.png')}}">
  <link rel="stylesheet" href="{{asset('assets/website/css/libs/all.min.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/website/css/libs/animate.min.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/website/css/libs/bootstrap.min.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/website/css/main.css')}}" />
  @if(\Illuminate\Support\Facades\App::isLocale('ar'))
    <link rel="stylesheet" href="{{asset('assets/website/css/mainRtl.css')}}" />
  @endif

</head>
<!-- END: Head-->

 
    @yield('webContent')

  <script src="{{asset('assets/website/js/libs/jquery-3.5.1.min.js')}}"></script>
  <script src="{{asset('assets/website/js/libs/popper.js')}}"></script>
  <script src="{{asset('assets/website/js/libs/jquery.nicescroll.js')}}"></script>
  <script src="{{asset('assets/website/js/libs/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/website/js/libs/wow.min.js')}}"></script>
  <script src="{{asset('assets/website/js/main.js')}}"></script>
  <script src="{{asset('assets/website/js/pages/login.js')}}"></script>
  <script src="{{asset('assets/website/js/pages/register.js')}}"></script>
      <script src="{{asset('assets/website/js/pages/registerMembership.js')}}"></script>

  @include('sweetalert::alert')

</body>

<!-- END: Body-->

</html>
