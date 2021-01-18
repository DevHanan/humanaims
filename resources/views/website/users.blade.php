@extends('website.layouts.app')
@section('title'){!! __('front.Users') !!}@endsection
@section('header') @endsection
@section('contentPage')
	<body class="usersPage {!! app()->getLocale() == 'ar'?'rtl ':'ltr' !!}">
  <!--===== Start Fixed Elements =====-->
  <!-- Start loading -->
      @include('website.layouts.partials._loading')

  <!-- Start Navbar -->
  <div class="navContainer">
   
    @include('website.layouts.partials._nav')
        @include('website.layouts.partials._menu')

  </div>
  <!-- Start ScrollUp Button -->
  <div class="scrollUp">
    <i class="fas fa-chevron-up"></i>
  </div>
  <!--===== End Fixed Elements =====-->

  <div class="doctorsContent">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 pl-3 pr-3">
                @include('website.layouts.partials._doctor_user_filter')
        </div>
        <div class="col-lg-9 toggle">
          <div class="doctors">
            <form method="get" action="{{url('/users')}}">
              <div class="search">
                <button><i class="fas fa-search"></i></button>
                <input type="search" placeholder="Search..." name="search">
              </div>
            </form>
            <div class="row">
              @foreach($users as $user)
              <div class="col-md-4 col-sm-6 col-12">
                <div class="doctor">
                  <div class="images">
                    <img class="background" src="{{asset('assets/website/images/ch.jpg')}}">
                    <div class="subImage">
                      <img class="profile_pic" src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                      
                    </div>
                  </div>
                  <div class="text">
                    <div class="rate_Chat">
                      <span><i class="fas fa-comments"></i></span>
                    </div>
                    <div class="name">
                      <a href="{{url('/show-profile/'.$user->id)}}" class="name">
                        {{ $user->fullname }}
                      </a>
                      <p>Adolescence problems</p>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('footer')
  <script src="{{asset('assets/website/js/pages/doctors.js')}}"></script>

@endsection