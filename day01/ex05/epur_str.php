#!/usr/bin/php
<?php
	$str = trim(preg_replace('!\s+!', ' ', $argv[1]));
	if (empty($str) == false)
		echo "$str\n";
?>
