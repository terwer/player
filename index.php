<?php
/**
 *作者：唐有炜
 *我的博客：http://www.xinValue.com
 *我的微博：http://weibo.com/tyouwei
 *我的QQ：1035136784（非技术问题勿扰）
 */
error_reporting(0);

require "config.php";
require ROOT."init.inc.php";
require ROOT."secret.php";

////////////////////////////设置域名/////////////////////////////////////////////
$tpl->assign("domain", DOMAIN);
/////////////////////////////////////////////////////////////////////////

//////////////////////////获取参数URL//////////////////////////////////////////
$url = "http://v.youku.com/v_show/id_XNjUyMjAwNTc2.html";
if (isset($_GET["url"])) {
    $url = $_GET["url"];
}
if ("" == $url) {
    $url = "http://v.youku.com/v_show/id_XNjUyMjAwNjU2.html";
}
//echo $url.'<br/>';
////////////////////////////////////////////////////////////////////

/*******************************获取加密的URL*************************************/
//$url = "http://v.youku.com/v_show/id_XNjUyMjAwNTc2.html";
if (isset($_GET["key"])) {
    $key = $_GET["key"];
    $url=decode($key,"cbgtyw2020");
    //echo $url;return;
}
if ("" == $key) {
    $url = "http://v.youku.com/v_show/id_XNjUyMjAwNjU2.html";
}
//echo $url.'<br/>';
/*****************************************************************/

/////////////////////////获取扩展名//////////////////////////////////
$ext = 'xml';
$tag = '.xml';
$tag1 = strstr($url, '.mp4');
$tag2 = strstr($url, '.flv');
$tag3 = strstr($url, '.f4v');
if ($tag1 != "") {
    $tag = $tag1;
} else if ($tag2 != "") {
    $tag = $tag2;
} else if ($tag3 != "") {
    $tag = $tag3;
} else {
    $tag = ".xml";
}
$ext = substr($tag, 1, strlen($tag) - 1);
//echo '1.'.$tag1.' 2.'.$tag2.' 3.'.$tag3.' t'.$tag.' '.$ext;return;
/////////////////////////////////////////////////////////////////////

/**
 * 视频地址
 */
$f = 'http://'.DOMAIN.'/player/ckplayer/video.php?url=' . $url;

////////////////////////////播放普通文件////////////////////////////////////////
if ($ext == "mp4" || $ext == "flv" || $ext == "f4v") {
    $f = $url;
}
/////////////////////////////////////////////////////////////////////

/////////////vid和vtype设置开始////////////////
$url_info = parse_url($url);
//print_r($url_info);

$host = ($url_info["host"]);
//echo '<br/>'.$host.'<br/>';

$urls = pathinfo($url);
$vtype = "ifeng";
$vid = "01437a86-10b0-465f-beff-0c37490572d0";
///////////////////////////////////////////////////////////////

if ($host == "v.ifeng.com") {
    //print_r($urls);
    $vtype = "ifeng";
    $vid = $urls["filename"];
    $f = 'http://'.DOMAIN.'/player/ckplayer/watch/play.php?vtype=' . $vtype . '&vid=' . $vid;
    //$f=urlencode($f);
} else if ($host == "www.tudou.com") {
    $vtype = "tudou";
    $vid = $urls["filename"];
} else if ($host == "v.youku.com") {
    $vtype = "youku";
    $vid = substr($urls["filename"], 3, strlen($urls["filename"]) - 3);
} else if ($host == "v.163.com") {
    $vtype = "163";
    $vid = $urls["filename"];
    $f = 'http://'.DOMAIN.'/player/ckplayer/watch/play.php?vtype=' . $vtype . '&vid=' . $vid;
} else if ($host == "v.ku6.com") {
    $vtype = "ku6";
    $vid = substr($urls["filename"], 0, strlen($urls["filename"]) - 2);
} else if ($host == "v.pps.tv") {
    $vtype = "pps";
    $vid = substr($urls["filename"], 5, strlen($urls["filename"]) - 5);
    $f = 'http://'.DOMAIN.'/player/ckplayer/watch/play.php?vtype=' . $vtype . '&vid=' . $vid;
} else if ($host == "tv.cntv.cn") {
    $vtype = "cntv";
    $vid = $urls["filename"];
    $f = 'http://'.DOMAIN.'/player/ckplayer/watch/play.php?vtype=' . $vtype . '&vid=' . $vid;
} else if ($host == "v.qq.com") {
    $vtype = "qq";
    $vid = $urls["filename"];
    $f = 'http://'.DOMAIN.'/player/ckplayer/watch/play.php?vtype=' . $vtype . '&vid=' . $vid;
} else if ($host == "www.letv.com") {
    $vtype = "letv";
    $vid = $urls["filename"];
} else if ($host == "www.56.com") {
    $vtype = "56";
    $vid = substr($urls["filename"], 3, strlen($urls["filename"]) - 3);
    $vid = $urls["filename"];
} else {
    'http://'.DOMAIN.'/player/ckplayer/video.php?url=' . $url;
}
//echo '<br/>'.$vid.'<br/>'.$vtype;return;
/////////////插件切换结束////////////////
$tpl->assign("f", $f);

