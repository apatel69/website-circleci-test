export default function() {

    // Add class to hidden list elements
    $('.plan-details').each(function() {
        var pos = 0;
        $(this).find('li').each(function() {
            if (pos > 3) {
                $(this).addClass('hidden-feature');
            }
            pos++;
        });
        if (pos < 5) {
            $(this).find('.more-features').remove();
        }
    });

    // Hide / Show list elements
    $('.show-more').each(function() {
        $(this).click(function(e) {
            e.preventDefault();
            var hidden = $(this).parent().siblings('ul').find('.hidden-feature');

            if ($(this).hasClass('show-less')) {
                // Collapse list
                $(this).removeClass('show-less');
                $(this).siblings('.mobile-expand').css('transform', 'scale(1,1) ');
                $(hidden).hide();
            } else {
                // Expand list
                $(hidden).show();
                $(this).siblings('.mobile-expand').css('transform', 'scale(1,-1) ');
                $(this).addClass('show-less');
            }
        });
    });
}
