import currencyCode from "../util/currencyCode";
import setTrialLength from "../util/setTrialLength";
import { readCookie } from "../util/helpers";


export default function(confirmationMessageElement) {

  function nfbInlineSignupForm($, window, document, $form) {
    if(!$form.length > 0) return false;
    var signupForm = {
        init: function() {
            this.form = $form;
            this.email = this.form.find("input[name='email']");
            this.password = this.form.find("input[name='password']");
            this.submitButton = this.form.find("button[type='submit']");
            this.form.on("submit", $.proxy(this.sendRequest, this));
            this.isValid = false;
        },
        sendRequest: function(event) {
            event.preventDefault();
            var referralId = "";


            if (readCookie("fb_landing_url") !== null) {
                var refferalCookie = decodeURIComponent(readCookie("fb_landing_url")).match('[?&]ref=([^&#]*)');

                if (refferalCookie && refferalCookie.length) {
                    referralId = refferalCookie[1];
                }
            }

            this.loadGeoInfo();
            this.form.find("input").removeClass('error');
            this.form.find('.fieldset').removeClass('error');
            this.form.find('.error-general').hide();
            this.submitButton.addClass('loading');
            var url = this.form.attr("action");
            var data = JSON.stringify({
                email: this.email.val(),
                id: this.email.val(),
                password: this.password.val(),
                landing_url: decodeURIComponent(readCookie("fb_landing_url")),
                provisioner: "magnum",
                send_confirmation_notification: true,
                visitor_id: readCookie("fb_visitor_id"),
                access_token: null,
                capacity: null,
                country: this.country || "United States",
                currencyCode: this.currency || "USD",
                optimizely_buckets: readCookie("optimizely_buckets"),
                optimizely_user_id: readCookie("optimizely_user_id"),
                referralid: referralId,
                referring_url: decodeURIComponent(readCookie("fb_referral_url")),
                web_promo: readCookie("fb_web_promo"),
                skip_business: false,
                skip_system: false,
            });
            $.ajax({
                url: url,
                type: "POST",
                data: data,
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: $.proxy(this.success, this),
                error: $.proxy(this.error, this),
            });
        },
        success: function(data) {
            this.growSumoReferral(this.email.val());
            this.sendOptimizelySignUpEvent();
            var dataLayer = window.dataLayer || [];
            var signupRedirect = "/ext/inline/redirect.php?access_token="
                + data["response"]["access_token"]
                + "&email=" + this.email.val();
            dataLayer.push({
                'event': 'smux.account.signup',
            });
            if (!confirmationMessageElement){
                window.location = signupRedirect;
            }
            else {
                $("."+confirmationMessageElement)
                    .removeClass("hidden")
                    .find('.btn-continue')
                    .click(function() {
                        window.location = signupRedirect;
                    });
                setTimeout(function(){
                    window.location = signupRedirect;
                }, 10000);
            }

        },
        error: function(data) {
            this.submitButton.removeClass('loading');
            var response = JSON.parse(data.responseText);
            var self = this;
            var errorArray = response.error_description
                .replace('Validation failed:', '')
                .split(',');
            errorArray.forEach(function(errorMsg) {
                if (errorMsg.search(/email/i) !== -1) {
                    self.form.find("input[type=email]").addClass("error");
                    self.form.find('.fieldset-email .server-message').text(errorMsg);
                } else if (errorMsg.search(/password/i) !== -1) {
                    self.form.find("input[type=password]").addClass("error");
                    self.form.find('.fieldset-password .server-message').text(errorMsg);
                } else {
                    self.form.find('.error-general').show().text(errorMsg);
                }
            });
        },
        loadGeoInfo: function() {
            var geoInfo;
            var self = this;
            $.get("/wp-json/wp/v2/geo-location/get-data", function(data) {
                    geoInfo = data;
                }).then(function() {
                self.country = geoInfo.country_name;
                self.currency = currencyCode[geoInfo.country_code];
            });
        },
        growSumoReferral: function(emailAddress){
            if (typeof window.growsumo != "undefined"){
                var growsumo = window.growsumo;
                growsumo.data.name = emailAddress;
                growsumo.data.email = "anonymous@freshbooks.com";
                growsumo.data.customer_key = emailAddress;
                growsumo.createSignup();
            }
        },
        sendOptimizelySignUpEvent: function (){
            window['optimizely'] = window['optimizely'] || [];
            window['optimizely'].push({
                    type: "event",
                    eventName: "User-Hero-Sign-Up",
                });

        },
    }
    signupForm.init();
}

$(document).ready(function() {
    setTrialLength();
    new nfbInlineSignupForm($, window, document, $('#inline-form'));
    $(".inline-form .fieldset-email").click(function() {
        $(".inline-form .fieldset-password").slideDown();
    });
    $(".fieldset input").focus(function() {
        $(this).removeClass("error");
    });
})
}
