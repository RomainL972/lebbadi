<?php

require_once 'system/includes.php';

//Récupère le nom du fichier et la fonction à éxecuter
$query_args 	= explode('/', substr($_SERVER['REDIRECT_URL'], 1));
$controller 	= empty($query_args[0]) ? 'default' : urldecode($query_args[0]);
$action 			= empty($query_args[1]) ? 'index' : urldecode($query_args[1]);

if (!file_exists('controllers/'.$controller.'.php')) {
	error('Le fichier n\'existe pas');
}

require_once 'controllers/'.$controller.'.php';

if ($controller == 'kindle' && !function_exists($action)) {
	$action = 'file_get';
}

else if (!function_exists($action)) {
	error('La fonction n\'existe pas');
}

call_user_func($action);