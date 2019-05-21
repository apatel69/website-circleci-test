export default function() {
  var validate = {
    isValidEmail: function(input) {
      function hasSpaces(input) {
        input = $.trim(input);
        return input.indexOf(' ') !== -1;
      }
      return input.match(/@.*[.]/) && !hasSpaces(input);
    },
    isValidCompany: function(input) {
      return !!input.match(/[a-z0-9]/i);
    },
    resetSubmitButtonStyle: function() {
      $('button').removeClass('button-disabled');
      $('.button-primary-text').removeClass('is-transparent');
      $("button").removeAttr('disabled');
    },
    IE8PlaceholderFix: function(e) {
      $('.input-company', e).focus();
      $('.input-email', e).focus().blur();
    },
    invalidCompanyMessage: 'Your company name is required',
    invalidEmailMessage: 'Your email address is required',
  }
  window.validate = validate;
}
