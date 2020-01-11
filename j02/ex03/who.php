#!/usr/bin/php
<?php
date_default_timezone_set('France/Paris');
$date = date('M d', time());
$str = shell_exec("w");
$tab_fin = [];
$tab = preg_split( "/\n/ " , $str);
foreach ($tab as $v2)
	if (empty($v2) == false)
		array_push($tab_fin, $v2);
$cpt = 0;
foreach ($tab_fin as $v)
{
	if ($cpt > 1)
	{
		$tmp = preg_split("/ \s+/", $v);
		$user = preg_split("/ +/", $tmp[0]);
		$time = $tmp[2];
		if ($cpt != 2)
			echo $user[0]." tty".$user[1]." ".$date." ".$time." \n";
		else
		echo $user[0]." ".$user[1]."  ".$date." ".$time." \n";
	}
	$cpt++;
}
?>
