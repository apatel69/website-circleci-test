export default function () {
    $('#share').parent('a').on('click', e => {
        e.preventDefault();
        copyClipboard();
    })

    $('.share-mobile a').on('click', e => {
        e.preventDefault();
        copyClipboard();
    })

    function copyClipboard() {
        var input = document.createElement('input'),
            text = window.location.href;

        document.body.appendChild(input);
        input.value = text;
        input.select();
        document.execCommand('copy');
        document.body.removeChild(input);

        $('.clipboard').slideDown(300, () => {
            setTimeout(() => {
                $('.clipboard').slideUp(300);
            }, 1500)
        });
    }
}
