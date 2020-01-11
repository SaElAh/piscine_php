#!/usr/bin/php
<?php
echo "Entrez un nombre: ";
$handle = fopen ("php://stdin","r");
while ($line = fgets($handle))
{
	$line = trim(preg_replace('/\s+/', ' ', $line));
	if(is_numeric($line))
	{
		if ($line % 2 == 0)
			print "Le chiffre $line est Pair\n";
		else
			print "Le chiffre $line est Impair\n";
	}
	else
		printf("'%s' n'est pas un chiffre\n", $line);
	echo "Entrez un nombre: ";
}
echo "\n";
fclose($handle);
?>
