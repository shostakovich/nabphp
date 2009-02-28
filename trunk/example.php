<?php
include_once 'NabChor.class.php';
include_once 'NabPHP.class.php';

$serial = "0019DB9DF08D";
$token = "1227184133";

// Get instance of NabPHP
$api = new NabPHP($serial, $token);

// Validate Credentials
if($api->validateCredentials())
{
  $api->sendTts("Yippie! You have valid credentials");
}

// Let your nabaztag say your name

$api->sendTts("My name is" . $api->getRabbitName());

// Build a chor and send it
$chor = new NabChor(1);
$chor->addEar(0,1,180,0)
     ->addEar(1,0,180,1)
     ->addEar(5,0,30,0);

$api->sendChor($chor);
unset($chor);

$api->sendTts("Hello, this is a test!");

// Get an array of your selected languages
printf("My selected languages are: %s", implode("",$api->getSelectedLanguages()));


// Build a chor with blinking light
$blue = array(51,0,204);
$green = array(0,102,51);

$leds = new NabChor(1);
$leds->addLed(0, 0, $blue)
     ->addLed(0, 1, $green)
     ->addLed(5 , 0, $green)
     ->addLed(5, 1, $blue);

$api->sendChor($leds);




?>