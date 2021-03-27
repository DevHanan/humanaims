(function () {
  "use strict";
  $(".settings .account-settings-left .tabs li").on("click", function () {
    $(this)
      .removeClass("deactive")
      .addClass("active")
      .siblings()
      .removeClass("active")
      .addClass("deactive");
    $(".forms").css("display", "none");
    $("#account-" + $(this).data("tab")).css("display", "block");
  });

  // Open Inputs With Click
  // English Page
  $(".settings-page.ltr .btn-edit").on("click", function (e) {
    e.preventDefault();
    if ($(this).val() == "Edit") {
      $(this).val("Save");
      $(".settingsInput").prop("disabled", false);
    } else {
      $(this).val("Edit");
     setInterval(function(){ $(".settingsInput").prop("disabled", true);},4000);
    }
  });
  $(".settings-page.ltr .btn-edit-pass").on("click", function (e) {
    e.preventDefault();
    if ($(this).val() == "Edit") {
      $(this).val("Save");
      $(".passSettings").prop("disabled", false);
    } else {
      $(this).val("Edit");
      setInterval(function(){$(".passSettings").prop("disabled", true);},4000);
    }
  });
  $(".settings-page.ltr .btn-cancel").click(function (e) {
    e.preventDefault();
    setInterval(function(){$(".settingsInput").prop("disabled", true);},4000);
    $(".btn-edit").val("Edit");
  });

  // Arabic Page
  $(".settings-page.rtl .btn-edit").on("click", function (e) {
    e.preventDefault();
    if ($(this).val() == "تعديل") {
      $(this).val("حفظ");
      $(".settingsInput").prop("disabled", false);
    } else {
      $(this).val("تعديل");
      setInterval(function(){$(".settingsInput").prop("disabled", true);},4000);
    }
  });
  $(".settings-page.rtl .btn-edit-pass").on("click", function (e) {
    e.preventDefault();
    if ($(this).val() == "تعديل") {
      $(this).val("حفظ");
      $(".passSettings").prop("disabled", false);
    } else {
      $(this).val("تعديل");
      setInterval(function(){$(".passSettings").prop("disabled", true);},4000);
    }
  });
  $(".settings-page.rtl .btn-cancel").click(function (e) {
    e.preventDefault();
    setInterval(function(){$(".settingsInput").prop("disabled", true);},4000);
    $(".btn-edit").val("تعديل");
  });
  // Adding Upload Media Picture
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $("#image-tag").attr("src", e.target.result).css("display", "block");
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#upload-cv").change(function () {
    readURL(this);
  });

  // ****** Start Validation ******
  var confirmPassword = true,
    PasswordError = true,
    EmailError = true,
    userNameError = true;

  $('.settings-page.ltr .forms form input[name="UserName"]').keyup(function () {
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
  });
  $('.settings-page.ltr  form input[name="email"]').keyup(function () {
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
  $('.settings-page.ltr  form input[name="password"]').keyup(function () {
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
  });
  $('.settings-page.ltr  form input[name="confirmPassword"]').keyup(
    function () {
      if ($(this).val() !== $('.forms form input[name="password"]').val()) {
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
  $(".settings-page.ltr  form input[type='submit']").click(function (e) {
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

  $('.settings-page.rtl .forms form input[name="UserName"]').keyup(function () {
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
  });
  $('.settings-page.rtl .forms form input[name="email"]').keyup(function () {
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
  $('.settings-page.rtl .forms form input[name="password"]').keyup(function () {
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
  });
  $('.settings-page.rtl .forms form input[name="confirmPassword"]').keyup(
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
  $(".settings-page.rtl .forms form input[type='submit']").click(function (e) {
    $(".settings-page.rtl .forms form input").keyup();
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
