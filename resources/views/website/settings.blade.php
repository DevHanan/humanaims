@extends('website.layouts.app')
@section('title'){!! __('Settings') !!}@endsection
@section('header') @endsection
@inject('specialization','App\Models\Specialization')
@inject('country','App\Models\Country')

@section('contentPage')
<body class="settings-page {!! app()->getLocale() == 'ar'?'rtl ':'ltr' !!}">
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

  <!--===== Start Settings =====-->
  <section class="settings pt-3 pt-md-0">
    <div class="container-fluid p-4 pl-0 pr-0">
      <div class="row justify-content-center">

        <aside class="account-settings-left col-lg-2 col-md-3 p-0 pt-4">
          <div class="profile-img text-center">
               @if(auth()->user()->image)
                  <img  alt="David Beckham"  src="{{asset(auth()->user()->image)}}">
                  @else
            <img src="{{asset('assets/website/images//David-Beckham.jpg')}}" alt="David Beckham">
            @endif
            <img src="{{asset('assets/website/images//myAccount/bird-blue-circle.png')}}" alt="Icon">
          </div>
          <h4 class="text-center mt-3 mb-4"><a href="#">{{Auth::user()->fullname}}</a></h4>
          <ul class="tabs">
            <li class="active" data-tab="settings"><img src="{{asset('assets/website/images//myAccount/user-white.png')}}" alt=""><a href="#">
              {!! __('front.My Account') !!}</a></li>
              @if(Auth::user()->isDoctor)
            <li class="deactive" data-tab="approve"><img src="{{asset('assets/website/images//approveAccount/doctors-mark.png')}}" alt="Mark"><a
                href="#">{!! __('front.Approve Account') !!}</a></li>
                @endif
          </ul>
        </aside>

        <div class="account-settings-right col-lg-7 col-md-8">
          <div class="forms" id="account-settings">
            <form action="{{url('edit-profile')}}" method="POST"  class="member-form" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="form-input col-lg-12">
                  <label class="col-md-4 p-0 mb-sm-3 mb-md-2" for="user-name">{!! __('front.User name') !!}</label>
                  <div class="wrapper col-xl-7 col-md-8 col-12 p-0">
                    <div class="input-icon">
                      <img src="{{asset('assets/website/images//myAccount/user-light.png')}}" alt="User Icon">
                    </div>
                    <input class="form-control settingsInput" disabled type="text" name="fullname" id="user-name"
                      required value="{{Auth::user()->fullname}}">
                        {{input_error($errors,'fullname')}}

                  </div>
                </div>
                <div class="form-input col-lg-12">
                  <label class="col-md-4 p-0 mb-sm-3 mb-md-2" for="email-adress">{!! __('front.Email Address') !!}</label>
                  <div class="wrapper col-xl-7 col-md-8 col-12 p-0">
                    <div class="input-icon">
                      <img src="{{asset('assets/website/images//myAccount/message.png')}}" alt="User Icon">
                    </div>
                    <input class="form-control settingsInput" disabled type="email" name="email" id="email-adress"
                      required value="{{Auth::user()->email}}">
                                            {{input_error($errors,'email')}}

                  </div>
                </div>
                <div class="form-input col-lg-12">
                  <label class="col-md-4 p-0 mb-sm-3 mb-md-2" for="country">{!! __('front.Country') !!}</label>

                  <div class="wrapper col-xl-7 chevronDown col-md-8 col-12 p-0">
                    <div class="input-icon">
                      <img src="{{asset('assets/website/images//myAccount/location.png')}}" alt="User Icon">
                    </div>
                     

                    <input class="form-control settingsInput" disabled list="country" name="country_id" id="browser">
                    <i class="fas fa-chevron-down"></i>
                  </div>
                  <datalist id="country">
                      @foreach($country->all() as $coun)
                    <option value="{{$coun->id}}"> {{$coun->name}}</option>
                 
                   @endforeach
        
                  </datalist>
                                              {{input_error($errors,'country_id')}}


                </div>
                <div class="form-input col-lg-12">
                  <label class="col-md-4 p-0 mb-sm-3 mb-md-2" for="gender">{!! __('front.Gender') !!}</label>
                  <div class="wrapper col-xl-7 col-md-8 col-12 p-0">
                    <div class="input-icon">
                      <img src="{{asset('assets/website/images//myAccount/gender.png')}}" alt="User Icon">
                    </div>
                    <input class="form-control settingsInput" disabled type="text" name="gender" id="gender" required
                      validate value="{{Auth::user()->gender}}">
                                              {{input_error($errors,'gender')}}

                  </div>
                </div>
                <div class="form-buttons col-lg-12 mt-sm-3 mt-sm-0">
                  <div class="row justify-content-end">
                    <div class="col-lg-4 col-sm-4 col-5">
                      <input class="form-control btn btn-cancel" type="button" name="User Name" id="cancel"
                        value="{!! __('front.Cancel') !!}">
                    </div>
                    <div class="col-lg-4 col-sm-4 col-5">
                      <input class="form-control btn btn-edit" type="button submit" name="User Name" id="edit" value="{!! __('front.Edit') !!}">
                    </div>
                   
                    
                  </div>
                </div>
              </div>
            </form>

                       <form  class="mt-4" action="{{url('edit-password')}}" method="POST" enctype="multipart/form-data">
                          @csrf
              <div class="row">
                <div class="form-input col-lg-12">
                  <label class="col-md-4 p-0 mb-sm-3 mb-md-2" for="user-name">{!! __('front.Current password') !!}</label>
                  <div class="wrapper col-xl-7 col-md-8 col-12 p-0">
                    <div class="input-icon">
                      <img src="{{asset('assets/website/images//myAccount/lock.png')}}" alt="User Icon">
                    </div>
                    <input class="form-control passSettings" disabled type="password" name="old_password"
                      id="current-password">
                       {{input_error($errors,'old_password')}}

                  </div>
                </div>
                <div class="form-input col-lg-12">
                  <label class="col-md-4 p-0 mb-sm-3 mb-md-2" for="email-adress">{!! __('front.New password') !!}</label>
                  <div class="wrapper col-xl-7 col-md-8 col-12 p-0">
                    <div class="input-icon">
                      <img src="{{asset('assets/website/images//myAccount/lock.png')}}" alt="User Icon">
                    </div>
                    <input class="form-control passSettings" disabled type="password" name="password" id="new-password">
                    {{input_error($errors,'password')}}
                  </div>
                </div>
                <div class="form-input col-lg-12">
                  <label class="col-md-4 p-0 mb-sm-3 mb-md-2" for="conform-new-password">{!! __('front.Confirm Password') !!}</label>
                  <div class="wrapper col-xl-7 col-md-8 col-12 p-0">
                    <div class="input-icon">
                      <img src="{{asset('assets/website/images//myAccount/lock.png')}}" alt="User Icon">
                    </div>
                    <input class="form-control passSettings" disabled type="password" name="password_confirmation"
                      id="conform-new-password">
                    {{input_error($errors,'password_confirmation')}}
                  </div>
                </div>
                <div class="form-buttons col-lg-12 mt-sm-3 mt-sm-0">
                  <div class="row justify-content-end">
                    <div class="col-lg-4 col-sm-4 col-4">
                      <input class="form-control btn btn-edit-pass" type="button" name="User Name" id="edit-password"
                       value="{!! __('front.Edit') !!}">
                    </div>
                     
                    
                  </div>
                </div>
              </div>
            </form>
          </div>

          <div class="forms approve-account" id="account-approve">
                      <form action="{{url('edit-profile')}}" method="POST" enctype="multipart/form-data">
