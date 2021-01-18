@extends('website.layouts.app')
@section('title'){!! __('front.Doctors') !!}@endsection
@section('header') @endsection
@section('contentPage')
	<body class="doctorsPage {!! app()->getLocale() == 'ar'?'rtl ':'ltr' !!}">
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
            <form method="get" action="{{url('/doctors')}}">
              <div class="search">
                <button><i class="fas fa-search"></i></button>
                <input type="search" placeholder="Search..." name="search">
              </div>
            </form>
           <div class="row">
                @if(count($doctors))
                  @foreach($doctors as $doctor)
                    @if($doctor->id != auth()->user()->id)
              <div class="col-md-4 col-sm-6 col-12">
                <div class="doctor">
                  <div class="images">
                    <img class="background" src="{{asset('assets/website/images/ch.jpg')}}">
                    <div class="subImage">
                      <img class="profile_pic" src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                      <img class="profile_sub_pic" src="{{asset('assets/website/images/doctormarkblue.png')}}">
                    </div>
                  </div>
                  <div class="text">
                    <div class="rate_Chat">
                      <ul>
                        <li data-id="{{$doctor->id}}" data-rate="1" class="rate_element"><a>
                          <i class="@if($doctor->isRate->rating >= 1)fas @else  far @endif fa-star"></i></a></li>
                        <li data-id="{{$doctor->id}}" data-rate="2" class="rate_element"> 
                          <i class="@if($doctor->isRate->rating >= 2)fas @else  far @endif  fa-star"></i></li>
                        <li data-id="{{$doctor->id}}" data-rate="3" class="rate_element"> 
                          <i class="@if($doctor->isRate->rating >= 3)fas @else  far @endif  fa-star"></i></li>
                        <li data-id="{{$doctor->id}}" data-rate="4" class="rate_element"> 
                          <i class="@if($doctor->isRate->rating >= 4)fas @else  far @endif  fa-star"></i></li>
                        <li data-id="{{$doctor->id}}" data-rate="5" class="rate_element">  
                          <i class="@if($doctor->isRate->rating >= 5)fas @else  far @endif  fa-star"></i></li>
                      </ul>
                      <span><i class="fas fa-comments"></i></span>
                    </div>
                    <div class="name">
                      <a href="{{url('/show-profile/'.$doctor->id)}}" class="name">{{$doctor->fullname}}</a>
                      <p>Adolescence problems</p>
                    </div>
                  </div>
                </div>
              </div>
                @endif
                  @endforeach
              @else
                  {!! __('front.no_data_found') !!}
              @endif    
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