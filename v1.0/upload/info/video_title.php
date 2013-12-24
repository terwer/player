<?php
include "./includes/youku.php";

$url = 'http://v.youku.com/v_show/id_XNjUwMDY2OTY4.html';
if (isset($_GET["url"])) {
    $url = $_GET["url"];
}

$info=youku_videos_show_basic($url);
if($info==null){
echo '标题获取失败-新价值网|做有思想的IT博客';
return;
}
//var_dump($info);
echo $info->title.'-'.$info->category.'-新价值网|做有思想的IT博客';

/*
$json='{
  "id": "XNjE0MjI4MzY4", 
  "title": "秦风", 
  "thumbnail": "http://g1.ykimg.com/0100641F465245180367800954C3520366D962-DC60-EA87-B5A2-72F5587C3345", 
  "thumbnail_v2": "http://r1.ykimg.com/05420408524518096A0A474F1BB74AB0", 
  "duration": "275.20", 
  "published": "2013-09-27 13:08:29", 
  "copyright_type": "original", 
  "public_type": "all", 
  "state": "normal", 
  "category": "音乐", 
  "streamtypes": [
    "hd2", 
    "flvhd", 
    "hd", 
    "3gphd"
  ], 
  "paid": 0, 
  "link": "http://v.youku.com/v_show/id_XNjE0MjI4MzY4.html", 
  "player": "http://player.youku.com/player.php/sid/XNjE0MjI4MzY4/v.swf", 
  "operation_limit": [ ], 
  "user": {
    "id": "156549970", 
    "name": "Just現在的你", 
    "link": "http://v.youku.com/user_show/id_UNjI2MTk5ODgw.html"
  }
}';  
*/
?>
 