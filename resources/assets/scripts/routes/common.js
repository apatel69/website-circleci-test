/* eslint-disable */

import mobileNav from "../global/mobileNav";
import footer from "../global/footer";
import smooth_scroll from "../global/smooth-scroll";
import { is_iOS, is_Android, is_mobile_device, createCookie, readCookie, eraseCookie, getElOffset } from "../util/helpers";
import smartBanner from "../components/smart-banner";
import whichVersion from "../global/which-version";
import multiChannelTracker from '../global/multichannel-tracker';
import LazyLoad from 'vanilla-lazyload/dist/lazyload.min.js';
import { create } from "domain";

export default {
  init() {

    // JavaScript to be fired on all pages
    whichVersion();
    smartBanner();
    mobileNav();
    footer();
    smooth_scroll();
    multiChannelTracker();

    window.createCookie = createCookie;
    window.eraseCookie = eraseCookie;
    window.readCookie = readCookie;
    window.getElOffset = getElOffset;

    var $html = $("html");

    if (!is_mobile_device()) {

      /**
       * Remove href if <a> are tel: links
       */
      $('a[href^="tel:"]').each(function() {
        $(this).removeAttr("href");
      });
    } else if (is_Android()) {
      $html.addClass("android");
    } else if (is_iOS()) {
      $html.addClass("ios");
    }

    window.lazyLoadInstance = new LazyLoad({
        elements_selector: ".lazy",
        skip_invisible: false,
    });

  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
