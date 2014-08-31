<?php /* Smarty version 2.6.18, created on 2014-08-31 12:01:21
         compiled from index.html */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title><?php echo $this->_tpl_vars['title']; ?>
</title>
    <link rel="shortcut icon" href="http://<?php echo $this->_tpl_vars['domain']; ?>
/favicon.ico" type="image/icon">
    <link rel="stylesheet" type="text/css" href="http://<?php echo $this->_tpl_vars['player_domain']; ?>
/playFiles/basic_other.css">
    <link rel="stylesheet" type="text/css" href="http://<?php echo $this->_tpl_vars['player_domain']; ?>
/playFiles/play_new.css">
    <script src="http://<?php echo $this->_tpl_vars['player_domain']; ?>
/playFiles/ex_002.js"></script>
    <script src="http://<?php echo $this->_tpl_vars['player_domain']; ?>
/playFiles/main.js"></script>
    <script src="http://<?php echo $this->_tpl_vars['player_domain']; ?>
/playFiles/beacon.js" ></script>
    <script src="http://<?php echo $this->_tpl_vars['player_domain']; ?>
/playFiles/qa.js" ></script>
    <script src="http://<?php echo $this->_tpl_vars['player_domain']; ?>
/playFiles/hm.js"></script>
    <!--顶部引用脚本-->
    <script type="text/javascript" src="http://<?php echo $this->_tpl_vars['player_domain']; ?>
/playFiles/sea1.js"></script>
    <script type="text/javascript" src="http://<?php echo $this->_tpl_vars['player_domain']; ?>
/playFiles/ver.js"></script>
    <script type="text/javascript" src="http://<?php echo $this->_tpl_vars['player_domain']; ?>
/playFiles/iwt.js"></script>
    <script type="text/javascript" src="http://<?php echo $this->_tpl_vars['player_domain']; ?>
/playFiles/setPlay.js" ></script>
    <script type="text/javascript" src="http://<?php echo $this->_tpl_vars['player_domain']; ?>
/js/offlights.js"></script>
</head>
<body>
<div id="flashcontent"></div>
<script type="text/javascript">
    var box = new LightBox('flashcontent');
    var $ = function (id) {
        return document.getElementById(id)
    };
    function closelights() {//关灯
        box.Show();
         $('#video').style.width = '980px';
         $('#video').style.height = '520px';
         swfobject.getObjectById('ckplayer_a1').width = 980;
         swfobject.getObjectById('ckplayer_a1').height = 520;
    }
    function openlights() {//开灯
        box.Close();
         $('#video').style.width = '100%';
         $('#video').style.height = '100%';
         swfobject.getObjectById('ckplayer_a1').width = 600;
         swfobject.getObjectById('ckplayer_a1').height = 400;
    }
    function ckmarqueeadv(){
        return '<?php echo $this->_tpl_vars['words_ad']; ?>
';
    }
</script>

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
                        <span id="sp_title" style="font-family: '微软雅黑'; font-size: 14px; margin-left: -1px;"><?php echo $this->_tpl_vars['video_title']; ?>
 </span>
                        <a id="get_title" href="#" style="color：red;font-size:14px;" >点击获取视频标题</a>
                        <a  href="http://<?php echo $this->_tpl_vars['search_domain']; ?>
" style="color：green;font-size:14px;" >返回重新搜索<a>
                            <a href="#comments"><span style="color:#9400D3;font-size:14px;">查看评论</span></a>
                            <input id="vurl" type="hidden" value=<?php echo $this->_tpl_vars['vurl']; ?>
 />
                            <script type="text/javascript" src="http://<?php echo $this->_tpl_vars['player_domain']; ?>
