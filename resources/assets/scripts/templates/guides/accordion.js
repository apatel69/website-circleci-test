export default function() {
  $(".faq-question").click(function(e) {
    e.preventDefault();
    if ($(this).hasClass("active")) {
      $(this)
        .next(".faq-answer")
        .hide();
      $(this).removeClass("active");
    } else {
      $(this)
        .next(".faq-answer")
        .show();
      $(this).addClass("active");
    }
  });
}
