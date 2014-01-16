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


/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-1-1
 * Time: 下午2:34
 */
////处理采集///////////////////////////////////////////////////////////////////////////////////////
$pwd = "";
$vtype = "";
$cat = "";
$is_updated = "false";
$page = 1;
$count = 5;
if (isset($_GET["pwd"])) {
    $pwd = $_GET["pwd"];
    if ($pwd != COLLECT_PWD) {
        echo '<h1 style="color:red;">对不起，密码错误！您无权操作！</h1>';
        return;
    }
}
if (isset($_GET["vtype"])) {
    $vtype = utf8_urldecode($_GET["vtype"]);
}
if (isset($_GET["is_updated"])) {
    $is_updated = $_GET["is_updated"];
}
if (isset($_GET["page"])) {
    $page = $_GET["page"];
}
if (isset($_GET["count"])) {
    $count = $_GET["count"];
}
if (isset($_GET["cat"])) {
    $cat = $_GET["cat"];
/////////////////////////////////////////////////////////////////////
    echo '<h1 style="color:green;">采集开始！</h1>';
    $result = null;

    //分类逻辑判断
    if ($cat == 1) { //电影---动作片
        $result = shows_by_category('电影', null, null, null, 'updated', $page, $count);
    } else if ($cat == 2) { //电影---动作片
        $result = shows_by_category('电视剧', null, null, null, 'updated', $page, $count);
    } else if ($cat == 8) { //电影---动作片
        $result = shows_by_category('电影', '动作', null, null, 'updated', $page, $count);
    } else if ($cat == 9) { //电影---喜剧片
        $result = shows_by_category('电影', '喜剧', null, null, 'updated', $page, $count);
    } else if ($cat == 10) { //电影---爱情片
        $result = shows_by_category('电影', '爱情', null, null, 'updated', $page, $count);
    } else if ($cat == 11) { //电影---科幻片
        $result = shows_by_category('电影', '科幻', null, null, 'updated', $page, $count);
    } else if ($cat == 12) { //电影---剧情片
        $result = shows_by_category('电影', '剧情', null, null, 'updated', $page, $count);
    } else if ($cat == 13) { //电影---恐怖片
        $result = shows_by_category('电影', '恐怖', null, null, 'updated', $page, $count);
    } else if ($cat == 14) { //电影---战争片
        $result = shows_by_category('电影', '战争', null, null, 'updated', $page, $count);
    } else if ($cat == 36) { //电影---动画片
        $result = shows_by_category('电影', '动画', null, null, 'updated', $page, $count);
    } else if ($cat == 39) { //电影---悬疑片
        $result = shows_by_category('电影', '悬疑', null, null, 'updated', $page, $count);
    } else if ($cat == 43) { //电影---历史片
        $result = shows_by_category('电影', '历史', null, null, 'updated', $page, $count);
    } else if ($cat == 43) { //电影---历史片
        $result = shows_by_category('电影', '历史', null, null, 'updated', $page, $count);
    } else if ($cat == 45) { //电影---武侠片
        $result = shows_by_category('电影', '武侠', null, null, 'updated', $page, $count);
    } else if ($cat == 48) { //电影---警匪片
        $result = shows_by_category('电影', '警匪', null, null, 'updated', $page, $count);
    } else if ($cat == 15) { //电视剧---古装剧
        $result = shows_by_category('电视剧', '古装', null, null, 'updated', $page, $count);
    } else if ($cat == 17) { //电视剧---武侠剧
        $result = shows_by_category('电视剧', '武侠', null, null, 'updated', $page, $count);
    } else if ($cat == 16) { //电视剧---警匪剧
        $result = shows_by_category('电视剧', '警匪', null, null, 'updated', $page, $count);
    } else if ($cat == 18) { //电视剧---军事剧
        $result = shows_by_category('电视剧', '军事', null, null, 'updated', $page, $count);
    } else if ($cat == 19) { //电视剧---神话剧
        $result = shows_by_category('电视剧', '神话', null, null, 'updated', $page, $count);
    } else if ($cat == 20) { //电视剧---科幻剧
        $result = shows_by_category('电视剧', '科幻', null, null, 'updated', $page, $count);
    } else if ($cat == 51) { //电视剧---搞笑剧
        $result = shows_by_category('电视剧', '搞笑', null, null, 'updated', $page, $count);
    } else if ($cat == 52) { //电视剧---偶像剧
        $result = shows_by_category('电视剧', '偶像', null, null, 'updated', $page, $count);
    } else if ($cat == 53) { //电视剧---悬疑剧
        $result = shows_by_category('电视剧', '悬疑', null, null, 'updated', $page, $count);
    } else if ($cat == 54) { //电视剧---历史剧
        $result = shows_by_category('电视剧', '历史', null, null, 'updated', $page, $count);
    } else if ($cat == 55) { //电视剧---儿童剧
        $result = shows_by_category('电视剧', '儿童', null, null, 'updated', $page, $count);
    } else if ($cat == 56) { //电视剧---农村剧
        $result = shows_by_category('电视剧', '农村', null, null, 'updated', $page, $count);
    } else if ($cat == 57) { //电视剧---都市剧
        $result = shows_by_category('电视剧', '都市', null, null, 'updated', $page, $count);
    } else if ($cat == 58) { //电视剧---家庭剧
        $result = shows_by_category('电视剧', '家庭', null, null, 'updated', $page, $count);
    } else if ($cat == 59) { //电视剧---言情剧
        $result = shows_by_category('电视剧', '言情', null, null, 'updated', $page, $count);
    } else if ($cat == 60) { //电视剧---时装剧
        $result = shows_by_category('电视剧', '时装', null, null, 'updated', $page, $count);
    } else if ($cat == 3) { //动漫
        $result = shows_by_category('动漫', null, null, null, 'updated', $page, $count);
    } else if ($cat == 4) { //综艺
        $result = shows_by_category('综艺', null, null, null, 'updated', $page, $count);
    } else if ($cat == 29) { //音乐---流行
        $result = shows_by_category('音乐', '流行', null, null, 'updated', $page, $count);
    } else if ($cat == 49) { //音乐---摇滚
        $result = shows_by_category('音乐', '摇滚', null, null, 'updated', $page, $count);
    } else if ($cat == 50) { //音乐---舞曲
        $result = shows_by_category('音乐', '舞曲', null, null, 'updated', $page, $count);
    } else if ($cat == 61) { //音乐---电子
        $result = shows_by_category('音乐', '电子', null, null, 'updated', $page, $count);
    } else if ($cat == 62) { //音乐---R&B
        $result = shows_by_category('音乐', 'R%26B', null, null, 'updated', $page, $count);
    } else if ($cat == 63) { //音乐---HIP-HOP
        $result = shows_by_category('音乐', 'HIP-HOP', null, null, 'updated', $page, $count);
    } else if ($cat == 64) { //音乐---乡村
        $result = shows_by_category('音乐', '乡村', null, null, 'updated', $page, $count);
    } else if ($cat == 65) { //音乐---民族
        $result = shows_by_category('音乐', '民族', null, null, 'updated', $page, $count);
    } else if ($cat == 66) { //音乐---民谣
        $result = shows_by_category('音乐', '民谣', null, null, 'updated', $page, $count);
    } else if ($cat == 67) { //音乐---拉丁
        $result = shows_by_category('音乐', '拉丁', null, null, 'updated', $page, $count);
    } else if ($cat == 68) { //音乐---爵士
        $result = shows_by_category('音乐', '爵士', null, null, 'updated', $page, $count);
    } else if ($cat == 69) { //音乐---雷鬼
        $result = shows_by_category('音乐', '雷鬼', null, null, 'updated', $page, $count);
    } else if ($cat == 70) { //音乐---新世纪
        $result = shows_by_category('音乐', '新世纪', null, null, 'updated', $page, $count);
    } else if ($cat == 71) { //音乐---古典
        $result = shows_by_category('音乐', '古典', null, null, 'updated', $page, $count);
    } else if ($cat == 72) { //音乐---音乐剧
        $result = shows_by_category('音乐', '音乐剧', null, null, 'updated', $page, $count);
    } else if ($cat == 73) { //音乐---轻音乐
        $result = shows_by_category('音乐', '轻音乐', null, null, 'updated', $page, $count);
    } else if ($cat == 31) { //教育
        $result = shows_by_category('教育', null, null, null, 'updated', $page, $count);
    } else if ($cat == 30) { //纪录片
        $result = shows_by_category('纪录片', null, null, null, 'updated', $page, $count);
    } else if ($cat == 32) { //体育
        $result = shows_by_category('体育', null, null, null, 'updated', $page, $count);
    }


    //采集处理
    if (null == $result) {
        echo '<h1 style="color:red">网络错误！</h1>';
        exit;
    }
    echo '共有' . $result->total . '条结果。<br/>';
    echo '开始采集第' . $page . '页，其中每页' . $count . '条记录。<br/>';
    foreach ($result->shows as $show) {
        $collect_url = 'http://' . PLAYER_DOMAIN . '/ckplayer/info/collect_submit.php?collect=true&show_id=' . $show->id . '&pwd=' . $pwd . '&vtype=' . $vtype
            . '&is_updated=' . $is_updated . '&cat=' . $cat;
        echo '正在采集【' . $show->name . '】。。。<br/>url：' . $collect_url . '<br/>';
        echo '优酷地址页：<a href="' . $show->link . '" target="_blank">' . $show->link . '</a><br/>';
        $info = file_get_contents($collect_url);
        echo $info;
    }

    echo '<h1 style="color:green;">采集完毕！</h1>';
    return;
}
////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////

