package com.terwer.player.action;

import javax.servlet.http.HttpServletRequest;

import org.springframework.stereotype.Controller;
import org.springframework.web.context.request.RequestContextHolder;
import org.springframework.web.context.request.ServletRequestAttributes;

import com.terwer.player.model.SiteConfig;

/**
 * 基控制器用于加载站点配置
 * 
 * @author Tangyouwei
 * @version 1.0.0 14-01-16
 */
public class BaseController {
	private SiteConfig siteConfig = null;

	public BaseController() {
		siteConfig = new SiteConfig();
		siteConfig.setDomain("localhost:8080/player");
		siteConfig.setPlayerDomain("localhost:8080/player");
		siteConfig.setSearchDomain("localhost:8080/search");
		siteConfig.setBlogDomain("www.terwer.com");
		siteConfig.setCkplayerHome(siteConfig.getPlayerDomain()+"/plugins/ckplayer6.6");
		System.out.println("我是基类控制器，我开始构造，配置初始化完成...");
	}

	/**
	 * @return the siteconfig
	 */
	public SiteConfig getSiteconfig() {
		return siteConfig;
	}

}
