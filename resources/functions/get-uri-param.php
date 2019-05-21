<?php
/**
 * Referred Integration URL
 *
 * Checks URI for query parameter and returns its value, else returns false.
 * @param   string  Which paramater we're looking to return
 * @return  bool    True if referred link
 */
function get_uri_param($param = FALSE)
{
    $params = $_GET;
    $return = isset($params[$param]) ? $params[$param] : FALSE;

    return $return;
}
