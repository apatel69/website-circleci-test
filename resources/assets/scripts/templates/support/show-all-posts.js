export default function() {
    // Slide down the hidden posts and remove
    $(document).on('click', ".show-all-posts", function(e) {
        e.preventDefault();
        $(e.target).hide();
        $(e.target.hash).slideDown( 400 );
    });
}
