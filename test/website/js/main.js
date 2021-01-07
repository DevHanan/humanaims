(function () {
  "use strict";

  // Start trigger wow.js
  if ($(window).width() >= 992) {
    // Trigger Wow.js
    // new WOW().init();
  }
  // ScrollUp Button
  let scrollUp = $(".scrollUp");
  $(window).scroll(function () {
    if ($(window).scrollTop() >= 1000) {
      scrollUp.fadeIn();
    } else {
      scrollUp.fadeOut();
    }
  });
  scrollUp.click(function (e) {
    e.preventDefault();
    $("html, body").animate(
      {
        scrollTop: 0,
      },
      1000
    );
  });
  // End ScrollToTop & down

  // Start Loading page
  $(window).on("load", function () {
    $(".loading").fadeOut();
  });
  // End Loading page
  // ******* Start Navbar *******
  if (!$("body").hasClass("noNavBar")) {
    $("body").css("padding-top", $(".navContainer").innerHeight());
  }
  // uppernav
  $(".navContainer .uppernav .language span.en").click(function () {
    $(".navContainer .uppernav .language span.ball")
      .removeClass("Arabic")
      .addClass("English");
  });
  $(".navContainer .uppernav .language span.ar").click(function () {
    $(".navContainer .uppernav .language span.ball")
      .removeClass("English")
      .addClass("Arabic");
  });
  // myNav
  if (
    $("body").hasClass("homePage") ||
    $("body").hasClass("homeRtl") ||
    $("body").hasClass("homeRtl") ||
    $("body").hasClass("profile-body")
  ) {
    $(".linksInNavBar").addClass("active");
  }

  if ($("body").hasClass("homePage") || $("body").hasClass("homeRtl")) {
    $("#homeLink").addClass("active");
  } else if (
    $("body").hasClass("doctorsPage") ||
    $("body").hasClass("doctorsRtl")
  ) {
    $("#doctorsLink").addClass("active");
  } else if (
    $("body").hasClass("usersPage") ||
    $("body").hasClass("usersRtl")
  ) {
    $("#usersLink").addClass("active");
  }

  $(".navContainer .myNav .navigators li").click(function (e) {
    e.stopPropagation();
    $(this).siblings().find(".myDropDown").hide();
    $(this)
      .find(".myDropDown")
      .toggle()
      .parent()
      .siblings()
      .find(".myDropDown")
      .hide();
  });
  $(".navContainer .myNav .navigators li .myDropDown").click(function (e) {
    e.stopPropagation();
  });
  $("body").click(function () {
    $(".navContainer .myNav .navigators li .myDropDown").hide();
  });
  /****************/
  $(".navContainer .myNav .profile .image,.profileContent").click(function (e) {
    e.stopPropagation();
    $(".navContainer .myNav .profile .profileDropdown").toggle();
  });
  $(".navContainer .myNav .profile .profileDropdown").click(function (e) {
    e.stopPropagation();
  });
  $("body").click(function () {
    $(".navContainer .myNav .profile .profileDropdown").hide();
  });
  // ******* End Navbar *******
})();
