#!/usr/bin/php
<?php
	function month_index($name)
	{
		$name = lcfirst($name);
		$months = array(1 => "janvier", 2 => "février", 3 => "mars", 4 => "avril", 5 => "mai", 6 => "juin", 7 => "juillet", 8 => "août", 9 => "septembre", 10 =>"octobre", 11 =>"novembre", 12 =>"décembre");
		return (array_search($name, $months));
	}
	function exit_error()
	{
		echo "Wrong Format\n";
		exit;
	}
	if ($argc != 2)
		exit;
	date_default_timezone_set("Europe/Paris");
	$date = explode(" ", $argv[1]);
	if (count($date) != 5)
		exit_error();
	if (!preg_match("/^([L|l]undi|[M|m]ardi|[m|M]ercredi|[j|J]eudi|[v|V]endredi|[s|S]amedi|[d|D]imanche)$/", $date[0]))
		exit_error();
	if (is_numeric($date[1]))
	{
		$day = (int)$date[1];
		if ($day < 1 || $day > 31)
			exit_error();
	}
	else
		exit_error();
	if (!preg_match("/^([J|j]anvier|[F|f]évrier|[M|m]ars|[A|a]vril|[M|m]ai|[J|j]uin|[J|j]uillet|[A|a]oût|[S|s]eptembre|[O|o]ctobre|[N|n]ovembre|[D|d]écembre)$/", $date[2]))
		exit_error();
	$month = month_index($date[2]);
	if (!preg_match("/^([0-9]{4})$/", $date[3]))
		exit_error();
	$year = (int)$date[3];
	if (!preg_match("/^([0-9]{2}:[0-9]{2}:[0-9]{2})$/", $date[4]))
		exit_error();
	$time = explode(":", $date[4]);
	$hour = (int)$time[0];
	$min = (int)$time[1];
	$sec = (int)$time[2];
	if (!checkdate($month, $day, $year))
		exit_error();
	if (!($stamp = mktime($hour, $min, $sec, $month, $day, $year)))
		exit_error();
	echo $stamp."\n";
?>
