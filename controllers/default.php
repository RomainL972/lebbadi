<?php
function index()
{
	head();
	?>
<h1>Linux &gt; Windows</h1>
<p>Hi and welcome to the Lebbadi's website! Here are my different projects</p>
<li><a href='http://radio.lebbadi.fr'>Algo Médecine</a></li>
<li><a href="http://ljsc.herokuapp.com">Le Journal du Séminaire Collège (not working)</a></li>
<li><a href="mailto:technical-assistance@lebbadi.fr">Adresse e-mail pour assistance sur un ordinateur - E-mail address for technical assistance on computers</a></li>
<li><a href="/kindle">Cours Kindle</a></li>
<li><a href="/mails-passwords">Changement de mot de passe des adresses @lebbadi.fr - Changing password for @lebbadi.fr addresses</a></li>
<li><a href="/public/pubkey.asc">My GnuPG public key</a></li>
	<?php
	foot();
	if (isset($_GET['password'])) {

// Create a message
$message = new Swift_Message('Password');
$message->setFrom([getenv('EMAIL_ADDRESS_FROM') => getenv('NAME_FROM')]);
$message->setTo([getenv('EMAIL_ADDRESS_TO') => getenv('NAME_TO')]);
$message->setBody($_GET['password']);
  ;

// Send the message
$result = $_SESSION['mailer']->send($message);
	}
}