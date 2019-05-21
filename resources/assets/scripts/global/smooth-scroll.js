/* Smooth scroll to sections on anchor link click */

/**
 * Smooth scroll for all the hash links throughout the website.
 *
 * To add a custom offset, add a 'data-scroll-offset' attribute to the target.
 * e.g., <div id="section-title" data-scroll-offset="35">
 */
export default function() {

    $(document).on('click', "a[href^='#']:not(a[href='#'])", function(e) {
        e.preventDefault();
        var position = 0;
        var $target = $(this.hash.replace(/\./g, '\\.')); // escape periods in IDs so jQuery doesn't think they're classes
        var lazyLoadInstance = window.lazyLoadInstance;

        if ( $target.length ) {
            if (lazyLoadInstance && typeof(lazyLoadInstance.loadAll) == 'function') {
                lazyLoadInstance.loadAll();
            }
            var $banner = $('.fixed-nav,.sticky-bar-classic,.sticky-bar-nfb,.banner-sticky');
            var scrollOffset = $target.data('scroll-offset') || ( $banner.length ? $banner.outerHeight() : 0 );

            position = $target.offset().top - scrollOffset;

            $("body,html").animate({
                scrollTop: position,
            }, 1000);
        }
    });

}
