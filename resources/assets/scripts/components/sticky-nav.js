export default function() {
	var startPosition = 0;
	var stopPosition = 0;

	var calcScrollPositions = function(){
		var fixedNav = $('.submenu-container');
		var menuItem = $('.menu-item');
		var ctaSection = $('footer');
		startPosition = fixedNav.offset().top;
		stopPosition = ctaSection.offset().top - menuItem.outerHeight() + 10;
	};

	$(document).scroll(function() {
		var fixedNav = $('.submenu-container');
		var notSticky = $(fixedNav).hasClass('not-sticky');
		var menuItem = $('.menu-item');
		var spacer = $('.sticky-spacer');
		var scrollTop = $(this).scrollTop();
		if (scrollTop > startPosition && !notSticky) {
			fixedNav.addClass('sticky');
			menuItem.addClass('menu-item-sticky');
			spacer.show();
			if (scrollTop > stopPosition) {
				fixedNav.css('top', stopPosition - scrollTop);
			} else {
				fixedNav.css('top', 0);
			}
		} else {
			fixedNav.removeClass('sticky');
			menuItem.removeClass('menu-item-sticky');
			spacer.hide();
		}
	});

	$(window).resize(calcScrollPositions);

	calcScrollPositions();

}
