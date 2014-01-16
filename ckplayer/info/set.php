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

ignore_user_abort(); //关掉浏览器，PHP脚本也可以继续执行.
set_time_limit(0); // 通过set_time_limit(0)可以让程序无限制的执行下去

echo "计划任务开始。。。<br/>";
$start=1;
$end=2;
if(isset($_GET["start"])){
$start=$_GET["start"];
}
if(isset($_GET["end"])){
$end=$_GET["end"];
}
//while (1) {
    //sleep(60 * 60 * 2); // 等待2小时

    ////获取视频分类////////////////////////////////////////////////////////////////////
    $sql = "SELECT id,pid,cname FROM gx_channel WHERE status=1";
    $cat_result = mysql_query($sql);
    $cats = array();
    while ($cat = mysql_fetch_object($cat_result)) {
        if ($cat->id != 1 && $cat->id != 2) {
            for ($j = $start; $j <= $end; $j++) { //采集5页
                collect(DOMAIN, $cat->id, $j);
            }
        }
    }
    mysql_close();
    
//    sleep(60 * 60 );
//}

/**
 * @param $domain
 * @param $cid  分类ID
 * @param $page 页码
 */
function collect($domain, $cid, $page)
{
    file_put_contents('./log.html', '<h1>最后更新时间'.date('Y-m-d H:i:s').'</h1>'.file_get_contents('http://' . $domain . '/player/ckplayer/info/one_key_collect.php?pwd=105036&vtype=%u4F18%u9177&is_updated=true&cat=' . $cid . '&page=' . $page . '&count=5'));
}

?>