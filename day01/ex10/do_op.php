#!/usr/bin/php
<?PHP
function is_operator($a)
{
	if ($a == "+")
		return (1);
	if ($a == "-")
		return (2);
	if ($a == "*")
		return (3);
	if ($a == "%")
		return (4);
	if ($a == "/")
		return (5);
	return (0);
}

function calc($a, $b, $ope)
{
	if ($ope == 1)
	{
		$res = $a + $b;
		echo "$res\n";
	}
	else if ($ope == 2)
	{
		$res = $a - $b;
		echo "$res\n";
	}
	else if ($ope == 3)
	{
		$res = $a * $b;
		echo "$res\n";
	}
	else if ($ope == 4)
	{
		$res = $a % $b;
		echo "$res\n";
	}
	else if ($ope == 5)
	{
		$res = $a / $b;
		echo "$res\n";
	}
}

array_shift($argv);
$tab_fin = [];
foreach ($argv as &$v)
{
	$tab = preg_split( "/ +/ " , $v);
	foreach ($tab as $v2)
		if (empty($v2) == false)
			array_push($tab_fin, $v2);
}
$count = count($tab_fin);
if ($count != 3)
{
	echo "Incorrect Parameters\n";
	return (1);
}
$ope = is_operator($tab_fin[1]);
if (is_numeric($tab_fin[0]) == false || $ope == 0
	|| is_numeric($tab_fin[2]) == false)
{
	return (1);
}
calc($tab_fin[0], $tab_fin[2], $ope);
?>
