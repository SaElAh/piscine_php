<?php

header("Content-Type: text/plain");

error_reporting(E_ALL);
ini_set("display_errors", "On");

function auth($login, $passwd)
{
    $file = unserialize(file_get_contents("/Users/sel-ahma/Applications/mampstack-7.3.10-0/apache2/htdocs/piscine/day04/private/passwd"));
    foreach ($file as $v)
        if ($v["login"] == $login)
            if ($v['passwd'] == hash("sha512", $passwd))
                return (true);
    return (false);
}
?>