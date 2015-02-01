﻿<%@ page language="java" contentType="text/html; charset=UTF-8"
         pageEncoding="UTF-8" isELIgnored="false" %>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0, user-scalable=no">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>${video.videoTitle}_视频无广告播放_特维博客</title>
    <link rel="shortcut icon" href="${siteConfig.mainUrl}/images/favicon.ico"
          type="image/icon">
    <link rel="stylesheet" type="text/css" href="${siteConfig.playerUrl}/css/basic.css">
    <link rel="stylesheet" type="text/css" href="${siteConfig.playerUrl}/css/play.css">
    <script type="text/javascript" src="${siteConfig.mainUrl}/js/jquery-1.9.1.js" charset="utf-8"></script>
    <script type="text/javascript" src="${siteConfig.ckplayerHome}/js/offlights.js"></script>
    <script type="text/javascript" src="${siteConfig.mainUrl}/js/player.js"></script>
</head>
<body>
<!--导航开始-->
<div class="crumbWrap-black">
    <div class="gui_TopInfo crumb_bar">
        <div class="topInfoC_add">
            <!--旗帜广告开始-->
            <a href="${siteConfig.mainUrl}" target="_blank" title="特维博客|做有思想的IT博客"> <img
                    src="${siteConfig.mainUrl}/images/logo.png" alt="特维博客|做有思想的IT博客" title="特维博客|做有思想的IT博客"/></a>
            <!--旗帜广告结束-->
        </div>

        <!--面包屑新修改开始 -->
        <div class="crumb_new" id="widget-crumbs">
            <div id="navbar">
                <em>
                    <span id="sp_title">${video.videoTitle} </span>
                    <a href="${siteConfig.searchUrl}">返回重新搜索</a>
                    <a href="#comments">查看评论</a>
                </em>
            </div>

            <div>
                <div>本程序由<a target="_blank" title="另，郑重声明：本程序视频均来自优酷，原视频版权归优酷所有" href="http://weibo.com/206464069/">@LeaveBugsAway</a>
                    开发,欢迎<a target="_blank">留言</a>。<strong><span>长江大学2010级软工1002唐有炜作品。</span></strong>
                </div>
            </div>
        </div>
        <!--面包屑新修改结束-->
    </div>
</div>
<!--导航结束-->

<!--播放器开始-->
<div id="flashArea" class="vdoContainer margin_b20">
    <div class="vdoContent videoExpand" id="j-video-box">
        <!--Flash嵌入地址开始-->
        <div id="video">
            <div id="a1"></div>
        </div>
        <!--Flash嵌入地址结束-->
    </div>
</div>
<!--播放器结束-->

<!--播放器核心代码开始 -->
<!--
      上面一行是播放器所在的容器名称，如果只调用flash播放器，可以只用<div id="a1"></div>
   -->
<textarea name="statusvalue" rows="15" id="statusvalue"
            style="width: 200px; height: 400px;">该处是用来监听播放器实时返回的各种状态，可以根据这里的状态实时的控制播放器</textarea>