/**
 * 调用方式
 * 0=普通方法（f=视频地址）
 * 1=网址形式
 * 2=xml形式
 * 3=swf形式(s>0时f=网址，配合a来完成对地址的组装)
 */
$s = 2;
if ($ext == "mp4" || $ext == "flv" || $ext == "f4v") {
    $s = 0;
}
$tpl->assign("s", $s);

/**
 * 分享页面的地址
 */
$my_url = 'http://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
$tpl->assign("my_url", $my_url);

$my_pic = "http://'.DOMAIN.'/logo.png";
$tpl->assign("my_pic", $my_pic);

/**
 *这样设置的话设置a值就会传递到/player/video.php?url=[$pat]
 *比如说a=xxxxxxxxxx_wd1 就会到/player/video.php?url=xxxxxxxxxx_wd1做解析之后返回给播放器文件列表了。
 *一般A值的地址形式，以优酷为例
 *1：播放页地址形式
 *http://v.youku.com/v_show/id_XNTk1MTgwMzg0.html
 *2:分享FLASH地址形式
 *http://player.youku.com/player.php/Type/Folder/Fid/19559278/Ob/1/sid/XNTk1MTgwMzg0/v.swf
 *3：ID形式_wd1
 *XNTk1MTgwMzg0_wd1
 *4：ID形式_youku
 *XNTk1MTgwMzg0_youku
 */
/**
 * 另外解析插件已经集合了画质切换插件的接口:
 * 切换画质的id形式 cq_XNTk1MTgwMzg0_youku
 * 画质切换有标清 高清和超清，默认使用的是高清，可以看到返回的xml
 * <flashvars>
 * {h->2}{a->bq_010ecbc6bffc4affa5db81a2d96c5d8a_qiyi|gq_010ecbc6bffc4affa5db81a2d96c5d8a_qiyi|
 * cq_010ecbc6bffc4affa5db81a2d96c5d8a_qiyi}{f->http://'.DOMAIN.'/ckplayer/video.php?url=[$pat2]}
 * </flashvars>
 * 最终都是汇聚到bq_010ecbc6bffc4affa5db81a2d96c5d8a_qiyi，
 * bq_确定画质ID，
 * 010ecbc6bffc4affa5db81a2d96c5d8a确定解析网站的videoID
 * _qiyi确定解析网站
 * 如此说来其实想要指定画质超清 直接A值传递cq_010ecbc6bffc4affa5db81a2d96c5d8a_qiyi也是可以的。
 */
$a = 'cq_' . $vid . '_' . $vtype;
$tpl->assign("a", $a);

/**
 * 是否自动播放
 * p=0否
 * p=1是
 */
$p = "1";
$tpl->assign("p", $p);

/**
 * 文字广告
 */
$words_ad = '{a href="http://'.DOMAIN.'" target="_blank"}{font color="#FFFFFF" size="14"}欢迎光临新价值网（http://'.DOMAIN.'），本站致力于高质量IT技术交流和影音共享，凡注明来自新价值网的文章和影音作品均为本站原创，部分资源转载于网络，仅限于传播更多技术，如果您觉得我们侵犯了您的权益，欢迎与cbgtyw@gmail.com联系或QQ1035136784！{/font}{/a}';
$tpl->assign("words_ad", $words_ad);

/**
 * 动态改变XML参数
 */
$lid = $vtype . '_' . $vid;
$tpl->assign("lid", $lid);

/**
 * 指定当前播放的视频ID及改变样式
 */
$video_id = "1";
$tpl->assign("vid", $video_id);

/**
 * 视频列表0关，1开
 */
$kai = "1";
$tpl->assign("kai", $kai);

/**
 * 精彩视频
 */
$e = 3;
$tpl->assign("e", $e);

/**
 * 精彩视频
 */
$tpl->assign("vurl", $url);

$tpl->display("index.html");




