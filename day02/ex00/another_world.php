#!/usr/bin/php
<?php
if (empty($argv[1]) == true)
	return ;
$str = trim($argv[1]);
$array1 = array("\t");
$array2 = array(" ");
$str = str_replace($array1, $array2, $str);
$str = preg_split( "/ +/ " , $str);
$count = count($str);
for ($i = 0; $i < $count && empty($str[$i]) == false; $i++)
{
	echo $str[$i];
	if ($i < $count - 1)
		echo " ";
	else
		echo "\n";
}
?>
