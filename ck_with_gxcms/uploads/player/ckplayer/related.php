<?php

$pat=0;
$vid="";
$vtype="youku";
$id_arr=array();
if(isset($_GET["id"])){
$pat=$_GET["id"];
$id_arr=explode('_',$pat);
}
if($id_arr!=false){
$vid=$id_arr[1];
$vtype=$id_arr[2];
}


if($vtype=="youku"){
echo '<?xml version="1.0" encoding="utf-8"?>
<ckplayer>
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
  <relatedlist>
    <related>
      <img>http://localhost/ckplayer/temp/1.jpg</img>
      <url>http://www.ckplayer.com/index.php?id=1</url>
      <title>aaa    '.$vid.'   '.$vtype.'    hahahahahahahahaah</title>
    </related>
    <related>
      <img>http://localhost/ckplayer/temp/2.jpg</img>
      <url>http://www.ckplayer.com/index.php?id=2</url>
      <title>支持多页调用</title>
    </related>
    <related>
      <img>http://localhost/ckplayer/temp/3.jpg</img>
      <url>http://www.ckplayer.com/index.php?id=3</url>
      <title>文本请保持在二行，不能多于三行，多于三行将不显示</title>
    </related>
    <related>
      <img>http://localhost/ckplayer/temp/4.jpg</img>
      <url>http://www.ckplayer.com/index.php?id=3</url>
      <title>支持多行调用，多页调用</title>
    </related>
    <related>
      <img>http://localhost/ckplayer/temp/5.jpg</img>
      <url>http://www.ckplayer.com/index.php?id=2</url>
      <title>感谢对ckplayer的支持</title>
    </related>
    <related>
      <img>http://localhost/ckplayer/temp/6.jpg</img>
      <url>http://www.ckplayer.com/index.php?id=1</url>
      <title>最多两行,请不要超过二行</title>
    </related>
    <related>
      <img>http://localhost/ckplayer/temp/3.jpg</img>
      <url>http://www.ckplayer.com/index.php?id=1</url>
      <title>这里调用的文件配置在ckplayer/related.xml里</title>
    </related>
    <related>
      <img>http://localhost/ckplayer/temp/5.jpg</img>
      <url>http://www.ckplayer.com/index.php?id=2</url>
      <title>支持多页调用</title>
    </related>
    <related>
      <img>thttp://localhost/ckplayer/emp/4.jpg</img>
      <url>http://www.ckplayer.com/index.php?id=3</url>
      <title>文本请保持在二行，不能多于三行，多于三行将不显示</title>
    </related>
    <related>
      <img>http://localhost/ckplayer/temp/1.jpg</img>
      <url>http://www.ckplayer.com/index.php?id=3</url>
      <title>支持多行调用，多页调用</title>
    </related>
    <related>
      <img>http://localhost/ckplayer/temp/2.jpg</img>
      <url>http://www.ckplayer.com/index.php?id=2</url>
      <title>感谢对ckplayer的支持</title>
    </related>
    <related>
      <img>http://localhost/ckplayer/temp/6.jpg</img>
      <url>http://www.ckplayer.com/index.php?id=1</url>
      <title>最多两行,请不要超过二行</title>
    </related>
    <related>
      <img>http://localhost/ckplayer/temp/5.jpg</img>
      <url>http://www.ckplayer.com/index.php?id=1</url>
      <title>这里调用的文件配置在ckplayer/related.xml里</title>
    </related>
    <related>
      <img>http://localhost/ckplayer/temp/4.jpg</img>
      <url>http://www.ckplayer.com/index.php?id=2</url>
      <title>支持多页调用</title>
    </related>
    <related>
      <img>http://localhost/ckplayer/temp/6.jpg</img>
      <url>http://www.ckplayer.com/index.php?id=3</url>
      <title>文本请保持在二行，不能多于三行，多于三行将不显示</title>
    </related>
    <related>
      <img>http://localhost/ckplayer/temp/3.jpg</img>
      <url>http://www.ckplayer.com/index.php?id=3</url>
      <title>支持多行调用，多页调用</title>
    </related>
    <related>
      <img>http://localhost/ckplayer/temp/1.jpg</img>
      <url>http://www.ckplayer.com/index.php?id=2</url>
      <title>感谢对ckplayer的支持</title>
    </related>
    <related>
      <img>http://localhost/ckplayer/temp/2.jpg</img>
      <url>http://www.ckplayer.com/index.php?id=1</url>
      <title>最多两行,请不要超过二行</title>
    </related>
  </relatedlist>
</ckplayer>';  
}else{

echo '<?xml version="1.0" encoding="utf-8"?>
<ckplayer>
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
  <relatedlist>
    <related>
      <img>http://localhost/ckplayer/temp/1.jpg</img>
      <url>http://www.ckplayer.com/index.php?id=1</url>
      <title>这是个测试的</title>
    </related>
    <related>
      <img>http://localhost/ckplayer/temp/2.jpg</img>
      <url>http://www.ckplayer.com/index.php?id=2</url>
      <title>支持多页调用</title>
    </related>
    <related>
      <img>http://localhost/ckplayer/temp/3.jpg</img>
      <url>http://www.ckplayer.com/index.php?id=3</url>
      <title>文本请保持在二行，不能多于三行，多于三行将不显示</title>
    </related>
    <related>
      <img>http://localhost/ckplayer/temp/4.jpg</img>
      <url>http://www.ckplayer.com/index.php?id=3</url>
      <title>支持多行调用，多页调用</title>
    </related>
    <related>
      <img>http://localhost/ckplayer/temp/5.jpg</img>
      <url>http://www.ckplayer.com/index.php?id=2</url>
      <title>感谢对ckplayer的支持</title>
    </related>
    <related>
      <img>http://localhost/ckplayer/temp/6.jpg</img>
      <url>http://www.ckplayer.com/index.php?id=1</url>
      <title>最多两行,请不要超过二行</title>
    </related>
    <related>
      <img>http://localhost/ckplayer/temp/3.jpg</img>
      <url>http://www.ckplayer.com/index.php?id=1</url>
      <title>这里调用的文件配置在ckplayer/related.xml里</title>
    </related>
    <related>
      <img>http://localhost/ckplayer/temp/5.jpg</img>
      <url>http://www.ckplayer.com/index.php?id=2</url>
      <title>支持多页调用</title>
    </related>
    <related>
      <img>thttp://localhost/ckplayer/emp/4.jpg</img>
      <url>http://www.ckplayer.com/index.php?id=3</url>
      <title>文本请保持在二行，不能多于三行，多于三行将不显示</title>
    </related>
    <related>
      <img>http://localhost/ckplayer/temp/1.jpg</img>
      <url>http://www.ckplayer.com/index.php?id=3</url>
      <title>支持多行调用，多页调用</title>
    </related>
    <related>
      <img>http://localhost/ckplayer/temp/2.jpg</img>
      <url>http://www.ckplayer.com/index.php?id=2</url>
      <title>感谢对ckplayer的支持</title>
    </related>
    <related>
      <img>http://localhost/ckplayer/temp/6.jpg</img>
      <url>http://www.ckplayer.com/index.php?id=1</url>
      <title>最多两行,请不要超过二行</title>
    </related>
    <related>
      <img>http://localhost/ckplayer/temp/5.jpg</img>
      <url>http://www.ckplayer.com/index.php?id=1</url>
      <title>这里调用的文件配置在ckplayer/related.xml里</title>
    </related>
    <related>
      <img>http://localhost/ckplayer/temp/4.jpg</img>
      <url>http://www.ckplayer.com/index.php?id=2</url>
      <title>支持多页调用</title>
    </related>
    <related>
      <img>http://localhost/ckplayer/temp/6.jpg</img>
      <url>http://www.ckplayer.com/index.php?id=3</url>
      <title>文本请保持在二行，不能多于三行，多于三行将不显示</title>
    </related>
    <related>
      <img>http://localhost/ckplayer/temp/3.jpg</img>
      <url>http://www.ckplayer.com/index.php?id=3</url>
      <title>支持多行调用，多页调用</title>
    </related>
    <related>
      <img>http://localhost/ckplayer/temp/1.jpg</img>
      <url>http://www.ckplayer.com/index.php?id=2</url>
      <title>感谢对ckplayer的支持</title>
    </related>
    <related>
      <img>http://localhost/ckplayer/temp/2.jpg</img>
      <url>http://www.ckplayer.com/index.php?id=1</url>
      <title>最多两行,请不要超过二行</title>
    </related>
  </relatedlist>
</ckplayer>';  
}

?>