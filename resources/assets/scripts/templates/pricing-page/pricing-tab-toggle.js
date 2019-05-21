export default function() {
    $('.switch').find('input:checkbox').change(function() {
        var activeSub = 'type-one';
        if (this.checked) {
            activeSub = 'type-two';
        }

        $(".subscription-type").removeClass('show-plan');
        $(this).parent().siblings('span').removeClass('active');

        $(`.${activeSub}`).addClass('show-plan');
        $(`.${activeSub}-label`).addClass('active');
    });
}
