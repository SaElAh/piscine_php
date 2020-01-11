#!/usr/bin/php
<?php
function check_links($tab, $link)
{
	$res = [];
	foreach ($tab as $v1)
	{
		foreach ($v1 as $v)
		{
			if (strncmp("http://", $v, 7) !== 0 && strncmp("https://", $v, 8) !== 0)
				$v = $link. $v;
			array_push($res, $v);
		}
	}
	return ($res);
}
function downloadImage($url,$filename){
    if(file_exists($filename)){
        @unlink($filename);
    }
    $fp = fopen($filename,'w');
    if($fp){
        $ch = curl_init ($url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
        $result = parse_url($url);
        curl_setopt($ch, CURLOPT_REFERER, $result['scheme'].'://'.$result['host']);
        curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:45.0) Gecko/20100101 Firefox/45.0');
        $raw=curl_exec($ch);
        curl_close ($ch);
        if($raw){
            fwrite($fp, $raw);
        }
        fclose($fp);
        if(!$raw){
            @unlink($filename);
            return false;
        }
        return true;
    }
    return false;
}

$ch = curl_init($argv[1]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
$homepage = curl_exec($ch);
curl_close($ch);
$pattern = "|img.*src=\"([^\"]*)\"|";
preg_match_all($pattern, $homepage, $matches);
array_shift($matches);
$matches = check_links($matches, $argv[1]);
$dir = substr($argv[1], strrpos($argv[1], "www"));
if ($dir === $argv[1])
	$dir = substr($dir, strrpos($dir, "//") + 2);
@mkdir($dir, 0777);
foreach ($matches as $v)
{
	$pos = strrpos($v, "/", 0);
	$name = substr($v, $pos + 1);
	@copy($v, "./".$dir."/".$name);
}
?>
