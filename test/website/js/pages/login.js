(function () {
  "use strict";
  $(
    ".login-page .login .left-box .box-content .form-one .toggle-password span"
  ).click(function () {
    $(this).toggleClass("eye eye-slash");
    let input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });

  // ****** Start Validation ******
  var PasswordError = true,
    EmailError = true;

  $('.login-page.ltr .box-content form input[name="email"]').keyup(function () {
    if ($(this).val().length == 0) {
      $(this).next().find("#errorMessage").text("Email Requierd");
      $(this).next().fadeIn();
      $(this).addClass("error").removeClass("validate");
      EmailError = true;
    } else {
      $(this).next().fadeOut();
      $(this).removeClass("error").addClass("validate");
      EmailError = false;
    }
  });
  $('.login-page.ltr .box-content form input[name="password"]').keyup(
    function () {
      if ($(this).val().length == 0) {
        $(this).next().find("#errorMessage").text("Password Requierd");
        $(this).next().fadeIn();
        $(this).addClass("error").removeClass("validate");
        PasswordError = true;
      } else if ($(this).val().length < 6) {
        $(this)
          .next()
          .find("#errorMessage")
          .html("password Must Be at least 6 chars");
        $(this).next().fadeIn();
        $(this).addClass("error").removeClass("validate");
        PasswordError = true;
      } else {
        $(this).next().fadeOut();
        $(this).removeClass("error").addClass("validate");
        PasswordError = false;
      }
    }
  );
  $(".login-page.ltr .box-content form input[type='submit']").click(function (
    e
  ) {
    $(".forms form input").keyup();
    if (
      userNameError == true ||
      EmailError == true ||
      PasswordError == true ||
      confirmPassword == true
    ) {
      e.preventDefault();
    }
  });

  $('.login-page.rtl .box-content form input[name="email"]').keyup(function () {
    if ($(this).val().length == 0) {
      $(this).next().find("#errorMessage").text("الايميل مطلوب");
      $(this).next().fadeIn();
      $(this).addClass("error").removeClass("validate");
      EmailError = true;
    } else {
      $(this).next().fadeOut();
      $(this).removeClass("error").addClass("validate");
      EmailError = false;
    }
  });
  $('.login-page.rtl .box-content form input[name="password"]').keyup(
    function () {
      if ($(this).val().length == 0) {
        $(this).next().find("#errorMessage").text("كلمة السر مطلوبة");
        $(this).next().fadeIn();
        $(this).addClass("error").removeClass("validate");
        PasswordError = true;
      } else if ($(this).val().length < 6) {
        $(this)
          .next()
          .find("#errorMessage")
          .html("كلمة السر يجب ان تكون اكثر من ستة احرف");
        $(this).next().fadeIn();
        $(this).addClass("error").removeClass("validate");
        PasswordError = true;
      } else {
        $(this).next().fadeOut();
        $(this).removeClass("error").addClass("validate");
        PasswordError = false;
      }
    }
  );
  $("#signIn").click(function (e) {
    $(".login-page.rtl .box-content form input").keyup();
    if (EmailError == true || PasswordError == true) {
      e.preventDefault();
    }
  });
  // ****** End Validation ******
})();
