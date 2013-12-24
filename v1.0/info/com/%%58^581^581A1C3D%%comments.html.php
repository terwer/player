<?php /* Smarty version 2.6.18, created on 2013-12-21 17:56:39
         compiled from comments.html */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <title></title>
  <script  type="text/javascript"
    src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js">
</script>
</head>
<body>
  <div style="margin-left:180px;margin-top:-10px;">
<div> 
 <div>
  <textarea id="cmt_content" style="width:500px;height；350px；">留言是种美德。。。</textarea>
  </div>
  <div>
 <input type="button" value="评论" id="btn_comment" />
 </div>
 </div>
  <?php $_from = $this->_tpl_vars['comments']->comments; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cmt']):
?>
  <div style="color:#458B00;"><?php echo $this->_tpl_vars['cmt']->content; ?>
</div>
  <div><a hreef="<?php echo $this->_tpl_vars['cmt']->user->link; ?>
" target="_blank" style="color:#C71585;text-decoration:none;">
  <?php echo $this->_tpl_vars['cmt']->user->name; ?>
</a>发表于<?php echo $this->_tpl_vars['cmt']->published; ?>
，
  来自<a href="<?php echo $this->_tpl_vars['cmt']->source->link; ?>
" target="_blank" style="text-decoration:none;">
  <?php echo $this->_tpl_vars['cmt']->source->name; ?>
</a></div>
  <br/>
  <?php endforeach; else: ?>
  暂无评论。
  <?php endif; unset($_from); ?>
  </div>
  <!--js处理-->
  <script type="text/javascript">
  $("#cmt_content").click(function(){
  if($(this).val()=="留言是种美德。。。"){
  $(this).val("");
  }
    }).blur(function(){
   if($(this).val()==""){
  $(this).val("留言是种美德。。。");
  }
    });
  
  $("#btn_comment").click(function(){
  alert("评论功能开发中。。。");
  });
  </script>
</body>
</html>