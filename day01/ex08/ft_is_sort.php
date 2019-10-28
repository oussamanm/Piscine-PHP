#!/usr/bin/ls
<?php
	function ft_is_sort($arrays)
	{
		$src = $arrays;
		sort($arrays);
		if ($src == $arrays)
			return true;
		else
			return false;
	}
?>
