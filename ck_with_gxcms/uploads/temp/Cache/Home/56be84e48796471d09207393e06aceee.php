<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($webtitle); ?></title>
<meta name="keywords" content="<?php echo ($keywords); ?><?php echo ($keywords); ?>">
<meta name="description" content="<?php echo ($description); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<script language="javascript">var SitePath='<?php echo ($webpath); ?>';var SiteMid='<?php echo ($mid); ?>';var SiteCid='<?php echo ($cid); ?>';var SiteId='<?php echo ($id); ?>';</script>
<script language="JavaScript" type="text/javascript" src="<?php echo ($webpath); ?>views/js/jquery.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo ($webpath); ?>views/js/system.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo ($webpath); ?>views/js/history.js"></script>
<link rel='stylesheet' type='text/css' href='<?php echo ($webpath); ?>views/css/system.css'>
<link rel='stylesheet' type='text/css' href='<?php echo ($tplpath); ?>template.css'>
<script language="JavaScript" type="text/javascript" src="<?php echo ($tplpath); ?>template.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	var name='<?php echo ($title); ?>';
    var num='<?php echo ($playname); ?>';
	var url=window.location.href;
    CheckAdd(name,'gxhis',url,num)
});
</script>
</head>
<body>
<div class="mov_play_box">
  <div id="play_header">
    <div title="<?php echo ($webname); ?>" class="play_logo"></div>
    <div class="play_nav">
      <a href="<?php echo ($webpath); ?>">首页</a>
      <?php $tag['name'] = 'menu'; $__LIST__ = get_tag_gxmenu($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): ++$i;$mod = ($i % 2 );?><a onfocus="this.blur();" href="<?php echo ($menu["showurl"]); ?>" <?php if(($menu['id'] == $cid) or ($menu['id'] == $pid)): ?>class="cur"<?php endif; ?>><?php echo ($menu["cname"]); ?></a><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?><span>|</span> 
      <a href="<?php echo ($topurl); ?>"<?php if(check_model('top10') == 1): ?>class="cur"<?php endif; ?>>排行</a>
      <a href="{b$specialurl}" <?php if(check_model('special') == 1): ?>class="cur"<?php endif; ?>>专题</a>
    </div>
    <div class="play_search">
      <form action="<?php echo ($webpath); ?>index.php?s=video/search" method="post" id="search" name="search">{__NOTOKEN__}
        <input type="text" value="请输入关键字" onfocus="if(this.value=='请输入关键字'){this.value='';}" id="wd" name="wd" autocomplete="off" maxlength="35">
        <button type="submit" class="search_bt"><span>搜索</span></button>
      </form>
    </div>
    <?php if(C('user_register') == 1): ?><div id="Login" class="play_login"></div><?php endif; ?>
  </div>
</div>
<!--电影播放区域开始-->
<div class="mplay-bg">
  <div class="play-area">
    <div id="play-box">
    <div class="left"><?php echo get_cms_ads('play-left');?></div>
    <div class="center">
      <div class="play-title" style="width:<?php echo ($playwidth); ?>px;">正在播放：<?php echo ($title); ?> <?php echo ($playname); ?></div>
      <?php echo ($player); ?>
    </div>
    <div class="right"><?php echo get_cms_ads('play-right');?></div>
    </div>
    <div class="play-list-box">
      <div class="play_list">
        <div class="split-clip">分集：</div>
        <div class="split-list-box">
          <ul class="split-list">
            <?php if(is_array($playlist)): $i = 0; $__LIST__ = $playlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 )?><li> <a href="<?php echo ($video["playurl"]); ?>" <?php if(($video["playname"])  ==  $playname): ?>style="color:#2777b0;"<?php endif; ?>><?php echo (get_replace_html($video["playname"],0,5)); ?></a> </li>
            <?php if(($i)  ==  "54"): ?></ul><ul id="all-plist" class="split-list" style="display:none;"><?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?>
          </ul><?php if(($count)  >  "54"): ?><div id="pmoreContain" class="play-list-right"><a id="plMore">展开列表</a></div><?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!--同类推荐-->
