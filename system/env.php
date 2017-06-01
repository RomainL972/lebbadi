<?php
session_start();
date_default_timezone_set('America/Martinique');

require_once 'vendor/autoload.php';

// Create the Transport
$transport = new Swift_SmtpTransport('ssl0.ovh.net', 465, "ssl");
$transport->setUsername('romain@lebbadi.fr');
$transport->setPassword('JADOreovh');

// Create the Mailer using your created Transport
$_SESSION['mailer'] = new Swift_Mailer($transport);