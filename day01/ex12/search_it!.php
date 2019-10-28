#!/usr/bin/php
<?php
	if ($argc == 1)
	{
		exit();
	}

	$key = $argv[1];
	$value = NULL;

	$i = 2;
	while ($argv[$i])
	{
		preg_match('/(.+):(.+)/', $argv[$i], $array);
		if (strcmp($array[1], $key) == 0)
		{
			$value = $array[2];
		}
		$i++;
	}
	if ($value)
		echo "$value\n";
?>
