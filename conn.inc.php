<?php
/**
 *作者：唐有炜
 *我的博客：http://www.xinValue.com
 *我的微博：http://weibo.com/tyouwei
 *我的QQ：1035136784（非技术问题勿扰）
 */
include "config.php";
$link=mysql_connect(DB_HOST,DB_USERNAME,DB_PWD);
if(!$link){
    echo "数据库连接失败";
    exit;
}//else{
//    echo "数据库连接成功！";
//}
mysql_select_db(DB_NAME);
//解决乱码
mysql_query("SET NAMES 'UTF8'");