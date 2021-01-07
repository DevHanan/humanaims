@extends('website.auth.layouts.app')
@section('title'){!! __('front.User Login') !!}@endsection
@section('webContent')
<body class="{!! app()->getLocale() == 'ar'?'rtl ':'ltr' !!} login-page ">
        @include('website.auth.layouts.partials._loading')

  <!--====== Start Login ======-->
   <section class="login">
    <div class="container-fluid">
      <div class="row">

        <div class="left-box col-lg-5 col-md-6">
            @if(app()->getLocale() == 'ar')
                    @include('website.auth.layouts.partials._ar_lang')
            @else
                                        @include('website.auth.layouts.partials._en_lang')
            @endif
          <div class="box-content">
            <h2 class="text-center">{!! __('front.Sign In')!!}</h2>
            <p class="sign text-center">
{!! __('front.Please sign in to join our comunity.')!!}
           </p>
            <hr class="seperator">
            
               {!! Form::open(['method'=>'post','route'=>'login','class'=>'form form-one']) !!}
                            @csrf()
              <label for="email">{!! __('front.Email Address')!!}</label>
              <input type="email" name="email" id="email" dir="ltr">
              {{input_error($errors,'email')}}


              <label class="toggle-password" for="password">{!! __('front.Password')!!} <span toggle="#password-field"
                  class="eye"></span></label>
              <input type="password" name="password" id="password-field" dir="ltr">
                                {{input_error($errors,'password')}}

           
            <div class="row">
              <div class="sign-button col-lg-12" style="padding:10px;">
                
<!--                   <input class="btn btn-primary" type="submit" value="{!! __('front.Sign In')!!}">
 -->           <button  class="btn btn-primary" type="submit" value="" style="width: 100% !important;padding: 10px;">{!! __('front.Sign In')!!}</button>
              </div>
              <div class="col-lg-6 col-6 p-0 form-two">
<!--                 <form class="form-two" action="#">
 -->                  <input type="checkbox" id="checkBox" name="Remeber me">
                  <label for="checkBox">{!! __('front.Remember me')!!}</label><br>
                <!-- </form> -->
              </div>
              <div class="forget col-lg-6 col-6 p-0">
                <a href="#">{!! __('front.Forget Password?')!!}</a>
              </div>
            </div>
          </div>
          <div class="create-account text-center">
            <p>{!! __("front.You don't have an account?") !!} <a href="{{url('/signin')}}">
            {!! __('front.Create Account')!!} </a></p>
          </div>
        </div>

        <div class="right-box col-lg-7 col-md-6 pr-0 pl-0">
          <div class="login-background">
            <div class="overlay"></div>
            <img class="background-img" src="{{asset('assets/website/images/login/login-background.png')}}" alt="Background">
            <img class="logo-img" src="{{asset('assets/website/images/login/logo.png')}}" alt="Humanaims Logo">
            <div class="chevron-r"></div>
          </div>
        </div>

      </div> <!-- Row -->
    </div> <!-- Container -->
  </section>
  <!--====== End Login ======-->
@endsection