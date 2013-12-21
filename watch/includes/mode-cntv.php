 <?php
function decode_cntv($vid, $display = true){
        // base url
        $baseurl = 'http://vdn.apps.cntv.cn/api/getHttpVideoInfo.do?pid='.$vid;
        
        // custom referer
        $referer = 'http://www.cntv.cn';
        
        // get contents
        //$content = get_content($baseurl,false,false,$referer);
        $content = file_get_contents($baseurl);
    
        // if the server return 404, that means there is no resource,
        // we will return null to the caller or display some error message to the user
        if(stristr($content,'"status":"-404"')){
                if($display)
                        echo '<p class="info">无法获取到您指定的视频资源，资源已被删除或者您提供的信息有误。</p>';
                else
                        return NULL;
        }
        // there are one or more resources to be got
        // we continue to get more detail
        else{
                // as the remote server respond some json data, we need to decode it
                $json = json_decode($content);
                //var_dump($json);
        
                // get the array of the videos
                $chapters = $json->video->chapters;
                
        //var_dump($chapters);
                // wo just need the HD one
        $urllist='<?xml version="1.0" encoding="utf-8"?>'.chr(13);
        $urllist.=' <ckplayer>'.chr(13);
                for($i = 0; $i < count($chapters); $i++){
                        if($display){
                                //if($i < 9){
                                        //echo '<a href="' . $chapters[$i]->url . '" target="_blank">分段0'.($i+1).'</a>';                                                            
                                        $urllist.=' <video>'.chr(13);
                                        $urllist.=' <file>'.chr(13);
                    $urllist.=$chapters[$i]->url.chr(13);
                    $urllist.=' </file>'.chr(13);
                                        $urllist.=' </video>'.chr(13);    
                                //}else
                                //        echo '<a href="' . $chapters[$i]->url . '" target="_blank">分段'.($i+1).'</a>';
                        }
                        else {
                                for($i = 0; $i < count($chapters); $i++){
                                        // $video['size'][0] = $chapters->duration;
                                        $video['duration'][$i] = $chapters[$i]->duration;
                                        $video['url'][$i] = $chapters[$i]->url;
                                }
                                return $video;
                        }    
                }
        $urllist.=' </ckplayer>';
               return $urllist;
        }
        
        // Done.
}

  /*
$vid=bfdc431023f14b1b939021295179b348;
if(isset($_GET["vid"])){
$vid=$_GET["vid"];
}
echo decode_cntv($vid,true);
  */
?>