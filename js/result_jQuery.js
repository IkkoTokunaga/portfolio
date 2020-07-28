$(function () {
  function Box0(box) {
    var pollCount = $("box").text().slice(0, -1);
    var w = 100 + Number(pollCount);
    $("box").css("width", w);
  }
});
