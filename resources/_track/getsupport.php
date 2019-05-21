<?php
//Set the timezone, in case the server is ever flipped to UTC
date_default_timezone_set('America/Toronto');
$results = ['support' => true, 'time' => date('h:ia \o\n l')];
header('Content-Type: application/json' );
echo json_encode($results);