<script type="text/javascript" src="${siteConfig.ckplayerHome}/ckplayer/ckplayer.js" charset="utf-8"></script>
<script type="text/javascript">
    //如果你不需要某项设置，可以直接删除，注意var flashvars的最后一个值后面不能有逗号
    function loadedHandler() {
        if (CKobject.getObjectById('ckplayer_a1').getType()) {//说明使用html5播放器
            alert('播放器已加载，调用的是HTML5播放模块');
        }
        else {
            alert('播放器已加载，调用的是Flash播放模块');
        }
    }
    var _nn = 0;
    function ckplayer_status(str) {
        _nn += 1;
        if (_nn > 100) {
            _nn = 0;
            document.getElementById('statusvalue').value = '';
        }
        document.getElementById('statusvalue').value = str + '\n' + document.getElementById('statusvalue').value;
    }

    var flashvars = {
        f: 'http://movie.ks.js.cn/flv/other/2014/06/20-2.flv',//视频地址
        a: '',//调用时的参数，只有当s>0的时候有效
        s: '0',//调用方式，0=普通方法（f=视频地址），1=网址形式,2=xml形式，3=swf形式(s>0时f=网址，配合a来完成对地址的组装)
        c: '1',//是否读取文本配置,0不是，1是
        x: '${siteConfig.playerUrl}/video/ckplayerXml.do',//调用配置文件路径，只有在c=1时使用。默认为空调用的是ckplayer.xml
        i: 'http://www.terwer.com/logo.png',//初始图片地址
        d: 'http://www.ckplayer.com/down/pause6.1_1.swf|http://www.ckplayer.com/down/pause6.1_2.swf',//暂停时播放的广告，swf/图片,多个用竖线隔开，图片要加链接地址，没有的时候留空就行
        u: '',//暂停时如果是图片的话，加个链接地址
        l: 'http://www.ckplayer.com/down/adv6.1_1.swf|http://www.ckplayer.com/down/adv6.1_2.swf',//前置广告，swf/图片/视频，多个用竖线隔开，图片和视频要加链接地址
        r: '',//前置广告的链接地址，多个用竖线隔开，没有的留空
        t: '10|10',//视频开始前播放swf/图片时的时间，多个用竖线隔开
        y: '',//这里是使用网址形式调用广告地址时使用，前提是要设置l的值为空
        z: 'http://www.ckplayer.com/down/buffer.swf',//缓冲广告，只能放一个，swf格式
        e: '3',//视频结束后的动作，0是调用js函数，1是循环播放，2是暂停播放并且不调用广告，3是调用视频推荐列表的插件，4是清除视频流并调用js功能和1差不多，5是暂停播放并且调用暂停广告
        v: '80',//默认音量，0-100之间
        p: '1',//视频默认0是暂停，1是播放，2是不加载视频
        h: '3',//播放http视频流时采用何种拖动方法，=0不使用任意拖动，=1是使用按关键帧，=2是按时间点，=3是自动判断按什么(如果视频格式是.mp4就按关键帧，.flv就按关键时间)，=4也是自动判断(只要包含字符mp4就按mp4来，只要包含字符flv就按flv来)
        q: '',//视频流拖动时参考函数，默认是start
        m: '',//让该参数为一个链接地址时，单击播放器将跳转到该地址
        o: '',//当p=2时，可以设置视频的时间，单位，秒
        w: '',//当p=2时，可以设置视频的总字节数
        g: '',//视频直接g秒开始播放
        j: '',//跳过片尾功能，j>0则从播放多少时间后跳到结束，<0则总总时间-该值的绝对值时跳到结束
        k: '30|60',//提示点时间，如 30|60鼠标经过进度栏30秒，60秒会提示n指定的相应的文字
        n: '这是提示点的功能，如果不需要删除k和n的值|提示点测试60秒',//提示点文字，跟k配合使用，如 提示点1|提示点2
        wh: '',//宽高比，可以自己定义视频的宽高或宽高比如：wh:'4:3',或wh:'1080:720'
        lv: '0',//是否是直播流，=1则锁定进度栏
        loaded: 'loadedHandler',//当播放器加载完成后发送该js函数loaded
        //调用播放器的所有参数列表结束
        //以下为自定义的播放器参数用来在插件里引用的
        my_url: encodeURIComponent(window.location.href)//本页面地址
        //调用自定义播放器参数结束
    };
    var params = {bgcolor: '#FFF', allowFullScreen: true, allowScriptAccess: 'always'};//这里定义播放器的其它参数如背景色（跟flashvars中的b不同），是否支持全屏，是否支持交互
    var video = ['http://movie.ks.js.cn/flv/other/1_0.mp4->video/mp4', 'http://www.ckplayer.com/webm/0.webm->video/webm', 'http://www.ckplayer.com/webm/0.ogv->video/ogg'];
    CKobject.embed('${siteConfig.ckplayerHome}/ckplayer/ckplayer.swf', 'a1', 'ckplayer_a1', '100%', '100%', false, flashvars, video, params);
    /*
     以上代码演示的兼容flash和html5环境的。如果只调用flash播放器或只调用html5请看其它示例
     */
    function videoLoadJs(s) {
        alert("执行了播放");
    }
    function playerstop() {
        //只有当调用视频播放器时设置e=0或4时会有效果
        alert('播放完成');
    }
    var _nn = 0;//用来计算实时监听的条数的，超过100条记录就要删除，不然会消耗内存

    function getstart() {
        var a = CKobject.getObjectById('ckplayer_a1').getStatus();
        var ss = '';
        for (var k in a) {
            ss += k + ":" + a[k] + '\n';
        }
        alert(ss);
    }
    function ckadjump() {
        CKobject.getObjectById('ckplayer_a1').frontAdUnload();
        alert('这里演示了点击跳过广告按钮后的执行的动作，如果注册会员可以做成直接跳过的效果。');
    }
    //开关灯
    var box = new LightBox();
    function closelights() {//关灯
        box.Show();
        //CKobject._K_('a1').style.width = '940px';
        //CKobject._K_('a1').style.height = '550px';
        //CKobject.getObjectById('ckplayer_a1').width = 940;
        //CKobject.getObjectById('ckplayer_a1').height = 550;
    }
    function openlights() {//开灯
        box.Close();
        //CKobject._K_('a1').style.width = '100%';
        //CKobject._K_('a1').style.height = '100%';
        //CKobject.getObjectById('ckplayer_a1').width = 600;
        //CKobject.getObjectById('ckplayer_a1').height = 400;
    }
    function changePrompt() {
        CKobject.getObjectById('ckplayer_a1').promptUnload();//卸载掉目前的
        CKobject.getObjectById('ckplayer_a1').changeFlashvars('{k->10|20|30}{n->重设提示点一|重设提示点二|重设提示点三}');
        CKobject.getObjectById('ckplayer_a1').promptLoad();//重新加载
    }
    function addflash() {
        if (CKobject.Flash()['f']) {
            CKobject._K_('a1').innerHTML = '';
            CKobject.embedSWF('ckplayer/ckplayer.swf', 'a1', 'ckplayer_a1', '600', '400', flashvars, params);
        }
        else {
            alert('该环境中没有安装flash插件，无法切换');
        }
    }
    function addhtml5() {
        if (CKobject.isHTML5()) {
            support = ['all'];
            CKobject._K_('a1').innerHTML = '';
            CKobject.embedHTML5('a1', 'ckplayer_a1', 600, 400, video, flashvars, support);
        }
        else {
            alert('该环境不支持html5，无法切换');
        }
    }
    function addListener() {
        if (CKobject.getObjectById('ckplayer_a1').getType()) {//说明使用html5播放器
            CKobject.getObjectById('ckplayer_a1').addListener('play', playHandler);
        }
        else {
            CKobject.getObjectById('ckplayer_a1').addListener('play', 'playHandler');
        }
    }
    function playHandler() {
        alert('因为注册了监听播放，所以弹出此内容，删除监听将不再弹出');
    }
    function removeListener() {//删除监听事件
        if (CKobject.getObjectById('ckplayer_a1').getType()) {//说明使用html5播放器
            CKobject.getObjectById('ckplayer_a1').removeListener('play', playHandler);
        }
        else {
            CKobject.getObjectById('ckplayer_a1').removeListener('play', 'playHandler');
        }
    }
