#!/usr/bin/php
<?PHP
function is_alpha($a)
{
	if (($a >= 'a' && $a <= 'z') || ($a >= 'A' && $a <= 'Z'))
		return (true);
	return (false);
}

function cmp($a, $b)
{
	if ($a == $b)
		return (0);
	if (is_alpha($a) && is_alpha($b))
	{
		if ($a < $b)
			return (-1);
		else
			return (1);
	}
	if (is_alpha($a) && !is_alpha($b))
		return (-1);
	if (is_alpha($b))
		return (1);
	if (is_numeric($a) && is_numeric($b))
	{
		if ($a < $b)
			return (-1);
		else
			return (1);
	}
	if (is_numeric($a) && !is_numeric($b))
		return (-1);
	if ($a < $b)
		return (-1);
	return (1);
}

function mystrcmp($s1, $s2)
{
	$s1 = strtolower($s1);
	$s2 = strtolower($s2);

	$len1 = strlen($s1);
	$len2 = strlen($s2);

	for ($cpt1 = 0, $cpt2 = 0; $cpt1 < $len1, $cpt2 < $len2; $cpt1++, $cpt2++)
	{
		if (cmp($s1[$cpt1], $s2[$cpt2]) == 1)
			return (1);
		if (cmp($s1[$cpt1], $s2[$cpt2]) == -1)
			return (-1);
	}
	if ($len1 > $len2)
		return (1);
	if ($len1 < $len2)
		return (-1);
	return (0);
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
usort($tab_fin, mystrcmp);
foreach ($tab_fin as $str)
	echo "$str\n";
?>
