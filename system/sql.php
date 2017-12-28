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
	function makeValuesReferenced(&$arr)
    {
        $refs = array();
        foreach($arr as $key => $value)
            $refs[$key] = &$arr[$key];
        return $refs;
    }

    function paramtypes($val)
    {
            $types = '';                        //initial sting with types
            foreach($val as $para) 
            {     
                if(is_int($para)) {
                    $types .= 'i';              //integer
                } elseif (is_float($para)) {
                    $types .= 'd';              //double
                } elseif (is_string($para)) {
                    $types .= 's';              //string
                } else {
                    $types .= 'b';              //blob and unknown
                }
            }
            return $types;
    }

	$sql = sql_connect();

	if (is_null($content)) {
		return $sql->query($req)/* or error("Query error : ".$sql->error(), '/', __LINE__, __FILE__)*/;
	}
	$req = $sql->prepare($req) or error($sql->error, '/', __LINE__, __FILE__);
	$content = array_merge([paramtypes($content)], $content);
	call_user_func_array([$req, 'bind_param'], makeValuesReferenced($content))/* or error("bind_param error".$sql->error(), '/', __LINE__, __FILE__)*/;
	$req->execute() or error($sql->error, '/', __LINE__, __FILE__);
	return $req->get_result();
}