////获取视频分类////////////////////////////////////////////////////////////////////
$sql = "SELECT id,pid,cname FROM gx_channel WHERE status=1";
$cat_result = mysql_query($sql);
$cats = array();
$i = 0;
while ($cat = mysql_fetch_object($cat_result)) {
    $cats[$i] = $cat;
    $i++;
}
//var_dump($cats);
mysql_close();
//return;
$tpl->assign("cats", $cats);
/////////////////////////////////////////////////////////////////////////

$tpl->display("one_key_collect.html");


/**
 * 判断来源
 *
 * @param $site_id
 *
 * @return string
 */
function get_site($site_id)
{
    if ($site_id == 1)
        return "土豆";
    else if ($site_id == 2)
        return "56";
    else if ($site_id == 3)
        return "新浪";
    else if ($site_id == 4)
        return "琥珀";
    else if ($site_id == 6)
        return "搜狐";
    else if ($site_id == 7)
        return "央视";
    else if ($site_id == 8)
        return "凤凰";
    else if ($site_id == 10)
        return "酷6";
    else if ($site_id == 11)
        return "天线视频";
    else if ($site_id == 12)
        return "六间房";
    else if ($site_id == 13)
        return "中关村";
    else if ($site_id == 14)
        return "优酷";
    else if ($site_id == 31)
        return "PPTV";
    else if ($site_id == 27)
        return "腾讯";
    else if ($site_id == 15)
        return "CNTV";
    else if ($site_id == 16)
        return "电影网";
    else if ($site_id == 17)
        return "乐视";
    else if ($site_id == 18)
        return "小银幕";
    else if ($site_id == 19)
        return "奇艺";
    else if ($site_id == 20)
        return "江苏卫视";
    else if ($site_id == 12)
        return "浙江卫视";
    else if ($site_id == 23)
        return "安徽卫视";
    else if ($site_id == 24)
        return "芒果";
    else if ($site_id == 25)
        return "爱拍游戏";
    else if ($site_id == 26)
        return "音悦台";
    else if ($site_id == 28)
        return "迅雷";
    else if ($site_id == 29)
        return "优米";
    else if ($site_id == 30)
        return "163";
    else if ($site_id == 130)
        return "风行";
    else if ($site_id == 0)
        return "爱奇艺";
    else
        return $site_id;
}
