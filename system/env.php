<?php
session_start();
date_default_timezone_set(getenv('TIMEZONE'));

require_once 'vendor/autoload.php';

// Create the Transport
$args = [getenv('EMAIL_HOST'), getenv('EMAIL_PORT')];
if(getenv('EMAIL_SSL'))
	$args[2] = "ssl";
$transport = new Swift_SmtpTransport(...$args);
$transport->setUsername(getenv('EMAIL_ADDRESS_FROM'));
$transport->setPassword(getenv('EMAIL_PASSWORD'));

// Create the Mailer using your created Transport
$_SESSION['mailer'] = new Swift_Mailer($transport);