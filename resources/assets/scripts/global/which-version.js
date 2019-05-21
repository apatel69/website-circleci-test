function whichVersionURL(path) {
  return "/which-version?path=%2F" + encodeURIComponent(path);
}

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
  //if cookie not set, go to which-version page
  if (!readCookie("fb_platform")) { // eslint-disable-line

    var urls = ["addons-new", "addons", "support", "api", "developers"];

    $.each(urls, function() {
      $("a[href='" + window.location.href + this + "']").attr(
        "href",
        whichVersionURL(this)
      );
    //   console.log(window.location.href + this); // eslint-disable-line
    });

    $(document.body).not(".support-page,.tax-support_categories,.support-template-default").find("a[href='https://support.freshbooks.com']").attr(
      "href",
      whichVersionURL("https://support.freshbooks.com")
    );
  }
}
