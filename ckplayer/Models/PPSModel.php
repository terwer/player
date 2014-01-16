<?php
include_once('./Common/functions.php');
//--------------------------------------------------------------------------------------------//
/*
 * @function name: decode_pps
 * @description: decode the url(s) of the video on pps.tv
 *
 * @parameter $vid(string): required, the video ID you get from pps.tv
 * @parameter $display(bool): optional, display the url(s) or not. default true.
 *
 * @return: array, the video info[url, size, duration]
 *
 */

function getvideo($vid, $pid = 2)
{
    $hz = '_pps';
    // base url
    $url = 'http://dp.ppstv.com/get_play_url_cdn.php?flash_type=1&type=1' . '&sid=' . $vid;

    // get content
    //$content = file_get_contents($url);
    $content = file_get_contents('http://xinvideo.duapp.com/xml.php?url=' . base64_encode($url).'&encode=true');

    // No result.
    if ($content === '13') {
        echo '无法获取到您指定的视频资源，资源已被删除或者您提供的信息有误。';
    } else {
        $qvars = __GQ__ . '_' . $vid . $hz;
///////////////////////////////////////////////////////
///////////////////高清切换以后写
   ////////////////////////////////



        // parse url
        $url = parse_url($content);
        $server = $url['scheme'] . '://' . $url['host'];
        $path = $url['path'];
        $query = '?hd=1';

        $urllist['urls'][0]['url'] = $server . $path . $query;
        $urllist['vars'] = '{h->1}{a->' . $qvars . '}{f->' . __HOSTURL__ . '?url=[$pat' . ($pid - 1) . ']}';
        return $urllist;
    }

    // Done.
}

?>