export default function() {
    $('.btn-content-toggle').click(function(e) {
        e.preventDefault();
        $('.btn-content-toggle').removeClass('active');
        $(this).addClass('active');

        if ($('.btn-content-toggle').hasClass('active')) {
            var tabData = $(this).data("target");
            $('.payment-info').hide();
            $("." + tabData).show();
        }
    });
}