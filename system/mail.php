<?php
function send($from, $to, $subject, $body)
{
	$message = new Swift_Message($subject);
	$message->setFrom($from);
	$message->setTo($to);
	$message->setBody($body);

	// Send the message
	$result = $_SESSION['mailer']->send($message);
}