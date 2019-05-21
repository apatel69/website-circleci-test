export default function() {

    function toggler(parentSelector) {
        $(parentSelector + ' .btn-content-toggle').click(function (e) {
            e.preventDefault();

            var target = $(this).data('target');

            $(parentSelector + ' .content-item').removeClass('active');
            $(parentSelector + ' .btn-content-toggle').removeClass('active');

            $(this).addClass('active');
            $(parentSelector + ' .content-item[data-name="' + target + '"]').addClass('active');
        });
    }

    toggler(".main-content");
}