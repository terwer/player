package com.terwer.player.util;

import com.terwer.commons4j.LogHelper;
import com.terwer.player.model.UrlModel;

import java.util.regex.Matcher;
import java.util.regex.Pattern;

public class Vids {
    final static Pattern pattern = Pattern.compile("\\S*[?]\\S*");

    //根据url获取相关信息，后面判断很有用
    public static UrlModel getUrlModelByUrl(String url) {
        UrlModel urlModel = new UrlModel();
        String urlExt = parseSuffix(url);
        LogHelper.info("url后缀：" + urlExt);
        int vtype = 0;
        if (urlExt.equals("flv") || urlExt.equals("mp4")) {
            vtype = 0;
        } else if (urlExt.equals("html")) {
            vtype = 2;
        } else if (urlExt.equals("swf")) {
            vtype = 3;
        } else {
            vtype = 1;
        }
        urlModel.setVtype(vtype);
        return urlModel;
    }


    /**
     * 获取链接的后缀名
     *
     * @return
     */
    private static String parseSuffix(String url) {

        Matcher matcher = pattern.matcher(url);

        String[] spUrl = url.toString().split("/");
        int len = spUrl.length;
        String endUrl = spUrl[len - 1];

        if (matcher.find()) {
            String[] spEndUrl = endUrl.split("\\?");
            return spEndUrl[0].split("\\.")[1];
        }
        return endUrl.split("\\.")[1];
    }
}
