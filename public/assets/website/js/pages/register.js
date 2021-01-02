(function () {
  "use strict";
  $(".register .left-box .box-content .form-one .toggle-password span").click(
    function () {
      $(this).toggleClass("eye eye-slash");
      let input = $($(this).attr("toggle"));
      if (input.attr("type") == "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }
    }
  );

  // ****** Start Validation ******
  var confirmPassword = true,
    PasswordError = true,
    EmailError = true,
    userNameError = true;

  $('.ltr .left-box .box-content form input[name="UserName"]').keyup(
    function () {
      if ($(this).val().length == 0) {
        $(this).next().find("#errorMessage").text("the name Requierd");
        $(this).next().fadeIn();
        $(this).addClass("error").removeClass("validate");
        nameError = true;
      } else if ($(this).val().length < 3) {
        $(this)
          .next()
          .find("#errorMessage")
          .text("the name Must Be at least 3 chars");
        $(this).next().fadeIn();
        $(this).addClass("error").removeClass("validate");
        nameError = true;
      } else {
        $(this).next().fadeOut();
        $(this).removeClass("error").addClass("validate");
        nameError = false;
      }
    }
  );
  $('.ltr .left-box .box-content form input[name="email"]').keyup(function () {
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
  $('.ltr .left-box .box-content form input[name="password"]').keyup(
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
  $('.ltr .left-box .box-content form input[name="confirmPassword"]').keyup(
    function () {
      if (
        $(this).val() !==
        $('.ltr .left-box .box-content form input[name="password"]').val()
      ) {
        $(this).next().text("Password Dosn't Match");
        $(this).next().fadeIn();
        $(this).addClass("error").removeClass("validate");
        confirmPassword = true;
      } else {
        $(this).next().fadeOut();
        $(this).removeClass("error").addClass("validate");
        confirmPassword = false;
      }
    }
  );
  $(".ltr .left-box .box-content form input[type='submit']").click(function (
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

  $('.rtl .left-box .box-content form input[name="UserName"]').keyup(
    function () {
      if ($(this).val().length == 0) {
        $(this).next().find("#errorMessage").text("الأسم مطلوب");
        $(this).next().fadeIn();
        $(this).addClass("error").removeClass("validate");
        nameError = true;
      } else if ($(this).val().length < 3) {
        $(this)
          .next()
          .find("#errorMessage")
          .text("يجب ان يكون الاسم أكثر من 3 حروف");
        $(this).next().fadeIn();
        $(this).addClass("error").removeClass("validate");
        nameError = true;
      } else {
        $(this).next().fadeOut();
        $(this).removeClass("error").addClass("validate");
        nameError = false;
      }
    }
  );
  $('.rtl .left-box .box-content form input[name="email"]').keyup(function () {
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
  $('.rtl .left-box .box-content form input[name="password"]').keyup(
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
          .html("كلمة السر يجب ان تكون اكثر من ستة أحرف");
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
  $('.rtl .left-box .box-content form input[name="confirmPassword"]').keyup(
    function () {
      if ($(this).val() !== $('.forms form input[name="password"]').val()) {
        $(this).next().text("كلمة السر غير متطابقة");
        $(this).next().fadeIn();
        $(this).addClass("error").removeClass("validate");
        confirmPassword = true;
      } else {
        $(this).next().fadeOut();
        $(this).removeClass("error").addClass("validate");
        confirmPassword = false;
      }
    }
  );
  $(".rtl .left-box .box-content form input[type='submit']").click(function (
    e
  ) {
    $(".rtl .left-box .box-content form input").keyup();
    if (
      userNameError == true ||
      EmailError == true ||
      PasswordError == true ||
      confirmPassword == true
    ) {
      e.preventDefault();
    }
  });
  // ****** End Validation ******
})();
