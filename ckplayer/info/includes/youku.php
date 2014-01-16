<?php
/**
 *作者：唐有炜
 *我的博客：http://www.xinValue.com
 *我的微博：http://weibo.com/tyouwei
 *我的QQ：1035136784（非技术问题勿扰）
 */
//去除warning
//error_reporting(0);

include "../../../config.php";

/**
 *获取video_id;
 *参数 $url
 *返回值 string 视频id
 */
function get_video_id($url)
{
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
    $client_id = CLIENT_ID;
    $video_id = get_video_id($url);

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
    $client_id = CLIENT_ID;

    $request_url = 'https://openapi.youku.com/v2/videos/show_basic.json?' . 'client_id=' . $client_id . '&video_url=' . $url;
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
    $client_id = CLIENT_ID;
    $video_id = get_video_id($url);

    $request_url = 'https://openapi.youku.com/v2/videos/show.json?' . 'client_id=' . $client_id . '&video_id=' . $video_id;
    $data = file_get_contents($request_url);
    $json = json_decode($data);

    return $json;
}


/**
 * @param $show_id 节目ID
 * @param $page
 * @param $count
 *
 * @internal param $showid
 * @return array|mixed|stdClassobject 详细视频信息
 */
function youku_videos_show_detail($show_id, $page, $count)
{
    $client_id = CLIENT_ID;

    $request_url = 'https://openapi.youku.com/v2/shows/videos.json?' . 'client_id=' . $client_id . '&show_id=' . $show_id
        . '&page=' . $page . '&count=' . $count;
    $data = file_get_contents($request_url);
    $json = json_decode($data);

    //echo $request_url;

    return $json;
}

/**
 *参数：$vid 优酷视频播放页地址
 *参数：$ext 扩展字段
 *返回值 object 详细视频信息
 */
function youku_videos_show_by_id($vid, $ext = null)
{
    $client_id = CLIENT_ID;
    $video_id = $vid;

    $request_url = 'https://openapi.youku.com/v2/videos/show.json?' . 'client_id=' . $client_id . '&video_id=' . $video_id;
    if (null != $ext) {
        $request_url .= "&ext=" . $ext;
    }
    //echo  $request_url;

    $data = file_get_contents($request_url);
    $json = json_decode($data);

    return $json;
}

/**
 *参数：$show_id 节目ID
 *返回值 object 详细视频信息
 */
function youku_show_info_by_id($show_id)
{
    $client_id = CLIENT_ID;

    $request_url = 'http://openapi.youku.com/v2/shows/show.json?' . 'client_id=' . $client_id . '&show_id=' . $show_id;

    $data = file_get_contents($request_url);
    $json = json_decode($data);

    //echo $request_url;
    return $json;
}

/**
 *参数：$keyword 关键字
 *返回值 object 搜索结果
 */
function searches_by_keyword($keyword)
{
    $client_id = CLIENT_ID;

    $request_url = 'https://openapi.youku.com/v2/searches/show/by_keyword.json?' . 'client_id=' . $client_id . '&keyword=' . $keyword;
    $data = file_get_contents($request_url);
    $json = json_decode($data);
    //echo $request_url;

    return $json;
}

/**
 *参数：$keyword 关键字
 * 参数 $category 分类
 *返回值 object 搜索结果
 */
function searches_by_keyword_detail($keyword, $category)
{
    $client_id = CLIENT_ID;

    $request_url = 'https://openapi.youku.com/v2/searches/show/by_keyword.json?' . 'client_id=' . $client_id .
        '&keyword=' . $keyword . '&category=' . $category . '&page=1&count=18';
    $data = file_get_contents($request_url);
    $json = json_decode($data);
    //echo $request_url;

    return $json;
}


/**
 *参数：$keyword 关键字
 *返回值 object 搜索结果
 */
function searches_video_by_keyword($keyword)
{
    $client_id = CLIENT_ID;

    $request_url = 'https://openapi.youku.com/v2/searches/video/by_keyword.json?' . 'client_id=' . $client_id . '&keyword=' . $keyword;
    $data = file_get_contents($request_url);
    $json = json_decode($data);

    return $json;
}


/**
 *参数：$keyword 关键字
 * 参数 $category 分类
 *返回值 object 搜索结果
 */
function searches_video_by_keyword_detail($keyword, $category, $pape, $count)
{
    $client_id = CLIENT_ID;

    $request_url = 'https://openapi.youku.com/v2/searches/video/by_keyword.json?' . 'client_id=' . $client_id . '&keyword=' . $keyword
        . '&category=' . $category . '&page=' . $pape . '&count=' . $count;
    $data = file_get_contents($request_url);
    $json = json_decode($data);
    //echo $request_url;

    return $json;
}


/**
 * @param $category 分类
 * @param $pape     页数
 * @param $count    每页数量
 *
 * @return array|mixed|\stdClass
 */
function videos_by_category($category, $pape, $count)
{
    $client_id = CLIENT_ID;

    $request_url = 'https://openapi.youku.com/v2/videos/by_category.json?' . 'client_id=' . $client_id .
        '&category=' . $category . '&page=' . $pape . '&count=' . $count;
    $data = file_get_contents($request_url);
    $json = json_decode($data);
    //echo $request_url;

    return $json;
}

/**
 * @param $vid   视频ID
 * @param $count 数量
 *
 * @return array|mixed|\stdClass 相关视频
 */
function videos_by_related($vid, $count)
{
    $client_id = CLIENT_ID;

    $request_url = 'https://openapi.youku.com/v2/videos/by_related.json?' . 'client_id=' . $client_id .
        '&video_id=' . $vid . '&count=' . $count;
    $data = file_get_contents($request_url);
    $json = json_decode($data);
    //echo $request_url;

    return $json;
}

/**
 *参数：$url 优酷视频播放页地址
 *参数：$ext 扩展名
 *返回值 object 详细视频信息
 */
function searches_address_unite($progammeId)
{
    $client_id = CLIENT_ID;

    $request_url = 'https://openapi.youku.com/v2/searches/show/address_unite.json?' . 'client_id=' . $client_id . '&progammeId=' . $progammeId;
    $data = file_get_contents($request_url);
    $json = json_decode($data);
    //echo $request_url;
    return $json;
}

/**
 * 根据分类获取节目
 *
 * @param $category 分类名（电视剧）
 * @param $genre    （古装,言情）
 * @param $area     （大陆,香港）
 * @param $release_year
 * @param $orderby
 * @param $page
 * @param $count
 *
 * @return array|mixed|stdClass
 */
function shows_by_category($category, $genre = null, $area = null, $release_year = null, $orderby, $page, $count)
{
    $client_id = CLIENT_ID;

    $request_url = 'https://openapi.youku.com/v2/shows/by_category.json?' . 'client_id=' . $client_id . '&category=' . $category;

    if (null != $genre) {
        $request_url .= '&genre=' . $genre;
    } else if (null != $area) {
        $request_url .= '&area=' . $area;
    } else if (null != $release_year) {
        $request_url .= '&release_year=' . $release_year;
    }
    $request_url .= '&order_by=' . $orderby . '&page=' . $page . '&count=' . $count;

    $data = file_get_contents($request_url);
    $json = json_decode($data);
    echo $request_url . '<br/>';
    return $json;
}


?>

