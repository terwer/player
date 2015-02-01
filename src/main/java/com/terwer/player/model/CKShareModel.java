package com.terwer.player.model;

import javax.xml.bind.annotation.XmlElement;
import javax.xml.bind.annotation.XmlElementWrapper;
import javax.xml.bind.annotation.XmlRootElement;
import java.util.List;

/**
 * Created by terwer on 2015/1/28.
 */
@XmlRootElement(name = "ckplayer")
public class CKShareModel {
    private String share_html;
    private String share_flash;
    private String share_flashVars;
    private String share_path;
    private String share_replace;
    private int share_permit;
    private String share_uuid;
    private List<ShareButton> share_button;

    public String getShare_html() {
        return share_html;
    }

    public void setShare_html(String share_html) {
        this.share_html = share_html;
    }

    public String getShare_flash() {
        return share_flash;
    }

    public void setShare_flash(String share_flash) {
        this.share_flash = share_flash;
    }

    public String getShare_flashVars() {
        return share_flashVars;
    }

    public void setShare_flashVars(String share_flashVars) {
        this.share_flashVars = share_flashVars;
    }

    public String getShare_path() {
        return share_path;
    }

    public void setShare_path(String share_path) {
        this.share_path = share_path;
    }

    public String getShare_replace() {
        return share_replace;
    }

    public void setShare_replace(String share_replace) {
        this.share_replace = share_replace;
    }

    public int getShare_permit() {
        return share_permit;
    }

    public void setShare_permit(int share_permit) {
        this.share_permit = share_permit;
    }

    public String getShare_uuid() {
        return share_uuid;
    }

    public void setShare_uuid(String share_uuid) {
        this.share_uuid = share_uuid;
    }

    public List<ShareButton> getShare_button() {
        return share_button;
    }

    public void setShare_button(List<ShareButton> share_button) {
        this.share_button = share_button;
    }
}
