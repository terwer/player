<?php /* Smarty version 2.6.18, created on 2013-12-28 05:40:53
         compiled from collect_search_playlist.html */ ?>
<link rel="stylesheet" href="css/search_playlist.css"/>
<div>
    <?php $_from = $this->_tpl_vars['united_result']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['list']):
?>
    <div>
        <h1><span>
来源：<?php if ($this->_tpl_vars['list']->source_site == 1): ?>
土豆<img src="http://www.tudou.com/favicon.ico" class="fav" alt="">
<?php elseif ($this->_tpl_vars['list']->source_site == 2): ?>
56<img src="http://www.56.com/favicon.ico" class="fav" alt="">
<?php elseif ($this->_tpl_vars['list']->source_site == 3): ?>
新浪<img src="http://www.sina.com.cn/favicon.ico" class="fav" alt="">
<?php elseif ($this->_tpl_vars['list']->source_site == 4): ?>
琥珀
<?php elseif ($this->_tpl_vars['list']->source_site == 6): ?>
搜狐<img src="http://www.sohu.com/favicon.ico" class="fav" alt="">
<?php elseif ($this->_tpl_vars['list']->source_site == 7): ?>
央视<img src="http://www.cntv.cn/favicon.ico" class="fav" alt="">
<?php elseif ($this->_tpl_vars['list']->source_site == 8): ?>
凤凰<img src="http://www.ifeng.com/favicon.ico" class="fav" alt="">
<?php elseif ($this->_tpl_vars['list']->source_site == 10): ?>
酷6<img src="http://www.ku6.com/favicon.ico" class="fav" alt="">
<?php elseif ($this->_tpl_vars['list']->source_site == 11): ?>
天线视频
<?php elseif ($this->_tpl_vars['list']->source_site == 12): ?>
六间房<img src="http://www.6.cn/favicon.ico" class="fav" alt="">
<?php elseif ($this->_tpl_vars['list']->source_site == 13): ?>
中关村
<?php elseif ($this->_tpl_vars['list']->source_site == 14): ?>
优酷<img src="http://www.youku.com/favicon.ico" class="fav" alt="">
<?php elseif ($this->_tpl_vars['list']->source_site == 31): ?>
PPTV<img src="http://www.pptv.com/favicon.ico" class="fav" alt="">
<?php elseif ($this->_tpl_vars['list']->source_site == 27): ?>
腾讯<img src="http://www.qq.com/favicon.ico" class="fav" alt="">
<?php elseif ($this->_tpl_vars['list']->source_site == 15): ?>
CNTV<img src="http://www.cntv.cn/favicon.ico" class="fav" alt="">
<?php elseif ($this->_tpl_vars['list']->source_site == 16): ?>
电影网<img src="http://www.m1905.com/favicon.ico" class="fav" alt="">
<?php elseif ($this->_tpl_vars['list']->source_site == 17): ?>
乐视<img src="http://www.letv.com/favicon.ico" class="fav" alt="">
<?php elseif ($this->_tpl_vars['list']->source_site == 18): ?>
小银幕
<?php elseif ($this->_tpl_vars['list']->source_site == 19): ?>
奇艺<img src="http://www.iqiyi.com/favicon.ico" class="fav" alt="">
<?php elseif ($this->_tpl_vars['list']->source_site == 20): ?>
江苏卫视
<?php elseif ($this->_tpl_vars['list']->source_site == 12): ?>
浙江卫视
<?php elseif ($this->_tpl_vars['list']->source_site == 23): ?>
安徽卫视
<?php elseif ($this->_tpl_vars['list']->source_site == 24): ?>
芒果
<?php elseif ($this->_tpl_vars['list']->source_site == 25): ?>
爱拍游戏
<?php elseif ($this->_tpl_vars['list']->source_site == 26): ?>
音悦台
<?php elseif ($this->_tpl_vars['list']->source_site == 28): ?>
迅雷<img src="http://www.kankan.com/favicon.ico" class="fav" alt="">
<?php elseif ($this->_tpl_vars['list']->source_site == 29): ?>
优米
<?php elseif ($this->_tpl_vars['list']->source_site == 30): ?>
163<img src="http://www.163.com/favicon.ico" class="fav" alt="">
    <?php elseif ($this->_tpl_vars['list']->source_site == 130): ?>
风行<img src="http://www.funshion.com/favicon.ico" class="fav" alt="">
     <?php elseif ($this->_tpl_vars['list']->source_site == 0): ?>
爱奇艺<img src="http://www.iqiyi.com/favicon.ico" class="fav" alt=""> <?php else: ?>
    <?php echo $this->_tpl_vars['list']->source_site; ?>

<?php endif; ?>
</span></h1>
        <?php $_from = $this->_tpl_vars['list']->addresses; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['addrs']):
?>
      <?php echo $this->_tpl_vars['addrs']->url; ?>
<br/>
        <?php endforeach; endif; unset($_from); ?>
        <div>
            <?php endforeach; else: ?>
            暂无结果。
            <?php endif; unset($_from); ?>
        </div>