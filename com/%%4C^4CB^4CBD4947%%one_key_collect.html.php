<?php /* Smarty version 2.6.18, created on 2014-01-16 16:28:19
         compiled from one_key_collect.html */ ?>
<!DOCTYPE html>
<html>
<head>
    <title></title> <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body><div style="color:   #FF00FF ">本程序由<a target="_blank" title="另，郑重声明：本程序视频均来自优酷，原视频版权归优酷所有"
                                            href="http://weibo.com/206464069/">@LeaveBugsAway</a>
<span>开发,大家有什么意见建议，欢迎<a
        style="color: yellowgreen" href="http://www.xinvalue.com/aboutme/#respond"
        target="_blank">留言</a>。<strong><span style="color:green;">长江大学2010级软工1002<font
        color="red">唐有炜</font>作品。</span></strong>
                            </span>
    </p>
</div>
<div id="import" style="border: 1px solid red;margin: 5px;">
    <div style="font-size:32px;font-weight: 600;">【一键采集】</div>
    <span style="font-size:32px">操作密码：</span>
    <input style="font-size:32px" type="password" name="" id="admin_pwd_"/><br/>
    <span style="font-size:32px">【注意】电视剧、电影、音乐为顶级频道，不能添加节目，只能在子分类添加。</span><br/>
    <select id="vtype_" style="font-size:32px">
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
    <select id="cat_" style="font-size:32px">
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
    <input style="height:18px" type="checkbox" name="" id="chb_"/><span style="font-size:32px">是否强制更新</span><br/>
    <br/>
    <div style="font-size:32px">页数：<input style="font-size:32px;margin: 2px;" type="text" name="" value="1" id="txt_page_"/></div>
    <div style="font-size:32px">每页数目：<input style="font-size:32px;margin: 2px;" type="text" name="" value="5" id="txt_count_"/></div>
    <input type="button" style="font-size:32px;margin: 5px;" value="一键采集" id="btn_create_"/>
    <script type="text/javascript">
        $("#btn_create_").click(function () {
            var is_up_="false";
            if ($("#chb_").is(":checked") == true) {
                is_up_= "true";
            }
            //alert(is_up_);
            var collect_url = "http://<?php echo $this->_tpl_vars['player_domain']; ?>
/ckplayer/info/one_key_collect.php?pwd=" + $("#admin_pwd_").val() + "&vtype=" + escape($("#vtype_").val()) + "&is_updated=" + is_up_+"&cat="+$("#cat_").val()+"&page="+$("#txt_page_").val()+"&count="+$("#txt_count_").val();
           // if($("#cat_").val()=="1"||$("#cat_").val()=="2"||$("#cat_").val()=="28"){
           //     alert("电视剧、电影、音乐为顶级频道，不能添加节目，只能在子分类添加!");
           //     return false;
           // }
            //alert(collect_url);return false;
            var cat_name=$("#cat_ option:selected").text();
            if (confirm("确定要采集【" + $("#vtype_").val() + "】的【"+cat_name+"】频道吗？")) {
                document.location.href = collect_url;
            }

        });
    </script>
</div>


<center>
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
</center>
</body>
</html>