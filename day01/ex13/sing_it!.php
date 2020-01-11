#!/usr/bin/php
<?php
$array = array("Ces oeuvres retiennent l'attention par leur force réaliste,
la présence importante du fantastique et par le pessimisme
qui s'en dégage le plus souvent mais aussi par la maîtrise stylistique.",
"Au clair de la lune lalalilala",
"Tu aimes les saucisses ?", "En arme moussaillon, Kwame nous attends !",
"Je mange, et baille, et lis, rien ne me passionne...
Bah ! Couchons-nous. - Minuit. Une heure. Ah ! chacun dort !
Seul, je ne puis dormir et je m'ennuie encor.",
"Dans le village, l'eau et les hommes avaient disparu
Les femmes pleuraient et tremblaient devant la sorcière
Kirikou seul savait où trouver notre grand-père
Kirikou mon ami nous a redonné la vie",
"T'as reconnu le cri, igo t'es animal
Mes rêves, j'connais le prix, le canon à ny-Ma
Au DD", "Y A DES LIMITES HIN !!!");
$count = count($argv);
if ($count != 2)
	return (1);
$file = '.file.txt';
$handle = fopen($file, 'a');
$data = $argv[1]."\n";
fwrite($handle, $data);
$handle2 = fopen($file, 'r');
$read = fread($handle2,filesize($file));
$i = -1;
$str = strstr($read, $argv[1]);
while (1)
{
	if (empty($str) == true)
	{
		break ;
	}
	else
	{
		$i++;
	}
	$str = substr($str, strlen($argv[1]));
	$str = strstr($str, $argv[1]);
}
$i = $i % 8;
echo $array[$i]."\n";
fclose($handle);
fclose($handle2);
?>