</script>

<p style="color:#F00">
    ckplayer6.6，<a href="help.htm" target="_blank">查看升级说明</a>,<strong><a href="http://www.ckplayer.com/"
                                                                         target="_blank">官网</a>，<a
        href="http://www.ckplayer.com/tool/" target="_blank">6.6帮助手册</a></strong><br/>
    <strong>如果你是双击打开该页面，发现不能播放视频</strong>(原则上该播放器需要在网站环境中运行)，<a
        href="http://www.ckplayer.com/bbs/forum.php?mod=viewthread&amp;tid=942">请点击该链接查看设置方法</a></p>

<p>该页面只是一个展示播放器功能的页面，里面的代码请自行选择需要的。</p>

<p><a href="demo3.htm">简单播放代码演示(自行选择优先使用Flash播放器还是HTML5播放器)</a>，<a href="demo.htm">简单播放代码演示（已不推荐使用）</a>，<a
        href="demo1.htm">只调用Flash播放代码演示</a>，<a href="demo2.htm">只调用HTML5播放代码演示</a><br>
    <input type="button" name="button23" value="切换到flash播放器" onClick="addflash();"/>
    <input type="button" name="button24" value="切换到html5播放器" onClick="addhtml5();"/>
</p>

<p>以下的操作对flash播放器和html5播放器都有效</p>

<p>
    <input type="button" name="button5" value="播放" onClick="CKobject.getObjectById('ckplayer_a1').videoPlay();"/>
    <input type="button" name="button6" value="暂停" onClick="CKobject.getObjectById('ckplayer_a1').videoPause();"/>
    <input type="button" name="button7" value="播放/暂停" onClick="CKobject.getObjectById('ckplayer_a1').playOrPause();"/>
    <input type="button" name="button8" value="快进" onClick="CKobject.getObjectById('ckplayer_a1').fastNext();"/>
    <input type="button" name="button9" value="快退" onClick="CKobject.getObjectById('ckplayer_a1').fastBack();"/>
    <input type="button" name="button15" value="暂停监听" onClick="CKobject.getObjectById('ckplayer_a1').changeStatus(0);"/>
    <input type="button" name="button16" value="加ID的监听"
           onClick="CKobject.getObjectById('ckplayer_a1').changeStatus(3);"/>
    <input type="button" name="button21" value="获取播放器当前相关属性" onClick="getstart();"/>
    <input type="button" name="button13" value="注册监听播放事件" onClick="addListener();"/>
    <input type="button" name="button14" value="删除监听播放事件" onClick="removeListener();"/>
