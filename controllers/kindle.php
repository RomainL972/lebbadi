<?php
function index(){
	head('Cours Kindle');
	?>
<form action="/kindle/post" method="post">
	<p>Titre :<br>
	<input name="titre"></p>
	<p>Contenu :<br>
	<textarea name="texte"></textarea></p>
	<p>Matière : <select name="matiere">
		<?php
		$subjects = ["Français", "Anglais", "Espagnol", "Mathématiques", "Physique", "Chimie", "SVT", "SES"];
		foreach($subjects as $subject){
			echo "<option value=".$subject.">".$subject."</option>";
		}
		?>
	</select></p>
	<p><input type="submit" value="Télécharger"></p>
</form>
	<?php
}

function post(){
	$origin = '/kindle';
	extract($_POST, EXTR_SKIP);
	if(!isset($titre) or !isset($texte) or !isset($matiere)){
		error("Le formulaire est incorrect", $origin);
	}
	if(empty($titre) or empty($texte) or empty($matiere)){
		error("Un des champs est vide", $origin);
	}
	$subjects = ["Français", "Anglais", "Espagnol", "Mathématiques", "Physique", "Chimie", "SVT", "SES"];
	if(!in_array($matiere, $subjects)){
		error("La matière seléctionnée n'existe pas", $origin);
	}
	$titre = $matiere." le ".date('d')."/".date('m')."/".date('Y');
	$file = fopen('/tmp/'.$titre.'.txt', 'w+');
	fwrite($file,$titre."\n".$texte); 
	fclose($file);
	redirect('/tmp/'.$titre.'.txt', 'w+');
}
