package com.terwer.player.service.impl;

import com.terwer.commons4j.LogHelper;
import com.terwer.player.model.UrlModel;
import com.terwer.player.model.Video;
import com.terwer.player.service.VideoService;
import com.terwer.player.util.Config;
import com.terwer.player.util.Vids;
import org.springframework.stereotype.Service;

/**
 * Created by 唐有炜 on 2015/2/1.
 */
public class VideoServiceImpl implements VideoService {
    @Override
    public Video getVideoModel(String url) {
        // 获取Video对象
        Video video = null;
        //返回默认的播放连接
        if (url==null||url.trim().equals("")){
            return getVideoByFile();
        }
        //根据url播放不同的视频
        UrlModel urlModel = Vids.getUrlModelByUrl(url);
        LogHelper.info("路径：" + url);
        LogHelper.info("视频类型：" + urlModel.getVtype());
        switch (urlModel.getVtype()) {
            case 0:
                video = getVideoByFile();
                break;
            case 1:
                video = getVideoByUrl();
                break;
            case 2:
                video = getVideoByXml(url);
                break;
            case 3:
                video = getVideoBySwf();
                break;
            default:
                video = getVideoByFile();
                break;
        }

        return video;
    }

    /**
     * 直接播放文件
     *
     * @return
     */
    private Video getVideoByFile() {
        // 获取Video对象
        Video video = new Video();// 这个应该通过vtype和vid获取
        video.setVideoTitle("测试视频标题");
        video.setVideoUrl("http://video.test");
        // f（非常重要，此参数提供ckplayer可播放的内容）
        //video.setF(super.getSiteConfig().getPlayerUrl()
        //        + "/video/ckxml.do?vtype=" + vtype + "&vid=" + vid);
        video.setF(Config.getSiteConfig().getPlayerUrl()+"/temp.flv");
        //a（非常重要，配合f，s=2时使用xml）
        video.setA("cq_v_ABCDEF_file");
        //s（非常重要，配合f，s=2时使用xml）
        video.setS("0");
        return video;
    }

    /**
     * 根据网址播放
     *
     * @return
     */
    private Video getVideoByUrl() {
        return null;
    }

    /**
     * 根据xml播放（配合解析插件）
     * @param url
     * @return
     */
    private Video getVideoByXml(String url) {
        // 获取Video对象
        Video video = new Video();// 这个应该通过vtype和vid获取
        video.setVideoTitle("测试视频标题");
        video.setVideoUrl("http://video.test");
        // f（非常重要，此参数提供ckplayer可播放的内容）
        video.setF(Config.getSiteConfig().getPlayerUrl()
                + "/video/ckxml.do?url="+url);
        //a（非常重要，配合f，s=2时使用xml）
        video.setA("cq_v_MTAyMDc0MTU1_56");
        //s（非常重要，配合f，s=2时使用xml）
        video.setS("2");
        return video;
    }

    /**
     * 根据swf地址播放
     *
     * @return
     */
    private Video getVideoBySwf() {
        return null;
    }
}
