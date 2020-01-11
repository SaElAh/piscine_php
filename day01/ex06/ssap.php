#!/usr/bin/php
<?php
array_shift($argv);
$tab_fin = [];
foreach ($argv as &$v)
{
	$tab = preg_split( "/ +/ " , $v);
	foreach ($tab as $v2)
		if (empty($v2) == false)
			array_push($tab_fin, $v2);
}
sort($tab_fin);
foreach ($tab_fin as $str)
	echo "$str\n";
?>
