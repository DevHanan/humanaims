 <div class="bg-white profile">
                <div class="profileSttuf">
                  <div class="images">
                     @if(auth()->user()->background)
            <img class="background" src="{{asset(auth()->user()->background)}}" alt="Profile Cover">
            @else
                    <img class="background" src="{{asset('assets/website/images/ch.jpg')}}">
                    @endif
                    <div class="subImage">
                       @if(auth()->user()->image)
            <img class="profile_pic" src="{{asset(auth()->user()->image)}}" alt="Profile Image">
            @else
                      <img class="profile_pic" src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                      @endif
                      <img class="profile_sub_pic" src="{{asset('assets/website/images/home/bird-blue-circle.png')}}">
                    </div>
                  </div>
                  <div class="text">
                    <a href="profile.html" class="name">
                        @if(Auth::guard('member')->check())
                      {{Auth::guard('member')->user()->fullname}}
                      @endif
                    
                    </a>
                    <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing</p>
                  </div>
                  <div class="numbers mt-3">
                    <ul>
                      <li>
                        <span>{!! __('front.Ads') !!}</span>
                        <span>415</span>
                      </li>
                      <li>
                        <span>{!! __('front.Follow') !!}</span>
                        <span> 
                             @if(Auth::guard('member')->check())
                      {{Auth::guard('member')->user()->followingCount }}
                     
                      @endif
                      </li>
                      <li>
                        <span>{!! __('front.Followers') !!}</span>
                        <span>
                           @if(Auth::guard('member')->check())
                      {{Auth::guard('member')->user()->followerCount }}
                    
                      @endif
                        </span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>