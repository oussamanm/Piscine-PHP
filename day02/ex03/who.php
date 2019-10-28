#!/usr/bin/php
<?php
	date_default_timezone_set('Africa/Casablanca');

	$handle = fopen("/var/run/utmpx","r");
	if ($handle == FALSE)
		exit();
	$escap_header = 2;
	while ($line = fread($handle, 628))
	{
		if ($escap_header)
		{
			$escap_header--;
			continue ;
		}
		#unpack data 
		$array = unpack('a256_title/a4_id/a32_term/i_pid/s_type/s_unknown/i_time/@', $line);
		
		if (strcmp($array["_type"], "7") == 0)
			echo $array["_title"]." ".$array["_term"]." ".date("M d H:i", $array["_time"])."\n";
	}

?>
