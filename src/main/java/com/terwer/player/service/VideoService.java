package com.terwer.player.service;

import com.terwer.player.model.Video;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Qualifier;

/**
 * Created by 唐有炜 on 2015/2/1.
 */
public interface VideoService {
    /**
     * 根据url获取可供播放的Video对象
     * @param url 要解析的网址
     * @return Video对象
     */
    Video getVideoModel(String url);
}
