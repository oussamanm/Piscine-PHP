<?php
    $vrb = array();
    $value = array();
    if ($_GET)
    {
        foreach($_GET as $key => $value)
        {
            $vrb[] = $key;
            $val[] = $value;
        }
    }
    if ($_GET["action"] == "set")
	{
		if ($_GET["name"] != "")
        	setcookie($_GET["name"], $_GET["value"], time()+3600);
    }
    else if ($_GET["action"] == "get")
	{
		if ($_GET["name"] != "" && $_COOKIE[$_GET["name"]] != "")
        	echo $_COOKIE[$_GET["name"]]."\n";
    }
    else if ($_GET["action"] == "del")
	{
        setcookie($_GET["name"], NULL, -1);
    }
?>
