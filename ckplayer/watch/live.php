<?php
/**
 *作者：唐有炜
 *我的博客：http://www.xinValue.com
 *我的微博：http://weibo.com/tyouwei
 *我的QQ：1035136784（非技术问题勿扰）
 */

// Get the parameters sent by the client.
$tv =  isset($_GET["tv"]) ? $_GET["tv"] : "";

// If visit the file itself, die.
if($tv == "")
	die('Request error! Code: CHANNEL_EMPTY');
	
// Include the function package.
include_once(dirname(__FILE__)."/includes/functions.php");
	
//--------------------------------------------------------------------------------------------//

if($tv == '2453801339' || $tv == 'sctv' || $tv == 'sichuantv' || $tv == '四川卫视')
	$tid = '2453801339';

else if($tv == '1975434150' || $tv == 'zjtv' || $tv == 'zhejiangtv' || $tv == '浙江卫视')
	$tid = '1975434150';
	
else if($tv == '1128831868' || $tv == 'hbtv' || $tv == 'hubeitv' || $tv == '湖北卫视')
	$tid = '1128831868';
	
else if($tv == '3900155972' || $tv == 'dftv' || $tv == 'dongfangtv' || $tv == '东方卫视')
	$tid = '3900155972';
	
else if($tv == '2584831218' || $tv == 'hktv' || $tv == 'hongkongtv' || $tv == '香港卫视')
	$tid = '2584831218';
	
else if($tv == '623043810' || $tv == 'ahtv' || $tv == 'anhuitv' || $tv == '安徽卫视')
	$tid = '623043810';
	
else if($tv == '2220552576' || $tv == 'sztv' || $tv == 'shenzhentv' || $tv == '深圳卫视')
	$tid = '2220552576';
	
else if($tv == '1926463423' || $tv == 'zhjtv' || $tv == 'zhujiangtv' || $tv == '珠江卫视')
	$tid = '1926463423';
	
else if($tv == '857894899' || $tv == 'gdtv' || $tv == 'guangdongtv' || $tv == '广东卫视')
	$tid = '857894899';
	
else if($tv == '3006271240' || $tv == 'lntv' || $tv == 'liaoningtv' || $tv == '辽宁卫视')
	$tid = '3006271240';
	
else if($tv == '877636586' || $tv == 'qhtv' || $tv == 'qinghaitv' || $tv == '青海卫视')
	$tid = '877636586';
	
else if($tv == '2905421066' || $tv == 'cqtv' || $tv == 'congqingtv' || $tv == '重庆卫视')
	$tid = '2905421066';
	
else if($tv == '3660187036' || $tv == 'sdtv' || $tv == 'shandongtv' || $tv == '山东卫视')
	$tid = '3660187036';
	
else if($tv == '2739752321' || $tv == 'sxtv' || $tv == 'shanxitv' || $tv == '陕西卫视')
	$tid = '2739752321';
	
else if($tv == '708402866' || $tv == 'yntv' || $tv == 'yunnantv' || $tv == '云南卫视')
	$tid = '708402866';
	
else if($tv == '3051487004' || $tv == 'gztv' || $tv == 'guizhoutv' || $tv == '贵州卫视')
	$tid = '3051487004';
	
else if($tv == '4172356212' || $tv == 'hntv' || $tv == 'henantv' || $tv == '河南卫视')
	$tid = '4172356212';
	
else if($tv == '830075195' || $tv == 'tjtv' || $tv == 'tianjintv' || $tv == '天津卫视')
	$tid = '830075195';
	
else if($tv == '974433428' || $tv == 'gxtv' || $tv == 'guangxitv' || $tv == '广西卫视')
	$tid = '974433428';
	
else if($tv == '1000637964' || $tv == 'dntv' || $tv == 'dongnantv' || $tv == '东南卫视')
	$tid = '1000637964';
	
else if($tv == '3444760127' || $tv == 'gstv' || $tv == 'gansutv' || $tv == '甘肃卫视')
	$tid = '3444760127';
	
else if($tv == '3778086045' || $tv == 'nxtv' || $tv == 'ningxiatv' || $tv == '宁夏卫视')
	$tid = '3778086045';
	
else if($tv == '2342060367' || $tv == 'nmgtv' || $tv == 'neimenggutv' || $tv == '内蒙古卫视')
	$tid = '2342060367';
	
else if($tv == '4050426117' || $tv == 'jktv' || $tv == 'jiankangtv' || $tv == '健康卫视')
	$tid = '4050426117';
	
else if($tv == '2136314174' || $tv == 'yyfd' || $tv == 'yingyufudao' || $tv == '英语辅导')
	$tid = '2136314174';

else if($tv == '4035478592' || $tv == 'gdgg' || $tv == 'guangdonggonggong' || $tv == '广东公共')
	$tid = '4035478592';
	
else if($tv == '2631736979' || $tv == 'gdxw' || $tv == 'guangdongxinwen' || $tv == '广东新闻')
	$tid = '2631736979';
	
else if($tv == '1249794075' || $tv == 'jjkt' || $tv == 'jiajiakatong' || $tv == '嘉佳卡通')
	$tid = '1249794075';
	
//--------------------------------------------------------------------------------------------//

function live_tv($channel,$display=true){
	$url = 'http://zb.v.qq.com:1863/?progid='.$channel.'&pla=WIN&apptype=live&redirect=0';
	$referer = 'http://v.qq.com';
	
	$content = get_content($url,false,false,$referer);
	
	preg_match('~url="(.*)"~iUs',$content,$liveurl);
	
	if($liveurl){
		if($display)
			echo $liveurl[1];
		else
			return $liveurl[1];
	}
	else{
		if($display)
			echo '<p class="info">电视频道有误，请校正后重试。</p>';
		else
			return NULL;
	}
}

//--------------------------------------------------------------------------------------------//

if(!empty($tid))
	$livetv = live_tv($tid,false);
	
//--------------------------------------------------------------------------------------------//

if(!empty($livetv)){
	// XML document header.
	header('Content-type:text/xml; charset=utf-8');
	
	$xml = NULL;
	
	$xml .= '<?xml version="1.0" encoding="utf-8"?>'.PHP_EOL;
	$xml .= '<ckplayer>'.PHP_EOL;
	
	$xml .= '<video>'.PHP_EOL;
		
	$xml .= '<file><![CDATA['.$livetv.']]></file>'.PHP_EOL;
	$xml .= '</video>'.PHP_EOL;
	
	$xml .= '</ckplayer>';
	
	// Display the xml file.
	echo $xml;
}

else
	die('Request error! Code: CHANNEL_ERR');

// Done.
?>