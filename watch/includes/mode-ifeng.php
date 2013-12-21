<?php

/*
 *
 * @file name: mode-ifeng.php
 *
 * @description: Get the video sources on v.ifeng.com
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
 * @function name: ifeng_change_url
 * @description: CDN crack
 *
 * @parameter $url(string): required, the old url
 *
 * @return: string, the new url
 */

function ifeng_change_url($url){
	$host = 'http://ips.ifeng.com/';
	$new = str_replace('http://', $host, $url);
	
	return $new;
}

//--------------------------------------------------------------------------------------------//

/*
 * @function name: decode_ifeng
 * @description: decode the url(s) of the video on v.ifeng.com
 *
 * @parameter $vid(string): required, the video ID you get from v.ifeng.com
 * @parameter $display(bool): optional, display the url(s) or not. default true.
 *
 * @return: array, the video info[url, size, duration]
 *
 */

function decode_ifeng($vid, $display = true){
	// Get the length of the $vid.
	$index = strlen($vid);
	
	// base url
	$url = 'http://v.ifeng.com/video_info_new/'.$vid[$index-2].'/'.$vid[$index-2].$vid[$index-1].'/'.$vid.'.xml';
	
	// custom referer
	$referer = 'http://v.ifeng.com';
	
	// get remote page contents
	$content = get_content($url,false,false,$referer);
	
	// Get the resource list.
	preg_match_all('~\<parts\s*(.*)\s*\/>~iUs',$content,$parts);
	
	// if there are no parts got,
	// perhaps the video has not been cut up by segmentations,
	// we try to get single one
	if(count($parts[1]) == 0){
		preg_match('~VideoPlayUrl\s*=\s*"(.*)"~iUs',$content,$playurl);
		
		// single video
		if($playurl){
			preg_match('~Duration="(\d+)"~iUs',$content,$duration);
			
			if($display)
				echo '<a href="'.$playurl[1].'" target="_blank">视频地址</a>';
			else{
				$video['size'][0] = NULL;
				$video['url'][0] = ifeng_change_url($playurl[1]);
				$video['duration'][0] = $duration[1];
				
				return $video;
			}
		}
		// if there is also no single video got, that means it has no resource on the server
		// we return null to the caller or display some error message to the user
		else{
			if($display)
				echo '<p class="info">无法获取到您指定的视频资源，资源已被删除或者您提供的信息有误。</p>';
			else
				return NULL;
		}
	}
	// Got parts list
	else{
		for($i = 0; $i < count($parts[1]); $i++){
			preg_match('~playurl="(.*)"~iUs',$parts[1][$i],$playurl);
			preg_match('~duration="(\d+)"~iUs',$parts[1][$i],$duration);
			
			// Display.
			if($display){
				// We count the list starting from 0, but we wish it display 1, so we +1.
				if($i < 9)
					echo '<a href="'.$playurl[1].'" target="_blank">分段0'.($i+1).'</a>';
				else
					echo '<a href="'.$playurl[1].'" target="_blank">分段'.($i+1).'</a>';
			}
			// Return.
			else{
				$video['size'][$i] = NULL;
				$video['url'][$i] = ifeng_change_url($playurl[1]);
				$video['duration'][$i] = $duration[1];
			}
		}
		
		if(!$display)
			return $video;
	}
	
	//Done.
}
?>