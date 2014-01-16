<?php
/**
 *作者：唐有炜
 *我的博客：http://www.xinValue.com
 *我的微博：http://weibo.com/tyouwei
 *我的QQ：1035136784（非技术问题勿扰）
 */
error_reporting(0);
include_once "../../config.php";
require_once "../../conn.inc.php";
require_once "./includes/youku.php";
require_once ROOT . "init.inc.php";
require_once ROOT . "../secret.php";

function utf8_urldecode($str)
{
    return html_entity_decode(preg_replace("/%u([0-9a-f]{3,4})/i", "&#x\\1;", urldecode($str)), null, 'UTF-8');
}

//影片入库
//////////////////////////////采集节目入库//////////////////////////////////////////////////////////////////////////////
if (isset($_GET["collect"]) && $_GET["collect"] == true) {
    $show_id = $_GET["show_id"];
    $cat = $_GET["cat"];
    $pwd = $_GET["pwd"];
    $vtype = utf8_urldecode($_GET["vtype"]);
    if ($pwd != COLLECT_PWD) {
        echo '<h1 style="color:red;">对不起，密码错误！您无权操作！</h1>';
        return;
    } else {
        //https://openapi.youku.com/v2/searches/show/address_unite.json?client_id=0dec1b5a3cb570c1&progammeId=cbff620a962411de83b1
        $united_shows = searches_address_unite($show_id)->$show_id;
        //var_dump($united_shows);
        //echo $vtype.'<br/>';
        $temp = "未知";
        foreach ($united_shows as $united_show) {
            $site = get_site($united_show->source_site);
            $temp = $site;
            //echo $site.' ';
            if ($site == $vtype) {
                //echo $site . ' ';
                ///////////////////////////影片入库逻辑/////////////////////////////////////////////////////////////////////
                http: //openapi.youku.com/v2/shows/show.json?client_id=0dec1b5a3cb570c1&show_id=f2d7cbbc510311e38b3f
                //获取节目信息
                $show_info = youku_show_info_by_id($show_id);
                ///////////////////////////////////
                ////////////////////////////////////
                /////////////////////////////////////
                //var_dump($show_info);
                //return;

                $address = "";
                foreach ($united_show->addresses as $addr) {
                    $address .= $addr->url . '<br/>';
                }
                $address = substr($address, 0, strlen($address) - 5);
                //echo $address;return;

                //检查是否已有
                //已有则替换
                //没有则添加
                //$sql = "SELECT id,title,keywords,playurl FROM gx_video where title like '%{$show_info->name}%' ";
                $sql = "SELECT id,title,keywords,playurl,show_id FROM gx_video where show_id='{$show_info->id}' ";
                //echo 'sql:'.$sql . '<br/>';
                $result = mysql_query($sql);
                $count = mysql_affected_rows();
                echo '通过show_id查到的影片数量：' . $count . '<br/>';
                if ($count == 0) { //通过show_id没找到影片，插入
                    echo '通过show_id没找到影片，即将判断是否需要添加。。。<br/>';

                    ///////////////////////////////////////////////////////////
                    /////通过影片名称匹配，并且如果show_id等于空说明是采集的百度影音播放的影片////////////////////////////////////////////////////////////////
                    $bd_sql = "SELECT id,title,playurl,show_id FROM gx_video where title  like '%{$show_info->name}%' ";
                    //echo 'bd_sql:'.$bd_sql.'<br/>';
                    $bq_result = mysql_query($bd_sql);
                    $bd_count = mysql_affected_rows();
                    echo '通过影片名称查到的影片数量：' . $bd_count . '<br/>';
                    if ($bd_count > 0) { //通过影片名查到了，且只有一部，则更新
                        if ($bd_count > 1) { //通过影片名查到了，但影片不止一部，需要手动更新
                            echo '<h1 style="color:red">通过影片名称查到不止一部影片，为了安全起见，请手动更新，已退出。。。</h1>';
                            echo '影片列表如下：<br/>';
                            while ($bd_video = mysql_fetch_object($bq_result)) {
                                if ($bd_video->show_id == "") {
                                    echo '<h2 style="color:red;">《' . $bd_video->title . '》(由百度影音采集而来，需要手动修改！)</h2>';

                                } else {
                                    echo '<a href="http://' . DOMAIN . '/player/ckplayer/info/collect_submit.php?collect=true&show_id=' . $bd_video->show_id . '&pwd=105036&vtype=' . $_GET["vtype"] . '&is_updated=false" target="_blank" ><h2 style="color:green;">《' . $bd_video->title . '》</h2></a>';
                                }
                            }
                            exit;
                        } else {
                            //自动更新通过影片名称查到的影片（只有一部）//////////////////////
                            echo '通过影片名称查到了一部影片。';                                    ////百度影音影片链接替换////////////////////////////////////////////////////////
                            //////////////////////////////////////////////////////////
                            /////////////////////////////////////////////////////////////
                            //播放地址
                            $bd_content = str_replace("<br/>", chr(10), $address); //chr(10)换行符的ascii码
                            //echo  $show_id;
                            while ($bd_video = mysql_fetch_object($bq_result)) {
                                if (update_video_from_site($bd_video->id, $bd_content, $show_id)) {
                                    echo '<h1 style="color:darkgreen;">影片《' . $bd_video->title . '》的百度影音地址链接替换成功！</h1>';
                                }
                            }
                            //////////////////////////////////////////////////////////
                            //////////////////////////////////////////////////////
                            //////////////////////////////////////////////////////
                            ///////////////////////////////////////////////////////
                            return;
                        }
                    } else {
                        /////下面是正常添加，通过show_id和影片名均未查到
                        echo '<h1 style="color:red;">通过show_id和影片名均未查到影片，正在添加。。。</h1>';

                        /////////////////////////////////////////////////////////////////////
                        //////////////////////////////////////////////////////////////////
                        //////////////////////////////////////////////////////////////////////

                        ////////////////////////////////////////////////////////
                        ////////////////////影片添加到数据库///////////////////////////////////
                        //print_r($show_info);
                        //dump($show_info);
                        //echo $show_info->name.'<br.>';
                        //dump($show_info->attr->director);return;
                        //集数
                        $serial = $show_info->episode_updated;
                        //更新通知
                        $notice = $show_info->update_notice;

                        //判断集数是否完结
                        if ($serial == $show_info->episode_count) {
                            $serial = 0;
                            $notice = $show_info->episode_count . '集全';
                            echo '<h1 style="color:darkgreen;">将要添加的影片' . $show_info->name . '已完结！</h1>';
                        }

                        $direct = "";
                        foreach ($show_info->attr->director as $dt) {
                            $direct .= $dt->name . ',';
                        }
                        //导演
                        $direct = substr($direct, 0, strlen($direct) - 1);
                        // echo $direct;return;
                        //echo $show_info->description;return;

                        $actor = "";
                        foreach ($show_info->attr->performer as $pf) {
                            $actor .= $pf->name . ',';
                        }
                        //演员
                        $actor = substr($actor, 0, strlen($actor) - 1);
                        //echo $actor;

                        //播放地址
                        $content = str_replace("<br/>", chr(10), $address); //chr(10)换行符的ascii码
                        //echo $content;return;

                        //上映年份
                        $y = substr($show_info->released, 0, 4);
                        //echo $y;return;

                        $add_date = strtotime(date("Y-m-d H:i:s"));
                        //echo $add_date;

                        //echo $show_info->update_notice;
                        //return;
                        //
                        //echo $show_info->id;return;
                        if (add_video_to_site($show_info->name, $direct, $actor, $show_info->poster, $show_info->description, $content, $y, $add_date, $serial, $notice, $show_info->id, $show_info->area,$cat)) {
                            echo '<h1 style="color:darkgreen;">影片《' . $show_info->name . '》添加成功！</h1>';
                        } else {
                            echo '<h1 style="color:#ff0000;">系统错误！</h1>';
                            echo mysql_errno() . ' ' . mysql_error();
                        };
                        ///////////////////////////////////////////////////////////
                        return;
                    }
                } else { //批到数据库中的影片里，修改
                    echo '影片《' . $show_info->name . '》已存在！检查是否需要更新。。。<br/>';
                    while ($video = mysql_fetch_object($result)) {
                        //print_r($video);
                        //echo $video->title . '<br/>';
                        //集数检测
                        // if ($video->serial == 0) {
                        echo '影片《' . $show_info->name . '》已完结！正在更新播放地址。。。<br/>';
                        $urls = split("\n", $video->playurl);
                        $source_type = substr($urls[0], 0, 4);
                        //echo  $source_type;
                        //echo count($urls);

                        //集数
                        $serial = $show_info->episode_updated;
                        //更新通知
                        $notice = $show_info->update_notice;

                        //判断集数
                        if ($serial == $show_info->episode_count) {
                            $serial = 0;
                            $notice = $show_info->episode_count . '集全';
                            if ($source_type == "http") {
                                $is_up = $_GET["is_updated"];
                                //echo $is_up;return;
                                if (!($is_up == "true")) {
                                    echo '<h1 style="color:darkgreen;">链接已替换且已完结！退出更新。。。</h1>';
                                    return;

                                    return;
                                }
                                echo '<h1 style="color:red;">链接已替换且已完结！正在强制更新。。。</h1>';


                            } else {
                                echo '<h1 style="color:darkgreen;">影片百度影音地址已存在且已完结，即将更新为http地址。。。</h1>';
                            }
                        }
                        //echo $serial;
                        //return;
                        echo '<h1>数据库中的播放列表更新至第' . count(split("\n", $video->playurl)) . '集，</h1>';
                        // echo str_replace("\n", "<br/>", $video->playurl) . '<br/>';
                        $content = str_replace("<br/>", chr(10), $address); //chr(10)换行符的ascii码
                        echo '<h1>' . $vtype . '的播放列表更新至' . $serial . '(共' . $show_info->episode_count . '集)</h1>';
                        // echo str_replace("\n", "<br/>", $content) . '<br/>';

                        //} else {
                        //    echo '影片《' . $show_info->name . '》已更新至' . $video->serial . '集！正在添加播放地址。。。';
                        // }


                        $direct = "";
                        foreach ($show_info->attr->director as $dt) {
                            $direct .= $dt->name . ',';
                        }
                        //导演
                        $direct = substr($direct, 0, strlen($direct) - 1);
                        // echo $direct;return;
                        //echo $show_info->description;return;

                        $actor = "";
                        foreach ($show_info->attr->performer as $pf) {
                            $actor .= $pf->name . ',';
                        }
                        //演员
                        $actor = substr($actor, 0, strlen($actor) - 1);
                        //echo $actor;

                        //播放地址
                        //$content = str_replace("<br/>", chr(10), $address); //chr(10)换行符的ascii码
                        //echo $content;return;

                        //上映年份
                        $y = substr($show_info->released, 0, 4);
                        //echo $y;return;

                        $add_date = strtotime(date("Y-m-d H:i:s"));
                        //echo $add_date;return;


                        //echo $video->id.' '.$content;
                        //if (update_video_from_site($video->id, $content)) {


                        //echo '消息：'.$show_info->update_notice;
                        //return;

                        //////////////////更新提交到数据库///////////////////////////////////
                        if (update_video_info_from_site
                        ($video->id, $show_info->name, $direct, $actor, $show_info->poster, $show_info->description, $content, $y, $add_date, $serial, $notice, $show_info->area,$cat)
                        ) {
                            echo '<h1 style="color:darkgreen;">影片《' . $show_info->name . '》更新成功！</h1>';
                        } else {
                            echo '<h1 style="color:#ff0000;">系统错误！</h1>';
                            echo mysql_errno() . ' ' . mysql_error();
                        };
                        //////////////////////////////////////////////////////

                    }
                }


                //关闭mysql数据库
                mysql_close();
                //////////////////////////////////////////////////////////////////////////////////////////////////
                break;
            } else {
                $temp = "未知";
            }
        }

        //echo $temp;
        if ($temp == "未知") {
            echo '<h1 style="color:red;">对不起，网络错误或暂时没有该来源的影片！</h1>';
        }

    }

} ////////////////////////////////////////////////////////////////////////////////////////////////////////////


