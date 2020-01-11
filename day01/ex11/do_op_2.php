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

if (count($argv) != 2)
{
	echo "Incorrect Parameters\n";
	return (1);
}
array_shift($argv);
$argv[0] = trim($argv[0]);
$tab_fin = [];
foreach ($argv as &$v)
{
	$v = trim($v);
	$tab = preg_split( "/ +/ " , $v);
	foreach ($tab as $v2)
	{
		array_push($tab_fin, $v2);
	}
}
$count = count($tab_fin);
if (!($count >= 1 && $count <= 3) || empty($tab_fin[0]) == true)
{
	echo "Incorrect Parameters\n";
	return (1);
}
if (count == 3)
{
	$ope = is_operator($tab_fin[1]);
	if (is_numeric($tab_fin[0]) == false || $ope == 0
		|| is_numeric($tab_fin[2]) == false)
	{
		echo "Syntax Error\n";
		return (1);
	}
	calc($tab_fin[0], $tab_fin[2], $ope);
}
else
{
	$str = implode($tab_fin);
	$i = 0;
	if (is_operator($str[$i]) == 2)
	{
		$tmp1 .= $str[$i];
		$i++;
	}
	while (is_operator($str[$i]) == 0 && is_numeric($str[$i]))
	{
		$tmp1 .= $str[$i];
		$i++;
	}
	$j = $i + 1;
	if (is_operator($str[$j]) != 0 && is_operator($str[$j]) != 2)
	{
		echo "Syntax Error\n";
		return (1);
	}
	while ($str[$j])
	{
		$tmp2 .= $str[$j];
		$j++;
	}
	$ope = is_operator($str[$i]);
	if (is_numeric($tmp1) == false || $ope == 0
		|| is_numeric($tmp2) == false)
	{
		echo "Syntax Error\n";
		return (1);
	}
	calc($tmp1, $tmp2, $ope);
}
?>
