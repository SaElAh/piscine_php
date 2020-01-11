<?php
session_start();
if (isset($_GET['submit']) && empty($_GET['submit']) == false && $_GET['submit'] === "OK")
{
    $sub = "OK";
    if (isset($_GET['login']) && !empty($_GET['login']) && isset($_GET['passwd']) && !empty($_GET['passwd']))
    {
        $_SESSION['login'] = $_GET['login'];
        $_SESSION['passwd'] = $_GET['passwd'];
    }
}
$login = '';
$passwd = '';
if (isset($_SESSION))
{
    if (!empty($_SESSION['login']))
        $login = $_SESSION['login'];
    if (!empty($_SESSION['passwd']))
        $passwd = $_SESSION['passwd'];
}
?>
<html><body>
<form action= "test.php" method="GET">
    Username: <input type="text" name="login" value= <?php echo " \"" . $login . "\"" ?> />
    <br />
    Password: <input type="password"  value=<?php echo "\"". $passwd ."\""?>/>
    <input type="submit" /> 
</form>
</body></html>