@extends('website.layouts.app')
@section('title'){!! __('Messages') !!}@endsection
@section('header') @endsection
@section('contentPage')
<body class="massengerPage {!! app()->getLocale() == 'ar'?'rtl ':'ltr' !!}">
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

  <!-- Start Messenger PopUp -->
  <div class="messenger-popup hidden" id="chatPopUp">
    <div class="container">
      <div class="popup-wrapper">
        <button class="text-center" id="closePopup"><i class="fas fa-times"></i></button>
        <div class="row">
          <div class="col-12 text-center">
            <img src="/images/messenger/vote.png')}}"" alt="Image">
            <p class="main-color font-weight-bold mt-4 text-center">Rate your experience to help us solve your problem
            </p>
          </div>
          <div class="col-12 pt-0 pb-0 pr-5 pl-5 mt-2">
            <div class="rate-box row align-items-center justify-content-center">
              <div class="col-md-7 col-5 ">
                <span class="doctor-rate main-color font-weight-bold">Rate Doctor</span>
              </div>
              <div class="col-md-5 col-7">
                <ul class="rating">
                  <li class="star"></li>
                  <li class="star"></li>
                  <li class="star"></li>
                  <li class="star"></li>
                  <li class="star"></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-12 mt-4">
            <form action="#">
              <input class="btn text-center" type="submit" value="Rate">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== End Fixed Elements =====-->

 <div class="massengerContent">
    <div class="container-fluid">
      <div class="massenger">
        <div class="row">
          <div class="col-lg-4 col-12">
            <div class="friends">
              <form>
                <div class="search">
                  <button><i class="fas fa-search"></i></button>
                  <input type="search" placeholder="Search For Doctors...">
                </div>
              </form>
              <ul>
                <li class="item">
                  <div class="image">
                    <img src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                  </div>
                  <div class="content">
                    <div class="right">
                      <a href="profile.html">Mohamed Adel</a>
                      <div class="time">
                        <span>1 hour</span>
                        <i class="far fa-clock"></i>
                      </div>
                    </div>
                    <p class="text">Lorem ipsum dolor sit amet</p>
                  </div>
                </li>
                <li class="item">
                  <div class="image">
                    <img src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                  </div>
                  <div class="content">
                    <div class="right">
                      <a href="profile.html">Mohamed Adel</a>
                      <div class="time">
                        <span>1 hour</span>
                        <i class="far fa-clock"></i>
                      </div>
                    </div>
                    <p class="text">Lorem ipsum dolor sit amet</p>
                  </div>
                </li>
                <li class="item">
                  <div class="image">
                    <img src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                  </div>
                  <div class="content">
                    <div class="right">
                      <a href="profile.html">Mohamed Adel</a>
                      <div class="time">
                        <span>1 hour</span>
                        <i class="far fa-clock"></i>
                      </div>
                    </div>
                    <p class="text">Lorem ipsum dolor sit amet</p>
                  </div>
                </li>
                <li class="item">
                  <div class="image">
                    <img src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                  </div>
                  <div class="content">
                    <div class="right">
                      <a href="profile.html">Mohamed Adel</a>
                      <div class="time">
                        <span>1 hour</span>
                        <i class="far fa-clock"></i>
                      </div>
                    </div>
                    <p class="text">Lorem ipsum dolor sit amet</p>
                  </div>
                </li>
                <li class="item">
                  <div class="image">
                    <img src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                  </div>
                  <div class="content">
                    <div class="right">
                      <a href="profile.html">Mohamed Adel</a>
                      <div class="time">
                        <span>1 hour</span>
                        <i class="far fa-clock"></i>
                      </div>
                    </div>
                    <p class="text">Lorem ipsum dolor sit amet</p>
                  </div>
                </li>
                <li class="item">
                  <div class="image">
                    <img src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                  </div>
                  <div class="content">
                    <div class="right">
                      <a href="profile.html">Mohamed Adel</a>
                      <div class="time">
                        <span>1 hour</span>
                        <i class="far fa-clock"></i>
                      </div>
                    </div>
                    <p class="text">Lorem ipsum dolor sit amet</p>
                  </div>
                </li>
                <li class="item">
                  <div class="image">
                    <img src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                  </div>
                  <div class="content">
                    <div class="right">
                      <a href="profile.html">Mohamed Adel</a>
                      <div class="time">
                        <span>1 hour</span>
                        <i class="far fa-clock"></i>
                      </div>
                    </div>
                    <p class="text">Lorem ipsum dolor sit amet</p>
                  </div>
                </li>
                <li class="item">
                  <div class="image">
                    <img src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                  </div>
                  <div class="content">
                    <div class="right">
                      <a href="profile.html">Mohamed Adel</a>
                      <div class="time">
                        <span>1 hour</span>
                        <i class="far fa-clock"></i>
                      </div>
                    </div>
                    <p class="text">Lorem ipsum dolor sit amet</p>
                  </div>
                </li>
                <li class="item">
                  <div class="image">
                    <img src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                  </div>
                  <div class="content">
                    <div class="right">
                      <a href="profile.html">Mohamed Adel</a>
                      <div class="time">
                        <span>1 hour</span>
                        <i class="far fa-clock"></i>
                      </div>
                    </div>
                    <p class="text">Lorem ipsum dolor sit amet</p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-8 col-12">
            <div class="chat">
              <div class="header">
                <div class="row">
                  <div class="col-md-8 col-sm-6 col-12">
                    <div class="imageName">
                      <div class="image">
                        <img src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                        <img class="profile_sub_pic" src="{{asset('assets/website/images/home/profile-sub-image.png')}}">
                      </div>
                      <div class="name">
                        <a>Mohamed Ahmed</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-6 col-12">
                    <div class="beginChatting">
                      <button id="startChat">Begin Chatting</button>
                      <div class="chatImage">
                        <img src="{{asset('assets/website/images/messenger/start-chat.png')}}">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="talk">
                <div class="row">
                  <div class="sender col-12">
                    <div class="item">
                      <div class="image">
                        <img src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                        <img class="profile_sub_pic" src="{{asset('assets/website/images/home/profile-sub-image.png')}}">
                      </div>
                      <div class="text">
                        <p>this is dumby txt</p>
                        <span class="time"></span>
                      </div>
                    </div>
                  </div>
                  <div dir="rtl" class="receiver col-12">
                    <div class="item">
                      <div class="image">
                        <img src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                        <img class="profile_sub_pic" src="{{asset('assets/website/images/home/profile-sub-image.png')}}">
                      </div>
                      <div class="text">
                        <p>this is dumby txt</p>
                        <span class="time"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <form>
                <div class="text disabledInput">
                  <div class="emojy_container">
                    <textarea type="text" data-emojiable="true"></textarea>
                  </div>
                  <ul>
                    <li><i class="fas fa-camera"></i></li>
                    <li><i class="fas fa-video"></i></li>
                    <li><i class="fas fa-paperclip"></i></li>
                  </ul>
                </div>
                <button class="disabledButton">
                  <img src="{{asset('assets/website/images/messenger/send-message.png')}}">
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('footer')
  <script src="{{asset('assets/website/js/pages/massenger.js')}}"></script>

@endsection