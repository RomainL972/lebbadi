<?php
function index()
{
	head();
	?>
<h1>Linux &gt; Windows</h1>
<p>Hi and welcome to the Lebbadi's website! Here are my different projects</p>
<ul>
	<li><a href='http://radio.lebbadi.fr'>Algo Médecine</a></li>
	<li><a href="http://ljsc.herokuapp.com">Le Journal du Séminaire Collège</a></li>
	<li><a href="mailto:technical-assistance@lebbadi.fr">Adresse e-mail pour assistance sur un ordinateur</a></li>
	<li><a href="/kindle">Cours Kindle</a></li>
	<li><a href="/mails-passwords">Changement de mot de passe des adresses @lebbadi.fr</a></li>
	<li><a href="/public/pubkey.asc">Ma clé GnuPG</a></li>
</ul>
	<?php
	foot();
}