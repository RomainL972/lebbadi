<?php
function index()
{
	head();
	?>
	<h1>Changement de mot de passe</h1>
	<p>Merci de remplir ce formulaire pour changer le mot de passe de votre adresse @lebbadi.fr</p>
	<form action="/mails-passwords/post" method="post">
		<p>Nom dutilisateur<br>
		<input name="username"></p>
		<p>Ancien mot de passe<br>
		<input type="password" name="old_password"></p>
		<p>Nouveau mot de passe<br>
		<input type="password" name="password"></p>
		<p>Confirmation du mot de passe<br>
		<input type="password" name="password_confirm"></p>
		<p><input type="submit" value="Confirmer"></p>
	</form>
	<?php
	foot();
}

function post()
{
	$origin = '/mails-passwords';
	extract($_POST, EXTR_SKIP);
	if(!isset($password) or !isset($username) or !isset($old_password) or !isset($password_confirm))
		error("Formulaire incorrect", $origin);
	if(empty($password) or empty($username) or empty($old_password) or empty($password_confirm))
		error("Tous les champs sont obligatoires", $origin);
	$username = str_replace('@lebbadi.fr', '', $username);
	if($password != $password_confirm)
		error("Les mots de passe ne se correspondent pas", $origin);
	if($password == $old_password)
		error("Vous avez entré le même mot de passe", $origin);
	$password_hash = hash_hmac('ripemd128', $old_password, 'qwerty');
	if(query("SELECT password FROM `mail_users` WHERE password=? AND username=?", [$password_hash, $username])->num_rows) {
		send([getenv('EMAIL_ADDRESS_FROM') => getenv('NAME_FROM')], [getenv('EMAIL_ADDRESS_TO') => getenv('NAME_TO')], "Change mail password", "$username wants to change his password to $password, the old one was $old_password");
		success("Votre mot de passe sera modifié d'ici 24h", $origin);
	}
	else
		error("Nom dutilisateur ou mot de passe incorrect", $origin);
}