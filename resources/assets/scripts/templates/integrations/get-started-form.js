export default function() {

  var formExists = document.getElementById("web2lead-form");

  if (formExists) {

        var innerContent = $('.inner-content').find('a');
        var detailsBar = $('a.btn-share');

        $(innerContent).add(detailsBar).each(function() {
            formJumper($(this));
        });

        // Submit Handler for Salesforce form
        $('.feedback-form-submit').click(function(e) {
            e.preventDefault();

            if (validateForm()) {
                var url = "https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8",
                    data = $('#web2lead-form form').serialize();
                $.ajax({
                    url: url,
                    type: 'post',
                    data: data,
                    dataType: 'jsonp',
                });

                $('.form-landing-page-form form').hide();
                $('.feedback-form-success').show();
            }
        });

        $('.main-nav .primary-cta').click(function() {
            window.location.href = "#web2lead-form";
        });

    }

    function formJumper(thisObj) {
        $(thisObj).attr('href', '#tabs').removeAttr('target');
        $(thisObj).click(function() {
            $('[data-target="how-to"]').trigger('click');
        });
    }

    function validateForm() {

        var $inputs = $(".form-landing-page-form form input[type=text]");
        var hasError = false;

        $inputs.each(function(index, input) {
            input = $(input);
            var formError = input.next('.error');

            if (!input.val()) {
                input.addClass('has-error');
                formError.show();
                hasError = true;
            } else if (input.attr('id') === 'email') {
                hasError = !window.validate.isValidEmail($(input).val());
                if (hasError) {
                    input.addClass('has-error');
                    formError.show();
                } else {
                    input.removeClass('has-error');
                    formError.hide();
                }
            } else {
                if (input.hasClass('has-error')) {
                    input.removeClass('has-error');
                    formError.hide();
                }
            }
        });

        return !hasError;
    }

}
