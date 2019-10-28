#!/usr/bin/php
<?php
	if ($argc != 2)
	{
		echo "Incorrect Parameters\n";
		exit();
	}
	
	$str = trim($argv[1]);
	if (preg_match('/^([+-]?[0-9]+) *([\+\*\/\%\-]) *([+-]?[0-9]+)$/', $str, $matches) == false)
	{
		echo "Syntax Error\n";
		exit();
	}
	$nbr1 = (int )$matches[1];
	$nbr2 = (int )$matches[3];

	if (!strcmp($matches[2], "+"))
		$result = $nbr1 + $nbr2;
	else if (!strcmp($matches[2], "-"))
		$result = $nbr1 - $nbr2;
	else if (!strcmp($matches[2], "*"))
		$result = $nbr1 * $nbr2;
	else if (!strcmp($matches[2], "/"))
		$result = $nbr1 / $nbr2;
	else if (!strcmp($matches[2], "%"))
		$result = $nbr1 % $nbr2;
	echo "$result\n";
?>
