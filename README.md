版权声明
--------
除非特别声明，本作品包含所有资源，均应用于如下版权说明：<br/>
本作品受《中华人民共和国著作权法》以及其他相关法律的保护。对本作品的使用不得超越本许可授权的范围。<br/>
>---作者：唐有炜<br/>
>---我的博客：http://www.xinValue.com<br/>
>---我的微博：http://weibo.com/tyouwei<br/>
>---我的QQ：1035136784（非技术问题勿扰）<br/>

使用必读
--------
将文件夹上传至网站根目录（务必如此）<br/>
上传需要修改的文件<br/>
>---/player/config.php（按相应的说明修改）（务必认真修改）<br/>
>---/player/ckplayer/ckplayer.js（将localhost全部换成【您的域名】）<br/>
>---/player/ckplayer/ckplayer.xml（将localhost全部换成【您的域名】）<br/>
>---/player/ckplayer/share.xml（将localhost全部换成【您的域名】）<br/>

测试数据
-------
### 1.url为null
http://localhost/player/index.php<br/>
### 2.url为空
http://localhost/player/index.php?url=<br/>
### 3.video.php解析
>youku:<br/>
http://localhost/player/index.php?url=http://v.youku.com/v_show/id_XNjUyMTM0MDA0.html<br/><br/>
>tudou（仅支持类似albumplay的url）:<br/>
http://localhost/player/ckplayer/video.php?url=http://www.tudou.com/albumplay/p9nMfF_Yp_o/YpSHsdK0zn8.html<br/><br/>
>乐视<br/>
http://localhost/player/index.php?url=http://www.letv.com/ptv/vplay/2217036.html<br/><br/>
>56<br/>
http://localhost/player/index.php?url=http://www.56.com/u28/v_OTE4MzcxNjk.html<br/><br/>
>ku6<br/>
http://localhost/player/index.php?url=http://v.ku6.com/show/lDy2CAxYbhikekNcdtuP8g...html<br/><br/>
>pps<br/>
http://localhost/player/?url=http://v.pps.tv/play_39V04K.html<br/><br/>

### 4.play.php解析
>凤凰<br/>
http://localhost/player/index.php?url=http://v.ifeng.com/ent/mingxing/201312/01142824-b595-418e-9ae7-b4af60dbd8aa.shtml<br><br/>
>163<br/>
http://localhost/player/index.php?url=http://v.163.com/jishi/V6FMS3ID2/V9FHDV3PA.html<br/><br/>
>cntv<br/>
http://localhost/player/?url=http://tv.cntv.cn/video/C32975/36c82b38ab4d46ee1a87eba7f5bebf91<br/><br/>
>腾讯视频<br/>
http://localhost/player/?url=http://v.qq.com/cover/3/o00132sjzvj.html<br/>

### related.php
>http://localhost/player/ckplayer/related.php?id=bq_XMjU4OTYyNDQ=_youku<br/><br/>
https://openapi.youku.com/v2/videos/show.json?client_id=0dec1b5a3cb570c1&video_id=XMjU4OTYyNDQ=&ext=show<br/><br/>
https://openapi.youku.com/v2/searches/show/by_keyword<br/><br/>.json?client_id=0dec1b5a3cb570c1&keyword=%E6%A2%81%E5%B1%B1%E4%BC%AF%E4%B8%8E%E7%A5%9D%E8%8B%B1%E5%8F%B0%20%E7%89%87%E5%B0%BE%E6%9B%B2&category=%E9%9F%B3%E4%B9%90&page=1&count=18<br/><br/>

### list_mov.php
>http://localhost/player/ckplayer/list_mov.php?r=youku_XMjU4OTYyNDQ<br/><br/>
https://openapi.youku.com/v2/videos/show.json?client_id=0dec1b5a3cb570c1&video_id=XMjU4OTYyNDQ&ext=show<br/><br/>
https://openapi.youku.com/v2/videos/show.json?client_id=0dec1b5a3cb570c1&video_id=XNjE0MjI4MzY4&ext=show<br/><br/>

### collect.php
>http://openapi.youku.com/v2/shows/show.json?client_id=0dec1b5a3cb570c1&show_id=f2d7cbbc510311e38b3f<br/>

### gx_video表添加了一个字段show_id,用于存储采集的节目ID
>>ALTER TABLE `gx_video`  ADD COLUMN `show_id` VARCHAR(20) NULL DEFAULT '' AFTER `genuine`;<br/>

