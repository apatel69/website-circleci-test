/* eslint-disable */
import { validate, getQueryString } from "../../util/helpers";

export default function () {
  $(function () {
    var subdomains = ['-billing', '-receivables', '-accounts', '-invoicing', 'other'];
    var $classicSignupContent = $('.classic-sign-up-content');
    var queryString = getQueryString({decode: true});
    var conflictCodeVal;
    var dataLayer = window.dataLayer || [];

    $("#uuid-populated-by-cookie").val(readCookie("fb_package_uuid"));

    if ( typeof queryString['conflict'] != 'undefined' && queryString['company'] && queryString['email'] ) {
      initSignupFields(queryString['company'], queryString['email']);
      initConfirmationFields(queryString['company'], queryString['email'], queryString['conflict']);
    }

    // Validation on click
    // If valid, push event to dataLayer and trigger submit.
    $('.subscribe-form').on('submit.validate', function (e) {
      e.preventDefault();
      var formElement = $(this);
      var formErrors = {};
      var companyVal = $('.input-company', formElement).val();
      var company = $.trim(companyVal);
      var emailVal = $('.input-email', formElement).val();
      var email = $.trim(emailVal);

      $('.error-company, .error-email', formElement).hide();
      $('.input-company, .input-email', formElement).removeClass('has-error');

      validate.resetSubmitButtonStyle();

      if (!validate.isValidCompany(company)) {
        $('.error-company', formElement).show();
        $('.input-company', formElement).addClass('has-error');
        var errorData = $('.error-company .error', formElement).data('error-no-company');
        formErrors.errorMessageCompany = ((errorData) ? errorData : validate.invalidCompanyMessage);
      }

      if (!validate.isValidEmail(email)) {
        $('.error-email', formElement).show();
        $('.input-email', formElement).addClass('has-error');
        var errorData = $('.error-email .error', formElement).data('error-email-typo');
        formErrors.errorMessageEmail = ((errorData) ? errorData : validate.invalidEmailMessage);
      }

      if (!$.isEmptyObject(formErrors)) {
        if (formErrors.hasOwnProperty('errorMessageCompany')) {
          $('.error-company .error', formElement).text(formErrors.errorMessageCompany);
        }
        if (formErrors.hasOwnProperty('errorMessageEmail')) {
          $('.error-email .error', formElement).text(formErrors.errorMessageEmail);
        }
        validate.IE8PlaceholderFix(formElement);
        $(formElement).addClass('submitted');
        return false;
      } else {
        $('button', formElement).addClass('button-disabled');
        $('.button-primary-text', formElement).addClass('is-transparent');
        $('button', formElement).attr('disabled', 'disabled');

        checkDuplicateAccounts(companyVal, emailVal, formElement);
      }
    });

    $('.confirm-link').click(function(e){
      e.preventDefault();
      dataLayer.push(decodeConflict(conflictCodeVal));
      setTimeout(function(){
        $('.confirm-form').submit();
      },2000);
      eraseCookie("fb_package_uuid");
    });

    $('.email-login').click(function(e){
      e.preventDefault();
      dataLayer.push({
        'event': 'signupFormSubmit',
        'accountSubmitData' : {
          'category': 'Account Email Sent',
          'action': 'Account Email Sent',
          'label': document.referrer !== '' ? document.referrer : 'no referrer'
        }
      });
      setTimeout(function(){
        $('.email-form').submit();
      },2000);
    });

    function checkDuplicateAccounts(companyVal, emailVal, formElement) {
      var queryString = 'company=' + encodeURIComponent(companyVal) + '&email=' + encodeURIComponent(emailVal);
      $(formElement).off('submit.validate');

      return $.ajax({
          method: 'GET',
          url: '/wp-content/themes/freshbooks/resources/_track/account.php?' + queryString,
          dataType: 'json'
        })
        .done(function (msg) {
          var conflicts = [];

          // this is the subdomain that freshapp first tries to create, without appending anything
          var rootSubdomain = companyVal.toLowerCase().replace(/[^a-z0-9]/g, '').substring(0, 50),
            label = [location.protocol, '//', location.host, location.pathname].join(''),
            subdomainSuffix;

          // check if there's a subdomain conflict
          if (msg.subdomain != rootSubdomain) {
            conflicts.push('Subdomain');
            subdomainSuffix = msg.subdomain.split(rootSubdomain, 2)[1];
            subdomainSuffix = subdomains.indexOf(subdomainSuffix) > -1 ? subdomainSuffix : 'other';
          }
          // if there's an email conflict, forward to the confirmation page
          if (msg.emailExists) {
            conflicts.push('Email');
            conflictCodeVal = encodeConflict(conflicts, subdomainSuffix);
            if (window.location.pathname !== '/signup') {
              window.location.href = `/signup?${queryString}&conflict=${conflictCodeVal}`;
            }
            initConfirmationFields(companyVal, emailVal, conflictCodeVal);
            showConfirmation();
            return;
            // if there's no conflict, or only a subdomain conflict
            // create the account and push the info to GTM
          } else if (conflicts.indexOf('Subdomain') > -1) {
            dataLayer.push({
              'event': 'signupFormSubmit',
              'accountSubmitData': {
                'category': 'Duplicate Account Created',
                'action': 'Subdomain Exists',
                'label': label + ' | ' + subdomainSuffix
              }
            });
            setTimeout(function () {
              $(formElement).submit();
            }, 2000);
          } else {
            dataLayer.push({
              'event': 'signupFormSubmit',
              'accountSubmitData': {
                'category': 'Unique Account Created',
                'action': 'Unique Account Created',
                'label': label
              }
            });
            setTimeout(function () {
              $(formElement).submit();
            }, 2000);
            eraseCookie("fb_package_uuid");
          }
        })
        .fail(function (msg) {
          $(formElement).submit();
        });
    }

    // returns a number from 0 to 5 that describes the signup conflict
    function encodeConflict(conflictsArr, subdomainSuffixStr) {
      return 1 + subdomains.indexOf(subdomainSuffixStr);
    }

    function decodeConflict(conflictCode) {
      var gtmEvent = {
        'event': 'signupFormSubmit',
        'accountSubmitData' : {
          'category': 'Duplicate Account Created',
          'label': document.referrer !== '' ? document.referrer : 'no referrer'
        }
      },
      conflicts = [],
      labelSuffix;

      conflictCode = parseInt(conflictCode);
      if (conflictCode < 0 || conflictCode > 5) {
        gtmEvent.accountSubmitData.action = 'Conflict Code Error';
        gtmEvent.accountSubmitData.label = 'Conflict Code Error';
      } else {
        conflicts.push('Email');
        var conflictCopy = 'email address already exists';
        if (conflictCode > 0) {
          conflicts.push('Subdomain');
          conflictCopy = 'email address and company name already exist';

          gtmEvent.accountSubmitData.label += ' | ' + subdomains[conflictCode - 1];
        }
        $('.conflict-copy').text(conflictCopy);
        gtmEvent.accountSubmitData.action = conflicts.join(" & ") + ' Exists';
      }
      return gtmEvent;
    }

    function showConfirmation() {
      $classicSignupContent.removeClass('hide-confirm').addClass('hide-signup');
    }

    function showSignup() {
      $classicSignupContent.addClass('hide-confirm').removeClass('hide-signup');
    }

    function initConfirmationFields(companyVal, emailVal, conflictVal) {
      decodeConflict(conflictVal);
      $('.email-form input[name="email"]').val(emailVal);
      $('.confirm-form input[name="email"]').val(emailVal);
      $('.confirm-form input[name="company"]').val(companyVal);
    }

    function initSignupFields(companyVal, emailVal) {
      $('.subscribe-form input[name="email"]').val(emailVal);
      $('.subscribe-form input[name="company"]').val(companyVal);
    }

    // IE 11 and Safari fix
    window.onunload = function () {
      validate.resetSubmitButtonStyle();
    };

    // Validate submitted fields on keyup
    $('input').on('keyup input', function () {
      var currentField = $(this).attr('name'),
        isInSubmittedForm = $(this).closest('form').hasClass('submitted'),
        inputVal = $(this).val(),
        input = $.trim(inputVal);
      if (isInSubmittedForm) {
        if (currentField === 'company') {
          $(this).toggleClass('has-error', !validate.isValidCompany(input))
        } else if (currentField === 'email') {
          $(this).toggleClass('has-error', !validate.isValidEmail(input))
        }
      }
    });

  });

}
