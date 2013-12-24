<?php

/*
 *
 * @file name: mode-tudou.php
 *
 * @description: Get the video sources on tudou.com
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
 * @function name: decode_tudou
 * @description: decode the url(s) of the video on tudou.com
 *
 * @parameter $iid(string): required, the video ID you get from tudou.com
 * @parameter $display(bool): optional, display the url(s) or not. default true.
 *
 * @return: array, the video info[url, size, duration]
 *
 */

function decode_tudou($iid,$display = true){
	// Base url.
	$url = 'http://v2.tudou.com/f?hd=5&id='.$iid;
	
	// custom referer
	$referer = 'http://www.tudou.com';
	
	// get remote page contents
	//$content = get_content($url,false,false,$referer);
	$content = get_content('http://xinvideo.duapp.com/youku.php?url='.$base_url,false,false,$referer);
	
	// Get video url(s)
	preg_match('~>(http[s]{0,1}://.*)<~iUs',$content,$vurl);
	
	// No result.
	if($vurl){
		
		// display
		if($display)
			echo '<a href="'.$vurl[1].'" target="_blank">视频地址</a>';
		// return
		else{
			$video['duration'][0] = NULL;
			$video['size'][0] = NULL;
			$video['url'][0] = $vurl[1];
			
			return $video;
		}
	}
	// if the server returned one or more resource(s),
	// continue to get more information
	else{
		if($display) 
			echo '<p class="info">无法获取到您指定的视频资源，资源已被删除或者您提供的信息有误。</p>';
		else
			return NULL;
	}
}
?>