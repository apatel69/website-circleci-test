<?php

function sendNiceReply()
    {
        $apiSecret = get_field('nice_reply_api_secret', 'option');
        $surveyId = (int)get_field('nice_reply_survey_id', 'option');
 
        $apiUrl = "https://api.nicereply.com/v1/csat/ratings";
        $extraQuestionId = 881;

        $queryStringParams = $_SERVER['QUERY_STRING'];
        parse_str($queryStringParams, $niceReplyParameters);
       
        $user = $niceReplyParameters['user'];
        $ticketId = $niceReplyParameters['ticketid'];
        $supportExperienceScore = $niceReplyParameters['supportExperienceScore'];
        $productFeedbackScore = $niceReplyParameters['productFeedbackScore'];
        $comment = $niceReplyParameters['comment'];

        $jsonArray = array(
            'from' => '/nicereply on freshbooks.com',
            'survey_id' => $surveyId,
            'user' => array('username' => $user),
            'ticket' => $ticketId,
            'score' => $supportExperienceScore,
            'comment' => $comment
        );

        if (!empty($productFeedbackScore)) {
            $jsonArray['extra_questions'] = array(
                array(
                    'id' => $extraQuestionId,
                    'score' => $productFeedbackScore
                )
           );
        }

        $data_string = json_encode($jsonArray);

        $curl = curl_init($apiUrl);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Authorization: Basic ' . base64_encode(":$apiSecret"),
            'Accept: application/json',
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string))
        );

        $result = json_decode(curl_exec($curl), true);

        if (array_key_exists('_results', $result)) {
            return true;
        }

        if (array_key_exists('errors', $result)) {
            error_log('nicereply error: ' . implode(" ", $result['errors']));
        }
        return false;
    }


add_action('rest_api_init', function () {
    register_rest_route('nicereply', '/send/', array(
        'methods' => 'POST',
        'callback' => 'sendNiceReply'
    ));
});