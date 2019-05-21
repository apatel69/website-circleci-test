export default function() {
    var tocMenu = $('.table-of-contents'),
    headerHeight,
    menuItems = tocMenu.find('li > a');
    
    if (window.outerWidth > 768) {
        headerHeight = $('.desktop-nav > .container').outerHeight();
    } else {
        headerHeight = $('.mobile-nav').outerHeight();
    }
    
    var scrollItems = menuItems.map(function(){
        var item = $($(this).attr('href'));
        if (item.length) { 
            return item; 
        }
    });

    $(window).scroll(function(){
    var fromTop = $(this).scrollTop() + headerHeight;

    var cur = scrollItems.map(function(){
        if ($(this).offset().top < fromTop)
        return this;
    });

    cur = cur[cur.length-1];
    var id = cur && cur.length ? cur[0].id : '';

    menuItems
        .parent().removeClass('current_page_item')
        .end().filter(`[href='#${id}']`).parent().addClass('current_page_item');
    });
}