$(function () {
  //スムーズスクロール
  $('a[href^="#"]').click(function () {
    var adjust = -20;
    var speed = 500;
    var href = $(this).attr("href");
    var target = $(href == "#" || href == "" ? "html" : href);
    var position = target.offset().top + adjust;

    $("body").animate({ left: "0" }, 500); //三メニュの戻り

    $("body,html").animate({ scrollTop: position }, speed, "swing");
    return false;
  });

  //ITバック背景の動き
  var bgsc1 = 0;
  var bgsc2 = 0;
  setInterval(function () {
    bgsc1 += 0;
    bgsc2 += 1;
    $(".main_visual").css("background-position", bgsc1 + "px " + bgsc2 + "px");
  }, 20);

  //ふわっと表れて消えるメニュー
  var SubH1 = $(".sub_h1, .sub_menu");
  var Fadeposition = 400;
  var w = $(window).width();

  $(window).on("load scroll resize", function () {
    var w = $(window).width();
    if (w >= 900) {
      var TopPage = SubH1.offset().top;
      if (Fadeposition <= TopPage) {
        SubH1.fadeIn(2000);
      } else if (Fadeposition >= TopPage) {
        SubH1.fadeOut();
      }
    } else {
      $(".sub_menu").show();
    }
  });

  //ハンバーガー

  $(".sub_menu").on("click", function () {
    $(".hg_menu").animate({ right: "0" }, 500);
    $("body").animate({ left: "-100%" }, 500);
    $("body").addClass("body_before");
  });
  $(".close_btn").on("click", function () {
    $(".hg_menu").animate({ right: "-100%" }, 500);
    $("body").animate({ left: "0" }, 500);
    $("body").removeClass("body_before");
  });
  $(".hg_menu_a").on("click", function () {
    $(".hg_menu").animate({ right: "-100%" }, 500);
    // $("body").animate({ left: "0" }, 100);
    $("body").removeClass("body_before");
  });

  //ふわっと表示

  $(function () {
    $(window).scroll(function () {
      $(".fadein").each(function () {
        var targetElement = $(this).offset().top;
        var scroll = $(window).scrollTop();
        var windowHeight = $(window).height();
        if (scroll > targetElement - windowHeight + 100) {
          $(this).css("opacity", "1");
          $(this).css("transform", "translateX(0)");
        }
      });
    });
  });

  // setTimeout(rect()); //アニメーションを実行

  setInterval(function () {
    $(".deg_box")
      .animate(
        {
          top: "20%",
        },
        2000
      )
      .animate(
        {
          top: "23%",
        },
        2000
      );
  });

  $(".box").on("click", function () {
    $("#answer").val($(this).data("id"));
  });

  $(".footer_btn").on("click", function () {
    if ($("#answer").val() === "") {
      alert("選択してください！");
    } else {
      $("form").submit();
    }
  });

  $(".error").fadeOut(3000);


  //セレクト

  $('.box').on('click', function () {
    $('.box').removeClass('select');
    $(this).addClass('select');
  })
});
