<?php

/*
 *
 * @file name: mode-pps.php
 *
 * @description: Get the video sources on pps.tv
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
 * @function name: get_location
 * @description: get the user location and isp info for CDN
 *
 * @parameter: none
 *
 * @return: array, the user location and isp info
 *
 */
function get_location(){
	// client ip address
	if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] && strcasecmp($_SERVER['HTTP_X_FORWARDED_FOR'],'unknown'))  
		$cip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
	elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'],'unknown'))  
		$cip = $_SERVER['REMOTE_ADDR'];
	else
		$cip = '';
		
	$cip = preg_match("~[\d\.]{7,15}~",$cip,$matches) ? $matches[0] : $cip; 
	
	// use the API to ge the user location
	$api = 'http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json&ip='.$cip;
	
	// custom referer
	$referer = 'http://www.sina.com.cn';
	
	// get remote api page content
	$content = get_content($api,false,false,$referer);
	
	// decode json data
	$json = json_decode($content);
	
	// province
	$location['province'] = $json->province;
	
	// isp
	$location['isp'] = $json->isp;
	
	return $location;
}

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

function decode_pps($vid, $display = true){
	// base url
	$url = 'http://dp.ppstv.com/get_play_url_cdn.php?flash_type=1&type=1'.'&sid=' . $vid;
	
	// get user location
	$location = get_location();
	$url .= '&region='.$location['province'].'&operator='.$location['isp'];
	
	// custom referer
	$referer = 'http://www.pps.tv';
	
	// get content
	$content = get_content($url,false,false,$referer);
	
	// No result.
	if($content === '13'){
		if($display) 
			echo '<p class="info">无法获取到您指定的视频资源，资源已被删除或者您提供的信息有误。</p>';
		else
			return NULL;
	}
	else{
		// parse url
		$url = parse_url($content);
		$server = $url['scheme'] . '://' . $url['host'];
		$path = $url['path'];
		$query = '?hd=1';
		
		// display
		if($display)
			echo '<a href="' . $server . $path . $query.'" target="_blank">视频地址</a>';
		// return
		else{
			$video['duration'][0] = NULL;
			$video['size'][0] = NULL;
			$video['url'][0] = $server . $path . $query;
			
			return $video;
		}
	}
	
	// Done.
}
?>