/js/jquery-1.9.1.js"> </script>
                            <script type="text/javascript">
                                $(document).ready(function(){
                                    ajax_get_title();
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
                                <div style="color: wheat">本程序由<a target="_blank" title="另，郑重声明：本程序视频均来自优酷，原视频版权归优酷所有"
                                                                 href="http://weibo.com/206464069/">@LeaveBugsAway</a>
<span>开发,大家有什么意见建议，欢迎<a
        style="color: yellowgreen" href="http://<?php echo $this->_tpl_vars['domain']; ?>
/aboutme/#respond"
        target="_blank">留言</a>。<strong><span style="color:green;">长江大学2010级软工1002<font
        color="red">唐有炜</font>作品。</span></strong>
                            </span>
                </p>
            </div>
            <!--面包屑新修改 end-->

        </div>
    </div>
    <!-- nav End -->
    <!--顶部播放器 开始-->

    <div id="flashArea" class="vdoContainer margin_b20">
        <div class="vdoContent videoExpand" id="j-video-box" style="position: relative;" data-widget-switchlight="light">
            <!--flash-->
            <div class="videoPlay medium">
                <div id="flashbox" class="vdoPlayer padplay0108" style="height: 520px; position: relative; width: 980px;">
                    <div class="ctrl-layer" data-widget-layer="layer" style="display: none">
                        <!--btn-->
                        <div class="ctrl-layerhalf" data-widget-videolayer="bigPlayLayer">
                            <div class="layer-btn"><a class="ctrlbigplay" href="#" data-videolayer-elem="bigPlayOrStop"></a>
                            </div>
                            <!--<div class="layer-load"><img src="http://www.qiyipic.com/common/images/load.gif" />正在加载...</div>-->
                        </div>
                        <!--btn-->
                        <!--skin-->
                        <div class="video-controlbox clearfix" data-widget-videoctrl="videoControl">
                            <div class="ctrl-top"></div>
                            <div class="ctrl-bot">
                                <div class="ctrl-m">
                                    <div class="ctrl-c">
                                        <div class="ctrl-scheduleBox">
                                            <div class="ctrl-scrollbg" data-videoctrl-elem="progressBar">
                                                <div class="ctrl-huibg">
                                                    <div class="ctrl-scrollbtn" data-videoctrl-elem="progress"><em
                                                            class="ctrl-circle" data-videoctrl-elem="progressFocus"></em>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ctrl-l">
                                    <div class="ctrl-btn"><a class="ctrlplay" href="#" data-videoctrl-elem="playOrStop"></a>
                                    </div>
                                    <!--加载中class名为ctrlwait   暂停class名为ctrlstop-->
                                    <div class="ctrl-split"></div>
                                    <div class="ctrl-time" data-videoctrl-elem="currentTime">00:00:00</div>
                                </div>
                                <div class="ctrl-r">
                                    <div class="ctrl-btn"><a class="ctrlscreen" href="#"
                                                             data-videoctrl-elem="fullScreen"></a></div>
                                    <!--退出全屏class名为ctrlEditscreen-->
                                    <div class="ctrl-btn"><a class="ctrlOpen" href="#" style="display: none;"
                                                             data-videoctrl-elem="expand" data-videoctrl-expandstate=""></a>
                                    </div>
                                    <!--收起class名为ctrlClose-->
                                    <div class="ctrl-time" data-videoctrl-elem="totalTime">00:00:00</div>
                                </div>
                            </div>
                        </div>
                        <!--end-->
                    </div>

                    <!--Flash嵌入地址-->
                    <div id="video" style="position:relative;z-index: 100;width:100%;height:100%;float: left;"><div id="a1"></div></div>
                    <script type="text/javascript" src="http://<?php echo $this->_tpl_vars['player_domain']; ?>
/ckplayer/ckplayer.js"></script>
                    <script type="text/javascript">
                        var flashvars={
                                    f:"<?php echo $this->_tpl_vars['f']; ?>
",
                                    c:0,
                                    b:1,
                                    p:<?php echo $this->_tpl_vars['p']; ?>
,
                                my_url:"<?php echo $this->_tpl_vars['my_url']; ?>
",
                                my_pic:"<?php echo $this->_tpl_vars['my_pic']; ?>
",
                                a:"<?php echo $this->_tpl_vars['a']; ?>
",
                                s:<?php echo $this->_tpl_vars['s']; ?>
,
                        lid:'<?php echo $this->_tpl_vars['lid']; ?>
',//动态改变XML参数
                                vid:<?php echo $this->_tpl_vars['vid']; ?>
,//指定当前播放的视频ID及改变样式
                        kai:<?php echo $this->_tpl_vars['kai']; ?>
,//视频列表0关，1开
                        e:<?php echo $this->_tpl_vars['e']; ?>
//e=3显示精彩视频
                        };
                        var params={bgcolor:"#FFF",allowFullScreen:true,allowScriptAccess:"always"};
                        CKobject.embedSWF("http://<?php echo $this->_tpl_vars['player_domain']; ?>
/ckplayer/ckplayer.swf","a1","ckplayer_a1","980","520",flashvars,params);
                        //CKobject.embedSWF(播放器路径,容器id,播放器id/name,播放器宽,播放器高,flashvars的值,其它定义也可省略);
                        //下面三行是调用html5播放器用到的
                        var video=["http://movie.ks.js.cn/flv/other/1_0.mp4->video/mp4","http://www.ckplayer.com/webm/0.webm->video/webm","http://www.ckplayer.com/webm/0.ogv->video/ogg"];
                        var support=["iPad","iPhone","ios","android+false","msie10+false"];
                        CKobject.embedHTML5("video","ckplayer_a1","100%","100%",video,flashvars,support);

                    </script>

                    <!--Flash嵌入地址结束-->

                </div>
            </div>
            <!--flash播放器 结束-->
        </div>

    </div>
    <!--顶部播放器 结束-->
</form>
<!--视频信息-->
<iframe id="iFrame1" style="margin-top:-28x;height:175px;" name="iFrame1" width="100%"  frameborder="0" src="http://<?php echo $this->_tpl_vars['player_domain']; ?>
/ckplayer/info/info.php?url=<?php echo $this->_tpl_vars['vurl']; ?>
"></iframe>
<!--评论-->
<iframe id="comments" style="margin-top:-18x;height: 500px" name="comments" width="100%" frameborder="0" src="http://<?php echo $this->_tpl_vars['player_domain']; ?>
/ckplayer/info/comments.php?url=<?php echo $this->_tpl_vars['vurl']; ?>
"    ></iframe>
<center style="margin-top: -20px;">

    <br/>
    <div>长江大学2010级软工1002唐有炜作品</div>
    新浪微博<img src="http://weibo.com/favicon.ico" style="height: 18px;" alt="sina"> <a href="http://weibo.com/tyouwei"
                                                                                     target="_blank">@LeaveBugsAway</a><br/>
    CopyRight &copy;&nbsp;2010-
    2013
    <a href="http://localhost" class="" target="_blank">localhost</a> &nbsp;All Rjghts Reserved.
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