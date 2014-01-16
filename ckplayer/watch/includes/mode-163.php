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
 * @function name: decode_163
 * @description: decode the url(s) of the video on v.163.com
 *
 * @parameter $vid(string): required, the video ID you get from v.163.com
 * @parameter $display(bool): optional, display the url(s) or not. default true.
 *
 * @return: array, the video info[url, size, duration]
 */

function decode_163($vid, $display = true){
	// Get the length of the $vid, it will make us sure which api we should use.
	$index = strlen($vid);
	
	// If the lenght of the $vid is more than 9, then we get this base url.
	if($index > 9)
		$url = 'http://live.ws.126.net/movie/'.$vid[$index-2].'/'.$vid[$index-1].'/2_'.$vid.'.xml';
	// or we get this one.
	else
		$url = 'http://xml.ws.126.net/video/'.$vid[$index-2].'/'.$vid[$index-1].'/0085_'.$vid.'.xml';
		
	// custom referer
	$referer = 'http://v.163.com';
	
	// get contents of the remote page
	$content = get_content($url,false,false,$referer);
	
	// mp4 format
	preg_match('~<useMp4>(\d+)</useMp4>~iUs',$content,$ismp4);
	
	// mp4 list
	if($ismp4 && $ismp4[1] > 0)
		preg_match('~<mp4>(.*)</mp4>~iUs',$content,$vurl);
	// flv list.
	else
		preg_match('~<flv>(.*)</flv>~iUs',$content,$vurl);
	
	if($vurl){
		if($display)
			echo '<a href="'.$vurl[1].'" target="_blank">视频地址</a>';
		else{
			$video['url'][0] = $vurl[1];
			$video['size'][0] = NULL;
			$video['duration'][0] = NULL;
			
			return $video;
		}
	}
	
	// There is no resource.
	else{
		if($display)
			echo '<p class="info">无法获取到您指定的视频资源，资源已被删除或者您提供的信息有误。</p>';
		else
			return NULL;
	}
	
	// Done.
}
?>