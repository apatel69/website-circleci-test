import { createCookie } from './helpers';

export default function setTrialLength() {
    $(window).on('load', function() {
        const form = document.querySelector('#inline-form-hero');
        var trialLength = form.dataset.tl;
        createCookie("fb_web_promo", "lp"+trialLength);
    });
  }
