$(window).scroll(function () {
  if ($(window).scrollTop() > 150) {
    $(".navContainer").addClass("navActive");
  } else {
    $(".navContainer").removeClass("navActive");
  }
});
