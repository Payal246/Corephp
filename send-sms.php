<?php
error_reporting (E_ERROR);

require_once 'C:/xampp/htdocs/payal/Corephp/vendor/autoload.php';
use Twilio\Rest\Client;


$sid ="AC00ce60f53e11063cf37797481fc784a5";
// print_r($sid);
// exit;
$token = "1c25b3452d4dc7b4f3e77b36826aca8b";
$twilio = new Client($sid, $token);

$message = $twilio->messages
                  ->create("+919904140232", // to
                           [
                               "body" => "Congratulations ! Your registration is successfull.",
                               "from" => "+16572438080"
                           ]
                  );

