<?php
header("Content-Type: text/plain");
if (count($_GET) > 3)
    return ;
foreach ($_GET as $key => $value)
    echo $key.": ".$value."\n";
$cpt = 0;
foreach ($_GET as $key => $value)
{
    if ($cpt == 0)
    {
        if (!(!strcasecmp($key, "action") && !(strcasecmp($value, "set")
            && strcasecmp($value, "get") && strcasecmp($value, "del"))))
            die ("Error 1 \n");
        $cmd = $value;
    }
    if ($cpt == 1)
    {
        if (strcasecmp($key, "name"))
            die ("Error 2 \n");
    }
    if ($cpt == 2)
    {
        if (strcasecmp($key, "value"))
            die ("Error 3 \n");
    }
    $cpt++;
}
if ($cmd == "set" && count($_GET) < 3)
{
    echo "Not enough information to set a cookie\n";
    return ;
}
echo $_GET["action"]."\n";
echo $_GET["name"]."\n";
echo $_GET["value"]."\n";
if ($cmd == "set")
    setcookie($_GET["name"], $_GET["value"], time() + 60);
if ($cmd == "get")
{
    if(!isset($_COOKIE[$_GET["name"]])) 
    {
        print 'Cookie with name "' . $_COOKIE[$_GET["name"]] . '" does not exist...\n';
    } else 
    {
        print $_COOKIE[$_GET["name"]] ."\n";
    }
}
if ($cmd == "del")
{
    unset($_COOKIE[$_GET["name"]]);
    $res = setcookie($_GET["name"], '', time() - 3600);
}
?>
