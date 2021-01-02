
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-12 one">
          <div class="download">
            <p>{!! __('front.Download App Now')!!}</p>
            <button>
              <img src="{{asset('assets/website/images/footer/google-play.png')}}">
            </button>
            <button>
              <img src="{{asset('assets/website/images/footer/apple.png')}}">
            </button>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12 tow">
          <div class="followUs">
            <h2>{!! __('front.Follow US')!!}</h2>
            <ul class="social">
              <li>
                <span>
                  <a href="{{$setting->facebook}}" target="_blank">
                  <i class="fab fa-facebook-f"></i>
                </a>
                </span>
              </li>
              <li>
                <span>
                  <a href="{{$setting->twitter}}" target="_blank">
                  <i class="fab fa-twitter"></i></a>
                </span>
              </li>
              <li>
                <span>
                  <a href="{{$setting->youtube}}" target="_blank">
                  <i class="fab fa-youtube"></i></a>
                </span>
              </li>
              <li>
                <span>
                  <a href="{{$setting->instagram}}" target="_blank">
                  <i class="fab fa-instagram"></i></a>
                </span>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12 three">
          <div class="support">
            <h2>{!! __('front.Support')!!}</h2>
            <p>{!! __('front.Contact Us On')!!}</p>
            <span>{{$setting->email}}</span>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12 four">
          <div class="links">
            <h2>{!! __('front.Humanaims')!!}</h2>
            <ul>
              <li><a href="{{url('/terms#whoWeAre')}}">{!! __('front.Who are We')!!}</a></li>
              <li><a href="{{url('/terms#tremsAndConditions')}}">{!! __('front.Trems&Conditions')!!}</a></li>
              <li><a href="{{url('/terms#privacyPolicy')}}">{!! __('front.Privacy Policy')!!}</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="copyRight">
      <p>{!! __('front.All Rights Reserved to')!!} <a href="home.html">{!! __('front.Humanaims')!!}</a>
        <script>document.write(new Date().getFullYear());</script>
      </p>
    </div>
  </footer>

