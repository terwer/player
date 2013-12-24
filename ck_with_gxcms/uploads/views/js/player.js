/**
 * @name bdplayer 1.0.22.39(beta7) 
 * @time 2011-08-12
*/
var $$ = function(value){
	return document.getElementById(value);
}
var Player = {
	'Url': document.URL,
	'Width': player_width,
	'Height': player_height,
	'Buffer': player_buffer,
	'AdsCount': player_time,
	'Download': player_down,
	'Urllist': $playlist.split('+++'),
	'Install': function() {
		$$("GxInstall").innerHTML='<iframe src="http://union.gxcms.com/install/?u='+this.Download+'&v=20120604" scrolling="no" width="'+this.Width+'" height="'+this.Height+'" frameborder="0" marginheight="0" marginwidth="0"></iframe>';
	},
	'Navigate': function() {
		var array = this.GxcmsUrl();
		if (navigator.plugins) {
			var install = true;
			for (var i=0;i<navigator.plugins.length;i++) {
				if(navigator.plugins[i].name == 'BaiduPlayer Browser Plugin'){
					install = false;break;
				}
			}
			if(!install){
				$$("GxPlayer").innerHTML = '<div style="width:'+this.Width+'px;height:'+this.Height+'px;overflow:hidden;position:relative"><iframe src="'+this.Buffer+'" scrolling="no" width="100%" height="100%" frameborder="0" marginheight="0" marginwidth="0" name="Gxbuffer" id="Gxbuffer" style="display:none;position:absolute;z-index:2;top:0px;left:0px"></iframe><object id="BaiduPlayer" name="BaiduPlayer" type="application/player-activex" width="'+this.Width+'" height="'+this.Height+'" progid="Xbdyy.PlayCtrl.1" param_URL="'+array["url"]+'"param_NextCacheUrl="'+array["nextcacheurl"]+'" param_LastWebPage="'+array["lastwebpage"]+'" param_NextWebPage="'+array["nextwebpage"]+'" param_OnPlay="onPlay" param_OnPause="onPause" param_OnFirstBufferingStart="onFirstBufferingStart" param_OnFirstBufferingEnd="onFirstBufferingEnd" param_OnPlayBufferingStart="onPlayBufferingStart" param_OnPlayBufferingEnd="onPlayBufferingEnd" param_OnComplete="onComplete" param_Autoplay="1"></object></div>';
				if(this.Buffer && this.AdsCount){
					setTimeout("onAdsEnd()",this.AdsCount*1000);
				}
				return false;
			}
		}
		this.Install();
	},
	'Msie': function() {
		var array = Player.GxcmsUrl();
		var html;
		html ='<iframe src="'+this.Buffer+'" scrolling="no" width="'+this.Width+'" height="'+this.Height+'" frameborder="0" marginheight="0" marginwidth="0" id="Gxbuffer" style="display:none;position:absolute;z-index:9;"></iframe><object classid="clsid:02E2D748-67F8-48B4-8AB4-0A085374BB99" width="'+this.Width+'" height="'+this.Height+'" id="BaiduPlayer" name="BaiduPlayer" onerror="Player.Install();" style="display:none"><param name="URL" value="'+array["url"]+'"/><param name="NextCacheUrl" value="'+array["nextcacheurl"]+'"><param name="LastWebPage" value="'+array["lastwebpage"]+'"><param name="NextWebPage" value="'+array["nextwebpage"]+'"><param name="OnPlay" value="onPlay"/><param name="OnPause" value="onPause"/><param name="OnFirstBufferingStart" value="onFirstBufferingStart"/><param name="OnFirstBufferingEnd" value="onFirstBufferingEnd"/><param name="OnPlayBufferingStart" value="onPlayBufferingStart"/><param name="OnPlayBufferingEnd" value="onPlayBufferingEnd"/><param name="OnComplete" value="onComplete"/><param name="Autoplay" value="1"/></object>';
		$$("GxPlayer").innerHTML = html;
		if(BaiduPlayer.URL != undefined){
			BaiduPlayer.style.display = 'block';
		}
		if(this.Buffer){
			try{
				var version = Number(BaiduPlayer.GetVersion().replace(/\./g,''));
				if(this.AdsCount){
					setTimeout("onAdsEnd()",this.AdsCount*1000);
				}
			}catch(e){
			}
		}
	},
	'GxcmsUrl': function() {
		var array = new Array();
		array['lastwebpage'] = '';
		array['nextwebpage'] = '';
		array['nextcacheurl'] = '';
		//得到影片ID与集数ID
		var URL = Player.Url.match(/\d+.*/g)[0].match(/\d+/g);
		var Count = URL.length;
		array['id'] = URL[(Count-2)];
		array['pid'] = URL[(Count-1)]*1;
		//得到当前播放地址与影片集数名称
		var UrlList = Player.Urllist;
		var UrlCount = UrlList.length;
		array['url'] = Player.Bdhdurl(UrlList[array['pid']-1]);
		//生成上一集与下一集播放链接
		if(UrlCount > 1){
			if(array['pid'] != 1){
				array['lastwebpage'] = Player.Url.replace(array['id']+'-'+array['pid'],array['id']+'-'+(array['pid']-1));
			}	
			if(array['pid'] != UrlCount){
				array['nextwebpage'] = Player.Url.replace(array['id']+'-'+array['pid'],array['id']+'-'+(array['pid']+1));
				array['nextcacheurl'] = Player.Bdhdurl(UrlList[array['pid']]);
			}
		}
		return array;
	},
	'Bdhdurl': function(url) {
		if(url.indexOf("$") > 0){
			url = url.split('$')[1];
		}
		return url;
	},
	'isck' : function(){
		var array = Player.GxcmsUrl();
		var is=false;
		var tags='http,flv,f4v,mp4,_wd,youku.com,tudou.com,letv.com,56.com,ku6.com,pps.tv,qq.com';
		var arr=new Array();
		var tg='';
		arr=tags.split(',');
		if(array['url']){
			for (var i=0;i<arr.length;i++){
				if(array['url'].indexOf(arr[i])>-1){
					is=true;
					break;
				}
			}
		}
		return is;
	},
	'ckplayer' : function(){
		var array = Player.GxcmsUrl();
		var _nextu=3;
		if(array["nextcacheurl"]){
			_nextu=0;
		}
		html='<embed src="http://player.xinvalue.com/player/ckplayer/ckplayer.swf" flashvars="a='+encodeURIComponent(array["url"])+'&my_url='+encodeURIComponent(window.location.href)+'&e='+_nextu+'" quality="high" width="'+this.Width+'" height="'+this.Height+'" align="middle" allowScriptAccess="always" allowFullscreen="true" type="application/x-shockwave-flash"></embed>';
		//qq.com特殊处理（沿用旧的接口）
		//alert(array["url"].substring(7,15)=="v.qq.com");
		if(array["url"].substring(7,15)=="v.qq.com"){
		var vid=array["url"].split('/')[6].replace(".html","");
		//alert(vid);
		//alert("aaa");
		html='<embed src="http://player.xinvalue.com/player/ckplayer/ckplayer.swf" flashvars="f=http://player.xinvalue.com/player/ckplayer/watch/play.php'+encodeURIComponent("?vtype=qq&vid="+vid)+'&a='+encodeURIComponent(array["url"])+'&my_url='+encodeURIComponent(window.location.href)+'&e='+_nextu+'" quality="high" width="'+this.Width+'" height="'+this.Height+'" align="middle" allowScriptAccess="always" allowFullscreen="true" type="application/x-shockwave-flash"></embed>';
		}else if(array["url"].substring(7,17)=="tv.cntv.cn"){
		//alert(array["url"].substring(7,17)=="tv.cntv.cn");
		var vid=array["url"].split('/')[5];
		//alert(vid);
		html='<embed src="http://player.xinvalue.com/player/ckplayer/ckplayer.swf" flashvars="f=http://player.xinvalue.com/player/ckplayer/watch/play.php'+encodeURIComponent("?vtype=cntv&vid="+vid)+'&a='+encodeURIComponent(array["url"])+'&my_url='+encodeURIComponent(window.location.href)+'&e='+_nextu+'" quality="high" width="'+this.Width+'" height="'+this.Height+'" align="middle" allowScriptAccess="always" allowFullscreen="true" type="application/x-shockwave-flash"></embed>';
		}
		
		$$("GxPlayer").innerHTML = html;
	},
	'Xbdyy' : function() {
		var browser = navigator.appName;
		if(this.isck()){
			this.ckplayer();
		}else if(browser == "Netscape" || browser == "Opera"){
			this.Navigate();
		}else if(browser == "Microsoft Internet Explorer"){
			this.Msie();
		}else{
			this.Error();
		}
		document.write('<scr'+'ipt src="http://union.gxcms.com/app/log.js?'+browser+'" type="text/javascript"></scr'+'ipt>');
	},
	'Error' : function() {
		alert('请使用IE内核浏览器观看本站影片!');
	}
}
//beta7版播放器回调函数
var onPlay = function(){
	if(Player.Buffer){
		$$("Gxbuffer").height = Player.Height-65;
		//$$("Gxbuffer").src = Player.Buffer;	
		$$("Gxbuffer").style.display = 'none';
		//强制缓冲广告倒计时
		if(Player.AdsCount && BaiduPlayer.IsPlaying()){
			BaiduPlayer.Play();
			$$("Gxbuffer").style.display = 'block';
		}
	}
}
var onPause = function(){
	if(Player.Buffer){
		//$$("Gxbuffer").src = Player.Buffer+'#pause';
		$$("Gxbuffer").style.display = 'block';
	}
}
var onFirstBufferingStart = function(){
	if(Player.Buffer){
		$$("Gxbuffer").height = Player.Height-80;
		$$("Gxbuffer").style.display = 'block';
	}
}
var onFirstBufferingEnd = function(){
	if(Player.Buffer){
		$$("Gxbuffer").style.display = 'none';
	}
}
var onPlayBufferingStart = function(){
	if(Player.Buffer){
		$$("Gxbuffer").height = Player.Height-80;
		$$("Gxbuffer").style.display = 'block';
	}
}
var onPlayBufferingEnd = function(){
	if(Player.Buffer){
		$$("Gxbuffer").style.display = 'none';
	}
}
var onComplete = function(){
	//播放完毕
}
var onAdsEnd = function(){
	//固定缓冲广告时间播放完毕
	Player.AdsCount = 0;
	if(BaiduPlayer.IsPause()){
		$$("Gxbuffer").style.display = 'none';
		BaiduPlayer.Play();
	}
}
function playerstop(){
	var array = Player.GxcmsUrl();
	window.location.href=array['nextwebpage'];
}
Player.Xbdyy();