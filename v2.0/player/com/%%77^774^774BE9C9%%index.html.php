<?php /* Smarty version 2.6.18, created on 2013-12-24 16:14:27
         compiled from index.html */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ckplayer简单调用演示</title>

<script type="text/javascript" src="http://localhost/player/js/offlights.js"></script>
</head>

<body>
<div id="video" style="position:relative;z-index: 100;width:980px;height:440px;float: left;"><div id="a1"></div></div>

<script type="text/javascript" src="http://localhost/player/ckplayer/ckplayer.js" charset="utf-8"></script>
<script type="text/javascript">
	var flashvars={
		//f:'http://movie.ks.js.cn/flv/other/1_0.flv',//此时s=0
		f:'http://localhost/player/ckplayer/video.php?url=http://v.youku.com/v_show/id_XNjUyMjAwNjU2.html',//此时s=2
        c:0,
	    s:2,//调用方式，0=普通方法（f=视频地址），1=网址形式,2=xml形式，3=swf形式(s>0时f=网址，配合a来完成对地址的组装)
		b:1,
		lid:25,
		vid:144,//指定当前播放的视频ID
		p:1,//视频每次播放不暂停
		kai:1//视频列表0关，1开 
		};
	var params={bgcolor:'#FFF',allowFullScreen:true,allowScriptAccess:'always'};
	CKobject.embedSWF('http://localhost/player/ckplayer/ckplayer.swf','a1','ckplayer_a1','980','440',flashvars,params);
	/*
	CKobject.embedSWF(播放器路径,容器id,播放器id/name,播放器宽,播放器高,flashvars的值,其它定义也可省略);
	下面三行是调用html5播放器用到的
	*/
	var video=['http://movie.ks.js.cn/flv/other/1_0.mp4->video/mp4','http://www.ckplayer.com/webm/0.webm->video/webm','http://www.ckplayer.com/webm/0.ogv->video/ogg'];
	var support=['iPad','iPhone','ios','android+false','msie10+false'];
	CKobject.embedHTML5('video','ckplayer_a1',600,400,video,flashvars,support);
  </script>
</body>
</html>