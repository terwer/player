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
		model.addAttribute("keyword", "Ä¬ÈÏ¹Ø¼ü×Ö");
		return "video/search";
	}

	
}
