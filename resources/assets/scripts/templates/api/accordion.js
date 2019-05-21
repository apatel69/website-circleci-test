export default function () {
  // Accordion Toggle
  $('.accordion-toggle').click(function () {
    var thisElement = $(this),
      thisTarget = thisElement.data('target'),
      targetElement = $('.accordion-content[data-name="' + thisTarget + '"]');

    if (thisElement.hasClass('inactive')) {
      thisElement.removeClass('inactive');
      thisElement.addClass('active');
      targetElement.show();
    } else {
      thisElement.removeClass('active');
      thisElement.addClass('inactive');
      targetElement.hide();
    }
  });
}
