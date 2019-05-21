export default () => {
	window.onload = function() {
		jQuery('.expand-cards').click(function() {
			jQuery('.card-hidden').toggleClass('card-show');
		});
	};
}
