<?php
header("Content-Type: text/plain");
$dir = "/Users/sel-ahma/Applications/mampstack-7.3.10-0/apache2/htdocs/piscine/day04/private/passwd";

if (isset($_POST['submit']) == false || $_POST['submit'] !== "OK")
  die ("ERROR\n");
if (isset($_POST['oldpw']) == false || empty($_POST['oldpw']) == true)
  die ("ERROR\n");
if (isset($_POST['newpw']) == false || empty($_POST['newpw']) == true)
  die ("ERROR\n");
if (isset($_POST['login']) == false || empty($_POST['login']) == true)
  die ("ERROR\n");

$usr = [];
$usr['login'] = $_POST['login'];
$usr['passwd'] = hash("sha512", $_POST['newpw']);

$file = unserialize(file_get_contents($dir));
$cpt = 0;
foreach ($file as $v)
{  
    if ($v['login'] == $usr['login']);
    {
        if ($v['passwd'] !== hash("sha512", $_POST['oldpw']))
            die ("ERROR\n");
        else
        {
            $file[$cpt]['passwd'] = $usr['passwd']; 
            file_put_contents($dir, serialize($file));
            die ("OK\n");
        }
    }
    $cpt++;
}
die ("ERROR\n");

?>