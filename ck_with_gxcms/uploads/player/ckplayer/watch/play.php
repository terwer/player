<?php

/* 
 * @file name: play.php
 *
 * @description: Creat the xml file as playlist for ckplayer.
 * @author: RayLee[itaoyuan.org]
 * @version: 1.2
 * @license: GNU/GPL
 * @copyright: RayLee[RayLee@itaoyuan.org]
 *
 */

//--------------------------------------------------------------------------------------------//
  
// Get the parameters sent by the client.
$vtype =  isset($_GET["vtype"]) ? $_GET["vtype"] : "";
$vid = isset($_GET["vid"]) ? $_GET["vid"] : "";
$ver = isset($_GET["ver"]) ? $_GET["ver"] : 6;

// If visit the file itself, die.
if($vtype == "" || $vid == "")
  die('Request Error!');

// Video sources. We surport these providers so far.
// However, because of some providers will limit us to get their resources, it is not 100% we can get what we want.
switch($vtype){
  case "youku":
    include_once(dirname(__FILE__)."/includes/mode-youku.php");
    $video = decode_youku($vid,false);    
    //var_dump($video);
    //return;
    break;
  case "tudou":
    include_once(dirname(__FILE__)."/includes/mode-tudou.php");
    $video = decode_tudou($vid,false);
    break;
  case "ku6":
    include_once(dirname(__FILE__)."/includes/mode-ku6.php");
    $video = decode_ku6($vid,false);
    break;
  case "56":
    include_once(dirname(__FILE__)."/includes/mode-56.php");
    $video = decode_56($vid,false);
    break;
  case "letv":
    include_once(dirname(__FILE__)."/includes/mode-letv.php");
    $video = decode_letv($vid,false);
    break;
  case "sina":
    include_once(dirname(__FILE__)."/includes/mode-sina.php");
    $video = decode_sina($vid,false);
    break;
  case "qq":
    include_once(dirname(__FILE__)."/includes/mode-qq.php");
    $video = decode_qq($vid,false);
    break;
  case "ifeng":
    include_once(dirname(__FILE__)."/includes/mode-ifeng.php");
    $video = decode_ifeng($vid,false);
    break;
  case "163":
    include_once(dirname(__FILE__)."/includes/mode-163.php");
    $video = decode_163($vid,false);
    break;
  case "sohu":
    include_once(dirname(__FILE__)."/includes/mode-sohu.php");
    $video = decode_sohu($vid,false);
    break;
  case "pps":
    include_once(dirname(__FILE__)."/includes/mode-pps.php");
    $video = decode_pps($vid,false);
     break;
  case "cntv":
    include_once(dirname(__FILE__)."/includes/mode-cntv.php");
    $video = decode_cntv($vid,false);
    break;
  default:
    die("Parameter error!");
}

if(!empty($video)){
  // XML document header.
  header('Content-type:text/xml; charset=utf-8');
  
  $xml = NULL;
  
  $xml .= '<?xml version="1.0" encoding="utf-8"?>'.PHP_EOL;
  $xml .= '<ckplayer>'.PHP_EOL;
  
  
  // For the 5.9 and older ckplayer.
  if($ver == 5){
    for($i = 0; $i < count($video['url']); $i++){
      $xml .= '<urllist>'.PHP_EOL;
      $xml .= '<url><![CDATA['.$video['url'][$i].']]></url>'.PHP_EOL;
      $xml .= '</urllist>'.PHP_EOL;
    }
  }
  // For the 6.0 and higher ckplayer.
  else{
    for($i = 0; $i < count($video['url']); $i++){
      $xml .= '<video>'.PHP_EOL;
      
      if(!empty($video['size'][$i]))
        $xml .= '<size><![CDATA['.$video['size'][$i].']]></size>'.PHP_EOL;
        
      if(!empty($video['duration'][$i]))
        $xml .= '<seconds><![CDATA['.$video['duration'][$i].']]></seconds>'.PHP_EOL;
        
      $xml .= '<file><![CDATA['.$video['url'][$i].']]></file>'.PHP_EOL;
      $xml .= '</video>'.PHP_EOL;
    }
  }
  
  $xml .= '</ckplayer>';
  
  // Display the xml file.
  echo $xml;
}

// No resource
else
  die('Request error! Code: RESOURCES_ERR');

// Done.
?>