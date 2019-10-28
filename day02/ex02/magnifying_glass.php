#!/usr/bin/php
<?php
	function upper_matches($matches)
	{
		return (strtoupper($matches[0]));
	}
	
	if ($argc < 2)
		exit();
	$arg = $argv[1];
	$content = "";
	$handle = fopen($arg, "r");
	while (($line = fread($handle, 1)) != NULL)
	{
		$content .= $line;
		$line = NULL;
	}
	$res = preg_replace_callback('/(<a(.*?)>)(.*?)(<\/a(.*?)\>)/s', function ($matches)
		    {
				$val = preg_replace_callback('/(\>(.*?)\<)|(\>(.*?)\<)/', "upper_matches", $matches[0]);
				$val = preg_replace_callback('/(?<=title=[\"|\'])(.*?)(?=[\"|\'])/', "upper_matches", $val);
				return ($val);
			}, $content);
	echo $res;
?>
