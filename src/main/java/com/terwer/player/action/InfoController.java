package com.terwer.player.action;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

@Controller
@RequestMapping("/info")
public class InfoController {
	@RequestMapping(value = "videoInfo", method = RequestMethod.GET)
	public String info() {
		return "info/videoInfo";
	}
	
	@RequestMapping(value = "comments", method = RequestMethod.GET)
	public String comments() {
		return "info/comments";
	}
}
