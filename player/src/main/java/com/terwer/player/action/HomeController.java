package com.terwer.player.action;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.servlet.ModelAndView;
import org.springframework.web.servlet.mvc.AbstractController;

/**
 * Created by Administrator on 2015.01.14.
 */
@Controller
@RequestMapping("/home")
public class HomeController {

	@RequestMapping(value = "index", method = RequestMethod.GET)
	public String home(Model model) {
		model.addAttribute("message", "Spring 3 MVC Hello World");
		return "search";
	}

	@RequestMapping(value = "search", method = RequestMethod.GET)
	public String search(Model model) {
	//public String search(ModelMap model) {
		// 把参数值放到request类里面去
		model.addAttribute("keyword", "陆小凤与花满楼a");
		// model.addAttribute("args", new SearchArgs());
		//return "/home/search";
		return "search";
	}

}
