import 'slick-carousel';

export default function () {
    $(window).on('load resize orientationchange', function() {
        var $carousel = $('.snapshot__listWrapper');
        // slick on mobile
        if ($(window).width() > 991) {
            if ($carousel.hasClass('slick-initialized')) {
                $carousel.slick('unslick');
            }
        }
        else{
            if (!$carousel.hasClass('slick-initialized')) {
                $carousel.slick({
                    mobileFirst: true,
                    arrows: false,
                    dots: true,
                    reinit: true,
                    adaptiveHeight: false,
                });
            }
        }
    });
}
