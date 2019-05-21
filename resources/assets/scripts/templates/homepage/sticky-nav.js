export default function() {
    window.onload = function() {

        var navbar = document.getElementsByClassName('sticky-overview-nav')[0];
        var sticky = navbar.offsetTop;
        var body = document.getElementsByClassName('pillars')[0];

        if (!$('.sticky-overview-nav').hasClass('sticky-nav-hidden')) {

            $('.sticky-overview-nav').on('click', 'a', function() {
                $('li > a.active').removeClass('active');
                $(this).addClass('active');
            });

            stickyMenu();
            window.onscroll = function() {
                stickyMenu();
            };

        }

        function stickyMenu() {
            if (window.pageYOffset >= (sticky)) {
                navbar.classList.add("sticky");
                body.classList.add("nudge");
            } else {
                navbar.classList.remove("sticky");
                body.classList.remove("nudge");
            }
        }
        
    };

}
