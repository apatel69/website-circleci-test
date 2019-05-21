export default function() {

  /**
   * Form submit handler to do AJAX call to WP backend
   */

  $("#contact-form").submit(function(e) {
    e.preventDefault();
    const form = $(this);
    const btn = $(this).find("button[type='submit']");
    const btnText = btn.text();

    const formValid = validate(form);
    
    if (formValid) {
      $.ajax({
        method: "POST",
        url: "/wp-json/contact/send",
        data: $(this).serialize(),
        beforeSend: () => {
          $('.error-msg').hide();
          btn.text("Sending...");
          btn.attr("disabled", "disabled");
        },
      })
        .done(() => {
          btn.text(btnText);
          btn.removeAttr("disabled", "disabled");
          form.parents('section').hide();
          $('.thank-you-msg').show();
          form[0].reset();
          grecaptcha.reset(); // eslint-disable-line
        })
        .fail(() => {
          $('.error-msg').show();
          $('html, body').animate({
            scrollTop: $('.error-msg').offset().top,
          }, 500);
          btn.text(btnText);
          btn.removeAttr("disabled", "disabled");
          grecaptcha.reset(); // eslint-disable-line
        });
    }
  });

  /**
   * Function to validate all the input fields on form
   * @param  jQuery object (form element)
   * @return boolean
   */
  const validate = el => {
    
    let valid = true;
    const $inputs = el.find("input[data-req], textarea[data-req]");
    const $emailField = el.find("input[type='email']");
    const $emailVal = $emailField.val();
    const $validEmail = validateEmail($emailVal);

    /**
     * Check if all inputs are valid
     */

    $inputs.each(function() {

      const $this = $(this);

      let isEmailField = $this.attr('type') == 'email';

      if (!$this.val()) {
        $this.addClass('has-error');
        $this.next('.error').show();
        isEmailField ? $emailField.parent().find('.error-invalid-email').hide() : '';
        valid = false;
      }
      else {
        if(isEmailField && !$validEmail) {
          $this.addClass('has-error');
          $this.next('.error').hide();
          $emailField.parent().find('.error-invalid-email').show();
          valid = false;
        }
        else {
          $this.removeClass('has-error');
          $this.next('.error').hide();
          isEmailField ? $emailField.parent().find('.error-invalid-email').hide() : '';
          valid = true;
        }
      }
    });

    /**
     * Check if recaptcha is clicked
     */

    let recaptchaClicked = false;

    if (grecaptcha.getResponse() !== "") {  // eslint-disable-line
      recaptchaClicked = true;
      $('.g-recaptcha > div').removeClass('g-recaptcha-error');
    }
    else {
      recaptchaClicked = false;
      $('.g-recaptcha > div').addClass('g-recaptcha-error');
    }

    return valid && recaptchaClicked;
  };

  
  /**
   * Function to validate email address using regex
   * @param  {} email
   * @return boolean
   */
  const validateEmail = email => {
    const regEx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/; // eslint-disable-line
    return regEx.test(String(email).toLowerCase());
  }

}
