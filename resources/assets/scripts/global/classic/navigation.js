export default function() {
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
    })
}