package com.terwer.player.action;

import javax.servlet.http.HttpServletRequest;
import javax.xml.bind.annotation.XmlElement;

import org.apache.http.client.methods.HttpHead;
import org.springframework.http.HttpRequest;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.ResponseBody;
import org.springframework.web.context.request.RequestContextHolder;
import org.springframework.web.context.request.ServletRequestAttributes;

import com.terwer.player.model.CKModel;

@Controller
@RequestMapping("/video")
public class VideoController {
	
	
	
	/**
	 * 根据视频类型和id输出ckplayer需要的xml格式
	 * @param model
	 * @return
	 */
	@XmlElement
	@RequestMapping(value = "ckxml", method = RequestMethod.GET)
	public  @ResponseBody Object ckxml(Model model) {
		CKModel obj=new CKModel();
		obj.setVid(1);
		obj.setVxml("aaa");
		//Object obj=new Object(){};
		return obj;
	}
	
	/**
	 * 视频播放
	 * @param model
	 * @return
	 */
	@RequestMapping(value = "play", method = RequestMethod.GET)
	public String play(Model model) {
		HttpServletRequest request = ((ServletRequestAttributes)RequestContextHolder.getRequestAttributes()).getRequest();
		
		request.getParameterMap();
		String uri=request.getParameter("vtype");
		model.addAttribute("vtype", "youku"+uri);
		model.addAttribute("vid", "abcdefg");
		return "video/play";
	}
	
	@RequestMapping(value = "search", method = RequestMethod.GET)
	public String search(Model model) {
	//public String search(ModelMap model) {
		// 把参数值放到request类里面去
		model.addAttribute("keyword", "陆小凤与花满楼");
		// model.addAttribute("args", new SearchArgs());
		//return "/home/search";
		return "video/search";
	}

	
	/**
	 * 视频搜索結果
	 * @param model
	 * @return
	 */
	@RequestMapping(value = "result", method = RequestMethod.GET)
	public String result(Model model) {
		model.addAttribute("vtype", "youku");
		model.addAttribute("vid", "abcdefg");
		return "result";
	}
}
