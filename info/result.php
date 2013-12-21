<?php
include "./includes/youku.php";
require "/home/v78/domains/xinvalue.com/public_html/ckplayer/info/init.inc.php";
require "/home/v78/domains/xinvalue.com/public_html/secret.php";

if (isset($_GET["keyword"])) {
    $keyword = $_GET["keyword"];

    $arr = explode('.', $keyword);
    //dump($arr);
    if (count($arr) == 2) {
        $keyword = $arr[1];
    }
$tpl->assign("keyword",$keyword );

//节目搜索结果
$video_result = searches_by_keyword($keyword);
$tpl->assign("result", $video_result);

//单个视频搜索结果
$page=1;
if (isset($_GET["page"])) {
$page= $_GET["page"];
}


$tpl->assign("page",$page);
$tpl->assign("page", $page);


$count=20;
if (isset($_GET["count"])) {
$count= $_GET["count"];
}
$tpl->assign("count",$count);
  
$simple_video_result = searches_video_by_keyword($keyword,$page,$count);
$tpl->assign("simple_video_result", $simple_video_result);
//dump($simple_video_result);
//return;

if($simple_video_result->total%$count==0){
$page_num=floor(($simple_video_result->total)/$count);
}else{
$page_num=floor(($simple_video_result->total)/$count)+1;
}
  if($page_num>100){
  $page_num=100;
  }

  
  
$tpl->assign("page_num",$page_num);//
//echo '总共有'.$simple_video_result->total.'个项目，总共有'.$page_num.'页，每页有'.$count.'项，起始页码，'.$start.'终止页码'.$end.'，当前页码'.$page;

$pages=array();
for($i=1;$i<= $page_num;$i++){
$pages[$i]=$i;
}
$tpl->assign("pages",$pages);
//dump($pages);
//return;

$tpl->display("result.html");
} else {
echo 'keyword cannot be empty!';
}
?>