export default function() {
    // Filter Modal
    $(".modal-filter .btn-modal-close").click(function(e) {
        e.preventDefault();
        $(".modal-filter").hide();
    });

    $('.btn-filter-sort').click(function(e) {
        e.preventDefault();
        $(".modal-filter").show()
    })
}