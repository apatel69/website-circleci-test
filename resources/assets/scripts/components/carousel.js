export default function() {
    $('.tab').click(function(e) {
        e.preventDefault();

        $('.tab').removeClass('active');
        $(this).addClass('active');

        var target = $(this).data('target'),
            targetSlide = $('.slide[data-target="' + target + '"]');

        $('.slide').hide();
        $(targetSlide).show();

        arrowHandler();
    });

    $('.left-arrow').click(function() {
        var visibleSlide = $(".slide:visible");
        visibleSlide.prev().show();
        visibleSlide.hide();

        var activeTab = $(".tab.active");
        activeTab.prev().addClass("active");
        activeTab.removeClass("active");

        arrowHandler();
    });

    $('.right-arrow').click(function() {
        var visibleSlide = $(".slide:visible");
        visibleSlide.next().show();
        visibleSlide.hide();

        var activeTab = $(".tab.active");
        activeTab.next().addClass("active");
        activeTab.removeClass("active");

        arrowHandler();

    });

    function arrowHandler() {
        if ($(".slide:visible").attr("data-target") == 1) {
            $(".left-arrow").hide();
            $(".right-arrow").show();
        } else if ($(".slide:visible").attr("data-target") == 7) {
            $(".right-arrow").hide();
            $(".left-arrow").show();
        } else {
            $(".left-arrow").show();
            $(".right-arrow").show();
        }
    }
}