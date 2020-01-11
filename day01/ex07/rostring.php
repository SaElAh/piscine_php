#!/usr/bin/php
<?php
if (empty($argv[1]) == false)
{
	$tmp = trim($argv[1]);
	$tab = preg_split( "/ +/ " , $tmp);
	$first = array_shift($tab);
	array_push($tab, $first);
	$str = implode(' ', $tab);
	echo "$str\n";
}
?>
