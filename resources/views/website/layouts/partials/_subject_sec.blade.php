 <div class="wrightAPost">
                      <div class="header">
                        <div class="images">
                          @if(auth()->user()->image)
                  <img  class="profile_pic"  src="{{asset(auth()->user()->image)}}">
                  @else
                          <img class="profile_pic" src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                          @endif
                          <img class="profile_sub_pic" src="{{asset('assets/website/images/home/profile-sub-image.png')}}">
                        </div>
                        <form>
                          <input type="text" placeholder="{!! __('front.Type Your Subject here') !!}" dir="auto">
                        </form>
                      </div>
                      <ul class="options">
                        <li>
                          <div class="flexSttuf">
                            <span data-iden="#audio">{!! __('front.Audio') !!}</span>
                            <i class="fas fa-microphone"></i>
                          </div>
                        </li>
                        <li>
                          <div class="flexSttuf">
                            <span data-iden="#photo">{!! __('front.Add Photo') !!}</span>
                            <i class="fas fa-camera"></i>
                          </div>
                        </li>
                        <li>
                          <div class="flexSttuf">
                            <span data-iden="#d_video">{!! __('front.Distorted video') !!}</span>
                            <i class="fas fa-video-slash"></i>
                          </div>
                        </li>
                        <li>
                          <div class="flexSttuf">
                            <span data-iden="#n_video">{!! __('front.Normal video') !!}</span>
                            <i class="fas fa-video"></i>
                          </div>
                        </li>
                      </ul>
                    </div>