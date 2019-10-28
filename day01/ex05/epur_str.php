#!/usr/bin/php
<?php
	$result = preg_filter('/ +/',' ',$argv[1]);
	$result = trim($result);
	print_r($result);
	echo "\n";
?>
