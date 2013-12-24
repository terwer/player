<?php

/*
 *
 * @file name: mode-sina.php
 *
 * @description: Get the video sources on v.sina.com.cn
 * @author: RayLee[itaoyuan.org]
 * @version: 1.2
 * @license: GNU/GPL
 * @copyright: RayLee[RayLee@itaoyuan.org]
 *
 */

//--------------------------------------------------------------------------------------------//
 
// Include the function package
include_once(dirname(__FILE__)."/functions.php");

//--------------------------------------------------------------------------------------------//

/*
 *
 * @function name: decode_sina
 * @description: decode the url(s) of the video on v.sina.com.cn
 *
 * @parameter $vid(string): required, the video ID you get from v.sina.com.cn
 * @parameter $display(bool): optional, display the url(s) or not. default true.
 *
 * @return: array, the video info[url, size, duration]
 *
 */

function decode_sina($vid,$display = true){
	// base url
	$base = 'http://v.iask.com/v_play.php?vid=' . $vid;
	
	// custom referer
	$referer = 'http://v.iask.com/';
	
	// get the remote page contents
	$content = get_content($base,false,false,$referer);
	
	// Get the duration of the video.
	preg_match_all('~<length>(\d+)</length>~iUs',$content,$time);
	
	// Get the size of the video.
	//preg_match_all('~<framecount>(\d+)</framecount>~iUs',$content,$time);
	
	// Get the url(s) of the video.
	preg_match_all('~<url><!\[cdata\[(.*)\]\]></url>~iUs',$content,$vurl);
	
	// If thers is no url return.
	if(count($vurl[1]) == 0){
		if($display)
			echo '<p class="info">无法获取到您指定的视频资源，资源已被删除或者您提供的信息有误。</p>';
		else
			return NULL;
	}
	// one or more url return.
	else{
		for($i = 0; $i < count($vurl[1]); $i++){
			if($display){
				if($i < 9)
					echo '<a href="'.$vurl[1][$i].'" target="_blank">分段0'.($i+1).'</a>';
				else
					echo '<a href="'.$vurl[1][$i].'" target="_blank">分段'.($i+1).'</a>';
			}
			else{
				$video['duration'][$i] = round($time[1][$i] / 1000,3);
				//$video['url'][$i] = str_ireplace('%','%25',$vurl[1][$i]);
				$video['url'][$i] = $vurl[1][$i];
				$video['size'][$i] = NULL;
			}
		}
		
		if(!$display)
			return $video;
	}
	
	// Done.
}
?>