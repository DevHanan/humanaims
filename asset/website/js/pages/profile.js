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

  // Profile Content Tabs
  $(".profile .profile-cover .profile_options .options li").on(
    "click",
    function () {
      $(this).addClass("active").siblings().removeClass("active");
      $("#shuffle-" + $(this).data("shuffle"))
        .removeClass("hidden")
        .addClass("show")
        .siblings()
        .removeClass("show")
        .addClass("hidden");
    }
  );

  // profile Edit Button
  $("#profile-edit").on("click", function () {
    if ($(this).val() == "Edit") {
      $(this).val("Save");
      $(".profile .edit").css("display", "block");
    } else {
      $(this).val("Edit");
      $(".profile .edit").css("display", "none");
    }
  });

  $(".rtl #profile-editRtl").on("click", function () {
    if ($(this).val() == "تعديل") {
      $(this).val("حفظ");
      $(".profile .edit").css("display", "block");
    } else {
      $(this).val("تعديل");
      $(".profile .edit").css("display", "none");
    }
  });
  // Edit & View Menu
  $(".profile .profile-cover .edit").on("click", function () {
    $(this).parent().find(".edit_menu").toggleClass("show_list");
  });
  $("body, .saveButton, .saveButtonTwo, .close-icon").click(function () {
    $(".edit_menu").removeClass("show_list");
  });
  $(".edit, .popup-body, .edit_menu").click(function (e) {
    e.stopPropagation();
  });

  //================
  // Start pops up
  // ===============
  let coverPopup = $(".uploadCover"),
    imagePopup = $(".uploadImage"),
    coverImageReview = $("#reviewCover"),
    profileImageReview = $("#reviewImage"),
    changedCoverImage = $(".popupCoverImg"),
    changedProfileImage = $(".popupProfileImg");

  // Upload Image PopUP
  $(".close-icon, body").click(function () {
    $(".uploadCover, .uploadImage").addClass("hidden");
  });
  $(".edit-cover").on("click", function () {
    coverPopup.removeClass("hidden");
  });
  $(".edit-img").on("click", function () {
    imagePopup.removeClass("hidden");
  });

  // View Picture After Upload
  function reviewCover(input) {
    if (input.files && input.files[0]) {
      let reader = new FileReader();

      reader.onload = function (e) {
        coverImageReview
          .attr("src", e.target.result)
          .removeClass("hidden")
          .fadeIn();
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#coverInput").change(function () {
    reviewCover(this);
  });

  function reviewImage(inputTwo) {
    if (inputTwo.files && inputTwo.files[0]) {
      let readerTwo = new FileReader();

      readerTwo.onload = function (e) {
        profileImageReview
          .attr("src", e.target.result)
          .removeClass("hidden")
          .fadeIn();
      };
      readerTwo.readAsDataURL(inputTwo.files[0]);
    }
  }
  $("#imageInput").change(function () {
    reviewImage(this);
  });

  // Link reviewed Image with Pofile Image
  $(".saveButton").on("click", function () {
    coverPopup.addClass("hidden");
    if (!coverImageReview.attr("src") == "") {
      changedCoverImage.attr("src", coverImageReview.attr("src"));
    }
  });

  $(".saveButtonTwo").on("click", function () {
    imagePopup.addClass("hidden");
    if (!profileImageReview.attr("src") == "") {
      changedProfileImage.attr("src", profileImageReview.attr("src"));
    }
  });

  // PopUP Image
  let poppedUpImg = $(".poppedUpImg");

  $(".coverView").on("click", function () {
    poppedUpImg.attr("src", "");
    poppedUpImg.attr("src", changedCoverImage.attr("src"));
  });
  $(".imageView").on("click", function () {
    poppedUpImg.attr("src", "");
    poppedUpImg.attr("src", changedProfileImage.attr("src"));
  });

  $(".coverView, .imageView").on("click", function () {
    $(".popup-img").css("display", "flex");
  });
  $(".popup-img .popup-wrapper .fa-times").click(function () {
    $(this).parent().parent().css("display", "none");
  });
  $(".popup-img").click(function () {
    $(this).css("display", "none");
  });

  poppedUpImg.click(function (e) {
    e.stopPropagation();
  });

  // Start Diaries

  // Psot PopUP
  $(".profile .wrightAPost").click(function (e) {
    e.stopPropagation();
    $(".popUp").addClass("active");
  });
  $(".profile .wrightAPost .flexSttuf > span").click(function () {
    $($(this).data("iden")).parent().parent().find("input").click();
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

  // Follow Section
  $(".follow .follow-tab li").click(function () {
    $(this).addClass("active").siblings().removeClass("active");
    $("#tab-" + $(this).data("tab"))
      .removeClass("hidden")
      .addClass("show")
      .siblings()
      .removeClass("show")
      .addClass("hidden");
    $("#tabName").text($(this).text());
  });

  $(".profile-body.ltr .followButton").on("click", function () {
    if ($(this).val() == "Unfollow") {
      $(this).val("Follow").addClass("unfollowed");
    } else {
      $(this).val("Unfollow").removeClass("unfollowed");
    }
  });

  $(".profile-body.rtl .followButton").on("click", function () {
    if ($(this).val() == "إلغاء المتابعة") {
      $(this).val("متابعة").addClass("unfollowed");
    } else {
      $(this).val("إلغاء المتابعة").removeClass("unfollowed");
    }
  });

  $(".profile-body.ltr .followersButton").on("click", function () {
    if ($(this).val() == "Follow") {
      $(this).val("Unfollow").addClass("unfollowed");
    } else {
      $(this).val("Follow").removeClass("unfollowed");
    }
  });

  $(".profile-body.rtl .followersButton").on("click", function () {
    if ($(this).val() == "متابعة") {
      $(this).val("إلغاء المتابعة").addClass("followed");
    } else {
      $(this).val("متابعة").removeClass("followed");
    }
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

  // Start Activity Log
  $(".post-cards .card .post-icons .right-icons li:not(:last-of-type)").click(
    function () {
      $(this).addClass("active").siblings().removeClass("active");
    }
  );
  $(".post-cards .card .post-icons .right-icons li:last-of-type").click(
    function () {
      $(this).toggleClass("opened");
    }
  );
  $(
    ".profile .profile-content .post-cards .card .post-icons li .openComment"
  ).click(function () {
    $(this)
      .parent()
      .parent()
      .parent()
      .parent()
      .toggleClass("noRadius")
      .find(".toggleCommnetsArea")
      .toggleClass("hidden");
  });
})();
