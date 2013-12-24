<?php 
function  get_site_info($url){
$site_info= array(
    "charset" => "charset",
    "title" => "title",
	"description"=>"description"
);
//获取远程网页的编码
function _charset($url){
  $text = file_get_contents($url);
  $mode = '/charset=(.*)\"/iU';
  preg_match($mode,$text,$result);
  return $result[1];
}
$charset = _charset($url);//获取远程网页的编码
$site_info["charset"]=$charset;
//以上为公用


//1：获取远程网页的标题，$url地址,$charset用于判断编码
function _title($url,$charset){
  $text = file_get_contents($url);
  
  //如果是gb2312编码处理乱码
  if ($charset == 'gb2312'){
   $text = iconv('gb2312','utf-8',$text);
  }
  
  $mode = '/<title>(.*)<\/title>/iU';
  preg_match($mode,$text,$result);
  return $result[1];
}
$site_info["title"]=_title($url,$charset); //获取远程网页的标题
//echo '网站标题：'.$title = _title($url,$charset); //获取远程网页的标题



//2：获取远程网页的简介
function _description($url,$charset){
  $text = file_get_contents($url);

  //gb2312编码乱码处理
  if ($charset == 'gb2312'){
   $text = iconv('gb2312','utf-8',$text);
  }
  
  $mode = '/<meta\s+name=\"description\"\s+content=\"(.*)\"\s?\/?>/iU';
  preg_match($mode,$text,$result);
  return $result[1];

}
//echo '网站简介：'.$description = _description($url,$charset); //获取远程网页的简介
$site_info["description"]=_description($url,$charset); //获取远程网页的简介
return $site_info;
}
$url = 'http://www.xinvalue.com'; 
$info=get_site_info($url);

$json=json_encode($info);
echo $json;
?>