<?php

namespace App;

use DateTime;
use Carbon\Carbon;
use Sober\Controller\Controller;
use \Firebase\JWT\JWT;

/**
 * Class that only executes for Webinars page
 * Uses blade file name to expose upcoming webinars array
 */
class Webinars extends Controller
{

    /**
     * API URL
     */
    protected static $api_url = "https://api.zoom.us/v2/";

    /**
     * Build API url for GoToWebinar Rest Call
     *
     * @return string
     */
    protected static function buildEndpoint() {
        $organizerid = sanitize_text_field(get_field('zoom_webinar', 'option')['user_id']);

        return self::$api_url.'users/'.$organizerid.'/webinars';
    }

    protected static function buildWebinarEndpoint($id) {
        return self::$api_url . 'webinars/' . $id;
    }

    /**
     * Get JSON Web Token
     *
     * @return  object  JSON Web Token
     */
    protected static function getJWToken() {
        // Zoom API provided Key and Secret, saved in ACF WP settings
        $key = sanitize_text_field(get_field('zoom_webinar', 'option')['api_key']);
        $secret = sanitize_text_field(get_field('zoom_webinar', 'option')['api_secret']);

        // Set token value and expiration time
        $token = [
            'iss'   => $key,
            'exp'   => time() + 60 // 1 min expiration
        ];

        return JWT::encode($token, $secret);
    }

    /**
     * Request Page Limit
     *
     * Get set result limit and page, determine the maximum number of webinars to display, and which page of webinars to apply limit to.
     * @return  string  Count limit URI Query for API request
     */
    protected static function requestPageLimit() {
        // Get page limit set by WP ACF settings, else default to 10 shown webinars
        $setting = get_field('webinars_to_show', 'option');
        $size = $setting ? sanitize_text_field($setting) : '10';
        $page = sanitize_text_field('1');

        $return = $size ? 'page_size=' . $size . '&page_number=' . $page : 'page_size=10&page_number=1';

        return $return;
    }

    /**
     * REST API Request to GoToWebinar
     *
     * @return  object  wp response
     */
    protected static function requestUpcomingWebinars() {
        // Get API request query values
        $access_token = 'access_token=' . self::getJWToken();
        $url = self::buildEndpoint();
        $page_size = self::requestPageLimit();
        $api_url = $url . '?' . $page_size . '&' . $access_token;
        $args = [
            'headers' => [
                'Authorization: Bearer ' . $access_token
            ]
        ];

        // Make the API call to get the webinar list
        $response = wp_remote_get($api_url, $args);

        // Check for status/error message
        if (is_wp_error($response)) {
            $response = new WP_REST_Response(['message' => 'Wordpress Error']);
            $response->set_status(400);
        } else {
            $response = self::checkApiResponse($response);
        }

        return $response;
    }

    /**
     * Check api response and return custom obj for error handling
     *
     * @return  object  Error or Response object
     */
    protected static function checkApiResponse($response) {
        $response_code = wp_remote_retrieve_response_code($response);
        $body = wp_remote_retrieve_body($response);
        $headers = wp_remote_retrieve_headers($response);
        $response_msg = $response['response']['message'];

        if ($response_code == 200 && $response_msg == 'OK') {
            $body = json_decode($body);

            $obj = (object) [
                'code'      => $response_code,
                'message'   => $response_msg,
                'data'      => $body,
            ];
        } else {
            $obj = (object) [
                'code'      => $response_code,
                'message'   => $response_msg,
            ];
        }

        return $obj;
    }

    /**
     * Build upcoming webinars data from response
     * This function is used in blade files to get webinars
     * @return  array   Array of available webinar details
     */
    public static function upcomingWebinars() {
        // Get information of available webinars
        $webinars = [];
        $webinars_data = self::requestUpcomingWebinars();

        if (!isset($webinars_data->data)) {
            $webinars_response = (Object) [
                'message' => $webinars_data->message,
            ];
            return $webinars_response;
        }

        foreach ($webinars_data->data->webinars as $key => $webinar) {
            // If recurring, get next recurring date (default shows last for some reason)
            if ($webinar->type == 6 || $webinar->type == 9) {
                $webinar->start_time = self::getNextRecurring($webinar);
            }

            // Check if webinar has already passed, and remove if true
            if (!$webinar->start_time || self::expiredCheck($webinar->start_time, $webinar->duration)) {
                continue;
            }

            // Get relevant webinar details
            $topic = $webinar->topic;
            $webinarLink = esc_url($webinar->join_url);
            $timezone = $webinar->timezone;
            $webinarStartDateTime = $webinar->start_time;
            $duration = $webinar->duration;

            // Determine the end DateTime for the webinar
            $endDate = new DateTime($webinarStartDateTime);
            $endDate = $endDate->modify('+' . $duration . ' minutes');
            $webinarEndDateTime = $endDate->format(DateTime::ISO8601);

            // Get formatted date and time values for webinar display
            $estDateTime = self::getDateTime($webinarStartDateTime, $webinarEndDateTime, $timezone);

            $webinars[] = [
                'topic'             => $webinar->topic,
                'url'               => esc_url($webinar->join_url),
                'timezone'          => $estDateTime->timezone,
                'start_time'        => $estDateTime->start_time,
                'end_time'          => $estDateTime->end_time,
                'date'              => $estDateTime->date,
                'duration'          => $webinar->duration
            ];
        }

        // Data to display
        $webinars_response = (Object) [
            'message'   => $webinars_data->message,
            'webinars'  => $webinars,
        ];

        return $webinars_response;
    }

