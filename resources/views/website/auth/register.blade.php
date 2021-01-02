@extends('website.auth.layouts.app')
@section('title'){!! __('User Register') !!}@endsection

@section('webContent')

<body class="register-page {!! app()->getLocale() == 'ar'?'rtl':'ltr' !!}">
 
        @include('website.auth.layouts.partials._loading')
    <!--====== Start Register ======-->
  <section class="register">
    <div class="container-fluid">
      <div class="row">
        <div class="left-box col-lg-5 col-md-6" data-next="box">
          
@if(app()->getLocale() == 'ar')
                    @include('website.auth.layouts.partials._ar_lang')
            @else
                                        @include('website.auth.layouts.partials._en_lang')
            @endif
          <div class="box-content">
            <h2 class="text-center">{!! __('front.Sign Up.')!!}</h2>
            <p class="sign text-center">
              {!! __('front.Please sign up to join our comunity.')!!}
            </p>
            <hr class="seperator" />
            
               {!! Form::open(['method'=>'post','route'=>'signin','class'=>'form form-one']) !!}
                            @csrf()
                         
              <div class="row">
                <div class="col-12">
                  <label for="user-name"><i class="fas fa-user"></i></label>
                  <input type="text" name="fullname" id="user-name" placeholder="{!! __('front.User name')!!}"  />
                  {{input_error($errors,'fullname')}}

                  <div class="alert alert-danger" role="alert">
                    <p id="errorMessage"> 
                    </p>
                  </div>
                </div>

                <div class="col-12">
                  <label for="email"><i class="fas fa-envelope"></i></label>
                  <input type="email" name="email" id="email" placeholder="{!! __('front.Email')!!}"  />
                    {{input_error($errors,'email')}}
                  <div class="alert alert-danger" role="alert">
                    <p id="errorMessage">                      
                      
</p>
                  </div>
                </div>

                <div class="col-12">
                  <label class="toggle-password" for="password">
                    <i class="fas fa-lock"></i>
                    <span toggle="#password-field" class="eye"></span>
                  </label>
                  <input type="password" name="password" id="password-field" placeholder="{!! __('front.Password')!!}" />
                   {{input_error($errors,'password')}}
                  <div class="alert alert-danger" role="alert">

                    <p id="errorMessage">
                                               


                    </p>
                  </div>
                </div>

                <div class="col-12">
                  <label class="toggle-password" for="password">
                    <i class="fas fa-lock"></i>
                    <span toggle="#password-field-two" class="eye"></span>
                  </label>
                  <input type="password" name="password_confirmation" id="password-field-two" placeholder="{!! __('front.Password Confirmation')!!}"  />
                  {{input_error($errors,'password_confirmation')}}
                  <div class="alert alert-danger" role="alert">
                    <p id="errorMessage">                          
</p>
                  </div>
                </div>
                  <div class="sign-button col-lg-12 mt-2">
                  <button  class="btn" type="submit" value=" style="padding: 10px;">{!! __('front.Register')!!}</button>
              </div>

              </div>
             {!! Form::close() !!}
           
          </div>
          <div class="create-account text-center">
           <p>
              {!! __('front.You already have an account?')!!} <a href="{{url('/')}}">
              {!! __('front.Sign In')!!}</a>
            </p>
          </div>
        </div>

        <div class=" right-box col-lg-7 col-md-6 pr-0 pl-0">
          <div class="login-background">
            <div class="overlay"></div>
            <img class="background-img" src="{{asset('assets/website/images/login/login-background.png')}}" alt="Background" />
            <img class="logo-img" src="{{asset('assets/website/images/login/logo.png')}}" alt="Humanaims Logo" />
            <div class="chevron-r"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--====== End Register ======-->

@endsection