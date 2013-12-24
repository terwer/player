<?php /* Smarty version 2.6.18, created on 2013-12-21 17:56:39
         compiled from info.html */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title></title>
</head>
<body>
<img src="<?php echo $this->_tpl_vars['info']->bigThumbnail; ?>
" alt="<?php echo $this->_tpl_vars['info']->title; ?>
" title="<?php echo $this->_tpl_vars['info']->title; ?>
 " style="margin-top:-15px;margin-left:180px;height:150px;float:left"/>
  <h3 style="color:#FF34B3;"> <?php echo $this->_tpl_vars['info']->title; ?>
 </h3>
  <div style="color:#EEC591"><?php echo $this->_tpl_vars['info']->category; ?>
</div>
  <div><a style="color:#9400D3;text-decoration:none;" href="<?php echo $this->_tpl_vars['info']->user->link; ?>
" target="_blank"><?php echo $this->_tpl_vars['info']->user->name; ?>
 </a><span style="color:#66CDAA">上传于<?php echo $this->_tpl_vars['info']->published; ?>
</span></div>
  <h4 style="color:#6B8E23">标签：<?php echo $this->_tpl_vars['info']->tags; ?>
 </h4>
</html>