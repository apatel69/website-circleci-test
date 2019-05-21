import { validate } from "../../util/helpers";

export default function() {
	$('.reseller-program-submit').click(function(e) {
		e.preventDefault();
		if (validateForm()) {
			var url = "https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8";
			var formData = $('form.program-enrollment-form').serialize();
			var data = decodeURIComponent(formData);

			$.ajax({
				url: url,
				type: 'GET',
				data: data,
				dataType: 'jsonp',
			});

			var dataLayer = window.dataLayer || []; 

			dataLayer.push({ // eslint-disable-line
				'event': 'partnerOk',
			});

			$('.reseller-program-enrollment').hide();
			$('.success-state').show();
		}
	});
}

function validateForm() {
	var $inputs = $(".form-field input[type=text]");
	var hasError = false;

	$inputs.each((index, input) => {
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
