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
                            <button class="btn">Follow</button>
                          </div>
                        </div>
                        <div class="offset-sm-2 col-sm-3 col-3">
                          <div class="icons">
                            <i class="fas fa-heart"></i>
                            <i class="fas fa-share"></i>
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
                       <img width="800"
                              height="400" src="{{asset($subject->image)}}">
                      @endif
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
                  
                    
                  </div>
                  @endforeach
                </div>