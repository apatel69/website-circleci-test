import { createCookie, readCookie } from "../../util/helpers";

export default function() {
    const $header_text = $('.header-text');

    $.ajax({
        url: window.holiday_api.base + 'wp/v2/holiday/get-data',
        method: 'GET',
        beforeSend: function ( xhr ) {
            xhr.setRequestHeader( 'X-WP-Nonce', window.holiday_api.nonce );
        },
    }).done( function ( response ) {
        if ( response && response.active && response.count && response.header_text && $header_text.length ) {
            let meal_count = response.count.toString();

            if ( !readCookie('fb_holiday_thank_you') ) {
                updateCount();
                createCookie('fb_holiday_thank_you', 1);
                meal_count = (response.count + 1).toString();
            }

            let formattedCount = meal_count.replace(/^.*$/, function(c) {
                return c.length <= 3 ? c : c.slice(0, c.length - 3) + "," + c.slice(c.length - 3);
            });
            $header_text.text(response.header_text.replace('#!meal_count!#', formattedCount));
        }
    }).always( function () {
        $header_text.removeClass('invisible');
    });

}

function updateCount() {
    $.ajax({
        url: window.holiday_api.base + 'wp/v2/holiday/update-count',
        method: 'POST',
        beforeSend: function ( xhr ) {
            xhr.setRequestHeader( 'X-WP-Nonce', window.holiday_api.nonce );
        },
    });
}
