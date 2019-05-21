export default function() {
  var startPosition = 0;
  var stopPosition = 0;
  var sidebar = $(".sidebar-content");
  
  var calcScrollPositions = function() {
    var stopAtElement = $(".guide-footer");
    startPosition = sidebar.offset().top;
    stopPosition = stopAtElement.offset().top - sidebar.outerHeight() - 100;
  };

  // Fixed sidebar
  $(document).scroll(function() {
    var scrollTop = $(this).scrollTop();
    if (scrollTop > startPosition) {
      sidebar.addClass("sticky");
      if (scrollTop > stopPosition) {
        sidebar.css("top", stopPosition - scrollTop);
      } else {
        sidebar.css("top", 0);
      }
    } else {
      sidebar.removeClass("sticky");
    }
  });

  $(window).resize(calcScrollPositions);
  calcScrollPositions();
}