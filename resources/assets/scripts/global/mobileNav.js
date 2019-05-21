export default function() {

  /* Hamburger menu click event to toggle responsive menu */
  $(".item-toggle").on("click", function(e) {
    e.preventDefault();
    
    var target = $(this).data("target"),
      targetElement = $("." + target);

    if (targetElement.hasClass("active")) {
      targetElement.removeClass("active");
      $(this).removeClass("active");
    } else {
      targetElement.addClass("active");
      $(this).addClass("active");
    }
  });

  /* Add active class to first li of mobile menu to open on load */

  $(".mobile_nav > li:first-child").addClass("active");

  /* Toggle mobile navigation dropdown */

  $(".mobile_nav > li.menu-item-has-children > a").on("click", function(e) {
    e.preventDefault();
    $(this).parent().toggleClass("active");
  });
}
