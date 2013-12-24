<?php
/*
 *
 * @file name: mode-56.php
 *
 * @description: Get the video sources on 56.com
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
 * @function name: decode_56
 * @description: decode the url(s) of the video on 56.com
 *
 * @parameter $vid(string): required, the video ID you get from 56.com
 * @parameter $display(bool): optional, display the url(s) or not. default true.
 *
 * @return: array, the video info[url, size, duration]
 *
 */

function decode_56($vid, $display = true){
	// base url
	$url = 'http://vxml.56.com/json/'.$vid.'/';
	
	// custom referer
	$referer = 'http://www.56.com';
	
	// get contents
	$content = get_content($url,false,false,$referer);
	
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
		
		// get the array of the videos
		$rfiles = $json->info->rfiles;
	
		// get the value of the 'hd' variable
		// if there is a integer value greater than 0
		// it will has a HD format video and the value will be the position of it
		$hd = $json->info->hd;
		
		// wo just need the HD one
		$detail = $rfiles[$hd];
		
		if($display)
			echo '<a href="' . $detail->url . '" target="_blank">视频地址</a>';
		else{
			$video['size'][0] = $detail->filesize;
			$video['duration'][0] = round($detail->totaltime / 1000,3);
			$video['url'][0] = $detail->url;
			
			return $video;
		}
	}
	
	// Done.
}
?>