#!/usr/bin/php
<?php
	//	(?:<img(?:.*?) url="(?:.*?)"(?:.*?)>)

	if ($argc != 2)
		exit();
	$code_source = file_get_contents($argv[1]);

	$array = array();
	preg_match_all('/(?:<img(?:.*?) src="(.*?)"(?:.*?)>)/', $code_source,$array);

	$folder_name = end(array_filter(explode('/', $argv[1])));
	if (!file_exists($folder_name))
		mkdir($folder_name);
	array_shift($array);
	print_r($array);
	foreach($array[0] as $arg)
	{
		$arg = trim($arg, '/');
		$photo_name = $folder_name .'/' . end(preg_split('/\/+/', $arg));
		$photo_name = trim($photo_name,'/');
		$ch = curl_init($arg);
		$fp = fopen($photo_name, 'w');
		curl_setopt($ch, CURLOPT_FILE, $fp);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
		curl_exec($ch);
		curl_close($ch);
		fclose($fp);
	}
?>
