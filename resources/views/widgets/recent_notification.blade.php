<li class="notifications dropdown-notifications">
                <a class="number" data-toggle="dropdown">
                  <img src="{{asset('assets/website/images/home/notification-bill.png')}}">
                  <span  class="notif-count" data-count="9">{{$notifications->where('is_read',0)->count()}}</span>
                </a>
                <div class="myDropDown">
                  <div class="header">
                    <h5>Notification <i class="fas fa-bell"></i></h5>
                    <a>Show All</a>
                  </div>
                 <div class="body">
                  @foreach($notifications as $notify)
                    @if($notify->is_read == 0)
                    <div class="notification item notSeenYet">
                      <div class="row">
                        <div class="col-md-2 col-4">
                          <div class="image">
                            <img src="{{asset('assets/website/images/profile/profile-image.png')}}">
                            <img class="pos" src="{{asset('assets/website/images/notifications/heart-small.png')}}">
                          </div>
                        </div>
                        <div class="col-md-6 col-8">
                          <div class="content">
                            <a href="profile.html">Mohamed Adel</a>
                            <a>Someone Commented On Your Post</a>
                          </div>
                        </div>
                        <div class="col-md-4 col-12">
                          <div class="time">
                            <span>Three Seconds Ago</span>
                            <i class="far fa-clock"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                      @else
                       <div class="notification item">
                      <div class="row">
                        <div class="col-md-2 col-4">
                          <div class="image">
                            <img src="{{asset('assets/website/images/profile/profile-image.png')}}">
                            <img class="pos" src="{{asset('assets/website/images/notifications/heart-small.png')}}">
                          </div>
                        </div>
                        <div class="col-md-6 col-8">
                          <div class="content">
                            <a href="profile.html">Mohamed Adel</a>
                            <a>Someone Commented On Your Post</a>
                          </div>
                        </div>
                        <div class="col-md-4 col-12">
                          <div class="time">
                            <span>Three Seconds Ago</span>
                            <i class="far fa-clock"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                      @endif
                    @endforeach
                
                </div>
              </li>