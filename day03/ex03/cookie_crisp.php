<?php
header("Content-Type: text/plain");
if (count($_GET) > 3)
    return ;
$cpt = 0;
foreach ($_GET as $key => $value)
{
    if ($cpt == 0)
    {
        if (!(!strcasecmp($key, "action") && !(strcasecmp($value, "set")
            && strcasecmp($value, "get") && strcasecmp($value, "del"))))
            die ();
        $cmd = $value;
    }
    if ($cpt == 1)
    {
        if (strcasecmp($key, "name"))
            die ();
    }
    if ($cpt == 2)
    {
        if (strcasecmp($key, "value"))
            die ();
    }
    $cpt++;
}
if ($cmd == "set" && count($_GET) < 3)
    die () ;
if ($cmd == "set")
    setcookie($_GET["name"], $_GET["value"], time() + 60);
if ($cmd == "get")
{
    if(!isset($_COOKIE[$_GET["name"]])) 
        die (); 
    else 
        print $_COOKIE[$_GET["name"]] ."\n";
}
if ($cmd == "del")
{
    unset($_COOKIE[$_GET["name"]]);
    $res = setcookie($_GET["name"], '', time() - 3600);
}
?>
