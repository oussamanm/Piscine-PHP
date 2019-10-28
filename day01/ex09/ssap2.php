#!/usr/bin/php
<?php
	function check_type($c)
	{
		if ($c >= '0' && $c <= '9')
			return (0);
		else if (($c >= 'a' && $c <= 'z') || ($c >= 'A' && $c <= 'Z'))
			return (1);
		else
			return (2);
	}
	if ($argc == 1)
		exit();
	$i = 1;
	$result = array();
	$tab_num = array();
	$tab_alph = array();
	$tab_spec = array();

	while ($argv[$i])
	{
		$temp = preg_split('/ +/', $argv[$i]);
		$temp = array_filter($temp);
		if ($i == 1)
			$result = $temp;
		else
			$result = array_merge($result, $temp);
		$i++;
	}
	foreach ($result as $arg)
	{
		$i = check_type($arg[0]);
		if ($i == 0)
			$tab_num[] = $arg;
		else if ($i == 1)
			$tab_alph[] = $arg;
		else
			$tab_spec[] = $arg;
	}
	sort($tab_alph);
	sort($tab_num);	
	sort($tab_spec);
	foreach($tab_alph as $arg)
		echo "$arg\n";
	foreach($tab_num as $arg)
		echo "$arg\n";
	foreach($tab_spec as $arg)
		echo "$arg\n";
?>
