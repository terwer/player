package com.terwer.player.action;

import javax.servlet.http.HttpServletRequest;

import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.servlet.ModelAndView;

/**
 * Created by Administrator on 2015.01.14.
 */
@Controller
@RequestMapping("/home")
public class HomeController {  
	
	
	@RequestMapping(value = "index", method = RequestMethod.GET)
	public String home(ModelMap model) {
		model.addAttribute("message", "Spring 3 MVC Hello World");
		return "index";
	}
	
	
	@RequestMapping(value="search",method=RequestMethod.GET)
	public ModelAndView search(){
		return null;
	}
	
}


