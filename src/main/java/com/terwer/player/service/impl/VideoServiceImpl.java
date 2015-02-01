package com.terwer.player.service.impl;

import com.terwer.player.model.Video;
import com.terwer.player.service.VideoService;
import org.springframework.stereotype.Service;

/**
 * Created by 唐有炜 on 2015/2/1.
 */
public class VideoServiceImpl implements VideoService {
    @Override
    public Video getVideoModel(String url) {
        // 获取Video对象
        Video video = new Video();// 这个应该通过vtype和vid获取
        video.setVideoTitle("测试视频标题");
        video.setVideoUrl("http://video.test");
        // f（非常重要，此参数提供ckplayer可播放的内容）
        //video.setF(super.getSiteConfig().getPlayerUrl()
        //        + "/video/ckxml.do?vtype=" + vtype + "&vid=" + vid);
        video.setF("http://localhost:8080/temp.flv");
        //a（非常重要，配合f，s=2时使用xml）
        video.setA("cq_v_MTAyMDc0MTU1_56");
        //s（非常重要，配合f，s=2时使用xml）
        video.setS("0");
        return video;
    }
}
