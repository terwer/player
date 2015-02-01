package com.terwer.player.model;

/**
 * Created by Administrator on 2015/2/1.
 */
public class UrlModel {
    //视频类型(//调用方式，0=普通方法（f=视频地址），1=网址形式,2=xml形式，3=swf形式(s>0时f=网址，配合a来完成对地址的组装))
    private int vtype;
    //视频来源（youku、tudou等）
    private String  vsource= null;
    //视频ID
    private String vid = null;
    //清晰度（bq、cq、gq）
    private String qty = null;

    public int getVtype() {
        return vtype;
    }

    public void setVtype(int vtype) {
        this.vtype = vtype;
    }

    public String getVsource() {
        return vsource;
    }

    public void setVsource(String vsource) {
        this.vsource = vsource;
    }

    public String getVid() {
        return vid;
    }

    public void setVid(String vid) {
        this.vid = vid;
    }

    public String getQty() {
        return qty;
    }

    public void setQty(String qty) {
        this.qty = qty;
    }
}