</p>

<p>
    先设置好要跳转的秒数：
    <input name="seconds" type="text" id="seconds" value="20" size="5" maxlength="5"/>
    <input type="button" name="button" id="button" value="跳转"
           onClick="CKobject.getObjectById('ckplayer_a1').videoSeek(document.getElementById('seconds').value);"/>
</p>

<p>
    先设置好音量（1-100）：
    <input name="volume" type="text" id="volume" value="20" size="5" maxlength="5"/>
    <input type="button" name="button" id="button" value="设置"
           onClick="CKobject.getObjectById('ckplayer_a1').changeVolume(document.getElementById('volume').value);"/>
</p>

<p>以下的操作只对flash播放器使用，在html5播放时点击下面按钮不会发生任何事情，也不用担心会发生错误，因为在html5里虽然不支持但同时屏蔽了这些有可能出错的代码</p>

<p>
    <input type="button" name="button0" value="暂停前置广告" onClick="CKobject.getObjectById('ckplayer_a1').frontAdPause();"/>
    <input type="button" name="button1" value="继续播放前置广告"
           onClick="CKobject.getObjectById('ckplayer_a1').frontAdPause(false);"/>
    <input type="button" name="button2" value="跳过广告" onClick="CKobject.getObjectById('ckplayer_a1').frontAdUnload();"/>
    <input type="button" name="button3" value="隐藏控制栏"
           onClick="CKobject.getObjectById('ckplayer_a1').changeFace(true);"/>
    <input type="button" name="button4" value="显示控制栏" onClick="CKobject.getObjectById('ckplayer_a1').changeFace();"/>
    <input type="button" name="button10" value="显示调整插件"
           onClick="CKobject.getObjectById('ckplayer_a1').plugin('adjustment.swf',true);"/>
    <input type="button" name="button11" value="隐藏调整插件"
           onClick="CKobject.getObjectById('ckplayer_a1').plugin('adjustment.swf',false);"/>
    <input type="button" name="button12" value="清除视频" onClick="CKobject.getObjectById('ckplayer_a1').videoClear();"/>
    <input type="button" name="button17" value="清除提示点" onClick="CKobject.getObjectById('ckplayer_a1').promptUnload();"/>
    <input type="button" name="button18" value="显示提示点" onClick="CKobject.getObjectById('ckplayer_a1').promptLoad();"/>
    <input type="button" name="button19" value="改变提示点" onClick="changePrompt()"/>
    <input type="button" name="button20" value="关闭滚动文字广告"
           onClick="CKobject.getObjectById('ckplayer_a1').marqueeClose();"/>
    <input type="button" name="button20" value="显示滚动文字广告"
           onClick="CKobject.getObjectById('ckplayer_a1').marqueeLoad(true);"/>
    <input type="button" name="button22" value="改变并显示滚动文字广告内容"
           onClick="CKobject.getObjectById('ckplayer_a1').marqueeLoad(true,'{font color=\'#FFDD00\'}改变后的内容,这里的内容虽然可以动态的改变，但不建议使用该功能做字幕的功能，字幕插件请在官网查找！{/font}');"/>
</p>

<p>
    亮度（-255-255）：
    <input name="brightness" type="text" id="brightness" value="200" size="5" maxlength="5"/>
    <input type="button" name="button" id="button" value="设置"
           onClick="CKobject.getObjectById('ckplayer_a1').videoBrightness(document.getElementById('brightness').value);"/>
    0为中间值，向右为亮向左为暗</p>

<p>
    对比度（-255-255）：
    <input name="contrast" type="text" id="contrast" value="200" size="5" maxlength="5"/>
    <input type="button" name="button" id="button" value="设置"
           onClick="CKobject.getObjectById('ckplayer_a1').videoContrast(document.getElementById('contrast').value);"/>
    127.5为中间值，向右对比鲜明向左对比偏暗</p>

