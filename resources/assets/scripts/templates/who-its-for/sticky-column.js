export default function() {
  var startPosition = 0;
  var stopPosition = 0;

  var calcScrollPositions = function() {
    var ctaPhoneContent = $(".floating_column_container");
    var ctaSection = $(".cta-text-take-a-tour");
    startPosition = ctaPhoneContent.offset().top;
    stopPosition = ctaSection.offset().top - ctaPhoneContent.outerHeight();
  };

  $(document).scroll(function() {
    var ctaPhoneContent = $(".floating_column_container");
    var scrollTop = $(this).scrollTop();
    if (scrollTop > startPosition - 15) {
      ctaPhoneContent.addClass("sticky");
      if (scrollTop > stopPosition) {
        ctaPhoneContent.css("top", stopPosition - scrollTop);
      } else {
        ctaPhoneContent.css("top", 15);
      }
    } else {
      ctaPhoneContent.removeClass("sticky");
    }
  });

  $(window).resize(calcScrollPositions);

  calcScrollPositions();
}