<?php
if ($_SERVER['PHP_AUTH_USER'] !== 'zaz' || $_SERVER['PHP_AUTH_PW'] !== "jaimelespetitsponeys")
{
    header("WWW-Authenticate: Basic realm=''Espace membres''");
    header("HTTP/1.0 401 Unauthorized");
    die ("<html><body>Cette zone est accessible uniquement aux membres du site</body></html>\n");
}
?>
<html><body>
Bonjour Zaz<br/><br/><img src="data:image/png;base64,
<?php echo base64_encode(file_get_contents("/Users/sel-ahma/Documents/piscine/day03/img/42.png"));?>">
</body></html>