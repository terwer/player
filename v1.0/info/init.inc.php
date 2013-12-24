<?php
/**
 * Created by PhpStorm.
 * User: Terwer
 * Date: 13-12-8
 * Time: 上午9:13
 */
/**
 * 输出变量
 *
 * @param void $varVal 变量值
 * @param str $varName 变量名
 * @param bool $isExit 是否输出变量之后就结束程序（TRUE:是 FALSE:否）
 */
function dump($varVal, $isExit = FALSE){
    ob_start();
    var_dump($varVal);
    $varVal = ob_get_clean();
    $varVal = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $varVal);
    echo '<pre>'.$varVal.'</pre>';
    $isExit && exit();
}
  
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
 
//将出错信息输出到一个文本文件
//ini_set('error_log', dirname(__FILE__) . '/error_log.txt');  
//////////////////////////////////////////////////////////////////////////////

include "D:/MyCode/ckplayer/framework/smarty/libs/Smarty.class.php";
//include "/home/v78/domains/xinvalue.com/public_html/framework/smarty/libs/Smarty.class.php";
$tpl=new Smarty;
$tpl->template_dir="D:/MyCode/ckplayer/info/tpl";
//$tpl->template_dir="/home/v78/domains/xinvalue.com/public_html/ckplayer/info/tpl";
$tpl->compile_dir="D:/MyCode/ckplayer/info/com";
//$tpl->compile_dir="/home/v78/domains/xinvalue.com/public_html/ckplayer/info/com";
$tpl->left_delimiter="<{";
$tpl->right_delimiter="}>";
?> 