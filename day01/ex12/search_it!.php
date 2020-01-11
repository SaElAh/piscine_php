#!/usr/bin/php
<?PHP
array_shift($argv);
$argv[0] = trim($argv[0]);
$str = array_shift($argv);
$tab_fin = [];
foreach ($argv as &$v)
{
	$tab = preg_split( "/ / " , $v);
	foreach ($tab as $v2)
	{
		array_push($tab_fin, $v2);
	}
}
$count = count($tab_fin);
if ($count < 2)
	return (1);
$tab_fin = array_reverse($tab_fin);
foreach ($tab_fin as $v)
{
	$tmp = strstr($v, $str);
	if (empty($tmp) == false)
	{
		$tmp2 = strstr($tmp, ":");
		$anw = substr($tmp2, 1);
		echo "$anw\n";
		return (0);
	}
}
?>
