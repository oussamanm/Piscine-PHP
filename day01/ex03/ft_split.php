#!/usr/bin/php
<?php
	function ft_split($str)
	{
		$rtn = array_filter(explode(' ',$str));
		sort($rtn, SORT_STRING);
		return ($rtn);
	}
?>