/**
 * 判断来源
 *
 * @param $site_id
 *
 * @return string
 */
function get_site($site_id)
{
    if ($site_id == 1)
        return "土豆";
    else if ($site_id == 2)
        return "56";
    else if ($site_id == 3)
        return "新浪";
    else if ($site_id == 4)
        return "琥珀";
    else if ($site_id == 6)
        return "搜狐";
    else if ($site_id == 7)
        return "央视";
    else if ($site_id == 8)
        return "凤凰";
    else if ($site_id == 10)
        return "酷6";
    else if ($site_id == 11)
        return "天线视频";
    else if ($site_id == 12)
        return "六间房";
    else if ($site_id == 13)
        return "中关村";
    else if ($site_id == 14)
        return "优酷";
    else if ($site_id == 31)
        return "PPTV";
    else if ($site_id == 27)
        return "腾讯";
    else if ($site_id == 15)
        return "CNTV";
    else if ($site_id == 16)
        return "电影网";
    else if ($site_id == 17)
        return "乐视";
    else if ($site_id == 18)
        return "小银幕";
    else if ($site_id == 19)
        return "奇艺";
    else if ($site_id == 20)
        return "江苏卫视";
    else if ($site_id == 12)
        return "浙江卫视";
    else if ($site_id == 23)
        return "安徽卫视";
    else if ($site_id == 24)
        return "芒果";
    else if ($site_id == 25)
        return "爱拍游戏";
    else if ($site_id == 26)
        return "音悦台";
    else if ($site_id == 28)
        return "迅雷";
    else if ($site_id == 29)
        return "优米";
    else if ($site_id == 30)
        return "163";
    else if ($site_id == 130)
        return "风行";
    else if ($site_id == 0)
        return "爱奇艺";
    else
        return $site_id;
}