    /**
     * Check if Expired
     *
     * Check if the webinar has already passed, as the Zoom API lists those as well.
     * @param   string  $datetime   Datetime String
     * @param   int     $duration   Duration of webinar in minutes
     * @return  bool                True if expired, false if still upcoming
     */
    protected static function expiredCheck($datetime, $duration) {
        $end = new DateTime($datetime);
        $end = $end->modify('+' . $duration . ' minutes');
        $webinar_end = $end->format(DateTime::ISO8601);

        $now = new DateTime('NOW');
        $now_date = $now->format(DateTime::ISO8601);

        if ($now_date > $webinar_end) {
            return true;
        }
        return false;
    }

    /**
     * Get Next Reccurring
     *
     * Reccurring meetings send back the last reccurring date, here we make another API call to get all details
     * about a given webinar, and then determine and return the next upcoming webinar start time.
     * @param   Object  $webinar    Object of details for given webinar
     * @return  string              Next start time string
     */
    protected static function getNextRecurring($webinar) {
        // Retrieve webinar details
        $access_token = 'access_token=' . self::getJWToken();
        $url = self::buildWebinarEndpoint($webinar->id);
        $api_url = $url . '?' . $access_token;
        $args = [
            'headers' => [
                'Authorization: Bearer ' . $access_token
            ]
        ];

        // Make the API call to get the webinar list
        $response = wp_remote_get($api_url, $args);

        // Check for status/error message
        if (is_wp_error($response)) {
            $response = new WP_REST_Response(['message' => 'Wordpress Error']);
            $response->set_status(400);
            return $response;
        } else {
            $response = self::checkApiResponse($response);
        }

        $occurrences = (Array)$response->data->occurrences;

        // Get current DateTime
        $now_date_time = new DateTime('NOW');
        $now_string = $now_date_time->format(DateTime::ISO8601);

        if (!empty($occurrences)) {
            // Return the next occurence start time
            foreach ($occurrences as $occurence) {
                if ($occurence->status != 'deleted') {
                    $start_date_time = new DateTime($occurence->start_time);
                    $start_string = $start_date_time->format(DateTime::ISO8601);
                    if ($now_string < $start_string) {
                        return $occurence->start_time;
                    }
                }
            }
        }

        return false;
    }

    /**
     * Function to get formatted date and time of webinar in eastern local timezone
     * @param   string  $start
     * @param   string  $end
     * @param   string  $timezone
     * @return  object
     */
    protected static function getDateTime($start, $end, $timezone) {
        $dateTimeArr = [];

        $webinarstart = self::parseDate($start);
        $webinarend = self::parseDate($end);

        $webinarstart = self::setTimeZone($webinarstart, $timezone);
        $webinarend = self::setTimeZone($webinarend, $timezone);

        $formatted_date = $webinarstart->format('l F j, Y');

        $tz = $webinarstart->format('T'); // this will always be EDT since we are setting it in setTimeZone

        $startTime = self::formatTime($webinarstart);
        $endTime = self::formatTime($webinarend);

        $dateTimeArr = (object) [
            'date'          => $formatted_date,
            'start_time'    => $startTime,
            'end_time'      => $endTime,
            'timezone'      => $tz,
        ];

        return $dateTimeArr;
    }

    /**
     * Parse the date using carbon libray
     * @param   string
     * @return  object
     */
    protected static function parseDate($date) {
        return Carbon::parse($date);
    }

    /**
     * Supply timezone from GoToWebianar API and convert into Eastern time
     * @param   DateTime  $dateTime Carbon parsed datetime
     * @param   string    $timezone Timezone from GoToWebinar
     * @return  string              DateTime in EDT
     */
    protected static function setTimeZone($dateTime, $timezone) {
        $tz = ($timezone == 'uk') ? 'Europe/London' : $timezone; // this condition was added as it was earlier configured on statamic aka probably API responds with uk in the case if webinar time is London local time
        return $easternDateTime = $dateTime->tz($tz)->setTimezone('America/Toronto');
    }

    /**
     * Format time
     * @param   DateTime  $dateTime Carbon parsed date
     * @return  string
     */
    protected static function formatTime($dateTime) {
        return $dateTime->format('g:i a');
    }
}
