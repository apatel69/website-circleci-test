import currencyCode from '../util/currencyCode';
import { readCookie, createCookie } from "../util/helpers";

export default function() {
    function signupPage($, window, document, $form) {
        if (!$form.length > 0) {
            return false;
        }
        let signupForm = {
            init: function() {
                this.form = $form;
                this.email = this.form.find("input[name='email']");
                this.password = this.form.find("input[name='password']");
                this.submitButton = this.form.find("button[type='submit']");
                this.form.on("submit", $.proxy(this.sendRequest, this));
                this.form.on("focus", this.loadGeoInfo());
                this.isValid = false;
            },
            sendRequest: function(event) {
                event.preventDefault();
                let referralId = "";
                const blankMsg = 'This cannot be blank.';
                this.email = this.form.find("input[name='email']");
                this.emailMessage = this.form.find('.fieldset-email .serverMessage');
                this.password = this.form.find("input[name='password']");
                this.passwordMessage = this.form.find('.fieldset-password .serverMessage');

                if (readCookie("fb_landing_url") !== null) {
                    let refferalCookie = decodeURIComponent(readCookie("fb_landing_url")).match('[?&]ref=([^&#]*)');
                    if (refferalCookie && refferalCookie.length) {
                        referralId = refferalCookie[1];
                    }
                }

                if (this.email.val() === "" && this.password.val() === "") {
                    this.email.addClass("error").focus();
                    this.emailMessage.text(blankMsg);
                    this.password.addClass("error");
                    this.passwordMessage.text(blankMsg);
                    inputValidate();
                    return false;
                } else if (this.email.val() !== "" && this.password.val() === "") {
                    this.email.removeClass("error");
                    this.passwordMessage.text(blankMsg);
                    this.password.addClass("error").focus();
                    inputValidate();
                    return false;
                } else if (this.email.val() === "" && this.password.val() !== "") {
                    this.password.removeClass("error");
                    this.emailMessage.text(blankMsg);
                    this.email.addClass("error").focus();
                    inputValidate();
                    return false;
                }

                this.loadGeoInfo();
                this.form.find("input").removeClass('error');
                this.form.find('.fieldset').removeClass('error');
                this.form.find('.errorGeneral').hide();

                let url = this.form.attr("action");
                let data = JSON.stringify({
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
                let dataLayer = window.dataLayer || [];
                dataLayer.push({
                    'event': 'smux.account.signup',
                });
                window.location = "/ext/inline/redirect.php?access_token="
                + data["response"]["access_token"]
                + "&email=" + this.email.val();
            },
            error: function(data) {
                let response = data.responseText.length > 0 ? JSON.parse(data.responseText) : false;
                let self = this;
                let errorArray = [];
                if (response) {
                    errorArray = response.error_description
                        .replace('Validation failed:', '')
                        .split(',');
                }
                errorArray.forEach(function(errorMsg) {
                    if (errorMsg.search(/email/i) !== -1) {
                        self.form.find("input[name=email]").addClass("error");
                        self.form.find('.fieldset-email .serverMessage').text(errorMsg);
                    } else if (errorMsg.search(/password/i) !== -1) {
                        self.form.find("input[type=password]").addClass("error");
                        self.form.find('.fieldset-password .serverMessage').text(errorMsg);
                    } else {
                        self.form.find('.errorGeneral').show().text(errorMsg);
                    }
                });
            },
            loadGeoInfo: function() {
                let geoInfo;
                let self = this;
                $.get("/wp-json/wp/v2/geo-location/get-data", function(data) {
                    geoInfo = data;
                }).then(function() {
                    self.country = geoInfo.country_name;
                    self.currency = currencyCode[geoInfo.country];
                });
            },
            growSumoReferral: function(emailAddress){
                if (typeof window.growsumo != "undefined"){
                    let growsumo = window.growsumo;
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
                    eventName: "smux_account_signup",
                });

            },
        }
        signupForm.init();
    }

    function setTrialLength() {
        $(window).on('load', function() {
            const form = document.querySelector('#signupForm');
            var trialLength = form.dataset.tl;
            createCookie("fb_web_promo", "lp" + trialLength);
        });
    }

    function inputValidate() {
        $('.fieldset input').on('input', function() {
            if ($(this).is(':valid')) {
                $(this).removeClass('error');
            } else {
                $(this).addClass('error');
                if ($(this).val() === "") {
                    $(this).siblings('.formError').find('.serverMessage').text('This cannot be blank.');
                }
            }
        });
    }

    $(document).ready(function() {
        setTrialLength();
        new signupPage($, window, document, $('#signupForm'));
    });
}
