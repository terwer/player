<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($webtitle); ?></title>
<meta name="keywords" content="<?php echo ($ckeywords); ?><?php echo ($keywords); ?>">
<meta name="description" content="<?php echo ($cdescription); ?><?php echo ($description); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<script language="javascript">var SitePath='<?php echo ($webpath); ?>';var SiteMid='<?php echo ($mid); ?>';var SiteCid='<?php echo ($cid); ?>';var SiteId='<?php echo ($id); ?>';</script>
<script language="JavaScript" type="text/javascript" src="<?php echo ($webpath); ?>views/js/jquery.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo ($webpath); ?>views/js/system.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo ($webpath); ?>views/js/history.js"></script>
<link rel='stylesheet' type='text/css' href='<?php echo ($webpath); ?>views/css/system.css'>
<link rel='stylesheet' type='text/css' href='<?php echo ($tplpath); ?>template.css'>
</head>
<body>
<div id="wrapper">
<!--头部 开始-->
<script language="JavaScript" type="text/javascript" src="<?php echo ($tplpath); ?>template.js"></script>
<div class="header">
  <div class="top">
    <div title="<?php echo ($webname); ?>" class="logo"></div>
    <?php if(C('user_register') == 1): ?><div id="Login" class="login"></div><?php endif; ?>
    <div class="control"><a href="<?php echo ($rssurl); ?>">RSS订阅</a>&nbsp;|&nbsp;<a href="javascript:void(0)" id="fav">收藏本站</a>&nbsp;|&nbsp;<a href="<?php echo ($guestbookurl); ?>">留言反馈</a>&nbsp;|&nbsp;<span class="his"  id="ggg" onmouseover="fnDisplayMenu(this,'mnuArtStyles');" onmouseout="fnHideMenu('mnuArtStyles'); fnRemoveHighlight('mnuArtStyles');" ><a class="headerMnuLink" id="mnuArtStylesLink" href="javascript:void(0);">播放记录</a></span></div>

    <div class="popup1" id="mnuArtStyles"  style="display:none" onmouseover="fnDisplayMenu2($('#mnuArtStylesLink'),'mnuArtStyles');" onmouseout="fnHideMenu('mnuArtStyles'); fnRemoveHighlight('mnuArtStyles');" >
      <div id="history">
      </div>
   </div>

  </div>
  <div class="nav"><a href="<?php echo ($webpath); ?>" <?php if($model == 'index'): ?>class="cur"<?php endif; ?>>首页</a>
    <?php $tag['name'] = 'menu'; $__LIST__ = get_tag_gxmenu($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): ++$i;$mod = ($i % 2 );?><a onfocus="this.blur();" href="<?php echo ($menu["showurl"]); ?>" <?php if(($menu['id'] == $cid) or ($menu['id'] == $pid)): ?>class="cur"<?php endif; ?>><?php echo ($menu["cname"]); ?></a><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?><span>|</span>
    <a href="<?php echo ($topurl); ?>" <?php if(check_model('top10') == 1): ?>class="cur"<?php endif; ?>>排行</a>
    <a href="<?php echo ($specialurl); ?>" <?php if(check_model('special') == 1): ?>class="cur"<?php endif; ?>>专题</a>


   
  </div>
  <div class="query"> <span class="query_l"></span>
    <form action="<?php echo ($webpath); ?>index.php?s=video/search" method="post" name="search" id="search" >
      <input type="text" value="<?php echo (($keyword)?($keyword):'请输入关键字'); ?>" id="wd" name="wd" autocomplete="off" maxlength="35">
      <div id="search_sort"><span id="cur_txt">视频</span><ul class="sort" id="sort"><li><a href="javascript:void(0)">视频</a></li><li><a href="javascript:void(0)">新闻</a></li></ul></div>
      <button type="submit" class="search_bt"><span>搜索</span></button>
    </form>
    <div class="hot_kw">热门关键词：<?php echo ($hotkey); ?></div>
    <span class="query_r"></span> </div>
