<?php /* Smarty version 2.6.18, created on 2013-12-20 11:06:24
         compiled from search_playlist.html */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title></title>
</head>
<body>
<div>
    <?php $_from = $this->_tpl_vars['united_result']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['list']):
?>
    <div>
<span>
来源：<?php if ($this->_tpl_vars['list']->source_site == 1): ?>
土豆
<?php elseif ($this->_tpl_vars['list']->source_site == 2): ?>
56
<?php elseif ($this->_tpl_vars['list']->source_site == 3): ?>
新浪
<?php elseif ($this->_tpl_vars['list']->source_site == 4): ?>
琥珀
<?php elseif ($this->_tpl_vars['list']->source_site == 6): ?>
搜狐
<?php elseif ($this->_tpl_vars['list']->source_site == 7): ?>
央视
<?php elseif ($this->_tpl_vars['list']->source_site == 8): ?>
凤凰
<?php elseif ($this->_tpl_vars['list']->source_site == 10): ?>
酷6
<?php elseif ($this->_tpl_vars['list']->source_site == 11): ?>
天线视频
<?php elseif ($this->_tpl_vars['list']->source_site == 12): ?>
六间房
<?php elseif ($this->_tpl_vars['list']->source_site == 13): ?>
中关村
<?php elseif ($this->_tpl_vars['list']->source_site == 14): ?>
优酷
<?php elseif ($this->_tpl_vars['list']->source_site == 31): ?>
PPTV
<?php elseif ($this->_tpl_vars['list']->source_site == 27): ?>
腾讯
<?php elseif ($this->_tpl_vars['list']->source_site == 15): ?>
CNTV
<?php elseif ($this->_tpl_vars['list']->source_site == 16): ?>
电影网
<?php elseif ($this->_tpl_vars['list']->source_site == 17): ?>
乐视
<?php elseif ($this->_tpl_vars['list']->source_site == 18): ?>
小银幕
<?php elseif ($this->_tpl_vars['list']->source_site == 19): ?>
奇艺
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
迅雷
<?php elseif ($this->_tpl_vars['list']->source_site == 29): ?>
优米
<?php elseif ($this->_tpl_vars['list']->source_site == 30): ?>
163
<?php endif; ?>
</span>

        <?php $_from = $this->_tpl_vars['list']->addresses; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['addrs']):
?>
        <span><a href="http://search.xinvalue.com/go/?kw=<?php echo $this->_tpl_vars['addrs']->url; ?>
" target="_blank"><?php echo $this->_tpl_vars['addrs']->order; ?>
</a></span>
        <?php endforeach; endif; unset($_from); ?>


        <div>
            <?php endforeach; else: ?>
            暂无结果。
            <?php endif; unset($_from); ?>
        </div>
</body>
</html>