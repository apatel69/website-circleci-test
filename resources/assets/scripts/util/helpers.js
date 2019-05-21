/**
 * Detect Touch Device
 * @return boolean
 */
export const is_touch_device = () => {
  return (
    "ontouchstart" in window ||
    (navigator.maxTouchPoints > 0 || navigator.msMaxTouchPoints > 0)
  );
};

/**
 * Get Viewport dimensions in pixels
 * @param none
 * @return Object { width: value, height: value }
 */
export const vw = () => {
  var e = window,
    a = "inner";
  if (!("innerWidth" in window)) {
    a = "client";
    e = document.documentElement || document.body;
  }
  return {
    width: e[a + "Width"],
    height: e[a + "Height"],
  };
};
/**
 * Use this variable to access different validations on forms
 */
export const validate = {

  isValidEmail: function(input) {

    function hasSpaces(input) {
      input = $.trim(input);
      return input.indexOf(" ") !== -1;
    }

    return input.match(/@.*[.]/) && !hasSpaces(input);
  },

  isValidCompany: function(input) {

    return !!input.match(/[a-z0-9]/i);

  },
  resetSubmitButtonStyle: function() {

    $("button").removeClass("button-disabled");
    $(".button-primary-text").removeClass("is-transparent");
    $("button").removeAttr("disabled");

  },

  IE8PlaceholderFix: function(e) {
    $(".input-company", e).focus();
    $(".input-email", e)
      .focus()
      .blur();
  },

  invalidCompanyMessage: "Your company name is required",
  invalidEmailMessage: "Your email address is required",
};

/**
 * Check if iOS device
 *
 * @param none
 * @return boolean
 */

export const is_iOS = () => {
  return /iPhone|iPad|iPod/i.test(navigator.userAgent);
}

/**
 * Check if Android device
 *
 * @param none
 * @return boolean
 */
export const is_Android = () => {
  return /Android/i.test(navigator.userAgent);
}

/**
 * Check if Mobile Device
 *
 * @param none
 * @return boolean
 */
export const is_mobile_device = () => {
  return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
}

/**
 * Parses query string from URI
 *
 * @param {Object} options Parse options to this function:
 *      - {boolean} decode Should the query string values be decoded
 * @return {Array} Query string parsed to key => value array
 */
export const getQueryString = (options = {}) => {
  var vars = [];
  var hash;
  var hashes = window.location.search.substring(1).split('&'); // Use the location.search DOM variable and trip the leading '?', then split into an array

  for (var i = 0; i < hashes.length; i++) {
      hash = hashes[i].split('=');
      vars.push(hash[0]);
      if (hash.length > 1) { // Make sure we don't break on params that don't have a value
        vars[hash[0]] = options.decode ? decodeURIComponent(hash[1]) : hash[1];
      }
  }

  return vars;
}

export const createCookie = (name, value, days) => {
  var cookieDomain;
  cookieDomain = (function(){
    var i=0,domain=document.domain,p=domain.split('.'),s='_gd'+(new Date()).getTime();
    while(i<(p.length-1) && document.cookie.indexOf(s+'='+s)==-1){
       domain = p.slice(-1-(++i)).join('.');
       document.cookie = s+"="+s+";domain="+domain+";";
    }
    document.cookie = s+"=;expires=Thu, 01 Jan 1970 00:00:01 GMT;domain="+domain+";";
    return domain;
  })()

  if (days) {
    var date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    var expires = "; expires=" + date.toGMTString();
  } else expires = "";
  document.cookie = name + "=" + value + expires + ";domain=" + cookieDomain + ";path=/";

}

export const readCookie = (name) => {
  var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for (var i = 0; i < ca.length; i++) {
		var c = ca[i].trim();
    if (c.indexOf(nameEQ) == 0) {
      return c.substring(nameEQ.length, c.length);
    }
	}
	return null;
}

export const eraseCookie = () => {
  createCookie(name, "", -1);
}

export const getElOffset = (el) => {
  const box = el.getBoundingClientRect();
  return {
    top: box.top + window.pageYOffset - document.documentElement.clientTop,
    left: box.left + window.pageXOffset - document.documentElement.clientLeft,
  };
}

