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

/*
 * @function name: decode_ku6
 * @description: decode the url(s) of the video on ku6.com
 *
 * @parameter $kID(string): required, the video ID you get from ku6.com
 * @parameter $display(bool): optional, display the url(s) or not. default true.
 *
 * @return: array, the video info[url, size, duration]
 *
 */

function decode_ku6($kID, $display = true){
	// base url
	$url = 'http://v.ku6.com/fetchVideo4Player/'.$kID.'.html';
	
	// custom referer
	$referer = 'http://www.ku6.com';
	
	// get content
	$content = get_content($url,false,false,$referer);
	
	// if the server return 404, that means there is no resource
	// in this case we return null to the caller or display some error message to the user
	if(stristr($content,'404 Not Found') || stristr($content,'"status":404')){
		if($display)
			echo '<p class="info">无法获取到您指定的视频资源，资源已被删除或者您提供的信息有误。</p>';
		else
			return NULL;
	}
	
	// there are one or more resources to be got, we continue to get more detail
	// some thing like video playFiles list, video durations list, video playFiles size, etc.
	else{
		// as the remote server respond some json data, we need to decode it
		$json = json_decode($content);
		
		// get the playFiles abject, which contains the video list
		// as the url object is string we need to explode it to array
		$vurl = explode(',',$json->data->f);
		
		// get the video time object
		// as the time object is string we need to explode it to array
		$duration = explode(',',$json->data->vtime);
		
		for($i = 0; $i < count($vurl); $i++){
			// display
			if($display){
				if($i < 9)
					echo '<a href="'.$vurl[$i].'" target="_blank">分段0'.($i+1).'</a>';
				else
					echo '<a href="'.$vurl[$i].'" target="_blank">分段'.($i+1).'</a>';
			}
			// return
			else{
				$video['size'][$i] = NULL;
				$video['url'][$i] = $vurl[$i];
				
				// as the duration list contains the total duration value in the first one
				// the second one is the first video duration, and so forth
				// but if there is just one video recource, there is just one duration value in the list
				// so we handle it like this
				if(count($vurl) > 1)
					$video['duration'][$i] = $duration[$i+1];
				else
					$video['duration'][$i] = $duration[$i];
			}
		}
		
		if(!$display)
			return $video;
	}
	
	// Done.
}
?>