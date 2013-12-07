<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="css/style.css"/>
    <title>视频播放|新价值网-做有思想的IT博客</title>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Terwer
 * Date: 13-12-8
 * Time: 上午6:46
 */

$url = "http://v.youku.com/v_show/id_XNjI2NzMxODQ0.html";
if (isset($_GET["url"])) {
    $url = $_GET["url"];
}
?>
<embed width="600" height="400" type="application/x-shockwave-flash"
       src="ckplayer/ckplayer.swf" allowscriptaccess="always"
       allowfullscreen="true"
       flashvars="f=http://www.xinvalue.com/ckplayer/video.php?url=<?php echo $url; ?>&s=2&p=0&my_url=<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">


</body>
</html>
