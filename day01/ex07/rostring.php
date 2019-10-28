#!/usr/bin/php
<?php
	if ($argc == 1)
		exit();
	$i = 1;
	$result = NULL;
	$arrays = preg_split('/ +/', $argv[1]);
	$arrays = array_filter($arrays);
	if ($arrays[0])
		$result = $arrays[0];
	while ($arrays[$i])
	{
		echo "$arrays[$i] ";
		$i++;
	}
	if ($result)
		echo "$result\n";
?>
