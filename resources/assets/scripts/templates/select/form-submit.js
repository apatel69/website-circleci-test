import { validate } from "../../util/helpers";
export default () => {

	$('.success-modal-close').click(function () {
		$('.success-state').hide();
	});

	$('.select-submit').click(function (e) {
		e.preventDefault();

		if (validateForm()) {
			var url = "https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8",
				data = $('.select-form').serialize();
			$.ajax({
				url: url,
				type: 'post',
				data: data,
				dataType: 'jsonp',
			});
			var dataLayer = window.dataLayer || [];

			dataLayer.push({
				'event': 'selectOk',
			});

			hvc();

			$('.success-state').addClass("modal--visible");
		}
	});
}

function validateForm() {
	var $inputs = $(".select-form input[type=text]");

	var hasError = false;

	$inputs.each(function(index, input){
		var formError = $(input).next('.error');

		if (!$(input).val()) {
			$(input).addClass('has-error');
			formError.show();
			hasError = true;
		} else if ($(input).attr('id') == 'email') {
			hasError = !validate.isValidEmail($(input).val());
			if (hasError) {
				$(input).addClass('has-error');
				formError.show();
			} else {
				$(input).removeClass('has-error');
				formError.hide();
			}
		} else {
			if ($(input).hasClass('has-error')){
				$(input).removeClass('has-error');
				formError.hide();
			}
		}
	});

	return !hasError;
}

function hvc() {
	var floodlight = document.getElementById('floodlight');
	var ttd = document.getElementById('ttd');
	var liPixel = document.getElementById('lipixel');
	if (floodlight) {
		floodlight.src = "https://9052200.fls.doubleclick.net/activityi;src=9052200;type=conve0;cat=forms0;dc_lat=;dc_rdid=;tag_for_child_directed_treatment=;tfua=;npa=;ord=[SessionID]?";
	}
	if (ttd) {
		ttd.src="//insight.adsrvr.org/tags/9802xig/ld48mg2/iframe";
	}
	if (liPixel) {
		liPixel.src="https://dc.ads.linkedin.com/collect/?pid=51652&conversionId=721945&fmt=gif"
	}
}

