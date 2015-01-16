package com.terwer.player.action;

import org.apache.http.client.methods.HttpGet;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

import com.terwer.player.util.HttpHelper;

/**
 * Created by Administrator on 2015.01.14.
 */
@Controller
@RequestMapping("/home")
public class HomeController {

	@RequestMapping(value = "index", method = RequestMethod.GET)
	public String home(Model model) {
		model.addAttribute("keyword", "Ä¬ÈÏ¹Ø¼ü×Ö");
		return "video/search";
	}

	
	
	public static void main(String[] args)  {
		HttpHelper.setBaseUrl("http://www.terwer.com");
		String content=HttpHelper.getContent(new HttpGet(), "", "");
		//String content=HttpHelper.getContent(new HttpPost(), "", "");
		System.out.println(content);
		
	}
}
