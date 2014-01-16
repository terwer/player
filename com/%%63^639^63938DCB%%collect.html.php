<?php /* Smarty version 2.6.18, created on 2014-01-16 15:57:15
         compiled from collect.html */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>搜索结果|新价值网-做有思想的IT博客</title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>
<!--https://openapi.youku.com/v2/searches/show/by_keyword.json?client_id=0dec1b5a3cb570c1&keyword=hello%E6%A0%91%E5%85%88%E7%94%9F-->
<div style="color:   #FF00FF ">本程序由<a target="_blank" title="另，郑重声明：本程序视频均来自优酷，原视频版权归优酷所有"
                                      href="http://weibo.com/206464069/">@LeaveBugsAway</a>
<span>开发,大家有什么意见建议，欢迎<a
        style="color: yellowgreen" href="http://www.xinvalue.com/aboutme/#respond"
        target="_blank">留言</a>。<strong><span style="color:green;">长江大学2010级软工1002<font
        color="red">唐有炜</font>作品。</span></strong>
                            </span>
    </p>
</div>
<h1><a href="./one_key_collect.php">【一键采集】</a></h1>
<h1>节目搜索结果</h1>

<h2><a style="color:red;" href="http://<?php echo $this->_tpl_vars['search_domain']; ?>
/"><=返回搜索页面</a></h2>

<p>共有<?php echo $this->_tpl_vars['result']->total; ?>
条节目结果。

<p>

    <?php $_from = $this->_tpl_vars['result']->shows; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['show']):
?>

<div id="res" style="border: solid 1px darkgreen;background: wheat;">
    <input type="hidden" name="" id="pid" value="<?php echo $this->_tpl_vars['show']->id; ?>
"/>

    <div id="show_info" style="border: 1px solid purple;margin: 5px;">
        <div style="font-size:32px;font-weight: 600;">【节目信息】</div>
    <div>
        <h1 style="color: orangered;"><?php echo $this->_tpl_vars['show']->name; ?>
</h1>
        <img style="float: left;" src="<?php echo $this->_tpl_vars['show']->poster; ?>
" alt="" title=""/>

        <p><?php echo $this->_tpl_vars['show']->description; ?>
</p>
    </div>
    <div><?php echo $this->_tpl_vars['show']->showcategory; ?>
|<?php echo $this->_tpl_vars['show']->area; ?>
</div>
    <div>查看<?php echo $this->_tpl_vars['show']->view_count; ?>
次，评分<?php echo $this->_tpl_vars['show']->score; ?>
</div>
    <div>发布于<?php echo $this->_tpl_vars['show']->published; ?>
</div>
</div>

<div id="clist" style="border: 1px solid orangered;margin: 5px;">
    <div style="font-size:32px;font-weight: 600;">【采集列表】</div>
    <iframe id="iFrame1" name="iFrame1" width="100%"
            frameborder="0"
            src="http://<?php echo $this->_tpl_vars['player_domain']; ?>
/ckplayer/info/collect_search_playlist.php?pid=<?php echo $this->_tpl_vars['show']->id; ?>
"></iframe>
</div>
    <div id="play_noad" style="border: 1px solid darkgreen;margin: 5px;">
        <div style="font-size:32px;font-weight: 600;">【视频播放】</div>
        <a style="text-decoration: none;" href="http://<?php echo $this->_tpl_vars['search_domain']; ?>
/go/?kw=<?php echo $this->_tpl_vars['show']->paly_link; ?>
" target="_blank">
            <input type="button" style="font-size:32px" value="立即无广告播放" id="btn_play"/>
        </a>
    </div>
    <div>
        <div id="import" style="border: 1px solid red;margin: 5px;">
            <div style="font-size:32px;font-weight: 600;">【影片入库】</div>
        <span style="font-size:32px">操作密码：</span>
        <input style="font-size:32px" type="password" name="" id="admin_pwd_<?php echo $this->_tpl_vars['k']; ?>
"/><br/>
            <span style="font-size:32px">【注意】电视剧、电影、音乐为顶级频道，不能添加节目，只能在子分类添加。</span><br/>
        <select id="vtype_<?php echo $this->_tpl_vars['k']; ?>
