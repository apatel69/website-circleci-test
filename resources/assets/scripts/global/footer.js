export default function() {
  
    /* Toggle Footer dropdowns for mobile */

  $(".footer-top-level").on("click", function(e) {
    e.preventDefault();
    $(this).toggleClass("display-mobile-dropdown");
    $(this)
      .next(".footer-sub-links")
      .slideToggle(400);
  });
}
