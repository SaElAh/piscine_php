#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Paris');
setlocale(LC_ALL, array('fra_FRA.UTF-8','fra_FRA@euro','fra_FRA','french'));
function verif_upp($check)
{
	$len = strlen($check);
	if ($len == 0)
		return (false);
	for ($i = 1; $i < $len; $i++)
	{
		if ($check[$i] < 'a' || $check[$i] > 'z')
			return (false);
	}
	return (true);
}

function verif($check)
{
	if (is_numeric($check[1] == false))
		return (false);
	if (is_numeric($check[3]) == false ||
		strlen($check[3]) != 4)
		return (false);
	if (strlen($check[4]) != 8)
		return (false);
	if (verif_upp($check[0]) == false)
		return (false);
	if (verif_upp($check[2]) == false)
		return (false);
	$ver = explode(":", $check[4]);
	foreach($ver as $v)
		if (is_numeric($v) == false)
			return (false);
	return (true);
}

if (empty($argv[1]) == true)
	return ;
$accent = array("é", "û");
$no_accent = array("e", "u");
$argv[1] = str_replace($accent, $no_accent, $argv[1]);
$check = explode(" ", $argv[1]);
if (count($check) != 5)
{
	echo "Wrong Format\n";
	return ;
}
if (verif($check) == false)
{
	echo "Wrong Format\n";
	return ;
}

$english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
$french_days = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche');
$english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
$french_months = array('janvier', 'fevrier', 'mars', 'avril', 'mai', 'juin', 'juillet', 'aout', 'septembre', 'octobre', 'novembre', 'decembre');
$str = strtolower($argv[1]);
$res = str_replace($french_days, $english_days, $str);
$res = str_replace($french_months, $english_months, $res);
if (strcmp($str, $res) == 0)
{
	echo "Wrong Format\n";
	return ;
}
$res = strtotime($res);
if (empty($res) == false)
	echo $res."\n";
else
	echo "Wrong Format\n";
?>
