package com.terwer.player.model;

/**
 * Created by terwer on 2015/1/28.
 */
public class ShareButton {
    private String id;
    private String img;
    private String coordinate;

    public ShareButton(String id, String img, String coordinate) {
        this.id = id;
        this.img = img;
        this.coordinate = coordinate;
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getImg() {
        return img;
    }

    public void setImg(String img) {
        this.img = img;
    }

    public String getCoordinate() {
        return coordinate;
    }

    public void setCoordinate(String coordinate) {
        this.coordinate = coordinate;
    }
}
