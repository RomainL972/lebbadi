<?php
function sql_connect()
{
	$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

	$server = $url["host"];
	$username = $url["user"];
	$password = $url["pass"];
	$db = substr($url["path"], 1);

	return new mysqli($server, $username, $password, $db);	
}

function query($req, $content=NULL)
{
	$sql = sql_connect();
	if (is_null($content)) {
		return $sql->query($req);
	}
	$req = $sql->prepare($req);
	call_user_func([$req, 'bind_param'], $content);
	$req->execute();
	return $req->get_result();
}