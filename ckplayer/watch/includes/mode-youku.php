<?php
/**
 *作者：唐有炜
 *我的博客：http://www.xinValue.com
 *我的微博：http://weibo.com/tyouwei
 *我的QQ：1035136784（非技术问题勿扰）
 */

//--------------------------------------------------------------------------------------------//
 
// Include the function package
include_once(dirname(__FILE__)."/functions.php");

//--------------------------------------------------------------------------------------------//
 
// A usefull class. Do something like creating key, decode, HEX converting and so on.
class decoder{
  var $randomSeed = 0;
  var $cg_str = "";
  
  function __construct($seed){
    $this->randomSeed = $seed;
  }
  
  function ran(){
    $this->randomSeed = (($this->randomSeed * 211) + 30031) % 65536;
    return ($this->randomSeed / 65536);
  }
  
  function cg_hun(){
    $this->cg_str = "";
    $sttext = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ/\:._-1234567890';
    $len = strlen($sttext);
    
    for($i=0;$i<$len;$i++){
      $cuch = (int)($this->ran()*strlen($sttext));
      $this->cg_str .= $sttext[$cuch];
      $sttext = str_replace($sttext[$cuch],'',$sttext);
    }
  }
  
  function decode($string){
    $output = "";
    $this->cg_hun();
    $expl = explode('*',$string);
    
    for($i = 0; $i < count($expl) - 1; $i++){
      $output.=$this->cg_str[(int)$expl[$i]];
    }
    
    return $output;
  }
  
  function dec2hex_md($dec){
    $hexarr = '0123456789ABCDEF';
    $dec = (int)$dec;
    
    if($dec < 16)
      return '0' . $hexarr[$dec];
    else
      return $hexarr[(int)($dec/16)] . $hexarr[$dec%16]; 
  }
}

//--------------------------------------------------------------------------------------------//

/*
 *
 * @function name: decode_youku
 * @description: decode the url(s) of the video on youku.com
 *
 * @parameter $vid(string): required, the video ID you get from youku.com
 * @parameter $display(bool): optional, display the url(s) or not. default true.
 *
 * @return: array, the video info[url, size, duration]
 *
 */

function decode_youku($vid,$display = true){
  // base url
  $base_url = 'http://v.youku.com/player/getPlayList/VideoIDS/'.$vid;
  
  // custom referer
  $referer = 'http://v.youku.com/v_show/id_' . $vid . '.html';
  
  // get remote page contents
  //$content = get_content($base_url,false,false,$referer);
  $content = get_content('http://xinvideo.duapp.com/youku.php?url='.$base_url,false,false,$referer);
  
  //$json=json_decode($content);
  
  // Get the seed which will be used in the next step.
  preg_match('~"seed"\s*:\s*(\d+)\s*,~iUs',$content,$seed);
  
  // Get the type of the video. FLV, MP4 or HD.
  preg_match('~\{\s*"(flv|mp4|hd2|hd1)"\s*:\s*"(.*)"\s*[,\}]~iUs',$content,$encoded);
  //var_dump($encoded);
  //var_dump($json->data[0]->streamfileids);
  
  // Get the segments which will be uesfull for the next step.
  preg_match('~"segs"\s*:\s*\{(.*\])\}\s*,~iUs',$content,$segments);
  //var_dump($segments);
  
  // Get the segments list, youku.com has cut the video into many segments.
  preg_match('~"(.*)"\s*:\s*\[(.*)\]~iUs',$segments[1],$playUnit);
  //var_dump($playUnit);
  
  // Get the playFiles list.
  preg_match_all('~\{"no":"*(\d+)"*,"size":"(\d+)","seconds":"(\d+)".*\}~iUs',$playUnit[2],$play);
  
  //echo $playUnit[2];  
  $nums=array();
  $sizes=array();
  $seconds=array();
  $arr=json_decode('['.$playUnit[2].']');
  for($i=0;$i<count($arr);$i++){
  $arr_temp[$i]= '{"no":"'.$arr[$i]->no.
  '","size":".'.$arr[$i]->size.
  '","seconds":"'.$arr[$i]->seconds.
  '","k":"'.$arr[$i]->k.
  '","k2":"'.$arr[$i]->k2.
  '"}';
  $nums[$i]=$arr[$i]->no;
  $sizes[$i]=$arr[$i]->size;
  $seconds[$i]=$arr[$i]->seconds;
  }
  //echo count($arr);
  $arr_ok=array($arr_temp,$nums,$sizes,$seconds);
  $play=$arr_ok;
  //var_dump($arr_ok);
    
  // Get the key that is important in the next step.
  preg_match_all('~"k"\s*:\s*"(.*)\s*"~iUs',$playUnit[2],$k);
  
  // Decode the seed and the video type we got above.
  $new = new decoder((int)$seed[1]);
  $fileid = $new->decode($encoded[2]);
  //var_dump($new);
  //var_dump($fileid);
  
  // Creat some strings that will be used to connect to the youku.com's server.
  $s7 = substr($fileid,10,strlen($fileid));
  $s5 = substr($fileid,0,8);
  $s6 = substr($fileid,6,2);
  $sid = time() . mt_rand(10,99) . '1000' . mt_rand(30,80).'00';
  
  // There is no resource return from the youku.com. Maybe the video has been deleted
  // or we have no permission to access.
  if(count($play[1]) == 0){
    if($display)
      echo '<p class="info">无法获取到您指定的视频资源，资源已被删除或者您提供的信息有误。</p>';
    else
      return NULL;
  }
  // one or more url we got. Let's list them out.
  else {
    for($i = 0; $i < count($play[1]); $i++){
      
      // Creat the strings and build them up. Here we are working in loop.
      $s4 = $new->dec2hex_md($play[1][$i]);
      $file_id = $s5 . $s4 . $s7;
      
      // The key. Remenber that, there are many keys we found, we must list them out one by one.
      $key = $k[1][$i];
      
      // HD video
      if($encoded[1] == 'hd2'){
        $d_ADDR = 'http://f.youku.com/player/getFlvPath/sid/' . $sid . '_'. $s4 . '/st/flv/fileid/' . $file_id;
        $final_addr = $d_ADDR . '?K=' . $key. '&hd=2';
      }
      // General video
      else{
        $d_ADDR = 'http://f.youku.com/player/getFlvPath/sid/' . $sid . '_'. $s4 . '/st/' . $encoded[1] . '/fileid/' . $file_id;
        $final_addr = $d_ADDR . '?K=' . $key;
      }
      
      // Display or not.
      if($display){
        // We start counting from 1, but here we get 0, so we +1.
        if($i < 9)
          echo '<a href="'.$final_addr.'" target="_blank">分段0'.($i+1).'</a>';
        else
          echo '<a href="'.$final_addr.'" target="_blank">分段'.($i+1).'</a>';
      }
      else{
        $video['size'][$i] = $play[2][$i];
        $video['duration'][$i] = $play[3][$i];
        $video['url'][$i] = $final_addr;
      }
    }
    
    if(!$display)
      return $video;
  }
  // Done!
}
?>
