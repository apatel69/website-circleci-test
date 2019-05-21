export default function() {
    function bannerStickyOnScroll() {
        var scrollBottom = $(window).scrollTop() + $(window).height();
        var footerTop = $('footer').offset().top;
        var bannerHeight = $('.stickyBannerCTA').outerHeight();
        $('.stickyBannerCTA__spacer').height(bannerHeight);

        if (scrollBottom <= footerTop) {
            $('.stickyBannerCTA').addClass('sticky');
        } else if (scrollBottom > footerTop) {
            $('.stickyBannerCTA').removeClass('sticky');
        }
    }

    bannerStickyOnScroll();

	$(window).scroll(function () {
		bannerStickyOnScroll();
	});
}