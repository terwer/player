﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ckplayer简单调用演示</title>

<script type="text/javascript" src="http://localhost/ckplayer/js/offlights.js"></script>
</head>

<body>
<div id="video" style="position:relative;z-index: 100;width:600px;height:400px;float: left;"><div id="a1"></div></div>

<script type="text/javascript" src="http://localhost/player/ckplayer/ckplayer.js" charset="utf-8"></script>
<script type="text/javascript">
	var flashvars={
		//f:'http://movie.ks.js.cn/flv/other/1_0.flv',//此时s=0
		f:'http://localhost/player/ckplayer/video.php?url=http://v.youku.com/v_show/id_XNjUyMjAwNjU2.html',//此时s=2
        //f:'http://localhost/player/ckplayer/video.php?url=http://v.youku.com/v_show/id_XNjM3MzE0MjU2.html',
        c:0,
		b:1,
		s:2,
		p:1,
		kai:1,//视频列表0关，1开
		lid:11,//动态改变XML参数
		vid:144//指定当前播放的视频ID及改变样式
		};
	var params={bgcolor:'#FFF',allowFullScreen:true,allowScriptAccess:'always'};
	CKobject.embedSWF('http://localhost/player/ckplayer/ckplayer.swf','a1','ckplayer_a1','980','520',flashvars,params);
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