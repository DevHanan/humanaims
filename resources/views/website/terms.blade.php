@extends('website.layouts.app')
@section('title'){!! __('front.Terms') !!}@endsection
@section('header') @endsection
@section('contentPage')
<body class="termsPage {!! app()->getLocale() == 'ar'?'rtl ':'ltr' !!}">
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
  <!--===== End Fixed Elements =====-->


  <div class="termsContent">
    <div class="header">
      <img src="{{asset('assets/website/images/about_us/about-background.png')}}">
      <p>{{ $setting->terms }}</p>
    </div>
    <div class="container">
      <div id="whoWeAre" class="whoWeAre">
        <div class="subHeader">
          <span class="head">    {!! $about_page->title !!}</span>
          <div class="underLine">
            <div class="line"></div>
          </div>
        </div>
        <div class="content">
          <div class="row">
            <div class="col-md-8 col-12">
              <div class="text">
                <p>
                  {!! $about_page->body !!}
                </p>
              </div>
            </div>
            <div class="col-md-4 col-12">
              <div class="image">
                  @if($about_page->image)
                   <img src="{{asset($about_page->image)}}">
                  @else
                <img src="{{asset('assets/website/images/about_us/screen.png')}}">
                <img src="{{asset('assets/website/images/about_us//logo.png')}}">
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="tremsAndConditions" class="tremsAndConditions">
        <div class="subHeader">
          <span class="head">Terms & Conditions</span>
          <div class="underLine">
            <div class="line"></div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-12">
            <div class="item">
              <div class="row">
                <div class="col-2">
                  <div class="icon">
                    <img src="{{asset('assets/website/images/about_us/blue-lamp.png')}}">
                  </div>
                </div>
                <div class="col-10">
                  <div class="text">
                    <div class="subSubHeader">
                      <span class="head">Lorem ipsum dolor sit</span>
                      <div class="underLine">
                        <div class="line"></div>
                      </div>
                    </div>
                    <p>
                      Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt, omnis aspernatur optio animi
                      cum quibusdam. Sint vitae enim incidunt, quidem delectus, libero sunt placeat magni quasi quos
                      porro error laudantium.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-12">
            <div class="item">
              <div class="row">
                <div class="col-2">
                  <div class="icon">
                    <img src="{{asset('assets/website/images/about_us/blue-lamp.png')}}">
                  </div>
                </div>
                <div class="col-10">
                  <div class="text">
                    <div class="subSubHeader">
                      <span class="head">Lorem ipsum dolor sit</span>
                      <div class="underLine">
                        <div class="line"></div>
                      </div>
                    </div>
                    <p>
                      Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt, omnis aspernatur optio animi
                      cum quibusdam. Sint vitae enim incidunt, quidem delectus, libero sunt placeat magni quasi quos
                      porro error laudantium.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-12">
            <div class="item">
              <div class="row">
                <div class="col-2">
                  <div class="icon">
                    <img src="{{asset('assets/website/images/about_us/blue-lamp.png')}}">
                  </div>
                </div>
                <div class="col-10">
                  <div class="text">
                    <div class="subSubHeader">
                      <span class="head">Lorem ipsum dolor sit</span>
                      <div class="underLine">
                        <div class="line"></div>
                      </div>
                    </div>
                    <p>
                      Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt, omnis aspernatur optio animi
                      cum quibusdam. Sint vitae enim incidunt, quidem delectus, libero sunt placeat magni quasi quos
                      porro error laudantium.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-12">
            <div class="item">
              <div class="row">
                <div class="col-2">
                  <div class="icon">
                    <img src="{{asset('assets/website/images/about_us/blue-lamp.png')}}">
                  </div>
                </div>
                <div class="col-10">
                  <div class="text">
                    <div class="subSubHeader">
                      <span class="head">Lorem ipsum dolor sit</span>
                      <div class="underLine">
                        <div class="line"></div>
                      </div>
                    </div>
                    <p>
                      Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt, omnis aspernatur optio animi
                      cum quibusdam. Sint vitae enim incidunt, quidem delectus, libero sunt placeat magni quasi quos
                      porro error laudantium.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="privacyPolicy" class="privacyPolicy">
        <div class="subHeader">
          <span class="head">{!! $privacy_page->title !!}</span>
          <div class="underLine">
            <div class="line"></div>
          </div>
        </div>
        <p>
              {!! $privacy_page->body !!}

        </p>
      </div>
    </div>
  </div>


@endsection
@section('footer')
  <script src="{{asset('assets/website/js/pages/terms.js')}}"></script>

@endsection