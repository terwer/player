package com.terwer.player.model;

public class SiteConfig {
    //主站域名
	private String domain=null;
	//博客站域名
	private String blogDomain=null;
	//播放器域名
	private String playerDomain=null;
	//搜索域名
	private String searchDomain=null;
	//CKplayer目录
	private String ckplayerHome=null;
	/**
	 * @return the domain
	 */
	public String getDomain() {
		return domain;
	}
	/**
	 * @param domain the domain to set
	 */
	public void setDomain(String domain) {
		this.domain = domain;
	}
	/**
	 * @return the playerDomain
	 */
	public String getPlayerDomain() {
		return playerDomain;
	}
	/**
	 * @param playerDomain the playerDomain to set
	 */
	public void setPlayerDomain(String playerDomain) {
		this.playerDomain = playerDomain;
	}
	/**
	 * @return the searchDomain
	 */
	public String getSearchDomain() {
		return searchDomain;
	}
	/**
	 * @param searchDomain the searchDomain to set
	 */
	public void setSearchDomain(String searchDomain) {
		this.searchDomain = searchDomain;
	}
	/**
	 * @return the blogDomain
	 */
	public String getBlogDomain() {
		return blogDomain;
	}
	/**
	 * @param blogDomain the blogDomain to set
	 */
	public void setBlogDomain(String blogDomain) {
		this.blogDomain = blogDomain;
	}
	/**
	 * @return the ckplayerHome
	 */
	public String getCkplayerHome() {
		return ckplayerHome;
	}
	/**
	 * @param ckplayerHome the ckplayerHome to set
	 */
	public void setCkplayerHome(String ckplayerHome) {
		this.ckplayerHome = ckplayerHome;
	}
	
	
}
