@extends('website.layouts.app')
@section('title'){!! __('front.Home') !!}@endsection
@section('contentPage')
@inject('Favourite','App\Models\Favorite')
<body class="homePage {!! app()->getLocale() == 'ar'?'rtl ':'ltr' !!}">
  <div id="app">
  <!--===== Start Fixed Elements =====-->
  <!-- Start loading -->
<!--        @include('website.layouts.partials._loading')
 -->
  <!-- Start Navbar -->
  <div class="navContainer">
    @include('website.layouts.partials._nav')
        @include('website.layouts.partials._menu')
  </div>
  <!-- Start ScrollUp Button -->
  <div class="scrollUp">
    <i class="fas fa-chevron-up"></i>
  </div>
  <!-- Start wrightPost Button -->
  <span class="wrightPostFromButtom">
    <i class="fas fa-plus"></i>
  </span>
  <!--===== End Fixed Elements =====-->
<div class="popUp">
          @include('website.layouts.partials._modals')

</div>
  <div class="homeContentTop">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 pl-3 pr-3">
          <div class="fixedFilter">
            <span class="head">Filter By</span>
            <div class="filters">
              <div class="filter active">
                <a>
                  <span class="name">All</span>
                </a>
              </div>
              <div class="filter">
                <a href="#mental" data-toggle="collapse">
                  <span class="name">Mental</span>
                  <span class="cheveron">
                    <i class="fas fa-chevron-right"></i>
                  </span>
                </a>
                <ul class="collapse" id="mental">
                  <li>
                    <span>
                      <i class="far fa-lightbulb"></i>
                    </span>
                    <span>Depression</span>
                    <span class="spanOnActive">
                      <i class="fas fa-check"></i>
                    </span>
                  </li>
                  <li>
                    <span>
                      <i class="far fa-lightbulb"></i>
                    </span>
                    <span>Family Problems</span>
                    <span class="spanOnActive">
                      <i class="fas fa-check"></i>
                    </span>
                  </li>
                  <li>
                    <span>
                      <i class="far fa-lightbulb"></i>
                    </span>
                    <span>Strees</span>
                    <span class="spanOnActive">
                      <i class="fas fa-check"></i>
                    </span>
                  </li>
                  <li>
                    <span>
                      <i class="far fa-lightbulb"></i>
                    </span>
                    <span>illusion</span>
                    <span class="spanOnActive">
                      <i class="fas fa-check"></i>
                    </span>
                  </li>
                  <li>
                    <span>
                      <i class="far fa-lightbulb"></i>
                    </span>
                    <span>Relligion Problems</span>
                    <span class="spanOnActive">
                      <i class="fas fa-check"></i>
                    </span>
                  </li>
                  <li>
                    <span>
                      <i class="far fa-lightbulb"></i>
                    </span>
                    <span>Secual Problems</span>
                    <span class="spanOnActive">
                      <i class="fas fa-check"></i>
                    </span>
                  </li>
                </ul>
              </div>
              <div class="filter">
                <a href="#Physical" data-toggle="collapse">
                  <span class="name">Physical</span>
                  <span class="cheveron">
                    <i class="fas fa-chevron-right"></i>
                  </span>
                </a>
                <ul class="collapse" id="Physical">
                  <li>
                    <span>
                      <i class="far fa-lightbulb"></i>
                    </span>
                    <span>Dental pain</span>
                    <span class="spanOnActive">
                      <i class="fas fa-check"></i>
                    </span>
                  </li>
                  <li>
                    <span>
                      <i class="far fa-lightbulb"></i>
                    </span>
                    <span>surgery</span>
                    <span class="spanOnActive">
                      <i class="fas fa-check"></i>
                    </span>
                  </li>
                  <li>
                    <span>
                      <i class="far fa-lightbulb"></i>
                    </span>
                    <span>Dermatologist</span>
                    <span class="spanOnActive">
                      <i class="fas fa-check"></i>
                    </span>
                  </li>
                  <li>
                    <span>
                      <i class="far fa-lightbulb"></i>
                    </span>
                    <span>Birth Defect</span>
                    <span class="spanOnActive">
                      <i class="fas fa-check"></i>
                    </span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-9 toggle active">
          <div class="row">
            <div class="col-lg-9 col-12">
              <div class="homeContent">
                                          @include('website.layouts.partials._subject_sec')

                <div class="posts">
                    @foreach($subjects as $subject)
                  <div class="post">
                    <div class="header">
                      <div class="row">
                        <div class="col-sm-7 col-9">
                          <div class="imageName">
                            <div class="image">
                              <img src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                              <img class="profile_sub_pic" src="{{asset('assets/website/images/home/profile-sub-image.png')}}">
                            </div>
                            <div class="name">
                              <a>{{optional($subject->member)->fullname}}</a>
                              <p>
                                <i class="far fa-clock"></i>
                                                               {{$subject->readableDate}}

                              </p>
                            </div>
                                @if(auth()->user()->isFollowing($subject->member))
                            <button class="btn btn-info btn-sm action-follow" data-id="{{ optional($subject->member)->id }}">


                                    UnFollow

                                @else
                               <button class="btn btn-info btn-sm action-follow" data-id="{{ optional($subject->member)->id }}">
                                    Follow


                             </button>
                            
                             @endif

                          </div>
                        </div>
                        <div class="offset-sm-2 col-sm-3 col-3">
                          <div class="icons">
                             <i class="fas fa-heart active" data-id="{{$subject->id}}"></i>
        
                            <i class="fas fa-heart" data-id="{{$subject->id}}"></i>
                          
                            <i class="fas fa-share"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="text">
                      <p dir="auto" class="readMore">{{ substr($subject->body,0,20)}}
                          @if (strlen($subject->body) > 20)
                        <span class="dots">...</span>
                        <span class="more">  {{ substr($subject->body, 20) }} </span>
                          <button
                          type="button" class="read view-subject" data-id="{{$subject->id}}" >{!! __('front.Read More') !!}</button>
                          @endif
                        </p>
                    </div>
                    <div class="imageOrvideo">
                      <div class="custom-video">
                        <div class="post_video row justify-content-center">
                          <div class="video_wrapper col-12">
                            <video id="videoOne" class="video-js vjs-tech" controls preload="auto" width="800"
                              height="400" poster="{{asset('assets/website/images/poster/poster.jpg')}}" data-setup="{}">
                              <source src="{{asset('assets/website/videos/video.mp4')}}" type="video/mp4">
                              <p class="vjs-no-js">
                                To view this video please enable JavaScript, and consider upgrading to a
                                web browser that
                                <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5
                                  video</a>
                              </p>
                              <button class="vjs-menu-button vjs-menu-button-popup vjs-icon-cog vjs-button"></button>
                            </video>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="footer">
                      <div class="row">
                        <div class="col-md-5 col-6">
                          <div class="l_icons">
                            <i class="fas fa-thumbs-up subject-likedislike" data-id="{{$subject->id}}" data-type="like"></i>{{$subject->likes()}}
                            <i class="fas fa-thumbs-down subject-likedislike" data-id="{{$subject->id}}" data-type="dislike"></i>{{$subject->dislikes()}}
                            <i class="fas fa-comment-dots"></i>
                          </div>
                        </div>
                        <div class="offset-md-4 col-md-3 col-6">
                          <div class="r_icons">
                            <i class="fas fa-share-alt"></i>
                            <i class="fas fa-eye"></i> <span>{{$subject->viewCount}}</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="toggleCommnetsArea toggle">
                    
                        @comments(['model' => $subject])
                      
                      
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
            <div class="col-3 d-lg-block d-none pl-2 pr-2">
                      @include('website.layouts.partials._home_info')

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection
@section('footer')
  <script src="{{asset('assets/website/js/pages/home.js')}}"></script>


@endsection