/**
 * @param $title    影片名
 * @param $director 导演
 * @param $actor    演员
 * @param $picurl   海报
 * @param $desc     剧情
 * @param $playurl  播放地址
 * @param $year     年份
 * @param $add_date
 * @param $serial   是否完结，完结0.未完结显示集数
 *
 * @param $update_notice
 *
 * @param $show_id  节目ID
 *
 * @param $area
 *
 * @param $cat
 *
 * @return bool
 */
function add_video_to_site($title, $director, $actor, $picurl, $desc, $playurl, $year, $add_date, $serial, $update_notice, $show_id, $area,$cat)
{
    $sql = "INSERT INTO `gx_video` (`id`, `cid`, `title`, `intro`, `keywords`, `color`, `actor`, `director`, `content`, `picurl`, `area`, `language`, `year`, `serial`, `addtime`, `hits`, `monthhits`, `weekhits`, `dayhits`, `hitstime`, `stars`, `status`, `up`, `down`, `playurl`, `downurl`, `inputer`, `reurl`, `letter`, `score`, `scoreer`, `genuine`,`show_id`) VALUES (NULL, '{$cat}', '{$title}', '{$update_notice}', '', '', '{$actor}', '{$director}', '{$desc}', '{$picurl}', '{$area}', '', '{$year}', '{$serial}', '{$add_date}', '0', '', '', '', '{$add_date}', '0', '1', '0', '0', '{$playurl}', '', '', '', '', '', '', '','{$show_id}')";

    //echo $sql;
    $result = mysql_query($sql);
    if ($result) {
        return true;
    } else {
        return false;
    }
    mysql_close();
}

