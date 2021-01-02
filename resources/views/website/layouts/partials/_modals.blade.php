 
    <div class="postPopUp scroller">
      <div class="popUpHeader">
        <h3>{!! __('front.Create A Subject') !!}</h3>
        <span class="popUpClose"><i class="fas fa-times"></i></span>
      </div>
      <div class="popUpContent">
        {!! Form::open(['method'=>'post','route'=>'subject.store',
                            'class'=>'form','files'=>'true']) !!}
                            @csrf()
          <div class="header">
            <div class="images">
              <img class="profile_pic" src="{{asset('assets/website/images/profile/profile-image.png')}}">
              <img class="profile_sub_pic" src="{{asset('assets/website/images/home/profile-sub-image.png')}}">
            </div>
            <div class="headerForm">
              <textarea type="text" data-emojiable="true"></textarea>
             <!--  <div class="postUplode">
                <img class="popUpUplodeImage" src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                <video src="" class="toggle"></video>
              </div> -->
            </div>
          </div>
          <ul class="options">
            <li>
              <input class="popUpinputUplodeAudio" type="file" name="audio">
              <div class="flexSttuf">
                <span id="audio">{!! __('front.Audio') !!}</span>
                <i class="fas fa-microphone"></i>
              </div>
            </li>
            <li>
              <input class="popUpinputUplodeImage" type="file" name="image">
              <div class="flexSttuf">
                <span id="photo">{!! __('front.Add Photo') !!}</span>
                <i class="fas fa-camera"></i>
              </div>
            </li>
            <li>
              <input class="popUpinputUplode_d_video" type="file" name="d_video">
              <div class="flexSttuf">
                <span id="d_video">{!! __('front.Distorted video') !!}</span>
                <i class="fas fa-video-slash"></i>
              </div>
            </li>
            <li>
              <input class="popUpinputUploden_video" type="file" name="n_video">
              <div class="flexSttuf">
                <span id="n_video">{!! __('front.Normal video') !!}</span>
                <i class="fas fa-video"></i>
              </div>
            </li>
          </ul>
          <div class="popUpHFooter">
            {{ Form::select('category_id', $categories,  null,['class'=>'select2 form-control ','autocomplete'=>"off" , 'placeholder'=>'Please Select']) }}
            <input class="btn" type="submit" value="{!! __('front.Post') !!}">
          </div>
                                    {!! Form::close() !!}

      </div>
    </div>
 
