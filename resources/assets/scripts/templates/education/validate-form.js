import { validate } from "../../util/helpers";

export default () => {
  
  // Submit Handler for Salesforce form
  $('.education-submit').click(function(e) {
    e.preventDefault();
    
    if (validateForm()) {
      var url = "https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8",
        data = $('.education-enrollment-form form').serialize();

      $.ajax({
        url: url,
        type: 'GET',
        data: data,
        dataType: 'jsonp',
      });
      
      var dataLayer = window.dataLayer || []; 

      dataLayer.push({ // eslint-disable-line
        'event': 'educationOk',
      });

      $('.education-enrollment-form').hide();
      $('.its-free').hide();
      $('.education-enrollment-form-success').show();
    }
  });

  // Mobile Nav with Anchor Links
  $('.mobile-nav-item a').click(function() {
    $('.menu-icon').removeClass('open');
    $('.mobile-nav-items').css('display', 'none');
    $('.overlay').removeClass('active').css('display', 'none');
  });
}

function validateForm() {
  var $inputs = $(".education-enrollment-form input[type=text]");

  var hasError = false;

  $inputs.each(function(index, input) {
    var $input = $(input);
    var formError = $input.next(".error");

    if (!$input.val()) {
      $input.addClass("has-error");
      formError.show();
      hasError = true;
    } else if ($input.attr("id") === "email") {
      hasError = !validate.isValidEmail($input.val());
      if (hasError) {
        $input.addClass("has-error");
        formError.show();
      } else {
        $input.removeClass("has-error");
        formError.hide();
      }
    } else {
      if ($input.hasClass("has-error")) {
        $input.removeClass("has-error");
        formError.hide();
      }
    }
  });

  return !hasError;
}
