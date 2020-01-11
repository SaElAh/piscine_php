<?php
header("Content-Type: text/plain");
$dir = "/Users/sel-ahma/Applications/mampstack-7.3.10-0/apache2/htdocs/piscine/day04/private";
if (!file_exists($dir))
    mkdir($dir);
$dir .= "/passwd";

if (isset($_POST['submit']) == false || $_POST['submit'] !== "OK")
  die ("ERROR\n");
if (isset($_POST['passwd']) == false || empty($_POST['passwd']) == true)
  die ("ERROR\n");
if (isset($_POST['login']) == false || empty($_POST['login']) == true)
  die ("ERROR\n");
$usr = [];
$usr['login'] = $_POST['login'];
$usr['passwd'] = hash("sha512", $_POST['passwd']);

if (!file_exists($dir))
{
  $file[] = $usr;
  file_put_contents($dir, serialize($file));
  die ("OK\n");
}
else
{
  $file = unserialize(file_get_contents($dir));
  foreach ($file as $v)
  {  
    foreach ($v as $key => $value)
    {
      if ($key === 'login' && $value == $usr['login'])
          die ("ERROR\n");
    }
  }
  $file[] = $usr; 
  file_put_contents($dir, serialize($file));
  die ("OK\n");
}

?>