<p>
    饱和度（-255-255）：
    <input name="saturation" type="text" id="saturation" value="200" size="5" maxlength="5"/>
    <input type="button" name="button" id="button" value="设置"
           onClick="CKobject.getObjectById('ckplayer_a1').videoSaturation(document.getElementById('saturation').value);"/>
    1为中间值，0为灰度值（即黑白相片）</p>

<p>
    色相（-255-255）：
    <input name="sethue" type="text" id="sethue" value="200" size="5" maxlength="5"/>
    <input type="button" name="button" id="button" value="设置"
           onClick="CKobject.getObjectById('ckplayer_a1').videoSetHue(document.getElementById('sethue').value);"/>
    0为中间值，向右向左一试便知</p>

<p>
    增加宽高：
    <input name="wandh" type="text" id="wandh" value="100" size="5" maxlength="5"/><input name="wandh2" type="text"
                                                                                          id="wandh2" value="100"
                                                                                          size="5" maxlength="5"/>
    <input type="button" name="button" id="button" value="设置"
           onClick="CKobject.getObjectById('ckplayer_a1').videoWAndH(document.getElementById('wandh').value,document.getElementById('wandh2').value);"/>
    大于0,100为正常宽高
</p>

<p>
    自由设置宽：
    <input name="cw" type="text" id="cw" value="100" size="5" maxlength="5"/>
    高:
    <input name="ch" type="text" id="ch" value="100" size="5" maxlength="5"/>
    x:
    <input name="cx" type="text" id="cx" value="100" size="5" maxlength="5"/>
    y:
    <input name="cy" type="text" id="cy" value="100" size="5" maxlength="5"/>
    <input type="button" name="button" id="button" value="设置"
           onClick="CKobject.getObjectById('ckplayer_a1').videoWHXY(document.getElementById('cw').value,document.getElementById('ch').value,document.getElementById('cx').value,document.getElementById('cy').value);"/>
</p>

<p>
    播放新参数地址：
    <input name="newaddress" type="text" id="newaddress"
           value="{f-&gt;http://movie.ks.js.cn/flv/2012/02/6-1.flv}{html5-&gt;http://movie.ks.js.cn/flv/other/2014/06/20-2.mp4->video/mp4,http://www.ckplayer.com/webm/1.webm->video/webm,http://www.ckplayer.com/webm/1.ogv->video/ogg}"
           size="60" maxlength="300"/>
    <input type="button" name="button" id="button" value="跳转"
           onClick="CKobject.getObjectById('ckplayer_a1').newAddress(document.getElementById('newaddress').value);"/><br>
</p>
<!--播放器核心代码结束-->

<div id="sysinfo">

    <!--视频信息-->
    <iframe id="iFrame1" name="iFrame1" width="100%" frameborder="0"
            src="${siteConfig.playerUrl}/info/videoInfo.do?url=${video.videoUrl}"></iframe>
    <!--评论-->
    <iframe id="comments" name="comments" width="100%" frameborder="0"
            src="${siteConfig.playerUrl}/info/comments.do?url=${video.videoUrl}"></iframe>
    <br/>

    <div>长江大学2010级软工1002唐有炜作品</div>
    新浪微博<img src="http://weibo.com/favicon.ico" style="height: 18px;" alt="sina"> <a href="http://weibo.com/tyouwei"
                                                                                     target="_blank">@LeaveBugsAway</a><br/>
    CopyRight &copy;&nbsp;2010-
    2013
    <a href="${siteConfig.mainUrl}" class="" target="_blank">${siteConfig.mainUrl}</a> &nbsp;All Rjghts Reserved.
    <!--参数-->
    <p>以下是CKoject函数所能做的一些跟播放器无关的事情</p>

    <p id="aboutme"></p>
</div>
<script type="text/javascript">
    var aboutme = '';
    aboutme += '平台(浏览器)内核：' + CKobject.Platform() + '<br />';
    aboutme += '浏览器：' + CKobject.browser()['B'] + '<br />';
    aboutme += '浏览器版本：' + CKobject.browser()['V'] + '<br />';
    aboutme += '是否安装了flash插件：' + CKobject.Flash()['f'] + '<br />';
    if (CKobject.Flash()['f']) {
        aboutme += 'flash插件版本：' + CKobject.Flash()['v'] + '<br />';
    }
    aboutme += '是否支持HTML5：' + CKobject.isHTML5() + '<br />';
    CKobject._K_('aboutme').innerHTML = aboutme;
</script>
</body>
</html>
