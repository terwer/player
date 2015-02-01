package com.terwer.player.service.impl;

import com.terwer.player.model.CKVideo;
import com.terwer.player.model.CKXmlModel;
import com.terwer.player.model.UrlModel;
import com.terwer.player.service.CKXmlService;
import com.terwer.player.util.Vids;

import java.util.ArrayList;

/**
 * Created by Administrator on 2015/2/1.
 */
public class CKXmlServiceImpl implements CKXmlService {
    @Override
    public CKXmlModel getCKXmlModel(String url) {
        CKXmlModel ckXmlModel=new CKXmlModel();
        UrlModel urlModel= Vids.getUrlModelByUrl(url);
        ckXmlModel.setFlashvars("{h->3}{a->bq_MTAyMDc0MTU1_56|gq_MTAyMDc0MTU1_56|cq_MTAyMDc0MTU1_56}{f->http://localhost:8080/video/ckxml.do?url=[$pat1]}");
        CKVideo video=new CKVideo();
        ArrayList<String> files=new ArrayList<String>();
        //files.add("<![CDATA[http://f5.r.56.com/f5.c127.56.com/flvdownload/24/11/sc_138632158682hd_clear.flv?v=1&t=YfXNI977OZLyXFJZkFFsBA&r=73681&e=1421510480&tt=2765&sz=191745133&vid=102074155]]>");
        video.setFile(files);
        ckXmlModel.setVideo(video);
        return ckXmlModel;
    }
}
