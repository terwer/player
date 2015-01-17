package com.terwer.player.action;

import com.terwer.player.model.SiteConfig;
import com.terwer.player.util.Config;

/**
 * 基控制器用于加载站点配置
 * 
 * @author Tangyouwei
 * @version 1.0.0 14-01-16
 */
public class BaseController {

	private SiteConfig siteConfig = null;

	public BaseController() {
		siteConfig = Config.getSiteConfig();
		System.out.println("我是基类控制器，我开始构造，配置初始化完成...");
	}

	/**
	 * @return the siteConfig
	 */
	public SiteConfig getSiteConfig() {
		return siteConfig;
	}
}
