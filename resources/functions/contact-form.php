<?php

/**
 * Function to send email with data from contact form submission using AJAX
 *
 * @return object
 */

function send_email($request)
{
    $name = sanitize_text_field($request->get_param('name'));
    $email = sanitize_email($request->get_param('email'));
    $company = sanitize_text_field($request->get_param('company'));
    $comment = sanitize_text_field($request->get_param('comment'));
    $captcha_response = $request->get_param('g-recaptcha-response');
    $retrieved_nonce = $request->get_param('_wpnonce_contact');

    $to = sanitize_email(get_field('email_address', 'option'));

    /**
     * Check if the fields are empty
     */

     if(empty($name) || empty($email) || empty($company) || empty($comment)) {
        $response = new WP_REST_Response(array('message' => 'Some fields are empty'));
        $response->set_status(400);
        return $response;
     }

    /**
     * Check if the Recaptcha is empty
     */

    if(empty($captcha_response)) {
        $response = new WP_REST_Response(array('message' => 'Empty captcha'));
        $response->set_status(400);
        return $response;
    }
    else {
        $notverified = !verify_recaptcha($captcha_response);
        if($notverified) {
            $response = new WP_REST_Response(array('message' => 'Invalid Captcha'));
            $response->set_status(400);
            return $response;
        }
    }

    /**
     * Verify nonce
     */

    if (isset($retrieved_nonce) && !wp_verify_nonce($retrieved_nonce, 'submit_contact_form')) {
        $response = new WP_REST_Response(array('message' => 'Empty or Invalid nonce'));
        $response->set_status(400);
        return $response;
    }

    try {

        $html = email_template($name, $email, $company, $comment);
        $subject = "Inquiry from $name";
        
        $headers = array(
            'From: '.$name.' <'.$email.'>',
            'Content-Type: text/html; charset=UTF-8;',
        );

        add_filter( 'wp_mail_content_type', 'set_html_content_type' );

        $mail = wp_mail( $to, $subject, $html, $headers );

        remove_filter( 'wp_mail_content_type', 'set_html_content_type' );

        if($mail) {
            $response = new WP_REST_Response(array('message' => 'Success'));
            $response->set_status(200);
        }
        else {
            $response = new WP_REST_Response(array('message' => 'Something went wrong. Try again'));
            $response->set_status(400);
        }
        
        return $response;

    } catch (Exception $ex) {
        $response = new WP_REST_Response(array('message' => 'Something went wrong. Try again'));
        $response->set_status(400);
        return $response;
    }
}

/**
 * Verify recaptcha response from form with Google. More info on https://developers.google.com/recaptcha/docs/verify
 *
 * @return boolean
 */
function verify_recaptcha($captcha_response) {

    $secret = get_field('google_recaptcha_keys', 'option')['secret_key'];

    $response = wp_remote_post('https://www.google.com/recaptcha/api/siteverify', array(
        'body' => array(
            'secret' => $secret,
            'response' => $captcha_response
        ),
    ));

    if ( is_wp_error( $response )) {
        return false;
     } else {
         
        $resp_body = wp_remote_retrieve_body($response);
        $data = json_decode($resp_body);

        if($data->success == 'true') {
            return true;
        }
        else {
            return false;
        }
     }

}

/**
 * Set email content type
 * 
 * @return string
 */
function set_html_content_type() {
    return 'text/html';
}

/**
 * Function to build HTML using arguments to be sent with wp_mail()
 * 
 * @param  string  $name 
 * @param  string $email
 * @param  string  $company
 * @param  string  $comment
 * @return string
 */
function email_template($name, $email, $company, $comment)
{
    $template = "<!DOCTYPE html>
    <html>
      <head>
        <meta charset='UTF-8'>
        <title>Inquiry from {$name}</title>
      </head>
      <body>
        <p><strong>Name: </strong>{$name}</p>
        <p><strong>Email: </strong>{$email}</p>
        <p><strong>Organization: </strong>{$company}</p>
        <p><strong>Commment: </strong>{$comment}</p>
      </body>
    </html>";

    return $template;
}

/**
 * Register rest endpoint for contact form
 */

add_action('rest_api_init', function () {
    register_rest_route('contact', '/send/', array(
        'methods' => 'POST',
        'callback' => 'send_email'
    ));
});
