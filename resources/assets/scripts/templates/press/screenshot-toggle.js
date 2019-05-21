export default function() {
  // Reveal/Hide Device Assets
  $(".expand-chevron, .close-button").click(function(e) {
    e.preventDefault();
    $("#assets").slideToggle();
  });
}
