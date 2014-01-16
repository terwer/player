<?php
/**
 *作者：唐有炜
 *我的博客：http://www.xinValue.com
 *我的微博：http://weibo.com/tyouwei
 *我的QQ：1035136784（非技术问题勿扰）
 */
error_reporting(0);
$r = 'blank';
if (isset($_GET["r"])) {
    $r = $_GET["r"];
    $arr = explode('_', $r);
} else {
    $r = "not set";
}
$vtype = $arr[0];
$vid = $arr[1];
include "./info/includes/youku.php";
include "../config.php";
require ROOT."init.inc.php";

if ($vtype == "youku") {
    $info_arr = youku_videos_show_by_id($vid, "show");
    if ($info_arr->show == null) { //不是节目，输出当前视频
        $item = '  <RV>
            <title>' . $info_arr->title . '</title>
            <url>
                http://'.DOMAIN.'/player/ckplayer/video.php?url=' . $info_arr->link . '
            </url>
            <l>0</l>
            <pic>' . $info_arr->thumbnail . '</pic>
            <vid>1</vid>
        </RV>';
        $results = videos_by_related($vid, 49);
        $tpl->assign("case", 1);
        $tpl->assign("data", $item);
        $tpl->assign("add_data", $results);
    } else { //节目
        $info_data = youku_videos_show_by_id($vid, "show");
        $pid = $info_data->show->id;


        $shows = youku_videos_show_detail($pid, 1, 20);
        $shows_array = array();
        $shows_array[0] = $shows;


        if ($shows->total % 2 == 0) {
            $num = $shows->total / 20;
        } else {
            $num = floor($shows->total / 20) + 1;
        }

        for ($i = 2; $i <= $num - 1; $i++) {
            $shows_array[i - 1] = youku_videos_show_detail($pid, $i, 20);
        }

        $shows_array[$num - 1] = youku_videos_show_detail($pid, $num, ($shows->total - 20 * ($num - 1)));

        //echo $num;
        //ar_dump($shows_array);return;
        //return;

        $tpl->assign("case", 2);
        $tpl->assign("shows_array", $shows_array);
    }
} else {
    $results = videos_by_category("音乐", 1, 50);
    $tpl->assign("case", 3);
    $tpl->assign("other_data", $results);
}

$tpl->display("list_mov.html");
?>