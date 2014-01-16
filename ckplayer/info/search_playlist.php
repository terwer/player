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


if (isset($_GET["pid"])) {
    $pid = $_GET["pid"];
    $united_result = searches_address_unite($pid);
    $tpl->assign("united_result", $united_result->$pid);


    $tpl->assign("domain",DOMAIN);

  $tpl->display("search_playlist.html");
} else {
    echo "pid can not be empty!";
}


