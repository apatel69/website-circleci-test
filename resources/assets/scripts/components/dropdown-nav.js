export default function() {
    $("#drop-nav").change(function(e) {
        e.preventDefault();
        var target = $(this).val();
        if (target != "") {
            window.location.href = target;
        }
    });
}
