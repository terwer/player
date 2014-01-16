<?php
/**
 *作者：唐有炜
 *我的博客：http://www.xinValue.com
 *我的微博：http://weibo.com/tyouwei
 *我的QQ：1035136784（非技术问题勿扰）
 */
include "config.php";
include ROOT . "framework/smarty/libs/Smarty.class.php";
$tpl=new Smarty;
$tpl->template_dir=ROOT."tpl";
$tpl->compile_dir=ROOT."com";
$tpl->left_delimiter="<{";
$tpl->right_delimiter="}>";
?>