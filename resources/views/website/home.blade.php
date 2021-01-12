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
                    @include('website.layouts.partials._home_filter')
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
                              @if(auth()->user()->image)
                              <img  src="{{asset(auth()->user()->image)}}">
                              @else
                              <img src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                              @endif
                              <img class="profile_sub_pic" src="{{asset('assets/website/images/home/profile-sub-image.png')}}">
                            </div>
                            <div class="name">
                               <a>{{optional($subject->member)->fullname}}</a>
                              <p>
                                {{$subject->readableDate}}
                                <i class="far fa-clock"></i>
                              </p>
                            </div>
                            <button class="btn action-follow @if($subject->member->isFollowed) followed @endif" data-user="{{$subject->member_id}}">
                              @if($subject->member->isFollowed)
                                Followed
                              @else
                            Follow
                            @endif
                          </button>
                          </div>
                        </div>
                        <div class="offset-sm-2 col-sm-3 col-3">
                          <div class="icons">
                            <a class="subject-fav-toggole" data-id="{{$subject->id}}"> <i  id="favsubjecticon{{$subject->id}}" class="fas fa-heart @if($subject->isFavorite) active @endif"></i></a>
                            <a class="subject-share" data-id="{{$subject->id}}"><i class="fas fa-share"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="text">
                     <p dir="auto" class="readMore">{{ substr($subject->body,0,100)}}
                          @if (strlen($subject->body) > 100)
                        <span class="dots">...</span>
                        <span class="more">  {{ substr($subject->body, 100) }} </span>
                          <button
                          type="button" class="read view-subject" data-id="{{$subject->id}}" >{!! __('front.Read More') !!}</button>
                          @endif
                        </p>
                    </div>
                    <div class="imageOrvideo">
                        @if($subject->video)
                      <div class="custom-video">
                        <div class="post_video row justify-content-center">
                          <div class="video_wrapper col-12">
                            <video id="videoOne" class="video-js vjs-tech" controls preload="auto" width="800"
                              height="400" poster="{{asset('assets/website/images/poster/poster.jpg')}}" data-setup="{}">
                              <source src="{{asset('assets/website/videos/video.mp4')}}" type="video/mp4">
                             <!--  <p class="vjs-no-js">
                                To view this video please enable JavaScript, and consider upgrading to a
                                web browser that
                                <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5
                                  video</a>
                              </p> -->
                              <button class="vjs-menu-button vjs-menu-button-popup vjs-icon-cog vjs-button"></button>
                            </video>
                          </div>
                        </div>
                      </div>
                      @elseif($subject->image)
                       <img width="98%"
                              height="400" src="{{asset($subject->image)}}">
                      @endif
                    </div>
                    <div class="footer">
                      <div class="row">
                        <div class="col-md-5 col-6">
                          <div class="l_icons">
                            <a class="subject-like" data-id="{{$subject->id}}">
                            <i  id="likesubjecticon{{$subject->id}}" class="fas fa-thumbs-up @if($subject->isLikable) active @endif"></i>
                            <span id="likeSubject{{$subject->id}}">{{$subject->likes()}}</span></a>
                            <a class="subject-dislike" data-subject="{{$subject->id}}">
                              <i  id="dislikesubjecticon{{$subject->id}}" class="fas fa-thumbs-down @if($subject->isdisLikable) active @endif"></i>
                              <span id="dislikesubject{{$subject->id}}">{{$subject->dislikes()}}</span></a>
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
                      <div class="comments">
                          @foreach($subject->comments as $comment)
                        <div class="comment">
                          <div class="row">
                            <div class="col-sm-6 col-8">
                              <div class="imageName">
                                <div class="image">
                                  <img src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                                  <img class="profile_sub_pic" src="{{asset('assets/website/images/home/profile-sub-image.png')}}">
                                </div>
                                <div class="name">
                                  <a>{{optional($comment->member)->fullname}}</a>
                                  <p>
                                   {{ $comment->readableDate}}
                                    <i class="far fa-clock"></i>
                                  </p>
                                </div>
                              </div>
                            </div>
                            <div class="offset-sm-2 col-4">
                              <div class="icons">
                                <i class="fas fa-heart"></i>
                                <i class="fas fa-exclamation-circle"></i>
                              </div>
                            </div>
                          </div>
                          <div class="commentContent">
                           
                            <p dir="auto" class="readMore"> {{ substr($comment->comment,0,100)}}
                            @if (strlen($comment->comment) > 100)

                              <span class="dots">...</span><span class="more">
                                  {{ substr($comment->comment, 100) }} 
                                </span><button
                                type="button" class="read">Read More</button>
                                @endif
                              </p>
                              @foreach($comment->replies as $replay)
                            <div class="repliedComment">
                              <div class="row">
                                <div class="col-sm-6 col-9">
                                  <div class="imageName">
                                    <div class="image">
                                      <img src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                                      <img class="profile_sub_pic" src="{{asset('assets/website/images/home/profile-sub-image.png')}}">
                                    </div>
                                    <div class="name">
                                       <a>{{optional($replay->member)->fullname}}</a>
                                  <p>
                                   {{ $replay->readableDate}}
                                    <i class="far fa-clock"></i>
                                  </p>
                                    </div>
                                  </div>
                                </div>
                                <div class="offset-sm-2 col-3">
                                  <div class="icons">
                                    <i class="fas fa-heart"></i>
                                    <i class="fas fa-exclamation-circle"></i>
                                  </div>
                                </div>
                              </div>
                              <p dir="auto" class="readMore">{{$replay->comment}}</p>
                            </div>
                            @endforeach
                            <div class="reply">
                              <i class="fas fa-camera"></i>
                              <i class="fas fa-comments"></i>
                            </div>
                            <div class="replyToComment">
                              <div class="images">
                                <img class="profile_pic" src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                                <img class="profile_sub_pic" src="{{asset('assets/website/images/home/profile-sub-image.png')}}">
                              </div>
                              <form method="POST" action="{{url('/comment')}}" id="replayMessage">
                                @csrf
                                <div class="emojy_container">
                                  <input type="hidden" name="parent_id" value="{{$comment->id}}">
                                  <input type="hidden" value="{{$subject->id}}" name="subject_id">
                                  <textarea type="text"  name="comment" id="replaytxtMessage" style="width: 100% !important;max-height: 40px;"></textarea>
                                </div>
                                <ul>
                                  <li><i class="fas fa-camera"></i></li>
                                </ul>
                              </form>
                            </div>
                          </div>
                        </div>
                        @endforeach
                      </div>
                      <div class="wrightComment">
                        <div class="flexSttuf">
                          <div class="images">
                            <img class="profile_pic" src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                            <img class="profile_sub_pic" src="{{asset('assets/website/images/home/profile-sub-image.png')}}">
                          </div>
                          <form method="POST" action="{{url('/comment')}}" id="commentMessage">
                            @csrf
                            <input type="hidden" name="subject_id" value="{{$subject->id}}">
                            <div class="emojy_container">
                              <textarea type="text"  name="comment" id="txtMessage" style="width: 100% !important;
max-height: 40px;"></textarea>
                            </div>
                            <ul>
                              <li>
                                <input class="imgInput" type="file">
                                <i class="fas fa-camera"></i>
                              </li>
                            </ul>
                          </form>
                        </div>
                        <div class="uplode">
                          <img class="uplodeImg" src="">
                        </div>
                      </div>
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