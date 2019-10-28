#!/usr/bin/php
<?php
	if ($argc != 2)
		exit();
	$content = '';
	$option = $argv[1];

	while ($readed = fread(STDIN, 10))
		$content .= $readed;
	$array = preg_split('/\n+/', $content);
	$array = array_filter($array);
	if (!strcmp($option, "average"))
	{
		$i = 0;
		$rtn = 0;
		foreach ($array as $line)
		{
			$user =  preg_split('/;/', $line);
			if (strcmp($user[2],"moulinette"))
			{
				if (is_numeric($user[1]))
				{
					$rtn += (int)$user[1];
					$i++;
				}
			}	
		}
		if ($i != 0)
			$rtn = $rtn / $i;
		echo "$rtn\n";
	}
	else if (strcmp($option, "average_user") == 0 || strcmp($option, "moulinette_variance") == 0)
	{
		$i = 1;
		$result = array();
		while ($array[$i])
		{
			$user = preg_split('/;/', $array[$i]);
			if (!check_exist_user($user[0], $result))
				$result[] = add_user($array,$user[0]);
			$i++;
		}
		sort($result);
		if (strcmp($option, "moulinette_variance") == 0)
			$result = difference_peer_moul($result, $array);
		
		foreach ($result as $resu)
			echo "$resu\n";
	}

	function add_user($array, $user_name)
	{
		$i = 1;
		$count = 0;
		$sum = 0;
		while ($array[$i])
		{
			$user = preg_split('/;/',$array[$i]);
			if (strcmp($user[0], $user_name) == 0 && is_numeric($user[1]) && strcmp($user[2], "moulinette") != 0)
			{
				$sum += (int)$user[1];
				$count++;
			}
			$i++;
		}
		if ($count > 0)
		{
			$result = $sum / $count;
			return ($user_name.":".$result);
		}
		else
			return (NULL);	
	}
	function check_exist_user($name, $result)
	{
		foreach($result as $arg)
		{
			$split = explode(":", $arg);
			if (strcmp($name, $split[0]) == 0)
				return (1);
		}
		return (0);
	}

	function difference_peer_moul($result, $array)
	{
		$i = 1;
		while ($array[$i])
		{
			$user = explode(';', $array[$i]);
			if (strcmp($user[2], "moulinette") == 0)
			{
				$result = update_result($user, $result);
			}
			$i++;
		}
		return ($result);
	}
	
	function update_result($user, $result)
	{
		$i = 0;
		while ($result[$i])
		{
			$resu_user = explode(':',$result[$i]);
			if (strcmp($user[0], $resu_user[0]) == 0)
			{
				$value = $resu_user[1] - $user[1];
				$result[$i] = $resu_user[0].':'.$value;
			}
			$i++;
		}	
		return ($result);
	}
?>
