<?php
$dir = "/Users/sel-ahma/Applications/mampstack-7.3.10-0/apache2/htdocs/piscine/day04/private/passwd";
print_r($_POST);
if (!file_exists($dir))
    mkdir($dir);

if (!isset($_POST['passwd'] || empty($_POST['passwd']))
    die ("ERROR\n");
if ()


?>