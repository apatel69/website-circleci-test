export default function () {
    $(".gallery-modal").on('click', function () {
        let $state = $(this).siblings(".success-state");

        $state.addClass("modal--visible");
    });

    $('.success-modal-close, .success-state').click(function () {
        $(".success-state").removeClass("modal--visible");
    });
}
