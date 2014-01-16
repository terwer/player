<?php
/**
 *作者：唐有炜
 *我的博客：http://www.xinValue.com
 *我的微博：http://weibo.com/tyouwei
 *我的QQ：1035136784（非技术问题勿扰）
 */
error_reporting(0);

include "../../config.php";
require "../../conn.inc.php";
require "./includes/youku.php";
require ROOT . "init.inc.php";
require ROOT . "secret.php";
function utf8_urldecode($str)
{
    return html_entity_decode(preg_replace("/%u([0-9a-f]{3,4})/i", "&#x\\1;", urldecode($str)), null, 'UTF-8');
}

$tpl->assign("domain", DOMAIN);

//设置搜索域名
$tpl->assign("search_domain",SEARCH_DOMAIN);

//设置播放子域名
$tpl->assign("player_domain",PLAYER_DOMAIN);
////处理采集///////////////////////////////////////////////////////////////////////////////////////
$pwd = "";
$start=1;
$end=1;
if (isset($_GET["pwd"])) {
    $pwd = $_GET["pwd"];
    //echo $pwd;echo COLLECT_PWD;return;
    if ($pwd != COLLECT_PWD) {
        echo '<h1 style="color:red;">对不起，密码错误！您无权操作！</h1>';
        return;
    }
    if (isset($_GET["start"])) {
        $start = $_GET["start"];
    }
    if (isset($_GET["end"])) {
        $start = $_GET["end"];
    }
    //采集任务
    $collect_url="http://".PLAYER_DOMAIN."/ckplayer/info/set.php?pwd=".$pwd."&start=".$start."&end=".$end;
    file_get_contents($collect_url);
    $tpl->display("log.html");
}

$tpl->display("set_collect.html");