/**
 * @param $id
 * @param $content
 *
 * @param $show_id
 *
 * @return bool
 */
function update_video_from_site($id, $content,$show_id)
{
    $sql = "update gx_video set playurl='{$content}',show_id='{$show_id}' where id='{$id}'";
    //echo $sql;
    $result = mysql_query($sql);
    if ($result) {
        return true;
    } else {
        return false;
    }
    mysql_close();

}

/**
 * 更新影片详细信息到数据库
 *
 * @param $id
 * @param $title
 * @param $director
 * @param $actor
 * @param $picurl
 * @param $desc
 * @param $playurl
 * @param $year
 * @param $add_date
 * @param $serial        是否完结，完结0.未完结显示集数
 *
 * @param $update_notice 更新通知
 *
 * @param $area          地区
 *
 * @param $cid
 *
 * @return bool
 */
function update_video_info_from_site($id, $title, $director, $actor, $picurl, $desc, $playurl, $year, $add_date, $serial, $update_notice, $area,$cid)
{
    $sql = "update gx_video set title='{$title}',director='{$director}',actor='{$actor}',picurl='{$picurl}',content='{$desc}',playurl='{$playurl}',year='{$year}',addtime='{$add_date}' ,hitstime='{$add_date}' ,serial='{$serial}',intro='{$update_notice}' ,area='{$area}',cid='{$cid}' where id='{$id}'";
    //echo $sql;
    $result = mysql_query($sql);
    if ($result) {
        return true;
    } else {
        return false;
    }
    mysql_close();

}

/**
 * 输出变量
 *
 * @param void $varVal 变量值
 * @param bool $isExit 是否输出变量之后就结束程序（TRUE:是 FALSE:否）
 *
 * @internal param \str $varName 变量名
 */
function dump($varVal, $isExit = FALSE)
{
    ob_start();
    var_dump($varVal);
    $varVal = ob_get_clean();
    $varVal = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $varVal);
    echo '<pre>' . $varVal . '</pre>';
    $isExit && exit();
}

?>