@csrf
              <div class="row">
                <div class="form-input col-lg-12">
                  <label class="col-md-4 p-0 mb-sm-3 mb-md-2" for="specialization">{!! __('front.Specialization') !!}</label>
                  <div class="wrapper chevronDown col-md-8 col-12 p-0">
                    <div class="input-icon">
                      <img src="{{asset('assets/website/images//myAccount/user-light.png')}}" alt="User Icon">
                    </div>
                    <input class="form-control" list="Specializations" name="specialization_id" id="Specialization">
               
                    <i class="fas fa-chevron-down"></i>
                  </div>
                  <datalist id="Specializations">
                      @foreach($specialization->all() as $special)
                    <option  value="{{$special->id}}" @if(Auth::user()->specialization->name == $special->name) selected @endif  label="{{$special->name}}">{{$special->name}}</option>
                    
                      @endforeach
                  </datalist>
                </div>
                <div class="form-input col-lg-12">
                  <label class="col-md-6 p-0 mb-sm-3 mb-md-2 align-self-start" for="upload-cv">{!! __('front.Attach The CV') !!}</label>
                  <div class="wrapper upload-cv col-md-8 col-12 p-0">
                    <div class="input-icon">
                      <div class="flex-wrapper">
                        <img src="{{asset('assets/website/images/approveAccount/upload.png')}}" alt="User Icon">
                        <p class="mt-3">Drop file here or <span>browse</span> here</p>
                      </div>
                    </div>
                    <img src="." alt="Uploaded File" id="image-tag">
                    <input class="form-control upload-input" type="file" name="cv" id="upload-cv">
                  </div>
                </div>
                
              </div>
            </form>
          </div>
        </div>

      </div> <!-- Row -->
    </div> <!-- Container -->
  </section>
  <!--===== End Settings =====-->
@endsection
@section('footer')
  <script src="{{asset('assets/website/js/pages/settings.js')}}"></script>

@endsection