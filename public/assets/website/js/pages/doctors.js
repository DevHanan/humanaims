(function () {
  "use strict";

  // Filter Active Class
  $(".doctorsContent .fixedFilter .filters .filter").click(function () {
    $(this).siblings().find("ul").removeClass("show");
    $(this).addClass("active").siblings().removeClass("active");
    if ($("body").hasClass("ltr")) {
      $(this).find(".cheveron").toggleClass("downLeft");
      $(this).siblings().find("a .cheveron").removeClass("downLeft");
    }
    if ($("body").hasClass("rtl")) {
      $(this).find(".cheveron").toggleClass("downRight");
      $(this).siblings().find("a .cheveron").removeClass("downRight");
    }
    $(this).siblings().find("ul li").removeClass("active");
  });
  // Filter Ul Active Class
  $(".doctorsContent .fixedFilter .filters .filter ul li").click(function (e) {
    e.stopPropagation();
    $(this).addClass("active").siblings().removeClass("active");
  });
})();
