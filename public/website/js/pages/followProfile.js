(function () {
  "use strict";
  // Emoji
  $(function () {
    window.emojiPicker = new EmojiPicker({
      emojiable_selector: "[data-emojiable=true]",
      assetsPath: "../lib/img/",
      popupButtonClasses: "fa fa-smile-o",
    });
    window.emojiPicker.discover();
  });
  // Google Analytics
  (function (i, s, o, g, r, a, m) {
    i["GoogleAnalyticsObject"] = r;
    (i[r] =
      i[r] ||
      function () {
        (i[r].q = i[r].q || []).push(arguments);
      }),
      (i[r].l = 1 * new Date());
    (a = s.createElement(o)), (m = s.getElementsByTagName(o)[0]);
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m);
  })(
    window,
    document,
    "script",
    "//www.google-analytics.com/analytics.js",
    "ga"
  );
  ga("create", "UA-49610253-3", "auto");
  ga("send", "pageview");
  // End Emojy

  // Follow Button
  let profileFollowButton = document.getElementById("followProfile");
  profileFollowButton.onclick = function () {
    if (this.value == "Follow") {
      this.value = "Followed";
      this.classList.add("followed");
    } else {
      this.value = "Follow";
      this.classList.remove("followed");
    }
  };
  if (document.body.classList.contains("rtl")) {
    profileFollowButton.onclick = function () {
      if (this.value == "تابع") {
        this.value = "متابع";
        this.classList.add("followed");
      } else {
        this.value = "تابع";
        this.classList.remove("followed");
      }
    };
  }

  // Image Review
  let coverClickElement = document.querySelector(".cover_img .overlay"),
    coverImage = document.querySelector(".popupCoverImg"),
    profileClickElement = document.querySelector(".profile_img"),
    profileImage = document.querySelector(".popupProfileImg"),
    popupElement = document.querySelector(".popup-img"),
    popupImage = document.querySelector(".poppedUpImg"),
    popupCloseButton = document.querySelector(".fa-times");

  coverClickElement.onclick = function () {
    popupElement.style.display = "block";
    popupImage.setAttribute("src", coverImage.src);
  };
  profileClickElement.onclick = function () {
    popupElement.style.display = "block";
    popupImage.setAttribute("src", profileImage.src);
  };
  popupCloseButton.onclick = function () {
    popupElement.style.display = "none";
  };
  popupElement.onclick = function () {
    popupElement.style.display = "none";
  };
  popupImage.onclick = function (event) {
    event.stopPropagation();
  };

  // Start Diaries
  // Psot PopUP
  $(".profile .wrightAPost input").click(function (e) {
    e.stopPropagation();
    $(".popUp").addClass("active");
  });

  let typePost = $(".wrightPostFromButtom");
  typePost.click(function (e) {
    e.stopPropagation();
    $(".popUp").addClass("active");
  });
  $(window).scroll(function () {
    if ($(window).scrollTop() >= 1000) {
      typePost.css("display", "flex");
    } else {
      typePost.css("display", "none");
    }
  });

  $("body").click(function () {
    $(".popUp").removeClass("active");
  });
  $(".popUp .postPopUp").click(function (e) {
    e.stopPropagation();
  });
  $(".popUp .postPopUp .popUpHeader .popUpClose").click(function () {
    $(".popUp").removeClass("active");
  });

  // post uplode Image
  let wrightPostImage = $(".popUpUplodeImage");
  let wrightPostInputImage = $(".popUpinputUplodeImage");
  function postUplodeImage(input) {
    if (input.files && input.files[0]) {
      let reader = new FileReader();

      reader.onload = function (e) {
        wrightPostImage.attr("src", e.target.result);
        wrightPostInputImage
          .parent()
          .parent()
          .parent()
          .find(".header .postUplode")
          .css("display", "block");
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
  wrightPostInputImage.change(function () {
    postUplodeImage(this);
  });

  //Read More Buttom
  $(".ltr .read").on("click", function () {
    if ($(this).prev().hasClass("more")) {
      $(this).prev().removeClass("more");
      $(this).prev().prev().css("display", "none");
      $(this).text("Read Less");
    } else {
      $(this).prev().addClass("more");
      $(this).prev().prev().css("display", "inline");
      $(this).text("Read More");
    }
  });
  /******/
  $(".rtl .read").on("click", function () {
    if ($(this).prev().hasClass("more")) {
      $(this).prev().removeClass("more");
      $(this).prev().prev().css("display", "none");
      $(this).text("قرآءة أقل");
    } else {
      $(this).prev().addClass("more");
      $(this).prev().prev().css("display", "inline");
      $(this).text("قرآءة المزيد");
    }
  });

  // Start Post love Active

  $(".profile-content .post .icons .fa-heart").click(function () {
    $(this).toggleClass("active");
  });

  $(".commentLike").click(function () {
    $(this).toggleClass("active");
  });

  $(".profile-body.ltr .profile-content .imageName button").click(function () {
    $(this).toggleClass("followed");
    if ($(this).hasClass("followed")) {
      $(this).text("Followed");
    } else {
      $(this).text("Follow");
    }
  });

  $(".profile-body.rtl .profile-content .imageName button").click(function () {
    $(this).toggleClass("followed");
    if ($(this).hasClass("followed")) {
      $(this).text("متابع");
    } else {
      $(this).text("تابع");
    }
  });

  // Post Toggle Reply-Comment
  $(".profile .post .comment .reply .activity").click(function () {
    $(this).parent().parent().find(".replyToComment").toggleClass("active");
  });

  $(
    ".toggleCommnetsArea .comments .comment .commentContent .reply i:last-child"
  ).click(function () {
    $(this)
      .parent()
      .parent()
      .parent()
      .find(".replyToComment")
      .toggleClass("active");
  });

  // Start Post Like Active
  $(".profile .post .footer .l_icons i:not(:last-of-type)").click(function () {
    $(this).toggleClass("active").siblings().removeClass("active");
  });

  // Post toogle Comments
  $(".profile .post .footer i:last-child").click(function () {
    $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .parent()
      .find(".toggleCommnetsArea")
      .toggleClass("hidden");
  });

  // Uplode reply Post
  let wrightCommentImage = $(".uplodeImg");
  let replyCommentInput = $(".imgInput");
  function replyToComment(input) {
    if (input.files && input.files[0]) {
      let reader = new FileReader();

      reader.onload = function (e) {
        wrightCommentImage.attr("src", e.target.result);
        wrightCommentImage.parent().css("display", "flex");
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
  replyCommentInput.change(function () {
    replyToComment(this);
  });

  // Start Custom Video
  let playerOne = videojs("videoOne", {
    html5: {
      nativeTextTracks: true,
    },
    controlBar: {
      volumePanel: { inline: false },
    },
    textTrackSettings: true,
    aspectRatio: "21:9",
  });

  // YouTube Start & Pause Button Animation
  if ($(window).width() >= 992) {
    $(".video-js").on("click", function () {
      $(this).find(".vjs-big-play-button").css("background-color", "unset");
      if ($(this).hasClass("vjs-paused")) {
        $(this)
          .find(".vjs-big-play-button")
          .css("display", "flex")
          .find(".vjs-icon-placeholder")
          .removeClass("playAnimationPaused")
          .addClass("playAnimationPlay")
          .parent()
          .fadeOut(300);
      } else if ($(this).hasClass("vjs-playing")) {
        $(this)
          .find(".vjs-big-play-button")
          .css("display", "flex")
          .find(".vjs-icon-placeholder")
          .removeClass("playAnimationPlay")
          .addClass("playAnimationPaused")
          .parent()
          .fadeOut(300);
      }
    });

    $(".video-js .vjs-control-bar .vjs-play-control").on("click", function () {
      if ($(this).parent().parent().hasClass("vjs-paused")) {
        $(this)
          .parent()
          .parent()
          .find(".vjs-big-play-button")
          .css("display", "flex")
          .find(".vjs-icon-placeholder")
          .removeClass("playAnimationPaused")
          .addClass("playAnimationPlay")
          .parent()
          .fadeOut(300);
      } else if ($(this).parent().parent().hasClass("vjs-playing")) {
        $(this)
          .parent()
          .parent()
          .find(".vjs-big-play-button")
          .css("display", "flex")
          .find(".vjs-icon-placeholder")
          .removeClass("playAnimationPlay")
          .addClass("playAnimationPaused")
          .parent()
          .fadeOut(300);
      }
    });
  }
  if ($(window).width() <= 991) {
    $(".video-js").on("touchstart", function () {
      $(this)
        .find(".vjs-big-play-button")
        .css("background-color", "unset")
        .css("display", "flex")
        .find(".vjs-icon-placeholder")
        .addClass("playAnimationPaused");
      if ($(this).hasClass("vjs-paused")) {
        $(this).find(".vjs-big-play-button").fadeOut(500);
      } else {
        $(".vjs-big-play-button").addClass("hidden");
      }
    });
  }
  $(".video-js .vjs-control-bar").click(function (e) {
    e.stopPropagation();
  });
})();
