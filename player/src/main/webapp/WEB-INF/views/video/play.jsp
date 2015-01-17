<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8" isELIgnored="false"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="keywords" content="">
<meta name="description" content="">
<title>${video.videoTitle}_视频无广告播放_纯纯影视</title>
<link rel="shortcut icon" href="${siteConfig.mainUrl}/favicon.ico" type="image/icon">
<link rel="stylesheet" type="text/css" href="${siteConfig.playerUrl}/css/basic.css">
<link rel="stylesheet" type="text/css" href="${siteConfig.playerUrl}/css/play.css">
<!-- CKplayer js css开始 -->   
 <style type="text/css">
body,td,th {
	font-size: 14px;
	line-height: 26px;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
p {
	margin-top: 5px;
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 0px;
	padding-left: 10px;
}
#a1 /*视频容器，非常重要*/
{
	position:relative;
	z-index: 100;
	width:100%;
	height:100%;
	float: left;
}
</style>
<script type="text/javascript" src="${siteConfig.ckplayerHome}/js/offlights.js"></script> 
<!-- CKPlayer js css结束 -->
</head>
<body>
<form style="width: 100%;" class="medium">
    <!-- nav Start -->
    <div class="crumbWrap-black">
        <div class="gui_TopInfo crumb_bar">
            <div class="topInfoC_add" style="left: -6px; margin-left: -50px; top: 0px;">
                <!--旗帜广告新修改-->
                <a href="http://www.terwer.com/tools/search/" target="_blank" title="特维博客|做有思想的IT博客"> <img src="http://www.terwer.com/tools/search/img/logo.png"
                                                                                               style="height: 40px; margin-top: 10px;" alt="特维博客|做有思想的IT博客" title="特维博客|做有思想的IT博客" /></a>
                <!--旗帜广告 end-->
            </div>
            <div class="topInfoC_add" style="left: -6px; margin-left: -50px; top: 0px;">
            </div>
            <!--面包屑新修改 -->
            <div class="crumb_new" data-widget-crumbs="switch" data-widget-crumbs-name="1" data-widget-crumbs-time="time"
                 data-widget-crumbs-en="0" data-widget-crumbs-tags="1" id="widget-crumbs">
                <h1 id="navbar">
                    <em data-widget-crumbs-elem="name" data-widget-crumbs-name-max="0">
                        <span id="sp_title" style="font-family: '微软雅黑'; font-size: 14px; margin-left: -1px;">${video.videoTitle} </span>
                        <a id="get_title" href="#" style="color：red;font-size:14px;" >点击获取视频标题</a>
                        <a  href="${siteConfig.searchUrl}" style="color：green;font-size:14px;" >返回重新搜索<a>
                            <a href="#comments"><span style="color:#9400D3;font-size:14px;">查看评论</span></a>
                            <input id="vurl" type="hidden" value=${video.videoUrl} />
                            <script type="text/javascript" src="${siteConfig.playerUrl}/js/jquery-1.9.1.js"> </script>
                            <script type="text/javascript">
                                $(document).ready(function(){
                                    //ajax_get_title();
                                });
                                $("#get_title").click(function(){
                                    if($(document).attr("title")==""){
                                        ajax_get_title();
                                    }else{
                                        alert("当前标题已是最新标题，无须重新获取！");
                                        return false;
                                    }
                                });
                                function ajax_get_title(){
                                    $.ajax({
                                        type: "GET",
                                        url: "./ckplayer/info/video_title.php",
                                        dataType: "html",
                                        data: "url="+$("#vurl").val(),
                                        beforeSend: function(XMLHttpRequest) {
                                            $("#sp_title").html("正在查询。。。");
                                        },
                                        success: function(msg) {
                                            //alert(msg);
                                            $("#sp_title").html(msg);
                                            $(document).attr("title", msg);
                                            $(get_title).html("重新获取");
                                        },
                                        complete: function(XMLHttpRequest, textStatus) {
                                            //隐藏正在查询图片
                                        },
                                        error: function() {
                                            alert("异步传输错误");
                                            //错误处理
                                        }
                                    });
                                }
                            </script>
                    </em>
                    <span data-widget-crumbs-elem="en" style="display: none;"></span><span data-widget-crumbs-elem="time"
                                                                                           style="display: none;"></span>
                </h1>

                <p style="float: left;">
                            <span data-widget-crumbs-elem="2">
                                <div style="color: wheat">本程序由<a target="_blank" title="另，郑重声明：本程序视频均来自优酷，原视频版权归优酷所有"  href="http://weibo.com/206464069/">@LeaveBugsAway</a>
<span>开发,大家有什么意见建议，欢迎<a
        style="color: yellowgreen" href="${siteConfig.blogUrl}/aboutme/#respond"
        target="_blank">留言</a>。<strong><span style="color:green;">长江大学2010级软工1002<font
        color="red">唐有炜</font>作品。</span></strong>
                            </span>
                </p>
            </div>
            <!--面包屑新修改 end-->

        </div>
    </div>
    <!-- nav End -->
    
    <!--播放器 开始-->
    <div id="flashArea" class="vdoContainer margin_b20">
        <div class="vdoContent videoExpand" id="j-video-box" style="position: relative;">
            <!--flash-->
            <div class="videoPlay medium">
                <div id="flashbox" class="vdoPlayer padplay0108" style="height: 520px; position: relative; width: 980px;">
                
                    <!--Flash嵌入地址-->
                    <div id="video" style="position:relative;z-index: 100;width:100%;height:100%;float: left;"><div id="a1"></div></div>
                    <div id="a1"></div>
<!--
上面一行是播放器所在的容器名称，如果只调用flash播放器，可以只用<div id="a1"></div>
-->
                    <script type="text/javascript" src="${siteConfig.ckplayerHome}/ckplayer/ckplayer.js"></script>
                    <script type="text/javascript">
                    var flashvars={
                    		//f:'http://movie.ks.js.cn/flv/other/2014/06/20-2.flv',//视频地址
                    		f:'${video.f}',//视频地址
                    		a:'',//调用时的参数，只有当s>0的时候有效
                    		s:'${video.s}',//调用方式，0=普通方法（f=视频地址），1=网址形式,2=xml形式，3=swf形式(s>0时f=网址，配合a来完成对地址的组装)
                    		c:'0',//是否读取文本配置,0不是，1是
                    		x:'',//调用配置文件路径，只有在c=1时使用。默认为空调用的是ckplayer.xml
                    		i:'http://www.ckplayer.com/images/loadimg3.jpg',//初始图片地址
                    		d:'http://www.ckplayer.com/down/pause6.1_1.swf|http://www.ckplayer.com/down/pause6.1_2.swf',//暂停时播放的广告，swf/图片,多个用竖线隔开，图片要加链接地址，没有的时候留空就行
                    		u:'',//暂停时如果是图片的话，加个链接地址
                    		l:'http://www.ckplayer.com/down/adv6.1_1.swf|http://www.ckplayer.com/down/adv6.1_2.swf',//前置广告，swf/图片/视频，多个用竖线隔开，图片和视频要加链接地址
                    		r:'',//前置广告的链接地址，多个用竖线隔开，没有的留空
                    		t:'10|10',//视频开始前播放swf/图片时的时间，多个用竖线隔开
                    		y:'',//这里是使用网址形式调用广告地址时使用，前提是要设置l的值为空
                    		z:'http://www.ckplayer.com/down/buffer.swf',//缓冲广告，只能放一个，swf格式
                    		e:'3',//视频结束后的动作，0是调用js函数，1是循环播放，2是暂停播放并且不调用广告，3是调用视频推荐列表的插件，4是清除视频流并调用js功能和1差不多，5是暂停播放并且调用暂停广告
                    		v:'80',//默认音量，0-100之间
                    		p:'1',//视频默认0是暂停，1是播放，2是不加载视频
                    		h:'3',//播放http视频流时采用何种拖动方法，=0不使用任意拖动，=1是使用按关键帧，=2是按时间点，=3是自动判断按什么(如果视频格式是.mp4就按关键帧，.flv就按关键时间)，=4也是自动判断(只要包含字符mp4就按mp4来，只要包含字符flv就按flv来)
                    		q:'',//视频流拖动时参考函数，默认是start
                    		m:'',//让该参数为一个链接地址时，单击播放器将跳转到该地址
                    		o:'',//当p=2时，可以设置视频的时间，单位，秒
                    		w:'',//当p=2时，可以设置视频的总字节数
                    		g:'',//视频直接g秒开始播放
                    		j:'',//跳过片尾功能，j>0则从播放多少时间后跳到结束，<0则总总时间-该值的绝对值时跳到结束
                    		k:'30|60',//提示点时间，如 30|60鼠标经过进度栏30秒，60秒会提示n指定的相应的文字
                    		n:'这是提示点的功能，如果不需要删除k和n的值|提示点测试60秒',//提示点文字，跟k配合使用，如 提示点1|提示点2
                    		wh:'',//宽高比，可以自己定义视频的宽高或宽高比如：wh:'4:3',或wh:'1080:720'
                    		lv:'0',//是否是直播流，=1则锁定进度栏
                    		loaded:'loadedHandler',//当播放器加载完成后发送该js函数loaded
                    		//调用播放器的所有参数列表结束
                    		//以下为自定义的播放器参数用来在插件里引用的
                    		my_url:encodeURIComponent(window.location.href)//本页面地址
                    		//调用自定义播放器参数结束
                    		};
                    	var params={bgcolor:'#FFF',allowFullScreen:true,allowScriptAccess:'always'};//这里定义播放器的其它参数如背景色（跟flashvars中的b不同），是否支持全屏，是否支持交互
                    	var video=['http://movie.ks.js.cn/flv/other/1_0.mp4->video/mp4','http://www.ckplayer.com/webm/0.webm->video/webm','http://www.ckplayer.com/webm/0.ogv->video/ogg'];
                    	CKobject.embed('${siteConfig.ckplayerHome}/ckplayer/ckplayer.swf','a1','ckplayer_a1','100%','100%',false,flashvars,video,params);
                    	/*
                    		以上代码演示的兼容flash和html5环境的。如果只调用flash播放器或只调用html5请看其它示例
                    	*/
                    </script>

                    <!--Flash嵌入地址结束-->

                </div>
            </div>
        </div>

    </div>
    <!--播放器 结束-->
</form>
<!--视频信息-->
<iframe id="iFrame1" style="margin-top:-28x;height:175px;" name="iFrame1" width="100%"  frameborder="0" src="${siteConfig.playerUrl}/info/videoInfo?url=${video.videoUrl}"></iframe>
<!--评论-->
<iframe id="comments" style="margin-top:-18x;height: 500px" name="comments" width="100%" frameborder="0" src="${siteConfig.playerUrl}/info/comments?url=${video.videoUrl}"    ></iframe>
<center style="margin-top: -20px;">

    <br/>
    <div>长江大学2010级软工1002唐有炜作品</div>
    新浪微博<img src="http://weibo.com/favicon.ico" style="height: 18px;" alt="sina"> <a href="http://weibo.com/tyouwei"
                                                                                     target="_blank">@LeaveBugsAway</a><br/>
    CopyRight &copy;&nbsp;2010-
    2013
    <a href="${siteConfig.mainUrl}" class="" target="_blank">${siteConfig.mainUrl}</a> &nbsp;All Rjghts Reserved.
    <script src="http://s21.cnzz.com/stat.php?id=4445524&web_id=4445524&show=pic" language="JavaScript"></script>
</center>
<!-- JiaThis Button BEGIN -->
<script type="text/javascript">
    var jiathis_config = {
        data_track_clickback: true,
        summary: "",
        ralateuid: {
            "tsina": "LeaveBugsAway"
        },
        appkey: {
            "tsina": "868103833"
        },
        showClose: true,
        shortUrl: false,
        hideMore: false
    }
</script>
<script type="text/javascript" src="http://v3.jiathis.com/code/jiathis_r.js?uid=1507757&btn=r4.gif&move=0"
        charset="utf-8"></script>
<!-- JiaThis Button END -->
</body>
</html>