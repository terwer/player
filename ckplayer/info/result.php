<?php
/**
 *作者：唐有炜
 *我的博客：http://www.xinValue.com
 *我的微博：http://weibo.com/tyouwei
 *我的QQ：1035136784（非技术问题勿扰）
 */
error_reporting(1);

include "../../config.php";
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


if (isset($_GET["keyword"])) {
    $keyword = utf8_urldecode($_GET["keyword"]);

    //echo $keyword;return;
    // $arr = explode('.', $keyword);
    //dump($arr);
    //if (count($arr) == 2) {
    //    $keyword = $arr[1];
    //}
    $tpl->assign("keyword", $keyword);
////////////////////////////////////////////////////////////////////////////////////
    //节目搜索结果
    //http://openapi.youku.com/v2/searches/show/by_keyword.json?client_id=0dec1b5a3cb570c1&keyword=%E5%B0%91%E5%B9%B4%E5%8C%85%E9%9D%92%E5%A4%A9
    $video_result = searches_by_keyword($keyword);
    $tpl->assign("result", $video_result);
///////////////////////////////////////////////////////////////////////////////////////

//单个视频搜索结果
    $page = 1;
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    }


    $tpl->assign("page", $page);
    $tpl->assign("page", $page);


    $count = 20;
    if (isset($_GET["count"])) {
        $count = $_GET["count"];
    }
    $tpl->assign("count", $count);

    $simple_video_result = searches_video_by_keyword($keyword, $page, $count);
    $tpl->assign("simple_video_result", $simple_video_result);
//dump($simple_video_result);
//return;

    if ($simple_video_result->total % $count == 0) {
        $page_num = floor(($simple_video_result->total) / $count);
    } else {
        $page_num = floor(($simple_video_result->total) / $count) + 1;
    }
    if ($page_num > 100) {
        $page_num = 100;
    }


    $tpl->assign("page_num", $page_num); //
//echo '总共有'.$simple_video_result->total.'个项目，总共有'.$page_num.'页，每页有'.$count.'项，起始页码，'.$start.'终止页码'.$end.'，当前页码'.$page;

    $pages = array();
    for ($i = 1; $i <= $page_num; $i++) {
        $pages[$i] = $i;
    }
    $tpl->assign("pages", $pages);
//dump($pages);
//return;

    $tpl->display("result.html");
} else {
    echo 'keyword cannot be empty!';
}
?>