export default function() {
    // Navigate to page on select change
    $(document).on('change', "select.support-categories", function(e) {
        e.preventDefault();
        if ( e.target.value ) {
            location.href = e.target.value;
        }
    });
}
