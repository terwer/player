<?php

/*
 *
 * @file: mode-sohu.php
 *
 * @description: Get the video sources on sohu.com
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
 * @function name: decode_sohu
 * @description: decode the url(s) of the video on tv.sohu.com
 *
 * @parameter $vid(string): required, the video ID you get from tv.sohu.com
 * @parameter $display(bool): optional, display the url(s) or not. default true.
 *
 * @return: array, the video info[url, size, duration]
 *
 */

function decode_sohu($vid,$display = true){
	// base url
	$url = 'http://hot.vrs.sohu.com/vrs_flash.action?vid='.$vid;
	
	// custom referer
	$referer = 'http://tv.sohu.com';
	
	// get the respond header
	$header = get_content($url,true,true,$referer);
	
	// if the server returned 403, we change the url to this one
	if(stristr($header,"403 Forbidden"))
		$url = 'http://my.tv.sohu.com/videinfo.jhtml?m=viewnew&vid='.$vid;
	
	// get the remote page content
	$content = get_content($url,false,false,$referer);
	
	// decode json data
	$json = json_decode($content);
	
	// get the su object, which is the uri list of the video clips
	$clips = $json->data->su;
	
	// if we get one or more video resource(s), we handle it(them)
	// continue to ge more detail like file size, video duration, uri, ect.
	if($clips > 0){
		// the video files host
		$host = 'http://sohu.vodnew.lxdns.com';
		
		// the clips bytes, which are the file size of the video clips
		$bytes = $json->data->clipsBytes;
		
		// the clips duration, which are the duration of the video clips
		$duration = $json->data->clipsDuration;
		
		// the ck object, that are the list of the keys, they are not required here.
		// if the server needs them, then we will use them
		//$key = $json->data->ck;
		
		for($i = 0; $i < count($clips); $i++){
			// display
			if($display){
				if($i < 9)
					echo '<a href="'.$host.$clips[$i].'" target="_blank">分段0'.($i+1).'</a>';
				else
					echo '<a href="'.$host.$clips[$i].'" target="_blank">分段'.($i+1).'</a>';
			}
			// return
			else{
				$video['size'][$i] = $bytes[$i];
				$video['duration'][$i] = $duration[$i];
				$video['url'][$i] = $host.$clips[$i];
			}
		}
		
		if(!$display)
			return $video;
	}
	// if there is no resource returned, we will return null to the caller or display some error information to the user
	else{
		if($display)
			echo '<p class="info">无法获取到您指定的视频资源，资源已被删除或者您提供的信息有误。</p>';
		else
			return NULL;
	}
	
	// Done.
}
?>