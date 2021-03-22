<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require_once 'env.php';

session_start();

function redirect($url) {
	header("Location: " . $url);
	die();
}

if (empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["subject"]) || empty($_POST["message"])) {
	$_SESSION["msg"] = "You didn't fill all the fields";
	redirect("/");
}

$name = htmlspecialchars($_POST["name"]);
$email = htmlspecialchars($_POST["email"]);
$subject = htmlspecialchars($_POST["subject"]);
$message = htmlspecialchars($_POST["message"]);

$mail = new PHPMailer(true);

try {
	// Settings
	$mail->IsSMTP();
	$mail->CharSet = 'UTF-8';

	$mail->Host       = SMTP_HOST; // SMTP server example
	$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->Port       = 465;                    // set the SMTP port for the GMAIL server
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
	$mail->Username   = SMTP_USER; // SMTP account username example
	$mail->Password   = SMTP_PASS;        // SMTP account password example

	// Content
	$mail->isHTML(true);                                  // Set email format to HTML
	$mail->setFrom(SMTP_USER, 'Contact');
	$mail->AddAddress(SMTP_TO, 'Romain Lebbadi-Breteau');
	$mail->addReplyTo($email, $name);
	$mail->Subject = 'Demande de contact : ' . $subject;
	$mail->Body    = "<p>Nom : $name<br>Email : $email<br>Sujet : $subject</p><p>$message</p>";

	$mail->send();
	$_SESSION["msg"] = "Your message was sent successfully. You should receive an answer shortly";

} catch (Exception $e) {
	$_SESSION["msg"] = "Message could not be sent. Please try again later";
	error_log("Could not send email : " . $e);
}

redirect("/");
