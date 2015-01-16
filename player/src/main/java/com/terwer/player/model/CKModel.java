package com.terwer.player.model;


import javax.xml.bind.annotation.XmlRootElement;
/**
 * CKPlayerΩ‚Œˆ÷ÿ“™Model
 * @author Tangyouwei
 *
 */
@XmlRootElement(name = "player")
public class CKModel {

	private String flashvars=null;
	private CKVideo video=null;
	/**
	 * @return the flashvars
	 */
	public String getFlashvars() {
		return flashvars;
	}
	/**
	 * @param flashvars the flashvars to set
	 */
	public void setFlashvars(String flashvars) {
		this.flashvars = flashvars;
	}
	/**
	 * @return the video
	 */
	public CKVideo getVideo() {
		return video;
	}
	/**
	 * @param video the video to set
	 */
	public void setVideo(CKVideo video) {
		this.video = video;
	}

}


 