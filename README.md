player
=====
一款强大的视频播放器，基于ckplayer6.3用java实现视频解析无广告播放，目前支持优酷、搜狐、乐视等。详情见：http://www.terwer.com/special.html#用Java实现视频地址解析

相关技术
======
>1、maven项目管理
>2、spring、spring mvc、sping oxm、json
>3、jstl
>4、Apache httpclient

开发环境
========
>版本: V1.0        
>开发工具：InteliJ IDEA 14.0.2（从eclips-jee 4.4.1 luna迁移）
>作者: Terwer       
>作者邮箱: cbgtyw@gmail.com terwergreen@163.com   

版权声明
========
>作者：唐有炜
>我的博客：http://www.terwer.com
>我的微博：http://weibo.com/tyouwei
>我的QQ：1035136784（非技术问题勿扰）

使用必读
======       
需要修改的地方              
----------             
>1 修改commons4j.properties（站点核心配置，commons4j是我写的另外一个开源项目：[https://github.com/terwer/commons4j](https://github.com/terwer/commons4j)），log4j.properties（若不控制日志可以不修改该文件）              
>2 修改{webapp}/WEB-INF/plugins/ckplayer6.6/ckplayer.js（仅在站外分享时调用）
>3 修改{webapp}/WEB-INF/plugins/ckplayer6.6/ckplayer.xml（仅在站外分享时调用）
>>(1) 分享地址                 

测试数据
=======
>1 播放页
>http://localhost:8080/video/play.do?url=http://v.youku.com/v_show/id_XODY5MTY1NjM2.html

> xml解析页
> http://localhost:8080/video/ckxml.do?url=http://v.youku.com/v_show/id_XODY5MTY1NjM2.html

>flv解析页
>http://localhost:8080/video/play.do?url=http://localhost:8080/temp.flv

参考资料
======
>1、http://stackoverflow.com/questions/3627463/what-is-remotesystemstempfiles-in-eclipse       
>2、http://zhidao.baidu.com/link?url=9J06VsUXchdXDNT3fVyyG-pYlQvMzrtLkdqlKCuLBvfEfW1T8nwCE1zuQquyr-SXHxcqd9mYk1okpCrjErvvkq
http://bbs.csdn.net/topics/320059633                
>3、SpringMVC学习系列（12） 完结篇 之 基于Hibernate+Spring+Spring MVC+Bootstrap的管理系统实现          
http://www.cnblogs.com/liukemng/p/3754269.html     
>4、使用springMVC的详细步骤     
http://www.cnblogs.com/liuling/archive/2013/02/07/sdfasdf.html     
>5、http://stackoverflow.com/questions/10567341/circular-view-path     
>5、http://www.4byte.cn/question/391937/circular-view-path-error-spring-mvc.html
>6、http://jinnianshilongnian.iteye.com/blog/1593441   
>7、http://www.cnblogs.com/enshrineZither/p/3891097.html   
>8、http://www.mkyong.com/spring-mvc/spring-3-mvc-and-xml-example/   
>9、http://flysnowxf.iteye.com/blog/1187580   
>10、http://www.meiriyouke.net/?p=417    
>11、Spring MVC 返回 xml和json数据的配置方法     
http://www.yihaomen.com/article/java/511.htm          