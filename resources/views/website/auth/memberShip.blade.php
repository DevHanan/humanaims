@extends('website.auth.layouts.app')
@section('title'){!! __('User Register') !!}@endsection

@section('webContent')
  <!--====== Start Register ======-->
  <section class="register">
    <div class="container-fluid">
      <div class="row">
        <div class="left-box-three col-lg-5 col-md-6">
          <div class="box-content-three">
            <h2 class="text-center">{!! __('front.Sign Up.')!!}</h2>
            <p class="sign text-center">{!! __('front.Please complete your information and choose your membership')!!}</p>
            <hr class="seperator">
            <div class="row">
              
              <div class="date col-lg-12 col-12">
{!! Form::open(['method'=>'post','route'=>'userMembership']) !!}
                            @csrf()
                            <input type="hidden" name="email" value="{{$temp->email}}">                  <label for="dateSelector">
                    <img src="{{asset('assets/website/images/login/upside-down.png')}}" alt="UpsideDowm Chevorns">
                    <span class="age">{!! __('front.Age')!!}</span>
                    <span class="dateValue"></span>
                    <img src="{{asset('assets/website/images/login/calender.png')}}" alt="Calender">
                  </label>
                  <input id="dateSelector" type="date" name="age" min="1970-01-01" dir="auto">
              </div>

              <div class="col-lg-12 col-12">
                <div class="memberships mt-3 mb-3">
                  <div class="membership">
                    <div class="membership-icon main-background">
                      <img src="{{asset('assets/website/images/login/bird-white.png')}}" alt="Brid">
                    </div>
                    <div class="details">
                      <span class="main-color">{!! __('front.The white membership')!!}</span>
                      <span>{!! __('front.Open for all ages')!!}</span>
                    </div>
                    <a class="btn btn-choose" data-value="white">{!! __('front.Choose')!!}</a>
                                       

                  </div>
                  <div class="membership">
                    <div class="membership-icon main-background">
                      <img src="{{asset('assets/website/images/login/user-circle.png')}}" alt="Brid">
                    </div>
                    <div class="details">
                      <span class="main-color">{!! __('front.The public membership')!!}</span>
                      <span>{!! __('front.Includes all groups of society')!!}</span>
                    </div>
                    <a class="btn btn-choose" data-value="public">{!! __('front.Choose')!!}</a>
                  </div>
                  <div class="membership">
                    <div class="membership-icon main-background">
                      <img src="{{asset('assets/website/images/login/doctor-mark-white.png')}}" alt="Brid">
                    </div>
                    <div class="details">
                      <span class="main-color">{!! __('front.Doctors and Institutions')!!}</span>
                      <span>{!! __('front.For Doctors and specialists')!!}</span>
                    </div>
                    <a class="btn btn-choose" data-value="doctors">{!! __('front.Choose')!!}</a>
                                       

                  </div>
                </div>
              </div>
              <div class="policy col-lg-12 col-12">
                  <input type="checkbox" id="checkBox" name="Remeber me">
                  <label for="checkBox">{!! __('front.Agree to the terms and conditions')!!}</label>
              </div>
              <input type="hidden" name="membership" id="membership" value="">
              <div class="col-lg-12 col-12 mt-3">
                 <button class="btn btn-regsiter" type="submit" >{!! __('front.Register')!!}</button>
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

  <!--====== End Register ======-->
@endsection