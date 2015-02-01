package com.terwer.player.action;

import com.terwer.player.model.CKModel;
import com.terwer.player.model.CKVideo;
import com.terwer.player.model.Video;
import com.terwer.player.service.VideoService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Qualifier;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.ResponseBody;

import javax.servlet.http.HttpServletResponse;
import java.util.ArrayList;

@Controller
@RequestMapping("/video")
public class VideoController extends BaseController {

    //依赖注入
    @Autowired
    private VideoService videoService;

    //构造函数
    public VideoController() {
        System.out.println("我是VideoController，我开始构造...");
    }

    /**
     * 根据视频类型vtype和视频vid输出ckplayer需要的xml格式（非常关键）
     *
     * @param vtype
     * @param vid
     * @return
     */
    @RequestMapping(value = "ckxml", method = RequestMethod.GET)
    public @ResponseBody
    CKModel ckxml(String vtype,String vid) {
        //这里是解析构造f的过程（非常关键）
        CKModel ckModel=new CKModel();
        ckModel.setFlashvars("{h->3}{a->bq_MTAyMDc0MTU1_56|gq_MTAyMDc0MTU1_56|cq_MTAyMDc0MTU1_56}{f->http://localhost:8080/video/ckxml.do?url=[$pat1]}");
        CKVideo video=new CKVideo();
        ArrayList<String> files=new ArrayList<String>();
        //files.add("<![CDATA[http://f5.r.56.com/f5.c127.56.com/flvdownload/24/11/sc_138632158682hd_clear.flv?v=1&t=YfXNI977OZLyXFJZkFFsBA&r=73681&e=1421510480&tt=2765&sz=191745133&vid=102074155]]>");
        video.setFile(files);
        ckModel.setVideo(video);
        return ckModel;
    }

    /**
     * 输出播放器分享xml
     *
     * @return
     */
    @RequestMapping(value = "shareXml",method = RequestMethod.GET)
    /*public @ResponseBody
    CKShareModel cksharexml (){
        CKShareModel ckShareModel=new CKShareModel();
        ckShareModel.setShare_html("{embed src=\""+super.getSiteConfig().getCkplayerHome()+"6/ckplayer/ckplayer.swf\" " +
                "flashvars=\"[$share]\" quality=\"high\" width=\"480\" height=\"400\" align=\"middle\" allowScriptAccess=\"always\" allowFullscreen=\"true\" type=\"application/x-shockwave-flash\"}{/embed}\n");
        ckShareModel.setShare_flash(super.getSiteConfig().getCkplayerHome()+"/ckplayer/ckplayer.swf?[$share]");
        ckShareModel.setShare_flashVars("f,my_url,my_pic,a");
        ckShareModel.setShare_path(super.getSiteConfig().getCkplayerHome()+"/ckplayer/share/");
        ckShareModel.setShare_permit(0);
        ckShareModel.setShare_uuid("c25cf02c-1705-412d-bd4b-77a10b380f08");
        List<ShareButton> shareButtons=new ArrayList<ShareButton>();
        ShareButton button1=new ShareButton("qqmb",ckShareModel.getShare_path()+"/qq.png","20,50");
        ShareButton button2=new ShareButton("sinaminiblog",ckShareModel.getShare_path()+"/sina.png","101,50");
        ShareButton button3=new ShareButton("qzone",ckShareModel.getShare_path()+"/qzone.png","182,50");
        ShareButton button4=new ShareButton("renren",ckShareModel.getShare_path()+"/rr.png","263,50");
        ShareButton button5=new ShareButton("kaixin001",ckShareModel.getShare_path()+"/kaixin001.png","20,85");
        ShareButton button6=new ShareButton("tianya",ckShareModel.getShare_path()+"/tianya.png","101,50");
        ShareButton button7=new ShareButton("feixin",ckShareModel.getShare_path()+"/feixin.png","182,50");
        ShareButton button8=new ShareButton("msn",ckShareModel.getShare_path()+"/msn.png","263,50");
        shareButtons.add(button1);
        shareButtons.add(button2);
        shareButtons.add(button3);
        shareButtons.add(button4);
        shareButtons.add(button5);
        shareButtons.add(button6);
        shareButtons.add(button7);
        shareButtons.add(button8);
        ckShareModel.setShare_button(shareButtons);
        return  ckShareModel;
    }*/
    public String shareXml(Model model,HttpServletResponse response)  {
        response.setContentType("text/xml");
        response.setCharacterEncoding("UTF-8");
        model.addAttribute("siteConfig", super.getSiteConfig());
        return "video/shareXml";
    }

    /**
     * 输出预定义配置文件xml
     *
     * @return
     */
    @RequestMapping(value = "ckplayerXml",method = RequestMethod.GET)
    public String ckplayerXml(Model model,HttpServletResponse response)  {
        response.setContentType("text/xml");
        response.setCharacterEncoding("UTF-8");
        model.addAttribute("siteConfig", super.getSiteConfig());
        return "video/ckplayerXml";
    }


    /**
     * 输出预定义配置文件xml
     *
     * @return
     */
    @RequestMapping(value = "relatedXml",method = RequestMethod.GET)
    public String relatedXml(Model model,HttpServletResponse response)  {
        response.setContentType("text/xml");
        response.setCharacterEncoding("UTF-8");
        model.addAttribute("siteConfig", super.getSiteConfig());
        return "video/relatedXml";
    }


    /**
     * 视频播放
     *
     * @param model
     * @return
     */
    @RequestMapping(value = "play", method = RequestMethod.GET)
    public String play(Model model, String url) {
        Video video=videoService.getVideoModel(url);
        // 传递参数到页面
        model.addAttribute("video", video);
        model.addAttribute("siteConfig", super.getSiteConfig());
        //model.addAttribute("test","这是测试的，哈哈哈"+(videoService==null?"注入失败：":"注入成功：f="+videoService.getVideoModel("").getF()));
        //return "test";
        return "video/play";
    }

    @RequestMapping(value = "search", method = RequestMethod.GET)
    public String search(Model model) {
        // public String search(ModelMap model) {
        // 把参数值放到request类里面去
        model.addAttribute("keyword", "陆小凤与花满楼");
        // model.addAttribute("args", new SearchArgs());
        // return "/home/search";
        return "video/search";
    }

    /**
     * 视频搜索結果
     *
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
