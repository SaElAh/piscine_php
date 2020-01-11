#!/usr/bin/php
<?php
if (count($argv) != 2)
	return ;
$string = file_get_contents($argv[1], true);
$pattern = "|<a.*(title=\")([^\"]*)(\")|";
$result = preg_replace_callback($pattern,
	function ($matches)
	{
		return ($matches[1].strtoupper($matches[2]).$matches[3]);
	}, $string);
$pattern = "|(<a[^>]*)(>.*<)(/a>)|";
$result = preg_replace_callback($pattern,
	function ($matches)
	{
		$matches[2] = preg_replace_callback("|>([^<]*)<|",
			function ($matches)
			{
				return (">".strtoupper($matches[1])."<");
			},
			$matches[2]);
		return ($matches[1].$matches[2].$matches[3]);
	}, $result);
echo $result;
?>


