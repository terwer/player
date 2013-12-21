 <?php
/**
 *作者：唐有炜
 *我的博客：http://www.xinValue.com
 *我的微博：http://weibo.com/tyouwei
 *我的QQ：1035136784（非技术问题勿扰）
 */
 
 //定义client_id
 define("CLIENT_ID","0dec1b5a3cb570c1");
 
 /**
 *获取video_id;
 *参数 $url
 *返回值 string 视频id
 */
 function get_video_id($url){
    $video_id = 'XNjUwMDI2OTUy';
    $urls = pathinfo($url);
    $video_id = substr($urls["filename"], 3, strlen($urls["filename"]) - 3);
  return $video_id;
 }
 
/**
 *参数：$url 优酷视频播放页地址
 *参数：$page 页码
 *参数：$count 数目
 *返回值 object 评论
 */
function youku_comments_by_video($url, $page, $count)
{
    $client_id =CLIENT_ID;
    $video_id=get_video_id($url);

    $request_url = 'https://openapi.youku.com/v2/comments/by_video.json?' . 'client_id=' . $client_id . '&video_id=' . $video_id . '&page=' . $page . '&count=' . $count;
    $data = file_get_contents($request_url);
    $json = json_decode($data);

    return $json;
}

/**
 *参数：$url 优酷视频播放页地址
 *返回值 object 视频基本信息
 */
function youku_videos_show_basic($url)
{
    $client_id =CLIENT_ID;
  
    $request_url = 'https://openapi.youku.com/v2/videos/show_basic.json?' . 'client_id=' . $client_id . '&video_url='.$url;
    $data = file_get_contents($request_url);
    $json = json_decode($data);

    return $json;
}

/**
 *参数：$url 优酷视频播放页地址
 *参数：$ext 扩展名
 *返回值 object 详细视频信息
 */
function youku_videos_show($url)
{
    $client_id =CLIENT_ID;
    $video_id=get_video_id($url);

    $request_url = 'https://openapi.youku.com/v2/videos/show.json?' . 'client_id=' . $client_id . '&video_id=' . $video_id;
    $data = file_get_contents($request_url);
    $json = json_decode($data);

    return $json;
}



/**
 *参数：$keyword 关键字
 *返回值 object 搜索结果
 */
function searches_by_keyword($keyword){
    $client_id =CLIENT_ID;
  
  $request_url = 'https://openapi.youku.com/v2/searches/show/by_keyword.json?' . 'client_id=' . $client_id . '&keyword=' . $keyword;
    $data = file_get_contents($request_url);
    $json = json_decode($data);

    return $json;
}


/**
 *参数：$keyword 关键字
 *返回值 object 视频搜索结果
 */
function searches_video_by_keyword($keyword,$page, $count){
    $client_id =CLIENT_ID;
  
    $request_url = 'https://openapi.youku.com/v2/searches/video/by_keyword.json?' . 'client_id=' . $client_id . '&keyword=' . $keyword. '&page=' . $page . '&count=' . $count;;
    $data = file_get_contents($request_url);
    $json = json_decode($data);

    return $json;
}


/**
 *参数：$url 优酷视频播放页地址
 *参数：$ext 扩展名
 *返回值 object 详细视频信息
 */
function searches_address_unite($progammeId){
    $client_id =CLIENT_ID;
  
  $request_url = 'https://openapi.youku.com/v2/searches/show/address_unite.json?' . 'client_id=' . $client_id . '&progammeId=' . $progammeId;
    $data = file_get_contents($request_url);
    $json = json_decode($data);

    return $json;
}

?> 

