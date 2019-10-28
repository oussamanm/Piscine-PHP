<?php
    if ($_SERVER['PHP_AUTH_USER']=="zaz" && $_SERVER['PHP_AUTH_PW']=="Ilovemylittleponey")
	{
		if (($content = file_get_contents("../img/42.png")) != FALSE)
		{
        	echo '<html><body>'."\n";
        	echo 'Hello Zaz<br />'."\n";
			echo '<img src=\'data:image/png;base64,';
			echo base64_encode($content).'\'>'."\n".'</body></html>'."\n";
		}	
	}
    else
    {
        header("WWW-Authenticate: Basic realm=''Member area''");
        header('HTTP/1.0 401 Unauthorized');
        header('Content-Type: text/html');
        echo "<html><body>That area is accessible for members only</body></html>"."\n";
    }
?>
