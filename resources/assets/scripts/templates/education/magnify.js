export default function(){
// Magnify
  $(window).resize(function() {
    if (vw().width > 768) {
      magnify();
    }
  }).resize();
}

function magnify() {
  var native_width = 0;
  var native_height = 0;

  $(".magnify-image").css("background","url('" + $(".preview-image").attr("src") + "') no-repeat");

  $(".infographic-image").mousemove(function(e) {
    if (!native_width && !native_height) {
      var image_object = new Image();
      image_object.src = $(".preview-image").attr("src");

      native_width = image_object.width;
      native_height = image_object.height;
    } else {
      var magnify_offset = $(this).offset();

      var mx = e.pageX - magnify_offset.left;
      var my = e.pageY - magnify_offset.top;

      if (mx < $(this).width() && my < $(this).height() && mx > 0 && my > 0) {
        $(".magnify-image").fadeIn(100);
      } else {
        $(".magnify-image").fadeOut(100);
      }
      if ($(".magnify-image").is(":visible")) {
        var rx = Math.round(mx/$(".preview-image").width()*native_width - $(".magnify-image").width()/2)*-1;
        var ry = Math.round(my/$(".preview-image").height()*native_height - $(".magnify-image").height()/2)*-1;
        var bgp = rx + "px " + ry + "px";

        var px = mx - $(".magnify-image").width()/2;
        var py = my - $(".magnify-image").height()/2;

        $(".magnify-image").css({ left: px, top: py, backgroundPosition: bgp });
      }
    }
  })
}

export const vw = () => {
  var e = window,
    a = "inner";
  if (!("innerWidth" in window)) {
    a = "client";
    e = document.documentElement || document.body;
  }
  return {
    width: e[a + "Width"],
    height: e[a + "Height"],
  };
};