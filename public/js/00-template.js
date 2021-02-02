$(document).ready(function () {
  $("#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4").click(function () {
    $(this).toggleClass("open");

    var test = $("#navlinks").hasClass("active");
    console.log(test);
    // var p_class = $("nav_right_link_box").attr("class");
    if ($("#navlinks").hasClass("active") === true) {
      $("#navlinks").removeClass("active");
      $("#shadow").removeClass("active");

    } else {
      $("#navlinks").addClass("active");
      $("#shadow").addClass("active");


    }

  });

  $("#lang").mouseover(function () {
    $("#eng").addClass("active");
  });
  $("#lang").mouseout(function () {
    $("#eng").removeClass("active");
  });

  // console.log($(".nav_link"));
  $(".nav_link_1")
    .mouseover(function () {
      $(".eff_1").addClass("fas fa-chevron-right");
    })
    .mouseout(function () {
      $(".eff_1").removeClass("fas fa-chevron-right");
    });
  $(".nav_link_2")
    .mouseover(function () {
      $(".eff_2").addClass("fas fa-chevron-right");
    })
    .mouseout(function () {
      $(".eff_2").removeClass("fas fa-chevron-right");
    });
  $(".nav_link_3")
    .mouseover(function () {
      $(".eff_3").addClass("fas fa-chevron-right");
    })
    .mouseout(function () {
      $(".eff_3").removeClass("fas fa-chevron-right");
    });
});

// var link = document.querySelectorAll('.nav_link')

// link.forEach(element => {
//   link.innerHTML

// });
