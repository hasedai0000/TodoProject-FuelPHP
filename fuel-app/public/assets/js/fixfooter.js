$(function () {
  // フッターを最下部に固定
  let $footer = $("#footer");
  if (window.innerHeight > $footer.offset().top + $footer.height()) {
    $footer.after({
      styel:
        "position:fixed; top:" +
        (window.innerHeight - $footer.outHeight()) +
        "px;",
    });
  }
});
