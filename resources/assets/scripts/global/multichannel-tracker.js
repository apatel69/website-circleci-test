/* eslint-disable */

export default function() {
  var marketingUrl = '/wp-content/themes/freshbooks/resources/_track/marketing.php';
  var landingUrl = window.location.href;
  var referringUrl = document.referrer;
  var body = 'landing_url=' + encodeURIComponent(landingUrl) + '&referring_url=' + encodeURIComponent(referringUrl);

  if (typeof deferTracking == 'undefined' || !deferTracking) {
    // Marketing cookies
    var marketingXHR = $.ajax({
      type: "POST",
      url: marketingUrl,
      data: body,
      xhrFields: {
        withCredentials: true
      },
      dataType: 'json',
    });
  }
}