</div>
<!--头部 结束-->
<div class="box"><span>您现在所在的位置：</span><?php echo ($navtitle); ?></div>
<div class="box">
  <div class="left_col">
  	<!--热门资讯排行 开始-->
    <div class="topbrd"></div>
    <div class="bd">
      <div class="ct">
        <div class="hd"><h3>热门<?php echo ($cname); ?>排行</h3></div>
        <ul class="top">
          <?php $tag['name'] = 'info';$tag['cid'] = ''.$cid.'';$tag['limit'] = '15';$tag['order'] = 'hits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): ++$i;$mod = ($i % 2 );?><li <?php if(($i)  >=  "4"): ?>class="b <?php if($i == 10): ?>nobrd<?php endif; ?>"<?php endif; ?>><em><?php echo ($i); ?></em><a href="<?php echo ($info["readurl"]); ?>" target="_blank" title="<?php echo ($info["title"]); ?>"><?php echo (get_replace_html($info["title"],0,20)); ?></a></li><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
        </ul>
      </div>
      </div>
      <div class="btmbrd"></div>
  </div>
<!--判断是否有小类 -->  
<?php if(($pid)  ==  "0"): ?><div class="right_col"><div class="news_box bd">
    <span class="tl"></span><span class="tr"></span>
    <div class="ct">
      <div class="hd"><h3><?php echo ($cname); ?>列表</h3></div>
      <ul class="news_list">
      <?php $tag['name'] = 'info';$tag['limit'] = '20';$tag['order'] = ''.$order.''; $__LIST__ = get_tag_gxlist($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): ++$i;$mod = ($i % 2 );?><li><a href="<?php echo ($info["readurl"]); ?>"><?php echo ($info["title"]); ?></a><span><?php echo (get_color_date('m-d',$info["addtime"])); ?></span></li><?php if($i%5 == 0): ?><li class="blank"><br /></li><?php endif; ?><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
      </ul>
      <?php if($count > 10): ?><div class="pages"><?php echo ($pages); ?></div><?php endif; ?>
    </div>
    <span class="bl"></span><span class="br"></span> 
	</div></div>
<?php else: ?>
  <div class="right_col">
	<?php $arrson = get_channel_array($cid); ?><?php if(is_array($arrson)): $i = 0; $__LIST__ = $arrson;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cidson): ++$i;$mod = ($i % 2 )?><div class="news_box bd">
        <span class="tl"></span><span class="tr"></span>
        <div class="ct">
        <div class="hd"><h3><?php echo get_channel_name($cidson);?></h3><a href="<?php echo get_channel_name($cidson,'showurl');?>" class="more">更多&gt;&gt;</a> </div>
        <ul class="news_list">
        <?php $tag['name'] = 'info';$tag['cid'] = ''.$cidson.'';$tag['limit'] = '10';$tag['order'] = 'addtime desc,id desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): ++$i;$mod = ($i % 2 );?><li><a href="<?php echo ($info["readurl"]); ?>"><?php echo ($info["title"]); ?></a><span><?php echo (get_color_date('m-d',$info["addtime"])); ?></span></li><?php if(($i)  ==  "5"): ?><li class="blank"></li><?php endif; ?><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
        </ul>
        </div>
        <span class="bl"></span><span class="br"></span>
    </div>
	<div class="blank"></div><?php endforeach; endif; else: echo "" ;endif; ?>
  </div><?php endif; ?>
</div>
<div id="footer">
	<?php echo ($copyright); ?><br />
	Copyright © 2007 - 2011 <a href="<?php echo ($weburl); ?>"><?php echo ($webname); ?></a> Some Rights Reserved <?php echo ($icp); ?> <?php echo ($tongji); ?> <a href="<?php echo ($baidusitemap); ?>">sitemap</a> <a href="<?php echo ($googlesitemap); ?>">sitemap</a><br />
</div>
</div>
</body>
</html>