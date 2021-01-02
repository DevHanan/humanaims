@extends('website.layouts.app')
@section('title'){!! __('Profile') !!}@endsection
@section('header') @endsection
@section('contentPage')

<body class="profile-body followProfile {!! app()->getLocale() == 'ar'?'rtl ':'ltr' !!}">
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

  <!-- Start wrightPost Button -->
  <span class="wrightPostFromButtom">
    <i class="fas fa-plus"></i>
  </span>
  <!--==== Image View Popup ====-->
  <div class="popup-img">
    <div class="popup-wrapper container">
      <img class="poppedUpImg" src="" alt="">
      <i class="fas fa-times"></i>
    </div>
  </div>

  <!-- Post PopUP -->
  <div class="popUp">
    <div class="postPopUp scroller">
      <div class="popUpHeader">
        <h3>Create A Subject</h3>
        <span class="popUpClose"><i class="fas fa-times"></i></span>
      </div>
      <div class="popUpContent">
        <div class="header">
          <div class="images">
            <img class="profile_pic" src="{{asset('assets/website/images/profile/profile-image.png')}}">
            <img class="profile_sub_pic" src="{{asset('assets/website/images/home/profile-sub-image.png')}}">
          </div>
          <form>
            <textarea type="text" data-emojiable="true" placeholder="Type Your Subject here" dir="auto"></textarea>
            <div class="postUplode">
              <img class="popUpUplodeImage" src="{{asset('assets/website/images/David-Beckham.jpg')}}">
              <video src="" class="toggle"></video>
            </div>
          </form>
        </div>
        <ul class=" options">
          <li>
            <div class="flexSttuf">
              <span>Audio</span>
              <i class="fas fa-microphone"></i>
            </div>
          </li>
          <li>
            <input class="popUpinputUplodeImage" type="file" dir="auto">
            <div class="flexSttuf">
              <span>Add Photo</span>
              <i class="fas fa-camera"></i>
            </div>
          </li>
          <li>
            <div class="flexSttuf">
              <span>Distorted video</span>
              <i class="fas fa-video-slash"></i>
            </div>
          </li>
          <li>
            <div class="flexSttuf">
              <span>Normal video</span>
              <i class="fas fa-video"></i>
            </div>
          </li>
        </ul>
      </div>
      <form class="popUpHFooter">
        <select class="form-control">
          <option>Deprresion</option>
          <option>Deprresion</option>
          <option>Deprresion</option>
          <option>Deprresion</option>
        </select>
        <input class="btn" type="submit" value="Post" dir="auto">
      </form>
    </div>
  </div>
  <!--===== End Fixed Elements =====-->

  <!--======= Start Profile =======-->
  <section class="profile">
    <div class="container-fluid">
      <div class="row">
        <div class="profile-cover col-12 p-0">
          <div class="cover_img">
            <div class="overlay"></div>
            <img class="popupCoverImg" src="{{asset('assets/website/images/profile/cover.jpg')}}" alt="Profile Cover">
          </div>
          <div class="profile_img">
            <img class="popupProfileImg" src="{{asset('assets/website/images/David-Beckham.jpg')}}" alt="Profile Image">
            <img src="{{asset('assets/website/images/profile/bird-blue-circle.png')}}" alt="Bird Icon">
            <p>Mohamed Ahmed</p>
          </div>
          <div class="profile_options col-12 p-0 justify-content-end">
            <form class="pt-3 pb-3" action="#" style="flex-grow: 0.3">
              <input class="main-background white d-flex justify-content-center" type="button" value="Follow"
                id="followProfile" dir="auto">
            </form>
          </div>
        </div>
      </div>
      <!-- Profile Content -->
      <div class="profile-content mt-3">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <!--==== About Me ====-->
            <div class="col-lg-3 col-12 mb-3">
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
                    <span>Ads</span>
                    <span>451</span>
                  </li>
                  <li>
                    <span>Following</span>
                    <span>2K</span>
                  </li>
                  <li>
                    <span>Followers</span>
                    <span>4K</span>
                  </li>
                </ul>
              </div>
            </div>

            <div class="col-xl-8 col-lg-9 col-12">
              <div class="diaries show" id="shuffle-diaries">
                <div class="row justify-content-center">
                  <div class="homeContent">
                    <div class="wrightAPost">
                      <div class="header">
                        <div class="images">
                          <img class="profile_pic" src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                          <img class="profile_sub_pic" src="{{asset('assets/website/images/home/profile-sub-image.png')}}">
                        </div>
                        <form>
                          <input type="text" placeholder="Type Your Subject here" dir="auto">
                        </form>
                      </div>
                      <ul class="options">
                        <li>
                          <div class="flexSttuf">
                            <span>Audio</span>
                            <i class="fas fa-microphone"></i>
                          </div>
                        </li>
                        <li>
                          <div class="flexSttuf">
                            <span>Add Photo</span>
                            <i class="fas fa-camera"></i>
                          </div>
                        </li>
                        <li>
                          <div class="flexSttuf">
                            <span>Distorted video</span>
                            <i class="fas fa-video-slash"></i>
                          </div>
                        </li>
                        <li>
                          <div class="flexSttuf">
                            <span>Normal video</span>
                            <i class="fas fa-video"></i>
                          </div>
                        </li>
                      </ul>
                    </div>
                    <div class="posts">
                      <div class="post">
                        <div class="header">
                          <div class="row">
                            <div class="col-9">
                              <div class="imageName">
                                <div class="image">
                                  <img src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                                  <img class="profile_sub_pic" src="{{asset('assets/website/images/home/profile-sub-image.png')}}">
                                </div>
                                <div class="name">
                                  <a>Mohamed Ahmed</a>
                                  <p>
                                    2 seconds Ago
                                    <i class="far fa-clock"></i>
                                  </p>
                                </div>
                                <button class="btn">Follow</button>
                              </div>
                            </div>
                            <div class="col-sm-2 col-3">
                              <div class="icons">
                                <i class="fas fa-heart"></i>
                                <i class="fas fa-share"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="text" dir="auto">
                          <p class="readMore">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur sunt
                            corporis
                            repellat
                            consequuntur aperiam eveniet placeat ea recusandae aliquid<span class="dots">...</span><span
                              class="more">Non corporis, quo quod rem, omnis, vitae hic
                              voluptatibus distinctio dolores
                              quas in cum qui! Dolorem ipsam iste qui sapiente. Dolorem libero accusantium, repellat
                              quidem ratione, quaerat earum ad dolor magni architecto obcaecati nesciunt odio itaque,
                              perferendis aut vitae iusto. Explicabo, et officiis! Culpa consequuntur, aut quam
                              exercitationem necessitatibus inventore adipisci velit assumenda enim aspernatur magni
                              nihil
                              cum, corrupti obcaecati quo eius at quod. Quidem quas qui natus ex? Voluptas doloribus
                              dolor, eum repellat impedit atque aliquid? Voluptatem iure suscipit illo.</span><button
                              type="button" class="read">Read More</button></p>
                        </div>
                        <div class="imageOrvideo">
                          <div class="custom-video">
                            <div class="post_video row justify-content-center">
                              <div class="video_wrapper col-12">
                                <video id="videoOne" class="video-js vjs-tech" controls preload="auto" width="800"
                                  height="400" poster="{{asset('assets/website/images/poster/poster.jpg')}}" data-setup="{}">
                                  <source src="../videos/video.mp4" type="video/mp4">
                                  <p class="vjs-no-js">
                                    To view this video please enable JavaScript, and consider upgrading to a
                                    web browser that
                                    <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5
                                      video</a>
                                  </p>
                                  <button
                                    class="vjs-menu-button vjs-menu-button-popup vjs-icon-cog vjs-button"></button>
                                </video>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="footer">
                          <div class="row">
                            <div class="col-md-5 col-6">
                              <div class="l_icons">
                                <i class="fas fa-thumbs-up"></i>
                                <i class="fas fa-thumbs-down"></i>
                                <i class="fas fa-comment-dots"></i>
                              </div>
                            </div>
                            <div class="offset-md-4 col-md-3 col-6">
                              <div class="r_icons">
                                <i class="fas fa-share-alt"></i>
                                <i class="fas fa-eye"></i> <span>255</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="toggleCommnetsArea hidden">
                          <div class="comments">
                            <div class="comment">
                              <div class="row">
                                <div class="col-9">
                                  <div class="imageName">
                                    <div class="image">
                                      <img src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                                      <img class="profile_sub_pic" src="{{asset('assets/website/images/home/profile-sub-image.png')}}">
                                    </div>
                                    <div class="name">
                                      <a>Mohamed Ahmed</a>
                                      <p>
                                        2 seconds Ago
                                        <i class="far fa-clock"></i>
                                      </p>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-sm-2 col-2">
                                  <div class="icons">
                                    <i class="fas fa-heart"></i>
                                    <i class="fas fa-exclamation-circle"></i>
                                  </div>
                                </div>
                              </div>
                              <div class="commentContent">
                                <p class="readMore">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur
                                  sunt
                                  corporis
                                  repellat
                                  consequuntur aperiam eveniet placeat ea recusandae aliquid<span
                                    class="dots">...</span><span class="more">Non corporis, quo quod rem, omnis, vitae
                                    hic
                                    voluptatibus distinctio dolores
                                    nesciunt odio itaque,
                                    perentore adipisci velit assumenda enim aspernatur magni
                                    nihil
                                    cum, corrupti obcaecati quo eius at quod. Quidem quas qui natus ex? Voluptas
                                    doloribus
                                    dolor, eum repellat impedit atque aliquid? Voluptatem iure suscipit
                                    illo.</span><button type="button" class="read">Read More</button></p>
                                <div class="repliedComment">
                                  <div class="row">
                                    <div class="col-9">
                                      <div class="imageName">
                                        <div class="image">
                                          <img src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                                          <img class="profile_sub_pic" src="{{asset('assets/website/images/home/profile-sub-image.png')}}">
                                        </div>
                                        <div class="name">
                                          <a>Mohamed Ahmed</a>
                                          <p class="time">
                                            2 seconds Ago
                                            <i class="far fa-clock"></i>
                                          </p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-sm-2 col-2">
                                      <div class="icons">
                                        <i class="fas fa-heart"></i>
                                        <i class="fas fa-exclamation-circle"></i>
                                      </div>
                                    </div>
                                  </div>
                                  <p class="readMore">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur
                                    sunt
                                    corporis
                                    repellat
                                    consequuntur aperiam eveniet placeat ea recusandae aliquid<span
                                      class="dots">...</span><span class="more">Non corporis, quo quod rem, omnis, vitae
                                      hic
                                      voluptatibus distinctio dolores
                                      quas qui natus ex? Voluptas doloribus
                                      dolor, eum repellat impedit atque aliquid? Voluptatem iure suscipit
                                      illo.</span><button type="button" class="read">Read More</button></p>
                                </div>
                                <div class="reply">
                                  <i class="fas fa-camera"></i>
                                  <i class="fas fa-comments"></i>
                                </div>
                                <div class="replyToComment">
                                  <div class="images">
                                    <img class="profile_pic" src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                                    <img class="profile_sub_pic" src="{{asset('assets/website/images/home/profile-sub-image.png')}}">
                                  </div>
                                  <form>
                                    <textarea type="text" data-emojiable="true" placeholder="Type Your Subject here"
                                      dir="auto"></textarea>
                                    <ul>
                                      <li><i class="fas fa-camera"></i></li>
                                    </ul>
                                  </form>
                                </div>
                              </div>
                            </div>
                            <div class="comment">
                              <div class="row">
                                <div class="col-9">
                                  <div class="imageName">
                                    <div class="image">
                                      <img src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                                      <img class="profile_sub_pic" src="{{asset('assets/website/images/home/profile-sub-image.png')}}">
                                    </div>
                                    <div class="name">
                                      <a>Mohamed Ahmed</a>
                                      <p>
                                        2 seconds Ago
                                        <i class="far fa-clock"></i>
                                      </p>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-sm-2 col-2">
                                  <div class="icons">
                                    <i class="fas fa-heart"></i>
                                    <i class="fas fa-exclamation-circle"></i>
                                  </div>
                                </div>
                              </div>
                              <div class="commentContent">
                                <p class="readMore">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur
                                  sunt
                                  corporis
                                  repellat
                                  consequuntur aperiam eveniet placeat ea recusandae aliquid<span
                                    class="dots">...</span><span class="more">Non corporis, quo quod rem, omnis, vitae
                                    hic
                                    voluptatibus distinctio dolores
                                    ulpa consequuntur, aut quam
                                    e obcaecati quo eius at quod. Quidem quas qui natus ex? Voluptas doloribus
                                    dolor, eum repellat impedit atque aliquid? Voluptatem iure suscipit
                                    illo.</span><button type="button" class="read">Read More</button></p>
                                <div class="reply">
                                  <i class="fas fa-camera"></i>
                                  <i class="fas fa-comments"></i>
                                </div>
                                <div class="replyToComment">
                                  <div class="images">
                                    <img class="profile_pic" src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                                    <img class="profile_sub_pic" src="{{asset('assets/website/images/home/profile-sub-image.png')}}">
                                  </div>
                                  <form>
                                    <textarea type="text" data-emojiable="true" placeholder="Type Your Subject here"
                                      dir="auto"></textarea>
                                    <ul>
                                      <li><i class="fas fa-camera"></i></li>
                                    </ul>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="wrightComment">
                            <div class="flexSttuf">
                              <div class="images">
                                <img class="profile_pic" src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                                <img class="profile_sub_pic" src="{{asset('assets/website/images/home/profile-sub-image.png')}}">
                              </div>
                              <form>
                                <textarea type="text" data-emojiable="true" placeholder="Type Your Subject here"
                                  dir="auto"></textarea>
                                <ul>
                                  <li>
                                    <input class="imgInput" type="file" dir="auto">
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
                      <div class="post">
                        <div class="header">
                          <div class="row">
                            <div class="col-9">
                              <div class="imageName">
                                <div class="image">
                                  <img src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                                  <img class="profile_sub_pic" src="{{asset('assets/website/images/home/profile-sub-image.png')}}">
                                </div>
                                <div class="name">
                                  <a>Mohamed Ahmed</a>
                                  <p>
                                    2 seconds Ago
                                    <i class="far fa-clock"></i>
                                  </p>
                                </div>
                                <button class="btn">Follow</button>
                              </div>
                            </div>
                            <div class="col-sm-2 col-3">
                              <div class="icons">
                                <i class="fas fa-heart"></i>
                                <i class="fas fa-share"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="text" dir="auto">
                          <p class="readMore">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur sunt
                            corporis
                            repellat
                            consequuntur aperiam eveniet placeat ea recusandae aliquid<span class="dots">...</span><span
                              class="more">Non corporis, quo quod rem, omnis, vitae hic
                              voluptatibus distinctio dolores
                              quas in cum qui! Dolorem ipsam iste qui sapiente. Dolorem libero accusantium, repellat
                              quidem ratione, quaerat earum ad dolor magni architecto obcaecati nesciunt odio itaque,
                              nihil
                              cum, corrupti obcaecati quo eius at quod. Quidem quas qui natus ex? Voluptas doloribus
                              dolor, eum repellat impedit atque aliquid? Voluptatem iure suscipit illo.</span><button
                              type="button" class="read">Read More</button></p>
                        </div>
                        <div class="imageOrvideo">
                          <img class="postImage" src="{{asset('assets/website/images/profile/gril.jpg')}}">
                        </div>
                        <div class="footer">
                          <div class="row">
                            <div class="col-md-5 col-6">
                              <div class="l_icons">
                                <i class="fas fa-thumbs-up"></i>
                                <i class="fas fa-thumbs-down"></i>
                                <i class="fas fa-comment-dots"></i>
                              </div>
                            </div>
                            <div class="offset-md-4 col-md-3 col-6">
                              <div class="r_icons">
                                <i class="fas fa-share-alt"></i>
                                <i class="fas fa-eye"></i> <span>255</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="toggleCommnetsArea hidden">
                          <div class="comments">
                            <div class="comment">
                              <div class="row">
                                <div class="col-9">
                                  <div class="imageName">
                                    <div class="image">
                                      <img src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                                      <img class="profile_sub_pic" src="{{asset('assets/website/images/home/profile-sub-image.png')}}">
                                    </div>
                                    <div class="name">
                                      <a>Mohamed Ahmed</a>
                                      <p>
                                        2 seconds Ago
                                        <i class="far fa-clock"></i>
                                      </p>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-sm-2 col-2">
                                  <div class="icons">
                                    <i class="fas fa-heart"></i>
                                    <i class="fas fa-exclamation-circle"></i>
                                  </div>
                                </div>
                              </div>
                              <div class="commentContent">
                                <p class="readMore">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur
                                  sunt
                                  corporis
                                  repellat
                                  consequuntur aperiam eveniet placeat ea recusandae aliquid<span
                                    class="dots">...</span><span class="more">Non corporis, quo quod rem, omnis, vitae
                                    hic
                                    enda enim aspernatur magni
                                    nihil
                                    cum, corrupti obcaecati quo eius at quod. Quidem quas qui natus ex? Voluptas
                                    doloribus
                                    dolor, eum repellat impedit atque aliquid? Voluptatem iure suscipit
                                    illo.</span><button type="button" class="read">Read More</button></p>
                                <div class="reply">
                                  <i class="fas fa-camera"></i>
                                  <i class="fas fa-comments"></i>
                                </div>
                                <div class="replyToComment">
                                  <div class="images">
                                    <img class="profile_pic" src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                                    <img class="profile_sub_pic" src="{{asset('assets/website/images/home/profile-sub-image.png')}}">
                                  </div>
                                  <form>
                                    <textarea type="text" data-emojiable="true" placeholder="Type Your Subject here"
                                      dir="auto"></textarea>
                                    <ul>
                                      <li><i class="fas fa-camera"></i></li>
                                    </ul>
                                  </form>
                                </div>
                              </div>
                            </div>
                            <div class="comment">
                              <div class="row">
                                <div class="col-9">
                                  <div class="imageName">
                                    <div class="image">
                                      <img src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                                      <img class="profile_sub_pic" src="{{asset('assets/website/images/home/profile-sub-image.png')}}">
                                    </div>
                                    <div class="name">
                                      <a>Mohamed Ahmed</a>
                                      <p>
                                        2 seconds Ago
                                        <i class="far fa-clock"></i>
                                      </p>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-sm-2 col-2">
                                  <div class="icons">
                                    <i class="fas fa-heart"></i>
                                    <i class="fas fa-exclamation-circle"></i>
                                  </div>
                                </div>
                              </div>
                              <div class="commentContent">
                                <p class="readMore">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur
                                  sunt
                                  corporis
                                  repellat
                                  consequuntur aperiam eveniet placeat ea recusandae aliquid<span
                                    class="dots">...</span><span class="more">Non corporis, quo quod rem, omnis, vitae
                                    hic
                                    ad dolor magni architecto obcaecati nesciunt odio itaque,
                                    pimpedit atque aliquid? Voluptatem iure suscipit illo.</span><button type="button"
                                    class="read">Read More</button></p>
                                <div class="reply">
                                  <i class="fas fa-camera"></i>
                                  <i class="fas fa-comments"></i>
                                </div>
                                <div class="replyToComment">
                                  <div class="images">
                                    <img class="profile_pic" src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                                    <img class="profile_sub_pic" src="{{asset('assets/website/images/home/profile-sub-image.png')}}">
                                  </div>
                                  <form>
                                    <textarea type="text" data-emojiable="true" placeholder="Type Your Subject here"
                                      dir="auto"></textarea>
                                    <ul>
                                      <li><i class="fas fa-camera"></i></li>
                                    </ul>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="wrightComment">
                            <div class="flexSttuf">
                              <div class="images">
                                <img class="profile_pic" src="{{asset('assets/website/images/David-Beckham.jpg')}}">
                                <img class="profile_sub_pic" src="{{asset('assets/website/images/home/profile-sub-image.png')}}">
                              </div>
                              <form>
                                <textarea type="text" data-emojiable="true" placeholder="Type Your Subject here"
                                  dir="auto"></textarea>
                                <ul>
                                  <li>
                                    <input class="imgInput" type="file" dir="auto">
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--======= End Profile =======-->

  @endsection
@section('footer')
  <script src="{{asset('assets/website/js/pages/followProfile.js')}}"></script>

@endsection