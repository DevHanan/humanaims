@extends('website.auth.layouts.app')
@section('title'){!! __('User Register') !!}@endsection

@section('webContent')
 <section class="register">
    <div class="container-fluid">
      <div class="row">
        <div class="left-box-two text-center col-lg-5 col-md-6">
          <div class="box-content-two">
            <h2 class="text-center">{!! __('front.Sign Up.')!!}</h2>
            <p class="sign text-center">{!! __('front.We have sent code to this account')!!}</p>
            <span class="account">{{$temp->email}}</span>
            <hr class="seperator" />
            <div class="row">
              <div class="code-form col-lg-12">
               {!! Form::open(['method'=>'post','route'=>'Verifyaccount','class'=>'numbersForm']) !!}
                            @csrf()
                  <input type="hidden" value="{{$temp->email}}" name="email">
                  <input class="numbersOnly empty" type="number" name="num1" min="0" max="9" dir="ltr" />
                  <input class="numbersOnly empty" type="number" min="0"  name="num2" max="9" dir="ltr" />
                  <input class="numbersOnly empty" type="number" min="0" name="num3" max="9" dir="ltr" />
                  <input class="numbersOnly empty" type="number" min="0" max="9"  name="num4" dir="ltr" />
                  <input class="numbersOnly empty" type="number" min="0" max="9"  name="num5" dir="ltr" />
                  <input class="numbersOnly empty last" type="number" min="0" max="9"  name="num6" dir="ltr" />
                  <button class="resend-code btn btn-primary" type="submit" >{!! __('front.Verify')!!}</button>

                 {!! Form::close() !!}
              </div>
              <div class="counter col-12 mt-4" dir="ltr">
                <span id="counterDown" class="counter-down" >{{$setting->verify_expire_time}}</span>
                 {!! Form::open(['method'=>'post','route'=>'resendVerifyCode','class'=>'numbersForm']) !!}
                            @csrf()
                                              <input type="hidden" value="{{$temp->email}}" name="email">

                <button class="resend-code btn" type="submit" >{!! __('front.Resend the code')!!}</button>
                 {!! Form::close() !!}
              </div>
            </div>
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
    <script src="{{asset('assets/website/js/pages/registerConfirm.js')}}"></script>

@endsection