<?php
header("Content-Type: text/plain");

foreach ($_GET as $key => $value)
	echo $key.": ".$value."\n";

?>