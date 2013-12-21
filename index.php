<?php
/**
 * Created by PhpStorm.
 * User: Terwer
 * Date: 13-12-8
 * Time: 上午6:46
 */
include_once "D:/MyCode/ckplayer/secret.php";
//include_once "/home/v78/domains/xinvalue.com/public_html/secret.php";
require "D:/MyCode/ckplayer/init.inc.php";
//require "/home/v78/domains/xinvalue.com/public_html/ckplayer/init.inc.php";

/**
*消除Undefined variable错误
*/
//ini_set("error_reporting","E_ALL & ~E_NOTICE");

/**
*加密处理
*/
$de_key= "http://v.youku.com/v_show/id_XNjI2NzMxODQ0.html";
$tag="";
if(isset($_GET["key"])){
$en_key=trim($_GET["key"]);
$de_key=decode($en_key,"cbgtyw2020");
$tag1=strstr($de_key,'.mp4');
$tag2=strstr($de_key,'.flv');
$tag2=strstr($de_key,'.f4v');
  if($tag1!=""){
    $tag=$tag1;
  }else if($tag2!=""){
  $tag=$tag2;
}else if($tag3!=""){
  $tag=$tag3;
}else{
  $tag=".xml"; 
}
}

$title = "视频播放|新价值网-做有思想的IT博客";
$tpl->assign("title", $title);

/**
 * 视频地址
 */
$f = 'http://www.xinvalue.com/ckplayer/video.php?url=' . $de_key;
//$f='http://movie.ks.js.cn/flv/other/1_0.flv';
if($tag!=""&&($tag==".mp4"||$tag==".flv")){
  $f=$de_key;
}

/////////////开始////////////////
$url_info = parse_url($de_key);
//print_r($url_info);

$host = ($url_info["host"]);
//echo '<br/>'.$host.'<br/>';

$urls = pathinfo($de_key);
$vtype = "ifeng";
$vid = "01437a86-10b0-465f-beff-0c37490572d0";
if ($host == "v.ifeng.com") {
//print_r($urls);
    $vid = $urls["filename"];
    $f = 'http://www.xinvalue.com/ckplayer/watch/play.php?vtype=' . $vtype . '&vid=' . $vid;
//$f=urlencode($f);
} else if ($host == "www.tudou.com") {
    $vtype = "tudou";
    $vid = $urls["filename"];//
    $f = 'http://www.xinvalue.com/ckplayer/watch/play.php?vtype=' . $vtype . '&vid=' . $vid;
} else if ($host == "v.youku.com") {
    $vtype = "youku";
    $vid = substr($urls["filename"],3,strlen($urls["filename"])-3);//
    $f = 'http://www.xinvalue.com/ckplayer/watch/play.php?vtype=' . $vtype . '&vid=' . $vid;
} else if ($host == "v.163.com") {
    $vtype = "163";
    $vid = $urls["filename"];//
    $f = 'http://www.xinvalue.com/ckplayer/watch/play.php?vtype=' . $vtype . '&vid=' . $vid;
}else if ($host == "v.ku6.com") {
    $vtype = "ku6";
    $vid = substr($urls["filename"],0,strlen($urls["filename"])-2);//
    $f = 'http://www.xinvalue.com/ckplayer/watch/play.php?vtype=' . $vtype . '&vid=' . $vid;
}else if ($host == "v.pps.tv") {
    $vtype = "pps";
    $vid = substr($urls["filename"],5,strlen($urls["filename"])-5);//
    $f = 'http://www.xinvalue.com/ckplayer/watch/play.php?vtype=' . $vtype . '&vid=' . $vid;
}else if ($host == "tv.cntv.cn") {
    $vtype = "cntv";
    $vid = $urls["filename"];//
    $f = 'http://www.xinvalue.com/ckplayer/watch/play.php?vtype=' . $vtype . '&vid=' . $vid;
}else if ($host == "v.qq.com") {
   $vtype = "qq";
    $vid = $urls["filename"];//
    $f = 'http://www.xinvalue.com/ckplayer/watch/play.php?vtype=' . $vtype . '&vid=' . $vid;
}else {
    'http://www.xinvalue.com/ckplayer/video.php?url=' . $de_key;
}
//echo '<br/>'.$vid.'<br/>';
/////////////插件切换结束////////////////
$tpl->assign("f", $f);

/**
 * 调用方式
 * 0=普通方法（f=视频地址）
 * 1=网址形式
 * 2=xml形式
 * 3=swf形式(s>0时f=网址，配合a来完成对地址的组装)
*/
$s= 2;
if($tag==".mp4"||$tag==".flv"){
$s=0;
}
$tpl->assign("s", $s);

/**
 * 分享页面的地址
 */
$my_url = 'http://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
$tpl->assign("my_url", $my_url);

$my_pic="";
//$tpl->assign("my_pic", $my_pic);

$a= "";
//$tpl->assign("a", $a);

/**
 * 是否自动播放
 * p=0否
 * p=1是
 */
$p= "1";
$tpl->assign("p", $p);

/**
 * 文字广告
 */
$words_ad='{a href="http://www.xinvalue.com" target="_blank"}{font color="#FFFFFF" size="14"}欢迎光临新价值网（http://www.xinvalue.com），本站致力于高质量IT技术交流和影音共享，凡注明来自新价值网的文章和影音作品均为本站原创，部分资源转载于网络，仅限于传播更多技术，如果您觉得我们侵犯了您的权益，欢迎与cbgtyw@gmail.com联系或QQ1035136784！{/font}{/a}';
$tpl->assign("words_ad", $words_ad);

/**
 * 动态改变XML参数
 */
$lid= "11";
$tpl->assign("lid", $lid);

/**
 * 指定当前播放的视频ID及改变样式
 */
$vid= "145";
$tpl->assign("vid", $vid);

/**
 * 视频列表0关，1开
 */
$kai= "0";
$tpl->assign("kai", $kai);


/**
 * 视频处理
 */
/*
if($tag=="http"){//因为默认解析优酷、土豆、乐视、56，所以这里解析其他网站，先把这些网站排除
$f="http://v.iask.com/v_play.php?vid=105330811";
$tpl->assign("f",$f);
}
*/

/**
 * 修改标题
 */
//$fp=fopen('http;//www.xinvalue.com/ckplayer/url.php?url='.$url,'r');
//$result="";
//while(!feof($fp)){
//    $result.=fgets($fp,1024);
//}
//echo(substr($result,3,strlen($result)-3));
//$clean_result= utf8_encode(substr($result,3,strlen($result)-3));
//$json_result=json_decode($clean_result);
//var_dump($json_result);
//$json_result->title;
$video_title= "为了加快视频加载速度，视频标题已延迟加载，";
$tpl->assign("video_title",$video_title);

/**
*
*/
$vurl= $de_key;
$tpl->assign("vurl",$vurl);

//$f="http://vv.video.qq.com/geturl?vid=b0113x7xx0m&otype=xml&platform=1&ran=0%2E9652906153351068";
//$tpl->assign("f",$f);

$tpl->display("index.html");
?>