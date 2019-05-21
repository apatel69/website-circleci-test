/* eslint-disable */
import { validate } from "../../util/helpers";
export default function() {
    $(document).ready(function () {
      // Submit Handler for Salesforce form
      $('.feedback-form-submit').click(function (e) {
        e.preventDefault();
    
        if (validateForm()) {
          var url = "https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8",
            data = $('#web2lead-form form').serialize();
          $.ajax({
            url: url,
            type: 'post',
            data: data,
            dataType: 'jsonp'
          });
    
          $('.form-landing-page-form form').hide();
          $('.feedback-form-success').show();
          // dataLayer.push({
          //     'event': 'easybookkeepingOK'
          // });
        }
      });
    
      $('.main-nav .primary-cta').click(function (e) {
        window.location.href = "#web2lead-form";
      });
    
    });
    
    function validateForm() {
      var $inputs = $(".form-landing-page-form form input[type=text]");
    
      var hasError = false;
    
      $inputs.each(function (index, input) {
        var input = $(input);
        var formError = input.siblings('.error');
    
        if (!input.val()) {
          input.addClass('has-error');
          formError.show();
          hasError = true;
        } else if (input.attr('id') === 'email') {
          hasError = !validate.isValidEmail($(input).val());
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
