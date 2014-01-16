<?php
/**
 *作者：唐有炜
 *我的博客：http://www.xinValue.com
 *我的微博：http://weibo.com/tyouwei
 *我的QQ：1035136784（非技术问题勿扰）
 */
error_reporting(0);
$pat = 0;
$vid = "";
$vtype = "youku";
$id_arr = array();
if (isset($_GET["id"])) {
    $pat = $_GET["id"];
    $id_arr = explode('_', $pat);
}
if ($id_arr != false) {
    $vid = $id_arr[1];
    $vtype = $id_arr[2];
}

echo '<?xml version="1.0" encoding="utf-8"?><ckplayer>
  <related_setup>120,90,40,#FFFFFF,#FFCC33,0.8,1,精彩视频推荐：,140,100,25,75,15,10</related_setup>
  <!--图片的宽，高，文本的高,文字的颜色,鼠标指向文字后的文字颜色,图片初始透明度,鼠标指向后图片的透明度,图片列表上面的推荐文字,宽差值:播放器宽-这个值=放置图片区域的宽,高差值:播放器高-这个值=放置图片区域的高,图片开始放置的X坐标,图片开始放置的Y坐标,图片占位差值:图片的宽+这个值=图片总共占的宽度,图片占位高差值:图片的高+文字的高+这个值=图片总共占的高度-->
  <!--播放器尺寸(视频内容尺寸) 推荐视频每页个数 参数参考-->
  <!--600x485/600x476(600x450) 三行三列 120,90,20,#FFFFFF,#FFCC33,0.8,1,精彩视频推荐：,140,110,25,75,15,10-->
  <!--600x485/600x476(600x450) 二行三列 120,90,40,#FFFFFF,#FFCC33,0.8,1,精彩视频推荐：,140,180,25,110,15,10-->
  <!--600x485/600x476(600x450) 二行三列 120,90,40,#FFFFFF,#FFCC33,0.8,1,精彩视频推荐：,140,160,25,105,15,10-->
  <!--以下是：视频大小=播放器大小,迷你风格或隐藏控制条这类情况-->
  <!--600x450 三行三列 120,90,20,#FFFFFF,#FFCC33,0.8,1,精彩视频推荐：,140,85,25,60,15,10-->
  <!--600x450 二行三列 120,90,40,#FFFFFF,#FFCC33,0.8,1,精彩视频推荐：,140,140,25,100,15,10-->
  <!--600x400 二行三列 120,90,40,#FFFFFF,#FFCC33,0.8,1,精彩视频推荐：,140,100,25,75,15,10-->
  <!--480x400 二行二列 120,90,40,#FFFFFF,#FFCC33,0.8,1,精彩视频推荐：,140,110,25,80,25,15-->
  <relatedlist>';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($vtype == "youku") {
    include "./info/includes/youku.php";
    include "../config.php";
    $results=videos_by_related($vid,18);
    foreach($results->videos as $video){
        echo ' <related>
      <img>'.$video->thumbnail.'</img>
      <url>http://'.DOMAIN.'/player/?url='.$video->link.'</url>
      <title>'.$video->title.'</title>
    </related>';
    }

} else {//返回音乐
    include "./info/includes/youku.php";
    $category="音乐";
    $results=videos_by_category($category,1,18);
    foreach($results->videos as $video){
        echo ' <related>
      <img>'.$video->thumbnail.'</img>
      <url>http://'.DOMAIN.'/player/?url='.$video->link.'</url>
      <title>'.$video->title.'</title>
    </related>';
    }
}

///////////////////////////////////////////////////////////////////////////////////
echo ' </relatedlist>
</ckplayer>';
?>