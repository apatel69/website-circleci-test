export default function() {
  // Mobile Nav with Anchor Links
  $(".mobile-nav-items a").click(function(e) {
    e.preventDefault();
    $(".menu-icon").removeClass("open");
    $(".mobile-nav-items").css("display", "none");
    $(".overlay")
      .removeClass("active")
      .css("display", "none");
  });

  // Click the hamburger menu to reveal mobile menu
  var overlay = $(".overlay");
  var mobileNavItems = $(".mobile-nav-items");
  var primaryNav = $(".nav-primary-menuwrap");
  var navMobileIcon = $(".menu-icon");
  var mobileNavOverlay = $(".nav-primary-overlay");

  $(".mobile-menu").click(function(e) {
    e.preventDefault();
    if (overlay.hasClass("active")) {
      mobileNavItems.slideUp(300);
      overlay.removeClass("active").hide();
      $(".dropdown-content").slideUp();
    } else {
      mobileNavItems.slideDown(400);
      overlay.css("display", "block").fadeIn(function() {
        $(this).addClass("active");
      });
    }
  });

  $("[data-toggle=toggle-primary-nav]").on("click", function(e) {
    e.preventDefault();
    primaryNav.toggleClass("is-shown");
    navMobileIcon.toggleClass("open");
    mobileNavOverlay.toggleClass("is-active");
    return false;
  });

  overlay.click(function() {
    $(this)
      .removeClass("active")
      .hide();
    navMobileIcon.toggleClass("open");
    mobileNavItems.slideUp(300);
  });
}
