<?php
include "./includes/youku.php";
require "/home/v78/domains/xinvalue.com/public_html/ckplayer/info/init.inc.php";
require "/home/v78/domains/xinvalue.com/public_html/secret.php";

if (isset($_GET["pid"])) {
    $pid = $_GET["pid"];
    $united_result = searches_address_unite($pid);
    $tpl->assign("united_result", $united_result->$pid);
  
  $tpl->display("search_playlist.html");
} else {
    echo "pid can not be empty!";
}


