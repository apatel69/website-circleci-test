/* eslint-disable */

function createCookie(name, value, days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
		var expires = "; expires=" + date.toGMTString();
	} else var expires = "";
	document.cookie = name + "=" + value + expires + ";domain=" + cookieDomain + ";path=/";
}

function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for (var i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') c = c.substring(1, c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
	}
	return null;
}

function eraseCookie(name) {
	createCookie(name, "", -1);
}

function bannerCopy(copyDiv, copyText) {
   if (copyText) {
      $(copyDiv).text(copyText);
   }
}

// remove the subdomain if present (ex: if on www.freshbooks.com, cookieDomain = '.freshbooks.com')
// source http://rossscrivener.co.uk/blog/javascript-get-domain-exclude-subdomain
var cookieDomain = (function(){
   var i=0,domain=document.domain,p=domain.split('.'),s='_gd'+(new Date()).getTime();
   while(i<(p.length-1) && document.cookie.indexOf(s+'='+s)==-1){
      domain = p.slice(-1-(++i)).join('.');
      document.cookie = s+"="+s+";domain="+domain+";";
   }
   document.cookie = s+"=;expires=Thu, 01 Jan 1970 00:00:01 GMT;domain="+domain+";";
   return domain;
})();

export default function() {

    var privacyAlertCookie, cookieAlertCookie, privacyAlertContainer, cookieAlertContainer, outageExpiryDate, privacyAlertExpiryDate, currentDate, startDate, copyDiv, copyText, alertPages, thisPage, outageAlertCookie;

    privacyAlertCookie = readCookie('privacy-alert-dismissed');
    privacyAlertContainer = $(".privacy-alert-banner");
    cookieAlertCookie = readCookie('cookie-alert-dismissed');
    cookieAlertContainer = $(".cookie-alert-banner");
    outageAlertCookie = readCookie('outage-alert-dismissed');

    privacyAlertExpiryDate = 15357276e5; // July 1st 2018
    outageExpiryDate = 1541512800000;
    currentDate = Date.now();
    startDate = 1541131200000;

    //TODO: Update banner functionality to accept a page paths and visible/hidden status via WordPress controlled parameters.

    // Banner Customisation
    copyDiv = $(".privacy-alert-text");
    copyText = "FreshBooks will be offline Tuesday, Nov. 6th from 6am-9am EST for scheduled maintenance.";
    alertPages = ["/support", "/contact"];
    thisPage = window.location.pathname;

    // Toggle Default Top Banner Status
    // if (!privacyAlertCookie && currentDate <= privacyAlertExpiryDate) {
        //$(privacyAlertContainer).toggleClass("alert-banner-show");
    // }

    // Toggle outage alert banner
    // if (!outageAlertCookie && copyText && alertPages.length > 0 && $.inArray(thisPage, alertPages) !== -1 && currentDate <= outageExpiryDate) {
        // If we have a custom alert with pages specified
        // $(privacyAlertContainer).toggleClass("alert-banner-show");
        // bannerCopy(copyDiv, copyText);
    // }

    if (copyText && currentDate >= startDate && currentDate <= outageExpiryDate) {
        $('.privacy-alert-banner .close-privacy-alert').remove();
        //$(privacyAlertContainer).toggleClass("alert-banner-show");
        bannerCopy(copyDiv, copyText);
   }

    // Toggle Cookie (bottom) Banner Status
    if (!cookieAlertCookie) {
        $(cookieAlertContainer).toggleClass("alert-banner-show");
    }

    // Close banners and set cookies
    $('.close-privacy-alert').click(function() {
        createCookie("privacy-alert-dismissed", "true", 365);
        $(privacyAlertContainer).toggleClass("alert-banner-show");
    });

    $('.close-cookie-alert').click(function() {
        createCookie("cookie-alert-dismissed", "true", 365);
        $(cookieAlertContainer).toggleClass("alert-banner-show");
    });

}