" style="font-size:32px">
            <option>优酷</option>
            <option>土豆</option>
            <option>乐视</option>
            <option>腾讯</option>
            <option>PPS</option>
            <option>酷6</option>
            <option>56</option>
            <option>CNTV</option>
            <option>凤凰</option>
            <option>网易</option>
        </select>
        <select id="cat_<?php echo $this->_tpl_vars['k']; ?>
" style="font-size:32px">
            <?php $_from = $this->_tpl_vars['cats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cat']):
?>
            <?php if ($this->_tpl_vars['cat']->pid == 0): ?>
            <option value="<?php echo $this->_tpl_vars['cat']->id; ?>
"><?php echo $this->_tpl_vars['cat']->cname; ?>
</option>

            <?php $_from = $this->_tpl_vars['cats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cat_sub']):
?>
            <?php if ($this->_tpl_vars['cat_sub']->pid == $this->_tpl_vars['cat']->id): ?>
            <option value="<?php echo $this->_tpl_vars['cat_sub']->id; ?>
">---<?php echo $this->_tpl_vars['cat_sub']->cname; ?>
</option>
            <?php else: ?>
            <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>

            <?php else: ?>
            <?php endif; ?>
            <?php endforeach; else: ?>
            <option>暂无分类</option>
            <?php endif; unset($_from); ?>
        </select>
        <input style="height:18px" type="checkbox" name="" id="chb_<?php echo $this->_tpl_vars['k']; ?>
"/><span style="font-size:32px">是否强制更新</span>
        <input type="button" style="font-size:32px" value="立即入库影片" id="btn_create_<?php echo $this->_tpl_vars['k']; ?>
