export default function () {
  $(document).ready(function () {
    // Click the hamburger menu to reveal mobile menu
    var primaryNav = $('.nav-primary');
    var navMobileIcon = $('.menu-icon');
    var mobileNavOverlay = $('.nav-primary-overlay');

    $('[data-toggle=toggle-primary-nav]').on("click", function () {
      primaryNav.toggleClass('is-shown');
      navMobileIcon.toggleClass('open');
      mobileNavOverlay.toggleClass('is-active');
      return false;
    });

    $('[data-toggle=categories]').click(function(e) {
      e.preventDefault();
  
      $('[data-target=categories]').slideToggle('fast');
      $(this).toggleClass('is-open');
  
      if (!$(this).hasClass('is-open')) {
        showCategoriesTablet();
      }
    });

    //Forces the menu back open if you've been stretching and shrinking the page.
    var showCategoriesTablet = function() {
      $(window).resize(function() {
        if (window.outerWidth > 691) {
          $('[data-target=categories]').show();
          $('[data-target=categories]').addClass('is-open');
        }
      });
    }
  });
}
