#!/usr/bin/php
<?php
	while (1)
	{
		echo "Enter a number: ";
		fscanf(STDIN, "%s\n", $number);
		if (feof(STDIN))
		{
			echo "\n";
			exit();
		}
		if (is_numeric($number) == false)
		{
			echo "'$number' is not a number\n";
			$number = NULL;
			continue;
		}
		$temp = $number[strlen($number) - 1];
		$result = $temp % 2;
		if ($result == 0)
			echo "The number $number is even\n";
		else
			echo "The number $number is odd\n";
		$number = NULL;
	}
?>
