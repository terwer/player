<?php
/**
 *作者：唐有炜
 *我的博客：http://www.xinValue.com
 *我的微博：http://weibo.com/tyouwei
 *我的QQ：1035136784（非技术问题勿扰）
 */
include "../../config.php";

$username= $_POST["username"];
$userpwd= $_POST["userpwd"];

$url="https://openapi.youku.com/v2/oauth2/authorize?client_id="
    .CLIENT_ID.'&client_secret='.CLIENT_SECET.
    "&response_type=code&redirect_uri=http://www.xinvalue.com/player/ckplayer/info/login_check.php&state=xyz";
echo $url;

$aus=file_get_contents($url);
echo $aus;

//使用方法
$post_data = array(
    'client_id' => CLIENT_ID,
    'client_secret' => CLIENT_SECET,
    'grant_type'=>'password',
    'username'=>$username,
    'password'=>$userpwd
);
$res=send_post('https://openapi.youku.com/v2/oauth2/token', $post_data);

var_dump($res);

/**
 * 发送post请求
 * @param string $url 请求地址
 * @param array $post_data post键值对数据
 * @return string
 */
function send_post($url, $post_data) {

    $postdata = http_build_query($post_data);
    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => 'Content-type:application/x-www-form-urlencoded',
            'content' => $postdata,
            'timeout' => 15 * 60 // 超时时间（单位:s）
        )
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    return $result;
}

?>