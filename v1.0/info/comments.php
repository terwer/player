<?php
include "./includes/youku.php";
require "D:/MyCode/ckplayer/info/init.inc.php";
//require "/home/v78/domains/xinvalue.com/public_html/ckplayer/info/init.inc.php";
require "D:/MyCode/ckplayer/secret.php";
//require "/home/v78/domains/xinvalue.com/public_html/secret.php";

$url = 'http://v.youku.com/v_show/id_XNjUwMDY2OTY4.html';
if (isset($_GET["url"])) {
    $url = $_GET["url"];
}
$page = 1;
if (isset($_GET["page"])) {
    $page = $_GET["page"];
}
$count = 20;
if (isset($_GET["count"])) {
    $count = $_GET["count"];
}

$comments = youku_comments_by_video($url, $page, $count);
//dump($comments);

$tpl->assign("comments",$comments);
$tpl->display("comments.html");



