@inject('message','App\Models\Message')

<div class="myNav">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-8 one">
            <div class="profile" >
              <div class="image">
                  @if(auth()->user()->image)
                  <img src="{{asset(auth()->user()->image)}}">
                  @else
                <img src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                @endif
                <img class="pos" src="{{asset('assets/website/images/home/profile-sub-image.png')}}">
              </div>
              <div class="profileContent">
                <a>
                  <span>
                                            @if(Auth::guard('member')->check())

                      {{Auth::guard('member')->user()->fullname}}
                      @endif
                    </span>
                  <span><i class="fas fa-chevron-down"></i></span>
                </a>
              </div>
              <ul class="profileDropdown">
                <li>
                  <div class="image">
                     @if(auth()->user()->image)
                  <img src="{{asset(auth()->user()->image)}}">
                  @else
                <img src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                @endif
                    <img class="pos" src="{{asset('assets/website/images/home/profile-sub-image.png')}}">
                  </div>
                  <a  href="{{url('/profile')}}">
                      {{Auth::guard('member')->user()->fullname}}
                     </a>
                </li>
                <li>
                  <span><i class="fas fa-user-circle"></i></span>
                  <a  href="{{url('/profile')}}">{!! __('front.Account')!!}</a>
                </li>
                <li>
                  <span><i class="fas fa-cog"></i></span>
                  <a  href="{{url('/settings')}}">{!! __('front.Settings')!!}</a>
                </li>
                <li>

                  <span><i class="fas fa-sign-out-alt"></i></span>
                  <a href="{{url('logout')}}">{!! __('front.Logout')!!}</a>
                </li>
                <div class="linksInNavBar">
                  <li>
                    <span><i class="fas fa-american-sign-language-interpreting"></i></span>
                    <a href="{{url('/terms#whoWeAre')}}">{!! __('front.Who are We')!!}</a>
                  </li>
                  <li>
                    <span><i class="fas fa-book-open"></i></span>
                    <a href="{{url('/terms#tremsAndConditions')}}">{!! __('front.Trems&Conditions')!!}</a>
                  </li>
                  <li>
                    <span><i class="fas fa-user-secret"></i></span>
                    <a href="{{url('/terms#privacyPolicy')}}">{!! __('front.Privacy Policy')!!}</a>
                  </li>
                </div>
              </ul>
            </div>
          </div>
          <div class="col-md-4 col-7 tow">
            <ul class="navigators">
              <li id="homeLink">
                <a href="{{url('/home')}}">
                  <img src="{{asset('assets/website/images/home/home.png')}}">
                </a>
              </li>
              <li id="usersLink">
                <a href="{{url('/users')}}">
                  <i class="fas fa-users"></i>
                </a>
              </li>
              <li id="doctorsLink">
                <a href="{{url('/doctors')}}">
                  <img src="{{asset('assets/website/images/home/docotr-mark-blue.png')}}">
                </a>
              </li>
              <li class="chat" id="chat_msg">
                <a class="number">
                  <img src="{{asset('assets/website/images/home/chat.png')}}">
                  <span>{{$message::where('to_id',Auth::id())->where('seen','0')->count()}}</span>
                </a>
                <div class="myDropDown" id="chat_msg_dropdown">
                  <div class="header">
                    <h5>Message <i class="fas fa-comments"></i></h5>
                    <a href="{{url('/chatify')}}">{!! __('front.Show All') !!}</a>
                  </div>
                  <div class="body" id="chat_msg_boy">
                    <div class="chat item notSeenYet">
                  
                    </div>
                    
                  </div>
                </div>
              </li>
            <li class="notifications">
                <a class="number">
                  <img src="{{asset('assets/website/images/home/notification-bill.png')}}">
                  <span id="notification_count">{{auth()->user()->unReadnotifications()->count() }}</span>
                </a>
                <div class="myDropDown">
                  <div class="header">
                    <h5>Notification <i class="fas fa-bell"></i></h5>
                    <a>Show All</a>
                  </div>
                  <div class="body notificationbody">
                   @foreach(auth()->user()->unReadnotifications as $notify)
                    <div class="notification item @if($notify->is_read == 0) notSeenYet @endif">
                      <div class="row">
                        <div class="col-md-2 col-4">
                          <div class="image">
                            <img src="{{asset('assets/website/profile/profile-image.png')}}">
                            <img class="pos" src="{{asset('assets/website/notifications/heart-small.png')}}">
                          </div>
                        </div>
                        <div class="col-md-6 col-8">
                          <div class="content">
                            <a href="{{$notify->url}}">{{$notify->from->fullname}}</a>
                            <a>{{ $notify->from->fullname }} {{ $notify->msg}}</a>
                          </div>
                        </div>
                        <div class="col-md-4 col-12">
                          <div class="time">
                            <span>{{ $notify-> readableDate }}</span>
                            <i class="far fa-clock"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                    
                  </div>
                </div>
              </li>

                    
            </ul>
          </div>
          <div class="col-md-3 col-5 three">
            <form method="grt"  action="{{url('/home')}}">
              <div class="search">
                <button type="submit"><i class="fas fa-search"></i></button>
                <input type="search" placeholder="{!! __('front.Search')!!}" name="text">
              </div>
            </form>
          </div>
          <div class="col-md-2 col-4 four">
            <div class="logo">
              <img src="{{asset('assets/website/images/home/navbar-logo.png')}}">
            </div>
          </div>
        </div>
      </div>
    </div>