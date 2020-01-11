<?php
function ft_is_sort($array)
{
	$tab = array_values($array);
	sort($tab);
	$rtab = array_values($array);
	rsort($rtab);
	if ($tab === $array || $rtab === $array)
		return (true);
	return (false);
}
?>