"/>
        <script type="text/javascript">
            $("#btn_create_<?php echo $this->_tpl_vars['k']; ?>
").click(function () {
                var is_up_<?php echo $this->_tpl_vars['k']; ?>
="false";
                if ($("#chb_<?php echo $this->_tpl_vars['k']; ?>
").is(":checked") == true) {
                    is_up_<?php echo $this->_tpl_vars['k']; ?>
= "true";
                }
                //alert(is_up_<?php echo $this->_tpl_vars['k']; ?>
);
                var collect_url = "http://<?php echo $this->_tpl_vars['player_domain']; ?>
/ckplayer/info/collect_submit.php?collect=true&show_id=<?php echo $this->_tpl_vars['show']->id; ?>
&pwd=" + $("#admin_pwd_<?php echo $this->_tpl_vars['k']; ?>
").val() + "&vtype=" + escape($("#vtype_<?php echo $this->_tpl_vars['k']; ?>
").val()) + "&is_updated=" + is_up_<?php echo $this->_tpl_vars['k']; ?>
+"&cat="+$("#cat_<?php echo $this->_tpl_vars['k']; ?>
").val();
                if($("#cat_<?php echo $this->_tpl_vars['k']; ?>
").val()=="1"||$("#cat_<?php echo $this->_tpl_vars['k']; ?>
").val()=="2"||$("#cat_<?php echo $this->_tpl_vars['k']; ?>
").val()=="28"){
                    alert("电视剧、电影、音乐为顶级频道，不能添加节目，只能在子分类添加!");
                    return false;
                }
                //alert(collect_url);return false;
                if (confirm("确定将来自【" + $("#vtype_<?php echo $this->_tpl_vars['k']; ?>
").val() + "】的影片《<?php echo $this->_tpl_vars['show']->name; ?>
》入库吗？")) {
                    document.location.href = collect_url;
                }

            });
        </script>
        </div>
    </div>
</div>
<br/>
<?php endforeach; else: ?>
暂无结果
<?php endif; unset($_from); ?>


<!--下面是普通视频搜索结果-->
<h1>下面是普通视频搜索结果(最多能显示100页)</h1>

<div>共搜索到个<?php echo $this->_tpl_vars['simple_video_result']->total; ?>
视频</div>
<div style="width:100%">
    <?php $_from = $this->_tpl_vars['simple_video_result']->videos; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['video']):
?>
  <span style="width:220px;float:left;height:250px;">
  <div>
      <a href="http://<?php echo $this->_tpl_vars['domain']; ?>
/search/go/?kw=<?php echo $this->_tpl_vars['video']->link; ?>
"
         target="_blank">
          <img src="<?php echo $this->_tpl_vars['video']->thumbnail; ?>
" alt="<?php echo $this->_tpl_vars['video']->title; ?>
" title="<?php echo $this->_tpl_vars['video']->title; ?>
"/>
      </a>
  </div>
   <div><?php echo $this->_tpl_vars['video']->title; ?>
</div>
    <div>
        <?php echo $this->_tpl_vars['video']->category; ?>
|
        <?php echo $this->_tpl_vars['video']->tags; ?>
|
    </div>
  <div>
      查看<?php echo $this->_tpl_vars['video']->view_count; ?>
，评论<?php echo $this->_tpl_vars['video']->comment_count; ?>
次<br/>
      被喜欢<?php echo $this->_tpl_vars['video']->favorite_count; ?>
次，发布于<?php echo $this->_tpl_vars['video']->published; ?>

  </div>
  </span>
    <?php endforeach; else: ?>
    暂无结果
    <?php endif; unset($_from); ?>

</div>

<div style="width:100%;float:right;">
    <center style="margin-top: 10px;">

        <div style="font-size:14px;color:green;">
            <?php $_from = $this->_tpl_vars['pages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['each_page']):
?>
            <?php if ($this->_tpl_vars['each_page'] <= $this->_tpl_vars['page']-10): ?>            <?php elseif ($this->_tpl_vars['each_page'] >= $this->_tpl_vars['page']+10): ?>            <?php elseif ($this->_tpl_vars['each_page'] == $this->_tpl_vars['page']): ?>            <a style="color:darkred;" href="./result.php?keyword=<?php echo $this->_tpl_vars['keyword']; ?>
&page=<?php echo $this->_tpl_vars['page']; ?>
">
                第<?php echo $this->_tpl_vars['page']; ?>
页
            </a>
            <?php else: ?>            <a href="./result.php?keyword=<?php echo $this->_tpl_vars['keyword']; ?>
&page=<?php echo $this->_tpl_vars['each_page']; ?>
">
                第<?php echo $this->_tpl_vars['each_page']; ?>
页
            </a>
            <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
            <?php if ($this->_tpl_vars['page']+1 > 100): ?>
            <span style="color:red;">已到最后一页</span>
            <?php else: ?>
            <a href="./result.php?keyword=<?php echo $this->_tpl_vars['keyword']; ?>
&page=<?php echo $this->_tpl_vars['each_page']; ?>
">
                下一页
            </a>
            <?php endif; ?>
            ，
            共<?php echo $this->_tpl_vars['page_num']; ?>
页,<?php echo $this->_tpl_vars['simple_video_result']->total; ?>
个视频
        </div>

        版权所有：新价值网<br/>
        长江大学2010级软工1002唐有炜作品<br/>
        新浪微博<img src="http://weibo.com/favicon.ico"/ style="height:18px" alt="sina"> <a href="http://weibo.com/tyouwei"
                                                                                        target="_blank">@LeaveBugsAway</a><br/>
        CopyRight &copy;&nbsp;2010-<span id="lblYear">2013</span> <a href="http://www.xinvalue.com" class=""
                                                                     target="_blank">www.xinvalue.com</a> &nbsp;All
        Rjghts Reserved.
        <script src="http://s21.cnzz.com/stat.php?id=4445524&web_id=4445524&show=pic" language="JavaScript"></script>
    </center>
    <!-- JiaThis Button BEGIN -->
    <script type="text/javascript">
        var jiathis_config = { data_track_clickback: 'true' };
    </script>
    <script type="text/javascript" src="http://v3.jiathis.com/code/jiathis_r.js?move=0&amp;btn=r4.gif&amp;uid=1507757"
            charset="utf-8"></script>
    <!-- JiaThis Button END -->
</div>
</body>
</html> 