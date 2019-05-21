export default function() {
	$(".feature-title").click(function() {
		var featureList = $(this).next(".mobile-feature-details");
		var featureTitle = $(".feature-title > h2");
		if ( featureTitle.css("display") == 'block' ) {
			featureList.slideToggle(400);
		}
	});
}
