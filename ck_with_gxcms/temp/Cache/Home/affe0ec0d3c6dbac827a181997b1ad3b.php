<?php if (!defined('THINK_PATH')) exit();?><?php echo '<?'; ?>
xml version="1.0" encoding="utf-8"?>
<ckplayer>
	<related_setup>120,90,40,#FFFFFF,#FFCC33,0.8,1,精彩视频推荐：,140,100,25,75,15,10</related_setup>
	<!--图片的宽，高，文本的高,文字的颜色,鼠标指向文字后的文字颜色,图片初始透明度,鼠标指向后图片的透明度,图片列表上面的推荐文字,宽差值:播放器宽-这个值=放置图片区域的宽,高差值:播放器高-这个值=放置图片区域的高,图片开始放置的X坐标,图片开始放置的Y坐标,图片占位差值:图片的宽+这个值=图片总共占的宽度,图片占位高差值:图片的高+文字的高+这个值=图片总共占的高度-->
	<!--播放器尺寸(视频内容尺寸) 推荐视频每页个数 参数参考-->
	<!--600x485/600x476(600x450) 三行三列 120,90,20,#FFFFFF,#FFCC33,0.8,1,精彩视频推荐：,140,110,25,75,15,10-->
	<!--600x485/600x476(600x450) 二行三列 120,90,40,#FFFFFF,#FFCC33,0.8,1,精彩视频推荐：,140,180,25,110,15,10-->
	<!--600x485/600x476(600x450) 二行三列 120,90,40,#FFFFFF,#FFCC33,0.8,1,精彩视频推荐：,140,160,25,105,15,10-->
	<!--以下是：视频大小=播放器大小,迷你风格或隐藏控制条这类情况-->
	<!--600x450 三行三列 120,90,20,#FFFFFF,#FFCC33,0.8,1,精彩视频推荐：,140,85,25,60,15,10-->
	<!--600x450 二行三列 120,90,40,#FFFFFF,#FFCC33,0.8,1,精彩视频推荐：,140,140,25,100,15,10-->
	<!--600x400 二行三列 120,90,40,#FFFFFF,#FFCC33,0.8,1,精彩视频推荐：,140,100,25,75,15,10-->
	<!--480x400 二行二列 120,90,40,#FFFFFF,#FFCC33,0.8,1,精彩视频推荐：,140,110,25,80,25,15-->
	<relatedlist>
		<?php $tag['name'] = 'video';$tag['limit'] = '18';$tag['order'] = 'stars desc,hits desc'; $__LIST__ = get_tag_gxcms($tag); if(is_array($__LIST__)): $i = 0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$video): ++$i;$mod = ($i % 2 );?><related>
			<img>{img http://localhost{$video.picurl}}</img>
			<url>http://localhost<?php echo ($video["readurl"]); ?></url>
			<title><?php echo ($video["title"]); ?></title>
		</related><?php endforeach; endif; else: echo "" ;endif;unset($__LIST__);unset($tag);?>
	</relatedlist>
</ckplayer>