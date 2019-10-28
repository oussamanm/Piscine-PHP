#!/usr/bin/php
<?php
	if ($argc != 4)
	{
		echo "Incorrect Parameters\n";
		exit();
	}
	$argv[1] = trim($argv[1]);
	$argv[2] = trim($argv[2]);
	$argv[3] = trim($argv[3]);

	if (strcmp($argv[2], "+") == 0)
		$rtn = (int )$argv[1] + (int )$argv[3];
	else if (strcmp($argv[2] ,"-") == 0)
		$rtn = (int )$argv[1] - (int )$argv[3];
	else if (strcmp($argv[2], "*") == 0)
		$rtn = (int )$argv[1] * (int )$argv[3];
	else if (strcmp($argv[2], "/") == 0)
		$rtn = (int )$argv[1] / (int )$argv[3];
	else if (strcmp($argv[2], "%") == 0)
		$rtn = (int )$argv[1] % (int )$argv[3];
	echo "$rtn\n";
?>
