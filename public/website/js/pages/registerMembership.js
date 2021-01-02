// Change Date
$("#dateSelector").change(function () {
  "use strict";
  $(".dateValue").text($("#dateSelector").val());
});

// Adding Class Active To MemberShip
$(".btn-choose").on("click", function () {
  "use strict";
  $(this).parent().addClass("active").siblings().removeClass("active");
});
