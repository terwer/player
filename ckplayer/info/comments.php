<?php
/**
 *作者：唐有炜
 *我的博客：http://www.xinValue.com
 *我的微博：http://weibo.com/tyouwei
 *我的QQ：1035136784（非技术问题勿扰）
 */
error_reporting(0);

include "../../config.php";
require "./includes/youku.php";
require ROOT . "init.inc.php";
require ROOT . "secret.php";

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
if(isset($_GET["type"])&&$_GET["type"]=="video"){
    $tpl->display("video_comments.html");
}else{
    $tpl->display("comments.html");
}




