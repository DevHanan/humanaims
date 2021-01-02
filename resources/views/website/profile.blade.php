@extends('website.layouts.app')
@section('title'){!! __('front.Profile') !!}@endsection
@section('header') @endsection

@section('contentPage')
<body class="profile-body {!! app()->getLocale() == 'ar'?'rtl ':'ltr' !!}">
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

  <!--==== Upload Cover Popup ====-->
  <div class="uploadCover hidden">
    <div class="container">
      <form action="{{url('/edit-profile')}}" class="popup-body" method="POST" enctype="multipart/form-data" id="form_background">
        @csrf
        <button class="close-icon"><i class="fas fa-times"></i></button>
        <div class="img-review">
          <img id="reviewCover" class="review-img" src="" alt="Uploaded Image">
          <div class="uploadInput" action="#">
            <input id="coverInput" class="upload-input" type="file" dir="auto" name="background">
          </div>
        </div>
        <div class="upload-icon">
          <i class="fas fa-cloud-upload-alt"></i>
          <p class="mt-2 text-center">Drop filre Here Or <span>Browse</span> here</p>
        </div>
        <div class="save" action="#">
          <input class="saveButton" type="button" value="Save" dir="auto">
        </div>
      </form>
    </div>
  </div>
  <!-- Upload Image -->
  <div class="uploadImage hidden">
    <div class="container">
      <form action="{{url('/edit-profile')}}" class="popup-body" method="POST" enctype="multipart/form-data" id="form_image">
                @csrf

        <button class="close-icon"><i class="fas fa-times"></i></button>
        <div class="img-review">
          <img id="reviewImage" class="review-img crop" src="" alt="Uploaded Image">
          <div class="uploadInput" action="#">
            <input id="imageInput" class="upload-input" type="file" dir="auto" name="image">
          </div>
        </div>
        <div class="upload-icon">
          <i class="fas fa-cloud-upload-alt"></i>
          <p class="mt-2 text-center">Drop filre Here Or <span>Browse</span> here</p>
        </div>
        <div class="save" action="#">
          <input class="saveButtonTwo" type="button" value="Save" dir="auto">
          <input class="cropPic" type="button" value="Crop" dir="auto">
        </div>
      </form>
    </div>
  </div>
  <!-- Post PopUP -->
  <div class="popUp">
              @include('website.layouts.partials._modals')

  </div>
  <!--===== End Fixed Elements =====-->

  <!--======= Start Profile =======-->
  <section class="profile">
    <div class="container-fluid">
      <div class="row">
        <div class="profile-cover col-12 p-0">
          <div class="cover_img">
            <div class="overlay"></div>
             @if(auth()->user()->background)
            <img class="popupCoverImg" src="{{asset(auth()->user()->background)}}" alt="Profile Cover">
            @else
             <img class="popupCoverImg" src="{{asset('assets/website/images/profile/cover.jpg')}}" alt="Profile Cover">
            @endif
           
            <button class="edit"><i class="fas fa-camera"></i></button>
            <ul class="edit_menu text-center">
              <li class="edit-cover">{!! __('front.Edit') !!} <i class="fas fa-pen-square"></i></li>
              <li class="coverView">{!! __('front.View') !!} <i class="fas fa-images"></i></li>
            </ul>
          </div>
          <div class="profile_img">
            @if(auth()->user()->image)
            <img class="popupProfileImg" src="{{asset(auth()->user()->image)}}" alt="Profile Image">
            @else
            <img class="popupProfileImg" src="{{asset('assets/website/images/David-Beckham.jpg')}}" alt="Profile Image">
            @endif
            <img src="{{asset('assets/website/images/profile/bird-blue-circle.png')}}" alt="Bird Icon">
            <p>{{ auth()->user()->fullname}}</p>
            <button class="edit"><i class="fas fa-camera"></i></button>
            <ul class="edit_menu text-center">
              <li class="edit-img">{!! __('front.Edit') !!} <i class="fas fa-pen-square"></i></li>
              <li class="imageView">{!! __('front.View') !!} <i class="fas fa-images"></i></li>
            </ul>
          </div>
          <div class="profile_options col-12 p-0">
            <ul class="options">
              <li data-shuffle="diaries" class="active"><i class="fas fa-align-left"></i></li>
              <li data-shuffle="likes"><i class="fas fa-thumbs-up"></i></i></li>
              <li data-shuffle="comments"><i class="fas fa-comment-dots"></i></li>
              <li data-shuffle="favorite"><i class="fas fa-heart"></i></li>
              <li data-shuffle="follow"><i class="fas fa-user"></i></li>
            </ul>
            <form action="#">
              <input class="main-background white" type="button" value="Edit"  data-key="Edit" id="profile-edit" dir="auto">
              <input type="hidden" name="profilekey" id="profileKey" value="Edit">
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
        @include('website.layouts.partials._info')
      </div>

            <div class="col-xl-8 col-lg-9 col-12">
              <div class="diaries show" id="shuffle-diaries">
                <div class="row justify-content-center">
                  <div class="homeContent col-12">
                           @include('website.layouts.partials._subject_sec')

                    <div class="posts">
                        @foreach($ownSubjects as $subject)
                      <div class="post">
                        <div class="header">
                          <div class="row">
                            <div class="col-sm-9 col-9">
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
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
              <div class="likes hidden" id="shuffle-likes">
                <div class="post-cards">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="card">
                        <div class="post-details">
                          <div class="post_images">
                            <img src="{{asset('assets/website/images/David-Beckham.jpg')}}" alt="Profile Image">
                            <img src="{{asset('assets/website/images/profile/bird-blue-circle.png')}}" alt="Bird Icon">
                          </div>
                          <div class="date-name">
                            <a href="#">Mohamed Ahmed</a>
                            <p class="date">
                              <i class="far fa-clock"></i>
                              <span>A minute ago</span>
                            </p>
                          </div>
                        </div>
                        <div class="post-content">
                          <img src="{{asset('assets/website/images/profile/gril.jpg')}}" alt="Post Image">
                        </div>
                        <div class="post-icons">
                          <ul class="right-icons">
                            <li class="active">
                              <i class="fas fa-thumbs-up"></i>
                              <span>20</span>
                            </li>
                            <li>
                              <i class="fas fa-thumbs-down"></i>
                              <span>25</span>
                            </li>
                            <li>
                              <i class="openComment fas fa-comment-dots"></i></i>
                              <span>5</span>
                            </li>
                          </ul>
                          <ul class="left-icons">
                            <li class="m-auto">
                              <i class="fas fa-share-alt"></i>
                            </li>
                            <li>
                              <i class="fas fa-eye"></i>
                              <span class="main-color font-weight-bold">4752</span>
                            </li>
                          </ul>
                        </div>
                        <div class="toggleCommnetsArea scroller hidden">
                          <div class="comments">
                            <div class="comment mt-3">
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
                                    <i class="commentLike fas fa-heart"></i>
                                    <i class="fas fa-exclamation-circle"></i>
                                  </div>
                                </div>
                              </div>
                              <div class="commentContent">
                                <div class="text" dir="auto">
                                  <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsam.</p>
                                </div>
                                <div class="reply">
                                  <i class="fas fa-camera"></i>
                                  <i class="fas fa-comments"></i>
                                </div>
                                <div class="replyToComment mt-2 ml-0 mr-0">
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
                            <div class="comment mt-3">
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
                                    <i class="commentLike fas fa-heart"></i>
                                    <i class="fas fa-exclamation-circle"></i>
                                  </div>
                                </div>
                              </div>
                              <div class="commentContent">
                                <div class="text" dir="auto">
                                  <p class="readMore">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Tenetur
                                    sunt
                                    corporis
                                    repellat
                                    consequuntur aperiam eveniet placeat ea recusandae aliquid<span
                                      class="dots">...</span><span class="more">Non corporis, quo quod rem, omnis,
                                      vitae
                                      hic
                                      voluptatibus distinctio dolores
                                      quas in cum qui! Dolorem ipsam iste qui sapiente. Dolorem libero accusantium,
                                      repellat
                                      quidem ratione, quaerat earum ad dolor magni architecto obcaecati nesciunt
                                      odio
                                      itaque,
                                      perferendis aut vitae iusto. Explicabo, et officiis! Culpa consequuntur, aut
                                      quam
                                      exercitationem necessitatibus inventore adipisci velit assumenda enim
                                      aspernatur
                                      magni
                                      nihil
                                      cum, corrupti obcaecati quo eius at quod. Quidem quas qui natus ex? Voluptas
                                      doloribus
                                      dolor, eum repellat impedit atque aliquid? Voluptatem iure suscipit
                                      illo.</span><button type="button" class="read">Read More</button></p>
                                </div>
                                <div class="reply">
                                  <i class="fas fa-camera"></i>
                                  <i class="activity fas fa-comments"></i>
                                </div>
                                <div class="replyToComment mt-2 ml-0 mr-0">
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
                        </div>
                      </div> <!-- Card -->
                      <div class="card">
                        <div class="post-details">
                          <div class="post_images">
                            <img src="{{asset('assets/website/images/David-Beckham.jpg')}}" alt="Profile Image">
                            <img src="{{asset('assets/website/images/profile/bird-blue-circle.png')}}" alt="Bird Icon">
                          </div>
                          <div class="date-name">
                            <a href="#">Mohamed Ahmed</a>
                            <p class="date">
                              <i class="far fa-clock"></i>
                              <span>A minute ago</span>
                            </p>
                          </div>
                        </div>
                        <div class="post-content">
                          <img src="{{asset('assets/website/images/profile/gril.jpg')}}" alt="Post Image">
                        </div>
                        <div class="post-icons">
                          <ul class="right-icons">
                            <li class="active">
                              <i class="fas fa-thumbs-up"></i>
                              <span>20</span>
                            </li>
                            <li>
                              <i class="fas fa-thumbs-down"></i>
                              <span>25</span>
                            </li>
                            <li>
                              <i class="openComment fas fa-comment-dots"></i></i>
                              <span>5</span>
                            </li>
                          </ul>
                          <ul class="left-icons">
                            <li class="m-auto">
                              <i class="fas fa-share-alt"></i>
                            </li>
                            <li>
                              <i class="fas fa-eye"></i>
                              <span class="main-color font-weight-bold">4752</span>
                            </li>
                          </ul>
                        </div>
                        <div class="toggleCommnetsArea scroller hidden">
                          <div class="comments">
                            <div class="comment mt-3">
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
                                    <i class="commentLike fas fa-heart"></i>
                                    <i class="fas fa-exclamation-circle"></i>
                                  </div>
                                </div>
                              </div>
                              <div class="commentContent">
                                <div class="text" dir="auto">
                                  <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsam.</p>
                                </div>
                                <div class="reply">
                                  <i class="fas fa-camera"></i>
                                  <i class="fas fa-comments"></i>
                                </div>
                                <div class="replyToComment mt-2 ml-0 mr-0">
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
                            <div class="comment mt-3">
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
                                    <i class="commentLike fas fa-heart"></i>
                                    <i class="fas fa-exclamation-circle"></i>
                                  </div>
                                </div>
                              </div>
                              <div class="commentContent">
                                <div class="text" dir="auto">
                                  <p class="readMore">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Tenetur
                                    sunt
                                    corporis
                                    repellat
                                    consequuntur aperiam eveniet placeat ea recusandae aliquid<span
                                      class="dots">...</span><span class="more">Non corporis, quo quod rem, omnis,
                                      vitae
                                      hic
                                      voluptatibus distinctio dolores
                                      quas in cum qui! Dolorem ipsam iste qui sapiente. Dolorem libero accusantium,
                                      repellat
                                      quidem ratione, quaerat earum ad dolor magni architecto obcaecati nesciunt
                                      odio
                                      itaque,
                                      perferendis aut vitae iusto. Explicabo, et officiis! Culpa consequuntur, aut
                                      quam
                                      exercitationem necessitatibus inventore adipisci velit assumenda enim
                                      aspernatur
                                      magni
                                      nihil
                                      cum, corrupti obcaecati quo eius at quod. Quidem quas qui natus ex? Voluptas
                                      doloribus
                                      dolor, eum repellat impedit atque aliquid? Voluptatem iure suscipit
                                      illo.</span><button type="button" class="read">Read More</button></p>
                                </div>
                                <div class="reply">
                                  <i class="fas fa-camera"></i>
                                  <i class="activity fas fa-comments"></i>
                                </div>
                                <div class="replyToComment mt-2 ml-0 mr-0">
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
                        </div>
                      </div> <!-- Card -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="comments-section hidden" id="shuffle-comments">
                <p class="noActivitiy">There are no comments</p>
              </div>
              <div class="favorite hidden" id="shuffle-favorite">
                <p class="noActivitiy">There are no favourites</p>
              </div>
              <div class="follow hidden" id="shuffle-follow">
                <aside class="follow-bar mb-3">
                  <ul class="follow-tab">
                    <li class="active" data-tab="followed">Followed</li>
                    <li>|</li>
                    <li data-tab="followers">Followers</li>
                  </ul>
                  <ul class="follow-numbers">
                    <li class="d-sm-block d-none" id="tabName">Followed</li>
                    <li>(1541)</li>
                  </ul>
                </aside>
                <div class="followCards">
                  <div class="followed" id="tab-followed">
                    <div class="row">
                      <div class="col-md-6 col-lg-4">
                        <div class="user-card">
                          <figure>
                            <img src="{{asset('assets/website/images/profile/cover-2.jpg')}}" alt="User Profile Cover">
                            <figcaption><img src="{{asset('assets/website/images/profile/girl-2.jpg')}}" alt="User Profile Image"></figcaption>
                          </figure>
                          <div class="info">
                            <h4 class="text-center mt-4">Alyssa Teboda</h4>
                            <form class="mt-4" action="#">
                              <a href="followProfile.html">Show Profile</a>
                              <input class="followButton" type="button" value="Unfollow">
                            </form>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-4">
                        <div class="user-card">
                          <figure>
                            <img src="{{asset('assets/website/images/profile/cover-2.jpg')}}" alt="User Profile Cover">
                            <figcaption><img src="{{asset('assets/website/images/profile/girl-2.jpg')}}" alt="User Profile Image"></figcaption>
                          </figure>
                          <div class="info">
                            <h4 class="text-center mt-4">Alyssa Teboda</h4>
                            <form class="mt-4" action="#">
                              <a href="followProfile.html">Show Profile</a>
                              <input class="followButton" type="button" value="Unfollow">
                            </form>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-4">
                        <div class="user-card">
                          <figure>
                            <img src="{{asset('assets/website/images/profile/cover-2.jpg')}}" alt="User Profile Cover">
                            <figcaption><img src="{{asset('assets/website/images/profile/girl-2.jpg')}}" alt="User Profile Image"></figcaption>
                          </figure>
                          <div class="info">
                            <h4 class="text-center mt-4">Alyssa Teboda</h4>
                            <form class="mt-4" action="#">
                              <a href="followProfile.html">Show Profile</a>
                              <input class="followButton" type="button" value="Unfollow">
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="followers hidden" id="tab-followers">
                    <div class="row">
                      <div class="col-md-6 col-lg-4">
                        <div class="user-card">
                          <figure>
                            <img src="{{asset('assets/website/images/profile/cover-2.jpg')}}" alt="User Profile Cover">
                            <figcaption><img src="{{asset('assets/website/images/profile/girl-2.jpg')}}" alt="User Profile Image"></figcaption>
                          </figure>
                          <div class="info">
                            <h4 class="text-center mt-4">Alyssa Teboda</h4>
                            <form class="mt-4" action="#">
                              <a href="followProfile.html">Show Profile</a>
                              <input class="followersButton" type="button" value="Follow">
                            </form>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-4">
                        <div class="user-card">
                          <figure>
                            <img src="{{asset('assets/website/images/profile/cover-2.jpg')}}" alt="User Profile Cover">
                            <figcaption><img src="{{asset('assets/website/images/profile/girl-2.jpg')}}" alt="User Profile Image"></figcaption>
                          </figure>
                          <div class="info">
                            <h4 class="text-center mt-4">Alyssa Teboda</h4>
                            <form class="mt-4" action="#">
                              <a href="followProfile.html">Show Profile</a>
                              <input class="followersButton" type="button" value="Follow">
                            </form>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-4">
                        <div class="user-card">
                          <figure>
                            <img src="{{asset('assets/website/images/profile/cover-2.jpg')}}" alt="User Profile Cover">
                            <figcaption><img src="{{asset('assets/website/images/profile/girl-2.jpg')}}" alt="User Profile Image"></figcaption>
                          </figure>
                          <div class="info">
                            <h4 class="text-center mt-4">Alyssa Teboda</h4>
                            <form class="mt-4" action="#">
                              <a href="followProfile.html">Show Profile</a>
                              <input class="followersButton" type="button" value="Follow">
                            </form>
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
  @endsection
  <!--======= End Profile =======-->

 
  @section('footer')

  <script src="{{asset('assets/website/js/pages/profile.js')}}"></script>
  <script type="text/javascript">
    $(document).ready(function() {

    $("#profile-edit").on("click", function () {
    if ($(this).val() == "Edit") {
      $("#form_background").submit();
           $("#form_image").submit();
    } 
  });
       
    });
</script>


@endsection