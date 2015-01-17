package com.terwer.player.action;

import java.util.ArrayList;
import java.util.Map;

import javax.servlet.http.HttpServletRequest;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.ResponseBody;
import org.springframework.web.context.request.RequestContextHolder;
import org.springframework.web.context.request.ServletRequestAttributes;

import com.terwer.player.model.CKModel;
import com.terwer.player.model.CKVideo;
import com.terwer.player.model.Video;

@Controller
@RequestMapping("/video")
public class VideoController extends BaseController {
	
	 public VideoController() {
			System.out.println("我是VideoController，我开始构造...");
	}
	
	     /**
	      * 根据视频类型vtype和视频vid输出ckplayer需要的xml格式
	      * @param vtype
	      * @param vid
	      * @return
	      */
		@RequestMapping(value = "ckxml", method = RequestMethod.GET)
		 @ResponseBody  
		 public String ckxml(String vtype,String vid) {
//       public  @ResponseBody CKModel ckxml(String vtype,String vid) {
//			//这里是解析构造f的过程（非常关键）
			String f="<?xml version=\"1.0\" encoding=\"utf-8\"?><player><flashvars>{h->3{a->bq_MTM0MTMxNDU0_56|gq_MTM0MTMxNDU0_56|cq_MTM0MTMxNDU0_56}{f->http://www.terwer.com/tools/player/ckplayer/video.php?url=[$pat1]}</flashvars><video><file><![CDATA[http://f4.r.56.com/f4.c183.56.com/flvdownload/20/9/sc_142074011863hd_clear.flv?v=1&t=uTYFMqGbmLjnozQpGB3yzg&r=61639&e=1421508553&tt=187&sz=13036231&vid=134131454]]></file></video></player>";
            return f;
//			CKModel ckModel=new CKModel();
//			ckModel.setFlashvars("{h->3}{a->bq_MTAyMDc0MTU1_56|gq_MTAyMDc0MTU1_56|cq_MTAyMDc0MTU1_56}{f->http://www.terwer.com/tools/player/ckplayer/video.php?url=[$pat1]}");
//			CKVideo video=new CKVideo();
//			ArrayList<String> files=new ArrayList<String>();
//			files.add("<![CDATA[http://f5.r.56.com/f5.c127.56.com/flvdownload/24/11/sc_138632158682hd_clear.flv?v=1&t=YfXNI977OZLyXFJZkFFsBA&r=73681&e=1421510480&tt=2765&sz=191745133&vid=102074155]]>");
//			video.setFile(files);
//			ckModel.setVideo(video);
//			return ckModel;
		}
		
	 
	 
	/**
	 * 视频播放
	 * @param model
	 * @return
	 */
	@RequestMapping(value = "play", method = RequestMethod.GET)
	public String play(Model model,String vtype,String vid) {
		//获取Video对象
		Video video=new Video();//这个应该通过vtype和vid获取
		video.setVideoTitle("测试视频标题");
		video.setVideoUrl("http://video.test");
		//f（非常重要，此参数提供ckplayer可播放的内容）
		video.setF(super.getSiteConfig().getPlayerUrl()+"/video/ckxml.xml?vtype="+vtype+"&vid="+vid);
		//s（非常重要，配合f，s=2时使用xml）
		video.setS("2");
		//传递参数到页面 
		model.addAttribute("video", video);
		model.addAttribute("siteConfig", super.getSiteConfig());
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
