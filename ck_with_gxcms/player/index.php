<?php
/**
 * Created by PhpStorm.
 * User: Terwer
 * Date: 13-12-8
 * Time: 上午6:46
 */
require "C:/soft/wamp/www/player/init.inc.php";

/////////////////////////获取扩展名//////////////////////////////////
$ext = 'xml';
$tag1 = strstr($$url, '.mp4');
$tag2 = strstr($$url, '.flv');
$tag3 = strstr($$url, '.f4v');
if ($tag1 != "") {
    $tag = $tag1;
} else if ($tag2 != "") {
    $tag = $tag2;
} else if ($tag3 != "") {
    $tag = $tag3;
} else {
    $tag = ".xml";
}

$tpl->display("index.html");
?>