<div class="mov_play_box">
  <div class="mov_play_l_box">
    <div class="bd"><span class="tl"></span><span class="tr"></span>
      <div class="ct">
        <div class="hd">
          <h3><a href="<?php echo ($showurl); ?>"><?php echo ($cname); ?>推荐</a></h3>
        </div>
        <ul class="mov_pic_list">
          <span id="hot_video" href="<?php echo ($webpath); ?>index.php?s=my/show/id/hot_video/cid/<?php echo ($cid); ?>/limit/10">Loading...</span>
        </ul>
      </div>
      <span class="bl"></span><span class="br"></span> </div>
    <div class="blank"></div>
    <!--影片评论-->
  <?php if(C('user_comment') == 1): ?><div class="bd"><span class="tl"></span><span class="tr"></span>
      <div class="ct">
      	<div class="hd"><h3>影片评论</h3></div>
        <div id="Comments"></div>
      </div>
      <span class="bl"></span><span class="br"></span> </div><?php endif; ?>
  </div>
  <div class="mov_play_r_box">
    <div class="bd"><span class="tl"></span><span class="tr"></span>
      <div class="ct">
        <div class="play-rating">
              <div id="Scorebox">
    <?php if(C(url_html) == 1 && C(url_html_play) > 0): ?><span id="Score" class="Score"><?php echo ($score); ?></span> <span id="Scorenum" class="Scorenum"><?php echo ($score); ?></span>分<br />(<span id="Scoreer" class="Scoreer"><?php echo ($scoreer); ?></span>人评价过此片) 
    <?php else: ?>
    <span id="Score"><?php echo ($score); ?></span> <span id="Scorenum"><?php echo ($score); ?></span>分<br />(<span id="Scoreer"><?php echo ($scoreer); ?></span>人评价过此片)<?php endif; ?>   
</div>
        </div>
        <div class="info">
          <a href="<?php echo ($readurl); ?>"><img src="<?php echo ($picurl); ?>" onerror="this.src='<?php echo ($webpath); ?>views/images/nophoto.jpg'" width="98" height="140" /></a> 
          <span class="mv-title" title="<?php echo ($title); ?>"> <a href="<?php echo ($readurl); ?>" title="<?php echo ($title); ?><?php echo ($playname); ?>"><?php echo (get_replace_html($title,0,7)); ?></a></span>
          <p>主演：<?php if(!empty($actor)): ?><?php echo (get_actor_url(get_replace_html($actor,0,7))); ?><?php else: ?>未知<?php endif; ?></p>
          <p>导演：<?php if(!empty($director)): ?><?php echo (get_actor_url(get_replace_html($director,0,7))); ?><?php else: ?>未知<?php endif; ?></p>
          <p>地区：<?php echo (($area)?($area):'未知'); ?> </p>
          <p>上映年份：<?php echo (($year)?($year):'未知'); ?> </p>
          <p>更新日期：<?php echo (date('Y-m-d',$addtime)); ?></p>
        </div>
        <div class="intro">
          <p class="title">剧情介绍：</p>
          <div class="intro_cont"><?php echo (get_replace_html($content,0,200)); ?></div>
        </div>
      </div>
    <span class="bl"></span><span class="br"></span></div>
  </div>
</div>
<?php echo ($inserthits); ?>
<div id="footer">
	<?php echo ($copyright); ?><br />
	Copyright © 2007 - 2011 <a href="<?php echo ($weburl); ?>"><?php echo ($webname); ?></a> Some Rights Reserved <?php echo ($icp); ?> <?php echo ($tongji); ?> <a href="<?php echo ($baidusitemap); ?>">sitemap</a> <a href="<?php echo ($googlesitemap); ?>">sitemap</a><br />
</div>
</body>
</html>