export default function () {

  var thumbnail = $('.thumb');

  thumbnail.first().addClass('active');

  thumbnail.click(function () {
    var index = $(this).index();

    thumbnail.removeClass('active');
    $(this).addClass('active');

    $('.screenshot-frame img').hide();
    $('.screenshot-frame img:eq(' + index + ')').css('display', 'inline-block');
  });

  if (thumbnail.length === 1) {
    $('.thumbnails').hide();
    $('.screenshot-frame').css('margin-right', '0');
  }
}
