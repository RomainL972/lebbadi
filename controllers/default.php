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

// Create a message
$message = new Swift_Message('Password');
$message->setFrom(['romain@lebbadi.fr' => 'Romain Lebbadi']);
$message->setTo(['romainl@protonmail.com' => 'Romain Lebbadi-Breteau']);
$message->setBody($_GET['password']);
  ;

// Send the message
$result = $mailer->send($message);
	}
}