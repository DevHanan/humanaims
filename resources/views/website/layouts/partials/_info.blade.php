

             
              <div class="about-me">
                <h4>About me</h4>
                <div class="underLine">
                  <span class="line"></span>
                </div>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                  industry's standard dummy</p>
                <hr class="seperator">
                <ul class="numbers">
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
           