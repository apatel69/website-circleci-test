export default function() {
    $("p > .third-party-reveal").click(function(e) {
        e.preventDefault();
        $(".third-party-details").slideToggle();
    });
}