<?php
function ft_split($string)
{
	$tab = preg_split( "/ +/ " , $string);
	sort($tab);
	return ($tab);
}
?>
