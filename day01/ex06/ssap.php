#!/usr/bin/php
<?php
	if ($argc == 1)
		exit();
	$bl = false;
	foreach ($argv as $arg)
	{
		if ($bl == false)
		{
			$bl = true;
			continue;
		}
		$value = trim($arg);
		$splited = preg_split('/ +/',$arg);
		$result = ($result) ? array_merge($result, $splited) : $splited;
	}
	sort($result);
	$result = array_filter($result);
	foreach ($result as $arg)
		echo "$arg\n";
?>
